-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 30, 2024 at 09:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kendirweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `ID` int NOT NULL,
  `CATEGORY_ID` int NOT NULL,
  `CATEGORY_NAME` varchar(150) NOT NULL,
  `PRODUCT_FULL_NAME` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PRODUCT_CODE` varchar(100) NOT NULL,
  `CATEGORY_PHOTO` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `CATEGORY_DESC` text NOT NULL,
  `image_path` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`ID`, `CATEGORY_ID`, `CATEGORY_NAME`, `PRODUCT_FULL_NAME`, `PRODUCT_CODE`, `CATEGORY_PHOTO`, `CATEGORY_DESC`, `image_path`) VALUES
(27, 1, 'Metalprokat', 'Armatur', 'ARM01', '1709269299.jpg', 'Ýokary hilli we ynamdar armaturlar. Eýran we Russiýanyň öňdebaryjy metal kärhanalarynyň önümlerini halkymyza hödürleýäris.\n\nDemir armatur, adatça ýüzü şekilli ýokary güýçli, gyzgyn polatdan ýasalýar. Daşyndaky betony has gowy saklaýarlar, şonuň üçin betonyň içinde güýçli sep emele getirýär\n', 'images/metal/'),
(28, 1, 'Metalprokat', 'Turba', 'TUR01', '3.jpg', 'Demir turbalar kebşirlemek ýa-da togalamak arkaly polatdan ýasalan tegelek önümdir. Turbalar turbageçiriji ulgamlary (suw, gaz, senagat serişdeleri we ş.m.) döretmekde we metal gurluşlaryň elementi hökmünde gurluşykda ulanylýar.', 'images/metal/'),
(31, 1, 'Metalprokat', 'Ugolok', 'UGL01', 'corner.jpg', 'Demir ugoloklar gurluşykda iň köp ulanylýan materiallardandyr. Iki aýakly (köplenç 90 dereje burç bilen) demir ugoloklar burçdan goramak, çarçuwalamak, köpri ýoly gurmak ýa-da ammar binasy üçin niýetlenendir.', 'images/metal/'),
(32, 1, 'Metalprokat', 'List', 'LIS01', 'list_2.jpg', 'Listler  durli olceglerde, hil we .........', 'images/metal/'),
(45, 1, 'Metalprokat', 'Dwuhtawr', 'DWT01', '4.jpg', 'Stokda haryt yok\n', 'images/metal/'),
(49, 1, 'Metalprokat', 'Shweller', 'SHW01', 'shweller.jpg', 'SHWELLER METALLAR ', 'images/metal/'),
(79, 1, 'Metalprokat', 'Profil', 'PRF01', '1710225037.jpg', 'Metal profiller: islendik programma üçin güýç we köp taraplylyk\nMetal profiller polatdan, alýumin ýa-da poslamaýan polatdan inedördül çybyklardyr.\nMetal profilleriň esasy artykmaçlyklary:\n·         Çydamlylygy: Olaryň boşlugy ajaýyp güýç-agram derejesini üpjün edýär, ep-esli ýüklere çydamly bolmaga mümkinçilik berýär.\n·         Köpdürlüligi: Dürli zerurlyklary kanagatlandyrmak üçin metal profilleri kesip, kebşirläp, burawlap we işläp bolýar. Gurluşyk, mebel ýasamak ýa-da döredijilikli .', 'images/metal/'),
(87, 6, 'Gurlusyk', 'SANTEHNIKA', 'SAN_GUR', 'santehnika3.jpg', 'Santehnika onumleri', 'images/gurlusyk/bigmenuimg'),
(88, 2, 'Shifer', 'Tolkun  we tekiz sifer', 'SHF02', '5.jpg', 'durli renkli\n', 'images/sifer/'),
(90, 6, 'Gurlusyk', 'GURLUŞYK-HARYTLARY', 'GUR_EN', 'guroy.jpg', 'GURLUŞYK-ENJAMLARY', 'images/gurlusyk/bigmenuimg'),
(94, 6, 'Gurlusyk', 'Boyag-gurallary', 'BYG_GUR', 'boyag2.jpg', 'boyag gurallary', 'images/gurlusyk/bigmenuimg'),
(95, 6, 'Gurlusyk', 'Alçypanlar profiller', 'ALC_GUR', 'alcypanlar.jpg', 'Alcypanlar Turkiye we Turkmen onumleri', 'images/gurlusyk/bigmenuimg'),
(96, 6, 'Gurlusyk', 'Hojalyk-harytlar', 'HHR', 'hojalyk.jpg', 'Hojalykga degisli harytlar', 'images/gurlusyk/bigmenuimg'),
(98, 6, 'Gurlusyk', 'ELEKTRIK-HARYTLARY', ' GUR_ELK', 'elektro_haryt.jpg', 'eragg', 'images/gurlusyk/bigmenuimg'),
(101, 6, 'Gurlusyk', 'ELEKTRIK-GURALLARY', 'ELK_GUR', 'elktrogurallar1.jpeg', 'elktro gurallar', 'images/gurlusyk/bigmenuimg'),
(102, 6, 'Gurlusyk', 'GURALLAR', 'GURALLAR', 'gurlusyk.png', 'GURALLAR BOLUMI', 'images/gurallar/');

-- --------------------------------------------------------

--
-- Table structure for table `client_messages`
--

CREATE TABLE `client_messages` (
  `id` int NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `client_messages`
--

INSERT INTO `client_messages` (`id`, `client_name`, `email`, `phone`, `subject`, `content`) VALUES
(20, 'guvanch', 'tkm_smile999@gmail.com', '65864959', 'harytlar', 'yes or no..?'),
(22, 'guvanch', 'info@gmail.com', '+99365787878', 'jjjj', 'kjkjkjk'),
(23, 'Guvanch', 'Kabulov@gmail.com', '65864959', 'harytlar', 'Täze zaman köçesi 180/2 jaýy, Bagtyýarlyk etrap, Aşgabat, Türkmenistan');

-- --------------------------------------------------------

--
-- Table structure for table `Customers`
--

CREATE TABLE `Customers` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `region` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `customer_id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `order_number` int NOT NULL,
  `order_date` date NOT NULL,
  `is_deleted` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Customers`
--

INSERT INTO `Customers` (`id`, `name`, `surname`, `email`, `phone`, `region`, `notes`, `customer_id`, `order_number`, `order_date`, `is_deleted`) VALUES
(297, 'Guvanc', 'Kabulow', '', '65864959', 'Asgabat 1', 'Halac etraby', '0.zqvyxdpfwi4640', 648248, '2024-11-01', 1),
(298, 'Guvanc', 'Kabulow', '', '65864959', 'Asgabat 1', 'Turkmenabat saheri', '0.uexig9ajz569311', 625524, '2024-11-02', 1),
(299, 'Sapar', 'Murat', '', '63525209', 'Asgabat 1', '40 yillik obasy', '0.ezb0iyfirnf48257', 40958, '2024-11-03', 0),
(300, 'Selim', 'Aga', '', '62964427', 'Asgabat 1', 'SEFfswfesfeW', '0.zjlkmu1tby78042', 90571, '2024-11-01', 1),
(301, 'Guvanc', 'Kabulow', '', '65864959', 'Asgabat 1', 'dddd', '0.7ptingi8igi35068', 131363, '2024-11-01', 1),
(302, 'Guvanc', 'Kabulow', '', '65864959', 'Asgabat 1', 'ffffff', '0.m6k8ikqj2vc18248', 313613, '2024-11-09', 1),
(303, 'Selim', 'Aga', '', '62964427', 'Asgabat 1', 'Hojambaz acıl lazım', '0.ex9i6re88i12354', 989226, '2024-11-15', 0),
(304, 'Annakuwwat', 'Gylyçdurdyýew', '', '65118659', 'Gökdepe', 'Gökdepe etrap, Gökdepe şäheri Kerpiçniý köçesi 17 jaý', '0.kbo7crlvin17574', 670340, '1996-02-03', 1),
(305, 'Guvanc', 'Kabulow', '', '65864959', 'Änew', 'yes or no?', '0.wig7log6r0s95012', 322778, '2024-11-23', 1),
(306, 'Selim', 'Aga', '', '62964427', 'Asgabat', 'ajhgjkrAKGJB', '0.fc52cjpvy9942149', 882415, '2024-11-30', 0),
(307, 'Selim', 'Aga', '', '62964427', 'Asgabat', 'ajhgjkrAKGJB', '0.veoubjyxzp95888', 6267, '2024-11-30', 1),
(308, 'Guvanc', 'Kabulow', '', '65864959', 'Asgabat', '', '0.r9v8ezaooys60425', 175428, '2024-11-26', 1),
(309, 'Guvanc', 'Kabulow', '', '65864959', 'Asgabat', '', '0.muzv2uo9vnf90283', 741508, '2024-11-26', 1),
(310, 'Guvanc', 'Kabulow', '', '65864959', 'Asgabat', '87878', '0.o58vtzfl2hi54451', 898515, '2024-11-29', 1),
(311, 'Guvanc', 'Kabulow', '', '65864959', 'Asgabat', '87878', '0.zmbwo9ljv6m92011', 25186, '2024-11-29', 1),
(312, 'Guvanc', 'Kabulow', '', '65864959', 'Asgabat', 'jjjjj', '0.5kci6k8utg993368', 281496, '2024-11-30', 0),
(313, 'Guvanc', 'Kabulow', '', '65864959', 'Asgabat', 'jjjjj', '0.l1vy4mbzjem94275', 423432, '2024-11-30', 1);

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
-- Table structure for table `Main_carousel`
--

CREATE TABLE `Main_carousel` (
  `id` int NOT NULL,
  `title` varchar(200) NOT NULL,
  `surat` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Main_carousel`
--

INSERT INTO `Main_carousel` (`id`, `title`, `surat`, `description`) VALUES
(1, 'METAL PROKAT', 'demir.jpg\n', 'KENDIR-TÜRKMENISTANDAKY IŇ ULY METALPROKAT KÄRHANASY'),
(2, 'ŞIFER ÖNÜMLERI', 'roofstype.jpg', 'ÖÝÜŇIZIŇ ÜÇEGINI 25 ÝYLLYK KEPILLI ŞIFER ÖNÜMLERIMIZ BILEN ÝAPYŇ'),
(3, 'PLASTIKA WE ALÝUMIN ÖNÜMLERI', 'banner3.png', 'ÄHLI GURLUŞYGA GEREKLI ÄHLI GURLUŞYK GURALLAR WE HARYTLARYNY BIZDEN AMATLY BAHALARDAN SATYN ALYŇ');

-- --------------------------------------------------------

--
-- Table structure for table `navbar_links`
--

CREATE TABLE `navbar_links` (
  `ID` int NOT NULL,
  `PARENT_ID` int NOT NULL,
  `CATEGORY_NAME` varchar(150) NOT NULL,
  `PAGE_NAME` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PAGE_LINK` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `navbar_links`
--

INSERT INTO `navbar_links` (`ID`, `PARENT_ID`, `CATEGORY_NAME`, `PAGE_NAME`, `PAGE_LINK`) VALUES
(1, 1, 'Metalprokat', 'ARMATUR', 'metalls'),
(2, 1, 'Metalprokat', 'PROFIL', 'metalls'),
(3, 1, 'Metalprokat', 'LIST', 'metalls'),
(4, 1, 'Metalprokat', 'UGOLOK', 'metalls'),
(5, 1, 'Metalprokat', 'TURBA', 'metalls'),
(6, 1, 'Metalprokat', 'SHWELLER', 'metalls'),
(7, 1, 'Metalprokat', 'DWUTAWR', 'metalls'),
(8, 6, 'GURLUSYK', 'BOYAG', 'gurlusyk');

-- --------------------------------------------------------

--
-- Table structure for table `OrderItems`
--

CREATE TABLE `OrderItems` (
  `ORDER_ITEM_ID` int NOT NULL,
  `customer_id` varchar(25) NOT NULL,
  `order_number` int NOT NULL,
  `PRODUCTS_ID` int DEFAULT NULL,
  `QUANTITY` int NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `METER_PRICE` decimal(10,2) DEFAULT NULL,
  `is_deleted` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `OrderItems`
--

INSERT INTO `OrderItems` (`ORDER_ITEM_ID`, `customer_id`, `order_number`, `PRODUCTS_ID`, `QUANTITY`, `PRICE`, `METER_PRICE`, `is_deleted`) VALUES
(556, '0.zqvyxdpfwi4640', 648248, 348, 1, '8.00', '8.00', 1),
(557, '0.zqvyxdpfwi4640', 648248, 347, 5, '45.00', '9.00', 1),
(558, '0.zqvyxdpfwi4640', 648248, 117, 5, '118.20', '23.64', 1),
(559, '0.uexig9ajz569311', 625524, 121, 6, '546.06', '91.01', 1),
(560, '0.uexig9ajz569311', 625524, 356, 1, '4.00', '4.00', 1),
(561, '0.ezb0iyfirnf48257', 40958, 271, 3, '261.21', '87.07', 0),
(562, '0.ezb0iyfirnf48257', 40958, 358, 1, '120.00', '120.00', 1),
(563, '0.ezb0iyfirnf48257', 40958, 365, 2, '74.00', '37.00', 0),
(564, '0.zjlkmu1tby78042', 90571, 383, 1, '1.00', '1.00', 1),
(565, '0.zjlkmu1tby78042', 90571, 406, 1, '50.00', '50.00', 1),
(566, '0.zjlkmu1tby78042', 90571, 355, 1, '13.00', '13.00', 1),
(567, '0.gl7leom9cm71586', 647043, 343, 1, '5.00', '5.00', 0),
(568, '0.gl7leom9cm71586', 647043, 344, 1, '14.00', '14.00', 0),
(569, '0.7ptingi8igi35068', 131363, 344, 1, '14.00', '14.00', 1),
(570, '0.7ptingi8igi35068', 131363, 347, 1, '9.00', '9.00', 1),
(571, '0.m6k8ikqj2vc18248', 313613, 367, 5, '200.00', '40.00', 1),
(572, '0.m6k8ikqj2vc18248', 313613, 366, 1, '80.00', '80.00', 1),
(573, '0.m6k8ikqj2vc18248', 313613, 365, 1, '37.00', '37.00', 1),
(574, '0.m6k8ikqj2vc18248', 313613, 364, 6, '120.00', '20.00', 1),
(575, '0.ex9i6re88i12354', 989226, 460, 1, '1.00', '1.00', 0),
(576, '0.ex9i6re88i12354', 989226, 464, 1, '1.00', '1.00', 0),
(577, '0.ex9i6re88i12354', 989226, 468, 1, '1.00', '1.00', 0),
(578, '0.kbo7crlvin17574', 670340, 511, 1, '152.00', '152.00', 1),
(579, '0.wig7log6r0s95012', 322778, 428, 3, '3.00', '1.00', 1),
(580, '0.wig7log6r0s95012', 322778, 495, 2, '90.00', '45.00', 1),
(581, '0.wig7log6r0s95012', 322778, 440, 1, '1.00', '1.00', 1),
(582, '0.veoubjyxzp95888', 6267, 491, 1, '1.00', '1.00', 1),
(583, '0.fc52cjpvy9942149', 882415, 491, 1, '1.00', '1.00', 0),
(584, '0.veoubjyxzp95888', 6267, 627, 2, '88.00', '44.00', 1),
(585, '0.fc52cjpvy9942149', 882415, 627, 2, '88.00', '44.00', 0),
(586, '0.muzv2uo9vnf90283', 741508, 428, 1, '1.00', '1.00', 1),
(587, '0.r9v8ezaooys60425', 175428, 428, 1, '1.00', '1.00', 1),
(588, '0.r9v8ezaooys60425', 175428, 460, 1, '1.00', '1.00', 1),
(589, '0.muzv2uo9vnf90283', 741508, 460, 1, '1.00', '1.00', 1),
(590, '0.r9v8ezaooys60425', 175428, 491, 1, '1.00', '1.00', 1),
(591, '0.muzv2uo9vnf90283', 741508, 491, 1, '1.00', '1.00', 1),
(592, '0.o58vtzfl2hi54451', 898515, 344, 1, '14.00', '14.00', 1),
(593, '0.zmbwo9ljv6m92011', 25186, 344, 1, '14.00', '14.00', 1),
(594, '0.o58vtzfl2hi54451', 898515, 355, 1, '13.00', '13.00', 1),
(595, '0.zmbwo9ljv6m92011', 25186, 355, 1, '13.00', '13.00', 1),
(596, '0.o58vtzfl2hi54451', 898515, 357, 2, '8.00', '4.00', 1),
(597, '0.zmbwo9ljv6m92011', 25186, 357, 2, '8.00', '4.00', 1),
(598, '0.l1vy4mbzjem94275', 423432, 616, 2, '18.00', '9.00', 1),
(599, '0.5kci6k8utg993368', 281496, 616, 2, '18.00', '9.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `id` int NOT NULL,
  `order_number` int NOT NULL,
  `customer_id` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ORDER_DATE` date NOT NULL,
  `SHIPPING_ADDRESS` text,
  `SHIPPING_CITY` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SHIPPING_STATE` varchar(50) DEFAULT NULL,
  `TOTAL_AMOUNT` decimal(10,2) NOT NULL,
  `PAYMENT_STATUS` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SHIPPING_STATUS` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`id`, `order_number`, `customer_id`, `ORDER_DATE`, `SHIPPING_ADDRESS`, `SHIPPING_CITY`, `SHIPPING_STATE`, `TOTAL_AMOUNT`, `PAYMENT_STATUS`, `SHIPPING_STATUS`) VALUES
