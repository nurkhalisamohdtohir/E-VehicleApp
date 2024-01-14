<!DOCTYPE html>
<html>
<head>
	<title>e-Vehicle</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<script>
$(document).ready(function(){
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".tbody").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<script>
$(function() {
    $("#dateFrom").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0,
        onSelect: function(dateText, instance) {
            date = $.datepicker.parseDate(instance.settings.dateFormat, dateText, instance.settings);
            date.setMonth(date.getMonth() + 6);
            $("#dateTo").datepicker("setDate", date);
        }
    });
    $("#dateTo").datepicker({
        dateFormat: "yy-mm-dd",
        minDate: 0
    });
});
</script>

<script>
function checkMileage()
{

    var theForm = document.forms["serviceForm"];

    var currentMileage = theForm.elements["currentMileage"];
    var serviceMileage = theForm.elements["serviceMileage"];

    var current = currentMileage.value;
    var calculate = parseInt(current) + 10000;
    theForm.elements["serviceMileage"].value = calculate;
 
 	/*
    if(currentMileage.value >= 5000 && currentMileage.value < 10000)
    	{ theForm.elements["serviceMileage"].value = 10000; }

    else if(currentMileage.value >= 10000 && currentMileage.value < 20000)
    	{ theForm.elements["serviceMileage"].value = 20000; }

    else if(currentMileage.value >= 20000 && currentMileage.value < 30000)
    	{ theForm.elements["serviceMileage"].value = 30000; }

    else if(currentMileage.value >= 30000 && currentMileage.value < 40000)
    	{ theForm.elements["serviceMileage"].value = 40000; }

    else if(currentMileage.value >= 40000 && currentMileage.value < 50000)
    	{ theForm.elements["serviceMileage"].value = 50000; }

    else if(currentMileage.value >= 50000 && currentMileage.value < 60000)
    	{ theForm.elements["serviceMileage"].value = 60000; }

    else if(currentMileage.value >= 60000 && currentMileage.value < 70000)
    	{ theForm.elements["serviceMileage"].value = 70000; }

    else if(currentMileage.value >= 70000 && currentMileage.value < 80000)
    	{ theForm.elements["serviceMileage"].value = 80000; }

    else if(currentMileage.value >= 80000 && currentMileage.value < 90000)
    	{ theForm.elements["serviceMileage"].value = 90000; }
    
    else if(currentMileage.value >= 90000 && currentMileage.value < 100000)
    	{ theForm.elements["serviceMileage"].value = 100000; }

    */
}
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
			<h2><b>Add Service Form</b></h2><hr>
		</div>

		<div class="form-box">
			<!-- <div class="form-left"> -->
				<form role="form"  id="serviceForm" action="service_add.php" method="POST">

					<div class="form">
				  		<label><b>Plate Number : </b></label><br>
							<select class="prefer" id="choosePlate" name="Vehicle_Plate" required onchange="fetch_select(this.value);">
							<option disabled selected>-- Select Plate Number --</option>
					<?php
        				$records = mysqli_query($conn, "SELECT Vehicle_No, Vehicle_Plate From vehicle");  // Use select query here 

        				while($data = mysqli_fetch_array($records))
        				{
            			echo "<option value='". $data['Vehicle_Plate'] ."'>" .$data['Vehicle_Plate'] ."</option>";  // displaying data in option menu
        				}	
    				?>  
    				

                            </select>
					</div>

					<div class="form">
						<div class="tarikh-pergi">
							<label><b>Service Date : </b></label><br>
				  			<input type="text" id="dateFrom" name="Service_Date" required>
						</div>

						<div class="tarikh-balik">
							<label><b>Service Mileage : </b></label><br>
							<input type="text" id="currentMileage" name="Service_Mileage" required onkeyup="checkMileage()">		
						</div>
					</div>

					<div class="form">
						<div class="masa-pergi">
							<label><b>Next Date : </b></label><br>
				  			<input type="text" id="dateTo" name="Next_Date" required><br>
						</div>

						<div class="masa-balik">
							<label><b>Next Mileage : </b></label><br>
				  			<input type="text"  id="serviceMileage" name="Next_Mileage" required><br>
						</div>
					</div>

					<div class="form">
						<label>**Please make sure all information are correct </label>	
					</div>

				
			<!-- </div>

			<div class="form-right">
				 -->

					<div class="form">
						<input type="checkbox" name="catatan" value="" required><strong> I acknowledge that all information are correct.</strong>
					</div>

					<br>
					<div class="feedback-button">
						<button type="submit" name="Submit" value="submit" class="btn">SUBMIT</button>
						<button type="reset" class="btn">RESET</button>
					</div>
					
				</form>
			<!-- </div> -->
		</div>
        <br>
	</center>
</content>
</center>

<center>
<content>
	<center>
    <div class="title">
			<h2><b>List of Services</b></h2><hr>
		</div>

		<div class="div-table">
            <table class= "table-semak">
            	<tr><input id="search" style="width: 30%; height: 30px;font-size: 15px;" type="text" placeholder="Search.."></tr>
                <tr class="thead">
					<th width="2%">No.</th>
                    <th width="10%">Category</th>
                    <th width="10%">Plate no</th>
                    <th width="10%">Model</th>
                    <th width="12%">Service Date</th>
                    <th width="10%">Service Mileage</th>
                    <th width="12%">Next Date</th>
                    <th width="10%">Next Mileage</th>
                    <th width="28%">Action</th>
                </tr>   

				<?php

				$counter = 1;
				$sql="SELECT *, DATE_FORMAT(Service_Date, '%d/%m/%Y') AS Service_Date, DATE_FORMAT(Next_Date, '%d/%m/%Y') AS Next_Date FROM `vehicle` v , `vehiclecat` c, `service` s WHERE v.`Cat_No` = c.`Cat_No` AND v.`Vehicle_Plate` = s.`Vehicle_Plate`";
				$result_set=mysqli_query($conn,$sql);

				if ($result_set-> num_rows == 0)  
				{
					echo "<font size='3'><br><br>0 result<font>";
				}

				else {

				
                
            

				While($row1=mysqli_fetch_array($result_set))
				{ ?>
                <tr class="tbody" id="MyTable">
					<td><?php echo $counter; ?></td>

					<input type="hidden" name="Service_No" value=<?php echo $row1['Service_No'] ?>></td>

                    <td><?php echo $row1['Cat_Name'] ?></td>
                    
                    <td><?php echo $row1['Vehicle_Plate'] ?></td>
					
					<td><?php echo $row1['Vehicle_Model'] ?></td>
                    
                    <td><?php echo $row1['Service_Date'] ?></td>

                    <td><?php echo $row1['Service_Mileage'] ?></td>

                    <td><?php echo $row1['Next_Date'] ?></td>

                    <td><?php echo $row1['Next_Mileage'] ?></td>
					
					<td><a href="service_view.php?Service_No=<?php echo $row1['Service_No'] ?>"><button type='button'>View</button></a>
						<a href="service_update.php?Service_No=<?php echo $row1['Service_No'] ?>"><button type='button'>Update</button></a>
						<a onClick="return confirm('Are you sure you want to delete service record for <?php echo $row1['Vehicle_Plate'] ?>?')" href="service_delete.php?Service_No=<?php echo $row1['Service_No'] ?>"><button type='button'>Delete</button></a>

					</td>
				</tr>
					<?php
						$counter++;
					} 
				}

					?> 
								
            </table>
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