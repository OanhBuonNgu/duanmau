<h5 class="alert alert-primary">Thêm mới khách hàng</h5>
<?php
?>

<form action="index.php?btn_insert" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="inputAddress2">Mã khách hàng</label>
        <input type="text" name="ma_kh" class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Mật khẩu</label>
        <input type="text" name="mat_khau" class="form-control" id="inputAddress2" placeholder="">
    </div>
    <div class="form-group">
        <label for="inputAddress2">Họ Tên</label>
        <input type="text" name="ho_ten" class="form-control" id="inputAddress2" placeholder="">
    </div>


    <div class="form-group">
        <label for="inputAddress2">Hình ảnh</label>
        <input type="file" name="hinh_anh" class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Số điên thoại</label>
        <input type="text" name="so_dien_thoai" class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Kích hoạt</label>
        <select class="form-control" name="kich_hoat" aria-label="Default select example">
            <option value="1">Kích hoạt</option>
            <option value="0">Huỷ kích hoạt</option>
        </select>
    </div>

    <div class="form-group">
        <label for="inputAddress2">Email</label>
        <input type="text" name="email" class="form-control" id="inputAddress2" placeholder="">
    </div>

    <div class="form-group">
        <label for="inputAddress2">Địa chỉ</label>
        <textarea  name="dia_chi" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="inputAddress2">Vai trò</label>
        <select class="form-control" name="vai_tro" aria-label="Default select example">
            <option value="0">Người dùng</option>
            <option value="1">Admin</option>

        </select>
    </div>
    <button class="btn btn-primary" type="submit" name="sbm_insert">
        Thêm
    </button>
    <button type="reset" class="btn btn-primary" name="">Nhập lại</button>
    <a href="index.php?btn_list"><button class="btn btn-primary">Danh sách</button></a>

</form>

<?php
?>