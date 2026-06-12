-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 04, 2026 at 08:44 AM
-- Server version: 8.0.46
-- PHP Version: 8.3.31

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
  `user_id` int NOT NULL,
  `order_status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `bill_img_src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `express_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `express_with` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_order` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_success` datetime DEFAULT NULL,
  `order_items` json NOT NULL,
  `bill_status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_tb`
--

INSERT INTO `orders_tb` (`order_id`, `user_id`, `order_status`, `bill_img_src`, `express_address`, `express_with`, `date_order`, `date_success`, `order_items`, `bill_status`) VALUES
(1, 1, 'success', 'bill-one.jpg', 'Vientiane', 'Anousith', '2024-03-15 10:20:00', '2024-03-15 15:30:00', '[{\"id\": \"1\", \"price\": \"45\", \"amount\": \"2\", \"category\": \"how to\", \"image_src\": \"how to focus.jpg\", \"product_name\": \"How to Focus\"}, {\"id\": \"2\", \"price\": \"50\", \"amount\": \"1\", \"category\": \"mindset\", \"image_src\": \"rich dad poor dad.jpg\", \"product_name\": \"Rich Dad Poor Dad\"}]', 'success'),
(2, 2, 'fail', 'bill-one.jpg', 'Nongpaya', 'Misai', '2024-06-12 14:15:00', NULL, '[{\"id\": \"1\", \"price\": \"65\", \"amount\": \"1\", \"category\": \"how to\", \"image_src\": \"how to launch a successful business.jpg\", \"product_name\": \"How to Launch a Successful Business\"}]', 'fail'),
(3, 3, 'success', 'bill-one.jpg', 'nongpaya', 'misai', '2024-09-28 07:38:58', '2024-09-28 14:33:47', '[{\"id\": \"1\", \"price\": \"30\", \"amount\": \"2\", \"category\": \"how to\", \"image_src\": \"how to focus.jpg\", \"product_name\": \"how to focus\"}, {\"id\": \"2\", \"price\": \"60\", \"amount\": \"50\", \"category\": \"how to\", \"image_src\": \"how to launch a successful business.jpg\", \"product_name\": \"how to launch a successful business\"}, {\"id\": \"3\", \"price\": \"30\", \"amount\": \"5\", \"category\": \"mindset\", \"image_src\": \"rich dad poor dad.jpg\", \"product_name\": \"rich dad poor dad\"}]', 'success'),
(4, 4, 'rendering', 'bill-one.jpg', 'Chanthabouly', 'J&T', '2024-11-05 09:00:00', NULL, '[{\"id\": \"1\", \"price\": \"55\", \"amount\": \"1\", \"category\": \"mindset\", \"image_src\": \"millionaire success habits.jpg\", \"product_name\": \"Millionaire Success Habits\"}, {\"id\": \"2\", \"price\": \"40\", \"amount\": \"2\", \"category\": \"mindset\", \"image_src\": \"mindset.jpg\", \"product_name\": \"Mindset\"}]', 'wait'),
(5, 1, 'success', 'bill-one.jpg', 'Vientiane', 'Anousith', '2024-12-25 18:45:00', '2024-12-26 09:15:00', '[{\"id\": \"1\", \"price\": \"35\", \"amount\": \"3\", \"category\": \"history\", \"image_src\": \"smart money.jpg\", \"product_name\": \"Smart Money\"}]', 'success'),
(6, 2, 'success', 'bill-one.jpg', 'Nongpaya', 'Misai', '2025-01-10 11:30:00', '2025-01-10 13:00:00', '[{\"id\": \"1\", \"price\": \"42\", \"amount\": \"1\", \"category\": \"story\", \"image_src\": \"success faster.jpg\", \"product_name\": \"Success Faster\"}, {\"id\": \"2\", \"price\": \"48\", \"amount\": \"1\", \"category\": \"story\", \"image_src\": \"the rich within.jpg\", \"product_name\": \"The Rich Within\"}]', 'success'),
(7, 3, 'fail', NULL, 'nongpaya', 'misai', '2025-02-18 16:20:00', NULL, '[{\"id\": \"1\", \"price\": \"50\", \"amount\": \"2\", \"category\": \"mindset\", \"image_src\": \"think and grow rich.jpg\", \"product_name\": \"Think and Grow Rich\"}]', 'wait'),
(8, 4, 'success', 'bill-one.jpg', 'Chanthabouly', 'Anousith', '2025-04-02 08:10:00', '2025-04-02 11:50:00', '[{\"id\": \"1\", \"price\": \"60\", \"amount\": \"1\", \"category\": \"story\", \"image_src\": \"why take a change when you have a choice.jpg\", \"product_name\": \"Why Take a Change When You Have a Choice\"}]', 'success'),
(9, 1, 'rendering', 'bill-one.jpg', 'Vientiane', 'Misai', '2025-05-20 13:40:00', NULL, '[{\"id\": \"1\", \"price\": \"40\", \"amount\": \"1\", \"category\": \"mindset\", \"image_src\": \"mindset.jpg\", \"product_name\": \"Mindset\"}, {\"id\": \"2\", \"price\": \"35\", \"amount\": \"1\", \"category\": \"history\", \"image_src\": \"smart money.jpg\", \"product_name\": \"Smart Money\"}]', 'wait'),
(10, 2, 'success', 'bill-one.jpg', 'Nongpaya', 'Flash', '2025-07-14 19:25:00', '2025-07-15 08:00:00', '[{\"id\": \"1\", \"price\": \"55\", \"amount\": \"4\", \"category\": \"mindset\", \"image_src\": \"millionaire success habits.jpg\", \"product_name\": \"Millionaire Success Habits\"}]', 'success'),
(11, 3, 'success', 'bill-one.jpg', 'nongpaya', 'Anousith', '2025-09-09 10:00:00', '2025-09-09 12:30:00', '[{\"id\": \"1\", \"price\": \"50\", \"amount\": \"2\", \"category\": \"mindset\", \"image_src\": \"think and grow rich.jpg\", \"product_name\": \"Think and Grow Rich\"}]', 'success'),
(12, 4, 'fail', 'bill-one.jpg', 'Chanthabouly', 'misai', '2025-10-31 23:11:00', NULL, '[{\"id\": \"1\", \"price\": \"30\", \"amount\": \"1\", \"category\": \"how to\", \"image_src\": \"how to focus.jpg\", \"product_name\": \"How to Focus\"}]', 'fail'),
(13, 1, 'rendering', 'bill-one.jpg', 'Vientiane', 'J&T', '2025-12-01 15:45:00', NULL, '[{\"id\": \"1\", \"price\": \"60\", \"amount\": \"2\", \"category\": \"how to\", \"image_src\": \"how to launch a successful business.jpg\", \"product_name\": \"How to Launch a Successful Business\"}]', 'wait'),
(14, 2, 'success', 'bill-one.jpg', 'Nongpaya', 'Misai', '2026-01-15 09:15:00', '2026-01-15 14:20:00', '[{\"id\": \"1\", \"price\": \"42\", \"amount\": \"5\", \"category\": \"story\", \"image_src\": \"success faster.jpg\", \"product_name\": \"Success Faster\"}, {\"id\": \"2\", \"price\": \"48\", \"amount\": \"2\", \"category\": \"story\", \"image_src\": \"the rich within.jpg\", \"product_name\": \"The Rich Within\"}]', 'success'),
(15, 3, 'success', 'bill-one.jpg', 'nongpaya', 'Anousith', '2026-02-22 11:00:00', '2026-02-22 16:40:00', '[{\"id\": \"1\", \"price\": \"60\", \"amount\": \"10\", \"category\": \"story\", \"image_src\": \"why take a change when you have a choice.jpg\", \"product_name\": \"Why Take a Change When You Have a Choice\"}]', 'success'),
(16, 4, 'success', 'bill src', 'Chanthabouly', 'J&T', '2026-03-10 13:05:00', '2026-03-04 15:09:06', '[{\"id\": \"1\", \"price\": \"30\", \"amount\": \"1\", \"category\": \"mindset\", \"image_src\": \"rich dad poor dad.jpg\", \"product_name\": \"Rich Dad Poor Dad\"}]', 'success'),
(17, 1, 'rendering', 'bill-one.jpg', 'Vientiane', 'Flash', '2026-04-05 17:20:00', NULL, '[{\"id\": \"1\", \"price\": \"35\", \"amount\": \"3\", \"category\": \"history\", \"image_src\": \"smart money.jpg\", \"product_name\": \"Smart Money\"}]', 'wait'),
(18, 2, 'success', 'bill-one.jpg', 'Nongpaya', 'Anousith', '2026-04-19 08:30:00', '2026-04-19 10:15:00', '[{\"id\": \"1\", \"price\": \"50\", \"amount\": \"1\", \"category\": \"mindset\", \"image_src\": \"think and grow rich.jpg\", \"product_name\": \"Think and Grow Rich\"}]', 'success'),
(19, 3, 'success', 'bill-one.jpg', 'nongpaya', 'Misai', '2026-05-12 14:50:00', '2026-05-12 19:10:00', '[{\"id\": \"1\", \"price\": \"30\", \"amount\": \"2\", \"category\": \"how to\", \"image_src\": \"how to focus.jpg\", \"product_name\": \"How to Focus\"}, {\"id\": \"2\", \"price\": \"40\", \"amount\": \"2\", \"category\": \"mindset\", \"image_src\": \"mindset.jpg\", \"product_name\": \"Mindset\"}]', 'success'),
(20, 4, 'rendering', 'bill-one.jpg', 'Chanthabouly', 'Anousith', '2026-06-02 10:00:00', NULL, '[{\"id\": \"1\", \"price\": \"55\", \"amount\": \"1\", \"category\": \"mindset\", \"image_src\": \"millionaire success habits.jpg\", \"product_name\": \"Millionaire Success Habits\"}]', 'wait');

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
  `sold` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `import_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products_tb`
--

INSERT INTO `products_tb` (`id`, `product_name`, `price`, `category`, `count`, `image_src`, `sold`, `description`, `author`, `import_date`) VALUES
(1, 'How to Focus', 250.00, 'how to', 100, 'how to focus.jpg', 98, 'this book is the best about mindset', 'anaconda', '2026-05-07'),
(2, 'How to Launch a Successful Business', 350.00, 'Books', 0, 'how to launch a successful business.jpg', 87, 'this book give about how to success business', 'alex hormoze', '2026-05-01'),
(3, 'Millionaire Success Habits', 290.00, 'Books', 8, 'millionaire success habits.jpg', 45, 'this book about is Millionaire Success Habits', 'Nana adum', '2026-05-06'),
(4, 'Mindset', 320.00, 'Books', 12, 'mindset.jpg', 102, 'good mindset this book', 'vang', '2026-05-15'),
(5, 'Rich Dad Poor Dad', 390.00, 'Books', 15, 'rich dad poor dad.jpg', 0, '', '', NULL),
(6, 'Smart Money', 280.00, 'Books', 7, 'smart money.jpg', 0, '', '', NULL),
(7, 'Success Faster', 310.00, 'Books', 9, 'success faster.jpg', 0, '', '', NULL),
(8, 'The Rich Within', 340.00, 'Books', 6, 'the rich within.jpg', 0, '', '', NULL),
(9, 'Think and Grow Rich', 300.00, 'Books', 20, 'think and grow rich.jpg', 0, '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `promotion_tb`
--

CREATE TABLE `promotion_tb` (
  `pro_id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `discount` int NOT NULL,
  `date_order` date DEFAULT NULL,
  `update_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `promotion_tb`
--

INSERT INTO `promotion_tb` (`pro_id`, `title`, `discount`, `date_order`, `update_date`, `end_date`) VALUES
(1, 'Lao new year', 15, '2026-05-01', '2026-06-04 15:27:27', '2026-05-15'),
(2, 'Baby day', 30, '2026-06-01', '2026-06-04 15:28:10', '2026-06-15'),
(3, 'Hmong new year', 20, '2027-01-01', '2026-06-04 15:29:37', '2027-01-15');

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
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `idx_user_id` (`user_id`);

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
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products_tb`
--
ALTER TABLE `products_tb`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `promotion_tb`
--
ALTER TABLE `promotion_tb`
  MODIFY `pro_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
