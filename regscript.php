<HTML>
<HEAD>
<TITLE>Processing Registration</TITLE>
</HEAD>
<BODY>
<?php   
    session_start();
	include('mydbinfo.php');
	$conn = @mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	if ( !$conn ) {
		echo("<p> Unable to connect to the database system" .
		"Please try later. </p>");
		exit();
	}

	$name = htmlspecialchars($_POST["name"]);
	$phone = htmlspecialchars($_POST["phone"]);
    	$email = htmlspecialchars($_POST["email"]);
	$status = htmlspecialchars($_POST["status"]);
    	$month = htmlspecialchars($_POST["month"]);
	$year = htmlspecialchars($_POST["year_start"]);
	$password = htmlspecialchars($_POST["password"]);
	
	$secretCode = htmlspecialchars($_POST["secretCode"]);
	$secretCode2 = 'tennisemployee16';
	
	if(strcmp($secretCode, $secretCode2)) {
	
		echo("<p>You did not enter in the correct employee code. To prevent abuse
		of the system, this is required for registration.</p>");
		
		echo("<p>Please click the back button on your browser and try again.</p>");
		
		exit();
		
		}
		
	$name1 = mysqli_real_escape_string($conn, $name);
	$phone1 = mysqli_real_escape_string($conn, $phone);
	$email1 = mysqli_real_escape_string($conn, $email);
	$status1 = mysqli_real_escape_string($conn, $status);
    $month1 = mysqli_real_escape_string($conn, $month);
	$year1 = mysqli_real_escape_string($conn, $year);
	$password1 = mysqli_real_escape_string($conn, $password);
    //echo("<p>One or more fields was left blank. $name1 $phone1 $email1 $status1 $month1 $year1 $password1</p>");

	if ($name1 == "" || $phone1 == "" || $email1 == "" || $status1 == "" || $year1 == "" || $password1 == "") {
		exit;
	} else {
      	//Check for a preexisting account
		$ssql = "SELECT email FROM tennis_users WHERE email='$email1';";
		$sresult = @mysqli_query($conn, $ssql);
		$srow = @mysqli_fetch_array($sresult, MYSQL_NUM);
		if ($srow) {
			echo "<p>An account already exists for this email.  Please login.</p>";
			echo "<p><a href='index.php'>Go Home.</a></p>";
			exit();
		}
    	
		//Save the new user
		$password1 = password_hash($password1, PASSWORD_DEFAULT);
		$sql = "INSERT INTO tennis_users(email, password, phone, status, graddate, fullname) VALUES ('$email1', '$password1', '$phone1', '$status1', '$month1.$year1', '$name1');";
		$result = @mysqli_query($conn, $sql);
		$row = @mysqli_fetch_array($result, MYSQL_NUM);

		echo "You have registered successfully. We are attempting to redirect you to the login page.";
		echo '<meta http-equiv="refresh" content="2;url=http://umwtennis.org/login.php" />';

	}
	exit();
?>
</BODY>
</HTML>
		
