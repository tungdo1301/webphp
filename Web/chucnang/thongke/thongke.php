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
<a><span class="glyphicon glyphicon-eye-open"></span>&ensp;<?php echo $count; ?></span> người đang xem</a>