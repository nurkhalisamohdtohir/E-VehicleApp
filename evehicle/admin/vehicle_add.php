<?php

include_once '../connect.php';
 
$Vehicle_Plate = $_POST['Vehicle_Plate'];
$Cat_No = $_POST['Cat_No'];
$Vehicle_Model = $_POST['Vehicle_Model'];
$Vehicle_Capacity = $_POST['Vehicle_Capacity'];
$Vehicle_Status = $_POST['Vehicle_Status'];
$Current_Mileage = $_POST['Current_Mileage'];


$sql = "INSERT INTO vehicle (Vehicle_Plate, Cat_No, Vehicle_Model, Vehicle_Capacity, Vehicle_Status, Current_Mileage) VALUES ((UPPER('$Vehicle_Plate')),'$Cat_No', (UPPER('$Vehicle_Model')), '$Vehicle_Capacity', (UPPER('$Vehicle_Status')), '$Current_Mileage')";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('New Vehicle Record Added!');
        window.location.href='vehicle_list.php?success';
        </script> 
<?php
}
?>
   