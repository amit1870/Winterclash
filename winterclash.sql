-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2014 at 06:17 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `winterclash`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE IF NOT EXISTS `characters` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `cid` int(1) NOT NULL,
  `char_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `cid`, `char_name`) VALUES
(1, 1, 'Allrounder'),
(2, 2, 'Batsman'),
(3, 3, 'Bowler'),
(4, 4, 'Keeper'),
(5, 5, 'Umpire');

-- --------------------------------------------------------

--
-- Table structure for table `chat_msg`
--

CREATE TABLE IF NOT EXISTS `chat_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `message` text NOT NULL,
  `when` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `grounds`
--

CREATE TABLE IF NOT EXISTS `grounds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gd_name` varchar(70) NOT NULL,
  `venue` varchar(70) NOT NULL,
  `total_match` int(4) NOT NULL,
  `history` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `grounds`
--

INSERT INTO `grounds` (`id`, `gd_name`, `venue`, `total_match`, `history`) VALUES
(1, 'Sonai Stadium', 'Bhannaur', 0, ''),
(2, 'Dabilaha Stadium', 'Dabilaha', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `player_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`player_id`, `time`) VALUES
(4, '1396729002'),
(16, '1396887719'),
(16, '1396887737'),
(17, '1396887772'),
(6, '1396897255'),
(6, '1397135508'),
(6, '1397561639'),
(16, '1397926005'),
(6, '1397926025');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `handle` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `character` varchar(30) NOT NULL,
  `birthdate` date NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  `pid` int(11) NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `history` text NOT NULL,
  `profile_pic` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `handle`, `location`, `status`, `character`, `birthdate`, `password`, `salt`, `pid`, `tid`, `history`, `profile_pic`) VALUES
(6, 'Amit', 'amit@rids.in', 'Jaunpur', 1, '2', '1989-06-12', 'f8eb4e15b9cb3a797cf011c9aff577add4e81a4b5ba49d4639b34e8151619e674a9b030c6d93bc1fb2c4125e6f561049eccf6f1fd11b103554f907e12659202d', 'e25cfed76403c0552224bfd6a829de778fbe407edbe4daad82fd22f3d600890cfabd5741352e3f06b2a074f6a25edcfdc6b2457fd06520b0bfb385475fc88361', 6, 1, 'Amit Patel is a Right hand batsman with the ability to do keeping . He has tremendous performance all over India. You cannot ignore his contribution to team of each state .So let''s do not forget the Amit ', 'a79eaa3f7918e2bbcabdd4b7c93c8c1d7fba0c5b.png'),
(15, 'Sachin', 'sachin@rids.in', 'Allahabad', 1, '2', '1965-04-17', 'a0fca25b01cfbe90640d72af8fca0e4b8300e7c204863c9650497cbebf2c6ef1e83930f9dd018c515c157b420be1dcfedd9203fe8957291898ff49fa2f2d2ba3', 'facd943fbca5f2b4208173733a0eeead00dc66afa39a31921e6b51126492975b0c343608be3d6a97ff79d2098b3a960b407c9cfab21d04a7dec275c8376b52ec', 15, 1, 'Sachin is great left hand batsman .He is not so good as batting and bowling so it may be hitting to put him in outfield.', 'fed976566f206cad70c9ad380213ac67272e4f72.jpg'),
(16, 'Sunil', 'sunil@rids.in', 'haryana', 1, '3', '1950-01-12', 'ec0774f869e17b5a7ebf2eae71413113aa876a6ea7b3acf30257ace9397ad802f3c80bb2b541ceba0ea797e456b9bf4e2f9b3c0d2da6698137ec79e5789665b9', 'e7f1632b531d1e526ccb36aad4ba921885f672ad29d797695c827e6d78433ee278ef18afb19c4e8c430bf2e57c01e84624b390e045c3a5f49029883d60fe5db1', 16, 1, '', 'af459069d5ecb1d06b648b9c2df92288eccebb8d.png'),
(17, 'Neha', 'neha@rids.in', 'Karnal', 0, '4', '1950-01-12', '4fe485e7a619c07e0e30ace55ba21b80dbf966aaff9aa732b341f4190c5a0b151eacdf64540be93776854e3441254407f10288aa7e55a6c6cc2404849e3ad8ee', '391c18a9efb1d05881b5014f4c62f250f5f4042b6ececace1a66be6586ed1ef94960bd9c51b5aac6f4115af97bfc4cdf6b36842c8f821af2cf82a3374b924628', 17, 2, '', 'pic.jpg'),
(19, 'Nilesh', 'nilesh@rids.in', 'Banaras', 1, '4', '1950-01-12', '38da6f32d019c84f73e1434d3ae06b132a9d4a91840baf1ae8ebc4c535c10bdb6ea381a38da7bcaab37069461014cd7c49a7e8348a22cbcbcd5843e9793d3637', '525c8e6ecbd42cbd9030caf616d2a2849e89ce3e50bf26ca924aec6654e66cd5fad2b9f599d2009ed73dee00cb3640b23bd340b068d878900065579c09a89393', 19, 2, '', 'pic.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `matches` int(11) NOT NULL,
  `innings` int(11) NOT NULL,
  `runs` int(11) NOT NULL,
  `wickets` int(11) NOT NULL,
  `best_player_awards` int(5) NOT NULL,
  `highest` int(3) NOT NULL,
  `lowest` int(1) NOT NULL,
  `match_awards` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tm_name` varchar(30) NOT NULL,
  `location` varchar(50) NOT NULL,
  `history` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `tm_name`, `location`, `history`) VALUES
(1, 'Khandwa', '', 'Khandwa is known for its sweetness and will be ever known even if there is none because a thing property does not change its man.'),
(2, 'Bhannaur', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE IF NOT EXISTS `tournaments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tour_name` varchar(50) NOT NULL,
  `start_day` date NOT NULL,
  `final` date NOT NULL,
  `participants` text NOT NULL,
  `venue` varchar(50) NOT NULL,
  `gid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `total_tm` int(3) NOT NULL,
  `prize` int(11) NOT NULL,
  `winner` varchar(50) NOT NULL,
  `runner` varchar(50) NOT NULL,
  `best_player` int(11) NOT NULL,
  `year` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`id`, `tour_name`, `start_day`, `final`, `participants`, `venue`, `gid`, `pid`, `total_tm`, `prize`, `winner`, `runner`, `best_player`, `year`) VALUES
(1, 'Over 15 Cup', '0000-00-00', '0000-00-00', '', '', 0, 0, 0, 0, '', '', 0, '0000-00-00'),
(2, 'Under 15 Cup', '0000-00-00', '0000-00-00', '', '', 1, 16, 40, 0, '', '', 0, '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
