<?php 

include('config.php');
$createTable = '';
	

if(isset($_GET['num']) && strlen($_GET['dateTo']) != 0 && strlen($_GET['dateFrom']) != 0 )
{

	$num = $_GET['num'];
	$Date_Out = $_GET['dateFrom'];
	$Date_In = $_GET['dateTo'];
	$car = 0;
	$van = 0;
	$bus = 0;

	$qry = "SELECT    Cat_Name, COUNT(vehiclecat.Cat_No) AS total, SUM(Vehicle_Capacity) AS cap
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
			AND Vehicle_Status = 'AVAILABLE'
			GROUP BY Cat_Name";

	$rs = $dbConn->query($qry);

	$fetchAllData = $rs->fetch_ALL(MYSQLI_ASSOC);

	foreach($fetchAllData as $data) 
	{
		if ($data['Cat_Name'] == "CAR") 
		{
			if ($data['cap'] >= $num) 
			{
				if ($num % 4 != 0) 
				{
					$car = intdiv($num, 4) + 1;
				}
				else 
				{
					$car = $num/4;

				}
			}
		}

		else if ($data['Cat_Name'] == "VAN") 
		{
			if ($data['cap'] >= $num) 
			{
				if ($num % 10 != 0) 
				{
					$van = intdiv($num, 10) + 1;
				}
				else 
				{
					$van = $num/10;
				}
			}
		}	

		else if ($data['Cat_Name'] == "BUS" ) 
		{
			if ($data['cap'] >= $num) 
			{

				if ($num % 40 != 0) 
				{
					$bus = intdiv($num, 40) + 1;
				}
				else 
				{
					$bus = $num/40;
				}
			}
		}
	}

	if ($car > 0 && $car <=2) {
		$createTable .= '<option value="1,'.$car.'" selected>CAR (Suggested)</option>';
		$createTable .= '<option value="2,'.$van.'">VAN</option>';
	}

	else if ($van > 0 && $van <= 3 ) {
		$createTable .= '<option value="2,'.$van.'" selected>VAN (Suggested)</option>';
		$createTable .= '<option value="1,'.$car.'">CAR</option>';
	}

	else if ($bus > 0 && $bus <= 3) {
		$createTable .= '<option value="3,'.$bus.'">BUS (Suggested)</option>';
		$createTable .= '<option value="2,'.$van.'">VAN</option>';
	}	

	$rs->close();

	$dbConn->close();
		
}

echo $createTable;

?>