<?php
include 'db_config.php';

// Delete feedback
if (isset($_GET['delete_feedback_id'])) {
    $delete_feedback_id = $_GET['delete_feedback_id'];
    
    $sql = "DELETE FROM feedback WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_feedback_id);

    if ($stmt->execute()) {
        $delete_feedback_message = "Feedback deleted successfully";
    } else {
        $delete_feedback_message = "Error deleting feedback";
    }

    $stmt->close();
}

// Fetch feedback
$sql_feedback = "SELECT * FROM feedback ORDER BY date_created DESC";
$result_feedback = $conn->query($sql_feedback);

// Delete weekly update
if (isset($_GET['delete_weekly_id'])) {
    $delete_weekly_id = $_GET['delete_weekly_id'];
    
    $sql = "DELETE FROM weekly_updates WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $delete_weekly_id);

    if ($stmt->execute()) {
        $delete_weekly_message = "Weekly update deleted successfully";
    } else {
        $delete_weekly_message = "Error deleting weekly update";
    }

    $stmt->close();
}

// Fetch weekly updates
$sql_weekly = "SELECT * FROM weekly_updates ORDER BY date DESC";
$result_weekly = $conn->query($sql_weekly);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .delete-btn {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
        .update-btn {
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 5px;
        }
        .update-btn:hover {
            background-color: #0056b3;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<h1>Manage Services</h1>

<h2>Feedback</h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Rating</th>
            <th>Comments</th>
            <th>Date Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result_feedback->num_rows > 0) {
            while ($row = $result_feedback->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["rating"] . "</td>";
                echo "<td>" . $row["comments"] . "</td>";
                echo "<td>" . $row["date_created"] . "</td>";
                echo "<td>"
                    . "<button class='delete-btn' onclick=\"deleteFeedback(" . $row["id"] . ")\">Delete</button>"
                    . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No feedback available</td></tr>";
        }
        ?>
    </tbody>
</table>

<h2>Weekly Updates</h2>
<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Week Number</th>
                <th>Date</th>
                <th>Title</th>
                <th>Update Content</th>
                <th>Image URL</th>
                <th>BookMyShow URL</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_weekly->num_rows > 0) {
                while ($row = $result_weekly->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["week_number"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["update_content"] . "</td>";
                    echo "<td>" . $row["image_url"] . "</td>";
                    echo "<td>" . $row["bookmyshow_url"] . "</td>";
                    echo "<td>"
                        . "<button class='update-btn' onclick=\"updateWeeklyUpdate(" . $row["id"] . ")\">Update</button>"
                        . "<button class='delete-btn' onclick=\"deleteWeeklyUpdate(" . $row["id"] . ")\">Delete</button>"
                        . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No weekly updates available</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script>
    function deleteFeedback(id) {
        if (confirm('Are you sure you want to delete this feedback?')) {
            window.location.href = 'admin_services.php?delete_feedback_id=' + id;
        }
    }

    function deleteWeeklyUpdate(id) {
        if (confirm('Are you sure you want to delete this weekly update?')) {
            window.location.href = 'admin_services.php?delete_weekly_id=' + id;
        }
    }

    function updateWeeklyUpdate(id) {
        window.location.href = 'update_weekly_update.php?id=' + id
    }
</script>

</body>
</html>

<?php
$conn->close();
?>
