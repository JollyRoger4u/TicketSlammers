-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 11:04 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketslammers`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `eventName` varchar(64) COLLATE utf8mb4_swedish_ci NOT NULL DEFAULT 'Placeholder Name',
  `eventDsc` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `ticketPrice` int(11) NOT NULL DEFAULT '0',
  `eventImg` varchar(64) COLLATE utf8mb4_swedish_ci NOT NULL DEFAULT 'placeholder.jpg',
  `maxTickets` int(11) NOT NULL DEFAULT '0',
  `soldTickets` int(11) NOT NULL DEFAULT '0',
  `eventDate` date NOT NULL DEFAULT '2019-01-01'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventName`, `eventDsc`, `ticketPrice`, `eventImg`, `maxTickets`, `soldTickets`, `eventDate`) VALUES
(1, 'Diablo Swing Orchestra', 'Placeholder Text', 250, 'DiabloSwingOrchestra.jpg', 2500, 100, '2019-01-01'),
(2, 'Sabaton', 'Metalmania was a heavy metal music festival in Central Europe. It was held annually from 1986 to 2009, and is set to return in 2017. The 2008 event was held on the 8th of March at Spodek in Katowice, Poland.', 550, 'sabaton.jpg', 200, 15, '2019-01-01'),
(3, 'Nightwish', 'Nightwish', 79, 'Nightwish.jpg', 200, 150, '2019-01-01'),
(11, 'Voltaire ', 'Lots and lots of really important text\r\nLots and lots of really important text\r\nLots and lots of really important text\r\nLots and lots of really important text\r\nLots and lots of really important text\r\nLots and lots of really important text\r\nLots and lots of really important text\r\nLots and lots of really important text\r\nLots and lots of really important text\r\nLorem Ipsum asså', 99, 'voltaire.jpg', 1500, 329, '2019-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `ID` int(11) NOT NULL,
  `administrator` int(2) NOT NULL DEFAULT '0',
  `user` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ID` int(11) NOT NULL,
  `tickSerial` varchar(128) COLLATE utf8mb4_swedish_ci NOT NULL,
  `tickHash` varchar(128) COLLATE utf8mb4_swedish_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `eventID` int(11) NOT NULL,
  `userID` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ID`, `tickSerial`, `tickHash`, `used`, `eventID`, `userID`) VALUES
(1, '5cb60593300', '1', 0, 1, 0),
(2, '5cb607e2b8b', '$2y$10$aNuq', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_swedish_ci NOT NULL,
  `firstName` varchar(32) COLLATE utf8mb4_swedish_ci NOT NULL,
  `lastName` varchar(32) COLLATE utf8mb4_swedish_ci NOT NULL,
  `userPassword` varchar(64) COLLATE utf8mb4_swedish_ci NOT NULL,
  `userHash` varchar(64) COLLATE utf8mb4_swedish_ci NOT NULL,
  `userRole` varchar(16) COLLATE utf8mb4_swedish_ci NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `firstName`, `lastName`, `userPassword`, `userHash`, `userRole`) VALUES
(1, 'petterssonroger@hotmail.com', 'Roger', 'Pettersson', 'asas', '', 'Admin'),
(2, 'test@test.se', 'Rupert', 'Rumperton', 'testtest', '', 'User'),
(3, 'as', 'as', 'as', 'as', '', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`),
  ADD UNIQUE KEY `ticketID` (`eventID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `eventID` (`eventID`),
  ADD KEY `ownerID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userID` (`userID`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`eventID`) REFERENCES `events` (`eventID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
