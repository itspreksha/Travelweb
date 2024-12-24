
<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}


   ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

/* Admin Login Page */
.login-container {
    width: 300px;
    margin: 100px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.login-container h2 {
    text-align: center;
    margin-bottom: 20px;
}

.login-container input[type="text"],
.login-container input[type="password"],
.login-container button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.login-container button {
    background-color: #4caf50;
    color: white;
    cursor: pointer;
}

.login-container button:hover {
    background-color: #45a049;
}

/* Admin Dashboard */
.dashboard-container {
    display: flex;
    height: 100vh;
}

.sidebar {
    width: 250px;
    background-color: #333;
    color: #fff;
}

.sidebar h2 {
    padding: 20px;
    margin: 0;
    background-color: #222;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    padding: 10px;
}

.sidebar ul li a {
    color: #fff;
    text-decoration: none;
}

.sidebar ul li a:hover {
    background-color: #555;
}

.main-content {
    flex: 1;
    padding: 20px;
}

.main-content h2 {
    margin-top: 0;
}
</style>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <h2>Admin Dashboard</h2>
            <ul>
                <li><a href="admin_dashboard.php">Dashboard</a></li>
                <li><a href="manage_users.php">Manage Users</a></li>
                 <li><a href="manage_bookings.php">Manage Bookings</a></li>
            
                <li><a href="admin_services.php">Manage Services</a></li>
                <li><a href="admin_tour_booking.php">Tour Booking</a></li>
                 <li><a href="admin_hotelbooking.php">Hotel Bookings</a></li>
                <li><a href="admin_schedule_tours.php">Schedule Tours</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="main-content">
            <h2>Welcome, Admin</h2>
         <div class="container">
      <h3>Overview</h3>
                <p>Welcome to the admin dashboard. Here you can manage users, packages, services, and schedule tours.</p>
              
            </div>
    </div>
        </div>
    </div>
    
</body>
</html>
