-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2022 at 12:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evehicle`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Book_No` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Staff_ID` int(5) NOT NULL,
  `Book_Date` datetime NOT NULL,
  `Date_Out` date NOT NULL,
  `Date_In` date NOT NULL,
  `Time_In` time NOT NULL,
  `Time_Out` time NOT NULL,
  `Destination` varchar(100) NOT NULL DEFAULT '',
  `Reason` varchar(100) NOT NULL DEFAULT '',
  `Num_Passenger` int(3) NOT NULL DEFAULT '0',
  `Prefer_Cat_No` int(2) DEFAULT NULL,
  `Num_Vehicle` int(2) DEFAULT '0',
  `Book_Status` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Book_No`, `Staff_ID`, `Book_Date`, `Date_Out`, `Date_In`, `Time_In`, `Time_Out`, `Destination`, `Reason`, `Num_Passenger`, `Prefer_Cat_No`, `Num_Vehicle`, `Book_Status`) VALUES
(00004, 10079, '2021-11-27 23:14:39', '2021-12-02', '2021-12-08', '12:00:00', '10:00:00', 'KEMENTERIAN PENGAJIAN TINGGI, PRESINT 5, PUTRAJAYA', 'KURSUS', 8, 1, 2, 'APPROVED'),
(00005, 10079, '2021-11-02 05:49:37', '2021-12-27', '2022-01-04', '17:00:00', '10:00:00', 'UNIVERSITI UTARA MALAYSIA', 'KURSUS ', 7, 1, 2, 'APPROVED'),
(00006, 20012, '2021-11-02 05:55:04', '2021-12-06', '2021-12-08', '13:00:00', '10:00:00', 'KEMENTERIAN PENGAJIAN TINGGI, PRESINT 5, PUTRAJAYA', 'KURSUS', 2, 1, 1, 'PROCESSING'),
(00007, 10079, '2021-11-02 06:05:36', '2021-12-16', '2021-12-16', '17:00:00', '07:00:00', 'KEMENTERIAN PENGAJIAN TINGGI, PRESINT 5, PUTRAJAYA', 'BOARD MEETING', 3, 1, 1, 'PROCESSING'),
(00008, 10079, '2021-11-02 06:08:19', '2021-12-14', '2021-12-22', '06:08:00', '18:08:00', 'KEMENTERIAN PENGAJIAN TINGGI, PRESINT 5, PUTRAJAYA', 'BOARD MEETING', 1, 1, 1, 'PROCESSING'),
(00009, 10079, '2021-12-01 06:10:48', '2021-12-16', '2021-12-16', '06:09:00', '06:09:00', 'JPSM KUALA LUMPUR', 'KURSUS BLABLABLE', 3, 1, 1, 'PROCESSING'),
(00012, 10079, '2021-12-08 16:59:04', '2021-12-01', '2021-12-01', '18:00:00', '06:00:00', 'PICC, PUTRAJAYA', 'MAJLIS PERASMIAN ANJURAN KEMENTERIAN PENGAJIAN TINGGI', 3, 1, 1, 'PROCESSING'),
(00013, 10079, '2021-12-08 17:05:45', '2021-12-22', '2021-12-22', '15:00:00', '08:00:00', 'HATTEN HOTEL, MELAKA', 'KURSUS PENGURUSAN MAKLUMAT ANJURAN KPT', 10, 3, 1, 'PROCESSING'),
(00014, 10079, '2021-12-09 00:46:34', '2021-12-22', '2021-12-22', '14:00:00', '08:00:00', 'MITC HOTEL, MELAKA', 'KURSUS', 7, 2, 1, 'PROCESSING'),
(00015, 10079, '2021-12-09 00:47:31', '2021-12-02', '2021-12-22', '14:00:00', '08:00:00', 'MITC HOTEL, MELAKA', 'KURSUS', 7, 2, 1, 'DISAPPROVED'),
(00016, 10079, '2021-12-09 00:54:06', '2022-01-02', '2022-01-03', '00:53:00', '00:53:00', 'PICC, PUTRAJAYA', 'KURSUS', 15, 2, 2, 'APPROVED'),
(00018, 10079, '2021-12-22 08:18:06', '2022-01-04', '2022-01-05', '17:00:00', '08:00:00', 'MITC HOTEL, MELAKA1', 'KURSUS', 8, 1, 2, 'APPROVED'),
(00021, 10079, '2022-01-04 01:00:24', '2022-01-12', '2022-01-15', '19:00:00', '07:00:00', 'SRI MUDA, SHAH ALAM, SELANGOR', 'SUKARELAWAN BANTUAN BANJIR', 20, 2, 2, 'APPROVED'),
(00022, 10079, '2022-01-10 01:21:59', '2022-01-27', '2022-01-28', '17:00:00', '08:00:00', 'KEMENTERIAN PENGAJIAN TINGGI, PRESINT 5, PUTRAJAYA', 'MEETING', 5, 1, 2, 'REJECTED'),
(00023, 10080, '2022-01-11 03:03:16', '2022-01-18', '2022-01-18', '05:00:00', '10:00:00', 'FAKULTI TEKNOLOGI KEJURUTERAAN', 'MAJLIS APRESIASI PELAJAR', 1, 1, 1, 'APPROVED'),
(00024, 10079, '2022-01-11 12:37:19', '2022-01-15', '2022-01-15', '13:00:00', '08:00:00', 'FTMK', 'WORKSHOP 2 SHOWCASE', 6, 1, 2, 'ACCEPTED'),
(00025, 10079, '2022-01-15 10:57:24', '2022-01-17', '2022-01-18', '15:00:00', '11:00:00', 'MCMC, CYBERJAYA', 'MEETING', 3, 1, 1, 'APPROVED'),
(00026, 15926, '2022-01-16 19:00:34', '2022-01-20', '2022-01-20', '16:00:00', '07:00:00', 'MINISTRY OF SCIENCE, TECHNOLOGY AND INNOVATION, PUTRAJAYA', 'MEETING', 2, 1, 1, 'PROCESSING'),
(00027, 86942, '2022-01-16 19:03:02', '2022-01-24', '2022-01-26', '01:00:00', '11:00:00', 'MITC HOTEL, MELAKA', 'TUTOR EVENT', 6, 2, 1, 'PROCESSING'),
(00028, 85192, '2022-01-16 19:05:38', '2022-02-02', '2022-02-02', '15:00:00', '08:00:00', 'PICC, PUTRAJAYA', 'EVENT', 2, 1, 1, 'PROCESSING');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_No` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Trip_No` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Feedback_Time` int(2) NOT NULL DEFAULT '0',
  `Feedback_Vehicle` int(2) NOT NULL DEFAULT '0',
  `Feedback_Driver` int(2) NOT NULL DEFAULT '0',
  `Comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_No`, `Trip_No`, `Feedback_Time`, `Feedback_Vehicle`, `Feedback_Driver`, `Comment`) VALUES
(00001, 00008, 4, 4, 4, 'Good service'),
(00002, 00026, 5, 3, 3, 'vehicle is not so clean '),
(00003, 00028, 3, 3, 3, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `job_desc`
--

CREATE TABLE `job_desc` (
  `Staff_ID` int(5) NOT NULL,
  `Trip_No` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Job_Desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_desc`
