<h5 class="alert alert-primary">Cập nhật hàng hoá</h5>
<?php
if (is_array($hang_hoa_info)) {
    extract($hang_hoa_info);
}
if (is_array($hang_hoa_info)) {
    extract($hang_hoa_info);
}
?>

<form action="index.php?btn_update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ma_hh" value="<?php echo $ma_hh ?>">
    <div class="form-group">
        <label for="inputAddress2">Tên hàng hoá</label>
        <input type="text" name="ten_hh" class="form-control" value="<?php echo $ten_hh ?>" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Đơn giá</label>
        <input type="text" name="don_gia" class="form-control" value="<?php echo $don_gia ?>" id="inputAddress2" placeholder="">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Số lượng</label>
        <input type="text" name="so_luong" class="form-control" value="<?php echo $so_luong ?>" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Giảm giá</label>
        <input type="text" name="giam_gia" value="<?php echo $giam_gia ?>" class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Hình ảnh sản phẩm</label>
        <input type="file" name="hinh_anh" class="form-control" id="inputAddress2" placeholder="">
        <img style="width:200px" src="upload/<?php echo $hinh ?>" alt="">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Hình ảnh mô tả sản phẩm</label>
        <input type="file" name="hinh_anh_mo_ta[]" class="form-control" multiple="multiple" id="inputAddress2" placeholder="">
        <?php
        $sql = "select * from images where ma_hh=?";
        $hang_hoa_images = pdo_query($sql,$ma_hh);
        foreach ($hang_hoa_images as $hh_imgs) {
            extract($hh_imgs); ?>
            <img style="width:100px;" src="upload/<?php echo $images ?>" alt="">
        <?php
        }
        ?>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="mo_ta" rows="3"><?php echo $mo_ta;?></textarea>
    </div>

    <div class="form-group">
        <label for="inputAddress2">Đặc biệt</label>
        <select class="form-control" name="dac_biet" aria-label="Default select example">
            <option selected value="<?php echo $dac_biet ?>"><?php echo $dac_biet ?></option>
            <option value="0">0</option>
        </select>
    </div>

    <div class="form-group">
        <label for="inputAddress2">Số lượt xem</label>
        <input type="text" value="<?php echo $so_luot_xem ?>" name="so_luot_xem" readonly class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Mã loại</label>
        <select class="form-control" name="ma_loai" aria-label="Default select example">
            <?php
            foreach ($loai_hang as $hang) {
                extract($hang);
                if ($loai_hang[$ma_loai] == $hang_hoa_info[$ma_loai]) { ?>
                    <option selected value="<?php echo $ma_loai ?>"><?php echo $ten_loai ?></option>
                <?php
                } else {
                ?>
                    <option value="<?php echo $ma_loai ?>"><?php echo $ten_loai ?></option>
            <?php
                }
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