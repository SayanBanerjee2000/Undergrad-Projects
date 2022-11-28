-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 03:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `travel_admin`
--

CREATE TABLE `travel_admin` (
  `id` int(11) NOT NULL,
  `loginid` varchar(200) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_admin`
--

INSERT INTO `travel_admin` (`id`, `loginid`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `travel_content`
--

CREATE TABLE `travel_content` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_content`
--

INSERT INTO `travel_content` (`id`, `name`, `content`) VALUES
(1, 'Home', 'Welcome to our travel portal. Here you can view our most reliable tour packages and avail the offers and discounts that we are offering. \r\n\r\nWe give you the best hotels stays and location so that you can enjoy your vacation more prominently with loved ones. \r\n\r\nTry it out. And for new comers we are giving and extra 10% discount.'),
(2, 'About Us', 'We are travel and tour guides, who likes travelling a lot and wants the to give the same experience to you all. \r\n\r\nCome on and hustle up for the best vacation.'),
(3, 'Faq', '1. What is the return policy ? \r\n- 10 days return policy and 50% money back. No questions asked\r\n\r\n2. Do you guys provide Insurance? \r\n- Yes, we provide the best travel insurance with best possible rate');

-- --------------------------------------------------------

--
-- Table structure for table `travel_news`
--

CREATE TABLE `travel_news` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `created_at` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_news`
--

INSERT INTO `travel_news` (`id`, `title`, `details`, `created_at`) VALUES
(1, 'New Delhi Tour Updated', 'Refer to the Delhi Tour in packages for more information. \r\n\r\nAlso, this season get extra 10% off on delhi tour package', '2019-12-11'),
(6, 'Mumbai Package Tour Update', 'Mumbai Package is not valid currently due to huge rush.\r\n\r\nPlease stay in touch for any update.', '2022-02-08'),
(2, 'Second Main description Second Main description Second Main description Second Main description ', 'Second Main description details Second Main description details Second Main description details Second Main description details Second Main description details ', '2019-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `travel_package`
--

CREATE TABLE `travel_package` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `details` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_package`
--

INSERT INTO `travel_package` (`id`, `name`, `details`) VALUES
(1, 'Delhi Tour', '5 Days 6 Nights - Delhi Tour Package\r\n\r\nFirst 2 days - Local Sightseeing\r\nNext 3 days - Agra Fort, Taj Mahal, \r\nFatehpur Sikhri\r\n\r\nTotal Tour Package - Rs.50000. \r\n\r\nShould you have any query please fill up the contact us form for concerned details'),
(6, 'Mumbai Package', '3 Days 4 Nights\r\n\r\nLocal SightSeeing\r\n\r\nPrice - Rs.50000'),
(7, 'Jaipur Tour', '2Days 3 Nights \r\n\r\ntest data'),
(4, 'gfh', 'jhghg');

-- --------------------------------------------------------

--
-- Table structure for table `travel_photogallery`
--

CREATE TABLE `travel_photogallery` (
  `id` int(11) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `home_featured` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel_photogallery`
--

INSERT INTO `travel_photogallery` (`id`, `photo`, `home_featured`) VALUES
(16, '5803_New-Delhi-India-War-Memorial-arch-Sir.jpg', 0),
(10, '5067_Gateway-monument-India-entrance-Mumbai-Harbour-coast.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `travel_admin`
--
ALTER TABLE `travel_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_content`
--
ALTER TABLE `travel_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_news`
--
ALTER TABLE `travel_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_package`
--
ALTER TABLE `travel_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_photogallery`
--
ALTER TABLE `travel_photogallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `travel_admin`
--
ALTER TABLE `travel_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `travel_content`
--
ALTER TABLE `travel_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `travel_news`
--
ALTER TABLE `travel_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `travel_package`
--
ALTER TABLE `travel_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `travel_photogallery`
--
ALTER TABLE `travel_photogallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
