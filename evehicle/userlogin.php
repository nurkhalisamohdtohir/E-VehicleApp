<?php
include_once 'connect.php';
session_start();
$error='';

if (empty($_POST['staff_id']) || empty($_POST['password'])) 
{
	$error = "Invalid Staff ID / Password. Please try again. You can also register as new user or reset password.";
}

else
{
	$staff_id=$_POST['staff_id'];
	$password=$_POST['password'];

	$query ="SELECT * FROM user where Staff_ID = '$staff_id'";
	$result=mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);

	if ($result-> num_rows > 0)  
	{
		if ($row['Staff_ID'] == $staff_id && $row['Staff_Password'] == $password && $row['Staff_Category'] == 1 && $row['Account_Status'] == 'ACTIVE') 
		{
			$_SESSION['login_user']=$row['Staff_ID'];

			echo "<script type='text/javascript'>alert('Welcome to Vehicle Booking & Maintenance Organiser!');
				window.location.href='staff/home_user.php';
				</script>";
		} 

		else if ($row['Staff_ID'] == $staff_id && $row['Staff_Password'] == $password && $row['Staff_Category'] == 2 && $row['Account_Status'] == 'ACTIVE') 
		{
			$_SESSION['login_user']=$row['Staff_ID'];

			echo "<script type='text/javascript'>alert('Welcome to Vehicle Booking & Maintenance Organiser!');
				window.location.href='admin/home_user.php';
				</script>";
		} 

		else if ($row['Staff_ID'] == $staff_id && $row['Staff_Password'] == $password && $row['Staff_Category'] == 3 && $row['Account_Status'] == 'ACTIVE') 
		{
			$_SESSION['login_user']=$row['Staff_ID'];

			echo "<script type='text/javascript'>alert('Welcome to Vehicle Booking & Maintenance Organiser!');
				window.location.href='hod/home_user.php';
				</script>";
		} 

		else if ($row['Staff_ID'] == $staff_id && $row['Staff_Password'] == $password && $row['Staff_Category'] == 4 && $row['Account_Status'] == 'ACTIVE') 
		{
			$_SESSION['login_user']=$row['Staff_ID'];

			echo "<script type='text/javascript'>alert('Welcome to Vehicle Booking & Maintenance Organiser!');
				window.location.href='driver/home_user.php';
				</script>";
		} 

		else {
			echo "<script type='text/javascript'>alert('Invalid Data! Please try again.');
				window.location.href='index.php';
				</script>";
		}
	}

	else 
	{
		echo "<script type='text/javascript'>alert('Invalid Data! Please try again.');
			window.location.href='index.php';
			</script>";
	}

	mysqli_close($conn); 
}

?>

