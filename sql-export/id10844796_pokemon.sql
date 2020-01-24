-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2020 at 05:06 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10844796_pokemon`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pokemon_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `mse_userid` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `pokemon_id`, `date`, `quantity`, `price`, `mse_userid`) VALUES
(43, 20, 12, '2020-01-23 22:31:29', 1, 0, '12');

-- --------------------------------------------------------

--
-- Table structure for table `generations`
--

CREATE TABLE `generations` (
  `generation` int(11) NOT NULL,
  `gen_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `generations`
--

INSERT INTO `generations` (`generation`, `gen_name`) VALUES
(1, 'Generation I'),
(2, 'Generation II'),
(3, 'Generation III'),
(4, 'Generation IV'),
(5, 'Generation V'),
(6, 'Generation VI'),
(7, 'Generation VII'),
(8, 'Generation VIII');

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
  `pokemon_id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `shiny` tinyint(1) NOT NULL,
  `health_point` int(11) NOT NULL,
  `attack_power` int(11) NOT NULL,
  `defense_power` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `stock` int(11) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`pokemon_id`, `name`, `shiny`, `health_point`, `attack_power`, `defense_power`, `price`, `gender`, `stock`, `img`) VALUES
(1, 20, 1, 76, 80, 11, 167, 'Female', -3, 'https://c7.uihere.com/files/773/168/883/pokemon-go-pokemon-yellow-pikachu-ash-ketchum-pikachu-png-thumb.jpg'),
(2, 5, 0, 94, 93, 21, 104, 'Male', 7, 'https://i7.pngguru.com/preview/315/836/991/pokemon-diamond-and-pearl-pokemon-platinum-piplup-pokemon-png.jpg'),
(3, 20, 1, 11, 76, 11, 98, 'Female', 3, 'https://www.pikpng.com/pngl/m/574-5748940_sandslash-png-sandslash-pokemon-transparent-png.png'),
(4, 48, 1, 46, 57, 75, 178, 'Female', 4, 'https://i1.pngguru.com/preview/239/357/121/eeveelution-vaporeon-blue-pokemon-character-png-clipart.jpg'),
(5, 30, 0, 47, 82, 18, 74, 'Female', 8, 'https://www.pikpng.com/pngl/m/574-5748940_sandslash-png-sandslash-pokemon-transparent-png.png'),
(6, 18, 0, 11, 99, 98, 104, 'Female', 4, 'https://i1.pngguru.com/preview/239/357/121/eeveelution-vaporeon-blue-pokemon-character-png-clipart.jpg'),
(7, 20, 1, 95, 13, 6, 114, 'Female', 3, 'https://c7.uihere.com/files/773/168/883/pokemon-go-pokemon-yellow-pikachu-ash-ketchum-pikachu-png-thumb.jpg'),
(8, 54, 0, 73, 23, 65, 81, 'Female', 6, 'https://c7.uihere.com/files/773/168/883/pokemon-go-pokemon-yellow-pikachu-ash-ketchum-pikachu-png-thumb.jpg'),
(9, 45, 0, 90, 78, 73, 121, 'Male', 3, 'https://p1.hiclipart.com/preview/190/609/86/jolteon-sitting-pokemon-pikachu-png-clipart.jpg'),
(10, 23, 0, 1, 34, 98, 67, 'Male', 0, 'https://www.pikpng.com/pngl/m/574-5748940_sandslash-png-sandslash-pokemon-transparent-png.png'),
(11, 26, 0, 22, 22, 14, 29, 'Female', 5, 'https://p1.hiclipart.com/preview/190/609/86/jolteon-sitting-pokemon-pikachu-png-clipart.jpg'),
(12, 46, 0, 47, 5, 5, 29, 'Female', 6, 'https://www.pikpng.com/pngl/m/574-5748940_sandslash-png-sandslash-pokemon-transparent-png.png'),
(13, 24, 1, 77, 34, 73, 184, 'Female', 1, 'https://img.pngio.com/mew-pokemon-pokedex-generazione-pokemon-png-download-671751-pokemon-mew-png-900_760.jpg'),
(14, 23, 0, 28, 63, 98, 95, 'Male', 0, 'https://www.pikpng.com/pngl/m/522-5220219_oddish-transparent-background-oddish-pokemon-hd-png-download.png'),
(15, 38, 0, 46, 9, 66, 61, 'Female', 6, 'https://p1.hiclipart.com/preview/190/609/86/jolteon-sitting-pokemon-pikachu-png-clipart.jpg'),
(16, 38, 0, 65, 98, 79, 121, 'Female', 3, 'https://i7.pngguru.com/preview/315/836/991/pokemon-diamond-and-pearl-pokemon-platinum-piplup-pokemon-png.jpg'),
(17, 24, 1, 95, 59, 31, 185, 'Female', 1, 'https://www.pikpng.com/pngl/m/522-5220219_oddish-transparent-background-oddish-pokemon-hd-png-download.png'),
(20, 6, 1, 100, 100, 100, 500, 'Female', 0, 'https://img2.freepng.es/20190420/chc/kisspng-charizard-dragon-art-illustration-fire-winter-breath-transparent-amp-png-clipart-free-d-5cbabb5fbc7227.4639067915557415357719.jpg'),
(21, 12, 1, 99, 35, 65, 199, 'Female', 8, 'https://www.pikpng.com/pngl/m/574-5748940_sandslash-png-sandslash-pokemon-transparent-png.png'),
(22, 28, 1, 71, 75, 39, 185, 'Female', 9, 'https://i7.pngguru.com/preview/315/836/991/pokemon-diamond-and-pearl-pokemon-platinum-piplup-pokemon-png.jpg'),
(23, 20, 1, 52, 30, 67, 149, 'Female', 10, 'https://img.pngio.com/mew-pokemon-pokedex-generazione-pokemon-png-download-671751-pokemon-mew-png-900_760.jpg'),
(24, 48, 1, 84, 89, 89, 262, 'Female', 10, 'https://www.pikpng.com/pngl/m/522-5220219_oddish-transparent-background-oddish-pokemon-hd-png-download.png'),
(25, 48, 1, 19, 51, 52, 122, 'Female', 8, 'https://i7.pngguru.com/preview/315/836/991/pokemon-diamond-and-pearl-pokemon-platinum-piplup-pokemon-png.jpg'),
(26, 40, 1, 73, 97, 56, 226, 'Female', 10, 'https://www.pikpng.com/pngl/m/574-5748940_sandslash-png-sandslash-pokemon-transparent-png.png'),
(27, 40, 1, 24, 27, 73, 124, 'Female', 0, 'https://i7.pngguru.com/preview/315/836/991/pokemon-diamond-and-pearl-pokemon-platinum-piplup-pokemon-png.jpg'),
(28, 16, 1, 59, 17, 71, 147, 'Female', 1, 'https://www.pikpng.com/pngl/m/574-5748940_sandslash-png-sandslash-pokemon-transparent-png.png'),
(29, 44, 1, 55, 24, 9, 88, 'Female', 0, 'https://img.pngio.com/mew-pokemon-pokedex-generazione-pokemon-png-download-671751-pokemon-mew-png-900_760.jpg'),
(30, 40, 1, 61, 35, 19, 115, 'Female', 5, 'https://www.pikpng.com/pngl/m/574-5748940_sandslash-png-sandslash-pokemon-transparent-png.png'),
(31, 24, 1, 52, 14, 53, 119, 'Female', 3, 'https://www.pikpng.com/pngl/m/522-5220219_oddish-transparent-background-oddish-pokemon-hd-png-download.png'),
(32, 52, 1, 42, 40, 0, 82, 'Female', 9, 'https://i7.pngguru.com/preview/315/836/991/pokemon-diamond-and-pearl-pokemon-platinum-piplup-pokemon-png.jpg'),
(33, 28, 1, 34, 28, 25, 87, 'Female', 8, 'https://www.pikpng.com/pngl/m/522-5220219_oddish-transparent-background-oddish-pokemon-hd-png-download.png');

-- --------------------------------------------------------

--
-- Table structure for table `poke_types`
--

CREATE TABLE `poke_types` (
  `pok_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` int(11) NOT NULL,
  `special` int(11) NOT NULL,
  `generation` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poke_types`
