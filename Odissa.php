<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Odissa Tour Guide</title>
<style>
      .container {
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
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    background-color: #f8f8f8;
  }
  .state {
    width: 100%;
    height: auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden; /* Hide any overflowing content */
    padding: 20px;
  }
  .state h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 3rem;
    color: #333;
  }
  .state p {
    font-size: 1.5rem;
    line-height: 1.6;
    color: #666;
    text-align: center;
    max-width: 80%;
    margin: 0 auto 20px;
  }
  .image-container {
    width: 100%;
    overflow: hidden;
    position: relative;
  }
  .slideshow {
    display: flex;
    animation: slide 20s linear infinite; /* Adjust the duration as needed */
  }
  @keyframes slide {
    0% {
      transform: translateX(0);
    }
    100% {
      transform: translateX(-100%); /* Move the slideshow to the left */
    }
  }
  .image-container img {
    width: 500px; /* Set a fixed width for the images */
    height: 450px;
    object-fit: cover;
    flex-shrink: 0; /* Prevent images from shrinking */
  }
  .links {
    display: flex;
    justify-content: space-between;
    width: 60%;
    margin-top: 20px;
  }
  .link-btn {
    padding: 15px 40px;
    font-size: 1.5rem;
    background-color: #ff6f61;
    color: #fff;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s;
  }
  .link-btn:hover {
    background-color: #ff4338;
  }
   .book-tour-btn {
    padding: 15px 40px;
    font-size: 1.5rem;
    background-color: #ff6f61;
    color: #fff;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s;
    margin-top: 20px;
  }
  .book-tour-btn:hover {
    background-color: #ff4338;
  }
  .booking-form {
    display: none;
    width: 80%;
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }  .booking-form input[type="text"],
  .booking-form input[type="email"],
  .booking-form input[type="date"],
  .booking-form button {
    padding: 10px;
    margin: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    width: 200px;
  }
    .fade-in-out {
    position: absolute;
    width: 100%;
    height: 100%;
    animation: fade 5s ease-in-out infinite; /* Adjust the duration as needed */
  }
   @keyframes fade {
    0% {
      opacity: 0;
    }
    20% {
      opacity: 1;
    }
    80% {
      opacity: 1;
    }
    100% {
      opacity: 0;
    }
  
    .image-container img {
    width: 100%;
    height: auto;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
  }
   body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    background-color: #f8f8f8;
  }
   .typing-text {
    font-size: 40px; /* Bigger font size */
    font-weight: bold; /* Bold text */
    color: #333;
    text-align: center;
    margin-top: 100px;
    white-space: nowrap;
    overflow: hidden;
    border-right: .15em solid orange; /* The typewriter cursor */
    animation: typing 3s steps(30, end), blink-caret .5s step-end infinite;
  }
  @keyframes typing {
    from {
      width: 0;
    }
    to {
      width: 100%;
    }
  }
  @keyframes blink-caret {
    from, to {
      border-color: transparent;
    }
    50% {
      border-color: orange;
    }
  }
  
</style>
</head>
<body>

    <div class="state">
  <div class="typing-text" id="typing-text"style="font-size: 3rem; font-weight: bold;">

        <u><h2></h2></u></div>
  <div class="image-container">
    <div class="slideshow">
      <img src="o1.jpg" alt="Odissa Image 1">
      <img src="o2.jpg" alt="Odissa Image 2">
      <img src="o3.jpg" alt="Odissa Image 3">
      <img src="o4.jpg" alt="Odissa Image 4">
      <img src="o5.jpg" alt="Odissa Image 5">
      <img src="o6.jpg" alt="Odissa Image 6">
    </div>
  </div>
  <p>
The stunning architectures, history, dialects, vibrant art music and dance forms make Odisha ever sprightly state of India. Odisha (formerly known as Orissa), the battleground for the famous Kalinga war fought by Ashoka the Great, lies on the country's east coast.
  </p>


<button id="Odissa-btn" class="book-tour-btn" onclick="toggleBookingForm('Odissa')">Book Odissa Tour</button>
  <div id="Odissa-booking-form" class="booking-form">
    <h3>Odissa Tour Booking Form</h3>
    
      <form id="bookForm" action="payments.php" method="post"> 
          <button type="submit">Book Now</button>
      </form>
    <!-- Your booking form fields go here -->
  </div>
</div>

