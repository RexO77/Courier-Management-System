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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | AMU</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #7f7fd5, #86a8e7);
            --secondary-gradient: linear-gradient(135deg, #43cea2, #185a9d);
            --text-dark: #2D3748;
            --text-light: #FFFFFF;
            --bg-light: #F7FAFC;
            --accent-color: #3182CE;
            --border-color: #E2E8F0;
            --error-color: #e84118;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: var(--bg-light);
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 1100px;
            width: 90%;
            background: var(--text-light);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
            overflow: hidden;
        }

        /* Left Section: Visual Content */
        .info-container {
            flex: 1 1 50%;
            background: var(--primary-gradient);
            color: var(--text-light);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 50px;
            text-align: center;
        }

        .info-container img {
            width: 120px;
            margin-bottom: 20px;
            animation: fadeIn 1.2s ease-in-out;
        }

        .info-container h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            animation: slideIn 1.2s ease-in-out;
        }

        .info-container p {
            font-size: 16px;
            animation: fadeIn 1.5s ease-in-out;
        }

        /* Right Section: Form */
        .form-container {
            flex: 1 1 50%;
            padding: 50px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-container h2 {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            outline: none;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 5px rgba(49, 130, 206, 0.5);
        }

        .btn-primary {
            display: block;
            width: 100%;
            background: var(--secondary-gradient);
            color: var(--text-light);
            padding: 12px 20px;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease, background 0.3s ease;
        }

        .btn-primary:hover {
            transform: scale(1.03);
            background: linear-gradient(135deg, #185a9d, #43cea2);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .login-link a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .info-container {
                flex: 1 1 100%;
                padding: 30px;
            }

            .form-container {
                flex: 1 1 100%;
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Left Section -->
        <div class="info-container">
            <img src="images/logo.png" alt="Logo">
            <h2>Welcome to AMU</h2>
            <p>Join us to capture unforgettable moments and create lifelong memories.</p>
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

