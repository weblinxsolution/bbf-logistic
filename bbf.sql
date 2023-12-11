-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 07:56 PM
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
-- Database: `bbf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$Thi5X9fGeDHsNZJS7eaCn.0cA5Ul.K4DgPlV/vmJdfIz97RtKioB2', '2023-12-09 10:32:49', '2023-12-09 10:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `admin_activities`
--

CREATE TABLE `admin_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `admin_activity` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_activities`
--

INSERT INTO `admin_activities` (`id`, `username`, `admin_activity`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Login', '2023-12-09 10:32:57', '2023-12-09 10:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `booking_sizes`
--

CREATE TABLE `booking_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_sizes`
--

INSERT INTO `booking_sizes` (`id`, `booking_size`, `created_at`, `updated_at`) VALUES
(1, '20x30 Container Truck', '2023-12-09 06:48:03', '2023-12-09 06:48:03'),
(2, '600x20 Container Truck', '2023-12-09 06:48:11', '2023-12-09 06:48:11'),
(3, '100x30 Container Truck', '2023-12-09 06:48:22', '2023-12-09 06:48:22');

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE `checks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `booking_size` bigint(20) UNSIGNED NOT NULL,
  `created_order_date` varchar(255) NOT NULL,
  `check` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checks`
--

INSERT INTO `checks` (`id`, `order_id`, `booking_size`, `created_order_date`, `check`, `status`, `status_id`, `created_at`, `updated_at`) VALUES
(277, 11, 1, '2023-12-09 00:00:00', '1', '0', 1, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(278, 11, 1, '2023-12-09 00:00:00', '2', '0', 1, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(279, 11, 2, '2023-12-09 00:00:00', '1', '0', 1, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(280, 11, 2, '2023-12-09 00:00:00', '2', '0', 1, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(281, 11, 1, '2023-12-09 00:00:00', '1', '0', 2, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(282, 11, 1, '2023-12-09 00:00:00', '2', '0', 2, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(283, 11, 2, '2023-12-09 00:00:00', '1', '0', 2, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(284, 11, 2, '2023-12-09 00:00:00', '2', '0', 2, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(285, 11, 1, '2023-12-09 00:00:00', '1', '0', 3, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(286, 11, 1, '2023-12-09 00:00:00', '2', '0', 3, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(287, 11, 2, '2023-12-09 00:00:00', '1', '0', 3, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(288, 11, 2, '2023-12-09 00:00:00', '2', '0', 3, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(289, 11, 1, '2023-12-09 00:00:00', '1', '0', 4, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(290, 11, 1, '2023-12-09 00:00:00', '2', '0', 4, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(291, 11, 2, '2023-12-09 00:00:00', '1', '0', 4, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(292, 11, 2, '2023-12-09 00:00:00', '2', '0', 4, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(293, 12, 1, '2023-12-10 00:00:00', '1', '0', 1, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(294, 12, 1, '2023-12-10 00:00:00', '2', '0', 1, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(295, 12, 2, '2023-12-10 00:00:00', '1', '0', 1, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(296, 12, 2, '2023-12-10 00:00:00', '2', '0', 1, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(297, 12, 2, '2023-12-10 00:00:00', '3', '0', 1, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(298, 12, 2, '2023-12-10 00:00:00', '4', '0', 1, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(299, 12, 1, '2023-12-10 00:00:00', '1', '0', 2, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(300, 12, 1, '2023-12-10 00:00:00', '2', '0', 2, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(301, 12, 2, '2023-12-10 00:00:00', '1', '0', 2, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(302, 12, 2, '2023-12-10 00:00:00', '2', '0', 2, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(303, 12, 2, '2023-12-10 00:00:00', '3', '0', 2, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(304, 12, 2, '2023-12-10 00:00:00', '4', '0', 2, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(305, 12, 1, '2023-12-10 00:00:00', '1', '0', 3, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(306, 12, 1, '2023-12-10 00:00:00', '2', '0', 3, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(307, 12, 2, '2023-12-10 00:00:00', '1', '0', 3, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(308, 12, 2, '2023-12-10 00:00:00', '2', '0', 3, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(309, 12, 2, '2023-12-10 00:00:00', '3', '0', 3, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(310, 12, 2, '2023-12-10 00:00:00', '4', '0', 3, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(311, 12, 1, '2023-12-10 00:00:00', '1', '0', 4, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(312, 12, 1, '2023-12-10 00:00:00', '2', '0', 4, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(313, 12, 2, '2023-12-10 00:00:00', '1', '0', 4, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(314, 12, 2, '2023-12-10 00:00:00', '2', '0', 4, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(315, 12, 2, '2023-12-10 00:00:00', '3', '0', 4, '2023-12-09 13:26:57', '2023-12-09 13:26:57'),
(316, 12, 2, '2023-12-10 00:00:00', '4', '0', 4, '2023-12-09 13:26:57', '2023-12-09 13:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `containers`
--

CREATE TABLE `containers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `booking_size_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2023_11_30_134110_create_admins_table', 1),
(6, '2023_12_02_100438_create_shipping_types_table', 1),
(7, '2023_12_02_113838_create_order_statuses_table', 1),
(8, '2023_12_04_102547_create_booking_sizes_table', 1),
(9, '2023_12_04_111130_create_admin_activities_table', 1),
(10, '2023_12_04_115722_create_orders_table', 1),
(11, '2023_12_04_124406_create_containers_table', 1),
(12, '2023_12_05_122035_create_checks_table', 1),
(13, '2023_12_05_142522_create_order_histories_table', 1),
(14, '2023_12_07_143202_create_order_trackings_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pickup_date` varchar(255) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `shipper_name` varchar(255) NOT NULL,
  `consignee_name` varchar(255) NOT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `user_email_id` varchar(255) NOT NULL,
  `admin_remark` varchar(255) NOT NULL,
  `customer_remark` varchar(255) NOT NULL,
  `order_type_id` bigint(20) UNSIGNED NOT NULL,
  `status_type_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pickup_date`, `invoice_no`, `shipper_name`, `consignee_name`, `added_by`, `user_email_id`, `admin_remark`, `customer_remark`, `order_type_id`, `status_type_id`, `status`, `created_at`, `updated_at`) VALUES
