-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2021 lúc 03:18 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlbh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietgd`
--

CREATE TABLE `chitietgd` (
  `magd` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitietgd`
--

INSERT INTO `chitietgd` (`magd`, `masp`, `soluong`) VALUES
(3, 6, 1),
(4, 2, 1),
(5, 2, 1),
(6, 2, 1),
(7, 1, 1),
(8, 1, 1),
(9, 1, 1),
(10, 1, 1),
(11, 1, 1),
(12, 1, 1),
(13, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `madm` int(11) NOT NULL,
  `tendm` varchar(255) NOT NULL,
  `xuatsu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `danhmucsp`
--

INSERT INTO `danhmucsp` (`madm`, `tendm`, `xuatsu`) VALUES
(3, 'OPPO', 'Trung Quốc'),
(4, 'Xiaomi', 'Trung Quốc'),
(5, 'Apple', 'Mỹ'),
(6, 'Samsung', 'Hàn Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodich`
--

CREATE TABLE `giaodich` (
  `magd` int(11) NOT NULL,
  `tinhtrang` tinyint(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_dst` varchar(20) NOT NULL,
  `user_addr` text NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `tongtien` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `giaodich`
--

INSERT INTO `giaodich` (`magd`, `tinhtrang`, `user_id`, `user_name`, `user_dst`, `user_addr`, `user_phone`, `tongtien`, `date`) VALUES
(3, 0, 0, 'thuan', 'q1', 'no', '', '50', '2021-05-23 08:57:11'),
(4, 0, 0, 'Admin bá đạo', 'q1', 'sao biết dc', '', '23', '2021-05-23 09:18:09'),
(5, 0, 0, 'Nguyễn Duy Thuận', 'q1', '', '', '23', '2021-05-23 12:02:22'),
(6, 0, 0, '', 'Quận 1', '', '', '23', '2021-05-23 12:02:31'),
(7, 0, 0, 'Nguyễn Duy Thuận', 'q1', '', '', '18990000', '2021-05-23 12:43:29'),
(8, 0, 0, 'Nguyễn Duy Thuận', 'q1', '', '', '18990000', '2021-05-23 12:43:35'),
(9, 0, 0, 'Nguyễn Duy Thuận', 'q1', '', '', '18990000', '2021-05-23 12:45:41'),
(10, 0, 0, 'Nguyễn Duy Thuận', 'q1', '', '', '18990000', '2021-05-23 12:47:20'),
(11, 0, 0, 'Nguyễn Duy Thuận', 'q1', '', '', '18990000', '2021-05-23 12:48:27'),
(12, 0, 0, 'Nguyễn Duy Thuận', 'q1', '', '', '18990000', '2021-05-23 12:49:45'),
(13, 0, 0, 'Nguyễn Duy Thuận', 'q1', '', '', '18990000', '2021-05-23 12:50:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `user_id` int(11) NOT NULL,
  `masp` int(11) NOT NULL,
  `soluong` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(11) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `gia` varchar(20) NOT NULL,
  `baohanh` tinyint(2) NOT NULL,
  `khuyenmai` varchar(100) NOT NULL,
  `madm` int(11) NOT NULL,
  `anhchinh` varchar(255) NOT NULL,
  `luotmua` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL,
  `ngay_nhap` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `gia`, `baohanh`, `khuyenmai`, `madm`, `anhchinh`, `luotmua`, `luotxem`, `ngay_nhap`) VALUES
(1, 'Samsung Galaxy S21 5G', '18990000', 12, '', 6, '35801samsung-galaxy-s21-tim-1-org.jpg', 0, 0, '2021-05-23 07:53:53'),
(2, 'iPhone 12 64GB', '23490000', 12, '', 5, '938408iphone-12-violet-gc-org.jpg', 0, 0, '2021-05-23 07:53:53'),
(3, 'Xiaomi Redmi Note 10 (6GB/128GB)', '5090000', 12, '', 4, '103408xiaomi-redmi-note-10-xam-1-org.jpg', 0, 0, '2021-05-23 07:53:53'),
(4, 'OPPO A93', '5990000', 12, '', 3, '873338oppo-a93-den-1-org.jpg', 0, 0, '2021-05-23 07:53:53'),
(5, ' iPhone 12 Pro Max 128GB', '31990000', 12, '', 5, '236319iphone-12-pro-max-xanh-duong-1-org.jpg', 0, 0, '2021-05-23 07:53:53'),
(6, 'Samsung Galaxy Z Fold2 5G Đặc Biệt', '50000000', 12, '', 6, '214230samsung-galaxy-z-fold2-5g-dac-biet-vang-dong-1-org.jpg', 0, 0, '2021-05-23 07:53:53'),
(7, ' Samsung Galaxy S21 Ultra 5G 256GB', '28990000', 12, '', 6, '768167samsung-galaxy-s21-ultra-256gb-1-1-org.jpg', 0, 0, '2021-05-23 13:01:50'),
(8, 'iPhone 12 Pro 256GB', '28890000', 12, '', 5, '81745iphone-12-pro-256gb-1-org.jpg', 0, 0, '2021-05-23 13:03:27'),
(9, 'iPhone 11 64GB', '17690000', 12, '', 5, '91715iphone-11-xanh-la-1-1-org.jpg', 0, 0, '2021-05-23 13:11:03'),
(10, 'Samsung Galaxy Note 10+', '16490000', 12, '', 6, '84851samsung-galaxy-note-10-plus-bac-1-org.jpg', 0, 0, '2021-05-23 13:36:13'),
(11, 'iPhone XR 128GB', '15490000', 12, '', 5, '95854iphone-xr-128gb-xanh-1-1-org.jpg', 0, 0, '2021-05-23 13:37:14'),
(12, 'iPhone SE 256GB', '14490000', 12, '', 5, '484485iphone-se-2020-do-1-1-org.jpg', 0, 0, '2021-05-23 13:39:20'),
(13, 'OPPO A74 5G', '7490000', 12, '', 3, '970790oppo-a74-5g-den-1-org.jpg', 0, 0, '2021-05-23 14:01:39'),
(14, 'Xiaomi Redmi 9T (6GB/128GB)', '4190000', 12, '', 4, '253648xiaomi-redmi-9t-6gb-xam-1-org.jpg', 0, 0, '2021-05-23 16:24:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamyeuthich`
--

CREATE TABLE `sanphamyeuthich` (
  `user_id` int(11) NOT NULL,
  `masp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `tentaikhoan` varchar(100) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `sodt` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quyen` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `ten`, `tentaikhoan`, `matkhau`, `diachi`, `sodt`, `email`, `date`, `quyen`) VALUES
(1, 'Admin', 'admin', '123', 'No info', 'Không cho', '', '2021-05-23 19:00:09', 1),
(2, 'Nguyễn Duy Thuận', 'thuan', '123', '', '', '', '2021-05-23 20:17:50', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitietgd`
--
ALTER TABLE `chitietgd`
  ADD PRIMARY KEY (`magd`,`masp`);

--
-- Chỉ mục cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`madm`);

--
-- Chỉ mục cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  ADD PRIMARY KEY (`magd`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`user_id`,`masp`),
  ADD KEY `fk_gh_sp` (`masp`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`masp`),
  ADD KEY `fk_sp_dmsp` (`madm`);

--
-- Chỉ mục cho bảng `sanphamyeuthich`
--
ALTER TABLE `sanphamyeuthich`
  ADD PRIMARY KEY (`user_id`,`masp`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  MODIFY `madm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `giaodich`
--
ALTER TABLE `giaodich`
  MODIFY `magd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `masp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_gh_sp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`),
  ADD CONSTRAINT `fk_gh_tv` FOREIGN KEY (`user_id`) REFERENCES `thanhvien` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sp_dmsp` FOREIGN KEY (`madm`) REFERENCES `danhmucsp` (`madm`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
