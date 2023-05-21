-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2023 at 06:31 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institute`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstName`, `lastName`, `email`, `address`, `city`, `state`, `gender`, `image`) VALUES
(1, 'Huzaifa', 'Kamran', 'huzaifa@gmail.com', 'karachi', 'KHI', 'Sindh', 'male', 'foto-sushi-6anudmpILw4-unsplash.jpg'),
(2, 'Abdul', 'Raffay', 'raffay@gmail.com', 'karachi', 'LHR', 'Punjab', 'male', 'oguz-yagiz-kara-MZf0mI14RI0-unsplash.jpg'),
(3, 'Muhammad', 'Uzair', 'uzairsheikh@gmail.com', 'Islamabad', 'ISB', 'Punjab', 'male', 'ed-pylypenko-7zcbtbI4E2o-unsplash.jpg'),
(4, 'Uzair', 'Hashmi', 'hashmi@gmail.com', 'Korangi', 'KHI', 'Sindh', 'male', 'christian-buehner-DItYlc26zVI-unsplash.jpg'),
(5, 'Baber', 'Azam', 'baber@gmail.com', 'karachi', 'KHI', 'Sindh', 'male', 'Baber Azam 1111.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
