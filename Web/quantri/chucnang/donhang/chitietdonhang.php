<script>
	function xoasp(){
		var conf=confirm('Bạn có muốn xóa sản phẩm này trong đơn hàng không?');
		return conf;
	}
</script>
<?php
	if(isset($_GET['page']))
    {
        $page=$_GET['page'];
    }
    else{
        $page=1;
    }
    $rowPerPage=10;
    $perPage=$page*$rowPerPage-$rowPerPage;
	$sql="SELECT * FROM chitietdonhang LIMIT $perPage,$rowPerPage";
	$query=mysqli_query($conn,$sql);

	$totalRows=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM chitietdonhang"));
    $totalPages=ceil($totalRows/$rowPerPage);
    $listPage="";
    for($i=1;$i<=$totalPages;$i++)
    {
        if($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=chitietdonhang&page='.$i.'">'.$i.'</a></li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=chitietdonhang&page='.$i.'">'.$i.'</a></li>';
        }
    }
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="quantri.php?page_layout=donhang">Danh sách đơn hàng</a></li>

    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Chi tiết đơn hàng</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">			
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">id_dh</th>
                            <th data-sortable="true">id_sp</th>
                            <th data-sortable="true">Số lượng</th>
                            <th data-sortable="true">Giá sản phẩm</th>
                            <th data-sortable="true">Thời gian đặt</th>
                            <!-- <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['id_dh']; ?></td>
                            <td data-checkbox="true"><a href="quantri.php?page_layout=thongtinsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['id_sp']; ?></a></td>
                            <td data-checkbox="true"><?php echo $row['so_luong']; ?></td>
                            <td data-checkbox="true"><?php echo $row['gia']; ?></td>
                            <td data-checkbox="true"><?php echo date($row['thoi_gian_tao']); ?></td>
                            <!-- <td>
                                <a href="quantri.php?page_layout=suachitietdonhang&id_sp=<?php echo $row['id_sp']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>
                            <td>
                                <a onclick="return xoasp();" href="./chucnang/donhang/xoaspdh.php?id_sp=<?php echo $row['id_sp']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td> -->
                        </tr>
                        <?php  
                            }
                        ?>
                    </tbody>
                </table>
				<ul class="pagination" style="float: right;">
                    <?php  
                        echo $listPage;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div><!--/.row-->	