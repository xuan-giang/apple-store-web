-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2022 at 08:01 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `applestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `management_image_banner`
--

CREATE TABLE `management_image_banner` (
  `id` int(11) NOT NULL,
  `url` varchar(256) NOT NULL,
  `header` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management_image_banner`
--

INSERT INTO `management_image_banner` (`id`, `url`, `header`, `title`, `content`) VALUES
(1, 'bg1.jpg', 'Sản phẩm đột phá', 'Iphone - 13 Pro Max 2021', 'Dòng iPhone 13 chính thức được mở bán vào ngày 15 tháng 9 năm 2021. Dòng iPhone 13 xuất hiện với 4 phiên bản gồm iPhone 13 mini - iPhone 13 - iPhone 13 Pro và iPhone 13 Pro Max'),
(5, 'bg2.jpg', 'Sản phẩm nổi bật', 'MacBook Pro M1 2020 ', 'MacBook Pro M1 nằm trong sự kiện \"One More Thing\" diễn ra vào sáng 11/11/2020. Sản phẩm mới của Apple có cùng mức giá nhưng được trang bị chip Apple M1 mạnh mẽ hơn và có thêm quạt tản nhiệt'),
(6, 'bg3.jpg', 'Sản phẩm nổi bật', 'iPad Air thế hệ 5', 'Vào ngày 9 tháng 3 năm 2022. Trong sự kiện mang tên Peek Performance, Apple đã chính thức giới thiệu iPad Air thế hệ thứ 5. Sản phẩm iPad mới sẽ sử dụng chip Apple Silicon M1 giống như iPad Pro. Đặc biệt, iPad Air còn có tới 5 màu cho người dùng lựa chọn.'),
(7, 'bg4.jpg', 'Sản phẩm nổi bật', 'Apple Watch Series 7', 'Sau khi công bố hai chiếc iPad mới, Apple đã chính thức giới thiệu Apple Watch Series 7 tại một sự kiện lớn vào ngày 14 tháng 9. Đồng hồ thông minh thế hệ 7 với màn hình lớn và thiết bị sẽ hỗ trợ watchOS 8 với tính năng phát hiện ngã khi đạp xe, tối ưu hóa theo dõi tập thể dục bằng e-bike'),
(8, 'bg5.jpg', 'Sản phẩm nổi bật', 'Apple TV 4K ', 'Tại sự kiện Apple Spring Loaded vào tháng 4 năm 2021. Apple đã giới thiệu sản phẩm Apple TV 4K với những nâng cấp nổi bật trên sản phẩm bao gồm chip xử lý A12 Bionic, hỗ trợ nội dung HDR với tốc độ khung hình cao, khả năng sử dụng iPhone (sử dụng cảm biến ánh sáng gọi là tính năng Cân bằng màu).');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id_order`, `id_product`, `price`, `qty`) VALUES
(162, 72, 299, 3),
(162, 59, 899, 3),
(162, 61, 1599, 2),
(163, 64, 499, 1),
(163, 63, 799, 1),
(168, 66, 2099, 1),
(168, 68, 1299, 1),
(169, 66, 2099, 2),
(169, 68, 1299, 1),
(170, 67, 3000, 6),
(170, 59, 899, 1),
(170, 63, 799, 2),
(171, 67, 3000, 6),
(171, 59, 899, 1),
(171, 63, 799, 2),
(172, 67, 3000, 4),
(172, 59, 899, 1),
(172, 63, 799, 2),
(173, 59, 899, 1),
(173, 71, 499, 1),
(173, 63, 799, 1),
(174, 59, 899, 6),
(174, 60, 1099, 5),
(174, 61, 1599, 3),
(174, 64, 499, 1),
(174, 62, 599, 1),
(174, 63, 799, 1),
(174, 67, 3000, 1),
(174, 66, 2099, 1),
(175, 60, 1099, 3),
(175, 68, 1299, 5),
(175, 64, 499, 3),
(176, 59, 899, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `username` varchar(256) NOT NULL,
  `id_order` int(11) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `total_price` float NOT NULL,
  `address` varchar(256) NOT NULL,
  `payment_method` varchar(256) NOT NULL,
  `note` text DEFAULT '\'\'',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`username`, `id_order`, `fullname`, `email`, `phone_number`, `status`, `total_price`, `address`, `payment_method`, `note`, `created_at`, `updated_at`) VALUES
('hyung', 162, 'hung', 's2@gmail.com', 899305432, 1, 6792, 'hanoi', 'Thanh toán khi nhận hàng', '', '2022-05-18 08:50:41', '2022-05-18 08:50:41'),
('KK', 163, 'Nguyễn Đăng Khánh', 'khanh42869@gmail.com', 899305432, 1, 1298, 'Thai Nguyen', 'Thanh toán khi nhận hàng', '', '2022-05-18 08:58:29', '2022-05-18 08:58:29'),
('khanhxz', 168, 'Nguyễn Đăng Khánh', 'sss@gmail.com', 123345123, 1, 3398, 'Thai Nguyen', 'Visa', '', '2022-05-18 11:30:01', '2022-05-18 11:30:01'),
('gutboykeoconvoi', 169, 'Vy Văn Hùng', 'sef123@gmail.com', 123654231, 1, 5497, 'Bac Giang', 'Visa', '', '2022-05-18 11:32:31', '2022-05-18 11:32:31'),
('hung', 170, 'Vy Văn Hùng', 'vyvanhung2882001bg@gmail.com', 879519709, 1, 20497, 'Bắc Giang', 'Thanh toán khi nhận hàng', '', '2022-05-24 04:21:55', '2022-05-24 04:21:55'),
('hung', 171, 'Vy Văn Hùng', 'vyvanhung2882001bg@gmail.com', 879519709, 1, 20497, 'Bắc Giang', 'paypal', '', '2022-05-24 04:23:19', '2022-05-24 04:23:19'),
('hung', 172, 'Vy Văn Hùng', 'vyvanhung2882001bg@gmail.com', 879519709, 0, 14497, 'Bắc Giang', 'Thanh toán khi nhận hàng', '', '2022-05-24 04:28:52', '2022-06-30 16:52:53'),
('hung', 173, 'khanh', 'vyvanhung2882001bg@gmail.com', 976486532, 1, 2197, 'thai nguyen', 'Thanh toán khi nhận hàng', '', '2022-06-30 17:13:08', '2022-06-30 17:13:08'),
('hung', 174, 'Hung', 'vyvanhung2882001bg@gmail.com', 976486532, 3, 22682, 'luc ngan', 'Thanh toán khi nhận hàng', 'Ghi chu', '2022-06-30 17:19:07', '2022-06-30 16:53:17'),
('hyung', 175, 'Vy Văn Hùng', 'viethung4869@gmail.com', 879519709, 2, 11289, 'Bắc Giang', 'Thanh toán khi nhận hàng', '456', '2022-06-30 16:50:07', '2022-07-01 00:12:11'),
('hyung', 176, 'Hung VY', 'viethung4869@gmail.com', 398593045, 0, 899, 'Hà nội', 'Thanh toán khi nhận hàng', NULL, '2022-06-30 16:51:29', '2022-06-30 16:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT 'category',
  `image` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0 la hidden, 1 la show',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `sold` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `type`, `image`, `price`, `quantity`, `description`, `status`, `created_at`, `updated_at`, `view`, `sold`) VALUES
(59, 'iPhone 11 64GB', 1, 'iphone-11-pro-hai-phong-01.jpg', 899, 189, 'Apple iPhone 11 được trang bị bộ vi xử lý Apple A13 Bionic. Điện thoại thông minh đi kèm với màn hình cảm ứng điện dung IPS LCD 6.1 inch Liquid Retina và độ phân giải 828 x 1792 pixel. Màn hình của thiết bị được bảo vệ bằng kính chống xước và lớp phủ oleophobic.\r\n\r\nCamera sau bao gồm ống kính 12 MP (rộng) + 12 MP (siêu rộng).\r\n\r\nCamera trước có cảm biến camera 12 MP + TOF 3D. Các cảm biến của điện thoại bao gồm Face ID, gia tốc kế, con quay hồi chuyển, độ gần, la bàn và phong vũ biểu.\r\n\r\nĐiện thoại thông minh được cung cấp năng lượng bởi pin Li-Ion 3110 mAh không thể tháo rời + Sạc nhanh 18W: 50% trong 30 phút + USB Power Delivery 2.0 + sạc không dây Qi.\r\n\r\nĐiện thoại chạy trên iOS 13.\r\n\r\nApple iPhone 11 có các màu khác nhau như Đen, Xanh lá, Vàng, Tím, Đỏ và Trắng. Nó có tính năng 2.0, đầu nối đảo ngược độc quyền.', 1, '2020-10-19 08:59:28', '2022-06-30 16:51:29', 0, 11),
(60, 'Iphone 11 Pro Max', 1, '637037687763926758_11-pro-max-xanh.png', 1099, 192, 'Apple iPhone 11 Pro Max được trang bị bộ vi xử lý Apple A13 Bionic. Điện thoại thông minh đi kèm với màn hình cảm ứng điện dung Super Retina XDR OLED 6,5 inch và độ phân giải 1242 x 2688 pixel. Màn hình của thiết bị được bảo vệ bằng kính chống xước và lớp phủ oleophobic.\r\n\r\nCamera sau bao gồm ống kính 12 MP (rộng) + 12 MP (tele) zoom quang học 2x + 12 MP (siêu rộng).\r\n\r\nCamera trước có cảm biến camera 12 MP + TOF 3D. Các cảm biến của điện thoại bao gồm Face ID, gia tốc kế, con quay hồi chuyển, độ gần, la bàn và phong vũ biểu.\r\n\r\nĐiện thoại thông minh được cung cấp năng lượng bởi pin Li-Ion 3.500 mAh không thể tháo rời + Sạc nhanh 18W: 50% trong 30 phút + USB Power Delivery 2.0 + sạc không dây Qi.\r\n\r\nĐiện thoại chạy trên iOS 13.\r\n\r\nApple iPhone 11 Pro Max có các màu khác nhau như Xám không gian, Bạc, Vàng và Xanh Midnight. Nó có tính năng 2.0, đầu nối đảo ngược độc quyền.', 1, '2020-10-19 09:04:49', '2022-06-30 16:50:07', 1, 8),
(61, 'iPhone 12', 1, 'iPhone-12-concept-conceptes-iphone.jpg', 1599, 197, 'Apple iPhone 12 chính thức được phát hành vào ngày 13 tháng 10 năm 2020.\r\n\r\nĐiện thoại được trang bị bộ vi xử lý Apple A14 Bionic mới. Điện thoại thông minh đi kèm với màn hình cảm ứng điện dung Super Retina XDR OLED 6,1 inch, độ phân giải 1170 x 2532 pixel và màn hình HDR10, gam màu rộng, Dolby Vision và True-tone.\r\n\r\nNgoài ra, màn hình của thiết bị còn được bảo vệ bởi kính chống xước và lớp phủ oleophobic. Máy ảnh phía sau bao gồm 12 MP (rộng) + 12 MP (siêu rộng) với đèn flash kép Quad-LED và HDR (ảnh / toàn cảnh).\r\n\r\nMáy ảnh trước bao gồm 12 MP (rộng) + SL 3D, (cảm biến độ sâu / sinh trắc học) với HDR. Các cảm biến của điện thoại bao gồm Face ID, gia tốc kế, con quay hồi chuyển, độ gần, la bàn, phong vũ biểu + lệnh ngôn ngữ tự nhiên Siri và đọc chính tả.\r\n\r\nĐiện thoại thông minh được cung cấp năng lượng bởi pin Li-Ion không thể tháo rời + Sạc nhanh 18W, 50% trong 30 phút (được quảng cáo) + USB Power Delivery 2.0 + Sạc không dây nhanh Qi 15W. Điện thoại chạy trên hệ điều hành iOS 14.\r\n\r\nApple iPhone 12 có nhiều màu sắc khác nhau như Đen, Trắng, Đỏ, Xanh lục và Xanh lam. Kích thước của điện thoại là 146,7 x 71,5 x 7,4 mm và nặng 164 gram. Nó có khả năng chống bụi / nước IP68 và hỗ trợ một SIM (Nano-SIM và / hoặc eSIM)', 1, '2020-10-19 09:13:02', '2022-06-30 17:19:07', 1, 3),
(62, 'iPhone X', 1, 'iphone-x-1-min-compressor.jpg', 599, -1, 'iPhone X phát hành\r\nApple iPhone X đã chính thức được công bố vào ngày 12 tháng 9 năm 2017 tại Steve Job’s Theater, Apple Campus II. Điện thoại thông minh có sẵn để đặt hàng trước vào ngày 15 tháng 9 và có sẵn vào ngày 22 tháng 9.\r\n\r\nĐặc điểm thiết bị\r\nIPhone X giới thiệu nỗ lực đầu tiên của Apple đối với một điện thoại thông minh toàn màn hình bao phủ phần lớn diện tích của thiết bị. Màn hình dành không gian trên giàn trên cùng để chứa máy ảnh mặt trước có chức năng như một máy quét khuôn mặt mở khóa thiết bị khi nhận diện được khuôn mặt đã đăng ký; chức năng này được đặt tên là “FaceID”.\r\n\r\nApple đã loại bỏ hoàn toàn cảm biến TouchID để mang lại trải nghiệm “toàn màn hình”. Màn hình này là màn hình điện thoại thông minh lớn nhất của Apple, với kích thước 5,8 inch, với tỷ lệ màn hình 18: 9. Màn hình này cũng có màn hình OLED HDR với mật độ điểm ảnh 458 ppi, màn hình này là thiết bị OLED đầu tiên của Apple và cũng có mật độ điểm ảnh cao nhất.\r\n\r\nThiết lập camera kép đã được định hướng lại thành bố cục dọc, các thành phần gần giống như bản sao của iPhone 8, sự khác biệt chính là hỗ trợ ổn định hình ảnh quang học kép của iPhone X thay vì một chiếc khác. Thiết bị đi kèm với một máy ảnh 7 megapixel có chế độ Chân dung của Apple và Animoji.', 1, '2020-10-19 09:16:50', '2022-06-30 17:19:07', 1, 1),
(63, 'iPhone XS Max', 1, 'xs-max-trang-cd80a8a5-8d7c-42ec-9e1d-eafee23470a4.png', 799, 192, 'Bản phát hành iPhone XS Max\r\nApple iPhone X đã chính thức được công bố vào ngày 12 tháng 9 năm 2017 tại Steve Job’s Theater, Apple Campus II. Điện thoại thông minh có sẵn để đặt hàng trước vào ngày 15 tháng 9 và có sẵn vào ngày 22 tháng 9.\r\n\r\nĐặc điểm thiết bị\r\nIPhone X giới thiệu nỗ lực đầu tiên của Apple đối với một điện thoại thông minh toàn màn hình bao phủ phần lớn diện tích của thiết bị. Màn hình dành không gian trên giàn trên cùng để chứa máy ảnh mặt trước có chức năng như một máy quét khuôn mặt mở khóa thiết bị khi nhận diện được khuôn mặt đã đăng ký; chức năng này được đặt tên là “FaceID”.\r\n\r\nApple đã loại bỏ hoàn toàn cảm biến TouchID để mang lại trải nghiệm “toàn màn hình”. Màn hình này là màn hình điện thoại thông minh lớn nhất của Apple, với kích thước 5,8 inch, với tỷ lệ màn hình 18: 9. Màn hình này cũng có màn hình OLED HDR với mật độ điểm ảnh 458 ppi, màn hình này là thiết bị OLED đầu tiên của Apple và cũng có mật độ điểm ảnh cao nhất.\r\n\r\nThiết lập camera kép đã được định hướng lại thành bố cục dọc, các thành phần gần giống như bản sao của iPhone 8, sự khác biệt chính là hỗ trợ ổn định hình ảnh quang học kép của iPhone X thay vì một chiếc khác. Thiết bị đi kèm với một máy ảnh 7 megapixel có chế độ Chân dung của Apple và Animoji.', 1, '2020-10-19 09:20:21', '2022-06-30 17:19:07', 0, 8),
(64, 'iPhone 8 Plus', 1, 'iphone-8-plus-red_0ef9f18c7adc499a82af3cdbc45b9ecc_grande.jpg', 499, 194, 'Bản phát hành iPhone 8 Plus\r\nApple iPhone 8 Plus đã chính thức được công bố vào ngày 12 tháng 9 năm 2017 tại Steve Job’s Theater, Apple Campus II. Điện thoại thông minh có sẵn để đặt hàng trước vào ngày 15 tháng 9 và có sẵn vào ngày 22 tháng 9.\r\n\r\nIPhone 8 và iPhone X cũng được công bố cùng ngày.', 1, '2020-10-19 09:24:10', '2022-06-30 16:50:07', 0, 6),
(65, 'iPhone 7 Plus', 1, '10035346-dien-thoai-iphone-7-plus-128gb-black-1.jpg', 399, 200, 'Phát lại video của iphone 7 plus\r\nVideo H.264 lên đến 4K, 30 khung hình / giây, mức Cấu hình cao 4.2 với âm thanh AAC ‑ LC lên đến 160 Kbps, 48kHz, âm thanh nổi hoặc Âm thanh Dolby lên đến 1008 Kbps, 48kHz, âm thanh nổi hoặc đa kênh, ở .m4v, định dạng tệp .mp4 và .mov; Video MPEG ‑ 4 lên đến 2,5 Mbps, 640 x 480 pixel, 30 khung hình / giây, Cấu hình đơn giản với âm thanh AAC ‑ LC lên đến 160 Kbps trên mỗi kênh, 48kHz, âm thanh nổi hoặc Âm thanh Dolby lên đến 1008 Kbps, 48kHz, âm thanh nổi hoặc đa kênh âm thanh ở các định dạng tệp .m4v, .mp4 và .mov; Motion JPEG (M ‑ JPEG) lên đến 35 Mbps, 1280 x 720 pixel, 30 khung hình / giây, âm thanh ở định dạng ulaw, âm thanh nổi PCM ở định dạng tệp .avi', 1, '2020-10-19 09:26:42', '0000-00-00 00:00:00', 0, 0),
(66, 'iPad Air 4', 2, 'air_2_silver_master.jpg', 2099, 90, 'Apple iPad Air (2019) là sản phẩm được Apple ra mắt một cách lặng lẽ với kích thước 10,5 inch. Thiết bị được ra mắt vào tháng 3 năm 2019.\r\n\r\nApple iPad Air (2019) hoạt động với Pencil do Apple phát hành. Máy tính bảng mới được thiết lập để tăng hiệu suất lên 70% so với người tiền nhiệm của nó.\r\n\r\nThiết bị được trang bị bộ vi xử lý Apple A12 Bionic APL1W81 và màn hình đi kèm với các tính năng bổ sung như màn hình Retina, màn hình True Tone, 500 cd / m², lớp phủ chống phản xạ, lớp phủ Oleophobic (lipophobic) và màn hình màu rộng (P3).\r\n\r\nApple iPad Air (2019) được trang bị RAM 2 GB và bộ nhớ trong 64 GB và 256 GB. Màn hình của điện thoại được sử dụng công nghệ IPS rất tuyệt vời.\r\n\r\nMáy tính bảng có màn hình lớn 10,5 inch cho độ phân giải 1920 x 1080 pixel, 24 bit. Mật độ điểm ảnh là 324 PPI (pixel trên inch).\r\n\r\nĐiện thoại được cung cấp năng lượng với dung lượng pin Li-Polymer không thể tháo rời. Apple iPad Air (2019) chạy trên hệ điều hành iOS 12.\r\n\r\nKích thước của máy tính bảng là 250,6 x 174,1 x 6,1 mm và 464 gram với pin. Bí danh của model là iPad mini (2019). Thân của máy tính bảng được làm bằng hợp kim nhôm.', 1, '2020-10-19 09:30:10', '2022-06-30 17:19:07', 0, 10),
(67, 'iPad Pro 2021', 2, 'ipad-pro-12-select-wifi-silver-202003_FMT_WHH.png', 3000, 83, 'Apple iPad Pro 11 (2021) chính thức được công bố vào ngày 20 tháng 4 năm 2021.\r\n\r\nMáy tính bảng được kích hoạt với các cảm biến như Face ID, gia tốc kế, con quay hồi chuyển, độ gần, phong vũ biểu cùng với các lệnh và chính tả ngôn ngữ tự nhiên Siri.\r\n\r\nMáy được trang bị bộ vi xử lý Apple M1 Octa-core và chạy trên hệ điều hành iPad 14.5. Thiết bị có nhiều tùy chọn bộ nhớ trong khác nhau như 128 GB, 256 GB, 512 GB, 1 TB và 2 TB trong khi nó có RAM 8 GB và 16 GB.\r\n\r\nKích thước của máy tính bảng là 11 inch cung cấp độ phân giải 1668 x 2388 pixel. Màn hình của máy tính bảng sử dụng công nghệ Liquid Retina IPS LCD và được bảo vệ bằng kính chống xước và lớp phủ oleophobic.\r\n\r\nĐiện thoại được cung cấp năng lượng với Li-Po 7538 mAh (28,65 Wh) không thể tháo rời + Sạc nhanh 18W. Apple iPad Pro 11 (2021) có kích thước 247,6 x 178,5 x 5,9 mm và nặng 466 gram.\r\n\r\nPhần thân của máy tính bảng được làm bằng kính, mặt sau bằng nhôm và khung nhôm. Nó hỗ trợ Nano-SIM và eSIM cùng với hỗ trợ bút cảm ứng (tích hợp Bluetooth; từ tính).', 1, '2020-10-19 09:32:58', '2022-06-30 17:19:07', 0, 17),
(68, 'iPad Mini 2021', 2, '34921_ipad_mini_5_gold_1.png', 1299, 90, 'Apple iPad mini (2021) chính thức được công bố vào ngày 14 tháng 9 năm 2021.\r\n\r\nMáy tính bảng này được trang bị bộ vi xử lý Apple A15 Bionic Hexa-core và GPU Apple GPU (5 lõi). Kích thước của máy tính bảng là 195,4 x 134,8 x 6,3 mm và nặng 293 gram.\r\n\r\nThiết bị được xây dựng với mặt trước bằng kính, mặt sau bằng nhôm và khung nhôm. Nó hỗ trợ Nano-SIM, eSIM, hỗ trợ bút cảm ứng (chỉ thế hệ thứ 2).\r\n\r\nKích thước màn hình của máy tính bảng là 8,3 inch Liquid Retina IPS LCD và độ phân giải là 1488 x 2266 pixel. Màn hình được bảo vệ bởi kính chống xước, lớp phủ oleophobic và có gam màu rộng và tông màu trung thực.\r\n\r\nNó chạy trên hệ điều hành iPadOS 15 và được đóng gói với RAM 4 GB. Đối với bộ nhớ trong, nó có hai tùy chọn: 64 GB và 256 GB. Máy ảnh có 12 MP (rộng) ở phía sau trong khi ở mặt trước, có một máy ảnh duy nhất: 12 MP (cực rộng).\r\n\r\nCác cảm biến bao gồm Vân tay (gắn bên), gia tốc kế, con quay hồi chuyển, la bàn, phong vũ biểu và các lệnh và chính tả bằng ngôn ngữ tự nhiên Siri. Thiết bị có các màu Xám không gian, Hồng, Tím và Ánh sao.', 1, '2020-10-19 09:36:02', '2022-06-30 16:50:07', 1, 10),
(69, 'Macbook Pro', 3, '01.jpg', 3499, 98, 'MacBook Pro và môi trường\r\nMacBook Pro 13 inch được thiết kế với các tính năng sau để giảm tác động môi trường của nó: 5\r\nXem Báo cáo Môi trường Sản phẩm MacBook Pro 13 inch\r\n\r\nĐược làm bằng vật liệu tốt hơn\r\n100% thiếc tái chế trong hàn của bảng logic chính\r\nVỏ được làm bằng nhôm carbon thấp có thể tái chế\r\n35% hoặc nhiều hơn nhựa tái chế trong nhiều thành phần\r\nTiết kiệm năng lượng\r\nChứng nhận ENERGY STAR®6\r\nHóa học thông minh hơn7\r\nKính hiển thị không chứa thạch tín\r\nKhông chứa thủy ngân\r\nBFR-, PVC- và không chứa berili\r\nSản xuất xanh\r\nApple’s Zero Waste Program giúp các nhà cung cấp loại bỏ rác thải được đưa đến bãi chôn lấp\r\nTất cả các địa điểm cung cấp lắp ráp cuối cùng đang chuyển sang sử dụng 100% năng lượng tái tạo cho sản xuất của Apple\r\nĐóng gói có trách nhiệm\r\n100% sợi gỗ nguyên sinh đến từ các khu rừng được quản lý có trách nhiệm\r\nBao bì đa số, có thể tái chế', 1, '2020-10-19 09:40:25', '0000-00-00 00:00:00', 0, 2),
(70, 'Macbook Air', 3, 'Macbook-Air-2020-MWTL2-MWTJ2_fmcw-b3.png', 3599, 100, 'Bạn có nên mua MacBook Air?\r\nMacBook Air là một trong những máy Mac đầu tiên của Apple chuyển đổi sang Apple silicon, có hiệu suất và tuổi thọ pin được cải thiện đáng kể trong một thiết kế mỏng, không quạt. Được công bố vào tháng 11 năm 2020, MacBook Air hiện đã hơn một năm tuổi, với một mô hình mới dự kiến ​​sẽ ra mắt vào cuối năm nay.\r\n\r\nApple đã cập nhật MacBook Air một cách thất thường trong những năm gần đây, phát hành hai mẫu mới vào năm 2020 và không có mẫu rõ ràng nào trước đó, mặc dù thiết bị đã được cập nhật hàng năm kể từ năm 2017. Giờ đây, Apple đã kiểm soát silicon tùy chỉnh của riêng mình cho MacBook Air, Trái ngược với việc sử dụng bộ vi xử lý Intel, có khả năng MacBook Air sẽ thấy các bản cập nhật thường xuyên hơn trong những năm tới.\r\nĐã có những dấu hiệu rõ ràng cho thấy một chiếc MacBook Air được cập nhật với một số nâng cấp và cải tiến đang được tung ra thị trường và các tin đồn cho thấy mẫu máy này sẽ ra mắt vào giữa đến cuối năm 2022.\r\n\r\nCác mẫu MacBook Air cập nhật được cho là sẽ chỉ còn vài tháng nữa, có nghĩa là bạn chỉ nên mua MacBook Air nếu bạn cần gấp một chiếc máy mới. Đối với hầu hết mọi người, tốt hơn là nên đợi cho đến khi các mô hình mới xuất hiện, đặc biệt là khi mô hình thế hệ tiếp theo được định hình là một bản nâng cấp đáng kể.\r\n\r\nMặc dù MacBook Air có vẻ là máy tính xách tay tốt nhất của Apple về tính di động và giá cả, nhưng những người dùng yêu cầu hiệu suất và thời lượng pin tốt hơn một chút, cũng như Touch Bar, nên xem xét MacBook Pro M1, có giá khởi điểm 1.299 USD.', 1, '2020-10-19 09:44:02', '0000-00-00 00:00:00', 0, 0),
(71, 'AirPods Pro', 4, 'MWP22.jpg', 499, 495, 'Apple AirPods Pro đi kèm với tính năng khử tiếng ồn chủ động cho âm thanh đắm chìm. Nó cung cấp khả năng truy cập nhanh vào Siri bằng cách nói “Hey Siri”.\r\n\r\nHộp sạc không dây mang lại thời lượng pin hơn 24 giờ và chế độ Trong suốt để nghe và kết nối với thế giới xung quanh bạn.\r\n\r\nApple AirPods Pro dễ dàng trở thành một trong những tai nghe không dây tốt nhất cho chủ sở hữu iOS. Không giống như các AirPods khác, phiên bản chuyên nghiệp có khả năng chống nước vì nó đi kèm với xếp hạng IPX4, giúp bạn bớt lo lắng về việc làm vỡ chúng do mồ hôi của bạn.', 1, '2020-10-19 09:46:46', '2022-06-30 17:13:08', 1, 5),
(72, 'AirPods 2', 4, 'tai-nghe-bluetooth-airpods-2-apple-mv7n2-trang-avatar-1-600x600.jpg', 299, 500, 'Apple AirPods 2 (có hộp sạc) được trang bị chip tai nghe Apple H1 mới. Cho dù bạn sử dụng AirPods bằng cả hai tai hay chỉ một trong hai tai, chip H1 có thể tự động truyền âm thanh và kích hoạt micrô.', 1, '2020-10-19 09:49:29', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`) VALUES
(1, 'iPhone'),
(2, 'iPad'),
(3, 'Macbook'),
(4, 'Airpods'),
(12, 'Apple Watch');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `id_product`, `url`) VALUES
(1, 59, '11-green.jpg'),
(2, 59, '36944_iphone11_white_select_2019.jpg'),
(3, 59, '637037652457717299_11-den.png'),
(4, 60, '637037652457717299_11-den.png'),
(5, 60, '637037687763926758_11-pro-max-xanh.png'),
(6, 61, 'iphone-11-pro-hai-phong-01.jpg'),
(7, 62, '4512fe9898661b5f3746f91370a22158.jpg'),
(8, 62, 'ip12-6.jpg'),
(9, 62, 'iphone-x-silver-2.jpg'),
(10, 63, '4512fe9898661b5f3746f91370a22158.jpg'),
(11, 63, 'ip12-2.jpg'),
(12, 63, 'xs-max-vang-86d20f37-92ab-4803-9b02-1ba2726618bf.png'),
(13, 64, 'iphone-8-plus-128gb-082720-052716-600x600.jpg'),
(14, 64, 'iphone-8-plus-red_0ef9f18c7adc499a82af3cdbc45b9ecc_grande.jpg'),
(15, 65, '636836609818617272_ip7-plus-hong-1.png'),
(16, 65, 'ip7p-32.jpg'),
(17, 66, '61AK3IeXApL._AC_SX466_.jpg'),
(18, 66, '61is5y-+MeL._AC_SL1500_.jpg'),
(19, 67, '61AK3IeXApL._AC_SX466_.jpg'),
(20, 67, '61is5y-+MeL._AC_SL1500_.jpg'),
(21, 68, 'ipadmini5-jpeg-e0657da8-586e-4978-bd63-12022162a565.jpg'),
(22, 68, 'silver_wifi.png'),
(23, 69, '1573663014_1520445.jpg'),
(24, 69, 'apple-macbook-air-2020-vântay-220173-600x600.jpg'),
(25, 70, '726b328e-be3b-4df3-8f27-339819336fb6.jpg'),
(26, 70, '38257_apple_macbook_air_mvh52_1_1.jpg'),
(27, 70, 'apple-macbook-air-2020-vântay-220173-600x600.jpg'),
(28, 71, '600_thumb_airpodpro.jpg'),
(29, 71, 'MWP22.jpg'),
(30, 72, 'apple-airpods-2-with-wireless-charging-case-mrxj2zm-a-white-21032019-01-p.jpg'),
(31, 72, 'MWP22.jpg'),
(32, 71, ''),
(33, 61, 'ip12-4 (1).jpg'),
(34, 62, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_information`
--

CREATE TABLE `product_information` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `display` varchar(256) DEFAULT '0' COMMENT 'Màn hình',
  `operating_system` varchar(256) DEFAULT '0' COMMENT 'Hệ điều hành',
  `front_camera` varchar(256) DEFAULT '0' COMMENT 'Cam trước',
  `rear_camera` varchar(256) DEFAULT '0' COMMENT 'Cam sau',
  `cpu` varchar(256) DEFAULT '0' COMMENT 'CPU',
  `ram` varchar(256) DEFAULT '0' COMMENT 'RAM',
  `rom` varchar(256) DEFAULT '0' COMMENT 'ROM',
  `battery` varchar(256) DEFAULT '0' COMMENT 'Pin',
  `security` varchar(256) DEFAULT '0' COMMENT 'Bảo mật',
  `charging_port` varchar(256) DEFAULT '0' COMMENT 'Cổng sạc',
  `compatible` varchar(256) DEFAULT '0' COMMENT 'Tương thích',
  `sound_technology` varchar(256) DEFAULT '0' COMMENT 'Công nghệ âm thnah',
  `used_time` varchar(256) DEFAULT '0' COMMENT 'Thời gian sử dụng',
  `connect` varchar(256) DEFAULT '0' COMMENT 'Kết nối',
  `weight` varchar(256) DEFAULT '0' COMMENT 'Trọng lượng',
  `brand` varchar(256) DEFAULT '0' COMMENT 'Thương hiệu',
  `made_in` varchar(256) DEFAULT '0' COMMENT 'Sản xuất tại',
  `hard_drive` varchar(256) DEFAULT '0' COMMENT 'Ổ cứng',
  `graphic_card` varchar(256) DEFAULT '0' COMMENT 'Card đồ hoạ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_information`
--

INSERT INTO `product_information` (`id`, `id_product`, `display`, `operating_system`, `front_camera`, `rear_camera`, `cpu`, `ram`, `rom`, `battery`, `security`, `charging_port`, `compatible`, `sound_technology`, `used_time`, `connect`, `weight`, `brand`, `made_in`, `hard_drive`, `graphic_card`) VALUES
(1, 59, 'IPS LCD, 6.1\", Liquid Retina ', 'IOS 13', '12', '2 Camera 12MP', 'Apple A13', '4GB', '64', '3110', '0', 'Lightning', '0', '0', '0', '0', '194 g', '0', 'Viet Nam', '0', '0'),
(2, 60, 'OLED, 6.5\" Super Retina XDR', 'IOS 13', '12', '3 Camera 12 MP', 'Apple A13', '4GB', '256', '3969', '0', 'Lightning', '0', '0', '0', '0', '226g', '0', 'Viet Nam', '0', '0'),
(3, 61, '6.1', 'IOS 13', '12', '2 camera 12 MP', 'Apple A14', '6GB', '128', '4000', '0', 'Lightning', '0', '0', '0', '0', '200g', '0', 'Viet Nam', '0', '0'),
(4, 62, 'OLED 5.1\" Super Retina', 'IOS 12', '7', '2 camera 12MP', 'Apple A12', '4GB', '64', '2658', '0', 'Lightning', '0', '0', '0', '0', '177g', '0', 'Viet Nam', '0', '0'),
(5, 63, 'OLED 6.4\" Super Retina', 'IOS 12', '7', '2 camera 12MP', 'Apple A12', '4GB', '128', '3128', '0', 'Lightning', '0', '0', '0', '0', '261g', '0', 'Viet Nam', '0', '0'),
(6, 64, 'OLED 5.5\" Retina HD', 'IOS 13', '7', '2 camera 12MP', 'Apple A11', '3GB', '128', '2691', '0', 'Lightning', '0', '0', '0', '0', '202g', '0', 'Viet Nam', '0', '0'),
(7, 65, 'OLED 5.5\" Retina HD', 'IOS 13', '7', '2 camera 12MP', 'Apple A10', '3GB', '32', '2900', '0', 'Lightning', '0', '0', '0', '0', '201g', '0', 'Viet Nam', '0', '0'),
(8, 66, 'Liquid Retina 10.8\"', 'iPadOS 14', '7', '12MP', 'Apple A14', '6GB', '256', '3000', '0', 'Type-C', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(9, 67, 'Liquid Retina 11\"', 'iPadOS 13', '7', '12MP', 'Apple A12Z', '6GB', '128', '7600', '0', 'Type-C', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(10, 68, 'LCD 7.9\"', 'iPadOS 13', '7', '8MP', 'Apple A12', '3GB', '64', '5124', '0', 'Type-C', '0', '0', '0', '0', '0', '0', '0', '0', '0'),
(11, 69, '13.3 Super Retina', 'Mac OS', '10', '0', 'Intel Core i5 8th', '8GB LPDDR3', '128', '10000', '0', 'Lightning', '0', '0', '0', '2 x USB-C', '1.4Kg', '0', '0', 'SSD 256GB', 'Intel Iris Plus Graphics 645'),
(12, 70, '13.3\" Retina', 'Mac OS', '12', '0', 'Intel Core i5 10th', '8GB LPDDR4X', '0', '15000', '0', 'Lightning', '0', '0', '0', '2 x USB-C', '1.29Kg', '0', '0', 'SSD 256GB', 'Intel Iris Plus Graphics'),
(13, 71, '0', '0', '0', '0', '0', '0', '0', '5000', '0', 'Lightning', 'MacOS, iOS', 'Active Noise Cancelling', '4.5h', '1 device', '0', '0', '0', '0', '0'),
(14, 72, '0', '0', '0', '0', '0', '0', '0', '3000 mAh', '0', 'Lightning', 'Android, iOS', 'Active Noise Pro', '5h', '1 device', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lv` int(11) NOT NULL DEFAULT 100,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `fullname`, `email`, `password`, `lv`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Luong Van Nhu', 'luongvannhu@gmail.com', '1', 1, 1, '2022-05-19 08:34:14', '2022-05-26 08:34:14'),
(2, 'khanhnhu', 'Luong Khanh Nhu', 'khanhnhu@gmail.com', '1', 100, 1, '2022-05-11 08:50:30', '2020-10-28 14:24:55'),
(5, 'thinhu123', 'Lương Thị Như', 'luongthinhu@gmail.com', '789', 15, 1, '0000-00-00 00:00:00', '2020-10-12 14:30:13'),
(7, 'Nhu', 'Như', 'nhu@gmail.com', 'nhu123456', 15, 1, '2020-09-12 11:51:17', '2020-10-12 14:32:11'),
(8, 'nhu123', 'nhu', 'nhu123@gmail.com', '123456789', 15, 1, '2020-09-25 02:41:12', '2020-10-12 14:32:47'),
(9, 'khanhnhu123', 'Nhu', 'luongvannhu2512@gmail.com', 'khanhnhu2', 15, 1, '2020-09-29 09:25:02', '2020-10-12 14:33:10'),
(10, 'hyung', 'Lê Việt Hưng', 'viethung4869@gmail.com', '$2y$10$BY79FF9bdNbOjEOKSTxcdeQL1DSWBq1CF1bTWDVLN/wL/m3g.7iTm', 100, 1, '2022-05-17 15:41:57', '2022-05-17 15:41:57'),
(11, 'hung', 'Vy Hùng', 'vyvanhung2882001bg@gmail.com', '$2y$10$n6CLXmfDz.tSEode/IhO0.DIyOM8kPmTMdxIq.hiOMssOTJzZstwy', 1, 1, '2022-05-23 14:58:55', '2022-05-23 14:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id_lv` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id_lv`, `name`) VALUES
(1, 'admin'),
(15, 'Staff'),
(100, 'Customers');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `management_image_banner`
--
ALTER TABLE `management_image_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `order_detail_ibfk_1` (`id_order`),
  ADD KEY `order_detail_ibfk_2` (`id_product`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`type`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product_information`
--
ALTER TABLE `product_information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtc_productinfor` (`id_product`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_ibfk_1` (`lv`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_lv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `management_image_banner`
--
ALTER TABLE `management_image_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `product_information`
--
ALTER TABLE `product_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_lv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order_list` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`type`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_information`
--
ALTER TABLE `product_information`
  ADD CONSTRAINT `produtc_productinfor` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
