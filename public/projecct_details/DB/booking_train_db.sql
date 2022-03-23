-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2022 at 10:35 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking_train`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `booking_time` varchar(150) NOT NULL,
  `depart_city` varchar(40) NOT NULL,
  `arrive_city` varchar(40) NOT NULL,
  `during_time` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `depart_time` varchar(20) NOT NULL,
  `arrive_time` varchar(20) NOT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `phone_number` varchar(60) NOT NULL,
  `id_trip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `email`, `full_name`, `booking_time`, `depart_city`, `arrive_city`, `during_time`, `date`, `depart_time`, `arrive_time`, `user_id`, `price`, `phone_number`, `id_trip`) VALUES
(49, 'Youness', 'maska@maska.com', '2022-03-15 10:04', 'marrakech', 'casablanca', '00:00', '2022-03-16', '12:30', '12:43', '17', 908627, '12', 8),
(50, 'Youness', 'maska@maska.com', '2022-03-15 10:04', 'marrakech', 'casablanca', '00:00', '2022-03-16', '12:30', '12:43', '17', 908627, '12', 8),
(51, 'Youness', 'maska@maska.com', '2022-03-15 10:04', 'marrakech', 'casablanca', '00:00', '2022-03-16', '12:30', '12:43', '17', 908627, '12', 8),
(52, 'Youness', 'maska@maska.com', '2022-03-15 10:04', 'marrakech', 'casablanca', '00:00', '2022-03-16', '12:30', '12:43', '17', 908627, '12', 8),
(53, 'Youness', 'maska@maska.com', '2022-03-15 10:04', 'marrakech', 'casablanca', '00:00', '2022-03-16', '12:30', '12:43', '17', 908627, '12', 8);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, 'marrakech'),
(3, 'casablanca'),
(5, 'safi'),
(6, 'rabat');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `depart_time` varchar(50) NOT NULL,
  `arrive_time` varchar(50) NOT NULL,
  `during_time` varchar(50) NOT NULL,
  `depart_city` varchar(50) NOT NULL,
  `arrive_city` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `place_number` int(11) NOT NULL,
  `available` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id`, `date`, `depart_time`, `arrive_time`, `during_time`, `depart_city`, `arrive_city`, `price`, `place_number`, `available`) VALUES
(8, '2022-03-16', '12:30', '12:43', '00:00', 'marrakech', 'casablanca', 908627, 416448, '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `full_name`, `email`, `password`) VALUES
(17, 0, 'Youness', 'maska@maska.com', '1'),
(18, 1, 'Admin', 'admin@admin.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
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
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
