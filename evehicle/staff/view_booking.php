<?php

		include("header.php");
		include '../connect.php';
  //  		$book_no = '';

		// if (isset($_GET['id'])) {
		// 	$book_no=$_GET['id'];
		// }

		// $query ="SELECT *, DATE_FORMAT(Date_Out, '%d/%m/%Y') AS dateOut, DATE_FORMAT(Date_In, '%d/%m/%Y') AS dateIn, TIME_FORMAT(Time_Out, '%h:%i %p') AS timeOut, TIME_FORMAT(Time_In, '%h:%i %p') AS timeIn FROM booking INNER JOIN user ON booking.Staff_ID= user.Staff_ID INNER JOIN vehiclecat ON booking.Prefer_Cat_No = vehiclecat.Cat_No WHERE Book_No = '$book_no'";
		// $result=mysqli_query($conn, $query);
		// $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html>
<head>
	<title>e-Vehicle</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link type="text/css" rel="Stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css" />
  
    <script>
		function save() {
		    var ask = confirm("Are you sure to update this booking?");
		    if (ask == true) {
		        return true;
		    }
		    else {
		    	return false;
		    }
		}
		
		$(function() {

			$("#button_cancel").click(function(e) {

				var ask = confirm("Warning : This action cannot retrieve back the booking information! \n Are you sure to cancel this booking?");

				if (ask == true) {
					e.preventDefault();
			  		var book_no = $("#book_no").val(); 

					  $.ajax({
						    type:'POST',
						    data: {book_no:book_no},
						    url:'cancel_booking.php',

						    success:function(data) {
						      window.location.href = "booking_list1.php";
						      alert(data);
						    }
					  });
				}
			  	
			});

        	$('#status').ready(function() {

        		if ($("#status").val() == "PROCESSING") {

        			
        		}
        		
        		else {
        			$('#form input').attr('readonly', 'readonly');
        			$('#form select').attr('disabled', 'disabled');
        			//$('#button_save').attr('hidden', 'hidden');
        		}
        	});
        

        	Date.prototype.yyyymmdd = function () {
	            var dd = this.getDate().toString();
	            var mm = (this.getMonth() + 1).toString();
	            var yyyy = this.getFullYear().toString();
	            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
		    };


	        $('#dateFrom').change(function() {
	        	var startDate = $('#dateFrom').val();
				var today = new Date().yyyymmdd();
				var endDate = $('#dateTo').val();

				if (startDate < today) {
					alert('Invalid selected date! Please try again.');
					$("#dateFrom").attr( "value", $("#date1").val());
				}

				else if (startDate > endDate) {
					alert('Please change the return date.');
					$('#dateTo').focus();
					$('#dateTo').attr( "value", "");
				}
	        });


	       	$('#dateTo').change(function() {
	        	var endDate = $('#dateTo').val();
	        	var startDate = $('#dateFrom').val();
				var today = new Date().yyyymmdd();

				if (today > endDate || startDate > endDate) {
					alert('Invalid selected date! Please try again.');
					$("#dateTo").attr( "value", $("#date2").val());
				}

	        });


        	$('#num_psg, #dateFrom, #dateTo').change(function() {

        		var num = parseInt($('#num_psg').val());
        		var dateFrom = $('#dateFrom').val();
        		var dateTo = $('#dateTo').val();

        		if (num > 0) {

        			$('#prefer').prop('disabled', false);
					var html = '';

					$.ajax({
						type: 'GET',
						url: 'ajax_passenger.php',
						data: {num:num, dateFrom:dateFrom, dateTo:dateTo},
						success: function(data){
							$("#prefer").html(data);
						}
					});
        		}

        		else if (num == 0 || num == null) {
        			$('#prefer').prop('disabled', true);
        			$("#prefer").attr( "value", "");
        		}
        	});

        	$('#filter').on('click', function() 
		  	{
			    $('.bg-modal').addClass('bg-modal-visible');	
			});

			$('.bg-modal').on('click', function(e) {
			    e.preventDefault();
			    console.log($(e.target));
			    if ($(e.target).is('.fa-close') || $(e.target).is('.col-md-12') || $(e.target).is('.bg-modal')) {
			      $('.bg-modal').removeClass('bg-modal-visible');
			    }
			});

			
  

        });

	</script>
</head>

<body>

<center>

