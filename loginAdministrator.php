<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login Form</title>
    <link rel="stylesheet" href="css/style5.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body style="background: url('images/UCYP U Barber Service4.png') no-repeat center center fixed; background-size: cover;">
    <div class="wrapper">
        <form action="#" method="post">
            <h1>Administrator Login</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#" onclick="forgotPasswordAlert()">Forgot password?</a>
            </div>

            <script>
            function forgotPasswordAlert() {
                alert("If you forgot your password, please consult the IT Team at 01125486248.");
            }
            </script>
            
            <button type="submit" name="login" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>

        <?php
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Check if username and password are correct
            if ($username == 'admin' && $password == 'admin') {
                // Redirect to administrator.php
                header("Location: administrator.php");
                exit();
            } else {
                echo "<script>alert('Invalid Username or Password');</script>";
            }
        }
        ?>
    </div>
</body>
</html>
