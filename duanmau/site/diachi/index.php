<?php
require_once '../../dao/select_diachi.php';
if (isset($_POST['id_tinh'])) {
    $id_tinh = $_POST['id_tinh'];
    $quan_huyen = quan_huyen_all_id_tinh($id_tinh);
    $data = '';
    foreach ($quan_huyen as $qh) { extract($qh);
    $data.='<option value="' . $id_huyen . '">' . $ten_huyen .'</option>
    ';
    }
    echo $data;

   
}
if (isset($_POST['id_huyen'])) {
    $id_huyen = $_POST['id_huyen'];
    $xa_phuong = xa_phuong_all_id_huyen($id_huyen);
    $data = '';
    $data .= '<option>Chọn Xã/Phường</option>';
    foreach ($xa_phuong as $xp) { extract($xp);
    $data.='<option value="' . $id_xa . '">' . $ten_xa .'</option>
    ';
    }
    echo $data;

   
}
  
?>