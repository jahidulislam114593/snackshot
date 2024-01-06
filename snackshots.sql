-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 06:45 PM
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
-- Database: `snackshots`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `name`, `email`, `phone`, `address`, `product_title`, `quantity`, `price`, `image`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(37, 'Jahidul islam', 'jahid@gmail.com', NULL, NULL, 'Nadim TShirt', '3', '4500', '1691682946.jpg', '4', '1', '2023-08-28 02:25:33', '2023-08-28 02:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `catagory_name`, `created_at`, `updated_at`) VALUES
(15, 'Men', '2023-08-28 06:57:41', '2023-08-28 06:57:41'),
(16, 'Women', '2023-08-28 06:57:50', '2023-08-28 06:57:50'),
(17, 'Kids', '2023-08-28 06:59:33', '2023-08-28 06:59:33'),
(18, 'Gadgets', '2023-08-28 07:42:25', '2023-08-28 07:42:25'),
(20, 'toy', '2023-08-29 00:12:36', '2023-08-29 00:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_09_040612_create_catagories_table', 1),
(6, '2023_08_10_054633_create_products_table', 2),
(7, '2023_08_25_062545_create_carts_table', 3),
(8, '2023_08_26_141720_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `delivery_status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(31, 'payel', 'payel@gmail.com', NULL, NULL, '4', 'Womens Premium Kurti - Reverie', '2', '2400', '1693228080.jpg', '28', 'Paid', 'Delivered', '2023-08-28 07:20:18', '2023-08-28 07:26:15'),
(32, 'payel', 'payel@gmail.com', NULL, NULL, '4', 'Women Premium Tee - Freda', '1', '585', '1693228033.jpg', '27', 'Paid', 'Delivered', '2023-08-28 07:20:18', '2023-08-28 07:26:22'),
(34, 'user', 'user@gmail.com', NULL, NULL, '5', 'Single Jersey Knitted Cotton Polo - Navy', '4', '4000', '1693227742.jpg', '24', 'Paid', 'Delivered', '2023-08-28 07:24:14', '2023-08-28 07:28:00'),
(35, 'payel', 'payel@gmail.com', NULL, NULL, '4', 'Womens Premium Kurti - Reverie', '3', '3600', '1693228080.jpg', '28', 'cash on delivery', 'processing', '2023-08-28 07:52:35', '2023-08-28 07:52:35'),
(36, 'payel', 'payel@gmail.com', NULL, NULL, '4', 'Single Jersey Knitted Cotton Polo - Navy', '1', '1000', '1693227742.jpg', '24', 'cash on delivery', 'processing', '2023-08-28 07:52:35', '2023-08-28 07:52:35'),
(37, 'payel', 'payel@gmail.com', NULL, NULL, '4', 'Fabrilife Mens Premium', '2', '1980', '1693227793.jpg', '25', 'Online Payment', 'Order Cancel', '2023-08-28 07:54:09', '2023-08-28 23:54:00'),
(38, 'saddam', 'saddam@gmail.com', NULL, NULL, '6', 'Single Jersey Knitted Cotton Polo - Navy', '2', '2000', '1693227742.jpg', '24', 'cash on delivery', 'Order Cancel', '2023-08-28 07:57:46', '2023-08-28 07:58:34'),
(39, 'saddam', 'saddam@gmail.com', NULL, NULL, '6', 'Kids Premium Cotton Shorts - Red', '2', '500', '1693228229.jpg', '30', 'Paid', 'Delivered', '2023-08-28 08:00:09', '2023-08-28 08:01:33'),
(40, 'tasnim', 'tasnim@gmail.com', NULL, NULL, '7', 'Fabrilife Mens Premium', '3', '2970', '1693227793.jpg', '25', 'cash on delivery', 'Order Cancel', '2023-08-28 08:26:46', '2023-08-28 08:27:47'),
(41, 'tasnim', 'tasnim@gmail.com', NULL, NULL, '7', 'Mens Premium Sports T-shirt - Aquatic', '2', '1000', '1693227855.jpg', '26', 'Paid', 'Delivered', '2023-08-28 08:28:26', '2023-08-28 08:39:34'),
(42, 'tasnim', 'tasnim@gmail.com', NULL, NULL, '7', 'Womens Premium Kurti - Reverie', '2', '2400', '1693228080.jpg', '28', 'Paid', 'Delivered', '2023-08-28 08:29:42', '2023-08-28 08:40:03'),
(43, 'payel', 'payel@gmail.com', NULL, NULL, '4', 'Womens Premium Kurti - Navya', '2', '2460', '1693228113.jpg', '29', 'cash on delivery', 'processing', '2023-08-28 23:54:35', '2023-08-28 23:54:35'),
(44, 'payel', 'payel@gmail.com', NULL, NULL, '4', 'Kids Premium Cotton Shorts - Red', '2', '500', '1693228229.jpg', '30', 'Paid', 'Delivered', '2023-08-28 23:55:57', '2023-08-28 23:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `catagory` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `catagory`, `quantity`, `price`, `discount_price`, `created_at`, `updated_at`) VALUES
(24, 'Single Jersey Knitted Cotton Polo - Navy', 'Premium Single Jersey Polo T-shirt', '1693227742.jpg', 'Men', '200', '1000', NULL, '2023-08-28 07:02:22', '2023-08-28 07:02:22'),
(25, 'Fabrilife Mens Premium', 'Fabrilife Mens Premium Quality t-shirt that offers a much smoother\\', '1693227793.jpg', 'Men', '200', '990', NULL, '2023-08-28 07:03:13', '2023-08-28 07:25:58'),
(26, 'Mens Premium Sports T-shirt - Aquatic', 'Fabrilife Men\'s Premium Quality Sports t-shirts are smooth and comfortable. The t-shirts are ma', '1693227855.jpg', 'Men', '200', '500', NULL, '2023-08-28 07:04:15', '2023-08-28 07:04:15'),
(27, 'Women Premium Tee - Freda', 'Fabrilife Women\'s Premium Quality t-shirt offers a much smoother, silky feel and more structured, mid-weight fit than regular t-shirts.', '1693228033.jpg', 'Women', '200', '585', NULL, '2023-08-28 07:07:13', '2023-08-28 07:07:13'),
(28, 'Womens Premium Kurti - Reverie', 'Refresh your wardrobe this season with our collection of must-have tops. Stay on top of your style game and look smart. Be most comfortable in summer with', '1693228080.jpg', 'Women', '200', '1200', NULL, '2023-08-28 07:08:00', '2023-08-28 07:08:00'),
(29, 'Womens Premium Kurti - Navya', 'Refresh your wardrobe this season with our collection of must-have tops. Stay on top of your style game and look smart. Be most comfor', '1693228113.jpg', 'Women', '200', '1230', NULL, '2023-08-28 07:08:33', '2023-08-28 07:08:33'),
(30, 'Kids Premium Cotton Shorts - Red', 'Regular fit, Mid-weight, 26 single, 5.16 oz/yd2 (175GSM)\r\nRingspun Combed Compact Cotton, 100% Organic', '1693228229.jpg', 'Kids', '100', '250', NULL, '2023-08-28 07:10:29', '2023-08-28 07:10:29'),
(31, 'Kids Premium Blank T-Shirt C', 'Fabrilife Kids Premium Quality t-shirts are made with fines quality Organic 100', '1693228278.jpg', 'Kids', '100', '1155', '885', '2023-08-28 07:11:18', '2023-08-28 07:27:43'),
(32, 'Kids Premium Blank T-Shirt Combo -', 'Fabrilife Kids Premium Quality t-shirts are made with fines quality Organi', '1693228314.jpg', 'Kids', '150', '1155', '885', '2023-08-28 07:11:54', '2023-08-28 07:27:26'),
(33, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693229460.jpg', 'Men', '15', '150', NULL, '2023-08-28 07:31:00', '2023-08-28 07:31:00'),
(34, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693229496.jpg', 'Women', '30', '560', NULL, '2023-08-28 07:31:36', '2023-08-28 07:31:36'),
(35, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693229543.jpg', 'Men', '25', '300', NULL, '2023-08-28 07:32:23', '2023-08-28 07:32:23'),
(36, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693229577.jpg', 'Women', '400', '1000', NULL, '2023-08-28 07:32:57', '2023-08-28 07:32:57'),
(37, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693229666.jpg', 'Women', '400', '500', NULL, '2023-08-28 07:34:26', '2023-08-28 07:34:26'),
(38, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693229699.jpg', 'Women', '100', '500', NULL, '2023-08-28 07:34:59', '2023-08-28 07:34:59'),
(39, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693229736.jpg', 'Women', '199', '200', NULL, '2023-08-28 07:35:36', '2023-08-28 07:35:36'),
(40, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693229781.jpg', 'Women', '466', '343', NULL, '2023-08-28 07:36:21', '2023-08-28 07:36:21'),
(41, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693229815.jpg', 'Women', '1221', '56', NULL, '2023-08-28 07:36:55', '2023-08-28 07:36:55'),
(42, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693229846.jpg', 'Women', '455', '1200', NULL, '2023-08-28 07:37:26', '2023-08-28 07:37:26'),
(43, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693230182.jpg', 'Gadgets', '10', '200', NULL, '2023-08-28 07:43:02', '2023-08-28 07:43:02'),
(44, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693230210.jpg', 'Gadgets', '100', '200', NULL, '2023-08-28 07:43:30', '2023-08-28 07:43:30'),
(45, 'Oupidatat non', 'Premium Single Jersey Polo T-shirt', '1693230241.jpg', 'Gadgets', '3', '1200', NULL, '2023-08-28 07:44:01', '2023-08-28 07:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jahidul islam', 'jahid@gmail.com', 'user', NULL, NULL, NULL, '$2y$10$218yjZ85ZJzRQiuhoCgp5ucj1LKQyWffqoFO.Ejx2HPz/CFApu9.W', NULL, '2023-08-09 23:21:04', '2023-08-09 23:21:04'),
(2, 'Admin', 'admin@gmail.com', 'admin', NULL, NULL, NULL, '$2y$10$ETHfIugzd9PLTVuBAdOeIe8pW8.ruRSubU9TuRt7f/x.asIOUvei.', NULL, '2023-08-09 23:21:44', '2023-08-09 23:21:44'),
(3, 'sakib', 'sakib@gmail.com', 'user', NULL, NULL, NULL, '$2y$10$6y2OLc4gyEY581EKo8JwPuoCj9Cn9ClUJ8xmlT3Oi/lP5XnMbj6KC', NULL, '2023-08-25 03:20:00', '2023-08-25 03:20:00'),
(4, 'payel', 'payel@gmail.com', 'user', NULL, NULL, NULL, '$2y$10$gMbx7CCfpABWt3iPUCZUQezLj9BKby1h480o3TVriaSpYbxYC5miW', NULL, '2023-08-27 08:17:56', '2023-08-27 08:17:56'),
(5, 'user', 'user@gmail.com', 'user', NULL, NULL, NULL, '$2y$10$8X5YqnxaQi5m4HOu72tqKu/gXvprPv92jsduA7DN5F2WDhtW4/QaG', NULL, '2023-08-28 07:23:50', '2023-08-28 07:23:50'),
(6, 'saddam', 'saddam@gmail.com', 'user', NULL, NULL, NULL, '$2y$10$01xPbs1bYmfkTQBzYftQvuH9Cf7yQjw4rNXxN9DkjX9F4QAsmF1YK', NULL, '2023-08-28 07:56:33', '2023-08-28 07:56:33'),
(7, 'tasnim', 'tasnim@gmail.com', 'user', NULL, NULL, NULL, '$2y$10$dVtkA0CG4u0cjqc74F5Jv.Q5xx9/slnMtWsYt5DC5QioFVFpANwvG', NULL, '2023-08-28 08:24:21', '2023-08-28 08:24:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD CONSTRAINT `failed_jobs_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD CONSTRAINT `personal_access_tokens_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
