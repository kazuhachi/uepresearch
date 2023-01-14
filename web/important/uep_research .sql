-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2020 at 02:46 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uep_research`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `AuthorId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `FName` varchar(45) DEFAULT NULL,
  `MName` varchar(45) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  `ContactNum` varchar(45) DEFAULT NULL,
  `EmailAdd` varchar(100) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `College` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`AuthorId`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`AuthorId`, `FName`, `MName`, `LName`, `ContactNum`, `EmailAdd`, `Address`, `College`) VALUES
(00000000013, 'Mark Vincent', 'Vega', 'Gonzaga', '09258882662', 'mark@gmail.com', 'Makati City', 'College of science'),
(00000000014, 'Dimple', 'Regulacion', 'Balleta', '09775525552', 'dimple@gmail.com', 'Makati City', 'College of science'),
(00000000015, 'Jonathan', 'Diaz', 'Alegre', '09742554552', 'jona@gmails.com', 'Allen, Northern Samar', 'College of science'),
(00000000016, 'Kevyn', '', 'Bogtong', '09776636545', 'kev@gmail.com', 'Allen', 'College of science'),
(00000000017, 'John ', '', 'Cena', '09776642322', 'johncene@wwe.com', '', 'College of education'),
(00000000018, 'The', '', 'Rock', '09725213442', 'rock@wwe.com', 'U.S.A.', 'College of business administration'),
(00000000019, 'Kobe', '', 'Bryant', '09548827743', 'kobe@nba.com', 'Los angeles', 'College of arts and literature'),
(00000000020, 'Sana', '', 'Minatozaki', '09351465777', 'sana@twiceonce.com', 'Kyoto, Japan', 'College of science'),
(00000000022, 'Jack', 'O.', 'Sparrow', '09764552234', 'pirates@noisland.com', '', 'College of arts and literature'),
(00000000023, 'Under', '', 'Taker', '09776653533', 'smackdown@wwe.com', 'Somewhere', 'College of agriculture'),
(00000000042, 'Luca', '', 'Da Cat', '09775553222', 'cattoluka@gmail.com', 'Makati City', 'College of veterenary medicine'),
(00000000043, 'James', '', 'Bond', '09777663663', '007@agent.com', '', 'College of business administration'),
(00000000044, 'Mark', '', 'Zuckerberg', '09773555353', 'markz@facebook.com', '', 'College of science'),
(00000000045, 'John', '', 'Snow', '09876626663', 'snow@got.com', '', 'College of law'),
(00000000046, 'Ash', '', 'Ketchum', '09764666262', 'pika@chu.com', '', 'College of business administration'),
(00000000047, 'Steve', '', 'Jobs', '09773676262', 'steve@apple.com', '', 'College of business administration'),
(00000000048, 'Steven', '', 'Seagull', '09886636622', 'steve@movie.com', '', 'College of arts and literature'),
(00000000049, 'Felix', '', 'Pewdiepie', '0987367763', 'pewds@youtube.com', '', 'College of arts and literature'),
(00000000050, 'Marzia', '', 'Kjellberd', '09887466222', 'marzia@youtube.com', 'England and Tokyo', 'College of arts and literature'),
(00000000051, 'James', '', 'Cameron', '09773662233', 'James@net.com', '', 'College of science'),
(00000000052, 'Jason', '', 'Statamsss', '09774662626', 'statum@gmail.com', 'India', 'College of science'),
(00000000053, 'Jason', '', 'Ingrams', '09774662626', 'mango@grahams.food', '', 'College of arts and literature'),
(00000000054, 'May', '', 'Manlow', '99772661233', '', 'Brgy. Bunuanan', 'College of agriculture');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
CREATE TABLE IF NOT EXISTS `colleges` (
  `CollegesId` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `CollegeName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CollegesId`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`CollegesId`, `CollegeName`) VALUES
(000001, 'College of science'),
(000002, 'College of nursing'),
(000003, 'College of veterenary medicine'),
(000004, 'College of law'),
(000005, 'College of education'),
(000006, 'College of arts and literature'),
(000007, 'College of business administration'),
(000008, 'College of engineering'),
(000009, 'College of agriculture'),
(000010, 'College of computer science'),
(000011, 'College of computer sciencess');

-- --------------------------------------------------------

--
-- Table structure for table `funding`
--

