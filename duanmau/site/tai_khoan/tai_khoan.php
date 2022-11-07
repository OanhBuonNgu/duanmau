<?php
if (!isset($_SESSION['khach_hang'])) {?>
    <?php require_once 'lost_pass.php'?>
<?php
    
} else {
    extract($_SESSION['khach_hang']);
?>
    <main class="main ">
        <div class="row accountCustomer py-4">
            <div class="col-3">
                <aside class="account__sidebar ">
                    <div class="account__avatar d-flex align-items-center">
                        <?php
                        $kh = khach_hang_getinfo($id_kh);
                        extract($kh);
                        if ($hinh == '') { ?>
                            <img class="account__avatar-img" src="<?= $CONTENT_URL ?>/img/avatar.png" alt="">
                        <?php
                        } else { ?>
                            <img class="account__avatar-img" src="<?= $ADMIN_URL ?>/khach_hang/upload/<?php echo $hinh; ?>" alt="">
                        <?php
                        }
                        ?>
                        <div class="account__avatar-info px-3">
                            <p class="m-0">Tài khoản của</p>
                            <strong class="account__avatar-name"><?php echo $ho_ten; ?></strong>
                        </div>
                    </div>
                </aside>
                <ul class="accountNav py-3">
                    <li class="py-4 accountNav-items js-accountNav-items active"><a href="<?=$SITE_URL?>/tai_khoan/index.php" class="d-flex accountNav-items-link"><i class="icon__accoutNav fas fa-user"></i>
                            <span>Thông tin tài
                                khoản</span></a></li>
                    <li class="py-4 accountNav-items js-accountNav-items"><a href="#" class="d-flex accountNav-items-link"><i class="icon__accoutNav fas fa-bell"></i>
                            <span>Thông báo của tôi</span></a>
                    </li>
                    <li class="py-4 accountNav-items js-accountNav-items"><a href="<?=$SITE_URL?>/tai_khoan/index.php?my_order" class="d-flex accountNav-items-link"><svg stroke="currentColor" fill="#a0a0a0" stroke-width="0" viewBox="0 0 24 24" height="2rem" width="2rem" class="mr-3 svg " xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 12h7v1.5h-7zm0-2.5h7V11h-7zm0 5h7V16h-7zM21 4H3c-1.1 0-2 .9-2 2v13c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 15h-9V6h9v13z">
                                </path>
                            </svg>
                            <span>Quản lý đơn hàng</span></a></li>

                    <li class="py-4 accountNav-items js-accountNav-items"><a href="<?=$SITE_URL?>/tai_khoan/index.php?address" class="d-flex accountNav-items-link"><i class="icon__accoutNav fas fa-map-marker-alt"></i><span>Sổ địa
                                chỉ</span></a></li>
                    <li class="py-4 accountNav-items js-accountNav-items"><a href="#" class="d-flex accountNav-items-link"><i class="icon__accoutNav ti-eye"></i>
                            <span>Sản phẩm đã xem</span></a></li>
                    <li class="py-4 accountNav-items js-accountNav-items"><a href="#" class="d-flex accountNav-items-link"><i class="icon__accoutNav fas fa-heart"></i><span>Sản phẩm yêu thích</span></a>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <?php include $VIEW_ACCOUNT ?>
            </div>
        </div>

    </main>
<?php
}
?>
<script>
    
    $(document).ready(function() {
        $('.js-accountNav-items').click(function() {
            if (!$(this).hasClass('active')) {
                $('.js-accountNav-items').removeClass('active');
                $(this).addClass('active');
            }
        })



    })
    var hidden_changePassword = document.querySelector('.js-hidden_changePassword');
    var check_hidden_changePassword = document.querySelector('.js-check-hidden_changePassword');
    check_hidden_changePassword.addEventListener("click", function() {
        if (check_hidden_changePassword.checked === true) {
            hidden_changePassword.classList.add('open');
        } else {
            hidden_changePassword.classList.remove('open');
        }
    })
</script>