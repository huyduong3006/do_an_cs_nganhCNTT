-- phpMyAdmin SQL Dump
-- version 5.2.1
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2024 lúc 12:43 PM

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- Tạo CSDL nếu chưa có
CREATE DATABASE IF NOT EXISTS `dienthoai` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dienthoai`;

-- --------------------------------------------------------
-- Bảng Loại sản phẩm
-- --------------------------------------------------------
DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE `loaisanpham` (
  `MaTL` int(11) NOT NULL AUTO_INCREMENT,
  `TenTL` varchar(255) NOT NULL,
  PRIMARY KEY (`MaTL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `loaisanpham` (`TenTL`) VALUES
('Điện thoại'),
('Macbook');

-- --------------------------------------------------------
-- Bảng Hàng hóa
-- --------------------------------------------------------
DROP TABLE IF EXISTS `hanghoa`;
CREATE TABLE `hanghoa` (
  `MaHang` int(11) NOT NULL AUTO_INCREMENT,
  `TenHang` varchar(255) NOT NULL,
  `DonGia` double NOT NULL,
  `MoTa` text NOT NULL,
  `MoTaChiTiet` text NOT NULL,
  `MaTL` int(11) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  PRIMARY KEY (`MaHang`),
  FOREIGN KEY (`MaTL`) REFERENCES `loaisanpham`(`MaTL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hanghoa` (`TenHang`, `DonGia`, `MoTa`, `MoTaChiTiet`, `MaTL`, `HinhAnh`) VALUES
('iPhone 12', 17990000, 'iPhone 12', 'Màn hình OLED 6.1", chip A14 Bionic, camera 12MP', 1, 'iphone_12.jpg'),
('iPhone 13', 19990000, 'iPhone 13', 'Màn hình OLED 6.1", chip A15 Bionic, camera 12MP', 1, 'iphone_13.jpg'),
('iPhone 13 Pro', 22990000, 'iPhone 13 Pro', 'Màn hình OLED 6.1", chip A15 Bionic, camera 12MP, ProMotion 120Hz', 1, 'iphone_13_pro.jpg'),
('iPhone 14', 21990000, 'iPhone 14', 'Màn hình OLED 6.1", chip A15 Bionic, camera 12MP', 1, 'iphone_14.jpg'),
('iPhone 15', 23990000, 'iPhone 15', 'Màn hình OLED 6.1", chip A16 Bionic, camera 48MP', 1, 'iphone_15.jpg'),
('iPhone 15 Pro', 24990000, 'iPhone 15 Pro', 'Màn hình OLED 6.1", chip A17 Pro, camera 48MP', 1, 'iphone_15_pro.jpg'),
('iPhone 16', 25990000, 'iPhone 16', 'Màn hình OLED 6.3", chip A18 Bionic, camera 48MP', 1, 'iphone_16.jpg'),
('iPhone 16 Pro Max', 29990000, 'iPhone 16 Pro Max', 'Màn hình OLED 6.9", chip A18 Pro, camera 48MP, khung titan', 1, 'iphone_16_promax.jpg'),

('Samsung Galaxy S23 Ultra', 25990000, 'Samsung Galaxy S23 Ultra', 'Màn hình Dynamic AMOLED 6.8", chip Snapdragon 8 Gen 2, camera 200MP', 1, 'galaxy_s23_ultra.jpg'),

('MacBook Air M1', 21990000, 'MacBook Air M1', 'Màn hình Retina 13.3", chip Apple M1, RAM 8GB, SSD 256GB', 2, 'macbook-air-m1.jpg'),
('MacBook Air M2', 26990000, 'MacBook Air M2', 'Màn hình Liquid Retina 13.6", chip Apple M2, RAM 8GB, SSD 256GB', 2, 'macbook-air-m2.jpg'),
('MacBook Air M3', 28990000, 'MacBook Air M3', 'Màn hình Liquid Retina 13.6", chip Apple M3, RAM 8GB, SSD 512GB', 2, 'macbook-air-m3.jpg'),
('MacBook Air M4', 30990000, 'MacBook Air M4', 'Màn hình Liquid Retina 14", chip Apple M4, RAM 16GB, SSD 512GB', 2, 'macbook-air-m4.jpg'),

('Hình minh họa MacBook', 0, 'Hình minh họa MacBook', 'Hình minh họa cho MacBook', 2, 'hinh_macbook.png'),
('Hình minh họa MacBook 1', 0, 'Hình minh họa MacBook 1', 'Hình minh họa cho MacBook phiên bản 1', 2, 'hinh_macbook1.png'),
('Hình minh họa MacBook 2', 0, 'Hình minh họa MacBook 2', 'Hình minh họa cho MacBook phiên bản 2', 2, 'hinh_macbook2.png'),
('MacBook Slide 1', 0, 'Slide quảng cáo MacBook 1', 'Ảnh trình chiếu quảng cáo MacBook 1', 2, 'macbook-slide-1.jpg'),
('MacBook Slide 2', 0, 'Slide quảng cáo MacBook 2', 'Ảnh trình chiếu quảng cáo MacBook 2', 2, 'macbook-slide-2.jpg'),

('Hình minh họa iPhone 15', 0, 'Hình minh họa iPhone 15', 'Hình minh họa cho iPhone 15', 1, 'hinhip15.png');

-- --------------------------------------------------------
-- Bảng Khách hàng
-- --------------------------------------------------------
DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL AUTO_INCREMENT,
  `TenKH` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL UNIQUE,
  `Sdt` varchar(15) NOT NULL UNIQUE,
  `DiaChi` text NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  PRIMARY KEY (`MaKH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `khachhang` (`TenKH`, `Email`, `Sdt`, `DiaChi`, `MatKhau`) VALUES
('Nguyễn Văn A', 'nguyenvana@example.com', '0123456789', 'Hà Nội', 'matkhau1');

-- --------------------------------------------------------
-- Bảng Đơn hàng
-- --------------------------------------------------------
DROP TABLE IF EXISTS `dondathang`;
CREATE TABLE `dondathang` (
  `MaDH` int(11) NOT NULL AUTO_INCREMENT,
  `MaKH` int(11) NOT NULL,
  `NgayDat` date NOT NULL,
  `PhuongThucThanhToan` varchar(100) NOT NULL,
  `PhuongThucGiaoHang` varchar(100) NOT NULL,
  `TongTien` double NOT NULL,
  `TrangThai` varchar(100) NOT NULL DEFAULT 'Đang xử lý',
  PRIMARY KEY (`MaDH`),
  FOREIGN KEY (`MaKH`) REFERENCES `khachhang`(`MaKH`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `dondathang` (`MaKH`, `NgayDat`, `PhuongThucThanhToan`, `PhuongThucGiaoHang`, `TongTien`, `TrangThai`) VALUES
(1, '2024-10-01', 'Thẻ tín dụng', 'Giao nhanh', 24990000, 'Đang xử lý');

-- --------------------------------------------------------
-- Bảng Chi tiết đơn hàng
-- --------------------------------------------------------
DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE `chitietdonhang` (
  `MaCTDH` int(11) NOT NULL AUTO_INCREMENT,
  `MaDH` int(11) NOT NULL,
  `MaHang` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` double NOT NULL,
  `ThanhTien` double AS (`SoLuong` * `DonGia`) VIRTUAL,
  PRIMARY KEY (`MaCTDH`),
  FOREIGN KEY (`MaDH`) REFERENCES `dondathang`(`MaDH`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`MaHang`) REFERENCES `hanghoa`(`MaHang`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `chitietdonhang` (`MaDH`, `MaHang`, `SoLuong`, `DonGia`) VALUES
(1, 1, 1, 24990000);

COMMIT;
