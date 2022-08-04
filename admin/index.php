<?php
include '../global.php';
include '../dao/pdo.php';
    include '../dao/danh_muc.php';
    include '../dao/san_pham.php';
    include '../dao/khach_hang.php';
    include '../dao/binh_luan.php';
    include '../dao/tin_tuc.php';
    include '../dao/thong_ke.php';
    include '../dao/tt_donhang.php';
    include '../dao/don_hang.php';
    include '../dao/giohang.php';
     
    check_login();

    $err=[
        'ten_sanpham'=>'',
        'id_danhmuc'=>'',
        'gia'=>'',
        'chi_tiet_sp'=>'',
        'mo_ta'=>'',
        'ngay_nhap'=>'',
       'anh_sp'=>'',
       'username'=>'',
       'password'=>'',
       'ho_va_ten'=>'',
       'email'=>'',
       'sdt'=>'',
       'anh_dd'=>'',
       'anh_tt'=>'',
       'noi_dung'=>'',
       'tieu_de'=>'',
       'gioi_thieu'=>''
    ];
    include "header.php";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            //sản phẩm
            case 'sp-search':
                if(isset($_POST['search'])){
                    $keywords = $_POST['keywords'];      
                        $sp = san_pham_select_keyword($keywords);                 
                    }else{
                    $sp=san_pham_select_all1();}
                include "sanpham/sanpham.php";
                break;
            case 'sanpham':
                
                $sl_sp=sl_sp();
                $sp=san_pham_select_all1();
                include "sanpham/sanpham.php";
                break;
            case 'add-sp':
                if(isset($_POST['btn-them'])){
                    $ten_sanpham=$_POST['tensp'];
                    $anh_sp=$_FILES['anh_sp']['name'];
                    $mo_ta=$_POST['mota'];
                    $id_danhmuc=$_POST['dm'];
                    $gia=$_POST['gia'];
                    $ngay_nhap= $_POST['ngay_nhap'];
                    $chi_tiet_sp = $_POST['ct'];
                    $so_luot_xem = 0;
                    $up = "assets/images/products/";
                    $up_file = $up . basename($_FILES['anh_sp']['name']);
                    $pat = pathinfo($_FILES['anh_sp']['name'], PATHINFO_EXTENSION);
                    $alow = array('jpg','png');
                    if($_FILES['anh_sp']['name']>0){
                    if(!in_array($pat, $alow)){
                        $err['anh_sp'] ="Phải là file JPG hoặc PNG!";
                    }elseif($_FILES['anh_sp']['size']>2000000){
                        $err['anh_sp'] = "Ảnh ko quá 2MB!";
                }
            }

                    if(empty($ten_sanpham)){
                        $err['ten_sanpham'] = "Tên sản phẩm không được trống!";
                    }
                    if(empty($id_danhmuc)){
                        $err['id_danhmuc'] = "Danh mục không được trống!";
                    }
                    if(empty($gia) || ($gia<=0)){
                        $err['gia'] = "Giá sản phẩm không được trống và phải lớn hơn 0!";
                    }
                    if(empty($mo_ta)){
                        $err['mo_ta'] = "Thông số kỹ thuật không được trống!";
                    }
                    if(empty($chi_tiet_sp)){
                        $err['chi_tiet_sp'] = "Mô tả sản phẩm không được trống!";
                    }
                   
                    if(!array_filter($err)){
                        if($_FILES['anh_sp']['size']>0){
                        move_uploaded_file($_FILES['anh_sp']['tmp_name'], $up_file);
                        }
                   
                    san_pham_insert($ten_sanpham, $anh_sp, $mo_ta, $id_danhmuc, $gia, $ngay_nhap, $chi_tiet_sp,$so_luot_xem);
                    $MESSAGE="Thêm thành công";
                }
            }
            
                $dm=danh_muc_select_all();
                include "sanpham/add-sp.php";
                break;
                case 'xoa_sp':
                    if (isset($_GET['id_sanpham'])) {
                        $id_sp = $_GET['id_sanpham'];
                        san_pham_delete($id_sp);
                        $MESSAGE="Xóa thành công";
                    }
                    $sp = san_pham_select_all1();
                    include "sanpham/sanpham.php";
                    break;
                    case 'suasp':
                        if (isset($_GET['id_sanpham'])) {
                            $id_sanpham = $_GET['id_sanpham'];
                            $sp=san_pham_select_by_id($id_sanpham);
                        }
                        $dm = danh_muc_select_all();
                        include "sanpham/edit-sp.php";
                        break;
            case 'edit-sp':
                if(isset($_POST['btn-edit'])){
                    $ten_sanpham=$_POST['tensp'];
                    $anh_sp=$_FILES['anh_sp']['name'];
                    $mo_ta=$_POST['mota'];
                    $id_danhmuc=$_POST['dm'];
                    $gia=$_POST['gia'];
                    $ngay_nhap= $_POST['ngay_nhap'];
                    $chi_tiet_sp = $_POST['ct'];
                    $so_luot_xem = $_POST['so_luot_xem'];
                    $id_sanpham = $_POST['id_sp'];
                    $up = "assets/images/products/";
                    $up_file = $up . basename($_FILES['anh_sp']['name']);
                    $pat = pathinfo($_FILES['anh_sp']['name'], PATHINFO_EXTENSION);
                    $alow = array('jpg','png');
                    if($_FILES['anh_sp']['name']>0){
                        if(!in_array($pat, $alow)){
                            $err['anh_sp'] ="Phải là file JPG hoặc PNG!";
                        }elseif($_FILES['anh_sp']['size']>2000000){
                            $err['anh_sp'] = "Ảnh ko quá 2MB!";
                    }
                }
    
                        if(empty($ten_sanpham)){
                            $err['ten_sanpham'] = "Tên sản phẩm không được trống!";
                        }
                        if(empty($id_danhmuc)){
                            $err['id_danhmuc'] = "Danh mục không được trống!";
                        }
                        if(empty($gia) || ($gia<=0)){
                            $err['gia'] = "Giá sản phẩm không được trống và phải lớn hơn 0!";
                        }
                        if(empty($mo_ta)){
                            $err['mo_ta'] = "Thông số kỹ thuật không được trống!";
                        }
                        if(empty($chi_tiet_sp)){
                            $err['chi_tiet_sp'] = "Mô tả sản phẩm không được trống!";
                        }

                        if(!array_filter($err)){
                            if($_FILES['anh_sp']['size']>0){
                            move_uploaded_file($_FILES['anh_sp']['tmp_name'], $up_file);
                            }

                    san_pham_update($id_sanpham, $ten_sanpham, $anh_sp, $mo_ta, $id_danhmuc, $gia, $ngay_nhap, $chi_tiet_sp,$so_luot_xem);
                    $MESSAGE="Cập nhật thành công";
                }
            }
                
                $dm=danh_muc_select_all();
                include "sanpham/edit-sp.php";
                break;
                //end sp

                //danh mục
            case 'categori':
                if(isset($_POST['btn-them'])){
                    $ten_danhmuc = $_POST['ten'];
                    if(empty($ten_danhmuc)){
                        $MESSAGE = "Tên danh mục không được trống!";
                    }else{
                    danh_muc_insert($ten_danhmuc);
                    $MESSAGE="Thêm thành công";
                    }
                }else
                if (isset($_POST['btn-capnhat'])) {
                    $ten_danhmuc = $_POST['ten'];
                    $id_danhmuc = $_POST['id_danhmuc'];
                    if(empty($ten_danhmuc)){
                        $MESSAGE = "Tên danh mục không được trống!";
                    }else{
                    danh_muc_update($id_danhmuc,$ten_danhmuc);
                    $MESSAGE="Cập nhật thành công";
                    }
                }
               $dm=danh_muc_select_all_count();
                include "danhmuc/categori.php";
                break;
                case 'xoalo':
                    if (isset($_GET['id_danhmuc'])) {
                        $id_danhmuc = $_GET['id_danhmuc'];
                        danh_muc_delete($id_danhmuc);
                        $MESSAGE="Xóa thành công";
                    }
                    $dm = danh_muc_select_all_count();
                    include "danhmuc/categori.php";
                    break;
                    //end danh mục

                    //khách hàng
                    case 'kh-search':
                        if(isset($_POST['search'])){
                            $keywords = $_POST['keywords'];      
                                $kh_show = khach_hang_select_keyword($keywords);                 
                            }else{
                                $kh_show=khach_hang_select_all();}
                        include "khachhang/user.php";
                        break;
            case 'user':
                if(isset($_POST['btn-them'])){
                $username =$_POST['username'];
                $password = $_POST['pass'];
                $ho_va_ten = $_POST['hoten'];
                $email = $_POST['email'];
                $sdt = $_POST['sdt'];
                $anh_dd = $_FILES['anh_dd']['name'];
                $vai_tro = $_POST['vai_tro'];
                $up_file = "assets/images/avatars/";
                $up = $up_file . basename($_FILES['anh_dd']['name']);
                $user = khach_hang_exist1($username);

                $pat = pathinfo($_FILES['anh_dd']['name'], PATHINFO_EXTENSION);
                $alow = array('jpg','png');
                if($_FILES['anh_dd']['name']>0){
                    if(!in_array($pat, $alow)){
                        $err['anh_dd'] ="Phải là file JPG hoặc PNG!";
                    }elseif($_FILES['anh_dd']['size']>2000000){
                        $err['anh_dd'] = "Ảnh ko quá 2MB!";
                }
            }

                if(empty($username)){
                    $err['username'] = "Tên đăng nhập không được trống!";
                }
                if($user){
                    $err['username'] = "Tên đăng nhập đã tồn tại!";
                  }
                if(empty($password)){
                    $err['password'] = "Password không được trống!";
                }
                if(strlen($password)<5){
                    $err['password'] = "Password phải hơn 5 ký tự!";
                }
                if(empty($ho_va_ten)){
                    $err['ho_va_ten'] = "Tên không được trống!";
                }
               

                if(!array_filter($err)){

                if($_FILES['anh_dd']['size']>0){
                    move_uploaded_file($_FILES['anh_dd']['tmp_name'], $up);
                }
                khach_hang_insert($username, $password, $ho_va_ten, $email, $sdt, $anh_dd, $vai_tro);
                $MESSAGE = "Thêm thành công!";
                }
            }

                if(isset($_POST['btn-edit'])){
                    $username =$_POST['username'];
                    $password = $_POST['pass'];
                    $ho_va_ten = $_POST['hoten'];
                    $email = $_POST['email'];
                    $id_khachhang = $_POST['id_kh'];
                    $sdt = $_POST['sdt'];
                    $anh_dd = $_FILES['anh_dd']['name'];
                    $vai_tro = $_POST['vai_tro'];
                    $up_file = "assets/images/avatars/";
                    $up = $up_file . basename($_FILES['anh_dd']['name']);
                   
                    $pat = pathinfo($_FILES['anh_dd']['name'], PATHINFO_EXTENSION);
                    $alow = array('jpg','png');
                    if($_FILES['anh_dd']['name']>0){
                        if(!in_array($pat, $alow)){
                            $err['anh_dd'] ="Phải là file JPG hoặc PNG!";
                        }elseif($_FILES['anh_dd']['size']>2000000){
                            $err['anh_dd'] = "Ảnh ko quá 2MB!";
                    }
                }
    
                    if(empty($username)){
                        $err['username'] = "Tên đăng nhập không được trống!";
                    }
                    if(empty($password)){
                        $err['password'] = "Password không được trống!";
                    }
                    if(strlen($password)<5){
                        $err['password'] = "Password phải hơn 5 ký tự!";
                    }
                    if(empty($ho_va_ten)){
                        $err['ho_va_ten'] = "Tên không được trống!";
                    }

                    if(!array_filter($err)){

                        if($_FILES['anh_dd']['size']>0){
                            move_uploaded_file($_FILES['anh_dd']['tmp_name'], $up);
                        }
                        khach_hang_update($id_khachhang, $username, $password, $ho_va_ten, $email, $sdt, $anh_dd, $vai_tro);
                        $MESSAGE = "Cập nhật thành công!";
                    }
                }
                $kh_show=khach_hang_select_all();
                include "khachhang/user.php";
                break;
                case 'xoakh':
                    if (isset($_GET['id_khachhang'])) {
                        $id_khachhang = $_GET['id_khachhang'];
                        khach_hang_delete($id_khachhang);
                        $MESSAGE = "Xóa thành công!";
                    }
                    $kh_show = khach_hang_select_all();
                    include "khachhang/user.php";
                    break;
                    //end khách hàng

                    //tin tức
                    case 'tt-search':
                        if(isset($_POST['search'])){
                            $keywords = $_POST['keywords'];      
                                $tt_show = tin_tuc_select_keyword($keywords);                 
                            }else{
                                $tt_show = tin_tuc_select_all();}
                        include "tintuc/tintuc.php";
                        break;
            case 'news':
                $tt_show = tin_tuc_select_all();
                include "tintuc/tintuc.php";
                break;
            case 'add-tt':
                if(isset($_POST['btn-them'])){
                $tieu_de = $_POST['tieude'];
                $gioi_thieu = $_POST['gt'];
                $noi_dung = $_POST['nd'];
                $ngay_dang = $_POST['ngay_dang'];
                $anh_tt = $_FILES['anh_tt']['name'];
                $up = "assets/images/tintuc/";
                $up_file= $up. basename($_FILES['anh_tt']['name']);

                
                $pat = pathinfo($_FILES['anh_tt']['name'], PATHINFO_EXTENSION);
                $alow = array('jpg','png');
                if($_FILES['anh_tt']['name']>0){
                    if(!in_array($pat, $alow)){
                        $err['anh_tt'] ="Phải là file JPG hoặc PNG!";
                    }elseif($_FILES['anh_tt']['size']>2000000){
                        $err['anh_tt'] = "Ảnh ko quá 2MB!";
                }
            }

                if(empty($tieu_de)){
                    $err['tieu_de'] = "Tiêu đề không được trống!";
                }
                if(empty($gioi_thieu)){
                    $err['gioi_thieu'] = "Giới thiệu không được trống!";
                }
                if(empty($noi_dung)){
                    $err['noi_dung'] = "Nội dung không được trống!";
                }

                if(!array_filter($err)){
                if($_FILES['anh_tt']['size']>0){
                    move_uploaded_file($_FILES['anh_tt']['tmp_name'],$up_file);
                }
                tin_tuc_insert($tieu_de, $gioi_thieu, $noi_dung, $ngay_dang, $anh_tt);
                $MESSAGE= "Thêm thành công!";
             
                }
            }
                include "tintuc/add-tt.php";
                break;
                case 'xoatt':
                    if (isset($_GET['id_tintuc'])) {
                        $id_tintuc = $_GET['id_tintuc'];
                        tin_tuc_delete($id_tintuc);
                        $MESSAGE = "Xóa thành công!";
                    }
                    $tt_show = tin_tuc_select_all();
                    include "tintuc/tintuc.php";
                    break;
                    case 'suatt':
                        if (isset($_GET['id_tintuc'])) {
                            $id_tintuc = $_GET['id_tintuc'];
                            $tt_one=tin_tuc_select_by_id($id_tintuc);
                        }
                        include "tintuc/edit-tt.php";
                        break;
            case 'edit-tt':
                if(isset($_POST['btn-edit'])){
                    $tieu_de = $_POST['tieude'];
                    $id_tintuc = $_POST['id_tintuc'];
                    $gioi_thieu = $_POST['gt'];
                    $noi_dung = $_POST['nd'];
                    $ngay_dang = $_POST['ngay_dang'];
                    $anh_tt = $_FILES['anh_tt']['name'];
                    $up = "assets/images/tintuc/";
                    $up_file= $up. basename($_FILES['anh_tt']['name']);

                    $pat = pathinfo($_FILES['anh_tt']['name'], PATHINFO_EXTENSION);
                    $alow = array('jpg','png');
                    if($_FILES['anh_tt']['name']>0){
                        if(!in_array($pat, $alow)){
                            $err['anh_tt'] ="Phải là file JPG hoặc PNG!";
                        }elseif($_FILES['anh_tt']['size']>2000000){
                            $err['anh_tt'] = "Ảnh ko quá 2MB!";
                    }
                }
    
                    if(empty($tieu_de)){
                        $err['tieu_de'] = "Tiêu đề không được trống!";
                    }
                    if(empty($gioi_thieu)){
                        $err['gioi_thieu'] = "Giới thiệu không được trống!";
                    }
                    if(empty($noi_dung)){
                        $err['noi_dung'] = "Nội dung không được trống!";
                    }
                    if(!array_filter($err)){
                        if($_FILES['anh_tt']['size']>0){
                            move_uploaded_file($_FILES['anh_tt']['tmp_name'],$up_file);
                        }
                    tin_tuc_update($id_tintuc, $tieu_de, $gioi_thieu, $noi_dung, $ngay_dang, $anh_tt);
                    $MESSAGE = "Cập nhật thành công!";
                    }
                }
                    // $tt_one=tin_tuc_select_by_id($id_tintuc);
                include "tintuc/edit-tt.php";
                break;
                //end tin tức

                //bình luận
            case 'binhluan':
                $kh = khach_hang_select_all();
                $bl_show= thong_ke_binh_luan();
                include "binhluan/binhluan.php";
                break;
                case 'xoa_bl':
                    if(isset($_GET['id_binhluan'])){
                        $id_binhluan = $_GET['id_binhluan'];
                        binh_luan_delete($id_binhluan);
                        $MESSAGE = "Xóa thành công!";
                    }
                    $kh = khach_hang_select_all();
                     $bl_show = thong_ke_binh_luan();
                     include "binhluan/binhluan.php";
                     break;
                //end bình luận

                //đơn hàng
                case 'dh-search':
                    if(isset($_POST['search'])){
                        $keywords = $_POST['keywords'];      
                            $dh_show = don_hang_select_keyword($keywords);                 
                        } else{
                            $dh_show = don_hang_select_all();}
                    include "donhang/donhang.php";
                    break;
            case 'donhang':
                $dh_show = don_hang_select_all();
                include "donhang/donhang.php";
                break;
            case 'add-dh':
                if(isset($_POST['btn-them'])){
                $ten_nguoinhan = $_POST['ten_nn'];
                $id_khachhang = $_POST['id_kh'];
                $dc_giaohang = $_POST['dc_gh'];
                $sdt_nhanhang = $_POST['sdt_nh'];
                $tongtien = $_POST['tongtien'];
                $ngay_mua = $_POST['ngay_mua'];
                $ghi_chu = $_POST['ghichu'];
                $id_tt = $_POST['id_tt'];
                
                don_hang_insert($id_khachhang, $ten_nguoinhan, $dc_giaohang, $sdt_nhanhang, $tongtien, $ngay_mua, $ghi_chu, $id_tt);
                }
                $tt = select_tt_donhang();
                $kh = khach_hang_select_all();
                include "donhang/add-dh.php";
                break;
                case 'xoa-dh':
                   if(isset($_GET['id_donhang'])){
                       $id_donhang = $_GET['id_donhang'];
                       don_hang_delete($id_donhang);
                   }
                    $dh_show = don_hang_select_all();
                    include "donhang/donhang.php";
                    break;
                    case 'suadh':
                        if (isset($_GET['id_donhang'])) {
                            $id_donhang = $_GET['id_donhang'];
                            $dh_one= don_hang_select_by_id($id_donhang);
                        }
                        $tt = select_tt_donhang();
                        include "donhang/sua-dh.php";
                        break;
            case 'sua-dh':
                if(isset($_POST['btn-edit'])){
                    $ten_nguoinhan = $_POST['ten_nn'];
                    $id_donhang = $_POST['id_dh'];
                    $id_khachhang = $_POST['id_kh'];
                    $dc_giaohang = $_POST['dc_gh'];
                    $sdt_nhanhang = $_POST['sdt_nh'];
                    $tongtien = $_POST['tongtien'];
                    $ngay_mua = $_POST['ngay_mua'];
                    $ghi_chu = $_POST['ghichu'];
                    $id_tt = $_POST['id_tt'];
                    
                    don_hang_update($id_donhang, $id_khachhang, $ten_nguoinhan, $dc_giaohang, $sdt_nhanhang, $tongtien, $ngay_mua, $ghi_chu, $id_tt);
                    $MESSAGE = "Cập nhật thành công!";   
                }
                    // $tt = select_tt_donhang();
                include "donhang/sua-dh.php";
                break;
                //end đơn hàng

                //tt đơn hàng
                case 'tt_dh':
                    if(isset($_POST['btn-them'])){
                        $tt_donhang = $_POST['tt_dh'];
                        if(empty($tt_donhang)){
                            $MESSAGE = "Tên trạng thái đơn hàng không được trống!";
                        }else{
                        insert_tt_donhang($tt_donhang);
                        $MESSAGE="Thành công";
                        }
                    }
                    if(isset($_POST['btn-edit'])) {
                        $tt_donhang = $_POST['tt_dh'];
                        $id_tt = $_POST['id_tt'];
                        if(empty($tt_donhang)){
                            $MESSAGE = "Tên trạng thái đơn hàng không được trống!";
                        }else{
                        edit_tt_donhang($tt_donhang, $id_tt);
                        $MESSAGE = "Cập nhật thành công!";
                        }
                    }
                   $tt_dh=select_tt_donhang();
                    include "tt_donhang/tt_dh.php";
                    break;
                    case 'xoatt_dh':
                        if (isset($_GET['id_tt'])) {
                            $id_tt = $_GET['id_tt'];
                            tt_dh_delete($id_tt);
                            $MESSAGE = "Xóa thành công!";
                        }
                        $tt_dh = select_tt_donhang();
                        include "tt_donhang/tt_dh.php";
                        break;
                    //end tt_dh

                    //thống kê doanh thu
                    case 'doanhthu':
                        $tk_dt = thong_ke_doanh_thu_thang1();
                        include "doanhthu/doanhthu.php";
                        break;
                    
            default:
            $sl_sp=sl_sp();
            $sl_kh = sl_kh();
            $sl_dh=sl_dh();
            $sl_bl=sl_bl();
            $sl_sp_dm=thong_ke_hang_hoa();
            $doanh_thu = thong_ke_doanh_thu_thang1();
       
                include "home.php";
                break;
        }
    }else{
        $sl_sp=sl_sp();
        $sl_kh = sl_kh();
        $sl_dh=sl_dh();
        $sl_bl=sl_bl();
        $sl_sp_dm=thong_ke_hang_hoa();
        $doanh_thu = thong_ke_doanh_thu_thang1();
        include "home.php";
    }
    include "footer.php";

?>