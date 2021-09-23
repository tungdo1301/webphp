<?php
ob_start();
session_start();
include_once './cauhinh/ketnoi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Free Bootstrap Themes by 365Bootstrap dot com - Free Responsive Html5 Templates">
	<meta name="author" content="http://www.365bootstrap.com">

	<title>Mobile Shop</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/style.css">


	<!-- Custom Fonts -->
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="fonts/font-slider.css" type="text/css">

	<!-- jQuery and Modernizr-->
	<script src="js/jquery-2.1.1.js"></script>

	<!-- Core JavaScript Files -->
	<script src="js/bootstrap.min.js"></script>

</head>
<body>
	<nav class="navbar" style="background-color: rgb(255, 255, 255);">
		<!--Top-->
		<nav id="top">
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<!-- <select class="language">
							<option value="English" selected>English</option>
							<option value="France">France</option>
							<option value="Germany">Germany</option>
							<option value="Vietnames">Vietnames</option>
						</select>
						<select class="currency">
							<option value="USD" selected>USD</option>
							<option value="EUR">EUR</option>
							<option value="VND">VND</option>
						</select> -->						
						<?php include_once './chucnang/thongke/thongke.php'?>
					</div>
					<div class="col-xs-6">
						<ul class="top-link">
							<?php
								if(!isset($_SESSION['user'])){
							?>
							<li><a href="index.php?page_layout=dangnhap"><span class="glyphicon glyphicon-user"></span>Đăng nhập tài khoản</a></li>
							<?php
								}
							?>
							<li><a href="index.php?page_layout=thongtintv"><?php if (isset($_SESSION['user'])) {
																				$user = $_SESSION['user'];
																				echo $user['email'];
																			} ?></a></li>
							<?php
								if(isset($_SESSION['user'])){
							?>
							<li><a href="./chucnang/login/dangxuat.php"><span class="glyphicon glyphicon-log-out"></span> Đăng xuất</a></li>
							<?php
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<!--Header-->
		<header class="container">
			<div class="row">
				<div class="col-md-4">
					<div id="logo">
						<a href="./index.php">
							<img src="images/logo.png" />
						</a>
					</div>
				</div>
				<?php
				include_once './chucnang/timkiem/timkiem.php';
				?>
				<?php
				include_once './chucnang/giohang/giohangcuaban.php';
				?>
			</div>
		</header>

		<!--Navigation-->
		<?php
		include_once './chucnang/sanpham/danhmucsp.php';
		?>
	</nav>
	<div id="page-content" class="home-page" >
		<?php
		if (isset($_GET['page_layout'])) {
			switch ($_GET['page_layout']) {
				case 'dangnhap':
					include_once './chucnang/login/dangnhap.php';
					break;
				case 'dangky':
					include_once './chucnang/login/dangky.php';
					break;
				case 'danhsachtimkiem':
					include_once './chucnang/timkiem/danhsachtimkiem.php';
					break;
				case 'danhsachsp':
					include_once './chucnang/sanpham/danhsachsp.php';
					break;
				case 'chitietsp':
					include_once './chucnang/sanpham/chitietsp.php';
					break;
				case 'giohang':
					include_once './chucnang/giohang/giohang.php';
					break;
				case 'muahang':
					include_once './chucnang/giohang/muahang.php';
					break;
				case 'hoanthanh':
					include_once './chucnang/giohang/hoanthanh.php';
					break;
				case 'thongtintv':
					include_once './chucnang/thongtin/thongtintv.php';
					break;
				case 'thongtindh':
					include_once './chucnang/thongtin/thongtinGH.php';
					break;
			}
		} else {
			include_once './chucnang/slide/slide.php';
			include_once './chucnang/quangcao/quangcao.php';
			include_once './chucnang/sanpham/sanpham.php';
		}
		?>
		
	</div>
	
	<footer>
		<div class="container">
			<div class="wrap-footer">
				<div class="row">
					<div class="col-md-3 col-footer footer-1">
						<img src="images/logofooter.png" />
						<ul>
							<li><a href="#">Tặng ĐẦY ĐỦ phụ kiện</a></li>
							<li><a href="#">30 ngày 1 ĐỔI 1 thoải mái</a></li>
							<li><a href="#">7 ngày dùng thử miễn phí</a></li>
							<li><a href="#">Bảo hành 12 tháng toàn diện</a></li>
							<li><a href="#">Trả góp lãi suất THẤP</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-footer footer-2">
						<div class="heading">
							<h4>HỖ TRỢ </h4>
						</div>
						<ul>
							<li><a href="#">Chính sách mua hàng</a></li>
							<li><a href="#">Chính sách bảo hành</a></li>
							<li><a href="#">Chính sách vận chuyển</a></li>
							<li><a href="#">Phương thức thanh toán</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-footer footer-3">
						<div class="heading">
							<h4>VỀ CHÚNG TÔI</h4>
						</div>
						<ul>
							<li><a href="#">Giới thiệu công ty</a></li>
							<li><a href="#">Liên hệ</a></li>
							<li><a href="#">Giải đáp mua hàng </a></li>
							<li><a href="#">Tuyển dụng</a></li>
						</ul>
					</div>
					<div class="col-md-3 col-footer footer-4">
						<div class="heading">
							<h4>SHOWROOM</h4>
						</div>
						<ul>
							<li><span class="glyphicon glyphicon-home"></span>CS1: Bắc Từ Liêm - Hà Nội</li>
							<li><span class="glyphicon glyphicon-home"></span>CS2: Cẩm Phả - Quảng Ninh</li>
							<li><span class="glyphicon glyphicon-earphone"></span>+84 349414495</li>
							<li><span class="glyphicon glyphicon-envelope"></span>Duykhanhcp199x@gmail.com</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						Your Store © 2020 - <a href="index.php" rel="nofollow" target="_blank">KB-mobile</a>
					</div>
					<div class="col-md-6">
						<div class="pull-right">
							<ul>
								<li><img src="images/visa-curved-32px.png" /></li>
								<li><img src="images/paypal-curved-32px.png" /></li>
								<li><img src="images/discover-curved-32px.png" /></li>
								<li><img src="images/maestro-curved-32px.png" /></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<script type="text/javascript" src="https://ahachat.com/customer-chats/customer_chat_OIhStQOhWb60b24da25d798.js"></script>
	<script type="text/javascript">
    $(document).ready(function() {
        var lastScrollTop = 0;
        $(window).scroll(function() {
            var currentScrollTop = $(this).scrollTop();
            if (currentScrollTop < lastScrollTop) {
                $('nav.navbar').removeClass('navbar-static-top').addClass('navbar-fixed-top');
                $('body').css('padding-top', ($('nav.navbar').height() + 21));
                // Với 20px là margin-bottom của navbar, 1px là border của navbar
            } else {
                $('nav.navbar').addClass('navbar-static-top').removeClass('navbar-fixed-top');
                $('body').css('padding-top', '0px');
            }
            lastScrollTop = currentScrollTop;
        });
    });
</script>
</body>

</html>