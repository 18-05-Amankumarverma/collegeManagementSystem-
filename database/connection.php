<?php

session_start();

$server = "localhost";
$username = "root";
$password = "";
$db_name = "college_management";

$conn = @mysqli_connect($server,$username,$password,$db_name);

if($conn){
	echo "Ok";
}
else{
	echo "not successfull" . mysql_connect_error();
}
?>