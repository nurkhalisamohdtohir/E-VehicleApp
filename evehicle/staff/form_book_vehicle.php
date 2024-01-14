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
 	
 		function Submit() {
		    var ask = confirm("Are you sure to proceed?");
		    if (ask == true) {
		        return true;
		    }
		    else {
		    	return false;
		    }
		}

        $( function() {

        	Date.prototype.yyyymmdd = function () {
	            var dd = this.getDate().toString();
	            var mm = (this.getMonth() + 1).toString();
	            var yyyy = this.getFullYear().toString();
	            return yyyy + "-" + (mm[1] ? mm : "0" + mm[0]) + "-" + (dd[1] ? dd : "0" + dd[0]);
		    }; //UNTUK DAPATKAN CURRENT DATE

	        $('#dateFrom').change(function() {
	        	var startDate = $('#dateFrom').val();
				var today = new Date().yyyymmdd();
				if (startDate < today) {
					alert('Invalid selected date! Please try again.');
					$("#dateFrom").attr( "value", new Date() );
				}
	        }); // VALIIDATE DATE_OUT TAK BOLEH KURANG DARI CURRENT DATE

	       	$('#dateTo').change(function() {
	        	var endDate = $('#dateTo').val();
	        	var startDate = $('#dateFrom').val();
				var today = new Date().yyyymmdd();

				if ((today > endDate) && (startDate > endDate) ) {
					alert('Invalid selected date! Please try again.');
					$("#dateTo").attr( "value", new Date() );
				}
	        });// VALIDATE DATE_IN TAK BOLEH KURANG DARI DATE_OUT DAN CURRENT DATE


        	$('#num_psg, #dateFrom, #dateTo').change(function() {

        		var num = parseInt(this.value.toString());

        		if (num > 0) {

        			$('#prefer').prop('disabled', false);

        			var dateFrom = $('#dateFrom').val();
        			var dateTo = $('#dateTo').val();
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
        		}
        	});
        });



    </script>

</head>

<body>
<?php
  	include("header.php");
	include_once '../connect.php';
	$query ="SELECT * FROM User WHERE Staff_ID='$login_session'";
	$result=mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);
?>

<center>
<content>
	<center>

        <div class="title">
			<h2><b>Vehicle Booking Application</b></h2><hr>
		</div>

		<div class="form-box">
			<!-- <div class="form-left"> -->
				<form role="form" action="insert_booking.php" method="post" onsubmit="return Submit()">

					<div class="form">
                        <div class="ID-left">
						    <label><b>Staff ID :</b></label>
				  		    <input type="text" name="id" value="<?php echo "$row[Staff_ID]"?>" readonly>
                        </div>  

                        <div class="IC-right">
						    <label><b>I/C Number :</b></label>
				  		    <input type="text" name="ic" value="<?php echo "$row[Staff_IC]"?>" readonly>
                        </div> 
					</div>
					
					<div class="form">
						<div class="tarikh-pergi">
							<label><b>Departure Date : </b></label><br>
				  			<input type="date" name="dateFrom" id="dateFrom" required>
						</div>

						<div class="tarikh-balik">
							<label><b>Return Date : </b></label><br>
				  			<input type="date" name="dateTo" id="dateTo" required><br>
						</div>
					</div>

					<div class="form">
						<div class="masa-pergi">
							<label><b>Departure Time : </b></label><br>
				  			<input type="time" name="timeFrom" id="timeFrom" required>
						</div>

						<div class="masa-balik">
							<label><b>Return Time : </b></label><br>
				  			<input type="time"  name="timeTo" id="timeTo" required><br>
						</div>
					</div>

					<div class="form">
						<label><b>Destination : </b></label>
				  		<input type="text" name="destination" required style="text-transform:uppercase">
					</div>

					<div class="form">
						<label><b>Reason :</b></label>
				  		<input type="text" name="reason" required style="text-transform:uppercase">
					</div>
				
			<!-- </div>

			<div class="form-right">
				 -->

					<div class="form">
						<div class="masuk-hutan">
							<label><b>Number of Passenger : </b></label><br>
				  			<input type="Number" class="num_passenger" id="num_psg" name="num_psg" required>
						</div>

						<div class="bil-kend">
							<label><b>Preference of Vehicle Type :</b></label><br>
				  			<select class="prefer" name="prefer" id="prefer" disabled>

                            </select>
						</div>
					</div>

					<br><br><br><br>

					<div class="form">
						<input type="checkbox" name="catatan" value="" required><strong> I acknowledge that I have been instructed to carry out official duties outside the office.</strong>
					</div>

					<br>
					<div class="feedback-button">
						<button type="reset" class="btn">RESET</button>
						<button type="submit" class="btn">SUBMIT</button>
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