-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 11:34 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loneliness`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullname`, `gender`, `phone`, `dob`, `email`, `password`) VALUES
(4, 'lisa._.tatya', 'newuser', 'Male', '123456789012', '2023-04-18', 'newuser@tes.com', '131002'),
(6, 'E3h0_0ff_cls', 'andii', 'Female', '123456789012', '2023-04-18', 'd@tes.com', '13'),
(7, 'E3h', 'andii', 'Male', '123456789012', '2023-04-18', 'd@tes.com', '11111'),
(8, 'E3h', 'andii', 'Male', '123456789012', '2023-04-18', 'd@tes.com', '11111'),
(9, 'ress', 'tes', 'Female', '123456789012', '2023-04-18', 'admin@gmail.com', '12'),
(10, 'ress', 'tes', 'Female', '123456789012', '2023-04-18', 'admin@gmail.com', '12'),
(11, 'joni', 'tess1', 'Female', '123456789012', '2023-04-18', 's@gmail.com', '11'),
(12, 'joni', 'tess1', 'Female', '123456789012', '2023-04-18', 's@gmail.com', '11'),
(13, 'joni', 'tess1', 'Female', '123456789012', '2023-04-18', 's@gmail.com', '11'),
(14, 'joni', 'tess1', 'Female', '123456789012', '2023-04-18', 's@gmail.com', '11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
