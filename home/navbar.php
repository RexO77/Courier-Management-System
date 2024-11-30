<!-- navbar.php -->
<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
    <a href="home.php" class="navbar-brand">
        <img src="../images/Logo.png" alt="Rapid Courier Service" style="height:40px;">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item <?php if($currentPage == 'home.php') echo 'active'; ?>">
                <a href="home.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item <?php if($currentPage == 'price.php') echo 'active'; ?>">
                <a href="price.php" class="nav-link">Price</a>
            </li>
            <li class="nav-item <?php if($currentPage == 'courierMenu.php') echo 'active'; ?>">
                <a href="courierMenu.php" class="nav-link">Courier</a>
            </li>
            <li class="nav-item <?php if($currentPage == 'trackMenu.php') echo 'active'; ?>">
                <a href="trackMenu.php" class="nav-link">Track</a>
            </li>
            <li class="nav-item <?php if($currentPage == 'profile.php') echo 'active'; ?>">
                <a href="profile.php" class="nav-link">Profile</a>
            </li>
            <li class="nav-item <?php if($currentPage == 'contactUs.php') echo 'active'; ?>">
                <a href="contactUs.php" class="nav-link">Contact Us</a>
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
<!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>