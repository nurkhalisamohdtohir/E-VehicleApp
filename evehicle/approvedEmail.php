<?php
include 'connect.php';

	function random_string($length_of_string)
	{
	    $str_result = 'abcdefghijklmnopq';

	    return substr(str_shuffle($str_result),
	                    0, $length_of_string);
	}

	function random_number($length_of_string)
	{
	    $str_result = '0123456789';

	    return substr(str_shuffle($str_result),
	                    0, $length_of_string);
	}

	$password = random_string(2) . random_number(6);
	
	$emailTo = '';
	$name = '';

	$id = $_POST['staff_id'];
	$ic = $_POST['staff_ic'];

	$sql = "SELECT * FROM user WHERE Staff_ID = '$id' AND Staff_IC = '$ic'";
	$rs = mysqli_query($conn, $sql);
	if ($rs-> num_rows == 0) {
		echo "<script type='text/javascript'>
			alert('Incorrect Staff ID / IC Number. Please try again.');
	        window.location.href='forgot_password.php';
			</script>";
	}
	else {
		$row = mysqli_fetch_array($rs);
		$emailTo = $row['Staff_Email'];
		$name = $row['Staff_Name'];

		$sql = "UPDATE user SET Staff_Password ='$password' where Staff_IC ='$ic' and Staff_ID = '$id'";

		if (!mysqli_query($conn, $sql)) 
		{
		    die('Error: ' . mysqli_error($conn)); 
		}

		else 
		{

			$emailsend = $emailTo;
			$date =  date("Y-m-d");
			require_once 'vendor/autoload.php';
					//create transport
			$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
			->setUsername("apparelproduction.notification@gmail.com")
			->setPassword("infvxvqxqvxihhaq");

					// Create the Mailer using your created Transport
			$mailer = new Swift_Mailer($transport);

					// Create a message
			$message = new Swift_Message();	
			$message->setSubject('Vehicle Booking & Maintenance Organizer (eVehicle) Password Reset');
			$message->setFrom(['apparelproduction.notification@gmail.com' => 'eVehicle Notification']);
			$message->setTo($emailsend);
			$message->setBody('<html>' .
				'<body>' .
				'<div style="text-align: justify;">'.
				'Dear Mr/Mrs. ' . $name . '
				<br><br>'.
				'We have received a request to reset the password for your eVehicle user account.' .
				'<br>To reset your password, click <a href="http://localhost/evehicle" style="color: blue">here</a> an login to eVehicle with the following credentials.'.
				'<br><br>'.			
				'<b>Temporary Password : ' . $password . '</b>'.
				'</div>'.
				'<br><hr><br>'.
				'Thank you,<br>eVehicle Admin.'.
				'<br><br>This is an auto-generated email. Please do not reply to this email.'.
				'<br>'.
				'</body>' .
				'</html>',
				'text/html'
			);

			$result = $mailer->send($message);
			?>
			<body onload="return succeed('<?php echo $emailTo?>');"></body>
			<?php 
			
		}
	
	}

?>

<title>Reset Password</title>
<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/header.css">
	<script type="text/javascript">
		function succeed(email){
			var to = email;
			alert('We have sent a temporary password to ' + to + '. Please change your password once you have logged in using the temporary password.');
			window.location.replace('index.php')
			// $.confirm({
			// 	boxWidth: '27%',
	  // 			title: 'Successfully Registered!',
			//     content: 'You may sign in with the username and password registered now.',
			//     type: 'green',
			//     typeAnimated: true,
			//     useBootstrap: false,
			//     buttons: {
			//         ok: {
			//         	boxWidth: '27%',
			//             text: 'Okay',
			//             btnClass: 'btn-green',		            
			//             action: function(){
			//             	window.location.replace('index.php');
			//             }
			//         }
			//     }
			// });
		}
	</script>
</head>


