-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2022 at 07:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sl` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `lastname` text NOT NULL,
  `fullname` text NOT NULL,
  `gender` text NOT NULL,
  `bio` text NOT NULL,
  `hobbies` text NOT NULL,
  `email` text NOT NULL,
  `profilephoto` text NOT NULL,
  `dateRecentTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sl`, `FirstName`, `lastname`, `fullname`, `gender`, `bio`, `hobbies`, `email`, `profilephoto`, `dateRecentTime`) VALUES
(1, 'Suvendu', 'Chowdhury', 'Suvendu Chowdhury', 'Male', 'Talk cheap show me your code', 'listening to music, Gamming .', '', 'suvu06302022073135.jpg', '2022-06-30 11:01:35'),
(3, 'Tony', 'Stark', 'Tony Stark', 'Male', 'Hi Jarvis', 'All time fun', 'Tony@test.com', 'download06302022074400.jpg', '2022-06-30 11:14:00'),
(4, 'Bruce', 'Banner', 'Bruce Banner', 'Male', 'I am Hulk', 'Avenger team', 'supratim@123gmail.com', 'hulk06302022074714.jpg', '2022-06-30 11:17:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
