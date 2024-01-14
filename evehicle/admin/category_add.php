<?php

include_once '../connect.php';

// Check If form submitted, insert form data into users table.
if(isset($_POST['Submit'])) {
	$Cat_No = $_POST['Cat_No'];
    $Cat_Name= $_POST['Cat_Name'];


	// Insert category data into table
	$sql = "INSERT INTO vehiclecat (Cat_No, Cat_Name) VALUES ('$Cat_No', (UPPER('$Cat_Name')))";

	// Show message when user added
	if (!mysqli_query($conn, $sql)) 
	{
    	die('Error: ' . mysqli_error($conn)); 
	}
	else 
	{?>
        <script type="text/javascript">
        	alert('New Category Record Added!');
        	window.location.href='category_list.php?success';
        </script> 
	
<?php
	}	
}
?>   