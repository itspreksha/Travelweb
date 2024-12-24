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

if ($conn->query($sql) === TRUE) {
    echo "Payment details added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();  // Close the database connection
?>
