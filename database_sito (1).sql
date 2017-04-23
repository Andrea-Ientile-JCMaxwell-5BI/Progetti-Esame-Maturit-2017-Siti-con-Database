-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 23, 2017 alle 18:22
-- Versione del server: 10.1.21-MariaDB
-- Versione PHP: 7.1.1

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
-- Struttura della tabella `alunni`
--

CREATE TABLE `alunni` (
  `id_alunno` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `data_nascita` date NOT NULL,
  `codice_fiscale` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `alunni`
--

INSERT INTO `alunni` (`id_alunno`, `id_classe`, `nome`, `cognome`, `data_nascita`, `codice_fiscale`) VALUES
(1, 1, 'Alessandro', 'Ientile', '2017-04-17', 'vfdsgdfghdsf43');

-- --------------------------------------------------------

--
-- Struttura della tabella `appartengono`
--

CREATE TABLE `appartengono` (
  `id_appartengono` int(11) NOT NULL,
  `id_professore` int(11) NOT NULL,
  `id_classe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `appartengono`
--

INSERT INTO `appartengono` (`id_appartengono`, `id_professore`, `id_classe`) VALUES
(1, 1, 2),
(0, 1, 3),
(0, 2, 1),
(2, 2, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `classi`
--

CREATE TABLE `classi` (
  `id_classe` int(11) NOT NULL,
  `aula` varchar(255) DEFAULT NULL,
  `indirizzo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `classi`
--

INSERT INTO `classi` (`id_classe`, `aula`, `indirizzo`) VALUES
(1, '3B', 'Artistico'),
(2, '4C', 'Scientifico'),
(3, '1E', 'Informatico'),
(4, '5B', 'Telecomunicazioni');

-- --------------------------------------------------------

--
-- Struttura della tabella `distribuiscono`
--

CREATE TABLE `distribuiscono` (
  `id_distribuiscono` int(11) NOT NULL,
  `id_voto` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `domande`
--

CREATE TABLE `domande` (
  `id_domanda` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `tipologia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `insegnano`
--

CREATE TABLE `insegnano` (
  `id_insegnano` int(11) NOT NULL,
  `id_professore` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `materie`
--

CREATE TABLE `materie` (
  `id_materia` int(11) NOT NULL,
  `nome_materia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `professori`
--

CREATE TABLE `professori` (
  `id_professore` int(11) NOT NULL,
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
(1, 'andrea', 'ientile', '1997-09-24', 'ienti', 'esame'),
(2, 'pappa', 'clown', '1998-01-01', 'andre', 'fesso');

-- --------------------------------------------------------

--
-- Struttura della tabella `voti`
--

CREATE TABLE `voti` (
  `id_alunno` int(11) NOT NULL,
  `id_voto` int(11) NOT NULL,
  `valutazione` float(2,1) NOT NULL,
  `tipologia` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `alunni`
--
ALTER TABLE `alunni`
  ADD PRIMARY KEY (`id_alunno`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Indici per le tabelle `appartengono`
--
ALTER TABLE `appartengono`
  ADD PRIMARY KEY (`id_professore`,`id_classe`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Indici per le tabelle `classi`
--
ALTER TABLE `classi`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indici per le tabelle `distribuiscono`
--
ALTER TABLE `distribuiscono`
  ADD PRIMARY KEY (`id_voto`,`id_materia`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indici per le tabelle `domande`
--
ALTER TABLE `domande`
  ADD PRIMARY KEY (`id_domanda`),
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
-- Indici per le tabelle `voti`
--
ALTER TABLE `voti`
  ADD PRIMARY KEY (`id_voto`),
  ADD KEY `id_alunno` (`id_alunno`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `alunni`
--
ALTER TABLE `alunni`
  MODIFY `id_alunno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT per la tabella `classi`
--
ALTER TABLE `classi`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `domande`
--
ALTER TABLE `domande`
  MODIFY `id_domanda` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `professori`
--
ALTER TABLE `professori`
  MODIFY `id_professore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `voti`
--
ALTER TABLE `voti`
  MODIFY `id_voto` int(11) NOT NULL AUTO_INCREMENT;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `alunni`
--
ALTER TABLE `alunni`
  ADD CONSTRAINT `alunni_ibfk_1` FOREIGN KEY (`id_classe`) REFERENCES `classi` (`id_classe`);

--
-- Limiti per la tabella `appartengono`
--
ALTER TABLE `appartengono`
  ADD CONSTRAINT `appartengono_ibfk_1` FOREIGN KEY (`id_professore`) REFERENCES `professori` (`id_professore`),
  ADD CONSTRAINT `appartengono_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classi` (`id_classe`);

--
-- Limiti per la tabella `distribuiscono`
--
ALTER TABLE `distribuiscono`
  ADD CONSTRAINT `distribuiscono_ibfk_1` FOREIGN KEY (`id_voto`) REFERENCES `voti` (`id_voto`),
  ADD CONSTRAINT `distribuiscono_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materie` (`id_materia`);

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

--
-- Limiti per la tabella `voti`
--
ALTER TABLE `voti`
  ADD CONSTRAINT `voti_ibfk_1` FOREIGN KEY (`id_alunno`) REFERENCES `alunni` (`id_alunno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
