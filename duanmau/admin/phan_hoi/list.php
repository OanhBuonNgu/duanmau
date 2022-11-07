<h5 class="alert alert-primary">Phản hồi khách hàng</h5>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Họ Tên </th>
            <th scope="col">Email</th>
            <th scope="col">Nội dung</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM contact  order by id desc ";
        $row = pdo_query($sql);

        $i = 0;
        foreach ($row as $r) {
            $i++;
            extract($r);
        ?>
            <tr>
                <td scope="row"><?php echo $i; ?></td>
                <td scope="row"><?php echo $hoten; ?></td>
                <td scope="row"><?php echo $email; ?></td>
                <?php if ($noidung == '') { ?>
                    <td scope="row">Nhận giảm giá 20%</td>

                <?php
                } else { ?>
                    <td scope="row"><?php echo $noidung; ?></td>
                <?php
                }
                ?>

            </tr>
        <?php
        }
        ?>
    </tbody>
</table>