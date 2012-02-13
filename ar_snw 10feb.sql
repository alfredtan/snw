-- phpMyAdmin SQL Dump
-- version 3.4.0
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2012 at 06:14 PM
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
-- Table structure for table `app_answer`
--

CREATE TABLE IF NOT EXISTS `app_answer` (
  `id` int(11) NOT NULL auto_increment,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `app_answer`
--

INSERT INTO `app_answer` (`id`, `answer`) VALUES
(1, 'Koh Samui'),
(2, 'Phuket'),
(3, 'Bali'),
(4, 'Langkawi'),
(5, 'Cambodia'),
(6, 'Vietnam'),
(7, 'Taipei'),
(8, 'Laos'),
(9, 'Bangkok'),
(10, 'Ho Chi Minh'),
(11, 'Hong Kong'),
(12, 'Jakarta'),
(13, 'Manila'),
(15, 'Penang'),
(16, 'Singapore'),
(17, 'Kuta, Indonesia'),
(18, 'Sipadan Island, Sabah'),
(19, 'Redang Island, Malaysia'),
(20, 'Ko Pha Ngan, Thailand'),
(21, 'Pristine beaches'),
(22, 'Amusement/theme parks'),
(23, 'Mountain climbing to the peaks'),
(24, 'Unique animals like kangaroos and koalas'),
(25, 'Fes, Morocco'),
(26, 'Bali, Indonesia'),
(27, 'Paris, France'),
(28, 'Granada, Spain'),
(29, 'Fiji'),
(30, 'Egypt'),
(31, 'Indonesia'),
(32, 'China'),
(33, 'Agra'),
(34, 'Ahmedabad'),
(35, 'Mumbai'),
(36, 'Bangalore'),
(37, 'Paris');

-- --------------------------------------------------------

--
-- Table structure for table `app_options`
--

CREATE TABLE IF NOT EXISTS `app_options` (
  `name` varchar(150) collate utf8_unicode_ci NOT NULL,
  `value` varchar(150) collate utf8_unicode_ci NOT NULL,
  KEY `key` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_options`
--

INSERT INTO `app_options` (`name`, `value`) VALUES
('questionId', '1');

-- --------------------------------------------------------

--
-- Table structure for table `app_question`
--

CREATE TABLE IF NOT EXISTS `app_question` (
  `id` int(11) NOT NULL auto_increment,
  `question` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `app_question`
--

INSERT INTO `app_question` (`id`, `question`) VALUES
(1, 'Which of the following destinations is famous for surfing?'),
(2, 'Where is the location of the famous landmark, Angkor Wat?'),
(3, 'Which one of these cities is the least known for its shopping?'),
(4, 'Where is Asia’s most famous night safari?'),
(5, 'Where’s the best dive spot in Asia?'),
(6, 'These are some of Australia’s most popular tourist attractions except for?'),
(7, 'Which of these cities is known as the city of love?'),
(8, 'Which destination do travellers visit for a taste of ancient civilization and the pyramids?'),
(9, 'Which of these cities in India hosts the majestic Taj Mahal?'),
(10, 'Disneyland can be enjoyed in these destinations except for?');

-- --------------------------------------------------------

--
-- Table structure for table `app_rel_question_answer`
--

CREATE TABLE IF NOT EXISTS `app_rel_question_answer` (
  `questionId` int(10) NOT NULL,
  `answerId` int(10) NOT NULL,
  `correct` int(11) NOT NULL default '0',
  UNIQUE KEY `questionId` (`questionId`,`answerId`),
  KEY `FK_rel_qa_answer_id` (`answerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_rel_question_answer`
--

INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`, `correct`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 1),
(1, 4, 0),
(2, 5, 1),
(2, 6, 0),
(2, 7, 0),
(2, 8, 0),
(3, 9, 0),
(3, 10, 1),
(3, 11, 0),
(3, 12, 0),
(4, 7, 0),
(4, 13, 0),
(4, 15, 0),
(4, 16, 1),
(5, 17, 0),
(5, 18, 1),
(5, 19, 0),
(5, 20, 0),
(6, 21, 0),
(6, 22, 0),
(6, 23, 1),
(6, 24, 0),
(7, 25, 0),
(7, 26, 0),
(7, 27, 1),
(7, 28, 0),
(8, 29, 0),
(8, 30, 1),
(8, 31, 0),
(8, 32, 0),
(9, 33, 1),
(9, 34, 0),
(9, 35, 0),
(9, 36, 0),
(10, 11, 0),
(10, 16, 1),
(10, 37, 0);

-- --------------------------------------------------------

--
-- Table structure for table `app_rel_user_question_answer`
--

CREATE TABLE IF NOT EXISTS `app_rel_user_question_answer` (
  `fbid` bigint(20) unsigned NOT NULL,
  `questionId` int(10) NOT NULL,
  `answerId` int(10) NOT NULL,
  KEY `fbid` (`fbid`),
  KEY `FK_rel_uqa_answerId` (`answerId`),
  KEY `FK_rel_uqa_questionId` (`questionId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_rel_user_question_answer`
--

INSERT INTO `app_rel_user_question_answer` (`fbid`, `questionId`, `answerId`) VALUES
(552072128, 2, 5);

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
(275154229216678, 100003586987625, 552072128, '2012-02-09 15:51:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_snap_attempts`
--

CREATE TABLE IF NOT EXISTS `app_snap_attempts` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `fbid` bigint(20) unsigned NOT NULL,
  `picture1` varchar(250) collate utf8_unicode_ci default NULL,
  `picture2` varchar(250) collate utf8_unicode_ci default NULL,
  `picture3` varchar(250) collate utf8_unicode_ci default NULL,
  `picture4` varchar(250) collate utf8_unicode_ci default NULL,
  `attemptDate` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE IF NOT EXISTS `app_user` (
  `fbid` bigint(20) unsigned NOT NULL,
  `name` varchar(100) collate utf8_unicode_ci default NULL,
  `email` varchar(100) collate utf8_unicode_ci default NULL,
  `dateEntry` datetime default NULL,
  `dateRegistered` datetime default NULL,
  PRIMARY KEY  (`fbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`fbid`, `name`, `email`, `dateEntry`, `dateRegistered`) VALUES
(552072128, 'woo hoo', 'mw_alfred@yahoo.com', '2012-02-10 17:32:10', '2012-02-10 17:32:10'),
(553887054, 'alfredtph', 'alfredtph@gmail.com', '2012-02-08 17:16:10', '2012-02-08 17:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `app_user_friend`
--

CREATE TABLE IF NOT EXISTS `app_user_friend` (
  `fbid` bigint(20) unsigned NOT NULL,
  `friendFbid` bigint(20) unsigned NOT NULL,
  `friendDate` datetime NOT NULL,
  KEY `fbid` (`fbid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `app_week_settings`
--

CREATE TABLE IF NOT EXISTS `app_week_settings` (
  `week` int(11) NOT NULL,
  `winning_snap` int(100) NOT NULL,
  `startDate` datetime NOT NULL,
  `stopDate` datetime NOT NULL,
  PRIMARY KEY  (`week`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_week_settings`
--

INSERT INTO `app_week_settings` (`week`, `winning_snap`, `startDate`, `stopDate`) VALUES
(1, 100, '2012-02-06 00:00:00', '2012-02-11 23:59:59');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_question_answer`
--
CREATE TABLE IF NOT EXISTS `view_question_answer` (
`questionId` int(11)
,`question` varchar(250)
,`answerId` int(11)
,`answer` varchar(100)
,`correct` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `yiisession`
--

CREATE TABLE IF NOT EXISTS `yiisession` (
  `id` char(32) collate utf8_unicode_ci NOT NULL,
  `expire` int(11) default NULL,
  `data` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `yiisession`
--

INSERT INTO `yiisession` (`id`, `expire`, `data`) VALUES
('12ldndg468cl2b8gtsrr0lso54', 1328863646, 'gii__returnUrl|s:32:"/snw/index.php/gii/default/index";'),
('39nvlglf9m1kjk6f4i72jul003', 1328862974, 'gii__returnUrl|s:34:"/snw/index.php/fanpage/index?r=gii";'),
('64hdq2spdpf5iujp03481k79e1', 1328863645, ''),
('gnflgj0hm64uevu6marjl72797', 1328779939, 'time|i:1328778499;questionId|i:10;'),
('irnf7g8tlte35b11i1nkdie6h3', 1328867771, 'time|i:1328866331;fb_211113102317615_user_id|s:9:"552072128";'),
('ji4a4tnije4fcnbb1gvmd577s4', 1328868898, 'gii__returnUrl|s:34:"/snw/index.php/fanpage/index?r=gii";gii__id|s:5:"yiier";gii__name|s:5:"yiier";gii__states|a:0:{}'),
('rgckbm2853vo76gehj5lv90ji5', 1328868873, 'gii__returnUrl|s:34:"/snw/index.php/fanpage/index?r=gii";'),
('skk4rkptp6qbj55d0qdts6lsb6', 1328863645, 'time|i:1328862205;'),
('udj3bpmlg6b6ug29itr6gd8546', 1328863646, 'time|i:1328862205;'),
('v7rrgaigh2gja2qirsodarsv65', 1328863646, 'gii__returnUrl|s:24:"/snw/index.php/gii/model";');

-- --------------------------------------------------------

--
-- Structure for view `view_question_answer`
--
DROP TABLE IF EXISTS `view_question_answer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_question_answer` AS select `q`.`id` AS `questionId`,`q`.`question` AS `question`,`a`.`id` AS `answerId`,`a`.`answer` AS `answer`,`qa`.`correct` AS `correct` from (`app_answer` `a` left join (`app_rel_question_answer` `qa` left join `app_question` `q` on((`q`.`id` = `qa`.`questionId`))) on((`a`.`id` = `qa`.`answerId`))) order by `q`.`id`,`a`.`id`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_rel_user_question_answer`
--
ALTER TABLE `app_rel_user_question_answer`
  ADD CONSTRAINT `FK_qId` FOREIGN KEY (`questionId`) REFERENCES `app_question` (`id`),
  ADD CONSTRAINT `FK_rel_uqa_answerId` FOREIGN KEY (`answerId`) REFERENCES `app_answer` (`id`),
  ADD CONSTRAINT `FK_rel_uqa_fbid` FOREIGN KEY (`fbid`) REFERENCES `app_user` (`fbid`),
  ADD CONSTRAINT `FK_uqa_fbid` FOREIGN KEY (`fbid`) REFERENCES `app_user` (`fbid`);

--
-- Constraints for table `app_user_friend`
--
ALTER TABLE `app_user_friend`
  ADD CONSTRAINT `fk_userfriend_fbid` FOREIGN KEY (`fbid`) REFERENCES `app_user` (`fbid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
