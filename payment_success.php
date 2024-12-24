<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$booking_id = $_GET['id'];

$sql = "SELECT * FROM bookings WHERE id = $booking_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $payment_method = $row["payment_method"];
    $payment_details = $row["payment_details"];
    $start_date = $row["start_date"];
    $end_date = $row["end_date"];
    $package = $row["package"];
    $amount = $row["amount"];
    $amount_inr = "₹ " . number_format($amount, 2);  // Format amount in INR
} else {
    echo "Booking not found";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Successful</title>
    <style>
        /* CSS styles for displaying details */
        .booking-details {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
         h2
    {
        text-align: center;
    }
    </style>
</head>
<body>

<h2>Payment Successful</h2>

<div class="booking-details">
    <h3>Booking Details</h3>
    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
    <p><strong>Payment Method:</strong> <?php echo $payment_method; ?></p>
    <p><strong>Payment Details:</strong> <?php echo $payment_details; ?></p>
    <p><strong>Start Date:</strong> <?php echo $start_date; ?></p>
    <p><strong>End Date:</strong> <?php echo $end_date; ?></p>
    <p><strong>Package:</strong> <?php echo $package; ?></p>
    <p><strong>Total Amount:</strong> <?php echo $amount_inr; ?></p>
</div>

</body>
</html>