--

INSERT INTO `job_desc` (`Staff_ID`, `Trip_No`, `Job_Desc`) VALUES
(51446, 00008, 'DRIVER'),
(51444, 00016, 'DRIVER'),
(51446, 00017, 'DRIVER'),
(51441, 00018, 'DRIVER'),
(51446, 00019, 'DRIVER'),
(51441, 00024, 'DRIVER'),
(51444, 00025, 'DRIVER'),
(51444, 00026, 'DRIVER'),
(51443, 00027, 'DRIVER'),
(51442, 00028, 'DRIVER'),
(51441, 00029, 'DRIVER'),
(51444, 00032, 'DRIVER'),
(51443, 00033, 'DRIVER'),
(51442, 00034, 'DRIVER'),
(51446, 00035, 'DRIVER');

-- --------------------------------------------------------

--
-- Table structure for table `preference`
--

CREATE TABLE `preference` (
  `Cat_No` int(2) NOT NULL,
  `Book_No` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Num_Vehicle` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `Service_No` int(4) UNSIGNED ZEROFILL NOT NULL,
  `Vehicle_Plate` varchar(10) NOT NULL,
  `Service_Date` date DEFAULT NULL,
  `Service_Mileage` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `Next_Date` date DEFAULT NULL,
  `Next_Mileage` int(6) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`Service_No`, `Vehicle_Plate`, `Service_Date`, `Service_Mileage`, `Next_Date`, `Next_Mileage`) VALUES
(0001, 'WRY1529', '2022-01-01', 110255, '2022-08-01', 120255),
(0004, 'HRE5119', '2022-01-15', 100123, '2022-07-26', 110123),
(0005, 'WTB2131', '2021-12-17', 015200, '2022-06-17', 025200),
(0006, 'WRB1950', '2021-12-20', 010580, '2022-06-20', 020580),
(0007, 'WRY4498', '2021-06-26', 022400, '2022-01-18', 032400),
(0008, 'WPQ2787', '2022-01-05', 011000, '2022-07-05', 021000),
(0010, 'WRV3013', '2021-07-17', 022500, '2022-01-29', 032500),
(0013, 'MBC1234', '2022-01-18', 015800, '2022-07-18', 025800);

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `Trip_No` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Book_No` int(5) UNSIGNED ZEROFILL NOT NULL,
  `Vehicle_Plate` varchar(10) NOT NULL,
  `Start_Mileage` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `End_Mileage` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `Trip_Mileage` int(6) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`Trip_No`, `Book_No`, `Vehicle_Plate`, `Start_Mileage`, `End_Mileage`, `Trip_Mileage`) VALUES
