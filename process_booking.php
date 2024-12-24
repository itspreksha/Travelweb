<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $payment_method = $_POST['payment_method'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $package = $_POST['package'];
    
    if($package === "Adventure Trekking") {
        $amount = 40000.00;
    } elseif($package === "Beach Paradise") {
        $amount = 30000.00;
    } elseif($package === "Himalayan Adventure") {
        $amount = 50000.00;
    } elseif($package === "Cultural Expedition") {
        $amount = 45000.00;
    } else {
        $amount = 0.00;
    }

    if($payment_method === "UPI") {
        $payment_details = $_POST['upi_id'];
    } else {
        $payment_details = $_POST['cvv'];
    }

    $sql = "INSERT INTO bookings (name, email, phone, payment_method, payment_details, start_date, end_date, package, amount, payment_status) 
            VALUES ('$name', '$email', '$phone', '$payment_method', '$payment_details', '$start_date', '$end_date', '$package', $amount, 'Completed')";

    if ($conn->query($sql) === TRUE) {
        $booking_id = $conn->insert_id;
        $amount_inr = "₹ " . number_format($amount, 2);  // Format amount in INR
        header("Location: payment_success.php?id=$booking_id&amount=$amount_inr");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
