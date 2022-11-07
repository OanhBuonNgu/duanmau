<?php
require_once '../../dao/khach_hang.php';
if(isset($_POST['lost_pass'])){
    $email=$_POST['nhap_email'];
   $kh= khach_hang_lost_pass($email);
   if(count($kh)>0){
    foreach($kh as $r){

    }
   }
}else{
}
//su li quen mk
?>