<?php

include_once '../connect.php';
 
$book_no = $_POST['bookno'];
$status = $_POST['status'];

if ($status == 'Approved') 
{
	$query ="SELECT *, DATE_FORMAT(Date_Out, '%d/%m/%Y') AS dateOut, DATE_FORMAT(Date_In, '%d/%m/%Y') AS dateIn, TIME_FORMAT(Time_Out, '%h:%i %p') AS timeOut, TIME_FORMAT(Time_In, '%h:%i %p') AS timeIn  FROM booking INNER JOIN user ON booking.Staff_ID= user.Staff_ID INNER JOIN vehiclecat ON booking.Prefer_Cat_No = vehiclecat.Cat_No WHERE Book_No = '$book_no'";
	$result=mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);

	$queryvch ="SELECT trip.Vehicle_Plate, Vehicle_Model, Cat_Name, Staff_Name, Staff_Phone FROM trip 
				INNER JOIN vehicle ON trip.Vehicle_Plate = vehicle.Vehicle_Plate 
				INNER JOIN vehiclecat ON vehicle.Cat_No = vehiclecat.Cat_No
				INNER JOIN job_desc ON trip.Trip_No = job_desc.Trip_No
				INNER JOIN user ON job_desc.Staff_ID = user.Staff_ID 
				WHERE job_desc.Job_Desc = 'DRIVER' AND Book_No = '$book_no'";


	$sql = "UPDATE booking SET Book_Status = (UPPER('$status')) where Book_No ='$book_no'";

	if (!mysqli_query($conn, $sql)) {
	    die('Error: ' . mysqli_error($conn)); 
	}
	else {

		
		$emailTo = $row['Staff_Email'];
		$name = $row['Staff_Name'];
		$emailsend = $emailTo;

			$date =  date("Y-m-d");
			require_once '../vendor/autoload.php';
					//create transport
			$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
			->setUsername("evehicle16@gmail.com")
			->setPassword("abc.group16");

					// Create the Mailer using your created Transport
			$mailer = new Swift_Mailer($transport);

					// Create a message
			$message = new Swift_Message();	
			$message->setSubject('eVehicle - Vehicle Booking Confirmation #'.$book_no);
			$message->setFrom(['evehicle16@gmail.com' => 'eVehicle Notification']);
			$message->setTo($emailsend);
			$message->setBody('<html>' .
				'<body>' .
				'<div style="text-align: justify;">'.
				'Dear Mr/Mrs. ' . $name . '
				<br><br>'.
				'Your vehicle booking application is now <b>CONFIRMED</b>. Below is the summary of your booking details. Have a safe trip!'.
				'<br><br>'.			
				'<b>Depart : ' . $row['dateOut'] . ' - ' . $row['timeOut'] . '</b>'. '<br>'.
				'<b>Return : ' . $row['dateIn'] . ' - ' . $row['timeIn'] . '</b>'. '<br>'.
				'<b>Destination : ' . $row['Destination']. '</b>'.

				'<br><br>Click <a href="http://localhost/evehicle" style="color: blue">here</a> to login to eVehicle and view the assigned vehicle(s) details!'.			

				'<br><br>'.
				'Thank you,<br>eVehicle Admin.'.
				'<br><br>This is an auto-generated email. Please do not reply to this email.'.
				'<br>'.
				'</div></body>' .
				'</html>',
				'text/html'
			);

			$result = $mailer->send($message);
			
		echo "<script type='text/javascript'>
			alert('The booking status is now ". $status." !');
	        window.location.href='new_booking_list.php?success';
			</script> ";
	}


}






else 
{
	$sql = "UPDATE booking SET Book_Status = (UPPER('$status')) where Book_No ='$book_no'";

	if (!mysqli_query($conn, $sql)) {
	    die('Error: ' . mysqli_error($conn)); 
	}
	else {
		
		echo "<script type='text/javascript'>
			alert('The booking status is now ". $status." !');
	        window.location.href='new_booking_list.php?success';
			</script> ";
	}
}

?>
 <link rel="stylesheet" type="text/css" href="../style.css">      