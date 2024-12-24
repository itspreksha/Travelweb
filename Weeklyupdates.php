<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weekly Updates - India</title>
      <style>  body {
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
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f8f9fa;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 10px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  
}

h1 {
    text-align: center;
    color: #333;
}

.update {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 20px 0;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

.update:hover {
    transform: translateY(-5px);
}

h2 {
    color: #007bff;
    margin-bottom: 10px;
}

p {
    color: #555;
}
  img {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }

@media screen and (max-width: 768px) {
    .container {
        padding: 100px;
    }

    .update {
        padding: 150px;
    }
}

        </style>
</head>
<body>
    <a href="index.php" class="home-icon">🏠</a>
 <div class="container">
        <h1>Weekly Updates - India</h1>  

        <?php
        // Include the database configuration and any necessary functions
        include('db_config.php');

        // Fetch weekly updates from the database
        $sql = "SELECT * FROM weekly_updates";
        $result = mysqli_query($conn, $sql);

  // Check if updates are available
        if ($result && mysqli_num_rows($result) > 0) {
            // Loop through the updates and display them
            while ($update = mysqli_fetch_assoc($result)) {
                echo "<div class='update'>";
                echo "<h2>Date " . $update['date'] . "</h2>";
                echo "<img src='" . $update['image_url'] . "' alt='Update Image'>";
                echo "<p><h2>" . $update['update_content'] . "</h2></p>";
                echo "<a href='" . $update['bookmyshow_url'] . "' target='_blank'>Book tickets on BookMyShow</a>";
                echo "</div>";
            }
        } else {
            
        }
  

       ?>

   </div>   
   
</body>
</html>
