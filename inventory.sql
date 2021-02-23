-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2021 at 04:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Curtain Fabrics', '2021-02-23 05:33:26', '2021-02-23 05:33:26'),
(2, 'Sofa Fabrics', '2021-02-23 06:04:05', '2021-02-23 06:04:05'),
(3, 'KUSHON', '2021-02-23 09:46:50', '2021-02-23 09:46:50'),
(4, 'Sweet Leeder', '2021-02-23 11:36:33', '2021-02-23 11:36:33'),
(5, 'Black Out', '2021-02-23 11:37:28', '2021-02-23 11:37:28'),
(6, 'Rexin Fabrics', '2021-02-23 11:38:17', '2021-02-23 11:38:17'),
(7, 'Seyars Fabrics', '2021-02-23 11:39:32', '2021-02-23 11:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(8, 'shuvo', '01300418575', 'shuvo@gmail.com', 'Dhaka', 1, '2021-01-25 04:18:43', '2021-01-25 04:18:43'),
(9, 'Shahidul Islam', '1232323331', 'royel@gmail.com', 'Village: South Charkumaria, Holding No-106', 1, '2021-02-18 07:01:28', '2021-02-18 07:01:28'),
(10, 'MD EBRAHIM', '01300418575', 'im.ibrahim420@gmail.com', 'Village: South Charkumaria, Holding No-106', 1, '2021-02-18 07:33:18', '2021-02-18 07:33:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `invoice_id` int(10) UNSIGNED NOT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `date`, `customer_id`, `invoice_id`, `particular`, `amount`, `account_type`, `section`, `created_at`, `updated_at`) VALUES
(6, '2021-01-26', 8, 17, 'Sale Products', '3000', 'Dr', 'sale', '2021-01-26 07:18:56', '2021-01-26 07:18:56'),
(7, '2021-01-26', 8, 17, 'Cash payment', '2000', 'Cr', 'paid', '2021-01-26 07:22:03', '2021-01-26 07:22:03'),
(8, '2021-02-16', 8, 17, 'Cash payment', '1000', 'Cr', 'paid', '2021-02-16 07:57:15', '2021-02-16 07:57:15'),
(9, '2021-02-18', 8, 18, 'Sale Products', '0', 'Dr', 'sale', '2021-02-18 06:49:41', '2021-02-18 06:49:41'),
(10, '2021-02-18', 8, 19, 'Sale Products', '0', 'Dr', 'sale', '2021-02-18 06:52:07', '2021-02-18 06:52:07'),
(11, '2021-02-18', 8, 20, 'Sale Products', '0', 'Dr', 'sale', '2021-02-18 06:52:22', '2021-02-18 06:52:22'),
(12, '2021-02-18', 8, 21, 'Sale Products', '0', 'Dr', 'sale', '2021-02-18 06:53:12', '2021-02-18 06:53:12'),
(13, '2021-02-18', 8, 22, 'Sale Products', '0', 'Dr', 'sale', '2021-02-18 06:53:53', '2021-02-18 06:53:53'),
(14, '2021-02-18', 9, 23, 'Sale Products', '3000', 'Dr', 'sale', '2021-02-18 07:04:10', '2021-02-18 07:04:10'),
(15, '2021-02-18', 9, 24, 'Sale Products', '0', 'Dr', 'sale', '2021-02-18 07:04:22', '2021-02-18 07:04:22'),
(16, '2021-02-18', 10, 25, 'Sale Products', '20000', 'Dr', 'sale', '2021-02-18 07:34:42', '2021-02-18 07:34:42'),
(17, '2021-02-18', 10, 25, 'Advanced Payment', '10000', 'Cr', 'paid', '2021-02-18 07:34:42', '2021-02-18 07:34:42'),
(18, '2021-02-18', 10, 25, 'Cash payment', '10000', 'Cr', 'paid', '2021-02-18 07:35:19', '2021-02-18 07:35:19'),
(19, '2021-02-23', 10, 26, 'Sale Products', '52010', 'Dr', 'sale', '2021-02-23 06:17:32', '2021-02-23 06:17:32'),
(20, '2021-02-23', 10, 26, 'Advanced Payment', '0', 'Cr', 'paid', '2021-02-23 06:17:32', '2021-02-23 06:17:32');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `leave_date` date DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `name`, `designation`, `nid`, `phone`, `email`, `join_date`, `leave_date`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, '2343', 'abc', 'Accounting Manager & Admin Officer', '9898989', '1232323331', 'reg.aca@baiust.edu.bd', '2020-12-30', '2020-12-30', 'hjh', 1, '2020-12-30 17:23:02', '2020-12-30 17:23:02'),
(2, '12345', 'Royel Ahmed', 'Director', '9898989', '01732648748', 'admin@admin.com', '2021-01-04', '2021-01-05', 'Shariatpur', 1, '2021-01-05 08:28:11', '2021-01-05 08:28:11');

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
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stockin_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `labour_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bag_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rental_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_cost` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2020_03_22_094651_create_wirehouses_table', 1),
(8, '2020_03_24_081345_create_product_buys_table', 1),
(9, '2020_03_27_111301_create_stock_ins_table', 1),
(10, '2020_03_28_060628_create_invoices_table', 1),
(11, '2020_04_03_161516_create_incomes_table', 1),
(12, '2020_04_03_161651_create_expenses_table', 1),
(13, '2020_04_12_095105_create_sale_invoices_table', 1),
(14, '2020_04_12_095237_create_invoice_details_table', 1),
(15, '2020_04_13_015117_create_suppliers_table', 1),
(16, '2020_04_22_040539_create_stock_outs_table', 1),
(17, '2020_04_22_043023_create_collections_table', 1),
(18, '2020_10_20_154608_create_permission_tables', 2),
(19, '2020_03_22_092848_create_customers_table', 3),
(20, '2020_03_22_093138_create_racks_table', 4),
(21, '2020_03_22_082641_create_products_table', 5),
(22, '2020_03_24_081345_create_purchases_table', 6),
(23, '2020_03_27_111301_create_sales_table', 7),
(24, '2020_11_22_233651_create_employees_table', 8),
(25, '2021_01_07_210804_create_stocks_table', 9),
(26, '2021_01_11_224910_create_purchase_details_table', 10),
(27, '2021_01_25_102129_create_supplier_details_table', 11),
(28, '2021_01_26_120812_create_customer_details_table', 12),
(29, '2021_02_22_230600_create_categories_table', 13),
(30, '2021_02_22_233422_add_category_id_to_products', 13),
(32, '2021_02_23_105110_add_total_qty_to_stocks', 14);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 2);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2020-10-21 07:19:41', '2020-10-21 07:19:41'),
(2, 'role-create', 'web', '2020-10-21 07:19:41', '2020-10-21 07:19:41'),
(3, 'role-edit', 'web', '2020-10-21 07:19:41', '2020-10-21 07:19:41'),
(4, 'role-delete', 'web', '2020-10-21 07:19:41', '2020-10-21 07:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `category_id`, `width`, `unit`, `origin`, `description`, `status`, `created_at`, `updated_at`) VALUES
(37, 'FVL-619-A', 'KUSHON', 3, NULL, 'meter', NULL, NULL, 1, '2021-02-23 11:13:26', '2021-02-23 11:13:26'),
(38, 'FVL-619-B', 'KUSHON', 3, NULL, 'meter', NULL, NULL, 1, '2021-02-23 11:13:26', '2021-02-23 11:13:26'),
(39, 'FVL-619-C', 'KUSHON', 3, NULL, 'meter', NULL, NULL, 1, '2021-02-23 11:13:26', '2021-02-23 11:13:26'),
(40, 'FVL-620-A', 'KUSHON', 3, NULL, 'meter', NULL, NULL, 1, '2021-02-23 11:13:26', '2021-02-23 11:13:26'),
(41, 'FVL-620-B', 'KUSHON', 3, NULL, 'meter', NULL, NULL, 1, '2021-02-23 11:13:26', '2021-02-23 11:13:26'),
(42, 'FVL-620-C', 'KUSHON', 3, NULL, 'meter', NULL, NULL, 1, '2021-02-23 11:13:26', '2021-02-23 11:13:26'),
(239, 'FVL-626-A', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(240, 'FVL-626-B', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(241, 'FVL-626-C', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(242, 'FVL-626-D', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(243, 'FVL-626-E', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(244, 'FVL-626-F', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(245, 'FVL-624-A', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(246, 'FVL-624-B', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(247, 'FVL-625-A', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(248, 'FVL-625-B', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(249, 'FVL-625-C', 'BLACK OUT', 5, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:03:08', '2021-02-23 13:03:08'),
(250, 'FV-NK-2-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(251, 'FV-NK-4-C', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(252, 'FVL-412-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(253, 'FVL-413-B-1', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(254, 'FVL-419-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(255, 'FVL-542-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(256, 'FVL-542-C', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(257, 'FVL-543-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(258, 'FVL-1005-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(259, 'FVL-486-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(260, 'FVL-486-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(261, 'FVL-486-C', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(262, 'FVL-486-D', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(263, 'FVL-420-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(264, 'FVL-487-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(265, 'FVL-487-D', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(266, 'FVL-489-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(267, 'FVL-554-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(268, 'FVL-554-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(269, 'FVL-554-C', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(270, 'FVL-554-D', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(271, 'FVL-554-E', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(272, 'FVL-554-F', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(273, 'FVL-555-A-3', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(274, 'FVL-555-A-10', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(275, 'FVL-555-A-22', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(276, 'FVL-H-1', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(277, 'FVL-198-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(278, 'FVL-413-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(279, 'FVL-413-D', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(280, 'FVL-418-D', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(281, 'FVL-420-D', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(282, 'FVL-464-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(283, 'FVL-466-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(284, 'FVL-466-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(285, 'FVL-524-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(286, 'FVL-525-C', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(287, 'FVL-1002-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(288, 'FVL-1002-C', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(289, 'FVL-1002-E', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(290, 'FVL-1012-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(291, 'FVL-1018-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(292, 'FVL-1020-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(293, 'FV-NK-1-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(294, 'FV-NK-3-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(295, 'FV-CT-3-B', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(296, 'FV-CT-3-D', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(297, 'FV-CT-4-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(298, 'FV-CT-3-C', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(299, 'FV-CT-12-C', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(300, 'SC-21-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(301, 'SC-22-A', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(302, 'L-01', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(303, 'L-02', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(304, 'L-03', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(305, 'L-04', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(306, 'L-05', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(307, 'L-06', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(308, 'L-07', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(309, 'L-08', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(310, 'L-09', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(311, 'L-10', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(312, 'L-11', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(313, 'L-12', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(314, 'L-13', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(315, 'L-14', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(316, 'L-15', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(317, 'L-16', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(318, 'L-17', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(319, 'L-18', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(320, 'L-19', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(321, 'L-20', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(322, 'L-21', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(323, 'L-22', 'CURTAIN FABRICS', 1, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:04:41', '2021-02-23 13:04:41'),
(324, 'FVL-553-A-1', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(325, 'FVL-553-A-3', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(326, 'FVL-553-A-4', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(327, 'FVL-553-A-5', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(328, 'FVL-553-A-6', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(329, 'FVL-553-A-8', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(330, 'FVL-553-A-9', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(331, 'FVL-553-A-10', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(332, 'FVL-553-A-11', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(333, 'FVL-553-A-12', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(334, 'FVL-553-A-14', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(335, 'FVL-553-A-15', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(336, 'FVL-553-A-16', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(337, 'FVL-553-A-17', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(338, 'FVL-553-A-18', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(339, 'FVL-553-A-19', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(340, 'FVL-553-A-20', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(341, 'FVL-553-A-21', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(342, 'FVL-556-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(343, 'FVL-556-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(344, 'FVL-556-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(345, 'FVL-556-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(346, 'FVL-556-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(347, 'FVL-556-F', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(348, 'FVL-557-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(349, 'FVL-557-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(350, 'FVL-557-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(351, 'FVL-557-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(352, 'FVL-557-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(353, 'FVL-406-A.1', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(354, 'FVL-477-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(355, 'FVL-475-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(356, 'FVL-475-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(357, 'FVL-402-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(358, 'FVL-596-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(359, 'FVL-518-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(360, 'FVL-518-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(361, 'FVL-518-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(362, 'FVL-519-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(363, 'FVL-519-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(364, 'FVL-520-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(365, 'N.N.F-101-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(366, 'N.N.F-101-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(367, 'FVL-550-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(368, 'FVL-550-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(369, 'FVL-515-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(370, 'FVL-515-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(371, 'FVL-1308-16-1', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(372, 'FVL-1308-16-2', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(373, 'FVL-1308-16-3', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(374, 'FVL-381-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(375, 'FVL-394-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(376, 'FVL-396-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(377, 'FVL-509-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(378, 'FVL-1-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(379, 'FVL-2-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(380, 'FVL-524-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(381, 'FVL-525-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(382, 'FVL-531-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(383, 'FVL-532-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(384, 'FVL-533-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(385, 'FVL-534-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(386, 'FVL-537-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(387, 'FVL-595-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(388, 'FVL-SF-1A-B7', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(389, 'FVL-12', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(390, 'F-49', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(391, 'FVL-102-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(392, 'FVL-122-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(393, 'FVL-179-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(394, 'FVL-181-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(395, 'FVL-183-G', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(396, 'FVL-184-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(397, 'FVL-184-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(398, 'FVL-186-1-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(399, 'FVL-186-1-B (old)', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(400, 'FVL-192-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(401, 'FVL-200-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(402, 'FVL-258-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(403, 'FVL-401-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(404, 'FVL-551-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(405, 'FVL-521-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(406, 'FVL-521-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(407, 'FVL-152-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(408, 'FVL-153-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(409, 'FVL-154-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(410, 'FVL-154-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(411, 'FVL-154-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(412, 'FVL-154-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(413, 'FVL-154-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(414, 'FVL-154-F', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(415, 'FVL-154-G', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(416, 'FVL-154-I', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(417, 'FVL-154-H', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(418, 'FVL-155-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(419, 'FVL-155-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(420, 'FVL-155-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(421, 'H-2', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(422, 'H-4', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(423, 'FVL-153-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(424, 'FVL-156-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(425, 'FVL-156-F', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(426, 'FVL-158-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(427, 'FVL-158-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(428, 'FVL-159-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(429, 'FVL-160-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(430, 'FVL-165-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(431, 'FVL-165-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(432, 'FVL-166-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(433, 'FVL-166-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(434, 'FVL-167-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(435, 'FVL-167-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(436, 'FVL-169-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(437, 'FVL-169-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(438, 'FVL-173-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(439, 'FVL-177-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(440, 'FVL-177-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(441, 'FVL-176-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(442, 'FVL-204-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(443, 'FVL-204-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(444, 'FVL-207-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(445, 'FVL-207-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(446, 'FVL-207-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(447, 'FVL-210-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(448, 'FVL-210-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(449, 'FVL-210-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(450, 'FVL-212-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(451, 'FVL-213-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(452, 'FVL-214-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(453, 'FVL-218-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(454, 'FVL-225-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(455, 'FVL-216-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(456, 'FVL-217-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(457, 'FVL-223-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(458, 'FVL-227-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(459, 'FVL-143-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(460, 'FVL-432-H', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(461, 'FVL-432-O', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(462, 'FVL-432-Q', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(463, 'FVL-432-V', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(464, 'FVL-433-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(465, 'FVL-433-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(466, 'FVL-433-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(467, 'FVL-433-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(468, 'FVL-612-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(469, 'FVL-612-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(470, 'FVL-614-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(471, 'FVL-614-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(472, 'FVL-618-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(473, 'FVL-618-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(474, 'FVL-618-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(475, 'FVL-618-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(476, 'FVL-618-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(477, 'FVL-621-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(478, 'FVL-621-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(479, 'FVL-621-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(480, 'FVL-621-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(481, 'FVL-621-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(482, 'FVL-621-F', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(483, 'FVL-621-G', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(484, 'FVL-621-H', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(485, 'FVL-621-I', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(486, 'FVL-621-J', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(487, 'FVL-621-K', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(488, 'FVL-623-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(489, 'FVL-623-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(490, 'FVL-623-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(491, 'FVL-623-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(492, 'FVL-623-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(493, 'FVL-623-F', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(494, 'FVL-623-G', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(495, 'FVL-623-H', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(496, 'FVL-623-I', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(497, 'FVL-623-J', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(498, 'FVL-623-K', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(499, 'FVL-623-L', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(500, 'FVL-623-M', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(501, 'FVL-623-N', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(502, 'FVL-623-O', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(503, 'FVL-623-P', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(504, 'FVL-623-Q', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(505, 'FVL-623-R', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(506, 'FVL-623-S', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(507, 'FVL-623-T', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(508, 'FVL-623-U', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(509, 'FVL-623-V', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(510, 'FVL-623-W', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(511, 'FVL-623-X', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(512, 'FVL-623-Y', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(513, 'FVL-623-Z', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(514, 'FVL-623-A1', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(515, 'C-11', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(516, 'A-1', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(517, 'FVL-21-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(518, 'FVL-21-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(519, 'A-22', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(520, 'M-16', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(521, 'M-17', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(522, 'FT-30', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(523, 'FVL-102-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(524, 'FVL-104-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(525, 'FVL-104-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(526, 'FVL-109-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(527, 'FVL-109-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(528, 'FVL-143-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(529, 'FVL-179-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(530, 'FVL-185-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(531, 'FVL-186-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(532, 'FVL-186-2-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(533, 'FVL-190-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(534, 'FVL-197-F', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(535, 'FVL-197-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(536, 'FVL-200-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(537, 'FVL-200-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(538, 'FVL-257-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(539, 'FVL-306-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(540, 'FVL-306-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(541, 'FVL-375-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(542, 'FVL-377-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(543, 'FVL-394-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(544, 'FVL-395-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(545, 'FVL-395-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(546, 'FVL-400-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(547, 'A-H-E-03', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(548, 'FV-KT-7-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(549, 'F.D.C-211', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(550, 'TC-7-6', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(551, 'C-5', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(552, 'C-7', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(553, 'C-8', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(554, 'C-9', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(555, 'C-10', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(556, 'FVL-138-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(557, 'FVL-152-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(558, 'FVL-152-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(559, 'FVL-152-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(560, 'FVL-152-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(561, 'FVL-152-F', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(562, 'FVL-153-F', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(563, 'FVL-153-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(564, 'FVL-155-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(565, 'FVL-157-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(566, 'FVL-159-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(567, 'FVL-162-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(568, 'FVL-163-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(569, 'FVL-168-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(570, 'FVL-170-K', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(571, 'FVL-173-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(572, 'FVL-174-H', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(573, 'FVL-175-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(574, 'FVL-186', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(575, 'FVL-203-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(576, 'FVL-204-E', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(577, 'FVL-205-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(578, 'FVL-205-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(579, 'FVL-206-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(580, 'FVL-206-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(581, 'FVL-209-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(582, 'FVL-211-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(583, 'FVL-213-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(584, 'FVL-217-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(585, 'FVL-226-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(586, 'FVL-259-B', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(587, 'FVL-259-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(588, 'FVL-259-D', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(589, 'M-01', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(590, 'H-32', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(591, 'S.P', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(592, 'S.P-87', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(593, 'FV-22-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(594, 'FVL-161-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(595, 'FVL-203-C', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(596, 'A-N-S-2', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(597, 'A-N-S-3', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(598, 'C-R-P-09', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(599, 'C-R-P-13', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(600, 'C-R-P-16', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(601, 'C-R-P-20', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(602, 'C-R-P-115-A', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(603, 'S.N-01', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(604, 'S.N-02', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(605, 'S.N-03', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(606, 'S.N-04', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(607, 'S.N-05', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(608, 'S.N-06', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(609, 'S.N-07', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(610, 'S.N-08', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(611, 'S.N-09', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(612, 'S.N-10', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(613, 'S.N-11', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(614, 'S.N-12', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(615, 'S.N-13', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(616, 'S.N-14', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(617, 'S.N-15', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(618, 'S.N-16', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(619, 'S.N-17', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(620, 'S.N-18', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(621, 'S.N-19', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(622, 'S.N-20', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(623, 'S.N-21', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(624, 'S.N-22', 'SOFA FABRICS', 2, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:06:55', '2021-02-23 13:06:55'),
(849, 'F-11', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(850, 'FVL-266-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(851, 'FVL-266-B', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(852, 'FVL-427-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(853, 'FVL-429-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(854, 'FVL-469-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(855, 'FVL-492-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(856, 'FVL-493-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(857, 'FVL-494-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(858, 'FVL-495-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(859, 'FVL-497-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(860, 'FVL-500-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(861, 'FVL-502-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(862, 'FVL-1034-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(863, 'FVL-1035-C', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(864, 'FVL-1051-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(865, 'FVL-1051-B', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(866, 'FVL-470-C', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(867, 'FVL-470-D', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(868, 'FVL-264-B', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(869, 'FVL-279-B', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(870, 'FVL-281-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(871, 'FVL-282-G', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(872, 'S.N-024', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(873, 'S.N-025', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(874, 'S.N-026', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(875, 'S.N-027', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(876, 'S.N-028', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(877, 'S.N-029', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(878, 'S.N-030', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(879, 'FVL-264-C', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(880, 'FVL-264-D', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(881, 'FVL-267-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(882, 'FVL-270-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(883, 'FVL-271-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(884, 'FVL-272-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(885, 'FVL-274-B', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(886, 'FVL-274-M', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(887, 'FVL-276-G', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(888, 'FVL-279-D', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(889, 'FVL-280-B', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(890, 'FVL-280-P', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(891, 'FVL-281-B', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(892, 'FVL-281-D', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(893, 'FVL-281-E', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(894, 'FVL-281-G', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(895, 'FVL-281-M', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(896, 'FVL-282-B', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50');
INSERT INTO `products` (`id`, `code`, `name`, `category_id`, `width`, `unit`, `origin`, `description`, `status`, `created_at`, `updated_at`) VALUES
(897, 'FVL-282-C', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(898, 'FVL-282-D', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(899, 'FVL-282-E', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(900, 'FVL-282-F', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(901, 'FVL-282-H', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(902, 'FVL-282-I', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(903, 'FVL-282-J', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(904, 'FVL-282-K', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(905, 'FVL-282-M', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(906, 'FVL-282-N', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(907, 'FVL-282-O', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(908, 'FVL-282-S', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(909, 'FVL-284-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(910, 'FVL-291-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(911, 'FVL-293-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(912, 'FVL-293-C', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(913, 'FVL-1024-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(914, 'FV-1044-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(915, 'FVL-1049-A', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(916, 'S.N-031', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(917, 'S.N-032', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(918, 'S.N-033', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(919, 'S.N-034', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(920, 'S.N-035', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(921, 'S.N-036', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(922, 'S.N-037', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(923, 'S.N-038', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(924, 'S.N-039', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(925, 'S.N-040', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(926, 'S.N-041', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(927, 'S.N-042', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(928, 'S.N-043', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(929, 'S.N-044', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(930, 'S.N-045', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(931, 'S.N-046', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(932, 'S.N-047', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(933, 'S.N-048', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(934, 'S.N-049', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(935, 'S.N-050', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(936, 'S.N-051', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(937, 'S.N-052', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(938, 'FVL-284-B', 'SEYARS FABRICS', 7, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:13:50', '2021-02-23 13:13:50'),
(961, 'FVL-503-A', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(962, 'FVL-503-B', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(963, 'FVL-503-C', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(964, 'FVL-503-D', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(965, '7-R-4', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(966, 'S-L-2', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(967, 'FVL-299-E', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(968, 'FVL-559-B', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(969, 'FVL-560-A', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(970, 'FVL-561-A', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(971, 'FVL-562-A', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(972, 'FVL-578-O', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(973, 'FVL-578-L', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(974, 'FVL-297-A', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(975, 'FVL-242-A', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(976, 'FVL-424-A', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(977, '7-R-2', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(978, '7-R-4-A', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(979, 'FVL-299-A', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(980, 'V-1', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(981, 'V-2', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(982, 'V-3', 'REXIN FABRICS', 6, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:16:20', '2021-02-23 13:16:20'),
(995, 'FVL-622-A', 'SWEET LEDAR', 4, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:22:12', '2021-02-23 13:22:12'),
(996, 'FVL-622-B', 'SWEET LEDAR', 4, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:22:12', '2021-02-23 13:22:12'),
(997, 'FVL-622-C', 'SWEET LEDAR', 4, NULL, 'meter', NULL, NULL, 1, '2021-02-23 13:22:12', '2021-02-23 13:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `previous_due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `date`, `supplier_id`, `total`, `paid`, `previous_due`, `due`, `note`, `status`, `created_at`, `updated_at`) VALUES
(25, '2021-02-23', 3, '73440', '3440', NULL, '70000', NULL, 0, '2021-02-23 14:51:35', '2021-02-23 15:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `purchase_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buy_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `date`, `purchase_id`, `supplier_id`, `product_id`, `purchase_qty`, `buy_price`, `sell_price`, `created_at`, `updated_at`) VALUES
(25, '2021-02-23', 25, 3, 853, '27.43', '450', NULL, NULL, NULL),
(26, '2021-02-23', 25, 3, 855, '135.77', '450', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `racks`
--

CREATE TABLE `racks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rack_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wirehouse_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racks`
--

INSERT INTO `racks` (`id`, `rack_no`, `wirehouse_id`, `created_at`, `updated_at`) VALUES
(1, 'rack -001', 1, '2020-10-31 13:24:32', '2020-10-31 13:24:32'),
(2, 'rack -002', 1, '2020-10-31 13:37:16', '2020-10-31 13:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-10-21 07:22:05', '2020-10-21 07:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `sale_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `wirehouse_id` int(10) UNSIGNED NOT NULL,
  `buyer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoices`
--

CREATE TABLE `sale_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `customer_id` int(11) UNSIGNED NOT NULL,
  `advance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `wirehouse_id` int(11) NOT NULL,
  `total_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wh_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avg_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(191) DEFAULT 0,
  `sale_qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `wirehouse_id`, `total_qty`, `wh_qty`, `sr_qty`, `avg_price`, `purchase_price`, `type`, `sale_qty`, `created_at`, `updated_at`) VALUES
(16, 961, 1, '148.60', '148.60', NULL, '52010', '350', 0, NULL, '2021-02-23 14:37:11', '2021-02-23 14:37:11'),
(17, 962, 1, '164.33', '164.33', NULL, '57515.5', '350', 0, NULL, '2021-02-23 14:38:08', '2021-02-23 14:38:08'),
(18, 963, 1, '47.60', '47.60', NULL, '16660', '350', 0, NULL, '2021-02-23 14:39:09', '2021-02-23 14:39:09'),
(19, 850, 1, '18.28', '18.28', NULL, '8226', '450', 0, NULL, '2021-02-23 14:41:01', '2021-02-23 14:41:01'),
(20, 851, 1, '146.20', '146.20', NULL, '65790', '450', 0, NULL, '2021-02-23 14:43:58', '2021-02-23 14:43:58'),
(21, 853, 1, '27.43', '27.43', NULL, NULL, '450', 0, NULL, '2021-02-23 14:51:35', '2021-02-23 14:51:35'),
(22, 855, 1, '135.77', '135.77', NULL, NULL, '450', 0, NULL, '2021-02-23 14:51:35', '2021-02-23 14:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `phone`, `address`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Kazi Trading', '01776020288', 'Elephant Road', 1, '2021-01-05 08:09:00', '2021-01-05 08:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_details`
--

CREATE TABLE `supplier_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `particular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_details`
--

INSERT INTO `supplier_details` (`id`, `date`, `supplier_id`, `purchase_id`, `particular`, `amount`, `account_type`, `section`, `created_at`, `updated_at`) VALUES
(12, '2021-02-23', 3, 25, 'Purchase Product', '73440', 'Dr', 'purchase', '2021-02-23 14:51:35', '2021-02-23 14:51:35'),
(13, '2021-02-23', 3, 25, 'Advance Payment', '3440', 'Cr', 'bill', '2021-02-23 15:44:59', '2021-02-23 15:44:59');

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
(1, 'Ebrahim', 'ebrahim@gmail.com', NULL, '$2y$10$8e7C6Eh.cZkURHhx8U1ADOgfl.tXjifURu8hOA93G04Dq/4nlW3s.', NULL, '2020-10-19 09:43:18', '2020-10-21 07:23:26'),
(2, 'Royel Ahamed', 'royel@gmail.com', NULL, '$2y$10$GQUXb7xXhLKUrKVRHayzuecmS9.5/DTuLS/1ouMA0pZY707mJAlky', NULL, '2020-10-21 07:22:05', '2020-10-21 07:22:05');

-- --------------------------------------------------------

--
-- Table structure for table `wirehouses`
--

CREATE TABLE `wirehouses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wirehouses`
--

INSERT INTO `wirehouses` (`id`, `name`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Default Wirehouse', 'tere', 1, NULL, '2020-10-31 13:57:49'),
(2, 'WireHouse 2', 'as', 1, '2020-10-31 13:48:50', '2020-10-31 13:48:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_name_unique` (`name`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_employee_id_unique` (`employee_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `racks`
--
ALTER TABLE `racks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `supplier_details`
--
ALTER TABLE `supplier_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wirehouses`
--
ALTER TABLE `wirehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=998;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `racks`
--
ALTER TABLE `racks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier_details`
--
ALTER TABLE `supplier_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wirehouses`
--
ALTER TABLE `wirehouses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
