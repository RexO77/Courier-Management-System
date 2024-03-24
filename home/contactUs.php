<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ContactUs</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #F5F5DC; /* Beige background color */
        }
        .mail-form {
            background-color: #fff; /* White background for the form */
            border-radius: 20px; /* Rounded corners */
            padding: 20px;
            margin-top: 50px; /* Add some margin from the top */
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <div class="container">
        <div class="row justify-content-center"> <!-- Center the content -->
            <div class="col-md-6">
                <div class="mail-form">
                    <h2 class="text-center">Drop a message</h2>
                    <p class="text-center">We are waiting for your response..</p>
                    
                    <form action="contactUs.php" method="POST">
                        <div class="form-group">
                            <input class="form-control" name="email" type="email" placeholder="Email Id">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="subject" type="text" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Compose your message.."></textarea>
                        </div>
                        <div class="form-group text-center"> <!-- Center the button -->
                            <input class="form-control button btn-primary" type="submit" name="send" value="Send">
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
