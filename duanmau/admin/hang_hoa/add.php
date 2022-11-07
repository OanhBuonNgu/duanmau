<h5 class="alert alert-primary">Thêm mới hàng hoá</h5>
<?php
?>

<form action="index.php?btn_insert" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="inputAddress2">Tên hàng hoá</label>
        <input type="text" name="ten_hh" class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Đơn giá</label>
        <input type="text" name="don_gia" class="form-control" id="inputAddress2" placeholder="">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Số lượng</label>
        <input type="text" name="so_luong" class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Giảm giá</label>
        <input type="text" name="giam_gia" placeholder="Nhập % giảm giá..." class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Hình ảnh sản phẩm</label>
        <input type="file" name="hinh_anh" class="form-control" id="inputAddress2" placeholder="">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Hình ảnh mô tả</label>
        <input type="file" name="hinh_anh_mo_ta[]" multiple="multiple" class="form-control" id="inputAddress2" placeholder="">
    </div>
   
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="mo_ta" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="inputAddress2">Đặc biệt</label>
        <select class="form-control" name="dac_biet" aria-label="Default select example">
            <option selected value="0">0</option>
            <option value="1">1</option>
        </select>
    </div>

    <div class="form-group">
        <label for="inputAddress2">Số lượt xem</label>
        <input type="text" name="so_luot_xem" readonly class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Mã loại</label>
        <select class="form-control" name="ma_loai" aria-label="Default select example">
            <?php
            foreach ($loai_hang as $hang) {
                extract($hang);
            ?>
                <option value="<?php echo $ma_loai ?>"><?php echo $ten_loai ?></option>
            <?php
            }
            ?>
        </select>
    </div>
    <button class="btn btn-primary" type="submit" name="sbm_insert">
        Thêm
    </button>
    <button type="reset" class="btn btn-primary" name="">Nhập lại</button>
    <a href="index.php?btn_list"><button class="btn btn-primary">Danh sách</button></a>

</form>