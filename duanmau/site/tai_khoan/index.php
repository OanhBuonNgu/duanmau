<?php
require_once '../../global.php';
require_once '../../dao/pdo.php';
require_once '../../dao/khach_hang.php';
extract($_REQUEST);
if(exist_param('lost_pass')){
    $VIEW_ACCOUNT='lost_pass.php';
    
}else if(exist_param('address')){
    $VIEW_ACCOUNT='address.php';

}else if(exist_param('my_order')){
    $VIEW_ACCOUNT='my_order.php';

}else{
    $VIEW_ACCOUNT='profile_form.php';

}
$VIEW_NAME='tai_khoan.php';
require_once '../layout.php';

?>