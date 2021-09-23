<script>
	function searchFocus() {
		if (document.sform.stext.value == 'Tìm kiếm sản phẩm...') {
			document.sform.stext.value = '';
		}
	}

	function searchBlur() {
		if (document.sform.stext.value == '') {
			document.sform.stext.value = 'Tìm kiếm sản phẩm...';
		}
	}
</script>

<!-- search -->
<div id="search" class="col-md-4">
	<form class="form-search" method="post" name="sform" action="index.php?page_layout=danhsachtimkiem">
		<input type="text" class="input- search-query" onfocus="searchFocus();" onblur="searchBlur();" type="text" name="stext" value="Tìm kiếm sản phẩm...">
		<button type="submit" name="submit" value="" class="btn"><span class="glyphicon glyphicon-search"></span></button>
	</form>
</div>

<!-- end search -->