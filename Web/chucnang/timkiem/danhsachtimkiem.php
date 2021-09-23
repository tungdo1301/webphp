<?php
    function formatprice($number)
    {
        $number = intval($number);
        return number_format($number, 0,',','.') ;
    }

?>
<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$rowPerPage = 4;
$perRow = $page * $rowPerPage - $rowPerPage;

if (isset($_POST['stext'])) {
    $stext = $_POST['stext'];
} else {
    $stext = $_GET['stext'];
}

$stextNew = trim($stext);
$arr_stextNew = explode(' ', $stextNew);
$stextNew = implode('%', $arr_stextNew);
$stextNew = '%' . $stextNew . '%';

$sql = "SELECT * FROM sanpham WHERE ten_sp LIKE ('$stextNew') ORDER BY id_sp DESC LIMIT $perRow,$rowPerPage";
$query = mysqli_query($conn, $sql);

$totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham WHERE ten_sp LIKE ('$stextNew')"));
$totalPage = ceil($totalRow / $rowPerPage);
$list_page = '';
for ($i = 1; $i <= $totalPage; $i++) {
    if ($page == $i) {
        $list_page .= '<li class="active" ><a href="index.php?page_layout=danhsachtimkiem&stext=' . $stext . '&page=' . $i . '">' . $i . '</a></li>';
    } else {
        $list_page .= '<li><a href="index.php?page_layout=danhsachtimkiem&stext=' . $stext . '&page=' . $i . '">' . $i . '</a></li>';
    }
}
?>
<div class="container">
<div class="products">
    <h2 class="h2-bar search-bar">Kết quả tìm được với từ khóa
        <span>"<?php echo $stext; ?>"</span>
    </h2>
</br>
    <div class="row">
        <?php
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="product">
					<div class="image"><a href="index.php?page_layout=chitietsp&id_sp=<?php echo $row['id_sp']; ?>"><img width="157" height="300" src="quantri/anh/<?php echo $row['anh_sp']; ?>"></a></div>
					<div class="buttons">
						<a class="btn cart" href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a>
					</div>
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
<!-- Pagination -->
<div id="pagination" class="products">
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php
            echo $list_page;
            ?>
        </ul>
    </nav>
</div>
</div>
<!-- End Pagination -->