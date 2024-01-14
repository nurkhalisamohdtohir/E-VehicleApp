<?php

include_once '../connect.php';
 
    $Vehicle_No = $_GET['Vehicle_No'];
 
    $sql = "DELETE FROM vehicle WHERE Vehicle_No='$Vehicle_No'";
    
if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('Maklumat Kenderaan Berjaya Dipadam..');
        window.location.href='vehicle_list.php?success';
        </script> 
<?php
}
?>
   