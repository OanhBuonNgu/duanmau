<h5 class="alert alert-primary">Thêm mới loại hàng</h5>
<?php
?>
<form action="index.php?btn_insert" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputPassword1">Mã loại</label>
        <input type="text" disabled class="form-control" id="exampleInputPassword1" placeholder="Tự tăng...">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Tên loại</label>
        <input type="text" name="ten_loai" class="form-control" id="exampleInputPassword1" placeholder="Tên loại...">
    </div>

    <button class="btn btn-primary" type="submit" name="sbm_insert">
        Thêm
    </button>
    <button type="reset" class="btn btn-primary" name="">Nhập lại</button>
    <a href="index.php?btn_list"><button class="btn btn-primary">Danh sách</button></a>

</form>

<?php
?>
<script>
   
</script>