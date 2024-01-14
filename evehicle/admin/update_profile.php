<?php

include_once '../connect.php';
 
$id = $_POST['id'];
$ic = $_POST['ic'];
$name = $_POST['name'];
$email = $_POST['email'];
$post = $_POST['post'];
$dept = $_POST['dept'];
$phone = $_POST['phone'];
$ext = $_POST['ext'];
$password = $_POST['password'];

$sql = "UPDATE user SET Staff_Name ='$name', Staff_Email ='$email', Staff_Position = '$post', Staff_Dept ='$dept', Staff_Phone = '$phone', Staff_Extension ='$ext', Staff_Password ='$password' where Staff_IC ='$ic' and Staff_ID = '$id'";

if (!mysqli_query($conn, $sql)) {
    die('Error: ' . mysqli_error($conn)); 
}else {?>
		<script type="text/javascript">
		alert('Your Profile is Successfully Updated!');
        window.location.href='profile.php?success';
		</script> 
<?php
}
?>
       