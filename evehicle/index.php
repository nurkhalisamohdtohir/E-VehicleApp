<!-- <?php
//session_start();
//if(isset($_SESSION['no_kp']))
{
	//$_SESSION=array();
	//session_destroy();
}
?> -->
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="login.css">
<head>
	<title>E-Vehicle</title>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>
<center>
<div class="container">
	<div class="header">
		<br>
		<center><img src="image/eVehicle-black.png" width="180"></img></center><br>
		<center><b>Vehicle <font style="color: #233987">Booking</font> & <font style="color: #233987">Maintenance</font> Organizer</b></center>
	</div>
	<div align="center">
		<form method="post" action="userlogin.php">
			<div class="input">
				<label> Staff Number :</label>
				<input type="text" name="staff_id" id="staff_id" required>
			</div>
			<div class="input">
				<label> Password :</label>
				<input type="password" name="password" id="password" required>
			</div>
			<div class="input" align="center">
				<button type="submit" class="btn" name="login">Login &nbsp;<i class="fa fa-sign-in" aria-hidden="true"></i></button>
				<br><br>
				<a href="forgot_password.php" class="pull-right">Forgot Password?</a>
    			<a href="register_form.php" class="pull-left">Register User</a>
    		</div>
		</form>
	</div>
</div>
</center>
</body>
</html>
<?php
//include 'footer.php';
?>