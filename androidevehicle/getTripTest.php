<?php
    require_once "conn.php";
	
	$Staff_ID=$_POST['Staff_ID'];
	
	$result = array();
	$result['booking'] = array();
	$select= "SELECT * FROM booking INNER JOIN trip ON booking.Book_No = trip.Book_No
				INNER JOIN job_desc ON trip.Trip_No = job_desc.Trip_No 
				WHERE job_desc.Staff_ID = '$Staff_ID' AND job_desc = 'DRIVER' AND Book_Status = 'APPROVED'";
	$response = mysqli_query($conn,$select);
	
	  
	while($row = mysqli_fetch_array($response))
		{
			//fetch data
			
			$index['Book_No']			=$row['0'];
			$index['Trip_No']			=$row['13'];
			$index['Date_Out']			=$row['3'];
			$index['Date_In']			=$row['4'];
			$index['Time_In']			=$row['5'];
			$index['Time_Out']			=$row['6'];
			$index['Destination']		=$row['7'];
			$index['Vehicle_Plate']		=$row['15'];
		
			
			
			array_push($result['booking'], $index);
		}
			$result["success"]="1";
			echo json_encode($result);
			mysqli_close($conn);	
	  
	
?>
