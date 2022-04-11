-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 11 avr. 2022 à 11:58
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ReservationAP`
--

-- --------------------------------------------------------

--
-- Structure de la table `Chambre`
--

CREATE TABLE `Chambre` (
  `chambreid` varchar(11) NOT NULL,
  `taille` int(11) NOT NULL,
  `dispo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Chambre`
--

INSERT INTO `Chambre` (`chambreid`, `taille`, `dispo`) VALUES
('D101', 14, 1),
('D102', 14, 0),
('D103', 14, 0),
('D104', 14, 0),
('D105', 14, 0);

-- --------------------------------------------------------

--
-- Structure de la table `Reservation`
--

CREATE TABLE `Reservation` (
  `id` int(8) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `coordonne` varchar(25) NOT NULL,
  `nbreperson` int(8) NOT NULL,
  `adulte` int(11) NOT NULL,
  `enfant` int(11) NOT NULL,
  `numchambre` varchar(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Reservation`
--

INSERT INTO `Reservation` (`id`, `nom`, `coordonne`, `nbreperson`, `adulte`, `enfant`, `numchambre`) VALUES
(1, 'bekmann', 'mat', 3, 1, 2, 'D102');

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `telephone` int(10) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`id`, `nom`, `prenom`, `mdp`, `mail`, `telephone`, `role`) VALUES
(3, 'beck', 'mat', '1234', 'test@test.com', 658524019, 'ADMIN');

-- --------------------------------------------------------

--
-- Structure de la table `UtilisateurW`
--

CREATE TABLE `UtilisateurW` (
  `id` int(11) NOT NULL,
  `Nom` varchar(25) NOT NULL,
  `Prenom` varchar(25) NOT NULL,
  `maile` varchar(50) NOT NULL,
  `tel` int(11) NOT NULL,
  `dateA` date NOT NULL,
  `dateD` date NOT NULL,
  `numchambre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Chambre`
--
ALTER TABLE `Chambre`
  ADD PRIMARY KEY (`chambreid`);

--
-- Index pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numchambre` (`numchambre`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `UtilisateurW`
--
ALTER TABLE `UtilisateurW`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numchambre` (`numchambre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `UtilisateurW`
--
ALTER TABLE `UtilisateurW`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`numchambre`) REFERENCES `Chambre` (`chambreid`);

--
-- Contraintes pour la table `UtilisateurW`
--
ALTER TABLE `UtilisateurW`
  ADD CONSTRAINT `utilisateurw_ibfk_1` FOREIGN KEY (`numchambre`) REFERENCES `Chambre` (`chambreid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
