<?php
  if(is_array($tt_one)){
      extract($tt_one);
  }
?>
<body class="adminbody">
    <div id="main">
        <!-- End Sidebar -->
        <div class="content-page" style="margin-top: 0px;">

            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">


                    <div class="row">
                        <div class="col-xl-12">
                        <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Sửa tin tức</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Trang chủ</li>
                                    <li class="breadcrumb-item">Tin tức</li>
                                    <li class="breadcrumb-item active">Sửa tin tức</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="card mb-3">
                                <div class="card-body">
                            <div class="clearfix"> <?php if(isset($MESSAGE)){
                                    echo "<p style='color:red;'>$MESSAGE</p>";
                                } ?></div>

                                    <form action="index.php?act=edit-tt" method="post" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="form-group col-xl-9 col-md-8 col-sm-12">
                                                <div class="form-group">
                                                    <label>Tiêu đề</label>
                                                    <input class="form-control" name="tieude" value="<?=$tieu_de?>" type="text" >
                                                    <input class="form-control" name="id_tintuc" value="<?=$id_tintuc?>" type="hidden" >
                                                    <div><?php if(isset($err['tieu_de'])){
                                    echo "<p style='color:red; margin-top:5px'>$err[tieu_de]</p>";
                                } ?></div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nội dung</label>
                                                    <textarea rows="3" class="form-control editor"  name="nd"><?=$noi_dung?></textarea>
                                                    <div><?php if(isset($err['noi_dung'])){
                                    echo "<p style='color:red; margin-top:5px'>$err[noi_dung]</p>";
                                } ?></div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Ảnh bài viết</label><br />
                                                    <input type="file" name="anh_tt">
                                                    <img src="assets/images/tintuc/<?=$anh_tt?>" width="80px" >
                                                    <div><?php if(isset($err['anh_tt'])){
                                    echo "<p style='color:red; margin-top:5px'>$err[anh_tt]</p>";
                                } ?></div>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" name="btn-edit" class="btn btn-primary">Sửa bài viết</button>
                                                    <a href="index.php?act=news"><button type="button" class="btn btn-info">Quay lại</button></a>
                                                </div>
                                            </div>

                                            <div class="form-group col-xl-3 col-md-4 col-sm-12 border-left">
                                                <div class="form-group">
                                                    <label>Giới thiệu</label>
                                                    <textarea rows="1" class="form-control editor" name="gt"><?=$gioi_thieu?></textarea>
                                                    <div><?php if(isset($err['gioi_thieu'])){
                                    echo "<p style='color:red; margin-top:5px'>$err[gioi_thieu]</p>";
                                } ?></div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ngày đăng</label><br />
                                                    <input type="date" name="ngay_dang" class="form-control" value="<?=$ngay_dang?>">
                                                </div>


                                            </div>

                                        </div><!-- end row -->
                                    </form>

                                </div>
                                <!-- end card-body -->

                            </div>
                            <!-- end card -->

                        </div>
                        <!-- end col -->

                    </div>
                    <!-- end row -->



                </div>
                <!-- END container-fluid -->

            </div>
            <!-- END content -->

        </div>
        <!-- END content-page -->
    </div>
    <!-- END main -->
</body>

</html>