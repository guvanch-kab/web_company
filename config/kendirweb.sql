-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 07, 2024 at 03:51 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KENDIR_WEB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `CATEGORY_ID` int NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `CATEGORY_PHOTO` text NOT NULL,
  `CATEGORY_DESC` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`CATEGORY_ID`, `NAME`, `CATEGORY_PHOTO`, `CATEGORY_DESC`) VALUES
(1, 'ARMATUR', 'armatur.jpg', 'Treasure Island (originally titled The Sea Cook: A Story for Boys[1]) is both an 1883 adventure novel and a historical novel set in the 1700s by Scottish author Robert Louis Stevenson, telling a story of \"buccaneers and buried gold\". It is considered a coming-of-age story and is noted for its atmosphere, characters, and action.'),
(2, 'PROFIL', 'profil.jpg', 'The novel was originally serialised from 1881 to 1882 in the children\'s magazine Young Folks, under the title Treasure Island or the Mutiny of the Hispaniola, credited to the pseudonym \"Captain George North\". It was first published as a book on 14 November 1883 by Cassell & Co. It has since become one of the most often dramatized and adapted novels.'),
(3, 'TURBA', 'turba.jpg', 'Since its publication, Treasure Island has had significant influence on depictions of pirates in popular culture, including elements such as deserted tropical islands, treasure maps marked with an \"X\", and one-legged seamen with parrots perched on their shoulders.[2]');

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `INVENTORY_ID` int NOT NULL,
  `PRODUCT_ID` int DEFAULT NULL,
  `QUANTITY` int NOT NULL,
  `LAST_UPDATED` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `OrderItems`
--

CREATE TABLE `OrderItems` (
  `ORDER_ITEM_ID` int NOT NULL,
  `ORDER_ID` int DEFAULT NULL,
  `PRODUCT_ID` int DEFAULT NULL,
  `QUANTITY` int NOT NULL,
  `PRICE` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `ORDER_ID` int NOT NULL,
  `USER_ID` int DEFAULT NULL,
  `ORDER_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `SHIPPING_ADDRESS` text,
  `SHIPPING_CITY` enum('Aşgabat','Anew','Arkadag') DEFAULT NULL,
  `SHIPPING_STATE` varchar(50) DEFAULT NULL,
  `TOTAL_AMOUNT` decimal(10,2) NOT NULL,
  `PAYMENT_STATUS` enum('Tolendi','Toleg edilmedi') DEFAULT 'Toleg edilmedi',
  `SHIPPING_STATUS` enum('Dostawka edildi','Yolda','Yatyryldy','Indi ugramaly') DEFAULT 'Indi ugramaly'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Payments`
--

CREATE TABLE `Payments` (
  `PAYMENT_ID` int NOT NULL,
  `ORDER_ID` int DEFAULT NULL,
  `PAYMENT_METHOD` varchar(50) DEFAULT NULL,
  `PAYMENT_AMOUNT` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `PRODUCTS_ID` int NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DESCRIPTION` text,
  `PRICE` decimal(10,2) NOT NULL,
  `CATEGORY_ID` int DEFAULT NULL,
  `METR_UZYNLYGY` int NOT NULL,
  `SUPPLIER_ID` int DEFAULT NULL,
  `STOCK_AMOUNT` int DEFAULT '0',
  `CREATED_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`PRODUCTS_ID`, `NAME`, `DESCRIPTION`, `PRICE`, `CATEGORY_ID`, `METR_UZYNLYGY`, `SUPPLIER_ID`, `STOCK_AMOUNT`, `CREATED_DATE`, `UPDATED_DATE`) VALUES
(1, 'Armatur 8mm', NULL, '16800.00', 1, 12, NULL, 20000, '2024-08-07 12:25:41', '2024-08-07 12:41:25'),
(2, 'Armatur 32mm', NULL, '18000.00', 1, 12, NULL, 12000, '2024-08-07 12:25:41', '2024-08-07 12:41:29'),
(3, 'Profil 40x40', NULL, '14500.00', 2, 6, NULL, 40000, '2024-08-07 12:28:03', '2024-08-07 12:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `Suppliers`
--

CREATE TABLE `Suppliers` (
  `SUPPLIER_ID` int NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `ADDRESS` text,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `CITY` enum('Aşgabat','Anew','Arkadag') DEFAULT NULL,
  `STATE` varchar(50) DEFAULT NULL,
  `CREATED_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `USER_ID` int NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `CITY` enum('Aşgabat','Anew','Arkadag') DEFAULT NULL,
  `STATE` varchar(50) DEFAULT NULL,
  `CREATED_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`INVENTORY_ID`);

--
-- Indexes for table `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD PRIMARY KEY (`ORDER_ITEM_ID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`ORDER_ID`);

--
-- Indexes for table `Payments`
--
ALTER TABLE `Payments`
  ADD PRIMARY KEY (`PAYMENT_ID`);

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`PRODUCTS_ID`);

--
-- Indexes for table `Suppliers`
--
ALTER TABLE `Suppliers`
  ADD PRIMARY KEY (`SUPPLIER_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`USER_ID`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `CATEGORY_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Inventory`
--
ALTER TABLE `Inventory`
  MODIFY `INVENTORY_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `OrderItems`
--
ALTER TABLE `OrderItems`
  MODIFY `ORDER_ITEM_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `ORDER_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payments`
--
ALTER TABLE `Payments`
  MODIFY `PAYMENT_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `PRODUCTS_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Suppliers`
--
ALTER TABLE `Suppliers`
  MODIFY `SUPPLIER_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `USER_ID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
