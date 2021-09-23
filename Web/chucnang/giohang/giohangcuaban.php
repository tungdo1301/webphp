<div class="col-md-4">
	<div id="cart"><a class="btn btn-1" href="index.php?page_layout=giohang"><span class="glyphicon glyphicon-shopping-cart"></span>GIỎ HÀNG : <?php if(isset($_SESSION['giohang'])){echo count($_SESSION['giohang']);}else{echo 0;} ?> SP</a></div>
</div>