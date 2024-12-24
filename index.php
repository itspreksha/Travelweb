<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: Loginn.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: Loginn.php");
  }
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Home Page</title>
    <style>   

body {
  font-size: 120%;
  background: beige;  margin: 5px;
  padding: 5px;

}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 10px;
}
form, .content {
  width: 10%;
    display: inline-block;
    margin: 0 3px;
    font-size: 24px;
    color: white;
    text-decoration: none;
     text-align: right;
    color: white;
    margin-top: 20px;
     color: #007bff;

}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
   color: white; 
  background: rgba(255, 255, 255, 0.5); 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
        /* Add this CSS to your styles.css file */
body {
    font-family: Arial, sans-serif;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropbtn {
    background-color: transparent;
    color: white;
    font-size: 20px;
    border: none;
    cursor: pointer;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: transparent;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(212, 202, 202, 0.948);
    z-index: 1;
}

.dropdown-content a {
    color: whitesmoke;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}  
.dropdown-content a:hover {
            background-color: #ddd;
        }

        /* Display the dropdown content on hover */
        .dropdown:hover .dropdown-content {
            display: block;
        }
  
.show {
    display: block;
}

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevent scrollbars for the video */
        }

      

        video {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 100%; /* Set the width to 100% of the viewport width */
            height: auto;
            z-index: -1;
            
        }

       

        nav a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        section {
            color: beige;
            padding: 20px;
            text-align: center;
        }
.icons {
    text-align: right;
    color: blue;
    margin-top: 5px;
}
.icon-link {
    display: inline-block;
    margin: 1px 3px;
    font-size: 24px;
    color: beige;
    text-decoration: none;
  
}

.icon-link:hover {
    color: #007bff;
}
</style>
</head>
<body>
    <div class="dropdown">
        <button class="dropbtn" onclick="toggleDropdown()">☰</button>
        <div class="dropdown-content" id="myDropdown">
            <a href="index.php">Home</a>
            <a href="beginthejourney.html">Begin Your Journey</a>
            <a href="Packages.php">Packages</a>
      <a href="schedule_tour.php">Schedule tours</a>
             <a href="index_1.php">Stay in</a>
      
               <a href="pickyourtrail.html">Pick Your Trail</a>
                <a href="Services.php">Services</a>
            <a href="contact us.php">help   </a>
        </div>
    </div>
     <div class="icons">
          
          
            <div class="content">
                
  	<!-- notification message -->
   	<!-- notification message -->
<?php if (isset($_SESSION['success'])) : ?>
  <div class="error success" >
  	<h3>
      <?php 
      	echo $_SESSION['success']; 
      	unset($_SESSION['success']);
      ?>
  	</h3>
  </div>
<?php endif ?>


    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
   <strong style="color: white;">  <p>Welcome<br><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: white;">logout</a> </p>
    <?php endif ?>
</div>
 </div></div>
        </div>
    <script>
        function toggleDropdown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }
    
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
<video autoplay muted loop>
    <source src="Cinematic Simple Professional Stories of Nature Conservation Video.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>

<header>
    <h1></h1>
</header>


<section>
    
   
</section>






</body>
</html>