-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2023 lúc 06:40 AM
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
-- Cơ sở dữ liệu: `eshopper`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `image`, `userid`) VALUES
(5, 'Áo Thun Oversize Nam In Chữ We Dream And We Buil', 139, 'images/severimg/5b519e8f-0177-4313-b801-688b1e6de6af.jpg', 1),
(6, 'Áo Thun Regular Nam Cổ Tròn Phối Sọc 2300175', 219, 'images/severimg/0ed5bf37-de7f-43cf-a020-644d49aa4941.jpg', 1),
(7, 'Áo Thun Oversize Nam Tay Ngắn 2 Viền Vai', 229, 'images/severimg/82ca72c9-b623-4bb7-9109-cbaf65d94d53.jpg', 1),
(8, 'Áo Tanktop- Nam Màu Trơn', 179, 'images/severimg/ea3cc00a-5cad-4e40-8cfc-24a3776344dc.jpg', 1),
(9, 'Váy 2 Dây Nữ 2 Dây Dáng Xòe', 299, 'images/severimg/17c8e0c0-6daf-445b-b5a7-e4ea6d434d0f.jpg', 1),
(10, 'Áo Thun - Đồ Đôi Tay Ngắn Phối Màu', 189, 'images/severimg/caeacee7-a202-4fdf-b086-63de08365ff6.jpg', 1),
(12, 'Áo Sơ Mi Slimfit Nam Đũi Tay Dài', 285, 'images/severimg/08382043-0d45-4f25-a69f-595b6d22ad35.jpg', 1),
(13, 'Áo Khoác Dạ Nữ Nút Trái Tim', 399, 'images/severimg/5c5db0df-96ca-4550-a3e3-eb5460cc4e1a.jpg', 1),
(14, 'Quần Tây Baggy Nam Trơn', 349, 'images/severimg/e5034166-1871-4fd8-ab5f-433163dad148.jpg', 1),
(15, 'Áo Sơ Mi Regular Nam Tay Dài Chạy Chỉ Nổi', 389, 'images/severimg/244b534a-11d2-4cb4-8b41-227e20f37545.jpg', 1),
(16, 'Áo Dệt Kim Tay Ngắn Nữ Polo V Kẻ Sọc Thân,Tay A00023', 149, 'images/severimg/b8951b3e-4aff-42a5-808f-7a3922be4714.jpg', 1),
(17, 'Áo Len Cổ Cao/Lọ Nam 3p Td Phối 2sọc To,1sọc Nhỏ 21051', 389, 'images/severimg/96555df8-7e79-4007-8a06-59ce54e7298e.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `name`, `avatar`) VALUES
(1, 'cong@gmail.com', '202cb962ac59075b964b07152d234b70', 'Đoàn Văn Công', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
