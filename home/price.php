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
    <title>Pricing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light background color */
            color: #333333; /* Dark text color */
            text-align: center;
            padding: 20px;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .image-container {
            width: 48%;
        }

        .image-container img {
            width: 100%;
            border-radius: 20px;
            object-fit: cover; /* Crop the image */
        }

        table {
            width: 48%;
            border-collapse: collapse;
            border-radius: 10px; /* Rounded corners */
            overflow: hidden; /* Hide overflow to make rounded corners work */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
        }

        th, td {
            padding: 15px;
        }

        th {
            background: #f0f0f0; /* Light gray background color */
            font-size: 24px;
        }

        td {
            background-color: #ffffff; /* White background color for table cells */
            font-size: 20px;
        }

        h3 {
            margin-top: 20px;
            font-size: 24px;
        }

        ol {
            text-align: left;
            list-style-position: inside;
            padding-left: 0; /* Remove default padding */
        }

        ol li {
            font-size: 18px;
            margin-bottom: 10px;
            text-align: left; /* Align list items */
        }

        .payment-container {
            width: 48%;
            padding: 20px;
            background-color: #ffffff; /* White background color */
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Box shadow for depth */
            text-align: left; /* Align text to the left */
        }

        .payment-container h3 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .payment-container ol {
            padding-left: 20px; /* Add left padding to the list */
        }

        .calculate-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .calculate-container input[type="number"] {
            width: 100%;
            max-width: 150px; /* Set maximum width */
            padding: 10px;
            border: 2px solid #ced4da;
            border-radius: 5px;
            margin-right: 10px;
            box-sizing: border-box; /* Include padding and border in the width */
        }

        .calculate-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .calculate-container button:hover {
            background-color: #0056b3;
        }

        .price {
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="../images/pay.png" alt="Image">
        </div>
        <table>
            <tr>
                <th>Weight in Kg</th>
                <th>Price</th>
            </tr>
            <tr>
                <td>0-1</td>
                <td>120</td>
            </tr>
            <tr>
                <td>1-2</td>
                <td>200</td>
            </tr>
            <tr>
                <td>2-4</td>
                <td>250</td>
            </tr>
            <tr>
                <td>4-5</td>
                <td>300</td>
            </tr>
            <tr>
                <td>5-7</td>
                <td>400</td>
            </tr>
            <tr>
                <td>7-above</td>
                <td>500</td>
            </tr>
        </table>

        <div class="payment-container">
            <h3>Payment Information</h3>
            <ol>
                <li>UPI: abcd@sbi.com</li>
                <li>GPay: 6362786223</li>
                <li>PhonePe: 3565656555</li>
            </ol>
        </div>

        <div class="payment-container">
            <h3>Calculate Price</h3>
            <div class="calculate-container">
                <input type="number" id="weight" placeholder="Enter weight in Kg" min="0" step="0.01">
                <button onclick="calculatePrice()">Calculate Price</button>
            </div>
            <div id="price" class="price"></div>
        </div>
    </div>

    <script>
        function calculatePrice() {
            var weight = parseFloat(document.getElementById('weight').value);
            var price;

            if (weight <= 1) {
                price = 120;
            } else if (weight <= 2) {
                price = 200;
            } else if (weight <= 4) {
                price = 250;
            } else if (weight <= 5) {
                price = 300;
            } else if (weight <= 7) {
                price = 400;
            } else {
                price = 500;
            }

            document.getElementById('price').innerText = 'Price: ₹ ' + price;
        }
    </script>
</body>
</html>



