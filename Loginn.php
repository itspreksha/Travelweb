
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
      background-color: #222; /* Dark background color */
    }

    .background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('login.jpg') no-repeat center center/cover;
      z-index: -1;
      filter: blur(10px);
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-box {
      width: 350px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.8); /* Transparent white background */
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3); /* Shadow effect */
      border-radius: 10px;
      overflow: hidden;
      position: relative;
    }

    .login-box h2 {
      color: #333;
      text-align: center;
      margin-bottom: 30px;
    }

    .textbox {
      position: relative;
      margin-bottom: 20px;
    }

    .textbox input {
      width: 100%;
      padding: 10px;
      background: rgba(255, 255, 255, 0.8); /* Slightly transparent input background */
      border: none;
      outline: none;
      color: #333;
      font-size: 16px;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .textbox input:focus {
      background: rgba(255, 255, 255, 0.8); /* Darker transparent background on focus */
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
    h1{
        text-align: center;
        color: white;
    }
  </style>
</head>
<body>
  <div class="header">
  	<h1>Login</h1>
  </div>
	   <div class="background"></div>   
  <div class="container">
    <div class="login-box">
  <form method="post" action="Loginn.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
            Not yet a member? <a href="register.php">Sign up</a><br><br>
                 <a href="admin_login.php">Admin Login</a>
      <!-- End of Navigation Links -->
      
  	</p>
  </form>
    </div></div></div>
</body>
</html>