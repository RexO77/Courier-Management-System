<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4A90E2;    /* Professional blue */
            --secondary-color: #81B4FF;  /* Lighter blue */
            --text-color: #2D3748;      /* Dark gray for text */
            --light-gray: #F7FAFC;      /* Very light gray */
            --white: #FFFFFF;
            --accent-color: #3182CE;    /* Accent blue for buttons/interactions */
        }

        body {
            background: linear-gradient(135deg, 
                rgba(74, 144, 226, 0.1) 0%,    /* Very light primary */
                rgba(129, 180, 255, 0.2) 100%); /* Very light secondary */
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            min-height: 100vh;
            padding: 40px 0;
        }

        .mail-form {
            background-color: var(--white);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .mail-form:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(0, 0, 0, 0.08);
        }

        .mail-form h2 {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
            text-align: center;
        }

        .mail-form p {
            font-size: 16px;
            color: var(--text-color);
            opacity: 0.8;
            margin-bottom: 30px;
            text-align: center;
        }

        .form-group label {
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 12px;
            padding: 12px 20px;
            border: 2px solid var(--light-gray);
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(100, 32, 170, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .btn-primary {
            background-color: var(--accent-color);
            border: none;
            padding: 12px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(49, 130, 206, 0.2);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .mail-form {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="mail-form">
                    <h2>Get in Touch</h2>
                    <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                    
                    <form action="contactUs.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="What's this about?" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" name="message" placeholder="Tell us what's on your mind..." required></textarea>
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if (isset($_POST['send'])) {
    include('../dbconnection.php');
    //access user entered data
    $eml = $_POST['email'];
    $sub = $_POST['subject'];
    $msg = $_POST['message'];

    $qry = "INSERT INTO `contacts` (`email`, `subject`, `msg`) VALUES ('$eml', '$sub', '$msg')";
    $run = mysqli_query($dbcon, $qry);

    if ($run == true) {

    ?> <script>
            alert('Thanks, we will be looking at your concern :)');
            window.open('home.php', '_self');
        </script>
    <?php
    }
}
?>
