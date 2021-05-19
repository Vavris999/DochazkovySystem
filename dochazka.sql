-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Stř 19. kvě 2021, 22:48
-- Verze serveru: 10.1.19-MariaDB
-- Verze PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `dochazka`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `dochazka`
--

CREATE TABLE `dochazka` (
  `prichodDoPrace` datetime NOT NULL,
  `odchodZPrace` datetime NOT NULL,
  `prichodKLekari` datetime DEFAULT NULL,
  `odchodOdLekare` datetime DEFAULT NULL,
  `prichodNaObed` datetime DEFAULT NULL,
  `odchodZObedu` datetime DEFAULT NULL,
  `idOsoba` int(11) NOT NULL,
  `idDochazka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `osoba`
--

CREATE TABLE `osoba` (
  `idOsoba` int(11) NOT NULL,
  `jmeno` varchar(45) NOT NULL,
  `prijmeni` varchar(45) NOT NULL,
  `idPozice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktura tabulky `pozice`
--

CREATE TABLE `pozice` (
  `idPozice` int(11) NOT NULL,
  `Nazev` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `dochazka`
--
ALTER TABLE `dochazka`
  ADD PRIMARY KEY (`idDochazka`),
  ADD KEY `fk_Dochazka_Osoba_idx` (`idOsoba`);

--
-- Klíče pro tabulku `osoba`
--
ALTER TABLE `osoba`
  ADD PRIMARY KEY (`idOsoba`),
  ADD KEY `fk_Osoba_Titul1_idx` (`idPozice`);

--
-- Klíče pro tabulku `pozice`
--
ALTER TABLE `pozice`
  ADD PRIMARY KEY (`idPozice`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `dochazka`
--
ALTER TABLE `dochazka`
  MODIFY `idDochazka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pro tabulku `osoba`
--
ALTER TABLE `osoba`
  MODIFY `idOsoba` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pro tabulku `pozice`
--
ALTER TABLE `pozice`
  MODIFY `idPozice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `dochazka`
--
ALTER TABLE `dochazka`
  ADD CONSTRAINT `fk_Dochazka_Osoba` FOREIGN KEY (`idOsoba`) REFERENCES `osoba` (`idOsoba`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Omezení pro tabulku `osoba`
--
ALTER TABLE `osoba`
  ADD CONSTRAINT `fk_Osoba_Titul1` FOREIGN KEY (`idPozice`) REFERENCES `pozice` (`idPozice`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
