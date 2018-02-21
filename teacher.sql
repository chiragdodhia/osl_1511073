-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 24, 2017 at 08:23 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `GoingOrganise` text,
  `Organised` text,
  `Faculty_name` text,
  `Staff_name` text,
  `Activity` text,
  `Event_Fdate` date DEFAULT NULL,
  `Event_Tdate` date DEFAULT NULL,
  `Location` text,
  `TotalResPerson` int(11) DEFAULT NULL,
  `Res1_name` text,
  `Res1_Designation` text,
  `Res2_name` text,
  `Res2_Designation` text,
  `Res3_name` text,
  `Res3_Designation` text,
  `Res4_name` text,
  `Res4_Designation` text,
  `Res5_name` text,
  `Res5_Designation` text,
  `Res6_name` text,
  `Res6_Designation` text,
  `Res7_name` text,
  `Res7_Designation` text,
  `Res8_name` text,
  `Res8_Designation` text,
  `Res9_name` text,
  `Res9_Designation` text,
  `Res10_name` text,
  `Res10_Designation` text,
  `Target_Audiance` text,
  `Purpose` text,
  `PermissionLetter` text,
  `Certificate` text,
  `Report` text,
  `BrochureAttendance` text,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`ID`, `GoingOrganise`, `Organised`, `Faculty_name`, `Staff_name`, `Activity`, `Event_Fdate`, `Event_Tdate`, `Location`, `TotalResPerson`, `Res1_name`, `Res1_Designation`, `Res2_name`, `Res2_Designation`, `Res3_name`, `Res3_Designation`, `Res4_name`, `Res4_Designation`, `Res5_name`, `Res5_Designation`, `Res6_name`, `Res6_Designation`, `Res7_name`, `Res7_Designation`, `Res8_name`, `Res8_Designation`, `Res9_name`, `Res9_Designation`, `Res10_name`, `Res10_Designation`, `Target_Audiance`, `Purpose`, `PermissionLetter`, `Certificate`, `Report`, `BrochureAttendance`) VALUES
