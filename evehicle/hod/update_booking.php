<?php

include_once '../connect.php';
 
$book_no = $_POST['book_no'];
$id = $_POST['id'];
$ic = $_POST['ic'];
$dateFrom = $_POST['dateFrom'];
$dateTo = $_POST['dateTo'];
$timeFrom = $_POST['timeFrom'];
$timeTo = $_POST['timeTo'];
$destination = $_POST['dest'];
$reason = $_POST['reason'];
$num_psg = $_POST['num_psg'];
$value = filter_input(INPUT_POST, 'prefer');
$exploded = explode(',', $value);
$prefer = $exploded[0];
$qty = $exploded[1];
$count = 1;

$sqlplate = "SELECT    Vehicle_Plate
			FROM      vehicle
			INNER JOIN vehiclecat
			ON vehicle.Cat_No = vehiclecat.Cat_No
			WHERE vehicle.Cat_No = '$prefer'
			AND Vehicle_Plate NOT IN (
			            SELECT    Vehicle_Plate
			            FROM      trip
			            INNER JOIN booking
			            ON trip.Book_No = booking.Book_No
			            WHERE   ( Date_Out BETWEEN '$dateFrom' AND '$dateTo' ) 
							OR 		( Date_In BETWEEN '$dateFrom' AND '$dateTo' ) 
							OR 		( Date_Out <= '$dateFrom' AND Date_In >= '$dateTo' )
							OR 		( Date_Out > '$dateFrom' AND Date_In < '$dateTo' ))";


$resultplate=mysqli_query($conn,$sqlplate);
$rowcount = $resultplate-> num_rows;

if ($resultplate-> num_rows > 0 && $resultplate-> num_rows >= $qty && $qty != 0) {

	$sqlbook = "UPDATE booking SET Date_Out = '$dateFrom', Date_In = '$dateTo', Time_Out ='$timeFrom', Time_In = '$timeTo', Destination = (UPPER('$destination')), Reason = (UPPER('$reason')), Num_Passenger = '$num_psg', Prefer_Cat_No = '$prefer', Num_Vehicle = '$qty' WHERE Book_No = '$book_no' ";

	if (!mysqli_query($conn, $sqlbook)) 
	{
	    die('Error: ' . mysqli_error($conn)); 
	}

	else 
	{
		$sqldel = "DELETE FROM trip WHERE Book_No = '$book_no'";

		if (!mysqli_query($conn, $sqldel)) 
		{
		    die('Error: ' . mysqli_error($conn)); 
		}

		else 
		{
			While($rowplate = mysqli_fetch_array($resultplate))
			{ 

				if($count <= $qty) {

					$plate_no = $rowplate['Vehicle_Plate'];

					$sqlinsert = "INSERT INTO trip (Book_No, Vehicle_Plate) VALUES ('$book_no','$plate_no')";

					if (!mysqli_query($conn, $sqlinsert)) 
					{
					    die('Error: ' . mysqli_error($conn)); 
					}

					else 
					{
					 	echo "<script type='text/javascript'>
							alert('Your Booking is Successfully Updated!');
					        window.location.href='booking_list1.php?success';
							</script>";
					}
				} $count++;
			}
		}
	}
}

else {
	echo "<script>alert('Oops, there is insufficient/no vehicle available!');
		window.location.href='booking_list1.php';
		</script>";
}



