-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 07:20 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onion_routes`
--

-- --------------------------------------------------------

--
-- Table structure for table `dlinks`
--

CREATE TABLE `dlinks` (
  `ID` int(11) NOT NULL,
  `WP_FK` int(11) NOT NULL,
  `URL` varchar(250) NOT NULL,
  `S_TYPE` varchar(10) NOT NULL,
  `N_TYPE` varchar(10) NOT NULL,
  `LIVE_DATE` varchar(10) NOT NULL,
  `UPDATE_DATE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newpages`
--

CREATE TABLE `newpages` (
  `ID` int(11) NOT NULL,
  `DATE` varchar(20) NOT NULL,
  `URL` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newpages`
--

INSERT INTO `newpages` (`ID`, `DATE`, `URL`) VALUES
(4, '2018/09/19', ''),
(6, '2018/09/19', ''),
(8, '2018/09/19', ''),
(12, '2018/09/19', 'asd'),
(13, '2018/09/19', 'asd'),
(14, '2018/09/19', 'asd'),
(15, '2018/09/19', 'asd'),
(16, '2018/09/20', 'dassa'),
(17, '2018/09/21', 'as'),
(18, '2018/09/21', 'asd'),
(19, '2018/09/21', 'asd'),
(20, '2018/09/21', 'sad'),
(21, '2018/09/21', 'asd'),
(22, '2018/09/21', 'SAD'),
(23, '2018/09/21', 'SAD'),
(24, '2018/09/21', 'SAD'),
(25, '2018/09/21', 'SAD'),
(26, '2018/09/21', 'SAD'),
(27, '2018/09/21', 'SAD'),
(28, '2018/09/21', 'SAD'),
(29, '2018/09/21', 'SAD'),
(30, '2018/09/21', 'SAD'),
(31, '2018/09/21', 'SAD'),
(32, '2018/09/21', 'SAD'),
(33, '2018/09/21', 'SAD'),
(34, '2018/09/21', 'SAD'),
(35, '2018/09/21', 'SAD'),
(36, '2018/09/21', 'SAD'),
(37, '2018/09/21', 'SAD'),
(38, '2018/09/21', 'SAD'),
(39, '2018/09/21', 'SAD'),
(40, '2018/09/21', 'SAD'),
(41, '2018/09/21', 'SAD'),
(42, '2018/09/21', 'SAD'),
(43, '2018/09/21', 'SAD'),
(44, '2018/09/21', 'SAD'),
(45, '2018/09/21', 'SAD'),
(46, '2018/09/21', 'SAD'),
(47, '2018/09/21', 'www.google.com'),
(48, '2018/09/21', 'www.google.com.pk'),
(49, '2018/09/21', 'www.google.com.pk'),
(50, '2018/09/21', 'www.google.com.pk'),
(51, '2018/09/21', 'www.google.com.pk'),
(52, '2018/09/21', 'www.google.com.pk'),
(53, '2018/09/21', 'www.google.com.pk'),
(54, '2018/09/21', 'www.google.com.pk'),
(55, '2018/09/21', 'www.google.com.pk'),
(56, '2018/09/21', 'www.google.com.pk'),
(57, '2018/09/21', 'www.google.com.pk'),
(58, '2018/09/21', 'www.google.com.pk'),
(59, '2018/09/21', 'www.google.com.pk'),
(60, '2018/09/21', 'www.google.com.pk'),
(61, '2018/09/21', 'www.google.com.pk'),
(62, '2018/09/21', 'www.google.com.pk'),
(63, '2018/09/21', 'sad'),
(64, '2018/09/21', 'sdfa'),
(65, '2018/09/21', 'sad'),
(66, '2018/09/21', 'sad'),
(67, '2018/09/21', 'sad'),
(68, '2018/09/21', 'asd'),
(69, '2018/09/21', 'dsf'),
(70, '2018/09/21', 'www.google.com.pk'),
(71, '2018/09/21', 'sadf'),
(72, '2018/09/21', 'as'),
(73, '2018/09/22', 'asd'),
(74, '2018/09/22', 'ds'),
(75, '2018/09/22', 'ds'),
(76, '2018/09/22', 'ds'),
(77, '2018/09/22', 'ds'),
(78, '2018/09/22', 'ds'),
(79, '2018/09/22', 'ds'),
(80, '2018/09/22', 'ds'),
(81, '2018/09/22', 'ds'),
(82, '2018/09/22', 'ds'),
(83, '2018/09/22', 'ds'),
(84, '2018/09/22', 'sad'),
(85, '2018/09/22', 'sad'),
(86, '2018/09/22', 'asd'),
(87, '2018/09/22', 'sad'),
(88, '2018/09/22', 'sad'),
(89, '2018/09/22', 'sad'),
(90, '2018/09/22', 'sad'),
(91, '2018/09/22', 'sad'),
(92, '2018/09/22', 'asd'),
(93, '2018/09/22', 'asd'),
(94, '2018/09/22', 'asdjaskda'),
(95, '2018/09/22', 'asdjaskda'),
(96, '2018/09/22', 'asdjaskda'),
(97, '2018/09/22', 'asdjaskda'),
(98, '2018/09/22', 'asdjaskda'),
(99, '2018/09/22', 'asdjaskda'),
(100, '2018/09/22', 'asdjaskda'),
(101, '2018/09/22', 'AD'),
(102, '2018/09/22', 'google.com'),
(103, '2018/09/22', 'nm'),
(104, '2018/09/22', 'weqw'),
(105, '2018/09/22', 'dwgf'),
(106, '2018/09/24', ''),
(107, '2018/09/24', 'Illegal innocent porn'),
(108, '2018/09/25', 'asd'),
(109, '2018/09/25', 'asd'),
(110, '2018/09/25', 'asd'),
(111, '2018/09/25', 'sunbay.private.onion'),
(112, '2018/09/26', ''),
(113, '2018/09/26', '[]'),
(114, '2018/09/26', '[ ]'),
(115, '.date(\"Y/m/d\").', 'ads'),
(116, '.date(\"Y/m/d\").', '\\][\';/..,|}{\":?><12!@#$%^&*()'),
(117, '.date(\"Y/m/d\").', 'wds'),
(118, '.date(\"Y/m/d\").', 'njh');

