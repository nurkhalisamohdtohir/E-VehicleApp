<?php
include('../connect.php');

$display1 = 0;
$dateTo = '';
$dateFrom = '';
$driver ='';

if(strlen($_GET['driver']) != 0 ) {
		$driver = $_GET['driver'];

		$query3 = "SELECT job_desc.Staff_ID FROM job_desc INNER JOIN trip ON job_desc.Trip_No = trip.Trip_No 
					INNER JOIN booking ON trip.Book_No = booking.Book_No 
					WHERE   Date_Out >= DATE(SYSDATE()) AND Date_In >= DATE(SYSDATE())
					AND job_desc.Staff_ID = '$driver'";

		$result3 = mysqli_query($conn, $query3);
		if ($result3-> num_rows == 0) {
			$display1 = 0;
		}

		else {
			$display1 = 1;
		}
		
		$result3->close();	
	}

echo $display1;
?>