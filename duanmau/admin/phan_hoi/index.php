<?php
require_once '../../global.php';
require_once '../../dao/pdo.php';
require_once '../../dao/hang_hoa.php';
require_once '../../dao/khach_hang.php';
require_once '../../dao/loai.php';
require_once '../../dao/don_hang.php';
session_start();
if (isset($_SESSION['khach_hang'])) {
    extract($_SESSION['khach_hang']);
}
    $VIEW_NAME = 'list.php';
require_once '../layout.php';
?>