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
    	<table style="width: 100%">
	  <tr>
	  	<th>Date</th>
		<th>Start Time</th>
		<th>End Time</th>
		<th>Court</th>
	  </tr>
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
	
	$ssql = "SELECT res_id, date, start, end, court FROM tennis_reservations WHERE res_id=$rid";
	$sresult = @mysqli_query($conn, $ssql);
	
	if (mysqli_num_rows($sresult) == 0) { echo "<p>The reservation ID is not valid, so there is nothing to delete.</p>"; exit(); }
	if (mysqli_num_rows($sresult) > 0) {
			while ($srow = mysqli_fetch_assoc($sresult)) {
				$s = $srow["start"];
				$e = $srow["end"];
				$res = $srow["res_id"];
				$start = substr($s, 11, 5);
				$end = substr($e, 11, 5);
				$c = $srow["court"];
				
				//Switch statement example at http://www.w3schools.com/php/php_switch.asp
				switch ($c) {
					case "i1":
						$court =  "Indoor Court 1";
						break;
					case "i2":
						"$court =  Indoor Court 2";
						break;	
					case "i3":
						$court =  "Indoor Court 3";
						break;
					case "i4":
						$court =  "Indoor Court 4";
						break;
					case "i5":
						$court =  "Indoor Court 5";
						break;
					case "i6":
						$court =  "Indoor Court 6";
						break;
					case "o1":
						$court =  "Outdoor Court 7";
						break;
					case "i1":
						$court =  "Indoor Court 1";
						break;
					case "o2":
						$court = "Outdoor Court 8";
						break;
					case "o3":
						$court = "Outdoor Court 9";
						break;
					case "o4":
						$court ="Outdoor Court 10";
						break;
					case "o5":
						$court ="Outdoor Court 11";
						break;
					case "o6":
						$court ="Outdoor Court 12";
						break;
					case "o7":
						$court ="Outdoor Court 13";
						break;
					case "o8":
						$court = "Outdoor Court 14";
						break;
					case "o9":
						$court = "Outdoor Court 15";
						break;
					case "o10":
						$court = "Outdoor Court 16";
						break;
					case "o11":
						$court = "Outdoor Court 17";
						break;
					case "o12":
						$court = "Outdoor Court 18";
						break;
				}
				$start = trim($start);
				$end = trim($end);
				$court = trim($court);
				echo "<tr>";
				echo "<td>".$srow["date"]."</td>";
				echo "<td>$start</td>";
				echo "<td>$end</td>";
				echo "<td>$court</td>";
				echo "</tr>";
				}
				
				echo "<p><a style=\"color: red\" href = \"confirmdel.php?res_id=$rid\">Click here to confirm deletion. This CANNOT BE UNDONE</a></p>";
		}
	
  ?>
   
</body>
</html>
