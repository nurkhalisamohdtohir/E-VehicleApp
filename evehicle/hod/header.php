<html>
<head>
<title>e-Vehicle</title>

<?php
include_once '../connect.php';
include('../session.php');
$query ="SELECT * FROM User WHERE Staff_ID='$login_session'";
$result=mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
?>

</head>

<link rel="stylesheet" type="text/css" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
  <div class="navbar">
    <div>
      <a href="home_user.php"><img src="../image/eVehicle-white.png" width="140" class="evehicle" title="Home"></img></a>
    </div>
    <div class="menu">
    <a href="home_user.php"> Home </a>

      <a href="form_book_vehicle.php"> Book Vehicle </a>

      <div class="dropdown">
        <button class="dropbtn">My Bookings</button>
        <div class="dropdown-content">
           <a href="booking_list1.php">Booking Status</a>
           <a href="booking_history.php"> Booking History </a>  
        </div>
      </div>

      <div class="dropdown">
        <button class="dropbtn">eVehicle Management </button>
        <div class="dropdown-content">
            <a href="new_booking_list.php">Booking Application</a>

        </div>
      </div>

      
      <!-- <a href="category_list.php"> Manage Category </a>
      <a href="vehicle_list.php"> Manage Vehicle </a>
      <a href="service_list.php"> Manage Service </a>

 -->
      
      

     <div class="user">
        <a href="profile.php" title="View Profile"><?php echo "$row[Staff_Name]"?></a>
        <a href="../logout.php" title="Logout"><i class="fa fa-sign-out fa-fw w3-large"></i></a>
      </div>
      </div> 

  </div>
  
</body>
</html>
