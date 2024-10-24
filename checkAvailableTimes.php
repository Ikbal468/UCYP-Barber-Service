<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$db = 'ucypbarberservice'; // Your database name
$user = 'root'; // Your database username
$password = ''; // Your database password

$conn = mysqli_connect($host, $user, $password, $db);

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['selectedDate'])) {
    $selectedDate = mysqli_real_escape_string($conn, $_POST['selectedDate']);
    
    // Query to get already booked time slots for the selected date
    $sql = "SELECT time FROM studentbooking WHERE date = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $selectedDate);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $bookedTimes = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // Convert the booked time to 24-hour format if needed
        $time24 = date("H:i", strtotime($row['time']));
        $bookedTimes[] = $time24;
    }

    // Debug: Print booked times to ensure the query works
    error_log("Booked times: " . print_r($bookedTimes, true));

    // All available time slots
    $allTimes = [
        "12:30" => "12:30 PM", // Adding for testing
        "18:00" => "6:00 PM", 
        "19:00" => "7:00 PM", 
        "20:00" => "8:00 PM", 
        "21:00" => "9:00 PM", 
        "22:00" => "10:00 PM"
    ];

    // Filter out booked times
    $availableTimes = array_diff_key($allTimes, array_flip($bookedTimes));

    // Debug: Print available times to ensure filtering works
    error_log("Available times: " . print_r($availableTimes, true));

    // Return available time slots as JSON
    echo json_encode($availableTimes);
}

mysqli_close($conn);
?>
