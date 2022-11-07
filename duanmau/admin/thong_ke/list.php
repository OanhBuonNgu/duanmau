<?php
require_once '../../dao/loai.php';
$laptop=  hang_hoa_select_loai(134);
$manhinh=  hang_hoa_select_loai(133);
$linhkien=hang_hoa_select_loai(145);
$tan_nhiet=hang_hoa_select_loai(146);
$thietbi=hang_hoa_select_loai(147);

?>
<!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Thong ke danh muc'],
            ['Laptop', <?php echo $laptop;?>],
            ['Màn hình máy tính', <?php echo $manhinh;?>],
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
</script> -->
<h5 class="alert alert-primary">Thống kê hàng hoá theo loại</h5>
<?php

?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mã loại</th>
            <th scope="col">Tên loại</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Giá cao nhất</th>
            <th scope="col">Giá thấp nhất</th>
            <th scope="col">Giá trung bình</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $dsloai = (loai_selectall());
        $i=0;
        foreach ($dsloai as $row) {
            extract($row);$i++;
           $soluong= hang_hoa_select_loai($ma_loai);
           $gia_max_loai=hang_hoa_count_gia_max_loai($ma_loai);
           $gia_min_loai=hang_hoa_count_gia_min_loai($ma_loai);
           $gia_avg_loai=hang_hoa_count_gia_avg_loai($ma_loai);
            ?>
            <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $ma_loai;?></td>
                <td><?php echo $ten_loai;?></td>
                <td><?php echo $soluong;?></td>
                <td><?php echo number_format($gia_max_loai,0,',','.').'đ';?></td>
                <td><?php echo number_format($gia_min_loai,0,',','.').'đ';?></td>
                <td><?php echo number_format($gia_avg_loai,0,',','.').'đ';?></td>
            </tr>

        <?php
        }
        ?>
    </tbody>
</table>
<h5 class="alert alert-primary">Biểu đồ thống kê hàng hoá theo loại</h5>

<!-- <div id="piechart" style="width: 100%; height: 500px;"></div> -->
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Thong ke danh muc'],
            ['Laptop', <?php echo $laptop;?>],
            ['Điện Thoại', <?php echo $manhinh;?>],
            ['Linh kiện máy tính', <?php echo $linhkien;?>],
            ['Tản nhiệt', <?php echo $tan_nhiet;?>],
            ['Thiết bị mạng', <?php echo $thietbi;?>]
        ]);

        var options = {
          title: 'Biểu đồ thống kê hàng hoá theo loại',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
  </body>
</html>
