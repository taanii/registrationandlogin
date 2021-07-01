-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2021 at 12:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `mob` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uname`, `name`, `email_address`, `password`, `addr`, `mob`) VALUES
(0, 'taani', 'Chaitanya Keerthi', 'kchatsemo@gmail.com', '$2y$10$EjG7zaBNcENCm.u5plD8h.fytu8zFokQiRRabrUHNeZ007Q0dPxz6', 'airoli', 2147483647),
(0, 'q', '', '', '$2y$10$9ZjKlKmQujtxHNXfu7MxXencRvA5PBbWHQAyw5Z3/zIVAi2As8rPO', '', 0),
(0, 'taani13', 'taani', 'kch@gmail.com', '$2y$10$Zc0sVISVLIatJ.kEz.oBHuAr9p3ihLlZ.5SysVYDA/DblaE/tjidm', '', 99);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
