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
        echo "<script>alert('Oops! Please enter your Username and Password again!'); window.open('index.php', '_self');</script>";
    } else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['u_id'];
        $email = $data['email'];
        $_SESSION['uid'] = $id;
        $_SESSION['emm'] = $email;

        echo "<script>alert('Welcome!'); window.open('home/home.php', '_self');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #7f7fd5;
            --secondary-color: #86a8e7;
            --text-color: #2D3748;
            --error-color: #e84118;
            --white: #FFFFFF;
            --light-gray: #F7FAFC;
            --border-color: #E2E8F0;
            --accent-color: #3182CE;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: var(--light-gray);
            overflow: hidden;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            width: 90%;
            max-width: 1200px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            overflow: hidden;
        }

        /* Left section (form) */
        .form-container {
            background-color: var(--white);
            flex: 1 1 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 40px;
            box-sizing: border-box;
        }

        .logo {
            margin-bottom: 30px;
        }

        .logo img {
            width: 60px;
        }

        h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-color);
        }

        p {
            font-size: 14px;
            color: var(--text-color);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--text-color);
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            font-size: 14px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            outline: none;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: var(--accent-color);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
        }

        .forgot-password {
            display: block;
            text-align: right;
            margin-top: 10px;
            color: var(--accent-color);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .register {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: var(--text-color);
        }

        .register a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 600;
        }

        .register a:hover {
            text-decoration: underline;
        }

        /* Right section (design) */
        .design-container {
            flex: 1 1 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .design-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .form-container, .design-container {
                flex: 1 1 100%;
            }

            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left section (login form) -->
        <div class="form-container">
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
            </div>
            <h2>Welcome Back!</h2>
            <p>Enter your email and password to log in.</p>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <button type="submit" name="submit" class="btn-primary">Log In</button>
                <a href="resetpswd.php" class="forgot-password">Forgot Password?</a>
            </form>
            <div class="register">
                Don't have an account? <a href="register.php">Register here</a>.
            </div>
        </div>

        <!-- Right section (design) -->
        <div class="design-container">
            <img src="images/login.jpg" alt="Design">
        </div>
    </div>
</body>
</html>
