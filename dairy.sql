-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 07:50 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` int(10) UNSIGNED NOT NULL,
  `cardnum` bigint(16) UNSIGNED NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `amount`, `cardnum`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(3, 1000, 39620798, 1000, 1, '2019-02-16 13:11:00', '2019-02-16 13:44:10'),
(4, 1000, 92838630, 0, 1, '2019-02-16 13:11:00', '2019-02-16 13:50:58'),
(5, 1000, 90974601, 500, 1, '2019-02-16 13:11:00', '2019-02-16 13:55:08'),
(6, 500, 17612995, 500, 1, '2019-02-16 13:12:37', '2019-02-16 13:12:37'),
(7, 500, 72644709, 500, 1, '2019-02-16 13:12:37', '2019-02-16 13:12:37');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `exchange_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double UNSIGNED NOT NULL,
  `trxid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `type` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'onetime',
  `end_date` date DEFAULT NULL,
  `payment` tinyint(1) NOT NULL DEFAULT '0',
  `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `amount`, `status`, `type`, `end_date`, `payment`, `products`, `name`, `mobile`, `address`, `message`, `created_at`, `updated_at`) VALUES
(2, 1, 500, 1, 'onetime', NULL, 1, '{\"1\":{\"id\":1,\"name\":\"Nestle Milk\",\"price\":100,\"old_price\":0,\"status\":1,\"stock\":10,\"unit\":\"Litre\",\"image\":\"2019_02_16_03_03_13_Nestle-1.png\",\"description\":\"Very good for health\",\"created_at\":\"2019-02-16 03:03:13\",\"updated_at\":\"2019-02-16 03:03:13\",\"quantity\":\"5\"}}', 'Ashraful Alam', '01624877119', 'Kumarkhali, Kustia', NULL, '2019-02-16 13:55:08', '2019-02-16 14:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `ssid` int(10) UNSIGNED NOT NULL,
  `rsid` int(10) UNSIGNED NOT NULL,
  `samount` double UNSIGNED NOT NULL,
  `ramount` double UNSIGNED NOT NULL,
  `raccount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `old_price` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `stock` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `unit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unit',
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `old_price`, `status`, `stock`, `unit`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Nestle Milk', 100, 0, 1, 10, 'Litre', '2019_02_16_03_03_13_Nestle-1.png', 'Very good for health', '2019-02-15 21:03:13', '2019-02-15 21:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `rating` tinyint(3) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 'Very good', 1, '2018-07-31 18:00:00', '2018-08-30 20:14:39'),
(2, 1, 1, 5, 'Very good', 1, '2018-08-14 18:00:00', '0000-00-00 00:00:00'),
(3, 1, 1, 5, 'Very good', 1, '2018-08-20 18:00:00', '0000-00-00 00:00:00'),
(4, 1, 1, 5, 'Very good', 1, '2018-08-25 18:00:00', '0000-00-00 00:00:00'),
(5, 1, 1, 4, 'Very good', 1, '2018-08-27 18:00:00', '2018-08-29 18:00:00'),
(6, 1, 1, 3, 'Very good service. Easy and fastest service.', 1, '2018-08-28 18:00:00', '2018-08-29 18:00:00'),
(7, 1, 1, 4, 'DADADA', 0, '2019-02-16 06:40:54', '2019-02-16 06:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `name` varchar(255) CHARACTER SET ascii NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '2',
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `status`, `type`, `address`, `mobile`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'arafatkn@gmail.com', '$2y$10$I4aUc5uEVNrkMjOgeTgM9.KHp04WnmwG431GI9s.wsjXxZMBTv07q', 'Ashraful Alam', 1, 1, 'Kumarkhali, Kustia', '01624877119', '5UvB0lcRYzSdVO5aOmpBV6SBtOcIGaDXeGoPKDuYsLzMGSabpdH60VOG683K', '2018-08-08 11:50:11', '2018-10-04 18:13:18'),
(2, 'md.ashraf.asha@gmail.com', '$2y$10$P/a7FNktUT3nFPdAPjtH9eeFTIFRrdKrDRyeznyfj6y05Cbb8yrK2', 'Ashraful Alam', 2, 0, 'monsurabad', '01706145147', NULL, '2019-02-17 03:35:27', '2019-02-17 03:35:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `email` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
