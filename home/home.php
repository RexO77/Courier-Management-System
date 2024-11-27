<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../index.php');
    exit();
}
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Rapid Courier Service</title>
    <!-- Include Bootstrap CSS and custom fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        <?php include 'style.css'; ?>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F7FAFC;
            margin: 0;
            padding: 0;
        }
        .hero-section {
            padding: 100px 0;
            text-align: center;
            background-color: #FFFFFF;
        }
        .hero-section .hero-image {
            max-width: 100%;
            height: auto;
        }
        .hero-content {
            margin-top: 40px;
        }
        .hero-content h1 {
            font-size: 48px;
            font-weight: 700;
            color: #2D3748;
        }
        .hero-content p {
            font-size: 18px;
            color: #4A5568;
            margin: 20px 0 30px;
        }
        .hero-content .btn-primary {
            background-color: #7f7fd5;
            border-color: #7f7fd5;
            font-size: 18px;
            padding: 12px 30px;
            border-radius: 8px;
        }
        .features-section {
            padding: 60px 0;
            background-color: #F7FAFC;
        }
        .features-title {
            text-align: center;
            margin-bottom: 50px;
        }
        .features-title h2 {
            font-size: 36px;
            font-weight: 700;
            color: #2D3748;
        }
        .feature-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
        }
        .feature-item img {
            width: 80px;
            height: 80px;
            object-fit: contain;
            margin-bottom: 15px;
        }
        .feature-item h5 {
            font-size: 20px;
            font-weight: 600;
            color: #2D3748;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .feature-item p {
            font-size: 16px;
            color: #4A5568;
            margin-top: 10px;
            margin-bottom: 0;
        }
        .footer {
            background-color: #2D3748;
            color: #FFFFFF;
            padding: 20px 0;
            text-align: center;
        }
        .footer p {
            margin: 0;
            font-size: 14px;
        }
        @media (max-width: 768px) {
            .hero-section {
                padding: 60px 20px;
            }
            .hero-content h1 {
                font-size: 32px;
            }
            .features-title h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>

    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Experience Lightning-Fast Delivery</h1>
                <p>Fast, reliable, and secure courier services at your fingertips.</p>
                <a href="courierMenu.php" class="btn btn-primary">Get Started</a>
            </div>
            <img src="../images/8309.png" alt="Rapid Courier Service" class="hero-image">
        </div>
    </section>

    <section class="features-section">
        <div class="container">
            <div class="features-title">
                <h2>Why Choose Us?</h2>
            </div>
            <div class="row">
                <div class="col-md-4 feature-item">
                    <img src="../images/fcrm.png" alt="Fast Delivery" width="80">
                    <h5>Fast Delivery</h5>
                    <p>Get your packages delivered in the shortest possible time.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <img src="../images/tracking.png" alt="Secure Handling" width="80">
                    <h5>Secure Handling</h5>
                    <p>Your packages are safe with our top-notch security measures.</p>
                </div>
                <div class="col-md-4 feature-item">
                    <img src="../images/secure.png" alt="Real-Time Tracking" width="80">
                    <h5>Real-Time Tracking</h5>
                    <p>Track your shipments in real-time with our advanced tracking system.</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <p>&copy; <?php echo date("Y"); ?> Rapid Courier Service. All rights reserved.</p>
    </footer>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



