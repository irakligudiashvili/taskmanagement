-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2022 at 06:24 PM
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `assigned_to`, `assigned_by`, `created_at`, `updated_at`, `deadline`) VALUES
(1, 'Name', 'ajblkadffjksdjfj', 8, 2, '2022-02-07 16:25:25', '0000-00-00 00:00:00', '2022-03-02 20:00:00'),
(2, 'Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pretium lacinia diam vitae vulputate. Etiam porttitor neque vitae velit porta euismod. Phasellus iaculis metus mi, vel elementum felis varius eleifend. Vestibulum at tellus arcu. In hac habitasse platea dictumst. Etiam id blandit magna. Sed pulvinar pretium justo, id feugiat nibh commodo at.\r\n\r\nUt ac faucibus nulla. Nullam elementum metus risus, in euismod turpis aliquet nec. Curabitur ornare pretium orci vel commodo. Vivamus eget finibus nibh. Nam fermentum non augue sit amet auctor. Suspendisse ac sem sagittis, facilisis ligula vel, luctus orci. Quisque rutrum lacus aliquet vehicula pharetra. Sed ut tellus.', 2, 2, '2022-02-07 16:33:34', '0000-00-00 00:00:00', '2022-02-21 20:00:00'),
(3, 'Test 2', 'bla bla bla bla', 2, 2, '2022-02-07 16:59:22', '0000-00-00 00:00:00', '2022-02-05 20:00:00'),
(4, 'test', 'testestestestestestset', 3, 2, '2022-02-07 17:07:20', '0000-00-00 00:00:00', '2022-02-01 20:00:00'),
(5, 'asfdsdaf', 'sdafsdgsagfdg', 5, 3, '2022-02-07 17:07:54', '0000-00-00 00:00:00', '2022-02-15 20:00:00'),
(6, 'asdas', 'dasdasdasd', 2, 2, '2022-02-07 17:11:41', '0000-00-00 00:00:00', '2022-02-22 20:00:00'),
(7, 'asdfs', 'afasdfsf', 4, 4, '2022-02-07 17:23:38', '0000-00-00 00:00:00', '2022-02-09 20:00:00');

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
(2, 1, 3, 'jane', 'doe', 'Female', 'jdoe@gmail.com', '$2y$10$S1DDQsCBe3aO.FAxFoQx7.EF2PVskny8uERAqZkNpJ4JWIUFadMzO', 'image (1).jfif', 'NULL', '2022-02-05 14:10:19', '2022-02-07 17:13:40'),
(3, 1, 3, 'john', 'doe', 'Male', 'johndoe@gmail.com', '$2y$10$6iqZsOUCHG3nERjFpRjfQ.ObS1W2e525EEkha0VyXdQxIXgnJwBky', '', 'NULL', '2022-02-05 15:51:46', '2022-02-07 17:07:57'),
(4, 2, 2, 'Jack', 'Daniel', 'Male', 'jdaniel@gmail.com', '$2y$10$z95b3U2YTAHHz1oH8TlZOO0nWQl6eoSPeMILwRA5uMj6JkYYP1wAW', '', 'd6cd8e92a4362af4fdfd7d749e28c507', '2022-02-06 14:45:33', '2022-02-07 17:13:42'),
(5, 1, 1, 'Aden', 'Sawyer', 'Male', 'asawyer@gmail.com', '$2y$10$inMTdHFzguGKoFvCTJhnJu1bHA8FgBZzGMElH.a8aC3VQvrAiAh46', '', 'NULL', '2022-02-06 14:48:43', '2022-02-07 17:13:10'),
(6, 1, 2, 'Delores', 'Gates', 'Female', 'dgates@gmail.com', '$2y$10$p901v0cqLgqi6QQvyEXOfuRtDqcpN3YXnpvHBtjRo5NHk/9yEvdX2', '', '', '2022-02-06 14:49:10', '2022-02-06 14:49:10'),
(7, 2, 1, 'Roshan', 'Hussain', 'Female', 'rhussain@gmail.com', '$2y$10$jOUHbbBmjNe/qMU1Z56lDuGDJ4hGuGRkuXz6zdvc90.BGn409NeXy', 'image.jfif', 'NULL', '2022-02-06 14:50:39', '2022-02-06 19:34:17'),
(8, 2, 2, 'Latoya', 'Drew', 'Female', 'ldrew@gmail.com', '$2y$10$Bh0JwOkD5J0ISiQZF5AMCeAqWz5BeHkGs6.1f9RTAQLrs9bj1wsrC', '', '', '2022-02-06 14:50:54', '2022-02-06 14:50:54'),
(9, 2, 3, 'Devan', 'Kirkland', 'Male', 'dkirkland@gmail.com', '$2y$10$unYhe0V1P7RE22bZYj2pIONoOWywVroIhKWdW61Ltj63tGRiJpaSm', '', '', '2022-02-06 14:51:16', '2022-02-06 14:51:16'),
(10, 3, 1, 'Leonard', 'Grimes', 'Male', 'lgrimes@gmail.com', '$2y$10$V.4VMPNvM8HQHIyCCn/7j.O6RXdW1hAYzDsmaLewSsDBJ.IJd49oK', '', '', '2022-02-06 15:02:08', '2022-02-06 15:02:08'),
(11, 3, 2, 'Montell', 'Patton', 'Male', 'mpatton@gmail.com', '$2y$10$4pCiH2e0YXHcYW5aLAALb.Hpxj61Yu1rmfyE86J6cAZNm140gWbwa', '', '', '2022-02-06 15:02:35', '2022-02-06 15:02:35'),
(12, 3, 3, 'Jake', 'Hebert', 'Male', 'jhebert@gmail.com', '$2y$10$32GQ0gJoQWmutiXWKw.t2unTq.iyhiCIxVo0FnIc46XLhfU7uvg.y', '', '', '2022-02-06 15:02:54', '2022-02-06 15:02:54'),
(13, 4, 1, 'Rio', 'Curtis', 'Male', 'rcurtis@gmail.com', '$2y$10$8O94beshRQOFm6J45R1fvOM8h.WjbI8h.Kh3w/S1XhO1uGC3qeUGa', '', 'NULL', '2022-02-06 15:03:11', '2022-02-06 17:38:12'),
(14, 4, 2, 'Alex', 'Camacho', 'Male', 'acamacho@gmail.com', '$2y$10$tRe5mZqU.cIoeMdy1/wrAO.7ZT7tm25mG/6WgXkDAMhf9.dyb5czq', '', 'NULL', '2022-02-06 15:03:30', '2022-02-06 17:47:29'),
(15, 4, 3, 'Mina', 'Sargent', 'Male', 'msargent@gmail.com', '$2y$10$iSeiENPc21hTqHZqxa9NuOwB2BpXc2fXFFCIFA85qnVvC0uICNwSm', '', '', '2022-02-06 15:03:47', '2022-02-06 15:03:47'),
(16, 1, 3, 'Roberta', 'Glover', 'Female', 'rglover@gmail.com', '$2y$10$8D7Q1EsnMlMHt1GhEHUMUO6OVL8S5riYg88XVO09VTuHTMgkGc8Pm', 'afgdfgdf.jfif', 'NULL', '2022-02-06 16:16:02', '2022-02-06 17:17:24');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
