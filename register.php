

<?php include('Server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
 
<style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-image: url("l.jpeg");
      background-size: 100%;
      background-color: #222;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .registration-box {
      width: 350px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.5); /* Transparent white background */
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Shadow effect */
      border-radius: 10px;
      overflow: hidden;
      position: relative;
    }

    .registration-box h2 {
      color: #333;
      text-align: center;
      margin-bottom: 30px;
    }

    .input-group {
      margin-bottom: 20px;
    }

    .input-group label {
      display: block;
      margin-bottom: 5px;
      color: #333;
    }

    .input-group input {
      width: 100%;
      padding: 10px;
      background: rgba(255, 255, 255, 0.9); /* Slightly transparent input background */
      border: none;
      outline: none;
      color: #333;
      font-size: 16px;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .input-group input:focus {
      background: rgba(255, 255, 255, 0.8);
    }

    .btn {
      width: 100%;
      padding: 10px;
      background: linear-gradient(90deg, #36d1dc, #5b86e5);
      border: none;
      outline: none;
      color: #fff;
      font-size: 16px;
      cursor: pointer;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background: linear-gradient(90deg, #5b86e5, #36d1dc);
    }

    .error-msg {
      color: #ff6347;
      margin-top: 10px;
      text-align: center;
      display: none;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 10px;
      text-decoration: none;
      color: #333;
    }
    h2{
        text-align: center;
        color: white;
    }
</style>
</head>

<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	<div class="container">
    <div class="registration-box">
      <h2>Register as a Tourist</h2>
 
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="Loginn.php">Sign in</a>
  	</p>
  </form>
</body>
</html>



