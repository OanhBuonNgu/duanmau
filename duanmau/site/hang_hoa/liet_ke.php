<?php
require_once '../../global.php';
require_once '../../dao/pdo.php';
require_once '../../dao/loai.php';
require_once '../../dao/hang_hoa.php';
extract($_REQUEST);
if(exist_param('ma_loai')){
    // $items=hang_hoa_selectall_byloai($ma_loai);
    $items=hang_hoa_pagination_loai($ma_loai);
    $loai=loai_select_by_id($ma_loai);
    $count_hh_loai=hang_hoa_pagination_loai_count($ma_loai);
    if(is_array($count_hh_loai)){
        $page=ceil($count_hh_loai[0]/4);
     }
}else if(exist_param('keyword')){
    if($keyword ==''){
        $items=0;
    }else{
    $items=hang_hoa_select_keyword($keyword);
     $count_hh_keyword=hang_hoa_count_kyw($keyword)[0];
        $page=ceil($count_hh_keyword/4);
        
    }
}else{
    $items=hang_hoa_selectall();
}
$VIEW_NAME = 'liet_ke_ui.php';
$dsloai=loai_selectall();
require_once '../layout.php';
?>