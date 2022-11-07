<?php
require_once 'pdo.php';
//thêm mới sp
function hang_hoa_insert($ten_hh, $don_gia, $so_luong, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $ma_loai)
{
    $sql = "insert into hang_hoa(ten_hh,don_gia,so_luong,giam_gia,hinh,ngay_nhap,mo_ta,dac_biet,ma_loai) values(?,?,?,?,?,?,?,?,?)";
    return pdo_execute2($sql, $ten_hh, $don_gia, $so_luong, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $ma_loai);
}
//xoá sp
function hang_hoa_delete($ma_hh)
{
    $sql = "delete from hang_hoa where ma_hh=?";
    pdo_execute($sql, $ma_hh);
}
//lấy thông tin 1 sp
function hang_hoa_getinfo($ma_hh)
{
    $sql = "select * from hang_hoa where ma_hh=?";
    return pdo_query_one($sql, $ma_hh);
}

//Cập nhật sp
function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $so_luong, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $so_luot_xem, $ma_loai)
{
    $sql = "update hang_hoa set ten_hh=?,don_gia=?,so_luong=?,giam_gia=?,hinh=?,ngay_nhap=?,mo_ta=?,dac_biet=?,so_luot_xem=?,ma_loai=?  where ma_hh=?";
    pdo_execute($sql, $ten_hh, $don_gia, $so_luong, $giam_gia, $hinh, $ngay_nhap, $mo_ta, $dac_biet, $so_luot_xem, $ma_loai, $ma_hh);
}

//truy vấn all Sp
function hang_hoa_selectall()
{
    $sql = "SELECT *from hang_hoa order by ma_hh desc ";
    return pdo_query($sql);
}

//truy vấn  ds  sp theo 1 danh mục 

function hang_hoa_selectall_byloai($ma_loai)
{
    // $sql = "SELECT * FROM loai";
    $sql = "SELECT * FROM `hang_hoa`,`loai` WHERE loai.ma_loai = hang_hoa.ma_loai and loai.ma_loai=?";
    return pdo_query($sql, $ma_loai);
}
//đếm sp theo mã 
function hang_hoa_exist($ma_hh)
{
    $sql = "SELECT  count(*) from `hang_hoa` where ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

//select by id 
function hang_hoa_select_by_id($ma_hh)
{
    $sql = "select *from hang_hoa where ma_hh=?";
    return pdo_query_one($sql, $ma_hh);
}
//tăng số lượt xem sp 
function hang_hoa_tang_so_luot_xem($ma_hh)
{
    $sql = "UPDATE hang_hoa set so_luot_xem=so_luot_xem +1 where ma_hh=?";
    pdo_execute($sql, $ma_hh);
}
//top 10 sp yêu thích ( lượt xxem nhiều nhất)
function hang_hoa_select_top10()
{
    $sql = "SELECT * from hang_hoa where so_luot_xem > 0 order by so_luot_xem desc limit 10";
    return pdo_query($sql);
}
//hàng hoá select đặc biệt
function hang_hoa_select_dac_biet()
{
    $sql = "SELECT * from hang_hoa where dac_biet =1 ";
    return pdo_query($sql);
}
//hàng hoá select keyword tìm kiếm
function hang_hoa_select_keyword($keyword)
{
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $row = 4;
    $from = ($page - 1) * $row;
    $sql = "SELECT * FROM `hang_hoa`,`loai` WHERE hang_hoa.ma_loai=loai.ma_loai and hang_hoa.ten_hh like ? or loai.ten_loai like ? order by hang_hoa.ten_hh ASC limit $from,$row";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '');
}
//hàng hoá count keywword
function hang_hoa_count_kyw($keyword){
    $sql="SELECT count(*) FROM hang_hoa,loai WHERE hang_hoa.ma_loai=loai.ma_loai and hang_hoa.ten_hh like ? or loai.ten_loai like ? ";
    return pdo_query_value($sql,'%'.$keyword.'%', '%' . $keyword . '');
}

