<?php  
    $id_sp=$_GET['id_sp'];
	$sql = "SELECT * FROM sanpham WHERE id_sp=$id_sp";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    if (isset($_POST['submit'])) {
		$ton_kho=$_POST['ton_kho'];
		if (isset($ton_kho)) {
			$sql="UPDATE sanpham SET ton_kho='$ton_kho' WHERE id_sp=$id_sp";
            $query = mysqli_query($conn,$sql);
            header('location: quantri.php?page_layout=kho');
		}
	}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="quantri.php?page_layout=kho">Kho</svg></a></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa Kho</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">
            <form role="form" method="post">				
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên sản phẩm</th>
                            <th data-sortable="true">Số lượng sản phẩm còn trong kho</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['id_sp']; ?></td>
                            <td data-checkbox="true"><?php echo $row['ten_sp']; ?></td>
                            <td data-checkbox="true">
                            <input class="form-control" type="text" name="ton_kho" value="<?php if (isset($_POST['ton_kho'])) {
                                                                                                    echo $_POST['ton_kho'];
                                                                                                } else {
                                                                                                    echo $row['ton_kho'];
                                                                                                } ?>">
                            </td>					        
                        </tr>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
            </form>              
            </div>
        </div>
    </div>
</div><!--/.row-->	