-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2024 at 03:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `binary`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `parent_id` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `date`) VALUES
(1, 'Consultant', '0', '2024-02-22 02:17:03'),
(2, 'Contractor', '0', '2024-02-22 02:17:27'),
(3, 'Concept Design To Board', '1', '2024-02-22 02:17:39'),
(4, 'Authorities Approvals', '1', '2024-02-22 02:17:52'),
(5, 'Consultant Contractor Agreements', '1', '2024-02-22 02:18:05'),
(6, 'IFC', '1', '2024-02-22 02:18:18'),
(7, 'Architectural Consultant', '5', '2024-02-22 02:19:15'),
(8, 'Earth Retaining Structure', '5', '2024-02-22 02:19:30'),
(9, 'Structural Consultant', '5', '2024-02-22 02:19:40'),
(10, 'MEP Consultant', '5', '2024-02-22 02:20:08'),
(11, 'Contract Documents', '7', '2024-02-22 02:29:48'),
(12, 'Drawings', '7', '2024-02-22 02:30:12'),
(13, 'BOQ', '7', '2024-02-22 02:30:48'),
(14, 'Condition of Contract', '7', '2024-02-22 02:30:56'),
(15, 'Technical Specification', '7', '2024-02-22 02:31:19'),
(16, 'Design & Provision of Pile Drawing', '8', '2024-02-22 02:31:30'),
(17, 'Contract Documents', '16', '2024-02-22 02:31:38'),
(18, 'Drawings', '16', '2024-02-22 02:31:59'),
(19, 'BOQ', '16', '2024-02-22 02:32:07'),
(20, 'Condition of Contract', '16', '2024-02-22 02:32:17'),
(21, 'Technical Specification', '16', '2024-02-22 02:32:25'),
(22, 'Contract Documents', '9', '2024-02-22 02:32:48'),
(23, 'Drawings', '9', '2024-02-22 02:32:55'),
(24, 'BOQ', '9', '2024-02-22 02:33:01'),
(25, 'Condition of Contract', '9', '2024-02-22 02:33:08'),
(26, 'Technical Specification', '9', '2024-02-22 02:33:13'),
(27, 'Electrical', '10', '2024-02-22 02:33:23'),
(28, 'HVAC', '10', '2024-02-22 02:33:40'),
(29, 'Plumbing & Sanitation', '10', '2024-02-22 02:33:54'),
(30, 'Fire Fighting', '10', '2024-02-22 02:34:04'),
(31, 'Contract Documents', '27', '2024-02-22 02:34:18'),
(32, 'Drawings', '27', '2024-02-22 02:34:35'),
(33, 'BOQ', '27', '2024-02-22 02:35:40'),
(34, 'Condition of Contract', '27', '2024-02-22 02:35:55'),
(35, 'Technical Specification', '27', '2024-02-22 02:36:03'),
(36, 'Contract Documents', '28', '2024-02-22 02:36:14'),
(37, 'Drawings', '28', '2024-02-22 02:36:26'),
(38, 'BOQ', '28', '2024-02-22 02:36:36'),
(39, 'Condition of Contract', '28', '2024-02-22 02:36:48'),
(40, 'Technical Specification', '28', '2024-02-22 02:36:58'),
(41, 'Contract Documents', '29', '2024-02-22 02:37:11'),
(42, 'Drawings', '29', '2024-02-22 02:37:19'),
(43, 'BOQ', '29', '2024-02-22 02:37:28'),
(44, 'Condition of Contract', '29', '2024-02-22 02:37:39'),
(45, 'Technical Specification', '29', '2024-02-22 02:37:50'),
(46, 'Contract Documents', '30', '2024-02-22 02:38:46'),
(47, 'Drawings', '30', '2024-02-22 02:38:50'),
(48, 'BOQ', '30', '2024-02-22 02:39:04'),
(49, 'Condition of Contract', '30', '2024-02-22 02:39:14'),
(50, 'Technical Specification', '26', '2024-02-22 02:39:35'),
(51, 'Civil', '6', '2024-02-22 02:40:18'),
(52, 'MEP', '6', '2024-02-22 02:40:24'),
(53, 'Architectural', '51', '2024-02-22 02:40:32'),
(54, 'Structural', '51', '2024-02-22 02:40:43'),
(55, 'Electrical', '52', '2024-02-22 02:40:52'),
(56, 'HVAC', '52', '2024-02-22 02:41:01'),
(57, 'Plumbing & Sanitation', '52', '2024-02-22 02:41:10'),
(58, 'Fire Fighting', '52', '2024-02-22 02:41:22'),
(59, 'Phase 1', '2', '2024-02-22 02:42:48'),
(60, 'Phase 2', '2', '2024-02-22 02:42:58'),
(61, 'Pre-qualification of Contractors', '59', '2024-02-22 02:43:15'),
(62, 'Civil', '61', '2024-02-22 02:43:34'),
(63, 'MEP', '61', '2024-02-22 02:44:05'),
(64, 'List of Contractors', '62', '2024-02-22 02:45:30'),
(65, 'Short List Contractors', '62', '2024-02-22 02:45:41'),
(66, 'Issuance of Contract Documents', '62', '2024-02-22 02:45:52'),
(67, 'Submission of Bids', '62', '2024-02-22 02:46:02'),
(68, 'Evaluation of Bids', '62', '2024-02-22 02:46:13'),
(69, 'Award of Contract', '62', '2024-02-22 02:46:34'),
(70, 'Issuance of LOI', '62', '2024-02-22 02:46:42'),
(71, 'Issuance of LOA', '62', '2024-02-22 02:46:54'),
(72, 'Tracking & Reports', '62', '2024-02-22 02:47:37'),
(73, 'Submission Of Baseline Schedules', '72', '2024-02-22 02:47:54'),
(74, 'Commencement Of Activity', '72', '2024-02-22 02:48:06'),
(75, 'Monitoring of Activity', '74', '2024-02-22 02:48:29'),
(76, 'DPR', '75', '2024-02-22 02:48:39'),
(77, 'WPR', '75', '2024-02-22 02:48:49'),
(78, 'MPR', '75', '2024-02-22 02:49:00'),
(79, 'Site Photographs ', '72', '2024-02-22 02:49:20'),
(80, 'Daily Snaps', '79', '2024-02-22 02:49:32'),
(81, 'Weekly Snaps', '79', '2024-02-22 02:50:01'),
(82, 'Test Reports', '72', '2024-02-22 02:50:20'),
(83, 'Funds Request', '72', '2024-02-22 02:50:41'),
(84, 'Electrical', '63', '2024-02-22 02:51:25'),
(85, 'List of Contractors', '84', '2024-02-22 02:51:47'),
(86, 'Short List Contractors', '84', '2024-02-22 02:51:55'),
(87, 'Issuance of Contract Documents', '84', '2024-02-22 02:52:03'),
(88, 'Submission of Bids', '84', '2024-02-22 02:52:10'),
(89, 'Evaluation of Bids', '84', '2024-02-22 02:52:18'),
(90, 'Award of Contract', '84', '2024-02-22 02:52:29'),
(91, 'Issuance of LOI', '84', '2024-02-22 02:52:38'),
(92, 'Issuance of LOA', '84', '2024-02-22 02:52:46'),
(93, 'Tracking & Reports', '84', '2024-02-22 02:53:04'),
(94, 'Submission Of Baseline Schedules', '93', '2024-02-22 02:53:25'),
(95, 'Commencement Of Activity', '93', '2024-02-22 02:53:41'),
(96, 'Monitoring of Activity', '95', '2024-02-22 02:53:56'),
(97, 'DPR', '95', '2024-02-22 02:54:03'),
(98, 'WPR', '96', '2024-02-22 02:54:12'),
(99, 'MPR', '96', '2024-02-22 02:54:19'),
(100, 'Site Photographs', '93', '2024-02-22 02:54:38'),
(101, 'Daily Snaps', '100', '2024-02-22 02:54:52'),
(102, 'Weekly Snaps', '100', '2024-02-22 02:55:24'),
(103, 'Test Reports', '93', '2024-02-22 02:55:59'),
(104, 'Funds Request', '93', '2024-02-22 02:56:23'),
(105, 'HVAC', '63', '2024-02-22 02:56:54'),
(106, 'List of Contractors', '105', '2024-02-22 02:57:03'),
(107, 'Short List Contractors', '105', '2024-02-22 02:57:15'),
(108, 'Issuance of Contract Documents', '105', '2024-02-22 02:57:26'),
(109, 'Submission of Bids', '105', '2024-02-22 02:57:38'),
(110, 'Evaluation of Bids', '105', '2024-02-22 02:57:47'),
(111, 'Award of Contract', '105', '2024-02-22 02:57:55'),
(112, 'Issuance of LOI', '105', '2024-02-22 02:58:18'),
(113, 'Issuance of LOA', '105', '2024-02-22 02:58:57'),
(115, 'Submission Of Baseline Schedules', '114', '2024-02-22 02:59:31'),
(116, 'Commencement Of Activity', '114', '2024-02-22 02:59:51'),
(118, 'DPR', '117', '2024-02-22 03:00:14'),
(119, 'WPR', '117', '2024-02-22 03:00:22'),
(120, 'MPR', '117', '2024-02-22 03:00:30'),
(121, 'Site Photographs', '114', '2024-02-22 03:00:40'),
(122, 'Daily Snaps', '121', '2024-02-22 03:00:51'),
(123, 'Weekly Snaps', '121', '2024-02-22 03:01:01'),
(124, 'Test Reports', '114', '2024-02-22 03:01:19'),
(125, 'Funds Request', '114', '2024-02-22 03:01:39'),
(126, 'Plumbing & Sanitation', '63', '2024-02-22 03:02:01'),
(127, 'List of Contractors', '126', '2024-02-22 03:02:11'),
(128, 'Short List Contractors', '126', '2024-02-22 03:02:19'),
(129, 'Issuance of Contract Documents', '126', '2024-02-22 03:02:35'),
(130, 'Submission of Bids', '126', '2024-02-22 03:02:45'),
(131, 'Evaluation of Bids', '126', '2024-02-22 03:02:55'),
(132, 'Award of Contract', '126', '2024-02-22 03:03:03'),
(133, 'Issuance of LOI', '126', '2024-02-22 03:03:13'),
(134, 'Issuance of LOA', '126', '2024-02-22 03:03:22'),
(135, 'Tracking & Reports', '126', '2024-02-22 03:03:36'),
(136, 'Submission Of Baseline Schedules', '135', '2024-02-22 03:04:15'),
(137, 'Commencement Of Activity', '135', '2024-02-22 03:04:28'),
(138, 'Monitoring of Activity', '137', '2024-02-22 03:04:38'),
(139, 'DPR', '138', '2024-02-22 03:04:47'),
(140, 'WPR', '138', '2024-02-22 03:04:56'),
(141, 'MPR', '138', '2024-02-22 03:05:06'),
(142, 'Site Photographs', '135', '2024-02-22 03:05:18'),
(143, 'Daily Snaps', '142', '2024-02-22 03:05:29'),
(144, 'Weekly Snaps', '142', '2024-02-22 03:05:43'),
(145, 'Test Reports', '135', '2024-02-22 03:06:02'),
(146, 'Funds Request', '135', '2024-02-22 03:06:16'),
(147, 'Fire Fighting', '63', '2024-02-22 03:06:34'),
(148, 'List of Contractors', '147', '2024-02-22 03:06:46'),
(149, 'Short List Contractors', '147', '2024-02-22 03:06:54'),
(150, 'Issuance of Contract Documents', '147', '2024-02-22 03:07:05'),
(151, 'Submission of Bids', '147', '2024-02-22 03:07:14'),
(152, 'Evaluation of Bids', '147', '2024-02-22 03:07:25'),
(153, 'Award of Contract', '147', '2024-02-22 03:07:33'),
(154, 'Issuance of LOI', '147', '2024-02-22 03:07:40'),
(155, 'Issuance of LOA', '147', '2024-02-22 03:07:48'),
(156, 'Tracking & Reports', '147', '2024-02-22 03:08:01'),
(157, 'Submission Of Baseline Schedules', '156', '2024-02-22 03:08:15'),
(158, 'Commencement Of Activity', '156', '2024-02-22 03:08:24'),
(159, 'Monitoring of Activity', '158', '2024-02-22 03:08:32'),
(160, 'DPR', '159', '2024-02-22 03:08:42'),
(161, 'WPR', '159', '2024-02-22 03:08:52'),
(162, 'MPR', '159', '2024-02-22 03:09:00'),
(163, 'Site Photographs ', '156', '2024-02-22 03:09:31'),
(164, 'Daily Snaps', '163', '2024-02-22 03:09:43'),
(165, 'Weekly Snaps', '163', '2024-02-22 03:09:54'),
(166, 'Test Reports', '156', '2024-02-22 03:10:05'),
(167, 'Funds Request', '156', '2024-02-22 03:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `file_id` text NOT NULL,
  `username` text NOT NULL,
  `role` text NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `file_id`, `username`, `role`, `comment`, `date`) VALUES
