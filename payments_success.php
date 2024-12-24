<?php
include 'C:\xampp\htdocs\HTML5Application\Tour Guide System\db_project.php';

// Create a new database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$location = $_POST['location'];
$start_date = $_POST['startDate'];
$end_date = $_POST['endDate'];
$paymentMethod = $_POST['paymentMethod'];

$card_type = isset($_POST['cardType']) ? $_POST['cardType'] : '';
$card_number = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
$expiry_date = isset($_POST['expiryDate']) ? $_POST['expiryDate'] : '';
$cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';
$upi_id = isset($_POST['upiId']) ? $_POST['upiId'] : '';

// Insert data into payment_success table
$sql = "INSERT INTO payment_success (name, email, location, start_date, end_date, payment_method, card_type, card_number, expiry_date, cvv, upi_id) 
        VALUES ('$name', '$email', '$location', '$start_date', '$end_date', '$paymentMethod', '$card_type', '$card_number', '$expiry_date', '$cvv', '$upi_id')";

$message = "";

if ($conn->query($sql) === TRUE) {
    $message = "Payment details added successfully.";
} else {
    $message = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();  // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            font-size: 18px;
            color: #007bff;
            margin-top: 20px;
        }

        .error {
            color: #dc3545;
            text-align: center;
            font-size: 18px;
            margin-top: 20px;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Payment Status</h2>
    <?php
    if ($message == "Payment details added successfully.") {
        echo '<p>' . $message . '</p>';
    } else {
        echo '<p class="error">' . $message . '</p>';
    }
    ?>
</div>

</body>
</html>
