<?php
$id_sp = $_GET['id_sp'];
$sqlsp = "SELECT * FROM sanpham";
$querysp = mysqli_query($conn, $sqlsp);

$sql = "SELECT * FROM chitietdonhang WHERE id_sp=$id_sp";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if (isset($_POST['submit'])) {
    $id_sp = $_GET['id_sp'];
    $so_luong = $_POST['so_luong'];
    if (isset($id_sp) && isset($ten_sp) && isset($so_luong)) {
        $sql = "UPDATE chitietdonhang SET id_sp='$id_sp',so_luong='$so_luong' where id_sp=$id_sp";
        $query = mysqli_query($conn, $sql);
        header('location: quantri.php?page_layout=chitietdonhang');
    }
}
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li><a href="quantri.php?page_layout=donhang">Danh sách đơn hàng</a></li>
        <li><a href="quantri.php?page_layout=chitietdonhang">Chi tiết đơn hàng</a></li>
        <li class="active"></li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa chi tiết đơn hàng</h1>
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
                                    <th data-sortable="true">id_dh</th>
                                    <th data-sortable="true">Tên sản phẩm</th>
                                    <th data-sortable="true">Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="id_dh" value="<?php if (isset($_POST['id_dh'])) {
                                                                                                        echo $_POST['id_dh'];
                                                                                                    } else {
                                                                                                        echo $row['id_dh'];
                                                                                                    } ?>" required="">
                                    </td>
                                    <td>
                                        <select name="id_sp" class="form-control">
                                            <?php
                                            while ($rowsp = mysqli_fetch_array($querysp)) {
                                            ?>
                                                <option <?php
                                                        if ($rowsp['id_sp'] == $row['id_sp']) {
                                                            echo 'selected="selected"';
                                                        } ?> value="<?php echo $rowsp['id_sp']; ?>"><?php echo $rowsp['ten_sp']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td data-checkbox="true">
                                        <input type="text" name="so_luong" value="<?php if (isset($_POST['so_luong'])) {
                                                                                        echo $_POST['so_luong'];
                                                                                    } else {
                                                                                        echo $row['so_luong'];
                                                                                    } ?>">
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