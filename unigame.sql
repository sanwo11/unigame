-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2014 at 05:14 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `unigame`
--

-- --------------------------------------------------------

--
-- Table structure for table `addfriend`
--

CREATE TABLE IF NOT EXISTS `addfriend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `memid` (`memid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `verify` tinyint(1) NOT NULL,
  `title` text NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `memid` (`memid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `memid`, `verify`, `title`, `image`, `content`, `date_time`) VALUES
(5, 16, 0, 'consectetur adipiscing elit', '1400098471201412157521921400098471_a6.JPG', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere', '2014-05-15 03:14:31'),
(6, 16, 0, 'consectetur adipiscing elit', '1400098949201412157521921400098949_a10.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. \n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. \n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. \n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-14 21:18:15'),
(7, 16, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing', '1400147195201412157521921400147195_225787600_e1d6b247e2_b.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 16:46:35'),
(8, 16, 0, 'consectetur adipiscing elit', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 16:58:24'),
(9, 16, 0, 'consectetur adipiscing elit', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 16:58:26'),
(10, 19, 0, 'Sed sed volutpat neque. Nulla posuere.', '1400167171201412157521921400167171_4216235418_c7a1ef14c8_o.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.  \r\n   Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere. \r\n\r\n   Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.  \r\n   Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 22:19:31'),
(11, 19, 0, 'Sed sed volutpat neque.', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.    \r\n\r\n\r\n            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 22:42:18'),
(12, 19, 0, 'Sed sed volutpat neque.', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 22:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `memid` (`memid`,`blogid`),
  KEY `blogid` (`blogid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `memid`, `blogid`, `comment`, `date_time`) VALUES
