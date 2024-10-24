<?php

include 'connect.php';

use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require __DIR__ . "/vendor/autoload.php";

function sendSms($number, $message) {
    // Ensure phone number is in international format (starting with +60)
    if (strpos($number, '+60') !== 0) {
        // If the number doesn't already start with +60, prepend it
        $number = '+60' . ltrim($number, '0');
    }

    // Infobip API settings
    $base_url = "https://9klqev.api.infobip.com";
    $api_key = "15a8a97168327ed0ccda2e1926a4527e-63e38cb1-acbb-4984-9735-f2914160fb53"; // Replace with your API key

    // Set up Infobip configuration
    $configuration = new Configuration(host: $base_url, apiKey: $api_key);
    $api = new SmsApi(config: $configuration);

    // Create SMS destination and message
    $destination = new SmsDestination(to: $number);
    $message = new SmsTextualMessage(
        destinations: [$destination],
        text: $message,
        from: "UCYP Barber Service"
    );

    // Send SMS using Infobip
    $request = new SmsAdvancedTextualRequest(messages: [$message]);
    $response = $api->sendSmsMessage($request);
    
    return $response;
}

function scheduleReminder($appointment) {
    global $conn; // Ensure the database connection is available

    // Calculate the reminder date 10 minutes before the appointment
    $reminderDate = date('Y-m-d H:i:s', strtotime($appointment['date'] . ' ' . $appointment['time'] . ' -10 minutes'));

    // Prepare to save the reminder to the database
    $sql = "INSERT INTO reminders (fullname, phoneNumber, reminderDate, message, sms_sent) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Set the message for the reminder
    $phoneNumber = $appointment['phoneNumber'];
    $message = "Reminder: You have an appointment for a " . $appointment['haircut'] . " haircut on " . $appointment['date'] . " at " . $appointment['time'];

    // Default sms_sent value is 0 (not sent)
    $smsSent = 0;

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssi", $appointment['fullname'], $phoneNumber, $reminderDate, $message, $smsSent);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Function to check and send reminders
function sendPendingReminders() {
    global $conn;

    // Fetch reminders that are due and haven't been sent
    $currentDate = date('Y-m-d H:i:s');
    $sql = "SELECT phoneNumber, reminderDate, message FROM reminders WHERE reminderDate <= ? AND sms_sent = 0";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $currentDate);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Send SMS for each pending reminder
    while ($row = mysqli_fetch_assoc($result)) {
        $phoneNumber = $row['phoneNumber'];
        $reminderDate = $row['reminderDate'];
        $message = $row['message'];

        // Send SMS
        sendSms($phoneNumber, $message);

        // Mark the reminder as sent using phoneNumber and reminderDate
        $updateSql = "UPDATE reminders SET sms_sent = 1 WHERE phoneNumber = ? AND reminderDate = ?";
        $updateStmt = mysqli_prepare($conn, $updateSql);
        mysqli_stmt_bind_param($updateStmt, "ss", $phoneNumber, $reminderDate);
        mysqli_stmt_execute($updateStmt);
        mysqli_stmt_close($updateStmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}
?>