(313, 648248, '0.zqvyxdpfwi4640', '2024-10-31', 'Halac etraby', 'Asgabat 1', NULL, '171.20', NULL, NULL),
(314, 625524, '0.uexig9ajz569311', '2024-10-31', 'Turkmenabat saheri', 'Asgabat 1', NULL, '550.06', NULL, NULL),
(315, 40958, '0.ezb0iyfirnf48257', '2024-10-31', '40 yillik obasy', 'Asgabat 1', NULL, '455.21', NULL, NULL),
(316, 90571, '0.zjlkmu1tby78042', '2024-10-31', 'SEFfswfesfeW', 'Asgabat 1', NULL, '64.00', NULL, NULL),
(317, 647043, '0.gl7leom9cm71586', '2024-10-31', 'eeee', 'Asgabat 1', NULL, '19.00', NULL, NULL),
(318, 131363, '0.7ptingi8igi35068', '2024-10-31', 'dddd', 'Asgabat 1', NULL, '23.00', NULL, NULL),
(319, 313613, '0.m6k8ikqj2vc18248', '2024-10-31', 'ffffff', 'Asgabat 1', NULL, '437.00', NULL, NULL),
(320, 989226, '0.ex9i6re88i12354', '2024-11-14', 'Hojambaz acıl lazım', 'Asgabat 1', NULL, '3.00', NULL, NULL),
(321, 670340, '0.kbo7crlvin17574', '2024-11-15', 'Gökdepe etrap, Gökdepe şäheri Kerpiçniý köçesi 17 jaý', 'Gökdepe', NULL, '152.00', NULL, NULL),
(322, 322778, '0.wig7log6r0s95012', '2024-11-15', 'yes or no?', 'Änew', NULL, '94.00', NULL, NULL),
(323, 882415, '0.fc52cjpvy9942149', '2024-11-23', 'ajhgjkrAKGJB', 'Asgabat', NULL, '89.00', NULL, NULL),
(324, 6267, '0.veoubjyxzp95888', '2024-11-23', 'ajhgjkrAKGJB', 'Asgabat', NULL, '89.00', NULL, NULL),
(325, 175428, '0.r9v8ezaooys60425', '2024-11-25', '', 'Asgabat', NULL, '3.00', NULL, NULL),
(326, 741508, '0.muzv2uo9vnf90283', '2024-11-25', '', 'Asgabat', NULL, '3.00', NULL, NULL),
(327, 898515, '0.o58vtzfl2hi54451', '2024-11-28', '87878', 'Asgabat', NULL, '35.00', NULL, NULL),
(328, 25186, '0.zmbwo9ljv6m92011', '2024-11-28', '87878', 'Asgabat', NULL, '35.00', NULL, NULL),
(329, 423432, '0.l1vy4mbzjem94275', '2024-11-28', 'jjjjj', 'Asgabat', NULL, '18.00', NULL, NULL),
(330, 281496, '0.5kci6k8utg993368', '2024-11-28', 'jjjjj', 'Asgabat', NULL, '18.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `PARENT_CATEGORY`
--

CREATE TABLE `PARENT_CATEGORY` (
  `ID` int NOT NULL,
  `PARENT_ID` int NOT NULL,
  `CATEGORY_NAME` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `PARENT_CATEGORY`
--

INSERT INTO `PARENT_CATEGORY` (`ID`, `PARENT_ID`, `CATEGORY_NAME`) VALUES
(1, 1, 'Metalprokat'),
(2, 2, 'Shifer'),
(8, 3, 'Setka'),
(9, 4, 'Aygap'),
(10, 5, 'Halta'),
(11, 6, 'Gurlusyk'),
(12, 7, 'Lomay'),
(14, 8, 'halta zawod');

-- --------------------------------------------------------

--
-- Table structure for table `PARENT_PRODUCT_CODE`
--

CREATE TABLE `PARENT_PRODUCT_CODE` (
  `ID` int NOT NULL,
  `PARENT_ID` int NOT NULL,
  `CATEGORY_NAME` varchar(150) NOT NULL,
  `PRODUCT_NAME` varchar(150) NOT NULL,
  `PRODUCT_CODE_NAME` varchar(100) NOT NULL
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
  `PRODUCT_CODE` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `custom_product_id` varchar(150) NOT NULL,
  `PRODUCT_NAME` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `PROD_DESC` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `SHORT_DESC` text NOT NULL,
  `PRICE` decimal(10,2) NOT NULL,
  `CATEGORY_ID` int DEFAULT NULL,
  `LENGTH_METALL` int DEFAULT NULL,
  `QUANTITY` int DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `image_path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `STOCK_AMOUNT` int DEFAULT '0',
  `CREATED_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_DATE` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `METER_WEIGHT` float DEFAULT NULL,
  `Grupba_ady` varchar(100) NOT NULL,
  `BARKOD_NO` varchar(120) DEFAULT NULL,
  `Taze` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Similar_pages` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`PRODUCTS_ID`, `PRODUCT_CODE`, `custom_product_id`, `PRODUCT_NAME`, `PROD_DESC`, `SHORT_DESC`, `PRICE`, `CATEGORY_ID`, `LENGTH_METALL`, `QUANTITY`, `image`, `image_path`, `STOCK_AMOUNT`, `CREATED_DATE`, `UPDATED_DATE`, `METER_WEIGHT`, `Grupba_ady`, `BARKOD_NO`, `Taze`, `Similar_pages`) VALUES
(21, 'ARM01', 'a0015', 'Armatur 8mm x 12m (Eyran)', '', 'Armatur 8mm x 12m (Eyran)', '12411.00', 1, 12, 5, '', '', 0, '2024-09-08 21:00:00', '2024-11-12 06:37:42', 0.395, 'Armatur', NULL, NULL, NULL),
(22, 'TUR01', 't0016', 'Turba 15x2.8 mm 22 (Rus)', '', 'Turba 15x2.8 mm 22 (Rus)', '19700.00', 1, 1, 20, '3.jpg', 'images/metal/', 0, '2024-09-08 21:00:00', '2024-10-10 03:27:44', 1.29, '', NULL, NULL, NULL),
(105, 'ARM01', 'p5bmwhwtzi78656', 'Armatur 10mm x 12m (Eyran)', '', 'Armatur 10mm x 12m (Eyran)', '12411.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-01 21:00:00', '2024-10-09 11:42:40', 0.617, '', NULL, NULL, NULL),
(107, 'TUR01', 'fbmafibl5j74043', 'Turba 20x2,8 mm 27 (Rus)', 'asd', 'Turba 20x2,8 mm 27 (Rus)', '19700.00', 1, 1, NULL, '', '', 0, '2024-10-08 21:00:00', '2024-10-09 12:32:01', 1.67, '', NULL, NULL, NULL),
(108, 'TUR01', 'l5uzo4fc7l21293', 'Turba 25x2,8 mm 33,5 (Rus)', '', 'Turba 25x2,8 mm 33,5 (Rus)', '19700.00', 1, 1, NULL, '', '', 0, '2024-10-08 21:00:00', '2024-10-09 12:32:03', 2.1, '', NULL, NULL, NULL),
(109, 'TUR01', 'ka65wozhfx921134', 'Turba 25x3.2 mm (Rus)', '', 'Turba 25x3.2 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:06', 2.42, '', NULL, NULL, NULL),
(110, 'TUR01', 'covfxbqjtje55693', 'Turba 32x2,8 (43x2,8) mm (Rus)', '', 'Turba 32x2,8 (43x2,8) mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:17', 2.8, '', NULL, NULL, NULL),
(111, 'TUR01', 'g2cosngp0bi33224', 'Turba 32X3 (43x3) mm (Rus)', '', 'Turba 32x3 (43x3) mm (Rus)', '19700.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:20', 3.03, '', NULL, NULL, NULL),
(112, 'ARM01', '61k6heh029c60181', 'Armatur 12mm x 12m (Eyran)', '', 'Armatur 12mm x 12m (Eyran)', '11820.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 11:52:00', 0.888, '', NULL, NULL, NULL),
(113, 'TUR01', 'i6oy3tz8lkb93375', 'Turba 32x3,2 (42,5x3) mm (Rus)', '', 'Turba 32x3,2 (42,5X3) mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:22', 3.1, '', NULL, NULL, NULL),
(114, 'ARM01', '0ous32lxo4ff2226', 'Armatur 14mm x 12m (Eyran)', '', 'Armatur 14mm x 12m (Eyran)', '11820.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 1.21, '', NULL, NULL, NULL),
(115, 'ARM01', 'kf6bi2qz9fh32489', 'Armatur 16mm x 12m (Eyran)', '', 'Armatur 16mm x 12m (Eyran)', '11820.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 1.58, '', NULL, NULL, NULL),
(116, 'TUR01', 'lgrxwj0ivg87815', 'Turba 48x3.5 mm (Rus)', '', 'Turba 48x3.5 mm (Rus)', '19700.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:24', 3.84, '', NULL, NULL, NULL),
(117, 'ARM01', '1bmkp3lz1zj36231', 'Armatur 18mm x 12m (Eyran)', '', 'Armatur 18mm x 12m (Eyran)', '11820.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 2, '', NULL, NULL, NULL),
(118, 'TUR01', 'llz68pwigv47355', 'Turba 57x3 mm (Rus)', '', 'Turba 57x3 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:27', 4, '', NULL, NULL, NULL),
(119, 'ARM01', '29rafxzfy8s70047', 'Armatur 20mm x 12m (Eyran)', '', 'Armatur 20mm x 12m (Eyran)', '11820.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 2.47, '', NULL, NULL, NULL),
(120, 'ARM01', '7rnmj42vt5e36056', 'Armatur 22mm x 12m (Eyran)', '', 'Armatur 22mm x 12m (Eyran)', '11820.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 2.98, '', NULL, NULL, NULL),
(121, 'TUR01', 'err770gajjr4384', 'Turba 57x3.5 mm (Rus)', '', 'Turba 57x3.5 mm (Rus)', '19700.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:31', 4.62, '', NULL, NULL, NULL),
(122, 'TUR01', 'tzt80h96h7m21519', 'Turba 57x3.8 mm (Rus)', '', 'Turba 57x3.8 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:33', 4.99, '', NULL, NULL, NULL),
(123, 'ARM01', 'byb86amxi7k34714', 'Armatur 25mm x 12m (Eyran)', '', 'Armatur 25mm x 12m (Eyran)', '12411.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 3.85, '', NULL, NULL, NULL),
(124, 'TUR01', 'wj3jz587ucp92472', 'Turba 60x3.5 mm (Rus)', '', 'Turba 60x3.5 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:36', 4.88, '', NULL, NULL, NULL),
(125, 'TUR01', 'yv6c4lpvuk52519', 'Turba 76x3.0 mm (Rus)', '', 'Turba 76x3.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:39', 5.4, '', NULL, NULL, NULL),
(126, 'ARM01', 'uftrkec17p49549', 'Armatur 28mm x 12m (Eyran)', '', 'Armatur 28mm x 12m (Eyran)', '11820.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 4.83, '', NULL, NULL, NULL),
(127, 'ARM01', 'bzwik4rz0e89481', 'Armatur 32mm x 12m (Eyran)', '', 'Armatur 32mm x 12m (Eyran)', '11820.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 6.31, '', NULL, NULL, NULL),
(128, 'TUR01', 'b5x51hl89xv80056', 'Turba 76x3.5 mm (Rus)', '', 'Turba 76x3.5 mm (Rus)', '19700.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:47', 6.26, '', NULL, NULL, NULL),
(129, 'TUR01', '772kea0260g34972', 'Turba 76x4.0 mm (Rus)', '', 'Turba 76x4.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:49', 7.1, '', NULL, NULL, NULL),
(130, 'TUR01', 'dx8we6mtonv82743', 'Turba 89x3.0 mm (Rus)', '', 'Turba 89x3.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:32:52', 6.36, '', NULL, NULL, NULL),
(132, 'TUR01', 'uyb23husxl47733', 'Turba 89x4.0 mm (Rus)', '', 'Turba 89x4.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:28', 8.38, '', NULL, NULL, NULL),
(133, 'TUR01', 'b2zu7e50bm34736', 'Turba 102x3.8 mm (Rus)', '', 'Turba 102x3.8 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:31', 9.21, '', NULL, NULL, NULL),
(134, 'TUR01', 'kdaw08362s984078', 'Turba 102x4.0 mm (Rus)', '', 'Turba 102x4.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:33', 9.67, '', NULL, NULL, NULL),
(135, 'TUR01', 'kk5k5dlvltk78579', 'Turba 108x3.5 mm (Rus)', '', 'Turba 108x3.5 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:35', 9.02, '', NULL, NULL, NULL),
(136, 'TUR01', 'fzjlbc9asx3696', 'Turba 108x4.0 mm (Rus)', '', 'Turba 108x4.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:37', 10.26, '', NULL, NULL, NULL),
(138, 'TUR01', 'n2zq12q4en54368', 'Turba 114x3,8 mm (Rus)', '', 'Turba 114x3,8 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:39', 10.33, '', NULL, NULL, NULL),
(139, 'TUR01', 'jzvdv3as6p62619', 'Turba 114x3,5 mm (Rus)', '', 'Turba 114x3,5 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:41', 9.54, '', NULL, NULL, NULL),
(140, 'ARM01', 'r1dmhlofs366457', 'Armatur 10mm x 12m (Russiya)', '', 'Armatur 10mm x 12m (Russiya)', '12805.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 0.617, '', NULL, NULL, NULL),
(141, 'TUR01', 'ycang8abo6e57635', 'Turba 89x3.8 mm (Rus)', '', 'Turba 89x3.8 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:43', 8, '', NULL, NULL, NULL),
(142, 'ARM01', '7ldwl9bm4lm90410', 'Armatur 12mm x 12m (Russiya)', '', 'Armatur 12mm x 12m (Russiya)', '12805.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 0.888, '', NULL, NULL, NULL),
(143, 'ARM01', 'c37pbwovjt34499', 'Armatur 16mm x 12m (Russiya)', '', 'Armatur 16mm x 12m (Russiya)', '12805.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 1.58, '', NULL, NULL, NULL),
(144, 'TUR01', '3v73tkhbbje3606', 'Turba 114x4,5 mm (Rus)', '', 'Turba 114x4,5 mm (Rus)', '19700.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:45', 12.152, '', NULL, NULL, NULL),
(145, 'ARM01', 'l9n2otjjnff95739', 'Armatur 18mm x 12m (Russiya)', '', 'Armatur 18mm x 12m (Russiya)', '12805.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 2, '', NULL, NULL, NULL),
(146, 'ARM01', 'unmlqrvyp861866', 'Armatur 20mm x 12m (Russiya)', '', 'Armatur 20mm x 12m (Russiya)', '12805.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 2.47, '', NULL, NULL, NULL),
(147, 'ARM01', 'tictfyvnibd30818', 'Armatur 22mm x 12m (Russiya)', '', 'Armatur 22mm x 12m (Russiya)', '12805.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 2.98, '', NULL, NULL, NULL),
(148, 'TUR01', '1w3ab3s3vq94719', 'Turba 114x4.0 mm (Rus)', '', 'Turba 114x4.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:47', 10.85, '', NULL, NULL, NULL),
(149, 'ARM01', 'emmuhlivj845667', 'Armatur 32mm x 12m (Russiya)', '', 'Armatur 32mm x 12m (Russiya)', '12805.00', 1, 12, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 6.31, '', NULL, NULL, NULL),
(150, 'TUR01', 'hg5sm87v3qq92790', 'Turba 114x5.0 mm (Rus)', '', 'Turba 114x5.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:50', 13.441, '', NULL, NULL, NULL),
(151, 'TUR01', 'rc0rpyf0ym57752', 'Turba 114x6.0 mm (Rus)', '', 'Turba 114x6.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:53', 15.981, '', NULL, NULL, NULL),
(152, 'TUR01', '3feqvs7cwob1734', 'Turba 127x4.0 mm (Rus)', '', 'Turba 127x4.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:55', 12.133, '', NULL, NULL, NULL),
(153, 'TUR01', '4qxz5el2bz585038', 'Turba 133x4.0 mm (Rus)', '', 'Turba 133x4.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:33:57', 12.74, '', NULL, NULL, NULL),
(154, 'TUR01', 'cvprppkqfvr30272', 'Turba 133x4.5 mm (Rus)', '', 'Turba 133x4.5 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 14.261, '', NULL, NULL, NULL),
(155, 'TUR01', '5jsewfxzjic24178', 'Turba 133x11 mm (Rus)', '', 'Turba 133x11 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 33.1, '', NULL, NULL, NULL),
(156, 'TUR01', 'sieeulf8lj963580', 'Turba 159x4.5 mm (Rus)', '', 'Turba 159x4.5 mm (Rus)', '19700.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 17.15, '', NULL, NULL, NULL),
(157, 'TUR01', '29fssq7n7ww61790', 'Turba 159x5.0 mm (Rus)', '', 'Turba 159x5.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 18.98, '', NULL, NULL, NULL),
(158, 'TUR01', '0v6aanyo10ga18970', 'Turba 159x8.0 mm (Rus)', '', 'Turba 159x8.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 29.8, '', NULL, NULL, NULL),
(159, 'TUR01', 'vs2xz833pre81015', 'Turba 165x5.0 mm (Rus)', '', 'Turba 165x5.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 19.73, '', NULL, NULL, NULL),
(160, 'TUR01', 's8w6s8lof3n95134', 'Turba 169x4.5 mm (Rus)', '', 'Turba 169x4.5 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 18.26, '', NULL, NULL, NULL),
(161, 'TUR01', '9y1qn9u45081006', 'Turba 219x4.0 mm (Rus)', '', 'Turba 219x4.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 12:44:34', 21.21, '', NULL, NULL, NULL),
(162, 'TUR01', '0vmj5124yah16605', 'Turba 219x5.0 mm (Rus)', '', 'Turba 219x5.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 26.39, '', NULL, NULL, NULL),
(163, 'TUR01', '77c3dhpntpk57478', 'Turba 219x6.0 mm (Rus)', '', 'Turba 219x6.0 mm (Rus)', '19700.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 31.52, '', NULL, NULL, NULL),
(164, 'TUR01', '8id4citnfps28214', 'Turba 219x7.0 mm (Rus)', '', 'Turba 219x7.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 36.6, '', NULL, NULL, NULL),
(165, 'TUR01', 'vmueydoxht26960', 'Turba 219x8.0 mm (Rus)', '', 'Turba 219x8.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 41.63, '', NULL, NULL, NULL),
(166, 'TUR01', '8znvzgxzjc792199', 'Turba 48x3.0 mm (Rus)', '', 'Turba 48x3.0 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 3.36, '', NULL, NULL, NULL),
(167, 'TUR01', '76ne4tku30h15216', 'Turba 325x6.0 mm(Rus)', '', 'Turba 325x6.0 mm(Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 47.1, '', NULL, NULL, NULL),
(168, 'TUR01', 'ryr4n4btfk10067', 'Turba 273x6 mm (Rus)', '', 'Turba 273x6 mm (Rus)', '17730.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 39.508, '', NULL, NULL, NULL),
(169, 'TUR01', '4bj68b41s4j75863', 'Turba 273x7 mm (Rus)', '', 'Turba 273x7 mm (Rus)', '20685.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 45.92, '', NULL, NULL, NULL),
(170, 'TUR01', 'ecwtzj5y9wr95173', 'Turba 219x3.5 mm (Eýran)', '', 'Turba 219x3.5 mm (Eýran)', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-08 21:00:00', 18.1, '', NULL, NULL, NULL),
(171, 'TUR01', 'jc01zuncdk41314', 'Turba 51x2,5 mm (Eýran)', '', 'Turba 51x2,5 mm (Eýran)', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 13:01:02', 2.99, '', NULL, NULL, NULL),
(172, 'TUR01', 's36pr0muur898797', 'Turba 25x3.2 mm (Eýran)', '', 'Turba 25x3.2 mm (Eýran)', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 13:00:59', 2.25, '', NULL, NULL, NULL),
(173, 'TUR01', 'v8uzh1kaswm95360', 'Turba 89x3.0 mm (Eýran)', '', 'Turba 89x3.0 mm (Eýran)', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 13:00:55', 5.47, '', NULL, NULL, NULL),
(174, 'TUR01', 'q84x9cy31496546', 'Turba 165x3.0 mm (Eýran)', '', 'Turba 165x3.0 mm (Eýran)', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 13:00:51', 12.5, '', NULL, NULL, NULL),
(175, 'TUR01', 'x5it86lqid48009', 'Turba 159x3.0 mm (Eýran)', '', 'Turba 159x3.0 mm (Eýran)', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-08 21:00:00', '2024-10-09 13:00:48', 12, '', NULL, NULL, NULL),
(176, 'TUR01', 'batkwqqn9m60733', 'Turba 32x2.0 mm (Eýran) 42 mm', '', 'Turba 32x2.0 mm (Eýran) 42 mm', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 2.1, '', NULL, NULL, NULL),
(177, 'TUR01', '4zei96v35fr54251', 'Turba 25x2.0 mm (Eýran) 32 mm', '', 'Turba 25x2.0 mm (Eýran) 32 mm', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 1.6, '', NULL, NULL, NULL),
(178, 'TUR01', 'jezidcq77js32479', 'Turba 20x2.0 mm (Eýran) 25 mm', '', 'Turba 20x2.0 mm (Eýran) 25 mm', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 1.2, '', NULL, NULL, NULL),
(179, 'TUR01', 'uku4t8zbrjm98136', 'Turba 15x2.0 mm (Eýran) 22 mm', '', 'Turba 15x2.0 mm (Eýran) 22 mm', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 1.1, '', NULL, NULL, NULL),
(180, 'TUR01', 'j0o83zypam68280', 'Turba 51x2.0 mm (Eýran)', '', 'Turba 51x2.0 mm (Eýran)', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 2.5, '', NULL, NULL, NULL),
(181, 'TUR01', '3h2a6xkbjri33025', 'Turba 102x2.0 mm (Eýran) ', '', 'Turba 102x2.0 mm (Eýran) ', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 5, '', NULL, NULL, NULL),
(182, 'TUR01', 'ysqcyofqpuh18214', 'Turba 57x2.0 mm (Eýran)', '', 'Turba 57x2.0 mm (Eýran)', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 2.9, '', NULL, NULL, NULL),
(183, 'TUR01', 'y0f0zaysfl43293', 'Turba 76x2.0 mm (Eýran)', '', 'Turba 76x2.0 mm (Eýran)', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 3.75, '', NULL, NULL, NULL),
(184, 'TUR01', '06wh8oh0jsnd44626', 'Turba 89x2.0 mm (Eýran) ', '', 'Turba 89x2.0 mm (Eýran) \r\n', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 4.39, '', NULL, NULL, NULL),
(185, 'TUR01', '8l0if4fqgu7865', 'Turba 50x2.0 mm (Eýran)', '', 'Turba 50x2.0 mm (Eýran)', '15760.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 2.37, '', NULL, NULL, NULL),
(186, 'TUR01', '3it1gyp3kh89644', 'Turba 89x2.5 mm (Türk)', '', 'Turba 89x2.5 mm (Türk)', '17730.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 5.33, '', NULL, NULL, NULL),
(187, 'TUR01', '6i1kye16tkl48559', 'Turba 102x3.5 mm (Türk)', '', 'Turba 102x3.5 mm (Türk)', '17730.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 8.6, '', NULL, NULL, NULL),
(188, 'TUR01', 'nsmecvxammn87486', 'Turba 114x2.5 mm (Türk)', '', 'Turba 114x2.5 mm (Türk)', '17730.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 6.88, '', NULL, NULL, NULL),
(189, 'TUR01', '720figeyhf336431', 'Turba 140x3.0 mm (Türk)', '', 'Turba 140x3.0 mm (Türk)', '17730.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 10.14, '', NULL, NULL, NULL),
(190, 'PRF01', '2g56zvl198r35612', 'Profil 20x20/2 mm', '', 'Profil 20x20/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 7, '', NULL, NULL, NULL),
(191, 'PRF01', 'ijxxzd37hwn75148', 'Profil 20x30/2 mm', '', 'Profil 20x30/2 mm\r\n', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 9, '', NULL, NULL, NULL),
(192, 'PRF01', 'x3v7ktetcd93064', 'Profil 20x40/2 mm', '', 'Profil 20x40/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 10.4, '', NULL, NULL, NULL),
(193, 'PRF01', 'w3r6mw20crl55025', 'Profil 30x30/2 mm', '', 'Profil 30x30/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 10.4, '', NULL, NULL, NULL),
(194, 'PRF01', 'kx8lukmo3sr58068', 'Profil 30x40/2 mm', '', 'Profil 30x40/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 13, '', NULL, NULL, NULL),
(195, 'PRF01', 'da4v3woydo442872', 'Profil 40x40/2 mm', '', 'Profil 40x40/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 13, '', NULL, NULL, NULL),
(196, 'PRF01', 'g2iz2b8niav39097', 'Profil 40x60/2 mm', '', 'Profil 40x60/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 18.7, '', NULL, NULL, NULL),
(197, 'PRF01', 'nhidrcoc7l45923', 'Profil 50x50/2 mm', '', 'Profil 50x50/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 18.75, '', NULL, NULL, NULL),
(198, 'PRF01', '6wfrpin2ncv80462', 'Profil 40x80/2 mm', '', 'Profil 40x80/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 22.5, '', NULL, NULL, NULL),
(199, 'PRF01', 'jcyaip5vkmc36724', 'Profil 60x60/2 mm', '', 'Profil 60x60/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 22.5, '', NULL, NULL, NULL),
(200, 'PRF01', 'f29ggkl3ozr14304', 'Profil 60x60/2,8 mm', '', 'Profil 60x60/2,8 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 30.8, '', NULL, NULL, NULL),
(201, 'PRF01', '67jgp31cosh89083', 'Profil 60x80/2 mm', '', 'Profil 60x80/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 26.2, '', NULL, NULL, NULL),
(202, 'PRF01', '9yqlm92ytz892317', 'Profil 80x80/2 mm', '', 'Profil 80x80/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 30, '', NULL, NULL, NULL),
(203, 'PRF01', 'a6ncbicgt978165', 'Profil 40x100/2 mm', '', 'Profil 40x100/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 26.3, '', NULL, NULL, NULL),
(204, 'PRF01', '4axkjdhvpq537586', 'Profil 50x100/2 mm', '', 'Profil 50x100/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 28.4, '', NULL, NULL, NULL),
(205, 'PRF01', 'bi9d166vo9b47303', 'Profil 100x100/2 mm', '', 'Profil 100x100/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 38, '', NULL, NULL, NULL),
(206, 'PRF01', '465ytk6dwgb19263', 'Profil 100x60/2 mm', '', 'Profil 100x60/2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 31, '', NULL, NULL, NULL),
(207, 'PRF01', '9m8w3wm77hn38272', 'Profil 40x40/2,8 mm', '', 'Profil 40x40/2,8 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 20.1, '', NULL, NULL, NULL),
(208, 'PRF01', '2geop46phev86411', 'Profil 40x40/3 mm', '', 'Profil 40x40/3 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 22, '', NULL, NULL, NULL),
(209, 'PRF01', 'kfsus0y8f847991', 'Profil 40x40/3.2 mm', '', 'Profil 40x40/3.2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 22.7, '', NULL, NULL, NULL),
(210, 'PRF01', 'btd9isnw0el45513', 'Profil 40x60/2,5 mm', '', 'Profil 40x60/2,5 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 22.7, '', NULL, NULL, NULL),
(211, 'PRF01', 'grlxqx10wc3974', 'Profil 40x60/2,7 mm', '', 'Profil 40x60/2,7 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 24, '', NULL, NULL, NULL),
(212, 'PRF01', 'b1v8yq7mbsv28650', 'Profil 40x60/3 mm', '', 'Profil 40x60/3 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 28, '', NULL, NULL, NULL),
(213, 'PRF01', 'bu5k7xo3z8u37661', 'Profil 40x60/3,2 mm', '', 'Profil 40x60/3,2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 28.9, '', NULL, NULL, NULL),
(214, 'PRF01', 'cekuzwhtzn98249', 'Profil 40x80/2,8 mm', '', 'Profil 40x80/2,8 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 30.5, '', NULL, NULL, NULL),
(215, 'PRF01', '322tamfczml80920', 'Profil 40x80/3 mm', '', 'Profil 40x80/3 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 33.5, '', NULL, NULL, NULL),
(216, 'PRF01', 'zxtahukau8h14853', 'Profil 60x60/2,8 mm', '', 'Profil 60x60/2,8 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 30.8, '', NULL, NULL, NULL),
(217, 'PRF01', 'hpg9ws4579n40887', 'Profil 60x60/3 mm', '', 'Profil 60x60/3 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 34, '', NULL, NULL, NULL),
(218, 'PRF01', 'a04klic2d4u84811', 'Profil 60x60/3,2 mm', '', 'Profil 60x60/3,2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 34.8, '', NULL, NULL, NULL),
(219, 'PRF01', 'dgf91r6xjm41493', 'Profil 60x60/3,7 mm', '', 'Profil 60x60/3,7 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 40.4, '', NULL, NULL, NULL),
(220, 'PRF01', 'qjchkui9bvf34016', 'Profil 80x60/3 mm', '', 'Profil 80x60/3 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 39, '', NULL, NULL, NULL),
(221, 'PRF01', 'isv9buvb2k86155', 'Profil 80x80/3 mm', '', 'Profil 80x80/3 mm', '16351.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 45, '', NULL, NULL, NULL),
(222, 'PRF01', 'htpnsa7exnt74356', 'Profil 80x80/3,2 mm', '', 'Profil 80x80/3,2 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 46.9, '', NULL, NULL, NULL),
(223, 'PRF01', 'kevlbpccrk24588', 'Profil 100x50/3 mm', '', 'Profil 100x50/3 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 41.5, '', NULL, NULL, NULL),
(224, 'PRF01', 'p64urwuffd932489', 'Profil 100x100/3 mm', '', 'Profil 100x100/3 mm', '15760.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 56, '', NULL, NULL, NULL),
(225, 'PRF01', '5gze98oibh470986', 'Profil 120x120/3 mm', '', 'Profil 120x120/3 mm', '18124.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 69, '', NULL, NULL, NULL),
(226, 'PRF01', 'nwzr7b7capi95350', 'Profil 40x40/4 mm', '', 'Profil 40x40/4 mm', '16351.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 27, '', NULL, NULL, NULL),
(227, 'PRF01', '8s5lm9z2emr13814', 'Profil 40x60/4 mm', '', 'Profil 40x60/4 mm', '16351.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 35.9, '', NULL, NULL, NULL),
(228, 'PRF01', 'j7qjf9p2pyd67017', 'Profil 60x60/4 mm', '', 'Profil 60x60/4 mm', '16351.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 43.7, '', NULL, NULL, NULL),
(229, 'PRF01', '6wg574ya0ut24443', 'Profil 80x60/4 mm', '', 'Profil 80x60/4 mm', '16351.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 50.5, '', NULL, NULL, NULL),
(230, 'PRF01', 'nwzpffk2qi68727', 'Profil 80x80/4 mm', '', 'Profil 80x80/4 mm', '16351.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 59.8, '', NULL, NULL, NULL),
(231, 'PRF01', '3cbrb0bmov595722', 'Profil 100x50/4 mm', '', 'Profil 100x50/4 mm', '16351.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 55.5, '', NULL, NULL, NULL),
(232, 'PRF01', 'id5ncx0xs5g85406', 'Profil 100x60/4 mm', '', 'Profil 100x60/4 mm', '16351.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 58, '', NULL, NULL, NULL),
(233, 'PRF01', '38kx7ikkx6j60514', 'Profil 100x100/4 mm', '', 'Profil 100x100/4 mm', '16351.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 73.7, '', NULL, NULL, NULL),
(234, 'PRF01', 't15gjw966z29229', 'Profil 20x20/1,5 mm', '', 'Profil 20x20/1,5 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 5.2, '', NULL, NULL, NULL),
(235, 'PRF01', 'dsf4rto2s9h70759', 'Profil 20x40/1,5 mm', '', 'Profil 20x40/1,5 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 8.2, '', NULL, NULL, NULL),
(236, 'PRF01', 'uo5dqvbid156154', 'Profil 30x30/1,5 mm', '', 'Profil 30x30/1,5 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 8.2, '', NULL, NULL, NULL),
(237, 'PRF01', 'y0t8scj6kxs46502', 'Profil 20x30/1,5 mm', '', 'Profil 20x30/1,5 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 6.6, '', NULL, NULL, NULL),
(238, 'PRF01', '6x9wt8k9wdp77673', 'Profil 30x40/1,5 mm', '', 'Profil 30x40/1,5 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 9.65, '', NULL, NULL, NULL),
(239, 'PRF01', 'qcux52zjffo64844', 'Profil 40x40/1,5 mm', '', 'Profil 40x40/1,5 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 10.4, '', NULL, NULL, NULL),
(240, 'PRF01', '4hnh8oazb9420604', 'Profil 40x60/1,5 mm', '', 'Profil 40x60/1,5 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 14.15, '', NULL, NULL, NULL),
(241, 'PRF01', 'wez1zjkxc4m30070', 'Profil 60x60/1,5 mm', '', 'Profil 60x60/1,5 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 16.54, '', NULL, NULL, NULL),
(242, 'PRF01', 'bv3dodu19t54231', 'Profil 10x20/1,5 mm', '', 'Profil 10x20/1,5 mm', '18715.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 3.9, '', NULL, NULL, NULL),
(243, 'PRF01', 'pjaenlmouj88350', 'Profil 40x60/1,2 mm', '', 'Profil 40x60/1,2 mm', '17730.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 11, '', NULL, NULL, NULL),
(244, 'PRF01', '5a3vqviip3442468', 'Profil 20x40/1,2 mm', '', 'Profil 20x40/1,2 mm', '17730.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 6.5, '', NULL, NULL, NULL),
(245, 'PRF01', '1mwct7asd9652795', 'Profil 10x10/1 mm', '', 'Profil 10x10/1 mm', '22064.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 1.7, '', NULL, NULL, NULL),
(246, 'PRF01', 'fyin8trqnjp16841', 'Profil 60x60/6 mm', '', 'Profil 60x60/6 mm', '17730.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 62, '', NULL, NULL, NULL),
(247, 'PRF01', '13exj3ukmdv10459', 'Profil 40x40/1,4 mm', '', 'Profil 40x40/1,4 mm', '17730.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 10.4, '', NULL, NULL, NULL),
(248, 'PRF01', 'yp53rfg1df20798', 'Profil 20x40/1,4 mm', '', 'Profil 20x40/1,4 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 7.7, '', NULL, NULL, NULL),
(249, 'PRF01', 'lubtv8jryif60346', 'Profil 20x20/1,4 mm', '', 'Profil 20x20/1,4 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 4.85, '', NULL, NULL, NULL),
(250, 'PRF01', '5rzh3lfkxnq31762', 'Profil 40x60/1,4 mm', '', 'Profil 40x60/1,4 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 12.85, '', NULL, NULL, NULL),
(251, 'PRF01', 'unghgsfht1d16854', 'Profil 30x30/1,4 mm', '', 'Profil 30x30/1,4 mm', '17336.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 7.7, '', NULL, NULL, NULL),
(252, 'PRF01', 'lwmc2fncbf54653', 'Profil 20x40/1,7 mm', '', 'Profil 20x40/1,7 mm', '15957.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 9.1, '', NULL, NULL, NULL),
(253, 'PRF01', 'hhvh3p3cul595436', 'Profil 30x30/1,7 mm', '', 'Profil 30x30/1,7 mm', '15957.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 9.1, '', NULL, NULL, NULL),
(254, 'PRF01', 'dyd8y2kfofv8211', 'Profil 40x60/1,7 mm', '', 'Profil 40x60/1,7 mm', '15957.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 15.5, '', NULL, NULL, NULL),
(255, 'PRF01', 'dmnj0w3ov1o66894', 'Profil 40x40/1,8 mm', '', 'Profil 40x40/1,8 mm', '15957.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 13.15, '', NULL, NULL, NULL),
(256, 'PRF01', '6813y1ljwmq58263', 'Profil 40x60/1,8 mm', '', 'Profil 40x60/1,8 mm', '15957.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 17.5, '', NULL, NULL, NULL),
(257, 'PRF01', 'alp2zbpgzzg40442', 'Profil 80x80/1,8 mm', '', 'Profil 80x80/1,8 mm', '15957.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 27, '', NULL, NULL, NULL),
(258, 'PRF01', 'kg8xuwk84s43719', 'Profil 20x40/1,8 mm', '', 'Profil 20x40/1,8 mm', '15957.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 9.8, '', NULL, NULL, NULL),
(259, 'PRF01', 'axvp4ulqkit84579', 'Profil 40x80/1,8 mm', '', 'Profil 40x80/1,8 mm', '15957.00', 1, 6, NULL, NULL, NULL, 0, '2024-10-09 21:00:00', '2024-10-09 21:00:00', 21.2, '', NULL, NULL, NULL),
(260, 'UGL01', 'yayykqev3645450', 'Ugolnik 30/3mm', '', 'Ugolnik 30/3mm\r\n', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 1.2, '', NULL, NULL, NULL),
(261, 'UGL01', '0ioiwg5rpr930807', 'Ugolnik 40/3mm', '', 'Ugolnik 40/3mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 1.82, '', NULL, NULL, NULL),
(262, 'UGL01', 's6c8cqv98i72222', 'Ugolnik 40/4mm', '', 'Ugolnik 40/4mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 2.5, '', NULL, NULL, NULL),
(263, 'UGL01', '56ybty7188p54262', 'Ugolnik 50/3mm', '', 'Ugolnik 50/3mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 2.4, '', NULL, NULL, NULL),
(264, 'UGL01', 'at9jna0ik4j81828', 'Ugolnik 50/4mm', '', 'Ugolnik 50/4mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 3.1, '', NULL, NULL, NULL),
(265, 'UGL01', 'xm1gynhmlod64833', 'Ugolnik 50/5mm', '', 'Ugolnik 50/5mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 3.73, '', NULL, NULL, NULL),
(266, 'UGL01', 'ad6vwme7nsl2035', 'Ugolnik 63/5mm', '', 'Ugolnik 63/5mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 4.95, '', NULL, NULL, NULL),
(267, 'UGL01', 'cv4pjvi1zb766633', 'Ugolnik 70/5mm', '', 'Ugolnik 70/5mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 5.65, '', NULL, NULL, NULL),
(268, 'UGL01', 'mb9a49gt90o82149', 'Ugolnik 75/5mm', '', 'Ugolnik 75/5mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 5.95, '', NULL, NULL, NULL),
(269, 'UGL01', 'vftqwzpvnma68154', 'Ugolnik 80/7mm', '', 'Ugolnik 80/7mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 8.41, '', NULL, NULL, NULL),
(270, 'UGL01', '9dvt7v3t7rh2449', 'Ugolnik 100/7mm', '', 'Ugolnik 100/7mm', '1379.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 10.7, '', NULL, NULL, NULL),
(271, 'UGL01', 'wpm234nnyuo78300', 'Ugolnik 75/6mm', '', 'Ugolnik 75/6mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 6.8, '', NULL, NULL, NULL),
(272, 'UGL01', '6sbliow1gov1654', 'Ugolnik 100/8mm', '', 'Ugolnik 100/8mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 12.25, '', NULL, NULL, NULL),
(273, 'UGL01', 't842x4yoxx87886', 'Ugolnik 120/8mm', '', 'Ugolnik 120/8mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 15.25, '', NULL, NULL, NULL),
(274, 'UGL01', 'mbugvv6z96h70890', 'Ugolnik 140/10mm', '', 'Ugolnik 140/10mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 21.2, '', NULL, NULL, NULL),
(275, 'UGL01', 'xan9urzhet98872', 'Ugolnik 90/8mm', '', 'Ugolnik 90/8mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 10.85, '', NULL, NULL, NULL),
(276, 'UGL01', '8ft4j3pgeya19932', 'Ugolnik 60/4mm', '', 'Ugolnik 60/4mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 3.84, '', NULL, NULL, NULL),
(277, 'UGL01', '2dmjghlo6v295585', 'Ugolnik 60/5mm', '', 'Ugolnik 60/5mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 4.65, '', NULL, NULL, NULL),
(278, 'UGL01', 'kqx5i9qmc394097', 'Ugolnik 63/6mm', '', 'Ugolnik 63/6mm', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 5.65, '', NULL, NULL, NULL),
(279, 'SHW01', 'tggof80al0n71797', 'Sweller D-8 / 4 MM', '', 'Sweller D-8 / 4 MM', '13790.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 7.05, '', NULL, NULL, NULL),
(280, 'SHW01', '6y5656k8rjm98638', 'Sweller D-10 / 5 MM', '', 'Sweller D-10 / 5 MM', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 8.59, '', NULL, NULL, NULL),
(281, 'SHW01', 'pob2134rgb37260', 'Sweller D-12 / 5 MM', '', 'Sweller D-12 / 5 MM', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 10.4, '', NULL, NULL, NULL),
(282, 'SHW01', 'y8fkd3aip628666', 'Sweller D-14 / 5 MM', '', 'Sweller D-14 / 5 MM', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 12.3, '', NULL, NULL, NULL),
(283, 'SHW01', 'umy5oedb2j6531', 'Sweller D-16 / 5 MM', '', 'Sweller D-16 / 5 MM', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 14.2, '', NULL, NULL, NULL),
(284, 'SHW01', 'fqjf8jwgf9v43531', 'Sweller D-18 / 5 MM', '', 'Sweller D-18 / 5 MM', '12805.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 17.2, '', NULL, NULL, NULL),
(285, 'SHW01', 'pc8z0bn1it75594', 'Sweller D-20 / 6 MM', '', 'Sweller D-20 / 6 MM', '17730.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 18.91, '', NULL, NULL, NULL),
(286, 'SHW01', 'hj8eer32zo44942', 'Sweller D-24 / 6 MM', '', 'Sweller D-24 / 6 MM', '18715.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 24.25, '', NULL, NULL, NULL),
(287, 'SHW01', 'et82aln8bm869204', 'Sweller D-12 US', '', 'Sweller D-12 US', '14775.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 13.6, '', NULL, NULL, NULL),
(288, 'SHW01', 'x29qltfo2ht24158', 'Sweller D-14 US', '', 'Sweller D-14 US', '14775.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 15.95, '', NULL, NULL, NULL),
(289, 'SHW01', 'ifqxjj8rq170215', 'Sweller DWUH 20', '', 'Sweller DWUH 20', '14775.00', 1, 1, NULL, NULL, NULL, 0, '2024-10-11 21:00:00', '2024-10-11 21:00:00', 21.5, '', NULL, NULL, NULL),
(298, 'LIS01', 'al91pqx9li7917', 'List 2mm 2m²', '', 'List 2mm 2m²', '15760.00', 1, 2, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:29:16', 32, '', NULL, NULL, NULL),
(299, 'LIS01', 'uui90rmbfzm38634', 'List 4mm 9m²', '', 'List 4mm 9m²', '16745.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:27:55', 282.6, '', NULL, NULL, NULL),
(300, 'LIS01', '0g59vu7rzlzb77102', 'List 5mm 9m²', '', 'List 5mm 9m²', '15760.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:27:57', 353.25, '', NULL, NULL, NULL),
(301, 'LIS01', 'ws9n5ncbqf39362', 'List 6mm 9m²', '', 'List 6mm 9m²', '15760.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:28:03', 423.9, '', NULL, NULL, NULL),
(302, 'LIS01', 'damvorycklk1273', 'List 8mm 9m²', '', 'List 8mm 9m²', '16745.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:28:05', 565.2, '', NULL, NULL, NULL),
(303, 'LIS01', '3v297cfar1m19081', 'List 10mm 9m²', '', 'List 10mm 9m²', '16745.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:28:18', 706.5, '', NULL, NULL, NULL),
(304, 'LIS01', 'lu01zcvxxn86442', 'List 12mm 9m²', '', 'List 12mm 9m²', '16745.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:29:21', 847.8, '', NULL, NULL, NULL),
(305, 'LIS01', 'cg2shzpu9wp41873', 'List 15mm 9m²', '', 'List 15mm 9m²', '16745.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:29:23', 1059.75, '', NULL, NULL, NULL),
(306, 'LIS01', 'srm574pkmej92404', 'List 20mm 9m²', '', 'List 20mm 9m²', '15760.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:29:25', 1413, '', NULL, NULL, NULL),
(307, 'LIS01', '1hc7xaazlao37421', 'List 25mm 9m²', '', 'List 25mm 9m²', '19700.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:29:27', 1766.25, '', NULL, NULL, NULL),
(308, 'LIS01', 'ko0w8b3t93f9863', 'List 16mm 9m²', '', 'List 16mm 9m²', '16745.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:29:34', 1130.4, '', NULL, NULL, NULL),
(309, 'LIS01', 'hcosz518yqj72413', 'List 3mm 9m²', '', 'List 3mm 9m²', '16745.00', 1, 9, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:29:37', 212, '', NULL, NULL, NULL),
(310, 'LIS01', 'mzqv5km16w72592', 'List 1,8mm 2m²', '', 'List 1,8mm 2m²', '15760.00', 1, 2, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:30:37', 28.2, '', NULL, NULL, NULL),
(311, 'LIS01', '518f0gzdy9317978', 'List 1,5mm 2m²', '', 'List 1,5mm 2m²', '15760.00', 1, 2, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:32:06', 25.3, '', NULL, NULL, NULL),
(312, 'LIS01', 'wcph2c1skhl9747', 'List 3mm REF 2m²', '', 'List 3mm REF 2m²', '20685.00', 1, 2, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:32:11', 52.7, '', NULL, NULL, NULL),
(313, 'LIS01', 'tz2k2ouwtfh6064', 'List 3,5mm REF 2m²', '', 'List 3,5mm REF 2m²', '20685.00', 1, 2, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:32:13', 58.45, '', NULL, NULL, NULL),
(314, 'LIS01', 'kf8uo1shvt931658', 'List 4mm REF 2m²', '', 'List 4mm REF 2m²', '20685.00', 1, 2, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:32:24', 66.8, '', NULL, NULL, NULL),
(315, 'LIS01', '6pxiagw3w0p6314', 'List 5mm REF 2m²', '', 'List 5mm REF 2m²', '20685.00', 1, 2, NULL, NULL, NULL, 0, '2024-10-13 21:00:00', '2024-10-16 06:32:32', 83.5, '', NULL, NULL, NULL),
(339, 'GUR_EN', 'aph2wkt3ip541366', 'INGCO GLOVES SARY', '', 'ELLIK INGCO NITRILE GLOVES SARY RENK', '9.00', 6, NULL, 1, 'IngcoElik_43_11zon.jpg', 'images/gurlusyk/', 0, '2024-10-17 21:00:00', '2024-11-19 06:07:31', NULL, 'Esbaplar', NULL, NULL, NULL),
(344, 'ELK_GUR', 'ibv008bqj62627', 'PATTA DISK', '', 'DISK PATTA 230*3.0*22 MM (HYTAY)', '14.00', 6, NULL, 5, 'disk 230x3mm.jpg', 'images/gurlusyk/', 0, '2024-10-17 21:00:00', '2024-11-21 11:13:20', NULL, 'Kesme diskler', '1979', NULL, NULL),
(347, 'GUR_EN', 'phdorr91syr40563', 'ELLIK KEDMAN', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'ELLIK KEDMAN', '9.00', 6, NULL, 1, 'Kedman-ellik_48_11zon.jpg', 'images/gurlusyk/', 0, '2024-10-17 21:00:00', '2024-11-19 06:07:35', NULL, 'Esbaplar', NULL, NULL, NULL),
(348, 'GUR_EN', '0yvlaw6laga11005', 'ELLIK GOK RENK', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'ELLIK GOK RENK', '8.00', 6, NULL, 1, 'Sada-ellik_5_11zon.jpg', 'images/gurlusyk/', 0, '2024-10-17 21:00:00', '2024-11-19 06:07:42', NULL, 'Esbaplar', NULL, NULL, NULL),
(355, 'ELK_GUR', 'e9593b252p826234', 'PATTA DISK', '', 'DISK PATTA 230*1.8*22 MM (HYTAY)', '13.00', 6, NULL, 1, 'disk 7.jpg', 'images/gurlusyk/', 0, '2024-10-17 21:00:00', '2024-11-21 10:01:01', NULL, 'Kesme diskler', NULL, NULL, NULL),
(356, 'ELK_GUR', '1t1gxg5pdx175397', 'PATTA DISK', '', 'DISK PATTA 125*1.2*22 MM (HYTAY)', '4.00', 6, NULL, 1, 'disk 5.jpg', 'images/gurlusyk/', 0, '2024-10-17 21:00:00', '2024-11-21 10:00:17', NULL, 'Kesme diskler', NULL, NULL, NULL),
(357, 'ELK_GUR', 'p05tt9zoyfs60557', 'PATTA DISK', '', 'DISK PATTA 115*1.0*22 MM (HYTAY)', '4.00', 6, NULL, 1, 'disk 41.2.jpg', 'images/gurlusyk/', 0, '2024-10-17 21:00:00', '2024-11-21 10:00:12', NULL, 'Kesme diskler', NULL, NULL, NULL),
(358, 'GURALLAR', '4j0re8mpfgq83466', 'EMTOP ÇEKIÇ', '', 'CEKIC CUY SOGRULYAN 16 OZ EMTOP', '120.00', 6, NULL, 66, 'EmtopChekic_36_11zon.jpg', 'images/gurlusyk/', 0, '2024-10-17 21:00:00', '2024-11-19 04:43:30', NULL, 'Çekiçler', NULL, NULL, NULL),
(359, 'GUR_EN', '99m59zfp99840308', 'Silkon pistolet plastik', '', 'SILIKON PISTOLET PLASTIK', '32.00', 6, NULL, 29, 'Silkon-Tabanca_24_11zon.jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-19 04:32:18', NULL, 'El gurallary', NULL, NULL, NULL),
(364, 'GUR_EN', 'yp7rcd228779438', 'INGCO METR', '', 'METR 3 MT*16 MM (INGCO)', '20.00', 6, NULL, 22, 'Ingco3mm_40_11zon.jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-19 07:43:50', NULL, 'Metrler', NULL, '', NULL),
(365, 'GUR_EN', 'xumwra1s6c26218', 'INGCO METR', '', 'METR 5 MT*19 MM (INGCO)', '37.00', 6, NULL, 50, 'Ingco5m_41_11zon.jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-19 04:38:18', NULL, 'Metrler', NULL, NULL, NULL),
(366, 'GUR_EN', '6fokhoe2hw347329', 'INGCO METR', '', 'METR 10 MT*25 MM (INGCO)', '80.00', 6, NULL, 1, 'ingco10m_42_11zon.jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-19 04:38:15', NULL, 'Metrler', NULL, NULL, NULL),
(367, 'GUR_EN', '75pxt9da2xt3632', 'EMTOP METR', '', 'METR 5 MT*19 MM (EMTOP)', '40.00', 6, NULL, 1, 'Emtop5m_33_11zon.jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-19 04:38:13', NULL, 'Metrler', NULL, NULL, NULL),
(368, 'GUR_EN', '4soysal86t885360', 'EMTOP METR', '', 'METR 8 MT*25 MM (EMTOP)', '70.00', 6, NULL, 2, 'Emtop8m_34_11zon.jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-19 04:38:10', NULL, 'Metrler', NULL, NULL, NULL),
(373, 'GUR_EN', 'aq0zbvrkah933534', 'SKOC', '', 'SKOC 4.5X400 MM-LIK', '49.00', 6, NULL, 5, 'skoc 400 metr.jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-22 05:53:57', NULL, 'Skoclar', '000', NULL, NULL),
(374, 'GUR_EN', 'z8pu79uv2a885570', 'SKOC', '', 'SKOC 4.5X200 MM-LIK', '12.00', 6, NULL, 5, 'skoc 200 metr.jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-22 05:54:13', NULL, 'Skoclar', '000', '', NULL),
(375, 'GUR_EN', 'jcowka0dd0q82493', 'SKOC', '', 'SKOC 4.5X100 MM-LIK', '6.00', 6, NULL, 5, 'skoc 100 metr .jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-22 05:54:20', NULL, 'Skoclar', '000', NULL, NULL),
(376, 'GUR_EN', '3j919t96s5v45082', 'NASATKA TIANLE FIGURNYY', '', 'NASATKA TIANLE FIGURNYY 2 TARAPLY', '5.00', 6, NULL, 5, 'super-durable.jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-19 04:36:29', NULL, 'El gurallary', NULL, NULL, NULL),
(377, 'GUR_EN', 'ln0dde9zvj83194', 'HOWPSUZLYK AYNEGI AK', '', 'ACKI HOWPSUZLYK AYNEGI AK', '5.00', 6, NULL, 1, 'szd.jpg', 'images/gurlusyk/', 0, '2024-10-18 21:00:00', '2024-11-19 06:07:52', NULL, 'Esbaplar', NULL, NULL, NULL),
(379, 'GURALLAR', 'mhjp9cj0k462465', 'ZAKLYOPKA PISTOLET INGCO', '', 'ZAKLYOPKA PISTOLET HR-101 (INGCO)', '80.00', 6, NULL, 5, 'Ingoco-Percin-Sary.jpg', 'images/gurlusyk/', 0, '2024-10-20 21:00:00', '2024-11-19 06:18:22', NULL, 'Zaklýopkalr', NULL, NULL, NULL),
(404, 'GURALLAR', 'ec760kbjk6d49847', 'ZAKLYOPKA PISTOLET WADFOW', '', 'ZAKLYOPKA PISTOLET WHR1609 (WADFOW)', '80.00', 6, NULL, 1, 'Wadfow-WHR1609.jpg', 'images/gurlusyk/', 0, '2024-10-25 21:00:00', '2024-11-19 06:18:28', NULL, 'Zaklýopkalr', NULL, NULL, NULL),
(405, 'GURALLAR', '5rnzl4uazdl19346', 'INGCO DEMIR GAÝÇY', '', 'INGÇO DEMIR GAÝÇY HTSN0110R', '50.00', 6, NULL, 1, 'ingcohtsn0110r.jpg', 'images/gurlusyk/', 0, '2024-10-25 21:00:00', '2024-11-19 06:14:51', NULL, 'Gaycylar', NULL, NULL, NULL),
(406, 'GURALLAR', 'zwpmc773i9e52832', 'INCO DEMIR GAÝÇY', '', 'INCO DEMIR GAÝÇY', '50.00', 6, NULL, 3, 'gyaci3.jpg', 'images/gurlusyk/', 0, '2024-10-25 21:00:00', '2024-11-19 06:14:53', NULL, 'Gaycylar', NULL, NULL, NULL),
(407, 'GURALLAR', 's5x0dbc9lma44999', 'INCO DEMIR GAÝÇY', '', 'INCO DEMIR GAÝÇY', '50.00', 6, NULL, 6, 'Gaychy.jpg', 'images/gurlusyk/', 0, '2024-10-25 21:00:00', '2024-11-19 06:14:55', NULL, 'Gaycylar', NULL, 'new', NULL),
(409, 'GUR_EN', 'k96ds7j8etc24250', 'Selsil kleý', '', 'Selsil kleý', '1.00', 6, NULL, 1, 'Selsil.jpg', 'images/gurlusyk/', 0, '2024-10-25 21:00:00', '2024-11-19 05:21:29', NULL, 'Kleýler', NULL, NULL, NULL),
(412, 'ELK06', '4karearfizq83068', 'Led Blub', '', 'kjfdsnkanfd;nadfj', '1.00', 6, NULL, 1, 'Untitled-1.jpg', 'images/gurlusyk/', 0, '2024-10-30 21:00:00', '2024-11-01 05:58:29', NULL, 'Led lampa', '2000083', NULL, NULL),
(413, 'ELK06', 'dsd838issn41067', 'LED BULB  30W', '', 'LED BULB  30W 3000 HOUR ECO', '65.00', 6, NULL, 300, 'led Blub.jpg', 'images/gurlusyk/', 0, '2024-10-30 21:00:00', '2024-11-01 05:58:39', NULL, 'Led lampa', '2000085', NULL, NULL),
(414, 'BYG_GUR', 'hfy1ivodb3e52979', 'COTKA 4-INÇ AGAC SAPLY', '', 'SAPLYCOTKA 4-INÇ AGAC SAPLY', '7.00', 6, NULL, 1, 'firca_ahsap.jpg', 'images/gurlusyk/', 0, '2024-10-30 21:00:00', '2024-11-16 07:35:33', NULL, 'Boyag gurallary', '2000065', NULL, NULL),
(424, 'BYG_GUR', 'sodhaaecxv12540', 'Rolik sapy', '', 'Rolik sapy', '5.00', 6, NULL, 1, 'Untitled-8.jpg', 'images/gurlusyk/', 0, '2024-11-04 21:00:00', '2024-11-20 05:00:13', NULL, 'Boyag gurallary', '0000', NULL, NULL),
(425, 'BYG_GUR', 'yhp7ud19uo998275', 'Boyag rolikleri2', '', 'Boyag rolikleri', '3.00', 6, NULL, 1, 'Untitled-5.jpg', 'images/gurlusyk/', 0, '2024-11-04 21:00:00', '2024-11-05 10:31:09', NULL, 'Boyag gurallary', '0000', NULL, NULL),
(426, 'BYG_GUR', 'fcavi80pze518072', 'Boyag rolikleri1', '', 'Boyag rolikleri', '2.00', 6, NULL, 1, 'Untitled-4.jpg', 'images/gurlusyk/', 0, '2024-11-04 21:00:00', '2024-11-05 10:31:11', NULL, 'Boyag gurallary', '0000', NULL, NULL),
(427, 'BYG_GUR', 't1f0ui0hcg12128', 'Boyag rolikleri3', '', 'Boyag rolikleri3', '4.00', 6, NULL, 1, 'Untitled-6.jpg', 'images/gurlusyk/', 0, '2024-11-04 21:00:00', '2024-11-05 10:32:45', NULL, 'Boyag gurallary', '0000', NULL, NULL),
(428, ' GUR_ELK', 'pr18gq3yh5971289', 'CTORCH LAMPA ', '', '5W CTORCH VENUS A BULB LED LAMP 6500K AK E27', '1.00', 6, NULL, 1, 'ctorch5w.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-15 06:18:53', NULL, 'Led Lampalar', '6941327889692', 'new', NULL),
(429, ' GUR_ELK', 'nhnl5txdi8b3859', 'CTORCH LAMPA ', '', '7W CTORCH CANDLE BULB LED LAMP 6500K AK E27', '16.00', 6, NULL, 1, 'ctorch7wikili.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:54:59', NULL, 'Led Lampalar', '6941327892081', NULL, NULL),
(430, ' GUR_ELK', '4u5okrgvxwf76285', 'CTORCH LAMPA ', '', '7W CTORCH VENUS A BULB LED LAMP 6500K AK E27', '13.00', 6, NULL, 1, 'ctorch10w3500kikili.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-19 07:44:43', NULL, 'Led Lampalar', '6941327890209', '', NULL),
(431, ' GUR_ELK', '8p93i6b79ka91664', 'CTORCH LAMPA ', '', '10W CTORCH VENUS A BULB LED LAMP 3000K SARY E27', '16.00', 6, NULL, 1, 'ctorch10w3500kikili.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:57:05', NULL, 'Led Lampalar', '6941327889371', NULL, NULL),
(432, ' GUR_ELK', 'n17ljqiqpf857899', 'CTORCH LAMPA ', '', '10W CTORCH VENUS A BULB LED LAMP 6500K AK E27', '16.00', 6, NULL, 1, 'ctorch10w6500kikili.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-19 07:44:46', NULL, 'Led Lampalar', '6941327889364', '', NULL),
(433, ' GUR_ELK', 'a6bg1dh3sm56026', 'CTORCH LAMPA ', '', '15W CTORCH VENUS A BULB LED LAMP 6500K AK E27', '23.00', 6, NULL, 1, 'ctorch15wikili.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:57:17', NULL, 'Led Lampalar', '6941327891367', NULL, NULL);
INSERT INTO `Products` (`PRODUCTS_ID`, `PRODUCT_CODE`, `custom_product_id`, `PRODUCT_NAME`, `PROD_DESC`, `SHORT_DESC`, `PRICE`, `CATEGORY_ID`, `LENGTH_METALL`, `QUANTITY`, `image`, `image_path`, `STOCK_AMOUNT`, `CREATED_DATE`, `UPDATED_DATE`, `METER_WEIGHT`, `Grupba_ady`, `BARKOD_NO`, `Taze`, `Similar_pages`) VALUES
(434, ' GUR_ELK', 'eqdraufug831089', 'CTORCH LAMPA ', '', '20W CTORCH VENUS A BULB LED LAMP 6500K AK E27', '30.00', 6, NULL, 1, 'ctorch20w.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:48:32', NULL, 'Led Lampalar', '6941327891985', NULL, NULL),
(435, ' GUR_ELK', 'pz1u43j8m3l91770', 'CTORCH LAMPA ', '', '45W CTORCH VENUS T BULB LED LAMP 6500K AK E27', '72.00', 6, NULL, 1, 'ctorch45w.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:48:30', NULL, 'Led Lampalar', '6941327889418', NULL, NULL),
(436, ' GUR_ELK', '79m0fg8ur8e69012', 'CTORCH LAMPA ', '', '55W CTORCH VENUS T BULB LED LAMP 6500K AK E27', '114.00', 6, NULL, 1, 'ctorch55w.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:48:28', NULL, 'Led Lampalar', '6941327889487', NULL, NULL),
(437, ' GUR_ELK', 'girueotyeg597501', 'CTORCH LAMPA ', '', 'Ctorch 12w 100-240v 1.5kv', '1.00', 6, NULL, 1, 'ctorch1.5kv.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:48:26', NULL, 'Led Lampalar', '6941327804657', NULL, NULL),
(438, ' GUR_ELK', 'fmpsja3h45c67248', 'CTORCH LAMPA ', '', 'Ctorch 12w 100-240v 1.5kv', '1.00', 6, NULL, 1, 'ctorch15w1.5kv.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:48:24', NULL, 'Led Lampalar', '6941327804718', NULL, NULL),
(439, ' GUR_ELK', 'bnoiks736l784775', 'CTORCH LAMPA ', '', 'Ctorch 18w 100-240v 1.5kv', '1.00', 6, NULL, 1, 'ctorch18w1.5kv.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:48:21', NULL, 'Led Lampalar', '6941327804770', NULL, NULL),
(440, ' GUR_ELK', '6vgk9x7bs3q19748', 'CTORCH LAMPA ', '', 'Ctorch 20w 100-240v 1.5kv', '1.00', 6, NULL, 1, 'ctorch20w1.5kv.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:48:19', NULL, 'Led Lampalar', '6941327805371', NULL, NULL),
(441, ' GUR_ELK', 'qn6y16jw3w60909', 'CTORCH LAMPA ', '', 'Ctorch 50w 100-240v 1.5kv', '1.00', 6, NULL, 1, 'ctorch50w1.5kv.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:48:17', NULL, 'Led Lampalar', '6941327805524', NULL, NULL),
(442, ' GUR_ELK', 'zbdfg94s2gl54757', 'CTORCH LAMPA ', '', 'Ctorch 60w 100-240v 1.5kv', '1.00', 6, NULL, 1, 'ctorch60w1.5kv.jpg', 'images/gurlusyk/', 0, '2024-11-05 21:00:00', '2024-11-14 08:48:16', NULL, 'Led Lampalar', '6941327805586', NULL, NULL),
(448, 'GUR_EN', 'qdhuwaclps35623', 'DEKOR METR RULETKA 7.5M*25MM', '', 'DEKOR METR RULETKA 7.5M*25MM (KOD:297)', '24.00', 6, NULL, 12, 'уца.jpg', 'images/gurlusyk/', 0, '2024-11-07 21:00:00', '2024-11-19 04:38:45', NULL, 'Metrler', '6941327804770', NULL, NULL),
(450, 'HHR', '4kjbuccsjxx97462', 'ARABA GOK', '', 'ARABA GOK TURK TUNALI', '325.00', 6, NULL, 5, 'el arabasy_gok_renkli.jpg', 'images/gurlusyk/', 0, '2024-11-08 21:00:00', '2024-11-16 03:37:31', NULL, 'Arabalar', 'yok', NULL, NULL),
(451, 'HHR', '5vj9npmv1563589', 'IZOLENTA VAME TAPE 10 M', '', 'IZOLENTA VAME TAPE 10 M', '1.00', 6, NULL, 20, 'izolenta ýame tape 10 m.jpg', 'images/gurlusyk/', 0, '2024-11-08 21:00:00', '2024-11-16 03:48:47', NULL, 'Izolentalar', 'yok', NULL, NULL),
(454, 'GUR_EN', '8809ro1vzdt45907', 'FICHER ETON ÜÇIN SWERLO', '', 'ETON ÜÇIN SWERLO QUATTRIC 10/100/165 FICHER', '1.00', 6, NULL, 10, 'QUATTRIC 10.100.165.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:27:18', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(455, 'GUR_EN', 'yq71183bdt12368', 'FICHER BETON ÜÇIN SWERLO', '', 'BETON ÜÇIN SWERLO QUATTRIC 12/110/160 FICHER', '1.00', 6, NULL, 10, 'QUATTRIC 12.110.160.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:27:21', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(456, 'GUR_EN', 'nqtsov1doug34118', 'FICHER BETON ÜÇIN SWERLO', '', 'BETON ÜÇIN SWERLO SDS PLUS-V 10/100/160 FICHER', '1.00', 6, NULL, 10, 'SDS PLUS 10.100.160.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-19 07:43:40', NULL, 'Ankerker swerlolar', '000', '', NULL),
(457, 'GUR_EN', 'flpnu9sbk125543', 'FICHER BETON ÜÇIN SWERLO', '', 'BETON ÜÇIN SWERLO SDS PLUS-V 12/110/160 FICHER', '1.00', 6, NULL, 6, 'QUATTRIC 12.110.160.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:31:05', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(458, 'GUR_EN', 'qopwvtqn2j44866', 'FICHER BETON ÜÇIN SWERLO', '', 'BETON ÜÇIN SWERLO SDS MAX 12/200/340 FICHER', '1.00', 6, NULL, 4, 'SDS MAX 14.200.340.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:30:57', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(459, 'GUR_EN', 'lmhuz01bhuk76552', 'FICHER BETON ÜÇIN SWERLO', '', 'BETON ÜÇIN SWERLO SDS MAX 14/200/340 FICHER', '1.00', 6, NULL, 4, 'SDS MAX 14.200.340.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:30:55', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(460, 'GUR_EN', 'e8n2qjfwjxk24929', 'FICHER BETON ÜÇIN SWERLO', '', 'BETON ÜÇIN SWERLO SDS MAX 16/200/340 FICHER', '1.00', 6, NULL, 4, 'SWERLO 16.200.340.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-15 07:17:32', NULL, 'Ankerker swerlolar', '000', 'new', NULL),
(461, 'GUR_EN', 'frw8cwa23eg81018', 'FICHER METAL ÜÇIN SWERLO', '', 'METAL ÜÇIN SWERLO FICHER HSS-CO DIN338 12.0X101/151', '1.00', 6, NULL, 4, 'METAL SWERLO 12.0.101.151.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:30:51', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(462, 'GUR_EN', '02ht8hsamzyg66189', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FAZ PLUS 10/20 ZP (10/105) FISCHER', '1.00', 6, NULL, 50, 'faz ii plus 10.20 105mm.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:27:25', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(463, 'GUR_EN', 'servxmpyikd84332', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FAZ PLUS 10/30 ZP (10/115) FISCHER', '1.00', 6, NULL, 50, 'FAZ II PLUS 10.30 115MM.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:27:26', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(464, 'GUR_EN', 'p67yip0dwx83177', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FAZ PLUS 12/20 ZP (12/120) FISCHER', '1.00', 6, NULL, 40, 'FAZ II PLUS 12.20 120MM.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:27:28', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(465, 'GUR_EN', 'n3s6kvxuf2l48044', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FAZ PLUS 12/30 ZP (12/130) FISCHER', '1.00', 6, NULL, 40, 'faz ii plus 12.30 130 mm.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:27:50', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(466, 'GUR_EN', '8cw7q42268f60861', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FAZ PLUS 16/25 ZP (16/148) FISCHER', '1.00', 6, NULL, 20, 'FAZ II PLUS 16.25 148MM.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:27:51', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(467, 'GUR_EN', 'a37iux9l67o75328', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FAZ PLUS 16/100 ZP (16/223) FISCHER', '1.00', 6, NULL, 20, 'Faz II PLUS 16.100 223MM.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:27:53', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(468, 'GUR_EN', 'y8ll3a8kqe83002', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FAZ PLUS 24/30 ZP (24/205) FISCHER', '1.00', 6, NULL, 10, 'fbn ii 10.20 10.95 95mm.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-15 03:38:47', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(469, 'GUR_EN', 'lyp6chq9thr47142', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FBNPLUS 10/20 (10/95) ZP (10/96) FISCHER', '1.00', 6, NULL, 100, 'fbn ii 10.20 10.95 95mm.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:30:39', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(470, 'GUR_EN', 'gtanm9933vg78419', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FAZ FBN 12/20 (12X116) ZP FISCHER', '1.00', 6, NULL, 40, 'FBN II 12.20 12.116 MM.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:30:41', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(471, 'GUR_EN', 'dm9amo9gxsj59542', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FAZ FBN 12/20 (12X116) ZP FISCHER', '1.00', 6, NULL, 20, 'fbn ii 16.25 143mm.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:30:43', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(472, 'GUR_EN', '1fv2hsdvpgq67980', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FWA 10/95 ZP FISCHER', '1.00', 6, NULL, 100, 'FWA 10.20 95MM.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:30:46', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(473, 'GUR_EN', 'o8ht3kl9p9f95623', 'FISCHER ANKER BOLT', '', 'ANKER BOLT FWA 12/100 ZP FISCHER', '1.00', 6, NULL, 50, 'FWA 12.100 MM.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 10:30:49', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(474, 'GUR_EN', 'n0aqiniug242592', 'FISCHER SILIKON PISTOLET', '', 'SILIKON PISTOLET DISPENSER FISCHER', '1.00', 6, NULL, 2, '2.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-19 04:46:01', NULL, 'El gurallary', '000', NULL, NULL),
(475, 'GUR_EN', 'noyf9fbwxun72316', 'FISCHER SILIKON PISTOLET', '', 'SILIKON PISTOLET DISPENSER FISCHER', '1.00', 6, NULL, 2, '5.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-19 04:46:03', NULL, 'El gurallary', '000', NULL, NULL),
(476, 'GUR_EN', 'm3pndkv2f656422', 'FISCHER SILIKON PISTOLET', '', 'SILIKON PISTOLET DISPENSER FISCHER', '1.00', 6, NULL, 2, '34.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-19 04:46:38', NULL, 'El gurallary', '000', NULL, NULL),
(477, 'GUR_EN', '9am2n9sgfj840298', 'FISCHER POSLAMA GARŞY SEPILÝÄN', '', 'FISCHER POSLAMA GARŞY SEPILÝÄN FTÇ-ZA 400ML FISCHER', '1.00', 6, NULL, 4, 'POSLAMA GARSY SEPILYAN 400ML.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-12 21:00:00', NULL, 'Spreý', '000', NULL, NULL),
(478, 'GUR_EN', 'qpvkslhrcud33106', 'FISCHER INJEKSION GARYNDYSY', '', 'INJEKSION GARYNDYSY FIS EM PLUS 390S BT FISCHER', '1.00', 6, NULL, 40, '1.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 11:19:08', NULL, 'Injesionlar', '000', NULL, NULL),
(479, 'GURALLAR', 'c2o57gjtmo850599', 'FISCHER ÜFLEÝJI POMPA', '', 'ÜFLEÝJI POMPA ABG FISCHER', '1.00', 6, NULL, 2, 'UFLEYJI POMPA.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-19 06:33:51', NULL, 'Pompalar', '000', NULL, NULL),
(480, 'GUR_EN', 'kx06v863tbl99000', 'FISCHER INJEKSION GARYNDYSY', '', 'INJEKSION GARYNDYSY FIS VL 410C BT 410ML FISCHER', '1.00', 6, NULL, 32, '4.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-12 21:00:00', NULL, 'Injesionlar', '000', NULL, NULL),
(481, 'GUR_EN', 'fb2gwyrcy3i87835', 'FISCHER ANKER GURNAÝJY GURAL', '', 'ANKER GURNAÝJY GURAL HMZ 1 FISCHER', '1.00', 6, NULL, 2, '18.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-19 07:43:37', NULL, 'El gurallary', '000', '', NULL),
(482, 'GUR_EN', 'q6r27resptg60857', 'FISCHER MASTIK', '', 'YANGYNA WE SESE GARŞY MASTIK FIAM600 600ML FISCHER', '1.00', 6, NULL, 2, '32.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-12 21:00:00', NULL, 'Mastik', '000', NULL, NULL),
(483, 'GUR_EN', 'iiidt4w7wuh39063', 'FISCHER MASTIK', '', 'YANGYNA WE SESE GARŞY MASTIK FIAM310 310ML FISCHER', '1.00', 6, NULL, 4, '33.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 11:52:29', NULL, 'Mastik', '000', NULL, NULL),
(484, 'GUR_EN', 'van0a6kukld21791', 'FISCHER POLIURETAN MASTIK', '', 'POLIURETAN MASTIK DPU 300ML CAL FISCHER', '1.00', 6, NULL, 4, '39.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-12 21:00:00', NULL, 'Mastik', '000', NULL, NULL),
(485, 'GUR_EN', '3bhvezuwxqn20024', 'FISCHER MASTIK', '', 'YANGYNA GARŞY MASTIK FIAM310 FISCHER', '1.00', 6, NULL, 4, '35.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-12 21:00:00', NULL, 'Mastik', '000', NULL, NULL),
(486, 'GUR_EN', '6cyn4gskifu74295', 'FISCHER ÝANGYNA GARŞY KÖPÜK', '', 'ÝANGYNA GARŞY KÖPÜK FISCHER', '1.00', 6, NULL, 4, '36.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-12 21:00:00', NULL, 'Köpükler', '000', NULL, NULL),
(487, 'GUR_EN', 'gq3muqfhcsm75091', 'FISCHER IKI KOMPONENTLI SEPILÝÄN KLEÝ', '', 'IKI KOMPONENTLI SEPILÝÄN KLEÝ YELIM MDF KIT 400ML 100G FISCHER', '1.00', 6, NULL, 4, '37.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-19 05:26:39', NULL, 'Kleýler', 'yok', '', NULL),
(488, 'GUR_EN', 'mxrjjicpk97673', 'FISCHER PLASMAS COPIK', '', 'PLASMAS COPIK UX 10/60 FISCHER', '1.00', 6, NULL, 100, '10.60 COPIK.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-12 21:00:00', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(489, 'GUR_EN', '8mcf1lxj1f989994', 'FISCHER PLASMAS COPIK', '', 'PLASMAS COPIK UX 10/60 FISCHER', '1.00', 6, NULL, 200, '8.40 COPIK.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-12 21:00:00', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(490, 'GUR_EN', 'tq1gz8raqbs53239', ' FISCHER ANKER', '', 'YKJAM TOWLANÝAN ANKER FH 18/25 B ZP (18/140) FISCHER', '1.00', 6, NULL, 40, 'fh ii 18.25 B 140MM.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-13 12:32:50', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(491, 'GUR_EN', '9tip59pd3sw18625', 'FISCHER ANKER', '', 'GIPSOKARTOP ÜÇIN ANKER HM 5/65 S FISCHER', '1.00', 6, NULL, 100, 'HM 6.65 S 65 MM.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-15 07:17:16', NULL, 'Ankerker swerlolar', '000', 'new', NULL),
(492, 'GUR_EN', 'fa1vc021r7671784', 'FISCHER ANKER', '', 'GIPSOKARTOP ÜÇIN ANKER HM 6/37 S FISCHER', '1.00', 6, NULL, 100, 'HM 6.37 S 37MM.jpg', 'images/gurlusyk/', 0, '2024-11-12 21:00:00', '2024-11-12 21:00:00', NULL, 'Ankerker swerlolar', '000', NULL, NULL),
(493, ' GUR_ELK', '941n6xsc6k874224', 'CTORCH LAMPA 3W', '', '3W CTORCH LED PANEL ICKI (SLIM) TEGELEK 6500K AK', '35.00', 6, NULL, 1, '3w2.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-15 07:18:59', NULL, 'Led Lampalar', '000', 'new', NULL),
(494, ' GUR_ELK', '5e4z5en14v21487', 'CTORCH LAMPA 4W', '', '4W CTORCH LED PANEL ICKI (SLIM) TEGELEK 6500K AK', '44.00', 6, NULL, 1, '4w2.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-19 07:44:51', NULL, 'Led Lampalar', '000', '', NULL),
(495, ' GUR_ELK', '0i8i35g7ur8k69710', 'CTORCH LAMPA ', '', '6W CTORCH LED PANEL ICKI (SLIM) TEGELEK 6500K AK', '45.00', 6, NULL, 1, '6w2.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Led Lampalar', '000', NULL, NULL),
(496, ' GUR_ELK', 'rk2gmsxrem92354', 'CTORCH LAMPA ', '', '9W CTORCH LED PANEL ICKI (SLIM) TEGELEK 6500K AK', '48.00', 6, NULL, 1, '9w2.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Led Lampalar', '000', NULL, NULL),
(497, ' GUR_ELK', 'tf93lypouf45760', 'CTORCH LAMPA ', '', '12W CTORCH LED PANEL ICKI (SLIM) TEGELEK 6500K AK', '56.00', 6, NULL, 1, '12w2.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Led Lampalar', '000', NULL, NULL),
(498, ' GUR_ELK', 'r48nsvahkig31648', 'CTORCH LAMPA ', '', '15W CTORCH LED PANEL ICKI (SLIM) TEGELEK 6500K AK', '74.00', 6, NULL, 1, '15w2.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Led Lampalar', '000', NULL, NULL),
(499, ' GUR_ELK', 'nzdgfg6tqfp62752', 'CTORCH LAMPA ', '', '18W CTORCH LED PANEL ICKI (SLIM) TEGELEK 6500K AK', '75.00', 6, NULL, 1, '18w2.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Led Lampalar', '000', NULL, NULL),
(500, ' GUR_ELK', 'lmp6csjryg71961', 'CHYRAG LED LAMPA', '', '6W CYRAG SPOT ICKI TEGELEK 6500K E14-T75 45mA', '53.00', 6, NULL, 500, '6w_53_11zon.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-14 09:44:13', NULL, 'Led Lampalar', '000', NULL, NULL),
(501, ' GUR_ELK', '9yqo9nrola62901', 'CHYRAG LED LAMPA', '', '10W CYRAG LED LAMPA 6500K E27-A60 70mA', '21.00', 6, NULL, 500, '10w_54_11zon.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-14 09:44:19', NULL, 'Led Lampalar', '000', NULL, NULL),
(502, ' GUR_ELK', 'jahb90uasl3082', 'CHYRAG LED LAMPA', '', '15W CYRAG LED LAMPA 6500K E27-A70 110mA', '28.00', 6, NULL, 250, '12_55_11zon.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-14 09:44:27', NULL, 'Led Lampalar', '000', NULL, NULL),
(503, ' GUR_ELK', '0nbria8z5qr71346', 'CHYRAG LED LAMPA', '', '20W CYRAG LED LAMPA 6500K E27-A80 160mA', '35.00', 6, NULL, 200, 'chyrag20w.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Led Lampalar', '000', NULL, NULL),
(504, ' GUR_ELK', '4kddxcqsz4l97750', 'CHYRAG LED LAMPA', '', '25W CYRAG LED LAMPA 6500K E27-A95 210mA', '48.00', 6, NULL, 150, '25ww_59_11zon.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-14 09:44:52', NULL, 'Led Lampalar', '000', NULL, NULL),
(505, ' GUR_ELK', 'tegluuayux11320', 'CHYRAG LED LAMPA', '', '30W CYRAG LED LAMPA 6500K E27-T100 250mA', '74.00', 6, NULL, 60, '30w_60_11zon.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-14 09:44:59', NULL, 'Led Lampalar', '000', NULL, NULL),
(506, ' GUR_ELK', '6oca0231ccs34278', 'CHYRAG LED LAMPA', '', '40W CYRAG LED LAMPA 6500K E27-T120 320mA', '100.00', 6, NULL, 60, '40 w_61_11zon.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-14 09:45:06', NULL, 'Led Lampalar', '000', NULL, NULL),
(507, ' GUR_ELK', '914auszpf3s34850', 'CHYRAG LED LAMPA', '', '50W CYRAG LED LAMPA 6500K E27-T140 390mA', '141.00', 6, NULL, 40, '50w_62_11zon.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-14 09:45:13', NULL, 'Led Lampalar', '000', NULL, NULL),
(508, ' GUR_ELK', 'o0sgkrgq5q21746', 'CHYRAG LED LAMPA', '', '20W CYRAG LED LAMPA 6500K E27-T80 160mA', '35.00', 6, NULL, 200, '20 togolak_57_11zon.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Led Lampalar', '000', NULL, NULL),
(509, ' GUR_ELK', 'bf4cm1zjjbc10223', 'CHYRAG LED LAMPA', '', '12W CYRAG LED LAMPA 6500K E27-A60 85mA', '21.00', 6, NULL, 500, '12_55_11zon.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Led Lampalar', '000', NULL, NULL),
(510, 'GUR_EN', 'r9m5y40cimd56926', 'REZIN ELLIK', '', 'REZIN ELLIK SARY-AK MAKSAT 300#', '4.00', 6, NULL, 120, 'Без имени-2s.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-19 06:08:03', NULL, 'Esbaplar', '000', NULL, NULL),
(511, 'HHR', 'fdi3bbc8jo459216', 'PEÇ NEVAEH 1600W', '', 'PEC NEVAEH 1600W (LX1840)', '152.00', 6, NULL, 3, 'Без имениsss-13.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-19 07:44:13', NULL, 'Peç', '000', '', NULL),
(512, 'HHR', 'mzqka72rjhe26944', 'PEÇ NEVAEH 2000W', '', 'PEC NEVAEH 2000W (NDD-2000J)', '628.00', 6, NULL, 3, 'Без имени-zzz1.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-15 07:18:00', NULL, 'Peç', '000', 'new', NULL),
(513, 'HHR', 'fc06edo7o775016', 'PEC GOLD STAR 1200W', '', 'PEC GOLD STAR 1200W (QH-90I) AK', '152.00', 6, NULL, 3, 'Без имени-2.SSSSjpg.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Peç', '000', NULL, NULL),
(514, 'HHR', 'g1egrz258kn13481', 'RADIATOR PEC NIKURA 2500W+500W FAN', '', 'RADIATOR PEC NIKURA 15 GAPYRGALY GARA 2500W+500W FAN', '1018.00', 6, NULL, 6, 'Без имеssни-s13.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-19 07:44:15', NULL, 'Peç', '000', '', NULL),
(515, 'HHR', 'bl5dunpc2g89164', 'RADIATOR PEC NIKURA 2500W+400W FAN', '', 'RADIATOR PEC NIKURA 13 GAPYRGALY GARA 2500W+400W FAN', '953.00', 6, NULL, 6, 'Без имени-s4.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-14 11:47:42', NULL, 'Peç', '000', NULL, NULL),
(516, 'HHR', 'vkv9byloz3k43870', 'RADIATOR PEC JASUN 2500W', '', 'RADIATOR PEC JASUN 13 GAPYRGALY 2500W AK (B-13)', '780.00', 6, NULL, 6, 'Без имеaи-12.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-19 07:44:19', NULL, 'Peç', '000', '', NULL),
(517, 'ALC_GUR', '5nm30re6emg33502', 'ALCIPAN PYCAK LEZBI 18 MM', '', 'ALCIPAN PYCAK LEZBI 18 MM (MING LI) (ML-96017)', '9.00', 6, NULL, 10, 'Без имdени-3.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-15 07:18:23', NULL, 'Alçypan pyçaklary', '000', 'new', NULL),
(518, 'ALC_GUR', 'zai2m3b5rr20165', 'ALCIPAN PYCAK LEZBI 25 MM', '', 'ALCIPAN PYCAK LEZBI 25 MM (MING LI) (SK4)', '22.00', 6, NULL, 10, 'eee.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Alçypan pyçaklary', '000', NULL, NULL),
(519, 'GUR_EN', 'agn898z2aiq47100', 'SIFER CUY 100-LIK REZINLI', '', 'SIFER CUY 100-LIK REZINLI', '23.00', 6, NULL, 125, 'Без имениЧЯЧ-2.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(520, 'GUR_EN', '56d9kwpf22x46507', 'SIFER CUY 80-LIK REZINLI', '', 'SIFER CUY 80-LIK REZINLI', '23.00', 6, NULL, 125, 'Без именффи-1.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(521, 'BYG_GUR', 'm7egpuucxrq21443', 'WALIK DEKOR 25SM', '', 'WALIK DEKOR 25 SM GYZYL D-8,10,12-LIK GOWSY', '23.00', 6, NULL, 10, 'Без имеSни-3.jpg', 'images/gurlusyk/', 0, '2024-11-13 21:00:00', '2024-11-13 21:00:00', NULL, 'Boyag gurallary', '000', NULL, NULL),
(522, 'GUR_EN', '53igzscymxy69447', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*25 MM', '192.00', 6, NULL, 10, '63x25.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:06:07', NULL, 'Çüýler samorezler şruplar', 'yok', '', NULL),
(523, 'GUR_EN', '7b9hsdeijua88419', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*75 MM', '161.00', 6, NULL, 1, '63x75.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:05:35', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(524, 'GUR_EN', 'bqdb66qgcrf48985', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*100 MM', '150.00', 6, NULL, 1, '63x100.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:05:32', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(525, 'GUR_EN', 't0qisw6ug192402', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 4.2*13 MM', '49.00', 6, NULL, 1, '4.2x13.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:05:30', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(526, 'GUR_EN', 'tjpt1or25b94266', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 4.2*16 MM', '49.00', 6, NULL, 1, '4.2x13.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:05:26', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(527, 'GUR_EN', '40t00b43zyb55575', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 4.2*19 MM', '49.00', 6, NULL, 1, '4.2x19.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:05:24', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(528, 'GUR_EN', 'p3vk7x1n7e65455', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 4.2*25 MM', '49.00', 6, NULL, 1, '4.2x25.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:05:19', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(529, 'GUR_EN', 'uutqcemv1vh88101', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 4.2*32 MM', '41.00', 6, NULL, 1, '4.2x32.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:05:16', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(531, 'GUR_EN', 'lj1yexj1kh10138', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*40 MM', '74.00', 6, NULL, 1, '63x40 B.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:05:13', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(532, 'GUR_EN', 'iltpjh8jix92808', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*45 MM', '71.00', 6, NULL, 1, '63x45.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:05:09', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(533, 'GUR_EN', '825y0p71rcu21566', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*50 MM', '66.00', 6, NULL, 1, '63x50.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:05:06', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(534, 'GUR_EN', 'pgem0lwn4a56055', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*55 MM', '66.00', 6, NULL, 1, '63x55.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:04:47', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(535, 'GUR_EN', 'fpg3s38qqot7823', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*60 MM', '67.00', 6, NULL, 1, '63x60.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:04:45', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(536, 'GUR_EN', '4fbprc7y3o498529', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*63 MM', '68.00', 6, NULL, 1, '63x63.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:04:42', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(537, 'GUR_EN', 'vtkpdp039872582', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*65 MM', '62.00', 6, NULL, 1, '63x65.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:04:39', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(538, 'GUR_EN', 'tzg4bbu78yo43246', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*75 MM', '61.00', 6, NULL, 1, '63x75.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:04:37', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(539, 'GUR_EN', 'rs8t1d3p1o88717', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 6.3*100 MM', '55.00', 6, NULL, 1, '63x100.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:04:33', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(540, 'GUR_EN', 'bxzdc3q9jib50033', 'PATTA ŞRUP', '', 'PATTA ŞRUP No 4.2*25 MM', '41.00', 6, NULL, 1, '4.2x25.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-20 04:04:31', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(541, ' GUR_ELK', 'uhpo04iborm32988', 'LEDBULB LAMP 6500K 5W', '', '5W LEDBULB LAMP 6500K AK E27', '15.00', 6, NULL, 1, 'BLUBE5W.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-19 05:01:44', NULL, 'Led Lampalar', '000', '', NULL),
(542, ' GUR_ELK', '0l0sqpmfayu23975', 'LEDBULB LAMP 6500K 10W', '', '10W LEDBULB LAMP 6500K AK E27', '18.00', 6, NULL, 1, 'BLUBE10.jpg', 'images/gurlusyk/', 0, '2024-11-14 21:00:00', '2024-11-19 05:01:48', NULL, 'Led Lampalar', '000', '', NULL),
(543, 'GUR_EN', 'd1sajutqi9m49614', 'DEMIR SWERLO MAKITA 6 MM', '', 'DEMIR SWERLO MAKITA 6 MM GARA ORGINAL', '6.00', 6, NULL, 20, 'Без имениss11.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 04:48:44', NULL, 'Ankerker swerlolar', '000', '', NULL),
(544, 'GUR_EN', 'inkbchy4rw16556', 'AKFIX SILIKON (MASTIK)', '', 'AKFIX SILIKON (MASTIK) AC605', '16.00', 6, NULL, 12, 'tttt.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-20 04:07:42', NULL, 'Silikonlar', '000', NULL, NULL),
(545, 'GUR_EN', 'u5h2pgqkds8260', 'AKFIX SILIKON GARA (LABAWOY)', '', 'AKFIX SILIKON GARA (LABAWOY) 647FC', '46.00', 6, NULL, 12, 'Без имsни-1.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 04:48:46', NULL, 'Silikonlar', '000', '', NULL),
(546, 'GUR_EN', 'm1ntuj0vdw69680', 'AKFIX SILIKON (AK) 280 GR', '', 'AKFIX SILIKON (AK) 280 GR 1100E', '26.00', 6, NULL, 12, 'Без имени-s13.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 04:48:47', NULL, 'Silikonlar', '000', '', NULL),
(547, 'BYG_GUR', 'msih27z1v3m4136', 'WALIK DEKOR 20 SM', '', 'WALIK DEKOR 20 SM GYZYL D-8,11-LIK GOWSY', '22.00', 6, NULL, 10, 'Без имени-1.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:02:03', NULL, 'Boyag gurallary', '000', '', NULL),
(548, 'GUR_EN', '57xyiix7n1c80268', 'DEKOR METR RULETKA 3M*25MM', '', 'DEKOR METR RULETKA 3M*25MM (KOD:295) TURK', '12.00', 6, NULL, 12, 'ьуек.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 04:48:48', NULL, 'Metrler', '000', '', NULL),
(549, 'GUR_EN', '8m135xxrq6r90838', 'DEKOR METR RULETKA 5M*25MM', '', 'DEKOR METR RULETKA 5M*25MM (KOD:296)', '15.00', 6, NULL, 12, '5 ьуек.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 04:48:49', NULL, 'Metrler', '000', '', NULL),
(550, 'GUR_EN', 'z7f4v2dur6e47115', 'DEKOR METR RULETKA 10M*25MM', '', 'DEKOR METR RULETKA 10M*25MM (KOD:298) TURK', '30.00', 6, NULL, 12, 'цйвв.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 04:48:50', NULL, 'Metrler', '000', '', NULL),
(551, 'HHR', 'ozumx7j4qkg90517', 'IZOLENTA VAME TAPE 5 M', '', 'IZOLENTA VAME TAPE 5 M', '2.00', 6, NULL, 20, 'izolenta 5 metr.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:02:17', NULL, 'Izolentalar', '000', '', NULL),
(552, 'GUR_EN', '3chf1a5o7vu28878', 'ŞRUP NASATKA MAGNITLI 65MM', '', 'ŞRUP NASATKA MING LI MAGNITLI 65MM 2 TARAPLAYYN (HRC:58-61)', '6.00', 6, NULL, 40, 'MING LI HRC 58-61.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-20 04:09:06', NULL, 'El gurallary', '000', '', NULL),
(553, 'GUR_EN', 'y5wfhxpj9z85522', 'ZAKLYOPKA SRC (BLIND RIVETS) 4*10', '', 'ZAKLYOPKA SRC (BLIND RIVETS) 4*10', '37.00', 6, NULL, 1, '4x10.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 04:48:53', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(554, 'GUR_EN', 'mtft9tjqef823933', 'ZAKLYOPKA SRC (BLIND RIVETS) 4*12', '', 'ZAKLYOPKA SRC (BLIND RIVETS) 4*12', '37.00', 6, NULL, 1, '4x12.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 04:48:54', NULL, 'Çüýler samorezler şruplar', '000', '', NULL),
(555, 'GUR_EN', 'uf7a0kxaqbb92562', 'SPATEL 3-LIK AGAC SAPLY', '', 'SPATEL 3-LIK AGAC SAPLY', '6.00', 6, NULL, 1, 'Untitled-20.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-20 04:39:34', NULL, 'El gurallary', '000', '', NULL),
(556, 'GUR_EN', 'ulp7t1cpp4g87770', 'SPATEL 6-LYK AGAC SAPLY', '', 'SPATEL 6-LYK AGAC SAPLY', '8.00', 6, NULL, 1, 'Untitled-21.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-20 04:39:38', NULL, 'El gurallary', '000', '', NULL),
(557, 'BYG_GUR', 'hmpx8fmcxvi35412', 'SPRAY KRASKA GARA 300 ML POLIMAX', '', 'SPRAY KRASKA GARA 300 ML POLIMAX', '12.00', 6, NULL, 1, 'gara-2.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:15:57', NULL, 'Spreý boýaglar', '000', NULL, NULL),
(558, 'BYG_GUR', '6hdwvxo2fxf1857', 'SPRAY KRASKA GOK 300 ML POLIMAX', '', 'SPRAY KRASKA GOK 300 ML POLIMAX', '12.00', 6, NULL, 1, 'yasyl-1.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:15:47', NULL, 'Spreý boýaglar', '000', NULL, NULL),
(559, 'BYG_GUR', 'i4r0z97u86a79674', 'SPRAY KRASKA AK 300 ML POLIMAX', '', 'SPRAY KRASKA AK 300 ML POLIMAX', '12.00', 6, NULL, 1, 'Без имениaa-3.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:15:45', NULL, 'Spreý boýaglar', '000', NULL, NULL),
(561, 'BYG_GUR', '3twwr2ee8tx48081', 'KRASKA MASHAD 1 LT BAYDAK YASYL', '', 'KRASKA MASHAD 1 LT BAYDAK YASYL', '50.00', 6, NULL, 1, 'yasylи-6.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:13:57', NULL, 'Boýaglar we emulsiýalar', '000', NULL, NULL),
(562, 'BYG_GUR', 'w57bd3uci547994', 'KRASKA MASHAD 1 LT AK', '', 'KRASKA MASHAD 1 LT AK', '50.00', 6, NULL, 1, 'yasyl-3.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:14:01', NULL, 'Boýaglar we emulsiýalar', '000', NULL, NULL),
(563, 'GUR_EN', 'maue4el7am73931', 'PENA NEOX 750 ML', '', 'PENA NEOX 750 ML', '50.00', 6, NULL, 1, 'test fotooo.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 04:48:57', NULL, 'Köpükler', '000', '', NULL),
(564, 'BYG_GUR', 'gbk67avns6940772', 'SPRAY KRASKA YASYL 300 ML GOLRIZAN', '', 'SPRAY KRASKA YASYL 300 ML GOLRIZAN', '15.00', 6, NULL, 1, 'w.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:15:43', NULL, 'Spreý boýaglar', '000', NULL, NULL),
(565, 'BYG_GUR', '75qt8pwg7e991350', 'SPRAY KRASKA AK 300 ML GOLRIZAN', '', 'SPRAY KRASKA AK 300 ML GOLRIZAN', '15.00', 6, NULL, 1, 'Без имени-1-восстановлено.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:15:38', NULL, 'Spreý boýaglar', '000', NULL, NULL),
(566, 'BYG_GUR', 't2bgs9h3qnb73426', 'SPRAY KRASKA TAKGUL SILVER 300 ML', '', 'SPRAY KRASKA TAKGUL SILVER 300 ML', '16.00', 6, NULL, 1, 'еуые ыгкфеф.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:15:35', NULL, 'Spreý boýaglar', '000', NULL, NULL),
(567, 'BYG_GUR', 'fsvreb9ljv53441', 'KRASKA MESHKAT SUPERB 1 LT YASYL', '', 'KRASKA MESHKAT SUPERB 1 LT YASYL', '50.00', 6, NULL, 1, 'лкфылф.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:14:04', NULL, 'Boýaglar we emulsiýalar', '000', NULL, NULL),
(568, 'BYG_GUR', 'n7pm3u39wuf7996', 'KOLLER UNIVERSAL TINTEX FAST BLUE 110 GR', '', 'KOLLER UNIVERSAL TINTEX FAST BLUE 110 GR', '13.00', 6, NULL, 1, 'tintex2.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:14:06', NULL, 'Boýaglar we emulsiýalar', '000', NULL, NULL),
(569, 'BYG_GUR', 'cn6x7wydwac27369', 'KOLLER UNIVERSAL TINTEX FAST GREEN 110 GR', '', 'KOLLER UNIVERSAL TINTEX FAST GREEN 110 GR', '13.00', 6, NULL, 1, 'tintex1.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-22 11:14:12', NULL, 'Boýaglar we emulsiýalar', '000', NULL, NULL),
(571, 'GUR_EN', 'eq46sai4lj59413', 'PATTA SURUP No 6.3*25 MM', '', 'PATTA SURUP No 6.3*25 MM', '86.00', 6, NULL, 1, '63x25.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:19', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(572, 'GUR_EN', 'zla00lkbbt70167', 'PATTA SURUP No 6.3*70 MM', '', 'PATTA SURUP No 6.3*70 MM', '65.00', 6, NULL, 1, '63x700.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-20 04:36:52', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(573, 'GUR_EN', 'h33xj9uivgh74419', 'PATTA SURUP No 4.2*25 MM', '', 'PATTA SURUP No 4.2*25 MM', '41.00', 6, NULL, 1, '4.2x25.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:28', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(574, ' GUR_ELK', 'six4cxlnlrf68459', 'PROJEKTOR CYRA LED 100W', '', 'PROJEKTOR CYRA LED 100W', '251.00', 6, NULL, 1, '100.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:25', NULL, 'Proýektor', '000', NULL, NULL),
(575, ' GUR_ELK', '8qfcgcyxk3n60350', 'PROJEKTOR CYRA LED 200W', '', 'PROJEKTOR CYRA LED 200W', '314.00', 6, NULL, 1, 'Без имddеныыыи-1.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:31', NULL, 'Proýektor', '000', NULL, NULL),
(576, ' GUR_ELK', 'lviajoey54m24040', 'PROJEKTOR CYRA LED 300W', '', 'PROJEKTOR CYRA LED 300W', '382.00', 6, NULL, 1, 'Без имddени-1.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:35', NULL, 'Proýektor', '000', NULL, NULL),
(577, ' GUR_ELK', 'zvktixer8v31908', 'ELEKTRIK TROYNIK 3-LI GARA', '', 'ELEKTRIK TROYNIK 3-LI GARA', '35.00', 6, NULL, 1, 'Untitled-13.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-23 03:48:35', NULL, 'Udliniteller', '000', '', NULL),
(578, ' GUR_ELK', 'b1f4e09ih743736', 'ELEKTRIK TROYNIK 4-LI AK', '', 'ELEKTRIK TROYNIK 4-LI AK', '27.00', 6, NULL, 1, 'Untitled-16.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-23 03:48:38', NULL, 'Udliniteller', '000', '', NULL),
(579, 'BYG_GUR', 'odsa2e5be394063', 'COTKA 1-INÇ PLASTIK SAPLY', '', 'COTKA 1-INÇ PLASTIK SAPLY', '2.00', 6, NULL, 1, '1111-2.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:33', NULL, 'Boyag gurallary', '000', NULL, NULL),
(580, 'BYG_GUR', 't7a730qt2725097', 'COTKA 2-INÇ PLASTIK SAPLY', '', 'COTKA 2-INÇ PLASTIK SAPLY', '3.00', 6, NULL, 1, 'sssи-1.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:38', NULL, 'Boyag gurallary', '000', NULL, NULL),
(581, 'BYG_GUR', 'mnn0mu56m644416', 'COTKA 3-INÇ PLASTIK SAPLY', '', 'COTKA 3-INÇ PLASTIK SAPLY', '40.00', 6, NULL, 1, '333и-2.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:41', NULL, 'Boyag gurallary', '000', NULL, NULL),
(582, 'BYG_GUR', '38t27hywjxy42136', 'COTKA 4-INÇ PLASTIK SAPLY', '', 'COTKA 4-INÇ PLASTIK SAPLY', '6.00', 6, NULL, 1, '44-3.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:43', NULL, 'Boyag gurallary', '000', NULL, NULL),
(583, 'BYG_GUR', 'qre3md1rb927934', 'COTKA 3-INÇ AGAC SAPLY', '', 'COTKA 3-INÇ AGAC SAPLY', '5.00', 6, NULL, 1, 'chotka3inch.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:46', NULL, 'Boyag gurallary', '000', NULL, NULL),
(584, 'BYG_GUR', '9jgcytql5o68483', 'COTKA 2-INÇ AGAC SAPLY', '', 'COTKA 2-INÇ AGAC SAPLY', '4.00', 6, NULL, 1, 'chotka50.8mm.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:49', NULL, 'Boyag gurallary', '000', NULL, NULL),
(585, 'BYG_GUR', 'wjv8jnxwykr69552', 'COTKA 1-INÇ AGAC SAPLY', '', 'COTKA 1-INÇ AGAC SAPLY', '3.00', 6, NULL, 1, 'chotka25mm.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:52', NULL, 'Boyag gurallary', '000', NULL, NULL),
(586, 'GUR_EN', 'y9jbns96cc21466', 'AKIFIX AGAC SURUP No 3.5*30 MM', '', 'AKIFIX AGAC SURUP No 3.5*30 MM', '30.00', 6, NULL, 1, '3.5x30.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:55', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(587, 'GUR_EN', 'qoa5pbokow11251', 'AKIFIX AGAC SURUP No 4.0*30 MM', '', 'AKIFIX AGAC SURUP No 4.0*30 MM', '30.00', 6, NULL, 1, '40x30mm.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:03:57', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(588, 'GUR_EN', 'dbfzs09a0ij20184', 'AKIFIX AGAC SURUP No 4.0*60 MM', '', 'AKIFIX AGAC SURUP No 4.0*60 MM', '30.00', 6, NULL, 1, '40x60 a.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:04:01', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(589, 'GUR_EN', 'yhstpejp2490952', 'AKIFIX AGAC SURUP No 4.0*70 MM', '', 'AKIFIX AGAC SURUP No 4.0*70 MM', '30.00', 6, NULL, 1, '4x70.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:04:03', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(590, 'GUR_EN', 'p1rl7swzds49851', 'AKIFIX AGAC SURUP No 5.0*50 MM', '', 'AKIFIX AGAC SURUP No 5.0*50 MM', '30.00', 6, NULL, 1, '5x50mm.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:04:05', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(591, ' GUR_ELK', '5nxgsxekbly74262', 'LEDBULB LAMP 6500K 15W', '', '15W LEDBULB LAMP 6500K AK E27', '20.00', 6, NULL, 1, 'ledblub15wikili.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:04:08', NULL, 'Led Lampalar', '000', NULL, NULL),
(592, ' GUR_ELK', '31p0oxv6a8h13546', 'LEDBULB LAMP 6500K 20W', '', '20W LEDBULB LAMP 6500K AK E27', '23.00', 6, NULL, 1, 'ledblub20wikili.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:04:11', NULL, 'Led Lampalar', '000', NULL, NULL),
(593, ' GUR_ELK', 'vwvdhtzik5n56998', 'LEDBULB LAMP 6500K 30W', '', '30W LEDBULB LAMP 6500K AK E27', '27.00', 6, NULL, 1, 'ledblub30wikili.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:04:14', NULL, 'Led Lampalar', '000', NULL, NULL),
(594, ' GUR_ELK', '1fzsaiyhwds45670', 'LEDBULB LAMP 6500K 40W', '', '40W LEDBULB LAMP 6500K AK E27', '33.00', 6, NULL, 1, 'ledblub40w.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:04:16', NULL, 'Led Lampalar', '000', NULL, NULL),
(595, ' GUR_ELK', '3s23g7fr6y296688', 'LEDBULB LAMP 6500K 50W', '', '50W LEDBULB LAMP 6500K AK E27', '38.00', 6, NULL, 1, 'ledblub50wikili.jpg', 'images/gurlusyk/', 0, '2024-11-15 21:00:00', '2024-11-19 05:04:19', NULL, 'Led Lampalar', '000', NULL, NULL),
(597, 'GUR_EN', 'dk65geg95xo62178', 'DEMIR CUY 40 MM', '', 'DEMIR CUY 40 MM', '18.00', 6, NULL, 1, 'CUY 40.jpg', 'images/gurlusyk/', 0, '2024-11-17 21:00:00', '2024-11-19 05:04:25', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(598, 'GUR_EN', 'ztfeyjb48hr37793', 'DEMIR CUY 60 MM', '', 'DEMIR CUY 60 MM', '16.00', 6, NULL, 1, 'CUY 60.jpg', 'images/gurlusyk/', 0, '2024-11-17 21:00:00', '2024-11-19 05:04:27', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(599, 'GUR_EN', 'i407uahofse74196', 'DEMIR CUY 80 MM', '', 'DEMIR CUY 80 MM', '16.00', 6, NULL, 1, 'CUY 80.jpg', 'images/gurlusyk/', 0, '2024-11-17 21:00:00', '2024-11-19 05:04:29', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(600, 'GUR_EN', 'ph8w3j39p4p49930', 'DEMIR CUY 100 MM', '', 'DEMIR CUY 100 MM', '16.00', 6, NULL, 1, 'CUY 100.jpg', 'images/gurlusyk/', 0, '2024-11-17 21:00:00', '2024-11-19 05:04:32', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(601, 'GUR_EN', 't1dm8w0rjcc21182', 'DEMIR CUY 120 MM', '', 'DEMIR CUY 120 MM', '18.00', 6, NULL, 1, 'CUY 120.jpg', 'images/gurlusyk/', 0, '2024-11-17 21:00:00', '2024-11-19 05:04:35', NULL, 'Çüýler samorezler şruplar', '000', NULL, NULL),
(602, 'GUR_EN', 'yg3eu11h6471772', 'SIFER CUY 60-LYK', '', 'SIFER CUY 60-LYK', '28.00', 6, NULL, 1, 'sifer 60.jpg', 'images/gurlusyk/', 0, '2024-11-18 21:00:00', '2024-11-18 21:00:00', NULL, 'Çüýler samorezler şruplar', '000', 'undefined', NULL),
(603, 'GUR_EN', 'twtn50vzn635546', 'SIFER CUY 80-LIK', '', 'SIFER CUY 80-LIK', '28.00', 6, NULL, 1, 'sifer 80.jpg', 'images/gurlusyk/', 0, '2024-11-18 21:00:00', '2024-11-18 21:00:00', NULL, 'Çüýler samorezler şruplar', '000', 'undefined', NULL),
(604, 'GUR_EN', 'jkaph2p7zdl68333', 'SIFER CUY 100-LIK', '', 'SIFER CUY 100-LIK', '28.00', 6, NULL, 1, 'sifer 100.jpg', 'images/gurlusyk/', 0, '2024-11-18 21:00:00', '2024-11-18 21:00:00', NULL, 'Çüýler samorezler şruplar', '000', 'undefined', NULL),
(605, 'GUR_EN', '1ypplilspbn41041', 'SIFER CUY 120-LIK', '', 'SIFER CUY 120-LIK', '28.00', 6, NULL, 1, 'sifer120.jpg', 'images/gurlusyk/', 0, '2024-11-18 21:00:00', '2024-11-18 21:00:00', NULL, 'Çüýler samorezler şruplar', '000', 'undefined', NULL),
(606, 'GUR_EN', 'a7u6ehmtjxl68268', 'SIFER CUY 60-LYK REZINLI', '', 'SIFER CUY 60-LYK REZINLI', '31.00', 6, NULL, 1, 'sifer rezin 60.jpg', 'images/gurlusyk/', 0, '2024-11-18 21:00:00', '2024-11-18 21:00:00', NULL, 'Çüýler samorezler şruplar', '000', 'undefined', NULL),
(607, 'GUR_EN', 'cjsspe0fqrd35010', 'SIFER CUY 80-LIK REZINLI', '', 'SIFER CUY 80-LIK REZINLI', '31.00', 6, NULL, 1, 'sifer rezin 80.jpg', 'images/gurlusyk/', 0, '2024-11-18 21:00:00', '2024-11-18 21:00:00', NULL, 'Çüýler samorezler şruplar', '000', 'undefined', NULL),
(608, 'GUR_EN', 'zyn9obr3qvc48158', 'SIFER CUY 100-LIK REZINLI', '', 'SIFER CUY 100-LIK REZINLI', '31.00', 6, NULL, 1, 'sifer rezin 100.jpg', 'images/gurlusyk/', 0, '2024-11-18 21:00:00', '2024-11-18 21:00:00', NULL, 'Çüýler samorezler şruplar', '000', 'undefined', NULL),
(609, 'GUR_EN', 'g24m462jyhq46106', 'SIFER CUY 120-LIK REZINLI', '', 'SIFER CUY 120-LIK REZINLI', '31.00', 6, NULL, 1, 'sifer rezin 120.jpg', 'images/gurlusyk/', 0, '2024-11-18 21:00:00', '2024-11-20 04:41:23', NULL, 'Çüýler samorezler şruplar', '000', 'undefined', NULL),
(610, 'GUR_EN', 'j5hn7o5qhb58694', 'SUPERNUR ANTIPAS YASYL 15 KG', '', 'SUPERNUR ANTIPAS YASYL 15 KG', '296.00', 6, NULL, 1, 'SUPERNUR 15 KG.jpg', 'images/gurlusyk/', 0, '2024-11-18 21:00:00', '2024-11-18 21:00:00', NULL, 'Antipas', '000', 'undefined', NULL),
(611, 'BYG_GUR', '2dro5joczyd38801', 'EMULSIYA SINTETIKI WD KC-183 TABAN 5 KG', '', 'EMULSIYA SINTETIKI WD KC-183 TABAN 5 KG', '43.00', 6, NULL, 1, 'taban boyag 5 kggg.jpg', 'images/gurlusyk/', 0, '2024-11-19 21:00:00', '2024-11-22 11:14:14', NULL, 'Boýaglar we emulsiýalar', '000', 'undefined', NULL),
(612, 'BYG_GUR', 'sgubefi0347902', 'EMULSIYA SINTETIKI WD KC-183 TABAN 10 KG', '', 'EMULSIYA SINTETIKI WD KC-183 TABAN 10 KG', '75.00', 6, NULL, 1, 'taban 10 kkk.jpg', 'images/gurlusyk/', 0, '2024-11-19 21:00:00', '2024-11-22 11:14:17', NULL, 'Boýaglar we emulsiýalar', '000', 'undefined', NULL),
(613, 'BYG_GUR', 'c5klfhis2kr95443', 'EMULSIYA SINTETIKI WD KC-183 TABAN 20 KG', '', 'EMULSIYA SINTETIKI WD KC-183 TABAN 20 KG', '129.00', 6, NULL, 1, 'TABAN 20 KG.jpg', 'images/gurlusyk/', 0, '2024-11-19 21:00:00', '2024-11-22 11:14:20', NULL, 'Boýaglar we emulsiýalar', '000', 'undefined', NULL),
(614, 'BYG_GUR', 'd51uukyjjj83863', 'EMULSIYA SINTETIKI WD KC-183 ICKI 10 KG', '', 'EMULSIYA SINTETIKI WD KC-183 ICKI 10 KG', '86.00', 6, NULL, 1, 'Без имени-1.jpg', 'images/gurlusyk/', 0, '2024-11-19 21:00:00', '2024-11-22 11:14:23', NULL, 'Boýaglar we emulsiýalar', '000', 'undefined', NULL),
(615, 'BYG_GUR', 'gzitralujce31326', 'EMULSIYA SINTETIKI WD KC-183 DASKY 20 KG', '', 'EMULSIYA SINTETIKI WD KC-183 DASKY 20 KG', '209.00', 6, NULL, 1, 'Без имени-1Z.jpg', 'images/gurlusyk/', 0, '2024-11-19 21:00:00', '2024-11-22 11:14:26', NULL, 'Boýaglar we emulsiýalar', '000', 'undefined', NULL),
(616, 'ELK_GUR', 'hmkvwfi5col44179', 'DISK PATTA 230*1.8*22 MM', '', 'DISK PATTA 230*1.8*22 MM (HYTAY)', '9.00', 6, NULL, 1, 'disk 230x118mm.jpg', 'images/gurlusyk/', 0, '2024-11-20 21:00:00', '2024-11-20 21:00:00', NULL, 'Kesme diskler', '000', 'undefined', NULL),
(617, 'BYG_GUR', 'goiage9twfs76679', 'EMULSIYA AKRILIK WD AK-111 DASKY 10 KG', '', 'EMULSIYA AKRILIK WD AK-111 DASKY 10 KG', '172.00', 6, NULL, 1, 'icki boyag 10 kg.jpg', 'images/gurlusyk/', 0, '2024-11-20 21:00:00', '2024-11-22 11:14:29', NULL, 'Boýaglar we emulsiýalar', '000', 'undefined', NULL),
(618, 'BYG_GUR', 'n9fcrcy4i4r14944', 'EMULSIYA AKRILIK WD AK-111 ICKI 10 KG', '', 'EMULSIYA AKRILIK WD AK-111 ICKI 10 KG', '139.00', 6, NULL, 1, 'icki boyag 10 kg.jpg', 'images/gurlusyk/', 0, '2024-11-20 21:00:00', '2024-11-22 11:14:32', NULL, 'Boýaglar we emulsiýalar', '000', 'undefined', NULL),
(619, 'BYG_GUR', 'yqhywgt7yn70456', 'EMULSIYA AKRILIK WD AK-111 ICKI 5 KG', '', 'EMULSIYA AKRILIK WD AK-111 ICKI 5 KG', '86.00', 6, NULL, 1, 'icki boyag 5 kg.jpg', 'images/gurlusyk/', 0, '2024-11-20 21:00:00', '2024-11-22 11:14:35', NULL, 'Boýaglar we emulsiýalar', '000', 'undefined', NULL),
(620, 'GUR_EN', '518qms02vft84088', 'SWERLO DEMIR 4.0 MM INGCO', '', 'SWERLO DEMIR 4.0 MM INGCO', '3.00', 6, NULL, 1, 'swerlo.jpg', 'images/gurlusyk/', 0, '2024-11-20 21:00:00', '2024-11-20 21:00:00', NULL, 'Ankerker swerlolar', '000', 'undefined', NULL),
(621, 'BYG_GUR', '0tlkoiegksk85265', 'RASTWARITEL FATEH FAM 646 5 LT', '', 'RASTWARITEL FATEH FAM 646 5 LT', '78.00', 6, NULL, 1, 'rastworitel 646.jpg', 'images/gurlusyk/', 0, '2024-11-20 21:00:00', '2024-11-22 11:14:38', NULL, 'Boýaglar we emulsiýalar', '000', 'undefined', NULL),
(624, 'SAN_GUR', 'lvlogb8vg4j81891', 'HAMUT', '', 'HAMUT D(75-80)', '9.00', 6, NULL, 1, 'D75-80.jpg', 'images/gurlusyk/', 0, '2024-11-21 21:00:00', '2024-11-21 21:00:00', NULL, 'Hamutlar', '000', 'Standart', NULL),
(625, 'SAN_GUR', 'gfyk4vyel9r36441', 'HAMUT', '', 'HAMUT D(87-92)', '11.00', 6, NULL, 1, 'HAMUT 87-92.jpg', 'images/gurlusyk/', 0, '2024-11-21 21:00:00', '2024-11-21 21:00:00', NULL, 'Hamutlar', '000', 'Standart', NULL),
(626, 'SAN_GUR', 'z9nkyoy3u331091', 'HAMUT', '', 'HAMUT D(107-112)', '13.00', 6, NULL, 1, 'HAMUT 107-112.jpg', 'images/gurlusyk/', 0, '2024-11-21 21:00:00', '2024-11-21 21:00:00', NULL, 'Hamutlar', '000', 'Standart', NULL),
(627, ' GUR_ELK', 'tndveqemimh37940', 'LEDBULB LAMP 6500K 60W', '', '60W LEDBULB LAMP 6500K AK E27', '44.00', 6, NULL, 1, 'ledblub60wikili.jpg,Untitled-126.jpg,Untitled-127.jpg', 'images/gurlusyk/', 0, '2024-11-21 21:00:00', '2024-11-22 10:20:49', NULL, 'Led Lampalar', '000', 'new', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roofs`
--

CREATE TABLE `roofs` (
  `id` int NOT NULL,
  `Roof` varchar(120) NOT NULL,
  `Roof_types` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Color` varchar(120) NOT NULL,
  `Color_code` varchar(25) DEFAULT NULL,
  `Size` varchar(50) DEFAULT NULL,
  `Thickness` float NOT NULL,
  `Price` float NOT NULL,
  `Descirption` varchar(250) DEFAULT NULL,
  `Roof_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roofs`
--

INSERT INTO `roofs` (`id`, `Roof`, `Roof_types`, `Color`, `Color_code`, `Size`, `Thickness`, `Price`, `Descirption`, `Roof_code`, `image`) VALUES
(1, 'ŞIFER', 'ÇEREPISSA', 'BAYDAK YASYL 6029', '#006F3D', '88x74', 0.25, 120, '21-LIK YAPRAK CEREPISSA, BAYDAK YASYL 6029', 'cherep', 'cerepisa1.jpg'),
(2, 'ŞIFER', 'ÇEREPISSA ', 'BAYDAK YASYL 6029', '#006F3D', '90x80', 0.3, 130, 'KIÇI YAPRAK CEREPISSA	BAYDAK YASYL 6029\r\n', 'cherep', 'cerepisa2.jpg'),
(3, 'ŞIFER', 'ÇEREPISSA ', 'BAYDAK YASYL 6029', '#006F3D', '89x79', 0.32, 140, ' 2 ÇYZYK, YAPRAK CEREPISSA, BAYDAK YASYL 6029', 'cherep', 'cerepisa3.jpg'),
(4, 'ŞIFER', 'ÇEREPISSA ', 'BARDOWY 3005\n', '#59191F', '88x78', 0.32, 150, '3ÇYZYK, YAPRAK CEREPISSA, BAYDAK YASYL 6029', 'cherep', 'cerepisa4.jpg'),
(5, 'ŞIFER', 'PROFNOSTIL', 'GARA YASYL 6005', '#024442', '80x75', 0.5, 150, 'ADATY GARA YASYL 6005', 'profno', 'profnastil1.jpg'),
(6, 'ŞIFER', 'PROFNOSTIL', 'GARA YASYL 6005', '#024442', '90x84', 0.4, 160, 'ULY GARA YASYL 6005', 'profno', 'profnastil2.jpg'),
(7, 'ŞIFER', 'GARMOŞKA', 'BARDOWY 3005\r\n', '#B81B0E', '90x84', 0.4, 145, 'Adaty, BARDOWY 3005', 'garmosh', 'garmoshka1.png'),
(8, 'ŞIFER', 'GARMOŞKA', 'BARDOWY 3005', '#006F3D', '84x77', 0.6, 170, 'ULY BARDOWY 3005', 'garmosh', 'garmoshka1.jpg'),
(9, 'ŞIFER', 'PROFNOSTIL', 'GARA YASYL 6005', '#024442', '80x75', 0.7, 190, 'ADATY GARA YASYL 6005', 'profno', 'profnastil3.jpg'),
(10, 'ŞIFER', 'PROFNOSTIL', 'GARA YASYL 6005', '#000000', '80x75', 0.6, 200, 'ADATY GARA YASYL 6005', 'profno', 'profnastil4.jpg'),
(11, 'ŞIFER', 'GARMOŞKA', 'BARDOWY 3005', '#140F8C', '90x84', 0.7, 185, 'Adaty, BARDOWY 3005', 'garmosh', 'garmoshka3.jpg');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(120) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `client_id` varchar(100) DEFAULT NULL,
  `created_date` date NOT NULL,
  `web_admin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `surname`, `phone_number`, `email`, `password`, `client_id`, `created_date`, `web_admin`) VALUES
(71, 'Guvanc', 'Kabulow', '65864959', 'infomugallym@gmail.com', '79', '0.n3mfh57huk21616', '2024-10-17', 'super_admin'),
(72, 'Selim', 'Aga', '62964427', 'selimaganyyazow@gmail10.com', '96', '0.r1wxqueotvm56899', '2024-10-17', 'super_admin');

-- --------------------------------------------------------

--
-- Table structure for table `Users_table`
--

CREATE TABLE `Users_table` (
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
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `client_messages`
--
ALTER TABLE `client_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Customers`
--
ALTER TABLE `Customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`INVENTORY_ID`);

--
-- Indexes for table `Main_carousel`
--
ALTER TABLE `Main_carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar_links`
--
ALTER TABLE `navbar_links`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `OrderItems`
--
ALTER TABLE `OrderItems`
  ADD PRIMARY KEY (`ORDER_ITEM_ID`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `PARENT_CATEGORY`
--
ALTER TABLE `PARENT_CATEGORY`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `PARENT_PRODUCT_CODE`
--
ALTER TABLE `PARENT_PRODUCT_CODE`
  ADD PRIMARY KEY (`ID`);

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
-- Indexes for table `roofs`
--
ALTER TABLE `roofs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Suppliers`
--
ALTER TABLE `Suppliers`
  ADD PRIMARY KEY (`SUPPLIER_ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users_table`
--
ALTER TABLE `Users_table`
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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `client_messages`
--
ALTER TABLE `client_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Customers`
--
ALTER TABLE `Customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT for table `Inventory`
--
ALTER TABLE `Inventory`
  MODIFY `INVENTORY_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Main_carousel`
--
ALTER TABLE `Main_carousel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `navbar_links`
--
ALTER TABLE `navbar_links`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `OrderItems`
--
ALTER TABLE `OrderItems`
  MODIFY `ORDER_ITEM_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `PARENT_CATEGORY`
--
ALTER TABLE `PARENT_CATEGORY`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `PARENT_PRODUCT_CODE`
--
ALTER TABLE `PARENT_PRODUCT_CODE`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Payments`
--
ALTER TABLE `Payments`
  MODIFY `PAYMENT_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `PRODUCTS_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=628;

--
-- AUTO_INCREMENT for table `roofs`
--
ALTER TABLE `roofs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Suppliers`
--
ALTER TABLE `Suppliers`
  MODIFY `SUPPLIER_ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `Users_table`
--
ALTER TABLE `Users_table`
  MODIFY `USER_ID` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
