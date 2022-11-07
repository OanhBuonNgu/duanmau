<?php
require_once '../../dao/pdo.php';
require_once '../../dao/loai.php'; // dao tương tác csdl (query) với loại
require_once '../../global.php';
session_start();
if (isset($_SESSION['khach_hang'])) {
    extract($_SESSION['khach_hang']);
}
extract($_REQUEST);
if (exist_param('btn_list')) {
    $items = loai_selectall();
    $VIEW_NAME = "list.php";
} else if (exist_param('btn_insert')) {
    //lấy dữ liệu từ form

    if (isset($_POST['sbm_insert'])) {
        $ten_loai = $_POST['ten_loai'];
        $sql = "SELECT *FROM loai where ten_loai like '%" . $ten_loai . "%'";
        $r = pdo_query($sql);
        if (count($r) > 0) {
            $alert = "Tên loại đã tồn tại";
        }else{
            loai_insert($ten_loai);
            $alert = "Thêm mới thành công";
        }
        //insert db
      
    }

    //show dữ liệu
    $items = loai_selectall();
    $VIEW_NAME = "list.php";
} else if (exist_param('btn_edit')) {
    //lấy dữ liệu từ form 
    $ma_loai = $_REQUEST['ma_loai'];
    $loai_info = loai_getinfo($ma_loai);
    extract($loai_info);
    $VIEW_NAME = 'edit.php';
    // //showd dữ liệu
    // $items = loai_selectall();
    // $VIEW_NAME = 'list.php';
} else if (exist_param('btn_delete')) {
    $ma_loai = $_REQUEST['ma_loai'];
    loai_delete($ma_loai);
    $alert = "Xoá thành công";
    //hiển thị danh sách
    $items = loai_selectall();
    $VIEW_NAME = 'list.php';
} else if (exist_param('btn_update')) {
    if (isset($_POST['sbm_update'])) {
        $ma_loai = $_POST['ma_loai'];
        $ten_loai = $_POST['ten_loai'];
        loai_update($ma_loai, $ten_loai);
        $alert = "Cập nhật thành công";
    }
    //hiển thị danh sách
    $items = loai_selectall();
    $VIEW_NAME = "list.php";
} else {
    $VIEW_NAME = "add.php"; //mặc định hiển thi trang thêm mới sp

}
require_once '../layout.php';
?>
<script src="../check_alert.js"></script>