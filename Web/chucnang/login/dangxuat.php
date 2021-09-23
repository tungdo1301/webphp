<?php  
	session_start();
	if(isset($_SESSION['user'])){
		session_destroy();
		header('location: http://localhost/Web/index.php');
	}
	else{
		header('location: http://localhost/Web/index.php');
	}
?>