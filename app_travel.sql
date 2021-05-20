-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 10:58 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `nama`, `email`, `password`, `no_tlp`, `alamat`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Satria', 'satria123@gmail.com', '$2y$10$fOXJIU/APISc94XRE6XCZOd.BYoI6l7QmYTPIUBpNyLQQI21yYLn2', '081234567891', 'taman Karang Baru', 1, NULL, '2021-03-16 04:57:45', '2021-03-16 04:57:45'),
(2, 'satria', 'satria1234@gmail.com', '$2y$10$pDbI1.sYvvBDf57599wrDu6ahRs07EMHyYof6loWyH0XrBa2YD8Cy', '081234567899', 'taman', 1, NULL, '2021-03-16 06:45:46', '2021-03-16 06:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `nama`, `lokasi`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'aruna', 'sengigi', 'ini adalah hotel', '1615907726aruna.jpg', '2021-03-16 07:15:26', '2021-03-16 07:15:26');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_items`
--

CREATE TABLE `hotel_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel_items`
--

INSERT INTO `hotel_items` (`id`, `jumlah`, `hotel_id`, `paket_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-03-16 07:16:44', '2021-03-16 07:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(111, '2014_10_12_000000_create_users_table', 1),
(112, '2014_10_12_100000_create_password_resets_table', 1),
(113, '2019_08_19_000000_create_failed_jobs_table', 1),
(114, '2020_06_14_102612_create_wisatas_table', 1),
(115, '2020_06_14_102913_create_pakets_table', 1),
(116, '2020_06_14_102950_create_hotels_table', 1),
(117, '2020_06_14_103036_create_restos_table', 1),
(118, '2020_06_17_135628_create_hotel_items_table', 1),
(119, '2020_06_17_151915_create_wisata_items_table', 1),
(120, '2020_06_17_152237_create_resto_items_table', 1),
(121, '2020_08_07_123116_create_customers_table', 1),
(122, '2020_08_12_123319_create_orders_table', 1),
(123, '2020_09_14_113707_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_notlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_datang` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `customer_nama`, `customer_email`, `customer_alamat`, `customer_notlp`, `tgl_datang`, `status`, `jumlah`, `total`, `paket_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'adVh-1615908015', 'satria', 'satria1234@gmail.com', 'taman', '081234567899', '2021-03-17', '3', 1, 1000, 1, '2', '2021-03-16 07:20:20', '2021-03-19 21:25:36'),
(2, 'DiS7-1615989844', 'satria', 'satria1234@gmail.com', 'taman', '081234567899', '2021-03-18', '3', 1, 1000, 1, '2', '2021-03-17 06:04:54', '2021-03-19 21:25:36'),
(3, 'Dvv5-1616247643', 'satria', 'satria1234@gmail.com', 'taman', '081234567899', '2021-03-21', '3', 1, 1000, 1, '2', '2021-03-20 05:40:49', '2021-03-20 05:47:44'),
(4, '7zJh-1616248397', 'satria', 'satria1234@gmail.com', 'taman', '081234567899', '2021-03-20', '3', 1, 1000, 1, '2', '2021-03-20 05:53:22', '2021-03-20 05:55:13'),
(5, '7TBh-1616248841', 'satria', 'satria1234@gmail.com', 'taman', '081234567899', '2021-03-20', '3', 1, 1000, 1, '2', '2021-03-20 06:00:48', '2021-03-20 06:01:57');

-- --------------------------------------------------------

--
-- Table structure for table `pakets`
--

CREATE TABLE `pakets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pakets`
--

INSERT INTO `pakets` (`id`, `code`, `nama`, `max`, `min`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, '1615907804-Ay9e', '2 hari 3 malam', 1, 1, 1000, '16159078042-hari-3-malam.jpg', '2021-03-16 07:16:44', '2021-03-16 07:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_order`, `order_id`, `token_order`, `payment_type`, `payment_code`, `pdf_url`, `transaction_time`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 'adVh-1615908015', '1', '3092f5b7-3f05-45bb-b404-4ce67370a20b', 'cstore', '991234567899', 'https://app.sandbox.midtrans.com/snap/v1/transactions/988b37ca-51d1-416b-98fd-e687c8cb6272/pdf', '2021-03-16 22:21:45', 1000, 'expire', '2021-03-16 07:21:49', '2021-03-19 19:18:57'),
(2, 'DiS7-1615989844', '2', 'cbd43d9b-a914-4b50-a9a1-71b8e1555b34', 'cstore', '3309173803098995', 'https://app.sandbox.midtrans.com/snap/v1/transactions/b726984e-aca0-4d16-9278-1a6cb4bf2548/pdf', '2021-03-17 21:06:24', 1000, 'expire', '2021-03-17 06:06:26', '2021-03-19 19:18:56'),
(3, 'Dvv5-1616247643', '3', 'af2a9595-aa62-4703-925c-72d352215b92', 'cstore', '3309315323457094', 'https://app.sandbox.midtrans.com/snap/v1/transactions/dc637fbd-c6e8-4664-8c3f-50bdaa38a421/pdf', '2021-03-20 20:43:35', 1000, 'cancel', '2021-03-20 05:43:36', '2021-03-20 05:46:57'),
(4, '7zJh-1616248397', '4', 'f73b0ed6-94ef-4d9b-96b3-87bf4b8416be', 'bank_transfer', '86273835227', 'https://app.sandbox.midtrans.com/snap/v1/transactions/09da425c-d5b6-4ccc-b529-b0f85f23615d/pdf', '2021-03-20 20:54:08', 1000, 'cancel', '2021-03-20 05:54:11', '2021-03-20 05:55:01'),
(5, '7TBh-1616248841', '5', '8a86c09c-888a-48a8-b09e-35fead454fc4', 'bank_transfer', '86273907169', 'https://app.sandbox.midtrans.com/snap/v1/transactions/e73ac0dc-725d-4913-ae7b-376a59c5cf57/pdf', '2021-03-20 21:01:19', 1000, 'cancel', '2021-03-20 06:01:23', '2021-03-20 06:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `restos`
--

CREATE TABLE `restos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restos`
--

INSERT INTO `restos` (`id`, `nama`, `lokasi`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'taliwang irama', 'taliwang', 'ini adalah makanan', '1615907754taliwang-irama.jpg', '2021-03-16 07:15:54', '2021-03-16 07:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `resto_items`
--

CREATE TABLE `resto_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `resto_id` bigint(20) UNSIGNED NOT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resto_items`
--

INSERT INTO `resto_items` (`id`, `jumlah`, `resto_id`, `paket_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-03-16 07:16:44', '2021-03-16 07:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Angga', 'angga123@gmail.com', NULL, '$2y$10$hZg0AHhlWzrhkXA5JJtIm.OD13qR82PBjHRl21OmTTcBSvr27G.Dy', NULL, '2021-03-16 04:57:45', '2021-03-16 04:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `wisatas`
--

CREATE TABLE `wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wisatas`
--

INSERT INTO `wisatas` (`id`, `nama`, `lokasi`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'benang kelambu', 'lombok timur', 'ini adalah lokasi wisata', '1615907703benang-kelambu.jpg', '2021-03-16 07:15:03', '2021-03-16 07:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `wisata_items`
--

CREATE TABLE `wisata_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `wisata_id` bigint(20) UNSIGNED NOT NULL,
  `paket_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wisata_items`
--

INSERT INTO `wisata_items` (`id`, `jumlah`, `wisata_id`, `paket_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-03-16 07:16:44', '2021-03-16 07:16:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_items`
--
ALTER TABLE `hotel_items`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `orders_invoice_unique` (`invoice`);

--
-- Indexes for table `pakets`
--
ALTER TABLE `pakets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restos`
--
ALTER TABLE `restos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resto_items`
--
ALTER TABLE `resto_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wisatas`
--
ALTER TABLE `wisatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata_items`
--
ALTER TABLE `wisata_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel_items`
--
ALTER TABLE `hotel_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pakets`
--
ALTER TABLE `pakets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `restos`
--
ALTER TABLE `restos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resto_items`
--
ALTER TABLE `resto_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wisatas`
--
ALTER TABLE `wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wisata_items`
--
ALTER TABLE `wisata_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