//giá sp sau khi giảm
function hang_hoa_giam_gia($giam_gia, $don_gia)
{
    return ((100 - $giam_gia) / 100) * $don_gia;
}
//đếm hàng hoá đã bán 
function hang_hoa_count_so_luong($ma_hh)
{
    $sql = "SELECT * FROM `hoadonchitiet` ,`hoa_don`,`hang_hoa` WHERE hoadonchitiet.ma_hh=hang_hoa.ma_hh and hoa_don.id_hoa_don=hoadonchitiet.id_hoa_don and hoa_don.tinh_trang ='daxacnhan'  and hang_hoa.ma_hh=? ";
    $r = pdo_query($sql, $ma_hh);
    $sum = 0;
    foreach ($r as $row) {
        extract($row);
        $sum += $so_luong_mua;
    }
    return $sum;
}
function hang_hoa_count_so_luong2($ma_hh)
{
    $sql = "SELECT * FROM `hoadonchitiet` ,`hoa_don`,`hang_hoa` WHERE hoadonchitiet.ma_hh=hang_hoa.ma_hh and hoa_don.id_hoa_don=hoadonchitiet.id_hoa_don and hoa_don.tinh_trang ='dagiao'  and hang_hoa.ma_hh=? ";
    $r = pdo_query($sql, $ma_hh);
    $sum = 0;
    foreach ($r as $row) {
        extract($row);
        $sum += $so_luong_mua;
    }
    return $sum;
}

///đếm hàng đã bán
function hang_hoa_da_ban_final($ma_hh)
{
    return  hang_hoa_count_so_luong($ma_hh) + hang_hoa_count_so_luong2($ma_hh);
}
//đêm shanfg tồn kho 

//kiểm tra tình trạng hàng hoá
function hang_hoa_status($ma_hh)
{
    if (hang_hoa_da_ban_final($ma_hh) >= hang_hoa_getinfo($ma_hh)['so_luong']) {
        return "Hết hàng";
    } else {
        return "Còn hàng";
    }
}
//tính số sao trung bình của hàng hoá
function hang_hoa_avg_rate($ma_hh)
{
    $sql = "SELECT AVG(binh_luan.rate) FROM `binh_luan`,`khach_hang`,`hang_hoa` WHERE binh_luan.ma_hh=hang_hoa.ma_hh and binh_luan.id_kh=khach_hang.id_kh and binh_luan.rate>0 and hang_hoa.ma_hh=?";
    return pdo_query_one($sql, $ma_hh)['AVG(binh_luan.rate)'];
}
//tính phần trăm sp còn lại trong kho
function hang_hoa_phan_tram_exist($ma_hh)
{
    $row = hang_hoa_select_by_id($ma_hh);
    extract($row);
    return  hang_hoa_da_ban_final($ma_hh) / ($so_luong / 100);
}
//hàng hoá insert nhiều hình ảnh
function hang_hoa_insert_images($ma_hh, $hinh_anh_mo_ta)
{
    $sql = "INSERT INTO images (ma_hh,images) values(?,?)";
    pdo_execute($sql, $ma_hh, $hinh_anh_mo_ta);
}
//select nhiều ảnh
function hang_hoa_select_images($ma_hh)
{
    $sql = "SELECT *FROM images WHERe ma_hh=?";
    return pdo_query($sql, $ma_hh);
}
//hàng hoá update images 
function hang_hoa_update_images($ma_hh, $hinh_anh_mo_ta,$id)
{
    $sql = "UPDATE images SET images=? where ma_hh=? and id=?";
    pdo_execute($sql, $hinh_anh_mo_ta, $ma_hh,$id);
}
//hàng hoá mới
function hang_hoa_moi()
{
    $sql = "SELECT * FROM hang_hoa order by ma_hh DESC limit 5 ";
    return pdo_query($sql);
}
//hàng hoá view cao nhất (5
function hang_hoa_view()
{
    $sql = "SELECT * FROM hang_hoa where so_luot_xem>0  limit 5 ";
    return pdo_query($sql);
}
//tính số lượng sp tồn kho
function hang_hoa_ton_kho($ma_hh, $so_luong)
{
    return $so_luong - hang_hoa_da_ban_final($ma_hh);
}


//phân trang theo loại
function hang_hoa_pagination_loai($ma_loai)
{
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $row = 4;
    $from = ($page - 1) * $row;
    $sql = "SELECT * FROM hang_hoa where hang_hoa.ma_loai =? order by hang_hoa.ma_hh ASC limit $from,$row";
    return pdo_query($sql, $ma_loai);
}
//đếm số bảng ghi => số trang
function hang_hoa_pagination_loai_count($ma_loai)
{
    $sql = "SELECT count(*) FROM hang_hoa where hang_hoa.ma_loai=? ";
    return pdo_query_value($sql, $ma_loai);
}
