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
    $tour_id = $_POST['tour_id'];
    $day = $_POST['day'];
    $description = $_POST['description'];
    
    $sql = "INSERT INTO itinerary (tour_id, day, description) VALUES ('$tour_id', '$day', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Itinerary added successfully!</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
