<!DOCTYPE html>
<html>
<head>
    <title>View Itinerary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h2, h3 {
            text-align: center;
            margin-top: 20px;
            color: #007bff;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
        }

        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #0056b3;
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
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
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];

    $stmt = $conn->prepare("SELECT * FROM tours WHERE id = ?");
    $stmt->bind_param("i", $tour_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<h3>Itinerary for Tour from " . $row["source"] . " to " . $row["destination"] . " (Start Date: " . $start_date . " - End Date: " . $end_date . ")</h3>";

        $stmt = $conn->prepare("SELECT * FROM itinerary WHERE tour_id = ?");
        $stmt->bind_param("i", $tour_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<h4>Itinerary List:</h4>";
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
    echo "<p>No tour selected.</p>";
}

$conn->close();
?>
        

</body>
</html>
