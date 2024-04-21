<?php

if(isset($_SESSION['is_user_loggedIn'])){
	return true;
}
else{
	header("location:signIn.php");
}

?>