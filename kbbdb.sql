-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2023 at 03:22 PM
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
-- Database: `kbbdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `DELIVERY`
--

CREATE TABLE `DELIVERY` (
  `DELI_NO` int(10) NOT NULL,
  `USER_ID` int(20) NOT NULL,
  `ORDER_ID` int(10) NOT NULL,
  `DELI_DATE` varchar(10) DEFAULT NULL,
  `DELI_TIME` varchar(15) DEFAULT NULL,
  `REMARK` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `DELIVERY`
--

INSERT INTO `DELIVERY` (`DELI_NO`, `USER_ID`, `ORDER_ID`, `DELI_DATE`, `DELI_TIME`, `REMARK`) VALUES
(8, 2, 14, '', '', 'lembah bujang'),
(73, 2, 152, '', '', 'teluk belanga'),
(81, 2, 161, '2023-07-15', '15:00', 'A2-2023, UITM KEDAH'),
(82, 2, 162, NULL, NULL, 'mrsm'),
(83, 46, 163, '2023-07-14', '16:52', 'merbok');

-- --------------------------------------------------------

--
-- Table structure for table `ORDERPRODUCT`
--

CREATE TABLE `ORDERPRODUCT` (
  `ORDER_ID` int(10) NOT NULL,
  `PRO_CODE` int(10) NOT NULL,
  `ORDER_QTY` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ORDERPRODUCT`
--

