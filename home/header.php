<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rapid Courier Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
            --white: #FFFFFF;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin-top: 80px; /* Adjust based on navbar height */
        }

        .navbar {
            height: 60px; /* Reduced height */
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px); /* For Safari support */
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 40px);
            z-index: 1000;
        }

        .navbar-brand img {
            height: 40px; /* Reduced logo size */
            width: auto;
            border-radius: 50%;
        }

        .navbar-nav .nav-item .nav-link {
            color: var(--text-color);
            font-size: 16px; /* Reduced font size */
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: var(--primary-color);
        }

        .navbar-nav .nav-item .nav-link.active {
            font-weight: bold;
            color: var(--primary-color);
        }

        .navbar-toggler {
            border-color: var(--primary-color);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(127, 127, 213, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        @media (max-width: 768px) {
            .navbar-nav .nav-item {
                text-align: center;
            }

            .navbar {
                height: auto;
                border-radius: 0;
                width: 100%;
                left: 0;
                transform: none;
                top: 0;
            }

            body {
                margin-top: 0;
            }
        }
    </style>
</head>
<body>
    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    ?>
    <nav class="navbar navbar-expand-md">
        <a href="home.php" class="navbar-brand">
            <img src="../images/Logo.jpg" alt="Rapid Courier Service">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon">&#9776;</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="home.php" class="nav-link <?php if($currentPage == 'home.php') echo 'active'; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="price.php" class="nav-link <?php if($currentPage == 'price.php') echo 'active'; ?>">Price</a>
                </li>
                <li class="nav-item">
                    <a href="courierMenu.php" class="nav-link <?php if($currentPage == 'courierMenu.php') echo 'active'; ?>">Courier</a>
                </li>
                <li class="nav-item">
                    <a href="trackMenu.php" class="nav-link <?php if($currentPage == 'trackMenu.php') echo 'active'; ?>">Track</a>
                </li>
                <li class="nav-item">
                    <a href="profile.php" class="nav-link <?php if($currentPage == 'profile.php') echo 'active'; ?>">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="contactUs.php" class="nav-link <?php if($currentPage == 'contactUs.php') echo 'active'; ?>">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a href="../admin/logout.php" class="nav-link">Admin Page</a>
                </li>
                <li class="nav-item">
                    <a href="../logout.php" class="nav-link">Log Out</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
