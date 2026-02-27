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
-- Cấu trúc bảng cho bảng `hinh_anh`
--

CREATE TABLE `hinh_anh` (
  `id` int(11) NOT NULL,
  `id_dia_diem` int(11) DEFAULT NULL,
  `id_mon_an` int(11) DEFAULT NULL,
  `duong_dan` varchar(255) DEFAULT NULL,
  `loaihinh` enum('image','video') DEFAULT NULL,
  `loai` enum('dia_diem','mon_an') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh`
--

INSERT INTO `hinh_anh` (`id`, `id_dia_diem`, `id_mon_an`, `duong_dan`, `loaihinh`, `loai`) VALUES
(58, 16, NULL, 'uploads/1753212144_mykhanh1.jpg', 'image', NULL),
(59, 16, NULL, 'uploads/1753212144_mykhanh2.jpg', 'image', NULL),
(60, 16, NULL, 'uploads/1753212144_mykhanh3.jpg', 'image', NULL),
(61, 16, NULL, 'uploads/1753212144_mykhanh4.jpg', 'image', NULL),
(62, 16, NULL, 'uploads/1753212144_mykhanh5.jpg', 'image', NULL),
(63, 16, NULL, 'uploads/1753212144_mykhanh6.jpg', 'image', NULL),
(64, 16, NULL, 'uploads/1753212144_mykhanh.mp4', 'video', NULL),
(65, 17, NULL, 'uploads/1753212323_ninhkieu1.jpg', 'image', NULL),
(66, 17, NULL, 'uploads/1753212323_ninhkieu2.jpg', 'image', NULL),
(67, 17, NULL, 'uploads/1753212323_ninhkieu3.jpg', 'image', NULL),
(68, 17, NULL, 'uploads/1753212323_ninhkieu4.jpg', 'image', NULL),
(69, 17, NULL, 'uploads/1753212323_ninhkieu5.jpg', 'image', NULL),
(70, 17, NULL, 'uploads/1753212323_ninhkieu6.jpg', 'image', NULL),
(71, 17, NULL, 'uploads/1753212323_ninhkieu.mp4', 'video', NULL),
(72, 18, NULL, 'uploads/1753212957_lungcotcau1.jpg', 'image', NULL),
(73, 18, NULL, 'uploads/1753212957_lungcotcau2.jpg', 'image', NULL),
(74, 18, NULL, 'uploads/1753212957_lungcotcau3.jpg', 'image', NULL),
(75, 18, NULL, 'uploads/1753212957_lungcotcau4.jpg', 'image', NULL),
(76, 18, NULL, 'uploads/1753212957_lungcotcau5.jpg', 'image', NULL),
(77, 18, NULL, 'uploads/1753212957_lungcotcau6.jpg', 'image', NULL),
(78, 18, NULL, 'uploads/1753212957_lungcotcau.mp4', 'video', NULL),
(79, 19, NULL, 'uploads/1753213944_baogiatrangvien1.jpg', 'image', NULL),
(80, 19, NULL, 'uploads/1753213944_baogiatrangvien2.jpg', 'image', NULL),
(81, 19, NULL, 'uploads/1753213944_baogiatrangvien3.jpg', 'image', NULL),
(82, 19, NULL, 'uploads/1753213944_baogiatrangvien4.jpg', 'image', NULL),
(83, 19, NULL, 'uploads/1753213944_baogiatrangvien5.jpg', 'image', NULL),
(84, 19, NULL, 'uploads/1753213944_baogiatrangvien6.jpg', 'image', NULL),
(85, 19, NULL, 'uploads/1753213944_baogiatrangvien.mp4', 'video', NULL),
(86, 20, NULL, 'uploads/1753214730_conson1.jpg', 'image', NULL),
(87, 20, NULL, 'uploads/1753214730_conson2.jpg', 'image', NULL),
(88, 20, NULL, 'uploads/1753214730_conson3.jpg', 'image', NULL),
(89, 20, NULL, 'uploads/1753214730_conson4.jpg', 'image', NULL),
(90, 20, NULL, 'uploads/1753214730_conson5.jpg', 'image', NULL),
(91, 20, NULL, 'uploads/1753214730_conson6.jpg', 'image', NULL),
(92, 20, NULL, 'uploads/1753214730_conson.mp4', 'video', NULL),
(93, 24, NULL, 'uploads/1753217286_687ff906de737_ongde1.jpg', 'image', NULL),
(94, 24, NULL, 'uploads/1753217286_687ff906e0382_ongde2.jpg', 'image', NULL),
(95, 24, NULL, 'uploads/1753217286_687ff906e0d7c_ongde3.jpg', 'image', NULL),
(96, 24, NULL, 'uploads/1753217286_687ff906e1aca_ongde4.jpg', 'image', NULL),
(97, 24, NULL, 'uploads/1753217286_687ff906e24c7_ongde5.jpg', 'image', NULL),
(98, 24, NULL, 'uploads/1753217286_687ff906e2ec2_ongde6.jpg', 'image', NULL),
(99, 24, NULL, 'uploads/1753217286_687ff906e3a4c_ongde.mp4', 'video', NULL),
(100, 25, NULL, 'uploads/1753218039_687ffbf7314f6_banglang1.jpg', 'image', NULL),
(101, 25, NULL, 'uploads/1753218039_687ffbf7337de_banglang2.jpg', 'image', NULL),
(102, 25, NULL, 'uploads/1753218039_687ffbf734af8_banglang3.jpg', 'image', NULL),
(103, 25, NULL, 'uploads/1753218039_687ffbf735b65_banglang4.jpg', 'image', NULL),
(104, 25, NULL, 'uploads/1753218039_687ffbf7368de_banglang5.jpg', 'image', NULL),
(105, 25, NULL, 'uploads/1753218039_687ffbf73798f_banglang6.jpg', 'image', NULL),
(106, 25, NULL, 'uploads/1753218039_687ffbf7399bf_banglang.mp4', 'video', NULL),
(107, 26, NULL, 'uploads/1753219395_68800143da2ec_xeonhum1.jpg', 'image', NULL),
(108, 26, NULL, 'uploads/1753219395_68800143dc869_xeonhum2.jpg', 'image', NULL),
(109, 26, NULL, 'uploads/1753219395_68800143dd48e_xeonhum3.jpg', 'image', NULL),
(110, 26, NULL, 'uploads/1753219395_68800143de3cb_xeonhum4.jpg', 'image', NULL),
(111, 26, NULL, 'uploads/1753219395_68800143df16c_xeonhum5.jpg', 'image', NULL),
(112, 26, NULL, 'uploads/1753219395_68800143dfe04_xeonhum6.jpg', 'image', NULL),
(113, 26, NULL, 'uploads/1753219395_68800143e12ed_xeonhum.mp4', 'video', NULL),
(114, NULL, 15, 'uploads/1753222228_68800c543f6d8_banhxeo1.jpg', 'image', 'mon_an'),
(115, NULL, 15, 'uploads/1753222228_68800c54411d9_banhxeo2.jpg', 'image', 'mon_an'),
(116, NULL, 15, 'uploads/1753222228_68800c54420cf_banhxeo3.jpg', 'image', 'mon_an'),
(117, NULL, 15, 'uploads/1753222228_68800c5443005_banhxeo4.jpg', 'image', 'mon_an'),
(118, NULL, 15, 'uploads/1753222228_68800c5443ecb_banhxeo5.jpg', 'image', 'mon_an'),
(119, NULL, 15, 'uploads/1753222228_68800c5444a61_banhxeo6.png', 'image', 'mon_an'),
(120, NULL, 15, 'uploads/1753222228_68800c544597d_banhxeo.mp4', 'video', 'mon_an'),
(121, NULL, 16, 'uploads/1753222947_68800f23028b0_nemnuong1.jpg', 'image', 'mon_an'),
(122, NULL, 16, 'uploads/1753222947_68800f2305337_nemnuong2.jpg', 'image', 'mon_an'),
(123, NULL, 16, 'uploads/1753222947_68800f23072ba_nemnuong3.jpg', 'image', 'mon_an'),
(124, NULL, 16, 'uploads/1753222947_68800f2307e14_nemnuong4.jpg', 'image', 'mon_an'),
(125, NULL, 16, 'uploads/1753222947_68800f2308d6d_nemnuong5.jpg', 'image', 'mon_an'),
(126, NULL, 16, 'uploads/1753222947_68800f2309e95_nemnuong6.jpg', 'image', 'mon_an'),
(127, NULL, 16, 'uploads/1753222947_68800f230b484_nemnuong.mp4', 'video', 'mon_an'),
(128, NULL, 17, 'uploads/1753223399_688010e727d71_banhcong1.jpg', 'image', 'mon_an'),
(129, NULL, 17, 'uploads/1753223399_688010e729f20_banhcong2.jpg', 'image', 'mon_an'),
(130, NULL, 17, 'uploads/1753223399_688010e72c273_banhcong3.jpg', 'image', 'mon_an'),
(131, NULL, 17, 'uploads/1753223399_688010e72d13b_banhcong4.jpg', 'image', 'mon_an'),
(132, NULL, 17, 'uploads/1753223399_688010e72ddac_banhcong5.jpg', 'image', 'mon_an'),
(133, NULL, 17, 'uploads/1753223399_688010e72eac1_banhcong6.jpg', 'image', 'mon_an'),
(134, NULL, 17, 'uploads/1753223399_688010e72f6fa_banhcong.mp4', 'video', 'mon_an'),
(135, NULL, 18, 'uploads/1753223833_688012990572f_vitnauchao1.jpg', 'image', 'mon_an'),
(136, NULL, 18, 'uploads/1753223833_6880129906c6f_vitnauchao2.jpg', 'image', 'mon_an'),
(137, NULL, 18, 'uploads/1753223833_6880129907e35_vitnauchao3.jpg', 'image', 'mon_an'),
(138, NULL, 18, 'uploads/1753223833_6880129908d19_vitnauchao4.jpg', 'image', 'mon_an'),
(139, NULL, 18, 'uploads/1753223833_6880129909e59_vitnauchao5.jpg', 'image', 'mon_an'),
(140, NULL, 18, 'uploads/1753223833_688012990b5bd_vitnauchao6.jpg', 'image', 'mon_an'),
(141, NULL, 18, 'uploads/1753223833_688012990c1b6_vitnauchao.mp4', 'video', 'mon_an'),
(142, NULL, 19, 'uploads/1753224711_688016074c9ba_comchay1.jpg', 'image', 'mon_an'),
(143, NULL, 19, 'uploads/1753224711_688016074e31d_comchay2.jpg', 'image', 'mon_an'),
(144, NULL, 19, 'uploads/1753224711_688016074fe56_comchay3.jpg', 'image', 'mon_an'),
(145, NULL, 19, 'uploads/1753224711_68801607514e1_comchay4.jpg', 'image', 'mon_an'),
(146, NULL, 19, 'uploads/1753224711_688016075269d_comchay5.jpg', 'image', 'mon_an'),
(147, NULL, 19, 'uploads/1753224711_6880160753c89_comchay6.jpg', 'image', 'mon_an'),
(148, NULL, 19, 'uploads/1753224711_6880160754d60_comchay.mp4', 'video', 'mon_an'),
(149, NULL, 20, 'uploads/1753225312_688018605afc8_caloc1.jpg', 'image', 'mon_an'),
(150, NULL, 20, 'uploads/1753225312_688018605c99e_caloc2.jpg', 'image', 'mon_an'),
(151, NULL, 20, 'uploads/1753225312_688018605ef7a_caloc3.jpg', 'image', 'mon_an'),
(152, NULL, 20, 'uploads/1753225312_688018605fcb8_caloc4.jpg', 'image', 'mon_an'),
(153, NULL, 20, 'uploads/1753225312_68801860608ea_caloc5.jpg', 'image', 'mon_an'),
(154, NULL, 20, 'uploads/1753225312_68801860618cb_caloc6.jpg', 'image', 'mon_an'),
(155, NULL, 20, 'uploads/1753225312_68801860623e4_caloc.mp4', 'video', 'mon_an'),
(156, NULL, 21, 'uploads/1753225749_68801a15e45c2_laumam1.jpg', 'image', 'mon_an'),
(157, NULL, 21, 'uploads/1753225749_68801a15e5283_laumam2.jpg', 'image', 'mon_an'),
(158, NULL, 21, 'uploads/1753225749_68801a15e61b6_laumam3.jpg', 'image', 'mon_an'),
(159, NULL, 21, 'uploads/1753225749_68801a15e6acb_laumam4.jpg', 'image', 'mon_an'),
(160, NULL, 21, 'uploads/1753225749_68801a15e7d09_laumam5.jpg', 'image', 'mon_an'),
(161, NULL, 21, 'uploads/1753225749_68801a15e8a7b_laumam6.jpg', 'image', 'mon_an'),
(162, NULL, 21, 'uploads/1753225749_68801a15e9a4e_laumam.mp4', 'video', 'mon_an'),
(163, NULL, 22, 'uploads/1753227343_6880204fb3747_banhhoi1.jpg', 'image', 'mon_an'),
(164, NULL, 22, 'uploads/1753227343_6880204fb6eea_banhhoi2.jpg', 'image', 'mon_an'),
(165, NULL, 22, 'uploads/1753227343_6880204fb85ba_banhhoi3.jpg', 'image', 'mon_an'),
(166, NULL, 22, 'uploads/1753227343_6880204fb9dad_banhhoi4.jpg', 'image', 'mon_an'),
(167, NULL, 22, 'uploads/1753227343_6880204fbb57b_banhhoi5.jpg', 'image', 'mon_an'),
(168, NULL, 22, 'uploads/1753227343_6880204fbcda3_banhhoi6.jpg', 'image', 'mon_an'),
(169, NULL, 22, 'uploads/1753227343_6880204fbe5dd_banhhoi.mp4', 'video', 'mon_an');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dia_diem` (`id_dia_diem`),
  ADD KEY `id_mon_an` (`id_mon_an`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
