<!DOCTYPE html>
<html>
<head>
    <title>Admin - Schedule Tours</title>
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

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            width: 350px;
            margin: 0 auto;
            animation: fadeIn 1s ease;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"], textarea, input[type="submit"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
            font-size: 16px;
        }

        input[type="text"]:focus, textarea:focus, input[type="submit"]:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
    <h2>Admin - Schedule Tours</h2>
    
    <h3>Add New Tour</h3>
    <form action="admin_add_tour_process.php" method="post">
        <label for="source">Source:</label>
        <input type="text" id="source" name="source" required>

        <label for="destination">Destination:</label>
        <input type="text" id="destination" name="destination" required>

        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" required>

        <input type="submit" name="submit" value="Add Tour">
    </form>

    <br>

    <h3>Add Itinerary to Existing Tour</h3>
    <form action="admin_add_itinerary.php" method="post">
        <label for="tour_id">Tour ID:</label>
        <input type="text" id="tour_id" name="tour_id" required>

        <label for="day">Day:</label>
        <input type="text" id="day" name="day" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <input type="submit" name="submit" value="Add Itinerary">
    </form>

    <br>

    <h3>All Tours</h3>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM tours";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Action</th>
                </tr>";

        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"]. "</td>
                    <td>" . $row["source"]. "</td>
                    <td>" . $row["destination"]. "</td>
                    <td>" . $row["start_date"]. "</td>
                    <td>" . $row["end_date"]. "</td>
                    <td>
                        <a href='admin_delete_itinerary.php?id=" . $row["id"] . "'>Delete Itinerary</a> | 
                        <a href='admin_delete_itinerary.php?id=" . $row["id"] . "'>Delete Tour</a>
                    </td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
</body>
</html>
