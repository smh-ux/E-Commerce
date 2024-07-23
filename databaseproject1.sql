-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 02:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databaseproject1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admins_ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(27) NOT NULL,
  `Name` char(90) NOT NULL,
  `LastName` char(50) NOT NULL,
  `AddTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admins_ID`, `Username`, `Password`, `Name`, `LastName`, `AddTime`) VALUES
(1, 'Kudret', '123456', 'Semih', 'Okumuş', '2024-05-09 19:29:17'),
(2, 'Drunken', '12345', 'Zübeyir', 'Dönmez', '2024-05-09 19:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Categories_ID` int(11) NOT NULL,
  `Categories_Name` varchar(50) NOT NULL,
  `Products_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Categories_ID`, `Categories_Name`, `Products_ID`) VALUES
(1, 'Technology', 11),
(2, 'Fashion', 22);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `Customers_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `EMail` varchar(90) NOT NULL,
  `Phone_number` bigint(12) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customers_ID`, `Name`, `Surname`, `EMail`, `Phone_number`, `Address`, `Username`, `Password`) VALUES
(1, 'Onur', 'Demir', 'onurdemir@gmail.com', 5333333333, 'Çankaya/Ankara', 'OnurDemir', '123'),
(2, 'Ammar', 'Abdullah', 'ammarabdullah@gmail.com', 5222222222, 'Mamak/Ankara', 'Kimyager', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Products_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Desc` text NOT NULL,
  `Price` decimal(7,2) NOT NULL,
  `Discount` decimal(7,2) NOT NULL DEFAULT 0.00,
  `Quantity` int(11) NOT NULL,
  `Img` text NOT NULL,
  `DateAdded` datetime NOT NULL DEFAULT current_timestamp(),
  `Vendors_ID` int(11) NOT NULL,
  `Categories_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Products_ID`, `Name`, `Desc`, `Price`, `Discount`, `Quantity`, `Img`, `DateAdded`, `Vendors_ID`, `Categories_ID`) VALUES
(1, 'Mouse', '<p>Optical Gaming Mouse</p>\r\n<h3>Features</h3>\r\n<lu>\r\n<li>You can make your mouse lighter or heavier as you wish.</li>\r\n<li>Thanks to its medium size structure, it is suitable for both palm and claw use.</li>\r\n<li>Side buttons with polygonal structure.</li>\r\n<li>LED lighting.</li>\r\n</lu>', '20.00', '0.00', 10, 'mouse.jpg', '2024-05-17 13:50:04', 1, 11),
(2, 'Camera', '<p>Slr Photo Machine</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>Eye-level, five-mirror one-way mirror viewfinder.</li>\r\n<li>	\r\nElectronically controlled vertical-action focal plane shutter.</li>\r\n<li>TTL exposure metering using a 420-pixel RGB sensor.</li>\r\n<li>Type B BriteView Clear Matte Mark VII display.</li>\r\n</ul>', '69.99', '0.00', 7, 'camera.jpg', '2024-05-17 13:51:05', 1, 11),
(3, 'Smart Watch', '<p>Unique watch made of stainless steel, ideal for those who prefer interactive watches.</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>Support by Android.</li>\r\n<li>Adjustable.</li>\r\n<li>Long battery life, up to 2 days usage time.</li>\r\n<li>Lightweight design, comfortable for your wrist.</li>\r\n</ul>', '25.00', '0.00', 10, 'watch.jpg', '2024-05-17 13:51:53', 2, 11),
(4, 'Headphone', '<p>Designed for comfort.</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>High-resolution sound via 40mm dynamic drivers, BassUp technology, dual EQ modes.</li>\r\n<li>60 hours of playback time.</li>\r\n<li>Foldable design with ergonomic headband and memory foam ear cups.</li>\r\n</ul>', '19.99', '0.00', 23, 'headphones.jpg', '2024-05-17 13:52:43', 2, 11),
(5, 'Wallet', '<p>Genuine Leather Men\'s Wallet</p>\r\n<h3>Features</h3>\r\n<ul>\r\n<li>It provides comfortable and stylish use.</li>\r\n<li>It is made of top quality genuine leather and gains a rich appearance over time.</li>\r\n<li>6 card slots that can fit at least 2 cards in each pocket.</li>\r\n<li>With dimensions of 4.3\" wide x 3.3\" high x 0.5\" thick, it\'s perfect for carrying in your back pocket.</li>\r\n</ul>', '14.99', '19.99', 34, 'wallet.jpg', '2024-05-17 13:53:44', 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `Vendors_ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `EMail` varchar(255) NOT NULL,
  `Phone_number` bigint(12) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`Vendors_ID`, `Name`, `Surname`, `EMail`, `Phone_number`, `Username`, `Password`) VALUES
(1, 'Ahmet', 'Aslan', 'ahmetaslan@gmail.com', 5555555555, 'AhmetAslan', 123),
(2, 'Mehmet', 'Kaplan', 'mehmetkaplan@gmail.com', 5444444444, 'MehmetKaplan', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admins_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Categories_ID`),
  ADD KEY `Products_ID` (`Products_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customers_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Products_ID`),
  ADD KEY `Vendors_ID` (`Vendors_ID`),
  ADD KEY `Categories_ID` (`Categories_ID`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`Vendors_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Admins_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Categories_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customers_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Products_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `Vendors_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`Vendors_ID`) REFERENCES `vendors` (`Vendors_ID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`Categories_ID`) REFERENCES `categories` (`Products_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
