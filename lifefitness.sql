-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 01:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lifefitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `exercises`
--

CREATE TABLE `exercises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exercise_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exercises`
--

INSERT INTO `exercises` (`id`, `exercise_name`, `created_at`, `updated_at`) VALUES
(1, 'BB Bench Press', NULL, '2021-04-08 01:27:19'),
(2, 'BB Inclined Press', NULL, NULL),
(3, 'BB Declined Press', NULL, NULL),
(4, 'BB Curls', NULL, NULL),
(5, 'BB Front Press', NULL, NULL),
(6, 'DB Bench Press', NULL, NULL),
(7, 'DB Inclined Press', NULL, NULL),
(8, 'DB Declined Press', NULL, NULL),
(9, 'DB Flys', NULL, NULL),
(10, 'DB Pullovers', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fitness_blog`
--

CREATE TABLE `fitness_blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fitness_blog`
--

INSERT INTO `fitness_blog` (`id`, `blog_type_id`, `blog_subject`, `blog_content`, `created_at`, `updated_at`) VALUES
(1, '1', 'How much nutrition do bodybuilders need?', 'Higher carbohydrate, moderate protein, and lower fat ratios have been shown to promote bodybuilding and muscle growth. Recommended percentages of total caloric intake: 40-60% carbohydrate. 25-35% protein.', NULL, '2021-04-14 13:23:59'),
(3, '2', 'Which exercise is best for muscle gain?', 'The best way to build muscle is to perform compound exercises which recruit multiple muscle groups. According to Zack George, personal trainer, gym owner, and the UK\'s fittest man, there are five main movements to focus on.', '2021-04-14 14:08:34', '2021-04-14 14:10:13'),
(4, '3', 'Fitness vs Health', 'Fitness involves activity of some sort that stimulates various systems of the body and maintains a certain condition within the body. Health, on the other hand, involves every system of the body.', '2021-04-23 09:13:51', '2021-04-23 09:14:06'),
(5, '2', 'Time under Tension', 'Time under tension (TUT) refers to the amount of time a muscle is held under tension or strain during an exercise set. During TUT workouts, you lengthen each phase of the movement to make your sets longer', '2021-04-23 09:14:59', '2021-04-23 09:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `fitness_blog_types`
--

CREATE TABLE `fitness_blog_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fitness_blog_types`
--

INSERT INTO `fitness_blog_types` (`id`, `blog_type`, `created_at`, `updated_at`) VALUES
(1, 'Nutrition', NULL, NULL),
(2, 'Exercise', NULL, NULL),
(3, 'Health', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gym_status`
--

CREATE TABLE `gym_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `current_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_trainer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gym_status`
--

INSERT INTO `gym_status` (`id`, `current_status`, `current_trainer`, `created_at`, `updated_at`) VALUES
(1, 'GYM OPEN', 'Trainer Sudeepa', NULL, '2021-04-30 09:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `service_date` date NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_name`, `item_category_id`, `quantity`, `service_date`, `manufacturer`, `manufacturer_contact`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Thread Mill A', '1', 3, '2021-04-28', 'Eser', '0378541256', '1', '1', NULL, '2021-04-07 09:32:45'),
(3, 'Cross Trainer', '1', 2, '2021-04-20', 'Eser', '0378541256', '1', '1', '2021-04-07 06:43:43', '2021-04-19 09:37:19'),
(4, 'Squat Machine', '2', 1, '2021-04-19', 'Life Fitness', '0778541236', '1', '1', '2021-04-12 07:01:14', '2021-04-15 16:12:49'),
(5, '5 KG', '3', 6, '2021-05-31', 'Eser', '0779854589', '4', '4', '2021-04-23 08:44:02', '2021-04-23 08:44:02'),
(6, '10 KG', '3', 6, '2021-05-31', 'Eser', '0779854785', '4', '4', '2021-04-23 08:44:41', '2021-04-23 08:44:41'),
(7, '6 Ft Bar', '4', 8, '2021-05-30', 'Arpico', '0378547896', '4', '4', '2021-04-23 08:45:58', '2021-04-23 08:45:58'),
(8, 'DB Bar', '5', 20, '2021-07-30', 'Arpico', '0379854789', '4', '4', '2021-04-23 08:46:53', '2021-04-23 08:47:04'),
(9, '10 KG Plates', '6', 16, '2021-07-29', 'Eser', '0778548958', '4', '4', '2021-04-23 08:48:08', '2021-04-23 08:50:55'),
(10, 'Flat Bench', '7', 4, '2021-04-30', 'beFit', '0718569856', '4', '4', '2021-04-23 08:49:01', '2021-04-23 08:49:01'),
(11, 'Inclined Bench', '7', 4, '2021-04-30', 'beFit', '0378545896', '4', '4', '2021-04-23 08:49:28', '2021-04-27 14:44:35'),
(12, 'DB Rack', '8', 2, '2021-05-31', 'Seetha', '0379586548', '4', '4', '2021-04-27 14:39:57', '2021-04-27 14:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_item_category`
--

CREATE TABLE `inventory_item_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory_item_category`
--

INSERT INTO `inventory_item_category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Cardio Machines', NULL, NULL),
(2, 'Exercise Machines', NULL, NULL),
(3, 'Dumb Bells', NULL, NULL),
(4, 'BB Bars', NULL, NULL),
(5, 'DB Bars', NULL, NULL),
(6, 'Plates', NULL, NULL),
(7, 'Benches', NULL, NULL),
(8, 'Racks', NULL, NULL),
(9, 'Other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `fname`, `lname`, `gender`, `nic`, `address`, `contact`, `email`, `password`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 'Wayaman', 'Loku', 'Male', '647895288V', 'Lake Round, Kurunegala', '0778549637', 'wayaman@gmail.com', '123', '1', '1', NULL, '2021-04-21 11:23:17'),
(3, 'Dinesh', 'Abeysinghe', 'Male', '974587545V', 'Lake Side, Kurunegala', '0715896475', 'dinesh@gmail.com', '123', '1', '4', NULL, '2021-04-26 08:55:58'),
(4, 'Sampath', 'Chathuranga', 'Male', '971054587V', 'Gampaha', '0716587126', 'sampath@gmail.com', '123', '1', '4', NULL, '2021-04-26 08:58:52'),
(5, 'Sasanga', 'Chathumal', 'Male', '199510801973', 'Galle', '0715248569', 'sasanga@gmail.com', '$2y$10$C8MmyBB4U5mFoE5IGPRn..6EyRBQmKIs7xBAOQZn7Lj5lTIUVpRoq', '1', '4', NULL, '2021-04-26 12:40:14'),
(9, 'Nimsara', 'Damith', 'Male', '968745236V', 'Horana', '0778549625', 'nimsara@gmail.com', '$2y$10$jvOXYpXcFJKp.o5kpKLYRe9Q.CYnX1dkag17slXmxEjoCNOHfNNge', '1', '1', '2020-09-02 12:01:17', '2020-09-02 12:01:17'),
(10, 'Rohitha', 'SK', 'Male', '958712354V', 'Moratuwa', '0736897415', 'rohitha@gmail.com', '$2y$10$XrDvwaDRNLieo2oq5kzt4uw6cuIhnjKKe2Ql8EFmZ4UdcG4qv6/GS', '1', '1', '2020-09-02 12:02:47', '2021-01-25 15:43:53'),
(11, 'Chamoda', 'Jayamini', 'Female', '1997854123', 'Maharagama', '0789654875', 'chamoda@gmail.com', '$2y$10$lGPXDCVj3qWg8E4dWsjfp./vdK4QLKT1izfoK861PLdO8Nkeq5aH2', '1', '1', '2020-09-02 12:04:24', '2020-09-07 09:45:06'),
(13, 'Amosha', 'Amandi', 'Female', '947895246', 'Colombo', '0778562148', 'amandi@gmail.com', '$2y$10$H6/q5ZyLZKtoHApcKaT8U.KCppHVXMqgK5yYAsX.UNXltJtWzVuDi', '1', '1', '2020-09-05 13:59:06', '2020-09-05 13:59:06'),
(14, 'Dayoga', 'Pathirage', 'Female', '9654878442V', 'Horana', '071254889', 'dayogaa@gmail.com', '$2y$10$cFkfK8ltBZ4ByaVfsjXiQOXm3l/uchWn/Wdt/9n31RmxrcUtK1Nn2', '1', '1', '2020-09-05 14:00:15', '2021-01-20 11:37:13'),
(16, 'Imantha', 'Aravinda', 'Male', '978542165V', 'Hikkaduwa', '0725478963', 'imantha@gmail.com', '$2y$10$GAXgVTGwG/Ap8hH.R3VQI.7vQctVvPmDIBiykDiB1pbtvOJpbY4ve', '1', '1', '2020-09-05 14:02:02', '2020-09-05 14:02:02'),
(17, 'Thisuri', 'Dewmini', 'Female', '978254682V', 'Rathmalana', '0784523659', 'thisuri@gmail.com', '$2y$10$HyzIcp/l9VHoseudN9MpZ.RItFeMO5swoLdE1XdGmGXGTWCGjbm6u', '1', '1', '2020-09-07 09:40:35', '2020-09-07 09:40:35'),
(18, 'Niromi', 'Perera', 'Female', '987854123V', 'Colombo', '0715478963', 'niromi@gmail.com', '$2y$12$0XlCeiuG8F/rOK8qDlvwx.FQbAPzRvljrqAcX2agrBhAlJR2IKeLO', '1', '1', '2020-11-22 21:52:38', '2020-11-22 21:52:38'),
(22, 'Shyama', 'Mal', 'Female', '704587458V', 'Kurunegala', '0772785416', 'shyama@gmail.com', '$2y$10$RTymWTrITJ9mpH/BJa7xO.U7uEfhXlWi62PTVPgls59fNiFL3F0FW', '1', '1', '2021-04-06 12:50:38', '2021-04-06 12:50:38'),
(23, 'Henry', 'Cavil', 'Male', '801851678V', 'LA', '0778541256', 'henry@gmail.com', '$2y$10$mF7.S8Lu0dJuqJwsVyWy2ex7GWiOGBJ7quSm4kfszT3.vtjOyygW.', '1', '1', '2021-04-18 20:56:35', '2021-04-18 20:56:35'),
(24, 'Maleesha', 'Fernando', 'Male', '978254682V', '3rd Lane, Marukwatta, Bamunugedara', '0778549625', 'maleesha@gmail.com', '$2y$10$iTxwrGxD2UpcgLdIuNi/7.78hu1tUv00Ak/Ttp7kJ555togmZRrp.', '1', '1', '2021-04-19 09:30:12', '2021-04-19 09:30:12'),
(25, 'Mahela', 'Jayawardena', 'Male', '80647854125V', 'Piliyandala', '0778547896', 'mahela@gmail.com', '$2y$10$TvcJ5yUvEagqGHeppEzmM.dFWrscBc9GsSqcNpyjDUfCrZnTBSC/i', '4', '4', '2021-04-23 08:05:41', '2021-04-23 08:05:41'),
(27, 'Chris', 'Hemsworth', 'Male', '801051973V', 'Sydney, Aus, Colombo', '0779584526', 'chris@gmail.com', '$2y$10$Xk/PqyArgDZSZBaYBA5X4ua5PXPSFr8198rw1l6srXIykF8eKq.zm', '4', '4', '2021-04-25 10:15:35', '2021-04-25 10:15:35'),
(28, 'Archana', 'Herath', 'Male', '96105412V', 'Kaluthara', '0779658745', 'archana@gmail.com', '$2y$10$7lAWeiNwvhGXDybW.fKiPu4ga8LW2nxH1GYjVv5uKKXTRepCFm8NG', '4', '4', '2021-04-25 13:54:24', '2021-04-25 13:54:24'),
(29, 'Chanuri', 'Colomboge', 'Female', '951854785V', 'Moratuwa', '0728458789', 'chanuri@gmail.com', '$2y$10$b8YCHs9GFXjklS8agT2u9O5BbqvIAwXAxdZrQGi3YOVeAUiOysiYi', '4', '4', '2021-04-26 03:58:31', '2021-04-26 04:10:26'),
(30, 'Rajitha', 'Herath', 'Male', '905248745V', 'Matale', '0787458965', 'rajitha@gmail.com', '$2y$10$Bwxxd5xLwgeHAUeb.qXZN.n61AaIq.e3ncHd4S991C0cZGkNU4BZK', '4', '4', '2021-04-26 12:41:09', '2021-04-26 12:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `member_attendances`
--

CREATE TABLE `member_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_in_date` date NOT NULL,
  `member_in_time` time NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_attendances`
--

INSERT INTO `member_attendances` (`id`, `member_id`, `member_in_date`, `member_in_time`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '5', '2021-02-01', '10:48:11', 0, '1', '1', NULL, NULL),
(2, '2', '2021-03-31', '00:15:00', 0, '1', '1', '2021-03-30 13:15:07', '2021-03-30 13:15:07'),
(7, '4', '2021-04-03', '12:37:00', 0, '1', '1', '2021-04-03 01:37:37', '2021-04-03 07:06:21'),
(8, '11', '2021-04-03', '18:07:00', 0, '1', '1', '2021-04-03 07:07:10', '2021-04-03 07:07:10'),
(9, '18', '2021-04-05', '09:59:59', 0, '1', '1', '2021-04-05 04:30:06', '2021-04-05 04:30:06'),
(10, '4', '2021-04-06', '07:38:17', 0, '1', '1', '2021-04-06 02:08:25', '2021-04-06 02:08:25'),
(12, '13', '2021-04-15', '07:25:56', 0, '1', '1', '2021-04-15 13:56:06', '2021-04-15 13:56:06'),
(13, '5', '2021-04-15', '08:00:36', 0, '1', '1', '2021-04-15 14:30:52', '2021-04-15 14:30:52'),
(14, '17', '2021-04-15', '08:01:45', 0, '1', '1', '2021-04-15 14:31:52', '2021-04-15 14:31:52'),
(15, '22', '2021-04-16', '08:59:26', 0, '1', '1', '2021-04-15 15:29:40', '2021-04-15 15:45:17'),
(16, '18', '2021-04-16', '08:59:42', 0, '1', '1', '2021-04-15 15:29:49', '2021-04-15 15:45:32'),
(17, '3', '2021-04-16', '08:59:51', 0, '1', '1', '2021-04-15 15:30:39', '2021-04-15 15:30:39'),
(18, '16', '2021-04-18', '07:54:33', 0, '1', '1', '2021-04-18 14:24:47', '2021-04-18 14:24:47'),
(19, '4', '2021-04-19', '02:27:35', 0, '1', '1', '2021-04-18 20:57:44', '2021-04-18 20:57:44'),
(20, '10', '2021-04-19', '03:01:15', 0, '1', '1', '2021-04-19 09:31:41', '2021-04-20 08:46:49'),
(21, '3', '2021-04-23', '01:37:16', 0, '4', '4', '2021-04-23 08:07:20', '2021-04-23 08:07:20'),
(22, '17', '2021-04-23', '01:37:22', 0, '4', '4', '2021-04-23 08:07:26', '2021-04-23 08:07:26'),
(23, '9', '2021-04-23', '01:37:28', 0, '4', '4', '2021-04-23 08:07:33', '2021-04-23 08:07:33'),
(24, '25', '2021-04-23', '01:37:35', 0, '4', '4', '2021-04-23 08:07:46', '2021-04-23 08:07:46'),
(25, '5', '2021-04-23', '05:03:08', 0, '4', '4', '2021-04-23 11:33:22', '2021-04-23 11:33:22'),
(26, '11', '2021-04-27', '12:12:32', 0, '4', '4', '2021-04-27 06:42:44', '2021-04-27 06:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `member_feedbacks`
--

CREATE TABLE `member_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_date` date NOT NULL,
  `feedback_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_feedbacks`
--

INSERT INTO `member_feedbacks` (`id`, `member_id`, `feedback_subject`, `feedback_content`, `feedback_date`, `feedback_time`, `created_at`, `updated_at`) VALUES
(2, '23', 'Good item', 'ISO supplement is great', '2021-04-20', '11:36:24', '2021-04-20 06:06:56', '2021-04-20 06:06:56'),
(3, '23', 'Cool New Environment', 'New environment upgrade is great. keep up', '2021-04-20', '02:51:24', '2021-04-20 09:22:06', '2021-04-20 09:22:06'),
(4, '13', 'Forgot Password', 'Member ID:15 FName:Emma LName:Watson NIC:901874512V Email:emma@gmail.com', '2021-04-22', '07:59:08', '2021-04-22 14:29:08', '2021-04-22 14:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `member_payments`
--

CREATE TABLE `member_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `payment_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_payments`
--

INSERT INTO `member_payments` (`id`, `member_id`, `date`, `payment_type_id`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '2', '2020-09-01', '5', '21000.00', '1', '1', NULL, NULL),
(5, '3', '2021-03-29', '2', '2500.00', '1', '1', '2021-03-31 11:04:11', '2021-04-01 01:07:46'),
(6, '18', '2021-03-31', '2', '2000.00', '1', '1', '2021-03-31 11:21:55', '2021-03-31 11:21:55'),
(7, '11', '2021-04-05', '2', '2000.00', '1', '1', '2021-04-05 04:03:23', '2021-04-05 04:04:23'),
(8, '4', '2021-04-16', '2', '2500.00', '1', '1', '2021-04-15 15:06:35', '2021-04-15 15:06:35'),
(9, '2', '2021-04-16', '3', '6000.00', '1', '1', '2021-04-15 15:47:25', '2021-04-15 15:47:25'),
(10, '23', '2021-04-19', '2', '2500.00', '1', '1', '2021-04-18 21:35:01', '2021-04-18 21:35:01'),
(11, '24', '2021-04-19', '5', '21000.00', '1', '1', '2021-04-19 09:31:02', '2021-04-19 09:31:02'),
(12, '13', '2021-04-23', '2', '2000.00', '1', '1', '2021-04-23 00:26:53', '2021-04-23 00:26:53'),
(13, '25', '2021-04-23', '3', '6000.00', '4', '4', '2021-04-23 08:06:25', '2021-04-23 08:06:25'),
(14, '25', '2021-04-23', '1', '1000.00', '4', '4', '2021-04-23 08:06:46', '2021-04-23 08:06:46'),
(15, '5', '2021-04-23', '2', '2000.00', '4', '4', '2021-04-23 11:25:42', '2021-04-23 11:25:42'),
(16, '4', '2021-04-01', '1', '1000.00', '4', '4', '2021-04-23 11:28:10', '2021-04-27 07:37:21'),
(18, '30', '2021-04-26', '1', '1000.00', '4', '4', '2021-04-26 12:50:49', '2021-04-26 12:50:49'),
(19, '18', '2021-04-27', '2', '2000.00', '4', '4', '2021-04-27 07:25:09', '2021-04-27 07:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `member_status`
--

CREATE TABLE `member_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height_cm` decimal(5,2) NOT NULL,
  `weight_kg` decimal(5,2) NOT NULL,
  `bmi` decimal(4,2) NOT NULL,
  `member_status_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_status`
--

INSERT INTO `member_status` (`id`, `member_id`, `height_cm`, `weight_kg`, `bmi`, `member_status_type_id`, `created_at`, `updated_at`) VALUES
(1, '2', '180.00', '65.00', '20.10', '1', NULL, NULL),
(2, '3', '153.00', '40.00', '17.10', '2', NULL, NULL),
(3, '10', '160.00', '65.00', '25.39', '3', NULL, '2021-04-27 08:32:43'),
(7, '4', '170.00', '55.00', '19.00', '1', '2021-04-23 08:32:43', '2021-04-23 08:32:43'),
(8, '11', '150.00', '45.00', '20.10', '1', '2021-04-23 08:33:45', '2021-04-23 08:33:45'),
(10, '9', '170.00', '65.00', '22.50', '1', '2021-04-23 08:34:33', '2021-04-23 08:34:33'),
(11, '13', '153.00', '40.00', '17.10', '2', '2021-04-23 08:35:42', '2021-04-23 08:35:42'),
(12, '16', '183.00', '69.00', '20.60', '1', '2021-04-23 08:37:06', '2021-04-23 08:37:06'),
(13, '23', '180.00', '65.00', '20.00', '1', '2021-04-26 14:46:22', '2021-04-26 14:46:22'),
(14, '30', '170.00', '60.00', '20.76', '1', '2021-04-26 14:53:19', '2021-04-26 14:53:19'),
(18, '18', '152.00', '45.00', '19.48', '2', '2021-04-26 15:24:15', '2021-04-26 15:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `member_status_types`
--

CREATE TABLE `member_status_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_status_types`
--

INSERT INTO `member_status_types` (`id`, `status_type`, `created_at`, `updated_at`) VALUES
(1, 'Normal', NULL, NULL),
(2, 'Underweight', NULL, NULL),
(3, 'Overweight', NULL, NULL),
(4, 'Obese', NULL, NULL);

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
(2, '2020_07_27_103956_create_members_table', 2),
(3, '2020_09_05_194234_create_member_payments_table', 3),
(4, '2020_09_06_092047_create_payments_type_table', 4),
(5, '2020_12_10_174204_create_member_attendance_table', 5),
(7, '2021_03_31_114317_create_exercises_table', 7),
(8, '2021_04_01_072616_create_notices_table', 8),
(9, '2021_04_01_073144_create_notices_type', 9),
(10, '2021_04_01_073754_create_notice_recipients_table', 10),
(15, '2021_04_05_190818_create_member_status_types_table', 11),
(16, '2021_04_05_185740_create_member_status_table', 12),
(17, '2021_04_06_140731_create_trainers_table', 13),
(18, '2021_04_06_183417_create_inventory_table', 14),
(19, '2021_04_06_184007_create_inventory_item_category_table', 15),
(21, '2021_04_07_174029_create_trainer_shifts_table', 16),
(22, '2021_04_07_175215_create_trainer_shifts_type_table', 16),
(23, '2021_04_08_070502_create_workout_schedule_types_table', 17),
(24, '2021_04_08_072717_create_workout_schedules_table', 18),
(25, '2021_04_12_125959_create_online_store_table', 19),
(26, '2021_04_12_131105_create_online_store_item_category_table', 20),
(27, '2021_04_12_131806_create_online_coach_table', 21),
(28, '2021_04_12_132051_create_online_coach_packages_table', 21),
(29, '2021_04_12_132522_create_fitness_blog_table', 22),
(30, '2021_04_12_132703_create_fitness_blog_types_table', 22),
(31, '2021_01_02_081002_create_gym_status_table', 23),
(34, '2021_04_20_105556_create_member_feedbacks_table', 24),
(35, '2021_04_20_145916_create_trainer_payments_table', 25),
(36, '2021_04_20_182053_create_trainer_feedbacks_table', 26);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notice_date` date NOT NULL,
  `notice_time` time NOT NULL,
  `notice_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipients_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `notice_subject`, `notice_content`, `notice_date`, `notice_time`, `notice_type_id`, `recipients_id`, `created_at`, `updated_at`) VALUES
(1, 'Seasonal Offer!', 'Aurudu season offer for 3 month membership package; 50% off', '2021-04-05', '11:09:00', '1', '4', NULL, '2021-04-05 05:20:32'),
(2, 'Special Offer!', 'New year offer for annual membership package. 25% off', '2021-01-02', '10:38:24', '2', '1', '2021-04-05 05:08:36', '2021-04-08 00:34:24'),
(3, 'Precautions for Covid-19', 'Since this is a Fitness Institute, there many occasions that may contact is possible. therefore it is your own responsibility to Follow Covid-19 prevention guidelines', '2021-04-23', '01:41:31', '3', '4', '2021-04-23 08:13:57', '2021-04-23 08:13:57'),
(4, 'Covid-19 Guidelines for Lifefitness', 'Physical Distancing\r\nCleaning and Disinfection\r\nPersonal Protective Equipment', '2021-04-23', '01:43:58', '2', '3', '2021-04-23 08:16:59', '2021-04-23 08:16:59');

-- --------------------------------------------------------

--
-- Table structure for table `notices_type`
--

CREATE TABLE `notices_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notice_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices_type`
--

INSERT INTO `notices_type` (`id`, `notice_type`, `created_at`, `updated_at`) VALUES
(1, 'Public Notice', NULL, NULL),
(2, 'Special Notice', NULL, NULL),
(3, 'Reminder', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notice_recipients`
--

CREATE TABLE `notice_recipients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `recipient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notice_recipients`
--

INSERT INTO `notice_recipients` (`id`, `recipient`, `created_at`, `updated_at`) VALUES
(1, 'Members', NULL, NULL),
(2, 'Trainers', NULL, NULL),
(3, 'Members + Trainers', NULL, NULL),
(4, 'Public', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `online_coach`
--

CREATE TABLE `online_coach` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `online_coach_package_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_coach`
--

INSERT INTO `online_coach` (`id`, `fname`, `lname`, `gender`, `location`, `contact`, `email`, `online_coach_package_id`, `created_at`, `updated_at`) VALUES
(1, 'Hansi', 'Senevirathne', 'Female', 'Katubedda', '0778541256', 'hansirox@gmail.com', '1', NULL, NULL),
(2, 'Manul', 'Mendis', 'Male', 'Wadduwa', '0718541256', 'manul@gmail.com', '3', '2021-04-14 15:05:23', '2021-04-14 15:15:47'),
(4, 'Stephen', 'Jayawardena', 'Male', 'Colombo', '0718541256', 'steve@gmail.com', '3', '2021-04-15 09:19:24', '2021-04-23 09:16:36'),
(5, 'Suneth', 'Bandara', 'Male', 'Matale', '0778541256', 'suneth@gmail.com', '2', '2021-04-15 09:21:17', '2021-04-15 09:21:17'),
(6, 'Will', 'Smith', 'Male', 'LA', '0785412566', 'will@gmail.com', '3', '2021-04-15 09:23:45', '2021-04-15 09:23:45'),
(7, 'Manu', 'Benet', 'Male', 'Australia', '0778549625', 'manu@gmail.com', '1', '2021-04-19 09:40:46', '2021-04-23 09:17:22'),
(8, 'Zack', 'Snyder', 'Male', 'LA', '0778545896', 'zack@gmail.com', '2', '2021-04-29 06:16:50', '2021-04-29 06:27:09');

-- --------------------------------------------------------

--
-- Table structure for table `online_coach_packages`
--

CREATE TABLE `online_coach_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_coach_packages`
--

INSERT INTO `online_coach_packages` (`id`, `package_name`, `created_at`, `updated_at`) VALUES
(1, '4 Weeks', NULL, NULL),
(2, '12 Weeks', NULL, NULL),
(3, '24 Weeks', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `online_store`
--

CREATE TABLE `online_store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'img/store/img.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_store`
--

INSERT INTO `online_store` (`id`, `item_name`, `item_category_id`, `item_description`, `manufacturer`, `price`, `img_url`, `created_at`, `updated_at`) VALUES
(1, 'N-Mass', '1', 'N-MASS delivers a massive 1300 quality calories in each serving! With 55g of naturally sourced whole proteins, 3g of strength enhancing creatine & 250g of food based carbs for a superior whole-food formula for high quality muscle building', 'ANS', '15000.00', 'img/store/img.jpg', NULL, '2021-04-13 04:27:46'),
(4, 'ISO100', '1', 'ISO100 is formulated using a cross-flow micro filtration, multi-step purification process that preserves important muscle-building protein fractions', 'Dymatize', '12000.00', 'img/store/img.jpg', '2021-04-13 04:34:54', '2021-04-13 04:35:21'),
(5, 'Exercise Gloves', '2', 'Ventilated Weight Lifting Gym Workout Gloves Full Finger with Wrist Wrap Support for Men & Women, Full Palm Protection', 'Amazon', '800.00', 'img/store/img.jpg', '2021-04-15 04:35:07', '2021-04-15 04:35:07'),
(6, 'Shaker', '2', 'BlenderBottle Classic V2 Shaker Bottle Perfect for Protein Shakes and Pre Workout, 28-Ounce, Black.', 'MuscleNation', '1000.00', 'img/store/img.jpg', '2021-04-23 09:19:16', '2021-04-23 09:19:16'),
(7, 'LifeFitness Tshirt A', '3', 'Color : Black and sizes available in M L XL', 'LifeFitness', '950.00', 'img/store/img.jpg', '2021-04-29 05:56:16', '2021-04-29 06:03:21');

-- --------------------------------------------------------

--
-- Table structure for table `online_store_item_category`
--

CREATE TABLE `online_store_item_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_store_item_category`
--

INSERT INTO `online_store_item_category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Supplements', NULL, NULL),
(2, 'Accessories', NULL, NULL),
(3, 'Gym Wears', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments_type`
--

CREATE TABLE `payments_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments_type`
--

INSERT INTO `payments_type` (`id`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 'Registration Fee', NULL, NULL),
(2, 'Monthly Membership Fee', NULL, NULL),
(3, '3 Months Membership Fee', NULL, NULL),
(4, '6 Months Membership Fee', NULL, NULL),
(5, 'Annual Membership Fee', NULL, NULL),
(6, 'Custom', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `fname`, `lname`, `gender`, `nic`, `address`, `contact`, `email`, `password`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Sudeepa', 'Silva', 'Male', '958745216V', 'Somewhere, Kurunegala', '0778541254', 'sudeepa@gmail.com', '$2y$12$0XlCeiuG8F/rOK8qDlvwx.FQbAPzRvljrqAcX2agrBhAlJR2IKeLO', '1', '1', NULL, '2021-04-07 06:47:08'),
(3, 'Subash', 'Lucky', 'Male', '954125478V', 'Kurunegala', '0715421456', 'subash@gmail.com', '$2y$10$H.vyab6N1ebvyGs4LIKxYO5878CJcnkzm33cZDuYxu5wN6GVHvgcS', '1', '1', '2021-04-12 07:04:07', '2021-04-12 07:04:07'),
(4, 'Kasun', 'Madushan', 'Male', '971524789V', 'Kurunegala', '0778547896', 'kasunp@gmail.com', '$2y$10$3so8Qn.Pj9nsAYHg8mcLIuT8repMQEpLbdAMfPuXKBtkjfCl27qgC', '1', '1', '2021-04-21 08:08:21', '2021-04-21 08:08:21'),
(5, 'Dananjaya', 'Silva', 'Male', '19945245789', 'Moratuwa', '0779854156', 'dana@gmail.com', '$2y$10$Lb60gSsofYi4QDb.vmFSk.GWRayhdu2M7aAbzn1.aHdKYJBeuNs2i', '4', '4', '2021-04-23 08:38:28', '2021-04-23 08:38:28'),
(6, 'Nimantha', 'Silva', 'Male', '901054577V', 'Horana', '0778458965', 'nima@gmail.com', '$2y$10$UHh1D.xNjaxEqKC9GOCy2OFU8VXXUl28Y.JSYpnB5Oum/d.43nyxi', '4', '4', '2021-04-23 08:39:33', '2021-04-26 14:25:35'),
(7, 'Shanela', 'Perera', 'Female', '951854785V', 'Lake Side, Kurunegala', '0778548985', 'shanela@gmail.com', '$2y$10$dQa69VGhlCxqFwrud.kN/.GxFoSfAABmlTgkTV/C3TWP4K0o.e60m', '4', '4', '2021-04-26 14:26:37', '2021-04-26 14:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_feedbacks`
--

CREATE TABLE `trainer_feedbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback_date` date NOT NULL,
  `feedback_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer_feedbacks`
--

INSERT INTO `trainer_feedbacks` (`id`, `trainer_id`, `feedback_subject`, `feedback_content`, `feedback_date`, `feedback_time`, `created_at`, `updated_at`) VALUES
(2, '1', 'Good day', 'Good day to work. :)', '2021-04-20', '06:49:14', '2021-04-20 13:19:29', '2021-04-20 13:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_payments`
--

CREATE TABLE `trainer_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `amount` decimal(7,2) NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer_payments`
--

INSERT INTO `trainer_payments` (`id`, `trainer_id`, `date`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '1', '2021-04-01', '50000.00', '1', '1', NULL, '2021-04-20 10:13:16'),
(3, '3', '2021-04-01', '30000.00', '1', '1', '2021-04-20 10:15:00', '2021-04-20 10:15:00'),
(4, '1', '2021-04-19', '5000.00', '1', '1', '2021-04-20 10:20:34', '2021-04-20 10:20:34'),
(5, '4', '2021-04-12', '20000.00', '4', '4', '2021-04-23 08:51:22', '2021-04-27 15:10:07'),
(6, '5', '2021-04-19', '15000.00', '4', '4', '2021-04-23 08:51:43', '2021-04-27 15:06:50'),
(7, '6', '2021-04-21', '15000.00', '4', '4', '2021-04-23 08:52:25', '2021-04-23 08:52:25'),
(8, '5', '2021-04-27', '15000.00', '4', '4', '2021-04-27 14:51:19', '2021-04-27 14:51:19'),
(9, '4', '2021-04-27', '15000.00', '4', '4', '2021-04-27 14:59:39', '2021-04-27 14:59:39'),
(10, '7', '2021-04-27', '20000.00', '4', '4', '2021-04-27 15:00:24', '2021-04-27 15:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_shifts`
--

CREATE TABLE `trainer_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trainer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift_date` date NOT NULL,
  `shift_start_time` time NOT NULL,
  `shift_end_time` time NOT NULL,
  `shift_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer_shifts`
--

INSERT INTO `trainer_shifts` (`id`, `trainer_id`, `shift_date`, `shift_start_time`, `shift_end_time`, `shift_type_id`, `created_at`, `updated_at`) VALUES
(1, '1', '2021-04-08', '08:00:00', '20:00:00', '1', NULL, NULL),
(3, '3', '2021-04-20', '20:34:00', '08:34:00', '1', '2021-04-19 09:34:29', '2021-04-19 09:34:29'),
(5, '1', '2021-04-24', '08:00:00', '14:00:00', '2', '2021-04-23 08:41:17', '2021-04-23 08:41:17'),
(6, '3', '2021-04-24', '14:00:00', '20:00:00', '2', '2021-04-23 08:42:13', '2021-04-23 08:42:13'),
(7, '5', '2021-04-01', '23:55:00', '23:53:00', '2', '2021-04-23 11:53:52', '2021-04-23 11:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `trainer_shifts_type`
--

CREATE TABLE `trainer_shifts_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shift_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainer_shifts_type`
--

INSERT INTO `trainer_shifts_type` (`id`, `shift_type`, `created_at`, `updated_at`) VALUES
(1, 'Full Day', NULL, NULL),
(2, 'Half Day', NULL, NULL),
(3, 'Custom', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Sandeepa', 'Loku', 'sandeepa@webmotech.com', NULL, '$2y$10$AKMfpHpjn1qsW8myppSRM.obL..a/OXU83Rwl5v8/kG6KrjvuvzjC', 'Sandeepa', '1', NULL, '2021-04-23 07:40:40', NULL),
(2, 'Priyantha', 'Rajapakshe', 'priyantha', NULL, '$2y$12$0XlCeiuG8F/rOK8qDlvwx.FQbAPzRvljrqAcX2agrBhAlJR2IKeLO', '1', '1', NULL, NULL, NULL),
(3, 'Admin', '-', 'admin', NULL, '$2y$12$rn.29fLMFiuO.bYQ9Pp4X.5anx7vtmncm/wqynJ2VGVCCSPEYrv.G ', '1', '1', NULL, NULL, NULL),
(4, 'Sandeepa', 'Loku', 'sandeepa@gmail.com', NULL, '$2y$12$0XlCeiuG8F/rOK8qDlvwx.FQbAPzRvljrqAcX2agrBhAlJR2IKeLO', '1', '1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `workout_schedules`
--

CREATE TABLE `workout_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_type_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exercise_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sets` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workout_schedules`
--

INSERT INTO `workout_schedules` (`id`, `schedule_type_id`, `exercise_id`, `reps`, `sets`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '15', '4', NULL, NULL),
(3, '1', '2', '10', '4', '2021-04-23 08:08:18', '2021-04-23 08:08:18'),
(4, '1', '3', '8', '4', '2021-04-23 08:08:31', '2021-04-23 08:08:31'),
(5, '1', '6', '10', '4', '2021-04-23 08:09:01', '2021-04-23 08:09:01'),
(6, '1', '9', '8', '3', '2021-04-23 08:09:17', '2021-04-23 08:09:17'),
(7, '1', '4', '12', '4', '2021-04-23 08:09:44', '2021-04-23 08:09:44'),
(8, '1', '5', '12', '4', '2021-04-23 08:10:00', '2021-04-23 08:10:00'),
(9, '2', '1', '10', '3', '2021-04-23 08:10:40', '2021-04-23 08:10:40'),
(10, '2', '4', '8', '3', '2021-04-23 08:11:01', '2021-04-26 14:38:59'),
(11, '4', '1', '8', '6', '2021-04-23 11:39:21', '2021-04-26 13:05:28'),
(12, '4', '3', '8', '4', '2021-04-26 14:34:46', '2021-04-26 14:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `workout_schedule_types`
--

CREATE TABLE `workout_schedule_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `schedule_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workout_schedule_types`
--

INSERT INTO `workout_schedule_types` (`id`, `schedule_type`, `created_at`, `updated_at`) VALUES
(1, 'Endurance', NULL, NULL),
(2, 'Beginner', NULL, NULL),
(3, 'Intermediate', NULL, NULL),
(4, 'Advance', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fitness_blog`
--
ALTER TABLE `fitness_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fitness_blog_types`
--
ALTER TABLE `fitness_blog_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gym_status`
--
ALTER TABLE `gym_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_item_category`
--
ALTER TABLE `inventory_item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`);

--
-- Indexes for table `member_attendances`
--
ALTER TABLE `member_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_feedbacks`
--
ALTER TABLE `member_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_payments`
--
ALTER TABLE `member_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_status`
--
ALTER TABLE `member_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_status_types`
--
ALTER TABLE `member_status_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices_type`
--
ALTER TABLE `notices_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_recipients`
--
ALTER TABLE `notice_recipients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_coach`
--
ALTER TABLE `online_coach`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_coach_packages`
--
ALTER TABLE `online_coach_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_store`
--
ALTER TABLE `online_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_store_item_category`
--
ALTER TABLE `online_store_item_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_type`
--
ALTER TABLE `payments_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `trainers_email_unique` (`email`);

--
-- Indexes for table `trainer_feedbacks`
--
ALTER TABLE `trainer_feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_payments`
--
ALTER TABLE `trainer_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_shifts`
--
ALTER TABLE `trainer_shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainer_shifts_type`
--
ALTER TABLE `trainer_shifts_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `workout_schedules`
--
ALTER TABLE `workout_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workout_schedule_types`
--
ALTER TABLE `workout_schedule_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `fitness_blog`
--
ALTER TABLE `fitness_blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fitness_blog_types`
--
ALTER TABLE `fitness_blog_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gym_status`
--
ALTER TABLE `gym_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory_item_category`
--
ALTER TABLE `inventory_item_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `member_attendances`
--
ALTER TABLE `member_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `member_feedbacks`
--
ALTER TABLE `member_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member_payments`
--
ALTER TABLE `member_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `member_status`
--
ALTER TABLE `member_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `member_status_types`
--
ALTER TABLE `member_status_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notices_type`
--
ALTER TABLE `notices_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notice_recipients`
--
ALTER TABLE `notice_recipients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `online_coach`
--
ALTER TABLE `online_coach`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `online_coach_packages`
--
ALTER TABLE `online_coach_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `online_store`
--
ALTER TABLE `online_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `online_store_item_category`
--
ALTER TABLE `online_store_item_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments_type`
--
ALTER TABLE `payments_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trainer_feedbacks`
--
ALTER TABLE `trainer_feedbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trainer_payments`
--
ALTER TABLE `trainer_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `trainer_shifts`
--
ALTER TABLE `trainer_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trainer_shifts_type`
--
ALTER TABLE `trainer_shifts_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workout_schedules`
--
ALTER TABLE `workout_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `workout_schedule_types`
--
ALTER TABLE `workout_schedule_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
