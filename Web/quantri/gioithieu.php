<?php
    function formatprice($number)
    {
        $number = intval($number);
        return number_format($number, 0,',','.') ;
    }

?>
<?php

    $sql = "SELECT COUNT(*) AS 'count' FROM sanpham";
    $result1 = $conn->query($sql);

    $sql2 = "SELECT COUNT(*) AS 'count2' FROM donhang";
    $result2 = $conn->query($sql2);

    $sql3 = "SELECT COUNT(*) AS 'count3' FROM thanhvien";
    $result3 = $conn->query($sql3);

    $sql4 = "SELECT SUM(tong_gia) AS 'count4' FROM donhang WHERE trang_thai='1'";
    $result4 = $conn->query($sql4);


?>
<?php
    
      $updatetime = date('Y-m-d  H:i:s');
      // tháng 
      $month = date('m');
      // ngày
      $day = date('d');

      $dates = date('Y-m-d');
    // $weekback = date('Y-m-d', strtotime('-7 days'));
      while (date('w', strtotime($dates)) != 1) {
          $tmp = strtotime('-1 day', strtotime($dates));
          $dates = date('Y-m-d', $tmp);
      }
      $week = date('W', strtotime($dates));
        //  doanh thu trong ngày 

      $sqltime2 = "SELECT SUM(tong_gia) as doanhthungay FROM donhang where trang_thai = 1 and DAY(thoi_gian_tao) = $day";
      $kq2 = $conn->query($sqltime2);
        // danh thu theo  tuần

      $sqltime3 = "SELECT SUM(tong_gia) as doanhthutuan FROM donhang  where trang_thai = 1 and WEEK(thoi_gian_tao) =  $week";
      $kq3 = $conn->query($sqltime3);
        //doanh thu tháng
      $sqltime4 = "SELECT SUM(tong_gia) AS doanhthuthang FROM donhang WHERE MONTH(thoi_gian_tao) = $month AND trang_thai = 1";
      $kq4 = $conn->query($sqltime4);
      
?>
<?php  
	$fp='chucnang/thongke/dem.txt';
	$fo=fopen($fp,'r');
	$count=fread($fo,filesize($fp));
	$count++;
	$fc=fclose($fo);
	$fo=fopen($fp,'w');
	$fw=fwrite($fo, $count);
	$fc=fclose($fo);
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home">
                    <use xlink:href="#stroked-home"></use>
                </svg></a></li>
        <li class="active"></li>
    </ol>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Quản trị</h1>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-blue panel-widget ">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left" >
                    <svg class="glyph stroked mobile device" >
                        <use xlink:href="#stroked-mobile-device" ></use>
                    </svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php if ($result1->num_rows > 0) {
                                            while ($row = $result1->fetch_assoc()) {
                                                echo $row["count"];
                                            }
                                        } ?></div>
                    <div class="text-muted"><a href="quantri.php?page_layout=danhsachsp">Sản phẩm</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-orange panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked bag">
                        <use xlink:href="#stroked-bag"></use>
                    </svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php if ($result2->num_rows > 0) {
                                            while ($row = $result2->fetch_assoc()) {
                                                echo $row["count2"];
                                            }
                                        } ?></div>
                    <div class="text-muted"><a href="quantri.php?page_layout=donhang">Đơn hàng</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-teal panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked male-user">
                        <use xlink:href="#stroked-male-user"></use>
                    </svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php if ($result3->num_rows > 0) {
                                            while ($row = $result3->fetch_assoc()) {
                                                echo $row["count3"];
                                            }
                                        } ?></div>
                    <div class="text-muted"><a href="quantri.php?page_layout=danhsachtv">Thành viên</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-3">
        <div class="panel panel-red panel-widget">
            <div class="row no-padding">
                <div class="col-sm-3 col-lg-5 widget-left">
                    <svg class="glyph stroked line-graph">
                        <use xlink:href="#stroked-line-graph"></use>
                    </svg>
                </div>
                <div class="col-sm-9 col-lg-7 widget-right">
                    <div class="large"><?php if ($result4->num_rows > 0) {
                                            while ($row = $result4->fetch_assoc()) {
                                                echo formatprice($row["count4"]);
                                            }
                                        } ?>đ</div>
                    <div class="text-muted">Tổng doanh thu</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12">
    <h2>Thống kê</h2>
    <div class="alert bg-primary" role="alert" style="font-size: 25px;">
        <svg class="glyph stroked checkmark" >
            <use xlink:href="#stroked-checkmark"></use>
        </svg> Thống kê lưu lượng truy cập: Hiện có <span><?php echo $count; ?></span> người đang xem
    </div>
    <div class="alert bg-info" role="alert" style="font-size: 25px;">
        <svg class="glyph stroked checkmark">
            <use xlink:href="#stroked-checkmark"></use>
        </svg> Doanh thu hôm nay: <?php if ($kq2->num_rows > 0) {
                                            while ($row = $kq2->fetch_assoc()) {
                                                echo formatprice($row["doanhthungay"]);
                                            }
                                        } 
                                        ?>đ
    </div>
    <div class="alert bg-warning" role="alert" style="font-size: 25px;">
        <svg class="glyph stroked checkmark">
            <use xlink:href="#stroked-checkmark"></use>
        </svg> Doanh thu theo tuần: <?php if ($kq3->num_rows > 0) {
                                            while ($row = $kq3->fetch_assoc()) {
                                                echo formatprice($row["doanhthutuan"]);
                                            }
                                        } ?>đ
    </div>
    <div class="alert bg-danger" role="alert" style="font-size: 25px;">
        <svg class="glyph stroked checkmark">
            <use xlink:href="#stroked-checkmark"></use>
        </svg> Doanh thu theo tháng: <?php if ($kq4->num_rows > 0) {
                                            while ($row = $kq4->fetch_assoc()) {
                                                echo formatprice($row["doanhthuthang"]);
                                            }
                                            
                                        } ?>đ
    </div>
</div>

<!-- <div class="row">
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
                <h4>Đơn hàng mới</h4>
                <div class="easypiechart" id="easypiechart-blue" data-percent="92"><span class="percent">92%</span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
                <h4>Bình luận</h4>
                <div class="easypiechart" id="easypiechart-orange" data-percent="65"><span class="percent">65%</span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
                <h4>Thành viên mới</h4>
                <div class="easypiechart" id="easypiechart-teal" data-percent="56"><span class="percent">56%</span></div>
            </div>
        </div>
    </div>
    <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
            <div class="panel-body easypiechart-panel">
                <h4>Khách vãng lai</h4>
                <div class="easypiechart" id="easypiechart-red" data-percent="27"><span class="percent">27%</span></div>
            </div>
        </div>
    </div>
</div> -->
<!--/.row-->