-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2023 lúc 02:41 PM
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
(106, 'loib123', 'S05', 'Vàng và máu', 'kinhdi2.jpg', 46750, 5, 'HR', 275);

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
(275, 'Nguyễn Thành Lợi', 'loib123', '0123456789', 'loib123456@gmail.com', 'An Giang,Châu Đốc', '1', 40000, 273750, 2);

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
(17, 'Nguyễn Thành Lợi', 'loib123', '25f9e794323b453885f5181f1b624d0b', 'loib123456@gmail.com', '0123456789', 'An Giang', '1700401106_avartamoi.png', 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
