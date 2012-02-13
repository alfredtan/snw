-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2012 at 10:21 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ar_snw`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_answer`
--

CREATE TABLE `app_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `app_answer`
--

INSERT INTO `app_answer` (`id`, `answer`) VALUES(1, 'Koh Samui');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(2, 'Phuket');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(3, 'Bali');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(4, 'Langkawi');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(5, 'Cambodia');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(6, 'Vietnam');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(7, 'Taipei');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(8, 'Laos');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(9, 'Bangkok');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(10, 'Ho Chi Minh');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(11, 'Hong Kong');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(12, 'Jakarta');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(13, 'Manila');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(15, 'Penang');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(16, 'Singapore');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(17, 'Kuta, Indonesia');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(18, 'Sipadan Island, Sabah');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(19, 'Redang Island, Malaysia');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(20, 'Ko Pha Ngan, Thailand');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(21, 'Pristine beaches');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(22, 'Amusement/theme parks');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(23, 'Mountain climbing to the peaks');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(24, 'Unique animals like kangaroos and koalas');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(25, 'Fes, Morocco');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(26, 'Bali, Indonesia');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(27, 'Paris, France');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(28, 'Granada, Spain');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(29, 'Fiji');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(30, 'Egypt');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(31, 'Indonesia');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(32, 'China');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(33, 'Agra');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(34, 'Ahmedabad');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(35, 'Mumbai');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(36, 'Bangalore');
INSERT INTO `app_answer` (`id`, `answer`) VALUES(37, 'Paris');

-- --------------------------------------------------------

--
-- Table structure for table `app_destination`
--

CREATE TABLE `app_destination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `app_destination`
--

INSERT INTO `app_destination` (`id`, `name`) VALUES(1, 'Option 1');
INSERT INTO `app_destination` (`id`, `name`) VALUES(2, 'Option 2');
INSERT INTO `app_destination` (`id`, `name`) VALUES(3, 'Option 3');
INSERT INTO `app_destination` (`id`, `name`) VALUES(4, 'Option 4');

-- --------------------------------------------------------

--
-- Table structure for table `app_question`
--

