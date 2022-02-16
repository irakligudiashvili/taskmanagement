-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 05:56 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `id` tinyint(3) NOT NULL,
  `title` varchar(151) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`id`, `title`) VALUES
(1, 'Employee'),
(2, 'Manager'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(151) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'IT'),
(2, 'Developer'),
(3, 'Marketing'),
(4, 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(151) NOT NULL,
  `description` text NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `deadline` date DEFAULT NULL,
  `completed` int(11) NOT NULL DEFAULT '0',
  `completed_date` date DEFAULT NULL,
  `link` varchar(151) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `assigned_to`, `assigned_by`, `department_id`, `created_at`, `updated_at`, `deadline`, `completed`, `completed_date`, `link`) VALUES
(1, 'Name', 'ajblkadffjksdjfj', 8, 2, 2, '2022-02-07 16:25:25', '2022-02-09 15:36:21', '2022-02-16', 0, NULL, ''),
(2, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pretium lacinia diam vitae vulputate. Etiam porttitor neque vitae velit porta euismod. Phasellus iaculis metus mi, vel elementum felis varius eleifend. Vestibulum at tellus arcu. In hac habitasse platea dictumst. Etiam id blandit magna. Sed pulvinar pretium justo, id feugiat nibh commodo at.\r\n\r\nUt ac faucibus nulla. Nullam elementum metus risus, in euismod turpis aliquet nec. Curabitur ornare pretium orci vel commodo. Vivamus eget finibus nibh. Nam fermentum non augue sit amet auctor. Suspendisse ac sem sagittis, facilisis ligula vel, luctus orci. Quisque rutrum lacus aliquet vehicula pharetra. Sed ut tellus.', 2, 2, 1, '2022-02-07 16:33:34', '2022-02-09 16:00:15', '2022-02-16', 1, '2022-02-09', 'github'),
(3, 'Test 2', 'bla bla bla bla', 2, 2, 1, '2022-02-07 16:59:22', '2022-02-09 20:07:35', '2022-02-16', 1, '2022-02-10', 'fa'),
(4, 'test', 'testestestestestestset', 3, 2, 1, '2022-02-07 17:07:20', '2022-02-09 15:36:26', '2022-02-16', 0, NULL, ''),
(5, 'asfdsdaf', 'sdafsdgsagfdg', 5, 3, 1, '2022-02-07 17:07:54', '2022-02-10 16:07:05', '2022-02-16', 1, '2022-02-10', 'asdasd'),
(6, 'asdas', 'dasdasdasd', 2, 2, 1, '2022-02-07 17:11:41', '2022-02-09 16:00:27', '2022-02-16', 1, '2022-02-09', 'uiasdhufd'),
(7, 'asdfs', 'afasdfsf', 4, 4, 2, '2022-02-07 17:23:38', '2022-02-09 15:36:30', '2022-02-16', 0, NULL, ''),
(8, 'gfshgfdhsfdh', 'oidshgfisdahfiuohdiusfhiuoashfuisdhaf', 2, 2, 1, '2022-02-09 20:19:40', '2022-02-09 22:10:15', '2022-02-18', 1, '2022-02-10', 'https://www.google.com'),
(9, 'dsnrtnstn', 'gsdfgdfsgdfshrtnj', 2, 2, 1, '2022-02-09 20:43:07', '2022-02-09 22:10:14', '2022-02-02', 1, '2022-02-10', 'asdfsdaf'),
(10, 'adsf', 'sdafsadfsdaf', 5, 6, 1, '2022-02-09 21:37:28', '2022-02-09 22:10:13', '2022-02-19', 0, NULL, ''),
(11, 'sadfsadf', 'sadfsafs', 6, 6, 1, '2022-02-09 21:37:37', '2022-02-09 22:10:12', '2022-02-24', 1, '2022-02-10', 'sdf'),
(12, 'hfgdhfdghfgdh', 'hfdhfgdhfdg', 6, 6, 1, '2022-02-09 21:38:53', '2022-02-09 22:10:11', '2022-02-18', 0, NULL, ''),
(13, 'sdfgdsfgdfsg', 'dsfgdfgdfs', 2, 2, 1, '2022-02-09 21:52:43', '2022-02-09 22:10:10', '2022-02-04', 0, NULL, ''),
(14, 'sdfgdfgdsfg', 'dfgsdgfdg', 2, 2, 1, '2022-02-09 21:52:47', '2022-02-09 22:10:07', '2022-02-11', 0, NULL, ''),
(15, 'task one', 'please do this', 2, 2, 1, '2022-02-09 21:58:46', '2022-02-09 22:10:06', '2022-02-26', 1, '2022-02-10', 'i did it'),
(16, 'asdasd', 'asdasd', 2, 2, 1, '2022-02-09 21:59:57', '2022-02-09 22:10:05', '2022-03-06', 0, NULL, ''),
(17, 'cvbnvcbn', 'gvbncvnb', 1, 2, 1, '2022-02-09 22:00:40', '2022-02-09 22:10:03', '2022-02-12', 0, NULL, ''),
(18, 'asd', 'asd', 2, 2, 1, '2022-02-09 22:01:21', '2022-02-09 22:10:01', '2022-02-26', 0, NULL, ''),
(19, 'asdfsadf', 'asdfsdaf', 2, 2, 1, '2022-02-09 22:09:06', NULL, '2022-03-05', 0, NULL, ''),
(20, 'this is a name', 'this is a description', 2, 2, 1, '2022-02-09 22:09:29', '2022-02-09 22:09:34', '2022-03-05', 1, '2022-02-10', 'this is a link'),
(21, 'asdasdasd', 'adasd', 7, 4, 2, '2022-02-10 11:42:37', NULL, '2022-02-18', 0, NULL, ''),
(22, 'adasd', 'asdasd', 4, 4, 2, '2022-02-10 11:42:43', '2022-02-10 12:29:26', '2022-02-25', 1, '2022-02-10', 'asd'),
(23, 'asdfasdfsf', 'asdfsdf', 11, 11, 3, '2022-02-10 16:00:20', '2022-02-10 16:00:26', '2022-02-17', 1, '2022-02-10', 'ffffffff'),
(24, 'sadfsfs', 'asdfsdf', 13, 15, 4, '2022-02-10 16:01:37', '2022-02-10 16:02:02', '2022-02-24', 1, '2022-02-10', 'asdasdsa'),
(25, 'sdfsdfsdfdsf', 'dfdsfsdf', 13, 14, 4, '2022-02-10 16:04:31', NULL, '2022-02-18', 0, NULL, ''),
(26, 'DADASD', 'ASDASD', 13, 14, 4, '2022-02-10 16:04:50', NULL, '2022-02-25', 0, NULL, ''),
(27, 'asdasdsa', 'asdasd', 14, 14, 4, '2022-02-10 16:05:29', '2022-02-10 16:05:34', '2022-02-17', 1, '2022-02-10', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `authority_id` int(11) NOT NULL,
  `name` varchar(151) NOT NULL,
  `surname` varchar(151) NOT NULL,
  `gender` varchar(151) NOT NULL,
  `email` varchar(151) NOT NULL,
  `password` varchar(60) NOT NULL,
  `img` varchar(151) NOT NULL,
  `verify_key` varchar(151) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department_id`, `authority_id`, `name`, `surname`, `gender`, `email`, `password`, `img`, `verify_key`, `created_at`, `updated_at`) VALUES
(2, 1, 3, 'jane', 'doe', 'Female', 'jdoe@gmail.com', '$2y$10$HXDYH2EG2qG/N3u76WV4YegWmhAzxRw7lGNLZJjH2Q4yKhtbAKQVu', 'image (1).jfif', 'NULL', '2022-02-05 14:10:19', '2022-02-10 16:46:23'),
(3, 1, 3, 'john', 'doe', 'Male', 'johndoe@gmail.com', '$2y$10$6iqZsOUCHG3nERjFpRjfQ.ObS1W2e525EEkha0VyXdQxIXgnJwBky', '', 'NULL', '2022-02-05 15:51:46', '2022-02-07 17:07:57'),
(4, 2, 2, 'Jack', 'Daniel', 'Male', 'jdaniel@gmail.com', '$2y$10$z95b3U2YTAHHz1oH8TlZOO0nWQl6eoSPeMILwRA5uMj6JkYYP1wAW', '', '88a43267dccea9e8c0911f13059ac4e4', '2022-02-06 14:45:33', '2022-02-10 11:42:19'),
(5, 1, 1, 'Aden', 'Sawyer', 'Male', 'asawyer@gmail.com', '$2y$10$inMTdHFzguGKoFvCTJhnJu1bHA8FgBZzGMElH.a8aC3VQvrAiAh46', '', 'NULL', '2022-02-06 14:48:43', '2022-02-10 16:07:23'),
(6, 1, 2, 'Delores', 'Gates', 'Female', 'dgates@gmail.com', '$2y$10$p901v0cqLgqi6QQvyEXOfuRtDqcpN3YXnpvHBtjRo5NHk/9yEvdX2', '', 'NULL', '2022-02-06 14:49:10', '2022-02-09 21:44:48'),
(7, 2, 1, 'Roshan', 'Hussain', 'Female', 'rhussain@gmail.com', '$2y$10$jOUHbbBmjNe/qMU1Z56lDuGDJ4hGuGRkuXz6zdvc90.BGn409NeXy', 'image.jfif', 'NULL', '2022-02-06 14:50:39', '2022-02-06 19:34:17'),
(9, 2, 3, 'Devan', 'Kirkland', 'Male', 'dkirkland@gmail.com', '$2y$10$unYhe0V1P7RE22bZYj2pIONoOWywVroIhKWdW61Ltj63tGRiJpaSm', '', '', '2022-02-06 14:51:16', '2022-02-06 14:51:16'),
(10, 3, 1, 'Leonard', 'Grimes', 'Male', 'lgrimes@gmail.com', '$2y$10$V.4VMPNvM8HQHIyCCn/7j.O6RXdW1hAYzDsmaLewSsDBJ.IJd49oK', '', 'NULL', '2022-02-06 15:02:08', '2022-02-10 16:47:54'),
(11, 3, 2, 'Montell', 'Patton', 'Male', 'mpatton@gmail.com', '$2y$10$4pCiH2e0YXHcYW5aLAALb.Hpxj61Yu1rmfyE86J6cAZNm140gWbwa', '', 'NULL', '2022-02-06 15:02:35', '2022-02-10 16:01:00'),
(12, 3, 3, 'Jake', 'Hebert', 'Male', 'jhebert@gmail.com', '$2y$10$32GQ0gJoQWmutiXWKw.t2unTq.iyhiCIxVo0FnIc46XLhfU7uvg.y', '', '', '2022-02-06 15:02:54', '2022-02-06 15:02:54'),
(13, 4, 1, 'Rio', 'Curtiss', 'Male', 'rcurtis@gmail.com', '$2y$10$8O94beshRQOFm6J45R1fvOM8h.WjbI8h.Kh3w/S1XhO1uGC3qeUGa', '', 'NULL', '2022-02-06 15:03:11', '2022-02-10 16:05:12'),
(14, 4, 2, 'Alex', 'Camacho', 'Male', 'acamacho@gmail.com', '$2y$10$K1lyI24mB1m1Q7pi9fEi0u8z2oIm.nZHrcZ9c/gMnjarS0.kYnK5i', '', 'NULL', '2022-02-06 15:03:30', '2022-02-10 16:06:07'),
(15, 4, 3, 'Mina', 'Sargent', 'Male', 'msargent@gmail.com', '$2y$10$iSeiENPc21hTqHZqxa9NuOwB2BpXc2fXFFCIFA85qnVvC0uICNwSm', '', 'NULL', '2022-02-06 15:03:47', '2022-02-10 16:06:56'),
(16, 1, 3, 'Roberta', 'Gloverr', 'Female', 'rglover@gmail.com', '$2y$10$8D7Q1EsnMlMHt1GhEHUMUO6OVL8S5riYg88XVO09VTuHTMgkGc8Pm', 'afgdfgdf.jfif', 'NULL', '2022-02-06 16:16:02', '2022-02-08 16:08:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
