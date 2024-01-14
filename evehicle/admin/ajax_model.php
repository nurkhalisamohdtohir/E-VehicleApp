<?php
include('../connect.php');
$cat_no = 0;
$display1 = '';
$dateTo = '';
$dateFrom = '';
$book_no = $_GET['bookno'];

if(isset($_GET['catno']) && strlen($_GET['dateTo']) != 0 && strlen($_GET['dateFrom']) != 0) {
		$cat_no = $_GET['catno'];
		$Date_In = date("Y-d-m", strtotime($_GET['dateTo']));
		$Date_Out = date("Y-d-m", strtotime($_GET['dateFrom']));

		$query3 = "SELECT    Vehicle_Model
					FROM      vehicle
					INNER JOIN vehiclecat
					ON vehicle.Cat_No = vehiclecat.Cat_No
					WHERE vehicle.Cat_No = '$cat_no'
					AND Vehicle_Plate NOT IN (
					            SELECT    Vehicle_Plate
					            FROM      trip
					            INNER JOIN booking
					            ON trip.Book_No = booking.Book_No
					            WHERE   (( Date_Out BETWEEN '$Date_Out' AND '$Date_In' ) 
								OR 		( Date_In BETWEEN '$Date_Out' AND '$Date_In' ) 
								OR 		( Date_Out <= '$Date_Out' AND Date_In >= '$Date_In' )
								OR 		( Date_Out > '$Date_Out' AND Date_In < '$Date_In' ))
								AND 		booking.Book_No != '$book_no'
								)
					GROUP BY Vehicle_Model";
		$result3 = mysqli_query($conn, $query3);
		while ($row3 = mysqli_fetch_array($result3)) {
			 	$display1 .= '<option value = "'.$row3['Vehicle_Model'].'">'.$row3['Vehicle_Model'].'</option>';
					
		};
		
		$result3->close();	
	}

echo $display1;
?>