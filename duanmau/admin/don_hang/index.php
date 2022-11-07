<?php
require_once '../../global.php';
require_once '../../dao/hang_hoa.php';
require_once '../../dao/khach_hang.php';
require_once '../../dao/loai.php';
require_once '../../dao/don_hang.php';
session_start();
if (isset($_SESSION['khach_hang'])) {
    extract($_SESSION['khach_hang']);
}
extract($_REQUEST);
if(exist_param('tong_don_hang')){
    $don_hang_all=don_hang_all();
    $VIEW_NAME="list.php";
}else if(exist_param('da_xac_nhan')){
    $don_hang_da_xac_nhan=don_hang_da_xac_nhan();
    $VIEW_NAME="don_hang_da_xac_nhan.php";
}else if(exist_param('da_giao')){
    $don_hang_da_giao=don_hang_da_giao();
   
    $VIEW_NAME="don_hang_da_giao.php";
}else if(exist_param('huy')){
    $don_hang_huy=don_hang_huy();
   
    $VIEW_NAME="don_hang_huy.php";
}else if(exist_param('xac_nhan_don_hang')){
    $id_hoa_don=$_REQUEST['id_hoa_don'];
    $xac_nhan_don_hang=xac_nhan_don_hang($id_hoa_don);
    $VIEW_NAME = 'don_hang_moi.php';

}else if(exist_param('huy_don_hang')){
    $id_hoa_don=$_REQUEST['id_hoa_don'];
    $huy_don_hang=huy_don_hang($id_hoa_don);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    $VIEW_NAME = 'don_hang_moi.php';

}else if(exist_param('giao_thanh_cong')){
    $date=date('Y-m-d');
    $id_hoa_don=$_REQUEST['id_hoa_don'];
    $bao_giao_thanh_cong_don_hang=bao_giao_thanh_cong_don_hang($id_hoa_don,$date);
    $VIEW_NAME = 'don_hang_da_xac_nhan.php';
}else if(exist_param('xoa_don_hang')){
    $id_hoa_don=$_REQUEST['id_hoa_don'];
    $xoa_don_hang_huy=xoa_don_hang_huy($id_hoa_don);
    $VIEW_NAME = 'don_hang_huy.php';
} else{
    $don_hang_moi = don_hang_moi();
    $VIEW_NAME = 'don_hang_moi.php';
}

require_once '../layout.php';
?>