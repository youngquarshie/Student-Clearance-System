-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 06:13 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_username` varchar(25) DEFAULT NULL,
  `admin_password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `clearance_id` int(10) NOT NULL,
  `id` int(10) DEFAULT NULL,
  `is_library_approved` int(1) DEFAULT '0',
  `is_estate_approved` int(1) DEFAULT '0',
  `is_src_approved` int(1) DEFAULT '0',
  `is_hod_approved` int(1) DEFAULT '0',
  `is_dean_approved` int(1) DEFAULT '0',
  `is_sports_approved` int(1) DEFAULT '0',
  `is_account_approved` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`clearance_id`, `id`, `is_library_approved`, `is_estate_approved`, `is_src_approved`, `is_hod_approved`, `is_dean_approved`, `is_sports_approved`, `is_account_approved`) VALUES
(113, 79, 0, 1, 1, 0, 0, NULL, 1),
(114, 79, 0, 0, 1, 0, 0, NULL, 1),
(115, 71, 0, 0, 1, 0, 0, 1, 1),
(116, 71, 0, 0, 1, 0, 0, 0, 1),
(117, 79, 0, 0, 1, 0, 0, 0, 1),
(118, 71, 0, 0, 1, 0, 0, 0, 1),
(119, 75, 0, 0, NULL, 0, 0, 0, 1),
(120, 75, 0, 0, NULL, 0, 0, 0, 1),
(121, 75, 0, 0, NULL, 0, 0, 0, 1),
(122, 80, 0, 0, NULL, 0, 0, 0, 0),
(123, 73, 0, 0, 1, 0, 0, 0, 1),
(124, 71, 0, 0, 0, 0, 0, 0, 1),
(125, 75, 0, 0, 0, 0, 0, 0, 1),
(126, 79, 0, 0, 0, 0, 0, 0, 1),
(127, 73, 0, 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(10) NOT NULL,
  `department_name` varchar(70) DEFAULT NULL,
  `faculty_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `faculty_id`) VALUES
(20, 'HND Computer Science', 6),
(21, 'HND Computer Networking', 6),
(22, 'HND Hospitality', 6),
(23, 'HND Statistics', 6),
(24, 'HND Fashion Design', 6),
(25, 'HND Accountancy', 7),
(26, 'HND Marketing', 7),
(27, 'HND Purchasing and Supply', 7),
(28, 'HND Secretaryship and Management Studies', 7);

-- --------------------------------------------------------

--
-- Table structure for table `designee`
--

CREATE TABLE `designee` (
  `designee_id` int(10) NOT NULL,
  `designee_name` varchar(25) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designee`
--

INSERT INTO `designee` (`designee_id`, `designee_name`, `username`, `password`, `email`, `user_type`) VALUES
(3, 'Librarian', 'library', 'lib2017', 'youngquarshie@gmail.com', 'librarian'),
(4, 'SRC President', 'src', 'src2017', NULL, 'src'),
(5, 'Estate Department', 'estate', 'estate2017', NULL, 'estate'),
(6, 'Dean of Students', 'dean', 'dean2017', NULL, 'dean'),
(7, 'Accounts', 'account', 'account2017', 'pemzymony@gmail.com', 'account'),
(8, 'Head of Department', 'hod', 'hod2017', NULL, 'hod'),
(9, 'Sports Master', 'sports', 'sports2017', NULL, 'sports');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(10) NOT NULL,
  `faculty_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`) VALUES
