-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 17, 2023 lúc 09:41 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopping_book`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `MaSach` varchar(10) NOT NULL,
  `TenSach` varchar(100) NOT NULL,
  `TacGia` varchar(50) NOT NULL,
  `NhaXB` varchar(20) NOT NULL,
  `NoiDung` varchar(500) NOT NULL,
  `DonGia` float NOT NULL,
  `MaTheLoai` varchar(10) NOT NULL,
  `HinhAnh` varchar(30) NOT NULL,
  `HinhAnh2` varchar(252) NOT NULL,
  `HinhAnh3` varchar(252) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`MaSach`, `TenSach`, `TacGia`, `NhaXB`, `NoiDung`, `DonGia`, `MaTheLoai`, `HinhAnh`, `HinhAnh2`, `HinhAnh3`) VALUES
('S02', 'Sĩ số lớp vắng 0', 'Emma Hạ My', 'Dân Trí', 'dsadasd', 81600, 'HR', 'sach2.jpg', '', ''),
('S03', 'Thần số học', 'Phillips', 'AdminNetd', 'dddddddddddsadasdddd', 129000, 'KH', 'sach3.jpg', '', ''),
('S05', 'Vàng và máu', 'Thế Lữ', 'Kim Đồng', 'Kể từ dsjakdjaskljdsakldjklajdklasjkldjsakldjklasjdklaj', 46750, 'HR', 'kinhdi2.jpg', '', ''),
('S06', 'Kho Vàng Sầm Sơn', 'TchyA', 'Kim Đồng', 'DSADHASFKJHJKASHFKJHKJHAKJFH', 59500, 'HR', 'kinhdi1.jpg', '', ''),
('S07', 'Cơn lốc quản trị', 'Phan Văn Trường', 'Trẻ', 'dsadasdsad', 129000, 'CT', 'conlocquantri.jpg', '', ''),
('S08', 'DISC', 'Jeffrey Sugerman', 'Hồng Đức', 'dsadsadasfas', 128000, 'CT', 'Disc.jpg', '', ''),
('S09', 'Sách chiến tranh tiền tệ', 'Song Hong Bing', 'NXB Lao Động', 'Về chiến tranh tiền tệ trong XH Hàn Quốc', 104300, 'KHKT', 'sachkinhte.jpg', '', ''),
('S10', 'Nghĩ Giàu & Làm Giàu (Khổ Nhỏ) ', 'Napoleon Hill', 'NXB Tổng Hợp TPHCM', '', 91800, 'KHKT', 'sachrich.jpg', '', ''),
('S12', 'You Complete Me', 'Thomas Elliott', 'Little Tiger Press', '', 113600, 'KH', '1700153111_Bo.jpg', '1700153111_Bo2.jpg', '1700153111_Bo3.jpg'),
('S13', 'Education - Kinh Doanh Giáo Dục Tại Thị Trường Việt Nam', 'Rio Books', 'NXB Dân Trí', '', 187000, 'EDU', '1700202131_edu1.jpg', '1700202131_edu2.jpg', '1700202131_edu3.jpg'),
('S15', 'Điều Khiến Giáo Viên Ưu Tú Trở Nên Khác Biệt', 'Todd Whitaker', 'Dân Trí', '', 63750, 'EDU', '1700204001_teacher1.jpg', '1700204001_teacher2.jpg', '1700204001_teacher3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `TenTaiKhoan` varchar(255) NOT NULL,
  `MaSach` varchar(255) NOT NULL,
  `TenSach` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `DonGia` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaTheLoai` varchar(255) NOT NULL,
  `MaDonHang` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `TenTaiKhoan`, `MaSach`, `TenSach`, `HinhAnh`, `DonGia`, `SoLuong`, `MaTheLoai`, `MaDonHang`) VALUES
