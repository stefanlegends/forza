-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 18 jan 2017 om 21:17
-- Serverversie: 5.7.14
-- PHP-versie: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toolsforever`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fabriek`
--

CREATE TABLE `fabriek` (
  `fabriekscode` int(7) NOT NULL,
  `fabriek` varchar(30) NOT NULL,
  `telefoon` varchar(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `fabriek`
--

INSERT INTO `fabriek` (`fabriekscode`, `fabriek`, `telefoon`) VALUES
(2, 'Worx', '+3108518924'),
(3, 'Stanley', '+12166064024'),
(1, 'Hitachi', '+864382325229');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `locatie`
--

CREATE TABLE `locatie` (
  `locatiecode` int(4) NOT NULL,
  `locatie` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `locatie`
--

INSERT INTO `locatie` (`locatiecode`, `locatie`) VALUES
(1, 'Rotterdam'),
(2, 'Almere'),
(3, 'Eindhoven');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE `product` (
  `productcode` int(10) NOT NULL,
  `product` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `fabriekscode` int(7) NOT NULL,
  `inkoopprijs` decimal(7,0) NOT NULL,
  `verkoopprijs` decimal(7,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `product`
--

INSERT INTO `product` (`productcode`, `product`, `type`, `fabriekscode`, `inkoopprijs`, `verkoopprijs`) VALUES
(1, 'Accuboor', 'WX66', 2, '70', '112'),
(2, 'Kettingzaag', 'ZL752', 1, '90', '135'),
(3, 'Steeksleutelset', 'ST699', 3, '35', '50');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `voorraad`
--

CREATE TABLE `voorraad` (
  `productcode` int(10) NOT NULL,
  `aantal` int(5) NOT NULL,
  `locatiecode` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `voorraad`
--

INSERT INTO `voorraad` (`productcode`, `aantal`, `locatiecode`) VALUES
(1, 23, 1),
(2, 12, 2);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `fabriek`
--
ALTER TABLE `fabriek`
  ADD PRIMARY KEY (`fabriekscode`);

--
-- Indexen voor tabel `locatie`
--
ALTER TABLE `locatie`
  ADD PRIMARY KEY (`locatiecode`);

--
-- Indexen voor tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productcode`),
  ADD KEY `fabriekscode` (`fabriekscode`);

--
-- Indexen voor tabel `voorraad`
--
ALTER TABLE `voorraad`
  ADD KEY `productcode` (`productcode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
