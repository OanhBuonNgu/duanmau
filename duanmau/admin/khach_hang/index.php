<?php
require_once '../../dao/pdo.php';
require_once '../../dao/loai.php'; // dao tương tác csdl (query) với loại
require_once '../../global.php';
require_once '../../dao/hang_hoa.php';
require_once '../../dao/khach_hang.php';

session_start();
if(isset($_SESSION['khach_hang'])){
    extract($_SESSION['khach_hang']);
}
extract($_REQUEST);
if (exist_param('btn_list')) {
    $items = hang_hoa_selectall();
    $VIEW_NAME = "list.php";
} else if (exist_param('btn_insert')) {
    //lấy dữ liệu từ form

    if (isset($_POST['sbm_insert'])) {
        $ma_kh = $_POST['ma_kh'];
        $mat_khau = $_POST['mat_khau'];
        $ho_ten = $_POST['ho_ten'];
        $kich_hoat = $_POST['kich_hoat'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $email = $_POST['email'];
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $hinh_anh_tmp = $_FILES['hinh_anh']['tmp_name'];
        $vai_tro = $_POST['vai_tro'];
        $dia_chi=$_POST['dia_chi'];
        $sql="SELECT * FROM khach_hang where ma_kh like '%".$ma_kh."%' ";
        $r=pdo_query($sql);
        if(count($r)>0){
            $alert = "Mã khách hàng đã tồn tại";

        }else{
            khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh_anh, $so_dien_thoai, $email,$dia_chi, $vai_tro);
            move_uploaded_file($hinh_anh_tmp, 'upload/' . $hinh_anh);
            $alert = "Thêm mới thành công";
        }
        //insert db
      
    }

    //show dữ liệu
    $items = khach_hang_selectall();
    $VIEW_NAME = "list.php";
} else if (exist_param('btn_edit')) {
    //lấy dữ liệu từ form 
    $id_kh = $_REQUEST['id_kh'];
    $khach_hang_info = khach_hang_getinfo($id_kh);
    extract($khach_hang_info);
    $VIEW_NAME = 'edit.php';

    // //showd dữ liệu
    // $items = loai_selectall();
    // $VIEW_NAME = 'list.php';
} else if (exist_param('btn_delete')) {
    $id_kh = $_REQUEST['id_kh'];
    khach_hang_delete($id_kh);
    $alert = "Xoá thành công";
    //hiển thị danh sách
    $items =khach_hang_selectall();
    $VIEW_NAME = 'list.php';
} else if (exist_param('btn_update')) {
    if (isset($_POST['sbm_update'])) {
        $id_kh = $_POST['id_kh'];
        $ma_kh = $_POST['ma_kh'];
        $mat_khau = $_POST['mat_khau'];
        $ho_ten = $_POST['ho_ten'];
        $kich_hoat = $_POST['kich_hoat'];
        $so_dien_thoai = $_POST['so_dien_thoai'];
        $email = $_POST['email'];
        $hinh_anh = $_FILES['hinh_anh']['name'];
        $hinh_anh_tmp = $_FILES['hinh_anh']['tmp_name'];
        $vai_tro = $_POST['vai_tro'];
        $dia_chi=$_POST['dia_chi'];
        khach_hang_update($id_kh,$ma_kh,$mat_khau,$ho_ten,$kich_hoat,$hinh_anh,$so_dien_thoai,$email,$dia_chi,$vai_tro);
        move_uploaded_file($hinh_anh_tmp, 'upload/' . $hinh_anh);
        $alert = "Cập nhật thành công";
    }
    //hiển thị danh sách
    $items = khach_hang_selectall();
    $VIEW_NAME = "list.php";
} else {
    $VIEW_NAME = "add.php"; //mặc định hiển thi trang thêm mới sp

}
require_once '../layout.php';
?>
<script src="../check_alert.js"></script>
