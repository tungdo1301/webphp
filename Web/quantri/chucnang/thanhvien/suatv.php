<?php  
    $id_thanhvien=$_GET['id_thanhvien'];
	$sql = "SELECT * FROM thanhvien WHERE id_thanhvien=$id_thanhvien";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
	if (isset($_POST['submit'])) {
		$ten=$_POST['ten'];
        $email=$_POST['email'];
		$mat_khau=$_POST['mat_khau'];
		$quyen_truy_cap=$_POST['quyen_truy_cap'];
        $sdt=$_POST['sdt'];
        $dia_chi=$_POST['dia_chi'];
		if (isset($ten)&&isset($email)&&isset($mat_khau)&&isset($sdt)&&isset($dia_chi)&&isset($quyen_truy_cap)) {
			$sql="UPDATE thanhvien SET ten='$ten',email='$email',mat_khau='$mat_khau',quyen_truy_cap='$quyen_truy_cap',sdt='$sdt',dia_chi='$dia_chi'  WHERE id_thanhvien=$id_thanhvien";
            $query = mysqli_query($conn,$sql);
            header('location: quantri.php?page_layout=quanlytv');
		}
	}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="quantri.php?page_layout=quanlytv">Danh sách thành viên</a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa thành viên</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa thành viên</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <table data-toggle="table">
                            <thead>
                                <tr>                                
		                            <th data-sortable="true">Tên thành viên</th>
                                    <th data-sortable="true">Email</th>
		                            <th data-sortable="true">Mật khẩu</th>
		                            <th data-sortable="true">Số điện thoại</th>
                                    <th data-sortable="true">Địa Chỉ</th>
                                    <th data-sortable="true">Quyền truy cập</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="ten" value="<?php if(isset($_POST['ten'])){echo $_POST['ten'];}else{echo $row['ten'];}?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}else{echo $row['email'];}?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="mat_khau" value="<?php if(isset($_POST['mat_khau'])){echo $_POST['mat_khau'];}else{echo $row['mat_khau'];}?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                       <input name="sdt" type="text" name="sdt" value="<?php if(isset($_POST['sdt'])){echo $_POST['sdt'];}else{echo $row['sdt'];}?>">
                                    </td>
                                    <td data-checkbox="true">
                                       <input name="dia_chi" type="text" name="dia_chi" value="<?php if(isset($_POST['dia_chi'])){echo $_POST['dia_chi'];}else{echo $row['dia_chi'];}?>">
                                    </td>
                                    <td data-checkbox="true">
                                       <input name="quyen_truy_cap" type="number" min="1" max="2" class="form-control text-center" value="<?php if(isset($_POST['quyen_truy_cap'])){echo $_POST['quyen_truy_cap'];}else{echo $row['quyen_truy_cap'];}?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->