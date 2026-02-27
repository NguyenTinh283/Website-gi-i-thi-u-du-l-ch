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
-- Cấu trúc bảng cho bảng `dia_diem`
--

CREATE TABLE `dia_diem` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) DEFAULT NULL,
  `mo_ta` text DEFAULT NULL,
  `mo_ta_chi_tiet` text DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `noi_bat` tinyint(1) DEFAULT 0,
  `link_map` varchar(255) DEFAULT NULL,
  `dia_chi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dia_diem`
--

INSERT INTO `dia_diem` (`id`, `ten`, `mo_ta`, `mo_ta_chi_tiet`, `hinh_anh`, `noi_bat`, `link_map`, `dia_chi`) VALUES
(16, 'Khu du lịch Mỹ Khánh', 'Địa điểm du lịch nổi tiếng', 'Địa điểm khi đến du lịch tại Cần Thơ chính là tham quan làng Mỹ Khánh. Đây là điểm du lịch rất hấp dẫn với quy mô lớn nhất đồng bằng sông Cửu Long lên tới 50.000m2, nằm giữa hai chợ nổi Cái Răng và Phong Điền.', 'uploads/1753212144_mykhanh.jpg', 1, 'https://maps.app.goo.gl/ex7JYcD2xNLLD8aB6', '335 Lộ Vòng Cung, Mỹ Khánh, huyện Phong Điền, Cần Thơ'),
(17, 'Bến Ninh Kiều', 'Địa điểm du lịch nổi tiếng', 'Với vẻ đẹp bình yên, thơ mộng giữa thành phố Cần Thơ hiện đại, bến Ninh Kiều được coi là biểu tượng văn hóa của xứ Tây Đô. Nơi đây mang đậm bản sắc xứ phương Nam và gắn liền với hình ảnh những con thuyền trên sông tấp nập mua bán ở chợ nổi.\r\nChắc chắn khi đến địa điểm du lịch này, bạn sẽ hiểu thêm về văn hóa và con người miền Tây cũng như có thêm nhiều kỉ niệm đáng nhớ trong hành trình khám phá của mình.', 'uploads/1753212323_ninhkieu.jpg', 1, 'https://maps.app.goo.gl/E4FcLomqjD1h92Wq7', '106 Đ. Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ'),
(18, 'Khu du lịch Lung Cột Cầu', 'Địa điểm du lịch nổi tiếng', 'Lung Cột Cầu là khu du lịch sinh thái ở Cần Thơ rất nổi tiếng và được nhiều khách du lịch yêu thích. Đến với nơi này, bạn sẽ cảm nhận được bầu không khí trong lành, thoáng đãng và rất bình dị của miền sông nước.', 'uploads/1753212957_lungcotcau.jpg', 1, 'https://maps.app.goo.gl/iLUtNwdtD4YpANM87', 'QL61C, xã Nhơn Nghĩa, huyện Phong Điền, Cần Thơ'),
(19, 'Khu du lịch Bảo Gia Trang Viên', 'Địa điểm du lịch nổi tiếng', 'Bảo Gia Trang Viên là một trong những khu du lịch Cần Thơ được yêu thích nhất với diện tích lên tới 20.000m2 cùng nhiều cảnh quan tuyệt đẹp. Đến nơi này, du khách sẽ được tham gia những trò chơi mới mẻ từ cá nhân đến tập thể như bơi thuyền thúng, đua xe, đu quay, bắt cá, đi cầu gỗ... Đặc biệt, bạn có thể cắm trại ngay tại khu du lịch và quây quần bên gia đình, bạn bè ở sân đốt lửa trại vào ban đêm.', 'uploads/1753213944_baogiatrangvien.jpg', 0, 'https://maps.app.goo.gl/ZyzHeTpVYmTbPDxF7', 'số 268 Huỳnh Thị Nở, KV Phú Quới, phường Thường Thạnh, quận Cái Răng, Cần Thơ'),
(20, 'Khu du lịch Cồn Sơn', 'Địa điểm du lịch nổi tiếng', 'Cồn Sơn là một trong những khu du lịch Cần Thơ để lại nhiều ấn tượng cho du khách nhờ những vườn cây ăn trái trĩu quả quanh năm với đủ các loại cây từ bưởi, măng cụt, vú sữa, chôm chôm... ', 'uploads/1753214730_conson.jpg', 0, 'https://maps.app.goo.gl/j9fWh3GngP5iiCU87', 'Phường Bùi Hữu Nghĩa, quận Bình Thủy, Cần Thơ'),
(24, 'Khu du lịch Ông Đề', 'Địa điểm du lịch nổi tiếng', 'Khu du lịch Cần Thơ Ông Đề hấp dẫn du khách bởi những vườn cây trĩu quả, mang nét riêng của vùng sông nước miền Tây như sầu riêng, cam, xoài, măng cụt... Xen kẽ với những vườn cây ăn trái tươi ngon là những ao đầm nuôi cá, hoặc những khu vực thiết kế riêng cho các hoạt động vui chơi lội nước. ', 'uploads/1753217286_687ff906dbe08_ongde.jpg', 0, 'https://maps.app.goo.gl/Y9gRP9wDZFx9e64VA', 'Ấp Mỹ Ái, xã Mỹ Khánh, huyện Phong Điền, Cần Thơ'),
(25, 'Vườn cò Bằng Lăng', 'Địa điểm du lịch nổi tiếng', 'Trong các khu du lịch Cần Thơ thì vườn cò Bằng Lăng là một trong những khu vui chơi Cần Thơ thú vị với sân chim lớn nhất thành phố. Nếu tham quan vườn cò vào mùa nước lớn, du khách sẽ được lênh đênh trên những chiếc ghe thuyền độc đáo. Còn nếu đi vào mùa xuân, du khách có cơ hội chiêm ngưỡng những hàng bằng lăng tím ngắt thơ mộng ven sông.', 'uploads/1753218039_687ffbf72a24c_banglang.jpg', 0, 'https://maps.app.goo.gl/bsso9MsPKWhWkktd9', 'Ấp Thới An, phường Thới Thuận, quận Thốt Nốt, Cần Thơ'),
(26, 'Vườn sinh thái Xẻo Nhum', 'Địa điểm du lịch nổi tiếng', 'Mặc dù chỉ có diện tích khiêm tốn là 2ha nhưng với thuận lợi nằm gần trung tâm thành phố cũng đủ để vườn sinh thái Xẻo Nhum có mặt trong danh sách những khu du lịch Cần Thơ hấp dẫn. Với không gian xanh mướt, hệ sinh thái đa dạng từ cây cảnh đến cây ăn trái, nơi đây thu hút khá nhiều du khách đến tham quan và tận hưởng không khí trong lành.', 'uploads/1753219395_68800143d1cf0_xeonhum.jpg', 0, 'https://maps.app.goo.gl/zgbTwjmuR6byQdCi8', 'Hồng Loan, phường Hưng Thạnh, quận Cái Răng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dia_diem`
--
ALTER TABLE `dia_diem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dia_diem`
--
ALTER TABLE `dia_diem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
