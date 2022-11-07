<?php
require_once '../../dao/khach_hang.php';
require_once '../../dao/select_diachi.php';
// if(isset($_SESSION['khach_hang'])){
//     extract($_SESSION['khach_hang']);
//     khach_hang_getinfo($id_kh);
// }
if (!isset($_SESSION['khach_hang'])) {
} else {
    $r = khach_hang_getinfo($id_kh);
    extract($r);
?>

    <div class="account__inner">
        <h3 class="account__inner-heading py-4">
            Địa chỉ giao hàng
        </h3>
        <div class="account__inner-content">
            <form action="address.php" method="post" enctype="multipart/form">
                <input type="hidden" name="id_kh" value="<?php echo $id_kh; ?>">
                <input type="hidden" name="mat_khau" value="<?php echo $mat_khau; ?>">
                <input type="hidden" name="ma_kh" value="<?php echo $ma_kh; ?>">
                <input type="hidden" name="kich_hoat" value="<?php echo $kich_hoat; ?>">
                <input type="hidden" name="hinh" value="<?php echo $hinh; ?>">
                <input type="hidden" name="vai_tro" value="<?php echo $vai_tro; ?>">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Họ tên</label>
                    <div class="col-sm-10">
                        <input type="text" name="ho_ten" value="<?php echo $ho_ten ?>" class="form-control" id="inputName">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPhone" class="col-sm-2 col-form-label">Số điện thoại</label>
                    <div class="col-sm-10">
                        <input type="text" name="so_dien_thoai" value="<?php echo $so_dien_thoai ?>" class="form-control" id="inputPhone">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" name="email" value="<?php echo $email ?>" class="form-control" id="inputEmail">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="selecttinh" class="col-sm-2 col-form-label">Tỉnh/Thành Phố</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="tinh_thanh_pho" aria-label="Default select example">
                            <option selected>Chọn Tỉnh/Thành Phố</option>
                            <?php
                            $row = tinh_thanh_select_all();
                            foreach ($row as $r) {
                                extract($r); ?>
                                <option value="<?php echo $id_tinh; ?>"><?php echo $ten_tinh; ?></option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="selecttinh" class="col-sm-2 col-form-label">Huyện/Quận</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="load_quan_huyen" aria-label="Default select example">
                        <option selected>Chọn Huyện/Quận</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="selecttinh" class="col-sm-2 col-form-label">Xã/Phường</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="load_xa_phuong" aria-label="Default select example">
                        <option selected>Chọn Xã/Phường</option>
                          
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Địa chỉ</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" value="" name="dia_chi" id="exampleFormControlTextarea1" rows="3"><?php echo $dia_chi; ?></textarea>
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 py-2">
                        <button type="submit" name="update_address" class="btn btnUpdateProfile primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>
<?php
if (isset($_SESSION['khach_hang'])) {
    extract($_SESSION['khach_hang']);
}
if (isset($_POST['update_address'])) {
    $id_kh = $_POST['id_kh'];
    $mat_khau = $_POST['mat_khau'];
    $ho_ten = $_POST['ho_ten'];
    $ma_kh = $_POST['ma_kh'];
    $kich_hoat = $_POST['kich_hoat'];
    $hinh = $_POST['hinh'];
    $vai_tro = $_POST['vai_tro'];
    $so_dien_thoai_cu = $_POST['so_dien_thoai'];
    $email = $_POST['email'];
    $dia_chi_moi = $_POST['dia_chi'];


    khach_hang_update($id_kh, $ma_kh, $mat_khau, $ho_ten, $kich_hoat, $hinh, $so_dien_thoai_cu, $email, $dia_chi_moi, $vai_tro);
    header('Location: ' . $_SERVER['HTTP_REFERER']); //chuyển hướng về trang lúc nảy

}

?>
<a href="javascript:history.back()" class="btn btn-primary font-size-primary">Quay lại</a>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
   $(document).ready(function() {
    $('#tinh_thanh_pho').change(function() {
        var id_tinh=$(this).val();
        $.ajax({
            url:'../diachi/index.php',
            type:'POST',
            data:{id_tinh:id_tinh},
            success: function(data){
                $('#load_quan_huyen').html(data);
            }
        })
    })
    $('#load_quan_huyen').change(function() {
        var id_huyen=$(this).val();
        $.ajax({
            url:'../diachi/index.php',
            type:'POST',
            data:{id_huyen:id_huyen},
            success: function(data){
                $('#load_xa_phuong').html(data);
            }
        })
    })
   })
</script>