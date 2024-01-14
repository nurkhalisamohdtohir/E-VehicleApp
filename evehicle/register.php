<?php

include_once 'connect.php';
 
$id = $_POST['id'];
$ic = $_POST['ic'];
$name = $_POST['name'];
$cat = 1;
$email = $_POST['email'];
$post = $_POST['post'];
$dept = $_POST['dept'];
$phone = $_POST['phone'];
$ext = $_POST['ext'];
$password1 = $_POST['password1'];
$password2= $_POST['password2'];


if ($password1 != $password2) {
?>
		<script type="text/javascript">
		alert('Your password did not match! Please enter again.');
        window.location.href='register_form.php';
		</script> 
<?php
}

else {

	$sql1 = "SELECT * FROM user WHERE Staff_ID = '$id'";
	$result1=mysqli_query($conn, $sql1);
	if ($result1-> num_rows > 0) {
		echo "<script type='text/javascript'>
			alert('Registration Unsuccessful! This is an existing user.');
	        window.location.href='index.php';
			</script>";
	}

	else {
		$sql = "INSERT INTO user VALUES ('$id', '$ic', (UPPER('$name')), (UPPER('$post')), (UPPER('$dept')), '$email', '$phone', '$ext', '$cat', '$password1')";

		if (!mysqli_query($conn, $sql)) {
		    die('Error: ' . mysqli_error($conn)); 
		}else {?>
				<script type="text/javascript">
				alert('You are Successfully Registered! Please login again.');
		        window.location.href='index.php?success';
				</script> 
		<?php
		}
	}


	
}



?>
       