<?php
require_once '../../global.php';
require_once '../../dao/hang_hoa.php';
require_once '../../dao/loai.php';

// require_once '../../dao/binh_luan.php';
extract($_REQUEST);
//truy vấn mặt hàng theo mã
$hang_hoa=hang_hoa_select_by_id($ma_hh);
extract($hang_hoa);
$loai=loai_select_by_id($ma_loai);
extract($loai);
//tăng số lượt xem
hang_hoa_tang_so_luot_xem($ma_hh);
//hàng hoá cùng loại
$hh_cung_loai=hang_hoa_selectall_byloai($ma_loai);
//bình luận
// if(exist_param('comment')){
//     $ma_kh=;
//     $ngay_bl=date("Y-m-d");
//     binh_luan_insert($ma_kh,$ma_hh,$noi_dung,$rate,$ngay_bl);
// }
// binh_luan_list($ma_kh,$ma)
$VIEW_NAME='chi_tiet_hh_ui.php';
require_once '../layout.php';
?>