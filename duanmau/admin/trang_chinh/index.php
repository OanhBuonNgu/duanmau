<?php
session_start();
if(isset($_SESSION['khach_hang'])){
    extract($_SESSION['khach_hang']);
}
if(!$_SESSION['khach_hang']  ) {
    header('location:../../index.php');
}else if($_SESSION['khach_hang'] && $vai_tro== 0){
    header('location:../../index.php');
}else{


require_once'../../global.php'; 
$VIEW_NAME="trang_chinh/home.php";
require_once'../layout.php';
}
?>


