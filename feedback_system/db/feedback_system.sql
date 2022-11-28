-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2021 at 04:02 PM
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
-- Database: `feedback_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback_admin`
--

CREATE TABLE `feedback_admin` (
  `id` int(7) NOT NULL,
  `loginid` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_admin`
--

INSERT INTO `feedback_admin` (`id`, `loginid`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_exam`
--

CREATE TABLE `feedback_exam` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll` varchar(10) NOT NULL,
  `session` varchar(20) NOT NULL,
  `english` int(11) NOT NULL,
  `maths` int(11) NOT NULL,
  `physics` int(11) NOT NULL,
  `chemistry` int(11) NOT NULL,
  `computer` int(11) NOT NULL,
  `gpa` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_exam`
--

INSERT INTO `feedback_exam` (`id`, `name`, `roll`, `session`, `english`, `maths`, `physics`, `chemistry`, `computer`, `gpa`) VALUES
(1, 'Ayan Mukherjee', 's101', 'semester', 90, 95, 92, 88, 98, '9.43'),
(2, 'Sayan Banerjee', 's102', 'learning', 27, 25, 24, 23, 28, '9.38'),
(3, 'Aniket Roy', 's104', 'semester', 87, 85, 84, 90, 95, '8.40'),
(4, 'Aniket Roy', 's104', 'learning', 23, 25, 24, 25, 28, '8.90');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_questions`
--

CREATE TABLE `feedback_questions` (
  `id` int(7) NOT NULL,
  `questions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_questions`
--

INSERT INTO `feedback_questions` (`id`, `questions`) VALUES
(1, 'How good are his/her communication skills?'),
(2, 'Is he/she approachable?'),
(3, 'How effective is his/her method of teaching?'),
(4, 'Is he/she confident with the subject?'),
(5, 'Does he/she entertains students in clearing doubts?'),
(6, 'Does he/she gives fair grades?'),
(7, 'Is he/she successful in developing self-learning habits?'),
(8, 'Does he/she manages time well?'),
(9, 'Does he/she promotes full class participation?'),
(10, 'Did he/she ever act as a role model for you?');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_response`
--

CREATE TABLE `feedback_response` (
  `id` int(7) NOT NULL,
  `tid` varchar(80) NOT NULL,
  `tname` varchar(80) NOT NULL,
  `question1` int(7) NOT NULL,
  `question2` int(7) NOT NULL,
  `question3` int(7) NOT NULL,
  `question4` int(7) NOT NULL,
  `question5` int(7) NOT NULL,
  `question6` int(7) NOT NULL,
  `question7` int(7) NOT NULL,
  `question8` int(7) NOT NULL,
  `question9` int(7) NOT NULL,
  `question10` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_response`
--

INSERT INTO `feedback_response` (`id`, `tid`, `tname`, `question1`, `question2`, `question3`, `question4`, `question5`, `question6`, `question7`, `question8`, `question9`, `question10`) VALUES
(10, 'tim231', 'Tim Warner', 7, 8, 7, 8, 9, 7, 8, 7, 6, 9),
(11, 'Alex2020', 'Alex Cook', 8, 7, 8, 9, 9, 7, 8, 7, 7, 7),
(61, 'Alex2020', 'Alex Cook', 7, 8, 6, 5, 6, 7, 8, 6, 5, 5),
(63, 'connor2321', 'Connor Murray', 7, 8, 8, 9, 7, 8, 8, 9, 9, 8),
(65, 'tim231', 'Tim Warner', 7, 8, 8, 9, 7, 8, 7, 7, 8, 9),
(66, 'tim231', 'Tim Warner', 1, 5, 3, 4, 6, 6, 6, 7, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_student`
--

CREATE TABLE `feedback_student` (
  `id` int(7) NOT NULL,
  `loginid` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_student`
--

INSERT INTO `feedback_student` (`id`, `loginid`, `password`, `name`) VALUES
(1, 's101', '1012021', 'Ayan Mukherjee'),
(2, 's102', '1022021', 'Sayan Banerjee'),
(5, 's103', '1032021', 'Raj Roy'),
(6, 's104', '1042021', 'Aniket Roy');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_subject`
--

CREATE TABLE `feedback_subject` (
  `id` int(7) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_subject`
--

INSERT INTO `feedback_subject` (`id`, `subject`) VALUES
(1, 'English'),
(2, 'Physics'),
(3, 'Chemistry'),
(4, 'Mathematics'),
(5, 'Computer');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_teacher`
--

CREATE TABLE `feedback_teacher` (
  `id` int(7) NOT NULL,
  `loginid` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subjects` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_teacher`
--

INSERT INTO `feedback_teacher` (`id`, `loginid`, `name`, `subjects`) VALUES
(1, 'tim231', 'Tim Warner', 'Physics'),
(2, 'Alex2020', 'Alex Cook', 'Computer'),
(3, 'connor2321', 'Connor Murray', 'English');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback_admin`
--
ALTER TABLE `feedback_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_exam`
--
ALTER TABLE `feedback_exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_questions`
--
ALTER TABLE `feedback_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_response`
--
ALTER TABLE `feedback_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_student`
--
ALTER TABLE `feedback_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_subject`
--
ALTER TABLE `feedback_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_teacher`
--
ALTER TABLE `feedback_teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback_admin`
--
ALTER TABLE `feedback_admin`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_exam`
--
ALTER TABLE `feedback_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback_questions`
--
ALTER TABLE `feedback_questions`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback_response`
--
ALTER TABLE `feedback_response`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `feedback_student`
--
ALTER TABLE `feedback_student`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback_subject`
--
ALTER TABLE `feedback_subject`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback_teacher`
--
ALTER TABLE `feedback_teacher`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
