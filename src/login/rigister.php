<?php
include '/CLASSES/dharmakirthimudiyanselageimarau/cst336/lab5/includes/database.inc.php'; 


//$sql="INSERT INTO `oe_admin`(`userName`, `PASSWORD`) VALUES (:Name,:pass)"
$sql="INSERT INTO se_userInfo ( firstName, lastName, userAddress, dateOfBirth ) 
VALUES (:FName,:LName,:address,:dob)";

$fName=$_GET["fName"];
$lName=$_GET["lName"];
$address=$_GET["address"];
$dob=$_GET["dob"];
//$country=$_GET["country"];
//$rName=$_GET["rName"];
echo $fName;
$namedParameters = array();
	$namedParameters[':FName'] =$fName;
	$namedParameters[':LName'] =$lName;
	$namedParameters[':address'] =$address;
	$namedParameters[':dob'] =$dob;
	//$namedParameters[':country'] =$country;
//	$namedParameters[':rName'] =$rName;

//$sql = "INSERT INTO `se_userInfo`( `firstName`, `lastName`, `dateOfBirth`, `userAddress`, `otherContactId`) 
//VALUES ('$fName','$lName','$dob','$address')"; 

$conn = getDatabaseConnection(); //gets database connection 
$statement = $conn->prepare($sql);
$statement->execute($namedParameters);

?>