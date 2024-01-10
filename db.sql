-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 10:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(30) NOT NULL,
  `datetime` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` int(30) NOT NULL,
  `aname` varchar(30) NOT NULL,
  `addedby` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `datetime`, `username`, `password`, `aname`, `addedby`) VALUES
(1, 'August-31-2021 15:42:48', 'shofi', 1234, 'ahmed', 'nader'),
(2, 'August-31-2021 16:35:43', 'abid', 2231, 'hossain', 'nader'),
(3, 'September-07-2021 01:34:00', 'saif', 12345, 'ahmed', 'shofi'),
(4, 'September-07-2021 01:38:22', 'hridoy', 112233, 'hossain', 'shofi'),
(5, 'September-07-2021 01:39:36', 'babu', 1122334455, 'khan', 'shofi');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `password` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `specialist` varchar(25) NOT NULL,
  `id` int(13) NOT NULL,
  `datetime` varchar(50) NOT NULL,
  `addedby` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`password`, `name`, `email`, `specialist`, `id`, `datetime`, `addedby`) VALUES
(2231, 'Dr. Ariful Islam', 'hofi@gmail.com', 'Cardiology', 1, 'September-20-2021 00:34:31', 'shofi'),
(2021002, 'Dr. Abidur Molla', 'molla@gmail.com', 'Medicine', 2, '', ''),
(2021004, 'Dr. Fatima Akter', 'fatima1991@gmail.com', 'Gynaecology', 4, '', ''),
(2021005, 'Dr. Abdur Rahman', 'abd233@yahoo.com', 'Surgeon', 5, '', ''),
(2021006, 'Dr. Rima Rahman', 'rima321@yahoo.com', 'Cardiology', 6, '', ''),
(2021007, 'Dr. Niloy Sen', 'niloy@gmail.com', 'Medicine', 7, '', ''),
(2021008, 'Dr. Karim Haldar', 'karim@yahoo.com', 'Surgeon', 8, '', ''),
(2021009, 'Dr. Benzima Karim', 'benzu@yahoo.com', 'Surgeon', 9, '', ''),
(2021010, 'Dr. Bina Akter', 'bina@gmail.com', 'Surgeon', 10, '', ''),
(2021011, 'Dr. Mizanur Chowdhury', 'miazan@yahoo.com', 'Surgeon', 11, '', ''),
(12345, 'Dr. Devi Shetty', 'devi@gmail.com', 'Cardiology', 13, 'September-20-2021 01:56:08', ''),
(12345, 'Dr. Irfan', 'pk2231@gmail.com', 'Cardiology', 14, 'September-20-2021 01:30:52', 'shofi');

-- --------------------------------------------------------

--
-- Table structure for table `doc_sp`
--

CREATE TABLE `doc_sp` (
  `sp_id` int(11) NOT NULL,
  `sp_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_sp`
--

INSERT INTO `doc_sp` (`sp_id`, `sp_name`) VALUES
(1, 'Surgeon'),
(2, 'Medicine'),
(3, 'Cardiology'),
(4, 'Urology'),
(5, 'Gynaecology');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_gender` varchar(20) NOT NULL,
  `patient_email` varchar(30) NOT NULL,
  `patient_mobile` varchar(13) NOT NULL,
  `selected_specialist` varchar(30) NOT NULL,
  `selected_doctor` varchar(30) NOT NULL,
  `doc_id` int(13) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` varchar(30) NOT NULL,
  `timeslot` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `patient_name`, `patient_gender`, `patient_email`, `patient_mobile`, `selected_specialist`, `selected_doctor`, `doc_id`, `status`, `date`, `timeslot`) VALUES
(1006, ' Robin', 'Male', ' robin@yahoo.com', '01929393922', '  Cardiology', ' Dr. Devi Shetty', 13, '0', '', ''),
(1007, ' Rakib', 'Male', ' rakib@gmail.com', '01910100023', '  Medicine', ' Dr. Niloy Sen', 7, '', '', ''),
(1008, ' sgdggdd', 'Male', ' ahmed2231@gmai.com', '999999999', '  Cardiology', ' Dr. Devi Shetty', 13, '0', '', ''),
(1011, ' ibadot', 'Male', ' ibadot2231@gmail.com', '08883838', '  Urology', ' Dr. Abbas Ali', 12, '0', '', ''),
(1012, ' ibadot', 'Female', ' ahmed2231@gmai.com', 'hehhd', '  Cardiology', ' Dr. Devi Shetty', 13, '0', '', ''),
(1013, ' sgdggdd', 'Female', ' ibadot2231@gmail.com', '999999999', '  Cardiology', ' Dr. Devi Shetty', 13, '0', '', ''),
(10010, 'iqlal', 'male', 'hhdhhd', 'dhhdhhd', 'dhhhhd', 'dhhdhf', 3, '0', '2021-09-16', ''),
(10011, 'ibadot', '--Select', 'ahmed2231@gmai.com', '08883838', 'Surgeon', '', 0, '', '2021-09-16', '09:30AM - 09:45AM'),
(10012, 'ibadot', 'Male', 'ahmed2231@gmai.com', '08883838', 'Urology', 'Dr. Safik Haldar', 7, '', '2021-09-16', '09:45AM - 10:00AM'),
(10013, 'ibadot', 'Male', 'ibadot2231@gmail.com', '08883838', 'Surgeon', 'Dr. Benzima Karim', 9, '', '2021-09-16', '09:15AM - 09:30AM'),
(10014, 'ibadot', 'Male', 'ibadot2231@gmail.com', '08883838', 'Surgeon', 'Dr. Karim Haldar', 8, '', '2021-09-17', '09:15AM - 09:30AM'),
(10015, 'ibadot', 'Male', 'ahmed2231@gmai.com', '08883838', 'Medicine', 'Dr. Niloy Sen', 7, '', '2021-09-20', '09:15AM - 09:30AM'),
(10016, 'saif', 'Male', 'ibadot2231@gmail.com', '01883773', 'Medicine', 'Dr. Niloy Sen', 7, '', '2021-09-20', '09:00AM - 09:15AM');

-- --------------------------------------------------------

--
-- Table structure for table `patient_booked`
--

CREATE TABLE `patient_booked` (
  `ID` int(13) NOT NULL,
  `patient_name` varchar(30) NOT NULL,
  `patient_gender` varchar(30) NOT NULL,
  `patient_email` varchar(30) NOT NULL,
  `patient_mobile` varchar(30) NOT NULL,
  `checkup_date` date NOT NULL,
  `selected_specialist` varchar(30) NOT NULL,
  `selected_doctor` varchar(30) NOT NULL,
  `doc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Abid Hossain', 'abidhossainmolla@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(2, 'abidmolla', 'test@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `doc_sp`
--
ALTER TABLE `doc_sp`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`,`patient_mobile`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10017;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
