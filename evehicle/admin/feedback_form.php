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

	if (isset($_GET['id'])) {
		$book_no=$_GET['id'];

		$query1 ="SELECT * FROM trip WHERE Book_No = '$book_no'";
		$result1=mysqli_query($conn, $query1);
		$row1 = mysqli_fetch_array($result1);
	}
?>

<center>
<content>
	<center>

        <div class="title">
			<h2><b>Vehicle Booking Application</b></h2><hr>
		</div>

		<div style="width: 60%;">
			<!-- <div class="form-left"> -->
				<form role="form" action="insert_feedback.php" method="post" onsubmit="return Submit()">

				<div style="font-size: 14px;text-align: left; padding: 16px">
					<label><b>Trip No. :</b></label> <?php echo $row1['Book_No']; ?>
					<input type="hidden" name="bookno" value="<?php echo $row1['Book_No']?>">
					<input type="hidden" name="tripno" value="<?php echo $row1['Trip_No']?>">

				</div>

					<div class="div-table">
            			<table class= "table-semak">
            				<tr class="thead">
            					<td></td>
            					<td>Very Unsatified</td>
            					<td>Unsatisfied</td>
            					<td>Neutral</td>
            					<td>Satisfied</td>
            					<td>Very Satisfied</td>
            				</tr>
            				<tr class="tbody">
            					<td style="text-align: left;">Good punctuality from the time to depart until the time to arrive at the destination </td>
            					<td><input type="radio" name="time" value="1" required/></td>
            					<td><input type="radio" name="time" value="2" required/></td>
            					<td><input type="radio" name="time" value="3" required/></td>
            					<td><input type="radio" name="time" value="4" required/></td>
            					<td><input type="radio" name="time" value="5" required/></td>
            				</tr>
            				<tr class="tbody">
            					<td style="text-align: left;">The boarded vehicle is in good condition, safe and clean</td>
            					<td><input type="radio" name="vehicle" value="1" required/></td>
            					<td><input type="radio" name="vehicle" value="2" required/></td>
            					<td><input type="radio" name="vehicle" value="3" required/></td>
            					<td><input type="radio" name="vehicle" value="4" required/></td>
            					<td><input type="radio" name="vehicle" value="5" required/></td>
            				</tr>
            				<tr class="tbody">
            					<td style="text-align: left;">The driver of the vehicle has a good attitude, not drunk and drives carefully throughout the trip</td>
            					<td><input type="radio" name="driver" value="1" required/></td>
            					<td><input type="radio" name="driver" value="2" required/></td>
            					<td><input type="radio" name="driver" value="3" required/></td>
            					<td><input type="radio" name="driver" value="4" required/></td>
            					<td><input type="radio" name="driver" value="5" required/></td>
            				</tr>
            			</table>
            		</div>

					<br>

					<div style="font-size: 14px;text-align: left; padding: 16px">
						<label><b>Comments :</b></label>
				  		<textarea class="nama-penumpang" rows="2" name="comment" style="text-transform:uppercase"></textarea>
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