CREATE TABLE `app_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `app_question`
--

INSERT INTO `app_question` (`id`, `question`) VALUES(1, 'Which of the following destinations is famous for surfing?');
INSERT INTO `app_question` (`id`, `question`) VALUES(2, 'Where is the location of the famous landmark, Angkor Wat?');
INSERT INTO `app_question` (`id`, `question`) VALUES(3, 'Which one of these cities is the least known for its shopping?');
INSERT INTO `app_question` (`id`, `question`) VALUES(4, 'Where is Asia’s most famous night safari?');
INSERT INTO `app_question` (`id`, `question`) VALUES(5, 'Where’s the best dive spot in Asia?');
INSERT INTO `app_question` (`id`, `question`) VALUES(6, 'These are some of Australia’s most popular tourist attractions except for?');
INSERT INTO `app_question` (`id`, `question`) VALUES(7, 'Which of these cities is known as the city of love?');
INSERT INTO `app_question` (`id`, `question`) VALUES(8, 'Which destination do travellers visit for a taste of ancient civilization and the pyramids?');
INSERT INTO `app_question` (`id`, `question`) VALUES(9, 'Which of these cities in India hosts the majestic Taj Mahal?');
INSERT INTO `app_question` (`id`, `question`) VALUES(10, 'Disneyland can be enjoyed in these destinations except for?');

-- --------------------------------------------------------

--
-- Table structure for table `app_rel_question_answer`
--

CREATE TABLE `app_rel_question_answer` (
  `questionId` int(10) NOT NULL,
  `answerId` int(10) NOT NULL,
  UNIQUE KEY `questionId` (`questionId`,`answerId`),
  KEY `FK_rel_qa_answer_id` (`answerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_rel_question_answer`
--

INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(1, 1);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(1, 2);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(1, 3);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(1, 4);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(2, 5);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(2, 6);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(2, 7);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(4, 7);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(2, 8);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(3, 9);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(3, 10);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(3, 11);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(10, 11);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(3, 12);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(4, 13);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(4, 15);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(4, 16);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(10, 16);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(5, 17);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(5, 18);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(5, 19);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(5, 20);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(6, 21);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(6, 22);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(6, 23);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(6, 24);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(7, 25);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(7, 26);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(7, 27);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(7, 28);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(8, 29);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(8, 30);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(8, 31);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(8, 32);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(9, 33);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(9, 34);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(9, 35);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(9, 36);
INSERT INTO `app_rel_question_answer` (`questionId`, `answerId`) VALUES(10, 37);

-- --------------------------------------------------------

--
-- Table structure for table `app_request`
--

CREATE TABLE `app_request` (
  `requestId` bigint(20) unsigned NOT NULL,
  `toFbid` bigint(20) unsigned NOT NULL,
  `fromFbid` bigint(20) unsigned NOT NULL,
  `requestDate` datetime NOT NULL,
  `acceptDate` datetime DEFAULT NULL,
  KEY `FK_request_user` (`fromFbid`),
  KEY `requestId` (`requestId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_request`
--

INSERT INTO `app_request` (`requestId`, `toFbid`, `fromFbid`, `requestDate`, `acceptDate`) VALUES(183367941767739, 553887054, 552072128, '2012-02-06 18:27:05', NULL);
INSERT INTO `app_request` (`requestId`, `toFbid`, `fromFbid`, `requestDate`, `acceptDate`) VALUES(183367941767739, 100002372034326, 552072128, '2012-02-06 18:27:05', NULL);
INSERT INTO `app_request` (`requestId`, `toFbid`, `fromFbid`, `requestDate`, `acceptDate`) VALUES(298945586828678, 553887054, 552072128, '2012-02-06 18:27:30', NULL);
INSERT INTO `app_request` (`requestId`, `toFbid`, `fromFbid`, `requestDate`, `acceptDate`) VALUES(298945586828678, 100002372034326, 552072128, '2012-02-06 18:27:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `fbid` bigint(20) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destinationId` int(11) DEFAULT NULL,
  `dateEntry` datetime DEFAULT NULL,
  `dateRegistered` datetime DEFAULT NULL,
  PRIMARY KEY (`fbid`),
  KEY `FK_user_destination` (`destinationId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `app_user`
--

INSERT INTO `app_user` (`fbid`, `name`, `email`, `destinationId`, `dateEntry`, `dateRegistered`) VALUES(552072128, 'alfred', 'alfredtph@gmail.com', 3, '2012-02-01 14:40:48', '2012-02-01 14:40:48');

-- --------------------------------------------------------

--
-- Table structure for table `view_question_answer`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ar_snw`.`view_question_answer` AS 

select `q`.`id` AS `questionId`,`q`.`question` AS `question`,`a`.`id` AS `answerId`,`a`.`answer` AS `answer`, `qa`.`correct` 
from (`ar_snw`.`app_answer` `a` left join (`ar_snw`.`app_rel_question_answer` `qa` left join `ar_snw`.`app_question` `q` on((`q`.`id` = `qa`.`questionId`))) on((`a`.`id` = `qa`.`answerId`))) order by `q`.`id`,`a`.`id`;

--
-- Dumping data for table `view_question_answer`
--

INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(1, 'Which of the following destinations is famous for surfing?', 1, 'Koh Samui');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(1, 'Which of the following destinations is famous for surfing?', 2, 'Phuket');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(1, 'Which of the following destinations is famous for surfing?', 3, 'Bali');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(1, 'Which of the following destinations is famous for surfing?', 4, 'Langkawi');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(2, 'Where is the location of the famous landmark, Angkor Wat?', 5, 'Cambodia');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(2, 'Where is the location of the famous landmark, Angkor Wat?', 6, 'Vietnam');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(2, 'Where is the location of the famous landmark, Angkor Wat?', 7, 'Taipei');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(2, 'Where is the location of the famous landmark, Angkor Wat?', 8, 'Laos');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(3, 'Which one of these cities is the least known for its shopping?', 9, 'Bangkok');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(3, 'Which one of these cities is the least known for its shopping?', 10, 'Ho Chi Minh');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(3, 'Which one of these cities is the least known for its shopping?', 11, 'Hong Kong');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(3, 'Which one of these cities is the least known for its shopping?', 12, 'Jakarta');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(4, 'Where is Asia’s most famous night safari?', 7, 'Taipei');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(4, 'Where is Asia’s most famous night safari?', 13, 'Manila');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(4, 'Where is Asia’s most famous night safari?', 15, 'Penang');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(4, 'Where is Asia’s most famous night safari?', 16, 'Singapore');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(5, 'Where’s the best dive spot in Asia?', 17, 'Kuta, Indonesia');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(5, 'Where’s the best dive spot in Asia?', 18, 'Sipadan Island, Sabah');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(5, 'Where’s the best dive spot in Asia?', 19, 'Redang Island, Malaysia');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(5, 'Where’s the best dive spot in Asia?', 20, 'Ko Pha Ngan, Thailand');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(6, 'These are some of Australia’s most popular tourist attractions except for?', 21, 'Pristine beaches');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(6, 'These are some of Australia’s most popular tourist attractions except for?', 22, 'Amusement/theme parks');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(6, 'These are some of Australia’s most popular tourist attractions except for?', 23, 'Mountain climbing to the peaks');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(6, 'These are some of Australia’s most popular tourist attractions except for?', 24, 'Unique animals like kangaroos and koalas');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(7, 'Which of these cities is known as the city of love?', 25, 'Fes, Morocco');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(7, 'Which of these cities is known as the city of love?', 26, 'Bali, Indonesia');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(7, 'Which of these cities is known as the city of love?', 27, 'Paris, France');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(7, 'Which of these cities is known as the city of love?', 28, 'Granada, Spain');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(8, 'Which destination do travellers visit for a taste of ancient civilization and the pyramids?', 29, 'Fiji');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(8, 'Which destination do travellers visit for a taste of ancient civilization and the pyramids?', 30, 'Egypt');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(8, 'Which destination do travellers visit for a taste of ancient civilization and the pyramids?', 31, 'Indonesia');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(8, 'Which destination do travellers visit for a taste of ancient civilization and the pyramids?', 32, 'China');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(9, 'Which of these cities in India hosts the majestic Taj Mahal?', 33, 'Agra');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(9, 'Which of these cities in India hosts the majestic Taj Mahal?', 34, 'Ahmedabad');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(9, 'Which of these cities in India hosts the majestic Taj Mahal?', 35, 'Mumbai');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(9, 'Which of these cities in India hosts the majestic Taj Mahal?', 36, 'Bangalore');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(10, 'Disneyland can be enjoyed in these destinations except for?', 11, 'Hong Kong');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(10, 'Disneyland can be enjoyed in these destinations except for?', 16, 'Singapore');
INSERT INTO `view_question_answer` (`questionId`, `question`, `answerId`, `answer`) VALUES(10, 'Disneyland can be enjoyed in these destinations except for?', 37, 'Paris');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_rel_question_answer`
--
ALTER TABLE `app_rel_question_answer`
  ADD CONSTRAINT `FK_rel_qa_answer_id` FOREIGN KEY (`answerId`) REFERENCES `app_answer` (`id`),
  ADD CONSTRAINT `FK_rel_qa_question_id` FOREIGN KEY (`questionId`) REFERENCES `app_question` (`id`);

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

  
  
  select `q`.`id` AS `questionId`,`q`.`question` AS `question`,`a`.`id` AS `answerId`,`a`.`answer` AS `answer`, `qa`.`correct` 
from (`ar_snw`.`app_answer` `a` left join (`ar_snw`.`app_rel_question_answer` `qa` left join `ar_snw`.`app_question` `q` on((`q`.`id` = `qa`.`questionId`))) on((`a`.`id` = `qa`.`answerId`))) order by `q`.`id`,`a`.`id`;