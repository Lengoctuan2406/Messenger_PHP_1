-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 06:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messenger_php_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(5) NOT NULL,
  `account_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `github` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slack` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `account_status` int(1) DEFAULT NULL,
  `created_date` date DEFAULT current_timestamp(),
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `account_name`, `avatar`, `country`, `phone`, `email`, `password`, `bio`, `twitter`, `facebook`, `instagram`, `github`, `slack`, `account_status`, `created_date`, `modified_date`) VALUES
(1, 'Lê Ngọc Tuấn', '12.jpg', 'Hồ Chí Minh', '0984121999', 'lengoctuan2406@gmail.com', '123', 'Tôi là một người không thích cầu kì', NULL, 'https://www.facebook.com/willbebetterthannow/', NULL, 'https://github.com/Lengoctuan2406', NULL, 1, '2022-05-19', '2022-05-19'),
(2, 'Huỳnh Thị Như Phương', '12.jpg', 'Hồ Chí Minh', '0982334556', 'huynhthinhuphuong@gmail.com', '123456789', 'Người cá tính mạnh', NULL, NULL, NULL, NULL, NULL, 1, '2022-05-19', '2022-05-19'),
(3, 'Lê Bích Ngọc', '12.jpg', 'Hồ Chí Minh', '0984121999', 'lebichngoc@gmail.com', '123456789', 'Không biết', NULL, 'https://www.facebook.com/willbebetterthannow/', NULL, NULL, NULL, 1, '2022-05-19', '2022-05-19'),
(4, 'Lê Huỳnh Lan Hạ', '12.jpg', 'Hồ Chí Minh', '0982334533', 'lehuynhlanha@gmail.com', '123456789', 'Không biết nữa', NULL, NULL, NULL, NULL, NULL, 1, '2022-05-19', '2022-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(5) NOT NULL,
  `account_id` int(5) DEFAULT NULL,
  `name_chat_with` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp(),
  `modified_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(5) NOT NULL,
  `status_name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(1, 'Đang offline'),
(2, 'Đang online'),
(3, 'Đã gửi'),
(4, 'Đã xem'),
(5, 'Đã xóa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
