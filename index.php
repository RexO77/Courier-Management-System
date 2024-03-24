<?php

require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $qry = "SELECT * FROM `login` WHERE `email`='$email' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
?>
        <script>
            alert("Oops! Please enter your Username and Password again!");
            window.open('index.php', '_self');
        </script> <?php
                } else {
                    $data = mysqli_fetch_assoc($run);
                    $id = $data['u_id'];    //fetch id value of user
                    $email = $data['email'];
                    $_SESSION['uid'] = $id;   //now we can use it until session destroy
                    $_SESSION['emm'] = $email;
                    ?>
        <script>
            alert("Welcome!");
            window.open('home/home.php', '_self');
            // changes made here
        </script> <?php

                }
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/login.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 60px;
            width: 50%;
        }

        .card {
            background-color: rgba(169, 169, 169, 0.5);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #333;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .form-group label {
            color: #333;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .error-message {
            color: #e84118;
            text-align: center;
            margin-top: 10px;
        }

        a {
            color: #fff;
            text-decoration: none;
        }

        a:hover {
            color: #f8f9fa;
        }

        h1 {
            color: #000;
            text-align: center;
            font-weight: bold;
            font-size: 36px;
            margin-bottom: 10px;
            margin-top: 50px;
        }

        .admin-login-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            border: 2px solid #000;
            color: #000;
            border-radius: 10px;
            padding: 8px 16px;
            background-color: transparent;
            font-weight: bold;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }

        .admin-login-btn:hover {
            background-color: #000;
            color: #fff;
        }

        .login-heading {
            font-weight: bold;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .login-text {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
<h1>RAPID COURIER SERVICE</h1>
<p align='center' style="font-weight: bold; color: #f39c12; margin-bottom: 20px;">IN SPEED WE TRUST.</p>
<a href="admin/adminlogin.php" class="admin-login-btn">Admin Login</a>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h2 class="card-title login-heading">Login</h2>
                <p class="login-text">Please fill in your credentials ⮯⮯</p>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter username/emailId" required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary" value="Sign In" />
                    </div>
                    <p class="error-message">Don't have an account?⮞➤ <a href="register.php" style="color: #007bff;">Register here</a>.</p>
</form>
<form action="resetpswd.php" method="get">
<div class="form-group">
<button type="submit" class="btn btn-danger">Reset Password</button>
</div>
</form>
</div>
</div>
</div>
</div>
</body>
</html>
