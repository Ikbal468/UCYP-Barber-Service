<?php
session_start();
include 'connect.php';

// Check for session messages
if (isset($_SESSION['message'])) {
    echo "<script>alert('{$_SESSION['message']}');</script>";
    unset($_SESSION['message']); // Clear the message after displaying it
}

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UCYP Barber Service Admin</title>
    <link rel="stylesheet" href="css/adminstyle.css">
    <style>
        /* Style for the logout button */
        .logout-btn {
            float: right;
            margin-top: -40px;
            padding: 10px 20px;
            background-color: #ff4b5c;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background-color: #ff2a3a;
        }
    </style>
</head>
<body>
    <header>
        <h1>UCYP University Barber Service Administrator Panel</h1>
        <!-- Log Out button -->
        <a href="loginAdministrator.php" class="logout-btn">Log Out</a>
    </header>
    <nav>
        <ul>
            <li><a href="#user-accounts">Manage User Accounts</a></li>
            <li><a href="#booking-management">Manage Booking Haircuts</a></li>
            <li><a href="#product-management">Manage Product Purchases</a></li>
            <li><a href="#payment-management">Manage Payment</a></li>
            <li><a href="#feedback-analysis">Feedback Analysis</a></li>
            <li><a href="#appointment-reminders">Manage Appointment Reminders</a></li>
        </ul>
    </nav>
    <main>
        <section id="user-accounts">
            <h2>User Account Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Password</th>
                        <th>Confirm Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT fullname, username, email, phoneNumber, password, confirmPassword FROM studentregister";
                    $result = mysqli_query($conn, $query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $fullname = $row['fullname'];
                            echo "<tr>
                                    <td>{$row['fullname']}</td>
                                    <td>{$row['username']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['phoneNumber']}</td>
                                    <td>{$row['password']}</td>
                                    <td>{$row['confirmPassword']}</td>
                                    <td>
                                        <a href='editaccount.php?fullname={$fullname}'>Edit</a> | 
                                        <a href='delete.php?fullname={$fullname}' onclick='return confirm(\"Are you sure you want to delete this account?\");'>Delete</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No user accounts found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>


        <section id="booking-management">
            <h2>Booking Haircuts Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Time</th>
                        <th>Date</th>
                        <th>Haircut</th>
                        <th>Comment</th>
                        <th>Booking Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT fullname, phoneNumber, email, time, date, haircut, comment, bookingdate FROM studentbooking";
                    $result = mysqli_query($conn, $query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $bookingdate = $row['bookingdate'];
                            echo "<tr>
                                    <td>{$row['fullname']}</td>
                                    <td>{$row['phoneNumber']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['time']}</td>
                                    <td>{$row['date']}</td>
                                    <td>{$row['haircut']}</td>
                                    <td>{$row['comment']}</td>
                                    <td>{$row['bookingdate']}</td>
                                    <td>
                                        <a href='delete.php?bookingdate={$bookingdate}' onclick='return confirm(\"Are you sure you want to delete this user booking?\");'>Delete</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No bookings found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>


        <section id="product-management">
            <h2>Product Purchases Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Purchase Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query to fetch data from the studentproduct table
                    $query = "SELECT fullname, productname, price, quantity, totalprice, purchasedate FROM studentproduct";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $purchasedate = $row['purchasedate'];
                            echo "<tr>
                                    <td>{$row['fullname']}</td>
                                    <td>{$row['productname']}</td>
                                    <td>{$row['price']}</td>
                                    <td>{$row['quantity']}</td>
                                    <td>{$row['totalprice']}</td>
                                    <td>{$row['purchasedate']}</td>
                                    <td>
                                        <a href='delete.php?purchasedate={$purchasedate}' onclick='return confirm(\"Are you sure you want to delete this user purchase product?\");'>Delete</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No product purchases found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>


        <section id="payment-management">
            <h2>Payment Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Payment Type</th>
                        <th>Receipt</th>
                        <th>Upload Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query to fetch data from the studentpayment table
                    $query = "SELECT fullname, paymentType, receipt, uploaddate FROM studentpayment";
                    $result = mysqli_query($conn, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $uploaddate = $row['uploaddate'];
                            // Display receipt as a downloadable link
                            $receiptLink = '<a href="data:application/pdf;base64,' . base64_encode($row['receipt']) . '" download="receipt.pdf">Download Receipt</a>';
                            
                            echo "<tr>
                                    <td>{$row['fullname']}</td>
                                    <td>{$row['paymentType']}</td>
                                    <td>{$receiptLink}</td>
                                    <td>{$row['uploaddate']}</td>
                                    <td>
                                        <a href='delete.php?uploaddate={$uploaddate}' onclick='return confirm(\"Are you sure you want to delete this user payment?\");'>Delete</a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No payments found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>


        <section id="feedback-analysis">
            <h2>Feedback Analysis</h2>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Feedback</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if connection is still open
                    if ($conn) {
                        // Query to fetch data from the studentfeedback table
                        $query = "SELECT fullname, feedback FROM studentfeedback";
                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $feedback = $row['feedback'];
                                echo "<tr>
                                        <td>{$row['fullname']}</td>
                                        <td>{$row['feedback']}</td>
                                        <td>
                                        <a href='delete.php?feedback={$feedback}' onclick='return confirm(\"Are you sure you want to delete this user feeback?\");'>Delete</a>
                                    </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>No feedback found.</td></tr>";
                        }


                    } else {
                        echo "<tr><td colspan='2'>Database connection error.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>


        <section id="appointment-reminders">
            <h2>Appointment Reminders Management</h2>
            <table>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Reminder Date</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if connection is still open
                    if ($conn) {
                        // Query to fetch data from the reminders table
                        $query = "SELECT fullname, phoneNumber, reminderDate, message, sms_sent FROM reminders";
                        $result = mysqli_query($conn, $query);

                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Determine if the SMS has been sent
                                $smsStatus = $row['sms_sent'] ? "Sent" : "Not Sent";

                                echo "<tr>
                                        <td>{$row['fullname']}</td>
                                        <td>{$row['phoneNumber']}</td>
                                        <td>{$row['reminderDate']}</td>
                                        <td>{$row['message']}</td>
                                        <td>
                                            <a href='delete.php?reminderDate={$row['reminderDate']}' onclick='return confirm(\"Are you sure you want to delete this reminder?\");'>Delete</a> | 
                                            <span>$smsStatus</span>
                                        </td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No reminders found.</td></tr>";
                        }

                        // Close connection after query
                        mysqli_close($conn);
                    } else {
                        echo "<tr><td colspan='4'>Database connection error.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>


    </main>
    <footer>
        <p>&copy; 2024 UCYP University Barber Service</p>
    </footer>
</body>
</html>
