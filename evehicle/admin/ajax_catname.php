<?php
include('../connect.php');

$display1 = '';
$dateTo = '';
$dateFrom = '';
$book_no = $_GET['bookno'];

if(strlen($_GET['dateTo']) != 0 && strlen($_GET['dateFrom']) != 0) {
		
		$Date_In = date("Y-d-m", strtotime($_GET['dateTo']));
		$Date_Out = date("Y-d-m", strtotime($_GET['dateFrom']));

		$query3 = "SELECT    vehiclecat.Cat_No, Cat_Name
			         FROM      vehicle
			         INNER JOIN vehiclecat
			         ON vehicle.Cat_No = vehiclecat.Cat_No
			         WHERE 
			         Vehicle_Plate NOT IN (
			                     SELECT    Vehicle_Plate
			                     FROM      trip
			                     INNER JOIN booking
			                     ON trip.Book_No = booking.Book_No
			                     WHERE   (( Date_Out BETWEEN '$Date_Out' AND '$Date_In' ) 
			                  OR       ( Date_In BETWEEN '$Date_Out' AND '$Date_In' ) 
			                  OR       ( Date_Out <= '$Date_Out' AND Date_In >= '$Date_In' )
			                  OR       ( Date_Out > '$Date_Out' AND Date_In < '$Date_In' ))
			                     AND      booking.Book_No != '$book_no'
			                  )
			         GROUP BY Cat_Name";

		$result3 = mysqli_query($conn, $query3);
		while ($row3 = mysqli_fetch_array($result3)) {
			 	$display1 .= '<option value = "'.$row3['Cat_No'].'">'.$row3['Cat_Name'].'</option>';
					
		};
		
		$result3->close();	
	}

echo $display1;
?>