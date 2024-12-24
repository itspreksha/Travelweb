<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the itinerary for the tour
    $sql1 = "DELETE FROM itinerary WHERE tour_id=$id";

    if ($conn->query($sql1) === TRUE) {
        // Delete the tour
        $sql2 = "DELETE FROM tours WHERE id=$id";

        if ($conn->query($sql2) === TRUE) {
            echo "<p>Tour and itinerary deleted successfully!</p>";
        } else {
            echo "Error deleting tour: " . $conn->error;
        }
    } else {
        echo "Error deleting itinerary: " . $conn->error;
    }
}

$conn->close();
?>