(00008, 00015, 'WTB2131', 123000, 123100, 000100),
(00016, 00016, 'WTB2131', NULL, NULL, NULL),
(00017, 00016, 'WRB1950', NULL, NULL, NULL),
(00018, 00018, 'VAT1450', NULL, NULL, NULL),
(00019, 00018, 'WRV3013', NULL, NULL, NULL),
(00024, 00021, 'WRB1950', NULL, NULL, NULL),
(00025, 00021, 'WTB2131', NULL, NULL, NULL),
(00026, 00005, 'WRY1529', NULL, NULL, NULL),
(00027, 00005, 'VAT1450', NULL, NULL, NULL),
(00028, 00004, 'WRV3013', NULL, NULL, NULL),
(00029, 00004, 'WRY1529', NULL, NULL, NULL),
(00030, 00022, 'VAT1450', NULL, NULL, NULL),
(00031, 00022, 'WRV3013', NULL, NULL, NULL),
(00032, 00023, 'VAT1450', NULL, NULL, NULL),
(00033, 00024, 'VAT1450', NULL, NULL, NULL),
(00034, 00024, 'WRV3013', NULL, NULL, NULL),
(00035, 00025, 'WRV3013', NULL, NULL, NULL),
(00036, 00026, 'VAT1450', NULL, NULL, NULL),
(00037, 00027, 'WTB2131', NULL, NULL, NULL),
(00038, 00028, 'VAT1450', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Staff_ID` int(5) NOT NULL,
  `Staff_IC` varchar(12) NOT NULL DEFAULT '',
  `Staff_Name` varchar(100) NOT NULL DEFAULT '',
  `Staff_Position` varchar(50) NOT NULL DEFAULT '',
  `Staff_Dept` varchar(50) NOT NULL DEFAULT '',
  `Staff_Email` varchar(50) NOT NULL DEFAULT '',
  `Staff_Phone` varchar(15) NOT NULL DEFAULT '',
  `Staff_Extension` varchar(15) DEFAULT NULL,
  `Staff_Category` int(2) NOT NULL DEFAULT '0',
  `Account_Status` varchar(50) NOT NULL DEFAULT 'INACTIVE',
  `Staff_Password` varchar(20) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Staff_ID`, `Staff_IC`, `Staff_Name`, `Staff_Position`, `Staff_Dept`, `Staff_Email`, `Staff_Phone`, `Staff_Extension`, `Staff_Category`, `Account_Status`, `Staff_Password`) VALUES
