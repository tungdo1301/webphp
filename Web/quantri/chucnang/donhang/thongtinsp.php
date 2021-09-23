<?php  
	$id_sp= $_GET['id_sp'];
    $sqlsp = "SELECT * FROM chitiettdonhang WHERE id_sp=$id_sp";
    $querysp = mysqli_query($conn, $sqlsp);

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $rowPerPage = 8;
    $perRow = $page * $rowPerPage - $rowPerPage;
    $sql = "SELECT * FROM sanpham WHERE id_sp=$id_sp ORDER BY id_sp DESC LIMIT $perRow,$rowPerPage";
    $query = mysqli_query($conn, $sql);
    
    $totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham WHERE id_sp=$id_sp"));
    

?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="quantri.php?page_layout=donhang">Danh sách Đon hàng</a></li>
        <li><a href="quantri.php?page_layout=chitietdonhang">Chi tiết Đon hàng</a></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Thông tin sản phẩm</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">              			
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    
                    <thead>
                        <tr>						        
                            <th data-sortable="true">id_sp</th>
                            <th data-sortable="true">Tên sản phẩm</th>
                            <th data-sortable="true">Giá sản phẩm</th>
                            <th data-sortable="true">Ảnh sản phẩm</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><?php echo $row['id_sp']; ?></td>
                            <td data-checkbox="true"><?php echo $row['ten_sp']; ?></td>
                            <td data-checkbox="true"><?php echo $row['gia_sp']; ?></td>
                            <td data-sortable="true">
                                <span class="thumb"><img width="80px" height="150px" src="anh/<?php echo $row['anh_sp'] ?>" /></span>
                            </td> 
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