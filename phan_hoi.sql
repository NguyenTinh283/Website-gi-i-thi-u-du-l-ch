-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 08, 2025 lúc 08:06 AM
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
-- Cơ sở dữ liệu: `dulich`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_hoi`
--

CREATE TABLE `phan_hoi` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `tra_loi` text DEFAULT NULL,
  `admin_tra_loi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phan_hoi`
--

INSERT INTO `phan_hoi` (`id`, `username`, `email`, `noi_dung`, `tra_loi`, `admin_tra_loi`) VALUES
(2, 'NguyenTinh', 'nttinh1@gmail.com', 'Rất tuyệt vời!', NULL, 'Cảm ơn bạn đã quan tâm!'),
(3, 'TanDat', 'dtdat1@gmail.com', 'Tôi có thể xem được những địa điểm nổi tiếng và chọn được nơi muốn đến!', NULL, 'Rất cảm ơn bạn đã chia sẻ cảm nhận!'),
(4, 'AnhThu', 'tathu1@gmail.com', 'Wow! Có nhiều món ăn mà tôi muốn được thưởng thức quá!', NULL, 'Cảm ơn bạn đã chia sẻ!');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `phan_hoi`
--
ALTER TABLE `phan_hoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
