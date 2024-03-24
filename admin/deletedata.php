<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
}
?>

<?php
include('head.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Data Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 36px;
            font-weight: bold;
            color: #333333;
            margin: 0;
        }

        .admin-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .admin-links a {
            font-size: 14px;
            font-weight: bold;
            color: #ffffff;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 5px;
            background-color: #34495e;
            transition: background-color 0.3s ease;
        }

        .admin-links a:hover {
            background-color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #dddddd;
            text-align: left;
        }

        th {
            background-color: #add8e6;
            color: #333333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        td a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        td a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Search Data Information</h1>
        </div>
        <div class="admin-links">
            <a href="dashboard.php">Back to Dashboard</a>
            <a href="logout.php">Logout</a>
        </div>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>No.</th>
                    <th>Items Image</th>
                    <th>Sender Name</th>
                    <th>Receiver Name</th>
                    <th>Sender Email</th>
                    <th>Action</th>
                </tr>
                <?php
                include('../dbconnection.php');

                $qryd= "SELECT * FROM `courier`";
                $run= mysqli_query($dbcon,$qryd);

                if(mysqli_num_rows($run)<1){
                    echo "<tr><td colspan='6'>No record found..</td></tr>";
                }
                else{
                    $count=0;
                    while($data=mysqli_fetch_assoc($run))
                    {
                        $count++;
                        ?>
                        <tr align="center">
                            <td><?php echo $count; ?></td>
                            <td><img src="../dbimages/<?php echo $data['image']; ?>" alt="pic" style="max-width: 100px;"/> </td>
                            <td><?php echo $data['sname']; ?></td>
                            <td><?php echo $data['rname']; ?></td>
                            <td><?php echo $data['semail']; ?></td>
                            <td><a href="datadeleted.php?bb=<?php echo $data['billno']; ?>">Delete</a></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
