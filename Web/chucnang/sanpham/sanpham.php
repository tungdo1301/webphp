<?php
    function formatprice($number)
    {
        $number = intval($number);
        return number_format($number, 0,',','.') ;
    }

?>
<?php  
    $sql="SELECT * FROM sanpham WHERE dac_biet=1 ORDER BY id_sp DESC LIMIT 4";
    $query=mysqli_query($conn,$sql);
?>
<div class="row">
	<div class="col-lg-12">
		<div class="heading">
			<h2>SẢN PHẨM NỔI BẬT</h2>
		</div>
		
		<div class="products">
			<?php  
            	while ($row=mysqli_fetch_array($query)) {
        	?>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="product">
					<div class="image"><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img width="157" height="300" src="quantri/anh/<?php echo $row['anh_sp']; ?>"></a></div>
					<?php
						if($row['ton_kho'] > 0) {
					?>
					<div class="buttons">
						<a class="btn cart" href="chucnang/giohang/themhang.php?id_sp=<?php echo $row['id_sp']; ?>"><span class="glyphicon glyphicon-shopping-cart"></span></a>
					</div>
					<?php
						} else{
							echo 'HẾT HÀNG';
						}
					?>
					<div class="caption">
						<div class="name">
							<h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><?php echo $row['ten_sp']; ?></a></h3>
						</div>
						<div class="price"><?php echo formatprice($row['gia_sp']); ?><span>VNĐ</span></div>
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
<?php  
    $sql2="SELECT * FROM sanpham ORDER BY id_sp ASC LIMIT 4";
    $query2= mysqli_query($conn ,$sql2);
	$row2=mysqli_fetch_array($query);
?>
<div class="row">
	<div class="container">
			<div class="banner">
				<div class="col-sm-6">
					<img src="images/subbanner4.jpg" />
				</div>
				<div class="col-sm-6">
					<img src="images/sub-banner5.png" />
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="heading">
			<h2>SẢN PHẨM PHỔ THÔNG</h2>
		</div>
		<div class="products">
			<?php  
            	while($row2=mysqli_fetch_array($query2)){
        	?>
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="product">
					<div class="image"><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row2['id_sp']; ?>"><img width="157" height="300" src="quantri/anh/<?php echo $row2['anh_sp']; ?>"></a></div>
					<?php
						if($row2['ton_kho'] > 0) {
					?>
					<div class="buttons">
						<a class="btn cart" href="chucnang/giohang/themhang.php?id_sp=<?php echo $row2['id_sp']; ?>"><span class="glyphicon glyphicon-shopping-cart"></span></a>
					</div>
					<?php
						}
					?>
					<div class="caption">
						<div class="name">
							<h3><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row2['id_sp']; ?>"><?php echo $row2['ten_sp']; ?></a></h3>
						</div>
						<div class="price"><?php echo formatprice($row2['gia_sp']); ?><span>VNĐ</span></div>
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