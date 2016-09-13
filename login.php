<!DOCTYPE html>
<html>
<head>
  <title>UMW Tennis Center - Login</title>
  <meta charset= "UTF-8"/>
<link type="text/css" rel="stylesheet" href="style.css"/>
<link rel="icon" type="image/x-icon" href="fav/favicon.ico">
<script src="http://www.w3schools.com/lib/w3data.js"></script>
</head>
<body>
  <div w3-include-html="menu.html" action="loginscript.php" class = "menu"> </div>
  <script>
  	w3IncludeHTML();
  </script>
  <div class="content">  
  <h1>UMW Tennis Center Account Login</h1>
  <?php
        session_start();
  
	$userId = $_SESSION["user_id"];
	
	if($userId > 0) {
		
		echo "<p>Sorry, you are already logged in and therefore can't log into another account.</p>";
		echo "<p><a href = 'logout.php'> [LOGOUT OF THIS ACCOUNT]</a></p>";
		exit();
	}
  
  ?>
        <form class="registration" action="loginscript.php" method="post">
  	<label>Email: </label><input type="email" name="email" id="email" required/><br />  	
        <label>Password: </label><input type="password" id="password" name="password" required/><br />
	<br />
	<input type="submit" name="submit" value="Login" />
  </form>
  	
  	<h3><a href = "register.php">Looking to REGISTER a new employee account? Click here (secret code required)</a></h3>
</div>
</body>
</html>
