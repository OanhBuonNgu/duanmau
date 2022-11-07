<?php
if (is_array($don_hang_all)) {
    foreach ($don_hang_all as $dh) {
        extract($dh);
        extract(hang_hoa_select_by_id($ma_hh));
        extract(khach_hang_getinfo($id_kh));
    }
}
?>
<h5 class="alert alert-primary">Tất cả đơn hàng</h5>
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
            <th scope="col">Địa chỉ</th>
            <th scope="col">Trạng thái</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($don_hang_all as $dh) {
            extract($dh);
            extract(hang_hoa_select_by_id($ma_hh));
            extract(khach_hang_getinfo($id_kh));
            $i++; ?>
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $id_hoa_don; ?></td>
                <td><?php echo $ma_hh; ?></td>
                <td><?php echo $ho_ten; ?></td>
                <td><?php echo $ngay_dat_hang; ?></td>
                <td class="text-overflow"><?php echo $ten_hh; ?></td>
                <td><?php echo $so_luong_mua; ?></td>
                <td><?php echo $don_gia; ?></td>
                <td><?php echo $so_luong_mua * hang_hoa_giam_gia($giam_gia,$don_gia); ?></td>
                <td><?php echo $dia_chi; ?></td>
                <td class="text-danger"><?php echo $tinh_trang; ?></td>
            </tr>

        <?php
        }
        ?>

    </tbody>
</table>
<td><a href="<?= $ADMIN_URL ?>/don_hang/" class="btn btn-primary">Đơn hàng mới</a></td>
<td><a href="<?= $ADMIN_URL ?>/don_hang?da_xac_nhan" class="btn btn-primary">Đơn hàng đã xác nhận</a></td>
<td><a href="<?= $ADMIN_URL ?>/don_hang?da_giao" class="btn btn-primary">Đơn hàng đã giao</a></td>
<td><a href="<?= $ADMIN_URL ?>/don_hang?huy" class="btn btn-primary">Đơn hàng huỷ</a></td>