(10079, '000919100796', 'AIZADTUL ALEYA BINTI RADZALI', 'PROJECT MANAGER', 'STRATEGIC INFORMATION TECHNOLOGY DIVISION', 'aizadtulaleya@gmail.com', '0116119080', '0320203010', 1, 'ACTIVE', '12345'),
(10080, '000919041007', 'NUR AFIQAH BINTI RAMAN', 'PROGRAMMER', 'STRATEGIC INFORMATION TECHNOLOGY DIVISION', 'aleyaradzali05@gmail.com', '0121412512', '0319101080', 1, 'ACTIVE', 'nk954702'),
(10373, '691221042134', 'KAMARUDIN ABDULLAH', 'HEAD OF DIVISION', 'SERVICE MANAGEMENT UNIT', 'fajar@mcmc.gov.my', '0123451234', '0320203175', 3, 'ACTIVE', '12345'),
(11234, '861121302553', 'MUHAMMAD RAZALI ANUAR', 'ENGINEER', 'STRATEGIC INFORMATION TECHNOLOGY DIVISION', 'aizadtulaleya@gmail.com', '0122344556', '0320203010', 1, 'INACTIVE', ''),
(12345, '000815056788', 'NUR HIDAYAH BINTI ALI', 'PROGRAMMER', 'MIS', 'hidayah@mcmc.gov.my', '012334458', '032023367', 1, 'INACTIVE', ''),
(15248, '870111015248', 'SUHAILA MAHRUJI', 'NETWORK ENGINEER', 'NETWORK SECURITY DIVISION', 'suhaila@mcmc.gov.my', '0176399726', '0320203010', 1, 'INACTIVE', 'suhaila1187'),
(15926, '850601105926', 'SHARIFAH AMIRA BINTI SALIM', 'DIRECTOR', 'NETWORK SECURITY DIVISION', 'amira@mcmc.gov.my', '01137270171', '0320203010', 1, 'ACTIVE', '12345'),
(15972, '850615015972', 'RAFIZAH BINTI MINHAT', 'EXECUTIVE SECRETARY', 'DEVELOPMENT SECTOR', 'rafizah@mcmc.gov.my', '0127945093', '0320203010', 1, 'INACTIVE', 'raf!zah123'),
(20012, '000919141234', 'NURKHALISA BINTI MOHD TOHIR', 'SOFTWARE DEVELOPER', 'DEVELOPMENT SECTOR', 'khalisa@mcmc.gov.my', '0176362864', '0320203010', 2, 'ACTIVE', '12345'),
(35304, '870402235304', 'NURUL AIDAH BINTI BAHRUM', 'CHIEF FINANCIAL OFFICER', 'FINANCE DIVISION', 'nurulaidah@mcmc.gov.my', '0128807970', '0320203010', 1, 'INACTIVE', 'aidahbahrum361'),
(51441, '690315045133', 'RADZALI BIN SAMDIN', 'DRIVER', 'SERVICE MANAGEMENT UNIT', 'radzali@mcmc.gov.my', '0196459953', '0320203010', 4, 'ACTIVE', '123'),
(51442, '800616043453', 'HALIM BIN ZAHARI', 'DRIVER', 'SERVICE MANAGEMENT UNIT', 'halim@mcmc.gov.my', '0179891303', '0320203010', 4, 'ACTIVE', '123'),
(51443, '730814085133', 'SALLEH BIN MOHAMED', 'DRIVER', 'SERVICE MANAGEMENT UNIT', 'salleh@mcmc.gov.my', '0193387969', '0320203010', 4, 'ACTIVE', '123'),
(51444, '740121013457', 'AHMAD RANI BIN ABDULLAH', 'DRIVER', 'SERVICE MANAGEMENT UNIT', 'rani@mcmc.gov.my', '0123456789', '0320203010', 4, 'ACTIVE', '123'),
(51446, '870406125073', 'MASLAN BIN RAZAK', 'DRIVER', 'SERVICE MANAGEMENT UNIT', 'maslan@mcmc.gov.my', '0134154413', '0320203010', 4, 'ACTIVE', '123'),
(51447, '870312025741', 'MOHD HAFIZ BIN MOHD NOOR', 'DRIVER', 'SERVICE MANAGEMENT UNIT', 'mhafiz@mcmc.gov.my', '0102310036', '0320203010', 4, 'INACTIVE', 'HAFIZ12345'),
(51448, '861113025525', 'KHAIRUL AMIR MOHAMMAD', 'DRIVER', 'SERVICE MANAGEMENT UNIT', 'khairulamir@mcmc.gov.my', '0175447753', '0320203010', 4, 'INACTIVE', '123456'),
(51449, '870212115643', 'TENGKU MOHD RIDZUAN BIN TENGKU IBRAHIM', 'DRIVER', 'SERVICE MANAGEMENT UNIT', 'tgridzuan@mcmc.gov.my', '0178507573', '0320203010', 4, 'INACTIVE', 'kenderaanhutan'),
(65346, '850425065346', 'ROSBAIDAH BINTI DESA', 'DIVISION SECRETARY', 'COMMUNICATIONS & INDUSTRY RELATIONS DIVISION', 'rosbaidah@mcmc.gov.my', '0129887815', '0320203010', 1, 'INACTIVE', 'kenderaanros'),
(85192, '870124385192', 'NOORSYUHADA BINTI ABDUL SAMAD', 'ADMINISTRATIVE OFFICE', 'COMMUNICATIONS & INDUSTRY RELATIONS DIVISION', 'noor_syuhada@mcmc.gov.my', '0193696623', '0320203010', 1, 'ACTIVE', '123'),
(86942, '861213386942', 'NOR SAIDATUL HURIAH BT SHAHARUDIN', 'TUTOR', 'ACADEMY DIVISION', 'saidatul@mcmc.gov.my', '0175662839', '0320203010', 1, 'ACTIVE', '123'),
(95356, '861206295356', 'NUR AIN BT MUSTAPA', 'TUTOR', 'ACADEMY DIVISION', 'nur_ain@mcmc.gov.my', '0145463325', '0320203010', 1, 'INACTIVE', '121535');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `Vehicle_No` int(2) UNSIGNED ZEROFILL NOT NULL,
  `Vehicle_Plate` varchar(10) NOT NULL,
  `Cat_No` int(2) NOT NULL,
  `Vehicle_Model` varchar(50) NOT NULL,
  `Vehicle_Capacity` int(2) NOT NULL DEFAULT '0',
  `Vehicle_Status` varchar(50) NOT NULL DEFAULT '0',
  `Current_Mileage` int(6) UNSIGNED ZEROFILL DEFAULT '000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`Vehicle_No`, `Vehicle_Plate`, `Cat_No`, `Vehicle_Model`, `Vehicle_Capacity`, `Vehicle_Status`, `Current_Mileage`) VALUES
