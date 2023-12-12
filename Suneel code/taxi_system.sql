+-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2023 at 08:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxi_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RiderID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `current_location` varchar(255) NOT NULL,
  `destination_location` varchar(255) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending',
  `vehicleType` varchar(255) NOT NULL,
  `bookingOption` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `userConfirmation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `UserID`, `RiderID`, `Username`, `current_location`, `destination_location`, `booking_date`, `status`, `vehicleType`, `bookingOption`, `price`, `userConfirmation`) VALUES
(4, 1, 3, 'a', 'gwalior', 'bina', '2023-11-17 08:39:36', 'Cancelled', '', '', 120, 'Pending'),
(6, 1, 3, 'a', 'gwalior', 'Mumbai', '2023-11-18 07:25:07', 'Cancelled', '', '', 900, 'Pending'),
(8, 1, 3, 'a', 'ha', 'ka', '2023-11-18 08:02:07', 'complete', '', '', 9000, 'Pending'),
(11, 1, 4, 'a', 'gwalior', 'a', '2023-11-18 12:15:13', 'complete', 'four-wheeler', 'single', 9000, 'Pending'),
(12, 1, 0, 'a', 'gwalior', 'a', '2023-11-18 12:15:47', 'Pending', 'four-wheeler', 'single', 0, ''),
(13, 5, 4, 'test', 'Test', 'Testing', '2023-11-20 06:20:43', 'complete', 'four-wheeler', 'single', 15000, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `customersupport`
--

CREATE TABLE `customersupport` (
  `SupportID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Message` text DEFAULT NULL,
  `Timestamp` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customersupport`
--

INSERT INTO `customersupport` (`SupportID`, `Username`, `Email`, `Subject`, `Message`, `Timestamp`) VALUES
(2, 'a', 'a@gmail.com', 'a', 'a', '2023-11-16 14:06:10'),
(3, 'abhishek', 'techiesabhishek25@gmail.com', 'test', 'testing', '2023-11-16 14:07:46'),
(4, 'abhishek', 'a@gmail.com', 'test', 'a', '2023-11-17 15:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `BookingID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` int(5) NOT NULL,
  `Review` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `BookingID`, `UserID`, `Rating`, `Review`) VALUES
(4, 8, 1, 2, 'J'),
(15, 13, 5, 4, 'Good Driving');

-- --------------------------------------------------------

--
-- Table structure for table `ridehistory`
--

CREATE TABLE `ridehistory` (
  `HistoryID` int(11) NOT NULL,
  `RideID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `DriverID` int(11) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Feedback` text DEFAULT NULL,
  `Timestamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `RideID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `DriverID` int(11) DEFAULT NULL,
  `VehicleID` int(11) DEFAULT NULL,
  `PickupLocation` varchar(255) DEFAULT NULL,
  `DropoffLocation` varchar(255) DEFAULT NULL,
  `RideDateTime` datetime DEFAULT NULL,
  `FareAmount` decimal(10,2) DEFAULT NULL,
  `RideStatus` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `UserType` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Password`, `Email`, `Phone`, `UserType`) VALUES
(1, 'a', '1bbd886460827015e5d605ed44252251', 'a@gmail.com', '0987654321', 'user'),
(2, 'Admin', '1bbd886460827015e5d605ed44252251', 'admin@admin.com', '0987654321', 'admin'),
(3, 'rider1', '1bbd886460827015e5d605ed44252251', 'rider1@gmail.com', '0987654321', 'rider'),
(4, 'Rider2', '1bbd886460827015e5d605ed44252251', 'rider2@gmail.com', '0000000000', 'rider'),
(5, 'test', '1bbd886460827015e5d605ed44252251', 'test@gmail.com', '1234567890', 'user'),
(6, 'Rider3', '1bbd886460827015e5d605ed44252251', 'rider3@gmail.com', '0987678906', 'rider');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `VehicleID` int(11) NOT NULL,
  `DriverID` int(11) DEFAULT NULL,
  `VehicleType` varchar(20) DEFAULT NULL,
  `VehicleModel` varchar(255) DEFAULT NULL,
  `LicensePlate` varchar(20) DEFAULT NULL,
  `CurrentLocation` varchar(255) DEFAULT NULL,
  `Availability` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customersupport`
--
ALTER TABLE `customersupport`
  ADD PRIMARY KEY (`SupportID`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BookingID` (`BookingID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `ridehistory`
--
ALTER TABLE `ridehistory`
  ADD PRIMARY KEY (`HistoryID`),
  ADD KEY `RideID` (`RideID`),
  ADD KEY `DriverID` (`DriverID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`RideID`),
  ADD KEY `VehicleID` (`VehicleID`),
  ADD KEY `DriverID` (`DriverID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`VehicleID`),
  ADD KEY `DriverID` (`DriverID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customersupport`
--
ALTER TABLE `customersupport`
  MODIFY `SupportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `ridehistory`
--
ALTER TABLE `ridehistory`
  MODIFY `HistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `VehicleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`BookingID`) REFERENCES `bookings` (`id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `ridehistory`
--
ALTER TABLE `ridehistory`
  ADD CONSTRAINT `ridehistory_ibfk_1` FOREIGN KEY (`RideID`) REFERENCES `rides` (`RideID`),
  ADD CONSTRAINT `ridehistory_ibfk_2` FOREIGN KEY (`DriverID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `ridehistory_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides_ibfk_4` FOREIGN KEY (`VehicleID`) REFERENCES `vehicles` (`VehicleID`),
  ADD CONSTRAINT `rides_ibfk_5` FOREIGN KEY (`DriverID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `rides_ibfk_6` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`DriverID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
