-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 29, 2023 at 06:14 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr-recruiting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method_of_communication` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highest_education` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `work_authorization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_pay_rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability_to_start` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability_to_interview` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years_of_experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `first_name`, `last_name`, `phone`, `email`, `method_of_communication`, `highest_education`, `work_authorization`, `expected_pay_rate`, `availability_to_start`, `availability_to_interview`, `postal_code`, `years_of_experience`, `position`, `country`, `status`, `resume`, `notes`, `vendor_id`, `state_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Molly', 'Jane', '+1 (379) 227-1624', 'tojaqo@mailinator.com', 'Computer', 'High School', 'Recusandae Recusand', 'Quod velit distinct', 'January', 'January', 'Proident sit minim', '1981', 'Libero ut occaecat u', 'United States', '1', 'candidates/1697069255.abt-2.png', 'Sed eligendi accusan', 4, 2, 2, '2023-10-12 04:45:54', '2023-11-28 20:02:15'),
(2, 'Donna', 'Benton', '+1 (317) 863-7243', 'tufej@mailinator.com', 'Computer', 'High School', 'Ut repellendus Iust', 'Duis id labore non', 'March', 'January', 'Ullam distinctio Re', '2004', 'Est minim ullam cum', 'United States', '1', NULL, 'Libero minus reprehe', 1, 1, 1, '2023-10-12 05:55:36', '2023-11-28 20:02:15'),
(4, 'Chastity', 'Jarvis', '+1 (317) 675-3252', 'tafaliloxy@mailinator.com', 'Phone', 'Graduate', 'Et sed ab quod lorem', 'Rerum culpa eaque q', 'March', 'January', 'Eiusmod magnam inven', '1971', 'Ratione in temporibu', 'United States', '1', NULL, 'Quidem mollitia aliq', 4, 1, 2, '2023-10-12 06:19:14', '2023-11-24 07:18:46'),
(5, 'Kiara', 'Giles', '+1 (354) 443-9956', 'mucegom@mailinator.com', 'Computer', 'Graduate', 'Est do sequi explica', 'Nihil sed facere mag', 'January', 'January', 'Aliqua Ea veniam o', '1985', 'Cillum assumenda atq', 'United States', '0', NULL, 'Ipsum voluptas unde', 4, 1, 1, '2023-10-12 06:20:31', '2023-10-12 06:20:31'),
(6, 'Bree', 'Gilmore', '+1 (435) 884-7096', 'vasemacoxe@mailinator.com', 'Computer', 'High School', 'Nostrum amet ullam', 'Est omnis fugiat eli', 'March', 'March', 'Est consequat Facil', '2012', 'Nesciunt aut eum qu', 'United States', '1', NULL, 'Eum harum quisquam s', 3, 1, 1, '2023-10-12 06:21:49', '2023-10-12 06:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'New York', NULL, NULL),
(2, 'California\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedln_page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `company_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_founded` date NOT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_documents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_documents` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `website`, `linkedln_page`, `email`, `phone`, `address`, `country`, `status`, `company_size`, `industry`, `year_founded`, `marital_status`, `vendor_documents`, `admin_documents`, `state_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Amirr Zimmerman', 'https://www.dubu.co', 'Et reiciendis sequi', 'himuw@mailinator.com', '+1 (291) 234-5405', 'Address 4', 'United States', 1, 'Snow and Frye Traders', 'In aperiam quasi ill', '2023-12-05', 'married', '', '', 2, 2, '2023-10-13 01:44:16', '2023-11-28 20:09:05'),
(2, 'Kameko Little', 'https://www.fuf.org.au', 'Ducimus magna quae', 'jytyte@mailinator.com', '+1 (596) 501-4076', 'Address 2', 'United States', 0, 'Gilmore and Hays Traders', 'Voluptatibus occaeca', '2008-04-20', 'married', '1698099880.abt-6.png', '1698099880.abt-5.png', 1, 2, '2023-10-24 05:24:40', '2023-11-28 20:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `client_vendors`
--

CREATE TABLE `client_vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_vendors`
--

INSERT INTO `client_vendors` (`id`, `client_id`, `vendor_id`, `created_at`, `updated_at`) VALUES
(20, 1, 5, '2023-11-27 17:38:44', '2023-11-27 17:38:44'),
(21, 2, 5, '2023-11-27 17:38:44', '2023-11-27 17:38:44'),
(22, 1, 1, '2023-11-27 18:35:19', '2023-11-27 18:35:19'),
(23, 1, 3, '2023-11-27 18:35:19', '2023-11-27 18:35:19'),
(24, 1, 4, '2023-11-27 18:35:19', '2023-11-27 18:35:19');

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
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `title`, `category`, `status`, `created_at`, `updated_at`) VALUES
(6, 'pantos', 'Job', 0, '2023-10-26 01:49:18', '2023-11-28 13:30:32'),
(7, 'qwerty', 'Client', 0, '2023-10-26 02:53:32', '2023-11-28 13:30:32'),
(9, 'Sed et accusantium p', 'Client', 0, '2023-10-26 03:58:55', '2023-11-28 13:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `folder_job_clients`
--

CREATE TABLE `folder_job_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` bigint UNSIGNED DEFAULT NULL,
  `client_id` bigint UNSIGNED DEFAULT NULL,
  `job_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folder_job_clients`
--

INSERT INTO `folder_job_clients` (`id`, `category`, `folder_id`, `client_id`, `job_id`, `created_at`, `updated_at`) VALUES
(4, 'Job', 6, NULL, 1, '2023-10-26 01:49:18', '2023-10-26 01:49:18'),
(5, 'Client', 7, 1, NULL, '2023-10-26 02:53:32', '2023-10-26 02:53:32'),
(8, 'Client', 9, 1, NULL, '2023-10-26 03:58:55', '2023-10-26 03:58:55'),
(9, 'Client', 9, 2, NULL, '2023-10-26 03:58:55', '2023-10-26 03:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `client_id` bigint UNSIGNED NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal_job_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum_experience` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_range` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `status`, `client_id`, `department`, `internal_job_code`, `employment_type`, `minimum_experience`, `salary_range`, `currency`, `duration`, `job_type`, `country`, `state_id`, `city_id`, `postal_code`, `images`, `description`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'engineering', 1, 2, 'Software', '001', 'Temporary', 'Nostrum nisi illo sa', 'Assumenda est est q', 'Dolore tempore sunt', 'Molestiae est qui q', 'Temporary', 'United States', 1, 2, 'Quod saepe tempora i', '', 'lorem abc', 'Dolor earum nobis si', '2023-10-25 01:01:37', '2023-11-28 19:56:32');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_09_27_174752_create_cities_table', 2),
(5, '2023_09_27_174805_create_states_table', 2),
(7, '2023_09_27_181018_create_candidates_table', 3),
(8, '2023_09_27_182047_create_teams_table', 4),
(9, '2023_10_02_174558_create_vendors_table', 5),
(10, '2023_10_02_220159_create_clients_table', 6),
(11, '2023_10_02_225402_create_client_vendors_table', 6),
(12, '2023_10_23_224509_create_jobs_table', 7),
(13, '2023_10_24_200345_create_folders_table', 8),
(14, '2023_10_24_202851_create_folder_job_clients_table', 9),
(16, '2023_11_07_180316_create_permission_tables', 10),
(17, '2023_11_09_222553_create_vendor_invitations_table', 11),
(18, '2023_11_23_154321_create_vendor_jobs_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3);

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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'Permission create', 'web', '2023-11-08 02:13:30', '2023-11-08 02:13:30'),
(3, 'Permission access', 'web', '2023-11-08 02:13:39', '2023-11-08 02:13:39'),
(4, 'Permission edit', 'web', '2023-11-08 02:13:48', '2023-11-08 02:13:48'),
(5, 'Permission delete', 'web', '2023-11-08 02:14:05', '2023-11-08 02:14:05'),
(6, 'Role access', 'web', '2023-11-08 02:14:12', '2023-11-08 02:14:12'),
(7, 'Role delete', 'web', '2023-11-08 02:14:19', '2023-11-08 02:14:19'),
(8, 'Role create', 'web', '2023-11-08 02:14:29', '2023-11-08 02:14:29'),
(9, 'Role edit', 'web', '2023-11-08 02:14:34', '2023-11-08 02:14:34'),
(10, 'User access', 'web', '2023-11-08 05:31:18', '2023-11-08 05:31:18'),
(11, 'User add', 'web', '2023-11-08 05:31:36', '2023-11-08 05:31:36'),
(12, 'User edit', 'web', '2023-11-08 05:31:41', '2023-11-08 05:31:41'),
(13, 'User delete', 'web', '2023-11-08 05:31:46', '2023-11-08 05:31:46'),
(14, 'Vendor create', 'web', '2023-11-08 06:45:24', '2023-11-08 06:45:24'),
(15, 'Vendor access', 'web', '2023-11-08 06:45:41', '2023-11-08 06:45:41'),
(16, 'Vendor edit', 'web', '2023-11-08 06:45:51', '2023-11-08 06:45:51'),
(17, 'Vendor delete', 'web', '2023-11-08 06:46:02', '2023-11-08 06:46:02'),
(18, 'Client create', 'web', '2023-11-08 06:49:13', '2023-11-08 06:49:13'),
(19, 'Client access', 'web', '2023-11-08 06:49:27', '2023-11-08 06:49:27'),
(20, 'Client edit', 'web', '2023-11-08 06:49:45', '2023-11-08 06:49:45'),
(21, 'Client delete', 'web', '2023-11-08 06:49:58', '2023-11-08 06:49:58'),
(22, 'Job create', 'web', '2023-11-08 06:50:10', '2023-11-08 06:50:10'),
(23, 'Job access', 'web', '2023-11-08 06:50:20', '2023-11-08 06:50:20'),
(24, 'Job edit', 'web', '2023-11-08 06:50:27', '2023-11-08 06:50:27'),
(25, 'Job delete', 'web', '2023-11-08 06:50:35', '2023-11-08 06:50:35'),
(26, 'Candidate access', 'web', '2023-11-08 06:50:48', '2023-11-08 06:50:48'),
(27, 'Candidate create', 'web', '2023-11-08 06:51:01', '2023-11-08 06:51:01'),
(28, 'Candidate edit', 'web', '2023-11-08 06:51:13', '2023-11-08 06:51:13'),
(29, 'Candidate delete', 'web', '2023-11-08 06:51:24', '2023-11-08 06:51:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Reader', 'web', '2023-11-08 02:07:08', '2023-11-08 02:32:42'),
(2, 'admin', 'web', '2023-11-08 02:14:58', '2023-11-08 02:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(15, 1),
(19, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(21, 2),
(22, 2),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 2),
(28, 2),
(29, 2);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'California', '2023-09-27 18:02:35', NULL),
(2, 'Florida', '2023-09-27 07:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_id` int NOT NULL DEFAULT '1',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `vendor_id`, `first_name`, `last_name`, `company_name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Francis', 'Weiss', 'XYZ Technology', 'rinocah@mailinator.com', '$2y$10$E/tiJYp7op9dwKoLw1ZI.ugPYtUcLQCZD4Uz0pqR8mgdAZU1UHnue', 0, '2023-10-12 02:14:02', '2023-11-28 14:06:28'),
(4, 1, 'Zephr', 'Harvey', 'ABC Technology', 'bajofuxa@mailinator.com', '$2y$10$BA2472B5yJprNDk3woKP8.GC0u.bZ85dn.1oK8wt/3/bDX5p6uQ5O', 0, '2023-10-12 02:42:16', '2023-11-28 14:06:28'),
(5, 1, 'Griffin', 'Paul', 'ABC Technology', 'bihacyz@mailinator.com', '$2y$10$FAOLbO028oVvEN/IHiW9eO.6ICOes9vfWRK/PU0U0bZaT9ymZfLXO', 1, '2023-10-12 02:42:37', '2023-10-12 02:42:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'vendor',
  `vendor_id` int DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `user_type`, `vendor_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'usman', 'admin', NULL, 'usman@gmail.com', NULL, '$2y$10$.iwJuMCO0BWZeww.vZBz5.SG0LEwTbqG2PA.bWGNU1N8OGD.UU1h2', NULL, '2023-09-26 00:35:11', '2023-09-26 00:35:11'),
(2, 'ahsan', 'vendor', NULL, 'ahsan@gmail.com', NULL, '$2y$10$nZMnPCdxquWUcmG7Kzu30eZsi3dWwgai4iizn.2gzzN7tEUPjdSqK', NULL, '2023-09-26 01:09:38', '2023-09-26 01:09:38'),
(3, 'ali', 'admin', NULL, 'ali@gmail.com', '2023-11-08 04:11:26', '$2y$10$Xi1uG.THhvs5gecz6hzYguLk7ctjKYm3vo8YwU4/uZzXogEVzJYhe', NULL, '2023-11-08 04:11:26', '2023-11-08 05:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `home` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `state_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `first_name`, `last_name`, `company_name`, `home`, `phone`, `email`, `password`, `status`, `state_id`, `city_id`, `created_at`, `updated_at`) VALUES
(1, 'Kato', 'Blackburn', 'Kirby and Mcgowan Plc', '+1 (252) 563-4881', '+1 (523) 644-7587', 'geguv@mailinator.com', '$2y$10$.vIg3NTww3BADNtikCjOiORM6GJM8uj49g1PjGAemagrKmDt7x6Qm', 1, 1, 1, '2023-10-03 00:52:50', '2023-11-28 20:05:27'),
(3, 'Kermit', 'Long', 'Hayden Shannon Co', '+1 (722) 327-6719', '+1 (766) 755-4969', 'menyleqo@mailinator.com', '$2y$10$yGwbm.IAIeJiXsaGRpAnHeOX45PgtQ3UoUrB1xm.J.oY1HUAQ7ajm', 1, 2, 2, '2023-10-03 01:18:39', '2023-11-28 20:05:27'),
(4, 'Kelly', 'Hobbs', 'Vasquez Frazier Co', '+1 (485) 715-3154', '+1 (989) 507-9489', 'boceliqew@mailinator.com', '$2y$10$tOg5yF8DGz5XWF0xPtvXjOvARPSZMNMu0p.QK8kR.j37UFiA3eSiS', 1, 2, 2, '2023-10-03 01:19:44', '2023-10-03 01:19:44'),
(5, 'Usman', 'Ghani', 'Mcgee Montoya Traders', '+1 (806) 204-7566', '+1 (851) 427-4162', 'usman.centosquare@gmail.com', '$2y$10$W5pb.nA9uzFzve9sxSCH1eZwi0cyis/jHGHj8jyjjS2KSVMh79NY.', 1, 1, 2, '2023-11-10 21:19:17', '2023-11-10 21:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_invitations`
--

CREATE TABLE `vendor_invitations` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_invitations`
--

INSERT INTO `vendor_invitations` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(4, 'usman.centosquare@gmail.com', '1', '2023-11-10 21:17:48', '2023-11-10 21:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_jobs`
--

CREATE TABLE `vendor_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `vendor_id` bigint UNSIGNED NOT NULL,
  `job_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_jobs`
--

INSERT INTO `vendor_jobs` (`id`, `vendor_id`, `job_id`, `created_at`, `updated_at`) VALUES
(5, 5, 1, '2023-11-27 17:38:44', '2023-11-27 17:38:44'),
(6, 1, 1, '2023-11-27 18:35:19', '2023-11-27 18:35:19'),
(7, 3, 1, '2023-11-27 18:35:19', '2023-11-27 18:35:19'),
(8, 4, 1, '2023-11-27 18:35:19', '2023-11-27 18:35:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidates_vendor_id_foreign` (`vendor_id`),
  ADD KEY `candidates_state_id_foreign` (`state_id`),
  ADD KEY `candidates_city_id_foreign` (`city_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_state_id_foreign` (`state_id`),
  ADD KEY `clients_city_id_foreign` (`city_id`);

--
-- Indexes for table `client_vendors`
--
ALTER TABLE `client_vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_vendors_client_id_foreign` (`client_id`),
  ADD KEY `client_vendors_vendor_id_foreign` (`vendor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder_job_clients`
--
ALTER TABLE `folder_job_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folder_job_clients_folder_id_foreign` (`folder_id`),
  ADD KEY `folder_job_clients_client_id_foreign` (`client_id`),
  ADD KEY `folder_job_clients_job_id_foreign` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_state_id_foreign` (`state_id`),
  ADD KEY `jobs_city_id_foreign` (`city_id`),
  ADD KEY `jobs_client_id_foreign` (`client_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendors_state_id_foreign` (`state_id`),
  ADD KEY `vendors_city_id_foreign` (`city_id`);

--
-- Indexes for table `vendor_invitations`
--
ALTER TABLE `vendor_invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_jobs`
--
ALTER TABLE `vendor_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_jobs_vendor_id_foreign` (`vendor_id`),
  ADD KEY `vendor_jobs_job_id_foreign` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client_vendors`
--
ALTER TABLE `client_vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `folder_job_clients`
--
ALTER TABLE `folder_job_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor_invitations`
--
ALTER TABLE `vendor_invitations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_jobs`
--
ALTER TABLE `vendor_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `candidates_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `candidates_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `clients_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_vendors`
--
ALTER TABLE `client_vendors`
  ADD CONSTRAINT `client_vendors_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_vendors_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `folder_job_clients`
--
ALTER TABLE `folder_job_clients`
  ADD CONSTRAINT `folder_job_clients_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `folder_job_clients_folder_id_foreign` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `folder_job_clients_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jobs_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendors_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vendor_jobs`
--
ALTER TABLE `vendor_jobs`
  ADD CONSTRAINT `vendor_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vendor_jobs_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
