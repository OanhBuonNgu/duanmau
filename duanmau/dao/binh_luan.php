<?php
require_once '../../global.php';
require_once '../../dao/loai.php';
require_once '../../dao/hang_hoa.php';
require_once '../../dao/khach_hang.php';
//xoá bình luận theo mã
function binh_luan_delete_ma_bl($ma_bl){
    $sql="DELETE FROM binh_luan where ma_bl=?";
    pdo_execute($sql,$ma_bl);
}
//đếm rate >0 sao trong bình luận
function binh_luan_count_rate_hh($ma_hh)
{
    $sql = "SELECT count(*) FROM binh_luan ,hang_hoa WHERE binh_luan.ma_hh=hang_hoa.ma_hh and hang_hoa.ma_hh=? and rate>0";
    return pdo_query_value($sql, $ma_hh)['0'];
}
//đếm bình luận rate =0 NULL
function binh_luan_count_comment_hh($ma_hh)
{
    $sql = "SELECT count(*) FROM binh_luan ,hang_hoa WHERE binh_luan.ma_hh=hang_hoa.ma_hh and hang_hoa.ma_hh=? and rate<1";
    return pdo_query_value($sql, $ma_hh)['0'];
}
//truy vấn tất cả bình luận và rate
function binh_luan_selectall()
{
    $sql = "SELECT * FROM binh_luan ";
    return pdo_query($sql);
}
//truy vấn giói hạn 10 bình luận và rate
function binh_luan_select10_by_ma_hh($ma_hh)
{
    $sql = "SELECT * FROM binh_luan  where ma_hh=? order by ma_bl desc limit 10 ";
    return pdo_query($sql, $ma_hh);
}
//chèn bình luận
function binh_luan_insert($noi_dung, $id_kh, $ma_hh, $ngay_bl, $rate)
{
    $sql = "INSERT INTO binh_luan(noi_dung,id_kh,ma_hh,ngay_bl,rate) values(?,?,?,?,?)";
    pdo_execute($sql, $noi_dung, $id_kh, $ma_hh, $ngay_bl, $rate);
}
//liệt kê bình luận theo hàng hoá
function binh_luan_select_all_ma_hh($ma_hh)
{
    $sql = "SELECT * FROM `binh_luan`,`hang_hoa`,`khach_hang` WHERE binh_luan.ma_hh=hang_hoa.ma_hh and khach_hang.id_kh=binh_luan.id_kh  and hang_hoa.ma_hh=? ";
    return pdo_query($sql,$ma_hh);
}
//liệt kê bình luận theo hàng hoá bình luận mới nhất
function binh_luan_select_all_ma_hh_new($ma_hh)
{
    $sql = "SELECT * FROM `binh_luan`,`hang_hoa` WHERE binh_luan.ma_hh=hang_hoa.ma_hh and hang_hoa.ma_hh=? order by binh_luan.ma_bl desc";
    return pdo_query($sql,$ma_hh);
}
//liệt kê bình luận theo hàng hoá bình luận cũ nhất
function binh_luan_select_all_ma_hh_old($ma_hh)
{
    $sql = "SELECT * FROM `binh_luan`,`hang_hoa` WHERE binh_luan.ma_hh=hang_hoa.ma_hh and hang_hoa.ma_hh=? order by binh_luan.ma_bl asc";
    return pdo_query($sql,$ma_hh);
}
//select danh sách hàng hoá có bình luận
function hang_hoa_select_all_exist_bl(){
    $sql="SELECT * FROM `hang_hoa`,`binh_luan` WHERE hang_hoa.ma_hh =binh_luan.ma_hh group by hang_hoa.ma_hh";
    return pdo_query($sql);
}

//liệt kê 3 bình luận mới nhất
function binh_luan_newhot3(){
    $sql="SELECT * FROM `binh_luan`,`hang_hoa`,`khach_hang` WHERE binh_luan.ma_hh=hang_hoa.ma_hh and khach_hang.id_kh=binh_luan.id_kh  ORDER by binh_luan.ma_bl desc limit 3";
    return pdo_query($sql);
}
?>