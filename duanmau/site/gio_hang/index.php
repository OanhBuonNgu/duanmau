<?php
require_once '../../global.php';
require_once '../../dao/pdo.php';
session_start();
error_reporting(E_ERROR | E_PARSE);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
// var_dump($_SESSION['cart']);
if (isset($_POST['addcart'])) {
    require_once '../../dao/hang_hoa.php';
    $ma_hh = $_POST['ma_hh'];
    $so_luong_mua = $_POST['so_luong_mua'];
    $ten_hh = $_POST['ten_hh'];
    $don_gia = $_POST['don_gia'];
    $hinh = $_POST['hinh'];
    $add = ['ma_hh' => $ma_hh, 'so_luong_mua' => $so_luong_mua, 'ten_hh' => $ten_hh, 'don_gia' => $don_gia, 'hinh' => $hinh];
    $ma_hh = $add['ma_hh'];
    $r =  hang_hoa_select_by_id($ma_hh);
    extract($r);
    if ($so_luong_mua > hang_hoa_ton_kho($ma_hh, $so_luong)) {
        $_SESSION['count_quantity'] = 'Nhập số nhỏ hơn';
    } else {
        unset($_SESSION['count_quantity']);
    }
    if (count($_SESSION['cart']) > 0) {
        if (array_search($ma_hh, array_column($_SESSION['cart'], 'ma_hh')) !== FALSE) {
            //nếu cái id này có nằm trong mảng session chưa
            // array_colum trả về ( giá trị của key id) mảng chứa các id tương ứng 
            // echo $id . 'đã có trong session';
            // header('location:viewcart.php');
            $sl = 0;
            foreach ($_SESSION['cart'] as $cart) {
                if ($cart['ma_hh'] != $ma_hh) {
                } else {
                    // echo "trùng";
                    // $cart['so_luong'] += $so_luong;
                    //đẩy cart số lượng vò mảng sess
                    $sl += $so_luong_mua;
                }
            }
            for ($i = 0; $i < count($_SESSION['cart']); $i++) {
                if ($_SESSION['cart'][$i]['ma_hh'] == $ma_hh) {
                    //  nếu  cart có id sp bằng $id 
                    $_SESSION['cart'][$i]['so_luong_mua'] += $sl;
                }
            }
            header('location:index.php?view_cart');
        } else {
            // echo $id . 'chưa có trong session';
            array_push($_SESSION['cart'], $add);
            header('location:index.php?view_cart');
        }
    } else {
        array_push($_SESSION['cart'], $add);
        header('location:index.php?view_cart');
    }
}
if(exist_param('view_cart')){
    $VIEW_NAME='view_cart.php';
    require_once '../layout.php';

}
extract($_REQUEST);
if (exist_param('delete_cart')) {
    if (isset($_GET['ma_hh'])) {
        $ma_hh = $_GET["ma_hh"];

        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i]['ma_hh'] == $ma_hh) {
                //nếu id muốn xoá = id sp trong session thì xoá
                //xoá mảng session cart
                unset($_SESSION['cart'][$i]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); //array_value để reset lại key mặc định 0 1
                // echo header("refresh: 0");
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        }
    }
} else if (exist_param('update_quantity')) {
    if (isset($_POST['update_quantity'])) {
        require_once '../../dao/hang_hoa.php';
        $ma_hh = $_POST['ma_hh'];
        $so_luong_mua = $_POST['so_luong_mua'];
        $r =  hang_hoa_select_by_id($ma_hh);
        extract($r);
        if ($so_luong_mua > hang_hoa_ton_kho($ma_hh, $so_luong)) {
            $_SESSION['count_quantity'] = 'Nhập số nhỏ hơn';
        } else {
            unset($_SESSION['count_quantity']);
        }
        // foreach ($_SESSION['cart'] as $cart) {
        //     if ($cart['ma_hh'] == $ma_hh) {
        //         $cart['so_luong_mua'] = $so_luong ;
        //         echo $cart['so_luong_mua'];
        //         // header('location:view_cart.php');
        //     }
        // }
        for ($i = 0; $i < count($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i]['ma_hh'] == $ma_hh) {
                $_SESSION['cart'][$i]['so_luong_mua'] = $so_luong_mua;
                header('location:index.php?view_cart');
            }
        }
    }
} else if (exist_param('delete_all')) {
    unset($_SESSION['cart']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else if (exist_param('check_out')) {
    require_once '../../dao/hoa_don.php';
    if (isset($_SESSION['cart']) && isset($_SESSION['khach_hang'])) {
        extract($_SESSION['khach_hang']);
        $sum = 0;

        foreach ($_SESSION['cart'] as $cart) {
            extract($cart);
            $sum += $don_gia * $so_luong_mua;
        }
        $tinh_trang = 'chuaxacnhan';
        $date=date('Y-m-d');
       $_SESSION['id_hoa_don']= $id_hoa_don=hoa_don_insert($id_kh,$tinh_trang,$sum,$date);

        foreach ($_SESSION['cart'] as $cart) {
            extract($cart);
            hoa_don_chi_tiet_insert($id_hoa_don,$ma_hh,$so_luong_mua,$don_gia);
        }   
        header('location:camon.php');
        unset($_SESSION['cart']);
    }else{
        unset($_SESSION['id_hoa_don']);
    }
}
