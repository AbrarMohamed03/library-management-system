-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2022 at 06:46 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bibliotheque`
--

-- --------------------------------------------------------

--
-- Table structure for table `domaine`
--

CREATE TABLE `domaine` (
  `code_domaine` int(11) NOT NULL,
  `nom_domaine` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domaine`
--

INSERT INTO `domaine` (`code_domaine`, `nom_domaine`) VALUES
(1, 'Littérature'),
(2, 'Religieux'),
(3, 'Politique'),
(4, 'Scientifique'),
(5, 'Philosophie'),
(6, 'Arts');

-- --------------------------------------------------------

--
-- Table structure for table `exemplaire`
--

CREATE TABLE `exemplaire` (
  `code_exemplaire` int(11) NOT NULL,
  `annee_achat` int(11) DEFAULT NULL,
  `prix_achat` float DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL,
  `code_livre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `langue`
--

CREATE TABLE `langue` (
  `code_langue` int(11) NOT NULL,
  `nom_langue` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `langue`
--

INSERT INTO `langue` (`code_langue`, `nom_langue`) VALUES
(1, 'Arabe'),
(2, 'Anglais'),
(3, 'Francais');

-- --------------------------------------------------------

--
-- Table structure for table `livre`
--

CREATE TABLE `livre` (
  `code_livre` int(11) NOT NULL,
  `titre` varchar(90) DEFAULT NULL,
  `auteur` varchar(90) DEFAULT NULL,
  `annee_edition` int(11) DEFAULT NULL,
  `editeur` varchar(90) DEFAULT NULL,
  `photo` blob DEFAULT NULL,
  `code_langue` int(11) DEFAULT NULL,
  `code_domaine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `code_membre` int(11) NOT NULL,
  `nom` varchar(80) DEFAULT NULL,
  `prenom` varchar(80) DEFAULT NULL,
  `adresse` varchar(80) DEFAULT NULL,
  `ville` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `tel` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`code_membre`, `nom`, `prenom`, `adresse`, `ville`, `email`, `tel`) VALUES
(1, 'Bardoud', 'Zine-eddine', 'Sidi Youssef', 'Agadir', 'zine-eddine@email.com', '0606060606'),
(2, 'Abrar', 'Mouhamed', 'Drarga', 'Agadir', 'mouhamed@email.com', '0707070707');

-- --------------------------------------------------------

--
-- Table structure for table `pret`
--

CREATE TABLE `pret` (
  `code_exemplaire` int(11) NOT NULL,
  `code_membre` int(11) NOT NULL,
  `date_pret` date NOT NULL,
  `date_retour` date DEFAULT NULL,
  `remarque` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`code_domaine`);

--
-- Indexes for table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD PRIMARY KEY (`code_exemplaire`),
  ADD KEY `code_livre` (`code_livre`);

--
-- Indexes for table `langue`
--
ALTER TABLE `langue`
  ADD PRIMARY KEY (`code_langue`);

--
-- Indexes for table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`code_livre`),
  ADD KEY `code_langue` (`code_langue`),
  ADD KEY `code_domaine` (`code_domaine`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`code_membre`);

--
-- Indexes for table `pret`
--
ALTER TABLE `pret`
  ADD PRIMARY KEY (`code_exemplaire`,`code_membre`,`date_pret`),
  ADD KEY `code_membre` (`code_membre`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exemplaire`
--
ALTER TABLE `exemplaire`
  ADD CONSTRAINT `exemplaire_ibfk_1` FOREIGN KEY (`code_livre`) REFERENCES `livre` (`code_livre`);

--
-- Constraints for table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`code_langue`) REFERENCES `langue` (`code_langue`),
  ADD CONSTRAINT `livre_ibfk_2` FOREIGN KEY (`code_domaine`) REFERENCES `domaine` (`code_domaine`);

--
-- Constraints for table `pret`
--
ALTER TABLE `pret`
  ADD CONSTRAINT `pret_ibfk_1` FOREIGN KEY (`code_exemplaire`) REFERENCES `exemplaire` (`code_exemplaire`),
  ADD CONSTRAINT `pret_ibfk_2` FOREIGN KEY (`code_membre`) REFERENCES `membre` (`code_membre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