(78, 'decute14', 'S03', 'Thần số học', 'sach3.jpg', 129000, 1, 'KH', 327),
(79, 'decute14', 'S02', 'Sĩ số lớp vắng 0', 'sach2.jpg', 81600, 1, 'HR', 327),
(80, 'decute14', 'S05', 'Vàng và máu', 'kinhdi2.jpg', 46750, 7, 'HR', 968),
(81, 'decute14', 'S06', 'Kho Vàng Sầm Sơn', 'kinhdi1.jpg', 59500, 1, 'HR', 251),
(82, 'decute14', 'S10', 'Nghĩ Giàu & Làm Giàu (Khổ Nhỏ) ', 'sachrich.jpg', 91800, 1, 'KHKT', 906),
(83, 'decute14', 'S04', 'English Listening Build', 'sach4.jpg', 150000, 1, 'GT', 906),
(84, 'decute14', 'S03', 'Thần số học', 'sach3.jpg', 129000, 1, 'KH', 906),
(85, 'decute14', 'S05', 'Vàng và máu', 'kinhdi2.jpg', 46750, 7, 'HR', 285),
(86, 'decute14', 'S04', 'English Listening Build', 'sach4.jpg', 150000, 1, 'GT', 285),
(87, 'decute14', 'S03', 'Thần số học', 'sach3.jpg', 129000, 1, 'KH', 285),
(88, 'decute14', 'S04', 'English Listening Build', 'sach4.jpg', 150000, 1, 'GT', 125),
(92, 'decute14', 'S05', 'Vàng và máu', 'kinhdi2.jpg', 46750, 7, 'HR', 398),
(93, 'decute14', 'S03', 'Thần số học', 'sach3.jpg', 129000, 1, 'KH', 398),
(101, 'decute14', 'S15', 'Điều Khiến Giáo Viên Ưu Tú Trở Nên Khác Biệt', '1700204001_teacher1.jpg', 54187.5, 5, 'EDU', 546),
(102, 'decute14', 'S13', 'Education - Kinh Doanh Giáo Dục Tại Thị Trường Việt Nam', '1700202131_edu1.jpg', 158950, 14, 'EDU', 546);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `MaTheLoai` varchar(10) NOT NULL,
  `TenTheLoai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`MaTheLoai`, `TenTheLoai`) VALUES
('CT', 'Sách Chính trị – pháp luật'),
('EDU', 'Sách giáo dục'),
('HR', 'Sách kinh dị'),
('KH', 'Sách khoa học'),
('KHKT', 'Sách Khoa học công nghệ – Kinh tế'),
('VH', 'Sách văn học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `TenKhachHang` varchar(255) NOT NULL,
  `TKKhachHang` varchar(255) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `TongSP` varchar(255) NOT NULL,
  `Ship` float NOT NULL,
  `TongTien` float NOT NULL,
  `TrangThai` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: Chờ xác nhận, 1: Đang vận chuyển, 2: Vận chuyển thành công, 3: Hủy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `payment`
--

INSERT INTO `payment` (`id`, `TenKhachHang`, `TKKhachHang`, `SoDienThoai`, `Email`, `DiaChi`, `TongSP`, `Ship`, `TongTien`, `TrangThai`) VALUES
(546, 'Hồ Văn Dễ', 'decute14', '0123456789', 'decute14@gmail.com', 'An Giang,Châu Đốc', '2', 40000, 2536240, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `TenNguoiDung` varchar(50) NOT NULL,
  `TenDangNhap` varchar(20) NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `SoDienThoai` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `Hinh` varchar(255) NOT NULL,
  `role` tinyint(3) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `TenNguoiDung`, `TenDangNhap`, `MatKhau`, `Email`, `SoDienThoai`, `DiaChi`, `Hinh`, `role`) VALUES
(1, 'Nguyễn Thành Lợi', 'loib2019', 'e10adc3949ba59abbe56e057f20f883e', 'loi@gmail.com', '', '', 'avatar.png', 1),
(5, 'hồ văn dễ', 'decute14', 'e10adc3949ba59abbe56e057f20f883e', 'decute14@gmail.com', '0912345678', 'An Giang sat thủ', 'avartamoi.png', 2),
(6, 'Lâm Thanh Vỹ', 'vyvn2409', '826a8da04a53d9c6ddda65a7afd48dc8', 'vy2409@gmail.com', '0919781456', '109/11 Bạc Liêu', 'avartamoi.png', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`MaSach`),
  ADD KEY `link_category` (`MaTheLoai`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`MaTheLoai`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
