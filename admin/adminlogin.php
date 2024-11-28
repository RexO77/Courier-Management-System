<?php
// Start with a clean buffer
ob_start();
session_start();

// Check session and redirect if needed
if (isset($_SESSION['uid'])) {
    header('location: dashboard.php');
    exit();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #7f7fd5;
            --secondary-color: #86a8e7;
            --text-color: #E2E8F0;
            --dark-bg: #1A202C;
            --darker-bg: #171923;
            --card-bg: #2D3748;
            --border-color: #4A5568;
            --white: #FFFFFF;
            --hover-bg: #2C3444;
            --error-color: #FC8181;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,
                rgba(26, 32, 44, 0.95) 0%,
                rgba(45, 55, 72, 0.95) 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-color);
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
            border: 1px solid var(--border-color);
        }

        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .login-header .icon {
            font-size: 48px;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .login-header h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--white);
            margin: 0 0 10px 0;
        }

        .login-header p {
            color: var(--text-color);
            opacity: 0.8;
            margin: 0;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 10px;
        }

        .form-control {
            width: 100%;
            padding: 10px 12px; /* Adjusted padding */
            background: var(--darker-bg);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--white);
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(127, 127, 213, 0.25);
            outline: none;
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

        .error-message {
            background: rgba(252, 129, 129, 0.1);
            color: var(--error-color);
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <div class="icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <h1>Admin Login</h1>
            <p>Access the admin dashboard</p>
        </div>
        
        <?php if(isset($error_message)): ?>
            <div class="error-message">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="uname">Email Address</label>
                <input type="email" id="uname" name="uname" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" id="pass" name="pass" class="form-control" required>
            </div>
            
            <button type="submit" name="login" class="submit-btn">Sign In</button>
        </form>
        
        <a href="../index.php" class="back-link">
            <i class="fas fa-arrow-left"></i> Back to Home
        </a>
    </div>
</body>
</html>
