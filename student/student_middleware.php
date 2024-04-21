<?php

if(isset($_SESSION['is_user_loggedIn'])){
	return true;
}
else{
	header("location:student_SignIn.php");
}

?>