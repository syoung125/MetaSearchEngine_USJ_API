-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2020 at 05:04 AM
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
-- Database: `id12196511_wandshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` varchar(256) NOT NULL,
  `wand_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `mse_id` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `postcode` varchar(256) NOT NULL,
  `totalPrice` float NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `order_id` int(11) NOT NULL,
  `user_id` varchar(256) NOT NULL,
  `wand_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `mse_id` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `date`, `order_id`, `user_id`, `wand_id`, `quantity`, `price`, `mse_id`) VALUES
(547, '2020-01-24 03:20:38', 0, 'mse', 717, 2, 34, 'seymapamuk@gmail.com'),
(590, '2020-01-24 03:14:51', 0, 'mse', 717, 2, 34, 'laura120555@gmail.com'),
(2390, '2020-01-24 04:50:43', 0, 'mse', 717, 2, 34, 'seymapamuk@gmail.com'),
(3415, '2020-01-24 04:38:13', 0, 'mse', 717, 3, 51, 'seymapamuk@gmail.com'),
(4984, '2020-01-24 03:20:38', 0, 'mse', 335, 2, 44, 'seymapamuk@gmail.com'),
(6203, '2020-01-24 04:13:19', 0, 'mse', 552, 1, 22, 'laura120555@gmail.com'),
(6823, '2020-01-24 03:13:18', 0, 'mse', 717, 2, 34, 'laura120555@gmail.com'),
(8194, '2020-01-24 03:25:31', 0, 'mse', 821, 3, 87, 'seymapamuk@gmail.com');

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
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '4299c80fd4c5c52fb81f', 0),
('laura120555@gmail.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'Seoyoung', '9d6aafcab4086ac2536f', 1),
('laura1205@konkuk.ac.kr', '81dc9bdb52d04dc20036dbd8313ed055', 'Laura', '3e5efea383c0356af132', 1),
('laura1205@naver.com', '4a7d1ed414474e4033ac29ccb8653d9b', 'SEOYOUNG KO', 'c98ecbb0413c47ea4e5a', 1),
('mse', '7f04af006bdeba02616023b6e6c68409', 'mse', 'c4d4bd650dbd35ae3d17', 1);

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
(335, 'Harry Potter Wand', 22, 2, 3, 5, 6, 0, 'https://vignette.wikia.nocookie.net/harrypotter/images/9/93/Rowan.png/revision/latest?cb=20120718010524'),
(552, 'Ron Weasley Wand', 22, 1, 1, 3, 10, 0, 'https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg'),
(714, 'Sirius Black wand', 23, 1, 3, 3, 5, 0, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(717, 'Hermione Granger Illuminating Wand', 17, 1, 1, 2, 16, 37, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(821, 'Snape Wand', 29, 4, 2, 5, 12, 34, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(843, 'Magic Wand', 15, 1, 1, 3, 14, 12, 'https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg'),
(1184, 'Toy Wand', 7, 5, 3, 3, 13, 16, 'https://cdn11.bigcommerce.com/s-ojj1lff70z/images/stencil/1280x1280/products/250/5733/24120f01-1b6e-4e56-aecf-df423ec75fd4__78481.1566155832.jpg?c=2&imbypass=on?imbypass=on'),
(1227, 'my wand', 13, 1, 1, 4, 1, 1, ''),
(1247, 'Ron Weasley Wand', 24, 2, 2, 5, 20, 23, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(1275, 'Harry Potter Wand', 21, 1, 2, 5, 7, 44, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s'),
(1378, 'Hermione Granger Illuminating Wand', 11, 3, 3, 1, 5, 39, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(1510, 'Toy Wand', 27, 4, 1, 3, 19, 50, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s'),
(1541, 'Seraphina Picquery Wand', 6, 3, 2, 1, 5, 27, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/13926/16850/api0pqlwc__17243.1529076240.jpg?c=2?imbypass=on'),
(1654, 'Toy Wand', 5, 5, 3, 3, 6, 22, 'https://cdn11.bigcommerce.com/s-ojj1lff70z/images/stencil/1280x1280/products/250/5733/24120f01-1b6e-4e56-aecf-df423ec75fd4__78481.1566155832.jpg?c=2&imbypass=on?imbypass=on'),
(1765, 'Sirius Black wand', 13, 3, 2, 5, 7, 46, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(2215, 'Ron Weasley Wand', 9, 4, 2, 2, 20, 18, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(2287, 'Sirius Black wand', 19, 3, 2, 2, 12, 37, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(2487, 'Luna Lovegood Wand', 19, 4, 3, 2, 12, 17, 'https://vignette.wikia.nocookie.net/harrypotter/images/9/93/Rowan.png/revision/latest?cb=20120718010524'),
(2758, 'Seraphina Picquery Wand', 26, 1, 1, 3, 16, 10, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(2960, 'Snape Wand', 24, 4, 3, 1, 16, 38, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(3108, 'Luna Lovegood Wand', 27, 3, 2, 3, 7, 36, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(3118, 'Harry Potter Wand', 23, 5, 1, 5, 11, 37, 'https://vignette.wikia.nocookie.net/harrypotter/images/9/93/Rowan.png/revision/latest?cb=20120718010524'),
(3168, 'Harry Potter Wand', 22, 2, 3, 2, 14, 18, 'https://vignette.wikia.nocookie.net/harrypotter/images/9/93/Rowan.png/revision/latest?cb=20120718010524'),
(3546, 'Toy Wand', 10, 4, 2, 4, 9, 40, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(3547, 'Luna Lovegood Wand', 21, 2, 2, 2, 20, 37, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/13926/16850/api0pqlwc__17243.1529076240.jpg?c=2?imbypass=on'),
(3557, 'The Elder Wand', 7, 2, 3, 4, 8, 23, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/13926/16850/api0pqlwc__17243.1529076240.jpg?c=2?imbypass=on'),
(3961, 'Luna Lovegood Wand', 11, 4, 2, 3, 6, 39, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/13926/16850/api0pqlwc__17243.1529076240.jpg?c=2?imbypass=on'),
(4200, 'Sirius Black wand', 11, 1, 1, 3, 19, 45, 'https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg'),
(4282, 'Sirius Black wand', 5, 5, 2, 4, 9, 38, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(4380, 'Hermione Granger Illuminating Wand', 9, 5, 1, 1, 7, 41, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s'),
(4563, 'Sirius Black wand', 28, 3, 3, 2, 6, 16, 'https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg'),
(4783, 'Hermione Granger Illuminating Wand', 12, 3, 3, 5, 10, 37, 'https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg'),
(4810, 'Hermione Granger Illuminating Wand', 25, 2, 1, 3, 15, 43, 'https://vignette.wikia.nocookie.net/harrypotter/images/9/93/Rowan.png/revision/latest?cb=20120718010524'),
(4944, 'Toy Wand', 22, 2, 3, 3, 8, 33, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s'),
(5210, 'The Elder Wand', 21, 5, 3, 3, 13, 38, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(5371, 'Seraphina Picquery Wand', 10, 1, 1, 2, 7, 23, 'https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg'),
(5387, 'Snape Wand', 10, 2, 2, 1, 18, 25, 'https://cdn11.bigcommerce.com/s-ojj1lff70z/images/stencil/1280x1280/products/250/5733/24120f01-1b6e-4e56-aecf-df423ec75fd4__78481.1566155832.jpg?c=2&imbypass=on?imbypass=on'),
(5470, 'Luna Lovegood Wand', 5, 3, 1, 1, 11, 36, 'https://cdn11.bigcommerce.com/s-ojj1lff70z/images/stencil/1280x1280/products/250/5733/24120f01-1b6e-4e56-aecf-df423ec75fd4__78481.1566155832.jpg?c=2&imbypass=on?imbypass=on'),
(5634, 'The Elder Wand', 8, 3, 3, 1, 12, 49, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s'),
(5770, 'Toy Wand', 21, 1, 3, 5, 19, 49, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(5865, 'Harry Potter Wand', 6, 4, 1, 1, 17, 42, 'https://cdn11.bigcommerce.com/s-ojj1lff70z/images/stencil/1280x1280/products/250/5733/24120f01-1b6e-4e56-aecf-df423ec75fd4__78481.1566155832.jpg?c=2&imbypass=on?imbypass=on'),
(5876, 'Ron Weasley Wand', 9, 1, 2, 2, 20, 29, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s'),
(6108, 'Snape Wand', 19, 2, 1, 5, 11, 50, 'https://cdn11.bigcommerce.com/s-ojj1lff70z/images/stencil/1280x1280/products/250/5733/24120f01-1b6e-4e56-aecf-df423ec75fd4__78481.1566155832.jpg?c=2&imbypass=on?imbypass=on'),
(6212, 'Luna Lovegood Wand', 28, 4, 1, 4, 11, 44, 'https://vignette.wikia.nocookie.net/harrypotter/images/9/93/Rowan.png/revision/latest?cb=20120718010524'),
(6350, 'Hermione Granger Illuminating Wand', 29, 5, 2, 4, 10, 24, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(6700, 'Luna Lovegood Wand', 5, 4, 1, 2, 19, 43, 'https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg'),
(6747, 'Sirius Black wand', 15, 5, 2, 3, 20, 32, 'https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg'),
(6903, 'Magic Wand', 12, 2, 1, 3, 14, 27, 'https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg'),
(7176, 'Toy Wand', 15, 2, 3, 5, 10, 30, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/13926/16850/api0pqlwc__17243.1529076240.jpg?c=2?imbypass=on'),
(7212, 'Sirius Black wand', 11, 3, 3, 3, 17, 35, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/13926/16850/api0pqlwc__17243.1529076240.jpg?c=2?imbypass=on'),
(7272, 'Ron Weasley Wand', 10, 5, 3, 4, 5, 45, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s'),
(7412, 'Luna Lovegood Wand', 28, 2, 2, 1, 10, 34, 'https://cdn11.bigcommerce.com/s-ojj1lff70z/images/stencil/1280x1280/products/250/5733/24120f01-1b6e-4e56-aecf-df423ec75fd4__78481.1566155832.jpg?c=2&imbypass=on?imbypass=on'),
(7465, 'Snape Wand', 25, 4, 2, 1, 19, 41, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(7648, 'Harry Potter Wand', 25, 3, 1, 1, 6, 49, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(7733, 'Snape Wand', 27, 3, 1, 1, 16, 31, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/13926/16850/api0pqlwc__17243.1529076240.jpg?c=2?imbypass=on'),
(7751, 'Harry Potter Wand', 10, 1, 2, 2, 11, 13, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(7759, 'Hermione Granger Illuminating Wand', 20, 4, 1, 1, 20, 13, 'https://vignette.wikia.nocookie.net/harrypotter/images/9/93/Rowan.png/revision/latest?cb=20120718010524'),
(7831, 'Toy Wand', 16, 5, 3, 5, 15, 22, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/13926/16850/api0pqlwc__17243.1529076240.jpg?c=2?imbypass=on'),
(8028, 'Ron Weasley Wand', 26, 3, 2, 3, 5, 16, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s'),
(8171, 'Toy Wand', 10, 1, 2, 1, 17, 12, 'https://d8mkdcmng3.imgix.net/cefe/collectables-and-hobbies-props-and-replicas-harry-potter-the-wand-of-ginny-weasley.jpg?auto=format&bg=0FFF&fit=fill&h=600&q=100&w=600&s=4da5078c6dadfdad5c52b5a329c66ab0'),
(8272, 'Harry Potter Wand', 6, 3, 1, 5, 15, 27, 'https://images-na.ssl-images-amazon.com/images/I/514dFlW6psL._UL1400_.jpg'),
(8688, 'Hermione Granger Illuminating Wand', 21, 5, 2, 1, 7, 22, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(8893, 'Hermione Granger Illuminating Wand', 23, 1, 1, 5, 7, 12, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(9136, 'Luna Lovegood Wand', 16, 4, 3, 2, 19, 30, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/13926/16850/api0pqlwc__17243.1529076240.jpg?c=2?imbypass=on'),
(9161, 'Hermione Granger Illuminating Wand', 9, 3, 2, 2, 20, 44, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on'),
(9294, 'Snape Wand', 8, 3, 1, 4, 6, 39, 'https://cdn11.bigcommerce.com/s-ojj1lff70z/images/stencil/1280x1280/products/250/5733/24120f01-1b6e-4e56-aecf-df423ec75fd4__78481.1566155832.jpg?c=2&imbypass=on?imbypass=on'),
(9578, 'Toy Wand', 11, 3, 1, 1, 13, 23, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s'),
(9891, 'Toy Wand', 24, 4, 3, 3, 20, 23, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRu7BxJpO9SV15lErMUoMXJ0ZHvhowgZMZfYuKfyTIf1mgei1xt&s'),
(9923, 'Harry Potter Wand', 12, 1, 3, 3, 13, 40, 'https://cdn11.bigcommerce.com/s-z5x6hb/images/stencil/1280x1280/products/16274/21135/09dbcc0b-de33-47b5-94da-ff5d7fb2c20d__24350.1542143436.jpg?c=2&imbypass=on?imbypass=on');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_status_id` (`status`),
  ADD KEY `fk_orders_user_id` (`user_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_p_user_id` (`user_id`),
  ADD KEY `fk_p_wand_id` (`wand_id`);

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
  ADD KEY `fk_core_id` (`core_id`),
  ADD KEY `fk_wood_id` (`wood_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9763;

--
-- AUTO_INCREMENT for table `core`
--
ALTER TABLE `core`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9969;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9549;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wands`
--
ALTER TABLE `wands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9946;

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
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_wand_id` FOREIGN KEY (`wand_id`) REFERENCES `wands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_status_id` FOREIGN KEY (`status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `fk_p_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_p_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_p_wand_id` FOREIGN KEY (`wand_id`) REFERENCES `wands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wands`
--
ALTER TABLE `wands`
  ADD CONSTRAINT `fk_core_id` FOREIGN KEY (`core_id`) REFERENCES `core` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_wood_id` FOREIGN KEY (`wood_id`) REFERENCES `wood` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
