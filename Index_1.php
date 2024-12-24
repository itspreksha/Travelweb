<?php
$host = 'localhost';
$dbname = 'project';
$username = 'root';
$password = '';

$hotels = []; // Initialize an empty array to hold hotel recommendations

// Initialize variables to set default form values
$city = 'Chennai';
$rating = '3';
$check_in_date = '';
$check_out_date = '';
$rooms = '1';
$room_type = 'standard';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Process form submission and fetch hotel recommendations
        if(isset($_GET['search'])) {
            $city = $_GET['city'] ?? 'Chennai';
            $rating = $_GET['rating'] ?? '3';
            $check_in_date = $_GET['check_in_date'] ?? '';
            $check_out_date = $_GET['check_out_date'] ?? '';
            $rooms = $_GET['rooms'] ?? '1';
            $room_type = $_GET['room_type'] ?? 'standard';

            // Fetch hotel recommendations based on provided criteria
            $stmt = $conn->prepare("SELECT * FROM hotels WHERE city = :city AND star_rating = :rating AND rooms >= :rooms AND room_type = :room_type");
            $stmt->bindParam(':city', $city);
            $stmt->bindParam(':rating', $rating);
            $stmt->bindParam(':rooms', $rooms);
            $stmt->bindParam(':room_type', $room_type);
            $stmt->execute();
            $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Recommendations</title>
    <style> 
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="date"], input[type="number"], button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #555;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px auto;
            max-width: 600px;
        }

        li {
            background-color: #fff;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .hotel-card img {
            max-width: 100%;
            height: auto;
        }

        .book-button {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .book-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Hotel Recommendations</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">

        <label for="city">City:</label>
        <select name="city" id="city">
            <option value="Delhi" <?php if ($city == 'Delhi') echo 'selected'; ?>>Delhi</option>
            <option value="Mumbai" <?php if ($city == 'Mumbai') echo 'selected'; ?>>Mumbai</option>
            <option value="Bangalore" <?php if ($city == 'Bangalore') echo 'selected'; ?>>Bangalore</option>
            <option value="Chennai" <?php if ($city == 'Chennai') echo 'selected'; ?>>Chennai</option>
            <option value="Kolkata" <?php if ($city == 'Kolkata') echo 'selected'; ?>>Kolkata</option>
            <option value="Ahmedabad" <?php if ($city == 'Ahmedabad') echo 'selected'; ?>>Ahmedabad</option>
        </select><br>
        <label for="rating">Star Rating:</label>
        <select name="rating" id="rating">
            <option value="3" <?php if ($rating == '3') echo 'selected'; ?>>3 Star</option>
            <option value="4" <?php if ($rating == '4') echo 'selected'; ?>>4 Star</option>
            <option value="5" <?php if ($rating == '5') echo 'selected'; ?>>5 Star</option>
        </select><br>
        <label for="check_in_date">Check-in Date:</label>
        <input type="date" name="check_in_date" id="check_in_date" value="<?php echo $check_in_date; ?>"><br>
        <label for="check_out_date">Check-out Date:</label>
        <input type="date" name="check_out_date" id="check_out_date" value="<?php echo $check_out_date; ?>"><br>
        <label for="room_type">Room Type:</label>
        <select name="room_type" id="room_type">
            <option value="standard" <?php if ($room_type == 'standard') echo 'selected'; ?>>Standard Room</option>
            <option value="deluxe" <?php if ($room_type == 'deluxe') echo 'selected'; ?>>Deluxe Room</option>
            <option value="suite" <?php if ($room_type == 'suite') echo 'selected'; ?>>Suite</option>
        </select><br>
       
        <label for="rooms">Number of Rooms:</label>
        <input type="number" name="rooms" id="rooms" value="<?php echo $rooms; ?>">

        <button type="submit" name="search">Search</button>

    </form>

    <h2>Search Results</h2>
    <?php if (count($hotels) > 0) { ?>
        <ul>
            <?php foreach ($hotels as $hotel) { ?>
                <li>
                    <div class="hotel-card">
                        <img src="<?php echo $hotel['image']; ?>" alt="<?php echo $hotel['name']; ?>"><br><br>
                        <?php echo $hotel['name']; ?> - <?php echo $hotel['address']; ?><br>
                        <?php echo ucfirst($room_type); ?> Price: <?php echo '₹' . $hotel[$room_type . '_price']; ?> per room<br>
                        Total Price: <?php echo '₹' . ($hotel[$room_type . '_price'] * $rooms); ?> for <?php echo $rooms; ?> room(s)<br><br>
                        <button class="book-button" onclick="bookHotel(<?php echo $hotel['id']; ?>)">Book Now</button>
                    </div>
                </li>
            <?php } ?>
        </ul>
    <?php } else { ?>
        <p>No hotels found.</p>
    <?php } ?>
        
    <script>
     
    function bookHotel(hotelId) {
        // Redirect to HotelBook.php with the hotel ID and other details as query parameters
        var checkInDate = document.getElementById('check_in_date').value;
        var checkOutDate = document.getElementById('check_out_date').value;
        var rooms = document.getElementById('rooms').value;
        var roomType = document.getElementById('room_type').value;

        // Encode URI components to handle special characters
        window.location.href = 'HotelBook.php?hotel_id=' + hotelId +
                                '&check_in_date=' + encodeURIComponent(checkInDate) +
                                '&check_out_date=' + encodeURIComponent(checkOutDate) +
                                '&rooms=' + encodeURIComponent(rooms) +
                                '&room_type=' + encodeURIComponent(roomType);
    }


    </script>
</body>
</html>
