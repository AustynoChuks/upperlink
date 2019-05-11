-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 11, 2019 at 03:22 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upperlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `app_id` int(11) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `email` varchar(300) NOT NULL,
  `coverletter` varchar(1500) NOT NULL,
  `passport` varchar(500) NOT NULL,
  `resumee` varchar(1000) NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`app_id`, `lname`, `fname`, `email`, `coverletter`, `passport`, `resumee`, `phone`) VALUES
(3, 'Ewurum', 'Augustine', 'ewurumaugustine@gmail.com', 'jnun jhnujhnuj kjio', 'passports/542556apple_cinema_30-200x200.jpg', 'resumees/851190cs449_latest.pdf', '07033430969'),
(4, 'Ewurum', 'Augustine', 'ewurumaugustine@gmail.com', 'jnun jhnujhnuj kjio', 'passports/424645apple_cinema_30-200x200.jpg', 'resumees/556729cs449_latest.pdf', '07033430969'),
(5, 'Ewurum', 'Augustine', 'ewurumaugustine@gmail.com', 'jnun jhnujhnuj kjio', 'passports/989727apple_cinema_30-200x200.jpg', 'resumees/303768cs449_latest.pdf', '07033430969'),
(6, 'Ewurum', 'Augustine', 'ewurumaugustine@gmail.com', 'njonojknj jnbjnuj', 'passports/784420canon_eos_5d_1-200x200.jpg', 'resumees/354992Application Form.docx', '07033430969');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`app_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
