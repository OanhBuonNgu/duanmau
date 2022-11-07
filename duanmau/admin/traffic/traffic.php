<?php
$count_ip_file = '../../admin/traffic/count_ip.txt';
$count_not_ip_file = '../../admin/traffic/count_not_ip.txt';
$ip_file = '../../admin/traffic/ip.txt';
//lấy danh sách nội dung trong file ip.txt và gán vào 1 mảng 
function test()
{
    global $ip_file;
    $a = file($ip_file, FILE_IGNORE_NEW_LINES);
    print_r($a);
}
function count_traffic()
{
    $ip = $_SERVER['REMOTE_ADDR']; //lấy địa chỉ ip 
    global $ip_file, $count_ip_file, $count_not_ip_file;
    //ko trùng thì đếm số người truy cập theo 1 địa chỉ ip
    if (!in_array($ip, file($ip_file, FILE_IGNORE_NEW_LINES))) { //nếu ip ko thuộc trong  mảng file ip.txt
        $current_value = (file_exists($count_ip_file)) ? file_get_contents($count_ip_file) : 0;
        //nếu mà  có file count file.txt thì lấy nội dung của nó 
        //ngược lại nếu chưa có file count file.txt thì gán cho biến là 0 
        file_put_contents($ip_file, $ip . "\n", FILE_APPEND); //lấy ip gán vào file txt
        //\n cho nó xuống dòng  FILE_APPEND thêm 1 dòng mới
        file_put_contents($count_ip_file, ++$current_value);
        //vào file count tăng thêm 1

    } else { //nếu lặp ip thì đếm số lượt truy cập
        $current_value = (file_exists($count_not_ip_file)) ? file_get_contents($count_not_ip_file) : 1;
        file_put_contents($ip_file, $ip . "\n", FILE_APPEND); //lấy ip gán vào file txt
        file_put_contents($count_not_ip_file, ++$current_value);
    }
}
//đếm khách (ip) đang online

count_traffic();


?>