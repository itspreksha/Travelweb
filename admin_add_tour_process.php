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
    $source = $_POST['source'];
    $destination = $_POST['destination'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    $sql = "INSERT INTO tours (source, destination, start_date, end_date) VALUES ('$source', '$destination', '$start_date', '$end_date')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Tour added successfully!</p>";
        echo "<a href='admin_schedule_tours.php'>Back to Dashboard</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
