<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$bookingId = $_GET['id'];

$sql = "SELECT * FROM Tbookings WHERE id = $bookingId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        p {
            margin-top: 20px;
            font-size: 18px;
            color: #555;
        }

        p:first-child {
            margin-top: 0;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        h2, p {
            animation: fadeIn 1s ease-in-out;
        }

    </style>
</head>
<body>

<h2>Booking Receipt</h2>

<p><strong>Name:</strong> <?php echo $row['name']; ?></p>
<p><strong>Start Date:</strong> <?php echo $row['start_date']; ?></p>
<p><strong>End Date:</strong> <?php echo $row['end_date']; ?></p>
<p><strong>Payment Option:</strong> <?php echo $row['payment_option']; ?></p>
<p><strong>Payment Details:</strong> <?php echo $row['payment_details']; ?></p>
<p><strong>Location:</strong> <?php echo $row['location']; ?></p>

</body>
</html>

<?php
} else {
    echo "No booking found.";
}

$conn->close();
?>
