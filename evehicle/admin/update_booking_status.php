<?php

include_once '../connect.php';
 
$id = $_POST['bookno'];
$status = $_POST['status'];
$loop = $_POST['loop'];
$tripno = '';
$driverid = '';

if ($status == "ACCEPTED") {
	$driverlist = $_POST['driverlist'];

	$arraytripdriver = array(
		'tripno' => array(),
		'driverid' => array()
	);

	foreach($driverlist as $s => $t){
		array_push($arraytripdriver['driverid'], $t);
	}

	$sqltripno = "SELECT * FROM trip WHERE Book_No = '$id'";
	$rstripno =  mysqli_query($conn, $sqltripno);
	while ($rowtrip = mysqli_fetch_array($rstripno)) {
		array_push($arraytripdriver['tripno'], $rowtrip['Trip_No']);
	}

	for ($i=0; $i < $loop ; $i++) { 
		$tripno = $arraytripdriver['tripno'][$i];
		$driverid = $arraytripdriver['driverid'][$i];

		$sqldriver = "INSERT INTO job_desc(Staff_ID, Trip_No, Job_Desc) VALUES('$driverid', '$tripno' , 'DRIVER')";
		if (!mysqli_query($conn, $sqldriver)) {
		    die('Error: ' . mysqli_error($conn)); 
		}
		else {
			$sqlstatus = "UPDATE booking SET Book_Status = (UPPER('$status')) where Book_No ='$id'";
			if (!mysqli_query($conn, $sqlstatus)) {
			    die('Error: ' . mysqli_error($conn)); 
			}
			else {
				echo "<script type='text/javascript'>
					alert('Booking application " . $status . "!');
			        window.location.href='application_list.php?success';
					</script> ";
			}
		}
	}
}

else if ($status == "REJECTED") {
	$sql = "UPDATE booking SET Book_Status = (UPPER('$status')) where Book_No ='$id'";

	if (!mysqli_query($conn, $sql)) {
	    die('Error: ' . mysqli_error($conn)); 
	}else {
		
		echo "<script type='text/javascript'>
			alert('Booking application " . $status . "!');
	        window.location.href='application_list.php?success';
			</script> ";
	}
}
?>
       