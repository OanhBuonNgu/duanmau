 <div class="row">
     <ul class="main__category col-3">
         <?php
            foreach ($dsloai as $loai) {
                extract($loai);

            ?>
             <a href="../hang_hoa/liet_ke.php?ma_loai=<?php echo $ma_loai ?>" class="main__category-link">
                 <li class="main__category-items"><i class="icon__cate fas fa-caret-right"></i><?php echo $ten_loai ?></li>
             </a>
         <?php
            }
            ?>
     </ul>
     <div class="main__silde col-9">
         <div class="owl-carousel owl-theme owl-slidebanner">
             <div class="item">
                 <img src="<?= $CONTENT_URL ?>/img/banner004.jpg" alt="">
             </div>

             <div class="item">
                 <img src="<?= $CONTENT_URL ?>/img/linh-kien.png" alt="">
             </div>

             <div class="item">
                 <img src="<?= $CONTENT_URL ?>/img/banner003.png" alt="">
             </div>
             <div class="item">
                 <img src="<?= $CONTENT_URL ?>/img/banner2.png" alt="">
             </div>
         </div>
     </div>
 </div>

 <div class="row">
     <div class="flash__sale col">
         <div class="flash__sale-top">
             <section class="flash__sale-top-text">
                 <h2 class="flash__sale-heading">Flash <i class="icon__flash-sale fas fa-bolt"></i> Sale</h2>
                 <!-- <div class="flash__sale-countdown">
                     <div id="count__down-days" class="item__count flash__sale-countdown-days"></div><b class="separa">:</b>
                     <div id="count__down-hours" class=" item__count flash__sale-countdown-hours"></div><b class="separa">:</b>
                     <div id="count__down-mins" class=" item__count flash__sale-countdown-mins"></div><b class="separa">:</b>
                     <div id="count__down-secs" class=" item__count flash__sale-countdown-secs"></div>
                 </div> -->

             </section>
         </div>
         <div class="flash__sale-product">
             <div class="owl-carousel owl-theme owl-flash__sale">
                 <?php
                    foreach ($items as $item) {
                        extract($item);
                        if ($giam_gia > 0) { ?>
                         <div class="item">
                             <form action="<?= $SITE_URL ?>/gio_hang/index.php" method="post" enctype="multipart/form" class="product-sale">
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
                                     <input type="hidden" name="ma_hh" value="<?php echo $ma_hh; ?>">
                                     <input type="hidden" name="so_luong_mua" value="1">
                                     <input type="hidden" name="ten_hh" value="<?php echo $ten_hh; ?>">
                                     <input type="hidden" name="don_gia" value="<?php echo hang_hoa_giam_gia($giam_gia, $don_gia); ?>">
                                     <input type="hidden" name="hinh" value="<?php echo $hinh; ?>">


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
                                     <i style="font-size:1.2rem">( <?php echo binh_luan_count_rate_hh($ma_hh); ?>&nbsp;Review )</i>
                                 </div>
                                 <div class="product-sale-price my-3">
                                     <div class="product-sale__new-price"><?php echo number_format(hang_hoa_giam_gia($giam_gia, $don_gia), 0, ',', '.') . "đ" ?></div>
                                     <strike class="product-sale-old-price"><?php echo number_format($don_gia, 0, ',', '.') . "đ" ?></strike>
                                 </div>
                                 <div class="product-sale-sold my-3">

                                     <div class="product-sale-sold-count" style="width:<?php echo hang_hoa_phan_tram_exist($ma_hh) ?>%">
                                     </div>
                                 </div>
                                 <div class="product-sale-sold-total"><?php if (hang_hoa_da_ban_final($ma_hh) == $so_luong) {
                                                                            echo "Hết hàng";
                                                                        } else {
                                                                            echo 'Đã bán &nbsp;' . hang_hoa_da_ban_final($ma_hh);
                                                                        } ?></div>
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
                                     <?php if (isset($_SESSION['khach_hang'])) { ?>
                                         <button type="submit" name="addcart" class="Modal__addCart new__product-items-img-slider__button-bar-btn new__product-items-img-slider__button-bar-btn-add__cart ">
                                             <i class="icon__slider__button fas fa-shopping-basket"></i>
                                             <div class="new__product-items-img-slider__button-bar-btn-add__cart-text">
                                                 Thêm vào giỏ
                                             </div>
                                         </button>
                                     <?php
                                        } else { ?>
                                         <button type="button" name="" class="Modal__addCart new__product-items-img-slider__button-bar-btn new__product-items-img-slider__button-bar-btn-add__cart ">
                                             <i class="icon__slider__button fas fa-shopping-basket"></i>
                                             <div class="new__product-items-img-slider__button-bar-btn-add__cart-text">
                                                 Thêm vào giỏ
                                             </div>
                                         </button>
                                     <?php
                                        }
                                        ?>
                                 </div>
                             </form>
                         </div>
                     <?php
                        }
                        ?>

                 <?php
                    }
                    ?>


             </div>
         </div>
     </div>
 </div>
 <?php
    if (is_array($dsloai)) {
    }
    foreach ($dsloai as $ds) {
        extract($ds); ?>
     <div class="row">
         <div class="col">
             <h2 class="alert alert-success mt-4"><?php echo $ten_loai; ?></h2>
             <div class="owl-carousel owl-theme owl-dsloai">
                 <?php
                    $r = hang_hoa_selectall_byloai($ma_loai);
                    foreach ($r as $row) {
                        extract($row);
                        $count = count($r);

                    ?>
                     <div class="item">
                         <form method="post" action="<?= $SITE_URL ?>/gio_hang/index.php" class="product-sale">
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
                                 <input type="hidden" name="ma_hh" value="<?php echo $ma_hh; ?>">
                                 <input type="hidden" name="so_luong_mua" value="1">
                                 <input type="hidden" name="ten_hh" value="<?php echo $ten_hh; ?>">
                                 <input type="hidden" name="don_gia" value="<?php echo hang_hoa_giam_gia($giam_gia, $don_gia); ?>">
                                 <input type="hidden" name="hinh" value="<?php echo $hinh; ?>">

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
                                     <i style="font-size:1.2rem">( <?php echo binh_luan_count_rate_hh($ma_hh); ?>&nbsp;Review )</i>

                             </div>
                             <div class="product-sale-price my-3">
                                 <div class="product-sale__new-price"><?php echo number_format(hang_hoa_giam_gia($giam_gia, $don_gia), 0, ',', '.') . "đ" ?></div>
                                 <strike class="product-sale-old-price"><?php echo number_format($don_gia, 0, ',', '.') . "đ" ?></strike>
                             </div>
                             <div class="product-sale-sold my-3">

                                 <div class="product-sale-sold-count" style="width:<?php echo hang_hoa_phan_tram_exist($ma_hh) ?>%">
                                 </div>
                             </div>
                             <div class="product-sale-sold-total"><?php if (hang_hoa_da_ban_final($ma_hh) == $so_luong) {
                                                                        echo "Hết hàng";
                                                                    } else {
                                                                        echo 'Đã bán &nbsp;' . hang_hoa_da_ban_final($ma_hh);
                                                                    } ?></div>
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
                                 <?php if (isset($_SESSION['khach_hang'])) { ?>
                                     <button type="submit" name="addcart" class="Modal__addCart new__product-items-img-slider__button-bar-btn new__product-items-img-slider__button-bar-btn-add__cart ">
                                         <i class="icon__slider__button fas fa-shopping-basket"></i>
                                         <div class="new__product-items-img-slider__button-bar-btn-add__cart-text">
                                             Thêm vào giỏ
                                         </div>
                                     </button>
                                 <?php
                                    } else { ?>
                                     <button type="button" name="" class="Modal__addCart new__product-items-img-slider__button-bar-btn new__product-items-img-slider__button-bar-btn-add__cart ">
                                         <i class="icon__slider__button fas fa-shopping-basket"></i>
                                         <div class="new__product-items-img-slider__button-bar-btn-add__cart-text">
                                             Thêm vào giỏ
                                         </div>
                                     </button>
                                 <?php
                                    }
                                    ?>
                             </div>
                         </form>
                     </div>
                 <?php
                    }
                    ?>
             </div>
         </div>
     </div>

 <?php
    }
    ?>


 <div class="row">
     <div class="top10_product_favourite my-4 col">
         <h2 class="alert alert-success">Sản phẩm yêu thích</h2>
         <div class="flash__sale-product">
             <div class="owl-carousel owl-theme owl-top10_product_favourite">
                 <?php

                    foreach (hang_hoa_select_top10() as $item) {
                        extract($item);
                    ?>
                     <div class="item">
                         <form method="post" action="<?= $SITE_URL ?>/gio_hang/index.php" style="min-height:0 !important;" class="product-sale">
                             <a href="<?= $SITE_URL ?>/hang_hoa/chi_tiet_hh.php?ma_hh=<?php echo $ma_hh ?>">
                                 <!-- <div class="product-sale-lable">
                                     <?php echo $giam_gia . '%' ?>
                                 </div> -->
                                 <div class="product-sale__img my-2" style=" background-image: url('<?= $ADMIN_URL ?>/hang_hoa/upload/<?php echo $hinh ?>');">
                                 </div>
                                 <h4 class="product-sale__title mb-4 text_overflow">
                                     <?php echo $ten_hh ?>
                                 </h4>
                             </a>
                             <div class="product-sale__vote my-3">
                                 <input type="hidden" name="ma_hh" value="<?php echo $ma_hh; ?>">
                                 <input type="hidden" name="so_luong_mua" value="1">
                                 <input type="hidden" name="ten_hh" value="<?php echo $ten_hh; ?>">
                                 <input type="hidden" name="don_gia" value="<?php echo hang_hoa_giam_gia($giam_gia, $don_gia); ?>">
                                 <input type="hidden" name="hinh" value="<?php echo $hinh; ?>">
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
                                     <i style="font-size:1.2rem">( <?php echo binh_luan_count_rate_hh($ma_hh); ?>&nbsp;Review )</i>

                             </div>
                             <div class="product-sale-price my-3">
                                 <div class="product-sale__new-price"><?php echo number_format(hang_hoa_giam_gia($giam_gia, $don_gia), 0, ',', '.') . "đ" ?></div>
                                 <strike class="product-sale-old-price"><?php echo number_format($don_gia, 0, ',', '.') . "đ" ?></strike>
                             </div>
                             <!-- <div class="product-sale-sold my-3">

                                 <div class="product-sale-sold-count" style="width:<?php echo hang_hoa_phan_tram_exist($ma_hh) ?>%">
                                 </div>
                             </div> -->
                             <!-- <div class="product-sale-sold-total">Đã bán <?php echo hang_hoa_count_so_luong($ma_hh) ?></div> -->
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
                                 <?php if (isset($_SESSION['khach_hang'])) { ?>
                                     <button type="submit" name="addcart" class="Modal__addCart new__product-items-img-slider__button-bar-btn new__product-items-img-slider__button-bar-btn-add__cart ">
                                         <i class="icon__slider__button fas fa-shopping-basket"></i>
                                         <div class="new__product-items-img-slider__button-bar-btn-add__cart-text">
                                             Thêm vào giỏ
                                         </div>
                                     </button>
                                 <?php
                                    } else { ?>
                                     <button type="button" name="" class="Modal__addCart new__product-items-img-slider__button-bar-btn new__product-items-img-slider__button-bar-btn-add__cart ">
                                         <i class="icon__slider__button fas fa-shopping-basket"></i>
                                         <div class="new__product-items-img-slider__button-bar-btn-add__cart-text">
                                             Thêm vào giỏ
                                         </div>
                                     </button>
                                 <?php
                                    }
                                    ?>
                             </div>
                         </form>
                     </div>
                 <?php
                    }
                    ?>


             </div>
         </div>
     </div>
 </div>