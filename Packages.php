<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Travel Packages</title>
<style> 
    body {
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
    padding: 0;
    overflow-x: hidden;
    background-color: #f8f8f8;
    text-align: center;
   
  }
.packages {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  text-align: center;
}

.package-card {
  width: 45%; /* Adjust the width as needed */
  margin: 20px;
  height:70%;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.package-card img {
  width: 100%;
  height: 300px;
  object-fit: cover;
}

.package-details {
  padding: 20px;
}

.package-details h3 {
  margin-top: 0;
}

.btn {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.btn:hover {
  background-color: #0056b3;
} .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .button-container {
            margin-bottom: 20px;
            animation: fadeIn 1s ease-in-out;
        }

        .itinerary {
            display: none;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }

        .show {
            display: block;
        }

        .button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #0056b3;
        }

</style>
</head>
<body>
       <a href="index.php" class="home-icon">🏠</a>
  <h1>Travel Packages</h1>

  <div class="packages">
    <!-- Package 1: Adventure Trekking -->
    <div class="package-card">
      <img src="Trek.jpg" alt="Package 1 Image">
      <div class="package-details">
        <h3>Adventure Trekking</h3>
        <p>Description: Explore the Himalayan trails on an adventurous trekking expedition.</p>
        <p>Duration: 5 days</p>
           <p>Price: 40000/= per person</p>    
        <div class="container">
          <div class="button-container">
                <button class="button" id="toggleItineraryBtn1">Show Itinerary</button>  
                <a href="Bookingform.php" class="btn">Book Now</a>
            </div>
            <div id="itinerary1" class="itinerary">
                <div class="day">
                    <h4>Itinerary:</h4>
                    <ul>
                        <li>Day 1: Arrival at base camp and orientation</li>
                        <li>Day 2: Trek to the first campsite</li>
                        <li>Day 3: Explore the surroundings and acclimatization</li>
                        <li>Day 4: Trek to higher altitude</li>
                        <li>Day 5: Descend back to base camp and departure</li>
                    </ul>
                 
                </div>
            </div>
        </div>
      </div>
    </div>
    
    <!-- Package 2: Beach Paradise -->
    <div class="package-card">
      <img src="Beach.jpg" alt="Package 2 Image">
      <div class="package-details">
        <h3>Beach Paradise</h3>
        <p>Description: Relax and unwind on the beautiful beaches of Goa.</p>
        <p>Duration: 5 days</p>
        <p>Price:30000/= per person</p>
        <div class="container">
            <div class="button-container">
                <button class="button" id="toggleItineraryBtn2">Show Itinerary</button> 
                <a href="Bookingform.php" class="btn">Book Now</a>
            </div>
            <div id="itinerary2" class="itinerary">
                <div class="day">
                    <h4>Itinerary:</h4>
                    <ul>
                        <li>Day 1: Arrival in Goa and check-in to beach resort</li>
                        <li>Day 2: Beach activities and water sports</li>
                        <li>Day 3: Explore nearby attractions</li>
                        <li>Day 4: Leisure day for relaxation</li>
                        <li>Day 5: Departure from Goa</li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
    
    <!-- Package 3: Himalayan Adventure -->
    <div class="package-card">
      <img src="Himalaya.jpg" alt="Package 3 Image">
      <div class="package-details">
        <h3>Himalayan Adventure</h3>
        <p>Description: Trek through the majestic Himalayas and experience breathtaking views.</p>
        <p>Duration: 10 days</p>
        <p>Price: 50000/= per person</p>
        <div class="container">
            <div class="button-container">
                <button class="button" id="toggleItineraryBtn3">Show Itinerary</button>
                <a href="Bookingform.php" class="btn">Book Now</a>
            </div>
            <div id="itinerary3" class="itinerary">
                <div class="day">
                    <h4>Itinerary:</h4>
                    <ul>
                        <li>Day 1: Arrival in Kathmandu</li>
                        <li>Day 2: Drive to Pokhara and preparation for trek</li>
                        <li>Day 3: Trek to Annapurna Base Camp</li>
                        <li>Day 4: Acclimatization and exploration</li>
                        <li>Day 5: Trek to Machapuchare Base Camp</li>
                        <li>Day 6: Summit day at Machapuchare Peak</li>
                        <li>Day 7: Descend to Pokhara</li>
                        <li>Day 8: Leisure day in Pokhara</li>
                        <li>Day 9: Return to Kathmandu</li>
                        <li>Day 10: Departure</li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
    
    <!-- Package 4: Cultural Expedition -->
    <div class="package-card">
      <img src="Culture.jpg" alt="Package 4 Image">
      <div class="package-details">
        <h3>Cultural Expedition</h3>
        <p>Description: Immerse yourself in the rich culture and heritage of Rajasthan.</p>
        <p>Duration: 8 days</p>
        <p>Price: 45000/= per person</p>
        <div class="container">
            <div class="button-container">
                <button class="button" id="toggleItineraryBtn4">Show Itinerary</button>
                 <a href="Bookingform.php" class="btn">Book Now</a>
            </div>
            <div id="itinerary4" class="itinerary">
                <div class="day">
                    <h4>Itinerary:</h4>
                    <ul>
                        <li>Day 1: Arrival in Jaipur and visit to Amber Fort</li>
                        <li>Day 2: Sightseeing in Jaipur (City Palace, Jantar Mantar, Hawa Mahal)</li>
                        <li>Day 3: Travel to Jodhpur and visit to Mehrangarh Fort</li>
                        <li>Day 4: Explore Jodhpur (Jaswant Thada, Umaid Bhawan Palace)</li>
                        <li>Day 5: Drive to Udaipur and visit to City Palace</li>
                        <li>Day 6: Sightseeing in Udaipur (Lake Pichola, Jag Mandir)</li>
                        <li>Day 7: Travel to Pushkar and visit to Brahma Temple</li>
                        <li>Day 8: Return to Jaipur and departure</li>
                    </ul>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function toggleItinerary(id) {
        var itinerary = document.getElementById('itinerary' + id);
        itinerary.classList.toggle('show');
    }

    document.getElementById('toggleItineraryBtn1').addEventListener('click', function() {
        toggleItinerary(1);
    });

    document.getElementById('toggleItineraryBtn2').addEventListener('click', function() {
        toggleItinerary(2);
    });

    document.getElementById('toggleItineraryBtn3').addEventListener('click', function() {
        toggleItinerary(3);
    });

    document.getElementById('toggleItineraryBtn4').addEventListener('click', function() {
        toggleItinerary(4);
    });
    
  </script>

</body>
</html>
