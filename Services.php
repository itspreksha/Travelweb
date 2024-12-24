<?php
// Include database configuration
include('db_config.php');

// Check if the connection is closed and re-establish it if necessary
if (!$conn) {
    $conn = mysqli_connect('localhost',' root',''  ,' project');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <style>body {
        margin: 0;
        padding: 0;
    }

    .home-icon {
        position: fixed;
        top: 20px; /* Adjust the top position as needed */
        left: 20px; /* Adjust the left position as needed */
        display: inline-block;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.8);
        color: white;
        text-align: center;
        line-height: 50px;
        border-radius: 50%;
        font-size: 24px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-decoration: none;
        z-index: 1000; /* Ensure the icon is above other content */
    }

    .home-icon:hover {
   background: #0056b3;
    }
body, h1, h2, h3, p {
    margin: 0;
    padding: 0;
   
}

/* Basic layout styles */
section {
    margin-bottom: 50px;
}

h2 {
    margin-bottom: 20px;
}

/* Tour Types styles */
.tour-type {
    background-color: #f9f9f9;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Weekly Updates styles */
.update {
    background-color: #f0f0f0;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Recommendations styles */
.recommendation {
    background-color: #e0e0e0;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Hover effects */
.tour-type:hover, .update:hover, .recommendation:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}
/* Service card styles */
.service-card {
    background-color: #f9f9f9;
    padding: 20px;
    margin: 0 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 200px;
    transition: transform 0.3s ease;
    text-align: center;
}

.service-card:hover {
    transform: translateY(-5px);
}

.service-card img {
    width: 350px;
    height: 420px;
    /* Remove border-radius property */
    margin-bottom: 15px;
}
.services-container {
    display: flex; /* Use flexbox */
    justify-content: space-around; /* Horizontally distribute items with equal space around */
    flex-wrap: wrap; /* Allow wrapping to the next line if necessary */
}

/* Service card styles */
.service-card {
    background-color: #f9f9f9;
    padding: 20px;
    margin: 10px; /* Add margin to create space between cards */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    height:500px;
    transition: transform 0.3s ease;
    text-align: center;
}
.services-title {
    text-align: center; /* Center-align the content */
}

</style>
</head>
<body>
<a href="index.php" class="home-icon">🏠</a>
  <section class="services-title">
      <h1>Our Services</h1>
    <div class="services-container">
       
           <div class="service-card">
            <a href="weeklyupdates.php">
                <img src="weekend.jpg" alt="Weekly Updates">
                <h3>Weekly Updates</h3>
                <p>Stay updated with our latest news and events.</p>
            </a><!-- comment -->
            
          </div>  
        
   
          
          
        <div class="service-card">
            <a href="recommendations.php">
                <img src="feedback.jpg" alt="Recommendations">
                <h3>Recommendations</h3>
                <p>Discover our recommended destinations.</p>
            </a>
          
        </div>
    </div>
</section>
        </section>
    </div>
     <?php
                // Fetch and display tour types from the database
             $sql = "SELECT * FROM tour_types";

                $result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='tour-type'>";
                        echo "<h3>" . $row['type_name'] . "</h3>";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No tour types available.</p>";
                }
                ?>

</body>
</html>
