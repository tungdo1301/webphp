<?php
	session_start();  
	if($_SESSION['email']=='duykhanh@gmail.com' && $_SESSION['pass']=='duykhanh'){
		$id_sp=$_GET['id_sp'];
		include_once'../../ketnoi.php';
		$sql="DELETE FROM sanpham WHERE id_sp='$id_sp'";
		$query=mysqli_query($conn ,$sql);
		header('location: ../../quantri.php?page_layout=danhsachsp');
	}else{
		header('location: ../../index.php');
	}
?>