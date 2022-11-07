<?php
$ROOT_URL="/duanmau";
$CONTENT_URL="$ROOT_URL/content";
$ADMIN_URL="$ROOT_URL/admin";
$SITE_URL="$ROOT_URL/site";
//kiểm tra sự tồn tại 1 biến trong request
function exist_param($fieldname){
    //kiểu bool
    return array_key_exists($fieldname,$_REQUEST);
}
?>