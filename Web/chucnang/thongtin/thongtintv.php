<?php 
    $user = $_SESSION['user'];
    $id_thanhvien=$user['id_thanhvien'];
    $sql = "SELECT * FROM thanhvien WHERE id_thanhvien=$id_thanhvien";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
	if (isset($_POST['submit'])) {
		$ten=$_POST['ten'];
        $sdt=$_POST['sdt'];
        $dia_chi=$_POST['dia_chi'];
        $mat_khau=$_POST['mat_khau'];
        $email=$user['email'];
		if (isset($ten)&&isset($mat_khau)&&isset($sdt)&&isset($dia_chi)) {
			$sql="UPDATE thanhvien SET ten='$ten',mat_khau='$mat_khau',sdt='$sdt',dia_chi='$dia_chi'  WHERE id_thanhvien=$id_thanhvien";
            $query = mysqli_query($conn,$sql);
            header('location: index.php?page_layout=thongtintv');
		}
	}
?>
<div class="container" > 
    <form id="ff2" method="post">
    <a href="index.php?page_layout=thongtindh" class="btn btn-1" >Đơn hàng của bạn</a>
    <h1>Thông tin khách hàng</h1> 
    <div class="form-group">Tên
            <input type="text" class="form-control"  name="ten" value="<?php if(isset($_POST['ten'])){echo $_POST['ten'];}else{echo $row['ten'];}?> " required="">
        </div>
        <div class="form-group">Số điện thoại
            <input type="text" class="form-control"  name="sdt" value="<?php if (isset($_POST['sdt'])) {echo $_POST['sdt'];}else{echo $row['sdt'];} ?>" required="">
        </div>
        <div class="form-group">Địa chỉ
            <input type="text" class="form-control"  name="dia_chi" value="<?php if (isset($_POST['dia_chi'])) {echo $_POST['dia_chi'];}else{echo $row['dia_chi'];} ?>" required="">
        </div>
        <div class="form-group">Mật khẩu
            <input type="text" class="form-control"  name="mat_khau" value="<?php if (isset($_POST['mat_khau'])) {echo $_POST['mat_khau'];}else{echo $row['mat_khau'];} ?>" required="">
        </div>
        <button type="submit" name="submit" class="btn btn-1">Sửa</button>   
    </form>
</div>
