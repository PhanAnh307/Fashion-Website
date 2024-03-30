-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 04:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopthoitrang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'HongAnhPhan', 'admin@gmail.com', 'f7cfd88ed7a77f66fd7a096f27200b1a');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` int(15) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(60, 554400000, 'hoàn thành', 1, 346589990, 'Hà Nội', 'Hà Nội', '2023-12-02 11:35:58'),
(61, 79200000, 'hoàn thành', 1, 346589990, 'Hà Nội', 'Hà Nội', '2023-12-02 11:39:31'),
(62, 158400000, 'hoàn thành', 1, 346589990, 'Hà Nội', 'Hà Nội', '2023-12-02 11:48:46'),
(63, 158400000, 'hoàn thành', 1, 346589990, 'Hà Nội', 'Hà Nội', '2023-12-02 12:37:53'),
(64, 28000000, 'hoàn thành', 1, 346589990, 'Hà Nội', 'Hà Nội', '2023-12-02 12:39:20'),
(65, 792000000, 'hoàn thành', 1, 346589990, 'Hà Nội', 'Hà Nội', '2023-12-02 12:41:30'),
(66, 792000000, 'hoàn thành', 1, 346589990, 'Hà Nội', 'Hà Nội', '2023-12-02 12:44:16'),
(67, 475200000, 'hoàn thành', 1, 346589990, 'Hà Nội', 'Hà Nội', '2023-12-02 12:56:33'),
(68, 16800000, 'hoàn thành', 1, 346589990, 'Hà Nội', 'Hà Nội', '2023-12-02 12:58:20'),
(69, 396000000, 'hoàn thành', 1, 346589990, 'Hà Nội', 'Hà Nội', '2023-12-02 13:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(78, 60, 1, 'Gucci | BOMBER JACKET', 'featured_1.PNG', 79200000, 7, 1, '2023-12-02 11:35:58'),
(79, 61, 1, 'Gucci | BOMBER JACKET', 'featured_1.PNG', 79200000, 1, 1, '2023-12-02 11:39:31'),
(80, 62, 1, 'Gucci | BOMBER JACKET', 'featured_1.PNG', 79200000, 2, 1, '2023-12-02 11:48:46'),
(81, 63, 1, 'Gucci | BOMBER JACKET', 'featured_1.PNG', 79200000, 2, 1, '2023-12-02 12:37:53'),
(82, 64, 2, 'Louis vuitton | Áo Phông', 'featured_2.jpg', 2800000, 10, 1, '2023-12-02 12:39:20'),
(83, 65, 1, 'Gucci | BOMBER JACKET', 'featured_1.PNG', 79200000, 10, 1, '2023-12-02 12:41:30'),
(84, 66, 1, 'Gucci | BOMBER JACKET', 'featured_1.PNG', 79200000, 10, 1, '2023-12-02 12:44:16'),
(85, 67, 1, 'Gucci | BOMBER JACKET', 'featured_1.PNG', 79200000, 6, 1, '2023-12-02 12:56:33'),
(86, 68, 2, 'Louis vuitton | Áo Phông', 'featured_2.jpg', 2800000, 6, 1, '2023-12-02 12:58:20'),
(87, 69, 1, 'Gucci | BOMBER JACKET', 'featured_1.PNG', 79200000, 5, 1, '2023-12-02 13:06:32');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `transaction_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`transaction_id`, `order_id`, `user_id`, `payment_date`) VALUES
(1, 49, 1, '0000-00-00 00:00:00'),
(2, 50, 1, '0000-00-00 00:00:00'),
(3, 51, 1, '0000-00-00 00:00:00'),
(4, 52, 1, '2023-11-27 14:32:41'),
(5, 53, 1, '0000-00-00 00:00:00'),
(6, 54, 1, '2023-11-27 14:35:57'),
(7, 55, 1, '2023-11-27 14:46:44'),
(8, 56, 1, '2023-11-27 14:48:57'),
(9, 58, 1, '2023-12-02 11:27:08'),
(10, 58, 1, '2023-12-02 11:27:09'),
(11, 59, 1, '2023-12-02 11:30:42'),
(12, 60, 1, '2023-12-02 11:36:00'),
(13, 60, 1, '2023-12-02 11:36:04'),
(14, 61, 1, '2023-12-02 11:39:36'),
(15, 62, 1, '2023-12-02 11:48:47'),
(16, 62, 1, '2023-12-02 11:49:13'),
(17, 62, 1, '2023-12-02 11:49:53'),
(18, 62, 1, '2023-12-02 11:50:23'),
(19, 62, 1, '2023-12-02 11:50:56'),
(20, 62, 1, '2023-12-02 11:51:02'),
(21, 62, 1, '2023-12-02 11:51:10'),
(22, 62, 1, '2023-12-02 11:51:20'),
(23, 62, 1, '2023-12-02 11:51:27'),
(24, 62, 1, '2023-12-02 12:02:18'),
(25, 63, 1, '2023-12-02 12:37:54'),
(26, 64, 1, '2023-12-02 12:39:21'),
(27, 64, 1, '2023-12-02 12:39:23'),
(28, 64, 1, '2023-12-02 12:40:10'),
(29, 64, 1, '2023-12-02 12:40:20'),
(30, 64, 1, '2023-12-02 12:40:44'),
(31, 65, 1, '2023-12-02 12:41:32'),
(32, 65, 1, '2023-12-02 12:41:34'),
(33, 66, 1, '2023-12-02 12:44:17'),
(34, 66, 1, '2023-12-02 12:48:19'),
(35, 66, 1, '2023-12-02 12:53:54'),
(36, 67, 1, '2023-12-02 12:56:34'),
(37, 68, 1, '2023-12-02 12:58:21'),
(38, 69, 1, '2023-12-02 13:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` decimal(12,0) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(50) NOT NULL,
  `product_image3` varchar(50) NOT NULL,
  `product_image4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_price`, `product_image`, `product_image2`, `product_image3`, `product_image4`) VALUES
