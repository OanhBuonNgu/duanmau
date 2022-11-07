<?
session_start();
error_reporting(E_ERROR | E_PARSE);
require_once '../global.php';
require_once '../../dao/pdo.php';
require_once '../../dao/loai.php';
require_once '../../dao/hang_hoa.php';
require_once '../../dao/khach_hang.php';
require_once '../../dao/binh_luan.php';
require_once '../../dao/don_hang.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="<?= $ADMIN_URL ?>/main.css">
</head>

<body>
    <div class="wrapper ">
        <div class="header">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-3">
                            <div class="header_logo">
                                <a href="<?= $ADMIN_URL ?>/trang_chinh/">
                                    <img src="<?= $CONTENT_URL ?>/img/logoadmin.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="header_nav d-flex justify-content-between align-items-center">
                                <form action="<?=$ADMIN_URL?>/hang_hoa/index.php" method="get" class="header_search">
                                    <div class="input-group">
                                        <div class="form-outline">
                                            <input type="search" name="keyword" placeholder="Nhập để tìm kiếm sản phẩm..." class="form-control" id="form1" class="form-control" />
                                        </div>
                                        <button type="submit" name="" class=" btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                                <div class="header_notify">
                                    <i class="icon_header fas fa-envelope"><span class="count_header d-flex align-items-center justify-content-center">1</span></i>
                                    <i class="icon_header fas fa-bell"><span class="count_header d-flex align-items-center justify-content-center">1</span></i>
                                </div>
                                <div class="header_user">
                                    <div class="dropdown">
                                        <div class="user d-flex align-items-center justify-content-center dropdown-toggle " id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?php if (isset($_SESSION['khach_hang'])) {
                                                extract($_SESSION['khach_hang']);
                                                require_once '../../dao/khach_hang.php';
                                               $kh= khach_hang_getinfo($id_kh);
                                                if ($hinh == '') { ?>
                                                    <div class="user_img" style="background-image: url('<?= $CONTENT_URL ?>/img/avatar.png')"></div>
                                                    <div class="user_name"><?php echo $ho_ten; ?> </div>
                                                <?php
                                                } else { ?>
                                                    <div class="user_img" style="background-image: url('<?= $ADMIN_URL ?>/khach_hang/upload/<?php echo $hinh ?>')"></div>
                                                    <div class="user_name"><?php echo $ho_ten; ?> </div>
                                            <?php
                                                }
                                            } ?>
                                        </div>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="#">Tài khoản</a>
                                            <a class="dropdown-item" href="#">Cài đặt</a>
                                            <a class="dropdown-item" href="<?= $SITE_URL ?>/trang_chinh/">Đăng xuất</a>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <nav class="menu_sidebar d-flex flex-column">
                <a class=" py-3  my-1 text-dark" href="<?= $ADMIN_URL ?>/trang_chinh/"><i class="pr-2 fas fa-tachometer-alt"></i> Trang chủ</a>
                <a class="py-3  my-1 text-dark" href="<?= $ADMIN_URL ?>/loai_hang/"><i class="pr-2 fas fa-align-justify"></i> Danh mục</a>
                <a class="py-3  my-1 text-dark" href="<?= $ADMIN_URL ?>/hang_hoa/"><i class="pr-2 fab fa-product-hunt"></i> Hàng hoá</a>
                <a class="py-3  my-1 text-dark" href="<?= $ADMIN_URL ?>/khach_hang/"><i class="pr-2 fas fa-users"></i> Khách hàng</a>
                <a class="py-3  my-1 text-dark" href="<?= $ADMIN_URL ?>/binh_luan/"><i class="pr-2 fas fa-comment"></i> Bình luận</a>
                <a class="py-3  my-1 text-dark" href="<?= $ADMIN_URL ?>/thong_ke/"><i class="pr-2 fas fa-chart-pie"></i> Thống kê</a>
                <a class="py-3  my-1 text-dark" href="<?= $ADMIN_URL ?>/don_hang/"><i class="pr-2 fas fa-book"></i> Đơn hàng <img style="width:50px" src="<?=$CONTENT_URL?>/img/new.jpg" alt=""></a>
                <a class="py-3  my-1 text-dark" href="<?= $ADMIN_URL ?>/phan_hoi/"><i class="fas fa-comment-alt"></i> Phản hồi</a>
            </nav>
        </div>

        <main class="main">
            <?php include $VIEW_NAME; ?>
        </main>
    </div>
    </div>
  

</body>



</html>
