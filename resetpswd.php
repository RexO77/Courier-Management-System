<?php
session_start();
require_once "dbconnection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
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
            --tertiary-color: #91eae4;
            --text-color: #2D3748;
            --light-gray: #F7FAFC;
            --border-color: #E2E8F0;
            --white: #FFFFFF;
            --accent-color: #3182CE;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, rgba(127,127,213,0.1) 0%, rgba(134,168,231,0.1) 50%, rgba(145,234,228,0.1) 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .resetpswd-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 80px);
            padding: 20px;
            text-align: center;
        }

        .resetpswd-card {
            background: var(--white);
            color: var(--text-color);
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            transition: transform 0.3s ease;
        }

        .resetpswd-card:hover {
            transform: translateY(-5px);
        }

        .resetpswd-card h2 {
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: 700;
        }

        .resetpswd-card p {
            margin-bottom: 30px;
            font-size: 16px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            font-size: 14px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
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
            padding: 12px 20px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: 600;
            margin-top: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
        }

        .back-link {
            margin-top: 20px;
            color: var(--accent-color);
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .resetpswd-card {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="resetpswd-container">
        <div class="resetpswd-card">
            <h2>Forgot Your Password?</h2>
            <p>No worries! Just enter your email, and we'll help you reset it.</p>
            <form action="resetpswd.php" method="get">
                <div class="form-group">
                    <label for="email">Email-ID</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
                <button type="submit" name="submit" class="btn-primary">Verify</button>
            </form>
            <a href="index.php" class="back-link">Back to Login</a>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_GET['submit'])) {
    $email = $_GET['email'];
    $qry = "SELECT * FROM `login` WHERE `email`='$email'";
    $run = mysqli_query($dbcon, $qry);
    $row = mysqli_num_rows($run);
    if ($row < 1) {
        echo "<script>
                alert('Oops! Email not found. Try again or create a new account.');
                window.location.href='resetpswd.php';
              </script>";
    } else {
        $data = mysqli_fetch_assoc($run);
        $id = $data['u_id'];
        $_SESSION['gid'] = $id;
        echo "<script>
                window.location.href='reset.php';
              </script>";
    }
}
?>