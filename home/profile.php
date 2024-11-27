<?php
session_start();
if(isset($_SESSION['uid'])){
    echo "";
    }else{
    header('location: ../index.php');
    }

?>
<?php
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>My Profile | Rapid Courier Service</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
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
            background: linear-gradient(135deg,
                rgba(127, 127, 213, 0.1) 0%,
                rgba(134, 168, 231, 0.1) 50%,
                rgba(145, 234, 228, 0.1) 100%);
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            min-height: 100vh;
            margin: 0; /* Remove margin */
            padding: 0; /* Remove padding */
        }

        .profile-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-5px);
        }

        .profile-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 40px 20px;
            text-align: center;
            color: var(--white);
        }

        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            border: 5px solid var(--white);
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .profile-name {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .profile-role {
            font-size: 16px;
            opacity: 0.9;
        }

        .profile-body {
            padding: 40px;
        }

        .info-section {
            margin-bottom: 30px;
        }

        .info-header {
            font-size: 18px;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-gray);
        }

        .info-item {
            margin-bottom: 20px;
        }

        .info-label {
            font-size: 14px;
            color: #718096;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 16px;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .profile-card {
                margin: 20px;
            }

            .profile-header {
                padding: 30px 15px;
            }

            .profile-img {
                width: 120px;
                height: 120px;
            }

            .profile-body {
                padding: 20px;
            }
        }

        /* Add navbar fixes */
        .bs-example {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Add margin to main content container */
        .container {
            margin-top: 100px; /* Adjust based on navbar height */
            padding: 20px;
=======
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        body {
        background-color: #f9f9fa
        }

        .padding {
        padding: 3rem !important
        }

        .user-card-full {
        overflow: hidden
        }

        .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        margin-bottom: 30px
        }

        .m-r-0 {
        margin-right: 0px
        }

        .m-l-0 {
        margin-left: 0px
        }

        .user-card-full .user-profile {
        border-radius: 5px 0 0 5px
        }

        .bg-c-lite-green {
        background: -webkit-gradient(linear, left top, right top, from(#f29263), to(#ee5a6f));
        background: linear-gradient(to right, #ee5a6f, #f29263)
        }

        .user-profile {
        padding: 20px 0
        }

        .card-block {
        padding: 1.25rem
        }

        .m-b-25 {
        margin-bottom: 25px
        }

        .img-radius {
        border-radius: 5px
        }

        h6 {
        font-size: 14px
        }

        .card .card-block p {
        line-height: 25px
        }

        @media only screen and (min-width: 1400px) {
        p {
            font-size: 14px
        }
        }

        .card-block {
        padding: 1.25rem
        }

        .b-b-default {
        border-bottom: 1px solid #e0e0e0
        }

        .m-b-20 {
        margin-bottom: 20px
        }

        .p-b-5 {
        padding-bottom: 5px !important
        }

        .card .card-block p {
        line-height: 25px
        }

        .m-b-10 {
        margin-bottom: 10px
        }

        .text-muted {
        color: #919aa3 !important
        }

        .b-b-default {
        border-bottom: 1px solid #e0e0e0
        }

        .f-w-600 {
        font-weight: 600
        }

        .m-b-20 {
        margin-bottom: 20px
        }

        .m-t-40 {
        margin-top: 20px
        }

        .p-b-5 {
        padding-bottom: 5px !important
        }

        .m-b-10 {
        margin-bottom: 10px
        }

        .m-t-40 {
        margin-top: 20px
        }

        .user-card-full .social-link li {
        display: inline-block
        }

        .user-card-full .social-link li a {
        font-size: 20px;
        margin: 0 10px 0 0;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out
>>>>>>> 9e89c12361fd37bc93f8f9a4f1e26ea2d43589d4
        }
    </style>
</head>
<body>
    
<?php

include('../dbconnection.php');
$id= $_SESSION['uid'];
$qry= "SELECT * FROM `users` WHERE `u_id`='$id'";
$run= mysqli_query($dbcon,$qry);

$data = mysqli_fetch_assoc($run);

?>

<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="profile-card">
                <div class="profile-header">
                    <img src="https://ui-avatars.com/api/?name=<?php echo $data['name']; ?>&background=random" 
                         alt="Profile" class="profile-img">
                    <h2 class="profile-name"><?php echo $data['name']; ?></h2>
                    <p class="profile-role">User Account</p>
                </div>
                <div class="profile-body">
                    <div class="info-section">
                        <h3 class="info-header">Personal Information</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-label">Email Address</div>
                                    <div class="info-value"><?php echo $data['email']; ?></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="info-item">
                                    <div class="info-label">Phone Number</div>
                                    <div class="info-value"><?php echo $data['pnumber']; ?></div>
                                </div>
=======
<div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
            <div class="col-xl-6 col-md-12">
                <div class="card user-card-full">
                    <div class="row m-l-0 m-r-0">
                        <div class="col-sm-4 bg-c-lite-green user-profile">
                            <div class="card-block text-center text-white">
                                <div class="m-b-25"> <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> </div>
                                <h3 class="f-w-600"><?php echo $data['name']; ?></h3>
                                <p>user</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="card-block">
                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Email</p>
                                        <h6 class="text-muted f-w-400"><?php echo $data['email']; ?></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Phone</p>
                                        <h6 class="text-muted f-w-400"><?php echo $data['pnumber']; ?></h6>
                                    </div>
                                </div>

                                <div class="row">
                                <hr><br><hr>
                                </div>
                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                <h6>Go with the flow.</h6>
                                </ul>
>>>>>>> 9e89c12361fd37bc93f8f9a4f1e26ea2d43589d4
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>