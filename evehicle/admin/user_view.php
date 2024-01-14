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

	// Getting id from url
	$Staff_IC = $_GET['Staff_IC'];

    $query ="SELECT * FROM `user` WHERE Staff_IC=$Staff_IC";
    $result=mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);


if(isset($_POST['Update'])) {
	$Staff_ID = $_POST['Staff_ID'];
	$Staff_IC = $_POST['Staff_IC'];
	$Account_Status = $_POST['Account_Status'];


	// Insert user data into table
	$sql = "UPDATE user SET Account_Status='$Account_Status' WHERE Staff_IC=$Staff_IC";

	// Show message when user added
	if (!mysqli_query($conn, $sql)) 
	{
    	die('Error: ' . mysqli_error($conn)); 
	}
	else 
	{

?>

		<script type="text/javascript">
        	alert('User record is updated!');
        	window.location.href='user_list.php?success';
        </script> 
	
<?php
	}	
}
?>

<center>
<content>
	<center>

        <div class="title">
			<h2><b>View User</b></h2><hr>
		</div>

		<div class="form-box">
			<!-- <div class="form-left"> -->
				<form role="form"  action="" method="POST">
					<div class="form">
						<label><b>ID No : </b></label>
				  		<input type="text" name="Staff_ID" value="<?php echo "$row[Staff_ID]"?>" readonly>
					</div>

					<div class="form">
						<label><b>IC No : </b></label>
				  		<input type="text" name="Staff_IC" value="<?php echo "$row[Staff_IC]"?>" readonly>
					</div>

					<div class="form">
						<label><b>Name : </b></label>
				  		<input type="text" name="Staff_Name" value="<?php echo "$row[Staff_Name]"?>" readonly>
					</div>

					<div class="form">
						<div class="masa-pergi">
							<label><b>Position : </b></label><br>
				  			<input type="text" name="Staff_Position" value="<?php echo "$row[Staff_Position]"?>" readonly>
						</div>

						<div class="masa-balik">
							<label><b>Department : </b></label><br>
				  			<input type="text" name="Staff_Department" value="<?php echo "$row[Staff_Dept]"?>" readonly><br>
						</div>
					</div>

					<div class="form">
						<label><b>Email : </b></label>
				  		<input type="text" name="Staff_Email" value="<?php echo "$row[Staff_Email]"?>" readonly>
					</div>

					<div class="form">
						<div class="masa-pergi">
							<label><b>Phone No : </b></label><br>
				  			<input type="text" name="Staff_Phone" value="<?php echo "$row[Staff_Phone]"?>" readonly><br>
						</div>

						<div class="masa-balik">
							<label><b>Office No : </b></label><br>
				  			<input type="text" name="Staff_Extension" value="<?php echo "$row[Staff_Extension]"?>" readonly><br>
						</div>
					</div>

					<div class="form">
						<label><b>Category: </b></label><br>
				  		<input type="text" name="Staff_Category" value="<?php echo "$row[Staff_Category]"?>" readonly>
					</div>

					<div class="form">
						<label><b>Status: </b></label><br>
				  			<select class="prefer" name="Account_Status" value="<?php echo "$row[Account_Status]"?>" required>
                                <option value="INACTIVE" selected> INACTIVE </option>
                                <option value="ACTIVE"> ACTIVE </option>
                            </select>
					</div>



					<div class="form">
						<td><input type="hidden" name="Staff_IC" value=<?php echo $_GET['Staff_IC'];?>></td>
					</div>
				
			<!-- </div>

			<div class="form-right">
				 -->

					<br>

					<div class="form">
						<input type="checkbox" name="catatan" value="" checked><strong> I acknowledge that all information are correct.</strong>
					</div>

					<br>
					<div class="feedback-button">
						<button onClick="return confirm('Are you sure you want to update this record?')" type="submit" name="Update" value="Update" class="btn">UPDATE</button>
						<a href="user_list.php"><button type='button' class="btn">BACK</button></a>
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