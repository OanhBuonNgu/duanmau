<h5 class="alert alert-primary">Danh sách hàng hoá</h5>
<h5 class="alert alert-success" id="remove_element"><?php if (isset($alert) && ($alert != "")) echo $alert; ?></h5>
<?php
if (is_array($items)) {
    if (isset($items) && count($items) > 0) { ?>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã </th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Tên </th>
                    <th scope="col">Số lượng </th>
                    <th scope="col">Tồn kho</th>
                    <th scope="col">Đơn giá </th>
                    <th scope="col">Giảm giá (%) </th>
                    <th scope="col">Lượt xem </th>
                    <th scope="col">Ngày nhập </th>
                    <th scope="col">Danh mục </th>
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
                        <td><?php echo $ma_hh ?></td>
                        <td><img style="width:80px" src="<?= $ADMIN_URL ?>/hang_hoa/upload/<?php echo $hinh; ?>" alt=""></td>
                        <td><?php echo $ten_hh ?></td>
                        <td><?php echo $so_luong ?></td>

                        <td><?php echo ($so_luong - hang_hoa_count_so_luong($ma_hh)); ?></td>
                        <td><?php echo number_format($don_gia, 0, ',', '.') . 'đ'; ?></td>
                        <td><?php echo $giam_gia ?></td>
                        <td><?php echo $so_luot_xem ?></td>
                        <td><?php echo $ngay_nhap ?></td>
                        <td><?php echo $ma_loai ?></td>
                        <td><a href="index.php?btn_edit&ma_hh=<?php echo $ma_hh ?>">Sửa</a> </td>
                        <td><a onclick="return confirm('Bạn có muốn xoá  <?php echo $ten_hh ?> này không?')" href="index.php?btn_delete&ma_hh=<?php echo $ma_hh ?>">Xoá</a> </td>
                    </tr>

            </tbody>
        <?php
                }
        ?>
        <tfoot>
            <tr>
                <td colspan="13">
                    <a href="index.php"><button class="btn btn-primary">Thêm mới</button></a>
                </td>


            </tr>
        </tfoot>

        </table>
    <?php
    } else { ?>
        <h5 class="alert alert-danger">Không tìm thấy hàng hoá phù hợp</h5>
<?php
    }
}else{?>
    <h5 class="alert alert-danger">Không tìm thấy hàng hoá phù hợp</h5>
<?php
}
?>

<script>
    var e = document.getElementById('remove_element');
    if (e.textContent == '') {
        e.remove();
    }
</script>