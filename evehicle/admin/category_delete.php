<?php

include_once '../connect.php';
 
    $Cat_No = $_GET['Cat_No'];
 
    $sql = "DELETE FROM vehiclecat WHERE Cat_No=$Cat_No";
    
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('Category record is deleted!');
        window.location.href='category_list.php?success';
        </script> 
<?php
}
?>
   