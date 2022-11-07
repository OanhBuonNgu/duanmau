<?php
$VIEW_NAME = 'camon.php';

require_once '../layout.php';
?>
<div class="container">
    <main class="main ">
        <div class="cart">
            <div class="row">
                <div class="col pl-0">
                    <div class="cart__inner">
                        <h4 class="cart__inner-productTitle my-3 alert alert-success">Đặt hàng thành công</h4>
                        <div class="cart__inner-product-heading">
                            <h4>Đơn hàng của bạn đã đặt thành công ! </h4>
                            <?php if (isset($_SESSION['id_hoa_don'])) { ?>
                                <p>Mã đơn hàng của bạn là  <b class="alert alert-success py-2 px-4"><?php echo $_SESSION['id_hoa_don']; ?></b></p>
                                <span><a href="<?=$SITE_URL?>/tai_khoan/index.php?my_order">Xem đơn hàng</a></span>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>