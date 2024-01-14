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
		<center><img src="image/logo.png" width="180"></img></center><br>
		<center><b>Forgot Password</b></center>
	</div>

	<div align="center">
		
		<form method="post" action="approvedEmail.php">
			<div class="input">
				<label style="font-weight: normal; font-size: 13px;">Please enter your Staff ID and I/C number to get a temporary password.</label>
			</div>
			<div class="input">
				<label> Staff Number :</label>
				<input type="text" name="staff_id" id="staff_id" required>
			</div>

			<div class="input">
				<label> I/C Number :</label>
				<input type="text" name="staff_ic" id="staff_ic" required>
			</div>

			<div class="input" align="center">
				<button type="submit" class="btn" name="login">Next</button>
				<br><br>
    			<a href="index.php" class="pull-left">Cancel</a>
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