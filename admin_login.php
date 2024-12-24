<?php
session_start();

$errors = array(); 

// Connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');

if (isset($_POST['login_admin'])) {
    // Retrieve admin input
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Validate input
    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    // Authenticate admin
    if (count($errors) == 0) {
        $password = md5($password); // Hash the password
        $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['admin'] = true; // Set admin session variable
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in as admin";
            header('location: admin_dashboard.php'); // Redirect admin to dashboard
        } else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    .container {
      max-width: 400px;
      margin: 100px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    input[type="text"],
    input[type="password"],
    button {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }
    button {
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
    .error {
      color: #dc3545;
      margin-top: 10px;
    }
  </style>
</head>

<body>
    <div class="login-container">
        <form action="admin_login_process.php" method="post">
            <h2>Admin Login</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login_user">Login</button>
        </form>
    </div>
</body>
</html>

