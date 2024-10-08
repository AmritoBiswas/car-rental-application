-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2024 at 05:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentcar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `car_type` varchar(255) NOT NULL,
  `daily_rent_price` decimal(8,2) NOT NULL,
  `availability` tinyint(1) NOT NULL DEFAULT 1,
  `image_url` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `brand`, `model`, `year`, `car_type`, `daily_rent_price`, `availability`, `image_url`, `created_at`, `updated_at`) VALUES
(3, 'Mustang', 'Ford', 'Mustang', 2022, 'Coupe', 200.00, 0, '/uploads/car (3).jpg', '2024-09-28 05:22:33', '2024-09-28 08:56:48'),
(4, 'Corolla', 'Toyota', 'Corolla', 2021, 'Sedan', 90.00, 1, '/uploads/car (4).jpg', '2024-09-28 05:22:33', '2024-09-28 05:22:33'),
(5, 'Cherokee', 'Jeep', 'Grand Cherokee', 2020, 'SUV', 140.00, 1, '/uploads/car (5).jpg', '2024-09-28 05:22:33', '2024-09-28 05:22:33'),
(6, 'Camry', 'Toyota', 'Camry', 2022, 'Sedan', 120.00, 1, '/uploads/car (6).jpg', '2024-09-28 05:22:33', '2024-09-28 05:25:12'),
(7, 'Accord', 'Honda', 'Accord', 2021, 'Sedan', 110.00, 0, '/uploads/car (7).jpg', '2024-09-28 05:22:33', '2024-09-28 09:00:12'),
(8, 'Model 3', 'Tesla', '3', 2022, 'Sedan', 130.00, 0, '/uploads/car (8).jpg', '2024-09-28 05:22:33', '2024-09-28 09:04:33'),
(9, 'X5', 'BMW', 'X5', 2021, 'SUV', 160.00, 0, '/uploads/car (9).jpg', '2024-09-28 05:22:33', '2024-09-28 08:58:47'),
(10, 'A4', 'Audi', 'A4', 2020, 'Sedan', 140.00, 1, '/uploads/car (10).jpg', '2024-09-28 05:22:33', '2024-09-28 05:22:33'),
(11, 'Q5', 'Audi', 'Q5', 2021, 'SUV', 150.00, 1, '/uploads/car (11).jpg', '2024-09-28 05:22:33', '2024-09-28 05:22:33'),
(12, 'CX-5', 'Mazda', 'CX-5', 2022, 'SUV', 130.00, 1, '/uploads/car (12).jpg', '2024-09-28 05:22:33', '2024-09-28 05:22:33'),
(13, 'Impreza', 'Subaru', 'Impreza', 2021, 'Sedan', 110.00, 1, '/uploads/car (13).jpg', '2024-09-28 05:22:33', '2024-09-28 09:22:56'),
(14, 'Altima', 'Nissan', 'Altima', 2020, 'Sedan', 100.00, 0, '/uploads/car (14).jpg', '2024-09-28 05:22:33', '2024-09-28 09:01:50'),
(15, 'Model X', 'Tesla', 'X', 2022, 'SUV', 180.00, 1, '/uploads/car (15).jpg', '2024-09-28 05:22:33', '2024-09-28 05:22:33'),
(16, 'BMW', 'BMW 2024', '2024', 2024, 'Sports', 120.00, 1, 'uploads/1727501438-honda_civic_2019.jpg', '2024-09-27 23:30:38', '2024-09-27 23:30:38');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_09_19_153919_create_users_table', 1),
(3, '2024_09_19_155404_create_cars_table', 1),
(4, '2024_09_19_161419_create_rentals_table', 1);

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
-- Table structure for table `rentals`
--

CREATE TABLE `rentals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_cost` decimal(8,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rentals`
--

INSERT INTO `rentals` (`id`, `user_id`, `car_id`, `start_date`, `end_date`, `total_cost`, `status`, `created_at`, `updated_at`) VALUES
(9, 12, 13, '2024-09-28', '2024-09-30', 0.00, 'Completed', '2024-09-28 09:21:00', '2024-09-28 09:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_number`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '123456', 'admin', '2024-09-28 05:20:39', '2024-09-28 05:20:39'),
(12, 'Abdullah Islam', 'abcd@gmail.com', NULL, '123', 'customer', '2024-09-28 09:19:51', '2024-09-28 09:23:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rentals_user_id_foreign` (`user_id`),
  ADD KEY `rentals_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rentals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
