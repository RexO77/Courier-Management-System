<?php

session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color:#6420AA; /* Dark blue background color */
            color: #FF3EA5; /* Light text color */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .image-container {
            flex: 1;
            max-width: 40%;
            border-radius: 20px;
            overflow: hidden;
            margin-right: 20px;
        }

        .image-container img {
            width: 100%;
            border-radius: 20px;
        }

        .text-container {
            flex: 1;
            max-width: 50%;
            text-align: left; /* Left align the text */
        }

        h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 10px; /* Adjust spacing */
            color: #6420AA; /* Light green text color */
            animation: fadeInUp 1s ease forwards;
        }

        h2 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 20px; /* Adjust spacing */
            color: #FF3EA5; /* Dark blue text color */
            animation: fadeInUp 1.2s ease forwards;
        }

        h4 {
            font-size: 20px; /* Decrease font size */
            margin-bottom: 30px; /* Adjust spacing */
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 16px 32px;
            background-color: #FF7ED4; /* Orange button color */
            color: #FF7ED4; /* Light text color */
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            border: 2px solid #000000; /* Add black border */
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #FF7ED4; /* Darker orange button color on hover */
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <header>
        <?php include('header.php'); ?>
    </header>

    <div class="container">
        <div class="image-container">
            <img src="../images/8309.png" alt="Image" style="width: 100%;">
        </div>
        <div class="text-container">
            <h1><b>Experience Lightning-Fast Delivery</b></h1>
            <h2>Where Speed Meets Reliability</h2>
            <h4><small>Discover the ultimate courier management service that guarantees timely deliveries every time. Trust us with your packages, and we'll ensure they reach their destination swiftly and securely.</small></h4>
            <h4><small>Why choose us?</small></h4>
            <ul>
                <li>Fast and reliable delivery service</li>
                <li>Secure handling of packages</li>
                <li>Real-time tracking system for your shipments</li>
                <li>Flexible delivery options to suit your needs</li>
                <li>Competitive pricing with no hidden fees</li>
            </ul>
            <p><small>Ready to experience hassle-free courier services? Get started now!</small></p>
            <a href="courierMenu.php" class="btn" style="border: 2px solid #000000;">Get Started</a>
        </div>
    </div>
</body>
</html>



