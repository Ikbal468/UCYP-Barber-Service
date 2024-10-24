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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $current_fullname = mysqli_real_escape_string($conn, $_POST['current_fullname']); // Capture current fullname
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    
    // Initialize password update variables
    $password = !empty($_POST['password']) ? $_POST['password'] : null;
    $confirmPassword = !empty($_POST['confirmPassword']) ? $_POST['confirmPassword'] : null;

    // If a new password is provided, check for matching passwords
    if ($password !== null && $password !== '' && $password === $confirmPassword) {
        // Use the plain password directly in the update query
        $query = "UPDATE studentregister SET fullname='$fullname', username='$username', email='$email', phoneNumber='$phoneNumber', password='$password', confirmPassword='$confirmPassword' WHERE fullname='$current_fullname'";
    } elseif ($password !== null && $password !== $confirmPassword) {
        // Passwords do not match
        $_SESSION['message'] = "Passwords do not match. Please try again.";
        header("Location: administrator.php?fullname=" . urlencode($current_fullname));
        exit();
    } else {
        // If no new password is set, don't update the password
        $query = "UPDATE studentregister SET fullname='$fullname', username='$username', email='$email', phoneNumber='$phoneNumber' WHERE fullname='$current_fullname'";
    }

    // Execute the update query
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "User information updated successfully.";
    } else {
        $_SESSION['message'] = "Error updating user information: " . mysqli_error($conn);
    }

    // Redirect back to the admin panel
    header("Location: administrator.php");
    exit();
} else {
    $_SESSION['message'] = "Invalid request.";
    header("Location: administrator.php");
    exit();
}
?>
