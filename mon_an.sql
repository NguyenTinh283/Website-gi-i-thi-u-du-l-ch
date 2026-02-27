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
-- Cấu trúc bảng cho bảng `mon_an`
--

CREATE TABLE `mon_an` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `mo_ta_chi_tiet` text DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `noi_bat` tinyint(1) DEFAULT 0,
  `link_map` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mon_an`
--

INSERT INTO `mon_an` (`id`, `ten`, `mo_ta`, `mo_ta_chi_tiet`, `hinh_anh`, `noi_bat`, `link_map`, `dia_chi`) VALUES
(15, 'Bánh xèo 7 Tới', 'Món ăn nổi tiếng', 'Bánh xèo Cần Thơ có vỏ vàng óng, mỏng và giòn rụm. Nhân bánh đầy đặn với thịt băm, tôm tươi và giá đỗ, tạo nên sự hòa quyện hoàn hảo giữa vị béo ngậy, vị ngọt thanh và vị giòn sần sật.\r\nĐiểm đặc biệt của bánh xèo Cần Thơ là được ăn kèm với nhiều loại rau sống tươi ngon như xà lách, rau diếp cá, hoa chuối bào, giá đỗ,... và chấm với nước mắm chua ngọt pha thêm ớt băm.', 'uploads/1753222228_68800c543b7ae_banhxeo.jpg', 1, 'https://maps.app.goo.gl/m4ana2u29FfDLzbP8', '45 Đ. Hoàng Quốc Việt, An Bình, Ninh Kiều, Cần Thơ, Việt Nam'),
(16, 'Nem nướng Thanh Vân', 'Món ăn nổi tiếng', 'Điểm độc đáo của món nem nướng nằm ở cách chế biến: thịt lợn tươi xay nhuyễn, tẩm ướp gia vị rồi nặn thành những viên tròn nhỏ, xiên vào que tre và nướng trên than hồng. Khi nướng, mỡ từ thịt lợn chảy ra, quyện vào hương thơm của than hồng tạo nên mùi vị vô cùng hấp dẫn.\r\nNem nướng Cái Răng thường được thưởng thức cùng với bánh tráng, bún, rau sống, chuối chát, khế, dưa chua và chấm với nước mắm tỏi ớt. Vị ngọt thơm của thịt nướng, vị thanh mát của rau sống, vị chua cay của nước chấm hòa quyện vào nhau tạo nên một hương vị khó cưỡng.', 'uploads/1753222946_68800f22f1179_nemnuong.jpg', 1, 'https://maps.app.goo.gl/PNXdKojq4KjYesPAA', 'Số 17 Đ. Hoà Bình, Tân An, Ninh Kiều, Cần Thơ'),
(17, 'Bánh cống Cô Út', 'Món ăn nổi tiếng', 'Bánh cống được làm từ bột gạo pha với nước cốt dừa, nhân đậu xanh bùi bùi, thịt băm đậm đà và tôm tươi giòn ngọt. Khi chiên, bánh vàng ươm, tỏa hương thơm nức mũi, khiến thực khách không thể cưỡng lại.\r\nBánh cống thường được ăn kèm với rau sống, bún tươi và nước chấm chua ngọt. Vị béo ngậy của bánh, vị bùi của đậu xanh, vị ngọt của tôm và vị cay nồng của nước chấm hòa quyện vào nhau tạo nên một hương vị khó quên.', 'uploads/1753223399_688010e723b98_banhcong.jpg', 0, 'https://maps.app.goo.gl/WUadBqgmJTzd4mgS8', 'Số 28 Đ. Lý Tự Trọng, Tân An, Ninh Kiều, Cần Thơ'),
(18, 'Lẩu vịt nấu chao Thành Giao', 'Món ăn nổi tiếng', 'Điểm đặc biệt của món lẩu này nằm ở nguyên liệu chính là vịt xiêm được tẩm ướp kỹ lưỡng với chao và các gia vị khác, tạo nên hương vị đậm đà khó cưỡng. Nước lẩu được nấu từ xương vịt ninh nhừ, kết hợp với nấm rơm, huyết, khoai môn và các loại rau thơm, mang đến vị ngọt thanh tự nhiên.\r\nThưởng thức lẩu vịt nấu chao, thực khách sẽ cảm nhận được sự hòa quyện hoàn hảo giữa vị béo ngậy của thịt vịt, vị bùi bùi của chao, vị ngọt thanh của nước lẩu và vị cay nồng của các loại rau thơm. Món ăn này thường được ăn kèm với bún hoặc mì, thêm bún tươi, rau sống và chấm với nước mắm chua ngọt.', 'uploads/1753223832_68801298f3abf_vitnauchao.jpg', 1, 'https://maps.app.goo.gl/NE87P8SEWxFqy4VF6', 'Hẻm 1 Lý Tự Trọng, An Phú, Ninh Kiều, Cần Thơ'),
(19, 'Cơm cháy kho quẹt Má Bảy', 'Món ăn nổi tiếng', 'Cách làm cơm cháy kho quẹt tương đối đơn giản. Cơm được nấu chín, sau đó ép mỏng và chiên vàng giòn. Kho quẹt được chế biến từ thịt ba chỉ, tôm, hành tím, ớt, tiêu và nước mắm. Khi ăn, thực khách sẽ gắp một miếng cơm cháy giòn tan, chấm vào nồi kho quẹt mặn mặn, ngọt ngọt, thơm nức mũi. Vị béo ngậy của thịt ba chỉ, vị ngọt của tôm, vị cay nồng của ớt và tiêu hòa quyện vào nhau tạo nên một hương vị khó quên.', 'uploads/1753224711_6880160744ea0_comchay.jpg', 0, 'https://maps.app.goo.gl/t3w5YLdaCh6G8DF28', 'Số 126 Đ. Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ'),
(20, 'Cá lóc nướng An', 'Món ăn nổi tiếng', 'Cá lóc nướng được chế biến theo cách đơn giản nhưng độc đáo. Cá lóc tươi sống được xiên qua bằng que tre, sau đó cắm xuống đất và phủ kín bằng rơm. Khi rơm cháy hết, cá chín vàng ươm, tỏa hương thơm nức mũi.\r\nCá lóc nướng được thưởng thức cùng với rau sống, chuối chát, đọt cóc, đọt xoài và đặc biệt là chén nước mắm \"gia truyền\" đậm đà. Vị ngọt thanh của thịt cá, vị cay nồng của ớt, vị chua thanh của chanh và vị béo ngậy của mỡ hành hòa quyện vào nhau tạo nên một hương vị khó quên.', 'uploads/1753225312_6880186052bb1_caloc.jpg', 0, 'https://maps.app.goo.gl/Hhi5DQjzjKsePTRj9', 'Số 15 Đ. Trần Văn Hoài, Xuân Khánh, Ninh Kiều, Cần Thơ'),
(21, 'Lẩu mắm Dạ Lý', 'Món ăn nổi tiếng', 'Lẩu mắm được nấu từ mắm cá linh, một loại mắm đặc sản của miền Tây. Nước lẩu có vị mặn mà, đậm đà, quyện cùng hương thơm nồng nàn của mắm. Thưởng thức lẩu mắm, thực khách sẽ cảm nhận được vị ngọt thanh của cá, vị giòn sần sật của tôm, vị bùi bùi của bông súng, vị cay nồng của ớt và vị béo ngậy của nước cốt dừa.', 'uploads/1753225749_68801a15e1746_laumam.jpg', 0, 'https://maps.app.goo.gl/rUR5RFizXa69C7Yj6', 'Số 89 Đ. Trần Hoàng Na, Hưng Lợi, Ninh Kiều, Cần Thơ'),
(22, 'Bánh hỏi Út Dzách', 'Món ăn nổi tiếng', 'Bánh hỏi được làm từ bột gạo, với sợi nhỏ, trắng mịn, mềm dai. Bánh hỏi được tráng mỏng, phơi trên nong tre cho đến khi khô ráo. Khi ăn, bánh hỏi được xếp lên đĩa, phủ lên trên một lớp mỡ hành thơm lừng. Heo quay là nguyên liệu chính tạo nên hương vị đặc trưng cho món ăn. Heo được chọn lọc kỹ lưỡng, tẩm ướp gia vị đậm đà, sau đó quay trên lửa than hồng cho đến khi da vàng giòn, thịt mềm ngọt.\r\nBánh hỏi heo quay được ăn kèm với rau thơm, dưa leo, chuối chát và nước mắm chua ngọt. Vị ngọt thanh của thịt heo, vị béo ngậy của mỡ hành, vị cay nồng của ớt và vị chua ngọt của nước mắm hòa quyện vào nhau tạo nên một hương vị hoàn hảo.', 'uploads/1753227343_6880204fab6aa_banhhoi.jpg', 0, 'https://maps.app.goo.gl/jMPL6cAZKx9taVHRA', 'Lộ Nhơn Phú, Nhơn ái, Phong Điền, Cần Thơ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `mon_an`
--
ALTER TABLE `mon_an`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `mon_an`
--
ALTER TABLE `mon_an`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
