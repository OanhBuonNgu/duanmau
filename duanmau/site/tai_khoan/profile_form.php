<?php

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
            Thông tin tài khoản
        </h3>
        <div class="account__inner-content">
            <form action="profile.php" method="post" enctype="multipart/form">
                <input type="hidden" name="id_kh" value="<?php echo $id_kh; ?>">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Họ tên</label>
                    <div class="col-sm-10">
                        <input type="text" name="ho_ten" value="<?php echo $ho_ten ?>" class="form-control" id="inputName">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Tên đăng nhập</label>
                    <div class="col-sm-10">
                        <input type="text" readonly name="ma_kh" value="<?php echo $ma_kh ?>" class="form-control" id="inputName">
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
                <div class="form-group row align-items-center py-3">
                    <label for="inputGender" class="col-sm-2 col-form-label">Giới tính</label>
                    <div class="col-sm-10 ">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1" selected>Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                            <label class="form-check-label" for="inlineRadio1">Nữ</label>
                        </div>
                    </div>
                </div>
               
                <div class="form-group row align-items-center">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="hidden_changePass" class="form-check-input js-check-hidden_changePassword" id="exampleCheck1">
                            <label class="form-check-label pl-3" for="exampleCheck1">Thay đổi mật
                                khẩu</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <div class="errorMessage">
                            <?php if (isset($_SESSION['error'])) {
                                echo $_SESSION['error'];
                            } ?>
                        </div>
                    </div>
                </div>

                <div class="hidden_changePassword js-hidden_changePassword">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Mật khẩu cũ</label>
                        <div class="col-sm-10">
                            <input type="password" name="mat_khau" class="form-control" id="inputName" placeholder="Nhập mật khẩu cũ">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                        <div class="col-sm-10">
                            <input type="password" name="mat_khau_moi" class="form-control" id="inputName" placeholder="Nhập mật khẩu mới">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nhập lại</label>
                        <div class="col-sm-10">
                            <input type="password" name="re_mat_khau_moi" class="form-control" id="inputName" placeholder="Nhập lại mật khẩu mới">
                        </div>
                    </div>
                </div>

                <div class="form-group row align-items-center">
                    <label for="" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 py-2">
                        <button type="submit" name="update_profile" class="btn btnUpdateProfile primary">Cập nhật</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php
}
?>