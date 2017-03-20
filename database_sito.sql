-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Creato il: Mar 20, 2017 alle 09:42
-- Versione del server: 10.1.16-MariaDB
-- Versione PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_sito`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `appartengono`
--

CREATE TABLE `appartengono` (
  `id_appartengono` varchar(255) DEFAULT NULL,
  `id_classe` varchar(255) NOT NULL,
  `id_professore` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `classi`
--

CREATE TABLE `classi` (
  `id_classe` varchar(255) NOT NULL,
  `aula` varchar(255) DEFAULT NULL,
  `n_alunni` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `domande`
--

CREATE TABLE `domande` (
  `id_materia` varchar(255) DEFAULT NULL,
  `id_domande` varchar(255) NOT NULL,
  `tipo_domande` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `insegnano`
--

CREATE TABLE `insegnano` (
  `id_professore` varchar(255) NOT NULL,
  `id_materia` varchar(255) NOT NULL,
  `id_insegnano` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE `materie` (
  `id_materia` varchar(255) NOT NULL,
  `nome_materia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `professori`
--

CREATE TABLE `professori` (
  `id_professore` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `data_nascita` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `professori`
--

INSERT INTO `professori` (`id_professore`, `nome`, `cognome`, `data_nascita`, `username`, `password`) VALUES
('1', 'Andrea', 'Ientile', '1997-09-24', 'andrea', 'ientile');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `appartengono`
--
ALTER TABLE `appartengono`
  ADD PRIMARY KEY (`id_classe`,`id_professore`),
  ADD KEY `id_professore` (`id_professore`);

--
-- Indici per le tabelle `classi`
--
ALTER TABLE `classi`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indici per le tabelle `domande`
--
ALTER TABLE `domande`
  ADD PRIMARY KEY (`id_domande`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indici per le tabelle `insegnano`
--
ALTER TABLE `insegnano`
  ADD PRIMARY KEY (`id_professore`,`id_materia`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indici per le tabelle `materie`
--
ALTER TABLE `materie`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indici per le tabelle `professori`
--
ALTER TABLE `professori`
  ADD PRIMARY KEY (`id_professore`);

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `appartengono`
--
ALTER TABLE `appartengono`
  ADD CONSTRAINT `appartengono_ibfk_1` FOREIGN KEY (`id_classe`) REFERENCES `classi` (`id_classe`),
  ADD CONSTRAINT `appartengono_ibfk_2` FOREIGN KEY (`id_professore`) REFERENCES `professori` (`id_professore`);

--
-- Limiti per la tabella `domande`
--
ALTER TABLE `domande`
  ADD CONSTRAINT `domande_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materie` (`id_materia`);

--
-- Limiti per la tabella `insegnano`
--
ALTER TABLE `insegnano`
  ADD CONSTRAINT `insegnano_ibfk_1` FOREIGN KEY (`id_professore`) REFERENCES `professori` (`id_professore`),
  ADD CONSTRAINT `insegnano_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materie` (`id_materia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
