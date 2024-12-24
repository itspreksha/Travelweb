<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete booking if delete button is clicked
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $sqlDelete = "DELETE FROM Tbookings WHERE id = $deleteId";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "<script>alert('Booking deleted successfully');</script>";
    } else {
        echo "<script>alert('Error deleting booking');</script>";
    }
}

$sql = "SELECT * FROM Tbookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            color: #007bff;
            cursor: pointer;
            margin-right: 10px;
        }

        a:hover {
            text-decoration: underline;
        }

        .delete-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

    </style>
</head>
<body>

<h2>Admin Dashboard</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Payment Option</th>
        <th>Payment Details</th>
        <th>Location</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["start_date"] . "</td>";
            echo "<td>" . $row["end_date"] . "</td>";
            echo "<td>" . $row["payment_option"] . "</td>";
            echo "<td>" . $row["payment_details"] . "</td>";
            echo "<td>" . $row["location"] . "</td>";
            echo "<td><a href='admin_tour_booking.php?delete_id=" . $row["id"] . "' class='delete-btn'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='8'>No bookings found.</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
