<?php
// Database configuration
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'project';

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Function to fetch all weekly updates
function getWeeklyUpdates() {
    global $conn;
    $sql = "SELECT * FROM weekly_updates ORDER BY week_number ASC";
    $result = mysqli_query($conn, $sql);
    $updates = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $updates;
}

// Function to add a new weekly update
function addWeeklyUpdate($week_number, $title, $content) {
    global $conn;
    $sql = "INSERT INTO weekly_updates (week_number, title, content) VALUES ('$week_number', '$title', '$content')";
    mysqli_query($conn, $sql);
}

// Add more functions for updating and deleting weekly updates

// Close the database connection

?>
