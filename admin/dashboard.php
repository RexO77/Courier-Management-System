<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../login.php');
    exit();
}

include('head.php');
include('../dbconnection.php');

// Fetch statistics from existing tables
$totalUsers = mysqli_num_rows(mysqli_query($dbcon, "SELECT * FROM users"));
$totalDeliveries = mysqli_num_rows(mysqli_query($dbcon, "SELECT * FROM courier"));
$totalContacts = mysqli_num_rows(mysqli_query($dbcon, "SELECT * FROM contacts"));

// Get latest deliveries
$latestDeliveries = mysqli_query($dbcon, "SELECT * FROM courier ORDER BY date DESC LIMIT 5");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Rapid Courier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
            --success: #48BB78;
            --hover-bg: #2C3444;
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

        .dashboard-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .welcome-section h1 {
            font-size: 2.5rem;
            color: var(--white);
            margin: 0;
        }

        .welcome-section p {
            color: var(--text-color);
            opacity: 0.8;
            margin: 5px 0;
        }

        .header-actions {
            display: flex;
            gap: 15px;
        }

        .header-btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .primary-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
        }

        .outline-btn {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            background: transparent;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            border: 1px solid var(--border-color);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            background: var(--hover-bg);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 24px;
            color: var(--white);
        }

        .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: var(--white);
            margin: 10px 0;
        }

        .stat-label {
            color: var(--text-color);
            opacity: 0.9;
            font-size: 0.9rem;
        }

        .recent-deliveries {
            background: var(--card-bg);
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            margin-top: 40px;
            border: 1px solid var(--border-color);
        }

        .delivery-table {
            width: 100%;
            border-collapse: collapse;
        }

        .delivery-table th,
        .delivery-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }

        .delivery-table th {
            font-weight: 600;
            color: var(--text-color);
            background: var(--dark-bg);
        }

        .delivery-table tr:hover {
            background: var(--hover-bg);
        }

        .admin-actions {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
            margin-top: 40px;
        }

        .action-card {
            background: var(--card-bg);
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            text-decoration: none;
            color: var(--text-color);
            border: 1px solid var(--border-color);
        }

        .action-card:hover {
            transform: translateY(-5px);
            background: var(--hover-bg);
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <div class="welcome-section">
                <h1>Admin Dashboard</h1>
                <p>Welcome to Rapid Courier admin panel</p>
            </div>
            <div class="header-actions">
                <a href="../index.php" class="header-btn outline-btn">View Site</a>
                <a href="logout.php" class="header-btn primary-btn">Logout</a>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon stat-users">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number"><?php echo $totalUsers; ?></div>
                <div class="stat-label">Total Users</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon stat-deliveries">
                    <i class="fas fa-box"></i>
                </div>
                <div class="stat-number"><?php echo $totalDeliveries; ?></div>
                <div class="stat-label">Total Deliveries</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon stat-contacts">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="stat-number"><?php echo $totalContacts; ?></div>
                <div class="stat-label">Contact Messages</div>
            </div>
        </div>

        <div class="recent-deliveries">
            <h2>Recent Deliveries</h2>
            <table class="delivery-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Sender</th>
                        <th>Receiver</th>
                        <th>Weight</th>
                        <th>Bill No</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($delivery = mysqli_fetch_assoc($latestDeliveries)) { ?>
                        <tr>
                            <td><?php echo date('d M Y', strtotime($delivery['date'])); ?></td>
                            <td><?php echo $delivery['sname']; ?></td>
                            <td><?php echo $delivery['rname']; ?></td>
                            <td><?php echo $delivery['weight']; ?> kg</td>
                            <td><?php echo $delivery['billno']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="admin-actions">
            <a href="deleteusers.php" class="action-card">
                <i class="fas fa-user-cog fa-2x" style="color: var(--primary-color); margin-bottom: 15px;"></i>
                <h3 style="margin-bottom: 10px;">Manage Users</h3>
                <p style="opacity: 0.7;">View and manage user accounts</p>
            </a>
            <a href="deletedata.php" class="action-card">
                <i class="fas fa-shipping-fast fa-2x" style="color: var(--primary-color); margin-bottom: 15px;"></i>
                <h3 style="margin-bottom: 10px;">Manage Deliveries</h3>
                <p style="opacity: 0.7;">View and manage courier data</p>
            </a>
        </div>
    </div>
</body>
</html>