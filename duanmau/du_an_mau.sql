-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 26, 2022 lúc 12:59 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `du_an_mau`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int(11) NOT NULL,
  `noi_dung` text COLLATE utf8_unicode_ci NOT NULL,
  `id_kh` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `ngay_bl` date NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`ma_bl`, `noi_dung`, `id_kh`, `ma_hh`, `ngay_bl`, `rate`) VALUES
(25, 'sp tốt', 13, 10, '2022-02-26', 0),
(26, 'ok', 13, 10, '2022-02-26', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hang_hoa`
--

CREATE TABLE `hang_hoa` (
  `ma_hh` int(11) NOT NULL,
  `ten_hh` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `don_gia` float NOT NULL,
  `so_luong` int(255) NOT NULL,
  `giam_gia` int(11) DEFAULT 0,
  `hinh` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ngay_nhap` date NOT NULL,
  `mo_ta` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `dac_biet` bit(1) DEFAULT b'0' COMMENT '1 là đặc biệt , 0 là bình thường',
  `so_luot_xem` int(11) DEFAULT 0,
  `ma_loai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hang_hoa`
--

INSERT INTO `hang_hoa` (`ma_hh`, `ten_hh`, `don_gia`, `so_luong`, `giam_gia`, `hinh`, `ngay_nhap`, `mo_ta`, `dac_biet`, `so_luot_xem`, `ma_loai`) VALUES
(1, 'Acer Nitro 5 Gaming AN515 57 727J i7 11800H/8GB/512GB/4GB RTX3050Ti/144Hz/Win10 ', 27990000, 12, 2, 'acer-nitro-gaming-an515-57-727j-i7-nhqd9sv005-1-org.jpg', '2022-02-26', 'CPU:i711800H2.30 GHz\r\nRAM: 8 GBDDR4 2 khe (1 khe 8GB + 1 khe rời)3200 MHz\r\nỔ cứng:512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 2TB)Hỗ trợ khe cắm HDD SATA (nâng cấp tối đa 2TB)Hỗ trợ th', b'1', 418, 134),
(3, 'iPhone 13 Pro 128GB', 29990000, 5, 1, 'iphone-13-pro1.jpg', '2022-02-26', 'Màn hình: OLED6.1\"Super Retina XDR\r\nHệ điều hành: iOS 15\r\nCamera sau: 3 camera 12 MP\r\nCamera trước: 12 MP\r\nChip: Apple A15 Bionic\r\nRAM: 6 GB\r\nBộ nhớ trong: 128 GB\r\nSIM: 1 Nano SIM & 1 eSIMHỗ trợ 5G\r\nP', b'1', 326, 133),
(10, ' Lenovo Gaming Legion 5 15ITH6 i7 11800H/16GB/512GB/4GB RTX3050Ti/165Hz', 38000000, 12, 2, 'lenovo-gaming-legion-5-15ith6-i7-82jk00fnvn1.jpg', '2022-02-26', 'CPU: i711800H2.30 GHz\r\nỔ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB (2280) / 512GB (2242))Hỗ trợ thêm 1 khe cắm SSD M.2 PCIe mở rộng\r\nCổng kết nối: 1 x USB 3.2 (Always on)2 ', b'1', 162, 134),
(11, 'MacBook Pro 2019 13 inch (MUHN2/MUHQ2) Core i5 1.4', 23000000, 22, 1, 'mac3.jpg', '2022-01-28', 'Bộ xử lý: Intel Core i5 lõi tứ 1,4 GHz, Turbo Boost lên tới 3,9 GHz, với 128 MB eDRAM RAM:  Bộ nhớ ', b'1', 193, 134),
(30, ' Asus TUF Gaming FX506HCB i5 11400H/8GB/512GB/4GB RTX3050/144Hz/Win11', 24990000, 12, 2, 'asus-tuf-gaming-fx506hcb-i5-hn144w-2-1.jpg', '2022-02-26', 'CPU :i511400H2.7GHz\r\nRAM: 8 GBDDR4 2 khe (1 khe 8GB + 1 khe rời)3200 MHz\r\nỔ cứng: 512 GB SSD NVMe PCIe (Có thể tháo ra, lắp thanh khác tối đa 1TB)\r\nMàn hình:15.6\"Full HD (1920 x 1080)144Hz\r\nCard màn h', b'1', 164, 134),
(37, 'Xiaomi 11T 5G 128GB', 10990000, 22, 0, 'xiaomi-11t-1-1.jpg', '2022-02-26', 'Xiaomi 11T đầy nổi bật với thiết kế vô cùng trẻ trung, màn hình AMOLED, bộ 3 camera sắc nét và viên pin lớn đây sẽ là mẫu smartphone của Xiaomi thỏa mãn mọi nhu cầu giải trí, làm việc và là niềm đam m', b'1', 9, 133),
(38, 'OPPO Reno6 5G', 9100000, 52, 2, 'oppo-reno6-bac-1-org.jpg', '2022-02-26', 'Sau khi ra mắt OPPO Reno5 chưa lâu thì OPPO lại cho ra mẫu smartphone mới mang tên OPPO Reno6 với hàng loạt cải tiến mới về ngoại hình bên ngoài lẫn hiệu năng bên trong, mang đến trải nghiệm vượt bật ', b'1', 6, 133),
(39, ' Samsung Galaxy Z Flip3 5G 128GB', 24990000, 8, 0, 'samsung-galaxy-z-flip-3-kem-1-org.jpg', '2022-02-26', 'Galaxy Z Flip 3 sở hữu cơ cấu gập theo chiều dọc xịn sò, tạo ra chiếc smartphone khác biệt so với phần còn lại, có thể đóng lại gọn gàng khi không sử dụng để bạn thuận tiện mang theo bên mình.', b'1', 3, 133),
(40, 'Case Cougar Gemini S - Silver Version - Gaming', 1990000, 26, 3, 'lk.jpg', '2022-02-16', '- Loại case: Mid-Tower\r\n-Số quạt tặng kèm: 01 fan\r\n- Màu: Silver\r\n', b'1', 6, 145),
(42, 'Vga MSI GTX1030 Aero ITX 2Gb OC DDR5', 2650000, 40, 0, 'card.png', '2022-01-16', '- Chipset: Geforce GT1030\r\n- Bộ nhớ: 2Gb DDR5/ 64Bit\r\n- Cổng giao tiếp: 1 x DVI-D/1 x HDMI', b'1', 7, 145),
(43, 'Vga Gigabyte 8GB GeForce RTX 3060 Ti Gaming OC (GV-N306T GAMING OC- 8GD)', 21500000, 42, 4, 'đ.jpg', '2022-01-16', '- Chipset: GeForce RTX™ 3060 Ti\r\n- Bộ nhớ: 8GB GDDR6/ 256 bit\r\n- Cổng giao tiếp:DisplayPort 1.4a x2/HDMI 2.1 x2', b'1', 7, 145),
(44, 'SSD WD 120GB digital green SATA3 (6Gb/s) Read 545 Mb/s-Write 430Mb/s ( WDS120G2G0A)', 750000, 13, 1, '503_o_cung_ssd_western_green_120gb_sata3_3d_1.jpg', '2022-01-16', '- Dung lượng: 120Gb\r\n- Tốc độ đọc (SSD): 545MB/s\r\n- Tốc độ ghi (SSD): 430MB/s\r\n- Chuẩn giao tiếp: SATA3\r\n- Kích thước: 2.5Inch\r\n', b'1', 2, 145),
(45, 'Tản nhiệt khí CPU Golden Field Delta - RGB', 293000, 21, 2, '250_19480_fan_tan_nhiet_cpu_golden_field_delta_rgb.jpg', '2022-02-16', '', b'1', 0, 146),
(46, 'BỘ TẢN NHIỆT NƯỚC ID-COOLING ZOOMFLOW 360-XT SNOW', 2790000, 43, 2, '250_19566_bo_tan_nhiet_nuoc_id_cooling_zoomflow_360_xt_snow.jpg', '2022-01-16', '- Hỗ trợ Socket:Intel LGA2066/2011/1200/1151/1150/1155/1156/AMD AM4\r\n- Kích thước radiator:397×120×27mm\r\n- Điện áp: 12VDC', b'1', 5, 146),
(47, 'Tản nhiệt khí Jonsbo CR-1000 RGB đen', 395000, 31, 3, '250_17308_tan_nhiet_khi_jonsbo_cr_1000_rgb_den.jpg', '2022-01-16', '- Hỗ trợ Socket:Intel LGA775/1150/1151/1155/1156,AMD AM2/AM2+/AM3/AM3+/AM4/FM1/FM2/FM2+\r\n- Kích thước: 158 x 128 x 76 mm\r\n- Điện áp:12V', b'1', 0, 146),
(48, 'Quạt Aigo Ring Rainbow Led', 204000, 21, 50, '250_10912_fan_case_quat_aigo_ring_rainbow_led_1.jpg', '2022-01-17', 'Hãng sản xuất: Aigo\r\nTên sản phẩm: Ring Rainbow Led\r\nBảo hành : 12 tháng\r\n', b'1', 7, 146),
(49, 'Bộ phát 3G/4G WL TotoLink MF180-V2 Khe cắm Sim + thẻ nhớ MicroSD, 300Mb)', 1400000, 21, 20, '250_18999_bo_phat_3g4g_wl_totolink_mf180_v2.png', '2022-02-19', '- Tương thích chuẩn IEEE 802.11 b/g/n\r\n- Tốc độ tối đa 150Mbps\r\n- Hỗ trợ TD-LTE, LTE-FDD, WCDMA\r\n- Pin 2100mAh\r\n- Hỗ trợ lên đến 10 thiết bị\r\n- Hỗ trợ thẻ nhớ Micro SD lên đến 32GB\r\n- 2 ăng-ten ngầm\r\n', b'1', 18, 147),
(50, 'Router wifi băng tần kép Totolink A720R', 390000, 51, 0, '120_18437_router_wifi_bang_tan_kep_totolink_a720r_3.png', '2022-01-09', '- Băng tần hỗ trợ: 2.4 GHz / 5 GHz\r\n- Tốc độ 2.4GHz:300Mbps\r\n- Tốc độ 5.0GHz:867Mbps\r\n- Angten: 4 ăng ten ngoài', b'1', 2, 147),
(51, 'Router Wifi Asus RT-N800HP N800,( Xuyên Tường,phủ sóng rộng)', 1930000, 21, 10, '8537_asus_rt_n800hp_dung_si_xuyen_tuong_n800_phu_song_rong_1.png', '2022-01-17', '- Cổng giao tiếp: 1x WAN 1000Mbps, 4x LAN 1000Mbps\r\n- Tốc độ LAN: 10/100/1000Mbps\r\n- Tốc độ WIFI: Wifi 800Mbps', b'1', 13, 147),
(52, 'Cáp mạng Orico CAT 6 dài 10m. Dây tròn (PUG-C6-100)', 120000, 31, 2, '250_4370_cap_mang_bam_san_orico_cat6_pug_c6_100_10_met.jpg', '2022-01-17', '- Cáp mạng CAT 6\r\n- Cáp dài 10m. Dây tròn\r\n- Chất liệu: 26AWG lõi thép mạ đồng\r\n- Băng thông: 1000Mbps', b'1', 3, 147),
(53, 'Điện Thoại Di Động iPhone 13 Pro Max 128GB Graphite (MLL63VN/A) (Graphite)', 30900000, 29, 0, 'iphone-13-pro-max-1-1.jpg', '2022-02-26', ' Máy có thiết kế không mấy đột phá khi so với người tiền nhiệm, bên trong đây vẫn là một sản phẩm có màn hình siêu đẹp, tần số quét được nâng cấp lên 120 Hz mượt mà, cảm biến camera có kích thước lớn ', b'1', 2, 133),
(54, 'Điện thoại iPhone 13 128GB', 21000000, 6, 0, 'iphone-13-1-3.jpg', '2022-02-26', 'Trong khi sức hút đến từ bộ 4 phiên bản iPhone 12 vẫn chưa nguội đi, thì Apple đã mang đến cho người dùng một siêu phẩm mới iPhone 13 - điện thoại có nhiều cải tiến thú vị sẽ mang lại những trả', b'1', 1, 133),
(55, 'Samsung Galaxy Z Fold3 5G 256GB', 42000000, 3, 0, 'samsung-galaxy-z-fold-3-silver-gc-org.jpg', '2022-02-26', 'Galaxy Z Fold3 5G, chiếc điện thoại được nâng cấp toàn diện về nhiều mặt, đặc biệt đây là điện thoại màn hình gập đầu tiên trên thế giới có camera ẩn (08/2021). Sản phẩm sẽ là một “cú hit” của Samsung', b'1', 0, 133);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `id_hoadonchitiet` int(11) NOT NULL,
  `id_hoa_don` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `so_luong_mua` int(11) NOT NULL,
  `don_gia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`id_hoadonchitiet`, `id_hoa_don`, `ma_hh`, `so_luong_mua`, `don_gia`) VALUES
(4, 41, 1, 10, 10000000),
(45, 57, 1, 1, 18326000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id_hoa_don` int(11) NOT NULL,
  `id_kh` int(11) NOT NULL,
  `tinh_trang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tong_tien` float NOT NULL,
  `ngay_dat_hang` date NOT NULL,
  `ngay_giao_hang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`id_hoa_don`, `id_kh`, `tinh_trang`, `tong_tien`, `ngay_dat_hang`, `ngay_giao_hang`) VALUES
(41, 6, 'dagiao', 10000000, '2021-09-27', '2021-10-05'),
(57, 11, 'dagiao', 18326000, '2021-10-05', '2022-02-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huyen_quan`
--

CREATE TABLE `huyen_quan` (
  `id_huyen` int(11) NOT NULL,
  `ten_huyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_tinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `huyen_quan`
--

INSERT INTO `huyen_quan` (`id_huyen`, `ten_huyen`, `id_tinh`) VALUES
(1, 'Quận Hải Châu', 1),
(2, 'Quận Cẩm Lệ', 1),
(3, 'Quận Thanh Khê', 1),
(4, 'Quận Liên Chiểu', 1),
(5, 'Quận Ngũ Hành Sơn', 1),
(6, 'Quận Sơn Trà', 1),
(7, 'Huyện Hòa Vang', 1),
(8, 'Huyện Hoàng Sa', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `ma_hh` int(11) NOT NULL,
  `images` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `ma_hh`, `images`) VALUES
(65, 40, '120_10545_vo_may_tinh_case_pc_cougar_gemini_s_silver_version_gaming_3.png'),
(66, 40, '120_10545_vo_may_tinh_case_pc_cougar_gemini_s_silver_version_gaming_4.png'),
(67, 40, '10545_vo_may_tinh_case_pc_cougar_gemini_s_silver_version_gaming_5.png'),
(68, 40, 'lk.jpg'),
(120, 42, 'b.png'),
(121, 42, 'c.png'),
(122, 42, 'card - Copy.png'),
(127, 43, '120_18037_vga_gigabyte_8gb_geforce_rtx_3060_ti_gaming_oc_5.png'),
(128, 43, '120_18037_vga_gigabyte_8gb_geforce_rtx_3060_ti_gaming_oc_6.png'),
(129, 43, '120_18037_vga_gigabyte_8gb_geforce_rtx_3060_ti_gaming_oc_7.png'),
(130, 43, 'đ.jpg'),
(131, 44, '120_503_o_cung_ssd_western_green_120gb_sata3_3d_2.jpg'),
(132, 44, '503_o_cung_ssd_western_green_120gb_sata3_3d_1.jpg'),
(137, 45, '250_19480_fan_tan_nhiet_cpu_golden_field_delta_rgb.jpg'),
(138, 45, '19480_fan_tan_nhiet_cpu_golden_field_delta_rgb_1.jpg'),
(139, 46, '120_19566_bo_tan_nhiet_nuoc_id_cooling_zoomflow_360_xt_snow_1.jpg'),
(140, 46, '120_19566_bo_tan_nhiet_nuoc_id_cooling_zoomflow_360_xt_snow_3.jpg'),
(141, 46, '120_19566_bo_tan_nhiet_nuoc_id_cooling_zoomflow_360_xt_snow_4.jpg'),
(142, 46, '120_19566_bo_tan_nhiet_nuoc_id_cooling_zoomflow_360_xt_snow_5.jpg'),
(143, 46, '250_19566_bo_tan_nhiet_nuoc_id_cooling_zoomflow_360_xt_snow.jpg'),
(144, 47, '120_17308_tan_nhiet_khi_jonsbo_cr_1000_rgb_den_4.jpg'),
(145, 47, '120_17308_tan_nhiet_khi_jonsbo_cr_1000_rgb_den_5.jpg'),
(146, 47, '120_17308_tan_nhiet_khi_jonsbo_cr_1000_rgb_den_6.jpg'),
(147, 47, '120_17308_tan_nhiet_khi_jonsbo_cr_1000_rgb_den_7.jpg'),
(148, 47, '120_19566_bo_tan_nhiet_nuoc_id_cooling_zoomflow_360_xt_snow_3.jpg'),
(149, 47, '250_17308_tan_nhiet_khi_jonsbo_cr_1000_rgb_den.jpg'),
(150, 48, '120_10912_fan_case_quat_aigo_ring_rainbow_led_2.jpg'),
(151, 48, '120_10912_fan_case_quat_aigo_ring_rainbow_led_3.jpg'),
(152, 48, '250_10912_fan_case_quat_aigo_ring_rainbow_led_1.jpg'),
(153, 49, ''),
(154, 50, '120_18437_router_wifi_bang_tan_kep_totolink_a720r_3.png'),
(155, 50, '120_18437_router_wifi_bang_tan_kep_totolink_a720r_4.png'),
(156, 50, '120_18437_router_wifi_bang_tan_kep_totolink_a720r_5.png'),
(157, 50, '250_18437_router_wifi_bang_tan_kep_totolink_a720r.png'),
(158, 51, '120_8537_asus_rt_n800hp_dung_si_xuyen_tuong_n800_phu_song_rong_3.jpg'),
(159, 51, '8537_asus_rt_n800hp_dung_si_xuyen_tuong_n800_phu_song_rong_1.png'),
(160, 51, '8537_asus_rt_n800hp_dung_si_xuyen_tuong_n800_phu_song_rong_34.jpg'),
(161, 52, '120_4370_cap_mang_bam_san_orico_cat6_pug_c6_100_10_met_1.jpg'),
(162, 52, '250_4370_cap_mang_bam_san_orico_cat6_pug_c6_100_10_met.jpg'),
(168, 55, ''),
(169, 54, ''),
(170, 53, ''),
(175, 39, ''),
(179, 37, ''),
(180, 38, 'oppo-reno6-bac-1-org.jpg'),
(181, 38, 'oppo-reno6-den-1-org.jpg'),
(182, 38, 'oppo-reno6-n--2.jpg'),
(183, 3, 'iphone-13-pro-n.jpg'),
(184, 30, 'asus-tuf-gaming-fx506hcb-i5-hn144w-2-1.jpg'),
(185, 30, 'asus-tuf-gaming-fx506hcb-i5-hn144w-3-1.jpg'),
(186, 30, 'asus-tuf-gaming-fx506hcb-i5-hn144w-4-1.jpg'),
(187, 30, 'asus-tuf-gaming-fx506hcb-i5-hn144w-5-1.jpg'),
(188, 30, 'asus-tuf-gaming-fx506hcb-i5-hn144w-n.jpg'),
(189, 10, ''),
(190, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_kh` int(11) NOT NULL,
  `ma_kh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ho_ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `kich_hoat` int(1) DEFAULT 1,
  `hinh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `so_dien_thoai` int(10) DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vai_tro` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id_kh`, `ma_kh`, `mat_khau`, `ho_ten`, `kich_hoat`, `hinh`, `so_dien_thoai`, `email`, `dia_chi`, `vai_tro`) VALUES
(6, 'namdt1', '123', 'namdtt', 1, '', 325348843, 'namdt@fpt.edu.vn', '', 1),
(11, 'nam_09', '123', 'admin1', 1, '', 333621003, 'dangtrungnam@gmail.com', '', 0),
(13, 'admin', '123', 'Admin', 1, NULL, NULL, 'admin123@gmail.com', '', 1),
(42, 'anhyeuem', '0987654321', 'hhh', 1, NULL, 0, 'namdt@gmail.com', NULL, 0),
(43, 'ngocnv', '123456789', 'ngọc phio huyền', 1, NULL, 0, 'nggoc@gmail.com', NULL, 0),
(44, 'gtadmin', '12345678', 'hahahaha', 1, NULL, NULL, 'hyhy@gmail.com', NULL, 0),
(45, 'hihihi', '123456789', 'huhuhuhu', 1, NULL, NULL, 'dtdtdt@gmail.com', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(133, 'Điện thoại'),
(134, 'Laptop'),
(145, 'Linh kiện máy tính'),
(146, 'Tản nhiệt'),
(147, 'Thiết bị mạng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_thanhpho`
--

CREATE TABLE `tinh_thanhpho` (
  `id_tinh` int(11) NOT NULL,
  `ten_tinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinh_thanhpho`
--

INSERT INTO `tinh_thanhpho` (`id_tinh`, `ten_tinh`) VALUES
(1, 'Đà Nẵng'),
(2, 'Quảng Nam'),
(3, 'Quảng Trị'),
(4, 'Quảng Bình'),
(5, 'Thừa Thiên Huế'),
(6, 'Quảng Ngãi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xa_phuong`
--

CREATE TABLE `xa_phuong` (
  `id_xa` int(11) NOT NULL,
  `ten_xa` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_tinh` int(11) NOT NULL,
  `id_huyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `xa_phuong`
--

INSERT INTO `xa_phuong` (`id_xa`, `ten_xa`, `id_tinh`, `id_huyen`) VALUES
(1, 'Phường Hòa Hiệp Bắc', 1, 4),
(2, 'Phường Hòa Hiệp Nam', 1, 4),
(3, 'Phường Hòa Khánh Bắc', 1, 4),
(4, 'Phường Hòa Khánh Nam', 1, 4),
(5, 'Phường Hòa Minh', 1, 4),
(6, 'Phường Tam Thuận', 1, 3),
(7, 'Phường Thanh Khê Tây', 1, 3),
(8, 'Phường Thanh Khê Đông', 1, 3),
(9, 'Phường Xuân Hà', 1, 3),
(10, 'Phường Tân Chính', 1, 3),
(11, 'Phường Chính Gián', 1, 3),
(12, 'Phường Vĩnh Trung', 1, 3),
(13, 'Phường Thạc Gián', 1, 3),
(14, 'Phường An Khê', 1, 3),
(15, 'Phường Hòa Khê', 1, 3),
(16, 'Phường Thanh Bình', 1, 1),
(17, 'Phường Thuận Phước', 1, 1),
(18, 'Phường Thạch Thang', 1, 1),
(19, 'Phường Hải Châu I', 1, 1),
(20, 'Phường Hải Châu II', 1, 1),
(22, 'Phường Phước Ninh', 1, 1),
(23, 'Phường Hòa Thuận Tây', 1, 1),
(24, 'Phường Hòa Thuận Đông', 1, 1),
(25, 'Phường Nam Dương', 1, 1),
(26, 'Phường Bình Hiên', 1, 1),
(27, 'Phường Bình Thuận', 1, 1),
(28, 'Phường Hòa Cường Bắc', 1, 1),
(29, 'Phường Hòa Cường Nam', 1, 1),
(30, 'Phường Thọ Quang', 1, 6),
(31, 'Phường Nại Hiên Đông', 1, 6),
(32, 'Phường Mân Thái', 1, 6),
(33, 'Phường An Hải Bắc', 1, 6),
(34, 'Phường Phước Mỹ', 1, 6),
(35, 'Phường An Hải Tây', 1, 6),
(36, 'Phường An Hải Đông', 1, 6),
(37, 'Phường Mỹ An', 1, 5),
(38, 'Phường Khuê Mỹ', 1, 5),
(39, 'Phường Hoà Quý', 1, 5),
(40, 'Phường Hoà Hải', 1, 5),
(41, 'Phường Khuê Trung', 1, 2),
(42, 'Phường Hòa Phát', 1, 2),
(43, 'Phường Hòa An', 1, 2),
(44, 'Phường Hòa Thọ Tây', 1, 2),
(45, 'Phường Hòa Thọ Đông', 1, 2),
(46, 'Phường Hòa Xuân', 1, 2),
(47, 'Xã Hòa Bắc', 1, 7),
(48, 'Xã Hòa Liên', 1, 7),
(49, 'Xã Hòa Ninh', 1, 7),
(50, 'Xã Hòa Sơn', 1, 7),
(51, 'Xã Hòa Nhơn', 1, 7),
(52, 'Xã Hòa Phú', 1, 7),
(53, 'Xã Hòa Phong', 1, 7),
(54, 'Xã Hòa Châu', 1, 7),
(55, 'Xã Hòa Tiến', 1, 7),
(56, 'Xã Hòa Phước', 1, 7),
(57, 'Xã Hòa Khương', 1, 7);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `id_kh` (`id_kh`),
  ADD KEY `ma_hh` (`ma_hh`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD PRIMARY KEY (`ma_hh`),
  ADD KEY `ma_loai` (`ma_loai`);

--
-- Chỉ mục cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`id_hoadonchitiet`),
  ADD KEY `id_hoa_don` (`id_hoa_don`),
  ADD KEY `ma_hh` (`ma_hh`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id_hoa_don`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `huyen_quan`
--
ALTER TABLE `huyen_quan`
  ADD PRIMARY KEY (`id_huyen`),
  ADD KEY `id_tinh` (`id_tinh`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_hh` (`ma_hh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_kh`),
  ADD UNIQUE KEY `ma_kh` (`ma_kh`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Chỉ mục cho bảng `tinh_thanhpho`
--
ALTER TABLE `tinh_thanhpho`
  ADD PRIMARY KEY (`id_tinh`);

--
-- Chỉ mục cho bảng `xa_phuong`
--
ALTER TABLE `xa_phuong`
  ADD PRIMARY KEY (`id_xa`),
  ADD KEY `id_huyen` (`id_huyen`),
  ADD KEY `id_tinh` (`id_tinh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_bl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  MODIFY `ma_hh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  MODIFY `id_hoadonchitiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  MODIFY `id_hoa_don` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `huyen_quan`
--
ALTER TABLE `huyen_quan`
  MODIFY `id_huyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_kh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT cho bảng `tinh_thanhpho`
--
ALTER TABLE `tinh_thanhpho`
  MODIFY `id_tinh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `xa_phuong`
--
ALTER TABLE `xa_phuong`
  MODIFY `id_xa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`),
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`);

--
-- Các ràng buộc cho bảng `hang_hoa`
--
ALTER TABLE `hang_hoa`
  ADD CONSTRAINT `ma_loai` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`),
  ADD CONSTRAINT `id_hoa_don` FOREIGN KEY (`id_hoa_don`) REFERENCES `hoa_don` (`id_hoa_don`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `hoa_don_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`);

--
-- Các ràng buộc cho bảng `huyen_quan`
--
ALTER TABLE `huyen_quan`
  ADD CONSTRAINT `huyen_quan_ibfk_1` FOREIGN KEY (`id_tinh`) REFERENCES `tinh_thanhpho` (`id_tinh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`ma_hh`) REFERENCES `hang_hoa` (`ma_hh`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `xa_phuong`
--
ALTER TABLE `xa_phuong`
  ADD CONSTRAINT `xa_phuong_ibfk_1` FOREIGN KEY (`id_huyen`) REFERENCES `huyen_quan` (`id_huyen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `xa_phuong_ibfk_2` FOREIGN KEY (`id_tinh`) REFERENCES `tinh_thanhpho` (`id_tinh`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
