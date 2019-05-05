-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 11:23 PM
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
(92, '5cb837196658d', '$2y$10$1/7ZkZZk5R/KE/OXqT0V6Oehsf69MFiowyP1GFKRt8CxWE8oUur4O', 0, 1, 0),
(93, '5cb8378bb5007', '$2y$10$sEPAj4TR9aqQIYLRyU2SW.wRvFeDZssnZzXa0uBDMFkmSZTv0MsRG', 0, 11, 0),
(94, '5cb8382cb81c4', '$2y$10$MM4nJYh02W60mB7j.OAV0OjQEIOPUpPmbQyge8VCz403a6vzTRi6.', 0, 3, 0),
(95, '5cb841e330f4e', '$2y$10$4uMI4ZIaZ908Qk7yqaUfMunwuDAmqFgu98Tp5gmd0WuFwcXx.RWEG', 0, 1, 0),
(96, '5cb842933f5b2', '$2y$10$9WyV/3Qjt8NoviLkhSpMp.uQHmx/r4gX4nhZtrnuHsj4YgLctUg3W', 0, 1, 0),
(97, '5cb84296bb8e9', '$2y$10$mmJKbvH9nVJWy/uQOr4pU.3Ma5T8hxqocEq7USQ7uCzP.aoYBR9PC', 0, 1, 0),
(98, '5cb842be92a22', '$2y$10$DNEj7HsiSW7mcfZlYh8hCeGUr0IoCumRF.ZbKJQMgxUuK4hmQNSNi', 0, 1, 0),
(99, '5cce39230e410', '$2y$10$J.yfRmm4ZG07ouxRzJXKbuo.ErjlRhV2vSP8Ztfrv1UgWhLJDJD7W', 0, 1, 0),
(100, '5cce396b564ef', '$2y$10$ofe7U9rGkDTHpegpW.QQGODDLvwSHdej7FLb5bR1LBchnfVb4g7E6', 0, 1, 0),
(101, '5cce397deb018', '$2y$10$n2XaCOcYjVcmYEbPftKEXeMwKlkpdmgZvUz90KZmjmRTDUEs4/qe6', 0, 1, 0),
(102, '5ccf04d4ca135', '$2y$10$t4PzNQajyyhMoVPa/aU7sOYFIddifS/wXgpoj9zBWIclXwTpGmoMK', 0, 1, 0),
(103, '5ccf04e598bfe', '$2y$10$ibyM.hJvDlG4iMTsa9U/m.Krn1k7HoCAHVYl1ge9QTq2O74I0kapC', 0, 1, 0),
(104, '5ccf05b789dbe', '$2y$10$gKyyr7ICI1JvjLNRzKxJvePRrwa67oiYpdAnzZdRo8lDqqvdOrDqm', 0, 1, 0),
(105, '5ccf2401dcc01', '$2y$10$SdAQtHPP4M/yai8DZLVLSeAQatjk9RAMAQ2Ca5CiRx81nODm/XpNG', 0, 1, 0),
(106, '5ccf246134674', '$2y$10$212IPcgwUOjPRQXlCWkoJeXZrU83tvyf0wOlJWnH.pxyFFmt405Vy', 0, 1, 0),
(107, '5ccf25d109eeb', '$2y$10$NpMk34LxkLKIuLLOtg2G7.dGrK6b4GOMl3R/qXJve10vo7yBlEC/K', 0, 1, 0),
(108, '5ccf25d417a5a', '$2y$10$BE9kR0eWFqiW9YhstGQ.felueeHr3RNbsKn185MvmcnxNx.1eCCme', 0, 1, 0),
(109, '5ccf25da7c910', '$2y$10$/zGf9wndCxuBz0QyI0GT0.oUXJrSMgjkG2HtZ5bnnsakP3EILIAOu', 0, 1, 0),
(110, '5ccf25db10aa0', '$2y$10$C8TsnrCEOwG/4ztjDe8E2Ou5SLg.2FoNJnc2ut6X/LesJuf98CxLO', 0, 1, 0),
(111, '5ccf25ea27d30', '$2y$10$XyqRfTSDWdzX854ZhVrh3.nzntQNmY84Fx428agdaPGENdC2PKgf.', 0, 1, 0),
(112, '5ccf26469b5f9', '$2y$10$RdMiV5sm.KiNjK5OuP6G.Os1j2rGsab.jBIPKS6NnxEGLuFYV7mhG', 0, 1, 0),
(113, '5ccf26483807c', '$2y$10$FvUE7DRFuP2egYqiFRYIeOtI9YXi85xo8f3xAINFjRqh4GjySHt..', 0, 1, 0),
(115, '5ccf27ef1c7d0', '$2y$10$X4BuI2cE8/bvBChUHkHhQOrpwuhmVezt3BEh0krtKr3b/12yL1NpG', 0, 0, 0),
(116, '5ccf28846a804', '$2y$10$SEPpNOStlVm7IZ26gTMae.hiO5wSn/eI5uIdYCvOO7kSyFwcuyyGq', 0, 0, 0),
(117, '5ccf288f5eb0f', '$2y$10$HVZUviW1qoAUJ0EaHuRvTOEO.x331qIKe1lh/1SPOOC6FiHlJx5bS', 0, 0, 0),
(118, '5ccf289c7fd56', '$2y$10$7LxnZkR.I5USh/SOvuhPB.EXJuZPGyxhhZlsHZoLzivo2/2gpEJiG', 0, 0, 0),
(119, '5ccf28a84b438', '$2y$10$52xTVcW482M3cujne1JxGuwvOAy0/OhpfPPYX0OF18D07Sj7HrbBu', 0, 2, 0),
(120, '5ccf28aa77ba5', '$2y$10$Ns8fVKYOV5b7qH8/bASmt.QPC4J7RGoGjx/0hcNlt4JfT7pL1jWoS', 0, 3, 0),
(121, '5ccf28ac9f109', '$2y$10$r0u64toHiLZJ2Xd8ukhTjuL.58Y6fhO1PCuXA1e4GPtBMj.9sFrR6', 0, 4, 0),
(122, '5ccf3820720e2', '$2y$10$m8x1ZOGgPDCdKwLZtcEi1OZilKJ20driBihHEs7FneQYZepJwpqbi', 0, 4, 0);

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
  `userRole` varchar(16) COLLATE utf8mb4_swedish_ci NOT NULL DEFAULT 'User',
  `cookieHash` varchar(64) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `firstName`, `lastName`, `userPassword`, `userHash`, `userRole`, `cookieHash`) VALUES
