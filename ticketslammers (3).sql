-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 11:47 PM
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
(118, '5ccf289c7fd56', '$2y$10$7LxnZkR.I5USh/SOvuhPB.EXJuZPGyxhhZlsHZoLzivo2/2gpEJiG', 0, 0, 0),
(119, '5ccf28a84b438', '$2y$10$52xTVcW482M3cujne1JxGuwvOAy0/OhpfPPYX0OF18D07Sj7HrbBu', 0, 2, 0),
(120, '5ccf28aa77ba5', '$2y$10$Ns8fVKYOV5b7qH8/bASmt.QPC4J7RGoGjx/0hcNlt4JfT7pL1jWoS', 0, 3, 0),
(121, '5ccf28ac9f109', '$2y$10$r0u64toHiLZJ2Xd8ukhTjuL.58Y6fhO1PCuXA1e4GPtBMj.9sFrR6', 0, 4, 0),
(122, '5ccf3820720e2', '$2y$10$m8x1ZOGgPDCdKwLZtcEi1OZilKJ20driBihHEs7FneQYZepJwpqbi', 0, 4, 0),
(123, '5cead78ab8fbd', '$2y$10$v2tjABd34Z.VH1JbqSF6P.E2H.ldgAtybUxtbbe3bA0Vf9.yb86R6', 0, 11, 0),
(124, '5cead78c85403', '$2y$10$bcLeOILNqYxVrBpaiJOwCujei1DII0FAIuGbWmOlYzwKVVnz//GdK', 0, 11, 0),
(125, '5cead78dba008', '$2y$10$RVTlmFfAmT.mY5YLnj/PKO/O7biE5U2fmvfTXrnpBuqfVeSUhWNHu', 0, 11, 0),
(126, '5cead7b5ce565', '$2y$10$Ao.y6Ma7HzCNWL3y.WKoveAcwM4TVIRbBfcxzmJdFhZga8FJSzq8u', 0, 11, 0),
(127, '5ceaed63c3754', '$2y$10$JeObyx.orp/pnw6zvV3xo.MITTkFuOrVg22isTLnQRBXTWXrhsM4y', 0, 3, 3),
(128, '5ceaed6402d58', '$2y$10$iV/kVG61KaOWygG6Eem5m.cNfnITX04IiEmmdbhzJIoLpCg9rRBHa', 0, 3, 3),
(129, '5ceaed643177b', '$2y$10$ZpgaDzF5mLlMc4kh1Nh.H.E1nORdS58QnusHOEkwUoWL.YS0K8PU2', 0, 3, 3),
(130, '5ceaed6480d16', '$2y$10$7Lipi9ZW4cdzQZ7LPL9O1ec9k4pN6.troIzW9YHbzWgmbcTFmXCvO', 0, 3, 3),
(131, '5ceaed64ae3b1', '$2y$10$JBR7S3j0AOy5aSyz6uQlF.w3XLnDdfLsVAF6WZAbgB7pX6N8Jo3om', 0, 3, 3),
(132, '5ceaed64db27b', '$2y$10$IN0KtL/RIacUMrN.1zAl4u341vzTnsl4MVBmolCEyMidh/a8JY4Re', 0, 3, 3),
(133, '5ceaed650cdbc', '$2y$10$WmG1LzujW5E0O.zBmjq1UuPKDiPubHOZ..ndTKflBRM5L5EfFP81O', 0, 3, 3),
(134, '5ceaed653236d', '$2y$10$7s4mkdIE8cxh6VGqmEvCceUs7rxnvlV/qzyxckRKDgKRnK96mOGpu', 0, 3, 3),
(135, '5ceaed65580ee', '$2y$10$NgeZsGdbUMBn4RU8ycSkQeO.a2HiiQL0t.n/o8pvF/I4kGz0uLc0e', 0, 3, 3),
(136, '5ceaed6587ab1', '$2y$10$JAa26VezRgB3TWY8r3rYuen2ovmo1NBTiEEWDjfuYHLW8P1iUkBYK', 0, 3, 3),
(137, '5ceaed65ad832', '$2y$10$dgJFKbpvnsRnhZYtbR9tPugOtyyAfgJ6rcl7xVIOLE9Uzj9XzawDi', 0, 3, 3),
(138, '5ceaed65cacf9', '$2y$10$rSISQk4A/u.9rzwFSr31FOAXwQB2ikKiJi/Tfgcn5s//WMK1Lw9Z2', 0, 3, 3),
(139, '5ceaed65eeb39', '$2y$10$5Tua9OkL7n4O32TLwBM8HOe7LHIu8lI/P04t9BRZ6Ss5lU4eRq/dG', 0, 3, 3),
(140, '5ceaed6617dc0', '$2y$10$pU5TEZFa/Q4MJbGAAQAppuxUhz/ychoy98QFUTxKe9AE9Z1o.Hd3G', 0, 3, 3),
(141, '5ceaed663db41', '$2y$10$1cFA/aTGbtzg0CGld0lW6uugaC0/vXi744oK0tYs.GAfnfn8bkvVq', 0, 3, 3),
(142, '5ceaed667752e', '$2y$10$GHRH0MO7cYu1WXnWBtJc9e2sngyGoDkMbxVL20lFhS5fYpBTJ5n4a', 0, 3, 3),
(143, '5ceaed669f5d8', '$2y$10$vp9DUSs2kN2yj0JYl24OLuMU6A9A2JNe.SJq4gXTc6AQuGb9xgL2m', 0, 3, 3),
(144, '5ceaed66d264c', '$2y$10$wEpU6I3gV0S2tddist5Cc.VEHzMhocpSlYoSCUzriF8XwKkwCzu9O', 0, 3, 3),
(145, '5ceaed6709b66', '$2y$10$ilchkQXV4Ce2DpmYUX43FOB0eNWXCDnrCvjA018mpUJ1SSNm3QOKi', 0, 3, 3),
(146, '5ceaed6731827', '$2y$10$WE/22jxNKYHvQuYEOkeWseI9L.6114Lbw3uCseyYNqjwQWMrZaf1e', 0, 3, 3),
(147, '5ceaed675b041', '$2y$10$EDd37B2AxuBYwk0pdDfiW.8zH6cHa9QxeCf42zQQIf.hemMU04JAe', 0, 3, 3),
(148, '5ceaed67980df', '$2y$10$WU95I7FVLbXWV9JPDVSA6OGJdjN9GWNa4ipOwwmiFWISgo/crqdoK', 0, 3, 3),
(149, '5ceaed67b9fdf', '$2y$10$dwuJTIux9gQjhhpXcUzqZ.IMQ5mg/Tzz7dsRpe.HhCMvACwp1U6RS', 0, 3, 3),
(150, '5ceaed67dd267', '$2y$10$5/dLWnrwrXpcxjrmYvLiKeJvboP/qxZyBywIl4uMnVqzjZQs6X2ue', 0, 3, 3),
(151, '5ceaed6813011', '$2y$10$auZZxTXlzF1TdLA1tJ4M8eKEena/Oyn96gyk4pWfmwgDiUuQleUDC', 0, 3, 3),
(152, '5ceaed683c82b', '$2y$10$fD/D.RLrEHaLkLrkZJGJ6eWbqe/PE10XjS8L5FbGjmGarAVTskEny', 0, 3, 3),
(153, '5ceaed688c595', '$2y$10$djUcpAOYseBjN9aeijFnWehkOdqrNBMtqgHm3f6jE2DX/xWaZ5NP.', 0, 3, 3),
(154, '5ceaed68b26fe', '$2y$10$h2.dgNetS6KmIhmxktPbBuQb90vHT9uEJHIv.RiY237OHx5dclwDu', 0, 3, 3),
(155, '5ceaed68dc6e8', '$2y$10$aJisl/HX5EfVGK008MZU.eCdID2OqY1x8ZqfJHMJ7RzGgZ8BMRXxS', 0, 3, 3),
(156, '5ceaed690da59', '$2y$10$3gXpsBdjqT5rgzXLITPd9umXgUORG1dOTNaAIytJiNP9RX9fX.taK', 0, 3, 3),
(157, '5ceaed693c094', '$2y$10$xvy7OnfZPKL1WcM51NJ7p.Urla6bRCVmzFPDDNVGZTbceEs3HnxAS', 0, 3, 3),
(158, '5ceaed6976e0a', '$2y$10$8eRW9GQPG6Qo5gCVCuUfzO0NV2qV5FKcpJVtgrvO2s2fdPEmRA7kC', 0, 3, 3),
(159, '5ceaed699c3ba', '$2y$10$7uQiHw05K7L75kijBZ6DJ.9vG3EnTG9eArBY2HItPrF28QaxbXdJW', 0, 3, 3),
(160, '5ceaed69c01fb', '$2y$10$pa8Vs8cuqcWKYoQENGTNje0zGDq6QmjUh8Z0ubp3GMoK0QQV9rnzm', 0, 3, 3),
(161, '5ceaed69ef3ee', '$2y$10$DkY8MsikJGbyvAls0TW0XuOuz1UBJYC5dpEUK25dppd3115bLb3RC', 0, 3, 3),
(162, '5ceaed6a1e04e', '$2y$10$HAEB9Gcwn99te6uxPqjPJ.rXc6Al2TVAhd9LYW7njmLopZ1w9SWaK', 0, 3, 3),
(163, '5ceaed6a460f7', '$2y$10$YwyDMKR.38K3oyE/1X7kvudoG.F4tar3vVfd789tLyw01EFiGGNbu', 0, 3, 3),
(164, '5ceaed6a75abb', '$2y$10$dvTgDLU5i1yMirnnNkw9qur4W9Bm2ZElh.i5QT52A2jO4vFrvOT0.', 0, 3, 3),
(165, '5ceaed6aa9eb7', '$2y$10$2TsZceQaBrkRHhzMjWnMueLegPoxa2/6haB2hxtC8FtE94RETaPKe', 0, 3, 3),
(166, '5ceaed6ac6f96', '$2y$10$cEQe3zy5memXFdigr7ub8eIWu/0yyGMLZFMJ2of0XRMIhbjO3j0vC', 0, 3, 3),
(167, '5ceaed6ae8aae', '$2y$10$4jutfZUKLM.XV4mSsOfEzeFHc.3wkd2F51bixkzhSA5KiCvGLzCeS', 0, 3, 3),
(168, '5ceaed6b17ede', '$2y$10$D1zRhu3p6BayJr2vzjqRW.v1jL/8pX9zDM2MXyZmbHcxccF3p49cS', 0, 3, 3),
(169, '5ceaed6b3ff87', '$2y$10$/b0boHUeVCCKrpDcZG0vqOzDzf/h8PGHpsTh7hJ5X6UPF1.eamznC', 0, 3, 3),
(170, '5ceaed6b8d9c9', '$2y$10$EV0Af62ABrlBtEnCDStQxuaYG15geLqSpU65gW7.L9GbjCb8R66O2', 0, 3, 3),
(171, '5ceaed6bb2b92', '$2y$10$xEACpfQaRapND6JgSbX/beiR4Bw.Ms3zAAR1sXMwFBio3hdSl27fi', 0, 3, 3),
(172, '5ceaed6bdeabc', '$2y$10$o5OImQEnGPPgfsoOVdR.H.O8AMrJffqnGFL9vXRSfA20/kjxmJwYG', 0, 3, 3),
(173, '5ceaed6c14096', '$2y$10$A0xdaL6bND081Yw13AuztOMC00kwLlkTK983N5f9dZrZLp5DJO2Xe', 0, 3, 3),
(174, '5ceaed6c3ffc0', '$2y$10$8lEKs/Fj.nukFf3ecRcpO.50h7hhAwXBZ3dE9mQK9zVvf6IM2QSBy', 0, 3, 3),
(175, '5ceaed6c83208', '$2y$10$PBx.uUh40nibBi/4QeeZt.6Rg0YXxUjrIrw9u1MwA08zkJpo1kXJ.', 0, 3, 3),
(176, '5ceaed6cb2bcb', '$2y$10$uYa6nKjFml/wumJeJG1Kv.jvqIIlPtk1q6Vrhu7uuUbkfv/Fj3wh6', 0, 3, 3),
(177, '5ceaed6cda88d', '$2y$10$tziYf/E.McrvPzAdHg6Zq.TAIw4yprzzS0oOOoDV9XbWw5l1vPAP2', 0, 3, 3),
(178, '5ceaed6d0f2ae', '$2y$10$Stz9NXIV.2LdLR37BFLUbeSnndzW7f6qgSdqAdHnjR/7YGNRpyRIm', 0, 3, 3),
(179, '5ceaed6d3e4a1', '$2y$10$gdB59MfZ3SyW9cyhQw9b4eOnHifzA/U7t9HaOirdQuheSSXbWiehi', 0, 3, 3),
(180, '5ceaed6d76eee', '$2y$10$kiuUL9tellJiTfMCxGItqORKK5l6K/UQ2FR/Yxj12brHEIH.6s.Va', 0, 3, 3),
(181, '5ceaed6d9e7c8', '$2y$10$gDW726fXikErI81ampRCOeOoKMrGRUByHvWWwsTKMfL4Oa1T9J0si', 0, 3, 3),
(182, '5ceaed6dc31c0', '$2y$10$S605zSessrCVT9iLK8trxeGC1I74l6TdFwIfXvavH3gDBlmyRxiOq', 0, 3, 3),
(183, '5ceaed6de5890', '$2y$10$koFd0Kx1qzS0OiD09XD9F.7F7r90DDcBV.FmCxGKjccPFOgc6jZ/i', 0, 3, 3),
(184, '5ceaed6e0f2e7', '$2y$10$DxAc/QRy8M4f2W2ZhJpxKOQ.Q9.byubDlu3LRdk6NVfNIF0vT4gxi', 0, 3, 3),
(185, '5ceaed6e344b0', '$2y$10$Xm/OzDuRSOZDAdRO.xOEiOPFWEWzVYIBkcMqtGh4bdXMt0Nso5xGO', 0, 3, 3),
(186, '5ceaed6e8421b', '$2y$10$nSjdSVV0sKiSC/z/bV84POugLzrVqiN1Tqp/XI/MMnJ6TDcDiqPlG', 0, 3, 3),
(187, '5ceaed6ea7c73', '$2y$10$OGC.mNjP08f7VZyrHxJ2E.xYOhWEfdlxda/Q539EZAPYHMJgMnmJy', 0, 3, 3),
(188, '5ceaed6ed148d', '$2y$10$EOkB6z9Au97gqo96AfFT.uJvjecuAkT0hleXpi8s0GD/bRkv2szY6', 0, 3, 3),
(189, '5ceaed6f1a2eb', '$2y$10$E.1iL9nvKsEQOyh.YmS50ex.dnLV9hCGiQx3hLG2J4YFc9lHenFyG', 0, 3, 3),
(190, '5ceaed6f4006c', '$2y$10$v8m6okDE88d4sHZGp7X.KecoZW3IZA.K2frAascuV7kTorm.w9PwG', 0, 3, 3),
(191, '5ceaed6f7d8da', '$2y$10$0UndQljBlvN8MGWh0CLG6./IROAhum.tAGeo79SDtLqdrbZY/tRby', 0, 3, 3),
(192, '5ceaed6f9a5d1', '$2y$10$OUgwOSUKnm1bOtpEv2oHbeW6n2MMr9UI6hT2MRrRrLsNGgPR.6h5O', 0, 3, 3),
(193, '5ceaed6fb8268', '$2y$10$0QW0EALwiv0rAexiK8k/fusrCkGZR1VT8o5598U9s9WR6uR3E4sDy', 0, 3, 3),
(194, '5ceaed6fdb8d8', '$2y$10$q38lGkyOfxbizAQEE7.J0.s5gPx4y8cFWXOZLLTLbhovHlbVUfO/y', 0, 3, 3),
(195, '5ceaed700532f', '$2y$10$U0bMEC2i3TYuswSLGzokvegtT6HyVQYfKbQWmoE0tW3TG2JsUY4tW', 0, 3, 3),
(196, '5ceaed70227f6', '$2y$10$2TGFDNzEHQNeD7UmPDF31OQAa7HcVsfvshqt.xJU6iwhjG02CIftG', 0, 3, 3),
(197, '5ceaed704ac88', '$2y$10$IN2rDZUDNyxWX78hQFS7oO9Tu9HGzkuzUdGPZoK2ROAkFoXItWN4W', 0, 3, 3),
(198, '5ceaed7077f3a', '$2y$10$Ve78eaEWmerl9PuNBU7efuwi9yHZfcn.Qp9egGHjtIyhE9YbfX15e', 0, 3, 3),
(199, '5ceaed7099a52', '$2y$10$86hj6h91OJMR/iNdE5asdOEpAoa.7oYU5yCouED.xbZuTWV4rvWfa', 0, 3, 3),
(200, '5ceaed70c5594', '$2y$10$TC9vY3Ow27Gt4aNMU/LgouZRTu8KnaKo8rYXxbw.NYi6UOULzPbkS', 0, 3, 3),
(201, '5ceaed7107a79', '$2y$10$ETBI9iWPHN1Gzd7.YyGXe.sBWYdRGVVSoR0jaRc/.WuOsqDQkF.9G', 0, 3, 3),
(202, '5ceaed71289d9', '$2y$10$vsWgZVTpMCd9r/d.hgIkR.c318uSAyhegO1ay9H2KKexk5rd2EQCu', 0, 3, 3),
(203, '5ceaed714e75a', '$2y$10$L0kRoe7hFCerTdGBXQn95e64YiyqVw0o4xjIUJuvN9TwgckJ/MB9K', 0, 3, 3),
(204, '5ceaed7183af6', '$2y$10$/mKdtdDGINSJ9nqW.e2Dqe6WkE221wRdc/IDviEtNx25wOkb1AokW', 0, 3, 3),
(205, '5ceaed71a4a56', '$2y$10$qf/A4s10jKuUJ4dGMOW8zuXcaafftIHXF1lKXFO4KaOcTCqDiG/jq', 0, 3, 3),
(206, '5ceaed71c26ed', '$2y$10$v8RC0yHeRRD9VIFjz7fPqOsXBrPewlutYrWsTQ95cTBKO3v2swYJu', 0, 3, 3),
(207, '5ceaed71e7c9e', '$2y$10$Rv7FmZiffWhNZjEHbE.SSO5NOgW0hKP6YHg59FRJi.LJ1ZbJXlgZy', 0, 3, 3),
(208, '5ceaed721789e', '$2y$10$3o4nZGt8tSSZDSDOjflRN.yPyeglrBVEUTYfvtWdatdsUKageKBM6', 0, 3, 3),
(209, '5ceaed723a356', '$2y$10$.b0oMvApQuavPKFXzNpGqu2pwVhdwHDbcCNZer2NtuslZn2EIcLm2', 0, 3, 3),
(210, '5ceaed727e156', '$2y$10$4u9vQgj.2FHLk3mS3hD.wuD1gCgT60hO47lJyKXtsnPGUUzY6l1mm', 0, 3, 3),
(211, '5ceaed729fc6e', '$2y$10$3gxmu7D3SZMtUsl8QEXFCuNe//dGNKzMVeAhiCWLRlvXxvplFnP4C', 0, 3, 3),
(212, '5ceaed72bd135', '$2y$10$rEZ0UxSohkYT2vDckUliQu6C0xLFmSmoX37CFulXH/Vq5UAODT3Zm', 0, 3, 3),
(213, '5ceaed72dadcc', '$2y$10$QN26DDBOgZr/cJld7cIes.0AuJPHrmEAV0Pclyhu9k3Jx8N16.uo6', 0, 3, 3),
(214, '5ceaed7304053', '$2y$10$8kRNJBupCPPR.jZAMbOW1OoyENqqIeXMF6F0QYz8rYOEZBZ0QtrQy', 0, 3, 3),
(215, '5ceaed7332e5e', '$2y$10$Dj60PHn8aFNrRM3HSfM.WesmjWCtO1pKcOWqjlOF2a4YJTefMCX0.', 0, 3, 3),
(216, '5ceaed7357856', '$2y$10$.Sfdz7ImIPHSkD4GuajgZez6rwgCSR3.3wD/dLYLamPI.s2AobygK', 0, 3, 3),
(217, '5ceaed73823f8', '$2y$10$TxmjgXUzHEsUwLK8a4SRFexIdFsLI4QFkg2gVgAKYS2ZL9ATtj6HC', 0, 3, 3),
(218, '5ceaed73acf9a', '$2y$10$iiPrn9068UL8XTihYgXBbu6gezRc43UXYATLM2jc3lD5tMnt8gJiu', 0, 3, 3),
(219, '5ceaed73e59e8', '$2y$10$hvkm6.aA3ud1PdVtLAUML.o6amBWaY74qQBgqbDBOpp/9Dg8T/e06', 0, 3, 3),
(220, '5ceaed741bb79', '$2y$10$j1PIuXkE3IphGwGakWCLbe1Qivg9YJe4nHbk4Q3/xjaAh2GHo8UVK', 0, 3, 3),
(221, '5ceaed7443453', '$2y$10$Ib9EW4XHQJAv/izfeMDwK.HgFmNrznn4LswJ4OrlzvoUntiyh2VmS', 0, 3, 3),
(222, '5ceaed74856fa', '$2y$10$MixvhZXZnz8zb0w/mLDKZ.LQWO2Cn92oPjM/zaHDrxrNX30aPNkRG', 0, 3, 3),
(223, '5ceaed74aef14', '$2y$10$51e.qzSO36dnCnBvMjWR0.YxYnd7OUNhOXCY7pbNNdzu2cjbmEjK2', 0, 3, 3),
(224, '5ceaed74ccbab', '$2y$10$Br58UZanso2ROsNxIIUO7eNtxbaIr67XlITzX/8ZU/ZbWNrw65Dhi', 0, 3, 3),
(225, '5ceaed75040c5', '$2y$10$htA9pEtcEXUr7gPDSSSmTeEUHKNMiPl4HZog5gy2s5MMbu.Dg4Kpu', 0, 3, 3),
(226, '5ceaed7521d5c', '$2y$10$MAfJ7eoY4XfbYjTg6W5WHOfX9dqkBFHbkgvNDN89Kn4Urn6Fw3bcK', 0, 3, 3),
(227, '5ceaed75453cc', '$2y$10$UMo.KEZA5GMZ3JF1fTSR..9ntuaR1KxSapOoLZO8QFIKfnntMGmCG', 0, 3, 3),
(228, '5ceaed75774a0', '$2y$10$QthuzhRbqPEexYOP9D8n8edhJl3fTfsV8Uy5a6rQ.rM8WqIkrHTOi', 0, 3, 3),
(229, '5ceaed759ce39', '$2y$10$8hFSXclkLbGvh5AOBCtmbuSR7DB9ikl6nGH2B6ZPFvzMM0DdefBui', 0, 3, 3),
(230, '5ceaed75cb85c', '$2y$10$qyyYilUA0wNlUmdEIMJM1em/7uccaobnqwY6ZTwKKLk4dlq5oimAW', 0, 3, 3),
(231, '5ceaed7606427', '$2y$10$kGn5i3Zq3NuOQXfYUR4MceuP/7uTQuE0e1semQ0be55sqxLvPkcha', 0, 3, 3),
(232, '5ceaed762a267', '$2y$10$LZxDaBpHFBitfKecQqHgkO3Izp8LX4wpSESprGvlvk/N7gALYX3X6', 0, 3, 3),
(233, '5ceaed7651758', '$2y$10$fKY9OIvqemZ7HkAnnnE26OZzNsBefOx2gspi5OaVFRdltlvHKgDE2', 0, 3, 3),
(234, '5ceaed76949a0', '$2y$10$b6icDe2vbQtuo0KI1mXehel72sGBed5ff5FeSeIm6mKWfTILZ5fia', 0, 3, 3),
(235, '5ceaed76b7458', '$2y$10$YuYS60s61alHT7KBEKSdquxQ6UoM3ZIzbpl0LbzTCtrvwnkhZFVqq', 0, 3, 3),
(236, '5ceaed76e56ab', '$2y$10$ydsxFm003JW6NO0xa2dEju5BTnz1gvVjV/m3rocUoQn7V1na93LLm', 0, 3, 3),
(237, '5ceaed7720e2e', '$2y$10$Yg0U4Kn.ap3S75J3WZ3iMetNgHZ3wgFdzm9TZqy2cs87/6tbKY2xu', 0, 3, 3),
(238, '5ceaed774cd59', '$2y$10$iF7OBbHXt68pECWF868O/ewI7QDVmzz65dewWSasSYIt7nQLC..V6', 0, 3, 3),
(239, '5ceaed7792a99', '$2y$10$rGkhgGUPgfUf/ZXnQiuL2eEQuLiz0gplVcCwCyh8jc05.r6cVy/qG', 0, 3, 3),
(240, '5ceaed77b68d9', '$2y$10$3Z31KYzX9lbllIZXVK57IefR9VtIhJK1QNxtq2UkD7D4l9.FNZ3e.', 0, 3, 3),
(241, '5ceaed77e00f3', '$2y$10$eZMFdtfXpziaLb.6YFMD8uyNglkMVCjZkMrWI21s65uyFjBVXasQ2', 0, 3, 3),
(242, '5ceaed7811c34', '$2y$10$bnw56GCZGirH4RZq11FWzOXmF9XwSW2mJQgDbFhkcdq7CvGjIue6m', 0, 3, 3),
(243, '5ceaed783b44e', '$2y$10$4CYv1c/VxTNvVa2ICA2XPeJvDgP1gfW2zfYHhyk/dKh.Y9SNi7y8G', 0, 3, 3),
(244, '5ceaed78857df', '$2y$10$4dGsk2Bl2wc7XkXgVy0Fs.Cuh0KZ8gsz0SOx8dL9aIhfli2V4HXnC', 0, 3, 3),
(245, '5ceaed78a72f7', '$2y$10$s04WEkrj24Xje.XR03Sy2OF87rh6kgb1Oy5Xuq8g6Yw06TNU/2yFq', 0, 3, 3),
(246, '5ceaed78c4ba6', '$2y$10$au9JFVZ4H7sPmf7QSNG5WeYU7Dh7uICNVyOnXoCK7ewqXkAef2bam', 0, 3, 3),
(247, '5ceaed7902652', '$2y$10$BtdMWmX02osuOQnjX8XKVOUbVp9w7TNYdEHPATFYWEehu87vY20Iq', 0, 3, 3),
(248, '5ceaed79260aa', '$2y$10$6fYmR1VnC1HsTZKoRwz8W.PQ/IHfBsZeKSzrL/UYIzwMqlzwSwiXa', 0, 3, 3),
(249, '5ceaed794d983', '$2y$10$/Zr1NImRZb3/ZsjxFnZMoOYjqTRBJDCQiYQzFmC5izUuuFElMFSnu', 0, 3, 3),
(250, '5ceaed7982938', '$2y$10$2/vJD5LSujnLscUTxWOKNOFYUF4ch6aFeoTBbTtLAmpWPJQtmfbJq', 0, 3, 3),
(251, '5ceaed79af41a', '$2y$10$9.pF.fQrkb8CHhKe3nKsuuk7tRBYyFxU8xJsUSUsMolULljr.qLGe', 0, 3, 3),
(252, '5ceaed79df5ad', '$2y$10$Z2e/BY50qI6FzrtO4g8x2e2Zm7mZNpAEw.kALitNB/fNJ4PFreb.y', 0, 3, 3),
(253, '5ceaed7a1091e', '$2y$10$ZktC/9HyVN1gXfwuyFPnqujCh8W943Aj5bScxp6dJKtZKgAkXG/Pu', 0, 3, 3),
(254, '5ceaed7a40ab1', '$2y$10$rsI2rptP92/scXx8evAczeRJocSoPKoIwfl4jSH4xVCbbtNoAi5pC', 0, 3, 3),
(255, '5ceaed7a80a30', '$2y$10$2VWKEsIeIquvL3N3Drcpn.ObUR8yDeXn4UMJObk5fe2c1ZtR24XKy', 0, 3, 3),
(256, '5ceaed7aa7369', '$2y$10$XEDhfHbGsingUCb2BqWV9uY2ii0EX/3e8hZqKvwXXIfz49.k5U3yu', 0, 3, 3),
(257, '5ceaed7acd0ea', '$2y$10$QJq8zy5wqlFSqgA2gEU2tOroCfrBMzjl8lroZjuFry1TIhb/tUkyy', 0, 3, 3),
(258, '5ceaed7af2a83', '$2y$10$0qmux.e7/M8X2qliJUM9TuOW5CcByBRgDnIG6rByeV/z2ZauhYuoG', 0, 3, 3),
(259, '5ceaed7b2a385', '$2y$10$BKdd560d32N8RT5iYAblUea3PF5hTouFxmnEcUDP5GN2dX7Va5bFW', 0, 3, 3),
(260, '5ceaed7b51c5f', '$2y$10$0xJ791l1ytWbMplR47cziOn2ZyRddrbQ2LlASJvqcilCU9lke6baO', 0, 3, 3),
(261, '5ceaed7b8605b', '$2y$10$7UqRyvFgZSXcNo8Hr.6JxevaHj8qSGJDherJ6d1AMs/Jm3hC3/QmC', 0, 3, 3),
(262, '5ceaed7bb795e', '$2y$10$bzM0w.SkpE5vGO0OaSp0V.MLE6PLTs0iKzxwAzT3eE26aogz7Kqoa', 0, 3, 3),
(263, '5ceaed7bea5ea', '$2y$10$f.FUX62UV0QqXx1GQqRCmua2MNDIE1eSL86qTJ4OohXIRMgnhasam', 0, 3, 3),
(264, '5ceaed7c1f00c', '$2y$10$pwTW7djhDukuW38.ctgnh.n5OjOOWAdXfZIEEY7wJbKIb648FPeVS', 0, 3, 3),
(265, '5ceaed7c46ccd', '$2y$10$5XhORl2iBmN7U9oGH1WxaOR0VkbRW7H2YNUAXpXStvzNbdvdopp1C', 0, 3, 3),
(266, '5ceaed7c7eb62', '$2y$10$rV/fh9aKhWSTZ5Rw5rwSkuI5d8H9xgTcSaTloKSQQNIPvZZ1.rXQ6', 0, 3, 3),
(267, '5ceaed7caf8ae', '$2y$10$qg4APsJTo8G1UraFXC6EMeG4X4.VRP59q9o1VACKW6ZA6FEIDdJ56', 0, 3, 3),
(268, '5ceaed7cd756f', '$2y$10$HNb9GqdaURLVYXQ6dt78lu9VVazc.ibWEMKYpB/sJu2tGnwhXMpf.', 0, 3, 3),
(269, '5ceaed7d08cc8', '$2y$10$9GK.8iOutp6UOUeL5a57MuPQ3.Qp2sBUBlrJEDEEHHr1koiHu2tji', 0, 3, 3),
(270, '5ceaed7d2e661', '$2y$10$Blcu5/f9QYfX3VkL5o2Q1OAc.mJbfApwnb5OGfnBLbXRbTVqaIQWu', 0, 3, 3),
(271, '5ceaed7d4bf10', '$2y$10$yKnQUmWh4WVhQ0asnSCxO.bU9EPb08Iis.okoq5XCcCW7xgEZ6j/y', 0, 3, 3),
(272, '5ceaed7d985c9', '$2y$10$sq0URxEQGtQ58IiiMupmdeJR8mty4mqmJNyieZfEAAM3Ef8ZOHjpS', 0, 3, 3),
(273, '5ceaed7db5a90', '$2y$10$VPIKKe/AwgqCLiPDRH/YPuoksbXHTMulrlkru72HxLK3QUEvKG9OW', 0, 3, 3),
(274, '5ceaed7ddb811', '$2y$10$n.4VTSBOyXSP55C7LDXfyuBSC9qZnFVMr1X/UGk8kbkvRoZLf2AXq', 0, 3, 3),
(275, '5ceaed7e0eeaa', '$2y$10$7KkKsKdV71A4npBuofJFQO0kv79K2Lae2/GBtKc3IJ7hAatJKlUnu', 0, 3, 3),
(276, '5ceaed7e49068', '$2y$10$P/i1cxWPnB1CmW5N0BLHE.7FEPRapsUfb9xbugX1IbXkDS2GWslbm', 0, 3, 3),
(277, '5ceaed7e8e1f0', '$2y$10$lZjuIGFUwsXWdaBiojZeeOVtC30ROugjYi7sIsZX85NNsBZV.pEd2', 0, 3, 3),
(278, '5ceaed7eaf920', '$2y$10$FoLwOuguo.HdeK43rEn/hObEFEdm5tF0zSUc6bE0HEy8ZqzTMwAhC', 0, 3, 3),
(279, '5ceaed7ed8582', '$2y$10$4AVU1BqNO804kows6vyvfeHgzg1bHLAy16Pssj.k/JJIOIyzVFjYS', 0, 3, 3),
(280, '5ceaed7f10e24', '$2y$10$IJaVBrcSXRD2KFJIUtCmqeMxacQQEMtVNDTDSuX3GvvLn8r8b1iYO', 0, 3, 3),
(281, '5ceaed7f38ae5', '$2y$10$M3v7L01KalIK9Aofa8RcWezrq0bxJmr1nKLjijL2y1h/xrzr7w7zu', 0, 3, 3),
(282, '5ceaed7f603bf', '$2y$10$BpqR//KMpQlDaCFcOlEZN.ERyAVsRtgkr2XWWYsDmL.7sNw2mA392', 0, 3, 3),
(283, '5ceaed7f86140', '$2y$10$MQv87QmYJ5r0d1Ms9.k1oOCzENRMf6quXr24uLeKz6GaYSb4.6VUm', 0, 3, 3),
(284, '5ceaed7fa3606', '$2y$10$rUI3x1W5Fk3u6/a1wITqy.VErPV.HYmHEXDvgP3xaGg59rgZ3HCEe', 0, 3, 3),
(285, '5ceaed7fc511e', '$2y$10$lIkHARDik9IQGn5ZXmTx..kQO/eOe2hNkNgonayknfoplqXqpm2VK', 0, 3, 3),
(286, '5ceaed7fe684e', '$2y$10$RkeGmq/YQog2wzqr9GgYL.iYdB1omfg9sbZ9nl4AubFIIxtXqv.d.', 0, 3, 3),
(287, '5ceaed8014126', '$2y$10$P2/bIIFXvSmXG7mIQH1XQOnGkOZ6RgYTPGgqgJyzt0RrreyFD0Iq.', 0, 3, 3),
(288, '5ceaed803b9ff', '$2y$10$4dROvjUEwq8TL/eHNjPxbuFAc5Rj.Fs1AyDshW.gklCDdHqAM2VqK', 0, 3, 3),
(289, '5ceaed8086179', '$2y$10$zhbRrKTGSBfN9smEotFjmeyG7EI.n9rnpmhpDiko0hhhHQ4jjgbVm', 0, 3, 3),
(290, '5ceaed80af992', '$2y$10$XRLyNVD/F50WSah0pTnDheGXt0PjA64vzd23uekKF7i4e926WwfcC', 0, 3, 3),
(291, '5ceaed80d5713', '$2y$10$VbM8PWUrsKl1WOAWJAh1Cu4qzB7NosiZG5qgHpxgXk0YXyznzSOtK', 0, 3, 3),
(292, '5ceaed810aced', '$2y$10$JhLgvhXqnJkN0T/ZZzq2peVdZYrfjI.CO7CJLzDpwqKHZnIF96dtK', 0, 3, 3),
(293, '5ceaed8136c17', '$2y$10$rq3hZ83/9VZjfCMk9vpBP.owGn4wcWNzuhN5b5sM2.pW3P4B7.0V2', 0, 3, 3),
(294, '5ceaed8182ee9', '$2y$10$pkyoCcBfZsOagXYPhX/FUuMSYuq6DL7IivoC1RhQ1L6kXcE3q1AJC', 0, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(32) COLLATE utf8mb4_swedish_ci NOT NULL,
  `firstName` varchar(32) COLLATE utf8mb4_swedish_ci NOT NULL,
  `lastName` varchar(32) COLLATE utf8mb4_swedish_ci NOT NULL,
  `userHash` varchar(64) COLLATE utf8mb4_swedish_ci NOT NULL,
  `userRole` varchar(16) COLLATE utf8mb4_swedish_ci NOT NULL DEFAULT 'User',
  `cookieHash` varchar(64) COLLATE utf8mb4_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `email`, `firstName`, `lastName`, `userHash`, `userRole`, `cookieHash`) VALUES
