<?php
    require_once 'pdo.php';
    //select tất cả tình thành
    function tinh_thanh_select_all() {
        $sql="SELECT * FROM `tinh_thanhpho` ORDER BY `ten_tinh` ASC";
        return pdo_query($sql);
    }
    //select quận huyện theo id tỉnh
    function quan_huyen_all_id_tinh($id_tinh) {
        $sql="SELECT * FROM huyen_quan where id_tinh = ? ";
        return pdo_query($sql,$id_tinh);

    }
     //select xã phường theo id tỉnh id huyện
     function xa_phuong_all_id_huyen($id_huyen) {
        $sql="SELECT * FROM xa_phuong where id_huyen = ? ";
        return pdo_query($sql,$id_huyen);

    }

?>