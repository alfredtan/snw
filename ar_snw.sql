-- phpMyAdmin SQL Dump
-- version 3.4.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2012 at 06:47 PM
-- Server version: 5.0.85
-- PHP Version: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ar_snw`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_destination`
--

CREATE TABLE IF NOT EXISTS `app_destination` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(25) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `app_destination`
--

INSERT INTO `app_destination` (`id`, `name`) VALUES
(1, 'Option 1'),
(2, 'Option 2'),
(3, 'Option 3'),
(4, 'Option 4');

-- --------------------------------------------------------

--
-- Table structure for table `app_request`
--

CREATE TABLE IF NOT EXISTS `app_request` (
  `requestId` bigint(20) unsigned NOT NULL,
  `toFbid` bigint(20) unsigned NOT NULL,
  `fromFbid` bigint(20) unsigned NOT NULL,
  `requestDate` datetime NOT NULL,
  `acceptDate` datetime default NULL,
  KEY `FK_request_user` (`fromFbid`),
  KEY `requestId` (`requestId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_request`
--

INSERT INTO `app_request` (`requestId`, `toFbid`, `fromFbid`, `requestDate`, `acceptDate`) VALUES
(183367941767739, 553887054, 552072128, '2012-02-06 18:27:05', NULL),
(183367941767739, 100002372034326, 552072128, '2012-02-06 18:27:05', NULL),
(298945586828678, 553887054, 552072128, '2012-02-06 18:27:30', NULL),
(298945586828678, 100002372034326, 552072128, '2012-02-06 18:27:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE IF NOT EXISTS `app_user` (
  `fbid` bigint(20) unsigned NOT NULL,
  `name` varchar(100) collate utf8_unicode_ci default NULL,
  `email` varchar(100) collate utf8_unicode_ci default NULL,
  `destinationId` int(11) default NULL,
  `dateEntry` datetime default NULL,
  `dateRegistered` datetime default NULL,
  PRIMARY KEY  (`fbid`),
  KEY `FK_user_destination` (`destinationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`fbid`, `name`, `email`, `destinationId`, `dateEntry`, `dateRegistered`) VALUES
(552072128, 'alfred', 'alfredtph@gmail.com', 3, '2012-02-01 14:40:48', '2012-02-01 14:40:48');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_request`
--
ALTER TABLE `app_request`
  ADD CONSTRAINT `FK_request_user` FOREIGN KEY (`fromFbid`) REFERENCES `app_user` (`fbid`) ON DELETE CASCADE;

--
-- Constraints for table `app_user`
--
ALTER TABLE `app_user`
  ADD CONSTRAINT `FK_user_destination` FOREIGN KEY (`destinationId`) REFERENCES `app_destination` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