(01, 'HRE5119', 3, 'MITSUBISHI', 40, 'NOT AVAILABLE', 010000),
(02, 'VAT1450', 1, 'PROTON PREVE', 4, 'AVAILABLE', 005000),
(03, 'WRV3013', 1, 'PROTON PREVE', 4, 'AVAILABLE', 035555),
(04, 'WRY1529', 1, 'HONDA CITY', 4, 'AVAILABLE', 001250),
(05, 'WTB2131', 2, 'TOYOTA ', 10, 'AVAILABLE', 015670),
(06, 'WRB1950', 2, 'TOYOTA HIACE', 10, 'AVAILABLE', 010500),
(09, 'WJV8385', 1, 'TOYOTA HYLUX', 4, 'AVAILABLE', 005250),
(10, 'WPQ2787', 1, 'TOYOTA HYLUX', 4, 'AVAILABLE', 011076),
(11, 'WQD9023', 2, 'TOYOTA HIACE', 10, 'AVAILABLE', 000250),
(12, 'WRY4498', 1, 'TOYOTA HYLUX', 4, 'AVAILABLE', 022250),
(15, 'MBC1234', 1, 'TOYOTA', 5, 'NOT AVAILABLE', 015000);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclecat`
--

CREATE TABLE `vehiclecat` (
  `Cat_No` int(2) NOT NULL,
  `Cat_Name` varchar(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehiclecat`
