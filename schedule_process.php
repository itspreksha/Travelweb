<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Insert the tour data into the database
    $sql = "INSERT INTO tours (source, destination, start_date, end_date) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $source, $destination, $start_date, $end_date);

    if ($stmt->execute()) {
        $tour_id = $stmt->insert_id; // Get the inserted tour ID

        header("Location: view_itinerary.php?tour_id=$tour_id&start_date=$start_date&end_date=$end_date");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
