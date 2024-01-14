<?php
   
   session_start();
   include('connect.php');
   $user_check = $_SESSION['login_user'];
   //$bahagian_check = $_SESSION['bahagian'];
   $connection = mysqli_connect("localhost", "root", "","evehicle");
   $ses_sql = mysqli_query($connection,"select * from user where Staff_ID = '$user_check'");
   $row = mysqli_fetch_assoc($ses_sql);
   
   $login_session = $row['Staff_ID'];
   // $login_session = $row['ID_BAHAGIAN'];
  
   if(!isset($login_session)){
      header('Location: index.php'); // Redirecting To Home Page
   }
?>