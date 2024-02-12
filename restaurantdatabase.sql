-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Gegenereerd op: 05 feb 2024 om 12:24
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurantdatabase`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `besteldeitems`
--

CREATE TABLE `besteldeitems` (
  `BesteldeItemID` int(11) NOT NULL,
  `Bonnr` int(11) DEFAULT NULL,
  `Aantal` int(11) DEFAULT NULL,
  `Omschrijving` varchar(255) DEFAULT NULL,
  `PrijsPerEenheid` decimal(10,2) DEFAULT NULL,
  `Totaal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bonnen`
--

CREATE TABLE `bonnen` (
  `Bonnr` int(11) NOT NULL,
  `Datum` date DEFAULT NULL,
  `Tijd` time DEFAULT NULL,
  `Tafel` int(11) DEFAULT NULL,
  `Afdeling` varchar(50) DEFAULT NULL,
  `TotaalBedrag` decimal(10,2) DEFAULT NULL,
  `BTWPercentage` decimal(5,2) DEFAULT NULL,
  `InclBTW` decimal(10,2) DEFAULT NULL,
  `ExclBTW` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klanten`
--

CREATE TABLE `klanten` (
  `KlantID` int(11) NOT NULL,
  `KlantNaam` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reserveringen`
--

CREATE TABLE `reserveringen` (
  `ReserveringsID` int(11) NOT NULL,
  `Tijdslot` datetime DEFAULT NULL,
  `TafelNummer` int(11) DEFAULT NULL,
  `KlantNaam` varchar(100) DEFAULT NULL,
  `KlantID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `besteldeitems`
--
ALTER TABLE `besteldeitems`
  ADD PRIMARY KEY (`BesteldeItemID`),
  ADD KEY `Bonnr` (`Bonnr`);

--
-- Indexen voor tabel `bonnen`
--
ALTER TABLE `bonnen`
  ADD PRIMARY KEY (`Bonnr`);

--
-- Indexen voor tabel `klanten`
--
ALTER TABLE `klanten`
  ADD PRIMARY KEY (`KlantID`);

--
-- Indexen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD PRIMARY KEY (`ReserveringsID`),
  ADD KEY `KlantID` (`KlantID`);

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `besteldeitems`
--
ALTER TABLE `besteldeitems`
  ADD CONSTRAINT `besteldeitems_ibfk_1` FOREIGN KEY (`Bonnr`) REFERENCES `bonnen` (`Bonnr`) ON DELETE CASCADE;

--
-- Beperkingen voor tabel `reserveringen`
--
ALTER TABLE `reserveringen`
  ADD CONSTRAINT `reserveringen_ibfk_1` FOREIGN KEY (`KlantID`) REFERENCES `klanten` (`KlantID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
