<script>
	function xoatv(){
		var conf=confirm('Bạn có muốn xóa tài khoản này không?');
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
    $sheet->setCellValue('A'.$rowCount, 'Tên thành viên');
    $sheet->setCellValue('B'.$rowCount, 'Email');
    $sheet->setCellValue('C'.$rowCount, 'Mật khẩu');
    $sheet->setCellValue('D'.$rowCount, 'Số điện thoại');
    $sheet->setCellValue('E'.$rowCount, 'Địa chỉ');
    $sheet->setCellValue('F'.$rowCount, 'Quyền truy cập');

    $sql = "SELECT * FROM thanhvien ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
        $rowCount++;
        $sheet->setCellValue('A'.$rowCount, $row['ten']);
        $sheet->setCellValue('B'.$rowCount, $row['email']);
        $sheet->setCellValue('C'.$rowCount, $row['mat_khau']);
        $sheet->setCellValue('D'.$rowCount, $row['sdt']);
        $sheet->setCellValue('E'.$rowCount, $row['dia_chi']);
        $sheet->setCellValue('F'.$rowCount, $row['quyen_truy_cap']);
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename = 'thanhvien.xlsx';
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
	$sql="SELECT * FROM thanhvien ORDER BY id_thanhvien ASC LIMIT $perPage,$rowPerPage";
	$query=mysqli_query($conn, $sql);

    $totalRows=mysqli_num_rows(mysqli_query($conn, "SELECT * FROM thanhvien"));
    $totalPages=ceil($totalRows/$rowPerPage);
    $listPage="";
    for($i=1;$i<=$totalPages;$i++)
    {
        if($page==$i){
            $listPage.='<li class="active"><a href="quantri.php?page_layout=quanlytv&page='.$i.'">'.$i.'</a></li>';
        }
        else{
            $listPage.='<li><a href="quantri.php?page_layout=quanlytv&page='.$i.'">'.$i.'</a></li>';
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
        <h1 class="page-header">Quản lý thành viên</h1>
        <form method="POST" enctype="multipart/form-data"><button type="submit" name="btnExport">Xuất file</button></form>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">					
            <div class="panel-body" style="position: relative;">
                <a href="quantri.php?page_layout=themtv" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm thành viên</a>				
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>						        
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên thành viên</th>
                            <th data-sortable="true">Email</th>
                            <th data-sortable="true">Mật khẩu</th>
                            <th data-sortable="true">Số điện thoại</th>
                            <th data-sortable="true">Địa chỉ</th>
                            <th data-sortable="true">Quyền truy cập</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                            while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr style="height: 300px;">                         
                            <td data-checkbox="true"><?php echo $row['id_thanhvien']; ?></td>
                            <td data-checkbox="true"><?php echo $row['ten']; ?></td>
                            <td data-checkbox="true"><a href="quantri.php?page_layout=suatv&id_thanhvien=<?php echo $row['id_thanhvien']; ?>"><?php echo $row['email']; ?></a></td>
                            <td data-checkbox="true"><?php echo $row['mat_khau']; ?></td>
                            <td data-sortable="true"><?php echo $row['sdt']; ?></td>
                            <td data-sortable="true"><?php echo $row['dia_chi']; ?></td>
                            <td data-sortable="true"><?php echo $row['quyen_truy_cap']; ?></td>
                            <td>
                                <a href="quantri.php?page_layout=suatv&id_thanhvien=<?php echo $row['id_thanhvien']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;"><use xlink:href="#stroked-brush"/></svg></span></a>
                            </td>
                            <td>
                                <a onclick="return xoatv();" href="./chucnang/thanhvien/xoatv.php?id_thanhvien=<?php echo $row['id_thanhvien']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;"><use xlink:href="#stroked-cancel"/></svg></span></a>
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