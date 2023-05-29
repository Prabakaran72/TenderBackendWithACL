-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 27, 2023 at 11:41 AM
-- Server version: 5.7.42-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `santhila_zigma_tender_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_module_menus`
--

CREATE TABLE `sub_module_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_role_id` int(11) NOT NULL DEFAULT '0',
  `parentModuleID` int(11) NOT NULL,
  `parentSubModuleID` int(11) NOT NULL DEFAULT '0',
  `sorting_order` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'don''t change. it is for Permission check',
  `menuLink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentUClass` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentLClass` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icoClass` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aliasName` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Used to display menu name',
  `status` smallint(6) NOT NULL DEFAULT '1',
  `createdby` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_module_menus`
--

INSERT INTO `sub_module_menus` (`id`, `user_role_id`, `parentModuleID`, `parentSubModuleID`, `sorting_order`, `name`, `menuLink`, `parentUClass`, `parentLClass`, `icoClass`, `aliasName`, `status`, `createdby`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, 'User Type', '/tender/master/usertype', NULL, NULL, '', 'User Type', 1, 1, '2023-03-09 10:30:00', '2023-03-23 06:24:40'),
(2, 1, 1, 0, 2, 'User Creation', '/tender/master/usercreation', NULL, NULL, '', 'User Creation', 1, 1, '2023-03-09 10:30:00', '2023-03-23 06:24:45'),
(3, 1, 1, 0, 4, 'Customers', '/tender/master/customercreation/list', NULL, NULL, '', 'Customers', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:08'),
(4, 1, 1, 0, 5, 'Competitors', '/tender/master/competitorcreation', NULL, NULL, '', 'Competitors', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:13'),
(5, 1, 1, 0, 6, 'Countries', '/tender/master/countrymaster', NULL, NULL, '', 'Countries', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:18'),
(6, 1, 1, 0, 7, 'States', '/tender/master/statemaster', NULL, NULL, '', 'States', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:23'),
(7, 1, 1, 0, 8, 'Districts', '/tender/master/districtmaster/', NULL, NULL, '', 'Districts', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:28'),
(8, 1, 1, 0, 9, 'Cities', '/tender/master/citymaster/', NULL, NULL, '', 'Cities', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:33'),
(9, 1, 1, 0, 10, 'Units', '/tender/master/unitmaster/', NULL, NULL, '', 'Units', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:38'),
(10, 1, 1, 0, 11, 'Project Types', '/tender/master/projecttype/', NULL, NULL, '', 'Project Types', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:43'),
(11, 1, 1, 0, 12, 'Project Status', '/tender/master/projectstatus/', NULL, NULL, '', 'Project Status', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:47'),
(12, 1, 1, 0, 13, 'Customer Sub Category', '/tender/master/customersubcategory/', NULL, NULL, '', 'Customer Sub Category', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:52'),
(13, 1, 1, 0, 14, 'Tender Types', '/tender/master/tendertypemaster/', NULL, NULL, '', 'Tender Types', 1, 1, '2023-03-09 10:30:00', '2023-03-21 10:05:57'),
(14, 1, 2, 0, 1, 'Tenders', '/tender/tendercreation/', NULL, NULL, '', 'Tenders', 1, 1, '2023-03-09 10:30:00', NULL),
(15, 1, 2, 0, 2, 'Bids Managements', '/tender/bidmanagement/list', NULL, NULL, '', 'Bids Managements', 1, 1, '2023-03-09 10:30:00', NULL),
(16, 1, 2, 0, 3, 'Tender Tracker', '/tender/tendertracker/', NULL, NULL, '', 'Tender Tracker', 1, 1, '2023-03-09 10:30:00', NULL),
(17, 1, 2, 0, 4, 'Legacy Statements', '/tender/legacystatement/', NULL, NULL, '', 'Legacy Statements', 1, 1, '2023-03-09 10:30:00', NULL),
(18, 1, 3, 0, 1, 'Communication Files', '/tender/library/communicationfiles/', NULL, NULL, '', 'Communication Files', 1, 1, '2023-03-09 10:30:00', NULL),
(19, 1, 1, 0, 3, 'User Permissions', '/tender/master/userpermissions', NULL, NULL, '', 'User Permissions', 1, 1, '2023-03-21 10:04:35', NULL),
(20, 1, 4, 0, 1, 'CallLogCreation', '/tender/calllog', NULL, NULL, '', 'Call Booking', 1, 1, '2023-03-24 07:49:00', '2023-04-18 13:23:31'),
(21, 1, 1, 0, 15, 'ZoneMaster', '/tender/master/zonemaster/', NULL, NULL, '', 'Zone Master', 1, 1, '2023-03-24 20:35:00', '2023-03-27 05:28:10'),
(22, 1, 1, 0, 16, 'BusinessForecast', '/tender/master/businessforecastmaster/', NULL, NULL, '', 'Business Forecast', 1, 1, '2023-03-26 18:37:35', '2023-03-27 05:28:13'),
(23, 1, 1, 0, 17, 'CallType', '/tender/master/calltypemaster/', NULL, NULL, '', 'Call Type', 1, 1, '2023-03-26 22:53:47', '2023-03-27 05:28:15'),
(24, 1, 4, 0, 2, 'call_to_bdm', '/tender/calllog/calltobdm/', NULL, NULL, '', 'Call Assigning', 1, 1, '2023-03-27 00:01:19', '2023-04-18 13:23:08'),
(25, 1, 5, 0, 1, 'AttendanceEntry', '/tender/hr/attendanceentry', NULL, NULL, '', 'Attendance Entry', 1, 1, '2023-03-29 17:22:33', '2023-03-29 23:06:04'),
(26, 1, 1, 0, 16, 'expense_type', '/tender/master/expensetype/', NULL, NULL, '', 'Expense Type', 1, 1, '2023-03-30 17:08:38', '2023-03-30 17:08:38'),
(27, 1, 5, 0, 2, 'attendance_report', '/tender/hr/attendancereport', NULL, NULL, '', 'Attendance Report', 1, 1, '2023-03-31 02:05:45', '2023-03-31 02:05:45'),
(28, 1, 1, 0, 18, 'attendance_type', '/tender/master/attendancetype', NULL, NULL, '', 'Attendance Type Master', 1, 1, '2023-03-31 18:38:18', '2023-04-01 00:59:11'),
(29, 1, 2, 0, 5, 'ULB Report', '/tender/UlbReport/', NULL, NULL, '', 'ULB Report', 1, 1, '2023-04-06 19:37:59', '2023-04-07 01:11:43'),
(30, 1, 6, 0, 1, 'OtherExpenses', '/tender/expenses/otherExpense', NULL, NULL, '', 'Other Expenses', 1, 1, '2023-04-10 17:23:36', '2023-04-10 22:57:04'),
(31, 1, 6, 0, 2, 'ReimbursementForm', '/tender/expenses/reimbursement', NULL, NULL, '', 'Reimbursement', 1, 1, '2023-04-10 17:23:36', '2023-04-10 22:56:40'),
(32, 1, 4, 0, 3, 'CallReport', '/tender/calllog/callReport', NULL, NULL, '', 'Call Report', 1, 1, '2023-05-11 16:49:01', '2023-05-11 16:49:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub_module_menus`
--
ALTER TABLE `sub_module_menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub_module_menus`
--
ALTER TABLE `sub_module_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
