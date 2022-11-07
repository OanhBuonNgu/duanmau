<header class="header col ">

  <div class="header__logo">
    <!-- <h2><a href="index.php">LD-Shop</a></h2> -->
    <!-- <img src="https://img.icons8.com/dotty/50/000000/monitor.png"/> -->
    <a href="<?= $SITE_URL ?>/trang_chinh/"><img class="mb-3" style="width:300px;" src="../../content/img/logooo.png" alt=""></a>
  </div>
  <form action="../hang_hoa/liet_ke.php" method="get" class="header__search">
    <input class="header__input" name="keyword" autocomplete="off" placeholder="Nhập để tìm kiếm sản phẩm...">
    <button type="submit" class="header__btn">
      <i class="ti-search"></i>
    </button>
  </form>

  <a href="<?= $SITE_URL ?>/gio_hang/index.php?view_cart" class="header__cart text-center text-dark">
    <i class="icon__header cart ti-shopping-cart">
      <div class="cart__items">
        <?php
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
          echo count($_SESSION['cart']);
        } else {
          echo "0";
        }

        ?>
      </div>
    </i>
    <p>Giỏ hàng</p>
  </a>
 

  <?php

  if (!isset($_SESSION['khach_hang'])) { ?>
    <a href="#" class="header__link user_modal header__user text-center text-dark">
      <i class=" fas fa-user"></i>
      <p>Đăng nhập</p>
    </a>
  <?php
  } else {
    $kh = khach_hang_getinfo($_SESSION['khach_hang']['id_kh']);
    extract($kh); ?>
    <div class="header__user text-center text-dark">
      <?php
      if ($hinh == '') { ?>
        <img src="<?= $CONTENT_URL ?>/img/avatar.png" alt="" class="avatar"></img>
      <?php
      } else { ?>
        <img src="<?= $ADMIN_URL ?>/khach_hang/upload/<?php echo $hinh; ?>" alt="" class="avatar"></img>
      <?php
      }
      ?>
      <p><?php echo $ho_ten; ?></p>
      <?php if ($vai_tro == 1) { ?>
        <ul class="user__dropDown margin text-left py-3">
          <li class="user__dropDown-items py-2 px-4"><a href="<?=$SITE_URL?>/tai_khoan/index.php?my_order" class="user__dropDown-items-link"> Đơn hàng của
              tôi</a></li>
          <li class="user__dropDown-items py-2 px-4"><a href="" class="user__dropDown-items-link"> Thông báo của
              tôi <span class="countNotify">5</span></a></li>
          <li class="user__dropDown-items py-2 px-4"><a href="<?= $SITE_URL ?>/tai_khoan/index.php?lost_pass" class="user__dropDown-items-link"> Quên mật khẩu</a></li>
          <li class="user__dropDown-items py-2 px-4"><a href="<?= $SITE_URL ?>/tai_khoan" class="user__dropDown-items-link">
              Tài khoản của tôi</a></li>
          <li class="user__dropDown-items py-2 px-4"><a href="<?= $SITE_URL ?>/tai_khoan/logout.php" class="user__dropDown-items-link"> Đăng xuất</a>
          </li>
          <?php
          if ($vai_tro == 1) { ?>
            <li class="user__dropDown-items py-2 px-4"><a href="<?= $ADMIN_URL ?>/trang_chinh" class="user__dropDown-items-link"> Quản trị</a>
            </li>
          <?php
          }
          ?>
        </ul>
      <?php
      } else { ?>
        <ul class="user__dropDown text-left py-3">
          <li class="user__dropDown-items py-2 px-4"><a href="<?=$SITE_URL?>/tai_khoan/index.php?my_order" class="user__dropDown-items-link"> Đơn hàng của
              tôi</a></li>
          <li class="user__dropDown-items py-2 px-4"><a href="" class="user__dropDown-items-link"> Thông báo của
              tôi <span class="countNotify">5</span></a></li>
          <li class="user__dropDown-items py-2 px-4"><a href="<?= $SITE_URL ?>/tai_khoan/index.php?lost_pass" class="user__dropDown-items-link"> Quên mật khẩu</a></li>
          <li class="user__dropDown-items py-2 px-4"><a href="<?= $SITE_URL ?>/tai_khoan" class="user__dropDown-items-link">
              Tài khoản của tôi</a></li>
          <li class="user__dropDown-items py-2 px-4"><a href="<?= $SITE_URL ?>/tai_khoan/logout.php" class="user__dropDown-items-link"> Đăng xuất</a>
          </li>
          <?php
          if ($vai_tro == 1) { ?>
            <li class="user__dropDown-items py-2 px-4"><a href="<?= $ADMIN_URL ?>/trang_chinh" class="user__dropDown-items-link"> Quản trị</a>
            </li>
          <?php
          }
          ?>
        </ul>
      <?php
      } ?>
    </div>
  <?php
  }
  ?>

  <!-- <a href="" class="header__wishlist text-center text-dark">
                        <i class=" ti-heart"></i>
                        <p>Yêu thích</p>
                      </a> -->

</header>