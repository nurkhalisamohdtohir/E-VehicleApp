<?php

include_once '../connect.php';
 
$sql="SELECT *, DATE_FORMAT(Next_Date, '%d/%m/%Y') AS Next_Date FROM service WHERE YEARWEEK(Next_Date) = YEARWEEK(NOW())";
$sql2="SELECT *, DATE_FORMAT(Next_Date, '%d/%m/%Y') AS Next_Date FROM service s JOIN vehicle v ON v.Vehicle_Plate = s.Vehicle_Plate WHERE v.Current_Mileage >= s.Next_Mileage";

$result=mysqli_query($conn, $sql);
$result2=mysqli_query($conn, $sql2);

$response='';
$subject= "Service Reminder";
while($row=mysqli_fetch_array($result)) {
	$response = $response .  
	"<p><b>" . $row["Vehicle_Plate"]  . " </b>has reached the service date : " . $row["Next_Date"]  . "</p>";
}
while($row=mysqli_fetch_array($result2)) {
	$response = $response .  
	"<p><b>" . $row["Vehicle_Plate"]  . " </b>has reached the service mileage : " . $row["Next_Mileage"]  . "</p>";
}
if(!empty($response)) {
	print $response;
}
?>
   