<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li><a href="quantri.php?page_layout=donhang">Đơn hàng</a></li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">In Đơn Hàng</h1>
    </div>
</div>
<!--/.row-->
<style>
    form {
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tohoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 21cm;
        overflow: hidden;
        min-height: 297mm;
        padding: 2.5cm;
        margin-left: auto;
        margin-right: auto;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 237mm;
        outline: 2cm #FFEAEA solid;
    }

    @page {
        size: A4;
        margin: 0;
    }

    .title {
        text-align: center;
        position: relative;
        color: #0000FF;
        font-size: 24px;
        top: 1px;
    }

    @media print {
        @page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>

<form>
    <?php
        $orders = mysqli_query($conn, "SELECT donhang.ten, donhang.dia_chi, donhang.thoi_gian_tao, donhang.sdt, chitietdonhang.*, sanpham.ten_sp, sanpham.gia_sp FROM donhang
        INNER JOIN chitietdonhang ON donhang.id_dh = chitietdonhang.id_dh
        INNER JOIN sanpham ON sanpham.id_sp = chitietdonhang.id_sp
        WHERE donhang.id_dh = " . $_GET['id_dh']);
        $orders = mysqli_fetch_all($orders, MYSQLI_ASSOC);
    ?>
    <button onclick="window.print()"><svg class="glyph stroked printer" style="width: 20px;height: 20px;"><use xlink:href="#stroked-printer" /></svg></button>
    <div id="page" class="page">

        <br />
        <div class="title">
        CỬA HÀNG ĐIỆN THOẠI KB MOBILE
            <br />
            -------oOo-------
            <br />
            HÓA ĐƠN MUA HÀNG
        </div>
        <br />
        <br />
        <div id="order-detail-wrapper">
        <table class="table table-bordered">               
                <center><label>THÔNG TIN KHÁCH HÀNG:</label></center>
                <label>Người nhận: </label><span> <?= $orders[0]['ten'] ?></span></br>
                <label>Điện thoại: </label><span> <?= $orders[0]['sdt'] ?></span><br/>
                <label>Địa chỉ: </label><span> <?= $orders[0]['dia_chi'] ?></span><br/>
                <br/>
                <tr>
                    <td><label>THÔNG TIN SẢN PHẨM </label><span>
                        
                    </td>
                    <td>
                        <ul>
                            <?php
                            $totalQuantity = 0;
                            $totalMoney = 0;
                            foreach ($orders as $row) {
                            ?>
                                <li>
                                    <span class="item-name"><label><?= $row['ten_sp'] ?></label></span> - <label>Giá:</label> <?= number_format($row['gia_sp'], 0, ",", ".") ?> đ</br>
                                    <span class="item-quantity"><label>Số Lượng:</label> <?= $row['so_luong'] ?> sản phẩm</span></br>
                                    <label>Ngày đặt:</label> <?= $row['thoi_gian_tao'] ?>
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
                                  
            </table>
            </br><center><label>Cảm ơn quý khách đã mua hàng! </label></center>
        </div>
    </div>
</form>