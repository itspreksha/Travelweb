<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $cancelId = $_GET['id'];
    $sqlCancel = "DELETE FROM Tbookings WHERE id = $cancelId";

    if ($conn->query($sqlCancel) === TRUE) {
        echo "<script>alert('Booking canceled successfully');</script>";
    } else {
        echo "<script>alert('Error canceling booking');</script>";
    }
}

header("Location: index.html");
$conn->close();
?>
