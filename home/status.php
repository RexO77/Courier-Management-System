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
    <title>Courier Tracking Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F5DC; /* Beige background color */
        }
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #fff;
            font-size: 20px;
        }
        td img {
            max-width: 100px;
            border-radius: 10px; /* Rounded corners */
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            color: blue;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>No.</th>
            <th>Item's Image</th>
            <th>Sender Name</th>
            <th>Receiver Name</th>
            <th>Receiver Email</th>
            <th>Action</th>
        </tr>

        <?php
        include('../dbconnection.php');

        $email = $_SESSION['emm'];

        $qryy = "SELECT * FROM `courier` WHERE `semail`='$email'";
        $run = mysqli_query($dbcon, $qryy);

        if (mysqli_num_rows($run) < 1) {
            echo "<tr><td colspan='6'>No record found..</td></tr>";
        } else {
            $count = 0;
            while ($data = mysqli_fetch_assoc($run)) {
                $count++;
        ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><img src="../dbimages/<?php echo $data['image']; ?>" alt="pic" /></td>
                    <td><?php echo $data['sname']; ?></td>
                    <td><?php echo $data['rname']; ?></td>
                    <td><?php echo $data['remail']; ?></td>
                    <td>
                        <a href="updationtable.php?sid=<?php echo $data['c_id']; ?>">Edit</a> ||
                        <a href="deletecourier.php?bb=<?php echo $data['billno']; ?>">Delete</a> ||
                        <a href="status.php?sidd=<?php echo $data['c_id']; ?>">Check status</a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>
</body>
</html>
