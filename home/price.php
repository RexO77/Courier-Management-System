<?php
session_start();
if (!isset($_SESSION['uid'])) {
    header('location: ../index.php');
    exit();
}
include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            color: var(--text-color);
            padding-top: 80px; /* Adjust based on your header's height */
        }

        .pricing-container {
            max-width: 1200px;
            margin: 100px auto 40px;
            padding: 0 20px;
        }

        .pricing-header {
            text-align: center;
            margin-bottom: 50px;
        }

        .pricing-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 15px;
        }

        .pricing-header p {
            font-size: 1.1rem;
            color: var(--text-color);
            opacity: 0.8;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 50px;
        }

        .pricing-card {
            background: var(--white);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
        }

        .image-section {
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 30px;
        }

        .image-section img {
            width: 100%;
            height: auto;
            display: block;
        }

        .price-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .price-table th {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            padding: 15px;
            font-size: 1.1rem;
        }

        .price-table td {
            padding: 12px 15px;
            border-bottom: 1px solid var(--border-color);
            font-size: 1rem;
        }

        .price-table tr:last-child td {
            border-bottom: none;
        }

        .features-list {
            background: var(--light-gray);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px; /* Add this line to create spacing */
        }

        .features-list h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .features-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .features-list li {
            margin-bottom: 10px;
            padding-left: 25px;
            position: relative;
        }

        .features-list li:before {
            content: '✓';
            position: absolute;
            left: 0;
            color: var(--secondary-color);
            font-weight: bold;
        }

        .calculate-section {
            background: var(--white);
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            margin-top: 30px;
        }

        .calculator-form {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        .form-group {
            flex: 3; /* Give more space to input */
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            color: var(--text-color);
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(127, 127, 213, 0.1);
        }

        .calculate-btn {
            flex: 1;
            min-width: 120px;
            max-width: 120px; /* Fixed width */
            height: 45px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            border: none;
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .calculate-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(127, 127, 213, 0.4);
        }

        .result {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary-color);
            text-align: center;
            margin-top: 20px;
        }

        @media (max-width: 768px) {
            .pricing-grid {
                grid-template-columns: 1fr;
            }

            .pricing-container {
                margin-top: 80px;
                padding: 0 15px;
            }

            .calculator-form {
                flex-direction: column;
                gap: 15px;
            }

            .form-group, 
            .calculate-btn {
                width: 100%;
                max-width: 100%; /* Full width on mobile */
            }

            .form-control {
                height: 45px;
            }

            .calculate-btn {
                height: 45px;
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="pricing-container">
        <div class="pricing-header">
            <h1>Simple, Transparent Pricing</h1>
            <p>Choose the best shipping rate for your needs</p>
        </div>

        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="image-section">
                    <img src="../images/pay.png" alt="Pricing Image">
                </div>
                <table class="price-table">
                    <tr>
                        <th>Weight (kg)</th>
                        <th>Price (₹)</th>
                    </tr>
                    <tr><td>0-1</td><td>120</td></tr>
                    <tr><td>1-2</td><td>200</td></tr>
                    <tr><td>2-3</td><td>300</td></tr>
                    <tr><td>3-4</td><td>400</td></tr>
                    <tr><td>4-5</td><td>500</td></tr>
                </table>
            </div>

            <div class="pricing-card">
                <div class="features-list">
                    <h3>Why Choose Us?</h3>
                    <ul>
                        <li>Real-time shipment tracking</li>
                        <li>Secure handling of packages</li>
                        <li>Insurance coverage available</li>
                        <li>Door-to-door delivery</li>
                        <li>Professional customer support</li>
                        <li>Multiple payment options</li>
                        <li>Express delivery available</li>
                        <li>Nationwide coverage</li>
                    </ul>
                </div>

                <div class="calculate-section">
                    <h3>Calculate Shipping Cost</h3>
                    <div class="calculator-form">
                        <div class="form-group">
                            <label>Enter Weight (kg)</label>
                            <input type="number" class="form-control" id="weight" min="0" step="0.1">
                        </div>
                        <button class="calculate-btn" onclick="calculateCost()">Calculate</button>
                    </div>
                    <div class="result" id="result"></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculateCost() {
            const weight = parseFloat(document.getElementById('weight').value);
            let cost = 0;

            if (weight <= 0) {
                alert('Please enter a valid weight');
                return;
            }

            if (weight <= 1) cost = 120;
            else if (weight <= 2) cost = 200;
            else if (weight <= 3) cost = 300;
            else if (weight <= 4) cost = 400;
            else cost = 500;

            document.getElementById('result').innerHTML = `Estimated Cost: ₹${cost}`;
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



