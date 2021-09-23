<?php
$sql = "SELECT * FROM dmsanpham ORDER BY ten_dm ASC";
$query = mysqli_query($conn, $sql);
?>
<nav id="menu" class="">
	<div class="container">
		<div class="navbar-header"><span id="heading" class="visible-xs">Categories</span>
			<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse" style="font-size: 25px;">
			<ul class="nav navbar-nav">
				<li><a href="index.php">Home</a>
				</li>
				<?php
				while ($row = mysqli_fetch_array($query)) {
				?>
					<li class="dropdown"><a href="index.php?page_layout=danhsachsp&id_dm=<?php echo $row['id_dm']; ?>"><?php echo $row['ten_dm']; ?></a>

					</li>
				<?php
				}
				?>
				</li>
			</ul>
		</div>
	</div>
</nav>