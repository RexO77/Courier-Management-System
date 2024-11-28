<?php
// Start with a clean buffer
ob_start();
session_start();

// Check session and redirect if needed
if (isset($_SESSION['uid'])) {
    header('location: dashboard.php');
    exit(); // Add exit after header redirect
}

// Handle login form submission
if (isset($_POST['login'])) {
    include('../dbconnection.php');
    $ademail = $_POST['uname'];
    $password = $_POST['pass'];
    $qry = "SELECT * FROM `adlogin` WHERE `email`='$ademail' AND `password`='$password'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        $error_message = "Only admin can login..";
    } else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['a_id'];
        $_SESSION['uid'] = $id;
        header('location:dashboard.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Rapid Courier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #7f7fd5;
            --secondary-color: #86a8e7;
            --tertiary-color: #91eae4;
            --text-color: #2D3748;
            --light-gray: #F7FAFC;
            --border-color: #E2E8F0;
            --white: #FFFFFF;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,
                rgba(127, 127, 213, 0.1) 0%,
                rgba(134, 168, 231, 0.1) 50%,
                rgba(145, 234, 228, 0.1) 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .admin-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .admin-container:hover {
            transform: translateY(-5px);
        }

        .admin-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .admin-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .admin-header p {
            color: var(--text-color);
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(127, 127, 213, 0.1);
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(127, 127, 213, 0.4);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: var(--text-color);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Admin Login</h1>
            <p>Please enter your credentials to continue</p>
        </div>
        
        <form action="adminlogin.php" method="POST">
            <div class="form-group">
                <label for="uname">Email Address</label>
                <input type="email" id="uname" name="uname" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass" class="form-control" required>
            </div>
            
            <button type="submit" name="login" class="submit-btn">Login</button>
        </form>
        
        <a href="../index.php" class="back-link">← Back to home</a>
    </div>
</body>
</html>
