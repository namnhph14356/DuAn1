<?php
require_once 'pdo.php';
function san_pham_insert($ten_sanpham, $anh_sp, $mo_ta, $id_danhmuc, $gia, $ngay_nhap, $chi_tiet_sp,$so_luot_xem){
    $sql = "INSERT INTO san_pham(ten_sanpham, anh_sp, mo_ta, id_danhmuc, gia, ngay_nhap, chi_tiet_sp, so_luot_xem) VALUES (?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ten_sanpham, $anh_sp, $mo_ta, $id_danhmuc, $gia, $ngay_nhap, $chi_tiet_sp, $so_luot_xem);
}
function san_pham_update($id_sanpham, $ten_sanpham, $anh_sp, $mo_ta, $id_danhmuc, $gia, $ngay_nhap, $chi_tiet_sp, $so_luot_xem){
    if($anh_sp!=""){
    $sql = "UPDATE san_pham SET ten_sanpham='$ten_sanpham', anh_sp='$anh_sp', mo_ta=' $mo_ta', id_danhmuc='$id_danhmuc', gia='$gia', ngay_nhap='$ngay_nhap', chi_tiet_sp='$chi_tiet_sp',so_luot_xem='$so_luot_xem' WHERE id_sanpham='$id_sanpham'";
}else{
    $sql = "UPDATE san_pham SET ten_sanpham='$ten_sanpham', mo_ta=' $mo_ta', id_danhmuc='$id_danhmuc', gia='$gia', ngay_nhap='$ngay_nhap', chi_tiet_sp='$chi_tiet_sp',so_luot_xem='$so_luot_xem' WHERE id_sanpham='$id_sanpham'";

}
    pdo_execute($sql);
}
function san_pham_delete($id_sanpham){
    $sql = "DELETE FROM san_pham WHERE id_sanpham='$id_sanpham'";
    if(is_array($id_sanpham)){
        foreach ($id_sanpham as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql);
    }
}
function san_pham_select_all(){
    $sql = "SELECT * FROM san_pham order by ngay_nhap desc limit 0,4";
    return pdo_query($sql);
}
function san_pham_select_all1(){
    $sql = "SELECT id_sanpham, ten_sanpham, anh_sp, mo_ta, danh_muc.ten_danhmuc, gia, chi_tiet_sp, so_luot_xem FROM san_pham inner join danh_muc on danh_muc.id_danhmuc=san_pham.id_danhmuc";
    return pdo_query($sql);
}
function san_pham_select_by_id($id_sanpham){
    $sql = "SELECT * FROM san_pham WHERE id_sanpham=?";
    return pdo_query_one($sql, $id_sanpham);
}
function san_pham_exist($id_sanpham){
    $sql = "SELECT count(*) FROM san_pham WHERE id_sanpham=?";
    return pdo_query_value($sql, $id_sanpham) > 0;
}
function san_pham_tang_so_luot_xem($id_sanpham){
    $sql = "UPDATE san_pham SET so_luot_xem = so_luot_xem + 1 WHERE id_sanpham=?";
    pdo_execute($sql, $id_sanpham);
}
function san_pham_select_top10(){
    $sql = "SELECT * FROM san_pham WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 4";
    return pdo_query($sql);
}

function san_pham_select_by_danh_muc($id_danhmuc){
    $sql = "SELECT * FROM san_pham WHERE id_danhmuc=?";
    return pdo_query($sql, $id_danhmuc);
}
function san_pham_select_by_danh_muc1($id_danhmuc){
    $sql = "SELECT * FROM san_pham WHERE id_danhmuc=? and so_luot_xem > 0 order by so_luot_xem DESC Limit 0,4";
    return pdo_query($sql, $id_danhmuc);
}
function san_pham_select_keyword($keywords){
    $sql = "SELECT * FROM san_pham sp "
            . " JOIN danh_muc dm ON dm.id_danhmuc=sp.id_danhmuc "
            . " WHERE ten_sanpham LIKE ? OR ten_danhmuc LIKE ? or gia LIKE ?";
    return pdo_query($sql, '%'.$keywords.'%', '%'.$keywords.'%', '%'.$keywords.'%');
}


function load_ten_dm($id_danhmuc){
    if($id_danhmuc>0){
      $sql = "SELECT * from danh_muc where id_danhmuc = $id_danhmuc";
      $sp=pdo_query_one($sql);
      extract($sp);
      return $ten_danhmuc;
    }else{
        return "";
    }
  }

  function sl_sp(){
   $sql= "SELECT COUNT(id_sanpham) sluong FROM san_pham";
   return pdo_query($sql);
  }
  function sl_sp_dm($id_danhmuc){
   $sql= "SELECT COUNT(id_sanpham) sluong FROM san_pham where id_danhmuc = '$id_danhmuc'";
   return pdo_query($sql);
  }

?>