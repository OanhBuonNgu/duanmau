<?php
require_once '../../dao/loai.php';
$laptop =  hang_hoa_select_loai(134);
$manhinh =  hang_hoa_select_loai(133);
$linhkien=hang_hoa_select_loai(145);
$tan_nhiet=hang_hoa_select_loai(146);
$thietbi=hang_hoa_select_loai(147);
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Thong ke danh muc'],
            ['Laptop', <?php echo $laptop; ?>],
            ['Màn hình máy tính', <?php echo $manhinh; ?>],
            ['Linh kiện máy tính', <?php echo $linhkien;?>],
            ['Tản nhiệt', <?php echo $tan_nhiet;?>],
            ['Thiết bị mạng', <?php echo $thietbi;?>]

        ]);

        var options = {
            title: 'Biểu đồ thống kê hàng hoá theo loại'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
    }
</script>
<div class="col">

    <div class="overview ">
        <div class="mt-1 mb-4 overview-heading d-flex justify-content-between align-items-center">
            <h2 class="overview_title">
                Tổng quát
            </h2>
            <div class="overview_add_items">
                <a href="<?= $ADMIN_URL ?>/hang_hoa/index.php"> <button type="button" class="btn btn-primary ">+ Thêm mặt hàng</button></a>
            </div>
        </div>
        <?php
        require_once '../../dao/don_hang.php';

        ?>
        <div class="overview_list">
            <a href="<?= $ADMIN_URL ?>/don_hang/index.php?tong_don_hang">
                <div class="overview_items ">
                    <i class=" icon_overview fas fa-list-alt"></i>
                    <h4 class="count_items"><?php echo count(don_hang_all()) ?></h4>
                    <b>Tổng đơn hàng </b>
                </div>
            </a>
            <a href="<?= $ADMIN_URL ?>/don_hang/index.php?chua_xac_nhan">
                <div class="overview_items ">
                    <i class=" icon_overview fas fa-question-circle"></i>
                    <h4 class="count_items"><?php echo count(don_hang_moi()) ?></h4>
                    <b>Chưa xác nhận </b>

                </div>
            </a>
            <a href="<?= $ADMIN_URL ?>/don_hang/index.php?da_xac_nhan">
                <div class="overview_items ">
                    <i class=" icon_overview fas fa-check-square"></i>
                    <h4 class="count_items"><?php echo count(don_hang_da_xac_nhan()) ?></h4>
                    <b>Đã xác nhận </b>

                </div>
            </a>
            <a href="<?= $ADMIN_URL ?>/don_hang/index.php?da_giao">
                <div class="overview_items ">
                    <i class=" icon_overview far fa-handshake"></i>
                    <h4 class="count_items"><?php echo count(don_hang_da_giao()) ?></h4>
                    <b>Đã giao </b>

                </div>
            </a>
            <a href="<?= $ADMIN_URL ?>/don_hang/index.php?huy">
                <div class="overview_items ">
                    <i class=" icon_overview fas fa-user-times"></i>
                    <h4 class="count_items"><?php echo count(don_hang_huy()) ?></h4>
                    <b>Đã huỷ</b>

                </div>
            </a>
        </div>
    </div>
    <?php
    // $count_ip = '../../admin/traffic/count_ip.txt';
    // $count_not_ip = '../../admin/traffic/count_not_ip.txt';
    // echo file_get_contents($count_ip);
    // echo file_get_contents($count_not_ip);

    ?>
    <div class="product_hot">
        <div class="row">
            <div class="col-6">
                <div class="product_hot_new">
                    <h5 class="alert alert-primary">Sản phẩm mới</h5>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã </th>
                                <th scope="col">Hình</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Tồn </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (hang_hoa_moi() as $hh) {
                                extract($hh);
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $ma_hh ?></td>
                                    <td><img style="width:50px" src="<?= $ADMIN_URL ?>/hang_hoa/upload/<?php echo $hinh ?>" alt=""></td>
                                    <td class="text-overflow"><?php echo $ten_hh; ?></td>
                                    <td class=""><?php echo hang_hoa_ton_kho($ma_hh,$so_luong); ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
            <div class="col-6">
                <div class="product_hot_view">
                    <h5 class="alert alert-primary"> Sảm phẩm xem nhiều</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã </th>
                                <th scope="col">Hình </th>
                                <th scope="col">Tên</th>
                                <th scope="col">Xem</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach (hang_hoa_view() as $hh) {
                                extract($hh);
                                $i++;
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i; ?></th>
                                    <td><?php echo $ma_hh ?></td>
                                    <td><img style="width:50px" src="<?= $ADMIN_URL ?>/hang_hoa/upload/<?php echo $hinh ?>" alt=""></td>
                                    <td class="text-overflow"><?php echo $ten_hh; ?></td>
                                    <td><?php echo $so_luot_xem ?></td>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="comment_new">
        <h5 class="alert alert-primary">Bình luận mới</h5>
        <?php
        require_once '../../dao/binh_luan.php';
        $newhot3 = binh_luan_newhot3();
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã </th>
                    <th scope="col">Nội dung</th>
                    <th scope="col" style="width:30%">Hàng hoá</th>
                    <th scope="col">Ngày </th>
                    <th scope="col">Người</th>
                    <th ></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($newhot3 as $ds) {
                    $i++; ?>
                    <tr>
                        <td scope="row"><?php echo $i ?></td>
                        <td><?php echo $ds['ma_bl'] ?></td>
                        <td><?php echo $ds['noi_dung'] ?></td>
                        <td><?php echo $ds['ten_hh'] ?></td>
                        <td><?php echo $ds['ngay_bl'] ?></td>
                        <td><?php echo $ds['ho_ten'] ?></td>
                        <td><a href="<?= $ADMIN_URL ?>/binh_luan/?delete_bl&ma_bl=<?php echo $ds['ma_bl']; ?>">Xoá</a></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
    </div>
    <div id="piechart" style="width: 100%; height: 500px;"></div>

</div>