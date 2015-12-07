<?php
$host = "localhost";
$dbname = "dhar1102";
$username = "dhar1102";
$password = "s3cr3t";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
function getAlert() {
   global $dbConn;
   $sql = "SELECT alert
           FROM se_emergencyAlerts";
   $stmt = $dbConn -> prepare($sql);
   $stmt -> execute();
   return $stmt->fetchAll();
}
$alert = getAlert();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Menu</title>
  <meta name="description" content="">
  
  <!-- This section sets the initial scale and locks the screen so it is no longer scalable -->
  
<meta name="viewport" content="initial-scale=1 user-scalable=no">

  
  <!-- Allows app to be added to the homescreen -->
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  
  <script href="../bootstrap/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"></link>

<body>
<div class = "container-fluid text-center">
<h1>Traveling Tracker </h1> 
<textarea rows = "8" cols = "50">
Emergency Alerts:&#13;&#10;
<? 
foreach($alert as $alerts) {
	echo $alerts['alert'];
}?>
</textarea>
</br>
<a href = "../login/UpdateLocation.html" style = "text-decoration:none" >
<button type = "button" class="btn btn-default btn-large">Update Location</button>
</a>

</br>
</br>
<a href = "travelplan.php" style = "text-decoration:none">

<button type = "button" class = "btn btn-default btn-large" >Travel Plan</button>
</a>
</br>
</br>
<a href="tel:911" style = "text-decoration:none">
<button type = "button" class = "btn btn-default btn-large" >Emergency Contact</button>
</a>
</br>

</div>
</body>

	
</html>