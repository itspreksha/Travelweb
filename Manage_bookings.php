<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete booking
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql_delete = "DELETE FROM bookings WHERE id = $delete_id";
    if ($conn->query($sql_delete) === TRUE) {
        header("Location: Manage_bookings.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        /* CSS styles for table layout */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .delete-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>

<h2>Manage Bookings</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Payment Method</th>
        <th>Payment Details</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Package</th>
        <th>Total Amount</th>
        <th>Payment Status</th>
        <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $amount_inr = "₹ " . number_format($row["amount"], 2);  // Format amount in INR
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["payment_method"] . "</td>";
            echo "<td>" . $row["payment_details"] . "</td>";
            echo "<td>" . $row["start_date"] . "</td>";
            echo "<td>" . $row["end_date"] . "</td>";
            echo "<td>" . $row["package"] . "</td>";
            echo "<td>" . $amount_inr . "</td>";  // Display amount in INR
            echo "<td>" . $row["payment_status"] . "</td>";
            echo "<td><a href='Manage_bookings.php?delete_id=" . $row["id"] . "' class='delete-btn'>Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='12'>No bookings found</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>
