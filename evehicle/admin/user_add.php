<?php

include_once '../connect.php';
 
$Staff_ID = $_POST['Staff_ID'];
$Staff_IC = $_POST['Staff_IC'];
$Staff_Name = $_POST['Staff_Name'];
$Staff_Position = $_POST['Staff_Position'];
$Staff_Dept = $_POST['Staff_Dept'];
$Staff_Email = $_POST['Staff_Email'];
$Staff_Phone = $_POST['Staff_Phone'];
$Staff_Extension = $_POST['Staff_Extension'];
$Staff_Category = $_POST['Staff_Category'];
$Account_Status = $_POST['Account_Status'];

$sql = "INSERT INTO user (Staff_ID, Staff_IC, Staff_Name, Staff_Position, Staff_Dept, Staff_Email, Staff_Phone, Staff_Extension, Staff_Category, Account_Status) VALUES ('$Staff_ID', '$Staff_IC', (UPPER('$Staff_Name')), (UPPER('$Staff_Position')), (UPPER('$Staff_Dept')),'$Staff_Email', '$Staff_Phone', '$Staff_Extension', '$Staff_Category', (UPPER('$Account_Status')))";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
        <script type="text/javascript">
        alert('New User Record Added!');
        window.location.href='user_list.php?success';
        </script> 
<?php
}
?>
   