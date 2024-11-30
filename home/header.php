<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rapid Courier Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            margin-top: 80px;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            position: fixed;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: calc(100% - 40px);
            z-index: 1000;
            padding: 10px 20px;
        }

        .navbar-brand img {
            height: 50px;
            width: auto;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .navbar-brand img:hover {
            transform: scale(1.05);
        }

        .navbar-nav .nav-item .nav-link {
            color: var(--text-color);
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 8px 16px;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: var(--primary-color);
        }

        .navbar-nav .nav-item .nav-link.active {
            font-weight: 600;
            color: var(--primary-color);
        }
        
        @media (max-width: 768px) {
            .navbar {
                width: 100%;
                top: 0;
                border-radius: 0;
            }
            
            .navbar-brand img {
                height: 40px;
            }

            .navbar-nav {
                margin-top: 10px;
            }

            .navbar-nav .nav-item {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <?php $currentPage = basename($_SERVER['PHP_SELF']); ?>
    <nav class="navbar navbar-expand-md navbar-light">
        <a href="home.php" class="navbar-brand">
            <img src="../images/Logo.png" alt="Rapid Courier Service">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>