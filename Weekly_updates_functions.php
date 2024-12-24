<?php
// Include database configuration and establish connection
include 'feedback_db_config.php';

// Function to fetch weekly updates
function getWeeklyUpdates() {
    global $conn;
    $sql = "SELECT * FROM weekly_updates ORDER BY week_number ASC";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error fetching weekly updates: " . mysqli_error($conn));
    }

    $updates = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $updates;
}

// Function to add a new weekly update
function addWeeklyUpdate($date, $title, $content) {
    global $conn;
    $sql = "INSERT INTO weekly_updates (date, title, update_content) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die("Error preparing statement: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sss", $date, $title, $content);
    $success = mysqli_stmt_execute($stmt);

    if (!$success) {
        die("Error adding weekly update: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
}



// Check if updates exist
if ($updates) {
    // Loop through the updates and display them
    foreach ($updates as $update) {
        echo "<div class='update'>";
        echo "<h2>Week " . $update['date'] . "</h2>";
        echo "<img src='" . $update['image_url'] . "' alt='Update Image'>";
        echo "<p>" . $update['update_content'] . "</p>";
        echo "<a href='" . $update['bookmyshow_url'] . "' target='_blank'>Book tickets on BookMyShow</a>";
        echo "</div>";
    }
} else {
    echo "<p>No updates available.</p>";
}
?>
