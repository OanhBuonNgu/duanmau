<?php
require_once '../../global.php';
require_once '../../dao/pdo.php';
require_once '../../dao/loai.php';
require_once '../../dao/hang_hoa.php';
require_once '../../dao/khach_hang.php';
// nếu sử dụng thanh tóan cart thì chsu ý cái require_once này
//insert hoá đơn va trả về id vừa insert
function hoa_don_insert($id_kh,$tinh_trang,$tong_tien,$ngay_dat_hang){
    $sql="INSERT INTO hoa_don(id_kh,tinh_trang,tong_tien,ngay_dat_hang) values(?,?,?,?)";
   return pdo_execute2($sql,$id_kh,$tinh_trang,$tong_tien,$ngay_dat_hang);
}
function hoa_don_chi_tiet_insert($id_hoa_don,$ma_hh,$so_luong_mua,$don_gia){
    $sql="INSERT INTO hoadonchitiet(id_hoa_don,ma_hh,so_luong_mua,don_gia) values(?,?,?,?)";
    pdo_execute($sql,$id_hoa_don,$ma_hh,$so_luong_mua,$don_gia);
}

// $date=date("Y-m-d");
// $r=hoa_don_insert(6,'daxacnhan',12000000,$date);
// hoa_don_chi_tiet_insert($r,10,12,12000000);

//select hoá đơn của 1 khách hàng
function hoa_don_one_khach_hang($id_kh){
    $sql="SELECT * FROM `hoa_don` ,`hoadonchitiet`,`hang_hoa` where hoa_don.id_hoa_don=hoadonchitiet.id_hoa_don and hang_hoa.ma_hh=hoadonchitiet.ma_hh and hoa_don.id_kh=? order by hoadonchitiet.id_hoa_don desc ";
  return  pdo_query($sql,$id_kh);
}
?>