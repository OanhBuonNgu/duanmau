<?php
require_once '../../dao/pdo.php';
require_once '../../dao/loai.php'; // dao tương tác csdl (query) với loại
require_once '../../global.php';
require_once '../../dao/hang_hoa.php';
session_start();
if (isset($_SESSION['khach_hang'])) {
    extract($_SESSION['khach_hang']);
}
extract($_REQUEST);
if (exist_param('btn_list')) {
    $items = hang_hoa_selectall();
    $VIEW_NAME = "list.php";
} else if (exist_param('keyword')) {
    if ($keyword == '') {
        $items = 0;
    } else {
        $items = hang_hoa_select_keyword($keyword);
    }
    $VIEW_NAME = "list.php";
} else if (exist_param('btn_insert')) {
    //lấy dữ liệu từ form

    if (isset($_POST['sbm_insert'])) {
        $ten_hh = $_POST['ten_hh'];
        $don_gia = $_POST['don_gia'];
        $so_luong = $_POST['so_luong'];
        $giam_gia = $_POST['giam_gia'];
        $mo_ta = $_POST['mo_ta'];
        $dac_biet = $_POST['dac_biet'];
        $ma_loai = $_POST['ma_loai'];
        $hinh_anh_mo_ta = $_FILES['hinh_anh_mo_ta']['name'];
        $hinh_anh_mo_ta_tmp = $_FILES['hinh_anh_mo_ta']['tmp_name'];
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $hinh_anh_tmp = $_FILES['hinh_anh']['tmp_name'];
        $ngay_nhap = date('Y/m/d H:i:s');
        //insert db
        $ma_hh = hang_hoa_insert($ten_hh, $don_gia, $so_luong, $giam_gia, $hinh_anh, $ngay_nhap, $mo_ta, $dac_biet, $ma_loai);
        foreach ($_FILES['hinh_anh_mo_ta']['name'] as $name) {
            hang_hoa_insert_images($ma_hh, $name);
        }
        move_uploaded_file($hinh_anh_tmp, 'upload/' . $hinh_anh);
        foreach ($hinh_anh_mo_ta as $key => $value) {
            move_uploaded_file($hinh_anh_mo_ta_tmp[$key], 'upload/' . $value);
        }
        $alert = "Thêm mới thành công";
    }

    //show dữ liệu
    $items = hang_hoa_selectall();
    $VIEW_NAME = "list.php";
} else if (exist_param('btn_edit')) {
    //lấy dữ liệu từ form 
    $ma_hh = $_REQUEST['ma_hh'];
    $hang_hoa_info = hang_hoa_getinfo($ma_hh);
    extract($hang_hoa_info);
    $hang_hoa_images = hang_hoa_select_images($ma_hh);
    $VIEW_NAME = 'edit.php';
    $loai_hang = loai_selectall();

    // //showd dữ liệu
    // $items = loai_selectall();
    // $VIEW_NAME = 'list.php';
} else if (exist_param('btn_delete')) {
    $ma_hh = $_REQUEST['ma_hh'];
    hang_hoa_delete($ma_hh);
    $alert = "Xoá thành công";
    //hiển thị danh sách
    $items = hang_hoa_selectall();
    $VIEW_NAME = 'list.php';
} else if (exist_param('btn_update')) {
    if (isset($_POST['sbm_update'])) {
        $ma_hh = $_POST['ma_hh'];
        $ten_hh = $_POST['ten_hh'];
        $don_gia = $_POST['don_gia'];
        $so_luong = $_POST['so_luong'];
        $giam_gia = $_POST['giam_gia'];
        $mo_ta = $_POST['mo_ta'];
        $dac_biet = $_POST['dac_biet'];
        $ma_loai = $_POST['ma_loai'];
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $hinh_anh_tmp = $_FILES['hinh_anh']['tmp_name'];
        $hinh_anh_mo_ta = $_FILES['hinh_anh_mo_ta']['name'];
        $hinh_anh_mo_ta_tmp = $_FILES['hinh_anh_mo_ta']['tmp_name'];
        $ngay_nhap = date('Y/m/d H:i:s');
        $r = hang_hoa_select_by_id($ma_hh);
        // var_dump($hinh_anh_mo_ta);
        
        $img_mota=hang_hoa_select_images($ma_hh);
        // var_dump($img_mota);exit();

        if (empty($hinh_anh)) {
            $hinh_anh = $r['hinh'];
        } else {
            move_uploaded_file($hinh_anh_tmp, 'upload/' . $hinh_anh);
        }
        if (!empty($hinh_anh_mo_ta)) {
            $sql = "DELETE FROM images where ma_hh=?";
            pdo_execute($sql, $ma_hh);
            foreach ($_FILES['hinh_anh_mo_ta']['name'] as $name) {
                hang_hoa_insert_images($ma_hh, $name);
            }
            foreach ($hinh_anh_mo_ta as $key => $value) {
                move_uploaded_file($hinh_anh_mo_ta_tmp[$key], 'upload/' . $value);
            }
        }
      

        hang_hoa_update($ma_hh, $ten_hh, $don_gia, $so_luong, $giam_gia, $hinh_anh, $ngay_nhap, $mo_ta, $dac_biet, $so_luot_xem, $ma_loai);

        $alert = "Cập nhật thành công";
    }
    //hiển thị danh sách
    $items = hang_hoa_selectall();
    $VIEW_NAME = "list.php";
} else {
    $loai_hang = loai_selectall();
    $VIEW_NAME = "add.php"; //mặc định hiển thi trang thêm mới sp

}
require_once '../layout.php';
?>
<script src="../check_alert.js"></script>