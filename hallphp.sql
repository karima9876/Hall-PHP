-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2020 at 02:02 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hallphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `amountable`
--

DROP TABLE IF EXISTS `amountable`;
CREATE TABLE IF NOT EXISTS `amountable` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `amstudent_id` varchar(255) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `time` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amountable`
--

INSERT INTO `amountable` (`id`, `amstudent_id`, `amount`, `time`) VALUES
(1, '16CSE23', 200, '2020-02-29'),
(28, '17CSE049', 500, '2020-11-25'),
(15, '16CSE26', 500, '2020-08-24'),
(12, '16CSE26', 560, '2020-03-03'),
(14, '16CSE24', 200, '2020-03-03'),
(8, '16CSE26', 1234, '2020-03-03'),
(11, '16CSE26', 560, '2020-03-03'),
(16, '16CSE26', 788, '2020-08-31'),
(17, '2015120103', 500, '2020-09-02'),
(18, '16CSE26', 500, '2020-10-22'),
(19, '17CSE049', 500, '2020-10-29'),
(20, '17CSE049', 500, '2020-10-29'),
(22, '16CSE26', 500, '2020-10-31'),
(23, '17CSE024', 500, '2020-11-01'),
(24, '15EEE066', 300, '2020-11-01'),
(25, '18ACI033', 500, '2020-11-01'),
(26, '17BMB011	', 500, '2020-11-01'),
(27, '16CSE24', 200, '2020-11-01'),
(29, '17CSE049', 500, '2020-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `buy_meal`
--

DROP TABLE IF EXISTS `buy_meal`;
CREATE TABLE IF NOT EXISTS `buy_meal` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bStudent_id` varchar(255) NOT NULL,
  `morning_meal_quantity` int(10) NOT NULL,
  `launch_meal_quantity` int(10) NOT NULL,
  `dinner_meal_quantity` int(10) NOT NULL,
  `time` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buy_meal`
--

INSERT INTO `buy_meal` (`id`, `bStudent_id`, `morning_meal_quantity`, `launch_meal_quantity`, `dinner_meal_quantity`, `time`) VALUES
(60, '16CSE26', 3, 1, 1, '2020-03-03'),
(65, '16CSE24', 1, 1, 1, '2020-03-03'),
(66, '16CSE26', 0, 2, 2, '2020-08-24'),
(67, '16CSE26', 3, 0, 2, '2020-08-29'),
(68, '16CSE26', 3, 4, 1, '2020-10-30'),
(69, '16CSE26', 1, 1, 1, '2020-10-26'),
(70, '15BGE022', 1, 1, 1, '2020-10-29'),
(71, '15BGE022', 1, 1, 1, '2020-10-30'),
(72, '16CSE26', 3, 0, 1, '2020-10-29'),
(73, '16CSE26', 2, 3, 1, '2020-10-28'),
(78, '17CSE049', 1, 1, 1, '2020-10-30'),
(79, '17CSE049', 1, 1, 1, '2020-10-31'),
(80, '17CSE049', 1, 1, 1, '2020-11-17'),
(81, '17CSE049', 1, 1, 1, '2020-11-18'),
(87, '17CSE049', 1, 1, 1, '2020-11-19'),
(90, '17CSE049', 2, 1, 2, '2020-11-23');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

DROP TABLE IF EXISTS `complain`;
CREATE TABLE IF NOT EXISTS `complain` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `cStudent_id` varchar(255) NOT NULL,
  `rtitle` varchar(255) NOT NULL,
  `rcontent` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `cStudent_id`, `rtitle`, `rcontent`, `time`) VALUES
(66, '15BGE022', 'Food for thought: The challenge of healthy eating on campus', 'Many hall students arenâ€™t even eating one serving of fruits or vegetables in a day.', '2020-11-25 08:13:29'),
(65, '17CSE049', 'Water crisis', 'Sir,\r\nThere have no pure drinking water.so you will try to solve this problem', '2020-11-25 08:10:13'),
(67, '16CSE26', 'For clean washroom', 'washrooms are very dirty.as a result we catch many injuries', '2020-11-25 08:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `mealcost`
--

DROP TABLE IF EXISTS `mealcost`;
CREATE TABLE IF NOT EXISTS `mealcost` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mtudent_id` varchar(255) NOT NULL,
  `cost` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mealcost`
--

INSERT INTO `mealcost` (`id`, `mtudent_id`, `cost`) VALUES
(4, '16CSE23', 225),
(7, '16CSE24', 65),
(5, '16CSE26', 1231),
(8, '2015120103', 126),
(10, '17CSE049', 500);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `userType` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `cnumber` varchar(255) DEFAULT NULL,
  `gnumber` varchar(255) DEFAULT NULL,
  `roomno` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `email`, `password`, `userType`, `name`, `fname`, `mname`, `address`, `department`, `cnumber`, `gnumber`, `roomno`, `blood_group`, `image`) VALUES
(20, '17CSE049', 'karimajaman9876@gmail.com', '12345', 'User', 'kjmoon', 'Nurul Islam', 'Yasmen Begum', 'Bhanga,Faridpur', 'CES- 3rd ', '01703986069', '01710229868', 'common room', 'A+', 'pictures/75588235_556298244942533_3252161906684723200_n.jpg'),
(34, 'Admin5', 'rafa@gmail.com', 'Admin5', 'Admin', 'RaFa Rahman', NULL, NULL, 'Dhaka', 'Math', '01703986055', NULL, NULL, 'A+', 'pictures/images.jpg'),
(25, '18ACI033', 'neha@gmail.com', '18ACI033', 'User', 'Fahana Naha', 'Farhan Mia', 'Jamila Begum', 'Khulna', 'Agricultural-3rd', '01703986069', '01710229868', '12-A', 'B+', 'pictures/36345297_658726877824312_2211057079605526528_n.jpg'),
(27, 'Admin', 'karimajaman9876@gmail.com', 'Admin', 'Admin', 'kjmoon', '', '', 'Bhanga,Faridpur', 'BMB', '01703986069', '', '', 'A+', 'pictures/120298009_2749898345295049_8203955311980933140_n.jpg'),
(26, '16CSE24', 'rani@gmail.com', '16CSE24', 'User', 'Rani', 'Jamil Mia', 'Tania Begum', 'Barisal', 'English-2nd', '01703986069', '01710229868', '12-A', 'B+', 'pictures/photo-1544005313-94ddf0286df2.jpg'),
(28, 'Admin3', 'jaman87@gmail.com', '12345', 'Admin', 'Jaman', NULL, NULL, 'Gopalgonj', 'English', '01703986069', NULL, NULL, 'B+', 'pictures/photo-1438761681033-6461ffad8d80.jpg'),
(44, '16CSE26', 'rafika@gmail.com', '16CSE26', 'User', 'Rafiika', 'Farhan Mia', 'rafika Begum', 'Dhaka', 'English-2nd', '0198828666', '01710229888', '12-A', 'B+', 'pictures/53110992_416831619125429_8256426932606861312_n.jpg'),
(31, 'Admin1', 'jakia87@gmail.com', 'Admin1', 'Admin', 'Jaman', NULL, NULL, 'Faridpur', 'CES ', '01703986069', NULL, NULL, 'A+', 'pictures/photo-1544005313-94ddf0286df2.jpg'),
(32, '17BMB011', 'erina@gmail.com', '17BMB011', 'User', 'Erina', 'Rafiq islam', 'jamina begum', 'Gopalgonj', 'BMB-4th', '01988283311', '017229087542', '6-B', 'o+', 'pictures/120298009_2749898345295049_8203955311980933140_n.jpg'),
(45, '17CSE024', 'ikonika@gmail.com', '17CSE024', 'User', 'Konika Shaha', 'Tonmoy Shaha', 'Jamila Begum', 'Madaripur', 'cse & 3rd', '01988288944', '017229087577', '4-C', 'A-', 'pictures/k.jpg'),
(37, '15BGE043', 'supti87@gmail.com', '15BGE043', 'User', 'supti', 'Farhan Mia', 'yasmen begum', 'Khulna', 'BGE-3rd', '01988288979', '01710229888', '12-C', 'A+', 'pictures/51499942_404478233694101_620532189116760064_n.jpg'),
(43, '15EEE066', 'runa@gmail.com', '15EEE066', 'User', 'Runa Akter', ' Ikram Rahman', 'Amina Begum', 'Gopalgonj', 'Bangla-4th', '0198828333', '017229087542', '7-B', 'AB+', 'pictures/45320326_943375975845999_3628468958132174848_o.jpg'),
(46, '15BGE022', 'jaman87@gmail.com', '15BGE022', 'User', 'Jaman', 'Nurul Islam', 'yasmen begum', 'Faridpur', 'cse & 2nd', '01988288979', '01710229868', '7-A', 'B+', 'pictures/images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `update_meal`
--

DROP TABLE IF EXISTS `update_meal`;
CREATE TABLE IF NOT EXISTS `update_meal` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `morning_meal_cost` int(10) NOT NULL,
  `launch_meal_cost` int(10) NOT NULL,
  `dinner_meal_cost` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_meal`
--

INSERT INTO `update_meal` (`id`, `morning_meal_cost`, `launch_meal_cost`, `dinner_meal_cost`) VALUES
(1, 20, 25, 30);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
