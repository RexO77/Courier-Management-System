<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
    exit();
}

include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Package</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        :root {
            --primary-color: #7f7fd5;
            --secondary-color: #86a8e7;
            --success-color: #48BB78;
            --text-color: #2D3748;
            --light-gray: #F7FAFC;
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
        }

        .tracking-container {
            width: 95%;
            max-width: 1000px;
            margin: 100px auto 20px;
            padding: 25px;
        }

        .tracking-card {
            background: var(--white);
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--light-gray);
        }

        .order-info {
            display: flex;
            gap: 20px;
        }

        .item-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }

        .tracking-status {
            margin: 30px 0;
        }

        .status-timeline {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 40px 0;
            position: relative;
        }

        .status-timeline::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 4px;
            background: var(--light-gray);
            transform: translateY(-50%);
            z-index: 1;
        }

        .status-step {
            position: relative;
            z-index: 2;
            background: var(--white);
            padding: 0 10px;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--success-color);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            margin-bottom: 8px;
        }

        .step-text {
            font-size: 14px;
            color: var(--text-color);
            text-align: center;
        }

        .delivery-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .detail-group {
            background: var(--light-gray);
            padding: 15px;
            border-radius: 8px;
        }

        .detail-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }

        .detail-value {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-color);
        }

        @media (max-width: 768px) {
            .tracking-container {
                width: 100%;
                padding: 15px;
                margin-top: 80px;
            }

            .order-header {
                flex-direction: column;
                gap: 15px;
            }

            .status-timeline {
                flex-direction: column;
                gap: 20px;
                align-items: flex-start;
            }

            .status-timeline::before {
                height: 100%;
                width: 4px;
                left: 20px;
                top: 0;
            }

            .status-step {
                display: flex;
                align-items: center;
                gap: 15px;
                width: 100%;
            }

            .step-text {
                text-align: left;
            }
        }

        .bs-example {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            height: 70px;
        }

        .navbar-nav .nav-item .nav-link {
            font-family: 'Poppins', sans-serif;
            color: #000000;
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #FF3EA5;
        }

        .navbar-nav .nav-item .nav-link.active {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php include('header.php'); ?>
    <div class="bs-example">
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a href="home.php" class="navbar-brand">
                <img src="../images/Logo.jpg" alt="CoolBrand">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="home.php" class="nav-item nav-link"><b>Home</b></a>
                    <a href="price.php" class="nav-item nav-link"><b>Price</b></a>
                    <a href="courierMenu.php" class="nav-item nav-link"><b>Courier</b></a>
                    <a href="trackMenu.php" class="nav-item nav-link"><b>Track</b></a>
                    <a href="profile.php" class="nav-item nav-link"><b>Profile</b></a>
                    <a href="contactUS.php" class="nav-item nav-link"><b>Contact Us</b></a>
                </div>
                <div class="navbar-nav ml-auto">
                    <a href="../admin/logout.php" class="nav-item nav-link"><b>Admin Page</b></a>
                    <a href="../logout.php" class="nav-item nav-link"><b>Log Out</b></a>
                </div>
            </div>
        </nav>
    </div>
    <div class="tracking-container">
        <?php
        include('../dbconnection.php');
        $email = $_SESSION['emm'];
        $qryy = "SELECT * FROM `courier` WHERE `semail`='$email'";
        $run = mysqli_query($dbcon, $qryy);

        if(mysqli_num_rows($run) < 1) {
            echo "<div class='tracking-card'><p style='text-align: center'>No shipments found</p></div>";
        } else {
            while($data = mysqli_fetch_assoc($run)) {
                // Generate random status for demo
                $statuses = ['Order Placed', 'Picked Up', 'In Transit', 'Out for Delivery', 'Delivered'];
                $current_status = array_rand(array_flip($statuses));
                ?>
                <div class="tracking-card">
                    <div class="order-header">
                        <div class="order-info">
                            <img src="../dbimages/<?php echo $data['image']; ?>" alt="Package" class="item-image">
                            <div>
                                <h3 style="margin: 0">Tracking #<?php echo $data['billno']; ?></h3>
                                <p style="margin: 5px 0">Estimated Delivery: <?php echo date('M d, Y', strtotime('+3 days')); ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="tracking-status">
                        <div class="status-timeline">
                            <?php
                            $completed = true;
                            foreach($statuses as $status) {
                                $isCompleted = $completed;
                                if($status == $current_status) {
                                    $completed = false;
                                }
                                ?>
                                <div class="status-step">
                                    <div class="step-icon" style="background: <?php echo $isCompleted ? 'var(--success-color)' : 'var(--light-gray)'; ?>">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="step-text"><?php echo $status; ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                    <div class="delivery-details">
                        <div class="detail-group">
                            <div class="detail-label">From</div>
                            <div class="detail-value"><?php echo $data['sname']; ?></div>
                        </div>
                        <div class="detail-group">
                            <div class="detail-label">To</div>
                            <div class="detail-value"><?php echo $data['rname']; ?></div>
                        </div>
                        <div class="detail-group">
                            <div class="detail-label">Weight</div>
                            <div class="detail-value"><?php echo $data['weight']; ?> kg</div>
                        </div>
                    </div>
                </div>
            <?php
            }
        }
        ?>
    </div>
    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
