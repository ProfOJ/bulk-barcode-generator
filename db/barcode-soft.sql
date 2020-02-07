-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 10:15 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barcode-soft`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcodes`
--

CREATE TABLE `barcodes` (
  `id` int(10) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `upc` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barcodes`
--

INSERT INTO `barcodes` (`id`, `brand`, `product`, `upc`, `qty`, `timestamp`) VALUES
(1, 'Vlisco', 'Traditional unisex cloth', 'Vlisco838590645', 15, '2020-02-06 12:42:15'),
(2, 'Vlisco', 'Traditional male', 'Vlisco418321773', 3, '2020-02-06 12:43:54'),
(3, 'Vlisco', 'Traditional male', 'Vlisco285133643', 3, '2020-02-06 12:50:29'),
(4, 'Vlisco', 'Traditional male', 'Vlisco600382109', 3, '2020-02-06 12:51:34'),
(5, 'Vlisco', 'Traditional male', 'Vlisco325312107', 3, '2020-02-06 13:04:44'),
(6, 'Vlisco', 'Traditional male', 'Vlisco843646390', 3, '2020-02-06 13:09:05'),
(7, 'Vlisco', 'Traditional male', 'Vlisco243510680', 3, '2020-02-06 13:09:27'),
(8, 'ATL', 'Women 6 yards cloth', 'ATL192953226', 2, '2020-02-06 18:03:45'),
(9, 'Woodin', 'Traditional unisex cloth', 'Wo276867900', 15, '2020-02-06 18:22:50'),
(10, 'ATL', 'Men 6 yards', 'AT315735615', 30, '2020-02-06 18:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `timestamp`) VALUES
(1, 'GTP', '2020-02-06 15:50:45'),
(2, 'Vlisco', '2020-02-06 15:55:09'),
(3, 'Woodin', '2020-02-06 18:22:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcodes`
--
ALTER TABLE `barcodes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
