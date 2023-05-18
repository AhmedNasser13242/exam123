-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2023 at 06:15 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` int(11) NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `level_id`, `brand_name`, `brand_slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'rgergerg', 'rgergerg', 'upload/brand/1765716473449351.jpg', NULL, '2023-05-12 16:07:30'),
(2, 1, 'ثبلاث', 'ثبلاث', 'upload/brand/1765716490015783.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'الابتدائية', 'الابتدائية', 'upload/category/1765399505270591.jpg', NULL, '2023-05-11 08:41:09'),
(2, 'الاعدادية', 'الاعدادية', 'upload/category/1765405584583017.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `csqs`
--

CREATE TABLE `csqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `csq_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `csq_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `csq_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `csqs`
--

INSERT INTO `csqs` (`id`, `level_id`, `brand_id`, `category_id`, `subcategory_id`, `csq_title`, `csq_slug`, `csq_thambnail`, `vendor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 2, 'يمكنك تفريغ _____ من الرصاص', 'يمكنك-تفريغ-_____-من-الرصاص', 'upload/csqs/thambnail/1765750791029438.jpg', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_checkbox_tbls`
--

CREATE TABLE `form_checkbox_tbls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_program` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `level_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `subcategory_id`, `level_name`, `level_slug`, `level_image`, `created_at`, `updated_at`) VALUES
(1, 2, 'ققفقف', 'ققفقف', 'upload/level/1765716447393781.jpg', NULL, '2023-05-12 16:07:06'),
(2, 2, 'ثلاثقلا', 'ثلاثقلا', 'upload/level/1765716532252370.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mcqs`
--

CREATE TABLE `mcqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `mcq_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mcq_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sec_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thr_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `forth_answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mcq_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mcqs`
--

INSERT INTO `mcqs` (`id`, `level_id`, `brand_id`, `category_id`, `subcategory_id`, `mcq_title`, `mcq_slug`, `first_answer`, `sec_answer`, `thr_answer`, `forth_answer`, `mcq_thambnail`, `vendor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 2, 'يتكون الرصاص من ؟', 'يتكون-الرصاص-من-؟', 'القطن', 'الحبر', 'البارود', 'النار', 'upload/mcqs/thambnail/1765716585275420.jpg', NULL, 1, NULL, NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_22_232449_create_brands_table', 1),
(6, '2023_04_24_002713_create_categories_table', 1),
(7, '2023_04_25_041230_create_sub_categories_table', 1),
(8, '2023_04_27_000945_create_levels_table', 1),
(9, '2023_04_27_233217_create_products_table', 1),
(10, '2023_04_27_233341_create_multi_imgs_table', 1),
(11, '2023_04_28_163742_create_form_checkbox_tbls_table', 1),
(12, '2023_05_02_113249_create_banners_table', 1),
(13, '2023_05_02_124824_create_mcqs_table', 1),
(14, '2023_05_03_103945_create_csqs_table', 1),
(15, '2023_05_07_102848_create_tests_table', 1),
(16, '2023_05_09_104717_create_projects_table', 1),
(17, '2023_05_12_094740_create_rows_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(12, 18, 'upload/tests/multi-image/1765405244704362.jpeg', '2023-05-09 05:40:40', NULL),
(14, 22, 'upload/tests/multi-image/1765405460049537.jpeg', '2023-05-09 05:44:05', NULL),
(15, 24, 'upload/tests/multi-image/1765405503294169.jpeg', '2023-05-09 05:44:46', NULL),
(16, 26, 'upload/tests/multi-image/1765406819923763.jpeg', '2023-05-09 06:05:42', NULL),
(17, 29, 'upload/tests/multi-image/1765407191369322.jpeg', '2023-05-09 06:11:36', NULL),
(18, 30, 'upload/tests/multi-image/1765407243940736.jpeg', '2023-05-09 06:12:26', NULL),
(19, 32, 'upload/tests/multi-image/1765407884951508.jpeg', '2023-05-09 06:22:38', NULL),
(20, 34, 'upload/tests/multi-image/1765411353342177.jpeg', '2023-05-09 07:17:45', NULL),
(21, 1, 'upload/tests/multi-image/1765419273819605.jpeg', '2023-05-09 09:23:39', NULL),
(22, 3, 'upload/tests/multi-image/1765420396861456.jpeg', '2023-05-09 09:41:30', NULL),
(23, 5, 'upload/tests/multi-image/1765590705065151.png', '2023-05-11 06:48:29', NULL),
(24, 6, 'upload/tests/multi-image/1765596971061325.jpg', '2023-05-11 08:28:04', NULL),
(25, 1, 'upload/mcqs/multi-image/1765716585429016.jpg', NULL, NULL);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_descp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_descp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `project_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `level_id`, `brand_id`, `category_id`, `subcategory_id`, `project_slug`, `vendor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'اختبار اللغة العربية للصف الاول الثانوي', 0, 0, 0, 0, 'اختبار-اللغة-العربية-للصف-الاول-الثانوي', NULL, 0, NULL, NULL),
(2, 'sdvsdv', 0, 0, 0, 0, 'sdvsdv', NULL, 0, NULL, NULL),
(3, 'اختبار اللغة العربية للصف الاول الثانوي', 0, 0, 0, 0, 'اختبار-اللغة-العربية-للصف-الاول-الثانوي', '2', 0, NULL, NULL),
(4, 'اختبار اللغة العربية للصف الاول الثانوي 2', 0, 0, 0, 0, 'اختبار-اللغة-العربية-للصف-الاول-الثانوي-2', '2', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rows`
--

CREATE TABLE `rows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `level_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `row_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `row_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `row_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subcategory_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `subcategory_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'ققف', 'ققف', '', NULL, NULL),
(2, 2, 'الصف الثالث الاعدادي', 'الصف-الثالث-الاعدادي', 'upload/subcategory/1765715644773047.jpg', NULL, NULL),
(3, 2, 'بيلابيلابيلا', 'بيلابيلابيلا', 'upload/subcategory/1765715736104493.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `name_program` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `q1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '.',
  `q2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '.',
  `q3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '.',
  `q4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '.',
  `q5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '.',
  `q6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '.',
  `test_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `project_id`, `name_program`, `q1`, `q2`, `q3`, `q4`, `q5`, `q6`, `test_slug`, `product_thambnail`, `vendor_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'يتكون الرصاص من ؟', 'القطن', 'الحبر', 'البارود', 'النار', 'النار', 'upload/csqs/thambnail/1765750791029438.jpg', '', NULL, '2', 1, '2023-05-13 01:13:16', NULL),
(2, 3, 'يتكون الرصاص من ؟', 'القطن', 'الحبر', 'البارود', 'النار', 'النار', 'upload/mcqs/thambnail/1765716585275420.jpg', '', NULL, '2', 1, '2023-05-13 01:13:38', NULL),
(3, 3, 'يتكون الرصاص من ؟', 'القطن', 'الحبر', 'البارود', 'النار', 'النار', 'upload/mcqs/thambnail/1765716585275420.jpg', '', NULL, '2', 1, '2023-05-13 01:14:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `role` enum('admin','vendor','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `phone`, `address`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Nasser', NULL, 'mfgtwo1616@gmail.com', NULL, '$2y$10$bSh5bnlQvUNxX0xq5tDCneVXJYnucrTbC.N2gFqpam1PsTN5soOBu', NULL, NULL, NULL, 'admin', 'active', NULL, '2023-05-09 04:07:31', '2023-05-09 04:07:31'),
(2, 'Ahmed Nasser', NULL, 'ahmed17nasser17@gmail.com', NULL, '$2y$10$4K/T5bV5gdQYR1uO71fD3er0dO8dNaR6zsT1MhsyNnv2PGxKrNaQ6', NULL, NULL, NULL, 'vendor', 'active', NULL, '2023-05-09 04:08:12', '2023-05-09 04:08:12'),
(3, 'Mrs. Nichole Trantow', NULL, 'trunolfsson@example.net', '2023-05-09 11:58:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ff77?text=libero', '628.314.6052', '935 Jakubowski Greens Apt. 797\nGradyport, UT 59537', 'vendor', 'active', 'MDM9VeWnun', '2023-05-09 11:58:17', '2023-05-09 11:58:17'),
(4, 'Ena Smith', NULL, 'karen.sawayn@example.org', '2023-05-09 11:58:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0000cc?text=dignissimos', '1-754-965-9334', '4865 Konopelski Inlet\nLake Norenefurt, OK 19004-2792', 'user', 'inactive', '7O1sWvofKn', '2023-05-09 11:58:17', '2023-05-09 11:58:17'),
(5, 'Ms. Brittany Hansen', NULL, 'america85@example.com', '2023-05-09 11:58:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/002222?text=distinctio', '754.675.0894', '570 Cullen Stream\nJonathonshire, ND 49351-8302', 'vendor', 'inactive', 'CNSyGAtjwg', '2023-05-09 11:58:17', '2023-05-09 11:58:17'),
(6, 'Mr. Brent Blick II', NULL, 'qlakin@example.net', '2023-05-09 11:58:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00ccdd?text=voluptas', '+1 (857) 827-7197', '1867 Sage Rapid Suite 556\nVestafurt, NJ 82950-5505', 'user', 'inactive', 'Fc0ya9MAxz', '2023-05-09 11:58:17', '2023-05-09 11:58:17'),
(7, 'Tanya Abshire', NULL, 'ehayes@example.net', '2023-05-09 11:58:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/006633?text=cumque', '(815) 437-3705', '3632 Kertzmann Trace Suite 223\nLittleville, VA 33067-1687', 'vendor', 'active', 'g3AA867I1H', '2023-05-09 11:58:17', '2023-05-09 11:58:17'),
(8, 'Alia Hartmann', NULL, 'jennie.brakus@example.org', '2023-05-09 11:58:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0011cc?text=qui', '(252) 696-5289', '145 German Highway Apt. 708\nHartmanntown, IL 95873', 'user', 'active', 'QSXDCnXjAP', '2023-05-09 11:58:17', '2023-05-09 11:58:17'),
(9, 'Dr. Dena Jenkins Jr.', NULL, 'uokon@example.com', '2023-05-09 11:58:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00cc99?text=dicta', '+1-707-498-8808', '49219 Welch Isle Suite 432\nPort Zeldamouth, AR 98293', 'admin', 'inactive', 'uNI6z6TWYM', '2023-05-09 11:58:17', '2023-05-09 11:58:17'),
(10, 'Dr. Aurelie Hagenes', NULL, 'wunsch.dino@example.com', '2023-05-09 11:58:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/0022ff?text=atque', '540.843.5206', '7055 Isac Summit Suite 071\nEast Reesestad, NJ 27813', 'vendor', 'active', 'ay2hvFuBlJ', '2023-05-09 11:58:17', '2023-05-09 11:58:17'),
(11, 'Edward Lehner', NULL, 'breitenberg.mariana@example.net', '2023-05-09 11:58:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/008822?text=unde', '781-462-4743', '967 Pfeffer Burgs\nNew Alaina, GA 82054', 'vendor', 'active', 'EQj9Kj34gS', '2023-05-09 11:58:17', '2023-05-09 11:58:17'),
(12, 'Easter McClure', NULL, 'nikolas68@example.com', '2023-05-09 11:58:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'https://via.placeholder.com/60x60.png/00aaff?text=earum', '+1 (341) 708-9877', '905 Marcella Camp Apt. 218\nGusikowskiberg, MI 66434', 'vendor', 'active', '6F7sptDG7C', '2023-05-09 11:58:17', '2023-05-09 11:58:17'),
(13, 'Ahmed Nasser', NULL, 'ahmed13nasser13@gmail.com', NULL, '$2y$10$FyWKZfnTiVPHgNlVIkSI.uNDRXYR//0uRnQFvkSEqHcetKDvVxw8O', NULL, NULL, NULL, 'vendor', 'active', NULL, '2023-05-12 15:28:38', '2023-05-12 15:28:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `csqs`
--
ALTER TABLE `csqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `form_checkbox_tbls`
--
ALTER TABLE `form_checkbox_tbls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mcqs`
--
ALTER TABLE `mcqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rows`
--
ALTER TABLE `rows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `csqs`
--
ALTER TABLE `csqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_checkbox_tbls`
--
ALTER TABLE `form_checkbox_tbls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mcqs`
--
ALTER TABLE `mcqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rows`
--
ALTER TABLE `rows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
