<?php
    function formatprice($number)
    {
        $number = intval($number);
        return number_format($number, 0,',','.') ;
    }

?>
<?php  
    if(isset($_SESSION['giohang'])){
        $arrid=array();
        foreach ($_SESSION['giohang'] as $id_sp => $sl) {
            $arrid[]=$id_sp;
        }
        $strId=implode(',', $arrid);
        $sql_sp="SELECT * FROM sanpham WHERE id_sp IN($strId) ORDER BY id_sp DESC";
        $query=mysqli_query($conn,$sql_sp);
    }
?>

<div id="checkout" class="container">
<h2 class="h2-bar">Xác nhận hóa đơn thanh toán</h2></br>
<table class="table table-bordered">    
    <tr>
    <thead>
    <th>Tên sản phẩm</th>
    <th>Giá</th>
    <th>Số lượng</th>
    <th>Thành tiền</th>
    </thead>
    </tr>

    <?php  
        $totalPriceAll=0;
        $updateString = "";
        while ($row=mysqli_fetch_array($query)) {
            $totalPrice=$row['gia_sp']*$_SESSION['giohang'][$row['id_sp']];
            $updateString .= " WHEN id_sp = ".$row['id_sp']."  THEN ton_kho - ".$_SESSION['giohang'][$row['id_sp']];
    ?>
    <tr>
        <td><?php echo $row['ten_sp']; ?></td>
        <td><span><?php echo formatprice($row['gia_sp']); ?></span></td>
        <td><?php echo $_SESSION['giohang'][$row['id_sp']]; ?></td>
        <td><span><?php echo formatprice($totalPrice); ?></span></td>
    </tr>
    <?php
        $totalPriceAll+=$totalPrice;  
        }
    ?>
    <tr>
        <td>Tổng giá trị hóa đơn:</td>
        <td colspan="2"></td>
        <td><b><span><?php echo formatprice($totalPriceAll); ?></span></b></td>
    </tr>
</table>
</div>
<?php  
    if(isset($_POST['submit'])){
        $ten=$_POST['ten'];
        $sdt=$_POST['sdt'];
        $dia_chi=$_POST['dia_chi'];
        $timestamp = date("Y-m-d H:i:s");

        $updateSL = mysqli_query($conn, "UPDATE `sanpham` set ton_kho = CASE 
        ".$updateString."
        END
        WHERE id_sp in($strId)");
        $query = mysqli_query($conn, "INSERT INTO donhang(ten,sdt,dia_chi,tong_gia,trang_thai,thoi_gian_tao) VALUES('$ten','$sdt','$dia_chi','$totalPriceAll','0','$timestamp')");
        if ($query) { 
            $id_dh = mysqli_insert_id($conn);
            foreach ($_SESSION['giohang'] as $id_sp => $sl){
                mysqli_query($conn, "INSERT INTO chitietdonhang(id_dh,id_sp,so_luong,gia,thoi_gian_tao) VALUES('$id_dh','$id_sp','$sl','$totalPrice','$timestamp')");
            }
            header ( 'Location: index.php?page_layout=hoanthanh');
        }
    }

    
?>
<?php
  if(isset($_SESSION['user'])){
?>
<div id="custom-form" class="container">
<form method="post" >
    <div class="form-group">
        <label>Tên khách hàng</label>
        <input type="text" class="form-control" name="ten" value="<?php echo $user['ten']?>" >
    </div>
    <div class="form-group">
        <label>Số Điện thoại</label>
        <input  type="text" class="form-control" name="sdt" value="<?php echo $user['sdt']?>">
    </div>
    <div class="form-group">
        <label>Địa chỉ nhận hàng</label>
        <input  type="text" class="form-control" name="dia_chi" value="<?php echo $user['dia_chi']?>">
    </div>
    <button class="btn btn-info" name="submit">Mua hàng</button>
</form>
</div>
<?php
  }else{    
?>
<div class="container">
<center class="alert alert-danger">Bạn cần đăng nhập để mua hàng &nbsp
<a class="btn btn-1" href="index.php?page_layout=dangnhap" >Đăng Nhập</a>
</center>
  </div>
</div>
<?php
}
?>