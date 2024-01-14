<?php
include_once '../connect.php';
include('../session.php');
$query ="SELECT * FROM User WHERE Staff_ID='$login_session'";
$result=mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>
<html>
<head>
<title>e-Vehicle</title>


</head>

<link rel="stylesheet" type="text/css" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
	<div class="navbar">
    <div>
      <a href="home_user.php" title="Home"><img src="../image/eVehicle-white.png" width="140" class="evehicle"></img></a>
    </div>
    <div class="menu">
    <a href="home_user.php"> Home </a>

      <a href="form_book_vehicle.php"> Book Vehicle </a>
      <a href="booking_list1.php"> My Bookings </a>
      <a href="booking_history.php"> Booking History </a>  		
     <!--  <a href="profile.php">Profile</a> -->

     <div class="user">
        <a href="profile.php" title="View Profile"><?php echo "$row[Staff_Name]"?></a>
        <a href="../logout.php" title="Logout"><i class="fa fa-sign-out fa-fw w3-large"></i></a>
      </div>
      </div> 

	</div>
	
</body>
</html>
