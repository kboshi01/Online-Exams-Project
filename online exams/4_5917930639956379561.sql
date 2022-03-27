-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2020 at 09:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `questions` varchar(300) DEFAULT NULL,
  `answer1` varchar(300) DEFAULT NULL,
  `answer2` varchar(300) DEFAULT NULL,
  `answer3` varchar(300) DEFAULT NULL,
  `correct_answer` varchar(300) DEFAULT NULL,
  `exam_name` varchar(300) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `questions`, `answer1`, `answer2`, `answer3`, `correct_answer`, `exam_name`, `date`) VALUES
(35, 'any?', 'yes', 'no', 'max', 'max', 'kaster', '2020-03-09 10:55:40'),
(36, 'my name?', 'yes', 'no', 'max', 'yes', 'kaster', '2020-03-09 10:55:40'),
(37, 'ten?', '23', '404', '10', 'no correction', 'baskit', '2020-03-09 12:43:14'),
(38, 'car?', 'bmw', 'toyota', 'nothing', 'bmw', 'baskit', '2020-03-09 12:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `exams_submit`
--

CREATE TABLE `exams_submit` (
  `id` int(11) NOT NULL,
  `question` varchar(300) DEFAULT NULL,
  `answer` varchar(300) DEFAULT NULL,
  `correct_answer` varchar(300) DEFAULT NULL,
  `exam_name` varchar(300) DEFAULT NULL,
  `username` varchar(300) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams_submit`
--

INSERT INTO `exams_submit` (`id`, `question`, `answer`, `correct_answer`, `exam_name`, `username`, `name`, `date`) VALUES
(1, 'any?', 'max', 'true', 'kaster', 'adminone', 'mohamed', '2020-03-09 12:29:24'),
(2, 'my name?', 'no', 'false', 'kaster', 'adminone', 'mohamed', '2020-03-09 12:29:24'),
(3, 'ten?', '10', 'false', 'baskit', 'adminone', 'mohamed', '2020-03-09 12:44:14'),
(4, 'car?', 'toyota', 'false', 'baskit', 'adminone', 'mohamed', '2020-03-09 12:44:15'),
(5, 'ten?', '10', 'false', 'baskit', 'adminone', 'mohamed', '2020-03-09 12:48:36'),
(6, 'car?', 'bmw', 'true', 'baskit', 'adminone', 'mohamed', '2020-03-09 12:48:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `password`, `date`) VALUES
(1, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2020-03-09 09:49:09'),
(2, 'adminone', 'محمد احمد', 'bbadb4a5c5e8e19922201f2a9c8253c46b1f6f98', '2020-03-09 10:59:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams_submit`
--
ALTER TABLE `exams_submit`
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
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `exams_submit`
--
ALTER TABLE `exams_submit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
