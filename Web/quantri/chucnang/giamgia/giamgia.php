<?php  
	$sql = "SELECT * FROM sanpham ";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    if (isset($_POST['submit'])) {
		$giam_gia=$_POST['giam_gia'];
		if (isset($giam_gia)) {
			$sql="UPDATE sanpham SET gia= gia-gia*0.$giam_gia";
            $query = mysqli_query($conn,$sql);
            header('location: quantri.php?page_layout=giamgia');
		}
	}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="quantri.php?page_layout=kho">Giảm giá</svg></a></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">giảm giá</h1>
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
                            <th data-sortable="true">Giảm giá(%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="height: 300px;">
                            <td data-checkbox="true">
                            <input class="form-control" type="text" name="giam_gia" value="<?php if (isset($_POST['giam_gia'])) {
                                                                                                    echo $_POST['giam_gia'];
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