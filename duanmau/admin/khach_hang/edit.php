<h5 class="alert alert-primary">Cập nhật khách hàng</h5>

<?php
if (is_array($khach_hang_info)) {
    extract($khach_hang_info);
}
?>

<form action="index.php?btn_update" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $id_kh; ?>" name="id_kh">
    <div class="form-group">
        <label for="inputAddress2">Mã khách hàng</label>
        <input type="text" value="<?php echo $ma_kh ?>" name="ma_kh" class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Mật khẩu</label>
        <input type="text" value="<?php echo $mat_khau ?>" name="mat_khau" class="form-control" id="inputAddress2" placeholder="">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Họ Tên</label>
        <input type="text" value="<?php echo $ho_ten ?>" name="ho_ten" class="form-control" id="inputAddress2" placeholder="">
    </div>
    <?php
    if (is_array($khach_hang_info)) {
        extract($khach_hang_info);
    }
    ?>

    <div class="form-group">
        <label for="inputAddress2">Hình ảnh</label>
        <input type="file" name="hinh_anh" class="form-control" id="inputAddress2" placeholder="">
        <img style="width:80px" src="upload/<?php echo $hinh ?>" alt="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Số điên thoại</label>
        <input type="text" value="<?php echo $so_dien_thoai ?>" name="so_dien_thoai" class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Kích hoạt</label>
        <select class="form-control" name="kich_hoat" aria-label="Default select example">
            <?php
            if ($kich_hoat == 1) { ?>
                <option selected value="<?php echo $kich_hoat; ?>"><?php echo 'Kích hoạt' ?></option>
                <option value="0">Huỷ kích hoạt</option>
            <?php
            } else { ?>
                <option selected value="<?php echo $kich_hoat; ?>"><?php echo 'Huỷ kích hoạt'; ?></option>
                <option value="1">Kích hoạt</option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="inputAddress2">Email</label>
        <input type="text" value="<?php echo $email ?>" name="email" class="form-control" id="inputAddress2" placeholder="">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Địa chỉ</label>
        <textarea name="dia_chi"  class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $dia_chi;?></textarea>
    </div>

    <div class="form-group">
        <label for="inputAddress2">Vai trò</label>
        <select class="form-control" name="vai_tro" aria-label="Default select example">
            <?php
            if ($vai_tro == 0) { ?>
                <option selected value="<?php echo $vai_tro ?>">Người dùng</option>
                <option value="1">Admin</option>
            <?php
            } else { ?>
             <option selected value="<?php echo $vai_tro ?>">Admin</option>
                <option value="0">Người dùng</option>
            <?php
            }
            ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit" name="sbm_update">
        Cập nhật
    </button>
    <button type="reset" class="btn btn-primary" name="">Nhập lại</button>
    <a href="index.php?btn_list"><button class="btn btn-primary">Danh sách</button></a>

</form>

<?php
?>