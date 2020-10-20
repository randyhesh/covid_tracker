-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2020 at 05:50 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `publish_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `publish_status`) VALUES
(1, 'Colombo', 1),
(2, 'Minuwangoda', 1),
(3, 'Katunayaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `daily_cases`
--

CREATE TABLE `daily_cases` (
  `id` int(11) NOT NULL,
  `reported_date` date DEFAULT NULL,
  `detected_province_id` int(11) DEFAULT NULL,
  `detected_district_id` int(11) DEFAULT NULL,
  `detected_city_id` int(11) DEFAULT NULL,
  `patient_name` varchar(2000) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nationality` varchar(1000) DEFAULT NULL,
  `status` varchar(1000) DEFAULT NULL,
  `place_of_death` varchar(3000) DEFAULT NULL,
  `date_of_death` date DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daily_cases`
--

INSERT INTO `daily_cases` (`id`, `reported_date`, `detected_province_id`, `detected_district_id`, `detected_city_id`, `patient_name`, `gender`, `dob`, `nationality`, `status`, `place_of_death`, `date_of_death`, `deleted_at`, `created_at`, `created_by`, `updated_at`) VALUES
(1, '2020-10-15', 1, 1, 1, NULL, 'M', '2020-10-18', NULL, 'CONFIRMED_CASE', NULL, '2020-10-18', NULL, '2020-10-18 00:09:57', NULL, NULL),
(2, '2020-10-15', 1, 2, 1, NULL, 'M', '2020-10-18', NULL, 'DIED', NULL, '2020-10-18', NULL, '2020-10-18 00:09:57', NULL, NULL),
(3, '2020-10-16', 1, 1, 1, NULL, 'F', '2020-10-18', NULL, 'RECOVERED_DISCHARGED', NULL, '2020-10-18', NULL, '2020-10-18 00:09:57', NULL, NULL),
(4, '2020-10-17', 1, 3, 1, NULL, 'M', '2020-10-18', NULL, 'SUSPECTED_HOSPITALIZED', NULL, '2020-10-18', NULL, '2020-10-18 00:09:57', NULL, NULL),
(5, '2020-10-17', 1, 1, 1, NULL, 'M', '0000-00-00', NULL, 'CONFIRMED_CASE', NULL, '0000-00-00', NULL, '2020-10-20 19:28:10', NULL, NULL),
(6, '2020-10-17', 1, 1, 1, NULL, 'M', '2020-10-20', NULL, 'CONFIRMED_CASE', NULL, '2020-10-20', NULL, '2020-10-20 19:28:30', NULL, NULL),
(7, '2020-10-18', 1, 2, 1, NULL, 'M', '2001-10-20', NULL, 'CONFIRMED_CASE', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(8, '2020-10-18', 1, 3, 1, NULL, 'M', '2001-10-20', NULL, 'DIED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(9, '2020-10-18', 1, 2, 1, NULL, 'M', '2001-10-20', NULL, 'CONFIRMED_CASE', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(10, '2020-10-18', 1, 3, 1, NULL, 'F', '2001-10-20', NULL, 'CONFIRMED_CASE', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(11, '2020-10-19', 1, 2, 1, NULL, 'F', '2001-10-20', NULL, 'RECOVERED_DISCHARGED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(12, '2020-10-19', 1, 1, 1, NULL, 'F', '2001-10-20', NULL, 'DIED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(13, '2020-10-19', 1, 3, 1, NULL, 'F', '2001-10-20', NULL, 'CONFIRMED_CASE', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(14, '2020-10-19', 1, 3, 1, NULL, 'F', '2001-10-20', NULL, 'RECOVERED_DISCHARGED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(15, '2020-10-20', 1, 1, 1, NULL, 'F', '2001-10-20', NULL, 'SUSPECTED_HOSPITALIZED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(16, '2020-10-20', 1, 2, 1, NULL, 'F', '2001-10-20', NULL, 'DIED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(17, '2020-10-18', 1, 2, 1, NULL, 'F', '2001-10-20', NULL, 'CONFIRMED_CASE', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(18, '2020-10-15', 1, 2, 1, NULL, 'F', '2001-10-20', NULL, 'SUSPECTED_HOSPITALIZED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(20, '2020-10-18', 1, 1, 1, NULL, 'M', '2001-10-20', NULL, 'RECOVERED_DISCHARGED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(21, '2020-10-19', 1, 1, 1, NULL, 'M', '2001-10-20', NULL, 'SUSPECTED_HOSPITALIZED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(22, '2020-10-15', 1, 1, 1, NULL, 'M', '2001-10-20', NULL, 'SUSPECTED_HOSPITALIZED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(23, '2020-10-16', 1, 2, 1, NULL, 'M', '2001-10-20', NULL, 'RECOVERED_DISCHARGED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(24, '2020-10-17', 1, 3, 1, NULL, 'M', '2001-10-20', NULL, 'CONFIRMED_CASE', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(25, '2020-10-14', 1, 1, 1, NULL, 'M', '2001-10-20', NULL, 'RECOVERED_DISCHARGED', NULL, NULL, NULL, '2020-10-20 19:28:30', NULL, NULL),
(33, '2020-10-01', 1, 1, 1, NULL, 'F', '2020-10-21', 'Sri_Lankan', 'CONFIRMED_CASE', NULL, NULL, NULL, '2020-10-20 15:43:50', NULL, '2020-10-20 15:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(4000) NOT NULL,
  `publish_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `publish_status`) VALUES