<?php
   		$book_no = '';

		if (isset($_GET['id'])) {
			$book_no=$_GET['id'];
		

		$query ="SELECT *, DATE_FORMAT(Date_Out, '%d/%m/%Y') AS dateOut, DATE_FORMAT(Date_In, '%d/%m/%Y') AS dateIn, TIME_FORMAT(Time_Out, '%h:%i %p') AS timeOut, TIME_FORMAT(Time_In, '%h:%i %p') AS timeIn FROM booking INNER JOIN user ON booking.Staff_ID= user.Staff_ID INNER JOIN vehiclecat ON booking.Prefer_Cat_No = vehiclecat.Cat_No WHERE Book_No = '$book_no'";
		$result=mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
?>

<content id="viewbook">
	<center>

        <div class="title">
			<h2><b>Vehicle Booking Details</b></h2><hr>
		</div>

		<div class="form-box">
			<!-- <div class="form-left"> -->
				<form role="form" action="update_booking.php" method="post" name="form" id="form" onsubmit="return save()" >

					<input type="hidden" name="book_no" id="book_no" value="<?php echo $row['Book_No']?>">

					<div class="form">
                        <div class="ID-left">
						    <label><b>Staff ID :</b></label>
				  		    <input type="text" name="id" value="<?php echo $row['Staff_ID']?>" readonly>
                        </div>  
  
                        <div class="IC-right">
						    <label><b>I/C Number :</b></label>
				  		    <input type="text" name="ic" value="<?php echo $row['Staff_IC']?>"  readonly >
                        </div> 
					</div>
					
					<div class="form">
						<div class="tarikh-pergi">
							<label><b>Departure Date : </b></label><br>
							<input type="date" name="dateFrom" id="dateFrom" value="<?php echo $row['Date_Out']?>" required>
				  			<input type="hidden" id="date1" value="<?php echo $row['Date_Out']?>">
						</div>

						<div class="tarikh-balik">
							<label><b>Return Date : </b></label><br>
							<input type="hidden" id="date2" value="<?php echo $row['Date_In']?>">
				  			<input type="date" name="dateTo" id="dateTo" value="<?php echo $row['Date_In']?>" required><br>
				  		</div>
					</div>

					<div class="form">
						<div class="masa-pergi">
							<label><b>Departure Time : </b></label><br>
				  			<input type="time" name="timeFrom" id="timeFrom" value="<?php echo $row['Time_Out']?>" required>
						</div>

						<div class="masa-balik">
							<label><b>Return Time : </b></label><br>
				  			<input type="time"  name="timeTo" id="timeTo" value="<?php echo $row['Time_In']?>" required><br>
						</div>
					</div>

					<div class="form">
						<label><b>Destination : </b></label>
				  		<input type="text" name="dest" id="dest" value="<?php echo $row['Destination']; ?>" style="text-transform:uppercase"  >
					</div>

					<div class="form">
						<label><b>Reason :</b></label>
				  		<input type="text" name="reason" id="reason" value="<?php echo $row['Reason']; ?>" style="text-transform:uppercase"  >
					</div>
				
			<!-- </div>

			<div class="form-right">
				 -->

					<div class="form">
						<div class="masuk-hutan">
							<label><b>Number of Passenger : </b></label><br>
				  			<input type="Number" class="num_passenger" id="num_psg" name="num_psg" value="<?php echo $row['Num_Passenger']; ?>"  >
						</div>

						<div class="bil-kend">
							<label><b>Preference of Vehicle Type :</b></label><br>
				  			<select class="prefer" name="prefer" id="prefer">
				  				<option value="<?php echo $row['Prefer_Cat_No'];?>, <?php echo $row['Num_Vehicle'];?>" selected><?php echo $row['Cat_Name']; ?></option>
                            </select>
						</div>
					</div>

					<div class="form">
						<label><b>Booking Status : <font color="red"><?php echo $row['Book_Status']; ?></font></b></label>
						<input type="hidden" name="status" id="status" value="<?php echo $row['Book_Status']; ?>">
					</div>

					<?php
					if ($row["Book_Status"] == "ACCEPTED" || $row["Book_Status"] == "APPROVED") {

						$queryvch ="SELECT trip.Vehicle_Plate, Vehicle_Model, Cat_Name, Staff_Name, Staff_Phone FROM trip 
								INNER JOIN vehicle ON trip.Vehicle_Plate = vehicle.Vehicle_Plate 
								INNER JOIN vehiclecat ON vehicle.Cat_No = vehiclecat.Cat_No
								INNER JOIN job_desc ON trip.Trip_No = job_desc.Trip_No
								INNER JOIN user ON job_desc.Staff_ID = user.Staff_ID 
								WHERE job_desc.Job_Desc = 'DRIVER' AND Book_No = '$book_no'";
						$resultvch=mysqli_query($conn, $queryvch);
					?>

					<div class="form">
						<table class="table-kend" name="tabldeupdate">
							<tr class="thead-kend">
								<th>Plate No.</th>
								<th>Vehicle Details</th>
								<th>Driver</th>
								<th>Phone No.</th>
							</tr>

					<?php
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

					<?php
					}
					?>

					<br>

					<div class="view-booking-button"> 
						<button type="reset" class="btn" onclick="window.location.href = 'booking_list1.php';">Back</button>

					<?php if ($row["Book_Status"] == "PROCESSING") { ?>
	                    <button type="reset" class="btn-batal" id="button_cancel" >Cancel Booking</button>
	                    <button type="submit" class="btn-save" id="button_save">Save</button>

	                <?php } else if ($row["Book_Status"] != "PROCESSING" && $row["Date_Out"] > date("Y-m-d")) { ?>

                       	<button type="reset" class="btn-batal" id="button_cancel" >Cancel Booking</button>

                     <?php } ?>


					</div>
					
				</form>
			<!-- </div> -->
		</div>
        <br>
	</center>
</content>
<?php
}
?>

</center>
</body>
<?php
  include("../footer.php");
?>
</html>