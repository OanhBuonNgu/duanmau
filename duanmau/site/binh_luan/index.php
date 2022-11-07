<?php
require_once '../../dao/binh_luan.php';
    if(isset($_POST['rate_submit'])){
        if(isset($_POST['rate'])){
            $rate=$_POST['rate'];
        }else{
            $rate = '';
        }
        $comment=$_POST['comment'];
        $id_kh=$_POST['id_kh'];
        $ma_hh=$_POST['ma_hh'];
        $date=date('Y-m-d');
        binh_luan_insert($comment,$id_kh,$ma_hh,$date,$rate);
        header('Location:'.$_SERVER['HTTP_REFERER']);
    }
?>