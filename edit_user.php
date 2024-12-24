<?php
session_start();

// Check if the user is logged in as admin
if (!isset($_SESSION['admin'])) {
    header('Location: admin_login.php');
    exit();
}

// Include the database configuration
include('db_config.php');

// Fetch user details based on ID from URL parameter
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = $userId";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
}

// Handle form submission to update user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Update user details in the database
    $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$userId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Redirect back to user list page upon successful update
        header('Location: manage_users.php');
        exit();
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
        <button type="submit">Save</button>
    </form>
</body>
</html>
