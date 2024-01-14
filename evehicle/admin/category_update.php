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
    
    // Display selected category data based on id
	// Getting id from url
	$Cat_No = $_GET['Cat_No'];

	$query ="SELECT * FROM vehiclecat WHERE Cat_No=$Cat_No";
	$result=mysqli_query($conn, $query);
	$row = mysqli_fetch_array($result);

// Check if form is submitted for category update, then redirect to homepage after update
if(isset($_POST['Update'])) {
	$Cat_No = $_POST['Cat_No'];
    $Cat_Name= $_POST['Cat_Name'];


	// Insert category data into table
	$sql = "UPDATE vehiclecat SET Cat_No='$Cat_No',Cat_Name=(UPPER('$Cat_Name')) WHERE Cat_No=$Cat_No";

	// Show message when user added
	if (!mysqli_query($conn, $sql)) 
	{
    	die('Error: ' . mysqli_error($conn)); 
	}
	else 
	{

?>

		<script type="text/javascript">
        	alert('Category record is updated!');
        	window.location.href='category_list.php?success';
        </script> 
	
<?php
	}	
}
?>

<center>
<content>
	<center>

        <div class="title">
			<h2><b>Update Category Form</b></h2><hr>
		</div>

		<div class="form-box">
			<!-- <div class="form-left"> -->
				<form role="form"  action="category_update.php" method="POST">

					<div class="form">
						<label><b>Category No:</b></label>
				  		<input type="text" name="Cat_No" value="<?php echo "$row[Cat_No]"?>" readonly>
					</div>

					<div class="form">
						<label><b>Category Name : </b></label>
				  		<input type="text" name="Cat_Name" value="<?php echo $row["Cat_Name"]; ?>" required style="text-transform:uppercase">
					</div>

					<div class="form">
						<td><input type="hidden" name="Cat_No" value=<?php echo $_GET['Cat_No'];?>></td>
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
						<a href="category_list.php"><button type='button' class="btn">BACK</button></a>
						<button onClick="return confirm('Are you sure you want to update this record?')" type="submit" name="Update" value="Update" class="btn">UPDATE</button>
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
                    <th width="20%">Category No</th>
                    <th width="20%">Category Name</th>
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

                    <td><?php echo $row1['Cat_No'] ?></td>
                    
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