<?php
include('../connect.php');

$display1 = '';
$dateTo = '';
$dateFrom = '';
$book_no = $_GET['bookno'];

if(strlen($_GET['dateTo']) != 0 && strlen($_GET['dateFrom']) != 0) {
		
		$Date_In = date("Y-d-m", strtotime($_GET['dateTo']));
		$Date_Out = date("Y-d-m", strtotime($_GET['dateFrom']));

		$query3 = "SELECT Staff_ID, Staff_Name, Staff_Phone FROM user WHERE Staff_Category = 4 AND Staff_ID NOT IN (
						SELECT   user.Staff_ID
									FROM	user
									INNER JOIN job_desc
									ON user.Staff_ID = job_desc.Staff_ID
									INNER JOIN trip 
									ON job_desc.Trip_No = trip.Trip_No
									INNER JOIN booking 
									ON trip.Book_No = booking.Book_No
									WHERE job_desc = 'DRIVER'
									AND trip.Book_No IN (
									            SELECT    Book_NO
									            FROM      booking
									            WHERE   (( Date_Out BETWEEN '$Date_Out' AND '$Date_In' ) 
												OR 		( Date_In BETWEEN '$Date_Out' AND '$Date_In' ) 
												OR 		( Date_Out <= '$Date_Out' AND Date_In >= '$Date_In' )
												OR 		( Date_Out > '$Date_Out' AND Date_In < '$Date_In' ))
												)
									GROUP BY user.Staff_ID )";

		$result3 = mysqli_query($conn, $query3);
		while ($row3 = mysqli_fetch_array($result3)) {
			 	$display1 .= '<option value = "'.$row3['Staff_ID'].'">'.$row3['Staff_Name']. ' ('.$row3['Staff_Phone'].')</option>';
					
		};
		
		$result3->close();	
	}

echo $display1;
?>