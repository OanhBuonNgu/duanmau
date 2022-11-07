
<?php
require_once '../../global.php';
require_once '../../dao/hang_hoa.php';
require_once '../../dao/khach_hang.php';
require_once '../../dao/loai.php';
require_once '../../dao/don_hang.php';
require_once '../../dao/binh_luan.php';
session_start();
if (isset($_SESSION['khach_hang'])) {
    extract($_SESSION['khach_hang']);
}
extract($_REQUEST);
if (exist_param('chi_tiet_bl')) {
    $VIEW_NAME = "chi_tiet.php";
}else if(exist_param('delete_bl')){
    $ma_bl=$_GET["ma_bl"];
    binh_luan_delete_ma_bl($ma_bl);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    $VIEW_NAME = 'list.php';
}
?>

<?php require_once '../layout.php'; ?>