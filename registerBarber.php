<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
<link rel="stylesheet" href="css/style2.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body style="background: url('images/UCYP U Barber Service4.png') no-repeat center center fixed; background-size: cover;">
<div class="wrapper">
    <form action="connect.php" method="post">
    <h1>Registration</h1>

<div class="input-box">
    <div class="input-field">
        <input type="text" name="fullname" placeholder="Full Name" required>
        <i class='bx bxs-user'></i>
    </div>

    <div class="input-field">
        <input type="text" name="username" placeholder="Username" required>
        <i class='bx bxs-user'></i>
    </div>
</div>

<div class="input-box">
    <div class="input-field">
        <input type="text" name="email" placeholder="Email" required>
        <i class='bx bxs-envelope'></i>
    </div>

    <div class="input-field">
        <input type="text" name="phoneNumber" placeholder="Phone Number" required>
        <i class='bx bxs-phone'></i>
    </div>
</div>

<div class="input-box">
    <div class="input-field">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt'></i>
    </div>

    <div class="input-field">
        <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
        <i class='bx bxs-lock-alt'></i>
    </div>
</div>

<label><input type="checkbox">I hereby declare that the above information provided is true and correct</label>

<button type="submit" name="register" class="btn">Register</button>
</form>
</div>
</body>
</html>