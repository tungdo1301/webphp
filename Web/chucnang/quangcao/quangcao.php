<?php 
	$sql="SELECT * FROM quangcao where id_thue=3";
	$query=mysqli_query($conn,$sql);
	$listImg="";
    while ($row=mysqli_fetch_array($query)) {
        $listImg.='<img  class="col-sm-4" src="./images/'.$row['ten_anh'].'"/>';}
?>
<div class="row">
    <div class="banner">
            <?php  
			echo $listImg;
		    ?>
        <!-- <div class="col-sm-4">
            <img src="images/sub-banner2.png" />
        </div>
        <div class="col-sm-4">
            <img src="images/sub-banner3.png" />
        </div> -->
    </div>
</div>
