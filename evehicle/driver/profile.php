<!DOCTYPE html>
<html>
<head>
	<title>e-Vehicle</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
</head>

<body>
<?php
  	include("header.php");
	include_once '../connect.php';
	$query ="SELECT * FROM user WHERE Staff_ID='$login_session'";
	$result=mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
?>

<script>
function myFunction() {
  var x = document.getElementById("katalaluan");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<center>
<content>
	<center>
		<div class="title">
			<h2><b>Profile</b></h2><hr>
		</div>

		<div class="form-box">
			<center><img src="../image/user2.png" width="150" height="150" class="image-user"></center><br>
				<form role="form" action="update_profile.php" method="post">
					
                <div class="form">
                        <div class="ID-left">
						    <label><b>Staff ID :</b></label>
				  		    <input type="text" name="no_kp" value="<?php echo "$row[Staff_ID]"?>" readonly>
                        </div>  

                        <div class="IC-right">
						    <label><b>I/C Number :</b></label>
				  		    <input type="text" name="no_kp" value="<?php echo "$row[Staff_IC]"?>" readonly>
                        </div> 
					</div>

					<div class="form">
						<label><b>Full Name :</b></label>
				  		<input type="text" name="nama" value="<?php echo "$row[Staff_Name]"?>">
					</div>

					<div class="form">
						<label><b>Department :</b></label>
                        <input type="text" name="nama" value="<?php echo "$row[Staff_Dept]"?>">
					</div>
					
					<div class="form">
						<label><b>Position :</b></label>
				  		<input type="text" name="jawatan" value="<?php echo "$row[Staff_Position]"?>">		  		
					</div>

					
					<div class="form">
						<label><b>Phone Number :</b></label>
				  		<input type="text" name="telefon" value="<?php echo "$row[Staff_Phone]"?>">
					</div>

					<div class="form">
						<label><b> Phone Extension Number :</b></label>
				  		<input type="text" name="samb_tel" value="<?php echo "$row[Staff_Extension]"?>">
					</div>

					<div class="form">
						<label><b>Email Address :</b></label>
				  		<input type="text" name="emel" value="<?php echo "$row[Staff_Email]"?>">
					</div>

					<div class="form">
						<label><b>Password :</b></label>
				  		<input type="password" id="katalaluan" name="katalaluan" value="<?php echo "$row[Staff_Password]"?>">
				  		<input type="checkbox" onclick="myFunction()"> Show Password
					</div>
					
				
					
					<div class="feedback-button">
						<button type="submit" class="btn">Save</button>
					</div>
					
				</form>
			<!-- </div> -->
		</div>
<br>
		</center>

</content></center>
</body>
<div>
<?php
  include("../footer.php");
  ?>	
</div>

</html>