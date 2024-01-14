<?php 

require_once('config.php');

if(isset($_GET['num']))
{

	$num = $_GET['num'];
	$Date_Out = $_GET['dateFrom'];
	$Date_In = $_GET['dateTo'];
	$createTable = '';

	$qry = "SELECT    vehiclecat.Desc, Vehicle_Capacity
			FROM      vehicle
			INNER JOIN vehiclecat
			ON vehicle.Cat_No = vehiclecat.Cat_No
			WHERE     Vehicle_Plate NOT IN (
			            SELECT    Vehicle_Plate
			            FROM      trip
			            INNER JOIN booking
			            ON trip.Book_No = booking.Book_No
			            WHERE   ( Date_Out BETWEEN '$Date_Out' AND '$Date_In' ) 
						OR 		( Date_In BETWEEN '$Date_Out' AND '$Date_In' ) 
						OR 		( Date_Out <= '$Date_Out' AND Date_In >= '$Date_In' )
						OR 		( Date_Out > '$Date_Out' AND Date_In < '$Date_In' )
			        )
			GROUP BY vehiclecat.Desc";

	$rs = $dbConn->query($qry);

	$fetchAllData = $rs->fetch_ALL(MYSQLI_ASSOC);

	$createTable = '';

	foreach($fetchAllData as $customerData)
	{
		$createTable .= '<option>'.$customerData['Desc'].'</option>';
	}

	echo $createTable;

	$rs->close();

	$dbConn->close();
		
}

?>