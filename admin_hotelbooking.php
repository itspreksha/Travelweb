<?php
$host = 'localhost';
$dbname = 'project';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Function to fetch all bookings
function getAllBookings() {
    global $conn;
    try {
        $stmt = $conn->query("SELECT * FROM hbookings");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

// Example usage:
$bookings = getAllBookings();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Hotel Bookings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
        }

        main {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 1rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .hotel-list, .booking-list {
            margin-top: 2rem;
        }

        .hotel-item, .booking-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding: 1rem;
        }

        .hotel-item:last-child, .booking-item:last-child {
            border-bottom: none;
        }

        .hotel-item button, .booking-item button {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .hotel-item button:hover, .booking-item button:hover {
            background-color: #c82333;
        }

        form div {
            margin-bottom: 1rem;
        }

        form label {
            display: block;
            margin-bottom: 0.5rem;
        }

        form input[type="text"],
        form select {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        form button {
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background-color: #0056b3;
        }

        form::after {
            content: "";
            display: table;
            clear: both;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin - Hotel Bookings</h1>
    </header>

    <main>
        <section id="successful-bookings">
            <h2>Successful Bookings</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Hotel ID</th>
                        <th>Check-in Date</th>
                        <th>Check-out Date</th>
                        <th>Rooms</th>
                        <th>Total Price</th>
                        <th>Payment Method</th>
                        <th>Date Booked</th>
                        <th>Room Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bookings as $booking) { ?>
                        <tr>
                            <td><?php echo $booking['id']; ?></td>
                            <td><?php echo $booking['hotel_id']; ?></td>
                            <td><?php echo $booking['check_in_date']; ?></td>
                            <td><?php echo $booking['check_out_date']; ?></td>
                            <td><?php echo $booking['rooms']; ?></td>
                            <td><?php echo $booking['total_price']; ?></td> <!-- Ensure this matches the column name -->
                            <td><?php echo $booking['payment_method']; ?></td>
                            <td><?php echo $booking['created_at']; ?></td>
                            <td><?php echo $booking['room_type']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>
