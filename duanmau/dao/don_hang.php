<?php
require_once '../../global.php';
require_once 'pdo.php';
require_once 'hang_hoa.php';
require_once 'loai.php';
require_once 'khach_hang.php';
//truy vấn đơn hàng mới tình trang chưa xác nhận
function don_hang_moi()
{
    $sql = "SELECT * FROM hoa_don , hoadonchitiet where hoa_don.id_hoa_don=hoadonchitiet.id_hoa_don and hoa_don.tinh_trang ='chuaxacnhan'";
    return pdo_query($sql);
}
//truy vấn tất cả đơn hàng
function don_hang_all(){
    $sql="SELECT * FROM hoa_don , hoadonchitiet where hoa_don.id_hoa_don=hoadonchitiet.id_hoa_don ";
   return pdo_query($sql);
}
//truy vấn đơn hàng đã xác nhận
function don_hang_da_xac_nhan(){
    $sql = "SELECT * FROM hoa_don , hoadonchitiet where hoa_don.id_hoa_don=hoadonchitiet.id_hoa_don and hoa_don.tinh_trang ='daxacnhan'";
    return pdo_query($sql);
}
//truy vấn đơn hàng đã giao
function don_hang_da_giao(){
    $sql = "SELECT * FROM hoa_don , hoadonchitiet where hoa_don.id_hoa_don=hoadonchitiet.id_hoa_don and hoa_don.tinh_trang ='dagiao'";
    return pdo_query($sql);
}
//truy vấn đơn hàng huỷ bỏ
function don_hang_huy(){
    $sql = "SELECT * FROM hoa_don , hoadonchitiet where hoa_don.id_hoa_don=hoadonchitiet.id_hoa_don and hoa_don.tinh_trang ='huy'";
    return pdo_query($sql);
}

//xác nhận đơn hàng
function xac_nhan_don_hang($id_hoa_don){
    $sql="UPDATE hoa_don SET tinh_trang ='daxacnhan' where id_hoa_don=?";
    pdo_execute($sql,$id_hoa_don);
}
//huỷ đơn hàng
function huy_don_hang($id_hoa_don){
    $sql="UPDATE hoa_don SET tinh_trang ='huy' where id_hoa_don=?";
    pdo_execute($sql,$id_hoa_don);
}
//báo giao thành công đơn hàng
function bao_giao_thanh_cong_don_hang($id_hoa_don,$ngay_giao_hang){
    $sql="UPDATE hoa_don SET tinh_trang ='dagiao' ,ngay_giao_hang=? where id_hoa_don=?";
    pdo_execute($sql,$ngay_giao_hang,$id_hoa_don);
}
//xoá đơn hàng
function xoa_don_hang_huy($id_hoa_don){
    $sql="DELETE FROM hoa_don WHERE tinh_trang='huy' and id_hoa_don=?";
    pdo_execute($sql,$id_hoa_don);
}
?>