--

INSERT INTO `vehiclecat` (`Cat_No`, `Cat_Name`) VALUES
(0, 'MPV'),
(1, 'CAR'),
(2, 'VAN'),
(3, 'BUS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Book_No`),
  ADD KEY `Staff_ID` (`Staff_ID`),
  ADD KEY `FK_booking_vehiclecat` (`Prefer_Cat_No`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_No`),
  ADD KEY `FK_feedback_trip` (`Trip_No`);

--
-- Indexes for table `job_desc`
--
ALTER TABLE `job_desc`
  ADD PRIMARY KEY (`Trip_No`,`Staff_ID`) USING BTREE,
  ADD KEY `Staff_ID` (`Staff_ID`),
  ADD KEY `Trip_No` (`Trip_No`) USING BTREE;

--
-- Indexes for table `preference`
--
ALTER TABLE `preference`
  ADD PRIMARY KEY (`Cat_No`,`Book_No`),
  ADD KEY `Book_No` (`Book_No`),
  ADD KEY `Cat_No` (`Cat_No`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`Service_No`),
  ADD KEY `FK__vehicle` (`Vehicle_Plate`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`Trip_No`,`Book_No`,`Vehicle_Plate`) USING BTREE,
  ADD KEY `fk1` (`Book_No`),
  ADD KEY `fk2` (`Vehicle_Plate`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Staff_ID`),
  ADD UNIQUE KEY `Staff_IC` (`Staff_IC`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`Vehicle_No`),
  ADD UNIQUE KEY `Vehicle_Plate` (`Vehicle_Plate`),
  ADD KEY `Cat_No` (`Cat_No`);

--
-- Indexes for table `vehiclecat`
--
ALTER TABLE `vehiclecat`
  ADD PRIMARY KEY (`Cat_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Book_No` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_No` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `Service_No` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `Trip_No` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `Vehicle_No` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK__user` FOREIGN KEY (`Staff_ID`) REFERENCES `user` (`Staff_ID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `FK_booking_vehiclecat` FOREIGN KEY (`Prefer_Cat_No`) REFERENCES `vehiclecat` (`Cat_No`) ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `FK_feedback_trip` FOREIGN KEY (`Trip_No`) REFERENCES `trip` (`Trip_No`);

--
-- Constraints for table `job_desc`
--
ALTER TABLE `job_desc`
  ADD CONSTRAINT `FK_job_desc_trip` FOREIGN KEY (`Trip_No`) REFERENCES `trip` (`Trip_No`),
  ADD CONSTRAINT `job_desc_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `user` (`Staff_ID`);

--
-- Constraints for table `preference`
--
ALTER TABLE `preference`
  ADD CONSTRAINT `preference_ibfk_1` FOREIGN KEY (`Cat_No`) REFERENCES `vehiclecat` (`Cat_No`),
  ADD CONSTRAINT `preference_ibfk_2` FOREIGN KEY (`Book_No`) REFERENCES `booking` (`Book_No`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `FK__vehicle` FOREIGN KEY (`Vehicle_Plate`) REFERENCES `vehicle` (`Vehicle_Plate`);

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `FK_trip_vehicle` FOREIGN KEY (`Vehicle_Plate`) REFERENCES `vehicle` (`Vehicle_Plate`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk1` FOREIGN KEY (`Book_No`) REFERENCES `booking` (`Book_No`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `FK__vehiclecat` FOREIGN KEY (`Cat_No`) REFERENCES `vehiclecat` (`Cat_No`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