(6, 'Faculty of Applied Science and Technology'),
(7, 'Faculty of Business and Management Studies'),
(8, 'Faculty of Engineering'),
(9, 'Faculty of Built and Natural Environment'),
(10, 'Faculty of Health and Allied Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `index_no` varchar(15) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `src_request` int(10) DEFAULT '0',
  `dean_request` int(10) DEFAULT '0',
  `hod_request` int(10) DEFAULT '0',
  `sports_request` int(10) DEFAULT '0',
  `library_request` int(10) DEFAULT '0',
  `account_request` int(10) DEFAULT '0',
  `estate_request` int(10) DEFAULT '0',
  `department_id` int(10) DEFAULT NULL,
  `faculty_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `index_no`, `first_name`, `last_name`, `password`, `email`, `status`, `src_request`, `dean_request`, `hod_request`, `sports_request`, `library_request`, `account_request`, `estate_request`, `department_id`, `faculty_id`) VALUES
(71, '04/2015/0808D', 'AMPONSAH', 'OBED', '1234', 'amponsah_obed@gmail.com', '0', 1, 1, 1, 1, 1, 1, 1, 20, 6),
(72, '04/2015/0809D', 'MICHAEL', 'OSEI ANANG', '1234', 'michael_osei@gmail.com', '0', 0, 0, 0, 0, 0, 0, 0, 20, 6),
(73, '04/2015/0701D', 'GILBERT', 'ASMAH', '1234', 'gilbert_asmah@gmail.com', '0', 1, 1, 1, 1, 1, 1, 1, 27, 7),
(74, '04/2014/0702D', 'EWURAMA', 'AMPOMAAH', '1234', 'ewura_ampomah@gmail.com', '0', 1, 1, 0, 0, 1, 1, 1, 27, 7),
(75, '04/2015/0801D', 'NII', 'ARMAH', '1234', 'braniiblack@gmail.com', '0', 1, 1, 1, 1, 1, 1, 1, 20, 6),
(76, '04/2015/1297D', 'EDITH', 'KLU SEWOR', '1234', 'edithklusewor@gmail.com', '0', 0, 0, 0, 0, 0, 0, 0, 26, 7),
(77, '04/2015/1293D', 'SALOMEY', 'SESU GAD', '1234', 'salomey_sesu@gmail.com', '0', 1, 1, 1, 1, 1, 1, 1, 26, 7),
(78, '04/2015/0835D', 'RICHMOND', 'SAKYI TABI', '1234', 'richmond_tabi@gmail.com', '0', 0, 0, 0, 0, 0, 0, 0, 20, 6),
(79, '04/2015/0832D', 'ISAAC', 'QUARSHIE', '1234', 'pemzymony@gmail.com', '0', 1, 1, 1, 1, 1, 1, 1, 20, 6),
(80, '04/2015/0802D', 'STEVEN', 'MANFO', '1234', 'pneumalogoss@gmail.com', '0', 1, 0, 0, 1, 1, 0, 0, 20, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `account_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `first_year` float DEFAULT NULL,
  `second_year` float DEFAULT NULL,
  `third_year` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_estate`
--

CREATE TABLE `tbl_estate` (
  `estate_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `type_of_damage` varchar(25) DEFAULT NULL,
  `date_of_action` date DEFAULT NULL,
  `payment` float DEFAULT NULL,
  `payment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_library`
--

CREATE TABLE `tbl_library` (
  `library_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `date_of_return` varchar(255) DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_library`
--

INSERT INTO `tbl_library` (`library_id`, `student_id`, `book_title`, `date_of_return`, `date_of_issue`) VALUES
(1, 75, 'Grief Child', '', '2018-05-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sports`
--

CREATE TABLE `tbl_sports` (
  `sports_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `item` varchar(25) NOT NULL,
  `payment` int(11) DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `date_of_return` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sports`
--

INSERT INTO `tbl_sports` (`sports_id`, `student_id`, `item`, `payment`, `date_of_issue`, `date_of_return`) VALUES
(1, 75, 'Football', NULL, '2018-05-01', NULL),
(2, 79, 'Jersey', NULL, '2018-05-02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_src`
--

CREATE TABLE `tbl_src` (
  `src_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `bal` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_src`
--

INSERT INTO `tbl_src` (`src_id`, `student_id`, `amount`, `bal`) VALUES
(1, 75, '100', NULL),
(2, 80, '100', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`clearance_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `designee`
--
ALTER TABLE `designee`
  ADD PRIMARY KEY (`designee_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_estate`
--
ALTER TABLE `tbl_estate`
  ADD PRIMARY KEY (`estate_id`),
  ADD KEY `student id` (`student_id`);

--
-- Indexes for table `tbl_library`
--
ALTER TABLE `tbl_library`
  ADD PRIMARY KEY (`library_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_sports`
--
ALTER TABLE `tbl_sports`
  ADD PRIMARY KEY (`sports_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_src`
--
ALTER TABLE `tbl_src`
  ADD PRIMARY KEY (`src_id`),
  ADD KEY `student_id` (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `clearance_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `designee`
--
ALTER TABLE `designee`
  MODIFY `designee_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `account_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_estate`
--
ALTER TABLE `tbl_estate`
  MODIFY `estate_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_library`
--
ALTER TABLE `tbl_library`
  MODIFY `library_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_sports`
--
ALTER TABLE `tbl_sports`
  MODIFY `sports_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_src`
--
ALTER TABLE `tbl_src`
  MODIFY `src_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clearance`
--
ALTER TABLE `clearance`
  ADD CONSTRAINT `clearance_ibfk_1` FOREIGN KEY (`id`) REFERENCES `student` (`id`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`);

--
-- Constraints for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD CONSTRAINT `tbl_account_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `tbl_estate`
--
ALTER TABLE `tbl_estate`
  ADD CONSTRAINT `tbl_estate_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `tbl_library`
--
ALTER TABLE `tbl_library`
  ADD CONSTRAINT `tbl_library_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `tbl_sports`
--
ALTER TABLE `tbl_sports`
  ADD CONSTRAINT `tbl_sports_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

--
-- Constraints for table `tbl_src`
--
ALTER TABLE `tbl_src`
  ADD CONSTRAINT `tbl_src_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
