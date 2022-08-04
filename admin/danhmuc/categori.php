<body class="adminbody">

    <div id="main">

        <div id="main">
            <div class="content-page">

                <!-- Start content -->
                <div class="content">

                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-xl-12">
                                <div class="breadcrumb-holder">
                                    <h1 class="main-title float-left">Danh mục</h1>
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item">Trang chủ</li>
                                        <li class="breadcrumb-item active">Danh mục</li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                                <div class="card mb-3">

                                    <div class="card-header">
                                        <span class="pull-right"><button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_add_category"><i class="fa fa-plus" aria-hidden="true"></i> Thêm danh mục</button></span>
                                        <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" id="modal_add_category">
                                            <div class="modal-dialog">
                                                <div class="modal-content">

                                                    <form action="index.php?act=categori" method="post">


                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Thêm danh mục</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label>Tên danh mục</label>
                                                                        <input class="form-control" name="ten" type="text">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php if (isset($MESSAGE)) {
                                            echo "<p style='color:red;'>$MESSAGE</p>";
                                        } ?>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="submit" name="btn-them" class="btn btn-primary">Thêm danh mục</button>
                                                        </div>

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <h3><i class="fa fa-sitemap"></i> Danh mục</h3>
                                    </div>
                                    <!-- end card-header -->

                                    <div class="card-body">
                                        <?php if (isset($MESSAGE)) {
                                            echo "<p style='color:red;'>$MESSAGE</p>";
                                        } ?>


                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Danh mục</th>
                                                    
                                                    <th style="width:120px">Chức năng</th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($dm as $lo) {
                                                extract($lo);
                                            ?>
                                                <tbody>

                                                    <tr>

                                                        <td>
                                                            <strong><?= $ten_danhmuc ?></strong><br />
                                                        </td>

                                                       

                                                        <td>
                                                            <a href="index.php?act=categori&id_danhmuc=<?= $id_danhmuc ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#categori<?= $id_danhmuc ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <div class="modal fade custom-modal" tabindex="-1" role="dialog" aria-hidden="true" id="categori<?= $id_danhmuc ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">

                                                                        <form action="index.php?act=categori" method="post">


                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Sửa danh mục</h5>
                                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Đóng</span></button>
                                                                            </div>

                                                                            <div class="modal-body">

                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label>Tên danh mục</label>
                                                                                            <input class="form-control" name="ten" type="text" value="<?= $ten_danhmuc ?>" />
                                                                                            <input class="form-control" name="id_danhmuc" type="hidden" value="<?= $id_danhmuc ?>" />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                <button type="submit" name="btn-capnhat" class="btn btn-primary">Sửa danh mục</button>
                                                                            </div>

                                                                        </form>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <a href="javascript:deleteRecord_10('10');" class="btn btn-danger btn-sm" data-placement="top" data-toggle="tooltip" data-title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        <script>
                                                            function deleteRecord_10(RecordId) {
                                                                if (confirm('Confirm delete')) {
                                                                    window.location.href = '#';
                                                                }
                                                            }
                                                        </script> -->
                                                            <a onclick="return confirm('Bạn có chắc muốn xoá')" href="index.php?act=xoalo&id_danhmuc=<?= $id_danhmuc ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            <?php
                                            } ?>
                                        </table>

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