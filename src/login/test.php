<?php

include '/CLASSES/dharmakirthimudiyanselageimarau/cst336/lab5/includes/database.inc.php'; 

	 $Uname=$_POST["name"];
	 $password=$_POST["password"];
	

$conn = getDatabaseConnection(); //gets database connection 

//Need to prevent SQL injection 
//Need to check whether 'productId' is set 
$sql = "SELECT * FROM `se_users` WHERE userName = '$Uname' AND `password` = PASSWORD(  '$password' )"; 
$records = getDataBySQL($sql);     
print_r($records); 
?>