(1, 'petterssonroger@hotmail.com', 'Roger', 'Pettersson', '', 'Admin', '$2y$10$fqL08aKbmnRjiKTPJXsKvuWkGSVvdNGnukl6rI..px2vEjSJYbDNG'),
(2, 'test@test.se', 'Rupert', 'Rumperton', '', 'User', ''),
(3, 'qw', 'qw', 'qw', '$2y$10$vo7.Yiyhl.HWiyoiyXgBku1hi5MUsqzKyoobEmN6NdoFkFUBaWBUy', 'Admin', '$2y$10$tC9MRcShkqkQyeJN5LMCiul2W8JeLKQHaUWbruuSInpTtdUYfHEQi'),
(9, 'Ola@fishface.com', 'Ola', 'Olasson', '$2y$10$I3VOBBFM0ZyZ3WD.J1tPJOulcdEOcvlN8eGv5d4DvKIptByoO2Q1q', 'User', ''),
(36, 'www@aaa.aa', 'aaa', 'aaa', '$2y$10$.O3fJTkTaMhwlylU6w/mxOeLbRij8y/R2ZGLYPLfDDcmgH4mDaPNi', 'User', ''),
(37, 'www@aaa.aa', 'aaa', 'aaa', '$2y$10$JnIrB8kngIjMGunVvdu4rOJOlVfaVwE.s3ZDiS.4yGIRUWcQP3JcC', 'User', ''),
(38, 'es', 'es', 'es', '$2y$10$LFnQJXOujsF7coCe8CEYYOIAYa7svOqVEEM8OZ0/zesmuzjxGOrvK', 'User', '');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
