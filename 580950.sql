-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Hoszt: localhost
-- Létrehozás ideje: 2013. Már 17. 17:54
-- Szerver verzió: 5.5.30
-- PHP verzió: 5.4.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `580950`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához: `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- A tábla adatainak kiíratása `category`
--

INSERT INTO `category` (`id`, `name`, `date`, `active`) VALUES
(15, 'KategÃ³ria 1', '2013-03-17 00:29:44', 1),
(16, 'KategÃ³ria 2', '2013-03-17 00:29:58', 0),
(17, 'KategÃ³ria 3', '2013-03-17 00:38:26', 1),
(18, 'TesztkategÃ³ria', '2013-03-17 19:56:53', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához: `categoryassign`
--

CREATE TABLE IF NOT EXISTS `categoryassign` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productid` int(10) unsigned NOT NULL,
  `categoryid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `productid` (`productid`,`categoryid`),
  KEY `categoryid` (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- A tábla adatainak kiíratása `categoryassign`
--

INSERT INTO `categoryassign` (`id`, `productid`, `categoryid`) VALUES
(65, 56, 17),
(63, 60, 15),
(64, 60, 17),
(86, 61, 15),
(87, 61, 18);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához: `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `info` text,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- A tábla adatainak kiíratása `product`
--

INSERT INTO `product` (`id`, `name`, `info`, `image`, `active`) VALUES
(56, 'TermÃ©k 1', 'Az elsÅ‘ termÃ©k leÃ­rÃ¡sa', '4d813a41f7ab5.jpg', 1),
(57, 'TermÃ©k 2', 'A termÃ©k 2 leÃ­rÃ¡sa', '', 0),
(60, 'TermÃ©k 3', 'A HARMADIK termÃ©k leÃ­rÃ¡sa', '', 1),
(61, 'Test TermÃ©k', 'Teszt TermÃ©k InfÃ³', '4d824fb83ae2d.jpg', 1);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `categoryassign`
--
ALTER TABLE `categoryassign`
  ADD CONSTRAINT `categoryassign_ibfk_3` FOREIGN KEY (`productid`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categoryassign_ibfk_4` FOREIGN KEY (`categoryid`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
