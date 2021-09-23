<script>
    function xoadanhmuc() {
        var conf = confirm("Bạn có chắc chắn muốn xóa mục này hay không?");
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
    $sheet->setCellValue('A'.$rowCount, 'ID danh mục');
    $sheet->setCellValue('B'.$rowCount, 'Hãng sản xuất (danh mục)');
    $sheet->setCellValue('C'.$rowCount, 'Số lượng sản phẩm');

    $sql="SELECT dmsanpham.id_dm, ten_dm, COUNT(id_sp) AS so_luong_sp FROM dmsanpham INNER JOIN sanpham ON dmsanpham.id_dm = sanpham.id_dm GROUP By dmsanpham.id_dm, ten_dm "; 
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
        $rowCount++;
        $sheet->setCellValue('A'.$rowCount, $row['id_dm']);
        $sheet->setCellValue('B'.$rowCount, $row['ten_dm']);
        $sheet->setCellValue('C'.$rowCount, $row['so_luong_sp']);
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename = 'danhmuc.xlsx';
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

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rowPerPage = 5;
$perPage = $page * $rowPerPage - $rowPerPage;
$sql = "SELECT dmsanpham.id_dm, ten_dm, COUNT(id_sp) AS so_luong_sp FROM dmsanpham INNER JOIN sanpham ON dmsanpham.id_dm = sanpham.id_dm GROUP By dmsanpham.id_dm, ten_dm LIMIT $perPage,$rowPerPage";
$query = mysqli_query($conn, $sql);
$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM dmsanpham"));
$totalPage = ceil($totalRows / $rowPerPage);
$listPage = "";
for ($i = 1; $i <= $totalPage; $i++) {
    if ($page == $i) {
        $listPage .= '<li class="active"><a href="quantri.php?page_layout=danhsachdm&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $listPage .= '<li><a href="quantri.php?page_layout=danhsachdm&page=' . $i . '">' . $i . '</a></li>';
    }
}



?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active"></li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý danh mục</h1>
        <form method="POST" enctype="multipart/form-data"><button type="submit" name="btnExport">Xuất file</button></form>
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body" style="position: relative;">
                <a href="quantri.php?page_layout=themdm" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm danh mục mới</a>
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Hãng sản xuất (danh mục)</th>
                            <th data-sortable="true">Số lượng sản phẩm</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td data-checkbox="true"><?php echo $row['id_dm']; ?></td>
                                <td data-checkbox="true"><a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row['id_dm']; ?>"><?php echo $row['ten_dm']; ?></a></td>
                                <td data-checkbox="true"><?php echo $row['so_luong_sp']; ?></td>
                                <td>
                                    <a href="quantri.php?page_layout=suadm&id_dm=<?php echo $row['id_dm']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;">
                                                <use xlink:href="#stroked-brush" />
                                            </svg></span></a>
                                </td>
                                <td>
                                    <a onclick="return xoadanhmuc();" href="./chucnang/danhmuc/xoadm.php?id_dm=<?php echo $row['id_dm']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;">
                                                <use xlink:href="#stroked-cancel" />
                                            </svg></span></a>
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
</div>
<!--/.row-->