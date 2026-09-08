-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 مايو 2026 الساعة 14:46
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `redsea`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`, `email`) VALUES
(1, 'admin', '1234', 'admin@redsea.com');

-- --------------------------------------------------------

--
-- بنية الجدول `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `category`
--

INSERT INTO `category` (`ID`, `name`, `description`) VALUES
(1, 'جزيرة أمالا', 'وجهة سياحية فاخرة على ساحل البحر الأحمر'),
(2, 'مشروع البحر الأحمر', 'مشروع سياحي عالمي يضم مجموعة من الجزر والطبيعة الخلابة'),
(3, 'جزيرة سندالة', 'أولى الوجهات للسياحة البحرية المتميزة');

-- --------------------------------------------------------

--
-- بنية الجدول `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `item`
--

INSERT INTO `item` (`ID`, `name`, `logo`, `description`, `categoryID`) VALUES
(1, 'منتجع كلينيك لا بريري', 'laprairie-ammala.png', 'منتجع استرخاء صحي فاخر يجمع بين الخدمات الطبية والفندقية', 1),
(2, 'منتجع سيكس سينسز أمالا', 'senses-amala.png', 'منتجع صحي يضم مرافق للفنون والثقافة والتأمل', 1),
(3, 'ريتز كارلتون ريزيرف', 'Carlton.png', 'أحد أرقى منتجعات مشروع البحر الأحمر بمعايير عالمية', 2),
(4, 'جزيرة شورى', 'shura.png', 'الجزيرة الرئيسية في مشروع البحر الأحمر', 2),
(5, 'ملاعب جزيرة سندالة', 'golf.png', 'ملعب جولف عالمي بإطلالات خلابة على البحر الأحمر', 3),
(6, 'مرسى اليخوت', 'Yacht.png\r\n', 'مرسى متطور يضم 86 رصيفاً بحرياً فاخراً', 3);

-- --------------------------------------------------------

--
-- بنية الجدول `review`
--

CREATE TABLE IF NOT EXISTS `review` (
`ID` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `body` mediumtext NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `review`
--

INSERT INTO `review` (`ID`, `item_id`, `name`, `body`, `rating`) VALUES
(1, 1, 'Lulu', 'good', 4),
(2, 5, 'AL', 'NICE', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
