<?php
$host = 'localhost';
$dbname = 'project';
$username = 'root';
$password = '';

try {
    // Establish database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   // Process form submission
// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $hotel_id = $_POST['hotel_id'] ?? '';
    $check_in_date = $_POST['check_in_date'] ?? '';
    $check_out_date = $_POST['check_out_date'] ?? '';
    $rooms = $_POST['rooms'] ?? '';
    $room_type = $_POST['room_type'] ?? '';
    $payment_method = $_POST['payment_method'] ?? ''; // Retrieve the selected payment method

    // Get hotel details
    $hotel_details = getHotelDetails($conn, $hotel_id);

    // Calculate price per room based on room type
    switch ($room_type) {
        case 'standard':
            $price_per_room = $hotel_details['standard_price']; // Get standard room price from database
            break;
        case 'deluxe':
            $price_per_room = $hotel_details['deluxe_price']; // Get deluxe room price from database
            break;
        case 'suite':
            $price_per_room = $hotel_details['suite_price']; // Get suite room price from database
            break;
        default:
            $price_per_room = 0;
    }

    // Calculate total price
    $total_price = calculateTotalPrice($price_per_room, $rooms);

    try {
        // Insert booking into database
        $stmt = $conn->prepare("INSERT INTO hbookings (hotel_id, check_in_date, check_out_date, rooms, room_type, total_price, payment_method) VALUES (:hotel_id, :check_in_date, :check_out_date, :rooms, :room_type, :total_price, :payment_method)");
        $stmt->bindParam(':hotel_id', $hotel_id);
        $stmt->bindParam(':check_in_date', $check_in_date);
        $stmt->bindParam(':check_out_date', $check_out_date);
        $stmt->bindParam(':rooms', $rooms);
        $stmt->bindParam(':room_type', $room_type);
        $stmt->bindParam(':total_price', $total_price); // Bind total price parameter
        $stmt->bindParam(':payment_method', $payment_method); // Bind payment method parameter
        $stmt->execute();

        // Display success message
        echo "Booking successful!";
    } catch (PDOException $e) {
        // Handle database errors
        echo "Error: " . $e->getMessage();
        // Log the error for debugging
        error_log("Database error: " . $e->getMessage());
    }
}

} catch (PDOException $e) {
    // Handle database connection errors
    echo "Connection failed: " . $e->getMessage();
}

// Function to fetch hotel details
function getHotelDetails($conn, $hotel_id) {
    try {
        $stmt = $conn->prepare("SELECT * FROM hotels WHERE id = :hotel_id");
        $stmt->bindParam(':hotel_id', $hotel_id);
        $stmt->execute();
        
        // Fetch hotel details
        $hotel_details = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($hotel_details) {
            return $hotel_details;
        } else {
            echo "Error: Hotel details not found.";
            return [];
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return [];
    }
}

// Function to calculate total price
function calculateTotalPrice($price_per_room, $rooms) {
    // Check if both price per room and number of rooms are numeric before performing multiplication
    if (is_numeric($price_per_room) && is_numeric($rooms)) {
        return $price_per_room * $rooms;
    } else {
        // Handle the case where one or both variables are not numeric
        echo "Error: Invalid price or number of rooms.";
        return 0;
    }
}

$hotel_id = $_GET['hotel_id'] ?? '';
$check_in_date = $_GET['check_in_date'] ?? '';
$check_out_date = $_GET['check_out_date'] ?? '';
$rooms = isset($_GET['rooms']) ? $_GET['rooms'] : ''; // Retrieve number of rooms from the form
$room_type = $_GET['room_type'] ?? 'standard'; // Default to standard room type

// Get hotel details
$hotel_details = getHotelDetails($conn, $hotel_id);

// Calculate price per room based on room type
switch ($room_type) {
    case 'standard':
        $price_per_room = $hotel_details['standard_price']; // Get standard room price from database
        break;
    case 'deluxe':
        $price_per_room = $hotel_details['deluxe_price']; // Get deluxe room price from database
        break;
    case 'suite':
        $price_per_room = $hotel_details['suite_price']; // Get suite room price from database
        break;
    default:
        $price_per_room = 0;
}

// Calculate total price
$total_price = calculateTotalPrice($price_per_room, $rooms);

// Format total price as INR
$total_price_formatted = '₹' . number_format($total_price, 2);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Hotel</title>
    <!-- Your CSS and JavaScript imports here -->
</head>
<body>
    <header>
        <h1>Book Hotel</h1>
    </header>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .message {
            margin-bottom: 10px;
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }
    </style>
    <main>
        <section id="booking-details-section">
            <h2>Booking Details</h2>
            <div class="booking-details">
                <p>Display booking details here...</p>

                <!-- Add a form to handle booking confirmation -->
                <form action="" method="post">
                    <!-- Include hidden fields for booking details -->
                    <input type="hidden" name="hotel_id" value="<?php echo $hotel_id; ?>">
                    <input type="hidden" name="check_in_date" value="<?php echo $check_in_date; ?>">
                    <input type="hidden" name="check_out_date" value="<?php echo $check_out_date; ?>">
                    <input type="hidden" name="rooms" value="<?php echo $rooms; ?>">
                    <input type="hidden" name="room_type" value="<?php echo $room_type; ?>">
                    

      
                   
                    <p><strong>Hotel ID:</strong> <?php echo $hotel_id; ?></p>
                    <p><strong>Hotel Name:</strong> <?php echo $hotel_details['name']; ?></p>
                    <p><strong>Check-in Date:</strong> <?php echo $check_in_date; ?></p>
                    <p><strong>Check-out Date:</strong> <?php echo $check_out_date; ?></p>
                    <p><strong>Rooms:</strong> <?php echo $rooms; ?></p>
                    <p><strong>Room Type:</strong> <?php echo ucfirst($room_type); ?></p>
                    <p><strong>Total Price:</strong> <?php echo $total_price_formatted; ?></p>

                    <h3>Select Payment Method</h3>
                    <div class="payment-options">
                        <label for="credit_card">
                            <input type="radio" id="credit_card" name="payment_method" value="credit_card">
                            Credit Card
                        </label>
                        <label for="paypal">
                            <input type="radio" id="paypal" name="payment_method" value="paypal">
                            PayPal
                        </label>
                    </div>
                    <button type="submit">Confirm Booking</button>
                </form>
            </div>
        </section>
    </main>
                   
</body>
</html>