INSERT INTO `ORDERPRODUCT` (`ORDER_ID`, `PRO_CODE`, `ORDER_QTY`) VALUES
(14, 103, 5),
(19, 101, 1),
(152, 103, 6),
(161, 113, 1),
(162, 101, 5),
(163, 122, 1),
(165, 113, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ORDER_`
--

CREATE TABLE `ORDER_` (
  `ORDER_ID` int(8) NOT NULL,
  `USER_ID` int(20) NOT NULL,
  `ORDER_TYPE` varchar(20) NOT NULL,
  `ORDER_DATE` varchar(10) NOT NULL,
  `ORDER_STATUS` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ORDER_`
--

INSERT INTO `ORDER_` (`ORDER_ID`, `USER_ID`, `ORDER_TYPE`, `ORDER_DATE`, `ORDER_STATUS`) VALUES
(14, 2, 'delivery', '20/06/2023', 1),
(19, 2, 'self-pickup', '22/06/2023', 1),
(152, 2, 'delivery', '05/07/2023', 0),
(161, 2, 'delivery', '13/07/2023', 1),
(162, 2, 'delivery', '13/07/2023', 0),
(163, 46, 'delivery', '13/07/2023', 1),
(165, 6, 'self-pickup', '13/07/2023', 0);

-- --------------------------------------------------------

--
-- Table structure for table `PAYMENT`
--

CREATE TABLE `PAYMENT` (
  `PAYMENT_ID` int(10) NOT NULL,
  `TOTAL_PRICE` double(10,2) NOT NULL,
  `PICTURE` varchar(255) NOT NULL,
  `PAYMENT_STATUS` int(1) NOT NULL,
  `USER_ID` int(20) NOT NULL,
  `ORDER_ID` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `PAYMENT`
--

INSERT INTO `PAYMENT` (`PAYMENT_ID`, `TOTAL_PRICE`, `PICTURE`, `PAYMENT_STATUS`, `USER_ID`, `ORDER_ID`) VALUES
(14, 150.00, '119059290_1639264706274900_5693586890433867790_n.jpg', 1, 2, 14),
(19, 10.00, 'FHIjBXhVEAIOaDK.jpeg', 1, 2, 19),
(136, 180.00, 'chs.jpg', 0, 2, 152),
(145, 35.00, 'becd.jpg', 1, 2, 161),
(146, 50.00, '290DA063-A093-4CCF-90AA-15826AA1217B.jpeg', 0, 2, 162),
(147, 20.00, 'FKZ0h3fUcAM5_22.jpg', 1, 46, 163),
(149, 35.00, 'inkedwhatsapp-image-2018-01-14-at-11-43-34-pm-li.jpg', 0, 6, 165);

-- --------------------------------------------------------

--
-- Table structure for table `PRODUCT`
--

CREATE TABLE `PRODUCT` (
  `PRO_CODE` int(10) NOT NULL,
  `PRO_NAME` varchar(40) NOT NULL,
  `PRO_PRICE` double(10,2) NOT NULL,
  `PRO_FLAVOR` varchar(30) NOT NULL,
  `PRO_NET_WEIGHT` decimal(10,2) NOT NULL,
  `PRO_STATUS` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `PRODUCT`
--

INSERT INTO `PRODUCT` (`PRO_CODE`, `PRO_NAME`, `PRO_PRICE`, `PRO_FLAVOR`, `PRO_NET_WEIGHT`, `PRO_STATUS`) VALUES
(101, 'KUIH BATANG BURUK KACANG TANAH ASLI', 10.00, 'GROUNDNUT', 250.00, 1),
(102, 'KUIH BATANG BURUK KACANG TANAH ASLI', 20.00, 'GROUNDNUT', 500.00, 1),
(103, 'KUIH BATANG BURUK KACANG TANAH ASLI', 20.00, 'GROUNDNUT', 1000.00, 1),
(111, 'KUIH BATANG BURUK COKLAT', 15.00, 'CHOCOLATE', 250.00, 0),
(112, 'KUIH BATANG BURUK COKLAT', 25.00, 'CHOCOLATE', 500.00, 0),
(113, 'KUIH BATANG BURUK COKLAT', 35.00, 'CHOCOLATE', 1000.00, 1),
(121, 'KUIH BATANG BURUK KACANG HIJAU', 10.00, 'GREEN-BEAN', 250.00, 1),
(122, 'KUIH BATANG BURUK KACANG HIJAU', 20.00, 'GREEN-BEAN', 500.00, 1),
(123, 'KUIH BATANG BURUK KACANG HIJAU', 30.00, 'GREEN-BEAN', 1000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `USER_ID` int(20) NOT NULL,
  `USER_USERNAME` varchar(20) NOT NULL,
  `USER_NAME` varchar(60) NOT NULL,
  `USER_PHONENO` varchar(11) NOT NULL,
  `USER_ADDRESS` varchar(100) NOT NULL,
  `USER_EMAIL` varchar(30) NOT NULL,
  `USER_PASSWORD` varchar(20) NOT NULL,
  `LVL_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `USER`
--

INSERT INTO `USER` (`USER_ID`, `USER_USERNAME`, `USER_NAME`, `USER_PHONENO`, `USER_ADDRESS`, `USER_EMAIL`, `USER_PASSWORD`, `LVL_ID`) VALUES
(1, 'siti123', 'Siti Nurbaya', '01234567890', '08400 Merbok, Kedah', 'siti@gmail.com', 'siti123', 1),
(2, 'izwan123', 'MUHAMMAD IZWAN BIN AHMAD', '01234567891', '41 KM 13 1/2 JALAN GUNUNG, KAMPUNG TELOK JAWA, MK PADANG HANG, 06570 ALOR SETAR, KEDAH', 'izwan123@gmail.com', 'izwan123', 2),
(6, 'daniaswAg', 'Dania', '01121632798', 'Batu Feringghi, Penang', 'dania@gmail.com', 'izwan123', 2),
(46, 'hasnita123', 'hasnita', '01164133691', 'merbok', 'hasnita@gmail.com', 'hasnita1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `USER_LVL`
--

CREATE TABLE `USER_LVL` (
  `LVL_ID` int(11) NOT NULL DEFAULT 1,
  `LVL_TYPE` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `USER_LVL`
--

INSERT INTO `USER_LVL` (`LVL_ID`, `LVL_TYPE`) VALUES
(1, 'ADMIN'),
(2, 'CUSTOMER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `DELIVERY`
--
ALTER TABLE `DELIVERY`
  ADD PRIMARY KEY (`DELI_NO`),
  ADD KEY `USER_ID` (`USER_ID`,`ORDER_ID`),
  ADD KEY `USER_ID_2` (`USER_ID`),
  ADD KEY `ORDER_ID` (`ORDER_ID`);

--
-- Indexes for table `ORDERPRODUCT`
--
ALTER TABLE `ORDERPRODUCT`
  ADD PRIMARY KEY (`ORDER_ID`,`PRO_CODE`),
  ADD KEY `ORDER_ID` (`ORDER_ID`,`PRO_CODE`),
  ADD KEY `ORDER_ID_2` (`ORDER_ID`,`PRO_CODE`),
  ADD KEY `ORDER_ID_3` (`ORDER_ID`,`PRO_CODE`),
  ADD KEY `ORDER_ID_4` (`ORDER_ID`,`PRO_CODE`),
  ADD KEY `ORDER_ID_5` (`ORDER_ID`,`PRO_CODE`),
  ADD KEY `PRO_CODE` (`PRO_CODE`);

--
-- Indexes for table `ORDER_`
--
ALTER TABLE `ORDER_`
  ADD PRIMARY KEY (`ORDER_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `USER_ID_2` (`USER_ID`),
  ADD KEY `USER_ID_3` (`USER_ID`);

--
-- Indexes for table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `PAYMENT_ID` (`PAYMENT_ID`),
  ADD KEY `USER_ID` (`USER_ID`,`ORDER_ID`),
  ADD KEY `ORDER_ID` (`ORDER_ID`);

--
-- Indexes for table `PRODUCT`
--
ALTER TABLE `PRODUCT`
  ADD PRIMARY KEY (`PRO_CODE`),
  ADD KEY `PRO_CODE` (`PRO_CODE`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `LVL_ID` (`LVL_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `USER_ID_2` (`USER_ID`);

--
-- Indexes for table `USER_LVL`
--
ALTER TABLE `USER_LVL`
  ADD PRIMARY KEY (`LVL_ID`),
  ADD KEY `LVL_ID` (`LVL_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `DELIVERY`
--
ALTER TABLE `DELIVERY`
  MODIFY `DELI_NO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `ORDER_`
--
ALTER TABLE `ORDER_`
  MODIFY `ORDER_ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  MODIFY `PAYMENT_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `USER`
--
ALTER TABLE `USER`
  MODIFY `USER_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `DELIVERY`
--
ALTER TABLE `DELIVERY`
  ADD CONSTRAINT `delivery_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `delivery_ibfk_2` FOREIGN KEY (`ORDER_ID`) REFERENCES `ORDER_` (`ORDER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `ORDERPRODUCT`
--
ALTER TABLE `ORDERPRODUCT`
  ADD CONSTRAINT `orderproduct_ibfk_1` FOREIGN KEY (`ORDER_ID`) REFERENCES `ORDER_` (`ORDER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderproduct_ibfk_2` FOREIGN KEY (`PRO_CODE`) REFERENCES `PRODUCT` (`PRO_CODE`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ORDER_`
--
ALTER TABLE `ORDER_`
  ADD CONSTRAINT `order__ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `PAYMENT`
--
ALTER TABLE `PAYMENT`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `USER` (`USER_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`ORDER_ID`) REFERENCES `ORDER_` (`ORDER_ID`) ON DELETE CASCADE;

--
-- Constraints for table `USER`
--
ALTER TABLE `USER`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`LVL_ID`) REFERENCES `USER_LVL` (`LVL_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
