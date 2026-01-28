-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2026 at 10:13 PM
-- Server version: 8.0.45
-- PHP Version: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kareem_investor`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` bigint UNSIGNED NOT NULL,
  `attachable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachable_id` bigint UNSIGNED DEFAULT NULL,
  `original_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('inverstor-web-cache-14574456694e9438379ae768c9d3df80', 'i:1;', 1768749180),
('inverstor-web-cache-14574456694e9438379ae768c9d3df80:timer', 'i:1768749180;', 1768749180),
('inverstor-web-cache-livewire-rate-limiter:a7dbe7f6ecae46a91f04d78208d2e1288af5cb61', 'i:1;', 1766832857),
('inverstor-web-cache-livewire-rate-limiter:a7dbe7f6ecae46a91f04d78208d2e1288af5cb61:timer', 'i:1766832857;', 1766832857),
('inverstor-web-cache-livewire-rate-limiter:ce913b3ff206fff458d8d324c30c2545cb0db954', 'i:1;', 1766775120),
('inverstor-web-cache-livewire-rate-limiter:ce913b3ff206fff458d8d324c30c2545cb0db954:timer', 'i:1766775120;', 1766775120),
('laravel-cache-4a90a4a899c9d675962bc01c7c843310', 'i:2;', 1765666143),
('laravel-cache-4a90a4a899c9d675962bc01c7c843310:timer', 'i:1765666143;', 1765666143),
('laravel-cache-a6cf3449fbccdc26d9aeadb6f26b8c25', 'i:1;', 1766607855),
('laravel-cache-a6cf3449fbccdc26d9aeadb6f26b8c25:timer', 'i:1766607855;', 1766607855),
('laravel-cache-asdsad@asdsad.com|127.0.0.1', 'i:1;', 1765666143),
('laravel-cache-asdsad@asdsad.com|127.0.0.1:timer', 'i:1765666143;', 1765666143),
('laravel-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6', 'i:1;', 1766774351),
('laravel-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer', 'i:1766774351;', 1766774351);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cost_profit_ranges`
--

