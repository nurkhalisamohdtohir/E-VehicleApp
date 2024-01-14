<?php
include('../connect.php');

$display1 = '';
$dateTo = '';
$dateFrom = '';
$id='';

if(strlen($_GET['id']) != 0 ) {
		$id = $_GET['id'];

		$query3 = "SELECT * from user where Staff_ID = '$id'";

		$result3 = mysqli_query($conn, $query3);
		while ($row3 = mysqli_fetch_array($result3)) {
			 	$display1 .= $row3['Staff_Phone'];
					
		};
		
		$result3->close();	
	}

echo $display1;
?>