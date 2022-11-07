<div class="row">
    <div class="col">
        <?php
        if (is_array($items)) {
            if (isset($loai) && is_array($loai)) {
                extract($loai);
            }
            foreach ($items as $item) {
                extract($item);
            }
            if (count($items) == 0) {
        ?>
                <h3 class="alert alert-success">Không tìm thấy danh mục hoặc sản phẩm </h3>
            <?php
            } else {
            ?>
                <?php if (!exist_param('keyword')) { ?>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <!-- <h2 class="alert alert-success">Danh mục <?php echo $ten_loai ?></h2> -->
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <style>
                    #rate input[type="radio"] {
                        display: none;
                    }

                    #rate input:checked~label,
                    #rate label:hover,
                    #rate input:not(:checked):hover~label {
                        color: yellow;
                    }
                </style>
                <div class="container">
                    <div class="row">
                        <?php
                        foreach ($items as $item) {
                            extract($item); ?>
                            <div class="product-sale col-3">
                                <a href="<?= $SITE_URL ?>/hang_hoa/chi_tiet_hh.php?ma_hh=<?php echo $ma_hh ?>">
                                    <div class="product-sale-lable">
                                        <?php echo $giam_gia . '%' ?>
                                    </div>
                                    <div class="product-sale__img my-5" style=" background-image: url('<?= $ADMIN_URL ?>/hang_hoa/upload/<?php echo $hinh ?>');">
                                    </div>
                                    <h4 class="product-sale__title mb-4 text_overflow">
                                        <?php echo $ten_hh ?>
                                    </h4>
                                </a>
                                <div class="product-sale__vote my-3">
                                    <?php
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <=  hang_hoa_avg_rate($ma_hh)) { ?>
                                            <i class="icon__vote fas fa-star"></i>
                                        <?php
                                        } else { ?>
                                            <i style="color:#333;" class="fas fa-star"></i>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="product-sale-price my-3">
                                    <div class="product-sale__new-price"><?php echo number_format(hang_hoa_giam_gia($giam_gia, $don_gia), 0, ',', '.') . "đ" ?></div>
                                    <strike class="product-sale-old-price"><?php echo number_format($don_gia, 0, ',', '.') . "đ" ?></strike>
                                </div>
                                <div class="product-sale-sold my-3">

                                    <div class="product-sale-sold-count" style="width:<?php echo hang_hoa_phan_tram_exist($ma_hh) ?>%">
                                    </div>
                                </div>
                                <div class="product-sale-sold-total">Đã bán <?php echo hang_hoa_count_so_luong($ma_hh) ?></div>
                                <div class="new__product-items-img-slider__button-bar">
                                    <div class="new__product-items-img-slider__button-bar-btn new__product-items-img-slider__button-bar-btn-quick__view ">
                                        <i class="icon__slider__button fas fa-eye"></i>
                                    </div>
                                    <div class="new__product-items-img-slider__button-bar-btn new__product-items-img-slider__button-bar-btn-favourite ">
                                        <i class="icon__slider__button fas fa-heart"></i>
                                    </div>
                                    <div class="new__product-items-img-slider__button-bar-btn new__product-items-img-slider__button-bar-btn-compare ">
                                        <i class="icon__slider__button fas fa-retweet"></i>
                                    </div>
                                    <button class="Modal__addCart new__product-items-img-slider__button-bar-btn new__product-items-img-slider__button-bar-btn-add__cart ">
                                        <i class="icon__slider__button fas fa-shopping-basket"></i>
                                        <div class="new__product-items-img-slider__button-bar-btn-add__cart-text">
                                            Thêm vào giỏ
                                        </div>
                                    </button>
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>
                </div>
            <?php
            }
        } else { ?>
            <h3 class="alert alert-success">Không tìm thấy danh mục hoặc sản phẩm </h3>
        <?php

        }
        ?>
    </div>
</div>
<div class="row">
    <div class="col">
        <nav class="my-3" aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php
                if (isset($page) && $page > 1) {

                    if (isset($_GET['page']) && $_GET['page'] == 1) {
                    } else {
                        if (isset($_GET['ma_loai'])) { ?>
                            <li class="page-item">
                                <a class="page-link" href="liet_ke.php?ma_loai=<?php echo $ma_loai; ?>&page=1">First</a>
                            </li>
                        <?php
                        } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="liet_ke.php?keyword=<?php echo $keyword; ?>&page=1">First</a>
                            </li>
                        <?php
                        }
                        ?>

                    <?php }
                    ?>
                    <?php
                    for ($i = 1; $i <= $page; $i++) {
                        if (isset($_GET['ma_loai'])) { ?>
                            <li class="page-item"><a class="page-link" href="liet_ke.php?ma_loai=<?php echo $ma_loai; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                        } else { ?>
                            <li class="page-item"><a class="page-link" href="liet_ke.php?keyword=<?php echo $keyword; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                        } ?>
                    <?php
                    }
                    ?>
                    <?php if (isset($_GET['page']) && $_GET['page'] == $page) {
                    } else {
                        if (isset($_GET['ma_loai'])) { ?>
                            <li class="page-item">
                                <a class="page-link" href="liet_ke.php?ma_loai=<?php echo $ma_loai; ?>&page=<?php echo $page; ?>">Last</a>
                            </li>
                        <?php
                        } else { ?>
                            <li class="page-item">
                                <a class="page-link" href="liet_ke.php?keyword=<?php echo $keyword; ?>&page=<?php echo $page; ?>">Last</a>
                            </li>
                        <?php
                        } ?>
                    <?php
                    } ?>
                <?php
                }
                ?>

            </ul>
        </nav>
    </div>
</div>