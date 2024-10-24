<!DOCTYPE html>
<html>
<body>

<script>
function showAlert(message) {
    alert(message);
}
</script>

<?php

require __DIR__ . "/vendor/autoload.php"; // Load Composer dependencies

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include SMS sending function
include_once 'send.php';

$host = 'localhost';
$db = 'ucypbarberservice'; // Replace with your database name
$user = 'root'; // Replace with your database username
$password = ''; // Replace with your database password

$conn = mysqli_connect($host, $user, $password, $db);

if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$searchData = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['register'])) {
        // Registration process
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($password !== $confirmPassword) {
            echo "<script>alert('Passwords do not match.'); window.location.href='registerBarber.php';</script>";
            exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare an INSERT statement
        $sql = "INSERT INTO studentregister (fullname, username, email, phoneNumber, password, confirmPassword) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $username, $email, $phoneNumber, $password, $confirmPassword);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            header("Location: loginBarber.php");
            exit;
        } else {
            echo "ERROR: Could not execute query. " . mysqli_error($conn);
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    elseif (isset($_POST['login'])) {
        // Login process
        session_start();
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = $_POST['password'];

            $sql = "SELECT * FROM studentregister WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $storedPassword = $row['password'];

                    if ($password === $storedPassword) {
                        $_SESSION['fullname'] = $row['fullname'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['phoneNumber'] = $row['phoneNumber']; // Set phone number during login

                        header("Location: index.php");
                        exit;
                    } else {
                        echo "<script>alert('Invalid password'); window.location.href='loginBarber.php';</script>";
                        exit;
                    }
                } else {
                    echo "<script>alert('Invalid username'); window.location.href='loginBarber.php';</script>";
                    exit;
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        } else {
            echo "Username and password must be provided.";
        }
    }

    // Check if the form was submitted for feedback
    elseif (isset($_POST['submitFeedback'])) {
        // Ensure that the session variable 'fullname' is set
        session_start();
        if (isset($_SESSION['fullname'])) {
            $fullname = $_SESSION['fullname'];
            $feedback = $_POST['feedback'];

            // Prepare an INSERT statement for feedback
            $sql = "INSERT INTO studentfeedback (fullname, feedback) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $sql);

            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $fullname, $feedback);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Feedback submitted successfully.'); window.location.href='index.php';</script>";
            } else {
                echo "ERROR: Could not execute query. " . mysqli_error($conn);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('You must be logged in to submit feedback.'); window.location.href='loginBarber.php';</script>";
        }
    }
    
    elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['bookAppointment'])) {
            session_start();

            // Collect form data for booking
            $_SESSION['appointmentData'] = [
                'fullname' => mysqli_real_escape_string($conn, $_POST['bb-name']),
                'phoneNumber' => mysqli_real_escape_string($conn, $_POST['bb-phone']),
                'email' => mysqli_real_escape_string($conn, $_POST['bb-email']),
                'time' => date("h:i A", strtotime($_POST['bb-time'])), // Convert to 12-hour format with AM/PM
                'date' => mysqli_real_escape_string($conn, $_POST['bb-date']),
                'haircut' => mysqli_real_escape_string($conn, $_POST['bb-haircut']),
                'comment' => mysqli_real_escape_string($conn, $_POST['bb-message']),
            ];
    
            // Redirect to payment page
            echo "<script>window.location.href='payment.php';</script>";
        }

        if (isset($_POST['buyProduct'])) {
            session_start();

            // Collect form data for product purchase
            $_SESSION['productData'] = [
                'fullname' => $_POST['fullname'],
                'productname' => $_POST['productname'],
                'price' => $_POST['price'],
                'quantity' => $_POST['quantity'],
                'totalprice' => $_POST['price'] * $_POST['quantity'],
            ];
    
            // Redirect to payment page
            echo "<script>window.location.href='payment.php';</script>";
        }

        if (isset($_FILES['receipt']) && isset($_POST['payment-method'])) {
            session_start();

            // Payment process
            $paymentType = $_POST['payment-method'];
    
            // Ensure the uploads directory exists
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
    
            // Generate a unique file name for the receipt
            $fileName = uniqid() . '_' . basename($_FILES['receipt']['name']);
            $filePath = $uploadDir . $fileName;
    
            // Move the uploaded file
            if (move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath)) {
                $fullname = $_SESSION['fullname']; // Ensure user is logged in
    
                // Save payment details to database
                $sql = "INSERT INTO studentpayment (fullname, paymentType, receipt) VALUES (?, ?, ?)";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($stmt, "sss", $fullname, $paymentType, $filePath);
    
                if (mysqli_stmt_execute($stmt)) {
                    // Check if there was a booking appointment or product purchase
                    if (isset($_SESSION['appointmentData'])) {
                        // Insert appointment data after successful payment
                        $appointment = $_SESSION['appointmentData'];
                        $sql = "INSERT INTO studentbooking (fullname, phoneNumber, email, time, date, haircut, comment)
                                VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "sssssss", $appointment['fullname'], $appointment['phoneNumber'], 
                            $appointment['email'], $appointment['time'], $appointment['date'], 
                            $appointment['haircut'], $appointment['comment']);
                        mysqli_stmt_execute($stmt);

                        // Send SMS notification for appointment booking
                        $phoneNumber = $appointment['phoneNumber'];
                        $message = "Booking Confirmed: You have an appointment on " . $appointment['date'] . " at " . 
                                $appointment['time'] . " for a " . $appointment['haircut'] . " haircut.";
                        sendSms($phoneNumber, $message);  // Sending SMS after 
                        
                        // Schedule a reminder for the appointment
                        scheduleReminder($appointment);
                    }
    
                    if (isset($_SESSION['productData'])) {
                        // Insert product purchase data after successful payment
                        $product = $_SESSION['productData'];
                        $sql = "INSERT INTO studentproduct (fullname, productname, price, quantity, totalprice)
                                VALUES (?, ?, ?, ?, ?)";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "ssiii", $product['fullname'], $product['productname'], 
                            $product['price'], $product['quantity'], $product['totalprice']);
                        mysqli_stmt_execute($stmt);

                        // Send SMS notification for product purchase
                        $phoneNumber = $_SESSION['phoneNumber']; // Use logged-in user's phone number from session
                        $message = "Purchase Confirmed: You have purchased " . $product['quantity'] . " of " . 
                                $product['productname'] . " for a total of RM" . $product['totalprice'] . ".";
                        sendSms($phoneNumber, $message);  // Sending SMS after payment
                    }
    
                    // Clear session data after successful payment and data insertion
                    unset($_SESSION['appointmentData'], $_SESSION['productData']);
    
                    echo "<script>alert('Payment successful.'); window.location.href='index.php';</script>";
                } else {
                    echo "ERROR: Could not execute query. " . mysqli_error($conn);
                }
    
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>alert('File upload failed.'); window.location.href='payment.php';</script>";
            }
        }
    }

}

mysqli_close($conn);
?>
</body>
</html>
