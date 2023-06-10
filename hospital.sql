-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 03:32 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin_01', 'admin01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `doc_username` varchar(15) NOT NULL,
  `specialization` varchar(20) DEFAULT NULL,
  `fees` int(4) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `reason` varchar(50) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `userStatus` int(11) NOT NULL,
  `doctorStatus` int(11) NOT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_id`, `username`, `doc_username`, `specialization`, `fees`, `date`, `time`, `reason`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(12, 'Sufiyan09', 'rehan@850', 'Surgeon', 300, '2023-02-26', '10,10.30', 'Surgeon', '2023-02-24 13:44:50', 1, 0, '2023-02-26 10:12:39'),
(13, 'Sufiyan09', 'shaun@123', 'E.N.T', 400, '2023-02-28', '11,12', 'Pain in throat.', '2023-02-24 13:52:57', 1, 2, '2023-02-26 10:17:48'),
(14, 'Sufiyan09', 'ramesh01', 'Cardiologist', 250, '2023-03-06', '10.30,11', '', '2023-02-24 14:48:37', 0, 1, '2023-02-24 15:01:32'),
(15, 'Sufiyan09', 'shaun@123', 'E.N.T', 420, '2023-03-10', '11,12', '', '2023-02-26 09:27:06', 1, 0, '2023-02-26 09:44:27'),
(16, 'doraemon_1', 'ramesh01', 'Cardiologist', 250, '2023-02-28', '10,10.30', 'Fat Loss', '2023-02-26 18:22:20', 1, 2, '2023-02-26 18:50:53'),
(17, 'Sufiyan09', 'rehan@850', 'Surgeon', 300, '2023-03-02', '10.30,11', 'surgery', '2023-02-28 08:17:46', 1, 2, '2023-03-01 15:46:57'),
(18, 'Sufiyan09', 'shaun@123', 'E.N.T', 420, '2023-03-04', '10.30,11', 'ent', '2023-02-28 08:18:30', 1, 2, '2023-02-28 08:19:22'),
(19, 'Sufiyan09', 'hitesh_90', 'Urologist', 250, '2023-03-09', '10.30,11', 'Pain in Stomach. I think i have pain in digestion.', '2023-03-01 12:55:18', 0, 1, '2023-03-03 11:10:43'),
(20, 'uvesh9824', 'shaun@123', 'E.N.T', 420, '2023-03-09', '11,12', 'Pain in Ear', '2023-03-01 15:30:17', 1, 2, '2023-03-01 15:54:56'),
(21, 'ajendra_singh_8', 'rehan@850', 'Surgeon', 320, '2023-03-03', '10.30,11', 'Plastic Surgery', '2023-03-01 15:31:59', 1, 2, '2023-03-01 15:46:57'),
(22, 'Sufiyan09', 'hitesh_90', 'Urologist', 250, '2023-03-10', '10.30,11', 'Pain', '2023-03-01 18:45:48', 0, 1, '2023-03-03 11:10:43'),
(23, 'raviraj_75', 'shaun@123', 'E.N.T', 420, '2023-03-10', '10.30,11', 'Pain in Nose', '2023-03-01 19:25:18', 1, 1, NULL),
(24, 'Sufiyan09', 'meet_gohel_12', 'Gynecologist', 550, '2023-03-09', '10.30,11', '', '2023-03-03 11:30:59', 0, 1, '2023-03-03 11:35:07'),
(25, 'Sufiyan09', 'shaun@123', 'E.N.T', 420, '2023-03-05', '10.30,11', 'Unable to Swallow', '2023-03-03 11:32:36', 1, 1, '2023-03-03 11:34:38'),
(26, 'Sufiyan09', 'hitesh_90', 'Urologist', 250, '2023-03-05', '10.30,11', 'Urology', '2023-03-03 14:42:26', 1, 1, NULL),
(27, 'ajendra_singh_8', 'ramesh01', 'Cardiologist', 250, '2023-03-15', '11,12', 'Fat Loss', '2023-03-03 15:33:19', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `app_bet_dates`
-- (See below for the actual view)
--
CREATE TABLE `app_bet_dates` (
`app_id` int(11)
,`username` varchar(15)
,`doc_username` varchar(15)
,`specialization` varchar(20)
,`fees` int(4)
,`date` date
,`time` varchar(10)
,`reason` varchar(50)
,`postingDate` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `app_count`
-- (See below for the actual view)
--
CREATE TABLE `app_count` (
`app_id` int(11)
,`username` varchar(15)
,`doc_username` varchar(15)
,`specialization` varchar(20)
,`fees` int(4)
,`date` date
,`time` varchar(10)
,`reason` varchar(50)
,`postingDate` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `app_patient_cnt`
-- (See below for the actual view)
--
CREATE TABLE `app_patient_cnt` (
`app_id` int(11)
,`username` varchar(15)
,`doc_username` varchar(15)
,`specialization` varchar(20)
,`fees` int(4)
,`date` date
,`time` varchar(10)
,`reason` varchar(50)
,`postingDate` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `app_spec`
-- (See below for the actual view)
--
CREATE TABLE `app_spec` (
`app_id` int(11)
,`username` varchar(15)
,`doc_username` varchar(15)
,`specialization` varchar(20)
,`fees` int(4)
,`date` date
,`time` varchar(10)
,`reason` varchar(50)
,`postingDate` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `app_time`
-- (See below for the actual view)
--
CREATE TABLE `app_time` (
`app_id` int(11)
,`username` varchar(15)
,`doc_username` varchar(15)
,`specialization` varchar(20)
,`fees` int(4)
,`date` date
,`time` varchar(10)
,`reason` varchar(50)
,`postingDate` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctor_city`
-- (See below for the actual view)
--
CREATE TABLE `doctor_city` (
`doctor_id` int(11)
,`fullname` varchar(25)
,`specialization` varchar(20)
,`phonenumber` bigint(11)
,`city` varchar(30)
,`gender` varchar(6)
,`email` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctor_created`
-- (See below for the actual view)
--
CREATE TABLE `doctor_created` (
`Count_doctor_id` bigint(21)
,`fullname` varchar(25)
,`specialization` varchar(20)
,`phonenumber` bigint(11)
,`city` varchar(30)
,`gender` varchar(6)
,`email` varchar(30)
,`created_at` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctor_gender`
-- (See below for the actual view)
--
CREATE TABLE `doctor_gender` (
`doctor_id` int(11)
,`fullname` varchar(25)
,`specialization` varchar(20)
,`phonenumber` bigint(11)
,`city` varchar(30)
,`gender` varchar(6)
,`email` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_log`
--

CREATE TABLE `doctor_log` (
  `doctor_log_id` int(11) NOT NULL,
  `doc_username` varchar(15) NOT NULL,
  `doctor_ip` binary(16) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_out` varchar(255) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_log`
--

INSERT INTO `doctor_log` (`doctor_log_id`, `doc_username`, `doctor_ip`, `log_time`, `log_out`, `status`) VALUES
(1, 'ramesh01', 0x3a3a3100000000000000000000000000, '2023-01-26 12:17:37', NULL, 'active'),
(2, 'ramesh01', 0x3a3a3100000000000000000000000000, '2023-01-26 12:32:33', NULL, 'active'),
(3, 'ramesh01', 0x3a3a3100000000000000000000000000, '2023-01-26 12:45:01', NULL, 'active'),
(4, 'ramesh01', 0x3a3a3100000000000000000000000000, '2023-01-27 14:47:49', NULL, 'active'),
(5, 'ramesh01', 0x3a3a3100000000000000000000000000, '2023-01-27 14:56:03', NULL, 'active'),
(6, 'rehan@850', 0x3a3a3100000000000000000000000000, '2023-01-27 15:54:56', NULL, 'active'),
(7, 'rehan@850', 0x3a3a3100000000000000000000000000, '2023-01-27 16:30:20', '27-01-2023 10:00:59 PM', 'inactive'),
(8, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-22 17:16:26', '22-02-2023 10:46:39 PM', 'inactive'),
(9, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 05:16:38', NULL, 'active'),
(10, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 05:24:59', NULL, 'active'),
(11, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 05:27:54', NULL, 'active'),
(12, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 05:37:21', NULL, 'active'),
(13, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 05:52:58', NULL, 'active'),
(14, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 07:11:20', NULL, 'active'),
(15, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 08:27:41', NULL, 'active'),
(16, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 08:29:54', NULL, 'active'),
(17, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 09:09:25', NULL, 'active'),
(18, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 09:47:28', NULL, 'active'),
(19, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 10:09:02', NULL, 'active'),
(20, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 14:42:22', NULL, 'active'),
(21, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 15:23:51', NULL, 'active'),
(22, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 15:34:37', NULL, 'active'),
(23, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-25 15:51:28', NULL, 'active'),
(24, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 05:32:57', NULL, 'active'),
(25, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 05:59:54', NULL, 'active'),
(26, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 08:43:21', NULL, 'active'),
(27, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 08:51:55', NULL, 'active'),
(28, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 08:58:14', NULL, 'active'),
(29, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 09:28:04', NULL, 'active'),
(30, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 09:29:43', NULL, 'active'),
(31, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 09:58:43', NULL, 'active'),
(32, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 10:02:34', NULL, 'active'),
(33, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 10:17:34', NULL, 'active'),
(34, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 10:46:19', NULL, 'active'),
(35, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 11:08:18', NULL, 'active'),
(36, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-26 17:48:18', NULL, 'active'),
(37, 'ramesh01', 0x3a3a3100000000000000000000000000, '2023-02-26 18:46:24', '27-02-2023 12:21:16 AM', 'inactive'),
(38, 'ramesh01', 0x3a3a3100000000000000000000000000, '2023-02-26 18:52:44', '27-02-2023 12:26:35 AM', 'inactive'),
(39, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-27 14:48:47', '27-02-2023 08:19:11 PM', 'inactive'),
(40, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-27 14:49:22', '27-02-2023 08:20:06 PM', 'inactive'),
(41, 'ramesh01', 0x3a3a3100000000000000000000000000, '2023-02-27 14:50:28', '27-02-2023 08:28:43 PM', 'inactive'),
(42, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-27 14:58:58', '27-02-2023 08:29:31 PM', 'inactive'),
(43, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-28 08:18:47', '28-02-2023 01:50:16 PM', 'inactive'),
(44, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-28 08:24:40', NULL, 'active'),
(45, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-28 16:24:31', '28-02-2023 09:54:54 PM', 'inactive'),
(46, 'meet_gohel_12', 0x3a3a3100000000000000000000000000, '2023-02-28 16:25:07', NULL, 'active'),
(47, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-02-28 16:58:37', NULL, 'active'),
(48, 'aafiya_official', 0x3a3a3100000000000000000000000000, '2023-03-01 15:25:27', '01-03-2023 08:55:52 PM', 'inactive'),
(49, 'geeta_78', 0x3a3a3100000000000000000000000000, '2023-03-01 15:26:26', '01-03-2023 08:56:38 PM', 'inactive'),
(50, 'hitesh_90', 0x3a3a3100000000000000000000000000, '2023-03-01 15:37:52', '01-03-2023 09:08:09 PM', 'inactive'),
(51, 'geeta_78', 0x3a3a3100000000000000000000000000, '2023-03-01 15:46:00', '01-03-2023 09:16:11 PM', 'inactive'),
(52, 'rehan@850', 0x3a3a3100000000000000000000000000, '2023-03-01 15:46:49', '01-03-2023 09:18:30 PM', 'inactive'),
(53, 'aafiya_official', 0x3a3a3100000000000000000000000000, '2023-03-01 15:49:12', '01-03-2023 09:19:44 PM', 'inactive'),
(54, 'ramesh01', 0x3a3a3100000000000000000000000000, '2023-03-01 15:49:55', '01-03-2023 09:22:54 PM', 'inactive'),
(55, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-03-01 15:53:20', '01-03-2023 09:28:18 PM', 'inactive'),
(56, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-03-01 18:57:05', '02-03-2023 12:27:55 AM', 'inactive'),
(57, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-03-01 19:11:58', NULL, 'active'),
(58, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-03-01 19:29:38', '02-03-2023 01:18:24 AM', 'inactive'),
(59, 'shaun@123', 0x3a3a3100000000000000000000000000, '2023-03-03 12:30:47', '03-03-2023 06:01:12 PM', 'inactive');

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctor_log_status`
-- (See below for the actual view)
--
CREATE TABLE `doctor_log_status` (
`doctor_log_id` int(11)
,`doc_username` varchar(15)
,`status` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_reg`
--

CREATE TABLE `doctor_reg` (
  `doctor_id` int(11) NOT NULL,
  `profilepic` varchar(25) DEFAULT NULL,
  `fullname` varchar(25) NOT NULL,
  `doc_username` varchar(15) NOT NULL,
  `specialization` varchar(20) NOT NULL,
  `qualification` varchar(400) NOT NULL,
  `fees` int(4) NOT NULL,
  `phonenumber` bigint(11) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_reg`
--

INSERT INTO `doctor_reg` (`doctor_id`, `profilepic`, `fullname`, `doc_username`, `specialization`, `qualification`, `fees`, `phonenumber`, `address`, `city`, `gender`, `email`, `password`, `created_at`, `updationDate`) VALUES
(8, NULL, 'Aafiya Shaikh', 'aafiya_official', 'Orthopedic Surgeon', 'DBMS-2 PracticalAssignment1_18Feb (2).pdf', 0, 9874589965, 'Ajit Mill Char Rasta, Bapunagar, Ahmedabad.', 'Bapunagar', 'female', 'aafiyashaikhofficial@yahoo.in', '90bed51510b09ad5d325d8d174fa616c', '2023-03-01 15:24:34', NULL),
(9, NULL, 'Gaurav Shah', 'gaurav_shah_00', 'X-ray', 'download.jpeg', 0, 7411245487, '15, Home Residency, Shukhramnagar, Ahmedabad', 'Shukhramnagar', 'male', 'gaurav@gmail.com', '670b14728ad9902aecba32e22fa4f6bd', '2023-03-02 03:49:53', NULL),
(6, NULL, 'Geeta Kumari', 'geeta_78', 'Gynecologist', 'pencil (1).png', 0, 7878787878, 'Kalupur Watch Tower, Kalupur, Ahmedabad.', 'Kalupur', 'female', 'geetakumari78@gmail.com', '5379884c5ec4e06879f7400fd40be0d9', '2023-03-01 15:17:42', NULL),
(5, NULL, 'Hitesh Kumar', 'hitesh_90', 'Urologist', 'about (1).jpg', 250, 4141415454, 'Home, Sharkhej, Ahmedabad.', 'Sharkhej', 'male', 'hitesh90@gmail.com', 'df780a97b7d6a8f779f14728bccd3c4c', '2023-03-01 12:52:55', '2023-03-01 12:57:17'),
(7, NULL, 'Meena Desai', 'meenadesai_off', 'Pathologist', 'download.jpeg', 0, 7412589965, 'SG Highway, Sarkhej, Ahmedabad.', 'Sharkhej', 'female', 'meenadesaioff74@yahoo.com', '50438d8fca45a9bf20d72774430047f0', '2023-03-01 15:19:59', NULL),
(4, '', 'Meet Gohel', 'meet_gohel_12', 'Gynecologist', 'download.jpeg', 550, 6325478540, 'home', 'Sharkhej', 'male', 'meet15@gmail.com', '93279e3308bdbbeed946fc965017f67a', '2023-02-27 19:27:10', '2023-03-01 17:05:37'),
(1, 'profile-picture.jpeg', 'Ramesh Kumar', 'ramesh01', 'Cardiologist', 'cardiologist.png', 250, 7575757757, 'A 123 XYZ Apartment Raj Nagar Ext', 'Gandhinagar', 'male', 'ramesh1234@gmail.com', '21ef05aed5af92469a50b35623d52101', '2023-01-26 12:10:28', '2023-02-26 18:46:47'),
(2, '', 'Rehana Shaikh', 'rehan@850', 'Surgeon', 'surgeon.png', 320, 8574589656, '334, Indiranagar, blr, Vadodra', 'Ahmedabad', 'male', 'rehan2234@gmail.com', '6d545dbeb3c66dfcf3da797ed05b8705', '2023-01-27 15:54:45', '2023-03-01 11:13:11'),
(3, 'download.jpeg', 'Shaun Murphy', 'shaun@123', 'E.N.T', 'pencil.png', 420, 7474754547, '101-104, Electronical City, Ahmedabad.', 'Ahmedabad', 'male', 'shaunmurphy7676@gmail.com', '60c2ce8f2c04510630ddace8530a5c1c', '2023-02-22 17:16:14', '2023-02-26 08:53:25');

-- --------------------------------------------------------

--
-- Stand-in structure for view `doctor_spec`
-- (See below for the actual view)
--
CREATE TABLE `doctor_spec` (
`doctor_id` int(11)
,`fullname` varchar(25)
,`specialization` varchar(20)
,`phonenumber` bigint(11)
,`city` varchar(30)
,`gender` varchar(6)
,`email` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `doc_time`
--

CREATE TABLE `doc_time` (
  `time_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `date` date DEFAULT NULL,
  `day` varchar(10) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doc_time`
--

INSERT INTO `doc_time` (`time_id`, `username`, `date`, `day`, `time`) VALUES
(1, 'ramesh01', NULL, 'Friday', '10:00:00'),
(2, 'ramesh01', NULL, 'Friday', '11:00:00'),
(3, 'rehan@850', NULL, 'Monday', '05:00:00'),
(4, 'rehan@850', NULL, 'Monday', '06:00:00'),
(5, 'shaun@123', NULL, 'Wednesday', '10:30:00'),
(6, 'shaun@123', NULL, 'Wednesday', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `Medical_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `doc_username` varchar(15) NOT NULL,
  `BloodPressure` varchar(20) NOT NULL,
  `BloodSugar` varchar(20) NOT NULL,
  `Weight` int(100) NOT NULL,
  `Temperature` int(100) NOT NULL,
  `MedicalPres` mediumtext NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicalhistory`
--

INSERT INTO `medicalhistory` (`Medical_id`, `username`, `doc_username`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(1, 'Sufiyan09', 'shaun@123', '95/120', '65/220', 85, 42, 'Take Blood Test', '2023-02-26 11:03:31'),
(2, 'Sufiyan09', 'shaun@123', '95/120', '65/220', 85, 42, 'Take Diabetes Test', '2023-02-26 11:06:02'),
(3, 'Sufiyan09', 'shaun@123', '95/120', '200/220', 85, 42, 'Good', '2023-02-26 11:07:18'),
(4, 'Sufiyan09', 'shaun@123', '85/120', '95/220', 30, 46, 'Take Blood Test', '2023-02-26 11:12:09'),
(5, 'doraemon_1', 'ramesh01', '100/120', '140/220', 85, 56, 'Take Blood Test', '2023-02-26 18:53:46'),
(6, 'Sufiyan09', 'shaun@123', '85/120', '95/220', 30, 42, 'blood test', '2023-02-28 08:20:04'),
(7, 'ajendra_singh_8', 'rehan@850', '120/120', '180/220', 85, 32, 'Take Diabetes Test', '2023-03-01 15:47:53'),
(8, 'uvesh9824', 'shaun@123', '74/120', '120/220', 52, 41, 'Take Medicines regularly', '2023-03-01 15:56:46');

-- --------------------------------------------------------

--
-- Stand-in structure for view `onl_pat_medical_his`
-- (See below for the actual view)
--
CREATE TABLE `onl_pat_medical_his` (
`Medical_id` int(11)
,`username` varchar(15)
,`doc_username` varchar(15)
,`BloodPressure` varchar(20)
,`BloodSugar` varchar(20)
,`Weight` int(100)
,`Temperature` int(100)
,`MedicalPres` mediumtext
,`CreationDate` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `patient_city`
-- (See below for the actual view)
--
CREATE TABLE `patient_city` (
`patient_id` int(10)
,`fullname` varchar(25)
,`phonenumber` bigint(11)
,`dob` date
,`city` varchar(30)
,`gender` varchar(6)
,`email` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `patient_gender`
-- (See below for the actual view)
--
CREATE TABLE `patient_gender` (
`patient_id` int(10)
,`fullname` varchar(25)
,`phonenumber` bigint(11)
,`dob` date
,`city` varchar(30)
,`gender` varchar(6)
,`email` varchar(30)
);

-- --------------------------------------------------------

--
-- Table structure for table `patient_log`
--

CREATE TABLE `patient_log` (
  `patient_log_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `user_ip` binary(16) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `log_out` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_log`
--

INSERT INTO `patient_log` (`patient_log_id`, `username`, `user_ip`, `log_time`, `log_out`, `status`) VALUES
(1, 'Sufiyan09', 0x00000000000000000000000000000000, '2023-01-24 15:00:16', '', 'active'),
(2, 'uvesh9824', 0x00000000000000000000000000000000, '2023-01-24 15:01:52', '', 'active'),
(3, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-24 15:12:14', '', 'active'),
(4, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-24 15:15:47', '', 'active'),
(5, 'uvesh9824', 0x3a3a3100000000000000000000000000, '2023-01-24 16:36:23', '', 'active'),
(6, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-24 16:39:24', '', 'active'),
(7, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-25 14:59:45', '', 'active'),
(8, 'mujammil131', 0x3a3a3100000000000000000000000000, '2023-01-25 15:08:53', '', 'active'),
(9, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-25 15:23:30', '', 'active'),
(10, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-25 15:27:47', '', 'active'),
(11, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-25 16:21:17', '', 'active'),
(12, 'uvesh9824', 0x3a3a3100000000000000000000000000, '2023-01-25 16:32:12', '', 'active'),
(13, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-25 16:39:46', '', 'active'),
(14, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-25 17:00:04', '', 'active'),
(15, 'mujammil131', 0x3a3a3100000000000000000000000000, '2023-01-25 17:03:56', '', 'active'),
(16, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-26 06:03:15', '', 'active'),
(17, 'uvesh9824', 0x3a3a3100000000000000000000000000, '2023-01-26 06:06:03', '', 'active'),
(18, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-26 06:29:08', '', 'active'),
(19, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-26 06:31:13', '', 'active'),
(20, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-26 06:35:30', '', 'active'),
(21, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-26 06:43:42', '26-01-2023 12:59:01 PM', 'active'),
(22, 'uvesh9824', 0x3a3a3100000000000000000000000000, '2023-01-26 07:30:58', '0', 'active'),
(23, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-26 07:32:20', '0', 'active'),
(24, 'mujammil131', 0x3a3a3100000000000000000000000000, '2023-01-26 07:33:57', '26-01-2023 01:05:20 PM', 'inactive'),
(25, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-26 07:35:59', '26-01-2023 01:06:12 PM', 'inactive'),
(26, 'Jaish01', 0x3a3a3100000000000000000000000000, '2023-01-26 08:11:17', '', 'active'),
(27, 'Jaish01', 0x3a3a3100000000000000000000000000, '2023-01-26 08:12:02', '26-01-2023 01:43:32 PM', 'inactive'),
(28, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-26 09:25:59', '', 'active'),
(29, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-26 12:31:59', '', 'active'),
(30, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-26 12:47:44', '', 'active'),
(31, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-27 14:45:51', '', 'active'),
(32, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-27 14:54:15', '', 'active'),
(33, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-27 15:08:25', '', 'active'),
(34, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-27 15:09:50', '', 'active'),
(35, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-27 15:50:57', '27-01-2023 09:21:21 PM', 'inactive'),
(36, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-27 16:11:23', '', 'active'),
(37, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-27 16:31:24', '', 'active'),
(38, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-27 17:08:44', '', 'active'),
(39, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-28 03:47:22', '', 'active'),
(40, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-28 04:34:34', '', 'active'),
(41, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-28 04:35:05', '', 'active'),
(42, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-28 06:54:52', '', 'active'),
(43, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-01-28 07:06:31', '28-01-2023 12:38:31 PM', 'inactive'),
(44, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-04 07:20:31', '', 'active'),
(45, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-20 08:13:13', '', 'active'),
(46, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-20 08:33:16', '', 'active'),
(47, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-20 10:14:33', '20-02-2023 03:44:49 PM', 'inactive'),
(48, 'uvesh9824', 0x3a3a3100000000000000000000000000, '2023-02-20 10:15:16', '', 'active'),
(49, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-20 15:26:29', '', 'active'),
(50, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-20 15:37:31', '20-02-2023 09:17:47 PM', 'inactive'),
(51, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-20 15:47:54', '20-02-2023 09:34:11 PM', 'inactive'),
(52, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-20 16:04:18', '', 'active'),
(53, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-21 08:24:01', '21-02-2023 02:46:51 PM', 'inactive'),
(54, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-21 09:16:59', '21-02-2023 02:47:02 PM', 'inactive'),
(55, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-21 09:17:09', '21-02-2023 02:47:27 PM', 'inactive'),
(56, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-21 09:18:21', '21-02-2023 02:48:23 PM', 'inactive'),
(57, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-21 09:19:24', '21-02-2023 02:49:27 PM', 'inactive'),
(58, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-21 09:19:54', '', 'active'),
(59, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-21 09:57:14', '', 'active'),
(60, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-22 17:09:55', '22-02-2023 10:43:01 PM', 'inactive'),
(61, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-22 17:16:46', '23-02-2023 12:25:11 AM', 'inactive'),
(62, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-23 15:45:42', '', 'active'),
(63, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-23 17:21:09', '', 'active'),
(64, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-24 11:52:08', '24-02-2023 06:56:27 PM', 'inactive'),
(65, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-24 13:26:36', '24-02-2023 08:24:10 PM', 'inactive'),
(66, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-24 14:54:17', '24-02-2023 08:37:27 PM', 'inactive'),
(67, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-24 15:07:34', '', 'active'),
(68, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-24 15:07:45', '24-02-2023 08:50:06 PM', 'inactive'),
(69, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-24 15:28:36', '24-02-2023 08:59:49 PM', 'inactive'),
(70, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-25 04:59:03', '25-02-2023 10:39:18 AM', 'inactive'),
(71, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-25 08:23:57', '25-02-2023 01:57:30 PM', 'inactive'),
(72, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-25 09:57:38', '25-02-2023 03:38:53 PM', 'inactive'),
(73, 'suraj_89', 0x3a3a3100000000000000000000000000, '2023-02-25 14:23:36', '25-02-2023 08:09:46 PM', 'inactive'),
(74, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-25 14:39:53', '', 'active'),
(75, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-25 14:50:40', '', 'active'),
(76, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-25 14:53:40', '', 'active'),
(77, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-25 15:28:17', '', 'active'),
(78, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-26 06:20:00', '', 'active'),
(79, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-26 08:40:27', '', 'active'),
(80, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-26 08:46:15', '', 'active'),
(81, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-26 09:26:39', '', 'active'),
(82, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-26 09:28:55', '', 'active'),
(83, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-26 10:03:04', '', 'active'),
(84, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-26 10:15:23', '', 'active'),
(85, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-26 11:09:48', '', 'active'),
(86, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-26 11:55:18', '', 'active'),
(87, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-26 17:49:15', '', 'active'),
(88, 'doraemon_1', 0x3a3a3100000000000000000000000000, '2023-02-26 18:19:41', '', 'active'),
(89, 'doraemon_1', 0x3a3a3100000000000000000000000000, '2023-02-26 18:52:05', '', 'active'),
(90, 'ajendra_singh_8', 0x3a3a3100000000000000000000000000, '2023-02-27 19:02:22', '', 'active'),
(91, 'celianthony', 0x3a3a3100000000000000000000000000, '2023-02-28 08:14:06', '', 'active'),
(92, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-28 08:15:44', '', 'active'),
(93, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-28 08:20:26', '', 'active'),
(94, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-02-28 14:03:14', '', 'active'),
(95, 'Neel_14', 0x3a3a3100000000000000000000000000, '2023-02-28 14:04:45', '', 'active'),
(96, 'celianthony', 0x3a3a3100000000000000000000000000, '2023-02-28 14:06:11', '', 'active'),
(97, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-01 12:53:37', '', 'active'),
(98, 'ajendra_singh_8', 0x3a3a3100000000000000000000000000, '2023-03-01 15:12:32', '', 'active'),
(99, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-01 15:14:08', '', 'active'),
(100, 'uvesh9824', 0x3a3a3100000000000000000000000000, '2023-03-01 15:29:27', '', 'active'),
(101, 'ajendra_singh_8', 0x3a3a3100000000000000000000000000, '2023-03-01 15:31:25', '', 'active'),
(102, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-01 15:33:19', '', 'active'),
(103, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-01 17:53:17', '', 'active'),
(104, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-01 18:24:36', '', 'active'),
(105, 'raviraj_75', 0x3a3a3100000000000000000000000000, '2023-03-01 19:24:47', '', 'active'),
(106, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-03 09:12:36', '03-03-2023 02:46:00 PM', 'inactive'),
(107, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-03 09:16:42', '03-03-2023 03:52:05 PM', 'inactive'),
(108, 'uvesh9824', 0x3a3a3100000000000000000000000000, '2023-03-03 10:22:28', '03-03-2023 04:11:27 PM', 'inactive'),
(109, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-03 10:42:31', '03-03-2023 04:12:45 PM', 'inactive'),
(110, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-03 10:42:55', '', 'active'),
(111, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-03 11:40:44', '03-03-2023 05:11:35 PM', 'inactive'),
(112, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-03 12:18:51', '03-03-2023 05:50:08 PM', 'inactive'),
(113, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-03 12:32:30', '', 'active'),
(114, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-03 12:53:41', '03-03-2023 08:11:39 PM', 'inactive'),
(115, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-03 14:41:57', '03-03-2023 09:02:11 PM', 'inactive'),
(116, 'Sufiyan09', 0x3a3a3100000000000000000000000000, '2023-03-03 15:32:27', '03-03-2023 09:02:35 PM', 'inactive'),
(117, 'ajendra_singh_8', 0x3a3a3100000000000000000000000000, '2023-03-03 15:32:56', '', 'active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `patient_log_status`
-- (See below for the actual view)
--
CREATE TABLE `patient_log_status` (
`patient_log_id` int(11)
,`username` varchar(15)
,`status` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `patient_reg`
--

CREATE TABLE `patient_reg` (
  `patient_id` int(10) NOT NULL,
  `profilepic` varchar(25) DEFAULT NULL,
  `fullname` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `phonenumber` bigint(11) NOT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reg_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_reg`
--

INSERT INTO `patient_reg` (`patient_id`, `profilepic`, `fullname`, `username`, `phonenumber`, `dob`, `city`, `gender`, `email`, `password`, `reg_at`, `updationDate`) VALUES
(14, NULL, 'Ajendra Singh Jadeja', 'ajendra_singh_8', 8585858585, '2002-02-05', 'Khadia', 'male', 'ajendra85@gmail.com', 'fca46f641f522b4f72927f117828c597', '2023-02-27 18:58:51', '2023-03-01 15:07:47'),
(15, NULL, 'Bhavesh Balani', 'bhavesh_11', 6325478541, '2001-02-03', 'Bapunagar', 'male', 'bhavesh@gmail.com', '96e79218965eb72c92a549dd5a330112', '2023-02-27 19:22:09', '2023-03-01 15:10:28'),
(16, NULL, 'celia', 'celianthony', 9898009889, '1985-02-28', 'Bapunagar', 'female', 'celianthony@gmail.com', 'dba8e235c3db85cf877ad3059094322b', '2023-02-28 08:13:25', '2023-03-01 15:07:18'),
(13, NULL, 'Disha Patani', 'disha_patani', 6325478541, '1980-02-12', 'Rakhial', 'female', 'dishapatani41@gmail.com', 'bcd7e1296602834d10ebb6a9b8ca1684', '2023-02-27 18:53:49', '2023-03-01 15:06:59'),
(7, 'doraemon.png', 'Doraemon', 'doraemon_1', 9658748544, '2002-01-01', 'Thaltej', 'male', 'doraemon12@gmail.com', '93279e3308bdbbeed946fc965017f67a', '2023-02-26 18:16:04', '2023-02-26 18:21:31'),
(4, '', 'Jaish Rajput', 'Jaish01', 9854541254, '2002-05-15', 'Bhavnagar', 'male', 'jaishrajput1234@gmail.com', '21ef05aed5af92469a50b35623d52101', '2023-01-26 08:11:05', '2023-03-01 15:06:51'),
(3, '', 'shaikh mujammil', 'mujammil131', 9409654182, '2001-02-20', 'Bapunagar', 'male', 'shaikhmujammil131@gmail.com', '25d55ad283aa400af464c76d713c07ad', '2023-01-25 15:08:02', '2023-03-01 15:09:41'),
(19, NULL, 'Neel Bamania', 'Neel_14', 4124545487, '2000-02-01', 'Thaltej', 'male', 'neel14@gmail.com', '6dd9aa0b0606270d0875acb21546bedb', '2023-02-28 14:04:29', '2023-03-01 15:08:24'),
(12, NULL, 'Raviraj Chavda', 'raviraj_75', 7575757575, '2001-11-05', 'Nava Vadaj', 'male', 'raviraj75@gmail.com', '34e2c76df4fa89bba7d77a800209ab97', '2023-02-27 18:46:55', '2023-03-01 15:08:37'),
(18, NULL, 'Shiip', 'sheep@123', 4155787454, '1999-02-02', 'Gandhi Road', 'male', 'ship@gmal.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-02-28 13:42:56', '2023-03-01 15:08:46'),
(8, NULL, 'Sponge Bob', 'sponge@00', 7412587410, '2007-02-02', 'Gandhi Road', 'male', 'spongebob00@gmail.com', '670b14728ad9902aecba32e22fa4f6bd', '2023-02-27 18:34:03', '2023-03-01 15:08:57'),
(1, 'Sufiyan.jpg', 'Sufiyan Ansari', 'Sufiyan09', 7573086545, '2001-09-14', 'Shukhramnagar', 'male', 'ansarisufiyan73@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2023-01-23 14:42:08', '2023-03-03 11:40:36'),
(6, '', 'Suraj Rajput', 'suraj_89', 7474747854, '2007-05-08', 'Thaltej', 'other', 'surajrajput7867@yahoo.com', 'ad583f113ad3e6f84ff827ab9ebba541', '2023-02-25 14:23:26', '2023-02-25 14:36:27'),
(2, '', 'Uvesh Rajput', 'uvesh9824', 9824509777, '2002-02-12', 'Bapunagar', 'male', 'uveshrajput9824@gmail.com', '8cb573f4d3c8102baaf08202bbe2785f', '2023-01-24 15:01:38', '2023-03-01 15:09:32'),
(11, NULL, 'Vollen Dsouza', 'vollends01', 9854785478, '1895-02-04', 'Dariyapur', 'male', 'vollendsouza1234@gmail.com', '4297f44b13955235245b2497399d7a93', '2023-02-27 18:43:38', '2023-03-01 15:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `Medical_id` int(11) NOT NULL,
  `Patient_id` int(11) NOT NULL,
  `BloodPressure` varchar(20) NOT NULL,
  `BloodSugar` varchar(20) NOT NULL,
  `Weight` int(100) NOT NULL,
  `Temperature` int(100) NOT NULL,
  `MedicalPres` mediumtext NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`Medical_id`, `Patient_id`, `BloodPressure`, `BloodSugar`, `Weight`, `Temperature`, `MedicalPres`, `CreationDate`) VALUES
(1, 1, '95/120', '65', 85, 42, 'Weak', '2023-02-25 17:32:23'),
(2, 2, '120/120', '95/220', 30, 46, 'Less Improvement', '2023-02-25 18:40:59'),
(3, 3, '85/120', '74/220', 45, 22, 'Improvement', '2023-02-25 18:42:37'),
(11, 7, '25/120', '120/220', 65, 65, 'Take Blood Test', '2023-03-01 15:51:55'),
(12, 5, '52/120', '85/220', 52, 38, 'Take Diabetes Test', '2023-03-01 15:57:58'),
(13, 8, '95/120', '95/220', 52, 46, 'Blood Test', '2023-03-01 19:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `Patient_id` int(11) NOT NULL,
  `doc_username` varchar(15) NOT NULL,
  `PatientName` varchar(25) NOT NULL,
  `PatientContno` bigint(10) NOT NULL,
  `PatientEmail` varchar(30) NOT NULL,
  `PatientGender` varchar(6) NOT NULL,
  `PatientAdd` mediumtext NOT NULL,
  `PatientAge` int(10) NOT NULL,
  `PatientMedhis` mediumtext NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`Patient_id`, `doc_username`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 'shaun@123', 'Bob The Builder', 7485745896, 'bobbuilder123@gmail.com', 'male', 'A 123 ABC Apartment Raj Nagar Extarence', 12, 'No Medical History', '2023-02-25 10:54:21', '2023-02-25 18:38:26'),
(2, 'shaun@123', 'Ninja Hattori', 7412585698, 'ninjading@gmail.com', 'male', 'Abc Nagar, Kalupur, Ahmedabad', 15, 'Fever', '2023-02-25 17:58:13', '2023-02-25 18:46:10'),
(3, 'shaun@123', 'Shinchan Nohara ', 9652358541, 'shinchannohara9999@yahoo.in', 'male', 'xyz, Maninagar, Ahmedabad', 5, 'MRI Scan', '2023-02-25 18:00:53', '2023-03-01 15:42:25'),
(4, 'shaun@123', 'Suneo Honekawa', 6525447441, 'suneohonekawa8524@gmail.com', 'male', 'Gota, Sarkhej, Ahmedabad', 10, 'Full Body Checkup', '2023-02-25 18:06:51', '2023-03-01 15:41:58'),
(5, 'shaun@123', 'Nobita Nobi', 7457485470, 'nobitanobi99@yahoo.com', 'male', '12, Rakhial, Ahmedabd', 13, 'Blood Test', '2023-02-25 18:50:48', '2023-03-01 15:41:39'),
(6, 'ramesh01', 'Ninja Hattori', 7485745896, 'ninjading@gmail.com', 'male', '304, Bapunagar, Ahmedabd', 10, 'Blood Test', '2023-02-26 18:55:39', '2023-03-01 15:41:15'),
(7, 'ramesh01', 'Shinzo', 9652147854, 'shinzo90@gmail.com', 'male', 'abc, Thaltej, Ahmedabad', 7, 'No Medical History', '2023-02-27 14:58:32', '2023-03-01 15:43:37'),
(8, 'shaun@123', 'Rajesh Khanna', 8574587444, 'rajeshkhanna1234@gmail.com', 'male', '12, Raj Homes, SG Highway, Sarkhej, Ahmedabad', 35, 'No Medical History', '2023-03-01 19:35:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(10) NOT NULL,
  `username` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobileno` bigint(12) NOT NULL,
  `message` mediumtext NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `admin_remark` mediumtext DEFAULT NULL,
  `last_update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `is_read` varchar(5) DEFAULT NULL,
  `feedback_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `username`, `email`, `mobileno`, `message`, `posting_date`, `admin_remark`, `last_update_date`, `is_read`, `feedback_status`) VALUES
(1, 'Sufiyan09', 'sufiyanansari2222@gmail.com', 7573086544, 'HI', '2023-01-23 14:58:24', 'Ok i am glad to read your feedback. As an Admin I thank you for your response.', '2023-03-03 11:23:07', 'Yes', 'inactive'),
(2, 'Sufiyan09', 'sufiyanansari2222@gmail.com', 7573086544, 'axsc ', '2023-01-25 14:49:49', NULL, '2023-03-03 11:43:29', 'No', 'inactive'),
(3, 'Sufiyan09', 'ansarisufiyan73@gmail.com', 7573086545, 'All member of the hospital were very friendly', '2023-03-03 10:18:05', 'Thank you for your response', '2023-03-03 11:39:19', 'Yes', 'inactive'),
(4, 'Sufiyan09', 'ansarisufiyan73@gmail.com', 7573086545, 'All member of the hospital were very friendly', '2023-03-03 10:21:28', 'Thank you for your response', '2023-03-03 12:25:47', 'Yes', 'active'),
(5, 'uvesh9824', 'uveshrajput9824@gmail.com', 9824509777, 'Nice Hospitality served to me', '2023-03-03 10:22:49', 'Thank You for your valuable feedback', '2023-03-03 11:07:11', 'Yes', 'active'),
(6, 'Sufiyan09', 'ansarisufiyan73@gmail.com', 7573086545, 'Almost satisfied by the hospitality', '2023-03-03 11:36:44', 'Thank you', '2023-03-03 12:26:19', 'Yes', 'active'),
(7, 'Sufiyan09', 'ansarisufiyan73@gmail.com', 7573086545, 'Almost satisfied by the hospitality', '2023-03-03 11:37:28', NULL, '2023-03-03 11:39:33', 'No', 'active');

-- --------------------------------------------------------

--
-- Structure for view `app_bet_dates`
--
DROP TABLE IF EXISTS `app_bet_dates`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `app_bet_dates`  AS SELECT `appointment`.`app_id` AS `app_id`, `appointment`.`username` AS `username`, `appointment`.`doc_username` AS `doc_username`, `appointment`.`specialization` AS `specialization`, `appointment`.`fees` AS `fees`, `appointment`.`date` AS `date`, `appointment`.`time` AS `time`, `appointment`.`reason` AS `reason`, `appointment`.`postingDate` AS `postingDate` FROM `appointment` ORDER BY `appointment`.`app_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `app_count`
--
DROP TABLE IF EXISTS `app_count`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `app_count`  AS SELECT `appointment`.`app_id` AS `app_id`, `appointment`.`username` AS `username`, `appointment`.`doc_username` AS `doc_username`, `appointment`.`specialization` AS `specialization`, `appointment`.`fees` AS `fees`, `appointment`.`date` AS `date`, `appointment`.`time` AS `time`, `appointment`.`reason` AS `reason`, `appointment`.`postingDate` AS `postingDate` FROM `appointment` ORDER BY `appointment`.`app_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `app_patient_cnt`
--
DROP TABLE IF EXISTS `app_patient_cnt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `app_patient_cnt`  AS SELECT `appointment`.`app_id` AS `app_id`, `appointment`.`username` AS `username`, `appointment`.`doc_username` AS `doc_username`, `appointment`.`specialization` AS `specialization`, `appointment`.`fees` AS `fees`, `appointment`.`date` AS `date`, `appointment`.`time` AS `time`, `appointment`.`reason` AS `reason`, `appointment`.`postingDate` AS `postingDate` FROM `appointment` ORDER BY `appointment`.`app_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `app_spec`
--
DROP TABLE IF EXISTS `app_spec`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `app_spec`  AS SELECT `appointment`.`app_id` AS `app_id`, `appointment`.`username` AS `username`, `appointment`.`doc_username` AS `doc_username`, `appointment`.`specialization` AS `specialization`, `appointment`.`fees` AS `fees`, `appointment`.`date` AS `date`, `appointment`.`time` AS `time`, `appointment`.`reason` AS `reason`, `appointment`.`postingDate` AS `postingDate` FROM `appointment` ORDER BY `appointment`.`app_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `app_time`
--
DROP TABLE IF EXISTS `app_time`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `app_time`  AS SELECT `appointment`.`app_id` AS `app_id`, `appointment`.`username` AS `username`, `appointment`.`doc_username` AS `doc_username`, `appointment`.`specialization` AS `specialization`, `appointment`.`fees` AS `fees`, `appointment`.`date` AS `date`, `appointment`.`time` AS `time`, `appointment`.`reason` AS `reason`, `appointment`.`postingDate` AS `postingDate` FROM `appointment` ORDER BY `appointment`.`app_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `doctor_city`
--
DROP TABLE IF EXISTS `doctor_city`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctor_city`  AS SELECT `doctor_reg`.`doctor_id` AS `doctor_id`, `doctor_reg`.`fullname` AS `fullname`, `doctor_reg`.`specialization` AS `specialization`, `doctor_reg`.`phonenumber` AS `phonenumber`, `doctor_reg`.`city` AS `city`, `doctor_reg`.`gender` AS `gender`, `doctor_reg`.`email` AS `email` FROM `doctor_reg` ORDER BY `doctor_reg`.`doctor_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `doctor_created`
--
DROP TABLE IF EXISTS `doctor_created`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctor_created`  AS SELECT count(`doctor_reg`.`doctor_id`) AS `Count_doctor_id`, `doctor_reg`.`fullname` AS `fullname`, `doctor_reg`.`specialization` AS `specialization`, `doctor_reg`.`phonenumber` AS `phonenumber`, `doctor_reg`.`city` AS `city`, `doctor_reg`.`gender` AS `gender`, `doctor_reg`.`email` AS `email`, `doctor_reg`.`created_at` AS `created_at` FROM `doctor_reg` GROUP BY `doctor_reg`.`fullname`, `doctor_reg`.`specialization`, `doctor_reg`.`phonenumber`, `doctor_reg`.`city`, `doctor_reg`.`gender`, `doctor_reg`.`email`, `doctor_reg`.`created_at` ORDER BY count(`doctor_reg`.`doctor_id`) ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `doctor_gender`
--
DROP TABLE IF EXISTS `doctor_gender`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctor_gender`  AS SELECT `doctor_reg`.`doctor_id` AS `doctor_id`, `doctor_reg`.`fullname` AS `fullname`, `doctor_reg`.`specialization` AS `specialization`, `doctor_reg`.`phonenumber` AS `phonenumber`, `doctor_reg`.`city` AS `city`, `doctor_reg`.`gender` AS `gender`, `doctor_reg`.`email` AS `email` FROM `doctor_reg` ORDER BY `doctor_reg`.`doctor_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `doctor_log_status`
--
DROP TABLE IF EXISTS `doctor_log_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctor_log_status`  AS SELECT `doctor_log`.`doctor_log_id` AS `doctor_log_id`, `doctor_log`.`doc_username` AS `doc_username`, `doctor_log`.`status` AS `status` FROM `doctor_log` ORDER BY `doctor_log`.`doctor_log_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `doctor_spec`
--
DROP TABLE IF EXISTS `doctor_spec`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doctor_spec`  AS SELECT `doctor_reg`.`doctor_id` AS `doctor_id`, `doctor_reg`.`fullname` AS `fullname`, `doctor_reg`.`specialization` AS `specialization`, `doctor_reg`.`phonenumber` AS `phonenumber`, `doctor_reg`.`city` AS `city`, `doctor_reg`.`gender` AS `gender`, `doctor_reg`.`email` AS `email` FROM `doctor_reg` ORDER BY `doctor_reg`.`doctor_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `onl_pat_medical_his`
--
DROP TABLE IF EXISTS `onl_pat_medical_his`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `onl_pat_medical_his`  AS SELECT `medicalhistory`.`Medical_id` AS `Medical_id`, `medicalhistory`.`username` AS `username`, `medicalhistory`.`doc_username` AS `doc_username`, `medicalhistory`.`BloodPressure` AS `BloodPressure`, `medicalhistory`.`BloodSugar` AS `BloodSugar`, `medicalhistory`.`Weight` AS `Weight`, `medicalhistory`.`Temperature` AS `Temperature`, `medicalhistory`.`MedicalPres` AS `MedicalPres`, `medicalhistory`.`CreationDate` AS `CreationDate` FROM `medicalhistory` ORDER BY `medicalhistory`.`Medical_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `patient_city`
--
DROP TABLE IF EXISTS `patient_city`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patient_city`  AS SELECT `patient_reg`.`patient_id` AS `patient_id`, `patient_reg`.`fullname` AS `fullname`, `patient_reg`.`phonenumber` AS `phonenumber`, `patient_reg`.`dob` AS `dob`, `patient_reg`.`city` AS `city`, `patient_reg`.`gender` AS `gender`, `patient_reg`.`email` AS `email` FROM `patient_reg` ORDER BY `patient_reg`.`patient_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `patient_gender`
--
DROP TABLE IF EXISTS `patient_gender`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patient_gender`  AS SELECT `patient_reg`.`patient_id` AS `patient_id`, `patient_reg`.`fullname` AS `fullname`, `patient_reg`.`phonenumber` AS `phonenumber`, `patient_reg`.`dob` AS `dob`, `patient_reg`.`city` AS `city`, `patient_reg`.`gender` AS `gender`, `patient_reg`.`email` AS `email` FROM `patient_reg` ORDER BY `patient_reg`.`patient_id` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `patient_log_status`
--
DROP TABLE IF EXISTS `patient_log_status`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `patient_log_status`  AS SELECT `patient_log`.`patient_log_id` AS `patient_log_id`, `patient_log`.`username` AS `username`, `patient_log`.`status` AS `status` FROM `patient_log` ORDER BY `patient_log`.`patient_log_id` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`),
  ADD KEY `username` (`username`),
  ADD KEY `doc_username` (`doc_username`);

--
-- Indexes for table `doctor_log`
--
ALTER TABLE `doctor_log`
  ADD PRIMARY KEY (`doctor_log_id`),
  ADD KEY `username` (`doc_username`);

--
-- Indexes for table `doctor_reg`
--
ALTER TABLE `doctor_reg`
  ADD PRIMARY KEY (`doc_username`),
  ADD UNIQUE KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doc_time`
--
ALTER TABLE `doc_time`
  ADD PRIMARY KEY (`time_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`Medical_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `patient_log`
--
ALTER TABLE `patient_log`
  ADD PRIMARY KEY (`patient_log_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `patient_reg`
--
ALTER TABLE `patient_reg`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `UNIQUE` (`patient_id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`Medical_id`),
  ADD KEY `Patient_id` (`Patient_id`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`Patient_id`),
  ADD KEY `doc_username` (`doc_username`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `FOREIGN KEY` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `doctor_log`
--
ALTER TABLE `doctor_log`
  MODIFY `doctor_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `doctor_reg`
--
ALTER TABLE `doctor_reg`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doc_time`
--
ALTER TABLE `doc_time`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  MODIFY `Medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `patient_log`
--
ALTER TABLE `patient_log`
  MODIFY `patient_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `patient_reg`
--
ALTER TABLE `patient_reg`
  MODIFY `patient_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `Medical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `Patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`username`) REFERENCES `patient_reg` (`username`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`doc_username`) REFERENCES `doctor_reg` (`doc_username`);

--
-- Constraints for table `doctor_log`
--
ALTER TABLE `doctor_log`
  ADD CONSTRAINT `doctor_log_ibfk_1` FOREIGN KEY (`doc_username`) REFERENCES `doctor_reg` (`doc_username`);

--
-- Constraints for table `doc_time`
--
ALTER TABLE `doc_time`
  ADD CONSTRAINT `doc_time_ibfk_1` FOREIGN KEY (`username`) REFERENCES `doctor_reg` (`doc_username`);

--
-- Constraints for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD CONSTRAINT `medicalhistory_ibfk_1` FOREIGN KEY (`username`) REFERENCES `patient_reg` (`username`);

--
-- Constraints for table `patient_log`
--
ALTER TABLE `patient_log`
  ADD CONSTRAINT `patient_log_ibfk_1` FOREIGN KEY (`username`) REFERENCES `patient_reg` (`username`);

--
-- Constraints for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD CONSTRAINT `tblmedicalhistory_ibfk_1` FOREIGN KEY (`Patient_id`) REFERENCES `tblpatient` (`Patient_id`);

--
-- Constraints for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD CONSTRAINT `tblpatient_ibfk_1` FOREIGN KEY (`doc_username`) REFERENCES `doctor_reg` (`doc_username`);

--
-- Constraints for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD CONSTRAINT `FOREIGN KEY` FOREIGN KEY (`username`) REFERENCES `patient_reg` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
