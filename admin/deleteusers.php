<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
    exit();
}

include('head.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=n"width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href=a"https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #7f7fd5;
            --secondary-color: #86a8e7;
            --text-color: #E2E8F0;
            --dark-bg: #1A202C;
            --darker-bg: #171923;
            --card-bg: #2D3748;
            --border-color: #4A5568;
            --white: #FFFFFF;
            --hover-bg: #2C3444;
            --button-bg: #34495e;
            --button-hover-bg: #2c3e50;
            --button-text: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,
                rgba(26, 32, 44, 0.95) 0%,
                rgba(45, 55, 72, 0.95) 100%);
            margin: 0;
            padding: 30px;
            min-height: 100vh;
            color: var(--text-color);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .header {
            margin-bottom: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            font-size: 2.5rem;
            color: var(--white);
            margin: 0;
        }

        .admin-links {
            display: flex;
            gap: 15px;
        }

        .admin-links a {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .admin-links a:first-child {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
        }

        .admin-links a:last-child {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
        }

        .admin-links a:hover {
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            border: 1px solid var(--border-color);
        }

        th {
            background: var(--dark-bg);
            color: var(--white);
            font-weight: 600;
            font-size: 0.95rem;
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            color: var(--text-color);
            font-size: 0.9rem;
        }

        tr:hover {
            background: var(--hover-bg);
        }

        td a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        td a:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .header {
                flex-direction: column;
                gap: 20px;
                text-align: center;
            }

            .admin-links {
                width: 100%;
                flex-direction: column;
            }

            .admin-links a {
                width: 100%;
                text-align: center;
            }

            th,
            td {
                padding: 10px;
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Manage Users</h1>
            <div class="admin-links">
                <a href="dashboard.php">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
                <a href="logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>

        <table>
            <tr>
                <th>No.</th>
                <th>Users Name</th>
                <th>Email Id</th>
                <th>Action</th>
            </tr>
            <?php
            include('../dbconnection.php');
            $qry = "SELECT * FROM `users`";
            $run = mysqli_query($dbcon, $qry);
            if (mysqli_num_rows($run) < 1) {
                echo "<tr><td colspan='4' style='text-align: center;'>There is no data in the database</td></tr>";
            } else {
                $count = 0;
                while ($data = mysqli_fetch_assoc($run)) {
                    $count++;
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td><?php echo htmlspecialchars($data['name']); ?></td>
                        <td><?php echo htmlspecialchars($data['email']); ?></td>
                        <td><a href="usersdeleted.php?emm=<?php echo urlencode($data['email']); ?>">Delete User</a></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</body>

</html>