-- --------------------------------------------------------

--
-- Table structure for table `report_web`
--

CREATE TABLE `report_web` (
  `ID` int(11) NOT NULL,
  `URL` varchar(60) NOT NULL,
  `DATE` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report_web`
--

INSERT INTO `report_web` (`ID`, `URL`, `DATE`) VALUES
(1, 'sadf', '2018/09/21'),
(2, 'aas', '2018/09/21'),
(3, 'dfsa', '2018/09/22'),
(4, 'asd', '2018/09/22'),
(5, 'asd', '2018/09/22'),
(6, 'asd', '2018/09/22'),
(7, 'asd', '2018/09/22'),
(8, 'asd', '2018/09/22'),
(9, 'asd', '2018/09/22'),
(10, 'asd', '2018/09/22'),
(11, 'asd', '2018/09/22'),
(12, 'asd', '2018/09/22'),
(13, 'asd', '2018/09/22'),
(14, 'asd', '2018/09/22'),
(15, 'asd', '2018/09/22'),
(16, 'asd', '2018/09/22'),
(17, 'asd', '2018/09/22'),
(18, 'asd', '2018/09/22'),
(19, 'asd', '2018/09/22'),
(20, 'asd', '2018/09/22'),
(21, 'asd', '2018/09/22'),
(22, 'asd', '2018/09/22'),
(23, 'asd', '2018/09/22'),
(24, 'asd', '2018/09/22'),
(25, 'asd', '2018/09/22'),
(26, 'nm', '2018/09/22'),
(27, 'f', '2018/09/22'),
(28, 'qwer', '2018/09/25'),
(29, 'asdfj', '2018/09/25'),
(30, 'asdfk', '2018/09/25'),
(31, 'lasdklfjasdlkjflas', '2018/09/25'),
(32, 'asd', '2018/09/25'),
(33, 'asfd', '2018/09/25'),
(34, '123', '2018/09/25'),
(35, 'das', '2018/09/25'),
(36, 'das', '2018/09/25'),
(37, 'das', '2018/09/25'),
(38, 'das', '2018/09/25'),
(39, 'das', '2018/09/25'),
(40, 'das', '2018/09/25'),
(41, 'das', '2018/09/25'),
(42, 'asd', '2018/09/25'),
(43, 'asd', '2018/09/25'),
(44, 'asd', '2018/09/25'),
(45, 'asd', '2018/09/25'),
(46, 'sd', '.date(\"Y/m/d\").'),
(47, 'qqwd', '.date(\"Y/m/d\").'),
(48, '][][\';', '.date(\"Y/m/d\").'),
(49, '\\][\';/..,|}{\":?><12!@#$%^&*()', '.date(\"Y/m/d\").'),
(50, 'mn', '.date(\"Y/m/d\").'),
(51, 'mn', '.date(\"Y/m/d\").'),
(52, 'mn', '.date(\"Y/m/d\").');

-- --------------------------------------------------------

--
-- Table structure for table `webpages`
--

CREATE TABLE `webpages` (
  `ID` int(2) NOT NULL,
  `URL` varchar(100) DEFAULT NULL,
  `TITLE` varchar(100) DEFAULT NULL,
  `DESCRIPTION` varchar(1100) DEFAULT NULL,
  `TYPE` varchar(10) NOT NULL,
  `LIVE_DATE` varchar(10) NOT NULL,
  `UPDATE_DATE` varchar(11) NOT NULL,
  `S_TYPE` varchar(15) NOT NULL,
  `N_TYPE` varchar(10) NOT NULL,
  `KEY_WORD` text NOT NULL,
  `LOGO` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dlinks`
--
ALTER TABLE `dlinks`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `URL` (`URL`);

--
-- Indexes for table `newpages`
--
ALTER TABLE `newpages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `report_web`
--
ALTER TABLE `report_web`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `webpages`
--
ALTER TABLE `webpages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `URL` (`URL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dlinks`
--
ALTER TABLE `dlinks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14885;

--
-- AUTO_INCREMENT for table `newpages`
--
ALTER TABLE `newpages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `report_web`
--
ALTER TABLE `report_web`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `webpages`
--
ALTER TABLE `webpages`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4217;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
