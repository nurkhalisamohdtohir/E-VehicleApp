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
      <a href="home_user.php"><img src="../image/eVehicle3.png" width="120" class="evehicle"></img></a>
    </div>
    <div class="menu">
    <a href="home_user.php"> Home </a>

    <a href="form_book_vehicle.php"> Book Vehicle </a>

      <div class="dropdown">
        <button class="dropbtn">My Bookings</button>
        <div class="dropdown-content">
            <a href="booking_list1.php">Manage Booking</a>
            <a href="booking_vehicle.php">Booking History</a>
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
      
      <a href="profile.php">Profile</a>

     <div class="user">
       <a href="../logout.php"><?php echo "$row[Staff_Name]"?> &nbsp; <i class="fa fa-sign-out fa-fw"></i></a>
      </div>
      </div> 

  </div>
  
</body>
</html>
