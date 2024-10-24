<?php
session_start();
include 'connect.php'; // Include your database connection file

ini_set('display_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$db = 'ucypbarberservice'; // Replace with your database name
$user = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

$conn = mysqli_connect($host, $user, $password, $db);

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Check if the username is set in the URL
if (isset($_GET['fullname'])) {
    $fullname = mysqli_real_escape_string($conn, $_GET['fullname']);
    
    // Prepare the delete query
    $query = "DELETE FROM studentregister WHERE fullname='$fullname'";
    
    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Success message
        $_SESSION['message'] = "User account deleted successfully.";
    } else {
        // Error message
        $_SESSION['message'] = "Error deleting account: " . mysqli_error($conn);
    }
}

if (isset($_GET['bookingdate'])) {
    $bookingdate = mysqli_real_escape_string($conn, $_GET['bookingdate']);
    
    // Prepare the delete query
    $query = "DELETE FROM studentbooking WHERE bookingdate='$bookingdate'";
    
    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Success message
        $_SESSION['message'] = "User booking deleted successfully.";
    } else {
        // Error message
        $_SESSION['message'] = "Error deleting booking: " . mysqli_error($conn);
    }
}

if (isset($_GET['uploaddate'])) {
    $uploaddate = mysqli_real_escape_string($conn, $_GET['uploaddate']);
    
    // Prepare the delete query
    $query = "DELETE FROM studentpayment WHERE uploaddate='$uploaddate'";
    
    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Success message
        $_SESSION['message'] = "User payment deleted successfully.";
    } else {
        // Error message
        $_SESSION['message'] = "Error deleting payment: " . mysqli_error($conn);
    }
}

if (isset($_GET['purchasedate'])) {
    $purchasedate = mysqli_real_escape_string($conn, $_GET['purchasedate']);
    
    // Prepare the delete query
    $query = "DELETE FROM studentproduct WHERE purchasedate='$purchasedate'";
    
    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Success message
        $_SESSION['message'] = "User purchase product deleted successfully.";
    } else {
        // Error message
        $_SESSION['message'] = "Error deleting purchase product: " . mysqli_error($conn);
    }
}

if (isset($_GET['feedback'])) {
    $feedback = mysqli_real_escape_string($conn, $_GET['feedback']);
    
    // Prepare the delete query
    $query = "DELETE FROM studentfeedback WHERE feedback='$feedback'";
    
    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Success message
        $_SESSION['message'] = "User feedback deleted successfully.";
    } else {
        // Error message
        $_SESSION['message'] = "Error deleting feedback: " . mysqli_error($conn);
    }
}

if (isset($_GET['reminderDate'])) {
    $reminderDate = mysqli_real_escape_string($conn, $_GET['reminderDate']);
    
    // Prepare the delete query
    $query = "DELETE FROM reminders WHERE reminderDate='$reminderDate'";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        // Success message
        $_SESSION['message'] = "Appointment reminder deleted successfully.";
    } else {
        // Error message
        $_SESSION['message'] = "Error deleting appointment reminder: " . mysqli_error($conn);
    }
}

// Redirect back to the admin panel
header("Location: administrator.php");
exit();
?>
