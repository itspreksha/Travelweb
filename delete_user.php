
<!-- delete_user.php -->

<?php
    // Include database configuration and establish connection
    include('db_config.php');

    // Check if user ID is provided in the URL
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];

        // SQL query to delete user by ID
        $sql = "DELETE FROM users WHERE id = $user_id";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Redirect back to manage_users.php with success message
            header('Location: manage_users.php?deleted=true');
            exit();
        } else {
            // Redirect back to manage_users.php with error message
            header('Location: manage_users.php?deleted=false');
            exit();
        }
    } else {
        // Redirect back to manage_users.php if user ID is not provided
        header('Location: manage_users.php');
        exit();
    }
?>
