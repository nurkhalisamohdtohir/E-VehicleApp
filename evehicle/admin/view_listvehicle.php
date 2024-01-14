<!DOCTYPE html>
<html>
<head>
	<title>e-Vehicle</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <script type="text/javascript">
		function batal() {
	    var ask = window.confirm("Are you sure you want to cancel this booking?");
	    if (ask) {
	        window.location.href = "batal.php";
	    }
	    else {
	    	window.location.href = "view_booking.php"
	    }
}
	</script>
</head>

<body>
<?php
  	include("header.php");
	include_once '../connect.php';
    $Vehicle_Plate = '';

	if (isset($_GET['id'])) {
		$Vehicle_Plate=$_GET['id'];
	}

	$query ="SELECT *  FROM vehicle";
	$result=mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
?>

<center>
<content>
	<center>

        <div class="title">
			<h2><b>Update Vehicle Details</b></h2><hr>
		</div>

		<div class="form-box">
			<!-- <div class="form-left"> -->
				<form role="form" action="#" method="post">

					<div class="form">
                        <div class="ID-left">
						    <label><b>Category :</b></label>
				  		    <input type="text" name="Cat_No" value="<?php echo "$row[Cat_No]"?>" readonly>
                        </div>  
  
                        <div class="IC-right">
						    <label><b>Capacity :</b></label>
				  		    <input type="text" name="Vehicle_Capacity" value="<?php echo "$row[Vehicle_Capacity]"?>" readonly>
                        </div> 
					</div>

					<div class="form">
						<label><b>Plate Number : </b></label>
				  		<input type="text" name="Vehicle_Plate" value="<?php echo "$row[Vehicle_Plate]"?>" readonly>
					</div>

					<div class="form">
						<label><b>Model :</b></label>
				  		<input type="text" name="Vehicle_Model" value="<?php echo "$row[Vehicle_Model]"?>" readonly>
					</div>

					<div class="form">
						<label><b>Status : </b></label>
				  		<input type="text" name="Vehicle_Status" value="<?php echo $row["Vehicle_Status"]; ?>" required style="text-transform:uppercase">
					</div>

					<div class="form">
						<label><b>Current Mileage :</b></label>
				  		<input type="text" name="Current_Mileage" value="<?php echo $row["Current_Mileage"]; ?>" required style="text-transform:uppercase">
					</div>
				
			<!-- </div>

			<div class="form-right">
				 -->

					<br><br><br><br>

					<!-- <div class="form">
						<input type="checkbox" name="catatan" value="" required><strong> I acknowledge that I have been instructed to carry out official duties outside the office.</strong>
					</div>
					<br> -->

					<div class="view-booking-button"> <!-- BELUM SIAP -->
						<a href="home_user.php"><button type="submit" class="btn">Back</button></a>
                        <button type="reset" class="btn-batal" onclick=batal(); >Delete</button>
						<button type="submit" class="btn-save">Update</button>
						<a href="update.php?id=<?php echo $row1['Vehicle_Plate'];?>" class="a-icon"><i class="fa fa-arrow-right w3-large"></i></a>
					</div>
					
				</form>
			<!-- </div> -->
		</div>
        <br>
	</center>
</content>
</center>
</body>
<?php
  include("../footer.php");
?>
</html>