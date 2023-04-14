-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2021 lúc 06:23 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_but`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`id`, `gid`, `name`, `img`) VALUES
(1, 1, 'Bàn Phím Chơi Game', 'images/chuyenmuc/banphim'),
(2, 2, 'Nước Dừa, Nước Cốt Dừa Ngon, An Toàn', 'images/chuyenmuc/nuocdua'),
(3, 1, 'Cáp & Dock Sạc', 'images/chuyenmuc/sac'),
(4, 3, 'Đầm Nữ Đẹp', 'images/chuyenmuc/vay');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`) VALUES
(1, 'Thiết Bị Điện Tử'),
(2, 'Siêu Thị Tạp Hóa'),
(3, 'Quần Áo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trangchu`
--

CREATE TABLE `trangchu` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `img` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `cardname` text COLLATE utf8_unicode_ci NOT NULL,
  `cardprice` text COLLATE utf8_unicode_ci NOT NULL,
  `currentprice` text COLLATE utf8_unicode_ci NOT NULL,
  `currentsaleoff` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trangchu`
--

INSERT INTO `trangchu` (`id`, `cid`, `img`, `cardname`, `cardprice`, `currentprice`, `currentsaleoff`) VALUES
(1, 3, 'images/sanpham/sp1', 'Củ Sạc Nhanh Apple PD 20W (Sạc Nhanh iPhone/Apple Watch) - Hàng Chính Hãng', '420.000 đ', '890.000 đ', '-53%'),
(2, 2, 'images/sanpham/sp2', '1 HỘP NƯỚC DỪA DỨA 330ML - MUA 4 HỘP TẶNG 1 KHẨU TRANG VICO FRESH', '11.000 đ', '26.000 đ', '-58%'),
(3, 4, 'images/sanpham/sp3', 'Đầm không tay cột dây Ahlisenshop đầm dáng xòe ôm eo họa tiết hoa cổ điển thích hợp dự tiệc tối - INTL', '240.994 đ', '350.000 đ', '-32%'),
(4, 1, 'images/sanpham/sp4', 'Bàn Phím Chơi Game Cơ MageGee Bàn Phím Phát Sáng Có Thể Điều Chỉnh LED 87 Phím Bàn Phím Máy Tính Kim Loại Bàn Phím USB Có Dây Chơi Game Màu Xanh Cho Windows PC Gamer]', '399.000 đ', '790.000 đ', '-49%'),
(5, 1, 'images/sanpham/sp5', 'Bàn phím cơ gaming TKL 87 phím SIDOTECH K004 Blue Switch dòng bàn phím máy tính chơi game mini có LED RGB biến đổi, cấu trúc cơ học vật lý không phải bàn phím giả cơ giá rẻ, tốc độ gõ phím cao chính xác, tuổi thọ 50 triệu lần bấm\r\n', '384.070 đ', '599.000 đ', '-36%'),
(6, 3, 'images/sanpham/sp6', 'Dây Sạc Lighting ROBOT RCL100 Dây Cáp Sạc iPhone iPad Cáp Tai Nghe Airpod Dây Cáp Sạc Nhanh iPhone 2.4A cho Iphone 6 6s 7 7s 8 8s X Xs Max 11 12 13 Ipad mini - Chất Liệu Dây Dù Chống Rối - Dài 100cm l HÀNG CHÍNH HÃNG', '34.000 đ', '79.000 đ', '-57%'),
(7, 2, 'images/sanpham/sp7', '[NƯỚC MÍA 100% TỰ NHIÊN] Combo 03 Lon Nước Mía Tự Nhiên 240mL Nguyên Chất Mía Tươi 100% 3 Hương Vị Tắc/ Táo/ Đào - Thương hiệu MÍAHA - YOOSOO MALL', '29.000 đ', '42.000 đ', '-31%'),
(8, 2, 'images/sanpham/sp8', '[TIỆN LỢI CHO MẸ] Combo 3 lon nước cốt dừa tươi 100% dừa nguyên chất Cocoxim Chefs Choice 400mL - Thương hiệu COCOXIM 400mL - YOOSOO MALL', '100.630 đ', '125.000 đ', '-19%'),
(9, 4, 'images/sanpham/sp9', 'Đầm nữ lưới xòe sát nách GUMAC DB644', '171.000 đ', '570.000 đ', '-70%'),
(10, 3, 'images/sanpham/sp10', 'Cốc sạc 2 cổng và Bộ cốc cáp sạc Hoco C73/C73A Glorious 2.4A - chân Lightning / Micro-USB / Type-C (Trắng) - Hãng phân phối chính thức - Nhất Tín Computer', '37.800 đ', '70.000 đ', '-46%'),
(11, 4, 'images/sanpham/sp11', 'Váy cổ thắt nơ HSU0221', '49.000 đ', '59.000 đ', '-17%'),
(12, 1, 'images/sanpham/sp12', 'Bàn Phím Gaming K618 Có Đèn Led 10 Chế Độ Khác Nhau Tặng Kèm Kê Tay, Phím Ngang Phím Cơ Cho Cảm Giác Gõ Cực Tốt', '333.060 đ', '429.001 đ', '-22%'),
(62, 4, '', 'thêm thử', '1223', '122333', '12'),
(63, 3, 'images/sanpham/sp63', 'buty', 'but', 'but', 'but'),
(64, 2, '', 'đã thêm ok', '11/08/2012', '122333', '2121'),
(65, 3, 'images/sanpham/sp65', 'bủt', 'thêm', '1', '2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(16, 'talaban007', 'c20ad4d76fe97759aa27a0c99bff6710', 0),
(17, 'talaban', 'fc5176e47bf886c05c02b9ec5d60149c', 0),
(18, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trangchu`
--
ALTER TABLE `trangchu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `trangchu`
--
ALTER TABLE `trangchu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
