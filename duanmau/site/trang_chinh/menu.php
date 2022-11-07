<div class="width100 hr">
    <div class="container">
        <div class="row">
            <nav class="nav col">
                <span class="nav__category"><i class="icon__category fas fa-list"></i><span class="nav__category-title">Danh mục sản phẩm</span>
                    <ul class="nav__category-ul">
                        <?php
                        foreach ($dsloai as $loai) {
                            extract($loai);

                        ?>
                            <a href="../hang_hoa/liet_ke.php?ma_loai=<?php echo $ma_loai ?>" class="main__category-link">
                                <li class="main__category-items py-4 " ><i class="icon__cate fas fa-caret-right"></i><?php echo $ten_loai ?></li>
                            </a>
                        <?php
                        }
                        ?>
                    </ul>
                </span>

                <a class="nav__link" href="<?= $SITE_URL ?>/trang_chinh/">Trang chủ</a>
                <a class="nav__link" href="<?= $SITE_URL ?>/trang_chinh/index.php?gioi_thieu">Giới thiệu</a>
                <a class="nav__link" href="#">Khuyến mãi</a>
                <a class="nav__link" href="<?= $SITE_URL ?>/trang_chinh/index.php?lien_he">Liên hệ</a>
            </nav>
        </div>
    </div>
</div>