<?php
session_start();
if(!isset($_SESSION['uid'])){
    header('location: ../index.php');
    exit();
}

include('header.php');
include('../dbconnection.php');

$idd = $_GET['sid'];
$uqry = "SELECT * FROM `courier` WHERE `c_id`='$idd'";
$run = mysqli_query($dbcon,$uqry);
$data = mysqli_fetch_assoc($run);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order | Rapid Courier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #7f7fd5;
            --secondary-color: #86a8e7;
            --tertiary-color: #91eae4;
            --text-color: #2D3748;
            --light-gray: #F7FAFC;
            --border-color: #E2E8F0;
            --white: #FFFFFF;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,
                rgba(127, 127, 213, 0.1) 0%,
                rgba(134, 168, 231, 0.1) 50%,
                rgba(145, 234, 228, 0.1) 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        .update-container {
            max-width: 1200px;
            margin: 100px auto 40px;
            padding: 0 20px;
        }

        .form-title {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 30px;
            font-size: 2rem;
            font-weight: 600;
        }

        .form-card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 20px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--light-gray);
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(127, 127, 213, 0.1);
        }

        .form-control[readonly] {
            background-color: var(--light-gray);
            cursor: not-allowed;
        }

        .file-upload {
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .file-upload input[type="file"] {
            display: none;
        }

        .file-upload-label {
            display: block;
            padding: 12px 15px;
            background: var(--light-gray);
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .file-upload-label:hover {
            border-color: var(--primary-color);
            background: rgba(127, 127, 213, 0.1);
        }

        .update-btn {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            max-width: 200px;
            transition: all 0.3s ease;
        }

        .update-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(127, 127, 213, 0.4);
        }

        @media (max-width: 768px) {
            .update-container {
                margin-top: 80px;
                padding: 0 15px;
            }

            .form-card {
                padding: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .update-btn {
                width: 100%;
                max-width: none;
            }
        }
    </style>
</head>
<body>
    <div class="update-container">
        <h1 class="form-title">Update Order Details</h1>
        <form action="editdata.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idd" value="<?php echo $data['c_id']; ?>">
            
            <div class="form-card">
                <div class="form-section">
                    <h2 class="section-title">Sender Information</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sname">Full Name</label>
                            <input type="text" class="form-control" name="sname" value="<?php echo $data['sname']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="semail">Email Address</label>
                            <input type="email" class="form-control" name="semail" value="<?php echo $data['semail']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="sphone">Phone Number</label>
                            <input type="tel" class="form-control" name="sphone" value="<?php echo $data['sphone']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="saddress">Complete Address</label>
                            <input type="text" class="form-control" name="saddress" value="<?php echo $data['saddress']; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Receiver Information</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="rname">Full Name</label>
                            <input type="text" class="form-control" name="rname" value="<?php echo $data['rname']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="remail">Email Address</label>
                            <input type="email" class="form-control" name="remail" value="<?php echo $data['remail']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="rphone">Phone Number</label>
                            <input type="tel" class="form-control" name="rphone" value="<?php echo $data['rphone']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="raddress">Complete Address</label>
                            <input type="text" class="form-control" name="raddress" value="<?php echo $data['raddress']; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Package Details</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="wgt">Weight (kg)</label>
                            <input type="number" class="form-control" name="wgt" value="<?php echo $data['weight']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="billno">Receipt Number</label>
                            <input type="number" class="form-control" name="billno" value="<?php echo $data['billno']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="date">Shipping Date</label>
                            <input type="date" class="form-control" name="date" value="<?php echo date('Y-m-d'); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="simg">Update Package Image</label>
                            <div class="file-upload">
                                <label for="simg" class="file-upload-label">
                                    <i class="fas fa-cloud-upload-alt"></i> Choose New Image
                                </label>
                                <input type="file" id="simg" name="simg" accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" name="submit" class="update-btn">
                    Update Order
                </button>
            </div>
        </form>
    </div>
</body>
</html>

