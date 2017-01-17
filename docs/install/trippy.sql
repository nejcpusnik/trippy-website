-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Gostitelj: localhost:3306
-- Čas nastanka: 15. jan 2017 ob 13.58
-- Različica strežnika: 5.5.45-cll-lve
-- Različica PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Zbirka podatkov: `marecare_trippy`
--

-- --------------------------------------------------------

--
-- Struktura tabele `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Odloži podatke za tabelo `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(3);

-- --------------------------------------------------------

--
-- Struktura tabele `Places`
--

CREATE TABLE IF NOT EXISTS `Places` (
  `idPlaces` int(11) NOT NULL AUTO_INCREMENT,
  `placeName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `Regions_idRegions` int(11) NOT NULL,
  `googleName` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idPlaces`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Odloži podatke za tabelo `Places`
--

INSERT INTO `Places` (`idPlaces`, `placeName`, `Regions_idRegions`, `googleName`) VALUES
(1, 'Bled', 1, 'Bled, Slovenia'),
(2, 'Bohinj', 1, 'Bohinj, Slovenia'),
(3, 'Logarska dolina', 1, 'Logarska dolina, Mozirje, Slovenia'),
(4, 'Piran', 3, 'Piran, Slovenia'),
(5, 'Otočec', 4, 'Otočec, Slovenia'),
(6, 'Lendava', 2, 'Lendava, Slovenija'),
(7, 'Pohorje', 2, 'Pohorje, Slovenia'),
(8, 'Rogla', 5, 'Rogla, Slovenija');

-- --------------------------------------------------------

--
-- Struktura tabele `Places1`
--

CREATE TABLE IF NOT EXISTS `Places1` (
  `idPlaces` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `placeName` varchar(45) NOT NULL,
  `googleName` varchar(255) NOT NULL,
  `Regions_idRegions` int(11) NOT NULL,
  PRIMARY KEY (`idPlaces`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `Regions`
--

CREATE TABLE IF NOT EXISTS `Regions` (
  `idRegions` int(11) NOT NULL AUTO_INCREMENT,
  `regionName` varchar(45) CHARACTER SET utf8 NOT NULL,
  `regionDescription` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`idRegions`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Odloži podatke za tabelo `Regions`
--

INSERT INTO `Regions` (`idRegions`, `regionName`, `regionDescription`) VALUES
(1, 'Gorenjska', 'Gorenjska description. '),
(2, 'Štajerska', 'Štajerska description.B'),
(3, 'Primorska', 'Primorska description.C'),
(4, 'Dolenjska', 'Dolenjska description.D'),
(5, 'Koroška', 'Koroška description.E'),
(6, 'Notranjska', 'Notranjska description.');

-- --------------------------------------------------------

--
-- Struktura tabele `Regions1`
--

CREATE TABLE IF NOT EXISTS `Regions1` (
  `idRegions` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `regionName` varchar(45) NOT NULL,
  `regionDescription` text NOT NULL,
  PRIMARY KEY (`idRegions`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabele `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) CHARACTER SET utf8 NOT NULL,
  `username` varchar(45) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Odloži podatke za tabelo `Users`
--

INSERT INTO `Users` (`idUsers`, `email`, `username`, `password`, `type`) VALUES
(1, 'admin@trippy.si', 'admin', 'bf535ad6f0fcb2d9d7bfadb7473adc1f0ee2c21c088f5bfdf5fa939af512189d', 1),
(2, 'test@test.si', 'test', '5640d1b6f21e0e0feb39ecdab0c7fc5b1f6652d3061304cb27f66a8e2e10a207', 0);

-- --------------------------------------------------------

--
-- Struktura tabele `Users1`
--

CREATE TABLE IF NOT EXISTS `Users1` (
  `idUsers` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`idUsers`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
