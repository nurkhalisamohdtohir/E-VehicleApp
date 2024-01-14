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
	$driver = $row['Staff_ID'];

	// $sql=""; //CARI ONGOING TRIP
	// $result_set=mysqli_query($conn,$sql);

	// if ($result_set-> num_rows == 0)  
	// {
	// 	echo "<font size='3'>Maaf, Tiada Permohonan Yang Telah Dibuat.</font>";
	// }

	// else {
	// 	while ($row1=mysqli_fetch_array($result_set)) {
?>



<center>
<content>
	<center>
		<div class="title">
			<h2><b>Ongoing Trip</b></h2><hr>
		</div>

		<div class="form-box">
				<form role="form" action="update_profile.php" method="post">
					
                <div class="form">
                        <div class="ID-left">
						    <label><b>Vehicle Type :</b></label>
				  		    <input type="text" name="no_kp" value="<?php ?>" readonly>
                        </div>  

                        <div class="IC-right">
						    <label><b>Vehicle Details :</b></label>
				  		    <input type="text" name="no_kp" value="<?php ?>" readonly>
                        </div> 
					</div>

					<div class="form">
						<div class="tarikh-pergi">
							<label><b>Departure Date : </b></label><br>
				  			<input type="date" name="tarikh_dari" required>
						</div>

						<div class="tarikh-balik">
							<label><b>Return Date : </b></label><br>
				  			<input type="date" name="tarikh_hingga" required><br>
						</div>
					</div>

					<div class="form">
						<div class="masa-pergi">
							<label><b>Departure Time : </b></label><br>
				  			<input type="time" name="masa_dari" required>
						</div>

						<div class="masa-balik">
							<label><b>Return Time : </b></label><br>
				  			<input type="time"  name="masa_hingga" required><br>
						</div>
					</div>

					<div class="form">
						<label><b>Applicant Name :</b></label>
				  		<input type="text" name="nama" value="<?php  ?>">
					</div>

					<div class="form">
						<label><b>Phone Number :</b></label>
                        <input type="text" name="nama" value="<?php  ?>">
					</div>
					
					<div class="form">
						<label><b>Reason :</b></label>
				  		<input type="text" name="tujuan" required style="text-transform:uppercase">
					</div>

					<div class="form">
						<label><b>Destination : </b></label>
				  		<input type="text" name="destinasi" required style="text-transform:uppercase">
					</div>

					<div class="view-booking-button"> 
						<button type="reset" class="btn" onclick="window.location.href = 'home_user.php';">Back</button>
                        <button type="submit" class="btn-save">Start Trip</button>
						<!-- <button type="submit" class="btn-save">Save</button> -->
					</div>
					
					
				</form>
			<!-- </div> -->
		</div>
<br>
		</center>

</content>
<?php
// }
// }
?>
</center>
</body>
<div>
<?php
  include("../footer.php");
  ?>	
</div>

</html>