<script>
	function xoasp(){
		var conf=confirm('Bạn có muốn xóa sản phẩm này trong đơn hàng không?');
		return conf;
	}
</script>
<?php  
	$id_dh= $_GET['id_dh'];
    $sqldh = "SELECT * FROM donhang WHERE id_dh=$id_dh";
    $querydh = mysqli_query($conn, $sqldh);
    $rowdh = mysqli_fetch_array($querydh);
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $rowPerPage = 8;
    $perRow = $page * $rowPerPage - $rowPerPage;
    $sql = "SELECT * FROM chitietdonhang WHERE id_dh=$id_dh ORDER BY id_sp DESC LIMIT $perRow,$rowPerPage";
    $query = mysqli_query($conn, $sql);
    
    $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM chitietdonhang WHERE id_dh=$id_dh"));
    $totalPage = ceil($totalRow / $rowPerPage);
    $list_page = "";
    for ($i = 1; $i <= $totalPage; $i++) {
        if ($page == $i) {
            $list_page .= '<li class="active"><a href="index.php?page_layout=chitietdonhang&id_dh=' . $id_dh . '&page=' . $i . '" >' . $i . '</a></li>';
        } else {
            $list_page .= '<li><a href="index.php?page_layout=chitietdonhang&id_dh=' . $id_dh. '&page=' . $i . '">' . $i . '</a></li>';
        }
    }
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="quantri.php?page_layout=donhang">Danh sách Đon hàng</a></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thông tin đơn hàng</h1>
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
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['id_dh']; ?></td>
                            <td data-checkbox="true"><a href="quantri.php?page_layout=thongtinsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['id_sp']; ?></a></td>
                            <td data-checkbox="true"><?php echo $row['so_luong']; ?></td>
                            <td data-checkbox="true"><?php echo $row['gia']; ?></td>
                            <td data-checkbox="true"><?php echo $row['thoi_gian_tao']; ?></td>
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
            </div>
        </div>
    </div>
</div><!--/.row-->