<?php
//dang_ky
require_once '../../global.php';
require_once '../../dao/pdo.php';
require_once '../../dao/khach_hang.php';
if (isset($_POST['ho_ten']) && !empty($_POST['ho_ten']) && !empty($_POST['ma_kh']) && !empty($_POST['mat_khau']) && !empty($_POST['re_mat_khau']) && !empty($_POST['email'])) {
    $ho_ten = $_POST['ho_ten'];
    $ma_kh = $_POST['ma_kh'];
    $mat_khau = $_POST['mat_khau'];
    $re_mat_khau = $_POST['re_mat_khau'];
    $email = $_POST['email'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $vai_tro = 0;
    $kich_hoat = 1;
    $sql = "SELECT *FROM khach_hang where ma_kh='" . $ma_kh . "'";
    $r = pdo_query($sql);
    if (count($r) == 0) {
        if ($mat_khau == $re_mat_khau) {
            $sql = "SELECT *FROM khach_hang where email='" . $email . "'";
            $d = pdo_query($sql);
            if (count($d) == 0) {
                khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $so_dien_thoai, $email, $dia_chi, $vai_tro);
                // header('Location: ' . $_SERVER['HTTP_REFERER']); //chuyển hướng về trang lúc nảy
                echo 1;
            }else{
                echo 4;
            }
        } else {
            echo 2;
        }
    } else {
        echo 3;
    }
} else {
    echo 0;
}
