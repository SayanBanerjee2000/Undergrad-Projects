-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 03:33 PM
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
-- Database: `shoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `loginid` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `loginid`, `password`) VALUES
(1, 'admin', 'admin1'),
(2, 'subadmin1', 'sub1234');

-- --------------------------------------------------------

--
-- Table structure for table `admin_log`
--

CREATE TABLE `admin_log` (
  `id` int(7) NOT NULL,
  `message` varchar(400) NOT NULL,
  `status` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_log`
--

INSERT INTO `admin_log` (`id`, `message`, `status`) VALUES
(1, 'Hi, Please update a new product bearing category id = 2 with product name = white and pink sneaker. We got the quantity around 50 pcs and set price at 2999. ', 1),
(2, 'Hi, \r\nPlease update the price of brown slippers to 1699. ', 1),
(3, 'xyz', 1),
(4, 'oiahfigdiosjf', 1),
(5, 'ihasdiufewn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `orig_price` int(10) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_price` int(11) NOT NULL,
  `quantity` int(7) NOT NULL,
  `size` int(7) NOT NULL,
  `user_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'Men'),
(2, 'Women');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(10) NOT NULL,
  `questions` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `questions`, `replies`) VALUES
(10, 'My account is down', 'We are currently carrying out maintenance.'),
(11, 'Hello', 'Hey there, How can I help you?'),
(12, 'Hi/Hello/Hey', 'Good day, How can we help you?'),
(13, 'I need to talk to an official', 'Please be advised all our official are busy, they will contact you via email. '),
(14, 'I want to know my order status/order status/where is my order', 'Mention Your Order ID'),
(15, 'Who are you/what are you/your identity\r\nWho are you?/what are you?/your identity?/what is your identity/what is your identity? ', 'I am HappyFeet, here to assist you with all shopping needs in order to keep your feet happy'),
(16, 'what can you do/what can you do?/what can you do ?', 'I can check your order status and also I can suggest you shoes with your matched colour preference');

-- --------------------------------------------------------

--
-- Table structure for table `contact_log`
--

CREATE TABLE `contact_log` (
  `cust_id` varchar(20) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `msg` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_log`
--

INSERT INTO `contact_log` (`cust_id`, `cust_name`, `msg`) VALUES
('sb123', 'Sayan Banerjee', 'Hello Hello 1234');

-- --------------------------------------------------------

--
-- Table structure for table `helpdesk`
--

CREATE TABLE `helpdesk` (
  `id` int(11) NOT NULL,
  `cust_msg` varchar(500) NOT NULL,
  `agent_msg` varchar(500) NOT NULL,
  `cust_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `cust_email` varchar(250) NOT NULL,
  `cust_addr` varchar(250) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` int(10) NOT NULL,
  `cust_mobile` bigint(11) NOT NULL,
  `p_name` varchar(80) NOT NULL,
  `p_quantity` int(10) NOT NULL,
  `size` int(10) NOT NULL,
  `original_prc` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `total_amt`, `order_date`, `delivery_date`, `cust_name`, `cust_email`, `cust_addr`, `state`, `city`, `zip`, `cust_mobile`, `p_name`, `p_quantity`, `size`, `original_prc`) VALUES
(38, 580, 'sb123', 6297, '2022-02-03', '2022-02-13', 'Sayan Banerjee', 'sayan.banjo@gmail.com', 'BD 61', 'West Bengal', 'Kolkata', 700064, 9874563210, 'White Sneaker', 1, 6, 2499),
(39, 580, 'sb123', 6297, '2022-02-03', '2022-02-13', 'Sayan Banerjee', 'sayan.banjo@gmail.com', 'BD 61', 'West Bengal', 'Kolkata', 700064, 9874563210, 'White Sneaker', 1, 7, 2499),
(40, 580, 'sb123', 6297, '2022-02-03', '2022-02-13', 'Sayan Banerjee', 'sayan.banjo@gmail.com', 'BD 61', 'West Bengal', 'Kolkata', 700064, 9874563210, 'Red Sneaker', 1, 6, 1299),
(41, 182, 'sb123', 1199, '2022-02-03', '2022-02-13', 'Sayan Banerjee', 'sayan.banjo@gmail.com', 'BD 61 ', 'West Bengal', 'Kolkata', 700064, 9874563210, 'Green Sneaker', 1, 7, 1199),
(42, 611, 'ab234', 1199, '2022-02-05', '2022-02-15', 'ayan de', 'ayan.de@yahoo.com', '123 City Place', 'WB', 'Kolkata', 700023, 9784536212, 'Green Sneaker', 1, 9, 1199);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `p_quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `p_name`, `p_quantity`, `price`, `photo`) VALUES
(6, 2, 'White Sneaker', 145, 2499, '6697_8998843-min.jpg'),
(7, 1, 'Red Sneaker', 147, 1299, '6223_red.jpg'),
(8, 1, 'Blue Sneaker', 149, 1349, '8221_Puma-Sneakers-Blue-Casual-Shoes-SDL411997012-1-ca710.jpeg'),
(9, 1, 'Navy Blue Sneaker', 50, 1499, '2227_R.jfif'),
(12, 2, 'Black Sneaker', 199, 2099, '4517_black.jpg'),
(13, 1, 'Green Sneaker', 37, 1199, '3762_green.jfif'),
(15, 2, 'Pink Sneaker', 250, 1799, '5609_pink.jpg'),
(16, 1, 'brown slippers', 119, 1259, '9582_brown_slippers.jpeg'),
(17, 1, 'Red and White Sneaker', 249, 1699, '3692_red_white.jpg'),
(18, 2, 'Pink and Red Sneakers', 150, 2899, '8730_pink_red.jpeg'),
(19, 2, 'White and Pink sneaker', 50, 2999, '2135_white_pink.jfif'),
(20, 1, 'Brown Sneakers', 250, 2699, '1822_brown_sneaker.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `product_temp`
--

CREATE TABLE `product_temp` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pd_name` varchar(250) NOT NULL,
  `pd_quantity` int(11) NOT NULL,
  `pd_price` int(11) NOT NULL,
  `pd_photo` varchar(255) NOT NULL,
  `status` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_temp`
--

INSERT INTO `product_temp` (`id`, `cat_id`, `pd_name`, `pd_quantity`, `pd_price`, `pd_photo`, `status`) VALUES
(1, 2, 'Pink and Red Sneakers', 150, 2899, '8730_pink_red.jpeg', 1),
(2, 2, 'White and Pink sneaker', 50, 2999, '2135_white_pink.jfif', 1),
(3, 1, 'Brown Sneakers', 250, 2699, '1822_brown_sneaker.jfif', 1),
(4, 1, 'hsdhifb', 70, 1234, '8247_', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL,
  `loginid` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `loginid`, `password`, `name`) VALUES
(83, 'sb123', 'helloworld12', 'Sayan Banerjee');

-- --------------------------------------------------------

--
-- Table structure for table `temp_admin`
--

CREATE TABLE `temp_admin` (
  `loginid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_admin`
--

INSERT INTO `temp_admin` (`loginid`, `password`, `name`) VALUES
('subadmin1', 'sub1234', 'agent');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_det`
--

CREATE TABLE `user_det` (
  `id` int(11) NOT NULL,
  `loginid` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_det`
--

INSERT INTO `user_det` (`id`, `loginid`, `password`, `name`) VALUES
(1, 'sb123', 'helloworld12', 'Sayan Banerjee'),
(51, 'ab234', 'welcome2022', 'Ayan De'),
(55, 'es231', 'hello1234', 'Esther Haun'),
(56, 'alex123', 'alex2022', 'Alex Cook');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_log`
--
ALTER TABLE `admin_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `helpdesk`
--
ALTER TABLE `helpdesk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_temp`
--
ALTER TABLE `product_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `user_det`
--
ALTER TABLE `user_det`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_log`
--
ALTER TABLE `admin_log`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `helpdesk`
--
ALTER TABLE `helpdesk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `product_temp`
--
ALTER TABLE `product_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_det`
--
ALTER TABLE `user_det`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
