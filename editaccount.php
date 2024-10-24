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

if (isset($_GET['fullname'])) {
    // Sanitize the input
    $fullname = mysqli_real_escape_string($conn, $_GET['fullname']);
    
    // Fetch user data from the database
    $query = "SELECT username, email, phoneNumber, password FROM studentregister WHERE fullname='$fullname'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        $_SESSION['message'] = "User not found.";
        header("Location: administrator.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Information</title>
    <link rel="stylesheet" href="css/adminstyle.css">
</head>
<body>
    <header>
        <h1>Edit User Information</h1>
    </header>
    <main>
        <form method="POST" action="updateaccount.php">
            <input type="hidden" name="current_fullname" value="<?php echo $fullname; ?>">

            <label for="fullname">Full Name:</label>
            <input type="text" name="fullname" id="fullname" value="<?php echo $fullname; ?>" required>

            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="<?php echo $user['username']; ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>" required>
            
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" name="phoneNumber" id="phoneNumber" value="<?php echo $user['phoneNumber']; ?>" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Leave blank to keep current password">
            
            <label for="confirmPassword">Confirm Password:</label>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Leave blank to keep current password">
            
            <button type="submit">Update User</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 UCYP University Barber Service</p>
    </footer>

</body>
</html>
