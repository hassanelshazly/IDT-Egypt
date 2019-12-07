-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 10:46 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `uni` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `experience` text NOT NULL,
  `position` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `phone`, `email`, `date`, `uni`, `faculty`, `year`, `experience`, `position`, `gender`, `photo`) VALUES
(35, 'Hassan Elshazly', '01140496344', 'eabdogfx@gmail.com', '2019-04-17', 'ASU', 'Faculty of Enginnering', '1994', 'Examples of standard form controls supported in an example form layout.  Inputs Most common form control, text-based input fields. Includes support for all HTML5 types: text, password, datetime, datetime-local, date, month, time, week, number, email, url, search, tel, and color.', 'IT', 'Male', ''),
(36, 'Khloud Samy', '01140496344', 'eabdogfx@gmail.com', '2019-04-12', 'ASU', 'Faculty of Enginnering', '1994', 'Examples of standard form controls supported in an example form layout.  Inputs Most common form control, text-based input fields. Includes support for all HTML5 types: text, password, datetime, datetime-local, date, month, time, week, number, email, url, search, tel, and color.', 'IT', 'Female', ''),
(37, 'Ahmed Zaki', '01140496344', 'eabdogfx@gmail.com', '2019-04-11', 'ASU', 'Faculty of Enginnering', '1994', 'Examples of standard form controls supported in an example form layout.  Inputs Most common form control, text-based input fields. Includes support for all HTML5 types: text, password, datetime, datetime-local, date, month, time, week, number, email, url, search, tel, and color.', 'IT', 'Male', ''),
(63, 'Hassan El shazly', '01140496344', 'eabdogfx@gmail.com', '2019-04-15', 'ASU', 'Engineering', '1994', 'Examples of standard form controls supported in an example form layout.  Inputs Most common form control, text-based input fields. Includes support for all HTML5 types: text, password, datetime, datetime-local, date, month, time, week, number, email, url, search, tel, and color.', 'IT', 'Male', ''),
(64, 'Hosni Adel', '01017393492', 'hosni.adel666@gmail.com', '1999-01-10', 'ain shams', 'Engineering', '1st', 'no thing', 'IT member', 'Male', ''),
(76, 'Mohamed Ashraf', '01140496344', 'ahmedkhalifa1999@gmail.com', '2019-04-08', 'ASU', 'Engineering', '1994', 'Examples of standard form controls supported in an example form layout.  Inputs Most common form control, text-based input fields. Includes support for all HTML5 types: text, password, datetime, datetime-local, date, month, time, week, number, email, url, search, tel, and color.', 'IT', 'Male', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
