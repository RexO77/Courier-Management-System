<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location: ../login.php');
}
?>
<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Courier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4A90E2;
            --secondary-color: #81B4FF;
            --text-color: #2D3748;
            --light-gray: #F7FAFC;
            --white: #FFFFFF;
            --accent-color: #3182CE;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,
                rgba(74, 144, 226, 0.1) 0%,
                rgba(129, 180, 255, 0.2) 100%);
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        /* Navbar fixes */
        .bs-example {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: var(--white);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .tracking-container {
            width: 95%;
            max-width: 1200px;
            margin: 100px auto 20px;
            padding: 25px; /* Add padding around table */
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow-x: auto; /* Enable horizontal scroll on small screens */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px; /* Minimum width to prevent squishing */
        }

        th {
            background-color: var(--primary-color);
            color: var(--white);
            font-weight: 600;
            font-size: 16px;
            padding: 15px;
            text-align: left;
            white-space: nowrap; /* Prevent text wrapping */
        }

        td {
            padding: 15px;
            border-bottom: 1px solid var(--light-gray);
            vertical-align: middle;
        }

        .item-image {
            max-width: 100px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .action-links {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .action-links a {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s ease;
            text-align: center;
            min-width: 80px;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .tracking-container {
                width: 100%;
                margin: 80px 0 0 0;
                padding: 15px; /* Reduced padding for mobile */
                border-radius: 0;
            }

            th, td {
                padding: 12px 8px;
                font-size: 14px;
            }

            .item-image {
                max-width: 60px;
            }

            .action-links {
                flex-direction: column;
                gap: 4px;
            }

            .action-links a {
                padding: 6px 8px;
                font-size: 12px;
                width: 100%;
            }
        }

        @media screen and (max-width: 480px) {
            th, td {
                padding: 8px 4px;
                font-size: 13px;
            }

            .tracking-container {
                margin-top: 70px;
                padding: 10px; /* Further reduced padding for smaller screens */
            }

            .no-records {
                padding: 20px;
                font-size: 14px;
            }
        }

        /* Maintain button colors */
        .edit-link {
            background-color: var(--accent-color);
            color: var(--white);
        }

        .delete-link {
            background-color: #E53E3E;
            color: var(--white);
        }

        .status-link {
            background-color: #48BB78;
            color: var(--white);
        }

        .action-links a:hover {
            transform: translateY(-2px);
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="tracking-container">
        <table>
            <tr>
                <th>No.</th>
                <th>Item's Image</th>
                <th>Sender Name</th>
                <th>Receiver Name</th>
                <th>Receiver Email</th>
                <th>Actions</th>
            </tr>

            <?php
            include('../dbconnection.php');
            $email = $_SESSION['emm'];
            $qryy = "SELECT * FROM `courier` WHERE `semail`='$email'";
            $run = mysqli_query($dbcon,$qryy);

            if(mysqli_num_rows($run) < 1) {
                echo "<tr><td colspan='6' class='no-records'>No records found...</td></tr>";
            } else {
                $count = 0;
                while($data = mysqli_fetch_assoc($run)) {
                    $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><img src="../dbimages/<?php echo $data['image']; ?>" alt="Item Image" class="item-image"/></td>
                        <td><?php echo $data['sname']; ?></td>
                        <td><?php echo $data['rname']; ?></td>
                        <td><?php echo $data['remail']; ?></td>
                        <td class="action-links">
                            <a href="updationtable.php?sid=<?php echo $data['c_id']; ?>" class="edit-link">Edit</a>
                            <a href="deletecourier.php?bb=<?php echo $data['billno']; ?>" class="delete-link">Delete</a>
                            <a href="status.php?sidd=<?php echo $data['c_id']; ?>" class="status-link">Check Status</a>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</body>
</html>