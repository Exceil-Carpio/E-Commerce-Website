-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 06:31 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ct_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `prod_id`, `quantity`, `image`) VALUES
(25, 12, 1, 'longsleeve.jpg'),
(25, 14, 1, 'skirt.jpg'),
(25, 9, 1, 'boots.jpg'),
(25, 10, 1, 'dress.jpg'),
(25, 13, 1, 'shirt.jpg'),
(34, 9, 3, 'boots.jpg'),
(34, 10, 4, 'dress.jpg'),
(34, 11, 5, 'jorts.jpg'),
(34, 12, 6, 'longsleeve.jpg'),
(34, 13, 4, 'shirt.jpg'),
(34, 14, 3, 'skirt.jpg'),
(34, 15, 8, 'varsity.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(2) NOT NULL,
  `prod_name` varchar(70) NOT NULL,
  `prod_price` int(70) NOT NULL,
  `prod_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_name`, `prod_price`, `prod_image`) VALUES
(8, 'Baggy Jeans', 23, 'baggypants.jpg'),
(9, 'Heeled Boots', 13, 'boots.jpg'),
(10, 'Bodycon Dress', 29, 'dress.jpg'),
(11, 'Denim Jorts', 15, 'jorts.jpg'),
(12, 'Cropped Longsleeve', 25, 'longsleeve.jpg'),
(13, 'Nike Raglan Shirt', 20, 'shirt.jpg'),
(14, 'Cargo Skirt', 11, 'skirt.jpg'),
(15, 'Black Varsity Jacket', 31, 'varsity.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up`
--

CREATE TABLE `sign_up` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mnum` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `photo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up`
--

INSERT INTO `sign_up` (`id`, `fname`, `lname`, `email`, `mnum`, `address`, `country`, `password`, `photo`) VALUES
(25, 'Caren', 'Alvero', 'carenbless@gmail.com', '09279487215', '20 G. Bunyi Buting Pasig City', 'Philippines', 'magandaako', 'profile_pics/caren.jpg'),
(26, 'Zyrus ', 'Valdez', 'zyrus.valdez@gmail.com', '0990718098', '41 Mangga St. Prutas Bagiuo City', 'Philippines', '123zyrus', 'profile_pics/zyrus.jpg'),
(27, 'Myro', 'Cruz', 'crusmyro@gmail.com', '09957150393', '101 Cornelia St. Lancaster Bacoor Cavite', 'Philippines', 'qwertymyro', 'profile_pics/myro.jpg'),
(28, 'Prexy', 'Santos', 'santos_prexy@gmail.com', '09564376743', '143 Magnolia Avenue Calamba Laguna', 'Philippines', 'prexy123', 'profile_pics/prexy.jpg'),
(29, 'Elisha', 'Rallonza', 'elisha123@gmail.com', '09785513287', '41 Buting Pasig City', 'Philippines', 'elisha123', 'profile_pics/elisha.jpg'),
(30, 'Michelle', 'Evangelista', 'michelle123@gmail.com', '09275611632', '12 westrembo Makati City', 'Philippines', 'michelle123', 'profile_pics/michelle.jpg'),
(31, 'Maegan', 'Grande', 'maegan123@gmail.com', '09167706776', 'Serendra Bonifacio Global City', 'Philippines', 'maegan123', 'profile_pics/maegan.jpg'),
(32, 'Faith', 'Ancheta', 'faith.123@gmail.com', '09054612243', '21 Signal st. Bicutan', 'Philippines', 'faith123', 'profile_pics/faith.jpg'),
(33, 'Allyra', 'Manoban', 'allymanoban.123@gmail.com', '09456488991', '15 Dolmar Kalawaan', 'Philippines', 'allyra123', 'profile_pics/allyra.jpg'),
(34, 'Travis', 'Alvares', 'alvares.travis@gmail.com', '09756161901', '420 Bakal Road Lucena Quezon', 'Philippines', 'travis123', 'profile_pics/pexels-ali-pazani-2787341.jpg'),
(35, 'Alvero', 'Caren', 'alvero_caren@gmail.com', '123456789', 'Napindan', 'Philippines', '11111111', 'profile_pics/12.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `id` (`id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `sign_up`
--
ALTER TABLE `sign_up`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sign_up`
--
ALTER TABLE `sign_up`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
