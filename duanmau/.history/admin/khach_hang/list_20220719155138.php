<h5 class="alert alert-primary">Danh sách khách hàng</h5>
<h5 class="alert alert-success" id="remove_element"><?php if (isset($alert) && ($alert != "")) echo $alert; ?></h5>
<table class="table ">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID </th>
            <th scope="col">Mã khách hàng</th>
            <th scope="col">Hình ảnh </th>
            <th scope="col">Họ tên</th>
            <th scope="col">Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Vai trò</th>
            <th scope="col">Kích hoạt</th>
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
                <td><input type="checkbox" class="check"></td>
                <td><?php echo $id_kh ?></td>
                <td><?php echo $ma_kh ?></td>
                <td><img style="width:70px" src="<?= $ADMIN_URL ?>/khach_hang/upload/<?php echo $hinh ?>" alt=""></td>
                <td><?php echo $ho_ten ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $so_dien_thoai ?></td>
                <td><?php echo $vai_tro ?></td>
                <td><?php echo $kich_hoat ?></td>
                <td><a href="index.php?btn_edit&id_kh=<?php echo $id_kh ?>">Sửa</a> </td>
                <?php if (isset($_SESSION['khach_hang'])) {
                    if ($_SESSION['khach_hang']['id_kh'] != $id_kh) { ?>
                        <td><a onclick="return confirm('Bạn có muốn xoá  <?php echo $ma_kh ?> này không?')" href="index.php?btn_delete&id_kh=<?php echo $id_kh ?>">Xoá</a> </td>
                    <?php
                    } else { ?>
                        <td><a onclick="return confirm('Bạn không thể xoá chính bạn')" href="#">Xoá</a> </td>
                <?php
                    }
                }
                ?>
            </tr>

    </tbody>
<?php
        }
?>
<tfoot>
    <tr>
        <td colspan="10">
            <a href="index.php"><button class="btn btn-primary">Thêm mới</button></a>
            <label for="checkall" class="btn btn-primary select">Chọn tất cả</label>
            <label for="checkall" class="btn btn-primary unselect">Bỏ chọn</label>
            <input type="checkbox" id="checkall">
        </td>


    </tr>
</tfoot>

</table>

<script>
    var e = document.getElementById('remove_element');
    if (e.textContent == '') {
        e.remove();
    }
    var checks = document.querySelectorAll('.check');
    var checkall = document.getElementById('checkall');
    var select = document.querySelector('.select');
    var unselect = document.querySelector('.unselect');
   
</script>