(11, '2023-12-19 00:00:00', '3213213', 'Anas', 'Khan', NULL, '1', 'Good Hai', 'Greate Hai', 1, 1, '0', '2023-12-09 11:59:30', '2023-12-09 12:30:27'),
(12, '2023-12-30', '19816511658115', 'Hammad Hassan', 'Muhammad Yousuf', NULL, '1', 'asd', 'asd', 1, 1, '0', '2023-12-09 13:26:57', '2023-12-09 13:26:57');

-- --------------------------------------------------------

--
-- Table structure for table `order_histories`
--

CREATE TABLE `order_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `pickup_date` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `shipper_name` varchar(255) DEFAULT NULL,
  `consignee_name` varchar(255) DEFAULT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `user_email_id` varchar(255) DEFAULT NULL,
  `order_type_id` varchar(255) DEFAULT NULL,
  `status_type_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_histories`
--

INSERT INTO `order_histories` (`id`, `order_id`, `created_date`, `pickup_date`, `invoice_no`, `shipper_name`, `consignee_name`, `added_by`, `user_email_id`, `order_type_id`, `status_type_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, NULL, '2023-12-13', '34243', 'Hammad Hassan', 'Fahad', NULL, '1', '1', '4', '1', '2023-12-09 07:37:59', '2023-12-09 07:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_type_id` bigint(20) UNSIGNED NOT NULL,
  `status_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `main_type_id`, `status_type`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Created', '1702122405.png', 'first status', '2023-12-09 06:46:45', '2023-12-09 06:46:45'),
(2, 1, 'Port', '1702122424.png', 'storage', '2023-12-09 06:47:04', '2023-12-09 06:47:04'),
(3, 1, 'Clearance', '1702122447.png', 'storage', '2023-12-09 06:47:27', '2023-12-09 06:47:27'),
(4, 1, 'Final', '1702122463.png', 'final status', '2023-12-09 06:47:43', '2023-12-09 06:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_trackings`
--

