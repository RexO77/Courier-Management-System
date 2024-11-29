<?php
require_once "dbconnection.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Sanitize inputs
    $fullname = mysqli_real_escape_string($dbcon, $_POST['name']);
    $phn = mysqli_real_escape_string($dbcon, $_POST['ph']);
    $email = mysqli_real_escape_string($dbcon, $_POST['email']);
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($dbcon, $_POST['confirm_password']);

    // Check if passwords match
    if ($password === $confirm_password) {
        // Insert user details into 'users' table
        $qry = "INSERT INTO `users` (`email`, `name`, `pnumber`) VALUES ('$email', '$fullname', '$phn')";
        if (mysqli_query($dbcon, $qry)) {
            // Insert login details into 'login' table
            $user_id = mysqli_insert_id($dbcon);
            $psqry = "INSERT INTO `login` (`email`, `password`, `u_id`) VALUES ('$email', '$password', $user_id)";
            if (mysqli_query($dbcon, $psqry)) {
                echo "<script>
                        alert('Registration Successful :)');
                        window.open('index.php', '_self');
                      </script>";
            } else {
                echo "<script>alert('Error in login data entry: " . mysqli_error($dbcon) . "');</script>";
            }
        } else {
            echo "<script>alert('Error in user data entry: " . mysqli_error($dbcon) . "');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <!-- Include your styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Include Bootstrap CSS and custom fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #7f7fd5;
            --secondary-color: #86a8e7;
            --text-color: #2D3748;
            --light-gray: #F7FAFC;
            --border-color: #E2E8F0;
            --white: #FFFFFF;
            --accent-color: #3182CE;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg,
                rgba(127, 127, 213, 0.1) 0%,
                rgba(134, 168, 231, 0.1) 50%,
                rgba(145, 234, 228, 0.1) 100%);
        }

        .container {
            display: flex;
            width: 90%;
            max-width: 1200px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            overflow: hidden;
            margin: 40px auto;
        }

        .form-container {
            background-color: var(--white);
            flex: 1 1 50%;
            padding: 40px;
            box-sizing: border-box;
            border-radius: 0 16px 16px 0;
        }

        .info-container {
            flex: 1 1 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 40px;
            border-radius: 16px 0 0 16px;
            color: var(--white);
            text-align: center;
        }

        .info-container img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 4px solid rgba(255, 255, 255, 0.3);
        }

        .info-container h2 {
            color: var(--white);
            font-size: 24px;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .info-container p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            margin-bottom: 0;
            position: relative;
            z-index: 1;
        }

        h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: var(--text-color);
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
            transition: all 0.3s ease;
        }

        .form-group input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(127, 127, 213, 0.1);
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
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(127, 127, 213, 0.4);
        }

        .login-link {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: var(--text-color);
        }

        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                margin: 20px;
                border-radius: 16px;
            }

            .form-container, 
            .info-container {
                border-radius: 16px;
            }

            .info-container {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Section -->
        <div class="info-container">
            <img src="images/Logo.jpg" alt="Courier Logo">
            <h2>Courier Management System</h2>
            <p>Handling every item like your mother does.</p>
        </div>
        <!-- Right Section -->
        <div class="form-container">
            <h2>Create an Account</h2>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                </div>
                <div class="form-group">
                    <label for="ph">Phone Number</label>
                    <input type="text" id="ph" name="ph" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
                </div>
                <button type="submit" name="submit" class="btn-primary">Register</button>
            </form>
            <div class="login-link">
                Already have an account? <a href="index.php">Log in here</a>.
            </div>
        </div>
    </div>
</body>
</html>