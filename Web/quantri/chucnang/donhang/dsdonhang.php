<script>
	function xoadh(){
		var conf=confirm('Bạn có muốn xóa đơn hàng này không?');
		return conf;
	}
</script>
<?php
include_once('Classes/PHPExcel.php');

if (isset($_POST['btnExport'])) {
    $objExcel = new PHPExcel;
    ob_end_clean();
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('1');

    $rowCount = 1;
    $sheet->setCellValue('A'.$rowCount, 'ID_Đơn hàng');
    $sheet->setCellValue('B'.$rowCount, 'Tên khách hàng');
    $sheet->setCellValue('C'.$rowCount, 'Số điêhn thoại');
    $sheet->setCellValue('D'.$rowCount, 'Địa chỉ');
    $sheet->setCellValue('E'.$rowCount, 'Tổng giá');
    $sheet->setCellValue('F'.$rowCount, 'Trạng thái');
    $sheet->setCellValue('G'.$rowCount, 'Thời gian đặt');

    $sql = "SELECT * FROM donhang ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
        $rowCount++;
        $sheet->setCellValue('A'.$rowCount, $row['id_dh']);
        $sheet->setCellValue('B'.$rowCount, $row['ten']);
        $sheet->setCellValue('C'.$rowCount, $row['sdt']);
        $sheet->setCellValue('D'.$rowCount, $row['dia_chi']);
        $sheet->setCellValue('E'.$rowCount, $row['tong_gia']);
        $sheet->setCellValue('F'.$rowCount, $row['trang_thai']);
        $sheet->setCellValue('G'.$rowCount, $row['thoi_gian_tao']);
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename = 'donhang.xlsx';
    $objWriter->save($filename);

     header('Content-Description: File Transfer');
    header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    header("Content-Disposition: attachment; filename=\"".basename($filename)."\"");
    header("Content-Transfer-Encoding: binary");
    header("Expires: 0");
    header("Pragma: public");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header('Content-Length: ' . filesize($filename)); //Remove

    ob_clean();
    flush();

    readfile($filename);
}

?>
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
	$sql="SELECT * FROM donhang ORDER BY id_dh ASC LIMIT $perPage,$rowPerPage";
	$query=mysqli_query($conn,$sql);

	$totalRows=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM donhang "));
    $totalPages=ceil($totalRows/$rowPerPage);
    $listPage="";
    for($i=1;$i<=$totalPages;$i++)
    {
        if($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=donhang&page='.$i.'">'.$i.'</a></li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=donhang&page='.$i.'">'.$i.'</a></li>';
        }
    }
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Đơn hàng</h1>
        <form method="POST" enctype="multipart/form-data"><button type="submit" name="btnExport">Xuất file</button></form>
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
                            <th data-sortable="true">Tên Khách Hàng</th>
                            <th data-sortable="true">Số điện thoại</th>
                            <th data-sortable="true">Địa Chỉ</th>
                            <th data-sortable="true">Tổng giá</th>
                            <th data-sortable="true">Trạng thái</th>
                            <th data-sortable="true">Thời gian đặt</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                            <th data-sortable="true">In</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr style="height: 300px;">
                            <td data-checkbox="true"><a href="quantri.php?page_layout=thongtindh&id_dh=<?php echo $row['id_dh']; ?>"><?php echo $row['id_dh']; ?></a></td>
                            <td data-checkbox="true"><?php echo $row['ten']; ?></td>
                            <td data-checkbox="true"><?php echo $row['sdt']; ?></td>
                            <td data-checkbox="true"><?php echo $row['dia_chi']; ?></td>
                            <td data-checkbox="true"><?php echo $row['tong_gia']; ?></td>
                            <td data-checkbox="true"><?php if($row['trang_thai']==1)
                                            {
                                                echo 'Hoàn thành';
                                            }else{
                                                echo 'Chưa hoàn thành';
                                            } ?></td>
                            <td data-checkbox="true"><?php echo date($row['thoi_gian_tao']); ?></td>
                            <td>
                                <a  href="quantri.php?page_layout=suadonhang&id_dh=<?php echo $row['id_dh']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>
                            <td>
                                <a onclick="return xoadh();" href="./chucnang/donhang/xoadh.php?id_dh=<?php echo $row['id_dh']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
                            </td>
                            <td>
                                <a  href="quantri.php?page_layout=indonhang&id_dh=<?php echo $row['id_dh']; ?>"><span><svg class="glyph stroked printer" style="width: 20px;height: 20px;"><use xlink:href="#stroked-printer"/></svg></span></a>
                            </td>
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