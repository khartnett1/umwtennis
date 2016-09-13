<!DOCTYPE html>
<html>
<head>
  <title>UMW Tennis Center - Reservation Deletion</title>
  <meta charset= "UTF-8"/>
<link type="text/css" rel="stylesheet" href="style.css"/>
<script src="http://www.w3schools.com/lib/w3data.js"></script>
<link rel="icon" type="image/x-icon" href="fav/favicon.ico">
<script type="text/javascript" src="forms.js"></script>
</head>
<body>
   <div w3-include-html="menu.html" class = "menu"></div>
   <script> w3IncludeHTML();</script>
<div class="content">  
  <h1>Reservation Deletion Confirmation</h1>
  <h3>You are <i>permanently</i> deleting reservation ID <?php echo $_GET["res_id"]; ?>:</h3>

    <?php
        session_start();
  
	$userId = $_SESSION["user_id"];
	
	if($userId < 1) {
		
		echo "<p>Sorry, you are not logged in, so there is no account info for you.</p>";
		exit();
	}
	
	$name = $_SESSION["name"];
	$phone = $_SESSION["phone"];
	$email = $_SESSION["email"];
	$rid = $_GET["res_id"];
	
	$userId = $_SESSION["user_id"];
	include ('mydbinfo.php');
	$conn = @mysqli_connect($db, $dbuser, $dbpass, $dbname);
        if ( !$conn ) {
		    echo("<p> Unable to connect to the database system" .
		         "Please try later. </p>");
		    exit();
		}
	
	$ssql = "DELETE FROM tennis_reservations WHERE res_id=$rid";
	$sresult = @mysqli_query($conn, $ssql);
	
		
	$data_results = file_get_contents('evt.json');

	//remove JSON line in PHP partially from this source: http://stackoverflow.com/questions/7044967/delete-from-json-using-php
	
        $jsonInPHP = json_decode($data_results);

	  // now iterate over the results and remove the one that's google
	  $results = count($jsonInPHP);
	  for ($r = 0; $r < $results; $r++){
	
	    // look for the entry we are trying to find
	    if ($jsonInPHP[$r]->resId == "$rid"){
	
	      // remove the match
	      unset($jsonInPHP[$r]);
	
	      break;
	    }
	  }

	  $jsonInPHP = array_values($jsonInPHP);
		                
	  $jsonData = json_encode($jsonInPHP);
	  
          file_put_contents('evt.json', $jsonData);   

	  //end of borrowed source code
	
	echo "<p>You have successfully deleted the reservation $rid from the database. Please give it and the calendar a few minutes to reflect these changes.</p>";
	//echo "<p>Now redirecting you back to your account page. If there's no redirect, please click the Home button above.</p>";
	
	//echo '<meta http-equiv="refresh" content="2;url=http://umwtennis.org/account.php" />';

	
  ?>
   
</body>
</html>
