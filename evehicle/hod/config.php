<?php

$host = "localhost";
$dbUser = "root";
$password = "";
$database = "evehicle";

$dbConn = new mysqli($host,$dbUser,$password,$database);

if($dbConn->connect_error)
{
	die("Database Connection Error, Error No.: ".$dbConn->connect_errno." | ".$dbConn->connect_error);
}
?>