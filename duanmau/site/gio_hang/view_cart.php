<?php
error_reporting(E_ERROR | E_PARSE);
// var_dump($_SESSION['cart']);

?>

<div class="container">
    <main class="main ">
        <div class="cart">
            <div class="row">
                <div class="col-9 pl-0">
                    <div class="cart__inner">
                        <h4 class="cart__inner-productTitle my-3 alert alert-success">Giỏ hàng</h4>
                        <div class="cart__inner-product-heading">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                if (count($_SESSION['cart']) > 0) { ?>
                                    <div class="row">

                                        <div class="col-5">
                                            Tất cả (<?php echo count($_SESSION['cart']); ?> sản phẩm)
                                        </div>
                                        <div class="col-2">Đơn giá</div>
                                        <div class="col-2">Số lượng</div>
                                        <div class="col-2">Thành tiền</div>
                                        <div class="col-1">
                                            <div class="cart__inner-productRemove-all">
                                                <i class="fas fa-trash-alt icon-delete"></i>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else { ?>
                            <?php
                                }
                            }
                            ?>
                        </div>
                        <?php

                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                            $tong = 0;
                            foreach ($_SESSION['cart'] as $ds) {
                                extract($ds); ?>
                                <div class="cart__inner-product-items">
                                    <form action="index.php?update_quantity" method="post" class="row align-items-center">
                                        <div class="col-5">
                                            <input type="hidden" name="ma_hh" value="<?php echo $ma_hh;?>">
                                            <div class="cart__inner-product-items-imgName d-flex align-items-center">
                                                <div class="cart__inner-product-items-img">
                                                    <img src="<?= $ADMIN_URL ?>/hang_hoa/upload/<?php echo $hinh ?>" alt="">
                                                </div>
                                                <div class="cart__inner-product-items-name text-overflow">
                                                    <a href=""> <?php echo $ten_hh ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="cart__inner-product-items-price"><?php echo number_format($don_gia, 0, ',', '.') . 'đ'; ?></div>
                                        </div>
                                        <div class="col-2">
                                            <div class="cart__inner-product-items-quantity">
                                                <b style="font-size:1rem;" class="text-danger">   <?php if(isset($_SESSION['count_quantity'])) echo $_SESSION['count_quantity'];?></b>
                                                <input type="number" value="<?php echo $so_luong_mua; ?>" min="1" name="so_luong_mua" class=" quantityInput" style="width:50%;">
                                                <!-- <i class="fas fa-check-square" title="Cập nhật"></i> -->
                                                <button class="cursor-pointer btn "  type="submit" name="update_quantity"><img  title="Cập nhật" style="width:25px" src="<?=$CONTENT_URL?>/img/icon_update.png" alt=""></button>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="cart__inner-product-items-finalPrice">
                                                <?php echo number_format($don_gia * $so_luong_mua, 0, ',', '.') . 'đ'; ?>
                                            </div>
                                        </div>
                                        <div class="col-1">
                                            <div class="cart__inner-product-items-delete">
                                                <a href="<?= $SITE_URL ?>/gio_hang/index.php?delete_cart&ma_hh=<?php echo $ma_hh; ?>"><i class="fas fa-trash-alt icon-delete"></i></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <?php $tong += $don_gia * $so_luong_mua; ?>
                            <?php
                            }
                            ?>
                           
                            <div class=" text-center cart__inner-product-heading">
                                <a href="<?= $SITE_URL ?>/gio_hang/index.php?delete_all">Xoá tất cả</a>
                            </div>
                        <?php
                        } else { ?>
                            <div class="cart__inner-product-heading">
                                <h4>Chưa có sản phẩm nào trong giỏ hàng !</h4>
                            </div>

                        <?php
                        }
                        ?>

                    </div>
                </div>
                <?php
                if (isset($_SESSION['khach_hang'])) {
                    $id_kh = $_SESSION['khach_hang']['id_kh'];
                    khach_hang_getinfo($id_kh);
                }
                ?>
                <div class="col-3 pl-0">
                    <?php
                    if (isset($_SESSION['khach_hang']) && $ho_ten != '' && $so_dien_thoai != '' && $dia_chi != '') { ?>
                        <div class="cart__total-prices ">
                            <div class="cart__total-prices-shipAddress">
                                <div class="shipAddress-heading pb-2 d-flex justify-content-between">
                                    <span class="shipAddress-heading1">Giao tới</span>
                                    <span><a href="<?= $SITE_URL ?>/tai_khoan/index.php?address">Thay đổi</a></span>
                                </div>
                                <div class="shipAddress-title py-2">
                                    <b class="shipAddress-title-name"><?php echo $ho_ten; ?></b>
                                    <b class="shipAddress-title-phone"><?php echo $so_dien_thoai; ?></b>
                                </div>
                                <p class="shipAddress-addres"><?php echo $dia_chi; ?></p>
                                <i class="shipAddress-mess">( Địa chỉ giao hàng thuộc vùng giãn cách , thời gian giao hàng có thể chậm hơn dự kiến )</i>
                            </div>
                        </div>
                        <div class="cart__total-price">
                            <div class="cart__total-pay">
                                <h4 class="cart-total-pay_heading">Chọn hình thức thanh toán</h4>
                                <div class="form-check d-flex align-items-center cursor-pointer">
                                    <input class="form-check-input "  type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                                    <img class="px-2" src="<?=$CONTENT_URL?>/img/icon-payment-method-cod.svg" alt="">
                                    <label class="form-check-label" for="flexRadioDefault1">Tiền mặt
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center cursor-pointer">
                                    <input disabled class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                                    <img class="px-2" src="<?=$CONTENT_URL?>/img/icon-payment-method-atm.svg" alt="">
                                    <label class="form-check-label" for="flexRadioDefault2">Thẻ ATM
                                    </label>
                                </div>
                                <div class="form-check d-flex align-items-center cursor-pointer">
                                    <input disabled class="form-check-input " type="radio" name="flexRadioDefault" id="flexRadioDefault3" >
                                    <img class="px-2" src="<?=$CONTENT_URL?>/img/icon-payment-method-mo-mo.svg" alt="">
                                    <label class="form-check-label" for="flexRadioDefault3">Ví MOMO
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="cart__total-price">
                            <ul class="cart__total-price-items pb-5">
                                <li class="cart__total-price-item d-flex justify-content-between">
                                    <span class="cart__price-text">Tạm tính</span>
                                    <?php

                                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        foreach ($_SESSION['cart'] as $ds) {
                                            extract($ds);
                                        }
                                    ?>
                                        <span class="cart__price-value"><?php echo number_format($tong, 0, ',', '.') . 'đ'; ?></span>

                                    <?php
                                    } else {
                                    ?>
                                        <span class="cart__price-value">0đ</span>
                                    <?php
                                    }
                                    ?>
                                </li>
                                <li class="cart__total-price-item d-flex justify-content-between">
                                    <span class="cart__price-text">Giảm giá</span>
                                    <span class="cart__price-value">0đ</span>
                                </li>
                            </ul>
                            <div class="cart-price-total d-flex justify-content-between align-items-center">
                                <span class="cart__price-text">
                                    Tổng cộng
                                </span>
                                <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                                    <span class="cart__price-value">
                                        <?php echo number_format($tong, 0, ',', '.') . 'đ'; ?>
                                    </span>

                                <?php
                                } else { ?>
                                    <span class="cart__price-value">
                                        0đ
                                    </span>
                                <?php
                                }
                                ?>

                            </div>

                        </div>
                        <div class="cart__total-price-btnCheckout">
                            <?php
                            if (isset($_SESSION['cart']) && !isset($_SESSION['count_quantity']) && count($_SESSION['cart']) > 0) {
                                
                                ?>
                                <form action="index.php?check_out" method="post">

                                <button class="btn primary btnCheckout">Thanh Toán</button>
                                </form>
                            <?php
                            } else { ?>
                                <button disabled class="btn primary btnCheckout">Thanh Toán</button>
                            <?php
                            }
                            ?>
                        </div>
                    <?php
                    } else { ?>
                        <div class="cart__total-prices">
                            <div class="cart__total-prices-shipAddress">
                                <div class="shipAddress-heading">Vui lòng cập nhật địa chỉ giao hàng</div>
                                <a href="<?= $SITE_URL ?>/tai_khoan?address" class="shipAddres-btn-link font-size-primary"> <button disabled class="my-4 shipAddres-btn btn primary font-size-primary">Cập nhật</button></a>

                            </div>
                        </div>
                        <div class="cart__total-price">
                            <ul class="cart__total-price-items pb-5">
                                <li class="cart__total-price-item d-flex justify-content-between">
                                    <span class="cart__price-text">Tạm tính</span>
                                    <?php

                                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        foreach ($_SESSION['cart'] as $ds) {
                                            extract($ds);
                                        }
                                    ?>
                                        <span class="cart__price-value"><?php echo number_format($tong, 0, ',', '.') . 'đ'; ?></span>
                                    <?php
                                    } else { ?>
                                        <span class="cart__price-value">0đ</span>
                                    <?php
                                    }
                                    ?>
                                </li>
                                <li class="cart__total-price-item d-flex justify-content-between">
                                    <span class="cart__price-text">Giảm giá</span>
                                    <span class="cart__price-value">0đ</span>
                                </li>
                            </ul>
                            <div class="cart-price-total d-flex justify-content-between align-items-center">
                                <span class="cart__price-text">
                                    Tổng cộng
                                </span>
                                <?php
                                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
                                    <span class="cart__price-value">
                                        <?php echo number_format($tong, 0, ',', '.') . 'đ'; ?>
                                    </span>

                                <?php
                                } else { ?>
                                    <span class="cart__price-value">
                                        0đ
                                    </span>
                                <?php
                                }
                                ?>

                            </div>

                        </div>
                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>

    </main>
</div>