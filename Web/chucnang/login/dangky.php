
<?php
if (isset($_POST['submit'])) {
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $mat_khau = $_POST['mat_khau'];
    $sdt = $_POST['sdt'];
    $dia_chi = $_POST['dia_chi'];

    $sql1="SELECT * FROM thanhvien WHERE email='$email'";
    $check = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($check) > 0){
        echo '<center class="alert alert-danger">Email đã tồn tại, vui lòng nhập lại email</center>';
    }else{

    if (isset($ten) && isset($email) && isset($mat_khau) && isset($sdt) && isset($dia_chi)) {
        $sql = "INSERT INTO thanhvien(ten,email,mat_khau,sdt,dia_chi,quyen_truy_cap) VALUES('$ten','$email','$mat_khau','$sdt','$dia_chi','1')";
        $query = mysqli_query($conn, $sql);
        echo '<center class="alert alert-success">Bạn đã đăng ký thành công! vui lòng &ensp;<a href="index.php?page_layout=dangnhap" class="btn btn-1">Đăng nhập</a></center>';
        
    }
    }
}
?>
<div class="container">
    <div >
        <h2>Đăng ký tài khoản mới</h2> 
    </div>
    <form name="form2" id="ff2" method="post">
        <div class="form-group">
            <input type="name" class="form-control" placeholder="Tên của bạn :" name="ten" value="<?php if (isset($_POST['ten'])) echo $_POST['ten']; ?>" required="">
        </div>
        <div class="form-group">
            <input type="tel" class="form-control" placeholder="Số điện thoại :" name="sdt" value="<?php if (isset($_POST['sdt'])) echo $_POST['sdt']; ?>" required="">
        </div>
        <div class="form-group">
            <input type="address" class="form-control" placeholder="Địa chỉ :" name="dia_chi" value="<?php if (isset($_POST['dia_chi'])) echo $_POST['dia_chi']; ?>" required="">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email :" name="email" value="<?php if(isset($_POST['email']))echo $_POST['email'];?>" required="">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Mật khẩu :" name="mat_khau" value="<?php if (isset($_POST['mat_khau'])) echo $_POST['mat_khau']; ?>" required="">
        </div>
        <button type="submit" name="submit" class="btn btn-1">Đăng ký</button>
    </form>
</div>