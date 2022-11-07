<h5 class="alert alert-primary">Danh sách loại hàng</h5>
<h5 class="alert alert-success" id="remove_element"><?php if (isset($alert) && ($alert != "")) echo $alert; ?></h5>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mã loại</th>
            <th scope="col">Tên loại</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xoá</th>

        </tr>
    </thead>

    <tbody>
        <?php
        $i = 0;
        foreach ($items as $item) {
            extract($item);
            $i++;
        ?>
            <tr>

                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $ma_loai ?></td>
                <td><?php echo $ten_loai ?></td>
                <td><a href="index.php?btn_edit&ma_loai=<?php echo $ma_loai ?>">Sửa</a> </td>
                <td><a onclick="return confirm('Bạn có muốn xoá  <?php echo $ten_loai ?> này không?')" href="index.php?btn_delete&ma_loai=<?php echo $ma_loai ?>">Xoá</a> </td>
            </tr>

    </tbody>
<?php
        }
?>
<tfoot>
    <tr>
        <td colspan="5">

            <a href="index.php"><button class="btn btn-primary">Thêm mới</button></a>
        </td>


    </tr>
</tfoot>

</table>

<script>
    var e = document.getElementById('remove_element');
    if (e.textContent == '') {
        e.remove();
    }
</script>