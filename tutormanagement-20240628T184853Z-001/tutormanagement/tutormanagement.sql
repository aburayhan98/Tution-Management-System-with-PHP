-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2023 at 03:02 PM
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
-- Database: `tutormanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `transaction_id` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `for_class` varchar(20) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `salary` varchar(20) DEFAULT NULL,
  `approved` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `transaction_id`, `email`, `phone`, `for_class`, `gender`, `district`, `salary`, `approved`) VALUES
(4, 'Baitul Atik', 'ifjadkhsdkhfuthuiehiuefher', 'atik@gmail.com', '01999011266', 'HSC', 'Any', 'Dhaka', '6000', 0),
(5, 'Abu Bakar', 'dsjfajkbjafabdjfbhf', 'abubakar@gmail.com', '01999011267', '9', 'Any', 'Mymensingh', '4000', 1),
(6, 'Saklain Mustak', 'djadhjkfhkjhf', 'saklain@gmail.com', '01999011268', '10', 'Any', 'Cumilla', '5000', 1),
(7, 'MD.Nurul Islam', 'hghjghjtfftftft', 'nurul@gmail.com', '01999011240', 'SSC (Math,HIgher Mat', 'Male', 'Dhaka', '4000-5000', 1),
(8, 'abc', 'gghjgjhg', 'abc@gmail.com', '01999011269', 'HSC(All)', 'Male', 'Dhaka', '6000', 1),
(9, 'Sifatxyz', 'dlkfjroithihdksajnfklerfnwhb', 'sifatxyz@gmail.com', '017555555555', 'SSC', 'Male', 'Dhaka', '4500', 1),
(10, 'Sifat ABC', 'kdlsthjierl hjiljlkejfklierjre', 'sifatabc@gmail.com', '01700000000', '9', 'Male', 'Cumilla', '5000', 1),
(11, 'Abdur Rahim', 'kkjiuhj iljnkljiohjio ', 'abdurrahim@gmail.com', '01711111111', '8', 'Male', 'Mymensingh', '2500', 1),
(12, 'Ali Abdullah', 'jhdjkeqheiuhishdhu', 'ali@gmail.com', '017555555556', '7', 'Male', 'Mymensingh', '2500', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `password` varchar(18) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `salary` varchar(20) DEFAULT NULL,
  `week_day` int(11) DEFAULT NULL,
  `preffered_subjects` varchar(40) DEFAULT NULL,
  `preffered_area` varchar(40) DEFAULT NULL,
  `imageURL` varchar(140) DEFAULT NULL,
  `last_degree` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `district`, `salary`, `week_day`, `preffered_subjects`, `preffered_area`, `imageURL`, `last_degree`) VALUES
(1, 'Md Abu Rayhan', 'aburayhan049596@gmail.com', '01703049596', '12345', 'Mymensingh', '6000', 3, '  Any', ' Sadar,Mymensingh', 'https://portal.ewubd.edu/Documents/StudentProfile/2019-2-60-061.jpg', 'HSC'),
(2, 'Test 2', 'test9@gmail.com', '01999011261', '12345', '', '12000', 3, '        Physics      ', ' Rampura   ', 'https://cdn.britannica.com/63/222663-050-58CCA884/Soccer-forward-Cristiano-Ronaldo-2018.jpg', 'BSC'),
(3, 'Test 1', 'test@gmail.com', '01999011262', '12345', 'Dhaka', '12000', 3, '  Chemistry', ' Aftabnagar', 'https://img.a.transfermarkt.technology/portrait/header/28003-1671435885.jpg?lm=1', 'BSC'),
(4, 'Arnab Saha', 'arnab_iiest@gmail.com', '01680140184', '12345', 'Cumilla', '6000', 3, '     Math,English,Bangla   ', ' Cumilla Sadar   ', 'https://portal.ewubd.edu/Documents/StudentProfile/2019-2-60-087.jpg', 'BSC'),
(5, 'Shafin Hashem', 'shafin@gmail.com', '01999011265', '12345', 'Dhaka', '6000', 3, '  Biology', ' Malibag', 'https://portal.ewubd.edu/Documents/StudentProfile/2019-2-60-060.jpg', 'BSC'),
(6, 'Asma Akter', 'asma@gmail.com', '01999011260', '12345', 'Rangpur', '4000', 3, '    Higher Math  ', ' RangpurCity  ', '', 'HSC'),
(7, 'arnab', 'arnab123@gmail.com', '01999011269', '12345', 'Dhaka', '6000', 3, '  Biology', ' rampura', 'https://portal.ewubd.edu/Documents/StudentProfile/2019-2-60-065.jpg', 'BSC'),
(8, 'Sifat Sakib', 'sifat@gmail.com', '01707955070', '123456', '', '4000', 3, '          SSC,Mathmatics', ' Jatrabari,Dhaka         ', 'https://portal.ewubd.edu/Documents/StudentProfile/2019-2-60-032.jpg', 'BSC'),
(9, 'Test', 'testuser@gmail.com', '01757995012', '12345', '', '5000', 3, '   All ', ' Banasree ', 'https://portal.ewubd.edu/Documents/StudentProfile/2019-2-60-048.jpg', 'BSC'),
(10, 'Md. Mainul Hasan', 'mdrifatbd5@gmail.com', '01757995016', '12345', 'Dhaka', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'sdjsjdsdjs', 'sdsdsdsds', '0175700153', '1234', 'Cumilla', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Abu Rayhan', 'fdfsf', '42424242', '1234', 'Mymensingh', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Aby Rayhan', 'test3@gmail.com', '01772334516', 'inputPassword', 'Mymensingh', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'ABC Emon', 'test4@gmail.com', '01711111111', 'inputPassword', 'Mymensingh', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Taifur Munna', 'taifur@gmail.com', '01303470926', 'inputPassword', 'Mymensingh', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Abdul Kabir', 'abdul@gmail.com', '01303470927', 'inputPassword', 'Mymensingh', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Abdul Alim', 'abdulalim@gmail.com', '01303470928', 'inputPassword', 'Mymensingh', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Abdur Rahim', 'rahim@gmail.com', '01303470929', 'inputPassword', 'Mymensingh', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
