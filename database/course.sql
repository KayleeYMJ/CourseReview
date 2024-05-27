-- phpMyAdmin SQL Dump
-- version 5.1.1deb3+bionic1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2022 at 03:01 PM
-- Server version: 8.0.28
-- PHP Version: 7.2.24-0ubuntu0.18.04.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(10) NOT NULL,
  `course_title` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lecturer` varchar(120) NOT NULL,
  `semester` varchar(120) NOT NULL,
  `precondition` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `lecturer`, `semester`, `precondition`) VALUES
('DCEO7140', 'Introduction to Web Design', 'Lecturer', 'Semester 1, Semester 2', 'no'),
('DECO7180', 'Interactive Technology', 'Lecturer', 'Semester 1', 'DECO7140'),
('DECO7250', 'Human-Computer Interaction', 'Lecturer', 'Semester 1, Semester 2', 'no'),
('INFS3202', 'Web Information Systems', 'Tony', 'Semester 1', 'CSSE1001, INFS7903, DECO7180'),
('INFS7900', 'Introduction to Information Systems', 'Lecturer', 'Semester 1, Semester 2', 'no'),
('INFS7903', 'Relational Database Systems', 'Lecturer', 'Semester 1', 'INFS 7900');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
