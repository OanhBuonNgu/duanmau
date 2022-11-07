<?php
//quen mat khau
if (isset($_SESSION['khach_hang'])) {
    extract($_SESSION['khach_hang']);
    khach_hang_getinfo($id_kh);
    $r = khach_hang_getinfo($id_kh);
    extract($r);
}

?>
<div class="account__inner">
    <h3 class="account__inner-heading alert alert-primary py-4">
        Quên mật khẩu
    </h3>
    <div class="account__inner-content">
        <form action="" method="post" enctype="multipart/form">
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label font-size-primary">Email của bạn</label>
                <div class="col-sm-10">
                    <input type="text" name="nhap_email" class="form-control" id="inputName">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" name="lost_pass" class="btn btn-primary font-size-primary">Gửi</button>
                    <input class="btn btn-primary font-size-primary" type="reset" value="Nhập lại">
                </div>
            </div>
        </form>
        <?php
        require_once 'lost_pass_xu_li.php';
        if (isset($_POST['lost_pass'])) {
            if (is_array($kh) && count($kh) > 0) { ?>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 text-danger font-size-primary">
                        Mật khẩu của bạn là <?php echo $r['mat_khau'] ?>
                    </div>
                </div>
            <?php
            } else { ?>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 text-danger font-size-primary">
                        Vui lòng nhập đúng địa chỉ email
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
</div>