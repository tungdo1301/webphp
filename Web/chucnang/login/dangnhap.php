<?php
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$pass = $_POST['mk'];
	if (isset($email) && isset($pass)) {
		$sql = "SELECT *FROM thanhvien WHERE email='$email' and mat_khau='$pass'";
		$query = mysqli_query($conn, $sql);
		$data = mysqli_fetch_assoc($query);
		$rows = mysqli_num_rows($query);
		if ($rows > 0 && ($data['quyen_truy_cap'] == 1)) {
			$_SESSION['user'] = $data;
			header('location: index.php');
		} else {
			echo '<center class="alert alert-danger">Tài khoản không tồn tại hoặc bạn không có quyền truy cập!</center>';
		}
	}
}
?>

<div class="container"> 
	<div>
		<ul class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php?page_layout=dangnhap">Đăng Nhập</a></li>
		</ul>
	</div>
</div>
<div class="container">
	<div>
		<div class="heading">
			<h2>Đăng Nhập </h2>
		</div>
		<form name="form1" method="post">
			<?php
			if (!isset($_SESSION['user'])) {
			?>
				<div class="form-group">
					<input type="email" class="form-control" placeholder="Email" name="email" required="">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" placeholder="Mật khẩu" name="mk" required="">
				</div>
				<button type="submit" class="btn btn-1" name="submit" id="login">Đăng Nhập</button>&nbsp;&nbsp;&nbsp;
				<a href="index.php?page_layout=dangky" class="btn btn-1">Bạn chưa có tài khoản?</a <?php
				} else {

					header('location: index.php');
				}
					?>
		 </form>
	</div>

</div>
</div>