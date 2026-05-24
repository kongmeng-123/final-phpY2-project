-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: May 17, 2026 at 04:14 AM
-- Server version: 8.0.45
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders_tb`
--

CREATE TABLE `orders_tb` (
  `order_id` int NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_img_src` varchar(100) DEFAULT NULL,
  `product_price` int NOT NULL,
  `amount_product` int NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `status` varchar(30) DEFAULT 'Pending',
  `bill_img_src` varchar(100) DEFAULT NULL,
  `date_order` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_success` datetime DEFAULT NULL,
  `user_address` varchar(100) DEFAULT NULL,
  `express_with` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders_tb`
--

INSERT INTO `orders_tb` (`order_id`, `product_name`, `product_img_src`, `product_price`, `amount_product`, `user_name`, `status`, `bill_img_src`, `date_order`, `date_success`, `user_address`, `express_with`) VALUES
(1, 'How to Focus', 'how to focus.jpg', 250, 1, 'Somsak Jaidee', 'Success', 'slip_01.jpg', '2026-05-15 10:30:00', '2026-05-17 14:00:00', '123/45 Bangkok', 'Kerry Express'),
(2, 'Mindset', 'mindset.jpg', 320, 2, 'Manee Rakkarn', 'Pending', NULL, '2026-05-16 09:15:00', NULL, '99 Rama 9 Rd, Bangkok', 'Flash Express'),
(3, 'Rich Dad Poor Dad', 'rich dad poor dad.jpg', 390, 1, 'Wichai Sooksan', 'Shipping', 'slip_02.jpg', '2026-05-16 18:45:00', NULL, '456 Nimman, Chiang Mai', 'J&T Express'),
(4, 'Success Faster', 'success faster.jpg', 310, 1, 'Ananya Pornpan', 'Success', 'slip_03.jpg', '2026-05-14 11:00:00', '2026-05-16 09:30:00', '789 Sukhumvit, Bangkok', 'Thailand Post'),
(5, 'The Rich Within', 'the rich within.jpg', 340, 1, 'Kitti Tangmo', 'Cancelled', NULL, '2026-05-17 13:00:00', NULL, '32/1 Phuket Rd, Phuket', 'Kerry Express'),
(6, 'Think and Grow Rich', 'think and grow rich.jpg', 300, 3, 'John Doe', 'Success', 'slip_04.jpg', '2026-05-15 08:20:00', '2026-05-17 10:15:00', '11/2 Phaya Thai, Bangkok', 'Flash Express'),
(7, 'Smart Money', 'smart money.jpg', 280, 1, 'Jane Smith', 'Pending', NULL, '2026-05-17 10:45:00', NULL, '55 North Rd, Chonburi', 'J&T Express'),
(8, 'Millionaire Success Habits', 'millionaire success habits.jpg', 290, 1, 'Somchai Thai', 'Shipping', 'slip_05.jpg', '2026-05-17 11:00:00', NULL, '222 Mittraphap Rd, Khon Kaen', 'Kerry Express');

-- --------------------------------------------------------

--
-- Table structure for table `products_tb`
--

CREATE TABLE `products_tb` (
  `id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `count` int DEFAULT '0',
  `image_src` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`id`, `product_name`, `price`, `category`, `count`, `image_src`, `created_at`) VALUES
(1, 'How to Focus', 250.00, 'Books', 10, 'how to focus.jpg', '2026-05-17 02:08:27'),
(2, 'How to Launch a Successful Business', 350.00, 'Books', 5, 'how to launch a successful business.jpg', '2026-05-17 02:08:27'),
(3, 'Millionaire Success Habits', 290.00, 'Books', 8, 'millionaire success habits.jpg', '2026-05-17 02:08:27'),
(4, 'Mindset', 320.00, 'Books', 12, 'mindset.jpg', '2026-05-17 02:08:27'),
(5, 'Rich Dad Poor Dad', 390.00, 'Books', 15, 'rich dad poor dad.jpg', '2026-05-17 02:08:27'),
(6, 'Smart Money', 280.00, 'Books', 7, 'smart money.jpg', '2026-05-17 02:08:27'),
(7, 'Success Faster', 310.00, 'Books', 9, 'success faster.jpg', '2026-05-17 02:08:27'),
(8, 'The Rich Within', 340.00, 'Books', 6, 'the rich within.jpg', '2026-05-17 02:08:27'),
(9, 'Think and Grow Rich', 300.00, 'Books', 20, 'think and grow rich.jpg', '2026-05-17 02:08:27'),
(10, 'Why Take a Change When You Have a Choice', 330.00, 'Books', 4, 'why take a change when you have a choice.jpg', '2026-05-17 02:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_tb`
--

CREATE TABLE `promotion_tb` (
  `pro_id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `status_now` varchar(50) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  `discount` int NOT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `promotion_tb`
--

INSERT INTO `promotion_tb` (`pro_id`, `title`, `status_now`, `type`, `discount`, `create_date`, `update_date`, `end_date`) VALUES
(1, 'Welcome Summer Sale', 'Active', 'Percentage', 20, '2024-03-01 09:00:00', '2024-03-01 09:00:00', '2024-03-31 23:59:59'),
(2, 'Flash Sale Midnight', 'Active', 'Fixed Amount', 500, '2024-03-10 12:00:00', '2024-03-10 12:00:00', '2024-03-11 00:00:00'),
(3, 'New User Special', 'Active', 'Percentage', 15, '2024-01-01 00:00:00', '2024-01-01 00:00:00', '2024-12-31 23:59:59'),
(4, 'Songkran Festival Discount', 'Inactive', 'Percentage', 30, '2024-03-15 10:30:00', '2024-03-15 10:30:00', '2024-04-17 23:59:59'),
(5, 'Clearance Stock 2023', 'Expired', 'Fixed Amount', 1000, '2023-12-01 08:00:00', '2023-12-25 15:00:00', '2023-12-31 23:59:59');

-- --------------------------------------------------------

--
-- Table structure for table `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` int NOT NULL,
  `Fname` varchar(100) NOT NULL,
  `Lname` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_tb`
--

INSERT INTO `users_tb` (`user_id`, `Fname`, `Lname`, `gender`, `email`, `password`, `phoneNumber`, `created_at`) VALUES
(1, 'Somsak', 'Jaidee', 'Male', 'somsak@email.com', 'password123', '0812345678', '2026-05-16 15:46:46'),
(2, 'Manee', 'Rakkarn', 'Female', 'manee@email.com', 'manee2024', '0898765432', '2026-05-16 15:46:46'),
(3, 'Wichai', 'Sooksan', 'Male', 'wichai@email.com', 'wichai_pass', '0822223333', '2026-05-16 15:46:46'),
(4, 'Ananya', 'Pornpan', 'Female', 'ananya@email.com', 'ananya_789', '0855556666', '2026-05-16 15:46:46'),
(5, 'Kitti', 'Tangmo', 'Male', 'kitti@email.com', 'kitti_safe', '0877778888', '2026-05-16 15:46:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders_tb`
--
ALTER TABLE `orders_tb`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products_tb`
--
ALTER TABLE `products_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_tb`
--
ALTER TABLE `promotion_tb`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders_tb`
--
ALTER TABLE `orders_tb`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `promotion_tb`
--
ALTER TABLE `promotion_tb`
  MODIFY `pro_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
