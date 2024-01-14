<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "evehicle";
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die('cannot connect to the server'); 
//mysqli_select_db() or die('database selection problem');
?>