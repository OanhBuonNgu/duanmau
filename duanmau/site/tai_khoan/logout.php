<?php
session_start();
session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']); //chuyển hướng về trang lúc nảy
//dang xuat
?>