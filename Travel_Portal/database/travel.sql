-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2021 at 02:33 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.29

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
(1, 'Home', 'QQQQ home page content\r\n\r\n\r\nhome page content\r\n\r\n\r\nhome page content\r\n\r\n\r\nhome page contentkk1\r\n\r\n\r\nhjkhjk1qqqqqqqqqqqqqqqqqqqqq\r\n\r\ntest\r\n\r\nmmmmm'),
(2, 'About Us', 'About Us page content.Demo do.test test\r\n\r\n\r\nbbbbbbbbbbbbb'),
(3, 'Faq', 'DDDDDD Faq page content\r\n\r\nFaq page content\r\n\r\n\r\nFaq page content\r\n\r\n\r\n\r\nFaq page content\r\n\r\n\r\nFaq page contentk');

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
(1, 'AAB First main desc First main desc First main desc First main desc', 'AAB First main desc details First main desc details First main desc details First main desc details First main desc details First main desc details First main desc details First main desc details First main desc details ', '2019-12-11'),
(2, 'Second Main description Second Main description Second Main description Second Main description ', 'Second Main description details Second Main description details Second Main description details Second Main description details Second Main description details ', '2019-12-11'),
(4, 'Test Title', 'test descrip[tion', '2021-01-15');

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
(1, 'first', 'first description here.first description here.first description here.first description here.\r\n\r\nfirst description here.first description here.first description here.first description here.\r\n\r\n\r\n\r\nfirst description here.first description here.first description here.first description here.\r\n\r\n\r\n\r\nfirst description here.first description here.first description here.first description here.'),
(2, 'second', 'Second description here.Second description here.Second description here.Second description here.'),
(3, 'Third', 'Third Desc'),
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
(3, '5264_61JyKy7zhML._SL1500_.jpg', 1),
(2, '4562_images.jpeg', 0),
(4, '6849_inddex.jpeg', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `travel_package`
--
ALTER TABLE `travel_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `travel_photogallery`
--
ALTER TABLE `travel_photogallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
