-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql205.epizy.com
-- Generation Time: Apr 28, 2023 at 12:15 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_33837629_gogotravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `airlines`
--

CREATE TABLE `airlines` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `airlineName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `airlineCode` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `enterpriseNum` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `Nation` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `airlines`
--

INSERT INTO `airlines` (`id`, `username`, `airlineName`, `airlineCode`, `enterpriseNum`, `Nation`) VALUES
(1, 'airlineVN', 'VietJet Airline', 'VJ', '021565465', 'Vietnam'),
(2, 'AFairline', 'France Airline', 'AF', '13454648265', 'France'),
(3, 'ndanh', 'Vietnam Airline', 'VN', '372272008', 'Vietnam');

-- --------------------------------------------------------

--
-- Table structure for table `airport`
--

CREATE TABLE `airport` (
  `id` bigint(20) NOT NULL,
  `airportCode` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `airportName` text COLLATE latin1_general_ci NOT NULL,
  `location` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `airport`
--

INSERT INTO `airport` (`id`, `airportCode`, `airportName`, `location`) VALUES
(1, 'VCA', 'Can Tho International Airport', 'Can Tho, Viet Nam'),
(2, 'SGN', 'Tan Son Nhat International Airport', 'Ho Chi Minh City, Viet Nam'),
(3, 'CDG', 'Paris-Charles de Gaulle Airport', 'Paris, France'),
(4, 'SXF', 'Berlin-Schönefeld Airport', 'Berlin, Germany'),
(5, 'LHRs', 'London Heathrow Airport', 'London, United Kingdom'),
(6, 'HAN', 'Noi Bai International Airport', 'Ha Noi, Viet Nam');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cusName` text COLLATE latin1_general_ci NOT NULL,
  `gender` tinyint(1) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `phone` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `username`, `cusName`, `gender`, `DoB`, `phone`, `email`) VALUES
(1, 'xxchikhai9', 'Le Chi Khai', 1, '2000-12-12', '0369902899', 'khailc4869@gmail.com'),
(2, 'zzchikhai9', 'Le Do Quang Sang', 0, '2001-03-21', '0886623971', 'sangldqgcc19173@fpt.edu.vn'),
(3, 'ldqs0321', 'ldqs0321', 0, '2018-03-20', '0404575432', 'ldqs@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` bigint(20) NOT NULL,
  `planeID` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `flightID` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `departure` text COLLATE latin1_general_ci NOT NULL,
  `destination` text COLLATE latin1_general_ci NOT NULL,
  `departDay` date NOT NULL,
  `boardingTime` time NOT NULL,
  `flightTime` int(11) NOT NULL,
  `returnDay` date NOT NULL,
  `priceTicket` float NOT NULL,
  `state` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `planeID`, `flightID`, `departure`, `destination`, `departDay`, `boardingTime`, `flightTime`, `returnDay`, `priceTicket`, `state`) VALUES
(0, 'VJ - 131', 'VN - 366', 'VCA', 'SGN', '2023-03-15', '20:30:00', 10, '2023-03-23', 1600, 'Excepted'),
(1, 'VJ - 131', 'VN - 072', 'VCA', 'SGN', '2023-03-22', '16:15:00', 8, '2023-03-29', 1200, 'Excepted'),
(2, 'AF - 101', 'F - 111', 'CDG', 'SGN', '2023-04-05', '08:00:00', 10, '2023-04-11', 1120, 'Excepted'),
(3, 'AF - 101', 'F - 233', 'CDG', 'SXF', '2023-04-05', '21:30:00', 4, '2023-04-10', 760, 'Excepted'),
(4, 'AF - 645', 'F - 236', 'CDG', 'SGN', '2023-04-05', '19:30:00', 10, '2023-04-10', 960, 'Excepted'),
(5, 'AF - 645', 'F - 0081', 'SXF', 'VCA', '2023-04-12', '22:40:00', 7, '2023-04-20', 755, 'Excepted'),
(7, 'VN - 390', 'VN - 380', 'CDG', 'HAN', '2023-04-29', '08:00:00', 12, '2023-05-05', 1000, 'Excepted');

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `id` bigint(20) NOT NULL,
  `airlineCode` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `planeID` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `planeType` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `plane`
