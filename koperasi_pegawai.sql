-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 27, 2025 at 12:03 PM
-- Server version: 9.0.1
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `koperasi_pegawai`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id_customer` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id_customer`, `nama_customer`, `alamat`, `telp`, `fax`, `email`, `created_at`, `updated_at`) VALUES
('73260bbf-737c-421d-abf7-4c73cb5ed237', 'Customer 2', 'Address 2', '123456782', '876543212', 'customer2@example.com', '2025-07-27 04:38:18', '2025-07-27 04:38:18'),
('73c34bd4-e8a8-4a2f-8d60-8161d51db7a8', 'Customer 1', 'Address 1', '123456781', '876543211', 'customer1@example.com', '2025-07-27 04:38:18', '2025-07-27 04:38:18'),
('828691fa-e518-4078-b21d-6585ed00ceee', 'Customer 3', 'Address 3', '123456783', '876543213', 'customer3@example.com', '2025-07-27 04:38:18', '2025-07-27 04:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id_item` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_item` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` decimal(10,2) NOT NULL,
  `harga_jual` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(288, '2014_10_12_000000_create_users_table', 1),
(289, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(290, '2019_08_19_000000_create_failed_jobs_table', 1),
(291, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(292, '2025_07_27_015800_create_customers_table', 1),
(293, '2025_07_27_015858_create_items_table', 1),
(294, '2025_07_27_015918_create_transactions_table', 1),
(295, '2025_07_27_015931_create_officers_table', 1),
(296, '2025_07_27_024852_create_sales_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id_user` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id_user`, `nama_user`, `username`, `password`, `level`, `created_at`, `updated_at`) VALUES
('38ddaf84-0532-48fc-b362-8ca035633a70', 'Admin Officer', 'officer1', '$2y$12$tNx3sCarpZ7lOXKvl4rAFuWLlE4qSYHDWzYvgZG5tNx85IygmnXwS', 1, '2025-07-27 04:38:17', '2025-07-27 04:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id_sales` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_sales` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_customer` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `do_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('unpaid','pending','paid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id_sales`, `tgl_sales`, `id_customer`, `do_number`, `status`, `created_at`, `updated_at`) VALUES
('87de2509-c4d9-4f75-90ee-29d542fd62e2', '2025-07-27 04:38:18', NULL, NULL, 'unpaid', '2025-07-27 04:38:18', '2025-07-27 04:38:18'),
('d76fa49c-cd61-414f-b00e-0849af5bec58', '2025-07-27 04:38:17', NULL, NULL, 'unpaid', '2025-07-27 04:38:17', '2025-07-27 04:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id_transaction` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sales` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_item` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userable_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `userable_type`, `userable_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Officer', 'officer1', 'officer1@example.com', NULL, '$2y$12$7EylY59/qZ0KH2VqZGuOou71Vh2MDXQBv9ziMZT9gFhLdjQHSFQ/6', 'App\\Models\\Officer', '38ddaf84-0532-48fc-b362-8ca035633a70', NULL, '2025-07-27 04:38:17', '2025-07-27 04:38:17'),
(2, 'Sales 1', 'sales1', 'sales1@example.com', NULL, '$2y$12$2fCSkSskLddksB3VNueVd.r99CJ4KtL0EzXmo2v1Rn1n5hdPwSRm.', 'App\\Models\\Sales', 'd76fa49c-cd61-414f-b00e-0849af5bec58', NULL, '2025-07-27 04:38:18', '2025-07-27 04:38:18'),
(3, 'Sales 2', 'sales2', 'sales2@example.com', NULL, '$2y$12$Cfh8q6DsaI78mrmZqiIJJetwH3QhfE1DOVpZn1bII9wvmwjdczT8m', 'App\\Models\\Sales', '87de2509-c4d9-4f75-90ee-29d542fd62e2', NULL, '2025-07-27 04:38:18', '2025-07-27 04:38:18'),
(4, 'Customer 1', 'customer1', 'customer1@example.com', NULL, '$2y$12$OxWPf2MEIwwUyKamfwrj3uNbEazGsCqhHqCJUsbGHLy8yo4Oc3QWi', 'App\\Models\\Customer', '73c34bd4-e8a8-4a2f-8d60-8161d51db7a8', NULL, '2025-07-27 04:38:18', '2025-07-27 04:38:18'),
(5, 'Customer 2', 'customer2', 'customer2@example.com', NULL, '$2y$12$8oEsUtDOrbb159F0a.xste/LmzqbPxwdrWFK1Iwtod8UN5hpSS5iK', 'App\\Models\\Customer', '73260bbf-737c-421d-abf7-4c73cb5ed237', NULL, '2025-07-27 04:38:18', '2025-07-27 04:38:18'),
(6, 'Customer 3', 'customer3', 'customer3@example.com', NULL, '$2y$12$j4DTX21q8x9ZRHqaQViSLO8VEf8fH9MOomDo6ltWqGWHsnLay1NFK', 'App\\Models\\Customer', '828691fa-e518-4078-b21d-6585ed00ceee', NULL, '2025-07-27 04:38:19', '2025-07-27 04:38:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `officers_username_unique` (`username`);

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
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id_sales`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_userable_type_userable_id_index` (`userable_type`,`userable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
