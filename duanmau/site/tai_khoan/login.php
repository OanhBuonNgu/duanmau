<?php
//su ly dang nhap
session_start();
require_once '../../dao/pdo.php';
if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "select * from khach_hang where ma_kh='" . $username . "' and mat_khau='" . $password . "'";
    $r = pdo_query($sql);
    if (count($r) > 0) {
        $_SESSION['khach_hang'] = $r[0];
        // echo json_encode(array(
        //     'status' => 1,
        //     'message' => 'Đăng nhập thành công'
        // ));
        echo "Đăng nhập thành công";
    } else {
        // echo json_encode(array(
        //     'status' => 0,
        //     'message' => 'Thông tin đăng nhập không chính xác'
        // ));
        echo "Thông tin đăng nhập không chính xác";

    }
// } else {
//     // echo json_encode(array(
//     //     'status' => 0,
//     //     'message' => 'Thông tin đăng nhập không chính xác'
//     // ));
//     echo "Thông tin đăng nhập không chính xác";

}
?>