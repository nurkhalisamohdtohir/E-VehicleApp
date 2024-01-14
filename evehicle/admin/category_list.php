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
			<h2><b>Add Category Form</b></h2><hr>
		</div>

		<div class="form-box">
			<!-- <div class="form-left"> -->
				<form role="form"  action="category_add.php" method="POST">

					<!-- <div class="form">
						<label><b>Category</b></label><br>
				  			<select class="prefer" name="Cat_No" required>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                            </select>
					</div>-->

					

					<div class="form">
						<label><b>Category Name : </b></label>
				  		<input type="text" name="Cat_Name" required style="text-transform:uppercase">
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
			<h2><b>List of Categories</b></h2><hr>
		</div>

		<div class="div-table">
            <table class= "table-semak">
            	<tr><input id="search" style="width: 30%; height: 30px;font-size: 15px;" type="text" placeholder="Search.."></tr>
                <tr class="thead">
					<th width="2%">No.</th>
                    <th width="40%">Category Name</th>
                    <th width="30%">Action</th>
                </tr>   

                <?php

				$counter = 1;
				$sql="SELECT * FROM vehiclecat ";
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

                    <input type="hidden" name="Cat_No" value=<?php echo $row1['Cat_No'] ?>></td>
                    
                    <td><?php echo $row1['Cat_Name'] ?></td>
					
					
					<td><a href="category_view.php?Cat_No=<?php echo $row1['Cat_No'] ?>"><button type='button'>View</button></a>
						<a href="category_update.php?Cat_No=<?php echo $row1['Cat_No'] ?>"><button type='button'>Update</button></a>
						<a onClick="return confirm('Are you sure you want to delete <?php echo $row1['Cat_Name'] ?>?')" href="category_delete.php?Cat_No=<?php echo $row1['Cat_No'] ?>"><button type='button'>Delete</button></a>

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