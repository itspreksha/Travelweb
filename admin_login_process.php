<?php
session_start();
include('admin_db_config.php');

try {
    // Check if the connection is established
    if ($conn) {
        if (isset($_POST['login_user'])) {
            // Escape username and password to prevent SQL injection
            $username = isset($_POST['username']) ? mysqli_real_escape_string($conn, $_POST['username']) : '';
            $password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : '';

            // Query to check if the username and password match
            $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";

            // Execute the query
            $result = mysqli_query($conn, $query);

            // Check if the query was executed successfully
            if ($result) {
                // Check if there is exactly one row returned
                if (mysqli_num_rows($result) == 1) {
                    // Set session variable and redirect to admin dashboard
                    $_SESSION['admin'] = $username;
                    mysqli_free_result($result); // Free the result set
                    mysqli_close($conn); // Close the connection
                    header('location: admin_dashboard.php');
                    exit(); // Stop script execution
                } else {
                    // If username or password is incorrect, redirect to login page with error
                    mysqli_free_result($result); // Free the result set
                    mysqli_close($conn); // Close the connection
                    header('location: admin_login.php?error=1');
                    exit(); // Stop script execution
                }
            } else {
                // If query execution failed, handle the error
                throw new Exception("Query execution failed: " . mysqli_error($conn));
            }
        }
    } else {
        // If database connection failed, handle the error
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
} catch (Exception $e) {
    die($e->getMessage());
}
?>
