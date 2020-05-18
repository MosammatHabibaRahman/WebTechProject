-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2020 at 09:20 AM
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
-- Database: `webtech_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `b_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL,
  `l_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`b_id`, `s_id`, `l_id`) VALUES
(1, 7, 1),
(2, 7, 9),
(3, 1, 1),
(4, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `c_id` int(5) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `no_of_classes` int(5) NOT NULL,
  `course_type` varchar(15) NOT NULL,
  `avg_rating` double NOT NULL,
  `status` varchar(15) NOT NULL,
  `category` varchar(30) NOT NULL,
  `t_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`c_id`, `course_name`, `no_of_classes`, `course_type`, `avg_rating`, `status`, `category`, `t_id`) VALUES
(1, 'Basics to C# Programming', 25, 'Premium', 3.98, 'Complete', 'Programming', 1),
(2, 'Watercolor Basics', 16, 'Free', 3.66, 'Ongoing', 'Art', 2),
(3, 'Advanced C# Programming', 25, 'Premium', 4.11, 'Ongoing', 'Programming', 1),
(4, 'Painting with Gouache', 30, 'Premium', 4.09, 'Complete', 'Art', 2),
(5, 'Web Development Basics', 20, 'Free', 3.75, 'Complete', 'Programming', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `l_id` int(5) NOT NULL,
  `lecture_name` varchar(50) NOT NULL,
  `c_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`l_id`, `lecture_name`, `c_id`) VALUES
(1, 'Introduction to Watercolors', 2),
(2, 'What is Gouache', 4),
(3, 'HTML Syntax', 5),
(4, 'C# OOP', 3),
(5, 'C# Interface', 1),
(6, 'C# Interface Part 2', 1),
(7, 'Getting Started With Gouache', 4),
(8, 'Simple Sunset Painting', 2),
(9, 'Watercolor Tips & Tricks', 2),
(10, 'PHP Syntax', 5);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `s_id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `card no` varchar(20) NOT NULL,
  `expdate` date NOT NULL,
  `code` varchar(5) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `propic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `username`, `email`, `password`, `gender`, `card no`, `expdate`, `code`, `usertype`, `propic`) VALUES
(1, 'Habiba', 'habiba@aiub.edu', '123', 'Female', '111', '2021-07-31', '000', 'Premium Student', 'GenericPic.jpeg'),
(3, 'Aelin', 'aelin.agw.@yahoo.com', '111', 'Female', '1234123412341234', '2021-05-05', '111', 'Premium Student', 'GenericPic.jpeg'),
(4, 'William', 'w&t@yahoo.com', '111', 'Male', '1010202030304040', '2022-09-25', '131', 'Premium Student', 'GenericPic.jpeg'),
(5, 'Ty', 'tyty@gmail.com', '111', 'Male', '0101020203030404', '2021-07-06', '333', 'Premium Student', 'GenericPic.jpeg'),
(6, 'Livvy', 'l15@gmail.com', '123', 'Female', '0987098709870', '2021-06-18', '567', 'Basic Student', 'GenericPic.jpeg'),
(7, 'Ayesha', 'ayesha@yahoo.com', '121', 'Female', '12345678912341', '2023-10-10', '909', 'Premium Student', 'GenericPic.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `l_id` int(5) NOT NULL,
  `c_id` int(5) NOT NULL,
  `s_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`l_id`, `c_id`, `s_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 2, 1),
(5, 2, 3),
(7, 3, 5),
(8, 4, 3),
(9, 4, 5),
(10, 3, 1),
(12, 2, 7),
(13, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `t_id` int(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `bank_accno` varchar(20) NOT NULL,
  `bank_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`t_id`, `username`, `email`, `password`, `gender`, `usertype`, `bank_accno`, `bank_name`) VALUES
(1, 'Cress Darnel', 'crescent@outlook.com', '232', 'Female', 'Teacher', '758455', 'National Bank'),
(2, 'James Carstairs', 'jc@gmail.com', '777', 'Male', 'Teacher', '245678', 'HSBC'),
(3, 'Hideo Tanaka', 'tanaka@yahoo.com', '999', 'Male', 'Teacher', '395486', 'HSBC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `lectures`
--
ALTER TABLE `lectures`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `b_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `c_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lectures`
--
ALTER TABLE `lectures`
  MODIFY `l_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `s_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `l_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `t_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