(1, 'Colombo', 1),
(2, 'Kaluthara', 1),
(3, 'Gampaha', 1);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(4, '2020_10_17_130503_create_cases_table', 1),
(5, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(6, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(7, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(8, '2016_06_01_000004_create_oauth_clients_table', 2),
(9, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2),
(10, '2020_10_20_101623_create_cache_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0a7bca1e8d1718896dad049d5a7fdf8307fbcc562160133686b0d651dcc73500baaa046511ece333', 2, 2, NULL, '[]', 0, '2020-10-19 12:00:29', '2020-10-19 12:00:29', '2021-10-19 17:30:29'),
('2777f660fb469dc0618495c60d24bb39a5800f59fdeb98376c61ff2eb70c1d5bdac0bd63db82d461', 2, 2, NULL, '[]', 0, '2020-10-20 08:24:02', '2020-10-20 08:24:02', '2021-10-20 13:54:02'),
('5d96bda64cc62a26029c058fea32773a4345323e6982841528cb66c4eac98398ac91a131a9471465', 1, 2, NULL, '[]', 0, '2020-10-20 08:22:41', '2020-10-20 08:22:41', '2021-10-20 13:52:41'),
('7a269bea9681c9e77a66bb96389ed428ffd1272cae7721dbe69b35e96680f4fd0d4dc6b790903a14', 2, 2, NULL, '[]', 0, '2020-10-19 13:02:34', '2020-10-19 13:02:34', '2021-10-19 18:32:34'),
('8ed00d697f76ec5a2920355fed651e27638acd94b8c4e2433481783c12b33b2ce43badf081911909', 2, 2, NULL, '[]', 0, '2020-10-19 13:05:14', '2020-10-19 13:05:14', '2021-10-19 18:35:14'),
('d300cde43c2a04af04cb6ddb6e689cb88c4b89aa13ad5f78c48a679b5563012c0f23167c0cbc9d71', 2, 2, NULL, '[]', 0, '2020-10-20 07:40:25', '2020-10-20 07:40:25', '2021-10-20 13:10:25'),
('d5d29c1d882f573420dafb4b85de7232c57bdbf67e0066d7f3a46f635e0dc8e6fc1946dabb6bf2f1', 2, 2, NULL, '[]', 0, '2020-10-19 13:04:31', '2020-10-19 13:04:31', '2021-10-19 18:34:31'),
('e44960bd4d4c093ae019cac9210dbc0a08c64201f0fccf82cee9c34cf4b92682c18acd71db53e232', 2, 2, NULL, '[]', 0, '2020-10-19 13:28:08', '2020-10-19 13:28:08', '2021-10-19 18:58:08'),
('ec1c9420e897e4000a919001c6f438def99edbdbcc59a9d02a9cd9f6a54e6c4ae121dcfd487d9c16', 2, 2, NULL, '[]', 0, '2020-10-20 06:16:29', '2020-10-20 06:16:29', '2021-10-20 11:46:29'),
('ec9e72d7c64e7e5f26f636ae2e42756b91b63151df07cabe30965d83336a7b51fcc5f0a538367606', 2, 2, NULL, '[]', 0, '2020-10-19 12:11:26', '2020-10-19 12:11:26', '2021-10-19 17:41:26'),
('f1725f91408a09e627712c8eb711e90447a1be48f784ae502be4278bd1ff285af3f03ac6ea3b37c3', 1, 2, NULL, '[]', 0, '2020-10-17 11:48:17', '2020-10-17 11:48:17', '2021-10-17 17:18:17'),
('f7d52c9751bd4dff84c999507c1e304f0c0d83498da74475990411f34779af2ff93c5e7763e31b89', 1, 2, NULL, '[]', 0, '2020-10-20 08:59:40', '2020-10-20 08:59:40', '2021-10-20 14:29:40'),
('f9fb7dc47881a299734ec4f577c31c9adc0b8fcb4e9d22808e068eb2a4035bf8ff6bdc77f075cd69', 1, 2, NULL, '[]', 0, '2020-10-20 09:05:09', '2020-10-20 09:05:09', '2021-10-20 14:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'ImxQxNooidxBWfQPqvDp2p0Mw3QnA5ed8nWRsytd', NULL, 'http://localhost', 1, 0, 0, '2020-10-17 08:41:16', '2020-10-17 08:41:16'),
(2, NULL, 'Laravel Password Grant Client', 'dqMgm0vHpiOPiP2LXxhkg00dPXTUl1NBYd6xD96S', 'users', 'http://localhost', 0, 1, 0, '2020-10-17 08:41:16', '2020-10-17 08:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-10-17 08:41:16', '2020-10-17 08:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('2123c10b06a5df33e6165c1f641156adef2c8f12fc9184831feb41e2a7395e41804153a70aa265d0', 'ec9e72d7c64e7e5f26f636ae2e42756b91b63151df07cabe30965d83336a7b51fcc5f0a538367606', 0, '2021-10-19 17:41:26'),
('221e11056788411b07192231c1f047672f14718db577a97ee0a39102858af5dcdd76dc53e8f94ce9', '2777f660fb469dc0618495c60d24bb39a5800f59fdeb98376c61ff2eb70c1d5bdac0bd63db82d461', 0, '2021-10-20 13:54:02'),
('229a9f65419818452f114a26dc7ff16f7002e85af01765a84867e14033f54d3c37b3ab94daef55d3', 'd5d29c1d882f573420dafb4b85de7232c57bdbf67e0066d7f3a46f635e0dc8e6fc1946dabb6bf2f1', 0, '2021-10-19 18:34:31'),
('25028f8fa0e909ea06331a231f5b933013312ec16a9bfc2075d7204fbc048f291495de4a3f33ab72', 'ec1c9420e897e4000a919001c6f438def99edbdbcc59a9d02a9cd9f6a54e6c4ae121dcfd487d9c16', 0, '2021-10-20 11:46:29'),
('41fe5bb55cc91cacacd30a96713a20e0435e89f7971d8815e67865eb810d90a456ed6a22ac183ad6', '0a7bca1e8d1718896dad049d5a7fdf8307fbcc562160133686b0d651dcc73500baaa046511ece333', 0, '2021-10-19 17:30:29'),
('47021ef857f86ca6cc97b79a49eff2a5dc41ad71301fd33abbfc03f954d185d8ae03beba9b6348dd', 'f1725f91408a09e627712c8eb711e90447a1be48f784ae502be4278bd1ff285af3f03ac6ea3b37c3', 0, '2021-10-17 17:18:17'),
('495e322fadc462ec18545acc662ca618171390b195ad86cdea1f0272a93a58981f4a7e3fc4a53290', '5d96bda64cc62a26029c058fea32773a4345323e6982841528cb66c4eac98398ac91a131a9471465', 0, '2021-10-20 13:52:41'),
('519fefbef34ae258f79d9555d6c353f317f359b0dfbe1540b3e5bfe7dcd9c07975584fbd62cf4de4', 'f7d52c9751bd4dff84c999507c1e304f0c0d83498da74475990411f34779af2ff93c5e7763e31b89', 0, '2021-10-20 14:29:40'),
('6c2b2a3298f516fe5b30f051187d33736413fb6a51480d9b55df11bdb327c19e2eb60816aae37a4f', '7a269bea9681c9e77a66bb96389ed428ffd1272cae7721dbe69b35e96680f4fd0d4dc6b790903a14', 0, '2021-10-19 18:32:34'),
('a49c6efe3a8266ff6c3ba6a40922c8ade84ab8c8a57d373072a2bdadc91582c88dc5b49cfc6e5eab', '8ed00d697f76ec5a2920355fed651e27638acd94b8c4e2433481783c12b33b2ce43badf081911909', 0, '2021-10-19 18:35:14'),
('b205e7e94af95f938c94abe6934b5f5e0a54e0b17527f131b20f688696e3f6639168a6b1ea680864', 'd300cde43c2a04af04cb6ddb6e689cb88c4b89aa13ad5f78c48a679b5563012c0f23167c0cbc9d71', 0, '2021-10-20 13:10:25'),
('d19d173036b5f601424342e97b1db79e64563ffe0e66defa2ec79b61b5ec055096d5085e102e44c9', 'f9fb7dc47881a299734ec4f577c31c9adc0b8fcb4e9d22808e068eb2a4035bf8ff6bdc77f075cd69', 0, '2021-10-20 14:35:09'),
('f990a88bfd7ab54b4f0a110aa1f10f96203ba2a82c78ac98baca034a97b0456330b3d043b8ffc7ca', 'e44960bd4d4c093ae019cac9210dbc0a08c64201f0fccf82cee9c34cf4b92682c18acd71db53e232', 0, '2021-10-19 18:58:08');

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
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `publish_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id`, `name`, `publish_status`) VALUES
(1, 'Western', 1),
(2, 'Eastern', 1),
(3, 'South', 1);

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@email.com', '2020-10-17 16:17:12', '$2y$10$4TaAOdgzvrHrCDa1X3VDCeM565FtD2Pt1Bu2cAcowB9/5rUFnPU3K', '9qiE7SBOJisDeH03DvCs7dO5A24wNYOQ50wbKyMSmgvuPItEREaFRO9Laz2q', '2020-10-17 16:17:12', NULL, 'admin'),
(2, 'Heshani', 'heshani@email.com', NULL, '$2y$10$cxr1J0BfLMMlCHvLgrNQLeioyF/YipKX2djLPjYbMm/EtNaL4N15e', 'hUJzYSMHzG4ARxMjUdsNzilGeIO55cUBg1ec0vX1dE8wkV532J0vKLMwx0ya', '2020-10-19 11:48:57', '2020-10-19 11:48:57', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_cases`
--
ALTER TABLE `daily_cases`
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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
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
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `daily_cases`
--
ALTER TABLE `daily_cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