(1, 'petterssonroger@hotmail.com', 'Roger', 'Pettersson', 'asas', '', 'Admin', '$2y$10$fqL08aKbmnRjiKTPJXsKvuWkGSVvdNGnukl6rI..px2vEjSJYbDNG'),
(2, 'test@test.se', 'Rupert', 'Rumperton', 'testtest', '', 'User', ''),
(3, 'as', 'as', 'as', 'as', '$2y$10$pz0UvQCJECJnlha4uWj2rOZT9yID7gRdoSuMtjt/pg1OCCRCClaru', 'Admin', '$2y$10$w/WhOHEIkFkcoFBPVX78HeI4t1Eo8hjE8IsHcfAggRLMu0bkp/ibq'),
(9, 'Ola@fishface.com', 'Ola', 'Olasson', 'Ola', '$2y$10$I3VOBBFM0ZyZ3WD.J1tPJOulcdEOcvlN8eGv5d4DvKIptByoO2Q1q', 'User', ''),
(36, 'www@aaa.aa', 'aaa', 'aaa', 'aaa', '$2y$10$.O3fJTkTaMhwlylU6w/mxOeLbRij8y/R2ZGLYPLfDDcmgH4mDaPNi', 'User', ''),
(37, 'www@aaa.aa', 'aaa', 'aaa', 'aaa', '$2y$10$JnIrB8kngIjMGunVvdu4rOJOlVfaVwE.s3ZDiS.4yGIRUWcQP3JcC', 'User', ''),
(38, 'es', 'es', 'es', 'es', '$2y$10$LFnQJXOujsF7coCe8CEYYOIAYa7svOqVEEM8OZ0/zesmuzjxGOrvK', 'User', '');

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
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
