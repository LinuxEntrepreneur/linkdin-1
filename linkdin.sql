-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2015 at 11:32 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webtutplus_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `linkdin`
--

CREATE TABLE IF NOT EXISTS `linkdin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `head_line` varchar(200) NOT NULL,
  `url` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `linkdin`
--

INSERT INTO `linkdin` (`id`, `first_name`, `last_name`, `head_line`, `url`) VALUES
(11, 'nilmadhab', 'mondal', 'web team head at Kshitij, IIT Kharagpur', 'https://media.licdn.com/mpr/mprx/0_7gs2T4cJJaWd66UkLgG2W4O4jWGN5bR5WwaCFS14g4LzhcR5exCu5wgJsxWz5cHWh283f7tMl74v6imW6axrW20vq74q6ix55axfCDoZ0mDZ2zkJdxdTGMXWNVGX7iHN2SRhL0PcQVH'),
(12, '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
