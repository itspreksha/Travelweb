<!DOCTYPE html>
<html>
<head>
    <title>View Itinerary</title>
    <style>
        /* Add your CSS styles here */
    </style>
</head>
<body>
    <h2>View Itinerary</h2>
    
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_GET['tour_id'])) {
        $tour_id = $_GET['tour_id'];

        $sql = "SELECT * FROM tours WHERE id = $tour_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<h3>Itinerary for Tour from " . $row["source"] . " to " . $row["destination"] . "</h3>";

            $sql = "SELECT * FROM itinerary WHERE tour_id = $tour_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<ul>";
                while($row = $result->fetch_assoc()) {
                    echo "<li><strong>Day " . $row["day"] . ":</strong> " . $row["description"] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No itinerary added yet.</p>";
            }
        } else {
            echo "Tour not found.";
        }
    } else {
        echo "Tour ID not provided.";
    }

    $conn->close();
    ?>
</body>
</html>
