<?php  
	if (isset($_POST['submit'])) {
        $ten=$_POST['ten'];
		$email=$_POST['email'];
		$mat_khau=$_POST['mat_khau'];
        $sdt=$_POST['sdt'];
        $dia_chi=$_POST['dia_chi'];
		$quyen_truy_cap=$_POST['quyen_truy_cap'];
        
		if (isset($ten)&&isset($email)&&isset($mat_khau)&&isset($sdt)&&isset($dia_chi)&&isset($quyen_truy_cap)) {
			$sql="INSERT INTO thanhvien(ten,email,mat_khau,sdt,dia_chi,quyen_truy_cap) VALUES('$ten','$email','$mat_khau','$sdt','$dia_chi','$quyen_truy_cap')";
			$query=mysqli_query($conn,$sql);
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
        <h1 class="page-header">Thêm thành viên</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Thêm thành viên</div>
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
                                        <input class="form-control" type="text" name="ten" value="<?php if(isset($_POST['ten']))echo $_POST['ten'];?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="email" value="<?php if(isset($_POST['email']))echo $_POST['email'];?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="mat_khau" value="<?php if(isset($_POST['mat_khau']))echo $_POST['mat_khau'];?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="sdt" value="<?php if(isset($_POST['sdt']))echo $_POST['sdt'];?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="dia_chi" value="<?php if(isset($_POST['dia_chi']))echo $_POST['dia_chi'];?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                       <input name="quyen_truy_cap" type="number" min="1" max="2" class="form-control text-center" value="1">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary" name="submit">Thêm mới</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->