(1, '117', 'admin', 'Admin', 'Testing', '2024-02-28 09:36:35'),
(2, '117', 'admin', 'Admin', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.', '2024-02-28 09:37:43'),
(3, '8', 'admin', 'Admin', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before the final copy is available.', '2024-02-28 09:37:59');

-- --------------------------------------------------------

--
-- Table structure for table `data_uploader`
--

CREATE TABLE `data_uploader` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `cat_id` text NOT NULL,
  `file_name` text NOT NULL,
  `file_type` text NOT NULL,
  `status` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_uploader`
--

INSERT INTO `data_uploader` (`id`, `username`, `name`, `cat_id`, `file_name`, `file_type`, `status`, `date`) VALUES
(8, 'dataUpdater', 'Testing', '1,5,9,26,50', 'dataUpdater.1386867608.pdf', 'Document', 'Approved', '2024-02-22 10:28:18'),
(114, 'dataUpdater', '', '', 'dataUpdater.143030015.jpg', 'Image', '', '2024-02-28 07:32:19'),
(115, 'dataUpdater', '', '', 'dataUpdater.716865706.jpg', 'Image', '', '2024-02-28 07:32:38'),
(116, 'dataUpdater', '', '', 'dataUpdater.1299238057.pdf', 'Document', '', '2024-02-28 07:32:54'),
(117, 'dataUpdater', 'Testing', '1,5,7,11,8,16,17,9,22,10,27,31,28,36,29,41,30,46,6,51,53,52,55,2,59,61,62,64,72,74,75,76,79,80,63,84,93,95,96,98,100,101,105,106,126,127,135,137,138,139,142,143,147,156,158,159,160,163,164,60', 'dataUpdater.203807854.pdf', 'Document', 'Submitted', '2024-02-28 08:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `img` text NOT NULL,
  `role` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `img`, `role`, `status`, `date`) VALUES
(1, 'Shahbaz Akhtar', 'admin', 'admin@binary.com', '123', 'admin.1999461147.jpeg', 'Admin', 'Active', '2024-02-21 15:32:44'),
(2, 'Data Updater', 'dataUpdater', 'dataUpdater@gmail.com', '123456', 'dataUpdater.1247242320.jpg', 'Data Uploader', 'Active', '2024-02-28 07:43:24'),
(3, 'Admin Manager', 'adminManager', 'adminManager@gmail.com', '123', 'admin.1999461147.jpeg', 'Admin Manager', 'Active', '2024-02-28 07:35:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_uploader`
--
ALTER TABLE `data_uploader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_uploader`
--
ALTER TABLE `data_uploader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
