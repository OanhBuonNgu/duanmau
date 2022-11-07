<!-- //controller trang chính -->
<?php
require_once '../../global.php';
require_once '../../dao/pdo.php';
require_once '../../dao/loai.php';
require_once '../../dao/hang_hoa.php';
require_once '../../dao/khach_hang.php';
require_once '../../admin/traffic/traffic.php';

extract($_REQUEST);//lấy yêu cầu
if(exist_param('gioi_thieu',$_REQUEST)){
    //nếu có chuổi là gioi_thieu trong thanh url thì
    $VIEW_NAME='gioi_thieu.php';
}else if(exist_param('khuyen_mai',$_REQUEST)){
    $VIEW_NAME='khuyen_mai.php';
}else if(exist_param('lien_he',$_REQUEST)){
    $VIEW_NAME='lien_he.php';
}else if(exist_param('tai_khoan')){
    header('location:tai_khoan/index.php');
}else{
    $items=hang_hoa_selectall();

    $VIEW_NAME="home.php";
}
$dsloai=loai_selectall();//lấy all ds loại hàng
require_once '../layout.php';
?>