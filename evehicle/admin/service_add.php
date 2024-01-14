<?php

include_once '../connect.php';
 

$Vehicle_Plate = $_POST['Vehicle_Plate'];
$Service_Date = $_POST['Service_Date'];
$Service_Mileage = $_POST['Service_Mileage'];
$Next_Date = $_POST['Next_Date'];
$Next_Mileage = $_POST['Next_Mileage'];


$sql = "INSERT INTO service (Vehicle_Plate, Service_Date, Service_Mileage, Next_Date, Next_Mileage) VALUES ('$Vehicle_Plate','$Service_Date', '$Service_Mileage', '$Next_Date', '$Next_Mileage')";



if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('New Service Record Added!');
        window.location.href='service_list.php?success';
        </script> 
<?php
}
?>
   