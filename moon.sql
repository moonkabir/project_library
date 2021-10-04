-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2021 at 07:51 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'lima@gmail.com', '$2a$12$AEoVaY01psVLTkH6J0XvUuJE3Zqu2jJyoqOWekV5bfFlpoq0NkaXa');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `publication` varchar(255) NOT NULL,
  `adding_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `author`, `edition`, `publication`, `adding_date`) VALUES
(1, 'NUMERICAL ANALYSIS', 'A.R VASISHTHA VIPIN VASISHTHA', '4', 'KEDAR NATH RAM NATH', '2020-10-10 22:56:32'),
(4, 'Software Engineering', 'Martin. L Shooman', '1', 'MacGraw-Hill Book Comapany', '2020-10-11 00:22:16'),
(5, 'Introduction To The Theory Of Computation', 'Michael Sipser', '3', 'Michael Sipser', '2020-10-15 21:57:59'),
(6, 'Data Structures', 'Seymour Lipschutz', '3', 'Schaum Series', '2020-10-15 22:07:43'),
(7, 'System Analysis And Design', 'Shin Yen Wu', '4', 'West Publishing company,1994', '2020-10-22 00:50:47'),
(8, 'Compiler Design', 'Alfred V.Aho,jeffery D.Ullman', '5', 'Principles of Compiler Design', '2020-10-22 00:53:06'),
(9, 'Computer Graphics And Multimedia', 'Simon J. Gibbs', '4', 'Environment and framework', '2020-10-22 00:56:26');

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_edition` varchar(255) NOT NULL,
  `book_publication` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_mail` varchar(255) NOT NULL,
  `issue_date` varchar(255) NOT NULL,
  `return_date` varchar(255) NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`id`, `book_name`, `book_id`, `book_author`, `book_edition`, `book_publication`, `student_id`, `student_mail`, `issue_date`, `return_date`) VALUES
(1, 'Software Engineering', 4, 'Martin. L Shooman', '1', 'MacGraw-Hill Book Comapany', 7, 'jui@gmail.com', '2020-10-16 11:13:05', '26th Oct, 2020'),
(7, 'Introduction To The Theory Of Computation', 5, 'Michael Sipser', '3', 'Michael Sipser', 5, 'bhowchan@gmail.com', '2020-10-16 11:21:13', '26th Oct, 2020'),
(6, 'NUMERICAL ANALYSIS', 1, 'A.R VASISHTHA VIPIN VASISHTHA', '4', 'KEDAR NATH RAM NATH', 6, 'liza@gmail.com', '2020-10-16 11:14:31', '26th Oct, 2020'),
(8, 'Computer Graphics And Multimedia', 9, 'Simon J. Gibbs', '4', 'Environment and framework', 3, 'jannat@gmail.com', '2020-10-23 08:13:12', '2nd Nov, 2020'),
(25, 'Data Structures', 6, 'Seymour Lipschutz', '3', 'Schaum Series', 12, 'student@gmail.com', '4th Oct, 2021', '15th Oct, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `book_return`
--

CREATE TABLE `book_return` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `edition` int(11) NOT NULL,
  `book_publication` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `issue_date` varchar(255) NOT NULL,
  `return_date` varchar(255) NOT NULL,
  `sudent_return_book` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_return`
--

INSERT INTO `book_return` (`id`, `book_id`, `book_name`, `book_author`, `edition`, `book_publication`, `student_id`, `issue_date`, `return_date`, `sudent_return_book`) VALUES
(2, 7, 'System Analysis And Design', 'Shin Yen Wu', 4, 'West Publishing company,1994', 12, '4th Oct, 2021', '15th Oct, 2021', '4th Oct, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `full_name`, `address`, `city`, `gender`, `email`, `password`) VALUES
(11, 'bhowchan', 'kasukabi', 'kasukabi', 'male', 'bhow@gmail.com', '$2y$10$VfL0dE5ZtI7/tLJ.3HQlYO66y1gcU0YWOYwI6VcXwOA88JnSzNyES'),
(3, 'jannat', 'pressclub', 'dhaka', 'female', 'jannat@gmail.com', '$2y$10$35jRV4eoc36WHgKW/yH8dukMyPkfXpGA9jvwxI/PgluNEdH.qs5Cq'),
(7, 'jui', 'nobabpur', 'dhaka', 'female', 'jui@gmail.com', '$2y$10$owivyEnzmDmPsy5YXozu3esFkVUcN2KY0AWxKYnj.WOp8qb8gfFgK'),
(10, 'liza', 'polton', 'dhaka', 'female', 'liza@gmail.com', '$2y$10$8t/OTAUqjQY.fK7n3x4iBuceX358EJDbPXa9yOVg54iWUnGVEDEOG'),
(8, 'lima', 'pressclub', 'dhaka', 'female', 'lima@gmail.com', '$2y$10$kRKPgTfygyWVwlJzd7aVxe24NyHVgNe6ZZMdobtY1JQyw9u0Yl.iW'),
(9, 'masaw', 'kasukabi', 'japan', 'male', 'masaw@gmail.com', '$2y$10$4SGUGAAALCeMIMNOlGTQVOfXD8EIk.DNsurrXSyetiVb3NklCz4mO'),
(12, 'Moon Kabir', 'Mitford', 'Dhaka', 'male', 'student@gmail.com', '$2y$10$NSo.DGOTra9oXFP5A6AW1u.Od4pUzqY37A2SzCptTNJHqr8ozcOKe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_return`
--
ALTER TABLE `book_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `book_return`
--
ALTER TABLE `book_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
