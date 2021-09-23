<?php  
	session_start();
	if($_SESSION['email']=='duykhanh@gmail.com' && $_SESSION['pass']=='duykhanh'){
		$id_dh=$_GET['id_dh'];
		include_once'../../ketnoi.php';
		$sql = "DELETE FROM donhang WHERE id_dh='$id_dh'";
		$query=mysqli_query($conn,$sql);
		header('location: ../../quantri.php?page_layout=donhang');
	}else{
		header('location: ../../index.php');
	}
?>