<h5 class="alert alert-primary">Cập nhật loại hàng</h5>
<?php
if (is_array($loai_info)) {
    extract($loai_info);
}
?>
<form action="index.php?btn_update" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ma_loai" value="<?php echo $ma_loai; ?>">
    <div class="form-group">
        <label for="exampleInputPassword1">Mã loại</label>
        <input type="text" disabled class="form-control" id="exampleInputPassword1" value="<?php echo $ma_loai ?>" placeholder="">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Tên loại</label>
        <input type="text" name="ten_loai" class="form-control" value="<?php echo $ten_loai; ?>" id="exampleInputPassword1" placeholder="">
    </div>
    <button class="btn btn-primary" type="submit" name="sbm_update">
        Cập nhật
    </button>
    <button type="reset" class="btn btn-primary" name="">Nhập lại</button>
    <a href="index.php?btn_list"><button class="btn btn-primary">Danh sách</button></a>

</form>
<?php
?>