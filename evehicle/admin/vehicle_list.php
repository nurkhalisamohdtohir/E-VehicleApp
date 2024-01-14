<!DOCTYPE html>
<html>
<head>
	<title>e-Vehicle</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
			<h2><b>Register Vehicle Form</b></h2><hr>
		</div>

		<div class="form-box">
			<!-- <div class="form-left"> -->
				<form role="form"  action="vehicle_add.php" method="POST">

					<div class="form">
						<div class="masuk-hutan">
							<label><b>Category</b></label><br>
							<select class="prefer" name="Cat_No" required>
							<option disabled selected>-- Select Category --</option>
					<?php
        				$records = mysqli_query($conn, "SELECT Cat_No, Cat_Name From vehiclecat");  // Use select query here 

        				while($data = mysqli_fetch_array($records))
        				{
            			echo "<option value='". $data['Cat_No'] ."'>" .$data['Cat_Name'] ."</option>";  // displaying data in option menu
        				}	
    				?>  

                            </select>
						</div>

						<div class="bil-kend">
							<label><b>Capacity : </b></label><br>
				  			<input type="Number" class="num_passenger" name="Vehicle_Capacity" required>
						</div>
					</div>

					<div class="form">
						<label><b>Plate Number : </b></label>
				  		<input type="text" name="Vehicle_Plate" required style="text-transform:uppercase">
					</div>

					<div class="form">
						<label><b>Model : </b></label>
				  		<input type="text" name="Vehicle_Model" required style="text-transform:uppercase">
					</div>

					<!--<div class="form">
						<label><b>Status : </b></label>
				  		<input type="text" name="Vehicle_Status" required style="text-transform:uppercase">
					</div>-->

					<div class="form">
						<label><b>Status: </b></label><br>
				  			<select class="prefer" name="Vehicle_Status" required>
				  				<option disabled selected>-- Select Status --</option>
                                <option value="AVAILABLE"> AVAILABLE </option>
                                <option value="NOT AVAILABLE"> NOT AVAILABLE</option>
                            </select>
					</div>

					<div class="form">
						<label><b>Current Mileage :</b></label><br>
				  		<input type="Number" name="Current_Mileage" required>
					</div>
				
			<!-- </div>

			<div class="form-right">
				 -->

					<br>

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
			<h2><b>List of Vehicles</b></h2><hr>
		</div>

		<div class="div-table">
            <table class= "table-semak">
            	<tr><input id="search" style="width: 30%; height: 30px;font-size: 15px;" type="text" placeholder="Search.."></tr>
                <tr class="thead">
					<th width="2%">No.</th>
                    <th width="10%">Category</th>
                    <th width="10%">Plate no</th>
                    <th width="15%">Model</th>
                    <th width="10%">Capacity</th>
                    <th width="15%">Status</th>
                    <th width="14%">Current Mileage</th>
                    <th width="28%">Action</th>
                </tr>   

				<?php

				$counter = 1;
				$sql="SELECT * FROM `vehicle` v , `vehiclecat` c WHERE v.`Cat_No` = c.`Cat_No`";
				$result_set=mysqli_query($conn,$sql);

				if ($result_set-> num_rows == 0)  
				{
					echo "<font size='3'>0 result</font>";
				}

				else {

				
                
            

				While($row1=mysqli_fetch_array($result_set))
				{ ?>
                <tr class="tbody" id="MyTable">
					<td><?php echo $counter; ?></td>

					<input type="hidden" name="Vehicle_No" value=<?php echo $row1['Vehicle_No'] ?>></td>

                    <td><?php echo $row1['Cat_Name'] ?></td>
                    
                    <td><?php echo $row1['Vehicle_Plate'] ?></td>
					
					<td><?php echo $row1['Vehicle_Model'] ?></td>
                    
                    <td><?php echo $row1['Vehicle_Capacity'] ?></td>

                    <td><font color="red"><?php echo $row1['Vehicle_Status'] ?></font></td>

                    <td><?php echo $row1['Current_Mileage'] ?></td>
					
					<td><a href="vehicle_view.php?Vehicle_No=<?php echo $row1['Vehicle_No'] ?>"><button type='button'>View</button></a>
						<a href="vehicle_update.php?Vehicle_No=<?php echo $row1['Vehicle_No'] ?>"><button type='button'>Update</button></a>

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