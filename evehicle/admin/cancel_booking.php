<?php

include '../connect.php';

$book_no=$_POST['book_no'];



$sqltrip = "DELETE FROM trip WHERE Book_No = '$book_no'";

if (!mysqli_query($conn, $sqltrip)) {
    die('Error: ' . mysqli_error($conn)); 
}

else {

	$sqlbooking = "DELETE FROM booking WHERE Book_No = '$book_no'";

	if (!mysqli_query($conn, $sqlbooking)) {
    	die('Error: ' . mysqli_error($conn)); 
	}
	else {
		echo 'Your Booking is Cancelled!';    
	}
}
?>
       