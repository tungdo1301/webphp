<?php
$id_dh = $_GET['id_dh'];
$sql = "SELECT * FROM donhang WHERE id_dh=$id_dh";
$query = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($query);
if (isset($_POST['submit'])) {
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $dia_chi = $_POST['dia_chi'];
    $tong_gia = $_POST['tong_gia'];
    $trang_thai = $_POST['trang_thai'];
    if (isset($ten) && isset($sdt) && isset($dia_chi) && isset($tong_gia) && isset($trang_thai)) {
        $sql = "UPDATE donhang SET ten='$ten',sdt='$sdt',dia_chi='$dia_chi',tong_gia=$tong_gia,trang_thai=$trang_thai  WHERE id_dh=$id_dh";
        $query = mysqli_query($conn, $sql);
        header('location: quantri.php?page_layout=donhang');
    }
}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li><a href="quantri.php?page_layout=donhang">Danh sách đơn hàng</a></li>
        <li class="active"></li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa đơn hàng</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">
                        <table data-toggle="table">
                            <thead>
                                <tr>
                                    <th data-sortable="true">Tên khách hàng</th>
                                    <th data-sortable="true">Số điện thoại</th>
                                    <th data-sortable="true">Địa Chỉ</th>
                                    <th data-sortable="true">Tổng giá</th>
                                    <th data-sortable="true">Tình trạng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="ten" value="<?php if (isset($_POST['ten'])) {
                                                                                                        echo $_POST['ten'];
                                                                                                    } else {
                                                                                                        echo $row['ten'];
                                                                                                    } ?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input name="sdt" type="text" name="sdt" value="<?php if (isset($_POST['sdt'])) {
                                                                                            echo $_POST['sdt'];
                                                                                        } else {
                                                                                            echo $row['sdt'];
                                                                                        } ?>">
                                    </td>
                                    <td data-checkbox="true">
                                        <input name="dia_chi" type="text" name="dia_chi" value="<?php if (isset($_POST['dia_chi'])) {
                                                                                                    echo $_POST['dia_chi'];
                                                                                                } else {
                                                                                                    echo $row['dia_chi'];
                                                                                                } ?>">
                                    </td>
                                    <td data-checkbox="true">
                                        <input name="tong_gia" type="text" name="tong_gia" value="<?php if (isset($_POST['tong_gia'])) {
                                                                                                    echo $_POST['tong_gia'];
                                                                                                } else {
                                                                                                    echo $row['tong_gia'];
                                                                                                } ?>">
                                    <td data-checkbox="true">
                                    <input type="radio" name="trang_thai"
                                        <?php 
                                            if($row['trang_thai']==1)
                                            {
                                                echo 'checked';
                                            }
                                         ?>

                                     id="optionsRadios1" value=1> Hoàn thành                        
                                    <input type="radio" name="trang_thai"
                                        <?php 
                                            if($row['trang_thai']==0)
                                            {
                                                echo 'checked';
                                            }
                                         ?>
                                     id="optionsRadios2" value=0> Chưa hoàn thành
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->