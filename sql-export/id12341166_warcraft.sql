-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 24 Oca 2020, 05:00:05
-- Sunucu sürümü: 10.3.16-MariaDB
-- PHP Sürümü: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `id12341166_warcraft`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `address`
--

CREATE TABLE `address` (
  `address_id` int(30) NOT NULL,
  `address_name` varchar(30) NOT NULL,
  `city_name` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `postal_code` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `address`
--

INSERT INTO `address` (`address_id`, `address_name`, `city_name`, `country`, `postal_code`) VALUES
(165, '', '', '', 0),
(494, '', '', '', 0),
(776, '', '', '', 0),
(1001, '', '', '', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `class`
--

CREATE TABLE `class` (
  `class_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `class`
--

INSERT INTO `class` (`class_id`, `name`, `description`) VALUES
(1, 'Death_Knight', 'Former minions of The Lich Kin'),
(2, 'Demon_Hunter', 'Trained by Illidan Stormrage h'),
(3, 'Hunter', 'Trained with the sole purpose '),
(4, 'Druid', 'Hunters come from a variety of'),
(5, 'Mage', 'Adepts of the magical arts, ma'),
(6, 'Monk', 'Trained with the teachings of '),
(7, 'Paladin', 'Champions of the Light and cru'),
(8, 'Priest', 'Scions of the Light or master '),
(9, 'Rogue', 'Thieves, cutthroats, spies, ma'),
(10, 'Shaman', 'Disciples and wielders of elem'),
(11, 'Warlock', 'In the face of demonic power, ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `image`
--

CREATE TABLE `image` (
  `im_id` int(30) NOT NULL,
  `im_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `image`
--

INSERT INTO `image` (`im_id`, `im_name`) VALUES
(0, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0:'),
(1, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0\r'),
(2, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(3, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?'),
(4, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(5, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(6, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(7, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(8, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(9, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(10, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(11, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(12, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(13, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?'),
(14, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?'),
(15, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?'),
(16, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(17, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(18, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?'),
(19, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0\r'),
(20, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?'),
(21, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?'),
(22, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(23, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?'),
(24, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0'),
(25, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?'),
(26, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?'),
(27, '?PNG\r\n\Z\n\0\0\0\rIHDR\0\0\0<\0\0\0<\0\0\0?');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `order_id` int(30) NOT NULL,
  `user_id` int(30) DEFAULT NULL,
  `product_id` int(30) DEFAULT NULL,
  `mseid` varchar(126) NOT NULL,
  `quantity` int(30) NOT NULL,
  `price_total` int(30) NOT NULL,
  `ship_date` varchar(126) NOT NULL,
  `ship_adress` int(30) NOT NULL,
  `order_date` varchar(126) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `mseid`, `quantity`, `price_total`, `ship_date`, `ship_adress`, `order_date`) VALUES
(659, 1001, 29614422, '12', 10, 7860, '0', 0, '0'),
(660, 1001, 1923661461, 'laura120555@gmail.com', 2, 1242, '2020-01-24 01:27:40', 0, '2020-01-24 01:27:40'),
(661, 1001, 1923661461, 'laura120555@gmail.com', 5, 3105, '2020-01-24 01:27:40', 0, '2020-01-24 01:27:40'),
(662, 1001, 2033331250, 'laura120555@gmail.com', 2, 856, '2020-01-24 01:29:57', 0, '2020-01-24 01:29:57'),
(663, 1001, 1923661461, 'laura120555@gmail.com', 5, 3105, '2020-01-24 03:21:18', 0, '2020-01-24 03:21:18'),
(664, 1001, 1713253067, 'seymapamuk@gmail.com', 3, 207, '2020-01-24 04:50:43', 0, '2020-01-24 04:50:43'),
(665, 1001, 1814007077, 'seymapamuk@gmail.com', 3, 2103, '2020-01-24 04:50:43', 0, '2020-01-24 04:50:43'),
(666, 1001, 1037459133, 'seymapamuk@gmail.com', 2, 1532, '2020-01-24 04:50:43', 0, '2020-01-24 04:50:43'),
(667, 1001, 631340399, 'seymapamuk@gmail.com', 2, 1932, '2020-01-24 04:50:43', 0, '2020-01-24 04:50:43');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `product_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `img` varchar(126) NOT NULL,
  `quantity` int(30) NOT NULL,
  `class_id` int(30) NOT NULL,
  `race_id` int(30) NOT NULL,
  `age` int(30) NOT NULL,
  `gender` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `img`, `quantity`, `class_id`, `race_id`, `age`, `gender`) VALUES
(29614422, 'Dia', 786, 'http://pngimg.com/uploads/warcraft/warcraft_PNG34.png', 2, 1, 4, 14, 'Queer'),
(41577847, 'Mercury', 431, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 186, 5, 5, 19, 'Female'),
(111289668, 'Garrosh', 912, 'https://ya-webdesign.com/transparent250_/wow-png-warcraft-heroes-3.png', 186, 10, 4, 37, 'Female'),
(125233230, 'Garrosh', 222, 'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png', 157, 3, 7, 40, 'Queer'),
(147033638, 'Malfoy', 92, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 91, 10, 3, 20, 'Male'),
(187953063, 'Malfoy', 887, 'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png', 64, 8, 6, 19, 'Male'),
(225804425, 'Dumbledore', 379, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 155, 6, 4, 7, 'Attack_Helicopter'),
(236587594, 'Muddy', 812, 'https://ya-webdesign.com/transparent250_/wow-png-wow-character-8.png', 96, 7, 11, 39, 'Queer'),
(242819643, 'Pomfrey', 268, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 42, 7, 11, 10, 'Queer'),
(249857158, 'Love', 949, 'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png', 60, 7, 14, 3, 'Attack_Helicopter'),
(277885267, 'Scamender', 650, 'http://pngimg.com/uploads/warcraft/warcraft_PNG34.png', 174, 4, 7, 30, 'Attack_Helicopter'),
(303160176, 'Walker', 418, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 194, 2, 5, 8, 'Queer'),
(356914176, 'Quirrel', 577, 'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png', 16, 7, 14, 28, 'Attack_Helicopter'),
(373916728, 'Malfoy', 602, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 120, 5, 6, 37, 'Non-Binary'),
(378366146, 'Show', 644, 'http://pngimg.com/uploads/warcraft/warcraft_PNG34.png', 59, 9, 6, 6, 'Non-Binary'),
(380896817, 'Snape', 239, 'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png', 184, 8, 1, 28, 'Queer'),
(402446084, 'Pomfrey', 428, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 82, 3, 1, 21, 'Attack_Helicopter'),
(413805230, 'Show', 604, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 90, 1, 10, 0, 'Attack_Helicopter'),
(414888031, 'Sylvannas', 424, 'https://ya-webdesign.com/transparent250_/wow-png-wow-character-8.png', 143, 10, 9, 21, 'Female'),
(437006197, 'Dia', 395, 'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png', 69, 4, 13, 27, 'Non-Binary'),
(481149730, 'Show', 974, 'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png', 73, 6, 12, 22, 'Female'),
(526672999, 'Show', 407, 'http://pngimg.com/uploads/warcraft/warcraft_PNG34.png', 144, 3, 7, 25, 'Queer'),
(529604218, 'Lockhart', 871, 'http://pngimg.com/uploads/warcraft/warcraft_PNG79.png', 186, 1, 4, 20, 'Male'),
(544887874, 'Scamender', 801, 'https://ya-webdesign.com/transparent250_/wow-png-wow-character-8.png', 67, 10, 8, 19, 'Female'),
(545945674, 'Mercury', 531, 'http://pngimg.com/uploads/warcraft/warcraft_PNG15.png', 10, 5, 10, 25, 'Male'),
(561432296, 'Quirrel', 285, 'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png', 31, 9, 14, 20, 'Female'),
(569724606, 'Albus', 151, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 8, 7, 4, 24, 'Queer'),
(602095174, 'Longbottom', 245, 'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png', 61, 6, 11, 36, 'Male'),
(631340399, 'Sprout', 966, 'http://pngimg.com/uploads/warcraft/warcraft_PNG15.png', 131, 11, 9, 16, 'Male'),
(635038694, 'Dia', 236, 'http://pngimg.com/uploads/warcraft/warcraft_PNG89.png', 128, 9, 7, 24, 'Attack_Helicopter'),
(661022902, 'Scamender', 346, 'http://pngimg.com/uploads/warcraft/warcraft_PNG89.png', 89, 10, 11, 6, 'Queer'),
(673677839, 'Walker', 704, 'https://ya-webdesign.com/transparent250_/wow-png-warcraft-heroes-3.png', 76, 3, 12, 22, 'Non-Binary'),
(701837163, 'Scamender', 369, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 10, 6, 4, 6, 'Male'),
(705295437, 'Tyrande', 853, 'http://pngimg.com/uploads/warcraft/warcraft_PNG34.png', 82, 10, 8, 30, 'Female'),
(712040315, 'Sylvannas', 444, 'http://pngimg.com/uploads/warcraft/warcraft_PNG89.png', 84, 6, 2, 18, 'Attack_Helicopter'),
(713895446, 'Lupin', 258, 'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png', 21, 5, 11, 38, 'Attack_Helicopter'),
(716542114, 'Lupin', 754, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 124, 8, 11, 13, 'Female'),
(762881843, 'Garrosh', 651, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 144, 6, 9, 5, 'Attack_Helicopter'),
(765098623, 'Dumbledore', 228, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 79, 10, 14, 9, 'Male'),
(788230789, 'Malfurion', 124, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 113, 2, 2, 38, 'Non-Binary'),
(791444029, 'Jaina', 815, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 30, 7, 7, 18, 'Female'),
(795952925, 'Varian', 708, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 177, 10, 4, 7, 'Queer'),
(797695543, 'Batman', 517, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 53, 11, 2, 7, 'Non-Binary'),
(814653240, 'Dia', 854, 'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png', 50, 11, 8, 18, 'Male'),
(847372668, 'Peltier', 30, 'http://pngimg.com/uploads/warcraft/warcraft_PNG15.png', 152, 2, 2, 40, 'Male'),
(847872752, 'Walker', 161, 'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png', 62, 2, 6, 23, 'Queer'),
(850948667, 'Wayne', 599, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 132, 1, 1, 28, 'Non-Binary'),
(884731521, 'Longbottom', 6, 'http://pngimg.com/uploads/warcraft/warcraft_PNG15.png', 5, 1, 3, 33, 'Queer'),
(930669959, 'Love', 477, 'http://pngimg.com/uploads/warcraft/warcraft_PNG15.png', 188, 6, 11, 17, 'Non-Binary'),
(943764117, 'Johnson', 818, 'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png', 36, 2, 8, 8, 'Male'),
(965847221, 'Arthas', 857, 'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png', 142, 1, 3, 24, 'Non-Binary'),
(1000705816, 'Garrosh', 391, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 113, 9, 10, 7, 'Female'),
(1037459133, 'Guldan', 766, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 158, 5, 8, 0, 'Attack_Helicopter'),
(1045532861, 'Dumbledore', 259, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 15, 4, 2, 4, 'Non-Binary'),
(1123251070, 'Malfurion', 257, 'http://pngimg.com/uploads/warcraft/warcraft_PNG89.png', 91, 1, 12, 12, 'Non-Binary'),
(1139926926, 'Tremblay', 142, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 194, 7, 12, 2, 'Attack_Helicopter'),
(1146558576, 'Johnson', 502, 'http://pngimg.com/uploads/warcraft/warcraft_PNG89.png', 21, 8, 10, 26, 'Attack_Helicopter'),
(1177539376, 'Love', 273, 'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png', 130, 9, 9, 10, 'Queer'),
(1183862509, 'Garrosh', 70, 'http://pngimg.com/uploads/warcraft/warcraft_PNG89.png', 48, 7, 10, 36, 'Female'),
(1212581685, 'Tremblay', 220, 'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png', 187, 6, 12, 26, 'Queer'),
(1224070420, 'Harry', 368, 'https://ya-webdesign.com/transparent250_/wow-png-wow-character-8.png', 198, 8, 9, 16, 'Male'),
(1299357094, 'Johnson', 536, 'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png', 5, 4, 14, 15, 'Female'),
(1304496905, 'Dumbledore', 914, 'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png', 38, 9, 7, 3, 'Non-Binary'),
(1323399453, 'Pomfrey', 833, 'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png', 72, 9, 12, 17, 'Male'),
(1366599618, 'Santiago', 263, 'https://ya-webdesign.com/transparent250_/wow-png-wow-character-8.png', 160, 6, 5, 23, 'Attack_Helicopter'),
(1383830107, 'Harry', 608, 'http://pngimg.com/uploads/warcraft/warcraft_PNG34.png', 80, 1, 12, 24, 'Male'),
(1404619907, 'Muddy', 343, 'https://ya-webdesign.com/transparent250_/wow-png-warcraft-heroes-3.png', 193, 10, 4, 18, 'Non-Binary'),
(1427182820, 'Mercury', 33, 'https://ya-webdesign.com/transparent250_/wow-png-wow-character-8.png', 97, 11, 2, 16, 'Female'),
(1428308396, 'Peltier', 435, 'https://ya-webdesign.com/transparent250_/wow-png-warcraft-heroes-3.png', 109, 6, 2, 33, 'Female'),
(1446556154, 'Arthas', 426, 'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png', 0, 6, 5, 21, 'Attack_Helicopter'),
(1453979087, 'Quirrel', 863, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 96, 9, 14, 38, 'Male'),
(1554889909, 'McGonagall', 574, 'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png', 110, 11, 2, 12, 'Attack_Helicopter'),
(1558499151, 'Muddy', 418, 'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png', 105, 3, 3, 19, 'Queer'),
(1577748789, 'Love', 380, 'http://pngimg.com/uploads/warcraft/warcraft_PNG79.png', 65, 2, 10, 8, 'Queer'),
(1590608836, 'Snape', 572, 'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png', 83, 4, 5, 32, 'Attack_Helicopter'),
(1612404806, 'Scamender', 994, 'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png', 19, 10, 6, 40, 'Male'),
(1635912497, 'Quirrel', 319, 'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png', 109, 2, 14, 2, 'Female'),
(1711054260, 'Lupin', 450, 'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png', 130, 7, 9, 11, 'Non-Binary'),
(1711765496, 'Dumbledore', 950, 'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png', 48, 1, 14, 29, 'Male'),
(1713253067, 'Albus', 69, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 181, 4, 3, 30, 'Female'),
(1745570609, 'Guldan', 420, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 177, 10, 5, 4, 'Attack_Helicopter'),
(1787960867, 'Malfurion', 524, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 167, 7, 14, 10, 'Queer'),
(1814007077, 'Johnson', 701, 'http://pngimg.com/uploads/warcraft/warcraft_PNG85.png', 57, 3, 2, 31, 'Male'),
(1828895108, 'Arthas', 725, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 193, 9, 8, 21, 'Non-Binary'),
(1884585359, 'Lupin', 325, 'https://ya-webdesign.com/transparent250_/wow-png-warcraft-heroes-3.png', 103, 11, 9, 14, 'Male'),
(1906011822, 'Muddy', 833, 'http://pngimg.com/uploads/warcraft/warcraft_PNG89.png', 90, 3, 5, 30, 'Queer'),
(1916014983, 'Quirrel', 357, 'https://ya-webdesign.com/transparent250_/wow-png-warcraft-heroes-3.png', 88, 9, 3, 16, 'Female'),
(1923661461, 'McGonagall', 621, 'http://pngimg.com/uploads/warcraft/warcraft_PNG34.png', 68, 1, 5, 38, 'Female'),
(1925397021, 'Albus', 958, 'http://pngimg.com/uploads/warcraft/warcraft_PNG15.png', 54, 8, 1, 12, 'Female'),
(1964299952, 'Harry', 180, 'http://pngimg.com/uploads/warcraft/warcraft_PNG15.png', 14, 2, 2, 25, 'Female'),
(1995174931, 'Malfurion', 781, 'http://pngimg.com/uploads/warcraft/warcraft_PNG89.png', 101, 10, 10, 10, 'Female'),
(2026628955, 'Lupin', 880, 'https://ya-webdesign.com/transparent250_/wow-dragon-png-16.png', 13, 9, 3, 25, 'Male'),
(2032155278, 'Dia', 506, 'http://pngimg.com/uploads/warcraft/warcraft_PNG11.png', 148, 9, 3, 28, 'Queer'),
(2033331250, 'Malfurion', 428, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 31, 10, 11, 16, 'Queer'),
(2039648293, 'Walker', 237, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 49, 10, 11, 3, 'Female'),
(2065289266, 'Sprout', 192, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 59, 4, 9, 22, 'Attack_Helicopter'),
(2068591377, 'Keanu', 388, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 137, 11, 7, 10, 'Attack_Helicopter'),
(2084002941, 'Filch', 917, 'http://pngimg.com/uploads/warcraft/warcraft_PNG42.png', 13, 6, 12, 0, 'Attack_Helicopter'),
(2091776127, 'Garrosh', 532, 'http://pngimg.com/uploads/warcraft/warcraft_PNG78.png', 34, 3, 9, 4, 'Queer'),
(2107703072, 'Wayne', 784, 'https://ya-webdesign.com/transparent250_/wow-lady-png-legs-8.png', 103, 7, 2, 36, 'Queer');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `race`
--

CREATE TABLE `race` (
  `race_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `faction` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `race`
--

INSERT INTO `race` (`race_id`, `name`, `faction`, `description`) VALUES
(1, 'Human', 'Alliance', 'Recent discoveries have shown '),
(2, 'Dranei', 'Alliance', 'Long before the fallen titan S'),
(3, 'Druid', 'Alliance', 'Druids harness the vast powers'),
(4, 'Dwarf', 'Alliance', 'The bold and courageous dwarve'),
(5, 'Gnomes', 'Alliance', 'Gnomes are a diminutive, wiry '),
(6, 'Night_Elves', 'Alliance', 'Night elves (or kaldorei, for '),
(7, 'Pandaren', 'Alliance', 'Pandaren are the first \"neutra'),
(8, 'Worgen', 'Horde', 'Worgen [ˈwɔɹgɛn] are large, lu'),
(9, 'Blood_Elf', 'Horde', 'The Blood Elves or Sindorei in'),
(10, 'Orcs', 'Horde', 'The orcs are a prolific and ph'),
(11, 'Undead', 'Horde', 'The undead are beings that hav'),
(12, 'Goblins', 'Horde', 'Shrewd, greedy, and ruthless, '),
(13, 'Troll', 'Horde', 'They are highly tribally spiri'),
(14, 'Tauren', 'Horde', 'Tauren (shuhalo in their nativ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shopping_list`
--

CREATE TABLE `shopping_list` (
  `shopping_id` int(30) NOT NULL,
  `product_id` int(30) DEFAULT NULL,
  `mseid` varchar(126) NOT NULL,
  `quantity` int(30) NOT NULL,
  `price_total` int(30) NOT NULL,
  `user_id` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `shopping_list`
--

INSERT INTO `shopping_list` (`shopping_id`, `product_id`, `mseid`, `quantity`, `price_total`, `user_id`) VALUES
(372, 29614422, 'laura120555@gmail.com', 1, 786, 1001),
(375, 2032155278, 'laura120555@gmail.com', 2, 1012, 1001);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(6) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `accode` varchar(30) NOT NULL,
  `ac_status` varchar(30) NOT NULL,
  `salt` varchar(30) NOT NULL,
  `address_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `password`, `accode`, `ac_status`, `salt`, `address_id`) VALUES
(776, 'oyku', 'yamak', 'oykuyamak@gmail.com', '4059bfc3fd9e2852a13e69c25cfa9499c0209509', '7f254b33f30d225aa4a6', 'activated', '9a167747cf4c2ff6708c', 776),
(1001, 'MSE', 'MSE', 'MSE', '1234', '0', 'activated', '0', 1001);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Tablo için indeksler `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Tablo için indeksler `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`im_id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `FK_USERSORD` (`user_id`),
  ADD KEY `FK_PRODUCTORD` (`product_id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `FK_CLASS` (`class_id`),
  ADD KEY `FK_RACE` (`race_id`);

--
-- Tablo için indeksler `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`race_id`);

--
-- Tablo için indeksler `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD PRIMARY KEY (`shopping_id`),
  ADD KEY `FK_PRODUCT` (`product_id`),
  ADD KEY `FK_USERS` (`user_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `FK_ADDRESS` (`address_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=668;

--
-- Tablo için AUTO_INCREMENT değeri `shopping_list`
--
ALTER TABLE `shopping_list`
  MODIFY `shopping_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_PRODUCTORD` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `FK_USERSORD` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Tablo kısıtlamaları `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_CLASS` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `FK_RACE` FOREIGN KEY (`race_id`) REFERENCES `race` (`race_id`);

--
-- Tablo kısıtlamaları `shopping_list`
--
ALTER TABLE `shopping_list`
  ADD CONSTRAINT `FK_PRODUCT` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `FK_USERS` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Tablo kısıtlamaları `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_ADDRESS` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
