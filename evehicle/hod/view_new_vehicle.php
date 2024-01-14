<!DOCTYPE html>
<html>
<head>
	<title>e-Vehicle</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <script type="text/javascript">
		function Save() {
		    var ask = confirm("Are you sure to proceed?");
		    if (ask == true) {
		        return true;
		    }
		    else {
		    	return false;
		    }
		}
	</script>
</head>

<body>
<?php
  	include("header.php");
	include_once '../connect.php';
    $book_no = '';

	if (isset($_GET['id'])) {
		$book_no=$_GET['id'];
	}

	$query ="SELECT *, DATE_FORMAT(Date_Out, '%d/%m/%Y') AS dateOut, DATE_FORMAT(Date_In, '%d/%m/%Y') AS dateIn, TIME_FORMAT(Time_Out, '%h:%i %p') AS timeOut, TIME_FORMAT(Time_In, '%h:%i %p') AS timeIn  FROM booking INNER JOIN user ON booking.Staff_ID= user.Staff_ID INNER JOIN vehiclecat ON booking.Prefer_Cat_No = vehiclecat.Cat_No WHERE Book_No = '$book_no'";
	$result=mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);

	$query1 ="SELECT * FROM vehicle INNER JOIN user ON vehicle.Driver_Staff_ID = user.Staff_ID INNER JOIN trip ON vehicle.Vehicle_Plate = trip.Vehicle_Plate WHERE Book_No = '$book_no'";
	$result1 = mysqli_query($conn, $query1);
	//$row1 = mysqli_fetch_array($result1);
?>

<center>
<content>
	<center>

        <div class="title">
			<h2><b>Vehicle Booking Details</b></h2><hr>
		</div>

		<div class="form-box-span">
			<div class="form-left">
				<form role="form" action="update_booking_status.php" method="post" onsubmit="return Save()">

					<div class="form">
						<div class="ID-left">
						    <label><b>Booking Number :</b></label>
				  		    <input type="text" name="bookno" value="<?php echo "$row[Book_No]"?>" readonly>
                        </div> 

                        <div class="IC-right">
						    <label><b>Staff ID :</b></label>
				  		    <input type="text" name="id" value="<?php echo "$row[Staff_ID]"?>" readonly>
                        </div>  
					</div>
					
					<div class="form">
						<label><b>Staff Name : </b></label>
				  		<input type="text" name="destinasi" value="<?php echo $row["Staff_Name"]; ?>" readonly>
					</div>

					<div class="form">
						<label><b>Department : </b></label>
				  		<input type="text" name="destinasi" value="<?php echo $row["Staff_Dept"]; ?>" readonly>
					</div>

					<div class="form">
						<label><b>Position : </b></label>
				  		<input type="text" name="destinasi" value="<?php echo $row["Staff_Position"]; ?>" readonly>
					</div>

					<div class="form">
						<label><b>Email : </b></label>
				  		<input type="text" name="destinasi" value="<?php echo $row["Staff_Email"]; ?>" readonly>
					</div>

					<div class="form">
						<label><b>Extension Phone Number : </b></label>
				  		<input type="text" name="destinasi" value="<?php echo $row["Staff_Extension"]; ?>" readonly>
					</div>
				
			</div>

			<div class="form-right">

					<div class="form">
						<div class="tarikh-pergi">
							<label><b>Departure Date : </b></label><br>
                            <input type="text" name="tarikh_dari" value="<?php echo $row["dateOut"]; ?>" readonly >
                        </div>

						<div class="tarikh-balik">
							<label><b>Return Date : </b></label><br>
				  			<input type="text" name="tarikh_hingga" value="<?php echo $row["dateIn"]; ?>" readonly><br>
						</div>
					</div>

					<div class="form">
						<div class="masa-pergi">
							<label><b>Departure Time : </b></label><br>
				  			<input type="text" name="masa_dari" value="<?php echo $row["timeOut"]; ?>" readonly>
						</div>

						<div class="masa-balik">
							<label><b>Return Time : </b></label><br>
				  			<input type="text"  name="masa_hingga" value="<?php echo $row["timeIn"]; ?>" readonly><br>
						</div>
					</div>

					<div class="form">
						<label><b>Destination : </b></label>
				  		<input type="text" name="destinasi" value="<?php echo $row["Destination"]; ?>" readonly>
					</div>

					<div class="form">
						<label><b>Reason :</b></label>
				  		<input type="text" name="tujuan" value="<?php echo $row["Reason"]; ?>" readonly>
					</div>
				
					<div class="form">
						<div class="masuk-hutan">
							<label><b>Number of Passenger : </b></label><br>
				  			<input type="Number" class="num_passenger" id="num_psg" name="num_psg" value="<?php echo $row["Num_Passenger"]; ?>" readonly>
						</div>

						<div class="bil-kend">
							<label><b>Vehicle Type Preference :</b></label><br>
				  			<input class="prefer" name="prefer" id="prefer" value="<?php echo $row["Cat_Name"]; ?>" readonly>
						</div>
					</div>

					<br><br><br><br>
					<div class="form">
						<table class="table-kend" name="tabldeupdate">
							<tr class="thead-kend">
								<th>Plate No.</th>
								<th>Vehicle Details</th>
								<th>Driver</th>
								<th>Phone No.</th>
							</tr>

					<?php
							$queryvch ="SELECT trip.Vehicle_Plate, Vehicle_Model, Cat_Name, Staff_Name, Staff_Phone FROM trip 
								INNER JOIN vehicle ON trip.Vehicle_Plate = vehicle.Vehicle_Plate 
								INNER JOIN vehiclecat ON vehicle.Cat_No = vehiclecat.Cat_No
								INNER JOIN job_desc ON trip.Trip_No = job_desc.Trip_No
								INNER JOIN user ON job_desc.Staff_ID = user.Staff_ID 
								WHERE job_desc.Job_Desc = 'DRIVER' AND Book_No = '$book_no'";
							$resultvch=mysqli_query($conn, $queryvch);
							While($rowvch=mysqli_fetch_array($resultvch)) {
					?>

							<tr class="tbody-kend">	
								<td><?php echo $rowvch['Vehicle_Plate'] ?></td>
								<td><?php echo $rowvch['Vehicle_Model'] ?> (<?php echo $rowvch['Cat_Name'] ?>)</td>
								<td><?php echo $rowvch['Staff_Name'] ?></td>
								<td><?php echo $rowvch['Staff_Phone'] ?></td>
							</tr>

					<?php
							}
					?>

						</table>
					</div>

					<div class="form">
						<label><b>Booking Status : &nbsp; &nbsp;</b></label>
                        <input type="radio" name="status" value="Approved" required/> Approve &nbsp; &nbsp; &nbsp; &nbsp;
						<input type="radio" name="status" value="Disapproved" required/> Disapprove &nbsp; &nbsp; &nbsp;
					</div>

					<div class="view-booking-button"> 
						<button type="reset" class="btn" onclick="window.location.href = 'new_booking_list.php';">Back</button>
                        <button type="submit" class="btn-save">Submit</button>
						<!-- <button type="submit" class="btn-save">Save</button> -->
					</div>

					<br><br>
				</form>
			</div>
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