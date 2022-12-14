<?php session_start();

require_once '../../global.php';
require_once '../../dao/pdo.php';
require_once '../../dao/loai.php';
require_once '../../dao/khach_hang.php';
require_once '../../dao/hang_hoa.php';
require_once '../../dao/binh_luan.php';
$dsloai=loai_selectall();
if (!isset($_SESSION['khach_hang'])) {


?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LD_SHOP</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/lib/owlcarousel/assets/owl.theme.default.min.css">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?= $CONTENT_URL ?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/base.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/cart.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/customer.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/main.css">
    <link rel="shortcut icon" href="<?= $CONTENT_URL ?>/img/faviicon.png" type="image/png" sizes="">

  </head>

  <body>

    <div class="wrapper">
      <div class="width100">
        <div class="container">
          <div class="row">
            <?php require_once 'trang_chinh/header.php' ?>
          </div>
        </div>
      </div>
      <?php
      require_once 'trang_chinh/menu.php';
      ?>
      <div class="width100 hr"></div>
      <div class="container">
        <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <?php
          $path = $_SERVER['REQUEST_URI'];
          $path = (explode('/', $path));
          $path = end($path);
          $path = (explode('?', $path));
          $path = end($path);
          $path = (explode('=', $path));
          $path = reset($path);
          if ($path == 'gioi_thieu') {
            $paths = 'Gi???i thi???u';
          } else if ($path == 'lien_he') {
            $paths = 'Li??n h???';
          } else if ($path == 'khuyen_mai') {
            $paths = 'Khuy???n m??i';
          } else if ($path == 'ma_loai') {
            $paths = 'Danh m???c';
          } else if ($path == 'ma_hh') {
            $paths = 'S???n ph???m';
          } else {
            $paths = '';
          }
          ?>
          <?php
          if (!$path == '') { ?>
            <li class="breadcrumb-item"><a href="<?= $ROOT_URL ?>">Trang ch???</a></li>
          <?php
          }
          ?>
          <?php
          if (exist_param($path)) { ?>
            <li class="breadcrumb-item active" aria-current="page"><a href="#"><?php echo $paths; ?></a></li>
          <?php
          }
          ?>
        </ol>
      </nav> -->
        <main class="main ">
          <div class="container">
            <?php include $VIEW_NAME; ?>
          </div>
      </div>
      </main>
      <div class="width100">
        <?php require_once 'trang_chinh/footer.php' ?>
      </div>
      <!-- Modal login -->
      <div class="modalLogin mainModal " id="sau_register">
        <div class="modalLogin-container ">
          <div class="modalLogin-close"><i class="fas fa-times-circle"></i></div>
          <div class="modalLogin-header text-uppercase py-3 px-4 d-flex ">
            <span class="h3 modalLogin-heading"><i class="mr-3 icon__modalLogin-heading far fa-address-card"></i> ????ng
              nh???p ho???c ????ng k??</span>
          </div>
          <div class="modalLogin-body d-flex p-5">
            <div class="modalLogin-body-login">
              <form id="login" action="<?= $SITE_URL ?>/tai_khoan/login.php" method="post">
                <div class="form-row align-items-center d-block">
                  <div class="col-auto mb-3">
                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="icon-input-group-text fas fa-user"></i></div>
                      </div>
                      <input type="text" class="form-control" name="username" id="username" placeholder="T??n ????ng nh???p">
                    </div>
                  </div>
                  <div class="col-auto">
                    <label class="sr-only" for="inlineFormInputGroup">Username</label>
                    <div class="input-group mb-2 box-hidOnPass">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-key"></i></div>
                      </div>
                      <input type="password" name="password" class="form-control inputHidOnPass" id="password" placeholder="M???t kh???u">
                      <div class=""><i onclick="hidOnPass()" class="iconHidOnPass fas fa-eye"></i></div>
                    </div>
                  </div>
                  <?php
                  // require_once 'trang_chinh/login.php';
                  $error_login = "";
                  ?>
                  <div class="error_login"><?php if ($error_login != "") {
                                              echo $error_login;
                                            } ?></div>
                  <div class="col-auto">
                    <div class=" mb-2 my-3">
                      <a href="" class="losePassword ">Qu??n m???t kh???u?</a>
                    </div>
                  </div>
                  <div class="col-auto">
                    <button type="submit" name="sbm_login" id="sbm_login" class="btn primary mb-2"><i class="icon-login ti-lock pr-2"></i> ????ng
                      nh???p</button>
                  </div>
                  <div class="col-auto">
                    <h5 class="py-4 heading_login-with">????ng nh???p v???i</h5>
                    <button class="btn btn-fb" type="submit"><i class="icon__login-with fab fa-facebook-square"></i>&nbsp;
                      Facebook</button>
                    <button class="btn btn-gg" type="submit"><i class="icon__login-with fab fa-google"></i>&nbsp;
                      Google</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="modalLogin-body-register border-left ml-5 pl-5">
              <h2 class="text-uppercase modalRegister-heading">T???o t??i kho???n m???i t???i ????y</h2>
              <p class="modalRegisterText">????ng k?? mi???n ph?? v?? d??? d??ng!</p>
              <ul class="my-4">
                <li class="modalRegisterText-li"><i>?????t h??ng</i></li>
                <li class="modalRegisterText-li"><i>Thanh to??n nhanh h??n</i></li>
                <li class="modalRegisterText-li"><i>Xem v?? theo d??i ????n h??ng v?? h??n th??? n???a</i></li>
              </ul>
              <div class="">
                <button type="submit" class="btn primary my-2"><a href="#" class="link-createAccount js-createAccount">
                    T???o m???t t??i
                    kho???n</a></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Register -->
      <div class="modalRegister js-modalRegister">
        <div class="container register modalRegister-content js-modalRegister-content">
          <div class="modalRegister-content-close js-modalRegister-content-close"><i class="icon_modalRegister-content-close fas fa-times-circle"></i></div>
          <div class="row">
            <div class="col-3 register-left">
              <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
              <h3>Ch??o m???ng</h3>
              <p>??u ????i ch??? c??n sau 24 gi??? n???a!
                Nhanh l??n s??? l?????ng c?? h???n
              </p>
              <input type="submit" name="" class="js-login" value="????ng nh???p" /><br />
            </div>
            <div class="col-8 register-right px-0">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <h3 class="register-heading">????ng k?? th??nh vi??n</h3>
                  <form id="register" action="<?= $SITE_URL ?>/tai_khoan/register.php" method="post" class="row register-form">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input autocomplete="off" type="text" name="ho_ten" id="ho_ten" class="form-control" placeholder="T??n c???a b???n *" value="" />
                      </div>
                      <div class="form-group">
                        <input autocomplete="off" type="text" class="form-control" id="ma_kh" name="ma_kh" placeholder="T??n ????ng nh???p *" value="" />
                      </div>
                      <div class="form-group">
                        <input autocomplete="off" type="password" class="form-control" id="mat_khau" name="mat_khau" placeholder="M???t kh???u *" value="" />
                      </div>
                      <div class="form-group">
                        <input autocomplete="off" type="password" class="form-control" id="re_mat_khau" name="re_mat_khau" placeholder="Nh???p l???i m???t kh???u *" value="" />
                      </div>

                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input autocomplete="off" type="text" class="form-control" id="email" name="email" placeholder="Email c???a b???n *" value="" />
                      </div>
                      <div class="form-group">
                        <input autocomplete="off" type="hidden" disabled  id="so_dien_thoai" name="so_dien_thoai" class="form-control" placeholder="S??? ??i???n tho???i  " value="" />
                      </div>

                      <div class="form-group form-check">
                        <input autocomplete="off" type="checkbox" name="check" checked class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label px-2 check__register " for="exampleCheck1">????ng k?? th??nh
                          vi??n</label>
                      </div>
                      <input type="submit" name="sbm_register" class="btnRegister" value="????ng k??" />
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>

   
    <script>
      $('#login').submit(function(e) {

        e.preventDefault();
        if ($('#username').val() == "") {
          alert('T??n ????ng nh???p kh??ng ????? tr???ng');
        } else if ($('#password').val() == "") {
          alert('M???t kh???u kh??ng ????? tr???ng');
        } else {
          $.ajax({
            type: "POST",
            url: '../tai_khoan/login.php',
            data: $(this).serializeArray(),
            success: function(data) {
              alert(data);
              if (data == '????ng nh???p th??nh c??ng') {
                location.reload();
              }
            }
          })
        };
      });
      $('#register').submit(function(event) {
        event.preventDefault();
        var patternEmail = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        var patternSdt = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        if ($('#ho_ten').val() == '') {
          alert('H??? t??n kh??ng ???????c ????? tr???ng');
        } else if ($('#ma_kh').val() == '') {
          alert('T??n ????ng nh???p kh??ng ???????c ????? tr???ng');
        } else if ($('#mat_khau').val() == '') {
          alert('M???t kh???u kh??ng ???????c ????? tr???ng');
        } else if ($('#mat_khau').val().length < 8) {
          alert('M???t kh???u ph???i ??t nh???t 8 k?? t???');
        } else if ($('#mat_khau').val() != $('#re_mat_khau').val()) {
          alert('X??c nh???n m???t kh???u kh??ng ????ng');
        } else if ($('#email').val() == '') {
          alert('Email kh??ng ???????c ????? tr???ng');
        } else if (!patternEmail.test($('#email').val())) {
          alert('Vui l??ng nh???p ????ng ?????nh d???ng email');
        } else if ($('#so_dien_thoai').val().length > 0) {
          if (!patternSdt.test($('#so_dien_thoai').val())) {
            alert('Vui l??ng nh???p ????ng ?????nh d???ng')
          }
        } else {
          $.ajax({
            url: '../tai_khoan/register.php',
            type: 'POST',
            data: $(this).serializeArray(),
            success: function(data) {
              if (data == 0) {
                alert('Vui l??ng nh???p th??ng tin ????ng k??!');
              } else if (data == 2) {
                alert('Vui l??ng x??c nh???n ????ng m???t kh???u');
              } else if (data == 3) {
                alert('T??i kho???n ???? ???????c s??? d???ng');
              }else if(data == 4) {
                alert('Email ???? t???n t???i');
              }else {
                alert('????ng k?? th??nh c??ng!');
                $('.js-modalRegister').removeClass('open');
                $('#sau_register').addClass('open');
              }
            }
          })
        }

      })

      //???n hi???n pass login
      var iconHidOnPass = document.querySelector('.iconHidOnPass');
      var inputHidOnPass = document.querySelector('.inputHidOnPass');
      var x = true;

      function hidOnPass() {
        if (x) {
          inputHidOnPass.type = "text";
          iconHidOnPass.classList.remove("fa-eye");
          iconHidOnPass.classList.add("fa-eye-slash");
          x = false;
        } else {
          iconHidOnPass.classList.remove("fa-eye-slash");
          iconHidOnPass.classList.add("fa-eye");
          inputHidOnPass.type = "password";
          x = true;
        }
      }

      $('.owl-slidebanner').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 1
          }
        }
      })
      $('.owl-flash__sale').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 4
          }
        }
      })
      $('.owl-dsloai').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 4
          }
        }
      })

      $('.owl-img_detail').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: false,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 4
          }
        }
      })
      $('.owl-top10_product_favourite').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
          0: {
            items: 1
          },
          600: {
            items: 1
          },
          1000: {
            items: 6
          }
        }
      })

      setInterval(function() {
        var ful = new Date('01/01/2022 00:00:00').getTime();
        var now = new Date().getTime();
        var d = ful - now;
        var days = Math.floor(d / (1000 * 60 * 60 * 24));
        var hours = Math.floor(d / (1000 * 60 * 60));
        var mins = Math.floor(d / (1000 * 60));
        var secs = Math.floor(d / (1000));
        hours %= 24;
        mins %= 60;
        secs %= 60;
        document.getElementById('count__down-days').innerText = days;
        document.getElementById('count__down-hours').innerText = hours;
        document.getElementById('count__down-mins').innerText = mins;
        document.getElementById('count__down-secs').innerText = secs;
      }, 1000);

      // modalLogin
      var createAccount = document.querySelector('.js-createAccount');
      var modalLogin = document.querySelector('.modalLogin');
      var sbm_login = document.getElementById('sbm_login');
      var header__linkUser = document.querySelector('.user_modal');
      var modalLogin_close = document.querySelector('.modalLogin-close');
      header__linkUser.addEventListener('click', function() {
        modalLogin.classList.add('open');
      })
      sbm_login.addEventListener('click', function() {
        modalLogin.classList.add('open');
      })
      modalLogin_close.addEventListener('click', function() {
        modalLogin.classList.remove('open');
      })
      createAccount.addEventListener('click', function() {
        modalLogin.classList.remove('open');
      })
      modalLogin.addEventListener('click', function() {
        modalLogin.classList.remove('open')
      })
      // ng???ng n???i b???t
      var modalLogin_container = document.querySelector('.modalLogin-container');
      modalLogin_container.addEventListener('click', function(event) {
        event.stopPropagation();
      })

      //d??ng chung ESC s??? ????ng Modal
      var mainModals = document.querySelectorAll('.mainModal');
      window.onkeyup = function(e) {
        for (var mainModal of mainModals) {
          if (e.which == 27) {
            mainModal.classList.remove('open');
          }
        }
      }
      // modalRegister
      var modalRegister = document.querySelector('.js-modalRegister');
      var modalRegister_content = document.querySelector('.js-modalRegister-content');
      var createAccount = document.querySelector('.js-createAccount');
      var modalRegister_content_close = document.querySelector('.js-modalRegister-content-close');
      var login = document.querySelector('.js-login');
      createAccount.addEventListener('click', function() {
        modalRegister.classList.add('open');
      })
      window.onkeyup = function(e) {
        if (e.which == 27) {
          modalRegister.classList.remove('open');
        }
      }
      modalRegister.addEventListener('click', function() {
        modalRegister.classList.remove('open');
      })
      modalRegister_content.addEventListener('click', function(e) {
        e.stopPropagation();
      })
      modalRegister_content_close.addEventListener('click', function() {
        modalRegister.classList.remove('open');
      })
      login.addEventListener('click', function() {
        modalRegister.classList.remove('open');
        modalLogin.classList.add('open');
      })
    </script>

  </body>

  </html>
  <?php


} else {
  if (isset($_SESSION['khach_hang'])) {
    extract($_SESSION['khach_hang']);
    $r = khach_hang_getinfo($id_kh);
    extract($r);
    if ($kich_hoat == 0) {
      echo '<script>var r= confirm("ok");if(r==true)' . $d . '</script>'; ?>
      <!-- <script>
        var r = confirm('T??i kho???n c???a b???n ch??a ???????c k??ch ho???t. Vui l??ng li??n h??? v???i qu???n tr??? vi??n. LH 0888888888');

      </script> -->

    <?php
    } else { ?>
      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LD_SHOP</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= $CONTENT_URL ?>/lib/owlcarousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= $CONTENT_URL ?>/lib/owlcarousel/assets/owl.theme.default.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script src="<?= $CONTENT_URL ?>/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="<?= $CONTENT_URL ?>/icon/themify-icons/themify-icons.css">
        <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/base.css">
        <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/cart.css">
        <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/customer.css">
        <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/main.css">
        <link rel="shortcut icon" href="<?= $CONTENT_URL ?>/img/faviicon.png" type="image/png">

      </head>

      <body>
        <div class="wrapper">
          <div class="width100">
            <div class="container">
              <div class="row">
                <?php require_once 'trang_chinh/header.php' ?>
              </div>
            </div>
          </div>
          <?php
          require_once 'trang_chinh/menu.php';
          ?>
          <div class="width100 hr"></div>
          <div class="container">
            <!-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <?php
          $path = $_SERVER['REQUEST_URI'];
          $path = (explode('/', $path));
          $path = end($path);
          $path = (explode('?', $path));
          $path = end($path);
          $path = (explode('=', $path));
          $path = reset($path);
          if ($path == 'gioi_thieu') {
            $paths = 'Gi???i thi???u';
          } else if ($path == 'lien_he') {
            $paths = 'Li??n h???';
          } else if ($path == 'khuyen_mai') {
            $paths = 'Khuy???n m??i';
          } else if ($path == 'ma_loai') {
            $paths = 'Danh m???c';
          } else if ($path == 'ma_hh') {
            $paths = 'S???n ph???m';
          } else {
            $paths = '';
          }
          ?>
          <?php
          if (!$path == '') { ?>
            <li class="breadcrumb-item"><a href="<?= $ROOT_URL ?>">Trang ch???</a></li>
          <?php
          }
          ?>
          <?php
          if (exist_param($path)) { ?>
            <li class="breadcrumb-item active" aria-current="page"><a href="#"><?php echo $paths; ?></a></li>
          <?php
          }
          ?>
        </ol>
      </nav> -->
            <main class="main ">
              <div class="container">
                <?php include $VIEW_NAME; ?>
              </div>
          </div>
          </main>

          <div class="width100">
            <?php require_once 'trang_chinh/footer.php' ?>
          </div>
          <!-- Modal login -->
          <div class="modalLogin mainModal  ">
            <div class="modalLogin-container ">
              <div class="modalLogin-close"><i class="fas fa-times-circle"></i></div>
              <div class="modalLogin-header text-uppercase py-3 px-4 d-flex ">
                <span class="h3 modalLogin-heading"><i class="mr-3 icon__modalLogin-heading far fa-address-card"></i> ????ng
                  nh???p ho???c ????ng k??</span>
              </div>
              <div class="modalLogin-body d-flex p-5">
                <div class="modalLogin-body-login">
                  <form action="<?= $SITE_URL ?>/tai_khoan/login.php" method="post">
                    <div class="form-row align-items-center d-block">
                      <div class="col-auto mb-3">
                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="icon-input-group-text fas fa-user"></i></div>
                          </div>
                          <input type="text" class="form-control" name="username" id="inlineFormInputGroup" placeholder="T??n ????ng nh???p">
                        </div>
                      </div>
                      <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Username</label>
                        <div class="input-group mb-2 box-hidOnPass">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                          </div>
                          <input type="password" name="password" class="form-control inputHidOnPass" id="inlineFormInputGroup" placeholder="M???t kh???u">
                          <div class=""><i onclick="hidOnPass()" class="iconHidOnPass fas fa-eye"></i></div>
                        </div>
                      </div>
                      <?php
                      // require_once 'trang_chinh/login.php';
                      $error_login = "";
                      ?>
                      <div class="error_login"><?php if ($error_login != "") {
                                                  echo $error_login;
                                                } ?></div>
                      <div class="col-auto">
                        <div class=" mb-2 my-3">
                          <a href="<?= $SITE_URL ?>/tai_khoan/index.php?lost_pass" class="losePassword ">Qu??n m???t kh???u?</a>
                        </div>
                      </div>
                      <div class="col-auto">
                        <button type="submit" name="sbm_login" id="sbm_login" class="btn primary mb-2"><i class="icon-login ti-lock pr-2"></i> ????ng
                          nh???p</button>
                      </div>
                      <div class="col-auto">
                        <h5 class="py-4 heading_login-with">????ng nh???p v???i</h5>
                        <button class="btn btn-fb" type="submit"><i class="icon__login-with fab fa-facebook-square"></i>&nbsp;
                          Facebook</button>
                        <button class="btn btn-gg" type="submit"><i class="icon__login-with fab fa-google"></i>&nbsp;
                          Google</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="modalLogin-body-register border-left ml-5 pl-5">
                  <h2 class="text-uppercase modalRegister-heading">T???o t??i kho???n m???i t???i ????y</h2>
                  <p class="modalRegisterText">????ng k?? mi???n ph?? v?? d??? d??ng!</p>
                  <ul class="my-4">
                    <li class="modalRegisterText-li"><i>?????t h??ng</i></li>
                    <li class="modalRegisterText-li"><i>Thanh to??n nhanh h??n</i></li>
                    <li class="modalRegisterText-li"><i>Xem v?? theo d??i ????n h??ng v?? h??n th??? n???a</i></li>
                  </ul>
                  <div class="">
                    <button type="submit" class="btn primary my-2"><a href="#" class="link-createAccount js-createAccount">
                        T???o m???t t??i
                        kho???n</a></button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal Register -->
          <div class="modalRegister js-modalRegister">
            <div class="container register modalRegister-content js-modalRegister-content">
              <div class="modalRegister-content-close js-modalRegister-content-close"><i class="icon_modalRegister-content-close fas fa-times-circle"></i></div>
              <div class="row">
                <div class="col-md-3 register-left">
                  <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                  <h3>Ch??o m???ng</h3>
                  <p>??u ????i ch??? c??n sau 24 gi??? n???a!
                    Nhanh l??n s??? l?????ng c?? h???n
                  </p>
                  <input type="submit" name="" class="js-login" value="????ng nh???p" /><br />
                </div>
                <div class="col-md-9 register-right">
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <h3 class="register-heading">????ng k?? th??nh vi??n</h3>
                      <form action="<?= $SITE_URL ?>/tai_khoan/register.php" method="post" class="row register-form">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="text" name="ho_ten" class="form-control" placeholder="T??n c???a b???n *" value="" />
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="ma_kh" placeholder="T??n ????ng nh???p *" value="" />
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" name="mat_khau" placeholder="M???t kh???u *" value="M???t kh???u" />
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" name="re_mat_khau" placeholder="Nh???p l???i m???t kh???u *" value="" />
                          </div>

                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email c???a b???n *" value="" />
                          </div>
                          <div class="form-group">
                            <input type="text" minlength="10" maxlength="10" name="so_dien_thoai" class="form-control" placeholder="S??? ??i???n tho???i *" value="" />
                          </div>
                          <div class="form-group">
                            <fieldset>
                              <legend class="legend__countryRegister"> Th??nh Ph???</legend>
                              <select name="" id="" class="form-control">
                                <option selected disabled value="">Ph?? Th???</option>
                              </select>
                            </fieldset>
                          </div>
                          <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label px-2 check__register" for="exampleCheck1">????ng k?? th??nh
                              vi??n</label>
                          </div>
                          <input type="submit" name="sbm_register" class="btnRegister" value="????ng k??" />
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

        </div>
      
        <script>
          //???n hi???n pass login
          var iconHidOnPass = document.querySelector('.iconHidOnPass');
          var inputHidOnPass = document.querySelector('.inputHidOnPass');
          var x = true;

          function hidOnPass() {
            if (x) {
              inputHidOnPass.type = "text";
              iconHidOnPass.classList.remove("fa-eye");
              iconHidOnPass.classList.add("fa-eye-slash");
              x = false;
            } else {
              iconHidOnPass.classList.remove("fa-eye-slash");
              iconHidOnPass.classList.add("fa-eye");
              inputHidOnPass.type = "password";
              x = true;
            }
          }

          $('.owl-slidebanner').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 1
              },
              1000: {
                items: 1
              }
            }
          })
          $('.owl-flash__sale').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 1
              },
              1000: {
                items: 4
              }
            }
          })
          $('.owl-dsloai').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 1
              },
              1000: {
                items: 4
              }
            }
          })

          $('.owl-img_detail').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: false,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 1
              },
              1000: {
                items: 4
              }
            }
          })
          $('.owl-top10_product_favourite').owlCarousel({
            loop: true,
            margin: 10,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2000,
            autoplayHoverPause: true,
            responsive: {
              0: {
                items: 1
              },
              600: {
                items: 1
              },
              1000: {
                items: 6
              }
            }
          })

          setInterval(function() {
            var ful = new Date('01/01/2022 00:00:00').getTime();
            var now = new Date().getTime();
            var d = ful - now;
            var days = Math.floor(d / (1000 * 60 * 60 * 24));
            var hours = Math.floor(d / (1000 * 60 * 60));
            var mins = Math.floor(d / (1000 * 60));
            var secs = Math.floor(d / (1000));
            hours %= 24;
            mins %= 60;
            secs %= 60;
            document.getElementById('count__down-days').innerText = days;
            document.getElementById('count__down-hours').innerText = hours;
            document.getElementById('count__down-mins').innerText = mins;
            document.getElementById('count__down-secs').innerText = secs;
          }, 1000);

          // modalLogin
          var createAccount = document.querySelector('.js-createAccount');
          var modalLogin = document.querySelector('.modalLogin');
          var sbm_login = document.getElementById('sbm_login');
          var header__linkUser = document.querySelector('.user_modal');
          var modalLogin_close = document.querySelector('.modalLogin-close');
          header__linkUser.addEventListener('click', function() {
            modalLogin.classList.add('open');
          })
          sbm_login.addEventListener('click', function() {
            modalLogin.classList.add('open');
          })
          modalLogin_close.addEventListener('click', function() {
            modalLogin.classList.remove('open');
          })
          createAccount.addEventListener('click', function() {
            modalLogin.classList.remove('open');
          })
          modalLogin.addEventListener('click', function() {
            modalLogin.classList.remove('open')
          })
          // ng???ng n???i b???t
          var modalLogin_container = document.querySelector('.modalLogin-container');
          modalLogin_container.addEventListener('click', function(event) {
            event.stopPropagation();
          })

          //d??ng chung ESC s??? ????ng Modal
          var mainModals = document.querySelectorAll('.mainModal');
          window.onkeyup = function(e) {
            for (var mainModal of mainModals) {
              if (e.which == 27) {
                mainModal.classList.remove('open');
              }
            }
          }
          // modalRegister
          var modalRegister = document.querySelector('.js-modalRegister');
          var modalRegister_content = document.querySelector('.js-modalRegister-content');
          var createAccount = document.querySelector('.js-createAccount');
          var modalRegister_content_close = document.querySelector('.js-modalRegister-content-close');
          var login = document.querySelector('.js-login');
          createAccount.addEventListener('click', function() {
            modalRegister.classList.add('open');
          })
          window.onkeyup = function(e) {
            if (e.which == 27) {
              modalRegister.classList.remove('open');
            }
          }
          modalRegister.addEventListener('click', function() {
            modalRegister.classList.remove('open');
          })
          modalRegister_content.addEventListener('click', function(e) {
            e.stopPropagation();
          })
          modalRegister_content_close.addEventListener('click', function() {
            modalRegister.classList.remove('open');
          })
          login.addEventListener('click', function() {
            modalRegister.classList.remove('open');
            modalLogin.classList.add('open');
          })
        </script>


      </body>

      </html>
<?php

    }
  }
}
?>