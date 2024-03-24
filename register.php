<?php
require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

    $fullname = $_POST['name'];
    $phn = $_POST['ph'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {

        $qry = "INSERT INTO `users` (`email`, `name`, `pnumber`) VALUES ('$email', '$fullname', '$phn')";
        $run = mysqli_query($dbcon, $qry);

        if ($run == true) {

            $psqry = "INSERT INTO `login` (`email`, `password`, `u_id`) VALUES ('$email', '$password',LAST_INSERT_ID() )";
            $psrun = mysqli_query($dbcon, $psqry);
        ?>
            <script>
                alert('Registration Successful :)');
                window.open('index.php', '_self');
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('Password mismatch!');
        </script>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('images/brr2.jpg');
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
            background-color: rgba(169, 169, 169, 0.7);
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

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
            width: 100%;
            padding: 10px;
            border-radius: 10px;
            margin-top: 20px;
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

        p {
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h2 class="card-title">Register</h2>
                    <p>Please fill this form to create an account.</p>
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="ph" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-danger" value="Register">
                        </div>
                        <p>Already have an account? <a href="index.php" style="color: #dc3545;">Login here</a>.</p>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <p>Notice: If the Email-Id is registered before, it will not respond.</p>
        <p>In this case, reset your password or register with different Email-Id.</p>
    </div>
</body>

</html>