--

INSERT INTO `poke_types` (`pok_id`, `name`, `type`, `special`, `generation`, `stock`, `description`) VALUES
(1, 'Bulbasaur', 14, 2, 6, 16, ''),
(2, 'Ivysaur', 3, 2, 6, 7, ''),
(3, 'Venusaur', 5, 0, 1, 19, ''),
(4, 'Charmander', 10, 1, 7, 9, ''),
(5, 'Charmeleon', 13, 3, 7, 20, ''),
(6, 'Charizard', 14, 3, 5, 15, ''),
(7, 'Squirtle', 18, 3, 3, 11, ''),
(8, 'Wartortle', 13, 3, 4, 6, ''),
(9, 'Blastoise', 2, 1, 8, 11, ''),
(10, 'Caterpie', 12, 3, 4, 9, ''),
(11, 'Metapod', 16, 0, 1, 16, ''),
(12, 'Butterfree', 15, 1, 1, 12, ''),
(13, 'Weedle', 16, 3, 8, 18, ''),
(14, 'Kakuna', 17, 2, 1, 11, ''),
(15, 'Beedrill', 17, 0, 1, 13, ''),
(16, 'Pidgey', 10, 3, 8, 10, ''),
(17, 'Pidgeotto', 12, 0, 5, 9, ''),
(18, 'Pidgeot', 14, 0, 2, 19, ''),
(19, 'Rattata', 1, 1, 1, 12, ''),
(20, 'Raticate', 2, 2, 4, 12, ''),
(21, 'Spearow', 3, 3, 3, 12, ''),
(22, 'Fearow', 9, 3, 5, 17, ''),
(23, 'Ekans', 13, 1, 6, 11, ''),
(24, 'Arbok', 1, 1, 6, 22, ''),
(25, 'Pikachu', 9, 0, 2, 11, ''),
(26, 'Raichu', 11, 2, 5, 13, ''),
(27, 'Sandshrew', 15, 0, 5, 7, ''),
(28, 'Sandslash', 14, 3, 1, 11, ''),
(29, 'Nidoran♀', 4, 1, 3, 10, ''),
(30, 'Nidorina', 10, 2, 5, 15, ''),
(31, 'Nidoqueen', 2, 0, 1, 15, ''),
(32, 'Nidoran♂', 18, 0, 6, 8, ''),
(33, 'Nidorino', 3, 1, 3, 15, ''),
(34, 'Nidoking', 10, 0, 7, 18, ''),
(35, 'Clefairy', 4, 2, 4, 11, ''),
(36, 'Clefable', 13, 3, 7, 11, ''),
(37, 'Vulpix', 3, 1, 8, 13, ''),
(38, 'Ninetales', 17, 2, 4, 14, ''),
(39, 'Jigglypuff', 14, 3, 5, 13, ''),
(40, 'Wigglytuff', 7, 3, 2, 16, ''),
(41, 'Zubat', 16, 3, 5, 9, ''),
(42, 'Golbat', 2, 0, 4, 15, ''),
(43, 'Oddish', 16, 3, 3, 10, ''),
(44, 'Gloom', 4, 0, 3, 10, ''),
(45, 'Vileplume', 9, 3, 6, 12, ''),
(46, 'Paras', 14, 1, 4, 11, ''),
(47, 'Parasect', 16, 1, 3, 14, ''),
(48, 'Venonat', 16, 1, 5, 14, ''),
(49, 'Venomoth', 3, 3, 8, 12, ''),
(50, 'Diglett', 6, 1, 2, 16, ''),
(51, 'Dugtrio', 7, 3, 8, 13, ''),
(52, 'Meowth', 1, 1, 5, 16, ''),
(53, 'Persian', 17, 2, 6, 13, ''),
(54, 'Psyduck', 4, 1, 7, 17, '');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pokemon_id` int(11) NOT NULL,
  `address` varchar(128) NOT NULL,
  `status` varchar(30) NOT NULL,
  `mse_userid` varchar(256) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `pokemon_id`, `address`, `status`, `mse_userid`, `price`) VALUES
(39, 16, 9, 'blabla', 'sent', '0', 0),
(40, 16, 10, 'blabla', 'sent', '0', 0),
(43, 18, 11, 'blabla', 'sending', '0', 0),
(44, 18, 10, 'blabla', 'sending', '0', 0),
(45, 16, 1, 'blabla', 'sending', '0', 0),
(46, 16, 6, 'blabla', 'sending', '0', 0),
(47, 18, 4, 'aaa', 'sending', '0', 0),
(48, 18, 1, 'aaa', 'sending', '0', 0),
(49, 18, 1, 'blabla', 'sending', '0', 0),
(50, 18, 1, 'blabla', 'sending', '0', 0),
(51, 18, 1, 'blabla', 'sending', '0', 0),
(52, 18, 11, 'blabla', 'sending', '0', 0),
(53, 20, 7, ' ', 'sending', 'laura120555@gmail.com', 0),
(54, 20, 7, ' ', 'sending', 'laura120555@gmail.com', 0),
(55, 20, 13, ' ', 'sending', 'seymapamuk@gmail.com', 184),
(56, 20, 13, ' ', 'sending', 'seymapamuk@gmail.com', 368),
(57, 20, 13, ' ', 'sending', 'seymapamuk@gmail.com', 368),
(58, 20, 13, ' ', 'sending', 'seymapamuk@gmail.com', 184),
(59, 20, 13, ' ', 'sending', 'seymapamuk@gmail.com', 368),
(60, 20, 13, ' ', 'sending', 'seymapamuk@gmail.com', 184),
(61, 20, 13, ' ', 'sending', 'seymapamuk@gmail.com', 368),
(62, 20, 13, ' ', 'sending', 'seymapamuk@gmail.com', 184),
(63, 20, 13, ' ', 'sending', 'seymapamuk@gmail.com', 368),
(64, 20, 13, ' ', 'sending', 'seymapamuk@gmail.com', 184),
(65, 20, 17, ' ', 'sending', 'laura120555@gmail.com', 370),
(66, 20, 3, ' ', 'sending', 'laura120555@gmail.com', 196),
(67, 20, 17, ' ', 'sending', 'laura120555@gmail.com', 370),
(68, 20, 17, ' ', 'sending', 'laura120555@gmail.com', 185),
(69, 20, 31, ' ', 'sending', 'laura120555@gmail.com', 119),
(70, 20, 27, ' ', 'sending', 'seymapamuk@gmail.com', 248),
(71, 20, 17, ' ', 'sending', 'seymapamuk@gmail.com', 370),
(72, 20, 15, ' ', 'sending', 'seymapamuk@gmail.com', 122),
(73, 20, 27, ' ', 'sending', 'seymapamuk@gmail.com', 248);

-- --------------------------------------------------------

--
-- Table structure for table `special`
--

CREATE TABLE `special` (
  `special_id` int(11) NOT NULL,
  `special` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `special`
--

INSERT INTO `special` (`special_id`, `special`) VALUES
(0, 'not special'),
(1, 'starter'),
(2, 'legendary'),
(3, 'mystical');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`type_id`, `type_name`) VALUES
(1, 'normal'),
(2, 'water'),
(3, 'fire'),
(4, 'electric'),
(5, 'grass'),
(6, 'ice'),
(7, 'fighting'),
(8, 'poison'),
(9, 'ground'),
(10, 'flying'),
(11, 'psychic'),
(12, 'bug'),
(13, 'rock'),
(14, 'ghost'),
(15, 'dragon'),
(16, 'dark'),
(17, 'steel'),
(18, 'fairy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `salt`, `email`, `status`) VALUES
(7, 'admin', '7c2d5e6499787a02bb0f4f5ddb7fcf4546d0b5b4', 'e328', 'seymapamuk@gmail.com', 'activated'),
(15, 'kaankagan', 'fbb06d0818eb5fdb8a742441ca8cc6b231f14ac2', '2cfc', 'www.kaansener@hotmail.com', 'not activated'),
(16, 'noynoy', '4ff9dab9063cd844ecc817af3397465b5f37755d', '2152', 'noynoyboy44@gmail.com', 'activated'),
(18, 'jaime', '59d43b747b9115e3a3a0adbcfd646e2330e7ccbc', '2a4c', 'd11062665@urhen.com', 'activated'),
(19, 'jaime', 'de497ec877ef8fbb6c2d4fd94578db94baf6ff7d', '903c', 'jfont@usj.es', 'activated'),
(20, 'mse', 'mse', '0', 'mse', 'activated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_pokemon` (`pokemon_id`);

