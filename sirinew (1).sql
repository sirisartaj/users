-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 08:34 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirinew`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessrights`
--

CREATE TABLE `accessrights` (
  `idAccessRights` int(11) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `parentname` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accessrights`
--

INSERT INTO `accessrights` (`idAccessRights`, `Name`, `parentname`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'useradd', 'users', NULL, NULL, NULL),
(2, 'useredit', 'users', NULL, NULL, NULL),
(3, 'changepassword', 'users', NULL, NULL, NULL),
(4, 'userlist', 'users', NULL, NULL, NULL),
(5, 'rolelist', 'roles', NULL, NULL, NULL),
(6, 'roleadd', 'roles', NULL, NULL, NULL),
(7, 'roleedit', 'roles', NULL, NULL, NULL),
(8, 'roleprivilegesmapping', 'roles', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive',
  `deleted_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `status`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 1, 'Amaravati', 1, NULL, NULL, NULL),
(2, 2, 'Hyderabad', 1, NULL, NULL, NULL),
(3, 3, 'Lucknow', 1, NULL, NULL, NULL),
(4, 4, 'Bhopal', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roleprivileges`
--

CREATE TABLE `roleprivileges` (
  `id` int(11) NOT NULL,
  `iduserrole` int(11) NOT NULL,
  `idaccessright` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roleprivileges`
--

INSERT INTO `roleprivileges` (`id`, `iduserrole`, `idaccessright`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 7, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-08 09:27:05'),
(2, 7, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-08 09:27:05'),
(3, 7, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-08 09:27:12'),
(4, 7, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-08 09:27:12'),
(5, 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-08 09:27:12'),
(6, 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-08 23:35:05'),
(7, 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-09 00:22:19'),
(8, 7, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=Active | 0=Inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'AP', 1, NULL, NULL, NULL),
(2, 1, 'TS', 1, NULL, NULL, NULL),
(3, 1, 'UP', 1, NULL, NULL, NULL),
(4, 1, 'MP', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `iduserrole` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_by` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT 'Active--0,Inactive--1,Detete --9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`iduserrole`, `name`, `deleted_at`, `updated_at`, `created_at`, `deleted_by`, `status`) VALUES
(1, 'sara', '2022-11-07 05:25:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(2, 'sarnhj', '2022-11-07 05:26:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(3, 'sarpink', '2022-11-07 05:26:34', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(4, 'sarbluefhhh', '2022-11-08 04:53:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 9),
(5, 'aaaaa', '2022-11-07 05:30:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 9),
(6, 'sdfghj', '2022-11-07 05:31:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 9),
(7, 'kjhgf', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(8, '1', '2022-11-09 00:06:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 9),
(9, 'hr', '2022-11-07 05:44:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 9),
(10, '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(11, 'adminrole', '2022-11-09 00:17:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 9),
(12, 'role2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 9),
(13, 'wer', '2022-11-09 00:15:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 9),
(14, 'recent', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(15, 'recent2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-09 11:57:30', 0, 0),
(16, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-11-09 11:59:10', 0, 0),
(17, 'asdfb', '0000-00-00 00:00:00', '2022-11-09 12:01:09', '2022-11-09 12:00:22', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `LoginID` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `DisplayName` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `SurName` varchar(100) NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `EmailID` varchar(200) NOT NULL,
  `Phone` varchar(45) NOT NULL,
  `Mobile` varchar(45) NOT NULL,
  `MobileVerificationCode` varchar(20) NOT NULL,
  `MobileVerifiedDateTime` datetime NOT NULL,
  `EmailVerifiedDateTime` datetime NOT NULL,
  `EmailVerificationCode` varchar(20) NOT NULL,
  `MobileverificationcodeSentTime` datetime NOT NULL,
  `Address1` varchar(200) NOT NULL,
  `Address2` varchar(100) NOT NULL,
  `idCountry` int(11) DEFAULT NULL,
  `idState` int(11) NOT NULL,
  `idCity` int(11) NOT NULL,
  `idTimeZone` int(11) NOT NULL,
  `idLocale` int(11) NOT NULL,
  `Status` tinyint(4) DEFAULT 0 COMMENT '''Active--0,Inactive--1,Detete --9''',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `FacebookID` varchar(100) DEFAULT NULL,
  `UserType` enum('Admin','User') DEFAULT NULL,
  `isSuperAdmin` tinyint(1) DEFAULT NULL,
  `DOB` datetime DEFAULT NULL,
  `ProfilePicUrl` varchar(500) DEFAULT NULL,
  `UserRole` varchar(100) DEFAULT NULL,
  `idUserRole` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `LoginID`, `Password`, `DisplayName`, `Name`, `SurName`, `Gender`, `EmailID`, `Phone`, `Mobile`, `MobileVerificationCode`, `MobileVerifiedDateTime`, `EmailVerifiedDateTime`, `EmailVerificationCode`, `MobileverificationcodeSentTime`, `Address1`, `Address2`, `idCountry`, `idState`, `idCity`, `idTimeZone`, `idLocale`, `Status`, `deleted_at`, `created_at`, `updated_at`, `FacebookID`, `UserType`, `isSuperAdmin`, `DOB`, `ProfilePicUrl`, `UserRole`, `idUserRole`) VALUES
(1, 'aaa', 'sdfgh', 'sdfgh', '', 'fds', 'Female', 'ffgd', 'dfssd', 'lkjhgf', 'df', '2022-11-01 14:33:48', '2022-11-01 14:33:48', 'dfs', '2022-11-01 14:33:48', 'df', 'df', NULL, 1, 1, 1, 1, 1, '2022-11-07 03:27:24', '2022-11-01 14:33:48', '2022-11-07 11:17:06', NULL, 'User', NULL, NULL, NULL, NULL, NULL),
(2, 'code4_Password', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', 'code4', '', 'code4', 'Male', 'Password@Password.com', 'Password', 'Password', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'Password', 'Password', 1, 1, 1, 1, 1, 1, NULL, '0000-00-00 00:00:00', '2022-11-09 06:02:34', NULL, 'User', 0, '2017-08-09 00:00:00', NULL, 'User', 2),
(3, 'sartaj_5555555555', 'c9afc1e24683996516751b74ac34a4ef', 'sartaj', '', 'shaik', 'Male', 'sirisartaj@gmail.com', '8888888888', '5555555555', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'zxdcfvb', 'sdf', 1, 1, 1, 1, 1, 1, '2022-11-09 00:19:29', '0000-00-00 00:00:00', '2022-11-09 06:19:29', NULL, 'User', 0, '1990-11-13 00:00:00', NULL, 'User', 2),
(4, 'fdgfd_99999999', 'gfgh', 'fdgfd', '', 'fdgfd', 'Male', 'fgf@hjg.com', '6666666', '99999999', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'jhj', 'jhghj', 11, 1, 1, 1, 1, 1, '2022-11-07 04:37:47', '0000-00-00 00:00:00', '2022-11-07 11:17:06', NULL, 'User', 0, '2017-08-09 00:00:00', NULL, 'User', 2),
(5, '_', '16fab0410fb5be57a248f327281962c0', 'aaaa', 'siri', 'aaaa', 'Female', 'siri@ghm.com', '2222', '3333', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'wer', 'erdf', 1, 1, 1, 1, 1, 0, '2022-11-09 00:19:47', '0000-00-00 00:00:00', '2022-11-09 06:19:47', NULL, 'User', 0, '0000-00-00 00:00:00', NULL, '3', 10),
(6, 'edituser_8888989898', 'd41d8cd98f00b204e9800998ecf8427e', 'edituser', 'firstuser', 'lastuser', 'Female', 'last@hhh.com', '9999999999', '8888989898', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'sdf', 'sd', 1, 1, 1, 1, 1, 0, NULL, '0000-00-00 00:00:00', '2022-11-08 13:39:13', NULL, 'User', 0, '0000-00-00 00:00:00', NULL, '3', 10),
(7, '_', '123456', '', '', '', '', 'last@hhh.com', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', 1, 1, 1, 1, 1, 0, '2022-11-09 00:21:34', '0000-00-00 00:00:00', '2022-11-09 06:21:34', NULL, 'User', 0, '0000-00-00 00:00:00', NULL, 'kjhgf', 7),
(8, '_', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', 1, 1, 1, 1, 1, 0, NULL, '2022-11-09 12:02:36', NULL, NULL, 'User', 0, '0000-00-00 00:00:00', NULL, 'kjhgf', 7),
(9, '_', '123456', '', '', '', '', 'last@hhh.com', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', 1, 1, 1, 1, 1, 0, NULL, '2022-11-09 12:05:09', NULL, NULL, 'User', 0, '0000-00-00 00:00:00', NULL, 'kjhgf', 7),
(10, '_', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', 1, 1, 1, 1, 1, 0, NULL, '2022-11-09 12:06:23', NULL, NULL, 'User', 0, '0000-00-00 00:00:00', NULL, 'kjhgf', 7),
(11, '_', '123456', '', '', '', '', 'last@hhh.com', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', 1, 1, 1, 1, 1, 0, NULL, '2022-11-09 12:09:24', NULL, NULL, 'User', 0, '0000-00-00 00:00:00', NULL, 'kjhgf', 7),
(12, 'a_3333333333', '123456', 'a', 'a', '', '', 'a@sas.com', '3333333333', '3333333333', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', 1, 1, 1, 1, 1, 0, NULL, '2022-11-09 12:24:26', NULL, NULL, 'User', 0, '0000-00-00 00:00:00', NULL, 'kjhgf', 7),
(13, 'q_1111111111', '123456', 'f', 'f', '', '', 'fs@df.bnm', '123456', '3456', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '', 1, 1, 1, 1, 1, 0, NULL, '2022-11-09 12:25:33', '2022-11-09 07:03:23', NULL, 'User', 0, '0000-00-00 00:00:00', NULL, 'kjhgf', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessrights`
--
ALTER TABLE `accessrights`
  ADD PRIMARY KEY (`idAccessRights`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roleprivileges`
--
ALTER TABLE `roleprivileges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`iduserrole`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessrights`
--
ALTER TABLE `accessrights`
  MODIFY `idAccessRights` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roleprivileges`
--
ALTER TABLE `roleprivileges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `iduserrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
