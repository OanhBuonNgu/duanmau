<?php
$ma_hh = $_GET["ma_hh"];
$dsbl = binh_luan_select_all_ma_hh($ma_hh);
foreach ($dsbl as $bl) {
    extract($bl);
}
?>
<?php
if (count($dsbl) > 0) { ?>
    <h5 class="alert alert-primary">Hàng hoá <?php if (count($dsbl) > 0) echo $ten_hh ?><?php ?></h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nội dung </th>
                <th scope="col">Người bình luận </th>
                <th scope="col">Ngày bình luận </th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($dsbl as $bl) {
                extract($bl);
                $i++; ?>
                <tr>
                    <td scope="row"><?php echo $i; ?></td>
                    <td><?php echo $noi_dung; ?></td>
                    <td><?php echo $ho_ten; ?></td>
                    <td><?php echo $ngay_bl; ?></td>
                    <td><a href="<?= $ADMIN_URL ?>/binh_luan/?delete_bl&ma_bl=<?php echo $ma_bl; ?>">Xoá</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <a class="btn btn-primary" href="javascript:history.back();">Quay lại</a>
<?php

} else {?>
<h5 class="alert alert-danger">Không có bình luận nào</h5>
<a href="javascript:history.back();" class="btn btn-primary">Quay lại</a>
<?php
    
}
?>