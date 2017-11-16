-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2017 at 04:30 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE `class_routine` (
  `id` int(11) NOT NULL,
  `class_priode` varchar(50) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `subject_type` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `day_of_week` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`id`, `class_priode`, `teacher_name`, `semester`, `shift`, `subject_name`, `subject_type`, `department`, `day_of_week`) VALUES
(1, 'second', 'sofiq islam', 'first', 'second', 'sssss', 'non-departmental', 'computer', 'Saturday'),
(2, 'sixth', 'sofiq islam', 'fourth', 'first', 'basic electronics', 'departmental', 'computer', 'Saturday'),
(5, 'first', 'F', 'second', 'second', 'D', 'departmental', 'food', 'sunday'),
(6, 'first', 'sofiq islam', 'second', 'second', 'basic electronics', 'non-departmental', 'food', 'sunday'),
(7, 'seventh', 'sofiq islam', 'seventh', 'second', 'PLC', 'departmental', 'computer', 'Saturday'),
(8, 'second', 'sofiq islam', 'third', 'second', 'PLC', 'departmental', 'food', 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_id` int(50) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `joining_date` varchar(50) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'running',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_id`, `employee_name`, `designation`, `joining_date`, `date_of_birth`, `status`, `image`) VALUES
(4, 2154, 'Rashidul ahmed', 'helper', '14-02-2010', '12-04-1992', 'running', 'upload/ba007f11a3.jpg'),
(5, 512, 'Rashidul ahmed', 'helper', '14-02-2010', '12-04-1975', 'transfered', 'upload/31cae3200c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `month_fee` int(11) NOT NULL,
  `exam_fee` int(11) NOT NULL,
  `admission_fee` int(11) NOT NULL,
  `refard_sub_fee` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `month_fee`, `exam_fee`, `admission_fee`, `refard_sub_fee`, `semester`) VALUES
(1, 100, 200, 800, 100, 'first'),
(2, 100, 300, 500, 200, 'second'),
(3, 100, 300, 500, 200, 'third'),
(4, 100, 300, 500, 200, 'fourth'),
(5, 100, 300, 250, 200, 'fifth'),
(6, 100, 220, 900, 100, 'sixth'),
(7, 100, 1000, 1000, 200, 'seventh');

-- --------------------------------------------------------

--
-- Table structure for table `payment_due_tbl`
--

CREATE TABLE `payment_due_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `roll` int(6) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `shift` varchar(30) NOT NULL,
  `due_type` varchar(32) NOT NULL,
  `due` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_due_tbl`
--

