-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 02:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wandshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `wand_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `date`, `user_id`, `wand_id`, `quantity`, `price`, `status`) VALUES
(912, '0000-00-00', 'laura120555@gmail.com', 544, 1, 5.4, 1),
(1114, '0000-00-00', 'laura120555@gmail.com', 1656, 2, 34, 1),
(1345, '2020-01-07', 'fake@gmail.com', 4555, 2, 31, 1),
(3285, '0000-00-00', 'laura120555@gmail.com', 544, 3, 16.2, 1),
(3983, '0000-00-00', 'laura120555@gmail.com', 544, 1, 5.4, 1),
(5093, '0000-00-00', 'laura120555@gmail.com', 9220, 2, 19, 1),
(6133, '0000-00-00', 'laura120555@gmail.com', 62, 1, 23, 1),
(7926, '0000-00-00', 'laura120555@gmail.com', 9220, 1, 9.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core`
--

CREATE TABLE `core` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core`
--

INSERT INTO `core` (`id`, `name`) VALUES
(1, 'unicorn'),
(2, 'dragon'),
(3, 'phoenix');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Awaiting check payment'),
(2, 'Payment accepted'),
(3, 'Processing in progress'),
(4, 'Shipped'),
(5, 'Delivered'),
(6, 'Canceled'),
(7, 'Refunded'),
(8, 'Payment error');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `code` varchar(256) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pass`, `name`, `code`, `status`) VALUES
('admin', 'admin', 'admin', '60f86740f5cc95be97c8', 1),
('fake@gmail.com', '0000', 'sooyoung', 'd9c2e1d98a28eb62895f', 0),
('laura120555@gmail.com', '0000', 'SEOYOUNG KO', '12f03380822a768f07a6', 0),
('laura1205@naver.com', '0000', 'SEOYOUNG KO', '2817690b64ae788973be', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wands`
--

CREATE TABLE `wands` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `price` float NOT NULL,
  `wood_id` int(11) NOT NULL,
  `core_id` int(11) NOT NULL,
  `flexibility` int(11) NOT NULL,
  `length` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `img` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wands`
--

INSERT INTO `wands` (`id`, `name`, `price`, `wood_id`, `core_id`, `flexibility`, `length`, `quantity`, `img`) VALUES
(62, 'Toy Wand', 23, 5, 1, 5, 15, 32, 'noFile'),
(544, 'ron wand', 5.4, 4, 2, 4, 9.4, 24, 'noFile'),
(1656, 'Harry Potter Wand', 17, 1, 2, 3, 9, 45, 'noFile'),
(2290, 'Hermione Granger Illuminating Wand', 30, 3, 1, 5, 10, 30, 'noFile'),
(2327, 'testWand', 10.53, 1, 2, 4, 4, 31, 'noFile'),
(2407, 'Harry Potter Wand', 12, 4, 2, 1, 14, 19, 'noFile'),
(2493, 'Snape Wand', 26, 3, 3, 4, 17, 18, 'noFile'),
(2700, 'Hermione Granger Illuminating Wand', 14, 5, 2, 4, 12, 45, 'noFile'),
(2767, 'Magic Wand', 29, 1, 2, 1, 7, 39, 'noFile'),
(2909, 'The Elder Wand', 20, 1, 1, 3, 10, 36, 'noFile'),
(4321, 'Harry Potter Wand', 30, 2, 3, 3, 5, 16, 'noFile'),
(4555, 'harrypotter wand', 100.4, 1, 1, 3, 10.3, 10, 'noFile'),
(5486, 'Sirius Black wand', 6, 3, 2, 2, 10, 17, 'noFile'),
(5689, 'Harry Potter Wand', 28, 4, 1, 3, 8, 38, 'noFile'),
(6022, 'The Elder Wand', 13, 2, 2, 5, 5, 23, 'noFile'),
(7166, 'Hermione Granger Illuminating Wand', 9, 1, 1, 3, 8, 11, 'noFile'),
(7254, 'Harry Potter Wand', 7, 5, 3, 2, 19, 32, 'noFile'),
(7308, 'Luna Lovegood Wand', 13, 1, 1, 1, 12, 46, 'noFile'),
(7382, 'Luna Lovegood Wand', 27, 1, 3, 1, 6, 13, 'noFile'),
(8046, 'The Elder Wand', 15, 1, 2, 2, 14, 44, 'noFile'),
(8116, 'Luna Lovegood Wand', 30, 3, 3, 5, 17, 26, 'noFile'),
(8218, 'Hermione Granger Illuminating Wand', 9, 3, 1, 4, 6, 35, 'noFile'),
(8476, 'The Elder Wand', 13, 5, 3, 4, 7, 11, 'noFile'),
(8625, 'Ron Weasley Wand', 18, 4, 2, 5, 12, 15, 'noFile'),
(8675, 'Toy Wand', 10, 3, 2, 1, 20, 18, 'noFile'),
(8825, 'Magic Wand', 14, 4, 1, 1, 10, 34, 'noFile'),
(9164, 'Magic Wand', 15, 2, 2, 3, 5, 30, 'noFile'),
(9220, 'hihi', 9.5, 1, 1, 4, 13.4, 14, 'noFile'),
(9604, 'Seraphina Picquery Wand', 27, 3, 1, 4, 18, 40, 'noFile'),
(9746, 'Luna Lovegood Wand', 15, 3, 1, 4, 15, 24, 'noFile');

-- --------------------------------------------------------

--
-- Table structure for table `wood`
--

CREATE TABLE `wood` (
  `id` int(11) NOT NULL,
  `name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wood`
--

INSERT INTO `wood` (`id`, `name`) VALUES
(1, 'walnut'),
(2, 'ash'),
(3, 'hawthorn'),
(4, 'rosewood'),
(5, 'hornbean');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_wand_id` (`wand_id`);

--
-- Indexes for table `core`
--
ALTER TABLE `core`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wands`
--
ALTER TABLE `wands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_wood_id` (`wood_id`),
  ADD KEY `fk_core_id` (`core_id`);

--
-- Indexes for table `wood`
--
ALTER TABLE `wood`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7927;

--
-- AUTO_INCREMENT for table `core`
--
ALTER TABLE `core`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wands`
--
ALTER TABLE `wands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9747;

--
-- AUTO_INCREMENT for table `wood`
--
ALTER TABLE `wood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_wand_id` FOREIGN KEY (`wand_id`) REFERENCES `wands` (`id`);

--
-- Constraints for table `wands`
--
ALTER TABLE `wands`
  ADD CONSTRAINT `fk_core_id` FOREIGN KEY (`core_id`) REFERENCES `core` (`id`),
  ADD CONSTRAINT `fk_wood_id` FOREIGN KEY (`wood_id`) REFERENCES `wood` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
