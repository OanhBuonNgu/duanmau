<?php
require_once '../../dao/khach_hang.php';
require_once '../../dao/hoa_don.php';
// if(isset($_SESSION['khach_hang'])){
//     extract($_SESSION['khach_hang']);
//     khach_hang_getinfo($id_kh);
// }
if (!isset($_SESSION['khach_hang'])) {
} else {
    $r = khach_hang_getinfo($id_kh);
    extract($r);
    $sql = "SELECT *FROM hoa_don where id_kh = '" . $id_kh . "'";
    $hoa_don = pdo_query($sql);
    if (count($hoa_don) > 0) {
        extract($hoa_don);

?>

        <div class="account__inner">
            <h3 class="account__inner-heading py-4">
                Đơn hàng của tôi
            </h3>
            <div class="account__inner-content">

                <table class="table bg-white">
                    <thead>

                        <tr>
                            <th style="border-top: none !important" scope="col">Mã đơn hàng</th>
                            <th style="border-top: none !important" scope="col">Ngày mua</th>
                            <th style="border-top: none !important ;width:40%" scope="col">Sản phẩm</th>
                            <th style="border-top: none !important" scope="col">Tổng tiền</th>
                            <th style="border-top: none !important" scope="col">Trạng thái</th>

                        </tr>
                    </thead>
                    <tbody>
                        <style>
                            table th {
                                border-bottom: none !important;
                            }

                            tr:hover {
                                background-color: rgba(23, 162, 184, 0.1);
                            }
                        </style>
                        <?php
                        $hoadonall = hoa_don_one_khach_hang($id_kh);
                        foreach ($hoadonall as $hd) {

                            extract($hd);
                        ?>
                            <tr>
                                <td class="text-primary"><?php echo $id_hoa_don; ?></td>
                                <td><?php echo $ngay_dat_hang; ?></td>
                                <td><?php echo $ten_hh; ?></td>
                                <td><?php echo number_format($tong_tien, 0, ',', '.') . 'đ'; ?></td>
                                <?php if ($tinh_trang == 'daxacnhan') { ?>
                                    <td class="text-danger">Đã xác nhận</td>

                                <?php
                                } else if ($tinh_trang == 'huy') { ?>
                                    <td class="text-danger">Đã huỷ</td>

                                <?php
                                }else if($tinh_trang == 'dagiao'){?>
                                    <td class="text-danger">Giao hàng thành công</td>

                                    <?php
                                } else { ?>
                                    <td class="text-danger">
                                        <p>Chưa xác nhận</p><a class="btn btn-primary" href="<?= $ADMIN_URL ?>/don_hang/index.php?huy_don_hang&id_hoa_don=<?php echo $id_hoa_don; ?>">Huỷ</a>
                                    </td>

                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    <?php
    } else { ?>

        <div class="account__inner">
            <h3 class="account__inner-heading py-4">
                Đơn hàng của tôi
            </h3>
            <div class="account__inner-content">
                <input type="hidden" name="id_kh" value="<?php echo $id_kh; ?>">
                <h4>Bạn chưa có đơn hàng nào.</h4>
            </div>
        </div>

<?php
    }
}
?>