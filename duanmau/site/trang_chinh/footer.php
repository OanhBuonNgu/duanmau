<footer class="footer ">
    <div class="footer__social-form">
        <div class="footer__socical">
            <a href="" class="footer__socical-link">
                <div class="footer__socical-btn">
                    <i class="fab fa-facebook-f"></i>
                </div>
                <span>Facebook</span>
            </a>
            <a href="" class="footer__socical-link">
                <div class="footer__socical-btn">
                    <i class=" fab fa-twitter"></i>
                </div>
                <span>Twitter</span>
            </a>
            <a href="" class="footer__socical-link">
                <div class="footer__socical-btn">
                    <i class=" fab fa-google-plus-g"></i>
                </div>
                <span>Google++</span>
            </a>
            <a href="" class="footer__socical-link">
                <div class="footer__socical-btn">
                    <i class=" fab fa-instagram"></i>
                </div>
                <span>Instagram</span>
            </a>
            <a href="" class="footer__socical-link">
                <div class="footer__socical-btn">
                    <i class=" fab fa-youtube"></i>
                </div>
                <span>Youtube</span>
            </a>
        </div>
        <form id="contact" action="" method="post" class="footer__form">
            <h2 class="footer__form-heading">
                Đăng ký nhận khuyến mãi <span>20%</span>
            </h2>
            <input autocomplete="off" class="footer__form-input" type="text" name="tenkh" placeholder="Nhập Họ Tên...">
            <input autocomplete="off" class="footer__form-input" type="email" name="emailkh" placeholder="Nhập Email...">
            <button type="submit" name="phanhoi" class="footer__form-btn">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
    <div class="container">
        <div class="row">
            <div class="footer__info col">
                <div class="footer__contact">
                    <h3 class="footer__contact-heading footer__heading">
                        Liên hệ chúng tôi
                    </h3>
                    <ul class="footer__contact-list">
                        <li class="footer__contact-items">
                            <a href=""><i class="fas fa-home"></i>173 Phương Canh , Nam Từ Liêm ,Tp Hà Nội</a>
                        </li>
                        <li class="footer__contact-items">
                            <a href=""><i class="fas fa-phone-alt"></i>0879.759.666</a>
                        </li>
                        <li class="footer__contact-items">
                            <a href=""><i class="fas fa-envelope"></i>namdt@gmail.com</a>
                        </li>
                        <li class="footer__contact-items">
                            <a href=""><i class="far fa-clock"></i>7 ngày trong tuần từ 8:00 sáng đến 9:00 tối</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__local">
                    <h3 class="footer__local-heading footer__heading">
                        Vị trí cửa hàng
                    </h3>
                    <ul class="footer__local-list">
                        <li class="footer__local-items">
                            <a href=""> Hà Nội - Việt Nam</a>
                        </li>
                        <li class="footer__local-items">
                            <a href="">Phú Thọ - Việt Nam</a>
                        </li>
                        <li class="footer__local-items">
                            <a href="">HCM - Việt Nam</a>
                        </li>
                        <li class="footer__local-items">
                            <a href="">Quảng Ninh - Việt Nam</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__service">
                    <h3 class="footer__service-heading footer__heading">
                        Dịch vụ khách hàng
                    </h3>
                    <ul class="footer__service-list">
                        <li class="footer__service-items">
                            <a href=""> Về chúng tôi</a>
                        </li>
                        <li class="footer__service-items">
                            <a href="">Dịch vụ khách hàng</a>
                        </li>
                        <li class="footer__service-items">
                            <a href="">Chính sách bảo mật</a>
                        </li>
                        <li class="footer__service-items">
                            <a href="">Tìm kiếm nâng cao</a>
                        </li>
                    </ul>
                </div>
                <div class="footer__tag">
                    <h3 class="footer__tag-heading footer__heading">
                        Tag
                    </h3>
                    <ul class="footer__tag-list">
                        <?php
                        require_once '../../dao/loai.php';
                        foreach (loai_selectall() as $ds) { ?>
                            <li class="footer__tag-items">
                                <a href="<?=$SITE_URL?>/hang_hoa/liet_ke.php?ma_loai=<?php echo $ds['ma_loai'];?>" class="footer__tag-link">
                                    <?php 
                                    echo $ds['ten_loai'];
                                    ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="footer__copyright">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <div class="footer__copyright-left">
                            &copy; 2021 Bản quyền thuộc về LD.Shop . Trang web được Design bởi Longdvpd05236
                        </div>
                        <div class="footer__copyright-img">
                            <img src="img/paypal-11 (1).png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
</footer>

<script>
    $(document).ready(function() {
        $('#contact').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url:'../contact/index.php',
                type:'POST',
                data:$(this).serializeArray(),
                success:function(data) {
                        alert('Phản hồi của bạn đã được gửi.Chúng tôi sẻ liên hệ bạn sau!');
                        $('#contact')[0].reset();
                }
            })
        })
    })
</script>