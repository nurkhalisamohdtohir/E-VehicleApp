<?php
  	include("header.php");
	include_once '../connect.php';
    $book_no = '';
    $loop = 0;
    $loop1 = 0;

	if (isset($_GET['id'])) {
		$book_no=$_GET['id'];
	}

	$query ="SELECT *, DATE_FORMAT(Date_Out, '%d/%m/%Y') AS dateOut, DATE_FORMAT(Date_In, '%d/%m/%Y') AS dateIn, TIME_FORMAT(Time_Out, '%h:%i %p') AS timeOut, TIME_FORMAT(Time_In, '%h:%i %p') AS timeIn  FROM booking INNER JOIN user ON booking.Staff_ID= user.Staff_ID INNER JOIN vehiclecat ON booking.Prefer_Cat_No = vehiclecat.Cat_No WHERE Book_No = '$book_no'";
	$result=mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);

	$query1 ="SELECT * FROM vehicle INNER JOIN vehiclecat ON vehicle.Cat_No = vehiclecat.Cat_No INNER JOIN trip ON vehicle.Vehicle_Plate = trip.Vehicle_Plate WHERE Book_No = '$book_no'";
	$result1 = mysqli_query($conn, $query1);

	$query_change ="SELECT * FROM vehicle INNER JOIN vehiclecat ON vehicle.Cat_No = vehiclecat.Cat_No INNER JOIN trip ON vehicle.Vehicle_Plate = trip.Vehicle_Plate WHERE Book_No = '$book_no'";
	$result_change = mysqli_query($conn, $query_change);

	$query_vhc ="SELECT * FROM vehicle INNER JOIN vehiclecat ON vehicle.Cat_No = vehiclecat.Cat_No INNER JOIN trip ON vehicle.Vehicle_Plate = trip.Vehicle_Plate WHERE Book_No = '$book_no'";
	$result_vhc = mysqli_query($conn, $query_vhc);
	//$row1 = mysqli_fetch_array($result1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>e-Vehicle</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
	<link type="text/css" rel="Stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css" />
    
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

		// window.onload=function() {

		// 	  document.getElementById("hidden_elements1").style.display="none";

		// 	  var radios = document.forms[0].elements["status"];
		// 	  for (var i = [0]; i < radios.length; i++)
		// 	    radios[i].onclick=radioClicked;
		// }

		// function radioClicked() {

		// 	    if (this.value == "ACCEPTED") {
		// 	            document.getElementById("hidden_elements1").style.display="block";
			        
		// 	   } 
		// 	   else {
		// 	    document.getElementById("hidden_elements1").style.display="none";
		// 	   }
		// }

		$(document).ready(function() {

			$('#update-vehicle').on('click', function() 
		  	{
		  		var curr =  $("#table_vehicle").find("tr").last()
		  		var loop = curr.find("td:eq(0)").html();
		  		var plate = $("select[name='platelist[]']").val();
		  		var bookno = parseInt($("#bookno").val());

		  		$.ajax({
						type: 'GET',
						url: 'ajax_updatevehicle.php',
						data: {bookno:bookno, loop:loop, plate:plate },
						success: function(data){
							
						}
					});
			   	
			});

			$('#status').on('click', function() 
		  	{
		  		var status = $(this).val();

		  		if (status == "ACCEPTED") {
		  			 $('.bg-modal-driver').addClass('bg-modal-visible-driver');
		  		}
		  		else {

		  		}
			   	
			});

			$('.bg-modal-driver').on('click', function(e) {
			    e.preventDefault();
			    console.log($(e.target));
			    if ($(e.target).is('#done') || $(e.target).is('.col-md-12') || $(e.target).is('.bg-modal-driver')) {
			      $('.bg-modal-driver').removeClass('bg-modal-visible-driver');
			    }
			});

			$('.bg-modal-driver').ready(function() { 
				$("#table_driver").ready(function() {
					var curr = $(".loopno1").closest("tr");
					var loopno = curr.find("td:eq(0)").html();
					var bookno = parseInt($("#bookno").val());
					var dateFrom = $("#dateFrom").val();
	        		var dateTo = $("#dateTo").val();
					

					$.ajax({
						type: 'GET',
						url: 'ajax_searchdriver.php',
						data: {bookno:bookno, dateFrom:dateFrom, dateTo:dateTo},
						success: function(data){
							curr.find("td:eq(2) select").html(data);
						}
					});
				});
			

				// $("#table_driver").on("change", ".driver",function() {

				// 	var curr1 = $(this).closest("tr");
				// 	var loopno = curr1.find("td:eq(0)").html();
	   //      		var id = $(".driver").val();
	        		
				// 		$.ajax({
				// 			type: "GET",
				// 			url: "ajax_driverphone.php",
				// 			data: {id:id},
				// 			success: function(data){
				// 				curr1.find("td:eq(3) input").val(data);
				// 			}
				// 		});
				// });
			});

			

		  	$('#update').on('click', function() 
		  	{
			    $('.bg-modal').addClass('bg-modal-visible');	
			});

			$('.bg-modal').on('click', function(e) {
			    e.preventDefault();
			    console.log($(e.target));
			    if ($(e.target).is('#done') || $(e.target).is('.col-md-12') || $(e.target).is('.bg-modal')) {
			      $('.bg-modal').removeClass('bg-modal-visible');
			    }
			});

			$('.bg-modal').ready(function() { 
				$("#table_vehicle").ready(function() {
					var curr = $(".loopno").closest("tr");
					var loopno = curr.find("td:eq(0)").html();
					var bookno = parseInt($("#bookno").val());
					var dateFrom = $("#dateFrom").val();
	        		var dateTo = $("#dateTo").val();
					

					$.ajax({
						type: 'GET',
						url: 'ajax_catname.php',
						data: {bookno:bookno, dateFrom:dateFrom, dateTo:dateTo},
						success: function(data){
							curr.find("td:eq(1) select").html(data);
						}
					});
				});

				$("#table_vehicle").on("change", "#catname",function() {
					var curr = $(this).closest("tr");
					var loopno = curr.find("td:eq(0)").html();
					var bookno = parseInt($("#bookno").val());
					var dateFrom = $("#dateFrom").val();
	        		var dateTo = $("#dateTo").val();
					var catno = $(this).val();

						$.ajax({
							type: "GET",
							url: "ajax_model.php",
							data: {catno:catno, dateFrom:dateFrom, dateTo:dateTo, bookno:bookno,},
							success: function(data){
								curr.find("td:eq(2) select").html(data);
							}
						});
				});

				$("#table_vehicle").on("change ", "#model",function() {
					var curr = $(this).closest("tr");
					var loopno = curr.find("td:eq(0)").html();
					var bookno = parseInt($("#bookno").val());
					var dateFrom = $("#dateFrom").val();
	        		var dateTo = $("#dateTo").val();
					var model = $(this).val();

						$.ajax({
							type: "GET",
							url: "ajax_plate.php",
							data: {model:model, dateFrom:dateFrom, dateTo:dateTo, bookno:bookno,},
							success: function(data){
								curr.find("td:eq(3) select").html(data);
							}
						});
				});

			});
				

		});

		function Reduce() {
			alert("hello");
            document.getElementsByTagName("tr")[1].remove();
        }

        
	</script>
