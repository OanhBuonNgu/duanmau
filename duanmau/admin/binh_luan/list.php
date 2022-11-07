<h5 class="alert alert-primary">Tổng hợp bình luận</h5>
<?php
$dshh=hang_hoa_select_all_exist_bl();
$i = 0;
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mã </th>
            <th style="width:40%" scope="col">Hàng hoá</th>
            <th scope="col">Số bình luận</th>
            <th scope="col">Mới nhất</th>
            <th scope="col">Cũ nhất</th>
            <th></th>

        </tr>
    </thead>
    <tbody>

        <?php
        foreach ($dshh as $hh) {
            extract($hh);
            $dsbl = binh_luan_select_all_ma_hh($ma_hh);
            $dsbl_new = binh_luan_select_all_ma_hh_new($ma_hh);
            $dsbl_old = binh_luan_select_all_ma_hh_old($ma_hh);
            if(count($dsbl_new)>0){
                $bl_new = reset($dsbl_new);
            }
            if(count($dsbl_old)>0){
                $bl_old = reset($dsbl_old);
            }
            $i++; ?>
            <tr>

                <td scope="row"><?php echo $i; ?></td>
                <td scope="row"><?php echo $ma_hh; ?></td>
                <td><?php echo $ten_hh; ?></td>
                <td><?php echo count($dsbl); ?></td>
                <td><?php echo $bl_new['ngay_bl']; ?></td>
                <td><?php echo $bl_old['ngay_bl']; ?></td>
                <td><a href="<?=$ADMIN_URL?>/binh_luan/?chi_tiet_bl&ma_hh=<?php echo $ma_hh;?>">Chi tiết</a></td>

            </tr>
        <?php


        }
        ?>
    </tbody>
</table>