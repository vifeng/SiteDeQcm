

-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mar 10 Mai 2016 à 12:22
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ProjetQcm`
--
DROP DATABASE IF EXISTS `ProjetQcm`;
CREATE DATABASE IF NOT EXISTS `ProjetQcm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ProjetQcm`;

-- --------------------------------------------------------



--
-- Structure de la table `Statut`
--

DROP TABLE IF EXISTS `Statut`;
CREATE TABLE IF NOT EXISTS `Statut` (
  `idStatut` smallint(5)  NOT NULL AUTO_INCREMENT,
  `statut` varchar(255) NOT NULL,
  PRIMARY KEY (`idStatut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure de la table `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (
  `idUser` smallint(5)  NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `idStatut` smallint(5)  NOT NULL,
  PRIMARY KEY (`idUser`),
  CONSTRAINT FK_USEidStatut FOREIGN KEY (idStatut) REFERENCES Statut (idStatut)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `Theme`
--

DROP TABLE IF EXISTS `Theme`;
CREATE TABLE IF NOT EXISTS `Theme` (
  `idTheme` smallint(5)  NOT NULL AUTO_INCREMENT,
  `theme` varchar(255) NOT NULL,
  PRIMARY KEY (`idTheme`),
  UNIQUE KEY (`theme`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




--
-- Structure de la table `Question`
--


DROP TABLE IF EXISTS `Question`;
CREATE TABLE IF NOT EXISTS `Question` (
  `idQuestion` smallint(5)  NOT NULL AUTO_INCREMENT,
  `Question` varchar(255) NOT NULL,
  `idProf` smallint(5)  NOT NULL,
  `idTheme` smallint(5)  NOT NULL,
  PRIMARY KEY (`idQuestion`),
  UNIQUE KEY (`question`),
  CONSTRAINT FK_QUEidProf FOREIGN KEY (idProf) REFERENCES User (idUser),
  CONSTRAINT FK_QUEidTheme FOREIGN KEY (idTheme) REFERENCES Theme (idTheme)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




--
-- Structure de la table `Reponse`
--

DROP TABLE IF EXISTS `Reponse`;
CREATE TABLE IF NOT EXISTS `Reponse` (
  `idReponse` smallint(5)  NOT NULL AUTO_INCREMENT,
  `idQuestion` smallint(5)  NOT NULL,
  `reponse` varchar(255)  NOT NULL,
  `statutReponse` varchar(4)  NOT NULL,
  `idTheme` smallint(5)  NOT NULL,
  PRIMARY KEY (`idReponse`),
  CONSTRAINT FK_REPidQuestion FOREIGN KEY (idQuestion) REFERENCES Question (idQuestion) ON UPDATE CASCADE ON DELETE CASCADE,
  CONSTRAINT FK_REPidTheme FOREIGN KEY (idTheme) REFERENCES Theme (idTheme)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `QCM`
--

DROP TABLE IF EXISTS `QCM`;
CREATE TABLE IF NOT EXISTS `QCM` (
  `idQcm` smallint(5)  NOT NULL AUTO_INCREMENT,
  `TitreQcm` varchar(255)  NOT NULL,
  `idTheme` smallint(5)  NOT NULL,  
  PRIMARY KEY (`idQcm`),
  UNIQUE KEY (`TitreQcm`),
  CONSTRAINT FK_QCMidTheme FOREIGN KEY (idTheme) REFERENCES Theme (idTheme)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `FAITQCM`
--

DROP TABLE IF EXISTS `FAITQCM`;
CREATE TABLE IF NOT EXISTS `FAITQCM` (
  `idFaitQcm` smallint(5)  NOT NULL AUTO_INCREMENT,
  `idQcm` smallint(5)  NOT NULL,
  `DateLimite` date NOT NULL,
  `idQuestion` smallint(5)  NOT NULL,
  PRIMARY KEY (`idFaitQcm`, `idQcm`, `idQuestion`),
  CONSTRAINT FK_QCMidQcm FOREIGN KEY (idQcm) REFERENCES QCM (idQcm),
  CONSTRAINT FK_QCMidQuestion FOREIGN KEY (idQuestion) REFERENCES Question (idQuestion) ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Structure de la table `Resultat`
--

DROP TABLE IF EXISTS `Resultat`;
CREATE TABLE IF NOT EXISTS `Resultat` (
  `idEleve` smallint(5)  NOT NULL,
  `idQcm` smallint(5)  NOT NULL,
  `idReponse` smallint(5)  NOT NULL,
  `points` smallint(5)  NOT NULL,
  PRIMARY KEY (`idEleve`, `idQcm`, `idReponse`),
  CONSTRAINT FK_RESidEleve FOREIGN KEY (idEleve) REFERENCES User (idUser),
  CONSTRAINT FK_RESidQcm FOREIGN KEY (idQcm) REFERENCES FAITQCM (idQcm),
  CONSTRAINT FK_RESidReponse FOREIGN KEY (idReponse) REFERENCES Reponse (idReponse)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
