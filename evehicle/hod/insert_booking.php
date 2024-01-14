<?php

include_once '../connect.php';
 
$id = $_POST['id'];
$ic = $_POST['ic'];
$dateFrom = $_POST['dateFrom'];
$dateTo = $_POST['dateTo'];
$timeFrom = $_POST['timeFrom'];
$timeTo = $_POST['timeTo'];
$destination = $_POST['destination'];
$reason = $_POST['reason'];
$num_psg = $_POST['num_psg'];
$value = filter_input(INPUT_POST, 'prefer');
$exploded = explode(',', $value);
$prefer = $exploded[0];
$qty = $exploded[1];
$status="PROCESSING";
$count = 1;
$plate_no = '';


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

	$sqlinsert = "INSERT INTO booking (Staff_ID, Book_Date, Date_Out, Date_In, Time_Out, Time_In, Destination, Reason, Num_Passenger, Prefer_Cat_No, Num_Vehicle, Book_Status) VALUES ('$id', NOW() ,'$dateFrom', '$dateTo', '$timeFrom', '$timeTo',(UPPER('$destination')), (UPPER('$reason')), '$num_psg', '$prefer', '$qty','$status')";


	if (!mysqli_query($conn, $sqlinsert)) 
	{
	    die('Error: ' . mysqli_error($conn)); 
	}


	else 
	{	
		$sqlbookno = "SELECT max(Book_No) as lastno FROM booking";
		$resultbookno=mysqli_query($conn,$sqlbookno);
		$rowbookno = mysqli_fetch_array($resultbookno);
		$bookno = $rowbookno['lastno'];

		While($rowplate = mysqli_fetch_array($resultplate))
		{ 

			if($count <= $qty) {

				$plate_no = $rowplate['Vehicle_Plate'];

				$sqlinsert = "INSERT INTO trip (Book_No, Vehicle_Plate) VALUES ('$bookno','$plate_no')";

				if (!mysqli_query($conn, $sqlinsert)) 
				{
				    die('Error: ' . mysqli_error($conn)); 
				}


				else 
				{

				 	echo "<script type='text/javascript'>
						alert('Your Booking is Successfully Submitted!');
				        window.location.href='booking_list1.php?success';
						</script>";

				}
				
			} $count++;

		}

	}

}

else
{
	echo "<script>alert('Oops, there is no vehicle available!');
	window.location.href='form_book_vehicle.php';
	</script>";
}


   