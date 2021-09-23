<?php  
	session_start();
	if(isset($_SESSION['email'])){
		session_destroy();
		header('location: http://localhost/Web/quantri/index.php');
	}
	else{
		header('location: http://localhost/Web/quantri/index.php');
	}
?>