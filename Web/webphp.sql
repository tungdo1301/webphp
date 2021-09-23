-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blsanpham`
--

CREATE TABLE `blsanpham` (
  `id_bl` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dien_thoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `binh_luan` text COLLATE utf8_unicode_ci NOT NULL,
  `ngay_gio` datetime NOT NULL,
  `Hien_thi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blsanpham`
--

INSERT INTO `blsanpham` (`id_bl`, `id_sp`, `ten`, `dien_thoai`, `binh_luan`, `ngay_gio`, `Hien_thi`) VALUES
(6, 32, 'Hoàng Minh Tuấn', '0968 511 155', 'Đẹp đấy, nhưng mà đắt qua không có tiền để mua', '2020-06-19 10:41:27', 1),
(7, 10, 'Hoàng Minh Tuấn', '0968 511 155', 'Sản phẩm này cũ rồi', '2020-06-20 14:32:34', 1),
(8, 5, 'Hoàng Minh Tuấn', '0968 511 155', 'Sản phẩm đắt quá. không đủ tiêng mua. cho thì xin.', '2020-07-17 15:05:12', 1),
(11, 8, 'Nguyễn Thị Hồng', '0988888888', 'Lơp chúng ta là PHPK 106', '2020-03-14 03:34:35', 1),
(12, 28, 'Le Van Tan', '0979 598 500', 'Sản phẩm dùng rất tốt', '2020-04-07 12:40:38', 1),
(15, 21, 'Quat Dai Ca', '123456', 'qqqqqqqqqqq', '2020-04-27 14:44:25', 1),
(16, 31, 'qwqwq', '1111', '1111', '2020-04-27 14:50:29', 1),
(17, 1, 'wqwq', '123', 'wqwqw', '2020-04-27 15:18:07', 1),
(18, 12, 'ahihi', '12345', 'sản phẩm tốt', '2020-07-05 10:27:52', 1),
(19, 35, 'Duy Khánh', '0968 511155', 'ok', '2021-05-10 17:04:02', 1),
(20, 34, 'Khách111', '123456', 'quá ok', '2021-06-10 15:10:04', 1),
(21, 34, 'Duy Khánh 2 ', '7777777777', 'Ngon nè', '2021-06-10 15:16:48', 1),
(22, 35, 'Tuấn ', '1111111111', 'Siêu phẩm', '2021-06-10 16:21:27', 1),
(23, 35, 'Duy ', '123456', 'xấu', '2021-06-20 18:12:39', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) NOT NULL,
  `id_dh` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL,
  `gia` varchar(225) NOT NULL,
  `thoi_gian_tao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `id_dh`, `id_sp`, `so_luong`, `gia`, `thoi_gian_tao`) VALUES
(22, 29, 35, 1, '25000000', '2021-06-10 14:33:20'),
(23, 29, 23, 1, '8600000', '2021-06-10 14:33:24'),
(24, 30, 34, 2, '36000000', '2021-06-10 14:33:29'),
(25, 30, 38, 1, '8500000', '2021-06-10 14:33:33'),
(26, 31, 21, 2, '17200000', '2021-06-10 14:33:37'),
(27, 31, 10, 1, '8600000', '2021-06-10 14:33:41'),
(28, 31, 16, 1, '8600000', '2021-06-10 14:33:45'),
(29, 32, 3, 1, '8600000', '2021-06-10 14:33:48'),
(30, 32, 34, 1, '18000000', '2021-06-10 14:33:52'),
(33, 35, 33, 1, '22000000', '2021-06-10 14:34:00'),
(34, 36, 34, 1, '8000000', '0000-00-00 00:00:00'),
(36, 37, 34, 1, '18000000', '0000-00-00 00:00:00'),
(37, 38, 35, 1, '8000000', '0000-00-00 00:00:00'),
(38, 38, 28, 1, '8000000', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmsanpham`
--

CREATE TABLE `dmsanpham` (
  `id_dm` int(10) NOT NULL,
  `ten_dm` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dmsanpham`
--

INSERT INTO `dmsanpham` (`id_dm`, `ten_dm`) VALUES
(1, 'iPhone'),
(2, 'Samsung'),
(3, 'Sony Ericson'),
(4, 'LG'),
(5, 'HTC'),
(6, 'Nokia'),
(7, 'Blackberry');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id_dh` int(11) NOT NULL,
  `ten` varchar(225) NOT NULL,
  `sdt` varchar(225) NOT NULL,
  `dia_chi` varchar(225) NOT NULL,
  `tong_gia` varchar(225) NOT NULL,
  `trang_thai` int(1) NOT NULL,
  `thoi_gian_tao` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id_dh`, `ten`, `sdt`, `dia_chi`, `tong_gia`, `trang_thai`, `thoi_gian_tao`) VALUES
