<html>
<head>
<title>e-Vehicle</title>

<?php
include_once '../connect.php';
include('../session.php');
$query ="SELECT * FROM User WHERE Staff_ID='$login_session'";
$result=mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);

$count=0;
$sql2="SELECT *, DATE_FORMAT(Next_Date, '%d/%m/%Y') AS Next_Date FROM service s JOIN vehicle v ON v.Vehicle_Plate = s.Vehicle_Plate WHERE YEARWEEK(Next_Date) = YEARWEEK(NOW()) OR v.Current_Mileage >= s.Next_Mileage";
$result=mysqli_query($conn, $sql2);
$count=mysqli_num_rows($result);


?>


</head>

<link rel="stylesheet" type="text/css" href="../style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <link type="text/css" rel="Stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/start/jquery-ui.css" />
  <!--<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>-->

  <script type="text/javascript">

  function myNoti() {
    $.ajax({
      url: "service_notifications.php",
      type: "POST",
      processData:false,
      success: function(data){
       //$("#notification-count").remove();          
        $("#notification-latest").show();$("#notification-data").html(data);
      },
      error: function(){}           
    });
   }

   $(document).ready(function() {
    $('body').click(function(e){
      if ( e.target.id != 'notification-icon'){
        $("#notification-latest").hide();
      }
    });
  });
     
  </script>

<style>

.notification {
  color: white;
  text-decoration: none;
  position: relative;
  display: inline-block;
  border-radius: 2px;
}

.notification:hover {
  color: black;
}

.notification .badge {
  position: absolute;
  top: -0px;
  right: -0px;
  padding: 2px 8px;
  border-radius: 50%;
  background-color: red;
  color: white;
  font-size: 13px ;
}

.notification-item {
  margin-top: 100px;
}

/* Popup box BEGIN */
#notification-latest{
    background:rgba(0,0,0,.4);
    cursor:pointer;
    display:none;
    height:100%;
    position:fixed;
    text-align:center;
    top:0;
    width:100%;
    z-index:10000;
}
#notification-latest  .helper{
    display:inline-block;
    height:100%;
    vertical-align:middle;
}
#notification-latest  > div {
    background-color: #fff;
    box-shadow: 10px 10px 60px #555;
    display: inline-block;
    height: auto;
    max-width: 551px;
    min-height: 100px;
    vertical-align: middle;
    width: 60%;
    position: relative;
    border-radius: 8px;
    padding: 15px 5%;
}
.popupCloseButton {
    background-color: #fff;
    border: 3px solid #999;
    border-radius: 50px;
    cursor: pointer;
    display: inline-block;
    font-family: arial;
    font-weight: bold;
    position: absolute;
    top: -20px;
    right: -20px;
    font-size: 25px;
    line-height: 30px;
    width: 30px;
    height: 30px;
    text-align: center;
}
.popupCloseButton:hover {
    background-color: #ccc;
}

/* Popup box BEGIN */
</style>


<body>
  <div id="notification-latest">
    <div class="notification-item">
      <div class="popupCloseButton">&times;</div>
      <p><b>Service Reminder</b><br><br></p>
      <div id="notification-data"></div>
    </div>
  </div>
	<div class="navbar">
    <div>
      <a href="home_user.php"><img src="../image/eVehicle-white.png" width="140" class="evehicle"></img></a>
    </div>
    <div class="menu">
    <a href="home_user.php"> Home </a>

    <div class="dropdown">
        <button class="dropbtn">My Booking</button>
        <div class="dropdown-content">
          <a href="form_book_vehicle.php"> Book Vehicle </a>
           <a href="booking_list1.php">Booking Status</a>
           <a href="booking_history.php"> Booking History </a>  
        </div>
    </div>

    
    <div class="dropdown">
        <button class="dropbtn">Booking Application</button>
        <div class="dropdown-content">
            <a href="application_list.php"> New Booking Application</a>
            <a href="booking_report.php">Booking Application Report</a>
            <!-- <a href="category_list.php"> Category </a> -->
        </div>
    </div>    
     
    <div class="dropdown">
        <button class="dropbtn">eVehicle Management</button>
        <div class="dropdown-content">
            <a href="user_list.php">Manage User </a>
            <a href="vehicle_list.php">Manage Vehicle </a>
            <a href="service_list.php"> Manage Vehicle Service</a>
            <a href="report.php">Vehicle Service Report</a>
            <!-- <a href="category_list.php"> Category </a> -->
        </div>
    </div>    
      
      
   
  	

      <div class="user">
        <a href="profile.php" title="View Profile"><?php echo "$row[Staff_Name]"?></a>
        <a href="#" class="notification" id="notification-icon" onclick="myNoti()" title="Notification">
          <span><i class="fa fa-bell fa-fw w3-large" style="font-size:24px"></i></span>
          <?php if($count > 0) 
          { ?>
            <span class="badge" id="notification-count"><?php echo $count; ?></span> 
          <?php
          } 
          ?>
        </a>
        <a href="../logout.php" title="Logout"><i class="fa fa-sign-out fa-fw w3-large"></i></a>

      </div>
      </div> 

	</div>
	
</body>
</html>
