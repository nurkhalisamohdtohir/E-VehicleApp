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
			<h2><b>Add User Form</b></h2><hr>
		</div>

		<div class="form-box">
			<!-- <div class="form-left"> -->
				<form role="form"  action="user_add.php" method="POST">

					<div class="form">
						<label><b>ID No : </b></label>
				  		<input type="text" name="Staff_ID" required>
					</div>

					<div class="form">
						<label><b>IC No : </b></label>
				  		<input type="text" name="Staff_IC" required>
					</div>

					<div class="form">
						<label><b>Name : </b></label>
				  		<input type="text" name="Staff_Name" required style="text-transform:uppercase">
					</div>

					<div class="form">
						<div class="masa-pergi">
							<label><b>Position : </b></label><br>
				  			<input type="text" name="Staff_Position" required style="text-transform:uppercase"><br>
						</div>

						<div class="masa-balik">
							<label><b>Department : </b></label><br>
				  			<input type="text"  name="Staff_Dept" required style="text-transform:uppercase"><br>
						</div>
					</div>

					<div class="form">
						<label><b>Email : </b></label>
				  		<input type="text" name="Staff_Email" required>
					</div>

					<div class="form">
						<div class="masa-pergi">
							<label><b>Phone No : </b></label><br>
				  			<input type="text" name="Staff_Phone" required><br>
						</div>

						<div class="masa-balik">
							<label><b>Office No : </b></label><br>
				  			<input type="number"  name="Staff_Extension" required><br>
						</div>
					</div>



					<div class="form">
						<label><b>Category: </b></label><br>
				  			<select class="prefer" name="Staff_Category" required>
				  				<option disabled selected>-- Select Category --</option>
                                <option value="1"> 1 - Staff </option>
                                <option value="2"> 2  - Admin</option>
                                <option value="3"> 3 - Head of Department</option>
                                <option value="4"> 4 - Driver</option>
                            </select>
					</div>

					<div class="form">
						<label><b>Status: </b></label><br>
				  			<select class="prefer" name="Account_Status" required>
				  				<option value="INACTIVE" selected> INACTIVE </option><!--  by default -->
				  				<option value="ACTIVE"> ACTIVE </option> <!-- untuk driver yang tak buka email untuk register -->
                            </select>
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
			<h2><b>List of Users</b></h2><hr>
		</div>

		<div class="div-table">
            <table class= "table-semak">
            	<tr><input id="search" style="width: 30%; height: 30px;font-size: 15px;" type="text" placeholder="Search.."></tr>
                <tr class="thead">
					<th width="2%">No.</th>
					<th width="5%">ID No</th>
                    <th width="10%">IC No</th>
                    <th width="15%">Name</th>
                    <th width="8%">Department</th>
                    <th width="13%">Email</th>
                    <th width="5%">Office No</th>
                    <th width="5%">Status</th>
                    <th width="5%">Action</th>
                </tr>   

				<?php

				$counter = 1;
				$sql="SELECT * FROM `user`";
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

					<td><?php echo $row1['Staff_ID'] ?></td>

					<td><?php echo $row1['Staff_IC'] ?></td>

					<td><?php echo $row1['Staff_Name'] ?></td>

                    <td><?php echo $row1['Staff_Dept'] ?></td>
					
					<td><?php echo $row1['Staff_Email'] ?></td>

                    <td><?php echo $row1['Staff_Extension'] ?></td>

					<td><?php echo $row1['Account_Status'] ?></td>

					<td><a href="user_view.php?Staff_IC=<?php echo $row1['Staff_IC'] ?>"><button type='button'>View</button></a>

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