(29, 'Tuấn ', '1111111111', 'Hà Nội', '33600000', 1, '2021-06-04 13:54:31'),
(30, 'Hoàng', '1234567890', 'Quảng Ninh', '44500000', 1, '2021-06-05 13:54:34'),
(31, 'Quế', '2222222222', 'Hải Phòng', '34400000', 0, '2021-06-06 13:54:36'),
(32, 'Sơn', '0999999999', 'Hải Dương', '26600000', 0, '2021-06-07 13:54:39'),
(35, 'Vũ Cường', '999999999', 'Hải Phòng', '22000000', 1, '2021-06-09 13:54:49'),
(36, 'Duy Khánh 1', '7777777777', 'Bắc giang', '26000000', 0, '0000-00-00 00:00:00'),
(37, 'Tuấn Anh', '1111111111', 'Hà Nội 2', '18000000', 0, '0000-00-00 00:00:00'),
(38, 'Duy Khánh 2 ', '7777777777', 'Nam Định', '33000000', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quangcao`
--

CREATE TABLE `quangcao` (
  `id_quangcao` int(11) NOT NULL,
  `id_thue` int(11) NOT NULL,
  `ten_anh` text COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quangcao`
--

INSERT INTO `quangcao` (`id_quangcao`, `id_thue`, `ten_anh`) VALUES
(1, 3, 'sub-banner1.png'),
(6, 3, 'sub-banner2.png'),
(7, 3, 'sub-banner3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) UNSIGNED NOT NULL,
  `id_dm` int(11) UNSIGNED NOT NULL,
  `ten_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anh_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gia_sp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bao_hanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phu_kien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tinh_trang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `khuyen_mai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trang_thai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dac_biet` int(1) NOT NULL,
  `chi_tiet_sp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ton_kho` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dm`, `ten_sp`, `anh_sp`, `gia_sp`, `bao_hanh`, `phu_kien`, `tinh_trang`, `khuyen_mai`, `trang_thai`, `dac_biet`, `chi_tiet_sp`, `ton_kho`) VALUES
(1, 1, 'IPhone 3GS 32G Màu Đen', 'prd08 .png', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 40),
(2, 1, 'iPhone 4 16G Quốc Tế Trắng', 'prd10 .png', '6000000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '<p>Tất cả c&aacute;c sản phẩm Điện thoại của Vietpro Mobile Shop đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n', 50),
(3, 1, 'iPhone 5 16GB Quốc Tế Đen', 'iPhone-5-16GB-Quoc-Te-Den .png', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(4, 1, 'iPhone 5C 16GB Blue', 'iPhone-5C-16GB-Blue .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 65),
(5, 1, 'iPhone 5S 32GB Quốc tế', 'prd08 .png', '2000000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '<p>Tất cả c&aacute;c sản phẩm Điện thoại của Vietpro Mobile Shop đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n', 50),
(6, 2, 'Samsung Galaxy Note N7000 pink', 'Sam-Galaxy-Note-N7000-pink .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 70),
(7, 2, 'Samsung Galaxy Note 2 đen', 'samsung-galaxy-note-2-den .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(8, 2, 'Samsung Galaxy Note 3', 'samsung-galaxy-note-3 .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 30),
(9, 2, 'Samsung Galaxy S2', 'samsung-galaxy-s2 .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(10, 2, 'Samsung Galaxy S3', 'samsung-galaxy-s3 .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(11, 2, 'Samsung Galaxy S4', 'samsung-galaxy-s4-galaxy .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(12, 3, 'Sony Arc S (LT18i) Trắng', 'Sony-arc-S-LT18i-Trang .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(13, 3, 'Sony Arc S', 'Sony-arc-S-LT18i-Trang .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 70),
(14, 3, 'Sony X10', 'sony-x10 .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 100),
(15, 3, 'Sony Xperia TX (LT29i) Đen', 'Sony-Xperia-TX-LT29i-Den .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(16, 3, 'Sony Xperia Z Màu Đen', 'Sony-Xperia-Z-Mau-Den .png', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '<p>Tất cả c&aacute;c sản phẩm Điện thoại của Vietpro Mobile Shop đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n', 50),
(17, 4, 'LG F160 Optimus LTE 2', 'LG-F160-Optimus-LTE-2 .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(18, 4, 'LG LTE 3 (LG F260)', 'LG-LTE-3-LG F260 .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(19, 4, 'LG Optimus 2X SU660', 'LG-optimus-2x-SU660 .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(20, 4, 'LG Optimus 3D SU760', 'LG-Optimus-3D-SU760 .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(21, 4, 'LG Optimus G', 'LG-Optimus-G .png', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '<p>Tất cả c&aacute;c sản phẩm Điện thoại của Vietpro Mobile Shop đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n', 50),
(22, 4, 'LG Optimus L7(LG P705)', 'LG-Optimus-3D-SU760 .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(23, 5, 'HTC EVO 3D', 'HTC-EVO-3D .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(24, 5, 'HTC One Đen 16GB công ty FPT', 'HTC-One-Den-16GB-cong-ty-FPT .jpg', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '', 50),
(25, 5, 'HTC One Trắng 16GB FPT', 'HTC-One-Trang-16GB-cong-ty-FPT .png', '8600000', '12 tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '<p>Tất cả c&aacute;c sản phẩm Điện thoại của Vietpro Mobile Shop đều l&agrave; c&aacute;c sản phẩm ch&iacute;nh h&atilde;ng, được bảo h&agrave;nh 12 th&aacute;ng tr&ecirc;n to&agrave;n quốc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n', 70),
(28, 7, 'Blackberry-Bold-9000', '3-BlackBerry-Bold-9700 .jpg', '8000000', '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '<p>(D&acirc;n tr&iacute;) - Đ&aacute;m ch&aacute;y b&ugrave;ng ph&aacute;t trưa nay, 7/4, tại khu nh&agrave; t&ocirc;n ngay gần t&ograve;a nh&agrave; Keangnam, đường Phạm H&ugrave;ng. Ngọn lửa c&ugrave;ng kh&oacute;i đen bốc l&ecirc;n dữ dội l&agrave;m đen kịt một g&oacute;c kh&ocirc;ng gian. Giao th&ocirc;ng quanh khu vực bị ảnh hưởng, trong đ&oacute; đường tr&ecirc;n cao bị tắc một đoạn kh&aacute; d&agrave;i...</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n', 60),
(29, 7, 'BlackBerry-Curve-3G-9300', '5-BlackBerry-Curve-3G-9300 .jpg', '8600000', '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn Hình 3 lớp', 'Còn hàng', 0, '<p>sasasa</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n', 60),
(32, 1, 'Iphone 12 promax ', 'iphone.png', '30000000', '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn hình 3 lớp, cường lực', 'Còn hàng', 1, '', 60),
(33, 1, 'Iphone 12 ', 'galaxy-note.jpg', '22000000', '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn hình 3 lớp', 'Còn hàng', 1, '', 50),
(34, 1, 'Iphone 12 mini', 'Z1.png', '18000000', '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn hình 3 lớp', 'Còn hàng', 1, '', 70),
(35, 1, 'Iphone 12 pro', 'galaxy-s4.jpg', '25000000', '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn hình 3 lớp', 'Còn hàng', 1, '<p><strong>iPhone 12 ra mắt với vai tr&ograve; mở ra một kỷ nguy&ecirc;n ho&agrave;n to&agrave;n mới. Tốc độ mạng 5G si&ecirc;u tốc, bộ vi xử l&yacute; A14 Bionic nhanh nhất thế giới smartphone, m&agrave;n h&igrave;nh OLED tr&agrave;n cạnh tuyệt đẹp v&agrave; camera si&ecirc;u chụp đ&ecirc;m, tất cả đều c&oacute; mặt tr&ecirc;n&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/iphone-12\" title=\"iPhone 12\" type=\"iPhone 12\">iPhone 12</a>.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img alt=\"iPhone 12 chính hãng FPTShop\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-1(1).JPG\" title=\"iPhone 12 chính hãng FPTShop\" /></strong></p>\r\n\r\n<h2><strong>Thiết kế mỏng nhẹ, nhỏ gọn v&agrave; đẳng cấp</strong></h2>\r\n\r\n<p>iPhone 12 đ&atilde; c&oacute; sự đột ph&aacute; về thiết kế với kiểu d&aacute;ng mới vu&ocirc;ng vắn, mạnh mẽ v&agrave; sang trọng hơn. Kh&ocirc;ng chỉ vậy, iPhone 12 mỏng hơn 11%, nhỏ gọn hơn 15% v&agrave; nhẹ hơn 16% so với thế hệ trước&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/iphone-11-64gb\">iPhone 11</a>.</p>\r\n\r\n<p>Bất ngờ hơn nữa l&agrave; d&ugrave; gọn hơn đ&aacute;ng kể nhưng iPhone 12 vẫn c&oacute; m&agrave;n h&igrave;nh 6,1 inch như iPhone 11 m&agrave; kh&ocirc;ng hề bị cắt giảm. Phần viền m&agrave;n h&igrave;nh thu hẹp tối đa c&ugrave;ng sự nỗ lực trong thiết kế đ&atilde; tạo n&ecirc;n điều kỳ diệu ở iPhone 12.</p>\r\n\r\n<p><img alt=\"Thiết kế iPhone 12\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-2(1).JPG\" title=\"Thiết kế iPhone 12 mỏng nhẹ, nhỏ gọn và đẳng cấp\" /></p>\r\n\r\n<p><em>iPhone 12 c&oacute; thiết kế nhỏ gọn, mỏng nhẹ v&agrave; đẳng cấp</em></p>\r\n\r\n<h2><strong>Ceramic Shield, bảo vệ an to&agrave;n cho mặt k&iacute;nh</strong></h2>\r\n\r\n<p>iPhone 12 thể hiện sự cao cấp từ những vật liệu chế t&aacute;c, bao gồm khung nh&ocirc;m cứng c&aacute;p v&agrave; 2 mặt k&iacute;nh tuyệt đẹp. Hơn thế nữa, mặt k&iacute;nh của iPhone 12 được bảo vệ bởi một lớp gốm (Ceramic Shield), gi&uacute;p cứng hơn mặt k&iacute;nh của bất kỳ chiếc&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai\">điện thoại</a>&nbsp;n&agrave;o kh&aacute;c. iPhone của bạn sẽ bền vững hơn tới 4 lần, kh&oacute; xước hơn, mang tới cảm gi&aacute;c y&ecirc;n t&acirc;m khi sử dụng.</p>\r\n\r\n<p><img alt=\"mặt kính iPhone 12\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-3(1).JPG\" title=\"Ceramic Shield, bảo vệ an toàn cho mặt kính iPhone 12\" /></p>\r\n\r\n<h2><strong>iPhone 12 chống nước ho&agrave;n hảo</strong></h2>\r\n\r\n<p>iPhone 12 tiếp tục c&oacute; khả năng chống nước v&agrave; chống bụi chuẩn IP68, nhưng giờ đ&acirc;y bạn đ&atilde; c&oacute; thể ng&acirc;m nước ở độ s&acirc;u tới 6m trong v&ograve;ng 30 ph&uacute;t thay v&igrave; 1,5m như trước kia. Tha hồ sử dụng m&agrave; kh&ocirc;ng c&ograve;n bất cứ nỗi lo n&agrave;o về hư hại từ nước.</p>\r\n\r\n<p><img alt=\"iPhone 12 chống nước\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-5(1).JPG\" title=\"iPhone 12 chống nước hoàn hảo\" /></p>\r\n\r\n<h2><strong>M&agrave;u sắc mới của iPhone 12</strong></h2>\r\n\r\n<p>iPhone 12 mang đến cho bạn nhiều sự lựa chọn m&agrave;u hơn bao giờ hết. C&oacute; tới 5 m&agrave;u sắc iPhone 12 thời trang, bao gồm Đen, Trắng, Đỏ, Xanh l&aacute; v&agrave; Xanh dương. Bạn c&oacute; thể tự do thể hiện c&aacute; t&iacute;nh, kh&aacute;c biệt với phi&ecirc;n bản m&agrave;u sắc ph&ugrave; hợp. Ngo&agrave;i ra iPhone 12&nbsp;c&oacute; 3 phi&ecirc;n bản dung lượng cho người d&ugrave;ng lựa chọn gồm: iPhone 12 64GB, iPhone 12 128GB v&agrave; iPhone 12 256GB.</p>\r\n\r\n<p><img alt=\"Màu sắc mới của iPhone 12\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-8(1).JPG\" title=\"Màu sắc mới của iPhone 12\" /></p>\r\n\r\n<p><em>Tổng hợp c&aacute;c t&ugrave;y chọn m&agrave;u sắc mới tr&ecirc;n iPhone 12</em></p>\r\n\r\n<h2><strong>5G si&ecirc;u tốc, mở ra kỷ nguy&ecirc;n di động mới</strong></h2>\r\n\r\n<p>iPhone 12 sẽ c&oacute; hỗ trợ kết nối mạng 5G nhanh nhất hiện nay. Bạn c&oacute; thể l&agrave;m việc, giải tr&iacute; với tốc độ mạng nhanh đ&aacute;ng kinh ngạc. Xem video trực tuyến, ph&aacute;t trực tiếp, chơi game online, gọi FaceTime HD hay l&agrave;m bất cứ điều g&igrave; bạn muốn m&agrave; kh&ocirc;ng hề c&oacute; hiện tượng giật h&igrave;nh v&igrave; mạng yếu. iPhone 12 cho trải nghiệm mạng di động nhanh chưa từng thấy.</p>\r\n\r\n<p><img alt=\"iPhone 12 với 5G\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-7(1).JPG\" title=\"iPhone 12 với 5G siêu tốc, mở ra kỷ nguyên di động mới\" /></p>\r\n\r\n<p><em>iPhone 12 sẽ c&oacute; hỗ trợ kết nối 5G cho c&aacute;c model series</em></p>\r\n\r\n<h2><strong>Apple A14 Bionic, bộ vi xử l&yacute; nhanh nhất thế giới smartphone</strong></h2>\r\n\r\n<p>Sức mạnh của iPhone 12 vượt trội so với phần c&ograve;n lại nhờ bộ vi xử l&yacute; Apple A14 Bionic, con chip nhanh nhất thế giới điện thoại hiện nay. Apple A14 Bionic l&agrave; con chip đầu ti&ecirc;n tr&ecirc;n thế giới sản xuất tr&ecirc;n tiến tr&igrave;nh 5nm, với 6 nh&acirc;n CPU v&agrave; 4 nh&acirc;n GPU c&ugrave;ng 11,8 tỷ b&oacute;ng b&aacute;n dẫn, kh&ocirc;ng chỉ cho hiệu năng tuyệt đỉnh m&agrave; c&ograve;n tiết kiệm năng lượng hơn rất nhiều.</p>\r\n\r\n<p>Apple A14 Bionic cũng được n&acirc;ng cấp về khả năng học hỏi th&oacute;i quen người d&ugrave;ng khi tăng từ 8 l&ecirc;n 16 l&otilde;i Neural Engine, đồng thời trang bị bộ xử l&yacute; t&iacute;n hiệu h&igrave;nh ảnh ho&agrave;n to&agrave;n mới để iPhone 12 c&oacute; thể mang đến những điều kh&aacute;c biệt trong cả chụp ảnh v&agrave; quay phim.</p>\r\n\r\n<p><img alt=\"Chip Apple A14 Bionic trên iPhone 12\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-10.JPG\" title=\"Chip Apple A14 Bionic trên iPhone 12\" /></p>\r\n\r\n<p><em>Hiệu năng iPhone 12 c&oacute; trở n&ecirc;n &quot;v&ocirc; đối&quot; với chip Apple A14 Bionic?</em></p>\r\n\r\n<h2><strong>M&agrave;n h&igrave;nh OLED Super Retina XDR si&ecirc;u sắc n&eacute;t</strong></h2>\r\n\r\n<p>So với m&agrave;n h&igrave;nh iPhone 11, m&agrave;n h&igrave;nh iPhone 12 đ&atilde; c&oacute; một sự nhảy vọt. Ngo&agrave;i thiết kế viền mỏng hơn, chất lượng m&agrave;n h&igrave;nh iPhone 12 cải thiện r&otilde; rệt với c&ocirc;ng nghệ OLED v&agrave; độ sắc n&eacute;t tuyệt vời từ c&ocirc;ng nghệ Super Retina XDR. Bạn sẽ được chi&ecirc;m ngưỡng những h&igrave;nh ảnh gi&agrave;u chi tiết, độ tương phản cao tới 2.000.000:1, m&agrave;u sắc rực rỡ v&agrave; m&agrave;u đen cực s&acirc;u. Đ&acirc;y l&agrave; m&agrave;n h&igrave;nh&nbsp;<a href=\"https://fptshop.com.vn/dien-thoai/apple-iphone\">iPhone</a>&nbsp;đẹp nhất từ trước đến nay, khiến bạn đắm ch&igrave;m trong kh&ocirc;ng gian giải tr&iacute; hấp dẫn.</p>\r\n\r\n<p><img alt=\"Màn hình iPhone 12 \" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-9.JPG\" title=\"Màn hình OLED Super Retina XDR siêu sắc nét của iPhone 12 \" /></p>\r\n\r\n<h2><strong>Hệ thống camera mới, th&aacute;ch thức m&agrave;n đ&ecirc;m</strong></h2>\r\n\r\n<p>Cả camera g&oacute;c rộng v&agrave; g&oacute;c si&ecirc;u rộng tr&ecirc;n iPhone 12 đều được trang bị t&iacute;nh năng chụp đ&ecirc;m Night mode, cho khả năng chụp ảnh thiếu s&aacute;ng ho&agrave;n hảo. Camera ch&iacute;nh 12MP khẩu độ lớn tới f/1.6, cho khả năng thu s&aacute;ng nhiều hơn tới 27%. D&ugrave; l&agrave; bạn chụp ảnh ban ng&agrave;y hay dưới m&agrave;n đ&ecirc;m, iPhone 12 cũng đều t&aacute;i tạo lại độ chi tiết tuyệt vời, m&agrave;u sắc ch&iacute;nh x&aacute;c v&agrave; tạo n&ecirc;n những t&aacute;c phẩm nghệ thuật.</p>\r\n\r\n<p><img alt=\"camera iPhone 12\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-11.JPG\" title=\"Hệ thống camera mới trên iPhone 12\" /></p>\r\n\r\n<h2><strong>Smart HDR 3, chụp đẹp trong mọi ho&agrave;n cảnh</strong></h2>\r\n\r\n<p>T&iacute;nh năng mới Smart HDR 3 tr&ecirc;n iPhone 12 gi&uacute;p bạn chụp ảnh đẹp trong mọi ho&agrave;n cảnh, kể cả khi điều kiện &aacute;nh s&aacute;ng phức tạp như nắng gắt hay ngược s&aacute;ng. Ngo&agrave;i ra, tr&iacute; tuệ nh&acirc;n tạo c&ograve;n gi&uacute;p nhận diện cảnh hiệu quả để điều chỉnh m&agrave;u v&agrave; c&acirc;n bằng trắng ph&ugrave; hợp. V&iacute; dụ khi bạn chụp đồ ăn, iPhone sẽ kh&eacute;o l&eacute;o tinh chỉnh đ&ocirc;i ch&uacute;t để m&oacute;n ăn tr&ocirc;ng hấp dẫn v&agrave; ngon mắt hơn.</p>\r\n\r\n<p><img alt=\"chụp ảnh trên iPhone 12\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-13.JPG\" title=\"Smart HDR 3, chụp đẹp trong mọi hoàn cảnh\" /></p>\r\n\r\n<h2><strong>Một phim trường ngay tr&ecirc;n tay bạn</strong></h2>\r\n\r\n<p>iPhone 12 c&oacute; thể quay những thước phim chuy&ecirc;n nghiệp, bất chấp điều kiện thiếu s&aacute;ng. Hơn nữa, giờ đ&acirc;y bạn đ&atilde; c&oacute; thể quay video 4K HDR Dolby Vision, cho chất lượng như những đoạn phim truyền h&igrave;nh tr&ecirc;n Netflix. Tr&ecirc;n iPhone 12 c&ograve;n c&oacute; đầy đủ c&ocirc;ng cụ để chỉnh sửa, bi&ecirc;n tập v&agrave; xuất bản video nhanh ch&oacute;ng. H&atilde;y thử thưởng thức đoạn phim của bạn tr&ecirc;n m&agrave;n h&igrave;nh lớn của TV 4K HDR, bạn sẽ thấy bất ngờ v&igrave; những g&igrave; m&igrave;nh l&agrave;m được.</p>\r\n\r\n<p><img alt=\"Quay video trên iPhone 12\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-14.JPG\" title=\"Quay video trên iPhone 12\" /></p>\r\n\r\n<h2><strong>Selfie trong đ&ecirc;m tuyệt đẹp với iPhone 12</strong></h2>\r\n\r\n<p>T&iacute;nh năng chụp đ&ecirc;m Night mode kh&ocirc;ng chỉ &aacute;p dụng cho camera sau m&agrave; c&ograve;n xuất hiện tr&ecirc;n cả camera trước của iPhone 12. Bạn c&oacute; thể tự tin selfie d&ugrave; l&agrave; dưới trời tối. C&aacute;c t&iacute;nh năng kh&aacute;c của camera sau như Deep Fusion, Smart HDR 3, quay video 4K HDR Dolby Vision cũng đều c&oacute; mặt ở camera trước, gi&uacute;p camera trước iPhone 12 l&agrave;m được nhiều hơn l&agrave; những g&igrave; bạn nghĩ.</p>\r\n\r\n<p><img alt=\"Selfie trong đêm tuyệt đẹp với iPhone 12\" src=\"https://fptshop.com.vn/Uploads/images/2015/Tin-Tuc/QuanLNH2/iphone-12-15.JPG\" title=\"Selfie trong đêm tuyệt đẹp với iPhone 12\" /></p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n', 70),
(36, 1, 'iphone 5C', 'iPhone-5C-16GB-Blue .jpg', '4000000', '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn hình 3 lớp', 'Còn hàng', 0, '<p>Khuyến m&atilde;i</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&gt;</p>\r\n\r\n<p>&gt;</p>\r\n', 50),
(37, 6, 'Nokia lumia 800', 'lumia-800-mau-trang .jpeg', '7000000', '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn hình 3 lớp', 'Còn hàng', 0, '', 20),
(38, 6, 'Nokia lumia 900', 'lumia-900-trang .png', '8500000', '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn hình 3 lớp', 'Còn hàng', 0, '', 30),
(39, 6, 'Nokia lumia 920 pink', 'lumia-920-hong .png', '8000000', '12 Tháng', 'Hộp, sách, sạc, cáp, tai nghe', 'Máy Mới 100%', 'Dán Màn hình 3 lớp', 'Còn hàng', 0, '', 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_thanhvien` int(10) NOT NULL,
  `ten` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mat_khau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quyen_truy_cap` int(1) NOT NULL,
  `sdt` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `dia_chi` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id_thanhvien`, `ten`, `email`, `mat_khau`, `quyen_truy_cap`, `sdt`, `dia_chi`) VALUES
(1, 'Khánhz1', 'duykhanh@gmail.com', 'duykhanh', 2, '0349414495', 'admin11'),
(2, 'Hoàng', 'sirtuanhoang@gmail.com', '111111', 1, '1234567890', 'Quảng Ninh'),
(3, 'Tuấn ', 'tuan@gmail.com', '222222', 1, '1111111111', 'Hà Nội'),
(9, 'Quế', 'quetbui@gmail.com', '123456789', 1, '2222222222', 'Hải Phòng'),
(17, 'Duy Khánh 2 ', 'admin@gmail.com', '111111', 1, '7777777777', 'Nam Định'),
(20, 'haha', 'hahaha@gmail.com', '12345', 1, '0123456789', 'Bắc Giang'),
(22, 'Sơn', 'hahaha1@gmail.com', '222222', 1, '0999999999', 'Hải Dương'),
(23, 'admin', 'admin2@gmail.com', '111111', 1, '12345612345', 'TP HCM'),
(25, 'khách', 'khach@gmail.com', 'khach123', 1, '10000100000', 'Đà Nẵng'),
(26, 'Vũ Cường', 'Cuong@gmail.com', '123456', 1, '999999999', 'Hải Phòng'),
(33, 'Duy ', 'Duy@gmail.com', '123456', 1, '0349414496', 'Hà Nội');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blsanpham`
--
ALTER TABLE `blsanpham`
  ADD PRIMARY KEY (`id_bl`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dh` (`id_dh`);

--
-- Chỉ mục cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id_dh`);

--
-- Chỉ mục cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`id_quangcao`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dm` (`id_dm`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id_thanhvien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blsanpham`
--
ALTER TABLE `blsanpham`
  MODIFY `id_bl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id_dm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id_dh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `id_quangcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id_thanhvien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_ibfk_1` FOREIGN KEY (`id_dh`) REFERENCES `donhang` (`id_dh`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
