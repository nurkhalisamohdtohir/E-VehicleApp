<?php

include_once '../connect.php';
 
    $Service_No = $_GET['Service_No'];
 
    $sql = "DELETE FROM service WHERE Service_No=$Service_No";
    
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('Service record is deleted!');
        window.location.href='service_list.php?success';
        </script> 
<?php
}
?>
   