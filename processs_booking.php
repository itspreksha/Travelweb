<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$paymentOption = $_POST['paymentOption'];
$location = $_POST['location'];
$paymentDetails = '';

if ($paymentOption == 'upi') {
    $paymentDetails = $_POST['upiId'];
} elseif ($paymentOption == 'card') {
    $paymentDetails = $_POST['cardNumber'] . ', ' . $_POST['expiryDate'] . ', ' . $_POST['cvv'];
}

$sql = "INSERT INTO Tbookings (name, start_date, end_date, payment_option, payment_details, location) VALUES ('$name', '$startDate', '$endDate', '$paymentOption', '$paymentDetails', '$location')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo json_encode(['success' => true, 'bookingId' => $last_id]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
}

$conn->close();
?>
