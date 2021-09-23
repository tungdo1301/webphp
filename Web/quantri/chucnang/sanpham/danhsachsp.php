<script>
    function xoasp() {
        var conf = confirm("Bạn có muốn xóa sản phẩm này không?");
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
    $sheet->setCellValue('A'.$rowCount, 'ID_sp');
    $sheet->setCellValue('B'.$rowCount, 'Tên sản phẩm');
    $sheet->setCellValue('C'.$rowCount, 'Hãng sản xuất');
    $sheet->setCellValue('D'.$rowCount, 'Giá sản phẩm');
    $sheet->setCellValue('E'.$rowCount, 'Số lượng sản phẩm còn trong kho');

    $sql = "SELECT id_sp,ten_sp,ten_dm,gia_sp,ton_kho from sanpham INNER JOIN dmsanpham ON sanpham.id_dm=dmsanpham.id_dm";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($query)) {
        $rowCount++;
        $sheet->setCellValue('A'.$rowCount, $row['id_sp']);
        $sheet->setCellValue('B'.$rowCount, $row['ten_sp']);
        $sheet->setCellValue('C'.$rowCount, $row['ten_dm']);
        $sheet->setCellValue('D'.$rowCount, $row['gia_sp']);
        $sheet->setCellValue('E'.$rowCount, $row['ton_kho']);
    }
    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename = 'sanpham.xlsx';
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
$rowPerPage = 15;
$perPage = $page * $rowPerPage - $rowPerPage;
$sql = "SELECT * FROM sanpham INNER JOIN dmsanpham ON sanpham.id_dm=dmsanpham.id_dm ORDER BY id_sp DESC LIMIT $perPage,$rowPerPage";
$query = mysqli_query($conn, $sql);
$totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham"));
$totalPages = ceil($totalRows / $rowPerPage);
$listPage = "";
for ($i = 1; $i <= $totalPages; $i++) {
    if ($page == $i) {
        $listPage .= '<li class="active"><a href="quantri.php?page_layout=danhsachsp&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $listPage .= '<li><a href="quantri.php?page_layout=danhsachsp&page=' . $i . '">' . $i . '</a></li>';
    }
}
?>

<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li class="active"></li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản lý sản phẩm</h1>
        <form method="POST" enctype="multipart/form-data"><button type="submit" name="btnExport">Xuất file</button></form>
        
    </div>
</div>
<!--/.row-->


<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body" style="position: relative;">
                <a href="quantri.php?page_layout=themsp" class="btn btn-primary" style="margin: 10px 0 20px 0; position: absolute;">Thêm sản phẩm mới</a>
                <table data-toggle="table" data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-sortable="true">ID</th>
                            <th data-sortable="true">Tên sản phẩm</th>
                            <th data-sortable="true">Giá</th>
                            <th data-sortable="true">Hãng sản xuất (Danh mục)</th>
                            <th data-sortable="true">Ảnh mô tả</th>
                            <th data-sortable="true">Số lượng còn trong kho</th>
                            <th data-sortable="true">Sửa</th>
                            <th data-sortable="true">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                            <tr style="height: 300px;">
                                <td data-checkbox="true"><?php echo $row['id_sp']; ?></td>
                                <td data-checkbox="true"><a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></td>
                                <td data-checkbox="true"><?php echo $row['gia_sp']; ?></td>
                                <td data-sortable="true"><?php echo $row['ten_dm']; ?></td>
                                <td data-sortable="true">
                                    <span class="thumb"><img width="80px" height="150px" src="anh/<?php echo $row['anh_sp'] ?>" /></span>
                                </td>
                                <td data-sortable="true"><?php echo $row['ton_kho']; ?></td>
                                <td>
                                    <a href="quantri.php?page_layout=suasp&id_sp=<?php echo $row['id_sp']; ?>"><span><svg class="glyph stroked brush" style="width: 20px;height: 20px;">
                                                <use xlink:href="#stroked-brush" />
                                            </svg></span></a>
                                </td>
                                <td>
                                    <a onclick="return xoasp();" href="./chucnang/sanpham/xoasp.php?id_sp=<?php echo $row['id_sp']; ?>"><span><svg class="glyph stroked cancel" style="width: 20px;height: 20px;">
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