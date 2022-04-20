-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 20 avr. 2022 à 20:51
-- Version du serveur : 5.7.36
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `matheo`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `addReservation`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addReservation` (IN `paramUtilId` INT, IN `paramNbrPerson` INT, IN `paramAdulte` INT, IN `paramEnfant` INT, IN `paramA` DATE, IN `paramD` DATE, IN `paramNumChambre` VARCHAR(255))  BEGIN
	INSERT INTO Reservation (util_id, nbreperson, adulte, enfant, date_A, date_D, numchambre)
	VALUES (paramUtilId, paramNbrPerson, paramAdulte, paramEnfant, paramA, paramD, paramNumChambre);
END$$

DROP PROCEDURE IF EXISTS `addUtil`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `addUtil` (IN `paramNom` VARCHAR(255), IN `paramPrenom` VARCHAR(255), IN `paramPass` VARCHAR(255), IN `paramMail` VARCHAR(255), IN `paramAdresse` VARCHAR(255), IN `paramTel` VARCHAR(255), IN `paramRole` VARCHAR(255))  BEGIN
	INSERT INTO utilisateur (nom, prenom, mdp, mail, adresse, telephone, role)
	VALUES (paramNom, paramPrenom, paramPass, paramMail, paramAdresse, paramTel, paramRole);
END$$

DROP PROCEDURE IF EXISTS `auth`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `auth` (IN `paramEmail` VARCHAR(255))  BEGIN
    SELECT * FROM 
    utilisateur WHERE mail=paramEmail;
END$$

DROP PROCEDURE IF EXISTS `chambreDispo`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `chambreDispo` ()  BEGIN
	SELECT chambreid FROM Chambre
	WHERE dispo = 0 
	ORDER BY chambreid ;
END$$

DROP PROCEDURE IF EXISTS `deleteReservation`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteReservation` (IN `paramId` INT)  BEGIN
	DELETE FROM Reservation
	WHERE id = paramId;	
END$$

DROP PROCEDURE IF EXISTS `recupAllUtilisateur`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `recupAllUtilisateur` ()  BEGIN
	SELECT id, nom, prenom FROM utilisateur 
    ORDER BY id;
END$$

DROP PROCEDURE IF EXISTS `recupReservation`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `recupReservation` (IN `paramId` INT)  BEGIN
	SELECT * FROM Reservation
	WHERE id = paramId;
END$$

DROP PROCEDURE IF EXISTS `recupReservationByUtil`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `recupReservationByUtil` (IN `paramId` INT)  BEGIN
	SELECT * FROM Reservation
	WHERE util_id = paramId;
END$$

DROP PROCEDURE IF EXISTS `recupReservations`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `recupReservations` ()  BEGIN
	SELECT * FROM reservation;
END$$

DROP PROCEDURE IF EXISTS `recupUtilisateur`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `recupUtilisateur` (IN `paramId` INT)  BEGIN
    SELECT * FROM 
    utilisateur WHERE id = paramId;
END$$

DROP PROCEDURE IF EXISTS `updateChambreDispo`$$
CREATE DEFINER=`prof1234`@`localhost` PROCEDURE `updateChambreDispo` (IN `paramDispo` INT, IN `paramChambreId` VARCHAR(255))  BEGIN
	UPDATE Chambre
	SET dispo = paramDispo
    WHERE chambreid = paramChambreId;
END$$

DROP PROCEDURE IF EXISTS `updateReservation`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateReservation` (IN `paramUtilId` INT, IN `paramNbrPerson` INT, IN `paramAdulte` INT, IN `paramEnfant` INT, IN `paramA` DATE, IN `paramD` DATE, IN `paramNumChambre` VARCHAR(255), IN `paramActuChambre` VARCHAR(255))  BEGIN
	UPDATE Reservation 
	SET util_id = paramUtilId, nbreperson = paramNbrPerson, adulte = paramAdulte, enfant = paramEnfant, date_A = paramA, date_D = paramD, numchambre = paramNumChambre
	WHERE numchambre = paramActuChambre;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `chambreid` varchar(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `dispo` tinyint(1) NOT NULL,
  PRIMARY KEY (`chambreid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`chambreid`, `taille`, `dispo`) VALUES
('D101', 14, 1),
('D102', 14, 0),
('D103', 14, 0),
('D104', 14, 0),
('D105', 14, 0);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `util_id` int(11) NOT NULL,
  `nbreperson` int(8) NOT NULL,
  `adulte` int(11) NOT NULL,
  `enfant` int(11) NOT NULL,
  `date_A` date NOT NULL,
  `date_D` date NOT NULL,
  `numchambre` varchar(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `numchambre` (`numchambre`),
  KEY `util_id` (`util_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id`, `util_id`, `nbreperson`, `adulte`, `enfant`, `date_A`, `date_D`, `numchambre`) VALUES
(24, 7, 2, 1, 1, '2022-04-20', '2022-04-22', 'D101');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `mdp`, `mail`, `adresse`, `telephone`, `role`) VALUES
(3, 'beck', 'mat', '1234', 'test@test.com', '', '658524019', 'ADMIN'),
(7, 'Valentin', 'Denavaut', 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a', 'valentin.denavaut@hotmail.fr', '103 bis, Avenue de la plage', '0665206707', 'ADMIN');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`numchambre`) REFERENCES `chambre` (`chambreid`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`util_id`) REFERENCES `utilisateur` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
