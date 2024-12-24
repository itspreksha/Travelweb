<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sikkim Tour Guide</title>
<style>    body {
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
<a href="index.php" class="home-icon">🏠</a>
    <div class="state">
  <div class="typing-text" id="typing-text"style="font-size: 3rem; font-weight: bold;">

        <u><h2></h2></u></div>
  <div class="image-container">
    <div class="slideshow">
      <img src="Sik1.jpg" alt="Sikkim Image 1">
      <img src="Sik2.jpg" alt="Sikkim Image 2">
      <img src="Sik3.jpg" alt="Sikkim Image 3">
      <img src="Sik4.jpg" alt="Sikkim Image 4">
      <img src="Sik5.jpg" alt="Sikkim Image 5">
      <img src="Sik6.jpg" alt="Sikkim Image 6">
    </div>
  </div>
  <p>
Sikkim is a state in India that is notable for its biodiversity, including alpine and subtropical climates, as well as being a host to Kangchenjunga, the highest peak in India and third highest on Earth1. It is the least populous and second smallest among the Indian states1. Sikkim is famous for dazzling waterfalls, virgin forests, Tibetan style Buddhist Gompas, alpine meadows, rhododendron flowers and more.
  </p>


<button id="Sikkim-btn" class="book-tour-btn" onclick="toggleBookingForm('Sikkim')">Book Sikkim Tour</button>
  <div id="Sikkim-booking-form" class="booking-form">
    <h3>Sikkim Tour Booking Form</h3>
    
      <form id="bookForm" action="payments.php" method="post"> 
          <button type="submit">Book Now</button>
      </form>
    <!-- Your booking form fields go here -->
  </div>
</div></div> <div class="container">
        <div class="button-container">
            <button class="button" id="toggleItineraryBtn">Show Itinerary</button>
        </div>
        <div id="itinerary" class="itinerary">
       <div class="day">
      <!-- Day 1: Arrival in Gangtok -->
  <h2>Day 1: Arrival in Gangtok</h2>
  <h3>Morning</h3>
  <ul>
    <li>Arrive in Gangtok</li>
    <li>Check-in at your hotel</li>
  </ul>
  <h3>Afternoon</h3>
  <ul>
    <li>Have lunch at a local restaurant</li>
    <li>Visit Enchey Monastery</li>
  </ul>
  <h3>Evening</h3>
  <ul>
    <li>Explore MG Marg for shopping and dining</li>
    <li>Relax and enjoy the evening at your hotel</li>
  </ul>

  <!-- Day 2: Gangtok to Tsomgo Lake and Baba Mandir -->
  <h2>Day 2: Gangtok to Tsomgo Lake and Baba Mandir</h2>
  <h3>Morning</h3>
  <ul>
    <li>Drive to Tsomgo Lake</li>
    <li>Enjoy the scenic beauty of the lake</li>
  </ul>
  <h3>Afternoon</h3>
  <ul>
    <li>Visit Baba Mandir</li>
    <li>Have lunch en route</li>
  </ul>
  <h3>Evening</h3>
  <ul>
    <li>Return to Gangtok</li>
    <li>Relax and explore local eateries</li>
  </ul>

  <!-- Day 3: Gangtok to Lachung -->
  <h2>Day 3: Gangtok to Lachung</h2>
  <h3>Morning</h3>
  <ul>
    <li>Depart for Lachung</li>
    <li>Stop at Singhik Viewpoint for breathtaking views</li>
  </ul>
  <h3>Afternoon</h3>
  <ul>
    <li>Have lunch en route</li>
    <li>Visit Seven Sisters Waterfalls</li>
  </ul>
  <h3>Evening</h3>
  <ul>
    <li>Check-in at your hotel in Lachung</li>
    <li>Relax and enjoy the serene ambiance</li>
  </ul>

  <!-- Day 4: Yumthang Valley and Zero Point -->
  <h2>Day 4: Yumthang Valley and Zero Point</h2>
  <h3>Morning</h3>
  <ul>
    <li>Visit Yumthang Valley, also known as the Valley of Flowers</li>
    <li>Explore the natural beauty and hot springs</li>
  </ul>
  <h3>Afternoon</h3>
  <ul>
    <li>Drive to Zero Point</li>
    <li>Experience the snow-covered landscape (subject to weather conditions)</li>
  </ul>
  <h3>Evening</h3>
  <ul>
    <li>Return to Lachung</li>
    <li>Relax and unwind at your hotel</li>
  </ul>

  <!-- Day 5: Return to Gangtok -->
  <h2>Day 5: Return to Gangtok</h2>
  <h3>Morning</h3>
  <ul>
    <li>Check-out from your hotel in Lachung</li>
    <li>Drive back to Gangtok</li>
  </ul>
  <h3>Afternoon</h3>
  <ul>
    <li>Have lunch en route</li>
    <li>Stop at Bhim Nala Waterfall for a quick break</li>
  </ul>
  <h3>Evening</h3>
  <ul>
    <li>Arrive in Gangtok</li>
    <li>Enjoy your last evening exploring the local markets and eateries</li>
  </ul>


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
  text =  "Welcome to Sikkim";
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