</head>

<body>


<center>
<content>
	<center>

        <div class="title">
			<h2><b>Vehicle Booking Details</b></h2><hr>
		</div>

       	<div class="bg-modal">
		    <div class="popup" style="width: 50%;">
		    	<h3> Change Vehicle </h3>
		        <div class="form-box" style="width: 100%;">
		            <form>
		            	<div class="form">
		            		<table class="table-kend" id="table_vehicle">
							<tr class="thead-kend">
								<th width="10%">No.</th>
								<th width="30%">Vehicle Type</th>
								<th width="30%">Model</th>
								<th width="30%">Plate No.</th>
							</tr>
							<?php while ($rowchange = mysqli_fetch_array($result_change)) { 
								$loop++; ?>
							<tr class="tbody-kend" >
								<td name="loopno" class="loopno"><?php echo $loop?></td>
								<td>
									<select name = "catname<?php echo $loop?>" id = "catname" required>

									</select>
								</td>
								<td>
									<select name = "model<?php echo $loop?>" id = "model" required>
											
									</select>
								</td>
								<td>
									<select name = "platelist[]" id = "plate" required>
											
									</select>
								</td>
							</tr>

					<?php 
					

					};
					$result_change->close();
					?>

					</table>

						</div>
		            </form>
		            <div style="text-align: right;margin-right: 25px;">
		            	<br>
		            	<button type="button" id="done" class="btn" style="width: 60px;">Close</button>
		            	<button type="button" id="update-vehicle" class="btn-save" style="width: 75px;">Update</button>
		            </div>
		        </div>
		    </div>
		</div>

		

		<div class="form-box-span">
			<div class="form-left">
				<form role="form" action="update_booking_status.php" method="post" onsubmit="return Save()">
					<div class="bg-modal-driver">
					    <div class="popup-driver" style="width: 45%; height: 330px;">
					    	<h3 style="text-align: center;"> Select Driver </h3>
					        <div class="form-box" style="width: 100%;">
					         
					            	<div class="form">
					            		<table class="table-kend" id="table_driver">
										<tr class="thead-kend">
											<th width="10%">No.</th>
											<th width="30%">Vehicle Plate</th>
											<th width="90%">Driver</th>
										</tr>
										<?php while ($rowvhc=mysqli_fetch_array($result_vhc)) { 
											$loop1++; ?>
										<tr class="tbody-kend">	
											<td name="loopno1" class="loopno1"><?php echo $loop1 ?></td>
											<td><?php echo $rowvhc['Vehicle_Plate'] ?></td>
											<td>
												<select name = "driverlist[]" id="driver<?php echo $loop1?>" class = "driver">
														
												</select>
											</td>
										</tr>

										<?php 
										};
										$result_vhc->close();
										?>
										</table>
									</div>
									<input type="hidden" name="loop" value="<?php echo $loop1?>">
					            
					            <div style="text-align: right;margin-right: 25px;">
					            	<br>
					            	<button type="button" id="done" class="btn" style="width: 60px;">Done</button>
					            </div>
					            
					        </div>
					    </div>
					</div>
					<div class="form">
						<div class="ID-left">
						    <label><b>Booking Number :</b></label>
				  		    <input type="text" name="bookno" id="bookno" value="<?php echo "$row[Book_No]"?>" readonly>
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
                            <input type="text" name="tarikh_dari" id="dateFrom" value="<?php echo $row["dateOut"]; ?>" readonly >
                        </div>

						<div class="tarikh-balik">
							<label><b>Return Date : </b></label><br>
				  			<input type="text" name="tarikh_hingga" id="dateTo" value="<?php echo $row["dateIn"]; ?>" readonly><br>
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
				  			<input type="hidden" id="num_vehicle" value="<?php echo $row["Num_Vehicle"]; ?>">
						</div>
					</div>

					<br><br><br><br>
					<div class="form">
						<table class="table-kend">
							<tr class="thead-kend">
								<th>Plate No.</th>
								<th>Vehicle Type</th>
								<th>Model</th>
							</tr>
							<?php
								While($row1=mysqli_fetch_array($result1)) {
							?>
							<tr class="tbody-kend">	
								<td><?php echo $row1['Vehicle_Plate'] ?></td>
								<td><?php echo $row1['Cat_Name'] ?></td>
								<td><?php echo $row1['Vehicle_Model'] ?></td>		
							</tr>
							<?php
								}
								$result1->close();
							?>
						</table>
						<!-- <div align="right" >
							<button type="button" style="font-size: 11px;margin-top: 10px;" id="update">Change Vehicle</button>
						</div> -->
					</div>
					
					<div class="form">
						<label><b>Booking Status : &nbsp; &nbsp;</b></label>
                        <input type="radio" name="status" id="status" value="ACCEPTED" required/> Accept &nbsp; &nbsp; &nbsp; &nbsp;
						<input type="radio" name="status" id="status" value="REJECTED" required/> Reject &nbsp; &nbsp; &nbsp;
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