INSERT INTO `payment_due_tbl` (`id`, `name`, `roll`, `dept`, `semester`, `shift`, `due_type`, `due`) VALUES
(43, 'sushil moga', 700269, 'aidt', 'seventh', 'first', 'add_fee', 0),
(45, 'sushil moga', 700269, 'aidt', 'seventh', 'first', 'month_fee', 0),
(48, 'Chayan roy', 700276, 'computer', 'fifth', 'first', 'month_fee', 0),
(49, 'Chayan roy', 700276, 'computer', 'seventh', 'first', '', 1),
(50, 'Utpal Roy', 700275, 'computer', 'seventh', 'first', '', 1),
(51, 'Sushil Roy', 700269, 'computer', 'seventh', 'first', '', 1),
(52, 'Dhruba roy', 700265, 'computer', 'seventh', 'first', '', 1),
(53, 'Sulekha rani', 700305, 'computer', 'seventh', 'second', '', 1),
(54, 'Nipa rani roy', 700340, 'computer', 'seventh', 'second', '', 1),
(59, 'Al amin islam', 700345, 'aidt', 'seventh', 'first', '', 1),
(67, 'Polash roy', 312654, 'food', 'seventh', 'first', '', 1),
(68, 'Bhoirobi roy', 125342, 'food', 'seventh', 'first', '', 1),
(69, 'Piya roy', 553453, 'food', 'seventh', 'first', '', 1),
(70, 'Brozen roy', 465505, 'food', 'seventh', 'second', '', 1),
(71, 'Urmila khan', 321694, 'food', 'seventh', 'second', '', 1),
(72, 'Zerin khan', 213642, 'food', 'seventh', 'second', '', 1),
(73, 'Shahin islam', 542145, 'rac', 'seventh', 'second', '', 1),
(74, 'Madhobi lata', 453232, 'rac', 'seventh', 'first', '', 1),
(75, 'Pran islam', 251431, 'rac', 'seventh', 'first', '', 1),
(76, 'Ahmmad islam', 324452, 'rac', 'seventh', 'first', '', 1),
(81, 'Mehedi islam', 700348, 'computer', 'seventh', 'second', '', 1),
(82, 'Firoz alom', 700648, 'computer', 'seventh', 'second', '', 1),
(83, 'Polash roy', 700364, 'aidt', 'seventh', 'first', '', 1),
(84, 'Saifur rahman', 700861, 'aidt', 'seventh', 'first', '', 1),
(85, 'Shahin islam', 457812, 'aidt', 'seventh', 'first', '', 1),
(86, 'Amal roy', 124587, 'aidt', 'seventh', 'second', '', 1),
(87, 'Sattish roy', 124531, 'aidt', 'seventh', 'second', '', 1),
(88, 'Nasim islam', 369526, 'aidt', 'seventh', 'second', '', 1),
(89, 'Akbar ali', 698752, 'aidt', 'seventh', 'second', '', 1),
(90, 'Rahim islam', 321589, 'food', 'seventh', 'first', '', 1),
(91, 'Al amin islam', 321973, 'food', 'seventh', 'first', '', 1),
(92, 'Sharif islam', 789365, 'rac', 'seventh', 'first', '', 1),
(93, 'Utpal Roy', 213541, 'rac', 'seventh', 'first', '', 1),
(94, 'Utpal Chandraw Roy', 452338, 'rac', 'seventh', 'second', '', 1),
(95, 'Satyen roy', 523145, 'mecha', 'first', 'first', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `id` int(11) NOT NULL,
  `principal_name` varchar(255) NOT NULL,
  `p_gmail` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `retired_date` varchar(255) NOT NULL,
  `transfered_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Running',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`id`, `principal_name`, `p_gmail`, `joining_date`, `designation`, `date_of_birth`, `retired_date`, `transfered_date`, `status`, `image`) VALUES
(1, 'Chayan roy', 'chayanroycmt50@gmail.com                      ', '10-10-2013', 'Principal', '04-04-1998', '10-10-2017', '10-10-2017', 'Retired', 'upload/da97e5072e.png'),
(2, 'Utpal roy', 'utpalroycmt50@gmail.com               ', '10-10-2013', 'Vice-principal', '04-04-1998', '10-10-2017', '02', 'Running', 'upload/e000e9e377.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_payment`
--

CREATE TABLE `student_payment` (
  `id` int(11) NOT NULL,
  `roll` int(50) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_amount` int(50) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `due_amount` int(11) NOT NULL,
  `due_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `student_payment`
--

INSERT INTO `student_payment` (`id`, `roll`, `semester`, `payment_type`, `payment_amount`, `payment_date`, `due_amount`, `due_type`) VALUES
(578, 700269, 'seventh', 'add_fee', 1000, '2017-04-30 16:05:36', 0, 'add_fee'),
(580, 700269, 'seventh', 'month_fee', 100, '2017-04-30 16:09:26', 0, 'month_fee'),
(583, 700276, 'fifth', 'month_fee', 100, '2017-04-30 16:20:14', 0, 'month_fee'),
(584, 700276, 'fifth', 'month_fee', 100, '2017-04-30 16:21:25', 0, 'month_fee'),
(585, 700276, 'fifth', 'month_fee', 100, '2017-04-30 16:22:06', 0, 'month_fee'),
(586, 700276, 'fifth', 'month_fee', 100, '2017-04-30 16:22:51', 0, 'month_fee'),
(590, 700269, 'seventh', 'month_fee', 100, '2017-05-01 11:24:57', 0, 'month_fee'),
(591, 700276, 'seventh', '', 0, '2017-05-01 11:26:36', 1, ''),
(592, 700275, 'seventh', '', 0, '2017-05-01 11:26:36', 1, ''),
(593, 700269, 'seventh', '', 0, '2017-05-01 11:26:36', 1, ''),
(594, 700265, 'seventh', '', 0, '2017-05-01 11:26:37', 1, ''),
(595, 700305, 'seventh', '', 0, '2017-05-01 11:26:37', 1, ''),
(596, 700340, 'seventh', '', 0, '2017-05-01 11:26:37', 1, ''),
(601, 700345, 'seventh', '', 0, '2017-05-01 11:26:38', 1, ''),
(609, 312654, 'seventh', '', 0, '2017-05-01 11:26:38', 1, ''),
(610, 125342, 'seventh', '', 0, '2017-05-01 11:26:38', 1, ''),
(611, 553453, 'seventh', '', 0, '2017-05-01 11:26:39', 1, ''),
(612, 465505, 'seventh', '', 0, '2017-05-01 11:26:39', 1, ''),
(613, 321694, 'seventh', '', 0, '2017-05-01 11:26:39', 1, ''),
(614, 213642, 'seventh', '', 0, '2017-05-01 11:26:39', 1, ''),
(615, 542145, 'seventh', '', 0, '2017-05-01 11:26:39', 1, ''),
(616, 453232, 'seventh', '', 0, '2017-05-01 11:26:39', 1, ''),
(617, 251431, 'seventh', '', 0, '2017-05-01 11:26:39', 1, ''),
(618, 324452, 'seventh', '', 0, '2017-05-01 11:26:40', 1, ''),
(623, 700348, 'seventh', '', 0, '2017-05-01 11:30:41', 1, ''),
(624, 700648, 'seventh', '', 0, '2017-05-01 11:30:41', 1, ''),
(625, 700364, 'seventh', '', 0, '2017-05-01 11:30:41', 1, ''),
(626, 700861, 'seventh', '', 0, '2017-05-01 11:30:41', 1, ''),
(627, 457812, 'seventh', '', 0, '2017-05-01 11:30:42', 1, ''),
(628, 124587, 'seventh', '', 0, '2017-05-01 11:30:42', 1, ''),
(629, 124531, 'seventh', '', 0, '2017-05-01 11:30:42', 1, ''),
(630, 369526, 'seventh', '', 0, '2017-05-01 11:30:42', 1, ''),
(631, 698752, 'seventh', '', 0, '2017-05-01 11:30:42', 1, ''),
(632, 321589, 'seventh', '', 0, '2017-05-01 11:30:42', 1, ''),
(633, 321973, 'seventh', '', 0, '2017-05-01 11:30:42', 1, ''),
(634, 789365, 'seventh', '', 0, '2017-05-01 11:30:43', 1, ''),
(635, 213541, 'seventh', '', 0, '2017-05-01 11:30:43', 1, ''),
(636, 452338, 'seventh', '', 0, '2017-05-01 11:30:43', 1, ''),
(637, 523145, 'first', '', 0, '2017-05-01 11:30:43', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attend`
--

CREATE TABLE `tbl_attend` (
  `id` int(11) NOT NULL,
  `dept` varchar(44) NOT NULL,
  `semester` varchar(44) NOT NULL,
  `shifts` varchar(44) NOT NULL,
  `sub_name` varchar(300) NOT NULL,
  `roll` int(6) NOT NULL,
  `att_time` date NOT NULL,
  `attend` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attend`
--

INSERT INTO `tbl_attend` (`id`, `dept`, `semester`, `shifts`, `sub_name`, `roll`, `att_time`, `attend`) VALUES
(92, 'computer', 'seventh', 'second', 'Data communication and network -2', 700305, '2017-05-01', 'absent'),
(93, 'computer', 'seventh', 'second', 'Data communication and network -2', 700340, '2017-05-01', 'present'),
(94, 'computer', 'seventh', 'second', 'Data communication and network -2', 700348, '2017-05-01', 'present'),
(95, 'computer', 'seventh', 'second', 'Data communication and network -2', 700648, '2017-05-01', 'present'),
(96, 'computer', 'seventh', 'first', 'Multimedia and Graphics', 700276, '2017-05-01', 'present'),
(97, 'computer', 'seventh', 'first', 'Multimedia and Graphics', 700275, '2017-05-01', 'absent'),
(98, 'computer', 'seventh', 'first', 'Multimedia and Graphics', 700269, '2017-05-01', 'absent'),
(99, 'computer', 'seventh', 'first', 'Multimedia and Graphics', 700265, '2017-05-01', 'absent'),
(100, 'computer', 'seventh', 'first', 'Embedded System & PLC', 700276, '2017-04-27', 'present'),
(101, 'computer', 'seventh', 'first', 'Embedded System & PLC', 700275, '2017-04-27', 'present'),
(102, 'computer', 'seventh', 'first', 'Embedded System & PLC', 700269, '2017-04-27', 'present'),
(103, 'computer', 'seventh', 'first', 'Embedded System & PLC', 700265, '2017-04-27', 'present'),
(104, 'computer', 'seventh', 'first', 'Embedded System & PLC', 700276, '2017-04-28', 'present'),
(105, 'computer', 'seventh', 'first', 'Embedded System & PLC', 700275, '2017-04-28', 'absent'),
(106, 'computer', 'seventh', 'first', 'Embedded System & PLC', 700269, '2017-04-28', 'absent'),
(107, 'computer', 'seventh', 'first', 'Embedded System & PLC', 700265, '2017-04-28', 'present'),
(108, 'computer', 'seventh', 'first', 'System Analysis and design  and devlopment', 700276, '2017-04-28', 'present'),
(109, 'computer', 'seventh', 'first', 'System Analysis and design  and devlopment', 700275, '2017-04-28', 'absent'),
(110, 'computer', 'seventh', 'first', 'System Analysis and design  and devlopment', 700269, '2017-04-28', 'absent'),
(111, 'computer', 'seventh', 'first', 'System Analysis and design  and devlopment', 700265, '2017-04-28', 'absent'),
(112, 'computer', 'seventh', 'first', 'Data communication and network -2', 700276, '2017-04-28', 'present'),
(113, 'computer', 'seventh', 'first', 'Data communication and network -2', 700275, '2017-04-28', 'present'),
(114, 'computer', 'seventh', 'first', 'Data communication and network -2', 700269, '2017-04-28', 'present'),
(115, 'computer', 'seventh', 'first', 'Data communication and network -2', 700265, '2017-04-28', 'present'),
(116, 'computer', 'seventh', 'first', 'Entrepreneurship', 700276, '2017-04-28', 'absent'),
(117, 'computer', 'seventh', 'first', 'Entrepreneurship', 700275, '2017-04-28', 'absent'),
(118, 'computer', 'seventh', 'first', 'Entrepreneurship', 700269, '2017-04-28', 'absent'),
(119, 'computer', 'seventh', 'first', 'Entrepreneurship', 700265, '2017-04-28', 'absent'),
(120, 'computer', 'seventh', 'first', 'Multimedia and Graphics', 700276, '2017-05-03', 'present'),
(121, 'computer', 'seventh', 'first', 'Multimedia and Graphics', 700275, '2017-05-03', 'present'),
(122, 'computer', 'seventh', 'first', 'Multimedia and Graphics', 700269, '2017-05-03', 'present'),
(123, 'computer', 'seventh', 'first', 'Multimedia and Graphics', 700265, '2017-05-03', 'present'),
(124, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700276, '2017-08-28', 'present'),
(125, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700275, '2017-08-28', 'present'),
(126, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700269, '2017-08-28', 'present'),
(127, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700265, '2017-08-28', 'present'),
(128, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700276, '2017-11-04', 'present'),
(129, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700275, '2017-11-04', 'absent'),
(130, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700269, '2017-11-04', 'present'),
(131, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700265, '2017-11-04', 'absent'),
(132, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700276, '2017-11-04', 'present'),
(133, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700275, '2017-11-04', 'absent'),
(134, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700269, '2017-11-04', 'present'),
(135, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700265, '2017-11-04', 'absent'),
(136, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700276, '2017-11-04', 'present'),
(137, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700275, '2017-11-04', 'absent'),
(138, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700269, '2017-11-04', 'present'),
(139, 'computer', 'seventh', 'first', 'Embedded System & Programable Logic Control ', 700265, '2017-11-04', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_libcard`
--

CREATE TABLE `tbl_libcard` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `roll` int(6) NOT NULL,
  `b_name` varchar(444) NOT NULL,
  `w_name` varchar(444) NOT NULL,
  `price` varchar(255) NOT NULL,
  `g_date` varchar(400) NOT NULL,
  `t_date` varchar(300) NOT NULL,
  `lib_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_libcard`
--

INSERT INTO `tbl_libcard` (`id`, `s_name`, `roll`, `b_name`, `w_name`, `price`, `g_date`, `t_date`, `lib_status`) VALUES
(1, 'Utpal Roy', 700275, 'Devdash Upponash', 'SorotChandra Chottopadhay', '250', '01-04-2017', '', 0),
(2, 'Sushil Roy', 700269, 'Devdash Upponash', 'SorotChandra Chottopadhay', '250', '01-01-2017', '', 0),
(3, 'Polash roy', 700364, 'Himu', 'Hymayan Ahammed', '230', '01-04-2017', '', 0),
(4, 'Rahim islam', 321589, 'Medical Resarch', 'Javed Omar', '2,500', '3-5-17', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_library`
--

CREATE TABLE `tbl_library` (
  `id` int(11) NOT NULL,
  `b_name` varchar(444) NOT NULL,
  `b_type` varchar(444) NOT NULL,
  `w_name` varchar(444) NOT NULL,
  `price` varchar(444) NOT NULL,
  `image` varchar(444) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_library`
--

INSERT INTO `tbl_library` (`id`, `b_name`, `b_type`, `w_name`, `price`, `image`) VALUES
(27, 'Devdash Upponash', 'st', 'SorotChandra Chottopadhay', '250', 'upload/book_upload/.1c264440eb.jpg'),
(28, 'Pother Pachali', 'st', 'Bivuttivusion Roy', '230', 'upload/book_upload/.8bf0f80978.jpg'),
(29, 'Akatorer Dinguli', 'ot', 'Jahanara Imam', '500', 'upload/book_upload/.25b91449bd.jpg'),
(30, 'Akatorer Chithi', 'ot', 'Unknown', '230', 'upload/book_upload/.d9f7b54d6a.jpg'),
(31, 'Meku Kahini', 's', 'Jafor Eqbal', '320', 'upload/book_upload/.45a9c4c419.jpg'),
(32, 'Jolo Manob', 's', 'Jafar Iqbal', '120', 'upload/book_upload/.bb504ba5d4.jpg'),
(33, 'Java Programming', 'cmt', 'Muqter Rahaman', '320', 'upload/book_upload/.3d6bab315a.jpg'),
(34, 'C++ Programming', 'cmt', 'Herbent', '520', 'upload/book_upload/.8b89015877.jpg'),
(35, 'C Programming', 'cmt', 'Mahabub Rahaman', '300', 'upload/book_upload/.a990133267.jpg'),
(36, 'Coocking Book', 'f', 'yesmin Akther', '210', 'upload/book_upload/.1c449ca508.jpg'),
(37, 'Food Analysis', 'f', 'Javed Omar', '320', 'upload/book_upload/.bbc947e8f6.jpg'),
(38, 'Food Chemistry', 'f', 'Imam Hasan', '120', 'upload/book_upload/.134aefc553.jpg'),
(39, 'Construction Decumentation and Professional Practise', 'ai', 'Mahabuber Rahaman', '230', 'upload/book_upload/.555a3527fe.jpg'),
(40, 'Landscape Design', 'ai', 'Masud Hasan', '410', 'upload/book_upload/.dc34d59cc1.jpg'),
(41, 'Model Making', 'ai', 'Subbroto Roy', '320', 'upload/book_upload/.7efefc847f.jpg'),
(42, 'Rac Project', 'rac', 'Rahaman Islam', '240', 'upload/book_upload/.ae30a03c6d.jpg'),
(43, 'Rac Plant Operation', 'rac', 'Robin Roy', '250', 'upload/book_upload/.dfd0570a91.jpg'),
(44, 'Rac Circuits and Controls-11', 'rac', 'Sofiqul Islam', '420', 'upload/book_upload/.768c2d1f2f.jpg'),
(45, 'Macatronix Project', 'mac', 'Muqter Rahaman', '240', 'upload/book_upload/.8d2ac2b659.jpg'),
(46, 'Macatronix Analysis', 'mac', 'Herbent', '320', 'upload/book_upload/.1426865bad.jpg'),
(47, 'Electrical cicuit and Machine', 'et', 'Javed Omar', '320', 'upload/book_upload/.a4e8bf08d7.jpg'),
(48, 'Digital Elecronix', 'et', 'Najmul Islam', '230', 'upload/book_upload/.86d1adce12.jpg'),
(49, 'Industrial Electronix', 'et', 'Rezaual Islam', '230', 'upload/book_upload/.61e7a6f1c4.jpg'),
(50, 'CCNA Book', 'nt', 'Ali Ajom', '650', 'upload/book_upload/.eca21fb62d.jpg'),
(51, 'Data Cumminication and Computer Networking', 'nt', 'Najmul Islam', '320', 'upload/book_upload/.89a76776f7.jpg'),
(52, 'Computer Network', 'nt', 'Herbent', '230', 'upload/book_upload/.0e59308791.jpg'),
(53, 'Sekh Mujibur Rahaman', 'tr', 'Ali Ajom', '850', 'upload/book_upload/.5625c7e712.gif'),
(54, 'Discrete Mathematics', 'mt', 'Muqter Rahaman', '320', 'upload/book_upload/.eb864ffe0e.jpg'),
(55, 'Mathematics', 'mt', 'Najmul Islam', '230', 'upload/book_upload/.ee81b987ec.gif'),
(56, 'Medical Resarch', 'md', 'Javed Omar', '2,500', 'upload/book_upload/.de0fec6165.jpg'),
(57, 'Medical Analysis', 'md', 'Mahabub Rahaman', '320', 'upload/book_upload/.7f33db48cf.jpg'),
(58, 'Microprocessor and Microcomputer', 'cmt', 'Javed Omar', '230', 'upload/book_upload/.6d1e092ec2.jpg'),
(59, 'Embeded Systems and PLC', 'cmt', 'Sofiqul Islam', '320', 'upload/book_upload/.e37ca61b2a.jpg'),
(60, 'Computer System Software', 'cmt', 'Najmul Islam', '230', 'upload/book_upload/.395d196236.jpg'),
(61, 'Data Structure', 'cmt', 'Muqter Rahaman', '320', 'upload/book_upload/.b01af9ec06.jpg'),
(62, 'Computer Enginerring Project', 'cmt', 'Mahabub Rahaman', '320', 'upload/book_upload/.93208b4ed4.jpg'),
(63, 'Computer Peripheral', 'cmt', 'Muqter Rahaman', '320', 'upload/book_upload/.856e034017.jpg'),
(64, 'Metsis', 's', 'Jafar Iqbal', '320', 'upload/book_upload/.8aec8365fc.jpg'),
(65, 'Pree', 's', 'Jafar Iqbal', '230', 'upload/book_upload/.4a3867c100.jpg'),
(66, 'Ruposhi Bangla', 'st', 'JoshimUddin Ahammed', '230', 'upload/book_upload/.ed3bafb10b.jpg'),
(67, 'Nokhshi Kothar Math', 'st', 'JoshimUddin Ahammed', '230', 'upload/book_upload/.ead2e5afcd.gif'),
(68, 'Himu', 'st', 'Hymayan Ahammed', '230', 'upload/book_upload/.6fb7f8e091.jpg'),
(69, 'Shapmochan', 'st', 'Fulguni Mukhopaddy', '320', 'upload/book_upload/.7ee4a9c02c.jpg'),
(70, 'Crugue', 's', 'Jafar Iqbal', '320', 'upload/book_upload/.b77a2ce50c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_result`
--

CREATE TABLE `tbl_result` (
  `id` int(11) NOT NULL,
  `roll` int(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `shift` varchar(20) NOT NULL,
  `sub_name` varchar(20) NOT NULL,
  `sub_code` int(20) NOT NULL,
  `tc` int(20) NOT NULL,
  `tf` int(20) NOT NULL,
  `pc` int(20) NOT NULL,
  `pf` int(20) NOT NULL,
  `total` int(20) NOT NULL,
  `gpa` float NOT NULL,
  `letter` varchar(20) NOT NULL,
  `cgpa` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_result`
--

INSERT INTO `tbl_result` (`id`, `roll`, `dept`, `semester`, `shift`, `sub_name`, `sub_code`, `tc`, `tf`, `pc`, `pf`, `total`, `gpa`, `letter`, `cgpa`) VALUES
(1, 900124, 'computer', 'first', 'first', 'Physics-1', 65912, 50, 80, 20, 20, 170, 4, 'A+', 0),
(2, 900124, 'computer', 'first', 'first', 'Physics-1', 65912, 50, 80, 20, 20, 170, 4, 'A+', 0),
(3, 900125, 'computer', 'first', 'first', 'Physics-1', 65912, 50, 85, 20, 20, 175, 4, 'A+', 0),
(4, 900126, 'computer', 'first', 'first', 'Physics-1', 65912, 55, 85, 20, 20, 180, 4, 'A+', 0),
(5, 900124, 'computer', 'first', 'first', 'Physics-1', 65912, 20, 20, 20, 20, 80, 0, 'F', 0),
(6, 900125, 'computer', 'first', 'first', 'Physics-1', 65912, 20, 20, 20, 20, 80, 0, 'F', 0),
(7, 900126, 'computer', 'first', 'first', 'Physics-1', 65912, 20, 20, 20, 20, 80, 0, 'F', 0),
(8, 900124, 'computer', 'first', 'first', 'Mathmatics-1', 65911, 50, 80, 44, 0, 174, 4, 'A+', 0),
(9, 900125, 'computer', 'first', 'first', 'Mathmatics-1', 65911, 50, 85, 20, 0, 155, 3.75, 'A', 0),
(10, 900126, 'computer', 'first', 'first', 'Mathmatics-1', 65911, 20, 85, 20, 0, 125, 3, 'B', 0),
(11, 0, 'computer', 'first', 'first', 'Physics-1', 65912, 50, 80, 20, 20, 170, 4, 'A+', 0),
(12, 0, 'computer', 'first', 'first', 'Physics-1', 65912, 50, 85, 20, 20, 175, 4, 'A+', 0),
(13, 0, 'computer', 'first', 'first', 'Physics-1', 65912, 55, 85, 20, 20, 180, 4, 'A+', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `shift` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `birth_date` varchar(255) NOT NULL,
  `pre_vill` varchar(255) NOT NULL,
  `pre_post` varchar(255) NOT NULL,
  `pre_thana` varchar(255) NOT NULL,
  `pre_dist` varchar(255) NOT NULL,
  `par_vill` varchar(255) NOT NULL,
  `par_post` varchar(255) NOT NULL,
  `par_thana` varchar(255) NOT NULL,
  `par_dist` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `phone` int(20) NOT NULL,
  `session` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `roll`, `reg`, `dept`, `semester`, `shift`, `f_name`, `m_name`, `birth_date`, `pre_vill`, `pre_post`, `pre_thana`, `pre_dist`, `par_vill`, `par_post`, `par_thana`, `par_dist`, `religion`, `phone`, `session`, `email`, `image`) VALUES
(30, 'Chayan roy', 700276, 669797, 'computer', 'seventh', 'first', 'Dhananjoy roy', 'Sumita roy', '04-04-1998', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'Dhakshin chowra', 'Vangamalli hat', 'NIlphamari', 'NIlphamari', 'Sonatan', 1780642054, '2013-2014', 'chayanroycmt50@gmail.com', 'upload/52ee6730b4.jpg'),
(31, 'Utpal Roy', 700275, 669798, 'computer', 'seventh', 'first', 'Debendronath roy', 'Dalim rani roy', '26-04-2017', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'Susuli ', 'Joyganj', 'Khansama', 'Dinajpur', 'Sonatan', 1779914060, '2013-2014', 'utpalroycmt@gmail.com', 'upload/a8fc7f41ef.jpg'),
(32, 'Sushil Roy', 700269, 669702, 'computer', 'seventh', 'first', 'Birendra nath roy ', 'Shova rani roy', '07-12-1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'Hazradanga ', 'Bagdaho', 'Debigonj', 'Panchagarh', 'Sonatan', 1797632806, '2013-2014', 'sushilroycmt@gmail.com', 'upload/7fe77f219b.jpg'),
(33, 'Dhruba roy', 700265, 669765, 'computer', 'seventh', 'first', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'Panchagarh', 'Sonatan', 1796764894, '2013-2014', 'dhrubacmt@gmail.com', 'upload/05d7e2da2f.jpg'),
(34, 'Sulekha rani', 700305, 668754, 'computer', 'seventh', 'second', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/80709cdad8.jpg'),
(35, 'Nipa rani roy', 700340, 545154, 'computer', 'seventh', 'second', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/656525e0cc.jpg'),
(36, 'Mehedi islam', 700348, 546254, 'computer', 'seventh', 'second', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1796764894, '2013-2014', '', 'upload/70c8b4833b.jpg'),
(37, 'Firoz alom', 700648, 586325, 'computer', 'seventh', 'second', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/e16d3dede6.jpg'),
(38, 'Polash roy', 700364, 547825, 'aidt', 'seventh', 'first', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/d1b47cdf72.jpg'),
(39, 'Saifur rahman', 700861, 945757, 'aidt', 'seventh', 'first', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/c07ab549b7.jpg'),
(40, 'Al amin islam', 700345, 181545, 'aidt', 'seventh', 'first', 'unknown', 'unknown', '10/12/1997', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1779914060, '2013-2014', '', 'upload/89da6c9a68.jpg'),
(41, 'Shahin islam', 457812, 154782, 'aidt', 'seventh', 'first', 'unknown', 'unknown', '10/12/1997', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1796764894, '2013-2014', '', 'upload/440f0e09c6.jpg'),
(42, 'Amal roy', 124587, 215454, 'aidt', 'seventh', 'second', 'unknown', 'unknown', '04-04-1998', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/a9b9aff9ed.jpg'),
(43, 'Sattish roy', 124531, 321652, 'aidt', 'seventh', 'second', 'unknown', 'unknown', '10/12/1997', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'asdf', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/2fd8bbc9b5.jpg'),
(44, 'Nasim islam', 369526, 312564, 'aidt', 'seventh', 'second', 'unknown', 'unknown', '04-04-1998', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1779914060, '2013-2014', '', 'upload/3b4992498e.jpg'),
(45, 'Akbar ali', 698752, 315462, 'aidt', 'seventh', 'second', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1779914060, '2013-2014', '', 'upload/4c2110a7f1.jpg'),
(46, 'Rahim islam', 321589, 315421, 'food', 'seventh', 'first', 'unknown', 'unknown', '04-04-1998', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1796764894, '2013-2014', '', 'upload/c6e0d47cc1.jpg'),
(47, 'Al amin islam', 321973, 329762, 'food', 'seventh', 'first', 'unknown', 'unknown', '04-04-1998', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1796764894, '2013-2014', '', 'upload/404e55fffb.jpg'),
(48, 'Polash roy', 312654, 524165, 'food', 'seventh', 'first', 'unknown', 'unknown', '04-04-1998', 'unknown', 'unknown', 'unknown', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/ceb26c6bc1.jpg'),
(49, 'Bhoirobi roy', 125342, 382542, 'food', 'seventh', 'first', 'unknown', 'unknown', '07-12-1997', 'Posishod para', 'thakurgaon', 'asdf', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/42fa4436a2.jpg'),
(50, 'Piya roy', 553453, 442224, 'food', 'seventh', 'first', 'unknown', 'unknown', '07-12-1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/ba3a90c1c5.jpg'),
(51, 'Brozen roy', 465505, 538423, 'food', 'seventh', 'second', 'unknown', 'unknown', '04-04-1998', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1779914060, '2013-2014', '', 'upload/015e148946.jpg'),
(52, 'Urmila khan', 321694, 652387, 'food', 'seventh', 'second', 'unknown', 'unknown', '04-04-1998', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1796764894, '2013-2014', '', 'upload/42de29b5f2.jpg'),
(53, 'Zerin khan', 213642, 326548, 'food', 'seventh', 'second', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/323b6e560d.jpg'),
(54, 'Shahin islam', 542145, 231645, 'rac', 'seventh', 'second', 'unknown', 'unknown', '04-04-1998', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/bedd3cf6c3.jpg'),
(55, 'Madhobi lata', 453232, 636352, 'rac', 'seventh', 'first', 'unknown', 'unknown', '04-04-1998', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/65c80c742f.jpg'),
(56, 'Pran islam', 251431, 504240, 'rac', 'seventh', 'first', 'unknown', 'unknown', '04-04-1998', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/f016ed76f8.jpg'),
(57, 'Ahmmad islam', 324452, 524530, 'rac', 'seventh', 'first', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1779914060, '2013-2014', '', 'upload/d6620959e8.jpg'),
(58, 'Sharif islam', 789365, 215364, 'rac', 'seventh', 'first', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1796764894, '2013-2014', '', 'upload/913213e9fa.jpg'),
(59, 'Utpal Roy', 213541, 398712, 'rac', 'seventh', 'first', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/b52385ffde.jpg'),
(60, 'Utpal Chandraw Roy', 452338, 521352, 'rac', 'seventh', 'second', 'unknown', 'unknown', '04-04-1998', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/e182552185.jpg'),
(61, 'Satyen roy', 523145, 231456, 'mecha', 'first', 'first', 'unknown', 'unknown', '10/12/1997', 'Posishod para', 'thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonatan', 1796764894, '2013-2014', '', 'upload/3e3f1b2fea.jpg'),
(63, 'Bithi rani', 900124, 158575, 'computer', 'first', 'first', 'unknown', 'unknown', '10-07-1995', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642056, '2016-2017', '', 'upload/21761f9c67.jpg'),
(64, 'Payel Das', 900269, 645245, 'computer', 'first', 'first', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/3e85cff034.jpg'),
(65, 'Shahin islam', 900126, 587452, 'computer', 'first', 'first', 'unknown', 'unknown', '10-07-1995', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/b8a25ce8d9.jpg'),
(66, 'Sobuj ali', 100180, 654125, 'computer', 'first', 'second', 'unknown', 'unknown', '10-07-1995', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/506afab0c9.jpg'),
(67, 'Chayan roy', 100181, 123457, 'computer', 'first', 'second', 'unknown', 'unknown', '10-07-1995', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/0fa53f5d2a.jpg'),
(68, 'Sumaiya soma', 100182, 147852, 'computer', 'first', 'second', 'unknown', 'unknown', '10-07-1995', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/a06a450321.jpg'),
(69, 'Bimola rani', 100183, 147217, 'computer', 'first', 'second', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/350f1a4ff1.jpg'),
(70, 'Sontosh roy', 200124, 145278, 'aidt', 'first', 'first', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/e3914213c3.jpg'),
(71, 'Amal roy', 200125, 512478, 'aidt', 'first', 'first', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/0fd04242cb.jpg'),
(72, 'Ariful islam', 200126, 124563, 'aidt', 'first', 'first', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/a73cfb979d.jpg'),
(73, 'Privacy Document', 200127, 256314, 'aidt', 'first', 'first', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'privacy', 1780642054, '2016-2017', '', 'upload/daf23ed68e.jpg'),
(74, 'Borun roy', 200190, 127454, 'aidt', 'first', 'second', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/c247d163a2.jpg'),
(75, 'Nur islam ', 200191, 123654, 'aidt', 'first', 'second', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/c509b31a12.jpg'),
(76, 'Biplop rahman', 200292, 147856, 'aidt', 'first', 'second', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/2458d7972f.jpg'),
(77, 'Suman roy', 200193, 125412, 'aidt', 'first', 'first', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/ea6e9b9fae.jpg'),
(78, 'Azizul islam', 200195, 125431, 'aidt', 'first', 'second', 'unknown', 'unknown', '10-07-1998', 'Gobindo Nagar', 'Gobindo Nagar', 'Thakurgaon', 'Thakurgaon', 'Unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/3277ca3d8b.jpg'),
(79, 'Sushil roy', 200393, 123547, 'food', 'first', 'first', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/eb7e720f25.jpg'),
(80, 'Amit roy', 200295, 254136, 'food', 'first', 'first', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/4992728ffb.jpg'),
(89, 'Konika rani roy', 100185, 102214, 'computer', 'first', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/961e6409e2.jpg'),
(90, 'Tumpa roy', 100186, 205483, 'computer', 'first', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/1dfa0675c6.jpg'),
(91, 'Punom rani roy', 100187, 104411, 'computer', 'first', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/326a9ed511.jpg'),
(92, 'kishor kumar', 100189, 215452, 'computer', 'first', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/1531b7a8ad.jpg'),
(93, 'Joydev roy', 100190, 210221, 'computer', 'first', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/dfa00c4a26.jpg'),
(94, 'Safi islam', 100191, 215412, 'computer', 'first', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/c45fe320eb.jpg'),
(95, 'Mohadev roy', 400200, 102255, 'computer', 'second', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/13558963af.jpg'),
(96, 'Saju khadem', 400201, 124500, 'computer', 'second', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/637b2d3cf4.jpg'),
(97, 'Rozina akhter', 400261, 221100, 'computer', 'second', 'first', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/319abafcf0.jpg'),
(98, 'Swadip roy', 500120, 221570, 'computer', 'fourth', 'first', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/53c8d011fe.jpg'),
(99, 'Nirmol roy', 500121, 210031, 'computer', 'fourth', 'first', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/0d9557cfa7.jpg'),
(100, 'Sourov roy', 500150, 231212, 'computer', 'fourth', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2016-2017', '', 'upload/0780db6e9d.jpg'),
(101, 'Moni akhter', 500152, 212121, 'computer', 'fourth', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/1a157499f5.jpg'),
(102, 'Parvez islam', 600120, 210369, 'computer', 'sixth', 'first', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2016-2017', '', 'upload/c17073b92b.jpg'),
(103, 'Jelin Begum', 600121, 321025, 'computer', 'sixth', 'first', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Islam', 1780642054, '2014-2015', '', 'upload/dfd44d24e8.jpg'),
(104, 'Payel Roy', 600150, 201035, 'computer', 'sixth', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2014-2015', '', 'upload/e97499001e.jpg'),
(105, 'Arun roy', 600152, 369874, 'computer', 'fifth', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2014-2015', '', 'upload/99a94b3b07.jpg'),
(106, 'Nilima roy', 600158, 205874, 'computer', 'sixth', 'second', 'unknown', 'unknown', '04-04-1998', 'GobindoNagor', 'Thakurgaon', 'Thakurgaon', 'Thakurgaon', 'unknown', 'unknown', 'unknown', 'unknown', 'Sonaton', 1780642054, '2014-2015', '', 'upload/77ad93b4be.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `sub_name` varchar(255) NOT NULL,
  `sub_code` int(4) NOT NULL,
  `dept` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `tc` varchar(5) NOT NULL,
  `tf` varchar(5) NOT NULL,
  `pc` varchar(5) NOT NULL,
  `pf` varchar(5) NOT NULL,
  `total` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `sub_name`, `sub_code`, `dept`, `semester`, `tc`, `tf`, `pc`, `pf`, `total`) VALUES
(20, 'Embedded System & Programable Logic Control ', 6666, 'computer', 'seventh', '', '', '', '', ''),
(21, 'Multimedia and Graphics', 8572, 'computer', 'seventh', '', '', '', '', ''),
(24, 'System Analysis and design  and devlopment', 6672, 'computer', 'seventh', '', '', '', '', ''),
(29, 'Data communication and network -2', 6673, 'computer', 'seventh', '', '', '', '', ''),
(30, 'Computer Engineering Project', 6674, 'computer', 'seventh', '', '', '', '', ''),
(31, 'Industrial managment ', 5852, 'computer', 'seventh', '', '', '', '', ''),
(32, 'Entrepreneurship', 5853, 'computer', 'seventh', '', '', '', '', ''),
(33, 'Microprocessor and microcomputer -2', 6661, 'computer', 'six', '', '', '', '', ''),
(34, 'Computer peripherals', 6662, 'computer', 'six', '', '', '', '', ''),
(35, 'Data communication and network -1', 6663, 'computer', 'six', '', '', '', '', ''),
(36, 'Computer system software', 6664, 'computer', 'six', '', '', '', '', ''),
(37, 'Computer servicing', 6665, 'computer', 'six', '', '', '', '', ''),
(38, 'Web devlopment', 8563, 'computer', 'six', '', '', '', '', ''),
(39, 'Business organization & communication', 5841, 'computer', 'six', '', '', '', '', ''),
(41, 'Microprocessor and microcomputer -1', 6651, 'computer', 'five', '', '', '', '', ''),
(42, 'Computer Architecture', 6652, 'computer', 'five', '', '', '', '', ''),
(43, 'Programing Language-3', 6653, 'computer', 'five', '', '', '', '', ''),
(44, 'Databaser Management system', 6654, 'computer', 'five', '', '', '', '', ''),
(45, 'Web design', 8551, 'computer', 'five', '', '', '', '', ''),
(46, 'Book Keeping & Accounting', 5851, 'computer', 'five', '', '', '', '', ''),
(47, 'Environmental Management', 5854, 'computer', 'five', '', '', '', '', ''),
(48, 'Inteior Design', 8771, 'aidt', 'seventh', '', '', '', '', ''),
(49, 'Furniture design and drowing', 8772, 'aidt', 'seventh', '', '', '', '', ''),
(50, 'Construction  documentation and professional practice', 8773, 'aidt', 'seventh', '', '', '', '', ''),
(51, 'Landscpae design', 6165, 'aidt', 'seventh', '', '', '', '', ''),
(52, 'Interior project', 8774, 'aidt', 'seventh', '', '', '', '', ''),
(53, 'Environmental Engineering -1', 6453, 'aidt', 'seventh', '', '', '', '', ''),
(54, 'Design of structure-1', 6463, 'aidt', 'seventh', '', '', '', '', ''),
(55, 'Entrepreneurship', 5853, 'aidt', 'seventh', '', '', '', '', ''),
(56, 'Food Microbilogy', 6941, 'food', 'four', '', '', '', '', ''),
(57, 'Applied Nutrition', 6942, 'food', 'four', '', '', '', '', ''),
(58, 'Electrical circuits and machines', 6745, 'food', 'four', '', '', '', '', ''),
(59, 'Industrial electronics', 6832, 'food', 'four', '', '', '', '', ''),
(60, 'Social science-2', 5821, 'food', 'four', '', '', '', '', ''),
(61, 'Machine shop practice', 5841, 'food', 'four', '', '', '', '', ''),
(62, 'Business organization & communication', 5841, 'food', 'four', '', '', '', '', ''),
(63, 'Advanced refrigeration and air condition', 7261, 'rac', 'six', '', '', '', '', ''),
(64, 'RAC circuits and controlls-2', 7262, 'rac', 'six', '', '', '', '', ''),
(65, 'RAC plant Operation', 7263, 'rac', 'six', '', '', '', '', ''),
(66, 'Low temperature refrigeration', 7264, 'rac', 'six', '', '', '', '', ''),
(67, 'Fluid Mechanics and machaneries', 7165, 'rac', 'six', '', '', '', '', ''),
(68, 'Environmental Management', 5840, 'rac', 'six', '', '', '', '', ''),
(69, 'Industrial managment', 5852, 'rac', 'six', '', '', '', '', ''),
(70, 'Food Engineering Operation-2', 6971, 'food', 'seventh', '', '', '', '', ''),
(71, 'Food process Industries-2', 6972, 'food', 'seventh', '', '', '', '', ''),
(72, 'Food Quality control', 6973, 'food', 'seventh', '', '', '', '', ''),
(73, 'Bakeri and confectionary products', 6974, 'food', 'seventh', '', '', '', '', ''),
(74, 'Food analysis', 6975, 'food', 'seventh', '', '', '', '', ''),
(75, 'Food Engineering project', 6976, 'food', 'seventh', '', '', '', '', ''),
(77, 'Rac system analysis', 7271, 'rac', 'seventh', '', '', '', '', ''),
(78, 'Rac project', 7272, 'rac', 'seventh', '', '', '', '', ''),
(79, 'Trouble Shooting of Rac Equipment', 7273, 'rac', 'seventh', '', '', '', '', ''),
(80, 'Transport Refrigeration and Air conditioning', 7274, 'rac', 'seventh', '', '', '', '', ''),
(81, 'Commercial and industrial air conditioning', 7275, 'rac', 'seventh', '', '', '', '', ''),
(82, 'Installtion of rac plants', 7276, 'rac', 'seventh', '', '', '', '', ''),
(83, 'Entrepreneurship', 5853, 'rac', 'seventh', '', '', '', '', ''),
(84, 'Programing Language-2', 6642, 'computer', 'four', '', '', '', '', ''),
(85, 'CAD and graphics design', 6645, 'computer', 'four', '', '', '', '', ''),
(86, 'Digital Electronics -2', 6844, 'computer', 'four', '', '', '', '', ''),
(87, 'Data Structure and algorithm', 6631, 'computer', 'four', '', '', '', '', ''),
(88, 'Electrical circuits and machines', 6745, 'computer', 'four', '', '', '', '', ''),
(89, 'Discreate mathmetics', 5942, 'computer', 'four', '', '', '', '', ''),
(90, 'Social science-2', 5821, 'computer', 'four', '', '', '', '', ''),
(91, 'Inteior Design-1', 8741, 'aidt', 'four', '', '', '', '', ''),
(92, 'Computer aidied drafting', 8742, 'aidt', 'four', '', '', '', '', ''),
(93, 'Estimating and coasiting', 6442, 'aidt', 'four', '', '', '', '', ''),
(94, 'Serveying-1', 6432, 'aidt', 'four', '', '', '', '', ''),
(95, 'Contruction process-1', 6444, 'aidt', 'four', '', '', '', '', ''),
(96, 'Social science-2', 5821, 'aidt', 'four', '', '', '', '', ''),
(97, 'Business organization & communication', 5841, 'aidt', 'four', '', '', '', '', ''),
(98, 'Inteior Design-2', 8751, 'aidt', 'five', '', '', '', '', ''),
(99, 'CAD and digital visualization ', 8752, 'aidt', 'five', '', '', '', '', ''),
(100, 'Serveying-2', 6443, 'aidt', 'five', '', '', '', '', ''),
(101, 'Structural mechanix ', 6433, 'aidt', 'five', '', '', '', '', ''),
(102, 'Contruction process-2', 6455, 'aidt', 'five', '', '', '', '', ''),
(103, 'Geo technical engineering', 6441, 'aidt', 'five', '', '', '', '', ''),
(104, 'Book Keeping & Accounting', 5851, 'aidt', 'five', '', '', '', '', ''),
(105, 'Inteior Design-3', 8761, 'aidt', 'six', '', '', '', '', ''),
(106, 'History Of Architecture and intories desgin', 8762, 'aidt', 'six', '', '', '', '', ''),
(107, 'Detailing and fit- outs ', 8763, 'aidt', 'six', '', '', '', '', ''),
(108, 'Theory Of Structure', 6454, 'aidt', 'six', '', '', '', '', ''),
(109, 'Model Making', 6166, 'aidt', 'six', '', '', '', '', ''),
(110, 'Environmental Management', 5840, 'aidt', 'six', '', '', '', '', ''),
(111, 'Industrial managment', 5852, 'aidt', 'six', '', '', '', '', ''),
(112, 'Entrepreneurship', 5853, 'food', 'seventh', '', '', '', '', ''),
(113, 'Food Peservation ', 6951, 'food', 'five', '', '', '', '', ''),
(114, 'Food Chemistry', 6952, 'food', 'five', '', '', '', '', ''),
(115, 'Food pakaging', 6953, 'food', 'five', '', '', '', '', ''),
(116, 'Industrial Chemistry', 6354, 'food', 'five', '', '', '', '', ''),
(117, 'Engineering Mechanics', 7142, 'food', 'five', '', '', '', '', ''),
(118, 'Refregaration and cold storage', 6355, 'food', 'five', '', '', '', '', ''),
(119, 'Book Keeping & Accounting', 5851, 'food', 'five', '', '', '', '', ''),
(120, 'Food Engineering Operation-1', 6961, 'food', 'six', '', '', '', '', ''),
(121, 'Food process Industries-1', 6962, 'food', 'six', '', '', '', '', ''),
(122, 'Industrial instrumentaion and process control', 6363, 'food', 'six', '', '', '', '', ''),
(123, 'Industrial Stoichiometry and thermodinamics', 6364, 'food', 'six', '', '', '', '', ''),
(124, 'Intrumental method of analysis', 6365, 'food', 'six', '', '', '', '', ''),
(125, 'Environmental Management', 5840, 'food', 'six', '', '', '', '', ''),
(126, 'Industrial managment', 5852, 'food', 'six', '', '', '', '', ''),
(127, 'Domestic Refrigeration and air conditioning ', 7241, 'rac', 'four', '', '', '', '', ''),
(128, 'Automotive Engines and their Systems ', 7242, 'rac', 'four', '', '', '', '', ''),
(129, 'Engineering Thermodynamics', 7131, 'rac', 'four', '', '', '', '', ''),
(130, 'Cooling and Heating load calculation ', 7243, 'rac', 'four', '', '', '', '', ''),
(131, 'General Electricity', 6734, 'rac', 'four', '', '', '', '', ''),
(132, 'Social science-2', 5821, 'rac', 'four', '', '', '', '', ''),
(133, 'Business organization & communication', 5841, 'rac', 'four', '', '', '', '', ''),
(134, 'Electrical Machines in RAC', 7251, 'rac', 'five', '', '', '', '', ''),
(135, 'RAC circuits and controlls-1', 7252, 'rac', 'five', '', '', '', '', ''),
(136, 'Pipeing and duct works ', 7253, 'rac', 'five', '', '', '', '', ''),
(137, 'Commercial and industrial refregatation ', 7254, 'rac', 'five', '', '', '', '', ''),
(138, 'Maintenance of RAC equipment ', 7255, 'rac', 'five', '', '', '', '', ''),
(139, 'Engineering Mechanics', 7142, 'rac', 'five', '', '', '', '', ''),
(140, 'Book Keeping & Accounting', 5851, 'rac', 'five', '', '', '', '', ''),
(141, 'Computer Applicatioin ', 66611, 'computer', 'first', '', '', '50', '50', '100'),
(142, 'Computer Lab Practice ', 66612, 'computer', 'first', '0', '0', '50', '50', '100'),
(143, 'Electrical Engineering Fundamental ', 66712, 'computer', 'first', '60', '90', '25', '25', '200'),
(144, 'Mathmatics-1', 65911, 'computer', 'first', '60', '90', '50', '0', '200'),
(145, 'Physics-1', 65912, 'computer', 'first', '60', '90', '25', '25', '200'),
(146, 'English -1', 65712, 'computer', 'first', '40', '60', '0', '0', '100'),
(147, 'Bangla -1', 65711, 'computer', 'first', '60', '90', '50', '0', '200');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `password`, `status`) VALUES
(16, 'admin', 'chayanroycmt50@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(26, 'Utpal roy', 'utpalroy@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` int(5) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `joining_date` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `date_of_birth` varchar(50) NOT NULL,
  `status` int(255) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teacher_id`, `teacher_name`, `department`, `joining_date`, `designation`, `date_of_birth`, `status`, `image`) VALUES
(1, 123, 'sofiq islam', 'computer', '1914-4-3', 'jonior instractor', '1914-3-4', 2, 'upload/28e68d5ebf.jpg'),
(2, 5, 'alomgir Alom', 'computer', '2-4-1947', 'instractor', '4-4-1962', 1, 'upload/516d361027.jpg'),
(4, 12315, 'Bikash roy', 'computer', '14-02-2010', 'juniour instractor', '12-04-1992', 0, 'upload/8073feaa0c.jpg'),
(5, 55665, 'Foysal Ahmed', 'rac', '14-02-2010', 'juniour instractor', '12-04-1992', 2, 'upload/445b11a3b3.jpg'),
(6, 1452, 'Arzina Akter', 'rac', '14-02-2010', 'juniour instractor', '12-04-1975', 0, 'upload/3c36a1b82d.jpg'),
(7, 5665, 'Shazahan Alom', 'non-department', '14-02-2010', 'Seniour Teacher', '12-04-1975', 1, 'upload/ad8158c82f.jpg'),
(8, 1231, 'Arif hossain', 'food', '14-02-2010', 'Seniour Teacher', '12-04-1975', 2, 'upload/8b99b2de05.jpg'),
(9, 1235465, 'Shazahan Alom', 'non-department', '14-02-2010', 'Seniour Teacher', '12-04-1992', 0, 'upload/ee171a0cfe.jpg'),
(10, 22, 'Utpal Roy', 'computer', '14-02-2010', 'jharu doua', '12-04-1992', 2, 'upload/ca77cb7cb4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_due_tbl`
--
ALTER TABLE `payment_due_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_payment`
--
ALTER TABLE `student_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attend`
--
ALTER TABLE `tbl_attend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_libcard`
--
ALTER TABLE `tbl_libcard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_library`
--
ALTER TABLE `tbl_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_result`
--
ALTER TABLE `tbl_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payment_due_tbl`
--
ALTER TABLE `payment_due_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student_payment`
--
ALTER TABLE `student_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=638;
--
-- AUTO_INCREMENT for table `tbl_attend`
--
ALTER TABLE `tbl_attend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `tbl_libcard`
--
ALTER TABLE `tbl_libcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_library`
--
ALTER TABLE `tbl_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `tbl_result`
--
ALTER TABLE `tbl_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
