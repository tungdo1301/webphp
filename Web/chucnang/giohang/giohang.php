<?php
    function formatprice($number)
    {
        $number = intval($number);
        return number_format($number, 0,',','.') ;
    }

?>
<div id="page-content" class="single-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="index.php?page_layout=giohang">Giỏ hàng của bạn</a></li>
					</ul>
				</div>
			</div>
			<?php
			if (isset($_SESSION['giohang'])) {			
				if (isset($_POST['sl'])) {				
					foreach ($_POST['sl'] as $id_sp => $sl) {						
						if ($sl == 0) {
							//unset($_SESSION['giohang'][$id_sp]);
							echo '<script>alert("Vui lòng xóa sản phẩm");</script>';
							//if($sl==0 && count($_SESSION['giohang'])== 1) {unset($_SESSION['giohang']);}																																									
						} else if ($sl > 0 &&  is_numeric($sl)) {
							if(!isset($_SESSION['giohang'])){
								$_SESSION['giohang'][$id_sp]=0;
							}
							$_SESSION['giohang'][$id_sp] = $sl;
							$themsanpham = mysqli_query($conn, "SELECT ton_kho from sanpham where id_sp = $id_sp");
							$themsanpham = mysqli_fetch_assoc($themsanpham);
							if($_SESSION['giohang'][$id_sp] > $themsanpham['ton_kho']){
								$_SESSION['giohang'][$id_sp] = $themsanpham['ton_kho'];
								echo '<script>alert("Số lượng bạn nhập vượt quá sản phẩm có trong kho, vui lòng nhập lại số lượng");</script>';
							}
						}
						
					}
				}
				$arrid = array();
				foreach ($_SESSION['giohang'] as $id_sp => $so_luong) {
					$arrid[] = $id_sp;
				}
				$strid = implode(',', $arrid);
				$sql = "SELECT * FROM sanpham WHERE id_sp IN($strid) ORDER BY id_sp DESC";
				$query = mysqli_query($conn, $sql);
			?>
			<form id="giohang" method="post">
				<?php
				$totalPriceAll = 0;
				while ($row = mysqli_fetch_array($query)) {
					$totalPrice = $row['gia_sp'] * $_SESSION['giohang'][$row['id_sp']];
				?>
				<div class="row" >
					<div class="product well">
						<div class="col-md-3">
							<div class="image">
							<a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img src="quantri/anh/<?php echo $row['anh_sp']; ?>" alt="..." class="img-responsive" /></a>
							</div>
						</div>
						<div class="col-md-9">
							<div class="caption">
								<div class="name">
									<h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
								</div>
								<div class="price"><?php echo formatprice($row['gia_sp']); ?><span>VNĐ</span></div>
								<label>Số lượng: </label> <input class="form-inline quantity"  name="sl[<?php echo $row['id_sp']; ?>]" type="text" value="<?php echo $_SESSION['giohang'][$row['id_sp']]; ?>"><a onclick="document.getElementById('giohang').submit();" href="#" class="btn btn-2">Cập nhật giỏ hàng</a>
								<hr>
								<label>Tổng tiền sản phẩm: <?php echo formatprice($totalPrice); ?></label>
                				<td class="actions" data-th="">
								<a class="btn btn-danger pull-right" href="chucnang/giohang/xoahang.php?id_sp=<?php if(count($_SESSION['giohang'])==1){echo '0';}else echo $row['id_sp']; ?>" >Xóa</a>
								</td>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div> 
				<?php
					$totalPriceAll += $totalPrice;
				}
				?>
				<div class="row">
					<div class="col-md-4 col-md-offset-8 ">						
						<center><a class="btn btn-1" href="chucnang/giohang/xoahang.php?id_sp=0">Xóa hết sản phẩm</a></center>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-8 ">
					<center><a href="index.php" class="btn btn-1">Tiếp tục mua sắm</a></center>
					</div>
				</div>
				<div class="row">
					<div class="pricedetails">
						<div class="col-md-4 col-md-offset-8">
							<table>
								<tr style="border-top: 1px solid #333">
									<td>
										<h5>TỔNG TIỀN</h5>
									</td>
									<td><?php echo formatprice($totalPriceAll); ?></td>
								</tr>
							</table>
							<center><a href="index.php?page_layout=muahang" class="btn btn-1">Thanh toán</a></center>
						</div>
					</div>
				</div>
			</form>
			<?php
			} else {
				echo '<script>alert("không có sản phẩm nào trong giỏ hàng!"); location.href="index.php";</script>';
			}
			?>
		</div>
	</div>
