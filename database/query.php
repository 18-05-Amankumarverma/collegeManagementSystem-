<?php 

include("connection.php"); //connection code 

//insert query
/*
$sql = "insert into student_login (username,password) values ('ajit Kumar Verma','54321')";

$result = $conn->query($sql); //query run 

if($result == true){
	echo "query run successfully";
}
else{
	echo "query failed" . $conn->error;
}
*/

/*select query

$sql = "select username from student_login";

$result = $conn->query($sql);
	
/*echo "<pre>";
print_r($result);
exit;

if($result->num_rows>0){
	while($row = $result->fetch_assoc()){
		echo "<pre>";
		print_r($row);
	}
}
*/

//update query

/*
$sql = "update student_login set username = 'abhi' where username = 'Aman Kumar Verma'";

$res  = $conn->query($sql);
if($res)
{
	echo  "update successfully";
}
else{
	echo "not updated";
}*/

//delete query

$sql = "delete from student_login where username = 'abhi' " ;

$res = $conn->query($sql);

if($res)
{
	echo  "record deleted";
}
else{
	echo "not deleted";
}
?>