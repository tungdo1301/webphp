<?php
    function formatprice($number)
    {
        $number = intval($number);
        return number_format($number, 0,',','.') ;
    }

?>
<?php
$id_sp = $_GET['id_sp'];
$sql = "SELECT * FROM sanpham WHERE id_sp=$id_sp";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>
<div id="page-content" class="single-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<ul class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">Chi tiết sản phẩm</a></li>

				</ul>
			</div>
		</div>
		<div class="row">
			<div id="main-content" class="col-md-8">
				<div class="product">
					<div class="col-md-6">
						<div class="image">
							<img width="157" height="300" src="quantri/anh/<?php echo $row['anh_sp']; ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="caption">
							<div class="name">
								<h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
							</div>
							<div class="price"><?php echo formatprice($row['gia_sp']); ?><span>VNĐ</span></div>
							<?php
							if ($row['ton_kho'] > 0) {
							?>
								<div class="info">
									<ul>
										<p><span class="sl">Còn </span><?php echo $row['ton_kho']; ?> Sản phẩm</p>
									</ul>
								</div>
								<div class="options">
								</div>
								<div class="rating"><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star"></span><span class="glyphicon glyphicon-star-empty"></span></div>
								<div class="well"><a href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp']; ?>" class="btn btn-2 ">Thêm vào giỏ</a></div>
							<?php
							} else {
								echo 'HẾT HÀNG';
							}
							?>
							<div class="share well">
								<strong style="margin-right: 13px;">Share :</strong>
								<a href="#" class="share-btn" target="_blank">
									<i class="fa fa-twitter"></i>
								</a>
								<a href="#" class="share-btn" target="_blank">
									<i class="fa fa-facebook"></i>
								</a>
								<a href="#" class="share-btn" target="_blank">
									<i class="fa fa-linkedin"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="product-desc">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#description">GIỚI THIỆU SẢN PHẨM</a></li>
						<li><a href="#review">BÌNH LUẬN</a></li>
					</ul>
					<?php
					if (isset($_POST['submit'])) {
						$ten = $_POST['ten'];
						$dien_thoai = $_POST['dien_thoai'];
						$binh_luan = $_POST['binh_luan'];
						$ngay_gio = date('Y-m-d H:i:s');
						//xu lý them moi binh luan
						if (isset($ten) && isset($dien_thoai) && isset($binh_luan)) {
							$sql = "INSERT INTO blsanpham(ten,dien_thoai,binh_luan,ngay_gio,id_sp,Hien_thi) VALUES('$ten','$dien_thoai'," . "'$binh_luan','$ngay_gio','$id_sp','0')";
							$query = mysqli_query($conn, $sql);
							echo '<script>alert("Bình luận của bạn đã được gửi!");</script>';
						}
					}
					?>
					<div class="tab-content">
						<div id="description" class="tab-pane fade in active">
							<p>
								<?php echo $row['chi_tiet_sp']; ?>
							</p>
						</div>
						<div id="review" class="tab-pane fade">
							<div class="review-form">
								<h4>VIẾT BÌNH LUẬN</h4>
								<?php
								if (isset($_SESSION['user'])) {
								?>
									<form name="form1" id="ff" method="post" action="index.php?page_layout=chitietsp&id_sp=<?php echo $id_sp; ?>">
										<label>
											<span>Tên của bạn:</span>
											<input type="text" required="" name="ten" id="name"  value="<?php echo $user['ten']?>">
										</label>
										<label>
											<span>Số điện thoại của bạn:</span>
											<input type="text" required="" name="dien_thoai" id="name"   value="<?php echo $user['sdt']?>">
										</label>
										<label>
											<span>Bình luận của bạn:</span>
											<textarea required="" name="binh_luan" id="message"></textarea>
										</label>
										<div class="text-right">
											<input class="btn btn-default" type="reset" name="reset" value="Làm mới">
											<input class="btn btn-default" type="submit" name="submit" value="Gửi">
										</div>
									</form>
								<?php
								} else {
								?>
									<form name="form1" id="ff" method="post" action="index.php?page_layout=chitietsp&id_sp=<?php echo $id_sp; ?>">
										<label>
											<span>Tên của bạn:</span>
											<input type="text" required="" name="ten" id="name" required>
										</label>
										<label>
											<span>Số điện thoại của bạn:</span>
											<input type="text" required="" name="dien_thoai" id="name" required>
										</label>
										<label>
											<span>Bình luận của bạn:</span>
											<textarea required="" name="binh_luan" id="message"></textarea>
										</label>
										<div class="text-right">
											<input class="btn btn-default" type="reset" name="reset" value="Làm mới">
											<input class="btn btn-default" type="submit" name="submit" value="Gửi">
										</div>
									</form>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sidebar" class="col-md-4">
				<div class="widget wid-categories">
					<div class="heading">
						<h4>GIÁ SẢN PHẨM ĐÃ BAO GỒM:</h4>
					</div>
					<div class="content">
						<ul>
							<p><span class="sl">Bảo hành: </span><?php echo $row['bao_hanh']; ?></p>
							<p><span class="sl">Đi kèm: </span><?php echo $row['phu_kien']; ?></p>
							<p><span class="sl">Tình trạng: </span><?php echo $row['tinh_trang']; ?></p>
							<p><span class="sl">Khuyến Mại: </span><?php echo $row['khuyen_mai']; ?></p>
							<p><span class="sl">1 đổi 1 trong vòng 1 tháng nếu lỗi của NSX </span></p>
							<p><span class="sl">Miễn phi phần mềm trọn đời </span></p>
							<p><span class="sl">FreeShip toàn quốc </span></p>
							<p><span class="sl">Thanh toán khi nhận hàng (COD) </span></p>
						</ul>
					</div>
					<div class="heading">
						<h4>Bình luận Sản Phẩm</h4>
					</div>
					<?php
    if(isset($_GET['page']))
    {
        $page=$_GET['page'];
    }else{
        $page=1;
    }
    $rowPerPage=3;
    $perRow=$page*$rowPerPage-$rowPerPage;
    $sqlbl="SELECT * FROM blsanpham WHERE id_sp=$id_sp ORDER BY id_bl ASC LIMIT $perRow,$rowPerPage";
    $querybl=mysqli_query($conn,$sqlbl);

    $totalRow=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM blsanpham WHERE id_sp=$id_sp"));
    $totalPage= ceil($totalRow/$rowPerPage);
    $list_page="";
    for($i=1;$i<=$totalPage;$i++){
        if($page==$i){
            $list_page.='<li class="active"><a href="index.php?page_layout=chitietsp&id_sp='.$id_sp.'&page='.$i.'">'.$i.'</a></li>';
        }else{
            $list_page.='<li><a href="index.php?page_layout=chitietsp&id_sp='.$id_sp.'&page='.$i.'">'.$i.'</a></li>';
        }
    }
    $rowbl=mysqli_num_rows($querybl);
    if($rowbl>0)
    {
?>
					<div id="comments" class="content">
    <?php  
        while($row=mysqli_fetch_array($querybl)){
    ?>
    <ul>
		<?php
			if($row['Hien_thi']==1){
		?>
        <li class="s1"><h6><?php echo $row['ten']; ?></h6>
            <p>
                <?php echo $row['binh_luan']; ?></br>
				<?php echo $row['ngay_gio']; ?>
            </p>
        </li>
		<?php
		}
		?>
    </ul>
    <?php  
        }
    ?>
	 <ul class="pagination">
        <?php  
        echo $list_page;
        ?>
      </ul>
</div>
					<?php  
    }
?>

				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script>
	$(document).ready(function() {
		$(".nav-tabs a").click(function() {
			$(this).tab('show');
		});
		$('.nav-tabs a').on('shown.bs.tab', function(event) {
			var x = $(event.target).text(); // active tab
			var y = $(event.relatedTarget).text(); // previous tab
			$(".act span").text(x);
			$(".prev span").text(y);
		});
	});
</script>