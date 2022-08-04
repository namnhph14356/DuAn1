
<body class="adminbody">
    <div id="main">
        <div class="content-page">
            <!-- Start content -->
            <div class="content">

                <div class="container-fluid">


                    <div class="row">
                        <div class="col-xl-12">
                            <div class="breadcrumb-holder">
                                <h1 class="main-title float-left">Sản phẩm</h1>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item">Trang chủ</li>
                                    <li class="breadcrumb-item active">Sản phẩm</li>
                                </ol>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="card mb-3">

                                <div class="card-header">
                                    <span class="pull-right"><a href="index.php?act=add-sp" class="btn btn-primary btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Thêm sản phẩm</a></span>
                                    <h3><i class="fa fa-file-text-o"></i> Tất cả sản phẩm </h3>
                                </div>
                                <div>
                                <form action="index.php?act=sp-search" method="POST">
          <div class="input-group rounded" id="input">

          

            <input type="search" class="form-control rounded" id="search" name="keywords" placeholder="Tìm kiếm sản phẩm" aria-label="Search" aria-describedby="search-addon" />
            <!-- <input type="search" class="form-control rounded" id="search" name="id_danhmuc" placeholder="Tìm kiếm sản phẩm"
              aria-label="Search" aria-describedby="search-addon" /> -->
    <button type="submit" name="search" >Tìm</button>
            </form>
                                </div>
                                <!-- end card-header -->

                                <div class="card-body">
                                <div class="clearfix"> <?php if(isset($MESSAGE)){
                                    echo "<p style='color:red;'>$MESSAGE</p>";
                                } ?></div>

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Ảnh sp</th>
                                                    <th>Giá sp</th>
                                                    <th>Mô tả</th>
                                                    <td>Số lượt xem</td>
                                                    <th style="width:140px">Danh mục</th>
                                                    <th style="width:150px">Chức năng</th>
                                                </tr>
                                            </thead>
                                    <?php foreach($sp as $sp){
                                        extract($sp);
                                        $suasp = "index.php?act=suasp&id_sanpham=".$id_sanpham."";
                                        $xoasp = "index.php?act=xoa_sp&id_sanpham=".$id_sanpham."";
                                        $anhpath = "../../content/img".$anh_sp;
                                        if(is_file($anhpath)){
                                          $anh = '<img src="'.$anhpath.'" width="80">';
                                        }else{
                                          $anh = "No picture";
                                        }

                                    ?>
                                            <tbody>

                                                <tr>
                                                    <td>
                                                        
                                                        <h5><?=$ten_sanpham?></h5>
                                                        
                                                    </td>
                                                    <td>
                                                        <span style="float: left; margin-right:10px; padding-left: 22px;"><img alt="anh" width="80px" src="assets/images/products/<?=$anh_sp?>" ></span>
                                                      
                                                    </td>
                                                    <td>
                                                       <h5><?=number_format($gia,0,'',".")?> VNĐ</h5>
                                                    
                                                    </td>
                                                    <td>
                                                       <h5><?=$mo_ta?></h5>
                                                    
                                                    </td>
                                                    <td>
                                                        <?=$so_luot_xem?>
                                                    </td>

                                                    <td><?=$ten_danhmuc?></td>

                                                    <td>
                                                        <a href="<?=$suasp?>" class="btn btn-primary btn-sm" data-placement="top" data-toggle="tooltip" data-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <a  onclick="return confirm('Bạn có chắc muốn xoá')" href="<?=$xoasp?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        <!-- <a href="javascript:deleteRecord_9('9');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a> -->
                                                       
                                                    </td>
                                                </tr>
                                                
                                                
                                            </tbody>
                                            <?php
                                            } 
                                            ?>
                                        </table>
                                    </div>


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