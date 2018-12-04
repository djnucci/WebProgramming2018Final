-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 03, 2018 at 11:34 PM
-- Server version: 10.1.36-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rackite_theatre`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movie_ID` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `age_rating` varchar(10) NOT NULL,
  `room_ID` varchar(20) NOT NULL,
  `total_seats` smallint(6) NOT NULL,
  `taken_seats` smallint(6) NOT NULL,
  `row_a_seats` varchar(30) NOT NULL,
  `row_b_seats` varchar(30) NOT NULL,
  `row_c_seats` varchar(30) NOT NULL,
  `3D` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_ID`, `start_time`, `end_time`, `movie_name`, `age_rating`, `room_ID`, `total_seats`, `taken_seats`, `row_a_seats`, `row_b_seats`, `row_c_seats`, `3D`) VALUES
(1, '14:00:00', '15:45:00', '70 Jump Street: Dental Hygiene School', 'PG-13', 'A', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(2, '08:15:00', '10:00:00', '70 Jump Street: Dental Hygiene School', 'PG-13', 'B', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(3, '15:45:00', '17:30:00', '70 Jump Street: Dental Hygiene School', 'PG-13', 'C', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(4, '10:00:00', '11:30:00', '8 Hours of Sleep on Elm Street', 'E', 'A', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 1),
(5, '16:15:00', '17:45:00', '8 Hours of Sleep on Elm Street', 'E', 'B', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 1),
(6, '11:45:00', '13:15:00', '8 Hours of Sleep on Elm Street', 'E', 'C', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 1),
(7, '11:45:00', '13:45:00', 'Stan Lee Cameo\'s: The Movie', 'PG-13', 'A', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(8, '10:15:00', '12:15:00', 'Stan Lee Cameo\'s: The Movie', 'PG-13', 'B', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(9, '13:30:00', '15:30:00', 'Stan Lee Cameo\'s: The Movie', 'PG-13', 'C', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(10, '16:00:00', '17:30:00', 'Obligatory Rom-Com: A Horror Film', 'R', 'A', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(11, '14:30:00', '16:00:00', 'Obligatory Rom-Com: A Horror Film', 'R', 'B', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(12, '08:00:00', '09:30:00', 'Obligatory Rom-Com: A Horror Film', 'R', 'C', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(13, '08:00:00', '09:45:00', 'Spoon: A \'The Office\' Retrospective', 'E', 'A', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(14, '12:30:00', '14:15:00', 'Spoon: A \'The Office\' Retrospective', 'E', 'B', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0),
(15, '09:45:00', '11:30:00', 'Spoon: A \'The Office\' Retrospective', 'E', 'C', 22, 0, '0,0,0,0,0,0,0', '0,0,0,0,0,0,0,0', '0,0,0,0,0,0,0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `dob` date NOT NULL,
  `user_ID` int(11) NOT NULL,
  `seat_ID` smallint(6) NOT NULL,
  `room_ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movie_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
