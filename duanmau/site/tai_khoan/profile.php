<?php
session_start();
require_once '../../global.php';
require_once '../../dao/pdo.php';
require_once '../../dao/khach_hang.php';
if (isset($_POST['update_profile'])) {
    $id_kh = $_POST['id_kh'];
    $ho_ten_up = $_POST['ho_ten'];
    $so_dien_thoai_up = $_POST['so_dien_thoai'];
    $email_up = $_POST['email'];
    $mat_khau_cu = $_POST['mat_khau'];
    $mat_khau_moi = $_POST['mat_khau_moi'];
    $re_mat_khau_moi = $_POST['re_mat_khau_moi'];
    if (isset($_SESSION['khach_hang'])) {
        extract($_SESSION['khach_hang']);
    }
    if (isset($_POST['hidden_changePass'])) {
        $hidden_changePass = $_POST['hidden_changePass'];
        if ($_SESSION['khach_hang']['mat_khau'] == $mat_khau_cu) {
            if ($mat_khau_moi == $re_mat_khau_moi && $mat_khau_moi != '') {
                khach_hang_update($id_kh, $ma_kh, $mat_khau_moi, $ho_ten_up, $kich_hoat, $hinh, $so_dien_thoai_up, $email_up,$dia_chi, $vai_tro);
            } else {
                $error = "Mật khẩu nhập phải giống nhau";
                $_SESSION["error"] = $error;
                header('Location: ' . $_SERVER['HTTP_REFERER']); //chuyển hướng về trang lúc nảy
            }
        } else {
            $error="Vui lòng nhập mật khẩu củ";
            $_SESSION["error"] = $error;
            header('Location: ' . $_SERVER['HTTP_REFERER']); //chuyển hướng về trang lúc nảy

        }
    } else {
        $hidden_changePass = '';
        khach_hang_update($id_kh, $ma_kh, $mat_khau, $ho_ten_up, $kich_hoat, $hinh, $so_dien_thoai_up, $email_up,$dia_chi, $vai_tro);
        header('Location: ' . $_SERVER['HTTP_REFERER']); //chuyển hướng về trang lúc nảy
    }
}
?>