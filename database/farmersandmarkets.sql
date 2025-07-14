-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2025 lúc 07:48 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `farmersandmarkets`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `creat_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`user_id`, `username`, `password`, `email`, `role`, `creat_at`) VALUES
(1, 'admin3', '1234567', 'ttanh311@gmail.com', 'admins', '2024-11-24 04:41:08'),
(2, 'admin4', '1234567', 'ttanh311@gmail.com', 'admins', '2024-11-24 04:42:53'),
(3, 'admin5', '123456', 'ttanh311@gmail.com', 'admins', '2024-11-24 04:45:14'),
(4, 'admin6', '12345678', 'ttanh311@gmail.com', 'admins', '2024-11-26 16:35:19'),
(5, 'admin6', '12345', 'ttanh311@gmail.com', 'admins', '2024-11-26 16:35:56'),
(6, 'ylan3112004', '1234', 'ttanh311@gmail.com', 'admins', '2024-11-26 16:51:18'),
(7, '123456', '12345', 'ttanh311@gmail.com', 'admins', '2024-11-26 17:04:27'),
(8, 'ylan3112004', '123456', 'ttanh311@gmail.com', 'admins', '2024-11-26 17:09:56'),
(9, 'ylan3112004', '12345678', 'ttanh311@gmail.com', 'admins', '2024-11-26 17:12:53'),
(10, 'admin10', '1234567', 'ttanh311@gmail.com', 'admin', '2024-12-13 04:29:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_users`
--

CREATE TABLE `info_users` (
  `info_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info_users`
--

INSERT INTO `info_users` (`info_id`, `name`, `gender`, `phone`, `user_id`) VALUES
(1, 'Tuấn Anh Đẹp Trai', 'Nam', '0859564979', 3),
(2, 'Tuấn Anh', 'Nam', '0876996138', 4),
(3, 'Mai Giang', 'Nữ', '0342652641', 1),
(4, 'Vũ Thiên', 'Nam', '123456789', 13),
(5, 'Tuấn Anh', 'Bí mật', '0859564979', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `quantity`, `description`, `create_at`, `user_id`) VALUES
(1, 'Khoai tây', 40000, 20, 'Good', '2024-12-01 18:21:34', 3),
(2, 'Cà chua', 30000, 10, 'Good', '2024-12-01 18:22:26', 3),
(3, 'Cà rốt', 20000, 30, 'Good', '2024-12-01 18:24:37', 3),
(4, 'Cà tím', 30000, 10, 'Good', '2024-12-01 18:33:36', 4),
(5, 'Gạo', 21000, 100, 'Normal', '2024-12-02 11:45:13', 4),
(6, 'Ngô', 20000, 50, 'Good', '2024-12-02 11:44:59', 3),
(7, 'Bắp cải', 35000, 10, 'Normal', '2024-12-02 11:44:59', 3),
(8, 'Thịt lợn ', 150000, 200, 'Good', '2024-12-02 11:56:45', 3),
(9, 'Chân giò lợn', 100000, 10, 'Good', '2024-12-02 11:56:45', 3),
(10, 'Thịt gà', 100000, 50, 'Good', '2024-12-18 07:48:23', 3),
(13, 'Dưa chuột', 15000, 20, 'Good', '2024-12-05 12:15:12', 3),
(15, 'Đậu nành', 70000, 10, 'Good', '2024-12-07 12:15:12', 3),
(17, 'Gạo', 20000, 50, 'Good', '2024-12-10 02:17:46', 3),
(18, 'Thịt gà', 80000, 20, 'Good', '2024-12-11 10:50:49', 3),
(19, 'Mướp đắng', 30000, 50, 'Good', '2024-12-11 18:23:04', 3),
(20, 'Củ cải', 20000, 10, 'Good', '2024-12-11 18:24:10', 3),
(21, 'Thịt bò', 260000, 10, 'Good', '2024-12-11 18:32:30', 3),
(22, 'Thịt gà', 70000, 20, 'Normal', '2024-12-13 04:18:44', 5),
(23, 'Gạo', 20000, 150, 'Good', '2024-12-18 07:40:12', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'admin1', '1234567', 'maithigiang007ns@gmail.com', 'admin', '2024-11-20 14:11:38'),
(2, 'admin2', '1234567', 'ttanh311@gmail.com', 'admin', '2024-11-20 14:14:43'),
(3, 'tuananh311', '123456', 'luka892004@gmail.com', 'farmer', '2024-11-20 14:18:25'),
(4, 'idol311', '1234567', 'starcakkes@gmail.com', 'farmer', '2024-11-20 14:23:32'),
(5, '2221050254', '1234567', 'lily892004@gmail.com', 'farmer', '2024-11-20 14:53:49'),
(6, 'tuananhdepzai', '1234567', 'lily892004@gmail.com', 'farmer', '2024-11-20 14:55:31'),
(7, 'ylan3112004', '123456789', 'ttanh311@gmail.com', 'farmer', '2024-11-26 17:15:11'),
(8, 'trinhtuananh2004', '123456789', 'ttanh311@gmail.com', 'farmer', '2024-11-26 17:18:02'),
(13, 'vuthien', '12345678', 'vuthien423@gmail.com', 'farmer', '2024-12-04 05:55:26'),
(18, 'ngohoanglong', '12345678', 'ttanh311@gmail.com', 'farmer', '2024-12-25 15:07:04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `info_users`
--
ALTER TABLE `info_users`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `info_users`
--
ALTER TABLE `info_users`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `info_users`
--
ALTER TABLE `info_users`
  ADD CONSTRAINT `info_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