<div class="container">
        <div class="button-container">
            <button class="button" id="toggleItineraryBtn">Show Itinerary</button>
        </div>
        <div id="itinerary" class="itinerary">
       <div class="day">
      
  <!-- Day 1: Bhubaneswar -->
  <h2>Day 1: Bhubaneswar</h2>
  <h3>Morning</h3>
  <ul>
    <li>Visit Lingaraj Temple</li>
    <li>Explore Mukteshwar Temple</li>
  </ul>
  <h3>Afternoon</h3>
  <ul>
    <li>Have lunch at a local restaurant</li>
    <li>Visit the Odisha State Museum</li>
  </ul>
  <h3>Evening</h3>
  <ul>
    <li>Take a stroll around Bindusagar Lake</li>
    <li>Explore Ekamra Kanan Botanical Gardens</li>
  </ul>

  <!-- Day 2: Konark and Puri -->
  <h2>Day 2: Konark and Puri</h2>
  <h3>Morning</h3>
  <ul>
    <li>Visit Konark Sun Temple</li>
  </ul>
  <h3>Afternoon</h3>
  <ul>
    <li>Have lunch at a restaurant near Konark beach</li>
    <li>Enjoy leisure time at Chandrabhaga Beach</li>
  </ul>
  <h3>Evening</h3>
  <ul>
    <li>Visit Jagannath Temple</li>
    <li>Witness the evening aarti</li>
  </ul>

  <!-- Day 3: Puri -->
  <h2>Day 3: Puri</h2>
  <h3>Morning:</h3>
  <ul>
<li>Attend the morning rituals at Jagannath Temple.<li>
<li>Explore Puri Beach and engage in water sports or relax by the shore.<li>
  </ul><!-- comment -->
   <h3>Afternoon</h3>
  <ul>
    <li>Have lunch at a beachside shack.</li>
    <li>Visit the Raghurajpur Artist Village and witness traditional Pattachitra painting.</li>
  </ul>
  <h3>Evening</h3>
  <ul>
    <li>Explore the local markets and shop for handicrafts and souvenirs.</li>
    <li>Enjoy a scenic sunset at Puri Beach.</li>
  </ul>


  <!-- Day 4: Chilika Lake and Cuttack -->
  <h2>Day 4: Chilika Lake and Cuttack</h2>
   <h3>Morning:</h3>
  <ul>
<li>Take a boat ride to explore the bird sanctuary and dolphin point at Chilika Lake..<li>

  </ul><!-- comment -->
   <h3>Afternoon</h3>
  <ul>
    <li>Have lunch at a restaurant near Chilika Lake..</li>
    <li>Visit the stone revetment and fishing harbor at Satpada..</li>
  </ul>
  <h3>Evening</h3>
  <ul>
    <li>Drive to Cuttack..</li>
    <li>Visit the ancient Katak Chandi Temple..</li>
    <li> Explore the markets for traditional Odia sarees and silver filigree work.</li>
  </ul>


  <!-- Day 5: Dhauli and Udayagiri-Khandagiri -->
  <h2>Day 5: Dhauli and Udayagiri-Khandagiri</h2>
  <!-- Add Day 5 itinerary here -->   <h3>Morning:</h3>
  <ul>
<li>Visit Dhauli Shanti Stupa and explore the rock edicts of Ashoka..<li>


  </ul><!-- comment -->
   <h3>Afternoon</h3>
  <ul>
   <li>Have lunch at a local restaurant.</li>
   <li>Explore the ancient Jain caves and rock-cut architecture at Udayagiri and Khandagiri.</li>
  </ul>
  <h3>Evening</h3>
  <ul>
    <li>Return to Bhubaneswar.</li>
    <li>Explore the local markets for last-minute shopping.</li>
    <li> Enjoy a farewell dinner at a traditional Odia restaurant..</li>
  </ul>
       </div>
    <script> 
      document.getElementById('toggleItineraryBtn').addEventListener('click', function() {
            var itinerary = document.getElementById('itinerary');
            itinerary.classList.toggle('show');
        });    
    function toggleBookingForm(city) {
    const bookingForm = document.getElementById(city + "-booking-form");
    if (bookingForm.style.display === "none") {
      bookingForm.style.display = "block";
    } else {
      bookingForm.style.display = "none";
    }
  }
  text =  "Welcome to Odissa";
  let index = 0;

  function typeWriter() {
    if (index < text.length) {
      document.getElementById("typing-text").innerHTML += text.charAt(index);
      index++;
      setTimeout(typeWriter, 100); // Adjust the typing speed (milliseconds)
    }
  }

  // Start typing when the page loads
  window.onload = function() {
    typeWriter();
  };
</script>
</body>
</html>
