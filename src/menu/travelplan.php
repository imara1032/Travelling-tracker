<?php
$host = "localhost";
$dbname = "dhar1102";
$username = "dhar1102";
$password = "s3cr3t";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

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
<form name = "input" id = "form1" method ="post">
Enter Destination: 
<input type ="text" name = "destination"/>
</br>
Enter Estimated Arrival Date 
<input type ="date" name = "date"/>
</form>
<button type ="submit" name = "add" class = "btn btn-default btn-large" form = "form1" value = "Submit">Add Travel Plan</button>
<?
 if (isset ($_POST['add'])){
        $sql = "INSERT INTO se_travelPlan
                (userId, location, date)
                VALUES
                (:userId, :location, :date)";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute(array(
                               ":userId"=>1,
                               ":location"=>$_POST['destination'],
                               ":date"=>$_POST['date']
							   ));
				 echo "</br>";
				 echo "Travel Plan Added";
}
 ?>
</br> </br> </br> </br> </br>
<a href= "menu.php" style = "text-decoration: none"> 
<button >Back To Main Menu </button> </a>
</body> 

</html>