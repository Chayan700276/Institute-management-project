-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2017 at 10:05 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attend`
--

CREATE TABLE `tbl_attend` (
  `id` int(11) NOT NULL,
  `roll` int(6) NOT NULL,
  `att_time` date NOT NULL,
  `attend` varchar(77) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attend`
--

INSERT INTO `tbl_attend` (`id`, `roll`, `att_time`, `attend`) VALUES
(1, 6777777, '0000-00-00', 'absent'),
(2, 345, '0000-00-00', 'absent'),
(3, 6777777, '2017-02-24', 'absent'),
(4, 345, '2017-02-24', 'absent'),
(5, 6777777, '2017-02-24', 'absent'),
(6, 345, '2017-02-24', 'absent'),
(7, 66666, '0000-00-00', 'absent'),
(8, 66666, '2017-02-24', 'absent'),
(9, 6777777, '2017-02-26', 'absent'),
(10, 345, '2017-02-26', 'absent'),
(11, 66666, '2017-02-26', 'absent'),
(12, 6777777, '2017-02-26', 'absent'),
(13, 345, '2017-02-26', 'absent'),
(18, 6777777, '2017-02-27', 'absent'),
(19, 345, '2017-02-27', 'absent'),
(20, 66666, '2017-02-27', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(44) NOT NULL,
  `name` varchar(77) NOT NULL,
  `roll` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `roll`) VALUES
(1, 'Ovi Roy', 6777777),
(2, 'Sushil Roy', 345),
(3, 'Sushil Roy', 66666);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_attend`
--
ALTER TABLE `tbl_attend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_attend`
--
ALTER TABLE `tbl_attend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(44) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
