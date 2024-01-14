<?php

include_once '../connect.php';
 
$bookno = $_POST['bookno'];
$tripno = $_POST['tripno'];
$time = $_POST['time'];
$vehicle = $_POST['vehicle'];
$driver = $_POST['driver'];
$comment = $_POST['comment'];


$sql = "INSERT INTO feedback (Trip_No, Feedback_Time , Feedback_Vehicle, Feedback_Driver, Comment) VALUES ('$tripno', '$time' , '$vehicle', '$driver','$comment')";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
		<script type="text/javascript">
		alert('Thank you for your feedback!');
        window.location.href='booking_history.php?success';
		</script> 
<?php
}
?>
       