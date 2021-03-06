<?php
    function formatprice($number)
    {
        $number = intval($number);
        return number_format($number, 0,',','.') ;
    }

?>
<?php

$id_dm = $_GET['id_dm'];
$sqldm = "SELECT * FROM dmsanpham WHERE id_dm=$id_dm";
$querydm = mysqli_query($conn, $sqldm);
$rowdm = mysqli_fetch_array($querydm);

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rowPerPage = 8;
$perRow = $page * $rowPerPage - $rowPerPage;
$sql = "SELECT * FROM sanpham WHERE id_dm=$id_dm ORDER BY id_sp DESC LIMIT $perRow,$rowPerPage";
$query = mysqli_query($conn, $sql);

$totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham WHERE id_dm=$id_dm"));
$totalPage = ceil($totalRow / $rowPerPage);
$list_page = "";
for ($i = 1; $i <= $totalPage; $i++) {
    if ($page == $i) {
        $list_page .= '<li class="active"><a href="index.php?page_layout=danhsachsp&id_dm=' . $id_dm . '&page=' . $i . '" >' . $i . '</a></li>';
    } else {
        $list_page .= '<li><a href="index.php?page_layout=danhsachsp&id_dm=' . $id_dm . '&page=' . $i . '">' . $i . '</a></li>';
    }
}

?>



<div id="page-content" class="single-page">

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>                 
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="main-content" class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="products">
                            <?php
                            while ($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                    <div class="product">
                                        <div class="image"><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img width="157" height="300" src="quantri/anh/<?php echo $row['anh_sp']; ?>"></a></div>
                                        <?php
                                        if ($row['ton_kho'] > 0) {
                                        ?>
                                            <div class="buttons">
                                                <a class="btn cart" href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp']; ?>"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                                            </div>
                                        <?php
                                        } else {
                                            echo 'H???T H??NG';
                                        }
                                        ?>
                                        <div class="caption">
                                            <div class="name">
                                                <h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
                                            </div>
                                            <div class="price"><?php echo formatprice($row['gia_sp']); ?><span>VN??</span></div>
                                            <div class="rating"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span></div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <ul class="pagination">
                        <?php
                        echo $list_page;
                        ?>
                    </ul>
                </div>
            </div>
            <div id="sidebar" class="col-md-4">
                <div class="widget wid-categories">
                    <div class="heading">
                        <h4>GI?? S???N PH???M ???? BAO G???M:</h4>
                    </div>
                    <div class="content">
                        <ul>
                            <p><span class="sl">B???o h??nh: </span>12 th??ng</p>
                            <p><span class="sl">??i k??m: </span>S???c, c??p, tai nghe</p>
                            <p><span class="sl">T??nh tr???ng: </span>M???i 100%</p>
                            <p><span class="sl">Khuy???n M???i: </span>D??n m??n h??nh, ???p L??ng</p>
                            <p><span class="sl">1 ?????i 1 trong v??ng 1 th??ng n???u l???i c???a NSX </span></p>
                            <p><span class="sl">Mi???n phi ph???n m???m tr???n ?????i </span></p>
                            <p><span class="sl">FreeShip to??n qu???c </span></p>
                            <p><span class="sl">Thanh to??n khi nh???n h??ng (COD) </span></p>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>