(1, 'YES', 'NO', 'NAYAN ANTIYA', NULL, 'WORKSHOP', '2017-10-11', '2017-10-11', 'GUJARAT', 2, 'KAUSHIK SALVI', 'ENGINEER', 'PULKIT FOSI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '500', 'KNOWLEDGE', NULL, NULL, NULL, NULL),
(2, 'YES', 'NO', 'NAYAN ANTIYA', '', 'STTP', '2017-10-26', '2017-10-29', 'MUMBAI', 1, 'DGTFHYGJ', 'FGBVNB', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/2.jpg', NULL, NULL, NULL),
(3, 'YES', 'NO', '', 'John Patel', 'Guest Lecture', '2017-10-26', '2017-10-27', 'California', 5, 'Sundar Pitchai', 'CEO(Google)', 'Satya Nadella', 'CEO(Microsoft)', 'Indramoorty Nui', 'CEO', 'Vikram Jha', 'Engineer', 'Millan Dave', 'Chief Engineer', '', '', '', '', '', '', '', '', '', '', 'MBA Students', 'Management skills', NULL, NULL, NULL, NULL),
(4, 'YES', 'NO', 'MAINESH ANTIYA', '', 'STTP', '2017-10-18', '2017-10-26', 'Kolkatta', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(5, 'YES', 'NO', 'michel', '', 'STTP', '2017-10-24', '2017-10-24', 'Kolkatta', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/5.jpg', 'uploads/Certificate_5.png', 'uploads/Report_5.png', 'uploads/Brochure_5.png'),
(6, 'YES', 'NO', 'michel', '', 'STTP', '2017-10-24', '2017-10-24', 'Kolkatta', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/6.jpg', NULL, NULL, NULL),
(7, 'YES', 'NO', 'vandana', '', 'Workshop', '2017-12-04', '2017-12-29', 'Mumbai', 1, 'hiii', 'ok', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/PermissionLetter_7.png', 'uploads/Certificate_7.png', 'uploads/Report_7.png', 'uploads/Brochure_7.png'),
(8, 'YES', 'NO', 'vandana', '', 'Workshop', '2017-12-04', '2017-12-29', 'Mumbai', 1, 'hiii', 'ok', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/8.jpg', NULL, NULL, NULL),
(9, 'YES', 'NO', 'chirag', '', 'STTP', '2017-10-25', '2017-10-25', 'delhi', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(10, 'YES', 'NO', '', 'mittal antiya', 'STTP', '2018-01-31', '2018-01-31', 'Mumbai', 3, 'vini', 'fd', 'nayan', 'engg', 'MAINESH', 'engg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(11, 'YES', 'NO', '', 'mittal', 'STTP', '2018-01-31', '2018-01-31', 'Mumbai', 2, 'vinni', 'fd', 'nayan', 'engg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(12, 'YES', 'NO', '', 'mittal', 'STTP', '2017-12-31', '2017-12-31', 'delhi', 1, 'VINI', 'FD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(13, 'YES', 'NO', 'Nikunj Gedia', '', 'Guest Lecture', '2017-12-31', '2017-12-31', 'Mumbai', 3, 'NAYAN ANTIYA', 'Engineer', 'Dhruv Chauhan', 'Engineer', 'Sunny jethwa', 'CA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10th students', 'Arduino Workshop', NULL, NULL, NULL, NULL),
(14, 'YES', 'NO', 'Nikunj Gedia', '', 'Guest Lecture', '2017-12-31', '2017-12-31', 'Mumbai', 3, 'NAYAN ANTIYA', 'Engineer', 'Dhruv Chauhan', 'Engineer', 'Sunny jethwa', 'CA', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ok', 'ok', NULL, NULL, NULL, NULL),
(15, 'YES', 'NO', 'Nikunj Gedia', '', 'Guest Lecture', '2017-12-31', '2017-12-31', 'Mumbai', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sfd', 'sdf', NULL, NULL, NULL, NULL),
(16, 'YES', 'NO', '', 'prachit', 'STTP', '2017-10-26', '2017-10-26', 'Kolkatta', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/PermissionLetter_16.jpg', 'uploads/Certificate_16.jpg', 'uploads/Report_16.jpg', 'uploads/Brochure_16.jpg'),
(17, 'YES', 'NO', 'Parth Darjji', '', 'Guest Lecture', '2017-10-24', '2017-10-25', 'mumbai', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'fcgh', 'jhk', NULL, NULL, NULL, NULL),
(18, 'YES', 'NO', '', 'MAITRI SHAH', 'STTP', '2017-10-25', '2017-10-25', 'delhi', 2, 'Mahek Shah', 'Engg', 'Jugal Patel', 'hiiiiii', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/PermissionLetter_18.png', 'uploads/Certificate_18.png', 'uploads/Report_18.png', 'uploads/Brochure_18.png'),
(19, 'YES', 'NO', 'NAYAN ANTIYA', '', 'STTP', '2017-10-25', '2017-10-26', 'Mumbai', 1, 'Adwait Naik', 'Engg', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/PermissionLetter_19.png', 'uploads/Certificate_19.png', 'uploads/Report_19.png', 'uploads/Brochure_19.png'),
(20, 'YES', 'NO', 'chirag', '', 'Guest Lecture', '2017-10-26', '2017-10-26', 'kjsomaiya', 1, 'NAYAN ANTIYA', 'Engineer', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'MBA Students', 'Management skills', 'uploads/PermissionLetter_20.png', 'uploads/Certificate_20.png', 'uploads/Report_20.png', 'uploads/Brochure_20.png'),
(21, 'YES', 'NO', 'ruchk', '', 'Workshop', '2017-12-31', '2017-12-31', 'ok', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/PermissionLetter_21.png', 'uploads/Certificate_21.png', 'uploads/Report_21.png', 'uploads/Brochure_21.png'),
(22, 'YES', 'NO', 'Mittal Antya', '', 'Guest Lecture', '2017-12-31', '2017-12-31', 'MUMBAI', 1, 'vini', 'fd', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'uploads/PermissionLetter_22.png', 'uploads/Certificate_22.png', 'uploads/Report_22.png', 'uploads/Brochure_22.png'),
(23, 'YES', 'NO', 'okok', '', 'Industrial Visit', '2017-12-28', '2017-12-31', 'JHVBN,', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'KJNM,', 'KJNM,', 'uploads/PermissionLetter_23.png', 'uploads/Certificate_23.png', 'uploads/Report_23.png', 'uploads/Brochure_23.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
