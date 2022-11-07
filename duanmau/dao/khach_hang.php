<?php
require_once 'pdo.php';
//thêm mới khách hàng
function khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $so_dien_thoai, $email,$dia_chi, $vai_tro)
{
    $sql = "insert into khach_hang(ma_kh,mat_khau,ho_ten,kich_hoat,hinh,so_dien_thoai,email,dia_chi,vai_tro) values(?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $so_dien_thoai, $email,$dia_chi, $vai_tro);
}
//xoá khách hàng
function khach_hang_delete($id_kh)
{
    $sql = "delete from khach_hang where id_kh=?";
    pdo_execute($sql, $id_kh);
}
//lấy thông tin 1 khách hàng
function khach_hang_getinfo($id_kh)
{
    $sql = "select * from khach_hang where id_kh=?";
    return pdo_query_one($sql, $id_kh);
}

//Cập nhật khách hàng
function khach_hang_update($id_kh, $ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $so_dien_thoai, $email,$dia_chi, $vai_tro)
{
    $sql = "update khach_hang set ma_kh=?,mat_khau=?,ho_ten=?,kich_hoat=?,hinh=?,so_dien_thoai=?,email=?,dia_chi=?,vai_tro=?  where id_kh=?";
    pdo_execute($sql, $ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $so_dien_thoai, $email,$dia_chi, $vai_tro, $id_kh);
}
//truy vấn all khách hàng
function khach_hang_selectall()
{
    $sql = "SELECT *from khach_hang ";
    return pdo_query($sql);
}
//đổi mật khẩu
function khach_hang_doi_mat_khau($id_kh, $mat_khau)
{
    $sql = "UPDATE  khach_hang  SET mat_khau=? where id_kh=?";
    pdo_execute($sql, $mat_khau, $id_kh);
}
//quên mật khẩu
function khach_hang_lost_pass($email)
{
    $sql = "SELECT * FROM khach_hang WHERE email =?";
    return pdo_query($sql,$email);
}
?>