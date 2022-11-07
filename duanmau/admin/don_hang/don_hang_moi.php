<?php
if (isset($don_hang_moi)) {
    if (is_array($don_hang_moi)) {
        if (count($don_hang_moi) > 0) {
            foreach ($don_hang_moi as $dh) {
                extract($dh);
                extract(hang_hoa_select_by_id($ma_hh));
                extract(khach_hang_getinfo($id_kh));
            }
        }
    }
}

?>
<h5 class="alert alert-primary">Đơn hàng mới</h5>
<?php
if (isset($don_hang_moi)) { ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Mã hàng hoá</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Ngày mua</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Số lượng mua</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Điện thoại</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Trạng thái</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            if (isset($don_hang_moi)) {
                if (count($don_hang_moi) > 0) {
                    foreach ($don_hang_moi as $dh) {
                        extract($dh);
                        extract(hang_hoa_select_by_id($ma_hh));
                        extract(khach_hang_getinfo($id_kh));
                        $i++; ?>
                        <tr>
                            <td scope="row"><?php echo $i; ?></td>
                            <td><?php echo $id_hoa_don; ?></td>
                            <td><?php echo $ma_hh; ?></td>
                            <td><?php echo $ho_ten; ?></td>
                            <td><?php echo $ngay_dat_hang; ?></td>
                            <td class="text-overflow"><?php echo $ten_hh; ?></td>
                            <td><?php echo $so_luong_mua; ?></td>
                            <td><?php echo $don_gia; ?></td>
                            <td><?php echo $so_luong_mua * hang_hoa_giam_gia($giam_gia, $don_gia); ?></td>
                            <td><?php echo $so_dien_thoai; ?></td>
                            <td><?php echo $dia_chi; ?></td>
                            <td>
                                <p class="text-danger"><?php echo $tinh_trang; ?></p> <a href="index.php?xac_nhan_don_hang&id_hoa_don=<?php echo $id_hoa_don ?>" style="font-size:.7rem" class="btn btn-info font-size7">Xác nhận</a><a href="index.php?huy_don_hang&id_hoa_don=<?php echo $id_hoa_don;?>" style="font-size:.7rem" class="btn btn-danger font-size7">Huỷ</a>
                            </td>
                        </tr>
                    <?php
                    }
                } else { ?>
                    <h5 class="alert alert-danger">Hiện tại chưa có đơn hàng nào</h5>
            <?php
                }
            }
            ?>

        </tbody>

    </table>
<?php
} else { ?>
    <h5 class="alert alert-danger">Hiện tại chưa có đơn hàng nào</h5>
<?php
}
?>

<td class=""><a class="btn btn-primary" href="javascript:history.back()">Quay lại</a></td>