CREATE TABLE `cost_profit_ranges` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('one-time','annual','money_contribution') COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_value` bigint DEFAULT NULL,
  `max_value` bigint DEFAULT NULL,
  `label_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cost_profit_ranges`
--

INSERT INTO `cost_profit_ranges` (`id`, `type`, `min_value`, `max_value`, `label_en`, `label_ar`) VALUES
(1, 'one-time', 1000, 5000, '$1,000 to $5,000<br>(3,700 to 18,500 SAR)', 'من 1,000 إلى 5,000 دولار<br>(من 3,700 إلى 18,500 ريال)'),
(2, 'one-time', 6000, 10000, '$6,000 to $10,000<br>(22,200 to 37,000 SAR)', 'من 6,000 إلى 10,000 دولار<br>(من 22,200 إلى 37,000 ريال)'),
(3, 'one-time', 51000, 100000, '$51,000 to $100,000<br>(188,800 to 370,000 SAR)', 'من 51,000 إلى 100,000 دولار<br>(من 188,800 إلى 370,000 ريال)'),
(4, 'one-time', 101000, 250000, '$101,000 to $250,000<br>(374,000 to 925,750 SAR)', 'من 101,000 إلى 250,000 دولار<br>(من 374,000 إلى 925,750 ريال)'),
(5, 'one-time', 1000000, 2000000, '$1 million to $2 million<br>(3.7m to 7.4m SAR)', 'من 1,000,000 إلى 2,000,000 دولار<br>(من 3.7 مليون إلى 7.4 مليون ريال)'),
(6, 'one-time', 2000000, 5000000, '$2 million to $5 million<br>(7.4m to 18.5m SAR)', 'من 2,000,000 إلى 5,000,000 دولار<br>(من 7.4 مليون إلى 18.5 مليون ريال)'),
(7, 'one-time', 50000000, 100000000, '$50 million to $100 million<br>(185m to 370m SAR)', 'من 50,000,000 إلى 100,000,000 دولار<br>(من 185 مليون إلى 370 مليون ريال)'),
(8, 'annual', 11000, 20000, '$11,000 to $20,000<br>(40,700 to 74,000 SAR)', 'من 11,000 إلى 20,000 دولار<br>(من 40,700 إلى 74,000 ريال)'),
(9, 'annual', 21000, 50000, '$21,000 to $50,000<br>(77,700 to 185,000 SAR)', 'من 21,000 إلى 50,000 دولار<br>(من 77,700 إلى 185,000 ريال)'),
(10, 'annual', 251000, 500000, '$251,000 to $500,000<br>(929,450 to 1,851,500 SAR)', 'من 251,000 إلى 500,000 دولار<br>(من 929,450 إلى 1,851,500 ريال)'),
(11, 'annual', 501000, 1000000, '$501,000 to $1,000,000<br>(1,855,000 to 3,700,000 SAR)', 'من 501,000 إلى 1,000,000 دولار<br>(من 1,855,000 إلى 3,700,000 ريال)'),
(12, 'annual', 5000000, 10000000, '$5 million to $10 million<br>(18.5m to 37m SAR)', 'من 5,000,000 إلى 10,000,000 دولار<br>(من 18.5 مليون إلى 37 مليون ريال)'),
(13, 'annual', 10000000, 50000000, '$10 million to $50 million<br>(37m to 185m SAR)', 'من 10,000,000 إلى 50,000,000 دولار<br>(من 37 مليون إلى 185 مليون ريال)'),
(14, 'annual', 100000001, NULL, 'More than $100 million<br>(More than 370m SAR)', 'أكثر من 100,000,000 دولار<br>(أكثر من 370 مليون ريال)'),
(15, 'money_contribution', 1000, 5000, '$1,000 to $5,000<br>(3,700 to 18,500 SAR)', 'من 1,000 إلى 5,000 دولار<br>(من 3,700 إلى 18,500 ريال)'),
(16, 'money_contribution', 6000, 10000, '$6,000 to $10,000<br>(22,200 to 37,000 SAR)', 'من 6,000 إلى 10,000 دولار<br>(من 22,200 إلى 37,000 ريال)'),
(17, 'money_contribution', 51000, 100000, '$51,000 to $100,000<br>(188,800 to 370,000 SAR)', 'من 51,000 إلى 100,000 دولار<br>(من 188,800 إلى 370,000 ريال)'),
(18, 'money_contribution', 101000, 250000, '$101,000 to $250,000<br>(374,000 to 925,750 SAR)', 'من 101,000 إلى 250,000 دولار<br>(من 374,000 إلى 925,750 ريال)'),
(19, 'money_contribution', 1000000, 2000000, '$1 million to $2 million<br>(3.7m to 7.4m SAR)', 'من 1,000,000 إلى 2,000,000 دولار<br>(من 3.7 مليون إلى 7.4 مليون ريال)'),
(20, 'money_contribution', 2000000, 5000000, '$2 million to $5 million<br>(7.4m to 18.5m SAR)', 'من 2,000,000 إلى 5,000,000 دولار<br>(من 7.4 مليون إلى 18.5 مليون ريال)'),
(21, 'money_contribution', 50000000, 100000000, '$50 million to $100 million<br>(185m to 370m SAR)', 'من 50,000,000 إلى 100,000,000 دولار<br>(من 185 مليون إلى 370 مليون ريال)'),
(22, 'money_contribution', 11000, 20000, '$11,000 to $20,000<br>(40,700 to 74,000 SAR)', 'من 11,000 إلى 20,000 دولار<br>(من 40,700 إلى 74,000 ريال)'),
(23, 'money_contribution', 21000, 50000, '$21,000 to $50,000<br>(77,700 to 185,000 SAR)', 'من 21,000 إلى 50,000 دولار<br>(من 77,700 إلى 185,000 ريال)'),
(24, 'money_contribution', 251000, 500000, '$251,000 to $500,000<br>(929,450 to 1,851,500 SAR)', 'من 251,000 إلى 500,000 دولار<br>(من 929,450 إلى 1,851,500 ريال)'),
(25, 'money_contribution', 501000, 1000000, '$501,000 to $1,000,000<br>(1,855,000 to 3,700,000 SAR)', 'من 501,000 إلى 1,000,000 دولار<br>(من 1,855,000 إلى 3,700,000 ريال)'),
(26, 'money_contribution', 5000000, 10000000, '$5 million to $10 million<br>(18.5m to 37m SAR)', 'من 5,000,000 إلى 10,000,000 دولار<br>(من 18.5 مليون إلى 37 مليون ريال)'),
(27, 'money_contribution', 10000000, 50000000, '$10 million to $50 million<br>(37m to 185m SAR)', 'من 10,000,000 إلى 50,000,000 دولار<br>(من 37 مليون إلى 185 مليون ريال)'),
(28, 'money_contribution', 100000001, NULL, 'More than $100 million<br>(More than 370m SAR)', 'أكثر من 100,000,000 دولار<br>(أكثر من 370 مليون ريال)');

-- --------------------------------------------------------

--
-- Table structure for table `countryables`
--

CREATE TABLE `countryables` (
  `id` bigint UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `countryable_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countryables`
--

INSERT INTO `countryables` (`id`, `country`, `countryable_type`, `countryable_id`, `created_at`, `updated_at`) VALUES
(1, 'AE', 'App\\Models\\Investor', 1, '2025-11-27 09:07:23', '2025-11-27 09:07:23'),
(2, 'LB', 'App\\Models\\Idea', 1, '2025-11-27 21:42:40', '2025-11-27 21:42:40'),
(3, 'TN', 'App\\Models\\Idea', 1, '2025-11-27 21:42:40', '2025-11-27 21:42:40'),
(4, 'DZ', 'App\\Models\\Idea', 1, '2025-11-27 21:42:40', '2025-11-27 21:42:40'),
(5, 'LB', 'App\\Models\\Idea', 2, '2025-11-27 21:49:04', '2025-11-27 21:49:04'),
(6, 'TN', 'App\\Models\\Idea', 2, '2025-11-27 21:49:04', '2025-11-27 21:49:04'),
(7, 'DZ', 'App\\Models\\Idea', 2, '2025-11-27 21:49:04', '2025-11-27 21:49:04'),
(8, 'LB', 'App\\Models\\Investor', 2, '2025-11-27 21:57:33', '2025-11-27 21:57:33'),
(9, 'TN', 'App\\Models\\Investor', 2, '2025-11-27 21:57:33', '2025-11-27 21:57:33'),
(10, 'DZ', 'App\\Models\\Investor', 2, '2025-11-27 21:57:33', '2025-11-27 21:57:33'),
(11, 'LB', 'App\\Models\\Investor', 3, '2025-11-27 22:02:37', '2025-11-27 22:02:37'),
(12, 'TN', 'App\\Models\\Investor', 3, '2025-11-27 22:02:37', '2025-11-27 22:02:37'),
(13, 'OM', 'App\\Models\\Investor', 3, '2025-11-27 22:02:37', '2025-11-27 22:02:37'),
(14, 'LB', 'App\\Models\\Idea', 3, '2025-11-27 22:03:02', '2025-11-27 22:03:02'),
(15, 'TN', 'App\\Models\\Idea', 3, '2025-11-27 22:03:02', '2025-11-27 22:03:02'),
(16, 'OM', 'App\\Models\\Idea', 3, '2025-11-27 22:03:02', '2025-11-27 22:03:02'),
(17, 'LB', 'App\\Models\\Idea', 4, '2025-11-27 22:05:28', '2025-11-27 22:05:28'),
(18, 'TN', 'App\\Models\\Idea', 4, '2025-11-27 22:05:28', '2025-11-27 22:05:28'),
(19, 'OM', 'App\\Models\\Idea', 4, '2025-11-27 22:05:28', '2025-11-27 22:05:28'),
(20, 'LB', 'App\\Models\\Investor', 4, '2025-11-27 22:08:02', '2025-11-27 22:08:02'),
(21, 'TN', 'App\\Models\\Investor', 4, '2025-11-27 22:08:02', '2025-11-27 22:08:02'),
(22, 'QA', 'App\\Models\\Investor', 4, '2025-11-27 22:08:02', '2025-11-27 22:08:02'),
(23, 'LB', 'App\\Models\\Investor', 5, '2025-11-27 22:12:00', '2025-11-27 22:12:00'),
(24, 'TN', 'App\\Models\\Investor', 5, '2025-11-27 22:12:00', '2025-11-27 22:12:00'),
(25, 'DZ', 'App\\Models\\Investor', 5, '2025-11-27 22:12:00', '2025-11-27 22:12:00'),
(26, 'LB', 'App\\Models\\Idea', 5, '2025-11-27 22:12:53', '2025-11-27 22:12:53'),
(27, 'TN', 'App\\Models\\Idea', 5, '2025-11-27 22:12:53', '2025-11-27 22:12:53'),
(28, 'DZ', 'App\\Models\\Idea', 5, '2025-11-27 22:12:53', '2025-11-27 22:12:53'),
(29, 'LB', 'App\\Models\\Investor', 6, '2025-11-27 22:14:01', '2025-11-27 22:14:01'),
(30, 'TN', 'App\\Models\\Investor', 6, '2025-11-27 22:14:01', '2025-11-27 22:14:01'),
(31, 'DZ', 'App\\Models\\Investor', 6, '2025-11-27 22:14:01', '2025-11-27 22:14:01'),
(32, 'LB', 'App\\Models\\Idea', 6, '2025-11-27 22:14:36', '2025-11-27 22:14:36'),
(33, 'TN', 'App\\Models\\Idea', 6, '2025-11-27 22:14:36', '2025-11-27 22:14:36'),
(34, 'DZ', 'App\\Models\\Idea', 6, '2025-11-27 22:14:36', '2025-11-27 22:14:36'),
(35, 'LB', 'App\\Models\\Investor', 7, '2025-11-27 22:16:05', '2025-11-27 22:16:05'),
(36, 'TN', 'App\\Models\\Investor', 7, '2025-11-27 22:16:05', '2025-11-27 22:16:05'),
(37, 'DZ', 'App\\Models\\Investor', 7, '2025-11-27 22:16:05', '2025-11-27 22:16:05'),
(38, 'TN', 'App\\Models\\Investor', 8, '2025-11-27 22:18:13', '2025-11-27 22:18:13'),
(39, 'LB', 'App\\Models\\Investor', 8, '2025-11-27 22:18:13', '2025-11-27 22:18:13'),
(40, 'DZ', 'App\\Models\\Investor', 8, '2025-11-27 22:18:13', '2025-11-27 22:18:13'),
(41, 'GULF', 'App\\Models\\Investor', 9, '2025-11-27 22:19:12', '2025-11-27 22:19:12'),
(42, 'AE', 'App\\Models\\Investor', 9, '2025-11-27 22:19:12', '2025-11-27 22:19:12'),
(43, 'KW', 'App\\Models\\Investor', 9, '2025-11-27 22:19:12', '2025-11-27 22:19:12'),
(44, 'LY', 'App\\Models\\Investor', 10, '2025-11-27 22:34:38', '2025-11-27 22:34:38'),
(45, 'GULF', 'App\\Models\\Investor', 10, '2025-11-27 22:34:38', '2025-11-27 22:34:38'),
(46, 'IR', 'App\\Models\\Investor', 10, '2025-11-27 22:34:38', '2025-11-27 22:34:38'),
(47, 'LB', 'App\\Models\\Investor', 11, '2025-11-27 22:36:15', '2025-11-27 22:36:15'),
(48, 'SA', 'App\\Models\\Investor', 11, '2025-11-27 22:58:14', '2025-11-27 22:58:14'),
(49, 'LY', 'App\\Models\\Investor', 11, '2025-11-27 22:58:14', '2025-11-27 22:58:14'),
(50, 'AE', 'App\\Models\\Investor', 12, '2025-11-29 20:43:31', '2025-11-29 20:43:31'),
(51, 'LB', 'App\\Models\\Investor', 13, '2025-11-29 20:53:14', '2025-11-29 20:53:14'),
(52, 'SD', 'App\\Models\\Investor', 14, '2025-11-29 20:54:55', '2025-11-29 20:54:55'),
(53, 'LY', 'App\\Models\\Idea', 7, '2025-11-29 20:59:41', '2025-11-29 20:59:41'),
(54, 'LB', 'App\\Models\\Idea', 8, '2025-11-29 21:01:29', '2025-11-29 21:01:29'),
(55, 'LB', 'App\\Models\\Investor', 15, '2025-11-29 21:03:59', '2025-11-29 21:03:59'),
(56, 'LB', 'App\\Models\\Investor', 16, '2025-11-29 21:05:42', '2025-11-29 21:05:42'),
(57, 'TN', 'App\\Models\\Investor', 16, '2025-11-29 21:05:42', '2025-11-29 21:05:42'),
(58, 'DZ', 'App\\Models\\Investor', 16, '2025-11-29 21:05:42', '2025-11-29 21:05:42'),
(59, 'LB', 'App\\Models\\Investor', 17, '2025-11-29 21:08:57', '2025-11-29 21:08:57'),
(60, 'TN', 'App\\Models\\Investor', 17, '2025-11-29 21:08:57', '2025-11-29 21:08:57'),
(61, 'DZ', 'App\\Models\\Investor', 17, '2025-11-29 21:08:57', '2025-11-29 21:08:57'),
(62, 'LB', 'App\\Models\\Idea', 9, '2025-11-29 21:14:41', '2025-11-29 21:14:41'),
(63, 'LB', 'App\\Models\\Investor', 18, '2025-11-29 21:23:36', '2025-11-29 21:23:36'),
(64, 'TN', 'App\\Models\\Investor', 18, '2025-11-29 21:23:36', '2025-11-29 21:23:36'),
(65, 'DZ', 'App\\Models\\Investor', 18, '2025-11-29 21:23:36', '2025-11-29 21:23:36'),
(66, 'LB', 'App\\Models\\Idea', 10, '2025-11-29 21:24:15', '2025-11-29 21:24:15'),
(67, 'LB', 'App\\Models\\Idea', 11, '2025-11-29 21:49:27', '2025-11-29 21:49:27'),
(68, 'LB', 'App\\Models\\Idea', 12, '2025-11-29 21:50:16', '2025-11-29 21:50:16'),
(69, 'LB', 'App\\Models\\Idea', 13, '2025-11-29 21:53:16', '2025-11-29 21:53:16'),
(70, 'LB', 'App\\Models\\Idea', 14, '2025-11-29 21:54:12', '2025-11-29 21:54:12'),
(71, 'LB', 'App\\Models\\Investor', 19, '2025-11-29 21:55:19', '2025-11-29 21:55:19'),
(72, 'LB', 'App\\Models\\Investor', 20, '2025-11-29 21:58:16', '2025-11-29 21:58:16'),
(73, 'SA', 'App\\Models\\Investor', 21, '2025-12-01 18:18:13', '2025-12-01 18:18:13'),
(74, 'LY', 'App\\Models\\Investor', 21, '2025-12-01 18:18:13', '2025-12-01 18:18:13'),
(75, 'QA', 'App\\Models\\Idea', 15, '2025-12-01 18:41:24', '2025-12-01 18:41:24'),
(76, 'LB', 'App\\Models\\Investor', 22, '2025-12-01 18:43:39', '2025-12-01 18:43:39'),
(77, 'NAF', 'App\\Models\\Investor', 22, '2025-12-01 18:43:43', '2025-12-01 18:43:43'),
(78, 'TR', 'App\\Models\\Idea', 16, '2025-12-01 18:45:10', '2025-12-01 18:45:10'),
(79, 'NAF', 'App\\Models\\Idea', 16, '2025-12-01 18:45:10', '2025-12-01 18:45:10'),
(80, 'AM_AU', 'App\\Models\\Investor', 23, '2025-12-01 18:46:15', '2025-12-01 18:46:15'),
(81, 'CSA', 'App\\Models\\Investor', 23, '2025-12-01 18:46:15', '2025-12-01 18:46:15'),
(82, 'EU', 'App\\Models\\Investor', 23, '2025-12-01 18:46:15', '2025-12-01 18:46:15'),
(83, 'BH', 'App\\Models\\Idea', 17, '2025-12-01 18:46:52', '2025-12-01 18:46:52'),
(84, 'EU', 'App\\Models\\Idea', 17, '2025-12-01 18:46:52', '2025-12-01 18:46:52'),
(85, 'CSA', 'App\\Models\\Idea', 17, '2025-12-01 18:46:52', '2025-12-01 18:46:52'),
(86, 'LB', 'App\\Models\\Investor', 24, '2025-12-01 18:47:58', '2025-12-01 18:47:58'),
(87, 'TN', 'App\\Models\\Investor', 24, '2025-12-01 18:47:58', '2025-12-01 18:47:58'),
(88, 'DZ', 'App\\Models\\Investor', 24, '2025-12-01 18:47:58', '2025-12-01 18:47:58'),
(89, 'IR', 'App\\Models\\Idea', 18, '2025-12-01 19:05:54', '2025-12-01 19:05:54'),
(90, 'SA', 'App\\Models\\Investor', 25, '2025-12-01 20:30:22', '2025-12-01 20:30:22'),
(91, 'CSA', 'App\\Models\\Investor', 25, '2025-12-01 20:30:22', '2025-12-01 20:30:22'),
(92, 'QA', 'App\\Models\\Investor', 27, '2025-12-05 14:08:50', '2025-12-05 14:08:50'),
(93, 'SD', 'App\\Models\\Idea', 19, '2025-12-05 16:11:18', '2025-12-05 16:11:18'),
(95, 'SD', 'App\\Models\\Investor', 28, '2025-12-05 16:15:22', '2025-12-05 16:15:22'),
(96, 'LB', 'App\\Models\\Investor', 29, '2025-12-05 16:27:56', '2025-12-05 16:27:56'),
(97, 'TN', 'App\\Models\\Investor', 29, '2025-12-05 16:27:56', '2025-12-05 16:27:56'),
(98, 'DZ', 'App\\Models\\Investor', 29, '2025-12-05 16:27:56', '2025-12-05 16:27:56'),
(99, 'LB', 'App\\Models\\Investor', 30, '2025-12-05 16:28:46', '2025-12-05 16:28:46'),
(100, 'TN', 'App\\Models\\Investor', 30, '2025-12-05 16:28:46', '2025-12-05 16:28:46'),
(101, 'DZ', 'App\\Models\\Investor', 30, '2025-12-05 16:28:46', '2025-12-05 16:28:46'),
(102, 'LB', 'App\\Models\\Idea', 20, '2025-12-05 16:29:19', '2025-12-05 16:29:19'),
(103, 'TN', 'App\\Models\\Idea', 20, '2025-12-05 16:29:19', '2025-12-05 16:29:19'),
(104, 'QA', 'App\\Models\\Idea', 20, '2025-12-05 16:29:19', '2025-12-05 16:29:19'),
(105, 'LB', 'App\\Models\\Investor', 31, '2025-12-05 16:29:35', '2025-12-05 16:29:35'),
(106, 'TN', 'App\\Models\\Investor', 31, '2025-12-05 16:29:35', '2025-12-05 16:29:35'),
(107, 'QA', 'App\\Models\\Investor', 31, '2025-12-05 16:29:35', '2025-12-05 16:29:35'),
(108, 'LB', 'App\\Models\\Idea', 21, '2025-12-05 16:31:01', '2025-12-05 16:31:01'),
(109, 'TN', 'App\\Models\\Idea', 21, '2025-12-05 16:31:01', '2025-12-05 16:31:01'),
(110, 'LY', 'App\\Models\\Idea', 21, '2025-12-05 16:31:01', '2025-12-05 16:31:01'),
(111, 'LB', 'App\\Models\\Investor', 32, '2025-12-05 16:52:18', '2025-12-05 16:52:18'),
(112, 'TN', 'App\\Models\\Investor', 32, '2025-12-05 16:52:18', '2025-12-05 16:52:18'),
(113, 'DZ', 'App\\Models\\Investor', 32, '2025-12-05 16:52:18', '2025-12-05 16:52:18'),
(114, 'LB', 'App\\Models\\Idea', 22, '2025-12-05 16:53:09', '2025-12-05 16:53:09'),
(115, 'TN', 'App\\Models\\Idea', 22, '2025-12-05 16:53:09', '2025-12-05 16:53:09'),
(116, 'DZ', 'App\\Models\\Idea', 22, '2025-12-05 16:53:09', '2025-12-05 16:53:09'),
(117, 'LB', 'App\\Models\\Idea', 23, '2025-12-05 17:13:23', '2025-12-05 17:13:23'),
(118, 'LB', 'App\\Models\\Investor', 33, '2025-12-05 17:35:54', '2025-12-05 17:35:54'),
(119, 'LB', 'App\\Models\\Investor', 34, '2025-12-05 17:36:56', '2025-12-05 17:36:56'),
(120, 'LB', 'App\\Models\\Investor', 35, '2025-12-05 17:51:47', '2025-12-05 17:51:47'),
(121, 'LB', 'App\\Models\\Investor', 36, '2025-12-05 17:52:49', '2025-12-05 17:52:49'),
(122, 'LB', 'App\\Models\\Investor', 37, '2025-12-05 18:06:36', '2025-12-05 18:06:36'),
(123, 'LB', 'App\\Models\\Investor', 38, '2025-12-05 18:40:41', '2025-12-05 18:40:41'),
(124, 'LB', 'App\\Models\\Investor', 39, '2025-12-05 18:53:08', '2025-12-05 18:53:08'),
(125, 'LB', 'App\\Models\\Idea', 24, '2025-12-05 18:56:22', '2025-12-05 18:56:22'),
(126, 'SA', 'App\\Models\\Investor', 40, '2025-12-07 21:18:19', '2025-12-07 21:18:19'),
(127, 'SD', 'App\\Models\\Investor', 40, '2025-12-07 21:18:19', '2025-12-07 21:18:19'),
(128, 'IR', 'App\\Models\\Investor', 40, '2025-12-07 21:18:19', '2025-12-07 21:18:19'),
(129, 'TR', 'App\\Models\\Idea', 25, '2025-12-10 19:43:02', '2025-12-10 19:43:02'),
(130, 'NAF', 'App\\Models\\Idea', 25, '2025-12-10 19:43:02', '2025-12-10 19:43:02'),
(131, 'LEV', 'App\\Models\\Idea', 25, '2025-12-10 19:43:02', '2025-12-10 19:43:02'),
(132, 'AE', 'App\\Models\\Idea', 26, '2025-12-10 19:45:01', '2025-12-10 19:45:01'),
(133, 'KW', 'App\\Models\\Idea', 26, '2025-12-10 19:45:01', '2025-12-10 19:45:01'),
(134, 'CSA', 'App\\Models\\Idea', 26, '2025-12-10 19:45:01', '2025-12-10 19:45:01'),
(135, 'QA', 'App\\Models\\Investor', 41, '2025-12-10 19:46:36', '2025-12-10 19:46:36'),
(136, 'OM', 'App\\Models\\Investor', 41, '2025-12-10 19:46:36', '2025-12-10 19:46:36'),
(137, 'MA', 'App\\Models\\Investor', 41, '2025-12-10 19:46:36', '2025-12-10 19:46:36'),
(138, 'TR', 'App\\Models\\Investor', 42, '2025-12-10 20:10:45', '2025-12-10 20:10:45'),
(139, 'TR', 'App\\Models\\Idea', 27, '2025-12-13 20:42:33', '2025-12-13 20:42:33'),
(140, 'SD', 'App\\Models\\Idea', 28, '2025-12-15 20:06:36', '2025-12-15 20:06:36'),
(141, 'TR', 'App\\Models\\Idea', 28, '2025-12-15 20:06:36', '2025-12-15 20:06:36'),
(142, 'AE', 'App\\Models\\Idea', 28, '2025-12-15 20:06:36', '2025-12-15 20:06:36'),
(143, 'AM_AU', 'App\\Models\\Idea', 29, '2025-12-16 18:38:35', '2025-12-16 18:38:35'),
(144, 'CSA', 'App\\Models\\Idea', 29, '2025-12-16 18:38:35', '2025-12-16 18:38:35'),
(145, 'KW', 'App\\Models\\Idea', 29, '2025-12-16 18:38:35', '2025-12-16 18:38:35'),
(146, 'AM_AU', 'App\\Models\\Idea', 30, '2025-12-16 19:00:32', '2025-12-16 19:00:32'),
(147, 'CSA', 'App\\Models\\Idea', 30, '2025-12-16 19:00:32', '2025-12-16 19:00:32'),
(149, 'NAF', 'App\\Models\\Investor', 44, '2025-12-16 19:22:19', '2025-12-16 19:22:19'),
(150, 'IR', 'App\\Models\\Investor', 44, '2025-12-16 19:22:26', '2025-12-16 19:22:26'),
(151, 'AM_AU', 'App\\Models\\Idea', 32, '2025-12-16 19:23:20', '2025-12-16 19:23:20'),
(152, 'KW', 'App\\Models\\Idea', 32, '2025-12-16 20:58:46', '2025-12-16 20:58:46'),
(153, 'CSA', 'App\\Models\\Idea', 32, '2025-12-16 20:58:46', '2025-12-16 20:58:46'),
(154, 'TR', 'App\\Models\\Investor', 45, '2025-12-16 21:00:26', '2025-12-16 21:00:26'),
(155, 'AE', 'App\\Models\\Investor', 45, '2025-12-16 21:00:26', '2025-12-16 21:00:26'),
(156, 'QA', 'App\\Models\\Investor', 46, '2025-12-19 13:57:21', '2025-12-19 13:57:21'),
(157, 'TR', 'App\\Models\\Idea', 33, '2025-12-19 14:23:57', '2025-12-19 14:23:57'),
(158, 'NAF', 'App\\Models\\Idea', 33, '2025-12-19 14:23:57', '2025-12-19 14:23:57'),
(159, 'AE', 'App\\Models\\Idea', 34, '2025-12-19 16:03:09', '2025-12-19 16:03:09'),
(160, 'KW', 'App\\Models\\Idea', 34, '2025-12-19 16:03:09', '2025-12-19 16:03:09'),
(161, 'AE', 'App\\Models\\Idea', 35, '2025-12-24 18:29:19', '2025-12-24 18:29:19'),
(162, 'TN', 'App\\Models\\Investor', 47, '2025-12-24 18:50:41', '2025-12-24 18:50:41'),
(163, 'QA', 'App\\Models\\Investor', 47, '2025-12-24 18:50:41', '2025-12-24 18:50:41'),
(164, 'TR', 'App\\Models\\Investor', 47, '2025-12-24 18:50:41', '2025-12-24 18:50:41'),
(165, 'KM', 'App\\Models\\Investor', 48, '2025-12-26 16:44:58', '2025-12-26 16:44:58'),
(166, 'MENA', 'App\\Models\\Investor', 48, '2025-12-26 16:44:58', '2025-12-26 16:44:58'),
(167, 'MR', 'App\\Models\\Investor', 48, '2025-12-26 16:44:58', '2025-12-26 16:44:58'),
(168, 'TN', 'App\\Models\\Idea', 36, '2026-01-18 13:12:13', '2026-01-18 13:12:13'),
(169, 'DZ', 'App\\Models\\Idea', 36, '2026-01-18 13:12:13', '2026-01-18 13:12:13'),
(170, 'OM', 'App\\Models\\Idea', 36, '2026-01-18 13:12:13', '2026-01-18 13:12:13');

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
-- Table structure for table `ideas`
--

CREATE TABLE `ideas` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `idea_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending: قيد المراجعة, approved: تمت الموافقة, rejected: مرفوض',
  `approved_at` timestamp NULL DEFAULT NULL,
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci COMMENT 'ملاحظات الإدارة عند الموافقة أو الرفض',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `user_id`, `idea_field`, `summary`, `status`, `approved_at`, `approved_by`, `admin_note`, `created_at`, `updated_at`, `title`) VALUES
(1, NULL, 'health', 'dasasddasd', 'pending', NULL, NULL, NULL, '2025-11-27 21:42:37', '2025-11-27 21:43:05', NULL),
(2, NULL, 'health', 'يييييي', 'pending', NULL, NULL, NULL, '2025-11-27 21:49:00', '2025-11-27 21:49:31', NULL),
(3, NULL, 'health', 'kjhkhj', 'pending', NULL, NULL, NULL, '2025-11-27 22:02:58', '2025-11-27 22:03:33', NULL),
(4, NULL, 'health', 'sdasdda', 'pending', NULL, NULL, NULL, '2025-11-27 22:05:25', '2025-11-27 22:05:49', NULL),
(5, NULL, 'entertainment', 'mn,,mnm,', 'pending', NULL, NULL, NULL, '2025-11-27 22:12:50', '2025-11-27 22:13:21', NULL),
(6, NULL, 'technology', '45531', 'pending', NULL, NULL, NULL, '2025-11-27 22:14:34', '2025-11-27 22:15:07', NULL),
(7, NULL, 'health', 'شيسيسي', 'pending', NULL, NULL, NULL, '2025-11-29 20:59:38', '2025-11-29 21:00:08', NULL),
(8, NULL, 'health', 'jlkj', 'pending', NULL, NULL, NULL, '2025-11-29 21:01:26', '2025-11-29 21:01:52', NULL),
(9, NULL, 'tourism', 'asdsadsd', 'pending', NULL, NULL, NULL, '2025-11-29 21:14:39', '2025-11-29 21:23:21', NULL),
(10, NULL, 'tourism', 'asdasdsda', 'pending', NULL, NULL, NULL, '2025-11-29 21:24:12', '2025-11-29 21:24:55', NULL),
(11, NULL, 'health', 'بيشسسيبيسش', 'pending', NULL, NULL, NULL, '2025-11-29 21:49:24', '2025-11-29 21:49:52', NULL),
(12, NULL, 'tourism', 'تن', 'pending', NULL, NULL, NULL, '2025-11-29 21:50:14', '2025-11-29 21:50:51', NULL),
(13, NULL, 'tourism', 'adsadd', 'pending', NULL, NULL, NULL, '2025-11-29 21:53:13', '2025-11-29 21:53:51', NULL),
(14, NULL, 'tourism', 'asdasdad', 'pending', NULL, NULL, NULL, '2025-11-29 21:54:09', '2025-11-29 21:54:45', NULL),
(15, NULL, 'entertainment', 'jklhkhkjh', 'pending', NULL, NULL, NULL, '2025-12-01 18:41:21', '2025-12-01 18:41:56', NULL),
(16, NULL, 'government', 'ؤؤؤؤؤؤ', 'pending', NULL, NULL, NULL, '2025-12-01 18:45:07', '2025-12-01 18:45:41', NULL),
(17, NULL, 'health', '2323\n2', 'pending', NULL, NULL, NULL, '2025-12-01 18:46:47', '2025-12-01 18:47:23', NULL),
(18, NULL, 'health', 'ببيبسب', 'pending', NULL, NULL, NULL, '2025-12-01 19:05:51', '2025-12-01 19:22:13', NULL),
(19, NULL, 'tourism', 'dsdsd', 'pending', NULL, NULL, NULL, '2025-12-05 16:11:16', '2025-12-05 16:11:48', NULL),
(20, NULL, 'tourism', 'ؤءئؤ', 'pending', NULL, NULL, NULL, '2025-12-05 16:14:47', '2025-12-05 16:30:16', NULL),
(21, NULL, 'tourism', 'asdasdad', 'pending', NULL, NULL, NULL, '2025-12-05 16:30:57', '2025-12-05 16:31:30', NULL),
(22, NULL, 'tourism', 'asdsad', 'pending', NULL, NULL, NULL, '2025-12-05 16:53:05', '2025-12-05 16:53:35', NULL),
(23, NULL, 'health', 'm,n,n,', 'pending', NULL, NULL, NULL, '2025-12-05 17:13:20', '2025-12-05 17:13:47', NULL),
(24, 1, 'health', 'sdsad', 'pending', NULL, NULL, NULL, '2025-12-05 20:56:42', '2025-12-05 18:56:46', NULL),
(25, 1, 'transport', 'لا اله الا الله \n', 'pending', NULL, NULL, NULL, '2025-12-10 21:43:32', '2025-12-10 19:43:38', NULL),
(26, 1, 'banking', 'asdfsadsad', 'rejected', '2025-12-21 21:33:23', NULL, NULL, '2025-12-10 21:45:21', '2025-12-21 19:33:25', NULL),
(27, NULL, 'transport', NULL, 'pending', NULL, NULL, NULL, '2025-12-13 20:42:30', '2025-12-13 20:42:30', NULL),
(28, 1, 'public', '665', 'approved', '2025-12-21 21:31:59', 1, NULL, '2025-12-15 23:15:05', '2025-12-21 19:32:03', 'العنوان الأولي للافكار الاولية'),
(29, 1, 'banking', 'يسشيشي', 'pending', NULL, NULL, NULL, '2025-12-16 20:58:50', '2025-12-16 18:58:52', NULL),
(30, 1, 'contracting', 'mjlkmlk', 'rejected', '2025-12-26 18:39:19', 1, 'سبب احتياطي للرفض', '2025-12-16 21:09:00', '2025-12-26 16:39:29', NULL),
(32, 1, 'contracting', 'fdadf', 'pending', NULL, NULL, NULL, '2025-12-16 22:59:58', '2025-12-16 21:00:01', NULL),
(33, NULL, 'food', NULL, 'pending', NULL, NULL, NULL, '2025-12-19 14:23:50', '2025-12-19 14:23:50', NULL),
(34, NULL, 'contracting', 'sdasdشسيشسي', 'rejected', '2025-12-21 23:22:56', 1, 'dd', '2025-12-19 15:57:42', '2025-12-21 22:43:42', NULL),
(35, 1, 'contracting', 'يسيشسيشيشسيي', 'rejected', '2025-12-26 18:51:12', 1, 'تم رفض الفكرة لمخالفة القواعد العامة ', '2025-12-24 20:45:14', '2025-12-26 16:51:30', 'عنوان تجريبي للفكرة '),
(36, NULL, 'food', NULL, 'pending', NULL, NULL, NULL, '2026-01-18 13:12:07', '2026-01-18 13:12:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `idea_contributions`
--

CREATE TABLE `idea_contributions` (
  `id` bigint UNSIGNED NOT NULL,
  `idea_id` bigint UNSIGNED NOT NULL,
  `contribute_type` enum('sell','idea','capital','personal','both') COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff` enum('full_time','part_time','supervision') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_person_money` enum('full_time','part_time','supervision') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_amount` decimal(12,2) DEFAULT NULL,
  `money_percent` tinyint UNSIGNED DEFAULT NULL,
  `person_money_amount` decimal(12,2) DEFAULT NULL,
  `person_money_percent` tinyint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_contributions`
--

INSERT INTO `idea_contributions` (`id`, `idea_id`, `contribute_type`, `staff`, `staff_person_money`, `money_amount`, `money_percent`, `person_money_amount`, `person_money_percent`, `created_at`, `updated_at`) VALUES
(1, 1, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 21:42:59', '2025-11-27 21:42:59'),
(2, 2, 'personal', 'full_time', NULL, NULL, NULL, NULL, NULL, '2025-11-27 21:49:25', '2025-11-27 21:49:25'),
(3, 3, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:03:27', '2025-11-27 22:03:27'),
(4, 4, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:05:44', '2025-11-27 22:05:44'),
(5, 5, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:13:13', '2025-11-27 22:13:13'),
(6, 6, 'personal', 'full_time', NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:15:00', '2025-11-27 22:15:00'),
(7, 7, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:00:01', '2025-11-29 21:00:01'),
(8, 8, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:01:46', '2025-11-29 21:01:46'),
(9, 9, 'personal', 'full_time', NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:23:16', '2025-11-29 21:23:16'),
(10, 10, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:24:50', '2025-11-29 21:24:50'),
(11, 11, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:49:46', '2025-11-29 21:49:46'),
(12, 12, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:50:45', '2025-11-29 21:50:45'),
(13, 13, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:53:45', '2025-11-29 21:53:45'),
(14, 14, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:54:39', '2025-11-29 21:54:39'),
(15, 15, 'personal', 'full_time', NULL, NULL, NULL, NULL, NULL, '2025-12-01 18:41:49', '2025-12-01 18:41:49'),
(16, 16, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-01 18:45:35', '2025-12-01 18:45:35'),
(17, 17, 'personal', 'part_time', NULL, NULL, NULL, NULL, NULL, '2025-12-01 18:47:17', '2025-12-01 18:47:17'),
(18, 18, 'both', NULL, 'part_time', NULL, NULL, 10.00, NULL, '2025-12-01 19:22:07', '2025-12-01 19:22:07'),
(19, 19, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 16:11:42', '2025-12-05 16:11:42'),
(20, 20, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 16:30:10', '2025-12-05 16:30:10'),
(21, 21, 'personal', 'part_time', NULL, NULL, NULL, NULL, NULL, '2025-12-05 16:31:19', '2025-12-05 16:31:19'),
(22, 22, 'capital', NULL, NULL, NULL, 20, NULL, NULL, '2025-12-05 16:53:30', '2025-12-05 16:53:30'),
(23, 23, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 17:13:41', '2025-12-05 17:13:41'),
(24, 24, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 18:56:39', '2025-12-05 18:56:39'),
(25, 25, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-10 19:43:25', '2025-12-10 19:43:25'),
(26, 26, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-10 19:45:18', '2025-12-10 19:45:18'),
(27, 28, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-15 21:14:56', '2025-12-15 21:14:56'),
(28, 29, 'both', NULL, 'full_time', NULL, NULL, NULL, 22, '2025-12-16 18:42:54', '2025-12-16 18:43:11'),
(29, 30, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-16 19:08:00', '2025-12-16 19:08:00'),
(30, 32, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-16 20:59:54', '2025-12-16 20:59:54'),
(31, 35, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-24 18:29:59', '2025-12-24 18:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `idea_costs`
--

CREATE TABLE `idea_costs` (
  `id` bigint UNSIGNED NOT NULL,
  `idea_id` bigint UNSIGNED NOT NULL,
  `cost_type` enum('one-time','annual') COLLATE utf8mb4_unicode_ci NOT NULL,
  `range_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_costs`
--

INSERT INTO `idea_costs` (`id`, `idea_id`, `cost_type`, `range_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'one-time', 1, '2025-11-27 21:42:43', '2025-11-27 21:42:43'),
(2, 2, 'one-time', 2, '2025-11-27 21:49:07', '2025-11-27 21:49:07'),
(3, 3, 'one-time', 1, '2025-11-27 22:03:04', '2025-11-27 22:03:04'),
(4, 4, 'one-time', 1, '2025-11-27 22:05:31', '2025-11-27 22:05:31'),
(5, 5, 'one-time', 1, '2025-11-27 22:12:56', '2025-11-27 22:12:56'),
(6, 6, 'one-time', 1, '2025-11-27 22:14:39', '2025-11-27 22:14:39'),
(7, 7, 'one-time', 1, '2025-11-29 20:59:45', '2025-11-29 20:59:45'),
(8, 8, 'one-time', 1, '2025-11-29 21:01:31', '2025-11-29 21:01:31'),
(9, 9, 'one-time', 2, '2025-11-29 21:14:57', '2025-11-29 21:14:57'),
(10, 10, 'one-time', 1, '2025-11-29 21:24:21', '2025-11-29 21:24:21'),
(11, 11, 'one-time', 4, '2025-11-29 21:49:31', '2025-11-29 21:49:31'),
(12, 12, 'one-time', 4, '2025-11-29 21:50:20', '2025-11-29 21:50:20'),
(13, 13, 'one-time', 1, '2025-11-29 21:53:19', '2025-11-29 21:53:19'),
(14, 14, 'one-time', 6, '2025-11-29 21:54:15', '2025-11-29 21:54:15'),
(15, 15, 'one-time', 1, '2025-12-01 18:41:27', '2025-12-01 18:41:27'),
(16, 16, 'one-time', 6, '2025-12-01 18:45:14', '2025-12-01 18:45:14'),
(17, 17, 'one-time', 2, '2025-12-01 18:46:54', '2025-12-01 18:46:54'),
(18, 18, 'one-time', 1, '2025-12-01 19:13:59', '2025-12-01 19:13:59'),
(19, 19, 'one-time', 2, '2025-12-05 16:11:21', '2025-12-05 16:11:21'),
(20, 20, 'one-time', 5, '2025-12-05 16:29:55', '2025-12-05 16:29:55'),
(21, 21, 'one-time', 5, '2025-12-05 16:31:04', '2025-12-05 16:31:04'),
(22, 22, 'one-time', 5, '2025-12-05 16:53:12', '2025-12-05 16:53:12'),
(23, 23, 'one-time', 5, '2025-12-05 17:13:26', '2025-12-05 17:13:26'),
(24, 24, 'one-time', 4, '2025-12-05 18:56:26', '2025-12-05 18:56:26'),
(25, 25, 'annual', 8, '2025-12-10 19:43:06', '2025-12-10 19:43:06'),
(26, 26, 'one-time', 2, '2025-12-10 19:45:04', '2025-12-10 19:45:04'),
(27, 27, 'one-time', 2, '2025-12-13 20:42:36', '2025-12-13 20:42:36'),
(28, 28, 'one-time', 2, '2025-12-15 20:06:40', '2025-12-15 20:06:40'),
(29, 29, 'one-time', 4, '2025-12-16 18:39:55', '2025-12-16 18:39:55'),
(30, 30, 'one-time', 6, '2025-12-16 19:00:40', '2025-12-16 19:02:47'),
(31, 32, 'one-time', 2, '2025-12-16 19:23:26', '2025-12-16 19:23:26'),
(32, 34, 'one-time', 2, '2025-12-19 16:05:04', '2025-12-19 16:05:04'),
(33, 35, 'one-time', 2, '2025-12-24 18:29:23', '2025-12-24 18:29:23'),
(34, 36, 'annual', 8, '2026-01-18 13:12:18', '2026-01-18 13:12:18');

-- --------------------------------------------------------

--
-- Table structure for table `idea_expenses`
--

CREATE TABLE `idea_expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `idea_id` bigint UNSIGNED NOT NULL,
  `company` decimal(15,2) DEFAULT NULL,
  `assets` decimal(15,2) DEFAULT NULL,
  `salaries` decimal(15,2) DEFAULT NULL,
  `operating` decimal(15,2) DEFAULT NULL,
  `other` decimal(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_expenses`
--

INSERT INTO `idea_expenses` (`id`, `idea_id`, `company`, `assets`, `salaries`, `operating`, `other`, `created_at`, `updated_at`) VALUES
(1, 1, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-27 21:42:56', '2025-11-27 21:42:56'),
(2, 2, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-27 21:49:21', '2025-11-27 21:49:21'),
(3, 3, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-27 22:03:24', '2025-11-27 22:03:24'),
(4, 4, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-27 22:05:42', '2025-11-27 22:05:42'),
(5, 5, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-27 22:13:11', '2025-11-27 22:13:11'),
(6, 6, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-27 22:14:57', '2025-11-27 22:14:57'),
(7, 7, 10.00, 10.00, 10.00, 40.00, 30.00, '2025-11-29 20:59:59', '2025-11-29 20:59:59'),
(8, 8, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-29 21:01:43', '2025-11-29 21:01:43'),
(9, 9, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-29 21:23:12', '2025-11-29 21:23:12'),
(10, 10, 10.00, 10.00, 10.00, 40.00, 30.00, '2025-11-29 21:24:47', '2025-11-29 21:24:47'),
(11, 11, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-29 21:49:43', '2025-11-29 21:49:43'),
(12, 12, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-29 21:50:43', '2025-11-29 21:50:43'),
(13, 13, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-29 21:53:43', '2025-11-29 21:53:43'),
(14, 14, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-11-29 21:54:37', '2025-11-29 21:54:37'),
(15, 15, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-01 18:41:45', '2025-12-01 18:41:45'),
(16, 16, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-01 18:45:32', '2025-12-01 18:45:32'),
(17, 17, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-01 18:47:12', '2025-12-01 18:47:12'),
(18, 18, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-01 19:21:54', '2025-12-01 19:21:54'),
(19, 19, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-05 16:11:37', '2025-12-05 16:11:37'),
(20, 20, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-05 16:30:08', '2025-12-05 16:30:08'),
(21, 21, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-05 16:31:15', '2025-12-05 16:31:15'),
(22, 22, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-05 16:53:24', '2025-12-05 16:53:24'),
(23, 23, 10.00, 10.00, 20.00, 50.00, 10.00, '2025-12-05 17:13:38', '2025-12-05 17:13:38'),
(24, 24, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-05 18:56:36', '2025-12-05 18:56:36'),
(25, 25, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-10 19:43:21', '2025-12-10 19:43:21'),
(26, 26, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-10 19:45:15', '2025-12-10 19:45:15'),
(27, 28, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-15 20:54:06', '2025-12-15 20:54:06'),
(28, 29, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-16 18:40:26', '2025-12-16 18:40:26'),
(29, 32, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-16 19:33:45', '2025-12-16 19:33:45'),
(30, 35, 10.00, 10.00, 10.00, 50.00, 20.00, '2025-12-24 18:29:55', '2025-12-24 18:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `idea_profits`
--

CREATE TABLE `idea_profits` (
  `id` bigint UNSIGNED NOT NULL,
  `idea_id` bigint UNSIGNED NOT NULL,
  `profit_type` enum('one-time','annual') COLLATE utf8mb4_unicode_ci NOT NULL,
  `range_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_profits`
--

INSERT INTO `idea_profits` (`id`, `idea_id`, `profit_type`, `range_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'one-time', 1, '2025-11-27 21:42:46', '2025-11-27 21:42:46'),
(2, 2, 'one-time', 2, '2025-11-27 21:49:10', '2025-11-27 21:49:10'),
(3, 3, 'one-time', 2, '2025-11-27 22:03:07', '2025-11-27 22:03:07'),
(4, 4, 'one-time', 1, '2025-11-27 22:05:33', '2025-11-27 22:05:33'),
(5, 5, 'one-time', 2, '2025-11-27 22:12:58', '2025-11-27 22:12:58'),
(6, 6, 'one-time', 1, '2025-11-27 22:14:41', '2025-11-27 22:14:41'),
(7, 7, 'one-time', 1, '2025-11-29 20:59:47', '2025-11-29 20:59:47'),
(8, 8, 'one-time', 2, '2025-11-29 21:01:34', '2025-11-29 21:01:34'),
(9, 9, 'one-time', 2, '2025-11-29 21:22:55', '2025-11-29 21:22:55'),
(10, 10, 'one-time', 1, '2025-11-29 21:24:24', '2025-11-29 21:24:24'),
(11, 11, 'one-time', 3, '2025-11-29 21:49:34', '2025-11-29 21:49:34'),
(12, 12, 'one-time', 4, '2025-11-29 21:50:23', '2025-11-29 21:50:23'),
(13, 13, 'one-time', 1, '2025-11-29 21:53:21', '2025-11-29 21:53:21'),
(14, 14, 'annual', 12, '2025-11-29 21:54:17', '2025-11-29 21:54:17'),
(15, 15, 'one-time', 1, '2025-12-01 18:41:30', '2025-12-01 18:41:30'),
(16, 16, 'one-time', 2, '2025-12-01 18:45:16', '2025-12-01 18:45:16'),
(17, 17, 'one-time', 3, '2025-12-01 18:46:59', '2025-12-01 18:46:59'),
(18, 18, 'one-time', 2, '2025-12-01 19:21:31', '2025-12-01 19:21:31'),
(19, 19, 'one-time', 2, '2025-12-05 16:11:25', '2025-12-05 16:11:25'),
(20, 20, 'one-time', 5, '2025-12-05 16:29:58', '2025-12-05 16:29:58'),
(21, 21, 'one-time', 5, '2025-12-05 16:31:07', '2025-12-05 16:31:07'),
(22, 22, 'one-time', 5, '2025-12-05 16:53:15', '2025-12-05 16:53:15'),
(23, 23, 'annual', 8, '2025-12-05 17:13:28', '2025-12-05 17:13:28'),
(24, 24, 'one-time', 4, '2025-12-05 18:56:28', '2025-12-05 18:56:28'),
(25, 25, 'annual', 8, '2025-12-10 19:43:09', '2025-12-10 19:43:09'),
(26, 26, 'one-time', 6, '2025-12-10 19:45:07', '2025-12-10 19:45:07'),
(27, 27, 'one-time', 2, '2025-12-13 20:42:38', '2025-12-13 20:42:38'),
(28, 28, 'annual', 8, '2025-12-15 20:06:43', '2025-12-15 20:53:50'),
(29, 29, 'one-time', 4, '2025-12-16 18:40:05', '2025-12-16 18:40:05'),
(30, 30, 'one-time', 2, '2025-12-16 19:02:52', '2025-12-16 19:02:52'),
(31, 32, 'one-time', 6, '2025-12-16 19:23:29', '2025-12-16 19:23:29'),
(32, 34, 'one-time', 2, '2025-12-19 16:05:08', '2025-12-19 16:05:08'),
(33, 35, 'one-time', 2, '2025-12-24 18:29:26', '2025-12-24 18:29:26'),
(34, 36, 'annual', 10, '2026-01-18 13:12:22', '2026-01-18 13:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `idea_resources`
--

CREATE TABLE `idea_resources` (
  `id` bigint UNSIGNED NOT NULL,
  `idea_id` bigint UNSIGNED NOT NULL,
  `company` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `space_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_number` int DEFAULT NULL,
  `workers` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workers_number` int DEFAULT NULL,
  `executive_spaces` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executive_spaces_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_resources`
--

INSERT INTO `idea_resources` (`id`, `idea_id`, `company`, `space_type`, `staff`, `staff_number`, `workers`, `workers_number`, `executive_spaces`, `executive_spaces_type`, `equipment`, `equipment_type`, `software`, `software_type`, `website`, `created_at`, `updated_at`) VALUES
(1, 1, 'yes', 'small', 'no', 704, 'yes', 282, 'no', 'open_spaces', 'yes', 'electronic', 'yes', 'static', 'yes', '2025-11-27 21:42:50', '2025-11-27 21:42:50'),
(2, 2, 'no', 'large', 'no', 282, 'yes', 533, 'no', 'factory', 'yes', 'industrial', 'no', 'dynamic', 'no', '2025-11-27 21:49:13', '2025-11-27 21:49:13'),
(3, 3, 'no', 'small', 'no', 166, 'no', 659, 'yes', 'land_space', 'yes', 'electronic', 'no', 'dynamic', 'no', '2025-11-27 22:03:11', '2025-11-27 22:03:11'),
(4, 4, 'no', 'large', 'yes', 502, 'no', 577, 'yes', 'open_spaces', 'yes', 'industrial', 'yes', 'static', 'yes', '2025-11-27 22:05:37', '2025-11-27 22:05:37'),
(5, 5, 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'yes', '2025-11-27 22:13:05', '2025-11-27 22:13:05'),
(6, 6, 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'no', '2025-11-27 22:14:46', '2025-11-27 22:14:46'),
(7, 7, 'no', 'large', 'no', 198, 'yes', 587, 'no', 'factory', 'no', 'other', 'yes', 'static', 'yes', '2025-11-29 20:59:51', '2025-11-29 20:59:51'),
(8, 8, 'no', 'large', 'no', 935, 'no', 101, 'yes', 'factory', 'no', 'industrial', 'no', 'dynamic', 'no', '2025-11-29 21:01:38', '2025-11-29 21:01:38'),
(9, 9, 'yes', 'large', 'yes', 11, 'yes', 111, 'yes', 'open_spaces', 'yes', 'industrial', 'yes', 'static', 'yes', '2025-11-29 21:23:07', '2025-11-29 21:23:07'),
(10, 10, 'yes', 'large', 'no', NULL, 'no', NULL, 'yes', 'open_spaces', 'yes', 'industrial', 'no', NULL, 'yes', '2025-11-29 21:24:33', '2025-11-29 21:24:33'),
(11, 11, 'no', 'large', 'yes', 13, 'yes', 366, 'no', 'open_spaces', 'no', 'other', 'no', 'dynamic', 'no', '2025-11-29 21:49:38', '2025-11-29 21:49:38'),
(12, 12, 'yes', 'small', 'yes', 441, 'yes', 611, 'yes', 'open_spaces', 'yes', 'other', 'no', 'dynamic', 'no', '2025-11-29 21:50:37', '2025-11-29 21:50:37'),
(13, 13, 'yes', 'large', 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'no', '2025-11-29 21:53:37', '2025-11-29 21:53:37'),
(14, 14, 'no', NULL, 'yes', 22, 'yes', 22, 'no', NULL, 'no', NULL, 'no', NULL, 'no', '2025-11-29 21:54:31', '2025-11-29 21:54:31'),
(15, 15, 'yes', 'large', 'no', NULL, 'no', NULL, 'yes', 'open_spaces', 'yes', 'industrial', 'yes', 'static', 'yes', '2025-12-01 18:41:39', '2025-12-01 18:41:39'),
(16, 16, 'yes', 'large', 'no', NULL, 'no', NULL, 'yes', 'open_spaces', 'yes', 'electronic', 'yes', 'dynamic', 'yes', '2025-12-01 18:45:27', '2025-12-01 18:45:27'),
(17, 17, 'yes', 'large', 'no', NULL, 'no', NULL, 'yes', 'open_spaces', 'yes', 'industrial', 'yes', 'static', 'yes', '2025-12-01 18:47:07', '2025-12-01 18:47:07'),
(18, 18, 'no', 'large', 'yes', 248, 'no', 182, 'no', 'land_space', 'no', 'industrial', 'yes', 'dynamic', 'yes', '2025-12-01 19:21:36', '2025-12-01 19:21:36'),
(19, 19, 'no', 'large', 'no', 797, 'no', 14, 'yes', 'land_space', 'no', 'other', 'no', 'dynamic', 'yes', '2025-12-05 16:11:30', '2025-12-05 16:11:30'),
(20, 20, 'no', 'large', 'yes', 567, 'yes', 624, 'yes', 'land_space', 'yes', 'industrial', 'yes', 'static', 'no', '2025-12-05 16:30:02', '2025-12-05 16:30:02'),
(21, 21, 'yes', 'small', 'yes', 110, 'no', 170, 'no', 'open_spaces', 'yes', 'other', 'yes', 'static', 'no', '2025-12-05 16:31:10', '2025-12-05 16:31:10'),
(22, 22, 'yes', 'small', 'no', 777, 'yes', 80, 'yes', 'factory', 'no', 'electronic', 'yes', 'dynamic', 'yes', '2025-12-05 16:53:18', '2025-12-05 16:53:18'),
(23, 23, 'yes', 'small', 'yes', 987, 'yes', 332, 'no', 'open_spaces', 'yes', 'other', 'yes', 'dynamic', 'no', '2025-12-05 17:13:32', '2025-12-05 17:13:32'),
(24, 24, 'yes', 'large', 'yes', 408, 'no', 856, 'no', 'factory', 'no', 'industrial', 'no', 'dynamic', 'no', '2025-12-05 18:56:31', '2025-12-05 18:56:31'),
(25, 25, 'no', 'small', 'yes', 553, 'no', 964, 'no', 'open_spaces', 'no', 'other', 'yes', 'static', 'no', '2025-12-10 19:43:14', '2025-12-10 19:43:14'),
(26, 26, 'no', 'small', 'yes', 220, 'no', 571, 'no', 'open_spaces', 'no', 'electronic', 'no', 'dynamic', 'yes', '2025-12-10 19:45:10', '2025-12-10 19:45:10'),
(27, 28, 'no', 'small', 'yes', 977, 'no', 940, 'yes', 'land_space', 'no', 'other', 'yes', 'dynamic', 'yes', '2025-12-15 20:27:13', '2025-12-15 21:06:33'),
(28, 29, 'yes', 'small', 'no', 52, 'yes', 678, 'yes', 'open_spaces', 'yes', 'industrial', 'no', 'dynamic', 'no', '2025-12-16 18:40:18', '2025-12-16 18:40:18'),
(29, 30, 'no', 'small', 'no', 125, 'no', 901, 'no', 'factory', 'no', 'other', 'yes', 'dynamic', 'no', '2025-12-16 19:03:01', '2025-12-16 19:03:01'),
(30, 32, 'no', 'large', 'yes', 520, 'no', 250, 'yes', 'factory', 'no', 'other', 'yes', 'static', 'yes', '2025-12-16 19:33:39', '2025-12-16 19:33:39'),
(31, 34, 'no', 'small', 'no', 645, 'no', 873, 'no', 'open_spaces', 'yes', 'other', 'yes', 'dynamic', 'yes', '2025-12-19 16:05:13', '2025-12-19 16:05:13'),
(32, 35, 'yes', 'large', 'no', NULL, 'no', NULL, 'no', NULL, 'yes', 'industrial', 'yes', 'static', 'yes', '2025-12-24 18:29:43', '2025-12-24 18:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `idea_returns`
--

CREATE TABLE `idea_returns` (
  `id` bigint UNSIGNED NOT NULL,
  `idea_id` bigint UNSIGNED NOT NULL,
  `return_type` enum('profit','one_time','combo') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit_only_percentage` decimal(5,2) DEFAULT NULL,
  `one_time_dollar` decimal(15,2) DEFAULT NULL,
  `one_time_sar` decimal(15,2) DEFAULT NULL,
  `combo_dollar` decimal(15,2) DEFAULT NULL,
  `combo_sar` decimal(15,2) DEFAULT NULL,
  `combo_percentage` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `idea_returns`
--

INSERT INTO `idea_returns` (`id`, `idea_id`, `return_type`, `profit_only_percentage`, `one_time_dollar`, `one_time_sar`, `combo_dollar`, `combo_sar`, `combo_percentage`, `created_at`, `updated_at`) VALUES
(1, 1, 'profit', 10.00, NULL, NULL, NULL, NULL, NULL, '2025-11-27 21:43:02', '2025-11-27 21:43:02'),
(2, 2, 'profit', 10.00, NULL, NULL, NULL, NULL, NULL, '2025-11-27 21:49:28', '2025-11-27 21:49:28'),
(3, 3, 'profit', 10.00, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:03:29', '2025-11-27 22:03:29'),
(4, 4, 'profit', 5.00, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:05:47', '2025-11-27 22:05:47'),
(5, 5, 'profit', 35.00, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:13:17', '2025-11-27 22:13:17'),
(6, 6, 'profit', 35.00, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:15:03', '2025-11-27 22:15:03'),
(7, 7, 'profit', 10.00, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:00:05', '2025-11-29 21:00:05'),
(8, 8, 'profit', 10.00, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:01:49', '2025-11-29 21:01:49'),
(9, 9, 'profit', 15.00, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:23:19', '2025-11-29 21:23:19'),
(10, 10, 'profit', 40.00, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:24:53', '2025-11-29 21:24:53'),
(11, 11, 'profit', 40.00, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:49:49', '2025-11-29 21:49:49'),
(12, 12, 'profit', 50.00, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:50:48', '2025-11-29 21:50:48'),
(13, 13, 'profit', 45.00, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:53:48', '2025-11-29 21:53:48'),
(14, 14, 'profit', 50.00, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:54:43', '2025-11-29 21:54:43'),
(15, 15, 'profit', 30.00, NULL, NULL, NULL, NULL, NULL, '2025-12-01 18:41:52', '2025-12-01 18:41:52'),
(16, 16, 'profit', 45.00, NULL, NULL, NULL, NULL, NULL, '2025-12-01 18:45:38', '2025-12-01 18:45:38'),
(17, 17, 'profit', 50.00, NULL, NULL, NULL, NULL, NULL, '2025-12-01 18:47:20', '2025-12-01 18:47:20'),
(18, 18, 'profit', 45.00, NULL, NULL, NULL, NULL, NULL, '2025-12-01 19:22:10', '2025-12-01 19:22:10'),
(19, 19, 'profit', 40.00, NULL, NULL, NULL, NULL, NULL, '2025-12-05 16:11:45', '2025-12-05 16:11:45'),
(20, 20, 'profit', 30.00, NULL, NULL, NULL, NULL, NULL, '2025-12-05 16:30:13', '2025-12-05 16:30:13'),
(21, 21, 'one_time', NULL, 12.00, NULL, NULL, NULL, NULL, '2025-12-05 16:31:27', '2025-12-05 16:31:27'),
(22, 22, 'profit', 50.00, NULL, NULL, NULL, NULL, NULL, '2025-12-05 16:53:33', '2025-12-05 16:53:33'),
(23, 23, 'profit', 50.00, NULL, NULL, NULL, NULL, NULL, '2025-12-05 17:13:43', '2025-12-05 17:13:43'),
(24, 24, 'profit', 30.00, NULL, NULL, NULL, NULL, NULL, '2025-12-05 18:56:41', '2025-12-05 18:56:41'),
(25, 25, 'combo', NULL, NULL, NULL, 11.00, NULL, 30.00, '2025-12-10 19:43:31', '2025-12-10 19:43:31'),
(26, 26, 'profit', 40.00, NULL, NULL, NULL, NULL, NULL, '2025-12-10 19:45:20', '2025-12-10 19:45:20'),
(27, 28, 'profit', 10.00, NULL, NULL, NULL, NULL, NULL, '2025-12-15 21:15:04', '2025-12-15 21:15:04'),
(28, 29, 'combo', NULL, NULL, NULL, 22.00, NULL, 15.00, '2025-12-16 18:48:23', '2025-12-16 18:49:02'),
(29, 30, 'profit', 10.00, NULL, NULL, NULL, NULL, NULL, '2025-12-16 19:09:00', '2025-12-16 19:09:00'),
(30, 32, 'profit', 30.00, NULL, NULL, NULL, NULL, NULL, '2025-12-16 20:59:58', '2025-12-16 20:59:58'),
(31, 35, 'profit', 30.00, NULL, NULL, NULL, NULL, NULL, '2025-12-24 18:30:03', '2025-12-24 18:30:03');

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `investor_field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending' COMMENT 'pending: قيد المراجعة, approved: تمت الموافقة, rejected: مرفوض',
  `approved_at` timestamp NULL DEFAULT NULL,
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci COMMENT 'ملاحظات الإدارة عند الموافقة أو الرفض',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investors`
--

INSERT INTO `investors` (`id`, `user_id`, `investor_field`, `summary`, `status`, `approved_at`, `approved_by`, `admin_note`, `created_at`, `updated_at`, `title`) VALUES
(1, NULL, 'tourism', NULL, 'pending', NULL, NULL, NULL, '2025-11-27 09:07:20', '2025-11-27 09:07:20', NULL),
(2, NULL, 'health', 'ععععع', 'pending', NULL, NULL, NULL, '2025-11-27 21:57:30', '2025-11-27 21:57:55', NULL),
(3, NULL, 'health', 'asdsa', 'pending', NULL, NULL, NULL, '2025-11-27 22:02:34', '2025-11-27 22:02:50', NULL),
(4, NULL, 'health', '4112', 'pending', NULL, NULL, NULL, '2025-11-27 22:07:56', '2025-11-27 22:08:24', NULL),
(5, NULL, 'entertainment', 'dsadasdasd', 'pending', NULL, NULL, NULL, '2025-11-27 22:11:58', '2025-11-27 22:12:25', NULL),
(6, NULL, 'technology', ',mnh,kklj', 'pending', NULL, NULL, NULL, '2025-11-27 22:13:58', '2025-11-27 22:14:21', NULL),
(7, NULL, 'technology', '555', 'pending', NULL, NULL, NULL, '2025-11-27 22:16:01', '2025-11-27 22:17:35', NULL),
(8, NULL, 'technology', '13231321', 'pending', NULL, NULL, NULL, '2025-11-27 22:18:09', '2025-11-27 22:18:47', NULL),
(9, NULL, 'technology', '5352321', 'pending', NULL, NULL, NULL, '2025-11-27 22:19:07', '2025-11-27 22:19:25', NULL),
(10, NULL, 'technology', 'asdsad', 'pending', NULL, NULL, NULL, '2025-11-27 22:34:33', '2025-11-27 22:34:50', NULL),
(11, NULL, 'technology', '4512asdasd', 'pending', NULL, NULL, NULL, '2025-11-27 22:36:13', '2025-11-27 22:58:31', NULL),
(12, NULL, 'transport', 'jhj', 'pending', NULL, NULL, NULL, '2025-11-29 20:43:28', '2025-11-29 20:43:48', NULL),
(13, NULL, 'health', 'شسيسشي', 'pending', NULL, NULL, NULL, '2025-11-29 20:53:12', '2025-11-29 20:53:26', NULL),
(14, NULL, 'public', 'بيسشي', 'pending', NULL, NULL, NULL, '2025-11-29 20:54:53', '2025-11-29 20:55:06', NULL),
(15, NULL, 'health', 'شسسشي', 'pending', NULL, NULL, NULL, '2025-11-29 21:03:57', '2025-11-29 21:04:10', NULL),
(16, NULL, 'health', 'شسيسشي', 'pending', NULL, NULL, NULL, '2025-11-29 21:05:39', '2025-11-29 21:06:00', NULL),
(17, NULL, 'health', 'تنمكت', 'pending', NULL, NULL, NULL, '2025-11-29 21:08:54', '2025-11-29 21:09:23', NULL),
(18, NULL, 'tourism', 'ssad', 'pending', NULL, NULL, NULL, '2025-11-29 21:23:33', '2025-11-29 21:23:48', NULL),
(19, NULL, 'tourism', 'hjgjhghj', 'pending', NULL, NULL, NULL, '2025-11-29 21:55:17', '2025-11-29 21:55:49', NULL),
(20, NULL, 'tourism', 'وىلاوةى', 'pending', NULL, NULL, NULL, '2025-11-29 21:58:14', '2025-11-29 22:05:09', NULL),
(21, NULL, 'health', 'asdsdad', 'pending', NULL, NULL, NULL, '2025-12-01 18:17:57', '2025-12-01 18:18:49', NULL),
(22, NULL, 'contracting', 'شسيسشي', 'pending', NULL, NULL, NULL, '2025-12-01 18:43:35', '2025-12-01 18:44:02', NULL),
(23, NULL, 'health', '1213213', 'pending', NULL, NULL, NULL, '2025-12-01 18:46:11', '2025-12-01 18:46:35', NULL),
(24, NULL, 'health', '3232131', 'pending', NULL, NULL, NULL, '2025-12-01 18:47:54', '2025-12-01 18:48:18', NULL),
(25, NULL, 'technology', 'شؤسؤ', 'pending', NULL, NULL, NULL, '2025-12-01 20:30:19', '2025-12-01 20:30:44', NULL),
(26, NULL, 'designs', NULL, 'pending', NULL, NULL, NULL, '2025-12-04 18:52:28', '2025-12-04 18:52:28', NULL),
(27, NULL, 'tourism', 'asasas', 'pending', NULL, NULL, NULL, '2025-12-05 14:08:47', '2025-12-05 15:35:15', NULL),
(28, NULL, 'tourism', '1200', 'pending', NULL, NULL, NULL, '2025-12-05 16:15:20', '2025-12-05 16:15:38', NULL),
(29, NULL, 'tourism', 'يبسيب', 'pending', NULL, NULL, NULL, '2025-12-05 16:27:51', '2025-12-05 16:28:07', NULL),
(30, NULL, 'health', 'بيسيب', 'pending', NULL, NULL, NULL, '2025-12-05 16:28:43', '2025-12-05 16:28:57', NULL),
(31, NULL, 'tourism', 'سبسيب', 'pending', NULL, NULL, NULL, '2025-12-05 16:29:31', '2025-12-05 16:29:48', NULL),
(32, NULL, 'tourism', 'asd', 'pending', NULL, NULL, NULL, '2025-12-05 16:52:15', '2025-12-05 16:52:33', NULL),
(33, NULL, 'tourism', 'dfdf', 'pending', NULL, NULL, NULL, '2025-12-05 17:35:51', '2025-12-05 17:36:07', NULL),
(34, 1, 'tourism', '3213\n2', 'pending', NULL, NULL, NULL, '2025-12-05 17:36:54', '2025-12-05 17:37:15', NULL),
(35, 1, 'entertainment', '4132132', 'approved', '2025-12-22 00:34:12', 1, NULL, '2025-12-05 17:51:45', '2025-12-21 22:34:15', NULL),
(36, 1, 'entertainment', 'asasd', 'pending', NULL, NULL, NULL, NULL, '2025-12-05 18:05:09', NULL),
(37, 1, 'health', '565', 'pending', NULL, NULL, NULL, '2025-12-05 18:06:34', '2025-12-05 18:20:29', NULL),
(38, 1, 'health', 'asdsad', 'pending', NULL, NULL, NULL, '2025-12-05 20:52:18', '2025-12-05 18:52:20', NULL),
(39, 1, 'health', 'asdsa', 'pending', NULL, NULL, NULL, '2025-12-05 20:53:16', '2025-12-05 18:53:41', NULL),
(40, 1, 'public', 'لا اله الا الله ', 'pending', NULL, NULL, NULL, '2025-12-07 23:18:48', '2025-12-07 21:18:54', NULL),
(41, 1, 'designs', 'sadsa', 'pending', NULL, NULL, NULL, '2025-12-10 22:09:14', '2025-12-10 20:09:16', NULL),
(42, 1, 'tourism', 'sadasd', 'pending', NULL, NULL, NULL, '2025-12-10 22:11:02', '2025-12-10 20:11:05', NULL),
(43, NULL, 'agriculture', NULL, 'pending', NULL, NULL, NULL, '2025-12-16 19:11:16', '2025-12-16 19:19:27', NULL),
(44, 1, 'agriculture', 'adsad', 'pending', NULL, NULL, NULL, '2025-12-16 21:52:27', '2025-12-16 19:52:32', NULL),
(45, 1, 'systems', 'dsad', 'approved', '2025-12-22 00:34:28', 1, NULL, '2025-12-16 23:00:42', '2025-12-21 22:34:31', 'العنوان الاول لعرض الاستثمرا'),
(46, NULL, 'tourism', 'sdfsfasdasdd', 'rejected', '2025-12-21 23:37:28', 1, 'sdsdsd', '2025-12-19 13:57:18', '2025-12-21 22:45:10', NULL),
(47, 1, 'agriculture', 'asddddddd', 'approved', '2025-12-26 18:43:06', 1, NULL, '2025-12-24 21:02:17', '2025-12-26 16:43:13', 'عرض استثماري رائد فى مجال زراعة المحاصيل'),
(48, NULL, 'environment', NULL, 'pending', NULL, NULL, NULL, '2025-12-26 16:44:52', '2025-12-26 16:44:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `investor_contributions`
--

CREATE TABLE `investor_contributions` (
  `id` bigint UNSIGNED NOT NULL,
  `investor_id` bigint UNSIGNED NOT NULL,
  `contribute_type` enum('sell','idea','capital','personal','both') COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff` enum('full_time','part_time','supervision') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_person_money` enum('full_time','part_time','supervision') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money_amount` decimal(15,2) DEFAULT NULL,
  `money_percent` tinyint UNSIGNED DEFAULT NULL,
  `person_money_amount` decimal(15,2) DEFAULT NULL,
  `person_money_percent` tinyint UNSIGNED DEFAULT NULL,
  `money_contributions` tinyint DEFAULT NULL COMMENT 'الخطوة الخامسة',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investor_contributions`
--

INSERT INTO `investor_contributions` (`id`, `investor_id`, `contribute_type`, `staff`, `staff_person_money`, `money_amount`, `money_percent`, `person_money_amount`, `person_money_percent`, `money_contributions`, `created_at`, `updated_at`) VALUES
(1, 2, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 21:57:48', '2025-11-27 21:57:48'),
(2, 3, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:02:45', '2025-11-27 22:02:45'),
(3, 4, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 15, '2025-11-27 22:08:18', '2025-11-27 22:08:21'),
(4, 5, 'personal', 'full_time', NULL, NULL, NULL, NULL, NULL, 20, '2025-11-27 22:12:14', '2025-11-27 22:12:18'),
(5, 6, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 21, '2025-11-27 22:14:12', '2025-11-27 22:14:17'),
(6, 7, 'both', NULL, 'full_time', NULL, NULL, NULL, 20, 15, '2025-11-27 22:17:28', '2025-11-27 22:17:31'),
(7, 8, 'capital', NULL, NULL, 8000.00, NULL, NULL, NULL, 22, '2025-11-27 22:18:30', '2025-11-27 22:18:44'),
(8, 9, 'personal', 'full_time', NULL, NULL, NULL, NULL, NULL, 16, '2025-11-27 22:19:19', '2025-11-27 22:19:22'),
(9, 10, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, 18, '2025-11-27 22:34:44', '2025-11-27 22:34:47'),
(10, 11, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:37:58', '2025-11-27 22:58:28'),
(11, 12, 'personal', 'full_time', NULL, NULL, NULL, NULL, NULL, 15, '2025-11-29 20:43:39', '2025-11-29 20:43:43'),
(12, 13, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 15, '2025-11-29 20:53:19', '2025-11-29 20:53:24'),
(13, 14, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 18, '2025-11-29 20:55:01', '2025-11-29 20:55:04'),
(14, 15, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 19, '2025-11-29 21:04:04', '2025-11-29 21:04:07'),
(15, 16, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 22, '2025-11-29 21:05:54', '2025-11-29 21:05:58'),
(16, 17, 'personal', 'full_time', NULL, NULL, NULL, NULL, NULL, 23, '2025-11-29 21:09:16', '2025-11-29 21:09:19'),
(17, 18, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 28, '2025-11-29 21:23:42', '2025-11-29 21:23:45'),
(18, 19, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 19, '2025-11-29 21:55:27', '2025-11-29 21:55:46'),
(19, 20, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 20, '2025-11-29 21:58:31', '2025-11-29 22:05:06'),
(20, 21, 'capital', NULL, NULL, 111.00, NULL, NULL, NULL, 20, '2025-12-01 18:18:42', '2025-12-01 18:18:46'),
(21, 22, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 21, '2025-12-01 18:43:56', '2025-12-01 18:43:59'),
(22, 23, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 23, '2025-12-01 18:46:27', '2025-12-01 18:46:31'),
(23, 24, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 25, '2025-12-01 18:48:10', '2025-12-01 18:48:14'),
(24, 25, 'personal', 'supervision', NULL, NULL, NULL, NULL, NULL, 16, '2025-12-01 20:30:37', '2025-12-01 20:30:41'),
(25, 26, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, 20, '2025-12-05 14:09:45', '2025-12-05 15:35:07'),
(26, 28, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 27, '2025-12-05 16:15:31', '2025-12-05 16:15:35'),
(27, 29, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, 19, '2025-12-05 16:28:01', '2025-12-05 16:28:04'),
(28, 30, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, 19, '2025-12-05 16:28:52', '2025-12-05 16:28:55'),
(29, 31, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 19, '2025-12-05 16:29:40', '2025-12-05 16:29:45'),
(30, 32, 'personal', 'full_time', NULL, NULL, NULL, NULL, NULL, 19, '2025-12-05 16:52:26', '2025-12-05 16:52:30'),
(31, 33, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 16, '2025-12-05 17:36:01', '2025-12-05 17:36:04'),
(32, 34, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 16, '2025-12-05 17:37:07', '2025-12-05 17:37:12'),
(33, 35, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, 15, '2025-12-05 17:51:52', '2025-12-05 17:51:55'),
(34, 36, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, 28, '2025-12-05 17:52:53', '2025-12-05 17:59:26'),
(35, 37, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, 15, '2025-12-05 18:06:41', '2025-12-05 18:06:44'),
(36, 38, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, 15, '2025-12-05 18:40:46', '2025-12-05 18:40:49'),
(37, 39, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, 24, '2025-12-05 18:53:13', '2025-12-05 18:53:16'),
(38, 40, 'personal', 'supervision', NULL, NULL, NULL, NULL, NULL, 20, '2025-12-07 21:18:44', '2025-12-07 21:18:47'),
(39, 41, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 20, '2025-12-10 19:46:48', '2025-12-10 19:46:51'),
(40, 42, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 16, '2025-12-10 20:10:59', '2025-12-10 20:11:02'),
(41, 44, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-16 19:37:59', '2025-12-16 19:52:03'),
(42, 45, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, 20, '2025-12-16 21:00:36', '2025-12-16 21:00:41'),
(43, 46, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-19 13:57:32', '2025-12-19 13:57:32'),
(44, 47, 'sell', NULL, NULL, NULL, NULL, NULL, NULL, 16, '2025-12-24 18:50:48', '2025-12-24 18:50:53'),
(45, 48, 'idea', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-26 16:45:14', '2025-12-26 16:45:14');

-- --------------------------------------------------------

--
-- Table structure for table `investor_resources`
--

CREATE TABLE `investor_resources` (
  `id` bigint UNSIGNED NOT NULL,
  `investor_id` bigint UNSIGNED NOT NULL,
  `company` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `space_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `staff_number` int DEFAULT NULL,
  `workers` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workers_number` int DEFAULT NULL,
  `executive_spaces` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `executive_spaces_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `software_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` enum('yes','no') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investor_resources`
--

INSERT INTO `investor_resources` (`id`, `investor_id`, `company`, `space_type`, `staff`, `staff_number`, `workers`, `workers_number`, `executive_spaces`, `executive_spaces_type`, `equipment`, `equipment_type`, `software`, `software_type`, `website`, `created_at`, `updated_at`) VALUES
(1, 2, 'yes', 'large', 'no', 257, 'yes', 297, 'no', 'open_spaces', 'no', 'industrial', 'yes', 'static', 'yes', '2025-11-27 21:57:45', '2025-11-27 21:57:45'),
(2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:02:42', '2025-11-27 22:02:42'),
(3, 4, 'yes', 'large', 'yes', 10, 'no', NULL, 'no', NULL, 'no', NULL, 'no', NULL, 'yes', '2025-11-27 22:08:14', '2025-11-27 22:08:14'),
(4, 5, 'yes', 'large', 'no', NULL, 'no', NULL, 'yes', 'open_spaces', 'no', NULL, 'no', NULL, 'no', '2025-11-27 22:12:09', '2025-11-27 22:12:09'),
(5, 6, 'yes', 'large', 'no', NULL, 'no', NULL, 'yes', 'factory', 'no', NULL, 'no', NULL, 'yes', '2025-11-27 22:14:10', '2025-11-27 22:14:10'),
(6, 7, 'yes', 'large', 'yes', 100, 'yes', 20, 'yes', 'open_spaces', 'yes', 'industrial', 'yes', 'static', 'yes', '2025-11-27 22:17:12', '2025-11-27 22:17:12'),
(7, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:18:17', '2025-11-27 22:18:17'),
(8, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:19:16', '2025-11-27 22:19:16'),
(9, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:34:41', '2025-11-27 22:34:41'),
(10, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-27 22:37:46', '2025-11-27 22:37:46'),
(11, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 20:43:35', '2025-11-29 20:43:35'),
(12, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 20:53:17', '2025-11-29 20:53:17'),
(13, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 20:54:58', '2025-11-29 20:54:58'),
(14, 15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:04:02', '2025-11-29 21:04:02'),
(15, 16, 'yes', 'large', 'no', NULL, 'no', NULL, 'yes', 'open_spaces', 'yes', 'industrial', 'no', NULL, 'yes', '2025-11-29 21:05:52', '2025-11-29 21:05:52'),
(16, 17, 'yes', 'large', 'yes', 8, 'yes', 10, 'yes', 'open_spaces', 'yes', 'industrial', 'yes', 'static', 'yes', '2025-11-29 21:09:12', '2025-11-29 21:09:12'),
(17, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-11-29 21:23:39', '2025-11-29 21:23:39'),
(18, 19, 'yes', 'small', 'no', NULL, 'no', NULL, 'yes', 'open_spaces', 'yes', 'industrial', 'yes', 'static', 'yes', '2025-11-29 21:55:24', '2025-11-29 21:55:40'),
(19, 20, 'yes', 'large', 'no', NULL, 'no', NULL, 'no', 'open_spaces', 'yes', 'industrial', 'yes', 'static', 'yes', '2025-11-29 21:58:26', '2025-11-29 22:04:59'),
(20, 21, 'yes', 'large', 'no', NULL, 'no', NULL, 'yes', 'open_spaces', 'yes', 'industrial', 'yes', 'static', 'yes', '2025-12-01 18:18:38', '2025-12-01 18:18:38'),
(21, 22, 'yes', 'large', 'yes', 150, 'no', 316, 'no', 'factory', 'yes', 'industrial', 'yes', 'dynamic', 'no', '2025-12-01 18:43:53', '2025-12-01 18:43:53'),
(22, 23, 'yes', 'large', 'no', NULL, 'no', NULL, 'yes', 'factory', 'yes', 'electronic', 'yes', 'dynamic', 'yes', '2025-12-01 18:46:25', '2025-12-01 18:46:25'),
(23, 24, 'yes', 'large', 'no', NULL, 'no', NULL, 'no', NULL, 'yes', 'industrial', 'yes', 'static', 'yes', '2025-12-01 18:48:08', '2025-12-01 18:48:08'),
(24, 25, 'yes', 'large', 'yes', 44, 'yes', 44, 'yes', 'open_spaces', 'yes', 'industrial', 'yes', 'static', 'yes', '2025-12-01 20:30:33', '2025-12-01 20:30:33'),
(25, 27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 14:08:56', '2025-12-05 14:08:56'),
(26, 28, 'yes', 'small', 'no', 114, 'no', 357, 'yes', 'open_spaces', 'no', 'industrial', 'yes', 'dynamic', 'yes', '2025-12-05 16:15:28', '2025-12-05 16:15:28'),
(27, 29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 16:27:59', '2025-12-05 16:27:59'),
(28, 30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 16:28:49', '2025-12-05 16:28:49'),
(29, 31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 16:29:38', '2025-12-05 16:29:38'),
(30, 32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 16:52:21', '2025-12-05 16:52:21'),
(31, 33, 'yes', 'small', 'no', 725, 'yes', 45, 'no', 'open_spaces', 'no', 'industrial', 'yes', 'dynamic', 'yes', '2025-12-05 17:35:58', '2025-12-05 17:35:58'),
(32, 34, 'yes', 'small', 'yes', 587, 'yes', 679, 'yes', 'open_spaces', 'yes', 'electronic', 'yes', 'dynamic', 'no', '2025-12-05 17:37:03', '2025-12-05 17:37:03'),
(33, 35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 17:51:50', '2025-12-05 17:51:50'),
(34, 36, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 17:52:51', '2025-12-05 17:52:51'),
(35, 37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 18:06:38', '2025-12-05 18:06:38'),
(36, 38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 18:40:43', '2025-12-05 18:40:43'),
(37, 39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-05 18:53:10', '2025-12-05 18:53:10'),
(38, 40, 'yes', 'large', 'yes', 522, 'yes', 930, 'yes', 'land_space', 'no', 'electronic', 'no', 'static', 'yes', '2025-12-07 21:18:38', '2025-12-07 21:18:38'),
(39, 41, 'yes', 'large', 'no', NULL, 'no', NULL, 'yes', 'open_spaces', 'yes', 'industrial', 'no', NULL, 'no', '2025-12-10 19:46:44', '2025-12-10 19:46:44'),
(40, 42, 'yes', 'large', 'yes', 921, 'no', 109, 'yes', 'factory', 'no', 'electronic', 'no', 'static', 'no', '2025-12-10 20:10:56', '2025-12-10 20:10:56'),
(41, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-16 19:32:28', '2025-12-16 19:32:28'),
(42, 45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-16 21:00:32', '2025-12-16 21:00:32'),
(43, 46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-19 13:57:27', '2025-12-19 13:57:27'),
(44, 47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-24 18:50:45', '2025-12-24 18:50:45'),
(45, 48, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-12-26 16:45:07', '2025-12-26 16:45:07');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_04_095607_add_two_factor_columns_to_users_table', 1),
(5, '2025_09_17_105237_create_cost_profit_ranges_table', 1),
(6, '2025_09_18_110049_create_ideas_table', 1),
(7, '2025_09_18_110057_create_idea_costs_table', 1),
(8, '2025_09_18_110101_create_idea_profits_table', 1),
(9, '2025_09_18_110113_create_idea_resources_table', 1),
(10, '2025_09_18_110121_create_idea_expenses_table', 1),
(11, '2025_09_18_110125_create_idea_contributions_table', 1),
(12, '2025_09_18_110131_create_idea_returns_table', 1),
(13, '2025_09_18_110139_create_attachments_table', 1),
(14, '2025_09_18_195921_create_investors_table', 1),
(15, '2025_09_18_200143_create_investor_resources_table', 1),
(16, '2025_09_18_200836_create_investor_contributions_table', 1),
(17, '2025_11_26_143207_create_countryables_table', 1),
(18, '2025_12_05_192125_add_user_id_to_investors_table', 1),
(19, '2025_12_06_192040_add_user_id_to_ideas_table', 1),
(21, '2025_12_21_204526_add_approval_columns_to_ideas_table', 2),
(22, '2025_12_21_214957_add_approval_columns_to_investors_table', 3);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('10TsYjDKklnCcZM1iq1NseG4FjlpGXyhnlDQWf4y', NULL, '2620:96:e000::cd', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOVZiQ3dZNXJjdGFNVUZmNHJjNzE4SWlUZ0RqQjV6RkdWRkRKdWxTbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768609483),
('17spbm394NnmHlTshoOqfFZHlS8olNuPyquGq2jy', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMzhlNVNsQnVkTWNUdmZ3WFd1NmZKMzJ0eHdwb0c2ckRkbTE3enFVTSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768836629),
('2cNzYuW6kI49KzFyOP9WO5Ui0VfcUIuB9ZZWArDC', 1, '156.197.126.116', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36 Edg/144.0.0.0', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiZm1tNEdEWE1mZDRHMEROSkg0cEVVYWE5YnFsRXlCSTRmSUZLVnZMRiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMyOiJodHRwczovL2thcmVlbS5ob3NzYW0uaW5mby9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoibG9jYWxlIjtzOjI6ImFyIjtzOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTU6ImN1cnJlbnRfaWRlYV9pZCI7aTozNjtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJHdKMVJLeXd2Zi9BaDB1bjJhWmtLNnVXcHBEWDJicXoweVdnY3hmTUZFekNuVTNnRnVZMWlDIjtzOjY6InRhYmxlcyI7YTozOntzOjQwOiIyNzg1MTlmNjA2YTZjYzQxOTI5ODEzYjI2ZGY1ODQ1YV9jb2x1bW5zIjthOjk6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyOiJpZCI7czo1OiJsYWJlbCI7czoxOiIjIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiaWRlYV9maWVsZCI7czo1OiJsYWJlbCI7czoyMToi2YXYrNin2YQg2KfZhNmB2YPYsdipIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo5OiJ1c2VyLm5hbWUiO3M6NToibGFiZWwiO3M6MjE6Iti12KfYrdioINin2YTZgdmD2LHYqSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MjU6Itiq2KfYsdmK2K4g2KfZhNiq2YLYr9mK2YUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJwcm9maXRfdHlwZSI7czo1OiJsYWJlbCI7czoxNDoi2KfZhNij2LHYqNin2K0iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6ImNvc3RfdHlwZSI7czo1OiJsYWJlbCI7czoxNjoi2KfZhNiq2YPYp9mE2YrZgSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTc6ImNvdW50cmllcy5jb3VudHJ5IjtzOjU6ImxhYmVsIjtzOjEwOiLYp9mE2K/ZiNmEIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo2OiJzdGF0dXMiO3M6NToibGFiZWwiO3M6MTI6Itin2YTYrdin2YTYqSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjg7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MjU6Itiq2KfYsdmK2K4g2KfZhNiq2YLYr9mK2YUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9fXM6NDA6ImU2NDQ4MzNmNGU0ZTA4NzEyMzE1ZGE3MWIzM2ZhY2QyX2NvbHVtbnMiO2E6OTp7aTowO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjQ6Im5hbWUiO3M6NToibGFiZWwiO3M6MTA6Itin2YTYp9iz2YUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToxO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6ImVtYWlsIjtzOjU6ImxhYmVsIjtzOjMzOiLYp9mE2KjYsdmK2K8g2KfZhNil2YTZg9iq2LHZiNmG2YoiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aToyO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjU6InBob25lIjtzOjU6ImxhYmVsIjtzOjE5OiLYsdmC2YUg2KfZhNmH2KfYqtmBIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo5OiJqb2JfdGl0bGUiO3M6NToibGFiZWwiO3M6MTQ6Itin2YTZiNi42YrZgdipIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MDt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjE3OiJyZXNpZGVuY2VfY291bnRyeSI7czo1OiJsYWJlbCI7czoyMzoi2K/ZiNmE2Kkg2KfZhNil2YLYp9mF2KkiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEwOiJiaXJ0aF9kYXRlIjtzOjU6ImxhYmVsIjtzOjI1OiLYqtin2LHZitiuINin2YTZhdmK2YTYp9ivIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MDt9aTo2O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjY6InN0YXR1cyI7czo1OiJsYWJlbCI7czoxMjoi2KfZhNit2KfZhNipIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo0OiJyb2xlIjtzOjU6ImxhYmVsIjtzOjE2OiLYp9mE2LXZhNin2K3ZitipIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6ODthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiY3JlYXRlZF9hdCI7czo1OiJsYWJlbCI7czoyNToi2KrYp9ix2YrYriDYp9mE2KrYs9is2YrZhCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjA7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjE7fX1zOjQwOiIyNDFlMmYxNjdiMGVmMGI2MzNlYmYxMzkyNWUzYzkwMV9jb2x1bW5zIjthOjk6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoyOiJpZCI7czo1OiJsYWJlbCI7czoxOiIjIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MTthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoiaWRlYV9maWVsZCI7czo1OiJsYWJlbCI7czoyMToi2YXYrNin2YQg2KfZhNmB2YPYsdipIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo5OiJ1c2VyLm5hbWUiO3M6NToibGFiZWwiO3M6MjE6Iti12KfYrdioINin2YTZgdmD2LHYqSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjM7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MjU6Itiq2KfYsdmK2K4g2KfZhNiq2YLYr9mK2YUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo0O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjExOiJwcm9maXRfdHlwZSI7czo1OiJsYWJlbCI7czoxNDoi2KfZhNij2LHYqNin2K0iO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9aTo1O2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjk6ImNvc3RfdHlwZSI7czo1OiJsYWJlbCI7czoxNjoi2KfZhNiq2YPYp9mE2YrZgSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjY7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTc6ImNvdW50cmllcy5jb3VudHJ5IjtzOjU6ImxhYmVsIjtzOjEwOiLYp9mE2K/ZiNmEIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6NzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo2OiJzdGF0dXMiO3M6NToibGFiZWwiO3M6MTI6Itin2YTYrdin2YTYqSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjg7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTA6ImNyZWF0ZWRfYXQiO3M6NToibGFiZWwiO3M6MjU6Itiq2KfYsdmK2K4g2KfZhNiq2YLYr9mK2YUiO3M6ODoiaXNIaWRkZW4iO2I6MDtzOjk6ImlzVG9nZ2xlZCI7YjoxO3M6MTI6ImlzVG9nZ2xlYWJsZSI7YjowO3M6MjQ6ImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI7Tjt9fX19', 1768749257),
('5dlAXxHZsVX0IP2xXe3a0idLOXud53gkGH04nt4E', NULL, '3.18.186.238', 'air.ai/scanning Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQmdkdDJXeXd3aURDTlBCNFF0VHQ5M1NONUVRMXEzRjZ2TklSZ0Y2cyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768921243),
('8ImwZxvbIbuPl2MtvWh2MFknNd0rJfKWRTTWodd9', NULL, '114.122.103.222', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicjdON3IwalVyR0NZell4WDlXaDNhTjczV1p5S0NGRzVLaGIySm92QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768972311),
('9SdDVsbRIZLnXfuYI8HdtJdAFVUoHvmhPjc5T3LD', NULL, '179.34.166.211', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZDY4ekVtdFlqeWNjOTJROGQ5clc4dlZCVGM3RW5kdnVzUzNlclB4VyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768347179),
('a0u574XbmJOAPokGPIYHjBzSeEYhDv5xkc0fJYvQ', NULL, '165.154.205.34', 'python-requests/2.25.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibnBXc0tBZHJFdUxpelFVV29qdGkwVmVsUFlWSzBvTHlCNDhleG81WCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768533542),
('ANzHOv8xg9o3QX6eOPMEgkzwBP1Sm7rJxdmCyEUD', NULL, '2620:96:e000::10c', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicHRNRlRPVGtacWNwTU9iRlAwckFBQU9GUGpEaUxnSFJSY0ZUSVUyaiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI1OiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768611581),
('ApNAfjuj0mqayAdD6lLYXu46xGfCSXp8lAm1sOZz', NULL, '164.92.209.69', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibFVxN3BMekozdHJ4WEttT3U2NHlseGZNb2pOemdwQnBLY2szNkFEZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768846706),
('B599OCGqineNgTWkNnYyJlDYnB5TkzZx0mer3DYt', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaEdNTXBPbEN6cG5oM3dSdUIzR1BHdm9pU3lHd214NWw0NVlnRFBncCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768661456),
('BFA42yKyuZ86kSHZjURCCM06nkl0dKy6iBwmIBiE', NULL, '205.210.31.42', '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMmZ2dDJqczdrTWNkRmJYbWNDYmNDQTN2M2J1Nzd2MmFDOGV0b0ZTVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768828252),
('bhCQ3GvgEkbUIugcuGZzSLWz9bnpLwwoI4xd2Y8w', NULL, '18.143.151.190', 'python-requests/2.32.4', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUTQ4Nmo5dkI2a2RXaW5mWWdNSUVnV1ZBbUZ4SGxTcFFxS2JWN0l6USI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2FkbWluL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768779762),
('bhrw14TY4mVrmOB7WaTI5uPjn3UTB2YlZ8fB7vJl', NULL, '50.6.228.103', 'python-requests/2.32.4', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTlFzRTE0ZUQ0ZlJ1ZmVEWk5XUmw1U2x4M2xGVG5aSDlaekRiWFRsbCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768985845),
('CbeQnyQzulW3UTt9E2wol461QvP0QPDYefpjTZvZ', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNW9DYzZLb0NEMFRhcEViRGV1S0JHc2tMVWlORGU4bk9hdVVDRFdpTyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768779349),
('D9bojgwglL04JIU9CqZolUDTUkI7uPwndOHejsAu', NULL, '23.163.8.29', 'python-requests/2.31.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNE1lT3RGZGtBQUFBUHpNZ0pUd0NFRVZXYzF0aU96b0FscmJHbkIwZSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768989428),
('e1fVJ5uARhAZAT3fI4cA8K7pVgeCYzdAk4QnS3Q4', NULL, '45.82.78.110', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.4 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN01JakFnUGN3S1R2S1ZhWGtVeWZtWnk3d3E1Z0tlYU9TUXJGczhQcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768549438),
('EKX9wgRicN9206aWfS58qwdusl8QfmHGPHJhPPKb', NULL, '205.169.39.6', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.5938.132 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidFc3Z2lCQ0Vwekdmb0Q0RXEycncyQUJyeEsyQVhoZVJFMlBvRHdmQyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU4OiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xpdmV3aXJlL2xpdmV3aXJlLmpzP2lkPWRmM2ExN2YyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768672941),
('FhLvxOZ9XRO5GG3SrzcGpFMKY1ePoLcOeWll7Uyu', NULL, '194.31.64.9', 'python-requests/2.28.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRUFoeDdEMkJDY0RLejJDODJFV0Y1UHF0Z1JranUzeUZ1ZUtRa21lZSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768364602),
('gmcJnqBSDgyQiDAJuOq3GHxuX4Spa5dyUP1UO0jE', NULL, '194.31.64.9', 'python-requests/2.28.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRk9GMERldTI4Q28wUkFCcGkwMkNRb3RKT3NmbjRGSU4yNFJUcUNHQiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768423262),
('hF4lwogc0UqYANMmaa2hkRFk1GfgOgx0lygFZPsg', NULL, '205.169.39.151', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTUIwWm4zeXdVRkpSNzNQcGJMTk10ZXlGeWR1d2ZKOG0yQ000Nk9mSCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU4OiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xpdmV3aXJlL2xpdmV3aXJlLmpzP2lkPWRmM2ExN2YyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768672931),
('Hg6o2IG7sYyUUgc7VIjK82PJFoDmkjO5A5X78WHK', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0xnR09LYVY1TXRuYzVGYlJMUWQzandxbFBVUWFXNHdHTEY3RHkzMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768661458),
('hkjfwXl0B87FL5HCm9nBcfhWhM4DoRnQR4R8FYrK', NULL, '85.208.96.209', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ3d4SW1ReTJrZnIzSzQ2VGpBcDhONE43anVvNGt2MzJjblcwaWJIWCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768638175),
('hZqKu1XHcoFcfhOyhifcAI5ErO3NF01cNh98QR4T', NULL, '2a14:7c1::2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMGZkVkpGNlRaVjltMzBGSGxrUUticHFFekR2SEhrbjRuTE9YYlljUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768781254),
('ilEjxqnLykH6Xsuc9Vy1GcwmAOuRm6WNG8fFlbXN', NULL, '18.143.151.190', 'python-requests/2.32.4', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUjRpVG00OTZLTHhVT1lWMDZ1cVNhSmJPdm5DdG1ONnhPNWJxRjhUdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768945310),
('iNo2BqtgXhCleq90WGYzz3tfIJLYLAMvhKsWKNR8', NULL, '156.241.130.87', 'python-requests/2.25.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieW5FdWk4cTFQbUtQSUNzSlVuOENKd1RyUmZ5ZGtRc0V5VUlsWGY1MiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768982524),
('j0FM8SJ9YNFaFaFUZRRII9hz5Tn0OZiE8HTuNEPR', NULL, '195.178.110.155', 'Mozilla/5.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRFdoS0JXWmpTYzZmcjdIRWw2UGFvaGNBTlF4RnN0RDk2UTB5MmhiSiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768497780),
('j5dthWJFV6vBXFX1WcVNrHrxwdkBrZ0DvJk2sFcN', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN2syalQ1alFMMnpQbEtWTHpJUkNVV3FJRnFwd0F3TWI5cGpIWDhMZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768971018),
('jByrOqJ4iPeIw1gN28II6piwcTRq4FBq0hv8oOLz', NULL, '18.143.151.190', 'Apache/2.4.34 (Ubuntu) OpenSSL/1.1.1 (internal dummy connection)', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiMndBTGRsaGhWRnNBQVpWNEFmODFDckZQeWRpR09hbURxNjB4ZERhdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768897864),
('jDJjs5kDU4LyaLGQ3KuJdimqwB1wb2WMRGo28zwh', NULL, '205.210.31.52', '', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSmxEc01reWdTSlZJNDREMU1BbzVRbzlqNVYwU2I3VmUxajBzT0ZPNiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768652019),
('KlpmlkD3sWGZXoPuuXqds7OTz5kljKsSgJUDWWXv', NULL, '205.210.31.42', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYkV1SWcwaXM4QlBVdUhvQ1FUa1BpY08xaU5pS1FxSXFhdWRmdkNMZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768828253),
('L7DEUyheWiEfEeEf2EoeXFBxq9SYZvsJ9tW5GX3i', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWTJCRWNsM0hhMVM3NzN6Qm1RSXlpOEZKaEN5TnpPOGhUREVUME9pbCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768877612),
('LcaUFTHJUISwfbKRh2eapWvllpgpX4riRDA5RC78', NULL, '2620:96:e000::10c', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYzJQb0xRb0pCNmtZTUlMVmtGMEVaUmhuUGZiMVlCdXhwdG5rZnZ1UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768611596),
('LmwMfyDU9iDHJ33I3MOjxGATHjTRFRLcWkZg2kdb', NULL, '18.143.151.190', 'Apache/2.4.34 (Ubuntu) OpenSSL/1.1.1 (internal dummy connection)', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiOUs4ME84Yk5IenJqNGxmaG1hVGl1OU9RT3c3Rkw5Q0x3aDhDZmlyVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768499743),
('lPR1LiPenm1ioou7QDpqsBSR65syPdCzreMt1OXI', NULL, '18.143.151.190', 'Apache/2.4.34 (Ubuntu) OpenSSL/1.1.1 (internal dummy connection)', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNHp2OWc2R3NKTnVJS1JISmFWc1JFekFmOXVHM3o2UThvbXBiRWJqZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768823878),
('mrY5WZBrpSK5HepOkaB2l8P7KGJDdjpkxlKyjMBe', NULL, '174.138.24.103', 'Apache/2.4.34 (Ubuntu) OpenSSL/1.1.1 (internal dummy connection)', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiZmlxUmlsOTR5ZnlKTUJJYXJHbnhXWFNTWnM5MWJOV2ZrVlZCQWlmaCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768404705),
('mZ6abVLyOWinmADrcbQvVCYRRUK6Vo0ISO5zI4Sv', NULL, '147.185.132.37', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia2U3VlNvZzk4Ykk3S0FRZEZ0QVZkUVpRbWVNZjFWRGFaUk4xemZ2TiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768858085),
('n23eaPPOndzMpLD9pUBZq9CSI3ryNzXeib0GopoD', NULL, '185.191.171.15', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRzI4SEVaQ3llWURGUlcyQXMzcEdLSWd6c3lZaEFMelh0ZzRWcXl5MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2ZvcmdvdC1wYXNzd29yZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768878748),
('n4B77rfBZRACBY9bbKZLbwa9eBcUeuAdVmTPg3ew', NULL, '23.163.8.29', 'python-requests/2.31.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoialdaQTVobnRTc2lsdFZQYk84ejI2azdJalBHeXBadUVKVkQwRmNtMCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768989428),
('NrQdM59BxWxVuXoM8YmINL2GBYJo1mKQRco7XrmJ', NULL, '156.241.130.87', 'python-requests/2.25.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRENnY0N3RnpJRjNnQTBycUZwSzNlZ1VZMTFjU1RWbXh6OVpyZWExeiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768982522),
('nvrmoXD6j20bjC9Qq1Y2F5VYV1qm62kObriBEygc', NULL, '50.6.228.103', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVnU0dDZqSVRqMVEzN0ZHTVhHcFlqS3AzNngyUXNWNDRaSXllVVpaSCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768985844),
('NZbu1NuHLQv9xEoBje5WLrrTbPy8ii9Z2F4x0oh9', NULL, '205.210.31.52', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYU9jcW0zZFVFNThkd1U4NVRMck5DUnAxY3YwRGxDYjBVeXFaWWVaciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768652020),
('oGaLQXys2Rfo665TXFu6vqvhjhb9Nec0ZUs2r6sh', NULL, '107.172.180.205', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 15_7_3) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0 Safari/605.1.15', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidnFzSXNqYXZUY01GUWhhWVJZeTJ6WjA1UHVDeE41ZHU0RnRkMnAwbCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI1OiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768914939),
('OR9zT5FW60XnSsaTk3s7ocw6A28Dgb0yY8aCSPc3', NULL, '2620:96:e000::cd', 'Mozilla/5.0 (compatible; CensysInspect/1.1; +https://about.censys.io/)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYXpYZVpwblpGSVU5RFJKTzRvQTdTVW5wNThhdGJSMmhtTmFTYkxMZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768609481),
('OXv6ry18R0cnLTL0nXYXlE5b6Qrl3W26zdyXtJf8', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU3dnRDlHcEtFc01nZ1lrOThKVDJuSmhrOGcxNkF4VkpGNmROa1RNaCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768751872),
('p36KWT1Yd1xqSDcW059DqbltqCeyFDkPEa86WBcT', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidm40QWg0T2ZIZ0pKTjg3VnA0NFdxUmxMbjhsb2hNTnRHb0RqU01MaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768572573),
('qkwInnrIPu2kVmGVIbjDzjHrWiHlKLaOhJGi78rx', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWm5UdDZUUWhxaTVhamlPRXYyY001dUFQSEhRNDhObmE2S090TDFnNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2FkbWluL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768661462),
('QrIpO4rq7w8NEF1hjpu3iXNacMpup0iquKI7ihZm', NULL, '74.7.227.165', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.3; +https://openai.com/gptbot)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOTRCQmVPdm44bk1FN2tUWjlWTGd5dVpZbUFYY0o5aWlLeTlwNUdwSiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768905416),
('QT5bs0WxaUTtrVnlMdUcg6KXFE6hBsF45gcOt7JL', NULL, '185.191.171.12', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaU1wSWVPR2xUWmdoanFOVWdyb0hkUDJzVEpYR01LVnhwQWpQUGNoViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL3JlZ2lzdGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768861980),
('RXzt0xkM4PbK8UYOh2oi9cw7xv1ROPlFMohcRQl5', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTHV1c3Y1dndZRVpuandXS0hzakpHeVhRQU5PQnJNSEtwSkZlZTNjTSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768921303),
('RZQqH2mKnVdM4MkuCQazRpuDwAUhoyDI68Q6h5aF', NULL, '34.223.83.25', 'Mozilla/5.0 (compatible; wpbot/1.4; +https://forms.gle/ajBaxygz9jSR8p8G9)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieDM1Rk1XclpQQnUyVzRrbEd3SWR6R3JoZEFESVR6VVVrekNvNlBUaiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768353019),
('SQR6atoTrv05BVas3om8ZOjRI1Lfs0TP5ymEKdEG', NULL, '107.172.180.205', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 15_7_3) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/26.0 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibDBmMGhSaDhDTGxIOWxwM0tJMURsRFJpbmNlcXRBbW9UdFlFMjNleiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768914940),
('tkntxoUR7V0A8S4LAHfZfLRxf3V4cizT9gzjTLJ9', NULL, '34.122.147.229', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibVMxWTV3TnI4MENiRkp6TW1wYWdON2RMUkM3OVpUaHdaRzhEeHBQTyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU4OiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xpdmV3aXJlL2xpdmV3aXJlLmpzP2lkPWRmM2ExN2YyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768672920),
('TS3rn0xnizrxScY66yU4ECQ2Guh70lqxRTWd4K9X', NULL, '194.31.64.9', 'python-requests/2.28.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidnhPTlZBNGY5OHREUUxlcU8yN2kyaEYwTkpOQWhrb3BWbkRrVHlzWSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768374830),
('Uq8S5255XeegmTyh8AgCz6yKzzNmUGMmDLKvapsc', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUTY3VHd1TmhncUFENWU0eEVvNzNiODNvVno1bXdLc2lPblhTbnQ3bCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2FkbWluL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768572577),
('uvFmUTYck2lK6tzNgrwGrdrZbMVbgNPUvGEtREM4', NULL, '3.18.186.238', 'air.ai/scanning Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUHJGb3N4NzJock1iVHpSMWtKZVhCNFVTWlFoSVNiMTU5NGpPa1ZaVSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768921243),
('V5j1Ack3GxZEeYSkZ3skyy8829NyFlPVKw2GCu97', NULL, '156.239.14.36', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVmhHTzI0cGRwUk9tU3UxejBsUUFTQWVZelJCUnVWTnFnUkhUR0IyVCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768572572),
('vSlGCknGt9ILvhkcxfyzpjMSdU9675uNAODm9U1u', NULL, '156.197.80.94', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_6_2 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.6 Mobile/15E148 Safari/604.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaUpURjhmdkxDenlXMmhWU0lJSlNsUldFanFFb2pYeDhxVlh2SzdmZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo1OToiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbGl2ZXdpcmUvbGl2ZXdpcmUuanM/aWQ9ZGYzYTE3ZjIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768858165),
('VsTMjgHhyReeRLjWt68j1hFNBUQBpEXl21lbAhY0', NULL, '18.143.151.190', 'python-requests/2.32.4', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVVDVkI5aEVEQ0NiUEY1Y0NPclBTQXZyeGw4MU1CYjFyMW9qRTFUMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL3JlZ2lzdGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768858358),
('vv1SP1PAu78KGiMMYgOVTZZmdmVwTflmagKxBcKd', NULL, '85.208.96.203', 'Mozilla/5.0 (compatible; SemrushBot/7~bl; +http://www.semrush.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic3VGdldLUHR1Y3NzVll5bGVaNllxdlZvbGhkRVhDU0ZyNlJ5bFpzNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768638177),
('xTQLTyzP3Jucvo5rtX2UaLckxzLbmRRrCuddvM6v', NULL, '2a14:7c1::2', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.3', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOTcyVXJuTkRwOFBjMnFtbnNKb3ZvcDZuUTJtWG00Sm1zZ3VoaU1LUyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768781253),
('y18W4m0QWBkdwq6RjEkxJXMqtNHVVRg4ubxh1dlW', NULL, '164.92.209.69', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSkQ5VWRMWE5rMTV6TkRCaFhCVHZlQkUyak50NEhKVzB2WFUxcUxIdiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768846705),
('YO5XIFDaNKznl9JnVWU8mw7TRi4qMXFVNGTWJg4n', NULL, '34.147.28.155', 'Scrapy/2.13.4 (+https://scrapy.org)', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibGRxb0VZTEdhSmVMQnp3WFRnbEtyRlhaVnVNUVV3cWxLWHZTdnZ3OSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768861260),
('zchzHMvG1yz4lP7JsufIK4BFRgywKTt6JWnn7rzg', NULL, '146.190.253.199', 'python-requests/2.28.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV21lTjZWTFpUUGxWT0N3akFkZEVlcUFDR0xSWXNGNm5vck81VDh0cCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768689843),
('Zm70A6UISOl66uSYhdKDd07kj63cGUZ6sX2kpwCj', NULL, '205.210.31.103', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia09Kc05EYm1xcENlRFVMN0pwNlJQUkU2WFJiRlZUVkc1MDNCakpGRCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768607063),
('Zr6IqdsoRVwMxWn3CqFQImBcFZjUNCXWIIQbFZu9', NULL, '194.31.64.9', 'python-requests/2.28.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSW9lMGVKTUp5ZUJZWVpiMDhYUXFiT0RxVE1aSnM4Mm9Vd0VwanZOaiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768414189),
('zSMP4vIWsVGa9hjaVI7UV2GZzYp27Ma2JaMhzx1d', NULL, '194.31.64.9', 'python-requests/2.28.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQUZzcG5JMUFvMjM2Z0dKbU54TUlYV3RqcU5CbWdlZHRXNWJjV0xPZSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2thcmVlbS5ob3NzYW0uaW5mbyI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768397703),
('zvZ4pw14Y764pUgUwutRGpjjFvbvy8Cg8cVSJRPM', NULL, '146.190.253.199', 'python-requests/2.28.1', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoieWpmVGVQc2RtemdVcFZTQjV3N3VkdFg1Y1BnclJOM2ZQRHZoV0FTTiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8iO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozMjoiaHR0cHM6Ly9rYXJlZW0uaG9zc2FtLmluZm8vbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768751989),
('ZXZlDgWAuD2vVYD1vQYRW9Q3jH3EURDqZn6NecWb', NULL, '62.33.49.147', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:121.0) Gecko/20100101 Firefox/121.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXFJUUVFMzNLeXJQUGR1cmFidGdPMGF4eUkxcE40TnZYT1VEQmNrQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8va2FyZWVtLmhvc3NhbS5pbmZvL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768347180);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `job_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `residence_country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `birth_date` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `job_title`, `residence_country`, `status`, `role`, `birth_date`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'kareem', 'admin@admin.com', '01065056616', '2025-12-19 16:28:38', '$2y$12$wJ1RKywvf/Ah0un2aZkK6uWppDX2bqz0yWgcxfMFEzCnU3gFuY1iC', NULL, NULL, NULL, 'lawyer', 'DZ', 'active', 'admin', '1990-05-15', 'JvaJOdODzuGn0bOna6dULvfS1vrG5A23O8IO8DRQlteJPlDn3sj9zCzW0u5O', '2025-12-19 16:28:39', '2025-12-19 18:39:26'),
(2, 'محمد', 'mo@admin.com', '01026536998', NULL, '$2y$12$/Vrve5IvmwRQr5tpHcPzwuNndRZrBRGGuOXtRnGaAmm0ip48fMMmS', NULL, NULL, NULL, 'مبرمج', 'PS', 'active', 'user', '2025-12-24', NULL, '2025-12-19 17:14:15', '2025-12-19 21:40:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attachments_attachable_type_attachable_id_index` (`attachable_type`,`attachable_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cost_profit_ranges`
--
ALTER TABLE `cost_profit_ranges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countryables`
--
ALTER TABLE `countryables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countryables_countryable_type_countryable_id_index` (`countryable_type`,`countryable_id`),
  ADD KEY `countryables_country_index` (`country`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ideas`
--
ALTER TABLE `ideas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ideas_user_id_foreign` (`user_id`),
  ADD KEY `ideas_approved_by_foreign` (`approved_by`),
  ADD KEY `ideas_status_index` (`status`);

--
-- Indexes for table `idea_contributions`
--
ALTER TABLE `idea_contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_contributions_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `idea_costs`
--
ALTER TABLE `idea_costs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_costs_idea_id_foreign` (`idea_id`),
  ADD KEY `idea_costs_range_id_foreign` (`range_id`);

--
-- Indexes for table `idea_expenses`
--
ALTER TABLE `idea_expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_expenses_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `idea_profits`
--
ALTER TABLE `idea_profits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_profits_idea_id_foreign` (`idea_id`),
  ADD KEY `idea_profits_range_id_foreign` (`range_id`);

--
-- Indexes for table `idea_resources`
--
ALTER TABLE `idea_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_resources_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `idea_returns`
--
ALTER TABLE `idea_returns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idea_returns_idea_id_foreign` (`idea_id`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investors_user_id_foreign` (`user_id`),
  ADD KEY `investors_approved_by_foreign` (`approved_by`),
  ADD KEY `investors_status_index` (`status`);

--
-- Indexes for table `investor_contributions`
--
ALTER TABLE `investor_contributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investor_contributions_investor_id_foreign` (`investor_id`);

--
-- Indexes for table `investor_resources`
--
ALTER TABLE `investor_resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investor_resources_investor_id_foreign` (`investor_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cost_profit_ranges`
--
ALTER TABLE `cost_profit_ranges`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `countryables`
--
ALTER TABLE `countryables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ideas`
--
ALTER TABLE `ideas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `idea_contributions`
--
ALTER TABLE `idea_contributions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `idea_costs`
--
ALTER TABLE `idea_costs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `idea_expenses`
--
ALTER TABLE `idea_expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `idea_profits`
--
ALTER TABLE `idea_profits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `idea_resources`
--
ALTER TABLE `idea_resources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `idea_returns`
--
ALTER TABLE `idea_returns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `investor_contributions`
--
ALTER TABLE `investor_contributions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `investor_resources`
--
ALTER TABLE `investor_resources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ideas`
--
ALTER TABLE `ideas`
  ADD CONSTRAINT `ideas_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `ideas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `idea_contributions`
--
ALTER TABLE `idea_contributions`
  ADD CONSTRAINT `idea_contributions_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `idea_costs`
--
ALTER TABLE `idea_costs`
  ADD CONSTRAINT `idea_costs_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `idea_costs_range_id_foreign` FOREIGN KEY (`range_id`) REFERENCES `cost_profit_ranges` (`id`);

--
-- Constraints for table `idea_expenses`
--
ALTER TABLE `idea_expenses`
  ADD CONSTRAINT `idea_expenses_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `idea_profits`
--
ALTER TABLE `idea_profits`
  ADD CONSTRAINT `idea_profits_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `idea_profits_range_id_foreign` FOREIGN KEY (`range_id`) REFERENCES `cost_profit_ranges` (`id`);

--
-- Constraints for table `idea_resources`
--
ALTER TABLE `idea_resources`
  ADD CONSTRAINT `idea_resources_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `idea_returns`
--
ALTER TABLE `idea_returns`
  ADD CONSTRAINT `idea_returns_idea_id_foreign` FOREIGN KEY (`idea_id`) REFERENCES `ideas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `investors`
--
ALTER TABLE `investors`
  ADD CONSTRAINT `investors_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `investors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `investor_contributions`
--
ALTER TABLE `investor_contributions`
  ADD CONSTRAINT `investor_contributions_investor_id_foreign` FOREIGN KEY (`investor_id`) REFERENCES `investors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `investor_resources`
--
ALTER TABLE `investor_resources`
  ADD CONSTRAINT `investor_resources_investor_id_foreign` FOREIGN KEY (`investor_id`) REFERENCES `investors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