CREATE TABLE `order_trackings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `document` varchar(255) DEFAULT NULL,
  `cargo_remark` varchar(255) DEFAULT NULL,
  `created_order_date` datetime NOT NULL,
  `order_status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_trackings`
--

INSERT INTO `order_trackings` (`id`, `order_id`, `document`, `cargo_remark`, `created_order_date`, `order_status_id`, `created_at`, `updated_at`) VALUES
(54, 11, NULL, NULL, '2023-12-10 00:00:00', 1, '2023-12-09 11:59:30', '2023-12-09 11:59:30'),
(55, 11, '1702141647.png', 'dsadsa', '2023-12-17 00:00:00', 2, '2023-12-09 12:07:27', '2023-12-09 12:07:27'),
(56, 11, '1702142174.png', 'czdsadsa', '2023-12-18 00:00:00', 1, '2023-12-09 12:16:14', '2023-12-09 12:16:14'),
(57, 11, '1702143027.png', 'dsadsad', '2023-12-19 00:00:00', 1, '2023-12-09 12:30:27', '2023-12-09 12:30:27'),
(58, 12, NULL, NULL, '2023-12-30 00:00:00', 1, '2023-12-09 13:26:57', '2023-12-09 13:26:57');

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
-- Table structure for table `shipping_types`
--

CREATE TABLE `shipping_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_type` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_types`
--

INSERT INTO `shipping_types` (`id`, `main_type`, `color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Import', '#06b19d', '1', '2023-12-09 06:46:25', '2023-12-09 06:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `number`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed', 'ahmed@gmail.com', '03131313455', '$2y$12$uDZ34NC928J4p1guDcsNqe8EEhUQMfyVm9wwW8btsEhdgKEr7oKVi', '2023-12-09 06:46:00', '2023-12-09 06:46:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_activities`
--
ALTER TABLE `admin_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_sizes`
--
ALTER TABLE `booking_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checks_booking_size_foreign` (`booking_size`),
  ADD KEY `checks_order_id_foreign` (`order_id`),
  ADD KEY `checks_status_id_foreign` (`status_id`);

--
-- Indexes for table `containers`
--
ALTER TABLE `containers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `containers_order_id_foreign` (`order_id`),
  ADD KEY `containers_booking_size_id_foreign` (`booking_size_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_order_type_id_foreign` (`order_type_id`),
  ADD KEY `orders_status_type_id_foreign` (`status_type_id`);

--
-- Indexes for table `order_histories`
--
ALTER TABLE `order_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_statuses_main_type_id_foreign` (`main_type_id`);

--
-- Indexes for table `order_trackings`
--
ALTER TABLE `order_trackings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_trackings_order_id_foreign` (`order_id`),
  ADD KEY `order_trackings_order_status_id_foreign` (`order_status_id`);

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
-- Indexes for table `shipping_types`
--
ALTER TABLE `shipping_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_number_unique` (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_activities`
--
ALTER TABLE `admin_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_sizes`
--
ALTER TABLE `booking_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `checks`
--
ALTER TABLE `checks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=317;

--
-- AUTO_INCREMENT for table `containers`
--
ALTER TABLE `containers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_histories`
--
ALTER TABLE `order_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_trackings`
--
ALTER TABLE `order_trackings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_types`
--
ALTER TABLE `shipping_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `checks_booking_size_foreign` FOREIGN KEY (`booking_size`) REFERENCES `booking_sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checks_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checks_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `order_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `containers`
--
ALTER TABLE `containers`
  ADD CONSTRAINT `containers_booking_size_id_foreign` FOREIGN KEY (`booking_size_id`) REFERENCES `booking_sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `containers_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_order_type_id_foreign` FOREIGN KEY (`order_type_id`) REFERENCES `shipping_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_status_type_id_foreign` FOREIGN KEY (`status_type_id`) REFERENCES `order_statuses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD CONSTRAINT `order_statuses_main_type_id_foreign` FOREIGN KEY (`main_type_id`) REFERENCES `shipping_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_trackings`
--
ALTER TABLE `order_trackings`
  ADD CONSTRAINT `order_trackings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_trackings_order_status_id_foreign` FOREIGN KEY (`order_status_id`) REFERENCES `order_statuses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
