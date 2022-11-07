<?php
require_once '../../dao/pdo.php';
if(isset($_POST['tenkh']) && !empty($_POST['tenkh']) && !empty($_POST['emailkh'])){
    $tenkh=$_POST['tenkh'];
    $emailkh=$_POST['emailkh'];
    $noidung=$_POST['noidung'];
    
    $sql="INSERT INTO `contact`( `hoten`, `email`, `noidung`) VALUES (?,?,?)";
    pdo_execute($sql,$tenkh,$emailkh,$noidung);
    echo 'ok';
}
?>