(3, 16, 6, 'Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 05:57:44'),
(4, 16, 6, 'Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 06:18:03'),
(5, 16, 6, 'Onsectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 07:19:25'),
(6, 16, 5, 'Sed sed volutpat neque. Nulla posuere Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere', '2014-05-15 07:22:06'),
(7, 16, 5, 'Onsectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 07:44:03'),
(8, 19, 10, 'empus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 22:19:57'),
(9, 19, 12, 'In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 22:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `likecomment`
--

CREATE TABLE IF NOT EXISTS `likecomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `userlike` tinyint(11) NOT NULL,
  `userdis` tinyint(1) NOT NULL,
  `likecount` float NOT NULL,
  `dislikecount` float NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`memid`,`blogid`),
  KEY `memid` (`memid`),
  KEY `blogid` (`blogid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `likecomment`
--

INSERT INTO `likecomment` (`id`, `memid`, `blogid`, `userlike`, `userdis`, `likecount`, `dislikecount`, `date_time`) VALUES
(15, 16, 7, 1, 2, 3, 1, '2014-05-15 22:06:15'),
(16, 16, 6, 1, 2, 2, 0, '2014-05-15 22:07:24'),
(17, 16, 5, 1, 2, 2, 0, '2014-05-15 22:08:32'),
(18, 16, 3, 1, 2, 3, 1, '2014-05-15 22:12:26'),
(19, 19, 9, 1, 2, 1, 1, '2014-05-15 22:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `likereply`
--

CREATE TABLE IF NOT EXISTS `likereply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `userlike` tinyint(1) NOT NULL,
  `userdis` tinyint(1) NOT NULL,
  `likecount` float NOT NULL,
  `dislikecount` float NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `memid` (`memid`,`blogid`),
  KEY `blogid` (`blogid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `likereply`
--

INSERT INTO `likereply` (`id`, `memid`, `blogid`, `userlike`, `userdis`, `likecount`, `dislikecount`, `date_time`) VALUES
(1, 16, 5, 1, 2, 4, 1, '2014-05-15 23:59:18');

-- --------------------------------------------------------

--
-- Table structure for table `pointtable`
--

CREATE TABLE IF NOT EXISTS `pointtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scorename` varchar(100) NOT NULL,
  `scorepoint` float NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pointtable`
--

INSERT INTO `pointtable` (`id`, `scorename`, `scorepoint`, `date_time`) VALUES
(1, 'register', 15, '2014-05-12 13:13:10'),
(2, 'verification', 35, '2014-05-12 13:14:17'),
(3, 'addfriend', 30, '2014-05-12 13:16:36'),
(4, 'blogpost', 50, '2014-05-12 13:15:29'),
(5, 'comment', 15, '2014-05-15 00:31:11'),
(6, 'likebtn', 10, '2014-05-12 13:17:15'),
(7, 'replycomment', 25, '2014-05-15 11:02:25');

-- --------------------------------------------------------

--
-- Table structure for table `profileimage`
--

CREATE TABLE IF NOT EXISTS `profileimage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `image` text NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `memid` (`memid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profileimage`
--

INSERT INTO `profileimage` (`id`, `memid`, `image`, `date_time`) VALUES
(1, 16, '1400092784201412157521921400092784_a11.jpg', '2014-05-14 18:39:44'),
(2, 19, '1400140526201412157521921400140526_242016180_1335a69f3d_b.jpg', '2014-05-15 07:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `replycomment`
--

CREATE TABLE IF NOT EXISTS `replycomment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `blogid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `memid` (`memid`,`blogid`),
  KEY `blogid` (`blogid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `replycomment`
--

INSERT INTO `replycomment` (`id`, `memid`, `blogid`, `comment`, `date_time`) VALUES
(3, 16, 5, 'Sed sed volutpat neque. Nulla posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 18:13:26'),
(4, 16, 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 18:38:14'),
(5, 16, 3, 'consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 18:49:31'),
(6, 19, 9, 'In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 22:44:22'),
(7, 16, 6, 'consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 23:12:01'),
(8, 16, 7, 'consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet tempus massa. Nam quis purus sit amet augue iaculis dapibus non in nisi. Sed sed volutpat neque. Nulla posuere.', '2014-05-15 23:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `scoretable`
--

CREATE TABLE IF NOT EXISTS `scoretable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `scorepoint` float NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `memid` (`memid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `scoretable`
--

INSERT INTO `scoretable` (`id`, `memid`, `scorepoint`, `date_time`) VALUES
(4, 16, 910, '2014-05-15 16:59:18'),
(5, 17, 50, '2014-05-13 11:00:03'),
(6, 18, 50, '2014-05-13 10:55:42'),
(7, 19, 230, '2014-05-15 15:44:31'),
(8, 20, 15, '2014-05-12 14:55:12'),
(12, 24, 15, '2014-05-13 13:52:01'),
(13, 25, 120, '2014-05-13 14:27:13'),
(14, 26, 50, '2014-05-13 14:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `studentverify`
--

CREATE TABLE IF NOT EXISTS `studentverify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` int(11) NOT NULL,
  `studentoption` tinyint(4) NOT NULL,
  `image` text,
  `email` varchar(100) NOT NULL,
  `verification` tinyint(4) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `memid` (`memid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `studentverify`
--

INSERT INTO `studentverify` (`id`, `memid`, `studentoption`, `image`, `email`, `verification`, `date_time`) VALUES
(4, 16, 2, '', 'adesanwo1@yahoo.com', 1, '2014-05-13 12:42:40'),
(6, 18, 1, '1399978541201412157521921399978541_13.jpg', '', 1, '2014-05-13 12:42:45'),
(7, 17, 1, '1399978802201412157521921399978802_a11.jpg', '', 1, '2014-05-13 12:42:54'),
(10, 25, 1, '1399991233201412157521921399991233_13.jpg', '', 1, '2014-05-13 21:27:13'),
(11, 26, 2, '', 'taofeeq@smart.com', 1, '2014-05-13 21:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memid` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `university` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `verification_uni_card` tinyint(1) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `memid`, `name`, `university`, `email`, `password`, `verification_uni_card`, `date_time`) VALUES
(16, 1, 'adesanwo', 'Unilag', 'adesanwo1@yahoo.com', 'b424df7b3cafc2bfd6bafa2189be5eed', 0, '2014-05-12 14:08:17'),
(17, 1, 'adesanwo', 'Unilag', 'usuman@yahoo.com', 'b424df7b3cafc2bfd6bafa2189be5eed', 0, '2014-05-12 14:30:26'),
(18, 1, 'Kazeem', 'dghs', 'adesa@yahoo.com', 'b424df7b3cafc2bfd6bafa2189be5eed', 0, '2014-05-12 14:32:53'),
(19, 1, 'adesanwo', 'Unilag', 'sanwo11@yahoo.com', 'b424df7b3cafc2bfd6bafa2189be5eed', 0, '2014-05-12 14:35:50'),
(20, 1, 'Kazeem', 'ddd', 'ddd@me.com', 'b424df7b3cafc2bfd6bafa2189be5eed', 0, '2014-05-12 14:55:12'),
(24, 1, 'adesanwo', 'Unilag', 'usun@yahoo.com', 'b424df7b3cafc2bfd6bafa2189be5eed', 0, '2014-05-13 13:52:01'),
(25, 1, 'adesanwo', 'Unilag', 'us@yahoo.com', 'b424df7b3cafc2bfd6bafa2189be5eed', 0, '2014-05-13 13:54:45'),
(26, 1, 'taofeeq', 'Unilag', 'taofeeq@unismart.com', 'b424df7b3cafc2bfd6bafa2189be5eed', 0, '2014-05-13 14:36:11');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addfriend`
--
ALTER TABLE `addfriend`
  ADD CONSTRAINT `addfriend_ibfk_1` FOREIGN KEY (`memid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`memid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`blogid`) REFERENCES `blogs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`memid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likecomment`
--
ALTER TABLE `likecomment`
  ADD CONSTRAINT `likecomment_ibfk_1` FOREIGN KEY (`memid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likecomment_ibfk_2` FOREIGN KEY (`blogid`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likereply`
--
ALTER TABLE `likereply`
  ADD CONSTRAINT `likereply_ibfk_2` FOREIGN KEY (`blogid`) REFERENCES `replycomment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likereply_ibfk_1` FOREIGN KEY (`memid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profileimage`
--
ALTER TABLE `profileimage`
  ADD CONSTRAINT `profileimage_ibfk_1` FOREIGN KEY (`memid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replycomment`
--
ALTER TABLE `replycomment`
  ADD CONSTRAINT `replycomment_ibfk_3` FOREIGN KEY (`blogid`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replycomment_ibfk_1` FOREIGN KEY (`memid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scoretable`
--
ALTER TABLE `scoretable`
  ADD CONSTRAINT `scoretable_ibfk_1` FOREIGN KEY (`memid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentverify`
--
ALTER TABLE `studentverify`
  ADD CONSTRAINT `studentverify_ibfk_1` FOREIGN KEY (`memid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
