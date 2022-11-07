<?php
require_once 'pdo.php';
//truy vấn ds loại đã nhập
//mới lên trước
function loai_selectall()
{
    $sql = "SELECT * FROM loai";
    return pdo_query($sql);
}
//select by id 
function loai_select_by_id($ma_loai){
    $sql="select *from loai where ma_loai=?";
    return pdo_query_one($sql,$ma_loai);
}
//thêm mới loại
function loai_insert($ten_loai)
{
    $sql = "insert into loai(ten_loai) values(?)";
    pdo_execute($sql, $ten_loai);
}
//xoá loại
function loai_delete($ma_loai)
{
    $sql = "delete from loai where ma_loai=?";
    pdo_execute($sql, $ma_loai);
}
//lấy thông tin 1 mã loại
function loai_getinfo($ma_loai)
{
    $sql = "select * from loai where ma_loai=?";
    return pdo_query_one($sql, $ma_loai);
}
//Cập nhật loại
function loai_update($ma_loai,$ten_loai){
    $sql="update loai set ten_loai=? where ma_loai=?";
    pdo_execute($sql, $ten_loai,$ma_loai);
}
// //đếm số loại
// function loai_exist($ma_loai){
//     $sql="SELECT  count(*) from loai where ma_loai=?";
//     return pdo_query_value($sql,$ma_loai);
// }

//đếm số loại trong sản phẩm
function hang_hoa_select_loai($ma_loai){
    $sql="SELECT count(*) FROM `hang_hoa` ,`loai` WHERE hang_hoa.ma_loai =loai.ma_loai and hang_hoa.ma_loai=?";
    $r= pdo_query($sql,$ma_loai);
    foreach($r as $row){
        return  $row['count(*)'];
      }
}
//đếm đơn giá cao nhất của sp trong loại
function hang_hoa_count_gia_max_loai($ma_loai){
    $sql="SELECT MAX(don_gia) FROM `hang_hoa` ,`loai` WHERE hang_hoa.ma_loai =loai.ma_loai  and  hang_hoa.ma_loai=?";
   return pdo_query_value($sql,$ma_loai)['0'];
}
//đếm đơn giá min nhất của sp trong loại
function hang_hoa_count_gia_min_loai($ma_loai){
    $sql="SELECT MIN(don_gia) FROM `hang_hoa` ,`loai` WHERE hang_hoa.ma_loai =loai.ma_loai  and  hang_hoa.ma_loai=?";
   return pdo_query_value($sql,$ma_loai)['0'];
}
//đếm đơn giá trung bình của sp trong loại
function hang_hoa_count_gia_avg_loai($ma_loai){
    $sql="SELECT AVG(don_gia) FROM `hang_hoa` ,`loai` WHERE hang_hoa.ma_loai =loai.ma_loai  and  hang_hoa.ma_loai=?";
   return pdo_query_value($sql,$ma_loai)['0'];
}
?>