<?php  
    $id_bl=$_GET['id_bl'];
    $sql = "SELECT * FROM blsanpham WHERE id_bl=$id_bl";
    $query = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($query);
    if(isset($_POST['submit'])){
        $binh_luan=$_POST['binh_luan'];
        $Hien_thi=$_POST['Hien_thi'];
        if(isset($id_bl) && isset($binh_luan) && isset($Hien_thi)){
            $sql="UPDATE blsanpham SET binh_luan='$binh_luan', Hien_thi=$Hien_thi WHERE id_bl=$id_bl";
            $query = mysqli_query($conn,$sql);
            header('location: quantri.php?page_layout=blsp');
        }
    }
?>
<div class="row">
    <ol class="breadcrumb">
        <li><a href="quantri.php"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li><a href="quantri.php?page_layout=blsp">Danh sách bình luận</a></li>
        <li class="active"></li>
    </ol>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa bình luận</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">Sửa bình luận</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form role="form" method="post">


                        <table data-toggle="table">
                            <thead>
                                <tr>                                
                                    <th data-sortable="true">ID</th>
                                    <th data-sortable="true">Tên</th>
                                    <th data-sortable="true">Điện thoại</th>
                                    <th data-sortable="true">Nội dung bình luận</th>
                                    <th data-sortable="true">Hiển thị</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-checkbox="true"><?php echo $row['id_bl']; ?></td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="ten" value="<?php if(isset($_POST['ten'])){echo $_POST['ten'];} else{echo $row['ten'];}?>" required="">
                                    </td>
                                    <td data-checkbox="true">
                                        <input class="form-control" type="text" name="dien_thoai" value="<?php if(isset($_POST['dien_thoai'])){echo $_POST['dien_thoai'];} else{echo $row['dien_thoai'];}?>" required="">

                                    </td>
                                    <td data-checkbox="true">
                                        <textarea class="form-control" rows="2" name="binh_luan"><?php if(isset($_POST['binh_luan'])){echo $_POST['binh_luan'];} else{echo $row['binh_luan'];}  ?></textarea>
                                    </td>
                                    <td data-checkbox="true">
                                   
                                    <input type="radio" name="Hien_thi"
                                        <?php 
                                            if($row['Hien_thi']==1)
                                            {
                                                echo 'checked';
                                            }
                                         ?>

                                     id="optionsRadios1" value=1> Cho phép                         
                                    <input type="radio" name="Hien_thi"
                                        <?php 
                                            if($row['Hien_thi']==0)
                                            {
                                                echo 'checked';
                                            }
                                         ?>
                                     id="optionsRadios2" value=0> Không
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                        <button type="submit" class="btn btn-primary" name="submit">Sửa</button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                </div>
                </form>
            </div>
        </div>
    </div><!-- /.col-->
</div><!-- /.row -->
