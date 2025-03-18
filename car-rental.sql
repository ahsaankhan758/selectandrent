-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2025 at 12:33 PM
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
-- Database: `car-rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `description`, `module`, `created_at`, `updated_at`) VALUES
(31, 2, 'Delete', 's:94:\"Ahmed Javed Deleted [ User Name Fahid Javed] [User Email fahid.bhutta@gmail.com] Successfully.\";', 'User', '2025-02-26 02:49:14', '2025-02-26 02:49:14'),
(32, 2, 'Delete', 's:98:\"Ahmed Javed Deleted [ Company Name Ajhfoods] [Company Email Myajhfoods433@gmail.com] Successfully.\";', 'Company', '2025-02-26 02:50:20', '2025-02-26 02:50:20'),
(33, 2, 'Delete', 's:91:\"Ahmed Javed Deleted [ User Name Cricket] [User Email Myajhfoods433@gmail.com] Successfully.\";', 'User', '2025-02-26 02:50:36', '2025-02-26 02:50:36'),
(34, 2, 'Create', 's:79:\"Ahmed Javed Created [ User Name Demo] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-02-26 02:51:22', '2025-02-26 02:51:22'),
(35, 2, 'Create', 's:95:\"Ahmed Javed Created [ Company Name demo Company] [Company Email deme@company.com] Successfully.\";', 'Company', '2025-02-26 02:51:22', '2025-02-26 02:51:22'),
(36, 2, 'Delete', 's:95:\"Ahmed Javed Deleted [ Company Name demo Company] [Company Email deme@company.com] Successfully.\";', 'Company', '2025-02-26 02:51:34', '2025-02-26 02:51:34'),
(37, 2, 'Delete', 's:79:\"Ahmed Javed Deleted [ User Name Demo] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-02-26 02:51:34', '2025-02-26 02:51:34'),
(38, 2, 'Create', 's:80:\"Ahmed Javed Created [ User Name Demo1] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-02-26 02:57:04', '2025-02-26 02:57:04'),
(39, 2, 'Create', 's:95:\"Ahmed Javed Created [ Company Name demo Company] [Company Email deme@company.com] Successfully.\";', 'Company', '2025-02-26 02:57:04', '2025-02-26 02:57:04'),
(40, 2, 'Delete', 's:95:\"Ahmed Javed Deleted [ Company Name demo Company] [Company Email deme@company.com] Successfully.\";', 'Company', '2025-02-26 02:59:45', '2025-02-26 02:59:45'),
(41, 2, 'Delete', 's:80:\"Ahmed Javed Deleted [ User Name Demo1] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-02-26 02:59:45', '2025-02-26 02:59:45'),
(42, 2, 'Create', 's:94:\"Ahmed Javed Created [ User Name Fahid Javed] [User Email fahid.bhutta@gmail.com] Successfully.\";', 'User', '2025-02-26 03:02:12', '2025-02-26 03:02:12'),
(43, 2, 'Create', 's:95:\"Ahmed Javed Created [ Company Name Ajhfoods] [Company Email Myajhfoods@gmail.com] Successfully.\";', 'Company', '2025-02-26 03:02:12', '2025-02-26 03:02:12'),
(44, 2, 'Update', 's:95:\"Ahmed Javed Updated [ Company Name Ajhfoods] [Company Email Myajhfoods@gmail.com] Successfully.\";', 'Company', '2025-02-26 03:03:03', '2025-02-26 03:03:03'),
(47, 2, 'Create', 's:57:\"Ahmed Javed Created [Brand Name demo brand] Successfully.\";', 'Brand', '2025-02-26 05:17:45', '2025-02-26 05:17:45'),
(48, 2, 'Create', 's:59:\"Ahmed Javed Created [Model Name demo model 1] Successfully.\";', 'Model', '2025-02-26 05:18:09', '2025-02-26 05:18:09'),
(52, 2, 'Create', 's:57:\"Ahmed Javed Created [Model Name Demo Model] Successfully.\";', 'Model', '2025-02-26 05:21:46', '2025-02-26 05:21:46'),
(53, 2, 'Delete', 's:95:\"Ahmed Javed Deleted [ Company Name Ajhfoods] [Company Email Myajhfoods@gmail.com] Successfully.\";', 'Company', '2025-02-26 05:26:12', '2025-02-26 05:26:12'),
(54, 2, 'Delete', 's:94:\"Ahmed Javed Deleted [ User Name Fahid Javed] [User Email fahid.bhutta@gmail.com] Successfully.\";', 'User', '2025-02-26 05:26:12', '2025-02-26 05:26:12'),
(55, 2, 'Delete', 's:57:\"Ahmed Javed Deleted [Model Name Demo Model] Successfully.\";', 'Model', '2025-02-26 05:33:31', '2025-02-26 05:33:31'),
(56, 2, 'Delete', 's:52:\"Ahmed Javed Deleted [Brand Name Demo1] Successfully.\";', 'Brand', '2025-02-26 05:33:31', '2025-02-26 05:33:31'),
(57, 2, 'Create', 's:80:\"Ahmed Javed Created [ User Name Demo1] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-02-26 05:45:31', '2025-02-26 05:45:31'),
(58, 2, 'Create', 's:95:\"Ahmed Javed Created [ Company Name demo Company] [Company Email deme@company.com] Successfully.\";', 'Company', '2025-02-26 05:45:31', '2025-02-26 05:45:31'),
(59, 2, 'Delete', 's:95:\"Ahmed Javed Deleted [ Company Name demo Company] [Company Email deme@company.com] Successfully.\";', 'Company', '2025-02-26 05:48:58', '2025-02-26 05:48:58'),
(60, 2, 'Delete', 's:80:\"Ahmed Javed Deleted [ User Name Demo1] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-02-26 05:52:19', '2025-02-26 05:52:19'),
(61, 2, 'Create', 's:80:\"Ahmed Javed Created [ User Name Demo1] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-02-26 05:52:59', '2025-02-26 05:52:59'),
(62, 2, 'Create', 's:95:\"Ahmed Javed Created [ Company Name demo Company] [Company Email deme@company.com] Successfully.\";', 'Company', '2025-02-26 05:52:59', '2025-02-26 05:52:59'),
(63, 2, 'Update', 's:80:\"Ahmed Javed Updated [ User Name Demo1] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-02-26 06:03:51', '2025-02-26 06:03:51'),
(64, 2, 'Update', 's:80:\"Ahmed Javed Updated [ User Name Demo1] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-02-26 06:04:29', '2025-02-26 06:04:29'),
(65, 2, 'Update', 's:80:\"Ahmed Javed Updated [ User Name Demo1] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-02-26 06:05:27', '2025-02-26 06:05:27'),
(66, 2, 'Create', 's:80:\"Ahmed Javed Created [ Car Lisence Plate BXFB-185] [Car Name Civic] Successfully.\";', 'Car', '2025-02-26 06:08:39', '2025-02-26 06:08:39'),
(67, 2, 'Delete', 's:52:\"Ahmed Javed Deleted [Model Name Civic] Successfully.\";', 'Model', '2025-02-26 06:24:50', '2025-02-26 06:24:50'),
(68, 2, 'Delete', 's:52:\"Ahmed Javed Deleted [Model Name Civic] Successfully.\";', 'Model', '2025-02-26 06:25:23', '2025-02-26 06:25:23'),
(74, 2, 'Create', 's:54:\"Ahmed Javed Created [Model Name Cricket] Successfully.\";', 'Model', '2025-02-27 02:22:28', '2025-02-27 02:22:28'),
(75, 2, 'Delete', 's:54:\"Ahmed Javed Deleted [Model Name Cricket] Successfully.\";', 'Model', '2025-02-27 02:22:32', '2025-02-27 02:22:32'),
(76, 2, 'Create', 's:52:\"Ahmed Javed Created [Brand Name Demo1] Successfully.\";', 'Brand', '2025-02-27 02:23:17', '2025-02-27 02:23:17'),
(77, 2, 'Delete', 's:52:\"Ahmed Javed Deleted [Brand Name Demo1] Successfully.\";', 'Brand', '2025-02-27 02:23:20', '2025-02-27 02:23:20'),
(78, 2, 'Create', 's:58:\"Ahmed Javed Created [Brand Name Fahid Javed] Successfully.\";', 'Brand', '2025-02-27 02:23:28', '2025-02-27 02:23:28'),
(80, 2, 'Create', 's:51:\"Ahmed Javed Created [Brand Name Car1] Successfully.\";', 'Brand', '2025-02-27 03:08:10', '2025-02-27 03:08:10'),
(81, 2, 'Delete', 's:51:\"Ahmed Javed Deleted [Brand Name Car1] Successfully.\";', 'Brand', '2025-02-27 03:08:15', '2025-02-27 03:08:15'),
(82, 2, 'Login', 's:14:\"User logged in\";', 'Authentication', '2025-02-27 03:11:07', '2025-02-27 03:11:07'),
(83, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is:admin\";', 'Authentication', '2025-02-27 03:17:17', '2025-02-27 03:17:17'),
(84, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-02-27 03:17:55', '2025-02-27 03:17:55'),
(85, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-02-27 03:45:41', '2025-02-27 03:45:41'),
(86, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-02-27 03:46:28', '2025-02-27 03:46:28'),
(87, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-02-27 03:56:54', '2025-02-27 03:56:54'),
(88, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-02-27 03:57:01', '2025-02-27 03:57:01'),
(89, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-02-27 05:10:02', '2025-02-27 05:10:02'),
(90, 2, 'Create', 's:52:\"Ahmed Javed Created [Brand Name Demo1] Successfully.\";', 'Brand', '2025-02-27 07:33:08', '2025-02-27 07:33:08'),
(91, 2, 'Delete', 's:52:\"Ahmed Javed Deleted [Brand Name Demo1] Successfully.\";', 'Brand', '2025-02-27 07:33:14', '2025-02-27 07:33:14'),
(92, 2, 'Create', 's:82:\"Ahmed Javed Created [ Car Lisence Plate CRTB-256] [Car Name Corolla] Successfully.\";', 'Car', '2025-02-27 07:35:05', '2025-02-27 07:35:05'),
(93, 2, 'Create', 's:51:\"Ahmed Javed Created [Brand Name Car1] Successfully.\";', 'Brand', '2025-02-27 07:37:01', '2025-02-27 07:37:01'),
(94, 2, 'Create', 's:52:\"Ahmed Javed Created [Brand Name Demo1] Successfully.\";', 'Brand', '2025-02-27 08:00:41', '2025-02-27 08:00:41'),
(95, 2, 'Create', 's:55:\"Ahmed Javed Created [Category Name Demo1] Successfully.\";', 'Category', '2025-02-27 08:28:39', '2025-02-27 08:28:39'),
(96, 2, 'Delete', 's:55:\"Ahmed Javed Deleted [Category Name Demo1] Successfully.\";', 'Category', '2025-02-27 08:28:45', '2025-02-27 08:28:45'),
(97, 2, 'Create', 's:54:\"Ahmed Javed Created [Location Name demo] Successfully.\";', 'Location', '2025-02-27 08:35:20', '2025-02-27 08:35:20'),
(98, 2, 'Delete', 's:54:\"Ahmed Javed Deleted [Location Name demo] Successfully.\";', 'Location', '2025-02-27 08:35:27', '2025-02-27 08:35:27'),
(99, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-01 00:28:02', '2025-03-01 00:28:02'),
(100, 2, 'Create', 's:79:\"Ahmed Javed Created [ Car Lisence Plate CRTA-879] [Car Name 370Z] Successfully.\";', 'Car', '2025-03-01 02:43:23', '2025-03-01 02:43:23'),
(101, 2, 'Update', 's:80:\"Ahmed Javed Updated [ Car Lisence Plate BXFB-185] [Car Name Civic] Successfully.\";', 'Car', '2025-03-01 06:31:32', '2025-03-01 06:31:32'),
(102, 2, 'Update', 's:79:\"Ahmed Javed Updated [ Car Lisence Plate CRTA-879] [Car Name 370Z] Successfully.\";', 'Car', '2025-03-01 06:34:23', '2025-03-01 06:34:23'),
(103, 2, 'Update', 's:79:\"Ahmed Javed Updated [ Car Lisence Plate CRTA-879] [Car Name 370Z] Successfully.\";', 'Car', '2025-03-01 07:16:45', '2025-03-01 07:16:45'),
(104, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-03 01:27:29', '2025-03-03 01:27:29'),
(105, 2, 'Update', 's:79:\"Ahmed Javed Updated [ Car Lisence Plate CRTA-879] [Car Name 370Z] Successfully.\";', 'Car', '2025-03-03 01:42:59', '2025-03-03 01:42:59'),
(106, 2, 'Create', 's:61:\"Ahmed Javed Created [Feature Name Heated Seats] Successfully.\";', 'Feature', '2025-03-03 02:41:35', '2025-03-03 02:41:35'),
(107, 2, 'Delete', 's:61:\"Ahmed Javed Deleted [Feature Name Heated Seats] Successfully.\";', 'Feature', '2025-03-03 02:44:05', '2025-03-03 02:44:05'),
(128, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-05 00:23:23', '2025-03-05 00:23:23'),
(129, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-05 00:55:39', '2025-03-05 00:55:39'),
(130, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-05 01:09:43', '2025-03-05 01:09:43'),
(131, 2, 'Delete', 's:52:\"Ahmed Javed Deleted [Model Name Swift] Successfully.\";', 'Model', '2025-03-05 02:49:17', '2025-03-05 02:49:17'),
(132, 2, 'Delete', 's:79:\"Ahmed Javed Deleted [ Car Lisence Plate CRTA-879] [Car Name 370Z] Successfully.\";', 'Car', '2025-03-05 04:12:07', '2025-03-05 04:12:07'),
(133, 2, 'Create', 's:82:\"Ahmed Javed Created [ Car Lisence Plate AERT-456] [Car Name Corolla] Successfully.\";', 'Car', '2025-03-05 04:23:39', '2025-03-05 04:23:39'),
(134, 2, 'Update', 's:82:\"Ahmed Javed Updated [ Car Lisence Plate AERT-456] [Car Name Corolla] Successfully.\";', 'Car', '2025-03-05 04:24:09', '2025-03-05 04:24:09'),
(135, 2, 'Delete', 's:82:\"Ahmed Javed Deleted [ Car Lisence Plate AERT-456] [Car Name Corolla] Successfully.\";', 'Car', '2025-03-05 04:25:05', '2025-03-05 04:25:05'),
(136, 2, 'Create', 's:80:\"Ahmed Javed Created [ Car Lisence Plate PXHB-175] [Car Name Cruze] Successfully.\";', 'Car', '2025-03-05 04:28:28', '2025-03-05 04:28:28'),
(137, 2, 'Update', 's:80:\"Ahmed Javed Updated [ Car Lisence Plate PXHB-175] [Car Name Cruze] Successfully.\";', 'Car', '2025-03-05 04:28:44', '2025-03-05 04:28:44'),
(138, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-05 06:54:19', '2025-03-05 06:54:19'),
(139, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-05 06:54:37', '2025-03-05 06:54:37'),
(140, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-05 06:54:53', '2025-03-05 06:54:53'),
(141, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-05 10:18:03', '2025-03-05 10:18:03'),
(142, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-05 10:34:41', '2025-03-05 10:34:41'),
(143, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-05 10:50:16', '2025-03-05 10:50:16'),
(144, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-05 11:32:23', '2025-03-05 11:32:23'),
(145, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-06 00:32:26', '2025-03-06 00:32:26'),
(146, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-06 02:41:55', '2025-03-06 02:41:55'),
(147, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-06 02:41:59', '2025-03-06 02:41:59'),
(148, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-06 02:42:44', '2025-03-06 02:42:44'),
(149, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-06 02:42:47', '2025-03-06 02:42:47'),
(150, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-06 03:22:59', '2025-03-06 03:22:59'),
(151, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-06 03:23:02', '2025-03-06 03:23:02'),
(152, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-06 03:23:27', '2025-03-06 03:23:27'),
(153, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-06 03:23:30', '2025-03-06 03:23:30'),
(154, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-06 04:48:31', '2025-03-06 04:48:31'),
(155, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-06 05:10:22', '2025-03-06 05:10:22'),
(156, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-06 05:10:25', '2025-03-06 05:10:25'),
(157, 2, 'Delete', 's:80:\"Ahmed Javed Deleted [ Car Lisence Plate PXHB-175] [Car Name Cruze] Successfully.\";', 'Car', '2025-03-06 08:49:28', '2025-03-06 08:49:28'),
(158, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-07 00:31:58', '2025-03-07 00:31:58'),
(159, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-07 00:32:06', '2025-03-07 00:32:06'),
(160, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-07 00:59:30', '2025-03-07 00:59:30'),
(161, 2, 'Create', 's:82:\"Ahmed Javed Created [ Car Lisence Plate CRTB-256] [Car Name Corolla] Successfully.\";', 'Car', '2025-03-07 01:25:57', '2025-03-07 01:25:57'),
(162, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-07 03:53:08', '2025-03-07 03:53:08'),
(163, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-09 00:35:57', '2025-03-09 00:35:57'),
(164, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 01:37:51', '2025-03-10 01:37:51'),
(165, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 01:53:46', '2025-03-10 01:53:46'),
(166, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 01:53:52', '2025-03-10 01:53:52'),
(167, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 01:55:18', '2025-03-10 01:55:18'),
(168, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 01:55:31', '2025-03-10 01:55:31'),
(169, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:04:24', '2025-03-10 02:04:24'),
(170, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:04:28', '2025-03-10 02:04:28'),
(171, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:05:29', '2025-03-10 02:05:29'),
(172, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:05:50', '2025-03-10 02:05:50'),
(173, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:06:19', '2025-03-10 02:06:19'),
(174, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:10:11', '2025-03-10 02:10:11'),
(175, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:10:24', '2025-03-10 02:10:24'),
(176, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:11:24', '2025-03-10 02:11:24'),
(177, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:11:31', '2025-03-10 02:11:31'),
(178, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:11:34', '2025-03-10 02:11:34'),
(179, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:11:47', '2025-03-10 02:11:47'),
(180, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:11:50', '2025-03-10 02:11:50'),
(181, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:12:14', '2025-03-10 02:12:14'),
(182, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:21:57', '2025-03-10 02:21:57'),
(183, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:22:04', '2025-03-10 02:22:04'),
(184, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:22:12', '2025-03-10 02:22:12'),
(185, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:22:19', '2025-03-10 02:22:19'),
(186, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:22:23', '2025-03-10 02:22:23'),
(187, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:22:32', '2025-03-10 02:22:32'),
(188, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:22:42', '2025-03-10 02:22:42'),
(189, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:23:26', '2025-03-10 02:23:26'),
(190, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:23:29', '2025-03-10 02:23:29'),
(191, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:23:42', '2025-03-10 02:23:42'),
(192, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:34:17', '2025-03-10 02:34:17'),
(193, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:37:03', '2025-03-10 02:37:03'),
(194, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:37:13', '2025-03-10 02:37:13'),
(195, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:44:31', '2025-03-10 02:44:31'),
(196, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:48:27', '2025-03-10 02:48:27'),
(197, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:50:24', '2025-03-10 02:50:24'),
(198, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:50:30', '2025-03-10 02:50:30'),
(199, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 02:50:34', '2025-03-10 02:50:34'),
(200, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 02:53:54', '2025-03-10 02:53:54'),
(201, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 03:25:09', '2025-03-10 03:25:09'),
(202, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 03:25:13', '2025-03-10 03:25:13'),
(203, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 04:35:42', '2025-03-10 04:35:42'),
(204, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 04:39:34', '2025-03-10 04:39:34'),
(205, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 06:08:28', '2025-03-10 06:08:28'),
(206, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 06:11:00', '2025-03-10 06:11:00'),
(207, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 06:12:24', '2025-03-10 06:12:24'),
(208, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 06:13:20', '2025-03-10 06:13:20'),
(209, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 06:14:26', '2025-03-10 06:14:26'),
(210, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-10 06:16:39', '2025-03-10 06:16:39'),
(211, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-10 06:16:59', '2025-03-10 06:16:59'),
(212, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-11 00:37:11', '2025-03-11 00:37:11'),
(213, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-11 00:38:37', '2025-03-11 00:38:37'),
(214, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-11 00:46:01', '2025-03-11 00:46:01'),
(215, 2, 'Delete', 's:95:\"Ahmed Javed Deleted [ Company Name demo Company] [Company Email deme@company.com] Successfully.\";', 'Company', '2025-03-11 00:50:03', '2025-03-11 00:50:03'),
(216, 2, 'Delete', 's:80:\"Ahmed Javed Deleted [ User Name Demo1] [User Email Demo@gmail.com] Successfully.\";', 'User', '2025-03-11 01:04:56', '2025-03-11 01:04:56'),
(217, 2, 'Create', 's:90:\"Ahmed Javed Created [ User Name Ibrahim] [User Email ibrahimfahid@gmail.com] Successfully.\";', 'User', '2025-03-11 01:05:36', '2025-03-11 01:05:36'),
(218, 2, 'Create', 's:95:\"Ahmed Javed Created [ Company Name Ajhfoods] [Company Email Myajhfoods@gmail.com] Successfully.\";', 'Company', '2025-03-11 01:05:36', '2025-03-11 01:05:36'),
(219, 2, 'Delete', 's:95:\"Ahmed Javed Deleted [ Company Name Ajhfoods] [Company Email Myajhfoods@gmail.com] Successfully.\";', 'Company', '2025-03-11 01:06:05', '2025-03-11 01:06:05'),
(220, 2, 'Delete', 's:90:\"Ahmed Javed Deleted [ User Name Ibrahim] [User Email ibrahimfahid@gmail.com] Successfully.\";', 'User', '2025-03-11 01:06:16', '2025-03-11 01:06:16'),
(221, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-11 01:13:45', '2025-03-11 01:13:45'),
(222, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-11 01:13:58', '2025-03-11 01:13:58'),
(223, 2, 'Create', 's:90:\"Ahmed Javed Created [ User Name Ibrahim] [User Email ibrahimfahid@gmail.com] Successfully.\";', 'User', '2025-03-11 02:09:48', '2025-03-11 02:09:48'),
(224, 2, 'Create', 's:95:\"Ahmed Javed Created [ Company Name Ajhfoods] [Company Email Myajhfoods@gmail.com] Successfully.\";', 'Company', '2025-03-11 02:09:48', '2025-03-11 02:09:48'),
(225, 2, 'Create', 's:94:\"Ahmed Javed Created [ User Name Fahid Javed] [User Email fahid.bhutta@gmail.com] Successfully.\";', 'User', '2025-03-11 02:11:13', '2025-03-11 02:11:13'),
(226, 2, 'Create', 's:97:\"Ahmed Javed Created [ Company Name Ajhfoods] [Company Email fahid.bhutta@gmail.com] Successfully.\";', 'Company', '2025-03-11 02:11:13', '2025-03-11 02:11:13'),
(227, 2, 'Delete', 's:97:\"Ahmed Javed Deleted [ Company Name Ajhfoods] [Company Email fahid.bhutta@gmail.com] Successfully.\";', 'Company', '2025-03-11 02:15:13', '2025-03-11 02:15:13'),
(228, 2, 'Delete', 's:94:\"Ahmed Javed Deleted [ User Name Fahid Javed] [User Email fahid.bhutta@gmail.com] Successfully.\";', 'User', '2025-03-11 02:22:55', '2025-03-11 02:22:55'),
(229, 2, 'Create', 's:94:\"Ahmed Javed Created [ User Name Fahid Javed] [User Email fahid.bhutta@gmail.com] Successfully.\";', 'User', '2025-03-11 02:48:14', '2025-03-11 02:48:14'),
(230, 2, 'Create', 's:91:\"Ahmed Javed Created [ Company Name FaFoods] [Company Email fafoods@gmail.com] Successfully.\";', 'Company', '2025-03-11 02:48:14', '2025-03-11 02:48:14'),
(231, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-11 03:56:05', '2025-03-11 03:56:05'),
(232, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-11 04:31:15', '2025-03-11 04:31:15'),
(233, 2, 'Delete', 's:91:\"Ahmed Javed Deleted [ Company Name FaFoods] [Company Email fafoods@gmail.com] Successfully.\";', 'Company', '2025-03-11 06:32:38', '2025-03-11 06:32:38'),
(234, 2, 'Delete', 's:94:\"Ahmed Javed Deleted [ User Name Fahid Javed] [User Email fahid.bhutta@gmail.com] Successfully.\";', 'User', '2025-03-11 06:32:50', '2025-03-11 06:32:50'),
(235, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-11 10:56:17', '2025-03-11 10:56:17'),
(236, 2, 'Create', 's:95:\"Ahmed Javed Created [ User Name Ahmed Javed] [User Email britishbhutta@gmail.com] Successfully.\";', 'User', '2025-03-11 10:56:52', '2025-03-11 10:56:52'),
(237, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-11 10:57:02', '2025-03-11 10:57:02'),
(238, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-11 11:29:35', '2025-03-11 11:29:35'),
(239, 2, 'Approve', 's:59:\"Ahmed Javed Approved [ Company Name Ajhfoods] Successfully.\";', 'Company', '2025-03-11 12:42:51', '2025-03-11 12:42:51'),
(240, 2, 'Update', 's:59:\"Ahmed Javed Approved [ Company Name Ajhfoods] Successfully.\";', 'Company', '2025-03-11 12:47:07', '2025-03-11 12:47:07'),
(241, 2, 'Approve', 's:59:\"Ahmed Javed Approved [ Company Name Ajhfoods] Successfully.\";', 'Company', '2025-03-11 12:48:10', '2025-03-11 12:48:10'),
(242, 2, 'Update', 's:98:\"Ahmed Javed Updated [ Company Name Ajhfoods] [Company Email britishbhutta@gmail.com] Successfully.\";', 'Company', '2025-03-11 13:04:51', '2025-03-11 13:04:51'),
(243, 2, 'Approve', 's:59:\"Ahmed Javed Approved [ Company Name Ajhfoods] Successfully.\";', 'Company', '2025-03-11 13:05:46', '2025-03-11 13:05:46'),
(244, 2, 'Approve', 's:59:\"Ahmed Javed Approved [ Company Name Ajhfoods] Successfully.\";', 'Company', '2025-03-11 13:09:13', '2025-03-11 13:09:13'),
(245, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-12 00:29:40', '2025-03-12 00:29:40'),
(246, 2, 'Approve', 's:59:\"Ahmed Javed Approved [ Company Name Ajhfoods] Successfully.\";', 'Company', '2025-03-12 00:30:59', '2025-03-12 00:30:59'),
(247, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-12 01:23:22', '2025-03-12 01:23:22'),
(248, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-12 01:23:26', '2025-03-12 01:23:26'),
(249, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-12 02:20:22', '2025-03-12 02:20:22'),
(250, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-12 02:25:51', '2025-03-12 02:25:51'),
(251, 2, 'Approve', 's:59:\"Ahmed Javed Approved [ Company Name Ajhfoods] Successfully.\";', 'Company', '2025-03-12 02:26:11', '2025-03-12 02:26:11'),
(252, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-12 02:27:12', '2025-03-12 02:27:12'),
(253, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-12 03:01:25', '2025-03-12 03:01:25'),
(254, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-12 03:01:35', '2025-03-12 03:01:35'),
(255, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-12 03:10:01', '2025-03-12 03:10:01'),
(256, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-13 00:53:16', '2025-03-13 00:53:16'),
(257, 2, 'Approve', 's:59:\"Ahmed Javed Approved [ Company Name Ajhfoods] Successfully.\";', 'Company', '2025-03-13 02:52:21', '2025-03-13 02:52:21'),
(258, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-13 04:23:40', '2025-03-13 04:23:40'),
(259, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-13 04:23:44', '2025-03-13 04:23:44'),
(260, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-13 04:26:12', '2025-03-13 04:26:12'),
(261, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-13 04:31:45', '2025-03-13 04:31:45'),
(262, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-13 05:01:10', '2025-03-13 05:01:10'),
(263, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-13 05:01:13', '2025-03-13 05:01:13'),
(264, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-14 00:33:00', '2025-03-14 00:33:00'),
(265, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-14 00:57:55', '2025-03-14 00:57:55'),
(266, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-14 00:58:02', '2025-03-14 00:58:02'),
(267, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-14 04:00:24', '2025-03-14 04:00:24'),
(268, 2, 'LogOut', 's:41:\"Ahmed JavedLogged Out. User Role is admin\";', 'Authentication', '2025-03-14 05:27:44', '2025-03-14 05:27:44'),
(269, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-14 05:27:47', '2025-03-14 05:27:47'),
(270, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-17 00:40:58', '2025-03-17 00:40:58'),
(271, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-17 11:10:04', '2025-03-17 11:10:04'),
(272, 2, 'Login', 's:40:\"Ahmed JavedLogged in. User Role is admin\";', 'Authentication', '2025-03-18 00:40:27', '2025-03-18 00:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_category_id` bigint(20) UNSIGNED NOT NULL,
  `car_location_id` bigint(20) UNSIGNED NOT NULL,
  `car_model_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(255) NOT NULL,
  `beam` varchar(255) NOT NULL,
  `transmission` varchar(255) NOT NULL,
  `rent` varchar(255) NOT NULL,
  `seats` varchar(255) NOT NULL,
  `weight` varchar(255) NOT NULL,
  `doors` varchar(255) NOT NULL,
  `mileage` varchar(255) NOT NULL,
  `engine_size` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `luggage` varchar(255) NOT NULL,
  `drive` varchar(255) NOT NULL,
  `fuel_economy` varchar(255) NOT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `exterior_color` varchar(255) NOT NULL,
  `interior_color` varchar(255) NOT NULL,
  `lisence_plate` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `features` varchar(800) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `car_category_id`, `car_location_id`, `car_model_id`, `year`, `beam`, `transmission`, `rent`, `seats`, `weight`, `doors`, `mileage`, `engine_size`, `detail`, `luggage`, `drive`, `fuel_economy`, `fuel_type`, `exterior_color`, `interior_color`, `lisence_plate`, `thumbnail`, `images`, `features`, `created_at`, `updated_at`) VALUES
(19, 3, 5, 11, '1997', '3KM', 'auto', '300', '5', '500', '5', '200', '1600', 'ss', '150', '2 Wheel', 'demo', 'electric', '353', 'Grey', 'CRTB-256', 'carThumbnail/Us1lV82y5MnH5JmADtRxjgGi3IEEz1TtBJz6nWlD.avif', '\"a:2:{i:0;s:54:\\\"carImages\\/2BBtQMV1sPzsAsmooDwKvB3NQyMtE0w6DDbVzxhL.jpg\\\";i:1;s:54:\\\"carImages\\/tRAFIldk2GYt2jn0zPirfkoZGqIBuD94ffvszZbC.jpg\\\";}\"', 'a:3:{i:0;s:9:\"Bluetooth\";i:1;s:13:\"Leather Seats\";i:2;s:8:\"Sunroofs\";}', '2025-03-07 01:25:56', '2025-03-07 01:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `car_brands`
--

CREATE TABLE `car_brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_brands`
--

INSERT INTO `car_brands` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'toyota', 1, '2025-02-18 12:45:04', '2025-02-18 12:48:47'),
(2, 'honda', 1, '2025-02-18 12:45:04', '2025-02-18 12:48:47'),
(3, 'suzuki', 1, '2025-02-18 12:45:04', '2025-02-18 12:48:47'),
(4, 'audi', 1, '2025-02-18 12:45:04', '2025-02-18 12:48:47'),
(6, 'bmw', 1, '2025-02-18 12:46:04', '2025-02-18 12:48:47'),
(7, 'kia', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(8, 'hyundai', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(9, 'mg', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(10, 'changan', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(11, 'chevrlet', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(12, 'ford', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(13, 'nissan', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(14, 'haval', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(15, 'lexus', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(16, 'mazda', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(17, 'mitsubishi', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(18, 'tesla', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(19, 'volkswagon', 1, '2025-02-18 13:01:03', '2025-02-18 13:01:03'),
(42, 'Car1', 1, '2025-02-27 07:37:01', '2025-02-27 07:37:01'),
(43, 'Demo1', 1, '2025-02-27 08:00:41', '2025-02-27 08:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `car_categories`
--

CREATE TABLE `car_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_categories`
--

INSERT INTO `car_categories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sedan', 1, '2025-02-18 12:48:13', '2025-02-18 12:48:23'),
(2, 'pickup', 1, '2025-02-18 12:48:13', '2025-02-18 12:48:23'),
(3, 'coup', 1, '2025-02-18 12:48:13', '2025-02-18 12:48:23'),
(4, 'compact', 1, '2025-02-18 12:48:13', '2025-02-18 12:48:23'),
(5, 'sport-coup', 1, '2025-02-18 12:48:13', '2025-02-18 12:48:23'),
(7, 'family-mpv', 1, '2025-02-18 12:47:31', '2025-02-18 12:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `car_features`
--

CREATE TABLE `car_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_features`
--

INSERT INTO `car_features` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Traction Control', 1, NULL, NULL),
(4, 'Tacometer', 1, NULL, NULL),
(5, 'Sunroofs', 1, NULL, NULL),
(6, 'Rear Spoiler', 1, NULL, NULL),
(7, 'Rain Sensing Wipe', 1, NULL, NULL),
(8, 'Power Streeing', 1, NULL, NULL),
(9, 'Panoramic Moonroof', 1, NULL, NULL),
(10, 'Mulimedia Player', 1, NULL, NULL),
(11, 'Leather Seats', 1, NULL, NULL),
(12, 'Heater', 1, NULL, NULL),
(13, 'Fog Lights Front', 1, NULL, NULL),
(14, 'Digital Odometer', 1, NULL, NULL),
(15, 'Central Lock', 1, NULL, NULL),
(16, 'Brake Assist', 1, NULL, NULL),
(17, 'Bluetooth', 1, NULL, NULL),
(18, 'Air Conditioner', 1, NULL, NULL),
(19, 'Air Bag Power', 1, NULL, NULL),
(20, 'Vanity Mirror', 1, '2025-03-03 04:33:07', '2025-03-03 04:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `car_locations`
--

CREATE TABLE `car_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_locations`
--

INSERT INTO `car_locations` (`id`, `city`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Toronto', 1, '2025-02-21 01:28:59', '2025-02-21 01:28:59'),
(3, 'Québec City', 1, '2025-02-21 01:29:16', '2025-02-21 01:29:16'),
(4, 'Vancouver', 1, '2025-02-21 01:29:31', '2025-02-21 01:29:31'),
(5, 'Montreal', 1, '2025-02-21 01:50:27', '2025-02-21 01:50:27'),
(6, 'Calgary', 1, '2025-02-21 01:54:29', '2025-02-21 01:54:29');

-- --------------------------------------------------------

--
-- Table structure for table `car_models`
--

CREATE TABLE `car_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `car_models`
--

INSERT INTO `car_models` (`id`, `car_brand_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 'Accord', 1, '2025-02-18 13:26:09', '2025-02-18 13:26:09'),
(5, 3, 'Swift', 1, '2025-02-18 13:26:09', '2025-02-18 13:26:09'),
(6, 3, 'Baleno', 1, '2025-02-18 13:26:09', '2025-02-18 13:26:09'),
(8, 4, 'Q7', 1, '2025-02-18 13:26:09', '2025-02-18 13:26:09'),
(9, 6, 'X5', 1, '2025-02-18 13:26:09', '2025-02-18 13:26:09'),
(10, 6, 'i8', 1, '2025-02-18 13:26:09', '2025-02-18 13:26:09'),
(11, 1, 'Corolla', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(12, 1, 'Camry', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(13, 1, 'Yaris', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(14, 2, 'Civic', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(15, 2, 'Accord', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(16, 2, 'City', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(18, 3, 'Baleno', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(19, 3, 'Alto', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(20, 4, 'A4', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(21, 4, 'Q7', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(22, 4, 'A6', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(23, 6, 'X5', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(24, 6, 'i8', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(25, 6, 'M3', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(26, 7, 'Sportage', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(27, 7, 'Sorento', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(28, 7, 'Seltos', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(29, 8, 'Tucson', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(30, 8, 'Elantra', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(31, 8, 'Sonata', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(32, 9, 'MG ZS', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(33, 9, 'MG Hector', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(34, 9, 'MG Gloster', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(35, 10, 'CS75', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(36, 10, 'Alsvin', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(37, 10, 'Oshan X7', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(38, 11, 'Cruze', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(39, 11, 'Malibu', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(40, 11, 'Tahoe', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(41, 12, 'Mustang', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(42, 12, 'F-150', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(43, 12, 'Explorer', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(44, 13, 'Altima', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(45, 13, 'Patrol', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(46, 13, '370Z', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(47, 14, 'H6', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(48, 14, 'Jolion', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(49, 14, 'Dargo', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(50, 15, 'RX', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(51, 15, 'NX', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(52, 15, 'LX', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(53, 16, 'CX-5', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(54, 16, 'Mazda3', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(55, 16, 'MX-5', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(56, 17, 'Outlander', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(57, 17, 'Pajero', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(58, 17, 'Lancer', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(59, 18, 'Model S', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(60, 18, 'Model X', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(61, 18, 'Model 3', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(62, 19, 'Golf', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(63, 19, 'Passat', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(64, 19, 'Tiguan', 1, '2025-02-18 13:31:50', '2025-02-18 13:31:50'),
(65, 1, 'vitz', 1, '2025-02-20 09:02:39', '2025-02-20 09:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `website` varchar(255) DEFAULT '0',
  `status` tinyint(4) DEFAULT 0,
  `detail` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `user_id`, `name`, `email`, `phone`, `website`, `status`, `detail`, `created_at`, `updated_at`) VALUES
(15, 22, 'Ajhfoods', 'britishbhutta@gmail.com', 7414755746, 'Ajhfoods', 0, 'Founded with a vision for excellence, [Company Name] is a leading provider of innovative solutions in [industry]. With a strong commitment to quality and customer satisfaction, we specialize in delivering top-notch products and services tailored to meet the evolving needs of our clients. Our team of experts works tirelessly to ensure reliability, efficiency, and innovation in everything we do. At [Company Name], we believe in building long-term relationships, fostering growth, and making a lasting impact in the industry. Join us as we continue to push the boundaries of success and redefine standards.', '2025-03-11 02:09:48', '2025-03-13 02:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `category`, `start`, `end`, `all_day`, `created_at`, `updated_at`) VALUES
(1, 'New car', 'Success', '2025-03-14 10:01:29', '2025-03-15 10:01:29', 0, NULL, NULL),
(2, '2nd Car', 'Danger', '2025-03-12 10:17:04', '2025-03-13 10:17:04', 0, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ip_address`
--

CREATE TABLE `ip_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ip_address`
--

INSERT INTO `ip_address` (`id`, `user_id`, `ip_address`, `user_name`, `created_at`, `updated_at`) VALUES
(2, NULL, '119.63.138.73', 'Fahid Javed', '2025-02-19 07:09:19', '2025-02-19 07:09:19'),
(6, NULL, '127.0.0.10', 'Fahid Javed', '2025-02-26 03:29:03', '2025-02-26 03:29:03'),
(7, NULL, '119.63.138.72', 'Fahid Javed', '2025-02-26 06:40:48', '2025-02-26 06:40:48'),
(8, NULL, '127.0.0.1', 'Ahmed Javed', '2025-03-04 02:18:21', '2025-03-04 02:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '0001_01_01_000001_create_cache_table', 2),
(23, '0001_01_01_000002_create_jobs_table', 2),
(25, '2024_10_29_060103_create_admins_table', 2),
(36, '0001_01_01_000000_create_users_table', 3),
(37, '2024_10_24_092012_create_companies_table', 3),
(38, '2024_11_07_070756_create_ip_adresses_table', 3),
(39, '2025_02_15_103341_create_car_categories_table', 3),
(40, '2025_02_15_103420_create_car_brands_table', 3),
(43, '2025_02_15_103518_create_car_locations_table', 3),
(49, '2025_02_15_103507_create_car_models_table', 4),
(50, '2025_02_15_103431_create_cars_table', 5),
(51, '2025_02_25_105936_create_activity_logs_table', 6),
(53, '2025_03_03_065231_create_car_features_table', 7),
(56, '2025_03_13_070140_create_events_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('britishbhutta@gmail.com', '$2y$12$c5VhU/qO/TiTyxAKB/JojeLp//NeupH/DrlmCkH/crnYbNLU3kfLq', '2025-03-11 10:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2VSDMnRxIk1dvbksmo3qbpkj8AJyokC3sMctrq51', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiSWhvMFA0Yk1uYVg4SUFVR1lvWjdqZ3M4UVNhVFdabTFmd3VlMENHRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9lYXJuaW5nU3VtbWFyeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzQyMjc2NDI3O319', 1742295393);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Ahmed Javed', 'admin@gmail.com', NULL, '$2y$12$NS.jnyXsiIZRN4B14CUWtuhLCs2NTLnZFAALgm5AuHd0xT/2ovoDm', 'admin', 1, NULL, '2025-02-15 09:54:52', '2025-02-15 09:54:52'),
(22, 'Ibrahim', 'ibrahimfahid@gmail.com', NULL, '$2y$12$GFvegNCx00Cq.UFf8KVxfup8HiXmrZeYFRsL27lXk03zPaGoixWXi', 'company', 1, NULL, '2025-03-11 02:09:48', '2025-03-11 02:09:48'),
(25, 'Ahmed Javed', 'britishbhutta@gmail.com', NULL, '$2y$12$/i/o7OFfF42A9gQwrcf/OehOSba1AxiDvN3vuyKeLd7cHAn5ciDH.', 'user', 1, NULL, '2025-03-11 10:56:52', '2025-03-11 10:56:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cars_car_category_id_foreign` (`car_category_id`),
  ADD KEY `cars_car_model_id_foreign` (`car_model_id`),
  ADD KEY `cars_car_location_id_foreign` (`car_location_id`);

--
-- Indexes for table `car_brands`
--
ALTER TABLE `car_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_categories`
--
ALTER TABLE `car_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_features`
--
ALTER TABLE `car_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_locations`
--
ALTER TABLE `car_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_models`
--
ALTER TABLE `car_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_models_car_brand_id_foreign` (`car_brand_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ip_address`
--
ALTER TABLE `ip_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ip_address_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `car_brands`
--
ALTER TABLE `car_brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `car_categories`
--
ALTER TABLE `car_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `car_features`
--
ALTER TABLE `car_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `car_locations`
--
ALTER TABLE `car_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `car_models`
--
ALTER TABLE `car_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ip_address`
--
ALTER TABLE `ip_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_car_category_id_foreign` FOREIGN KEY (`car_category_id`) REFERENCES `car_categories` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cars_car_location_id_foreign` FOREIGN KEY (`car_location_id`) REFERENCES `car_locations` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `cars_car_model_id_foreign` FOREIGN KEY (`car_model_id`) REFERENCES `car_models` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `car_models`
--
ALTER TABLE `car_models`
  ADD CONSTRAINT `car_models_car_brand_id_foreign` FOREIGN KEY (`car_brand_id`) REFERENCES `car_brands` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ip_address`
--
ALTER TABLE `ip_address`
  ADD CONSTRAINT `ip_address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