--
-- Indexes for table `generations`
--
ALTER TABLE `generations`
  ADD PRIMARY KEY (`generation`);

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`pokemon_id`),
  ADD KEY `fk_name` (`name`);

--
-- Indexes for table `poke_types`
--
ALTER TABLE `poke_types`
  ADD PRIMARY KEY (`pok_id`),
  ADD KEY `fk_poke_type` (`type`),
  ADD KEY `fk_poke_special` (`special`),
  ADD KEY `fk_poke_gen` (`generation`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `fk_userid` (`user_id`),
  ADD KEY `fk_pok_id` (`pokemon_id`);

--
-- Indexes for table `special`
--
ALTER TABLE `special`
  ADD PRIMARY KEY (`special_id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `e-mail` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `pokemon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_pokemon` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon` (`pokemon_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD CONSTRAINT `fk_name` FOREIGN KEY (`name`) REFERENCES `poke_types` (`pok_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `poke_types`
--
ALTER TABLE `poke_types`
  ADD CONSTRAINT `fk_poke_gen` FOREIGN KEY (`generation`) REFERENCES `generations` (`generation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_poke_special` FOREIGN KEY (`special`) REFERENCES `special` (`special_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_poke_type` FOREIGN KEY (`type`) REFERENCES `types` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `fk_pok_id` FOREIGN KEY (`pokemon_id`) REFERENCES `pokemon` (`pokemon_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