(1, 'Gucci | BOMBER JACKET', 'coats', 'Giữ ấm vào mùa đông, màu đỏ sặc sỡ nổi bật giữa đám đông', 79200000, 'featured_1.PNG', 'featured_1_2.png', 'featured_1_3.png', 'featured_1_4.png'),
(2, 'Louis vuitton | Áo Phông', 'coats', 'Phong cách trẻ trung với màu đen lãng tử, phù hợp tuổi teen', 2800000, 'featured_2.jpg', 'featured_2_2.jpg', 'featured_2_3.jpg', 'featured_2_4.jpg'),
(3, 'Dior | Áo Hoodie Nam Black', 'coats', 'Phong cách badboy lạnh lùng ', 21900000, 'featured_3.jpg', 'featured_3_2.jpg', 'featured_3_3.jpg', 'featured_3_4.jpg'),
(4, 'Louis Vuitton | Balo Discovery Backpack', 'bags', 'Balo du lịch với sức chứa 20kg', 49000000, 'featured_4.jpg', 'featured_4_2.jpg', 'featured_4_3.jpg', 'featured_4_4.jpg'),
(5, 'Áo Sơ Mi Nam Dolce & Gabbana', 'coats', 'Thiết kế đẹp mắt, chất liệu cao cấp, không chỉ mang lại cảm giác thoải mái mà còn mang đến phong cách thời thượng, sang trọng', 15500000, 'coats_1_1.jpg', 'coats_1_2.jpg', 'coats_1_3.jpg', 'coats_1_4.jpg'),
(6, 'Áo Hoodie Adidas Hoodie Logo GE0869 Màu Đen', 'coats', 'Mang vẻ đẹp trẻ trung nhưng không kém phần lịch lãm, chiếc áo đã chiếm được rất nhiều cảm tình của phái mạnh.', 1300000, 'coats_3  (1).jpg', 'coats_3  (2).jpg', 'coats_3  (3).jpg', 'coats_3  (4).jpg'),
(7, 'Áo Sơ Mi Nam Versace Logo Baroque Printed', 'coats', 'chiếc áo nam chất lượng cao cấp đến từ thương hiệu Versace, được làm từ chất liệu cao cấp bền đẹp trong suốt quá trình sử dụng.', 7100000, 'coats_2_1.jpg', 'coats_2_2.jpg', 'coats_2_3.jpg', 'coats_2_4.jpg'),
(8, 'Quần Jogger Acmé De La Vie', 'pants', 'Mềm mại, mang lại cảm giác thoải mái tối đa khi mặc. Mẫu quần thiết kế kiểu dáng vừa vặn, cạp chun dây rút co giãn thoải mái.', 1770000, 'pants_1_1.jpg', 'pants_1_2.jpg', 'pants_1_3.jpg', 'pants_1_4.jpg'),
(9, 'Quần Short Burberry Guildes', 'pants', 'Khả năng thấm hút mồ hôi tốt, tạo cẩm giác thoải mái cho người mặc trong mọi hoạt động thường ngày.', 6990000, 'pants_2 (1).jpg', 'pants_2 (2).jpg', 'pants_2 (3).jpg', 'pants_2 (4).jpg'),
(10, 'Quần Shorts Burberry Check Drawcord', 'pants', 'Quần shorts thiết kế đơn giản, khỏe khoắn, tinh tế trong từng đường may mang đến cho bạn một phong cách trẻ trung, năng động.', 7800000, 'pants_3 (1).jpg', 'pants_3 (2).jpg', 'pants_3 (3).jpg', 'pants_3 (4).jpg'),
(11, 'Quần Shorts Burberry Gray Check', 'pants', 'Quần Burberry Gray Check Swim được làm từ chất liệu vải cao cấp với khả năng thấm hút mồ hôi tốt, mang đến cảm giấc thoải mái cho người sử dụng.', 7700000, 'pants_4 (1).jpg', 'pants_4 (2).jpg', 'pants_4 (3).jpg', 'pants_4 (4).jpg'),
(12, 'Đồng hồ Orient FKU00001W0', 'accessories', 'Chất liệu Sapphine, máy quartz, khả năng chịu nước 50m', 2830000, 'accessories_1 (1).jpg', 'accessories_1 (2).jpg', 'accessories_1 (3).jpg', 'accessories_1 (4).jpg'),
(13, 'Mũ Dsquared2', 'accessories', 'Chiếc mũ thời trang có thiết kế đẹp mắt đêsn từ thương hiệu Dsquared2 nổi tiếng.', 3795000, 'accessories_2 (1).jpg', 'accessories_2 (2).jpg', 'accessories_2 (3).jpg', 'accessories_2 (4).jpg'),
(14, 'Mũ Dsquared2 Màu Đen', 'accessories', 'Là chiếc mũ thời trang có thiết kế đẹp mắt đến từ thương hiệu Dsquared2 nổi tiếng.', 3450000, 'accessories_3 (1).jpg', 'accessories_3 (2).jpg', 'accessories_3 (3).jpg', 'accessories_3 (4).jpg'),
(15, 'Đồng hồ Nam Orient màu đen', 'accessories', 'Đến từ thương hiệu đồng hồ Orient nổi tiếng Nhật Bản, uy tín và lâu đời, chiếc đồng hô được làm từ chất liệu cao cấp nên bền đẹp trong suốt quá trình sử dụng.', 4860000, 'accessories_4 (1).jpg', 'accessories_4 (2).jpg', 'accessories_4 (3).jpg', 'accessories_4 (4).jpg'),
(16, 'Balo Venuco Madrid - Xanh Than ', 'bags', 'Thiết kế đẹp mắt, kiểu dáng thời trang, Balo được làm từ chất liệu Da Pu + Polyester cao cấp, bền đẹp trong suốt quá trình sử dụng.', 899000, 'balo_1 (1).jpg', 'balo_1 (2).jpg', 'balo_1 (3).jpg', 'balo_1 (4).jpg'),
(17, 'Balo Adidas Primegreen Thể Thao Màu Đen', 'bags', 'Balo cao cấp được thiết kế trẻ trung năng động dành cho cả nam và nữ đến từ thương hiệu Adidas nổi tiếng của Đức. Balo được làm từ chất liệu cao cấp bền đẹp trong suốt quá trình sử dụng.', 990000, 'balo_2 (1).jpg', 'balo_2 (2).jpg', 'balo_2 (3).jpg', 'balo_2 (4).jpg'),
(18, 'Balo Lacoste Men\'s Màu Đen', 'bags', 'Là chiếc balo thời trang được thiết kế đẹp mắt đến từ thương hiệu Lacoste nổi tiếng của nước Mỹ, Sở hữu gam màu trang nhã cùng thiết kế đẹp mắt cho người dùng sự tiện dụng khi mang bên mình.', 3850000, 'balo_3 (1).jpg', 'balo_3 (2).jpg', 'balo_3 (3).jpg', 'balo_3 (4).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'Phan Hong Anh', 'lotus.honganhp@gmail.com', 'f7cfd88ed7a77f66fd7a096f27200b1a'),
(2, 'PhanAnh307', 'sudungchucaituadenz@gmail.com', 'ad08b997ed08c7b531a63fe3605fc8f6'),
(3, 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'admin1', 'admin1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'admin2', 'admin2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
