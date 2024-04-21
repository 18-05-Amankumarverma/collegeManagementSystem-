<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "college_management";

$con = @mysqli_connect($server,$username,$password,$db_name);

$sql = "select username , password from student_login ";

$result = $con->query($sql);

if($result->num_rows>0){

	while($row = $result->fetch_assoc()){

		echo $row->username;
		echo $row->password;
	}
}
else{
	echo "query failed";
}

?>