DROP TABLE IF EXISTS `funding`;
CREATE TABLE IF NOT EXISTS `funding` (
  `FundingId` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Agency` varchar(45) DEFAULT NULL,
  `ContactNum` varchar(45) DEFAULT NULL,
  `EmailAdd` varchar(100) DEFAULT NULL,
  `Website` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`FundingId`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `funding`
--

INSERT INTO `funding` (`FundingId`, `Agency`, `ContactNum`, `EmailAdd`, `Website`) VALUES
(000001, 'SELF-FUND', NULL, NULL, NULL),
(000002, 'CHED', NULL, NULL, NULL),
(000003, 'DOST', NULL, NULL, NULL),
(000004, 'PAGASA', NULL, NULL, NULL),
(000005, 'LGU', NULL, NULL, NULL),
(000021, 'ML', NULL, NULL, NULL),
(000022, 'COC', NULL, NULL, NULL),
(000023, 'JRD', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

DROP TABLE IF EXISTS `keywords`;
CREATE TABLE IF NOT EXISTS `keywords` (
  `KeywordId` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`KeywordId`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`KeywordId`, `Name`) VALUES
(000008, 'Technology'),
(000002, 'Web'),
(000005, 'Agriculture'),
(000007, 'Plant'),
(000009, 'Biology'),
(000010, 'Environment'),
(000011, 'Youtube'),
(000012, 'Research'),
(000013, 'Lifestyle'),
(000014, 'Earth'),
(000015, 'Computer'),
(000016, 'programming');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `MessagesId` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Messenger` varchar(50) DEFAULT NULL,
  `message` varchar(2000) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MessagesId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

DROP TABLE IF EXISTS `research`;
CREATE TABLE IF NOT EXISTS `research` (
  `ResearchId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Title` varchar(1000) NOT NULL,
  `Campus` varchar(45) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `DateStarted` date DEFAULT NULL,
  `DateCompleted` date DEFAULT NULL,
  PRIMARY KEY (`ResearchId`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`ResearchId`, `Title`, `Campus`, `Status`, `DateStarted`, `DateCompleted`) VALUES
(00000000001, 'Lorem Ipsum is also known as: Greeked text, blind text, placeholder text, dummy content, filler text, lipsum, and mock-content\n', 'UEP', 'New', '2020-08-01', NULL),
(00000000002, 'Lorem Ipsum is also known as: Greeked text, blind text, placeholder text, dummy content, filler text, lipsum, and mock-content', 'UEP', 'New', '2020-08-11', NULL),
(00000000003, 'Exception::getLine â€” Gets the line in which the exception was created', 'UEP', 'New', '2020-08-10', NULL),
(00000000004, 'Exception::getLine â€” Gets the line in which the exception was created', 'UEP', 'New', '2020-07-28', NULL),
(00000000005, 'eException::getLine â€” Gets the line in which the exception was created', 'UEP', 'New', '2020-07-28', NULL),
(00000000006, 'a', 'UEP', 'New', '2020-08-04', NULL),
(00000000007, 's', 'UEP', 'New', '2020-07-30', NULL),
(00000000008, 's', 'UEP', 'New', '2020-07-29', NULL),
(00000000009, 'sd', 'UEP', 'New', '2020-08-08', NULL),
(00000000010, 'asdasd', 'UEP', 'New', '2020-07-30', NULL),
(00000000011, 'sd', 'UEP', 'New', '2020-08-07', NULL),
(00000000012, 'asdasd', 'UEP', 'New', '2020-08-05', NULL),
(00000000013, 'asdasdasdasd', 'UEP', 'New', '2020-08-05', NULL),
(00000000014, 'asd', 'UEP', 'New', '2020-07-31', NULL),
(00000000015, 'asdasd', 'UEP', 'New', '2020-07-30', NULL),
(00000000016, 'asdasd', 'UEP', 'New', '2020-07-30', NULL),
(00000000017, 'asd', 'UEP', 'New', '2020-07-30', NULL),
(00000000018, 'asdasd', 'UEP', 'New', '2020-07-30', NULL),
(00000000019, 'asdads', 'UEP', 'New', '2020-07-30', NULL),
(00000000020, 'asdasd', 'UEP', 'New', '2020-07-30', NULL),
(00000000021, 'asd', 'UEP', 'New', '2020-08-07', NULL),
(00000000022, 'asdasd', 'UEP', 'New', '2020-08-07', NULL),
(00000000023, 'asd', 'UEP', 'New', '2020-07-28', NULL),
(00000000024, 'asasd', 'UEP', 'New', '2020-07-29', NULL),
(00000000025, 'asdadad', 'UEP', 'New', '2020-07-30', NULL),
(00000000026, 'ssdsd', 'UEP', 'New', '2020-07-30', NULL),
(00000000027, 'asdasd', 'UEP', 'New', '2020-08-06', NULL),
(00000000028, 'asdasdaProin lectus cras montes lobortis non eros, venenatis lectus dolor id id elit, in consequat hendrerit porta ipsum placerat, vestibulum blandit mauris in quam. Ultrices fusce est vel, pretium praesent rhoncus metus in, condimentum nec eget molestie diam, magna rutrum.', 'UEP', 'New', '2020-07-31', NULL),
(00000000029, 'TItlee', 'UEP', 'New', '2020-07-30', NULL),
(00000000030, 'TIITITITITIITIT', 'UEP', 'New', '2020-08-06', NULL),
(00000000031, 'Lorem Ipsum is also known as: Greeked text, blind text, placeholder text, dummy content, filler text, lipsum, and mock-content', 'UEP', 'On going', '2020-07-14', NULL),
(00000000032, 'code is life', 'UEP', 'New', '2020-07-30', NULL),
(00000000033, 'Bubble Gang: Back to school na naman!', 'UEP', 'New', '2020-07-31', NULL),
(00000000034, 'asdasd', 'UEP', 'New', '2020-08-05', NULL),
(00000000035, 'codes is _______.\"/ada/', 'UEP', 'New', '2020-07-29', NULL),
(00000000036, 'a', 'UEP', 'New', '2020-08-05', NULL),
(00000000037, 'asdas', 'UEP', 'New', '2020-08-05', NULL),
(00000000038, 'asdasd', 'UEP', 'New', '2020-07-28', NULL),
(00000000039, 'Ultrices fusce est vel, pretium praesent rhoncus metus in, condimentum nec eget molestie diam, magna rutrum.', 'UEP', 'New', '2020-08-05', NULL),
(00000000040, 'Session variables solve this problem by storing user information to be used across multiple pages (e.g. username, favorite color, etc). By default, session variables last until the user closes the browser.', 'UEP', 'New', '2020-08-04', NULL),
(00000000041, 'asdasdasdasdsad', 'UEP', 'New', '2020-08-12', NULL),
(00000000042, 'new title', 'UEP', 'Finished', '2020-07-29', '2020-07-30'),
(00000000043, 'asdasd', 'UEP', 'New', '2020-08-19', NULL),
(00000000044, 'Invention of Wii the bestselling console on the market. ', 'UEP', 'New', '1111-01-01', NULL),
(00000000045, 'ã€MV Fullã€‘Koisuru Fortune Cookie à¸„à¸¸à¸à¸à¸µà¹‰à¹€à¸ªà¸µà¹ˆà¸¢à¸‡à¸—à¸²à¸¢ / BNK48', 'Lao-ang', 'Finished', '2020-08-20', '2020-08-03'),
(00000000046, 'Mr Beast Made Someone Lose 800000 Because of Me', 'UEP', 'Finished', '2014-06-10', '2017-07-17'),
(00000000047, 'Web-Based Research Clearing House System in UEP', 'UEP', 'Finished', '2017-11-07', '2018-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `researchabstract`
--

DROP TABLE IF EXISTS `researchabstract`;
CREATE TABLE IF NOT EXISTS `researchabstract` (
  `AbstractId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `ResearchId` int(11) UNSIGNED ZEROFILL NOT NULL,
  `Text` longtext NOT NULL,
  PRIMARY KEY (`AbstractId`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researchabstract`
--

INSERT INTO `researchabstract` (`AbstractId`, `ResearchId`, `Text`) VALUES
(00000000002, 00000000004, 'Lorem ipsum dolor sit amet, ante ut rhoncus adipiscing nunc, consequat non sit semper, iusto justo tincidunt at id varius interdum. Wisi nec, aenean mollis cursus wisi ante tempor eu, nec dui consectetuer in, velit metus. Quis et, donec scelerisque, volutpat urna ut quam adipiscing, tristique ut ac quis tellus donec. Massa nec tempus, eleifend vitae sodales at ultrices etiam elementum. Nunc cras aliquam vestibulum dolor sapien, integer quisque id non. Ad tincidunt odio ante amet, wisi purus tempor, viverra tortor et. Tempus quis wisi, urna pellentesque nec amet sit, a sagittis ac id aliquet, dignissim rutrum nulla urna venenatis. Suspendisse arcu id in in feugiat, mauris curabitur dui pede pellentesque etiam aliquam, id neque faucibus quam eu arcu ut.\n\nJusto nec mollis tristique cillum accusamus morbi, magna commodo blandit vel pharetra, netus arcu montes pretium. Bibendum sem, varius risus tristique ullamco porttitor, nulla quis nibh quis. Leo dui nunc quis blandit ligula sodales. Enim et nisl laoreet mattis a sem, eu felis nibh morbi sodales, quisque eros. Blandit sodales pulvinar habitant, velit amet adipiscing maecenas erat donec netus, ipsum sodales diam enim nulla velit maecenas. Sit mauris pede volutpat et hymenaeos, non urna, amet senectus pellentesque fermentum natoque fusce ante, nullam minima scelerisque sed montes augue, quisque ullamcorper est amet. Lorem ante pretium, tempus ipsum elementum purus vel eu. Habitasse diam, cum consectetuer vitae, penatibus vestibulum eu malesuada dui ipsum donec, elementum mauris litora ut rutrum in leo.\n\nLobortis et eleifend orci, amet quis laoreet mauris etiam, sed elit, convallis justo condimentum sapien eros rhoncus, eu molestie velit vitae. In nam elit orci leo tincidunt, nunc et iaculis libero sociosqu venenatis vestibulum, pellentesque neque morbi tristique tortor. Justo at habitant ut et, elit tempus nulla mauris sed anim, bibendum tellus malesuada sapien wisi blandit, dictumst mauris ligula, mauris tellus wisi eu aliquet praesent nunc. Vestibulum integer tellus, et pede proin sapiente, sodales odio lorem ac orci duis fusce. Vitae facilisis erat amet placerat, euismod suspendisse maecenas rutrum in.\n\nDonec elit nam aenean ut ut, fusce elit integer dignissim mattis eget quam, aenean magna massa elit nulla molestie, purus blandit dolor erat. Quis mi risus placerat a fermentum eget, sed potenti suspendisse at ante tristique, taciti dictum sollicitudin voluptatum tellus quam proin. Eros quis non viverra, mauris duis nec lacinia a, habitant volutpat aliquet quam, in ante, commodo nisl non. Imperdiet posuere, pede vivamus lacus aenean gravida, ut imperdiet lacus et vel non, cras sit, tristique aliquam iaculis cursus purus. A tincidunt augue, lectus nonummy turpis, blandit eget vel aenean vivamus, aliquam cras nunc magna. Morbi odio tellus fringilla orci ac ut, ut justo, in placeat consectetuer molestie in, in diam sit vivamus commodo, nunc hendrerit nunc aliquam nisl. Eget quisque at mauris dignissim eum, risus etiam sit suspendisse gravida. Praesentium sociis dapibus et tempus volutpat. Sed rutrum feugiat etiam pulvinar. Duis amet venenatis. Lorem sem mauris, quis amet suspendisse massa euismod enim nullam, molestias pretium mi praesent, in vel in suspendisse a libero.\n\n'),
(00000000003, 00000000005, 'Lorem ipsum dolor sit amet, ante ut rhoncus adipiscing nunc, consequat non sit semper, iusto justo tincidunt at id varius interdum. Wisi nec, aenean mollis cursus wisi ante tempor eu, nec dui consectetuer in, velit metus. Quis et, donec scelerisque, volutpat urna ut quam adipiscing, tristique ut ac quis tellus donec. Massa nec tempus, eleifend vitae sodales at ultrices etiam elementum. Nunc cras aliquam vestibulum dolor sapien, integer quisque id non. Ad tincidunt odio ante amet, wisi purus tempor, viverra tortor et. Tempus quis wisi, urna pellentesque nec amet sit, a sagittis ac id aliquet, dignissim rutrum nulla urna venenatis. Suspendisse arcu id in in feugiat, mauris curabitur dui pede pellentesque etiam aliquam, id neque faucibus quam eu arcu ut.\n\nJusto nec mollis tristique cillum accusamus morbi, magna commodo blandit vel pharetra, netus arcu montes pretium. Bibendum sem, varius risus tristique ullamco porttitor, nulla quis nibh quis. Leo dui nunc quis blandit ligula sodales. Enim et nisl laoreet mattis a sem, eu felis nibh morbi sodales, quisque eros. Blandit sodales pulvinar habitant, velit amet adipiscing maecenas erat donec netus, ipsum sodales diam enim nulla velit maecenas. Sit mauris pede volutpat et hymenaeos, non urna, amet senectus pellentesque fermentum natoque fusce ante, nullam minima scelerisque sed montes augue, quisque ullamcorper est amet. Lorem ante pretium, tempus ipsum elementum purus vel eu. Habitasse diam, cum consectetuer vitae, penatibus vestibulum eu malesuada dui ipsum donec, elementum mauris litora ut rutrum in leo.\n\nLobortis et eleifend orci, amet quis laoreet mauris etiam, sed elit, convallis justo condimentum sapien eros rhoncus, eu molestie velit vitae. In nam elit orci leo tincidunt, nunc et iaculis libero sociosqu venenatis vestibulum, pellentesque neque morbi tristique tortor. Justo at habitant ut et, elit tempus nulla mauris sed anim, bibendum tellus malesuada sapien wisi blandit, dictumst mauris ligula, mauris tellus wisi eu aliquet praesent nunc. Vestibulum integer tellus, et pede proin sapiente, sodales odio lorem ac orci duis fusce. Vitae facilisis erat amet placerat, euismod suspendisse maecenas rutrum in.\n\nDonec elit nam aenean ut ut, fusce elit integer dignissim mattis eget quam, aenean magna massa elit nulla molestie, purus blandit dolor erat. Quis mi risus placerat a fermentum eget, sed potenti suspendisse at ante tristique, taciti dictum sollicitudin voluptatum tellus quam proin. Eros quis non viverra, mauris duis nec lacinia a, habitant volutpat aliquet quam, in ante, commodo nisl non. Imperdiet posuere, pede vivamus lacus aenean gravida, ut imperdiet lacus et vel non, cras sit, tristique aliquam iaculis cursus purus. A tincidunt augue, lectus nonummy turpis, blandit eget vel aenean vivamus, aliquam cras nunc magna. Morbi odio tellus fringilla orci ac ut, ut justo, in placeat consectetuer molestie in, in diam sit vivamus commodo, nunc hendrerit nunc aliquam nisl. Eget quisque at mauris dignissim eum, risus etiam sit suspendisse gravida. Praesentium sociis dapibus et tempus volutpat. Sed rutrum feugiat etiam pulvinar. Duis amet venenatis. Lorem sem mauris, quis amet suspendisse massa euismod enim nullam, molestias pretium mi praesent, in vel in suspendisse a libero.\n\n'),
(00000000004, 00000000006, 'sss'),
(00000000005, 00000000007, 's'),
(00000000006, 00000000008, 's'),
(00000000007, 00000000009, 'sd'),
(00000000008, 00000000010, 'asdasd'),
(00000000009, 00000000011, ' sdsd'),
(00000000010, 00000000012, 'asdasd'),
(00000000011, 00000000013, 'asdasd'),
(00000000012, 00000000014, 'asdasd'),
(00000000013, 00000000015, 'asdasd'),
(00000000014, 00000000016, 'asdasd'),
(00000000015, 00000000017, 'asd'),
(00000000016, 00000000018, 'asd'),
(00000000017, 00000000019, 'Lorem ipsum dolor sit amet, ante ut rhoncus adipiscing nunc, consequat non sit semper, iusto justo tincidunt at id varius interdum. Wisi nec, aenean mollis cursus wisi ante tempor eu, nec dui consectetuer in, velit metus. Quis et, donec scelerisque, volutpat urna ut quam adipiscing, tristique ut ac quis tellus donec. Massa nec tempus, eleifend vitae sodales at ultrices etiam elementum. Nunc cras aliquam vestibulum dolor sapien, integer quisque id non. Ad tincidunt odio ante amet, wisi purus tempor, viverra tortor et. Tempus quis wisi, urna pellentesque nec amet sit, a sagittis ac id aliquet, dignissim rutrum nulla urna venenatis. Suspendisse arcu id in in feugiat, mauris curabitur dui pede pellentesque etiam aliquam, id neque faucibus quam eu arcu ut.\n\nJusto nec mollis tristique cillum accusamus morbi, magna commodo blandit vel pharetra, netus arcu montes pretium. Bibendum sem, varius risus tristique ullamco porttitor, nulla quis nibh quis. Leo dui nunc quis blandit ligula sodales. Enim et nisl laoreet mattis a sem, eu felis nibh morbi sodales, quisque eros. Blandit sodales pulvinar habitant, velit amet adipiscing maecenas erat donec netus, ipsum sodales diam enim nulla velit maecenas. Sit mauris pede volutpat et hymenaeos, non urna, amet senectus pellentesque fermentum natoque fusce ante, nullam minima scelerisque sed montes augue, quisque ullamcorper est amet. Lorem ante pretium, tempus ipsum elementum purus vel eu. Habitasse diam, cum consectetuer vitae, penatibus vestibulum eu malesuada dui ipsum donec, elementum mauris litora ut rutrum in leo.\n\nLobortis et eleifend orci, amet quis laoreet mauris etiam, sed elit, convallis justo condimentum sapien eros rhoncus, eu molestie velit vitae. In nam elit orci leo tincidunt, nunc et iaculis libero sociosqu venenatis vestibulum, pellentesque neque morbi tristique tortor. Justo at habitant ut et, elit tempus nulla mauris sed anim, bibendum tellus malesuada sapien wisi blandit, dictumst mauris ligula, mauris tellus wisi eu aliquet praesent nunc. Vestibulum integer tellus, et pede proin sapiente, sodales odio lorem ac orci duis fusce. Vitae facilisis erat amet placerat, euismod suspendisse maecenas rutrum in.\n\nDonec elit nam aenean ut ut, fusce elit integer dignissim mattis eget quam, aenean magna massa elit nulla molestie, purus blandit dolor erat. Quis mi risus placerat a fermentum eget, sed potenti suspendisse at ante tristique, taciti dictum sollicitudin voluptatum tellus quam proin. Eros quis non viverra, mauris duis nec lacinia a, habitant volutpat aliquet quam, in ante, commodo nisl non. Imperdiet posuere, pede vivamus lacus aenean gravida, ut imperdiet lacus et vel non, cras sit, tristique aliquam iaculis cursus purus. A tincidunt augue, lectus nonummy turpis, blandit eget vel aenean vivamus, aliquam cras nunc magna. Morbi odio tellus fringilla orci ac ut, ut justo, in placeat consectetuer molestie in, in diam sit vivamus commodo, nunc hendrerit nunc aliquam nisl. Eget quisque at mauris dignissim eum, risus etiam sit suspendisse gravida. Praesentium sociis dapibus et tempus volutpat. Sed rutrum feugiat etiam pulvinar. Duis amet venenatis. Lorem sem mauris, quis amet suspendisse massa euismod enim nullam, molestias pretium mi praesent, in vel in suspendisse a libero.\n\n'),
(00000000018, 00000000020, 'asdasd'),
(00000000019, 00000000021, 'asd'),
(00000000020, 00000000022, 'asdad'),
(00000000021, 00000000023, 'asd'),
(00000000022, 00000000024, 'asdasd'),
(00000000023, 00000000025, 'Lorem ipsum dolor sit amet, ante ut rhoncus adipiscing nunc, consequat non sit semper, iusto justo tincidunt at id varius interdum. Wisi nec, aenean mollis cursus wisi ante tempor eu, nec dui consectetuer in, velit metus. Quis et, donec scelerisque, volutpat urna ut quam adipiscing, tristique ut ac quis tellus donec. Massa nec tempus, eleifend vitae sodales at ultrices etiam elementum. Nunc cras aliquam vestibulum dolor sapien, integer quisque id non. Ad tincidunt odio ante amet, wisi purus tempor, viverra tortor et. Tempus quis wisi, urna pellentesque nec amet sit, a sagittis ac id aliquet, dignissim rutrum nulla urna venenatis. Suspendisse arcu id in in feugiat, mauris curabitur dui pede pellentesque etiam aliquam, id neque faucibus quam eu arcu ut.\n\nJusto nec mollis tristique cillum accusamus morbi, magna commodo blandit vel pharetra, netus arcu montes pretium. Bibendum sem, varius risus tristique ullamco porttitor, nulla quis nibh quis. Leo dui nunc quis blandit ligula sodales. Enim et nisl laoreet mattis a sem, eu felis nibh morbi sodales, quisque eros. Blandit sodales pulvinar habitant, velit amet adipiscing maecenas erat donec netus, ipsum sodales diam enim nulla velit maecenas. Sit mauris pede volutpat et hymenaeos, non urna, amet senectus pellentesque fermentum natoque fusce ante, nullam minima scelerisque sed montes augue, quisque ullamcorper est amet. Lorem ante pretium, tempus ipsum elementum purus vel eu. Habitasse diam, cum consectetuer vitae, penatibus vestibulum eu malesuada dui ipsum donec, elementum mauris litora ut rutrum in leo.\n\nLobortis et eleifend orci, amet quis laoreet mauris etiam, sed elit, convallis justo condimentum sapien eros rhoncus, eu molestie velit vitae. In nam elit orci leo tincidunt, nunc et iaculis libero sociosqu venenatis vestibulum, pellentesque neque morbi tristique tortor. Justo at habitant ut et, elit tempus nulla mauris sed anim, bibendum tellus malesuada sapien wisi blandit, dictumst mauris ligula, mauris tellus wisi eu aliquet praesent nunc. Vestibulum integer tellus, et pede proin sapiente, sodales odio lorem ac orci duis fusce. Vitae facilisis erat amet placerat, euismod suspendisse maecenas rutrum in.\n\nDonec elit nam aenean ut ut, fusce elit integer dignissim mattis eget quam, aenean magna massa elit nulla molestie, purus blandit dolor erat. Quis mi risus placerat a fermentum eget, sed potenti suspendisse at ante tristique, taciti dictum sollicitudin voluptatum tellus quam proin. Eros quis non viverra, mauris duis nec lacinia a, habitant volutpat aliquet quam, in ante, commodo nisl non. Imperdiet posuere, pede vivamus lacus aenean gravida, ut imperdiet lacus et vel non, cras sit, tristique aliquam iaculis cursus purus. A tincidunt augue, lectus nonummy turpis, blandit eget vel aenean vivamus, aliquam cras nunc magna. Morbi odio tellus fringilla orci ac ut, ut justo, in placeat consectetuer molestie in, in diam sit vivamus commodo, nunc hendrerit nunc aliquam nisl. Eget quisque at mauris dignissim eum, risus etiam sit suspendisse gravida. Praesentium sociis dapibus et tempus volutpat. Sed rutrum feugiat etiam pulvinar. Duis amet venenatis. Lorem sem mauris, quis amet suspendisse massa euismod enim nullam, molestias pretium mi praesent, in vel in suspendisse a libero.\n\n'),
(00000000024, 00000000026, 'Lorem ipsum dolor sit amet, ante ut rhoncus adipiscing nunc, consequat non sit semper, iusto justo tincidunt at id varius interdum. Wisi nec, aenean mollis cursus wisi ante tempor eu, nec dui consectetuer in, velit metus. Quis et, donec scelerisque, volutpat urna ut quam adipiscing, tristique ut ac quis tellus donec. Massa nec tempus, eleifend vitae sodales at ultrices etiam elementum. Nunc cras aliquam vestibulum dolor sapien, integer quisque id non. Ad tincidunt odio ante amet, wisi purus tempor, viverra tortor et. Tempus quis wisi, urna pellentesque nec amet sit, a sagittis ac id aliquet, dignissim rutrum nulla urna venenatis. Suspendisse arcu id in in feugiat, mauris curabitur dui pede pellentesque etiam aliquam, id neque faucibus quam eu arcu ut.Justo nec mollis tristique cillum accusamus morbi, magna commodo blandit vel pharetra, netus arcu montes pretium. Bibendum sem, varius risus tristique ullamco porttitor, nulla quis nibh quis. Leo dui nunc quis blandit ligula sodales. Enim et nisl laoreet mattis a sem, eu felis nibh morbi sodales, quisque eros. Blandit sodales pulvinar habitant, velit amet adipiscing maecenas erat donec netus, ipsum sodales diam enim nulla velit maecenas. Sit mauris pede volutpat et hymenaeos, non urna, amet senectus pellentesque fermentum natoque fusce ante, nullam minima scelerisque sed montes augue, quisque ullamcorper est amet. Lorem ante pretium, tempus ipsum elementum purus vel eu. Habitasse diam, cum consectetuer vitae, penatibus vestibulum eu malesuada dui ipsum donec, elementum mauris litora ut rutrum in leo.'),
(00000000025, 00000000027, 'Lorem ipsum dolor sit amet, ante ut rhoncus adipiscing nunc, consequat non sit semper, iusto justo tincidunt at id varius interdum. Wisi nec, aenean mollis cursus wisi ante tempor eu, nec dui consectetuer in, velit metus. Quis et, donec scelerisque, volutpat urna ut quam adipiscing, tristique ut ac quis tellus donec. Massa nec tempus, eleifend vitae sodales at ultrices etiam elementum. Nunc cras aliquam vestibulum dolor sapien, integer quisque id non. Ad tincidunt odio ante amet, wisi purus tempor, viverra tortor et. Tempus quis wisi, urna pellentesque nec amet sit, a sagittis ac id aliquet, dignissim rutrum nulla urna venenatis. Suspendisse arcu id in in feugiat, mauris curabitur dui pede pellentesque etiam aliquam, id neque faucibus quam eu arcu ut.<br /><br />Justo nec mollis tristique cillum accusamus morbi, magna commodo blandit vel pharetra, netus arcu montes pretium. Bibendum sem, varius risus tristique ullamco porttitor, nulla quis nibh quis. Leo dui nunc quis blandit ligula sodales. Enim et nisl laoreet mattis a sem, eu felis nibh morbi sodales, quisque eros. Blandit sodales pulvinar habitant, velit amet adipiscing maecenas erat donec netus, ipsum sodales diam enim nulla velit maecenas. Sit mauris pede volutpat et hymenaeos, non urna, amet senectus pellentesque fermentum natoque fusce ante, nullam minima scelerisque sed montes augue, quisque ullamcorper est amet. Lorem ante pretium, tempus ipsum elementum purus vel eu. Habitasse diam, cum consectetuer vitae, penatibus vestibulum eu malesuada dui ipsum donec, elementum mauris litora ut rutrum in leo.'),
(00000000026, 00000000028, 'Lorem ipsum dolor sit amet, id convallis, pellentesque lobortis vulputate eu tempus nulla, ligula ut justo. A aliquam tellus, at ut sed vulputate risus, nulla non taciti, ut blandit. Dui mauris pellentesque. Ut scelerisque eget mauris, rutrum pretium et, ligula magna platea ut, at tempor, lacus sit et at nec vestibulum ut. Nam lobortis amet in molestie blandit, pellentesque mi et, nibh felis elit faucibus at gravida, hac amet id fringilla ac tristique. Consectetuer etiam imperdiet nulla justo sed orci, mattis in massa, velit laoreet. Aliquam sodales, sodales mattis iaculis donec tempor. Proin lectus cras montes lobortis non eros, venenatis lectus dolor id id elit, in consequat hendrerit porta ipsum placerat, vestibulum blandit mauris in quam. Ultrices fusce est vel, pretium praesent rhoncus metus in, condimentum nec eget molestie diam, magna rutrum. Nunc neque tellus id, donec non netus, in enim eros dolor massa volutpat id, cras eget erat diam ac nulla.<br><br>Turpis nulla aenean adipiscing tristique vitae, lorem nascetur non est euismod, commodo volutpat in sem rutrum blandit integer. Donec elit semper blandit, sapien lorem sed pellentesque et eget volutpat, elementum vulputate. Velit eget leo velit. Taciti egestas, penatibus amet imperdiet faucibus conubia suspendisse, augue quam vestibulum ipsum commodo neque ullamcorper, arcu tempus augue nunc at eu elit. Lectus proin mollis tempus luctus libero nec, sint turpis. Ut ut, lectus orci fermentum suspendisse ut a ut, suspendisse nunc a maecenas lectus cras tincidunt, vestibulum nam ipsum, lacus est ante. Proin vulputate non sollicitudin turpis magnis per. Cras proin eu praesent eleifend. Magna dis iaculis auctor bibendum tincidunt scelerisque, eros sem sociis, elit ornare risus laoreet venenatis lorem vitae, consequat a donec. Vitae massa, quisque suscipit.'),
(00000000027, 00000000029, 'Lorem ipsum dolor sit amet, lobortis dui eleifend integer non in nec, hendrerit curabitur nec neque eu integer, turpis est pellentesque turpis, aliquam arcu ut posuere. Viverra sem lobortis. Senectus ac praesent sed lacinia, wisi est pede sagittis, dolor tortor leo vestibulum mi nec donec, eu augue. Lacinia rhoncus felis at blandit, sed per eleifend posuere natoque, rutrum feugiat curabitur enim. Elit aliquam imperdiet pellentesque aliquam inventore, est aliquet. Placerat vitae quam ultricies lacinia, neque in sodales phasellus sodales sit, bibendum integer adipiscing sollicitudin in, et morbi venenatis id nec turpis aenean. Placerat sapien amet id dui eu, sed fusce, pulvinar in vitae mattis, bibendum beatae sem interdum sed. Justo et ut luctus provident vitae, sagittis maecenas ipsum quam auctor cursus, et ullamcorper, ornare placerat nullam neque lobortis fermentum tellus. Pede id pede sodales ut. Elit pellentesque.<br /><br />Dolor arcu nec dui convallis eget elit, id vitae at arcu proin. Purus varius purus dictum. Sodales sociis, aptent amet, odio ante aliquam congue et scelerisque, inceptos sit. Augue sed, fermentum sed dapibus sit porta donec, in nam sociis lectus pellentesque ornare. In vestibulum lorem vel rutrum ante nunc, et tincidunt mauris etiam fringilla curabitur sociosqu, nulla tincidunt dapibus pellentesque quisque ultricies. Suspendisse mi sociis non, adipiscing tincidunt, erat in dolor, ullamcorper laoreet varius lorem nec sodales etiam, tristique aliquet et sem. Massa massa ullamcorper ac odio id donec, diam a facilisis eget tristique justo aliquam, eget tellus pellentesque metus amet interdum eget. Amet nascetur, mi ipsum enim id curabitur, quis sit scelerisque wisi posuere tempor habitasse, odio nam et mattis, ante urna neque netus. Justo vitae sollicitudin elit vitae. Mi iaculis per eget dolor sit pellentesque. Egestas bibendum sollicitudin orci diam. Mauris ipsum porttitor pellentesque magnis, et ut felis ac pulvinar, praesent dictumst in at fusce, sagittis velit, nec vivamus wisi posuere mollis eros.<br /><br />Nunc enim sint vitae ornare at feugiat. At a. Sodales consequat, metus vel turpis egestas eu luctus pellentesque, donec maecenas velit pellentesque metus, lorem sagittis fusce libero elit nec in. Ut erat metus justo gravida quis, condimentum elementum. Suscipit enim nisl luctus viverra, erat risus. At dis justo ante, nec lobortis sagittis risus vivamus ultricies, risus mi integer eget. Pellentesque ante duis ut vel, et hymenaeos ligula est at enim, molestiae sed nibh imperdiet sed, massa nullam pede, at eu elit porttitor eget magna. Rhoncus pellentesque condimentum sed, libero et sem, suscipit diam ligula. Arcu condimentum montes lectus. Sagittis vivamus eget gravida sit blandit, tincidunt rhoncus eget vitae enim. Sit vel.<br /><br />Vitae ultrices ante in, ipsum et ut, maecenas aenean libero nec nunc, porta elit accumsan vitae quis, eu pede leo placerat nulla nibh vel. Viverra scelerisque sed dui proin velit, felis vel neque enim odio sem egestas, porta curabitur in volutpat nulla eget. Nulla urna feugiat dui, mauris facilisis vehicula, semper ipsum purus urna egestas cursus nam, non ullamcorper leo occaecat non. Iaculis non sit vestibulum. Nam enim tempus suscipit et nisl. Eget sit eu suscipit, consectetuer a fames suscipit sociosqu hendrerit convallis, adipiscing lobortis mattis aptent. Vulputate arcu a sed enim integer a, enim ullamcorper vel erat fringilla conubia, nonummy eget. Ac interdum tortor etiam vulputate, ligula torquent, malesuada eleifend velit condimentum odio in, interdum amet dui platea tortor integer wisi, a velit quam natoque amet. Ut metus mi etiam arcu elementum in, non quis dolor eget dapibus semper felis. Curabitur vulputate velit nec, reprehenderit id nec donec, habitasse neque vestibulum. Auctor sed vestibulum, mauris magna maecenas quis porttitor nibh, porta voluptatum eleifend ut, eu sit volutpat rutrum ligula tortor, placerat vestibulum rhoncus pellentesque sed nulla in.<br /><br />'),
(00000000028, 00000000030, 'Lorem ipsum dolor sit amet, lobortis dui eleifend integer non in nec, hendrerit curabitur nec neque eu integer, turpis est pellentesque turpis, aliquam arcu ut posuere. Viverra sem lobortis. Senectus ac praesent sed lacinia, wisi est pede sagittis, dolor tortor leo vestibulum mi nec donec, eu augue. Lacinia rhoncus felis at blandit, sed per eleifend posuere natoque, rutrum feugiat curabitur enim. Elit aliquam imperdiet pellentesque aliquam inventore, est aliquet. Placerat vitae quam ultricies lacinia, neque in sodales phasellus sodales sit, bibendum integer adipiscing sollicitudin in, et morbi venenatis id nec turpis aenean. Placerat sapien amet id dui eu, sed fusce, pulvinar in vitae mattis, bibendum beatae sem interdum sed. Justo et ut luctus provident vitae, sagittis maecenas ipsum quam auctor cursus, et ullamcorper, ornare placerat nullam neque lobortis fermentum tellus. Pede id pede sodales ut. Elit pellentesque.<br /><br />Dolor arcu nec dui convallis eget elit, id vitae at arcu proin. Purus varius purus dictum. Sodales sociis, aptent amet, odio ante aliquam congue et scelerisque, inceptos sit. Augue sed, fermentum sed dapibus sit porta donec, in nam sociis lectus pellentesque ornare. In vestibulum lorem vel rutrum ante nunc, et tincidunt mauris etiam fringilla curabitur sociosqu, nulla tincidunt dapibus pellentesque quisque ultricies. Suspendisse mi sociis non, adipiscing tincidunt, erat in dolor, ullamcorper laoreet varius lorem nec sodales etiam, tristique aliquet et sem. Massa massa ullamcorper ac odio id donec, diam a facilisis eget tristique justo aliquam, eget tellus pellentesque metus amet interdum eget. Amet nascetur, mi ipsum enim id curabitur, quis sit scelerisque wisi posuere tempor habitasse, odio nam et mattis, ante urna neque netus. Justo vitae sollicitudin elit vitae. Mi iaculis per eget dolor sit pellentesque. Egestas bibendum sollicitudin orci diam. Mauris ipsum porttitor pellentesque magnis, et ut felis ac pulvinar, praesent dictumst in at fusce, sagittis velit, nec vivamus wisi posuere mollis eros.<br /><br />Nunc enim sint vitae ornare at feugiat. At a. Sodales consequat, metus vel turpis egestas eu luctus pellentesque, donec maecenas velit pellentesque metus, lorem sagittis fusce libero elit nec in. Ut erat metus justo gravida quis, condimentum elementum. Suscipit enim nisl luctus viverra, erat risus. At dis justo ante, nec lobortis sagittis risus vivamus ultricies, risus mi integer eget. Pellentesque ante duis ut vel, et hymenaeos ligula est at enim, molestiae sed nibh imperdiet sed, massa nullam pede, at eu elit porttitor eget magna. Rhoncus pellentesque condimentum sed, libero et sem, suscipit diam ligula. Arcu condimentum montes lectus. Sagittis vivamus eget gravida sit blandit, tincidunt rhoncus eget vitae enim. Sit vel.<br /><br />Vitae ultrices ante in, ipsum et ut, maecenas aenean libero nec nunc, porta elit accumsan vitae quis, eu pede leo placerat nulla nibh vel. Viverra scelerisque sed dui proin velit, felis vel neque enim odio sem egestas, porta curabitur in volutpat nulla eget. Nulla urna feugiat dui, mauris facilisis vehicula, semper ipsum purus urna egestas cursus nam, non ullamcorper leo occaecat non. Iaculis non sit vestibulum. Nam enim tempus suscipit et nisl. Eget sit eu suscipit, consectetuer a fames suscipit sociosqu hendrerit convallis, adipiscing lobortis mattis aptent. Vulputate arcu a sed enim integer a, enim ullamcorper vel erat fringilla conubia, nonummy eget. Ac interdum tortor etiam vulputate, ligula torquent, malesuada eleifend velit condimentum odio in, interdum amet dui platea tortor integer wisi, a velit quam natoque amet. Ut metus mi etiam arcu elementum in, non quis dolor eget dapibus semper felis. Curabitur vulputate velit nec, reprehenderit id nec donec, habitasse neque vestibulum. Auctor sed vestibulum, mauris magna maecenas quis porttitor nibh, porta voluptatum eleifend ut, eu sit volutpat rutrum ligula tortor, placerat vestibulum rhoncus pellentesque sed nulla in.<br /><br />'),
(00000000029, 00000000031, 'Lorem ipsum dolor sit amet, lobortis dui eleifend integer non in nec, hendrerit curabitur nec neque eu integer, turpis est pellentesque turpis, aliquam arcu ut posuere. Viverra sem lobortis. Senectus ac praesent sed lacinia, wisi est pede sagittis, dolor tortor leo vestibulum mi nec donec, eu augue. Lacinia rhoncus felis at blandit, sed per eleifend posuere natoque, rutrum feugiat curabitur enim. Elit aliquam imperdiet pellentesque aliquam inventore, est aliquet. Placerat vitae quam ultricies lacinia, neque in sodales phasellus sodales sit, bibendum integer adipiscing sollicitudin in, et morbi venenatis id nec turpis aenean. Placerat sapien amet id dui eu, sed fusce, pulvinar in vitae mattis, bibendum beatae sem interdum sed. Justo et ut luctus provident vitae, sagittis maecenas ipsum quam auctor cursus, et ullamcorper, ornare placerat nullam neque lobortis fermentum tellus. Pede id pede sodales ut. Elit pellentesque.<br /><br />Dolor arcu nec dui convallis eget elit, id vitae at arcu proin. Purus varius purus dictum. Sodales sociis, aptent amet, odio ante aliquam congue et scelerisque, inceptos sit. Augue sed, fermentum sed dapibus sit porta donec, in nam sociis lectus pellentesque ornare. In vestibulum lorem vel rutrum ante nunc, et tincidunt mauris etiam fringilla curabitur sociosqu, nulla tincidunt dapibus pellentesque quisque ultricies. Suspendisse mi sociis non, adipiscing tincidunt, erat in dolor, ullamcorper laoreet varius lorem nec sodales etiam, tristique aliquet et sem. Massa massa ullamcorper ac odio id donec, diam a facilisis eget tristique justo aliquam, eget tellus pellentesque metus amet interdum eget. Amet nascetur, mi ipsum enim id curabitur, quis sit scelerisque wisi posuere tempor habitasse, odio nam et mattis, ante urna neque netus. Justo vitae sollicitudin elit vitae. Mi iaculis per eget dolor sit pellentesque. Egestas bibendum sollicitudin orci diam. Mauris ipsum porttitor pellentesque magnis, et ut felis ac pulvinar, praesent dictumst in at fusce, sagittis velit, nec vivamus wisi posuere mollis eros.<br /><br />Nunc enim sint vitae ornare at feugiat. At a. Sodales consequat, metus vel turpis egestas eu luctus pellentesque, donec maecenas velit pellentesque metus, lorem sagittis fusce libero elit nec in. Ut erat metus justo gravida quis, condimentum elementum. Suscipit enim nisl luctus viverra, erat risus. At dis justo ante, nec lobortis sagittis risus vivamus ultricies, risus mi integer eget. Pellentesque ante duis ut vel, et hymenaeos ligula est at enim, molestiae sed nibh imperdiet sed, massa nullam pede, at eu elit porttitor eget magna. Rhoncus pellentesque condimentum sed, libero et sem, suscipit diam ligula. Arcu condimentum montes lectus. Sagittis vivamus eget gravida sit blandit, tincidunt rhoncus eget vitae enim. Sit vel.<br /><br />Vitae ultrices ante in, ipsum et ut, maecenas aenean libero nec nunc, porta elit accumsan vitae quis, eu pede leo placerat nulla nibh vel. Viverra scelerisque sed dui proin velit, felis vel neque enim odio sem egestas, porta curabitur in volutpat nulla eget. Nulla urna feugiat dui, mauris facilisis vehicula, semper ipsum purus urna egestas cursus nam, non ullamcorper leo occaecat non. Iaculis non sit vestibulum. Nam enim tempus suscipit et nisl. Eget sit eu suscipit, consectetuer a fames suscipit sociosqu hendrerit convallis, adipiscing lobortis mattis aptent. Vulputate arcu a sed enim integer a, enim ullamcorper vel erat fringilla conubia, nonummy eget. Ac interdum tortor etiam vulputate, ligula torquent, malesuada eleifend velit condimentum odio in, interdum amet dui platea tortor integer wisi, a velit quam natoque amet. Ut metus mi etiam arcu elementum in, non quis dolor eget dapibus semper felis. Curabitur vulputate velit nec, reprehenderit id nec donec, habitasse neque vestibulum. Auctor sed vestibulum, mauris magna maecenas quis porttitor nibh, porta voluptatum eleifend ut, eu sit volutpat rutrum ligula tortor, placerat vestibulum rhoncus pellentesque sed nulla in.<br /><br />'),
(00000000030, 00000000032, '.outer {<br />  display: table;<br />  position: absolute;<br />  top: 0;<br />  left: 0;<br />  height: 100%;<br />  width: 100%;<br />}<br /><br />.middle {<br />  display: table-cell;<br />  vertical-align: middle;<br />}<br /><br />.inner {<br />  margin-left: auto;<br />  margin-right: auto;<br />  width: 400px;<br />  /*whatever width you want*/<br />}'),
(00000000031, 00000000033, 'asdasdasdasdsad'),
(00000000032, 00000000034, 'asdasd'),
(00000000033, 00000000035, '@whamsicore, you send JSON from php using json_encode, but you do not use eval to parse the data; you use JSON.parse(data). The difference is that if json_encode became compromised and sent \"(function(){...malicious code here...})();\", you\'d be automatically calling that malicious code using eval. JSON.parse on the other hand will throw an error which will prevent your site from causing harm to your users. â€“ zzzzBov Jul 26 \'11 at 19:56'),
(00000000034, 00000000036, ' s'),
(00000000035, 00000000037, 'asdasda'),
(00000000036, 00000000038, 'asdasd'),
(00000000037, 00000000039, 'Proin lectus cras montes lobortis non eros, venenatis lectus dolor id id elit, in consequat hendrerit porta ipsum placerat, vestibulum blandit mauris in quam. Ultrices fusce est vel, pretium praesent rhoncus metus in, condimentum nec eget molestie diam, magna rutrum.'),
(00000000038, 00000000040, 'When you work with an application, you open it, do some changes, and then you close it. This is much like a Session. The computer knows who you are. It knows when you start the application and when you end. But on the internet there is one problem: the web server does not know who you are or what you do, because the HTTP address doesn\'t maintain state.<br><br>Session variables solve this problem by storing user information to be used across multiple pages (e.g. username, favorite color, etc). By default, session variables last until the user closes the browser.<br><br>So; Session variables hold information about one single user, and are available to all pages in one application.'),
(00000000039, 00000000041, 'The character encoding of the HTML document was not declared. The document will render with garbled text in some browser configurations if the document contains characters from outside the US-ASCII range. The character encoding of the page must be declared in the document or in the transfer protocol.'),
(00000000040, 00000000042, 'Want to remove a cookie?<br><br>Many people do it the complicated way:<br>setcookie(\'name\', \'content\', time()-3600);<br><br>But why do you make it so complicated and risk it not working, when the client\'s time is wrong? Why fiddle around with time();<br><br>Here\'s the easiest way to unset a cookie:<br>setcookie(\'name\', \'content\', 1); new abstract'),
(00000000041, 00000000043, 'Beginning its journey almost ten years ago, Google Chrome has become one of the most popular web browsers on the internet and continues to prioritize speed and security in its service to users. Earlier this month at Googleâ€™s I/O 2019 conference, the company announced they are getting ready to release new and noteworthy features that will increase the security of Chrome. This affects the use of SameSite cookies and aims to increase security by giving users the choice to reject cookies that donâ€™t have the SameSite attribute set and lack a certain security mechanism, as well as enforcing the use of SameSite cookies by default.'),
(00000000042, 00000000044, 'The Wii is a dedicated machine â€“ \'games console\' â€“ for playing video games that connects to your television . Made by Nintendo and released in 2006, it\'s currently the bestselling console on the market. By September 30, 2011, over 89 million Wii consoles had been sold worldwide.'),
(00000000043, 00000000045, 'Cherprang Areekul (Cherprang), Isarapa Thawatpakdee (Tarwaan), Jennis Oprasert (Jennis), Jetsupa Kruetang (Jan), Jiradapa Iasdsdntajak (Pupe), Kanteera Wadcharathadsanakul (Noey), Milin Dokthian (Namneung), Miori Ohkubo (Miori), Natruja Chutiwansopon (Kaew), Patchanan Jiajirachote (Orn), Pimrapat Phadungwatanachok (Mobile), Praewa Suthamphong (Music), Punsikorn Tiyakorn (Pun), Rina Izuta (Izurina), Sawitchaya Kajonrungsilp (Satchan), Warattaya Deesomlert (Kaimook) swadikap 12211'),
(00000000044, 00000000046, 'Floor Gang Merch! https://represent.com/store/pewdiepie (Thank you)<br>Subscribe to become a FLOOR GANG Member here: https://www.youtube.com/channel/UC-lH...<br>Get exclusive epic pewdiepie inside epic access and huge PP!<br><br>Outro: add Just Die Already as wishlist #ad: https://store.steampowered.com/app/97...<br><br>And Check out https://youtu.be/FQgLsYOKP8w Arkade Blaster Pro! #ad<br><br>Pewdiepie\'s Pixelings DOWNLOAD:<br>iOS: https://buff.ly/2pNG0aT<br>Android: https://buff.ly/34C68nZ<br>#pewdiepie #pixelings<br><br>Minecraft Playlist:<br>https://www.youtube.com/watch?v=mhgS6...<br><br>My Stores:<br>TSUKI:<br>https://tsuki.market/<br>Merch:<br>https://represent.com/store/pewdiepie<br><br>I drink GFUEL (affiliate link):<br>https://gfuel.ly/31Kargr<br><br>My Setup (affiliate links):<br>Chair: https://clutchchairz.com/pewdiepie/<br>Official Razer hardware:<br>Razer Nari Ultimate headset: http://rzr.to/pdp-razer-nari <br>Razer Customs phone cases: http://rzr.to/pdp-razer-case<br><br>NordVPN DOWNLOAD (affiliate link):<br>Go to https://NordVPN.com/pewdiepie and use code PEWDIEPIE to get 70% off a 3 year plan plus 1 additional month free.<br>'),
(00000000045, 00000000047, 'The system was designed to improve the current manual system in terms of managing, storing and keeping the record of the researches. This system was made to make the task of the staff in the University Research Office easier.<br /><br />This study sought to find out the existing problem in the current manual system in terms of: a) performance, b) information, c) efficiency, d) control and security. It also sought to find out what will be the design of Web-Based Research Clearing House System for University of Eastern Philippines Research Office in terms of: a) data, b) process, c) programming language.<br /><br />This study focused on keeping, monitoring and generating reports of the researches in the University of Eastern Philippines.<br />The researchers used PHP and MY SQL for designing and creating the system.<br /><br />The system was designed to improve the current manual system in terms of managing, storing and keeping the record of the researches. This system was made to make the task of the staff in the University Research Office easier.<br />');

-- --------------------------------------------------------

--
-- Table structure for table `researchauthor`
--

DROP TABLE IF EXISTS `researchauthor`;
CREATE TABLE IF NOT EXISTS `researchauthor` (
  `ResearchAuthorId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `AuthorId` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `ResearchId` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  PRIMARY KEY (`ResearchAuthorId`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `researchauthor`
--

INSERT INTO `researchauthor` (`ResearchAuthorId`, `AuthorId`, `ResearchId`) VALUES
(00000000057, 00000000043, 00000000001),
(00000000062, 00000000015, 00000000003),
(00000000063, 00000000017, 00000000003),
(00000000064, 00000000022, 00000000003),
(00000000065, 00000000043, 00000000003),
(00000000066, 00000000043, 00000000004),
(00000000067, 00000000043, 00000000005),
(00000000068, 00000000015, 00000000006),
(00000000069, 00000000013, 00000000007),
(00000000070, 00000000015, 00000000008),
(00000000071, 00000000015, 00000000009),
(00000000072, 00000000015, 00000000010),
(00000000073, 00000000015, 00000000011),
(00000000074, 00000000014, 00000000012),
(00000000075, 00000000014, 00000000013),
(00000000076, 00000000017, 00000000013),
(00000000077, 00000000047, 00000000014),
(00000000078, 00000000015, 00000000015),
(00000000079, 00000000015, 00000000016),
(00000000080, 00000000016, 00000000017),
(00000000081, 00000000016, 00000000018),
(00000000082, 00000000015, 00000000019),
(00000000083, 00000000015, 00000000020),
(00000000084, 00000000015, 00000000021),
(00000000085, 00000000015, 00000000022),
(00000000086, 00000000015, 00000000023),
(00000000087, 00000000015, 00000000024),
(00000000088, 00000000016, 00000000025),
(00000000089, 00000000014, 00000000026),
(00000000090, 00000000015, 00000000027),
(00000000092, 00000000015, 00000000029),
(00000000093, 00000000015, 00000000030),
(00000000094, 00000000013, 00000000031),
(00000000095, 00000000014, 00000000031),
(00000000096, 00000000015, 00000000031),
(00000000097, 00000000016, 00000000031),
(00000000098, 00000000017, 00000000032),
(00000000099, 00000000045, 00000000032),
(00000000101, 00000000015, 00000000034),
(00000000102, 00000000047, 00000000035),
(00000000103, 00000000048, 00000000035),
(00000000104, 00000000043, 00000000035),
(00000000105, 00000000045, 00000000036),
(00000000106, 00000000045, 00000000037),
(00000000107, 00000000048, 00000000038),
(00000000116, 00000000015, 00000000041),
(00000000117, 00000000018, 00000000041),
(00000000119, 00000000014, 00000000043),
(00000000133, 00000000015, 00000000042),
(00000000134, 00000000016, 00000000042),
(00000000149, 00000000014, 00000000033),
(00000000152, 00000000049, 00000000046),
(00000000160, 00000000046, 00000000040),
(00000000161, 00000000048, 00000000040),
(00000000162, 00000000022, 00000000040),
(00000000163, 00000000020, 00000000040),
(00000000164, 00000000045, 00000000040),
(00000000165, 00000000047, 00000000040),
(00000000166, 00000000018, 00000000040),
(00000000168, 00000000020, 00000000045),
(00000000170, 00000000015, 00000000028),
(00000000171, 00000000017, 00000000028),
(00000000172, 00000000046, 00000000039),
(00000000173, 00000000017, 00000000039),
(00000000174, 00000000044, 00000000044),
(00000000175, 00000000042, 00000000044),
(00000000232, 00000000013, 00000000047),
(00000000233, 00000000014, 00000000047),
(00000000234, 00000000016, 00000000047),
(00000000235, 00000000015, 00000000047);

-- --------------------------------------------------------

--
-- Table structure for table `researchfunding`
--

DROP TABLE IF EXISTS `researchfunding`;
CREATE TABLE IF NOT EXISTS `researchfunding` (
  `ResearchFunndingId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `ResearchId` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `FundingId` int(6) UNSIGNED ZEROFILL DEFAULT NULL,
  `DateFrom` date DEFAULT NULL,
  `DateTo` date DEFAULT NULL,
  `Amount` decimal(18,2) DEFAULT NULL,
  `isExternal` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`ResearchFunndingId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='	';

--
-- Dumping data for table `researchfunding`
--

INSERT INTO `researchfunding` (`ResearchFunndingId`, `ResearchId`, `FundingId`, `DateFrom`, `DateTo`, `Amount`, `isExternal`) VALUES
(00000000001, 00000000002, 000004, '2020-06-02', '2020-07-08', '300000.00', 'No'),
(00000000002, 00000000002, 000004, '2020-08-02', '2020-08-03', '1200033.00', 'No'),
(00000000003, 00000000044, 000004, '2020-08-05', '2020-08-05', '103388888.00', 'No'),
(00000000004, 00000000044, 000001, '2020-07-01', '2020-07-30', '100000.00', 'Yes'),
(00000000005, 00000000045, 000001, '2020-04-28', '2020-08-04', '10.00', 'No'),
(00000000006, 00000000045, 000003, '2020-03-10', '2020-05-14', '50000.00', 'No'),
(00000000008, 00000000045, 000005, '2019-11-20', '2020-02-11', '100044.00', 'No'),
(00000000010, 00000000045, 000002, '2016-02-09', '2017-02-15', '400000.00', 'No'),
(00000000011, 00000000031, 000001, '2020-05-18', '2020-08-05', '15600.00', 'No'),
(00000000012, 00000000047, 000001, '2017-12-05', '2018-04-21', '9500.00', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `researchjournal`
--

DROP TABLE IF EXISTS `researchjournal`;
CREATE TABLE IF NOT EXISTS `researchjournal` (
  `ResearchJournalId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `ResearchId` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `Title` varchar(500) DEFAULT NULL,
  `VolumeIssueNo` varchar(45) DEFAULT NULL,
  `NoOfPages` varchar(45) DEFAULT NULL,
  `DatePublished` date DEFAULT NULL,
  `PublicationType` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ResearchJournalId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `researchjournal`
--

INSERT INTO `researchjournal` (`ResearchJournalId`, `ResearchId`, `Title`, `VolumeIssueNo`, `NoOfPages`, `DatePublished`, `PublicationType`) VALUES
(00000000001, 00000000002, 'TItle', '988377222', '1-2, 200-1133', '2020-08-25', 'National'),
(00000000002, 00000000045, 'Japanese commercials are often far from usual.', '7634536453#222A', '19-29, 20-26', '2020-08-06', 'National'),
(00000000003, 00000000045, 'Cycling through rural Japan attempting to sound American for a day takes its toll on Day 9 of Journey Across Japan.', '7673654#4343A', '100-102', '2020-08-06', 'International'),
(00000000004, 00000000044, 'Speaking Japanese is amazing fun. But not when you have to speak it all day without being allowed to switch to your native tongue. On Day 14 of Journey across Japan, we give it a shot.', '#67674553#22', '1-10, 12-14', '2020-08-05', 'International'),
(00000000005, 00000000042, 'Kyoto is difficult to navigate with Google Maps, let alone using a paper map. On Day 15 of Journey Across Japan we get lost in Kyoto.', 'A34343432#JFH43', '90-93, 95-100', '2020-08-13', 'International'),
(00000000006, 00000000045, 'How does Japanese horse meat taste? This week we visit Japan\'s largest volcano (Mount Aso), a real life Smurf Land, see Japan\'s billion dollar mascot and try horse meat sashimi, all in one place: Kumamoto.', '#678738#AOJF', '100-108', '2020-08-05', 'International'),
(00000000007, 00000000041, 'Tokyo Creative and Abroad in Japan invited 100+ people to attend the Journey Across Japan After Party held at The Millennials Shibuya Hotel in Tokyo, Japan.', '#736473643#HGNNSJ#1', '1-3, 1-4, 5-10', '2020-08-05', 'International'),
(00000000008, 00000000045, 'Since you\'re also new to Javascript, note that the var statements below are local to the wrapper function, definitely avoid using globals in JS', '7634536453#223B', '19-29, 20-26', '2020-08-06', 'National'),
(00000000009, 00000000045, 'Many thanks for your detailed explanation and the extra tips.', '7634536453#224A', '20-26, 50-50', '2020-08-06', 'International'),
(00000000010, 00000000045, 'Japanese commercials are often far from usual.', '7634536453#222A', '19-29, 20-26', '2020-08-06', 'National'),
(00000000011, 00000000045, 'It\'s complete overkill in this case, but I\'ve shown how you can use setTimeout() to execute your code asynchronously so that the event handler returns, and then your code executes.', '#678738#883A', '192-200', '2020-08-05', 'International'),
(00000000012, 00000000045, 'Japan\'s most eccentric man and I have a much needed catch up over various drinks from Japanese 7-11. ', '#23232311#ADSD', '1-2, 1-23', '2020-08-05', 'National'),
(00000000013, 00000000044, 'How We Faked Keanu Reeves Stopping a Robbery', 'asd', '1-2', '2020-08-05', 'National'),
(00000000014, 00000000034, 'Kyoto is difficult to navigate with Google Maps, let alone using a paper map. On Day 15 of Journey Across Japan we get lost in Kyoto.', '#2321312313123#ASDASD', '1-2', '2020-08-11', 'National'),
(00000000015, 00000000044, 'Cycling through rural Japan attempting to sound American for a day takes its toll on Day 9 of Journey Across Japan.', '#12312312313#ASDASD', '1-2', '2020-07-30', 'National'),
(00000000016, 00000000044, 'asdasdKyoto is difficult to naavigate with Google Maps, let alone using a paper map. On Day 15 of Journey Across Japan we get lost in Kyoto.', '#231231414', '1-2', '2020-07-30', 'National'),
(00000000017, 00000000042, 'How does Japanese horse meat taste? This week we visit Japan\'s largest volcano (Mount Aso), a real life Smurf Land, see Japan\'s billion dollar mascot and try horse meat sashimi, all in one place: Kumamoto.', '#2q1432423434234', '10-12', '2020-07-30', 'National'),
(00000000018, 00000000044, '122233', '334232323', '1-2, 11-12', '2020-08-11', 'National'),
(00000000019, 00000000044, 'The 5th Mini Album \"What is Love?\" ', '#12312323#aaa2', '1-2', '2020-07-30', 'National'),
(00000000020, 00000000038, 'Japanglish Song!ã€Tokyo Bonæ±äº¬ç›†è¸Šã‚Š2020ã€‘Namewee é»ƒæ˜Ž', '#A23232asd', '1-3', '2020-07-30', 'National'),
(00000000021, 00000000038, 'Japanglish Song!ã€Tokyo Bonæ±äº¬ç›†è¸Šã‚Š2020ã€‘Namewee é»ƒæ˜Ž', '#iKON #ì•„ì´ì½˜ #ì‚¬ëž‘ì„í–ˆ', '1-3', '2020-07-29', 'National'),
(00000000022, 00000000038, 'Demo sonnanja dame Mou sonnanja hora Kokoro wa shinka suru yo motto ', '837483743843222', '1-7', '2020-07-28', 'International'),
(00000000023, 00000000044, 'Take a look behind the scenes of the crew\'s most ambitious deep fake yet: Keanu Reeves.', '#2323232', '1-4', '2020-07-29', 'National'),
(00000000024, 00000000031, 'Suscipit enim nisl luctus viverra, erat risus. At dis justo ante, nec lobortis sagittis risus vivamus ultricies, risus mi integer eget. Pellentesque ante duis ut vel, et hymenaeos ligula est at enim', '#23232344#SEDW4', '1-2, 14-20, 40-50', '2016-06-07', 'National'),
(00000000025, 00000000031, 'Amet nascetur, mi ipsum enim id curabitur, quis sit scelerisque wisi posuere tempor habitasse, odio nam et mattis, ante urna neque netus. Justo vitae sollicitudin elit vitae.', '#2q143242343423#AFF', '10-40, 50-55', '2016-02-24', 'International');

-- --------------------------------------------------------

--
-- Table structure for table `researchkeywords`
--

DROP TABLE IF EXISTS `researchkeywords`;
CREATE TABLE IF NOT EXISTS `researchkeywords` (
  `ResearchKeywordsId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `KeywordId` int(6) UNSIGNED ZEROFILL NOT NULL,
  `ResearchId` int(11) UNSIGNED ZEROFILL NOT NULL,
  PRIMARY KEY (`ResearchKeywordsId`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researchkeywords`
--

INSERT INTO `researchkeywords` (`ResearchKeywordsId`, `KeywordId`, `ResearchId`) VALUES
(00000000025, 000002, 00000000003),
(00000000024, 000008, 00000000003),
(00000000023, 000002, 00000000002),
(00000000022, 000008, 00000000002),
(00000000021, 000009, 00000000001),
(00000000020, 000007, 00000000001),
(00000000019, 000005, 00000000001),
(00000000026, 000005, 00000000004),
(00000000027, 000007, 00000000005),
(00000000028, 000002, 00000000014),
(00000000029, 000002, 00000000019),
(00000000030, 000007, 00000000020),
(00000000031, 000005, 00000000029),
(00000000032, 000008, 00000000031),
(00000000033, 000002, 00000000031),
(00000000034, 000002, 00000000035),
(00000000035, 000007, 00000000035),
(00000000036, 000005, 00000000043),
(00000000073, 000002, 00000000045),
(00000000072, 000007, 00000000045),
(00000000074, 000011, 00000000039),
(00000000069, 000011, 00000000046),
(00000000068, 000002, 00000000046),
(00000000047, 000002, 00000000042),
(00000000075, 000008, 00000000044),
(00000000105, 000002, 00000000047),
(00000000104, 000012, 00000000047);

-- --------------------------------------------------------

--
-- Table structure for table `researchpatents`
--

DROP TABLE IF EXISTS `researchpatents`;
CREATE TABLE IF NOT EXISTS `researchpatents` (
  `PatentId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `ResearchId` int(11) UNSIGNED ZEROFILL NOT NULL,
  `PatentIdNo` varchar(45) DEFAULT NULL,
  `DatePatented` date DEFAULT NULL,
  `UtilizationOfInvention` varchar(45) DEFAULT NULL,
  `Remarks` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`PatentId`),
  UNIQUE KEY `ResearchId` (`ResearchId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `researchpatents`
--

INSERT INTO `researchpatents` (`PatentId`, `ResearchId`, `PatentIdNo`, `DatePatented`, `UtilizationOfInvention`, `Remarks`) VALUES
(00000000001, 00000000044, 'ID#32233344413', '2020-07-27', 'Development', '');

-- --------------------------------------------------------

--
-- Table structure for table `researchpresentation`
--

DROP TABLE IF EXISTS `researchpresentation`;
CREATE TABLE IF NOT EXISTS `researchpresentation` (
  `PresentationId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `ResearchId` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `ConferenceTitle` varchar(1000) DEFAULT NULL,
  `ConferenceVenue` varchar(1000) DEFAULT NULL,
  `DatePresented` date DEFAULT NULL,
  `ConferenceType` varchar(45) DEFAULT NULL,
  `Organzier` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`PresentationId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `researchpresentation`
--

INSERT INTO `researchpresentation` (`PresentationId`, `ResearchId`, `ConferenceTitle`, `ConferenceVenue`, `DatePresented`, `ConferenceType`, `Organzier`) VALUES
(00000000001, 00000000044, ' Japanese Fast Food Restaurants when you travel to Japan. But how fast is Japanese Fast Food. ', 'Akihabara, Japan', '2020-08-02', 'International', 'Abroad in japan'),
(00000000002, 00000000044, 'Tokyo Japanese food is amazing and you must try the best', 'Tokyo, Japan', '2020-07-27', 'International', 'Tokyo Creative'),
(00000000003, 00000000044, 'The Best Tokyo Fast Food Restaurants and Japanese Chain Restaurants in my opinion', 'Tokyo, Japan', '2019-01-09', 'International', 'Paolo fromTokyo'),
(00000000004, 00000000031, 'Mi iaculis per eget dolor sit pellentesque. Egestas bibendum sollicitudin orci diam.', 'Spain', '2020-06-16', 'Regional', ' Malesuada eleifend velit condimentum');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

DROP TABLE IF EXISTS `userlog`;
CREATE TABLE IF NOT EXISTS `userlog` (
  `userLogId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `logDesc` varchar(200) DEFAULT NULL,
  `timeStamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `RefNum` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`userLogId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

DROP TABLE IF EXISTS `web_users`;
CREATE TABLE IF NOT EXISTS `web_users` (
  `Web_UserId` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `Web_UserTypeId` int(11) DEFAULT NULL,
  `UserName` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `FName` varchar(45) DEFAULT NULL,
  `MName` varchar(45) DEFAULT NULL,
  `LName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Web_UserId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `web_usertype`
--

DROP TABLE IF EXISTS `web_usertype`;
CREATE TABLE IF NOT EXISTS `web_usertype` (
  `Web_UserTypeId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Desc` varchar(45) DEFAULT NULL,
  `Privileges` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Web_UserTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
