<?php
session_start();
if (isset($_SESSION['uid'])) {
    header('location: dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 400px;
            padding: 40px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
        }

        h1 {
            text-align: center;
            color: #333333;
            font-size: 32px;
            margin-bottom: 10px;
        }

        h6 {
            text-align: center;
            color: #666666;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        form {
            text-align: center;
        }

        table {
            margin: auto;
        }

        input[type="email"],
        input[type="password"] {
            width: 250px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #999999;
            margin-bottom: 20px;
            outline: none;
        }

        input[type="submit"] {
            background-color: #333333;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #1a1a1a;
        }

        a {
            float: right;
            margin-right: 20px;
            color: #333333;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        a:hover {
            color: #1a1a1a;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Admin Login</h1>
        <h6>Login as an Admin.</h6>
        <form action="adminlogin.php" method="POST">
            <table>
                <tr>
                    <td>Email-ID:</td>
                    <td><input type="email" name="uname" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="pass" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
                </tr>
            </table>
        </form>
        <a href="../index.php">Back to home</a>
    </div>
</body>

</html>

<?php
include('../dbconnection.php');
if (isset($_POST['login'])) {
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
?>
        <script>
            alert("Only admin can login..");
            window.open('adminlogin.php', '_self');
        </script>
<?php
    } else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
    }
}
?>
