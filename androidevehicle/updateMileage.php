
<?php

if(isset($_POST['Start_Mileage']) && isset($_POST['End_Mileage'])){
 require_once "conn.php";
	
	
	$Start_Mileage=$_POST['Start_Mileage'];
	
	$End_Mileage=$_POST['End_Mileage'];
	
	$Trip_No=$_POST['Trip_No'];
	
	$Vehicle_Plate=$_POST['Vehicle_Plate'];


	$sql_mileage = "UPDATE trip SET Start_Mileage='$Start_Mileage', End_Mileage='$End_Mileage' WHERE Trip_No='$Trip_No'";

	$result1=mysqli_query($conn,$sql_mileage);
	
	if ($result1) 
	{
			
			$sql_current_mileage = "UPDATE vehicle SET Current_Mileage='$End_Mileage' WHERE Vehicle_Plate='$Vehicle_Plate'";
			$result2=mysqli_query($conn,$sql_current_mileage);
			if ($result2)
			{
				echo "succesfully";
			} 
			

	} 

	else 
	{
		echo "failure";
	}
	

}


?>