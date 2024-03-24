<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../index.php');
    exit(); // Add exit after redirect
}

include('header.php');
$email = $_SESSION['emm'];
$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <style>
        body {
            background-image: url('../images/order.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            font-family: Arial, sans-serif; /* Add a common font family */
            color: #000000; /* Dark text color */
        }

        table {
            margin: auto;
            font-weight: bold;
            border-collapse: collapse;
            border-spacing: 5px 15px;
        }

        th, td {
            text-align: center;
            padding: 10px;
        }

        th[colspan="4"] {
            text-align: center;
            background-color: #add8e6; /* Light blue background color */
            width: 140px;
            height: 50px;
        }

        hr {
            border: 1px solid #000000; /* Black border for hr */
            margin: 0;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #CCCCCC; /* Light gray border */
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: orange;
            border-radius: 15px;
            width: 140px;
            height: 50px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #FFA500; /* Darker orange on hover */
        }
    </style>
</head>

<body>
    <form action="courierMenu.php" method="POST" enctype="multipart/form-data">
        <div style="overflow-x:auto;">
            <table border="0">
                <tr>
                    <th colspan="4">Fill the details of sender & receiver</th>
                </tr>
                <tr>
                    <td colspan="4"><hr></td>
                </tr>
                <tr>
                    <th colspan="2">SENDER</th>
                    <th colspan="2">RECEIVER</th>
                </tr>
                <tr>
                    <td colspan="4"><hr></td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="sname" placeholder="Sender FullName" required></td>
                    <td>Name:</td>
                    <td><input type="text" name="rname" placeholder="Receiver FullName" required></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="semail" value="<?php echo $email; ?>" readonly></td>
                    <td>Email:</td>
                    <td><input type="text" name="remail" placeholder="Receiver EmailId" required></td>
                </tr>
                <tr>
                    <td>PhoneNo.:</td>
                    <td><input type="number" name="sphone" placeholder="Sender number" required></td>
                    <td>PhoneNo.:</td>
                    <td><input type="number" name="rphone" placeholder="Receiver number" required></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="saddress" placeholder="Sender address" required></td>
                    <td>Address:</td>
                    <td><input type="text" name="raddress" placeholder="Receiver address" required></td>
                </tr>
                <tr>
                    <td colspan="4"><hr></td>
                </tr>
                <tr>
                    <td>Weight:</td>
                    <td><input type="number" name="wgt" placeholder="Weights in kg" required></td>
                    <td>Payment Id:</td>
                    <td><input type="number" name="billno" placeholder="Enter transaction number" required></td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" readonly /></td>
                    <td>Items Image:</td>
                    <td><input type="file" name="simg"></td>
                </tr>
                <tr>
                    <td colspan="4" align="center"><input type="submit" name="submit" value="Place Order"></td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
    include('../dbconnection.php');

    $sname = $_POST['sname'];
    $rname = $_POST['rname'];
    $semail = $_POST['semail'];
    $remail = $_POST['remail'];
    $sphone = $_POST['sphone'];
    $rphone = $_POST['rphone'];
    $sadd = $_POST['saddress'];
    $radd = $_POST['raddress'];
    $wgt = $_POST['wgt'];
    $billn = $_POST['billno'];
    $originalDate = $_POST['date'];
    $newDate = date("Y-m-d", strtotime($originalDate));
    $imagenam = $_FILES['simg']['name'];
    $tempnam = $_FILES['simg']['tmp_name'];

    move_uploaded_file($tempnam, "../dbimages/$imagenam");

    $qry = "INSERT INTO `courier` (`sname`, `rname`, `semail`, `remail`, `sphone`, `rphone`, `saddress`, `raddress`, `weight`, `billno`, `image`,`date`,`u_id`) VALUES ('$sname', '$rname', '$semail', '$remail', '$sphone', '$rphone', '$sadd', '$radd', '$wgt', '$billn', '$imagenam', '$newDate','$uid');";
    $run = mysqli_query($dbcon, $qry);

    if ($run == true) {
    ?> 
        <script>
            alert('Order Placed Successfully :)');
            window.open('courierMenu.php', '_self');
        </script>
    <?php
    }
}
?>
