-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 09:55 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_ID` int(11) NOT NULL,
  `cat_Name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `ordering` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `visibility` tinyint(4) NOT NULL DEFAULT '0',
  `allowComment` tinyint(4) NOT NULL DEFAULT '0',
  `allowAds` tinyint(4) NOT NULL DEFAULT '0',
  `Date` date NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'database'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_ID`, `cat_Name`, `description`, `ordering`, `parent`, `visibility`, `allowComment`, `allowAds`, `Date`, `icon`) VALUES
(1, 'Phones', 'We assume you are willing, even eager, to learn about all the advanced features that Java puts at\nyour disposal. For example, we give you a detailed treatment of', 1, 0, 1, 1, 0, '2020-11-14', 'mobile'),
(2, 'clothes', 'We assume you are willing, even eager, to learn about all the advanced features that Java puts at\nyour disposal. For example, we give you a detailed treatment of', 2, 0, 1, 1, 0, '2020-11-22', 'database'),
(3, 'TV', 'We assume you are willing, even eager, to learn about all the advanced features that Java puts at\nyour disposal. For example, we give you a detailed treatment of', 1, 0, 1, 1, 1, '2020-12-04', 'desktop'),
(4, 'accessoriess', 'We assume you are willing, even eager, to learn about all the advanced features that Java puts at\r\nyour disposal. For example, we give you a detailed treatment of', 1, 0, 1, 1, 0, '2020-11-14', 'database'),
(5, 'electronics', 'We assume you are willing, even eager, to learn about all the advanced features that Java puts at\r\nyour disposal. For example, we give you a detailed treatment of', 2, 0, 1, 1, 0, '2020-11-22', 'database'),
(6, 'boxes', 'We assume you are willing, even eager, to learn about all the advanced features that Java puts at\nyour disposal. For example, we give you a detailed treatment of treatment oftreatment oftreatment of', 1, 0, 1, 1, 1, '2020-12-04', 'database'),
(7, 'keyboards', 'We assume you are willing, even eager, to learn about all the advanced features that Java puts at\r\nyour disposal. For example, we give you a detailed treatment of treatment oftreatment oftreatment of We assume you are willing, even eager, to learn about all the advanced features that Java puts at\r\nyour disposal. For example, we give you a detailed treatment of treatment oftreatment oftreatment of', 1, 0, 1, 1, 1, '2020-12-04', 'desktop');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `c_date` date NOT NULL,
  `c_status` tinyint(4) NOT NULL DEFAULT '0',
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `comment`, `c_date`, `c_status`, `item_id`, `user_id`) VALUES
(1, 'it is very cost according to its potentials', '2020-11-14', 1, 1, 1),
(2, 'good but it is very cost according to its potentials', '2020-11-14', 1, 1, 2),
(3, 'ana admin ya animal', '2020-11-14', 1, 2, 1),
(4, 'سعره غالي وزي الزفت', '2020-11-22', 1, 5, 1),
(5, 'مقطع وزي الخرا', '2020-11-23', 1, 12, 1),
(6, 'شكله زي الزفت', '2020-11-23', 0, 6, 2),
(7, 'ana mesh fahem 7aga', '2020-12-04', 1, 16, 1),
(8, 'Pellentesquemattis arcu malesuada in. Donec urna sem, rutrum sit amet', '2020-12-06', 1, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `itemId` int(11) NOT NULL,
  `itName` varchar(255) NOT NULL,
  `itDescription` text NOT NULL,
  `itImg` text NOT NULL,
  `itPrice` varchar(255) NOT NULL,
  `itCountry` varchar(255) NOT NULL,
  `itStatus` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `itRating` int(11) NOT NULL,
  `itDate` datetime NOT NULL,
  `cat_ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `itRegStat` tinyint(4) NOT NULL DEFAULT '0',
  `itDiscount` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemId`, `itName`, `itDescription`, `itImg`, `itPrice`, `itCountry`, `itStatus`, `itRating`, `itDate`, `cat_ID`, `UserID`, `itRegStat`, `itDiscount`) VALUES
(1, 'redmi note 9S', 'tope of hawai phone is new and good', '10733_gameloop.jpg', '4800', 'egypt', 'new', 30, '2020-11-14 02:10:21', 1, 1, 1, 20),
(2, 'nokia 3310', 'type of nokia phone is old but good', '10733_gameloop.jpg', '$30', 'egypt', 'old', 70, '2020-11-14 00:00:00', 1, 2, 1, 0),
(3, 'nokia 3330', 'type of nokia phone is so old but good', '6686_IMG-20200616-WA0001.jpg', '300', 'egypt', 'like new', 80, '2020-11-14 00:00:00', 1, 1, 1, 0),
(4, 'nokia 33300', 'type of nokia phone is old but good', '33203_test.jpg', '$4800', 'egypt', 'new', 34, '2020-11-14 00:00:00', 1, 1, 1, 0),
(5, 'redmi note 9S1', 'type of nokia phone is old but good', '43951_test.jpg', '$4800', 'egypt', 'new', 78, '2020-11-14 00:00:00', 1, 1, 1, 0),
(6, 'قميص نص كم ', 'Nam pharetra diam eu dolor vestibulum volutpat.', '9002_test.jpg', '$900', 'خربتها', 'old', 28, '2020-11-22 00:00:00', 2, 1, 1, 0),
(7, 'iphone', 'Nam pharetra diam eu dolor vestibulum volutpat.', '79016_(51).jpg', '$8000', 'خربتها', 'old', 89, '2020-11-23 00:00:00', 1, 1, 1, 0),
(11, 'بنطلون', 'Nam pharetra diam eu dolor vestibulum volutpat.', '62918_10143_175405302632887_1232350405_n.jpg', '$30', 'جعفريه', 'new', 45, '2020-11-23 00:00:00', 2, 9, 1, 0),
(12, 'شراب', 'Nam pharetra diam eu dolor vestibulum volutpat.', '41199_318118_196241193832073_152606321_n.jpg', '$7', 'خربتها', 'old', 50, '0000-00-00 00:00:00', 2, 1, 1, 0),
(13, 'مخده', 'Nam pharetra diam eu dolor vestibulum volutpat.', '75513_1236581_146623502213444_759789439_n.jpg', '$300', 'حارتنا', 'old', 30, '0000-00-00 00:00:00', 2, 2, 1, 5),
(14, 'جلبيه', 'Nam pharetra diam eu dolor vestibulum volutpat.', '6057_522528_648527408507386_1653316160_n.jpg', '$77', 'egypt', 'new', 60, '2020-11-23 02:54:21', 2, 12, 1, 2),
(15, 'relme', 'Nam pharetra diam eu dolor vestibulum volutpat.', '63892_10143_175405302632887_1232350405_n.jpg', '$3000', 'اي حته', 'new', 85, '0000-00-00 00:00:00', 1, 3, 1, 0),
(16, 'wallet', 'Nam pharetra diam eu dolor vestibulum volutpat.', '62219_7hob.com1361304985415.jpg', '$55', 'egypt', 'new', 40, '2020-11-23 00:00:00', 1, 13, 1, 0),
(17, 'glasses', 'Nam pharetra diam eu dolor vestibulum volutpat. Nam pharetra diam eu dolor vestibulum volutpat.', '13321_01.jpeg', '$4800', 'بيتنا', 'new', 90, '2020-11-23 02:30:21', 2, 3, 1, 50),
(18, 'ahmed', 'Nam pharetra diam eu dolor vestibulum volutpat.', '55771_scr1.png', '$5000', 'egypt', 'new', 100, '2020-12-09 00:00:00', 7, 1, 1, 0),
(19, 'chair', 'good and comfortable chair for setdown good and comfortable chair for setdown good and comfortable chair for setdown good and comfortable chair for setdown good and comfortable chair for setdown', '49512_16.jpg', '$400', 'egypt', 'like new', 85, '2020-12-10 00:00:00', 6, 1, 1, 0),
(20, 'receiver ', 'receive good tv channel receive good tv channel receive good tv channel receive good tv channel receive good tv channel receive good tv channel', '7714_,,,ju.jpeg', '$800', 'egypt', 'used', 29, '2020-12-10 02:54:21', 3, 1, 1, 0),
(21, 'laptop', 'very nice to use remotely and portable without fixed power charger ', '78162_27.jpg', '$8000', 'egypt', 'new', 89, '2020-12-10 02:54:21', 5, 1, 1, 70),
(22, 'nokia 3310', 'type of nokia phone is old but good', '5389_1366_768_91030774.jpg', '$2800', 'egypt', 'used', 41, '2020-12-12 13:41:57', 1, 15, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `RegStatus` tinyint(11) NOT NULL DEFAULT '0',
  `GroupID` tinyint(11) NOT NULL DEFAULT '0',
  `TrustStatus` tinyint(11) NOT NULL DEFAULT '0',
  `Date` date NOT NULL,
  `img` varchar(255) NOT NULL,
  `creditID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`, `Email`, `FullName`, `RegStatus`, `GroupID`, `TrustStatus`, `Date`, `img`, `creditID`) VALUES
(1, 'ahmed', '3fcfc1f7f34e78a937e81171ba51dc39538db993', 'ahmedelhefny@gmail.com', 'ahmed elhefny', 1, 1, 0, '2020-11-14', '87052_1....3kart.jpg', '785412364798523'),
(2, 'hefny', 'b2ee60370ad57d9bc3877e9024c507ab99303a64', 'elhefny.only@yahoo.com', 'elhefny sab3', 1, 0, 0, '2020-11-14', '71387_joe.jpg', '785412874798523'),
(3, 'eslam', '444528fc68f99ea0f4fe027cb6cbd262f2a707fe', 'eslamfathy@yahoo.com', 'eslam fathy', 1, 0, 0, '2020-11-22', '84592_(137).jpg', '7854123647486323'),
(8, 'elshahat', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ahmed@eslam.com', 'elshahat elhefny', 1, 0, 0, '2020-11-23', '11404_7hob.com1361304985415.jpg', '1234567891234512'),
(9, 'homos', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'homos@yahoo.com', 'm7md a7md', 1, 0, 0, '2020-11-23', '96354_10-ar-ffb7ff64c111391989855bf8a541e80a.jpg', '7894561231478529'),
(10, 'salama', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'salama@ss.com', 'elhefny sab3', 1, 0, 0, '2020-11-23', '44180_320x118xDown.php_.jpeg.pagespeed.ic.JIgKX8OaRW.jpg', ''),
(11, 'dd', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'dd@ll.dd', 'asas', 1, 0, 0, '2020-11-23', '45514_(8).jpg', ''),
(12, 'ana', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ana@ana.ana', 'ana w ana', 1, 0, 0, '2020-11-23', '15979_73500_474458405930832_180558601_n.jpg', ''),
(13, 'ezat', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'elhefny.only@yahoo.com', 'ezat ezat', 1, 0, 0, '2020-11-23', '58905_1379484_521629291258703_1931481764_n.jpg', '1234567891234567'),
(14, 'hima', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'hima@hima.hima', 'ah med', 0, 0, 0, '2020-12-06', '58164_ahhmed.jpg', '1478521478523691'),
(15, 'aisha', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'aisha@eslam.com', 'ah med', 0, 0, 0, '2020-12-12', '979_1366_768_181015100.jpg', '1478523694561237');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_ID`),
  ADD UNIQUE KEY `cat_Name` (`cat_Name`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `member_2` (`user_id`),
  ADD KEY `item_2` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `cat_1` (`cat_ID`),
  ADD KEY `member_1` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `item_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`itemId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `cat_1` FOREIGN KEY (`cat_ID`) REFERENCES `categories` (`cat_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