--

INSERT INTO `plane` (`id`, `airlineCode`, `planeID`, `planeType`) VALUES
(1, 'AF', 'AF - 101', 'Airbus A220'),
(2, 'VJ', 'VJ - 165', 'Boeing 747a'),
(3, 'VJ', 'VJ - 131', 'Airbus A350'),
(4, 'VJ', 'VJ - 132', 'Boeing 777'),
(5, 'VJ', 'VJ - 136', 'Airbus A350'),
(6, 'VJ', 'VJ - 226', 'Boeing 380'),
(7, 'AF', 'AF - 645', 'Airbus A320'),
(8, 'VN', 'VN - 390', 'Boeing 380');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) NOT NULL,
  `ticketID` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `flightID` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `passengerName` text COLLATE latin1_general_ci NOT NULL,
  `citizenID` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `luggage` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `gate` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ticketPrice` float NOT NULL,
  `seatClass` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `seat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `ticketType` text COLLATE latin1_general_ci NOT NULL,
  `bookingDay` datetime NOT NULL,
  `state` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticketID`, `flightID`, `username`, `passengerName`, `citizenID`, `luggage`, `gate`, `ticketPrice`, `seatClass`, `seat`, `ticketType`, `bookingDay`, `state`) VALUES
(1, 'MVJU45654097', 'VN - 072', 'xxchikhai9', 'Le Do Quang Sang', '0358864657952', 'A - 09', 'K - 02', 1200, 'Bussiness', 'D - 01', 'Two-Way Ticket', '2023-04-02 03:49:14', 'Excepted'),
(2, 'SXIN71952935', 'VN - 366', 'xxchikhai9', 'Nguyen Dong Anh', '056787895113', 'F - 05', 'E - 07', 1600, 'Bussiness', 'B - 02', 'Two-Way Ticket', '2023-04-02 19:26:43', 'Arrived On-Time'),
(3, 'UWHA56535066', 'VN - 366', 'xxchikhai9', 'Le Chi Khai', '095201365959', 'J - 03', 'B - 02', 1600, 'Bussiness', 'A - 02', 'Two-Way Ticket', '2023-04-02 03:28:14', 'Arrived On-Time'),
(4, 'EQLS62460715', 'VN - 366', 'xxchikhai9', 'Nguyen Hoang Thang', '095202341867', 'D - 02', 'C - 05', 2880, 'Premium Economy', 'A - 32', 'Two-Way Ticket', '2023-04-02 11:00:00', 'Arrived On-Time'),
(5, 'HCLC19274596', 'VN - 366', 'xxchikhai9', 'Le Do Quang Sang', '0358864657952', 'D - 03', 'B - 07', 1600, 'Premium Economy', 'E - 43', 'One-Way Ticket', '2023-04-02 07:42:00', 'Arrived On-Time'),
(6, 'ARFG39130070', 'F - 111', 'xxchikhai9', 'Le Do Quang Sang', '0358864657952', 'E - 09', 'B - 04', 2016, 'Bussiness', 'B - 22', 'Two-Way Ticket', '2023-04-02 20:42:00', 'Excepted'),
(7, 'VMXH30605837', 'F - 111', 'xxchikhai9', 'Le Chi Khai', '095201365959', 'G - 06', 'J - 04', 2016, 'Bussiness', 'C - 32', 'Two-Way Ticket', '2023-04-02 08:08:00', 'Excepted'),
(8, 'HODJ40819833', 'F - 111', 'xxchikhai9', 'Nguyen Hoang Thang', '095202341867', 'J - 06', 'B - 03', 2016, 'Premium Economy', 'G - 33', 'Two-Way Ticket', '2023-04-02 10:08:00', 'Excepted'),
(9, 'VLCB71926045', 'F - 111', 'zzchikhai9', 'Le Van Tue', '095071358647', 'F - 02', 'F - 03', 2016, 'Bussiness', 'G - 14', 'Two-Way Ticket', '2023-04-03 16:26:43', 'Excepted'),
(10, 'KBFT40705240', 'F - 111', 'ldqs0321', 'Le Do Quang Sang', '0358864657952', 'D - 04', 'H - 08', 1120, 'Premium Economy', 'C - 32', 'One-Way Ticket', '2023-04-28 02:24:14', 'Excepted'),
(11, 'KVSV37753403', 'F - 236', 'ldqs0321', 'Le Do Quang Sang', '0358864657952', 'I - 06', 'J - 09', 1728, 'Bussiness', 'B - 32', 'Two-Way Ticket', '2023-04-28 02:26:51', 'Excepted'),
(12, 'OYDE72665573', 'F - 0081', 'ldqs0321', 'Le Do Quang Sang', '205889141919', 'B - 04', 'I - 07', 755, 'Premium Economy', 'D - 34', 'One-Way Ticket', '2023-04-28 04:59:34', 'Excepted'),
(13, 'TJGK80988691', 'F - 0081', 'ldqs0321', 'Le Do Quang Sang', '205889141919', 'C - 03', 'B - 04', 755, 'Bussiness', 'C - 13', 'One-Way Ticket', '2023-04-28 05:05:32', 'Excepted');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `role` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `state` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `state`) VALUES
(1, 'xxchikhai8', '$2a$14$1.bxAd.AYztQFVGl/ddOKOPezTjIfqGhT2OHRcwIEwoB7Wt9DXBEG', 'admin', 'active'),
(2, 'xxchikhai9', '$2a$14$XkIs0476UrBtA8Bv5b9ba.v8SGQ2J/pMZzA53b/CR/VWxCwAW55fS', 'user', 'active'),
(3, 'airlineVN', '$2a$14$1qnWSz7g4gafHTEziE5re.1TPRxLhbH88lXq4MQCMcHh9eYwgIegO', 'enterprise', 'active'),
(4, 'AFairline', '$2a$14$Bil6.ykujEw/wM6mv/V.K.Hk0Axb0FymmDtRtpqBnG9e3Pdr0p9zi', 'enterprise', 'active'),
(5, 'zzchikhai9', '$2a$14$Yg8SkkzG02FrnRjCWY3LtOxkZeUQ5VjgqSC3LnRB5atlvzSrCMROC', 'user', 'active'),
(6, 'ldqs0321', '$2a$14$tUj7F1nJSrbGNkQRNLttTe.7pusse19VmUo2ZmPBW5mGF88OiRAk.', 'user', 'active'),
(7, 'ndanh', '$2a$14$BXPJaS5zvWMsGMq0/AwxeuQbg8NVg/3hbOn0oD.jHHIcSb3Ha8nQq', 'enterprise', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airlines`
--
ALTER TABLE `airlines`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `airlineCode` (`airlineCode`) USING BTREE,
  ADD KEY `username` (`username`);

--
-- Indexes for table `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `airportName` (`airportName`,`airportCode`) USING HASH;

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `flightID` (`flightID`) USING BTREE,
  ADD KEY `planeID` (`planeID`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `planeID` (`planeID`,`airlineCode`) USING BTREE,
  ADD KEY `airlineCode` (`airlineCode`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `flightID` (`flightID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airlines`
--
ALTER TABLE `airlines`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `airport`
--
ALTER TABLE `airport`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plane`
--
ALTER TABLE `plane`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `airlines`
--
ALTER TABLE `airlines`
  ADD CONSTRAINT `airlines_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `flights`
--
ALTER TABLE `flights`
  ADD CONSTRAINT `flights_ibfk_1` FOREIGN KEY (`planeID`) REFERENCES `plane` (`planeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plane`
--
ALTER TABLE `plane`
  ADD CONSTRAINT `plane_ibfk_1` FOREIGN KEY (`airlineCode`) REFERENCES `airlines` (`airlineCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`flightID`) REFERENCES `flights` (`flightID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
