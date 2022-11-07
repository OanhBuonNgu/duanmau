<?php
if (is_array($hang_hoa)) {
    extract($hang_hoa);
}

?>
<style>
    .chitiet__sanpham {
        display: flex;
        border-radius: 10px;
        justify-content: space-between;
        padding: 20px 0;
    }

    .hinhanh__sanpham {
        width: 50%;
        margin-right: 20px;
    }

    .text_sanpham {
        flex: 1;
    }

    .page__chitiet {
        display: flex;
    }

    .img-hinhanh__sanpham {
        width: 50%;
        padding: 10px 0;
    }

    .text_sanpham-heading {
        font-size: 20px;
        line-height: 22px;
        color: var(--text-color);
        margin-bottom: 20px;
        width: 70%;
    }


    /* aside */
    .right__best-sell {
        margin: 0;
    }

    .category__involve {
        margin: 20px 0;
    }

    .category__involve-heading {
        padding: 12px 10px;
        margin: 12px 0;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;

    }

    .right__best-sell-items {
        display: flex;
    }

    .right__best-sell-items img {
        margin-right: 10px;
    }

    .comment__heading {
        padding: 12px 10px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .comment {
        border: 1px solid #eaeaea;
        margin: 12px 0;
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;

    }

    /* text_sảnpham */
    .text__sanpham {
        width: 50%;
    }

    .text__sanpham-p {
        font-size: 1.3rem;
        margin: 10px 0;

    }

    .text__sanpham-p span {
        font-weight: bold;

    }

    .text__sanpham-p i {
        color: var(--cyan);

    }

    .text__sanpham-km {
        padding: 10px 0;
    }

    .title__km {
        background-color: var(--cyan);
        padding: 10px;
        color: white;
        font-size: 1.5rem;
    }

    .text__sanpham-items {
        font-size: 12px;
        padding: 10px;

    }

    .text__sanpham-items h3 {
        font-weight: 500;
        font-size: 1.3rem;
    }

    .text__sanpham-items i {
        color: var(--cyan);
        padding-right: 5px;
    }

    .text__sanpham-price {
        border: 1px solid #eaeaea;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 10px;
    }

    .text__sanpham-add__cart {
        padding: 10px 0;
    }

    .text__sanpham-add__cart button {
        padding: 10px 100px;
        border-radius: 4px;
        outline: none;
        cursor: pointer;
        border: none;
        background-color: var(--primary);
        color: white;
        text-transform: uppercase;
        font-size: 1.3rem;
    }

    .text__sanpham-gia {
        color: var(--primary);
        font-size: 3rem;
        padding: 10px 0;
        font-weight: 600;
    }

    .text__sanpham-soluong {
        font-size: 1.7rem;
        padding: 10px 0;
    }

    .text__sanpham-soluong input {
        outline: none;
        margin-left: 10px;
    }

    .mota {
        font-size: 1.3rem;
        padding: 10px 0;
        line-height: 2rem;
    }

    .img-detail {
        width: 100%;
        display: flex;
        justify-content: center;
        padding: 20px 0;
    }

    .img-detail img {
        width: 50px;
        height: 50px;
        cursor: pointer;
    }

    /* .img img{
        transition: all .3s ease;
    }
    .img img:hover{
        transform: scale(1.5);
    }
    .img p{
        overflow: hidden;
    } */
    .text_sanpham-heading {
        margin: 0;
    }

    /* rate */
    #rate input[type="radio"] {
        display: none;
    }

    .star {
        width: 140px;
        font-size: 2.3rem;
        height: 50px;

    }

    .star label {
        color: var(--secondary);
        opacity: .8;
    }

    #rate label {
        float: right;
    }

    /* lật ngôi sao theo thực tế */
    /* #rate input:checked~label, */
    #rate label:hover,
    
    #rate input:not(:checked):hover~label {
        color: var(--orange);
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="page__chitiet row">

        <div class="col ">
            <div class="bg-white">
                <div class="heading_rate d-flex align-items-center ">
                    <h2 class="text_sanpham-heading text__overflow pl-4  py-4"> <?php echo $ten_hh ?></h2>
                    <div class="text_sanpham-rate py-4 flex-1 text-center">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <=  hang_hoa_avg_rate($ma_hh)) { ?>
                                <i style="font-size:1.6rem" class=" icon__vote fas fa-star"></i>
                            <?php
                            } else { ?>
                                <i style="font-size:1.6rem; color:#777;" class=" fas fa-star"></i>
                        <?php
                            }
                        }
                        ?>

                        <span class="cursor-pointer text-primary font-size-primary"><a href="#rate"><?php echo binh_luan_count_rate_hh($ma_hh); ?> đánh giá</a></span> |
                        <span class="cursor-pointer text-primary font-size-primary"><a href="#rate"><?php echo binh_luan_count_comment_hh($ma_hh); ?> bình luận</a></span>

                    </div>
                </div>
                <hr>
                <form action="<?= $SITE_URL ?>/gio_hang/index.php" method="post" enctype="multipart/form-data">
                    <div class="chitiet__sanpham">
                        <div class="hinhanh__sanpham">
                            <div class="img text-center">
                                <p style="">
                                    <img class="img-hinhanh__sanpham" src="<?= $ADMIN_URL ?>/hang_hoa/upload/<?php echo $hinh ?>" id="img-main" alt="">
                                </p>
                            </div>
                            <div class="img-detail  ">
                                <div class="owl-carousel owl-theme owl-img_detail " style="width:60%">
                                    <?php
                                    $images = hang_hoa_select_images($ma_hh);
                                    if (count($images) > 1) {
                                        foreach ($images as $image) {
                                            extract($image); ?>
                                            <div class="item mx-2">
                                                <img onclick="changeImg(this);" src="<?= $ADMIN_URL ?>/hang_hoa/upload/<?php echo $images; ?>" alt="">
                                            </div>
                                    <?php
                                        }
                                    }

                                    ?>
                                </div>
                            </div>
                            <div class="mota p-5">
                                <h3 class="alert alert-info">Cấu hình</h3>
                                <p style="font-weight:500;" class="font-size-primary text-dark"><?php echo $mo_ta ?></p>
                            </div>
                        </div>
                        <div class="text_sanpham">
                            <h3 class="text__sanpham-gia"> <?php echo number_format(hang_hoa_giam_gia($giam_gia, $don_gia), 0, ',', '.') . 'đ' ?></h3>
                            <p class="text__sanpham-p">
                                <i class="fas fa-check-circle"></i> <span>Danh mục:</span> <span class="h5"><?php echo $ten_loai ?></span>
                            </p>
                            <p class="text__sanpham-p">
                                <i class="fas fa-check-circle"></i> <span>Tình trạng:</span> <span style="color:var(--primary)"><?php echo hang_hoa_status($ma_hh) ?></span>
                            </p>
                            <div class="text__sanpham-km">
                                <h3 class="title__km">
                                    Khuyến mại (SL có hạn)
                                </h3>
                                <ul class="text__sanpham-list">
                                    <li class="text__sanpham-items">
                                        <h3><i class="fas fa-check-square"></i>Hỗ trợ trả góp lãi suất thấp</h3>
                                    </li>
                                    <li class="text__sanpham-items">
                                        <h3><i class="fas fa-check-square"></i>Nâng cấp SSD miễn phí ( BH 03 năm)</h3>
                                    </li>
                                    <li class="text__sanpham-items">
                                        <h3><i class="fas fa-check-square"></i>Dùng thử miễn phí trong 07 ngày đầu tiên.</h3>
                                    </li>
                                    <li class="text__sanpham-items">
                                        <h3><i class="fas fa-check-square"></i>Quà tặng kèm: Túi xách, adapter, chuột, bàn di chuột cao cấp.</h3>
                                    </li>
                                    <li class="text__sanpham-items">
                                        <h3><i class="fas fa-check-square"></i>Giảm giá trực tiếp đối với khách hàng ở xa, HSSV.</h3>
                                    </li>
                                </ul>
                            </div>
                            <div class="text__sanpham-price">
                                <!-- <h3 class="text__sanpham-gia"> <?php echo number_format($don_gia, 0, ',', '.') . 'đ' ?></h3> -->
                                <p class="text__sanpham-soluong">
                                    <input type="hidden" name="ma_hh" value="<?php echo $ma_hh; ?>">
                                    <span>Số lượng</span><input style="height:30px;text-align:center;outline:none;" autocomplete="off" type="number" value="1" name="so_luong_mua">
                                </p>
                                <input type="hidden" name="ten_hh" value="<?php echo $ten_hh; ?>">
                                <input type="hidden" name="don_gia" value="<?php echo hang_hoa_giam_gia($giam_gia, $don_gia); ?>">
                                <input type="hidden" name="hinh" value="<?php echo $hinh; ?>">
                                <b class="text-danger"></b>
                                <div class="text__sanpham-add__cart">
                                    <?php
                                    if (hang_hoa_status($ma_hh) != 'Hết hàng') {
                                        if (isset($_SESSION['khach_hang'])) { ?>
                                            <button id="addcart" name='addcart' type="submit"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>

                                        <?php
                                        } else { ?>
                                            <button id="addcart" disabled class="opacity-3" name='addcart' type="submit"><i class="fas fa-shopping-cart"></i> Vui lòng đăng nhập để mua hàng</button>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    } else { ?>
                                        <button id="addcart" disabled class="opacity-3" name='addcart' type="submit"><i class="fas fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                    <?php
                                    }
                                    ?>
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>



            <div class="comment">
                <h2 id="" class="comment__heading alert alert-primary">Đánh giá</h2>

                <?php
                if (isset($_SESSION['khach_hang'])) { ?>
                    <form id="rate" action="<?= $SITE_URL ?>/binh_luan/index.php" method="POST">
                        <h3>Viết đánh giá của bạn</h3>
                        <input type="hidden" name="id_kh" value="<?php echo $id_kh; ?>">
                        <input type="hidden" name="ma_hh" value="<?php echo $ma_hh; ?>">

                        <div class="rate_heading d-flex align-items-center">
                            <div class="star ">
                                <input type="radio" id="star5" name="rate" value="5">
                                <label onmouseover="over_content_rate(this);" onmouseout="out_content_rate(this);" value="Tuyệt vời" for="star5"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star4" name="rate" value="4">
                                <label onmouseover="over_content_rate(this);" onmouseout="out_content_rate(this);" value="Hài lòng" for="star4"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star3" name="rate" value="3">
                                <label onmouseover="over_content_rate(this);" onmouseout="out_content_rate(this);" value="Bình thường" for="star3"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star2" name="rate" value="2">
                                <label onmouseover="over_content_rate(this);" onmouseout="out_content_rate(this);" value="Tạm được" for="star2"><i class="fas fa-star"></i></label>
                                <input type="radio" id="star1" name="rate" value="1">
                                <label onmouseover="over_content_rate(this);" onmouseout="out_content_rate(this);" value="Không thích" for="star1"><i class="fas fa-star"></i></label>
                            </div>
                            <p class="font-size-primary px-2" id="content_rate"></p>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <button type="submit" name="rate_submit" class="btn primary py-2 px-5 font-size-primary" value="Gửi" id="submit-button">Gửi</button>
                    </form>

                <?php
                } else { ?>
                    <p class="alert alert-primary font-size-primary">Vui lòng đăng nhập để đánh giá và nhận xét</p>
                <?php
                }
                ?>
                <?php
                // if(isset($_SESSION['khach_hang'])){
                //    extract($_SESSION['khach_hang']);

                // }

                $r = binh_luan_select10_by_ma_hh($ma_hh);
                foreach ($r as $row) {
                    extract($row);
                    extract(khach_hang_getinfo($id_kh));
                ?>
                    <div class="bg-white py-2 px-3">
                        <div class="view_comment_rate d-flex  py-4">
                            <div class="view_comment_rate-avatar w-5">
                                <?php
                                if ($hinh == '') { ?>
                                    <img src="<?= $CONTENT_URL ?>/img/avatar.png" alt="" class="avatar_comment"></img>
                                <?php
                                } else { ?>
                                    <img src="<?= $ADMIN_URL ?>/khach_hang/upload/<?php echo $hinh; ?>" alt="" class="avatar_comment"></img>
                                <?php
                                } ?>
                            </div>
                            <div class="view_comment_rate-text">
                                <div class="view_comment_rate-text-name_user">
                                    <b style="font-size:1.5rem" class=" text-dark"> <?php echo $ho_ten ?></b>
                                    <span style="font-size:1.3rem;" class="text-secondary"> vào ngày <?php echo $ngay_bl; ?></span>
                                </div>
                                <div class="view_comment_rate-text-text-rate">
                                    <?php
                                    if ($rate > 0) {
                                        for ($i = 1; $i <= 5; $i++) {
                                            if ($i <=  $rate) { ?>
                                                <i class="icon__vote fas fa-star"></i>
                                            <?php
                                            } else { ?>
                                                <i style="color:#333;" class="fas fa-star"></i>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="view_comment_rate-text-content">
                                    <p class="text-dark font-size-primary"><?php echo $noi_dung ?></p>
                                </div>
                                <div class="reply">
                                    <?php
                                    if (isset($_SESSION['khach_hang'])) {
                                        $kh = khach_hang_getinfo($id_kh);
                                        if ($kh['id_kh'] == $_SESSION['khach_hang']['id_kh']) { ?>
                                            <a style="font-size:1.2rem;" href="<?= $ADMIN_URL ?>/binh_luan/?delete_bl&ma_bl=<?php echo $ma_bl ?>">Xoá</a>
                                        <?php
                                        } else { ?>

                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>

                        </div>

                    </div>
                <?php
                }
                ?>

            </div>
            <div class="category__involve">
                <h2 class="category__involve-heading alert alert-primary">Sản phẩm cùng danh mục</h2>
                <div class="row mr-0 ml-0">
                    <?php

                    foreach ($hh_cung_loai as $hh) {
                        extract($hh); ?>
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
                            <div class="product-sale-sold-total">Đã bán <?php echo hang_hoa_da_ban_final($ma_hh) ?></div>
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
                    }
                    ?>
                </div>

            </div>

        </div>

    </div>

</div>

</div>
<script>
    //thay đổi ảnh chi tiết sp 
    function changeImage(id) {
        let imagePath = document.getElementById(id).getAttribute('src');
        document.getElementById('img-main').setAttribute('src', imagePath);
    }
    var content = document.getElementById('content_rate');

    function over_content_rate(e) {
        content.innerHTML = e.getAttribute('value');
    }

    function out_content_rate(e) {
        content.innerHTML = '';
    }
    var img_main = document.getElementById('img-main');

    function changeImg(e) {
        $path = e.getAttribute('src');

        img_main.setAttribute('src', $path);
    }
</script>