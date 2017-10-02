-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2017 at 09:51 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `videos`
--
CREATE DATABASE IF NOT EXISTS `videos` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `videos`;

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE IF NOT EXISTS `anime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `episode` int(11) NOT NULL,
  `format` varchar(4) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'anime',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `anime`
--

INSERT INTO `anime` (`id`, `name`, `date`, `episode`, `format`, `type`) VALUES
(1, 'Haikyuu S3', '2017-03-03', 10, 'mkv', 'anime'),
(2, 'Kuroko no Basket S1', '2017-03-03', 25, 'mkv', 'anime'),
(3, 'Psycho Pass S2', '2017-03-03', 11, 'mkv', 'anime'),
(4, 'Parasyte Maxim', '2017-03-03', 24, 'mkv', 'anime'),
(5, 'Gintama S1', '2017-03-03', 49, 'mp4', 'anime'),
(6, 'Gosick', '2017-03-03', 24, 'mkv', 'anime'),
(7, 'Tonari no Kaibutsu', '2017-03-03', 13, 'mkv', 'anime'),
(10, 'My Hero Academia S1', '2017-04-09', 13, 'mkv', 'anime'),
(11, 'Yamada and the Seven Witches', '2017-04-15', 12, 'mkv', 'anime'),
(12, 'Kyoukai no Kanata', '2017-04-15', 12, 'mp4', 'anime'),
(13, 'Kuroko no Basket S2', '2017-06-22', 26, 'mkv', 'anime'),
(14, 'Kuroko no Basket S3', '2017-06-22', 25, 'mkv', 'anime'),
(15, 'Irregular at Magic High School', '2017-06-22', 26, 'mkv', 'anime'),
(16, 'Himouto Umaru-chan', '2017-07-24', 12, 'mkv', 'anime'),
(17, 'ReZERO Starting Life in Another World', '2017-07-24', 25, 'mkv', 'anime'),
(18, 'My Hero Academia S2', '2017-07-24', 16, 'mkv', 'anime'),
(19, 'Bungou Stray Dogs', '2017-07-24', 24, 'mkv', 'anime');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `lang` varchar(50) NOT NULL,
  `format` varchar(4) NOT NULL DEFAULT 'mp4',
  `type` varchar(100) NOT NULL DEFAULT 'movies',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `date`, `lang`, `format`, `type`) VALUES
(1, 'Moana', '2017-03-11', 'english', 'mp4', 'movies'),
(2, 'Doctor Strange', '2017-03-11', 'english', 'mp4', 'movies'),
(3, 'Storks', '2017-03-11', 'english', 'mp4', 'movies'),
(5, 'A Street Cat Named Bob', '2017-03-11', 'english', 'mp4', 'movies'),
(8, 'Logan', '2017-03-03', 'english', 'mkv', 'movies'),
(9, 'The Intern', '2017-04-19', 'english', 'mp4', 'movies'),
(10, 'The Fate of the Furious', '2017-06-21', 'english', 'mkv', 'movies'),
(11, 'Power Rangers', '2017-06-21', 'english', 'mp4', 'movies'),
(12, 'Capture the Flag', '2017-06-22', 'english', 'mp4', 'movies'),
(14, 'Leap!', '2017-06-22', 'english', 'mp4', 'movies'),
(15, 'Sing', '2017-06-22', 'english', 'mp4', 'movies'),
(16, 'Rock Dog', '2017-07-24', 'english', 'mp4', 'movies'),
(17, 'The Boss Baby', '2017-07-24', 'english', 'mp4', 'movies'),
(19, 'Going in Style', '2017-07-29', 'english', 'mp4', 'movies');

-- --------------------------------------------------------

--
-- Table structure for table `television`
--

CREATE TABLE IF NOT EXISTS `television` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `episode` int(11) NOT NULL,
  `date` date NOT NULL,
  `format` varchar(4) NOT NULL,
  `type` varchar(100) NOT NULL DEFAULT 'television',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `television`
--

INSERT INTO `television` (`id`, `name`, `episode`, `date`, `format`, `type`) VALUES
(1, 'Sherlock S1', 3, '2017-03-12', 'avi', 'television'),
(2, 'Sherlock S2', 3, '2017-03-12', 'avi', 'television'),
(4, 'Sherlock S3', 3, '2017-03-12', 'mp4', 'television'),
(5, 'Sherlock S4', 3, '2017-03-12', 'mkv', 'television'),
(6, 'Silicon Valley S1', 8, '2017-03-13', 'mp4', 'television'),
(7, 'Silicon Valley S2', 8, '2017-03-14', 'mp4', 'television'),
(8, 'Silicon Valley S3', 10, '2017-03-18', 'mkv', 'television'),
(9, 'Iron Fist S1', 13, '2017-04-09', 'mkv', 'television');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
