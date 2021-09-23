<div>
    <?php
    $sdt = $user['sdt'];
    $orders = mysqli_query($conn, "SELECT donhang.trang_thai, donhang.ten, donhang.dia_chi, donhang.sdt, chitietdonhang.*, sanpham.ten_sp, sanpham.gia_sp FROM donhang
    INNER JOIN chitietdonhang ON donhang.id_dh = chitietdonhang.id_dh
    INNER JOIN sanpham ON sanpham.id_sp = chitietdonhang.id_sp 
    WHERE donhang.sdt = $sdt AND donhang.trang_thai=0");
    $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
    ?>
    <?php
        if(isset($orders[0])){
    ?>
    <div class="container">
        <a href="index.php?page_layout=thongtintv" class="btn btn-1">Thông tin khách hàng</a>
        <h2 class="h2-bar">ĐƠN HÀNG CỦA BẠN</h2>
        <form>          
            <table class="table table-bordered">
                <tr>
                    <center><h5><i>Cửa hàng KB MOBILE Cảm ơn quý khách đã mua hàng!</i></h5></center>
                </tr>
                <tr>
                    <thead>
                        <th>Thông tin người nhận</th>
                        <th>Danh sách sản phẩm</th>
                    </thead>
                </tr>
                <tr>
                    <td><label>Người nhận: </label><span> <?= $orders[0]['ten'] ?></span></br>
                        <label>Điện thoại: </label><span> <?= $orders[0]['sdt'] ?></span><br />
                        <label>Địa chỉ: </label><span> <?= $orders[0]['dia_chi'] ?></span><br />
                    </td>
                    <td>
                        <ul>
                            <?php
                            $totalQuantity = 0;
                            $totalMoney = 0;
                            foreach ($orders as $row) {
                            ?>
                                <li>
                                    <span class="item-name"><label><?= $row['ten_sp'] ?></label></span>&nbsp;-&nbsp;<label>Giá: </label> <?= number_format($row['gia_sp'], 0, ",", ".") ?>đ</br>
                                    <span class="item-quantity"><label>Số Lượng: </label> <?= $row['so_luong'] ?> sản phẩm</span>&nbsp;&nbsp;&nbsp;
                                    <label>Thời gian đặt: </label> <?= $row['thoi_gian_tao'] ?>
                                </li>
                            <?php
                                $totalMoney += ($row['gia_sp'] * $row['so_luong']);
                                $totalQuantity += $row['so_luong'];
                            }
                            ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <th>Tổng giá trị hóa đơn:</th>
                    <td><label>Số Lượng Sản Phẩm Nhận:</label> <?= $totalQuantity ?><br />
                            <label>Tổng tiền:</label> <?= number_format($totalMoney, 0, ",", ".") ?> đ</br>
                            </td>
                            
                </tr>
                <tr>
                    <th>Trạng thái: </th>
                    <td>
                    <?php if($row['trang_thai']==1)
                                            {
                                                echo 'Đã giao';
                                            }else{
                                                echo 'Đang giao hàng';
                                            } ?>
                    </td>
                </tr> 
                <tr>
                <th><label>Thanh toán:</label></th>   
                <td>Thanh toán khi nhận hàng</td>             
                </tr>   
                <tr>
                <th><label>Phiếu bảo hành:</label></th>   
                <td>Hóa đơn này thay cho phiếu bảo hành</td>             
                </tr>        
            </table>
            <button onclick="window.print()" class="btn btn-defaut"><b>IN ĐƠN HÀNG</b></button>
        </form>
        <div class="row">
            <div class="col-md-4 col-md-offset-8 ">
                 <center><a href="index.php" class="btn btn-1">Trở về trang chủ</a></center>
            </div>
        </div>
    </div>
    <?php
        }else{
            echo '<center class="alert alert-danger">Thông tin đơn hàng của bạn hiện đang trống! &ensp;&ensp;<a href="index.php?page_layout=thongtintv" class="btn btn-1">Trở về thông tin tài khoản</a></center>';
        }
    ?>
</div>