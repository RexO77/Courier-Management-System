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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        :root {
            --primary-color: #7f7fd5;
            --secondary-color: #86a8e7;
            --text-dark: #2D3748;
            --text-light: #4A5568;
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
        }

        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg,
                rgba(255, 255, 255, 0.95) 0%,
                rgba(255, 255, 255, 0.97) 100%);
            padding: 80px 0;
            overflow: hidden;
        }

        .hero-content {
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
        }

        .hero-content p {
            font-size: 20px;
            color: var(--text-light);
            margin-bottom: 30px;
            animation: fadeInUp 1.2s ease;
        }

        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
            animation: fadeInUp 1.4s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 8px;
            transition: transform 0.3s ease;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            background: var(--primary-color);
            color: var(--white);
            transform: translateY(-2px);
        }

        .features-section {
            padding: 80px 0;
            background: linear-gradient(135deg, rgba(127, 127, 213, 0.1), rgba(134, 168, 231, 0.1));
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 36px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 20px;
        }

        .feature-item {
            background: var(--white);
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
            height: 100%;
        }

        .feature-item:hover {
            transform: translateY(-10px);
        }

        .stats-section {
            padding: 80px 0;
            background: var(--white);
        }

        .stat-item {
            text-align: center;
            padding: 20px;
        }

        .stat-number {
            font-size: 48px;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 18px;
            color: var(--text-light);
        }

        .footer {
            background-color: var(--text-dark);
            color: var(--white);
            padding: 40px 0;
            text-align: center;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 32px;
            }
            .hero-content p {
                font-size: 16px;
            }
            .cta-buttons {
                flex-direction: column;
            }
            .stat-number {
                font-size: 36px;
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
                <p>Fast, reliable, and secure courier services at your fingertips. Join thousands of satisfied customers who trust us with their deliveries.</p>
                <div class="cta-buttons">
                    <a href="courierMenu.php" class="btn btn-primary">Send Package</a>
                    <a href="trackMenu.php" class="btn btn-outline">Track Shipment</a>
                </div>
                <img src="../images/8309.png" alt="Rapid Courier Service" class="hero-image" style="max-width: 600px; width: 100%; margin-top: 30px;">
            </div>
        </div>
    </section>

    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">5000+</div>
                        <div class="stat-label">Deliveries Completed</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">On-Time Delivery</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Cities Covered</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-item">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Customer Support</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features-section">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose Rapid Courier?</h2>
                <p>Experience the difference with our premium courier services</p>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-item">
                        <img src="../images/fcrm.png" alt="Fast Delivery" width="80">
                        <h5>Lightning Fast Delivery</h5>
                        <p>Experience rapid delivery times with our optimized logistics network and dedicated couriers.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-item">
                        <img src="../images/tracking.png" alt="Real-Time Tracking" width="80">
                        <h5>Real-Time Tracking</h5>
                        <p>Track your packages in real-time with our advanced GPS tracking system and instant updates.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-item">
                        <img src="../images/secure.png" alt="Secure Handling" width="80">
                        <h5>Secure Handling</h5>
                        <p>Your packages are handled with utmost care and protected with comprehensive insurance coverage.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p>&copy; <?php echo date("Y"); ?> Rapid Courier Service. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



