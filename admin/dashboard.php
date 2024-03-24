<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
}
?>

<?php
include('head.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-image: url('ad(1).jpg');
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .admin-header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .admin-header a {
            margin-left: 10px;
            padding: 5px 10px;
            border: 2px solid #ffffff;
            border-radius: 10px;
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .admin-header a:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .welcome-message {
            color: #ffffff;
            font-size: 28px;
            text-align: center;
            margin-top: 50px;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .admin-options {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 50px;
        }

        .admin-option {
            background-color: rgba(255, 255, 255, 0.8);
            border: 2px solid #000000;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .admin-option:hover {
            transform: scale(1.05);
        }

        .admin-option a {
            text-decoration: none;
            color: #333333;
            font-weight: bold;
            font-size: 18px;
        }

        .option1 {
            background-color: #ff9f43;
        }

        .option2 {
            background-color: #48dbfb;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="welcome-message">Welcome to Admin Dashboard</h1>
        <div class="admin-header">
            <a href="../index.php">Login as user</a>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="admin-options">
        <div class="admin-option option1">
            <a href="deleteusers.php">Delete Users</a>
        </div>
        <div class="admin-option option2">
            <a href="deletedata.php">Delete Data</a>
        </div>
    </div>
</body>

</html>
