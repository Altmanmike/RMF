-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 05 octob. 2021 à 11:30
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `appli.sql`
--
-- --------------------------------------------------------

--
-- Structure de la table `formateur`
--
CREATE TABLE `formateur` (
  `id` tinyint(3) NOT NULL,
  `nom` varchar(40) DEFAULT NULL,
  `prenom` varchar(40) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `domaine` varchar(100) NOT NULL,
  `specialite` varchar(100) NOT NULL,
  `telephone` char(10) DEFAULT NULL,
  `motdepasse` varchar(255) NOT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `code_postal` char(5) DEFAULT NULL,  
  `ville` varchar(40) DEFAULT NULL,
  `serappeler_jeton` varchar(255) NOT NULL,
  `date_de_creation_de_compte` datetime NOT NULL DEFAULT current_timestamp(),
  `date_de_derniere_connexion` datetime NOT NULL DEFAULT current_timestamp()  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Structure de la table `annonce`
--
CREATE TABLE `annonce` (
  `id` tinyint(3) NOT NULL,
  `titre` varchar(100) NOT NULL,  
  `contenu` text NOT NULL,   
  `date_de_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `formateur_id` tinyint(3) NOT NULL  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Index pour les tables déchargées
--
-- Index pour la table `formateur`
ALTER TABLE `formateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`); 
--
--
-- Index pour la table `annonce`
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`),  
  ADD KEY `formateur_id` (`formateur_id`);
--
-- --------------------------------------------------------

--
-- AUTO_INCREMENT pour les tables déchargées
--
-- AUTO_INCREMENT pour la table `formateur`
ALTER TABLE `formateur`
  MODIFY `id` tinyint(3) NOT NULL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
--
-- AUTO_INCREMENT pour la table `annonce`
ALTER TABLE `annonce`
  MODIFY `id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- --------------------------------------------------------

--
-- Contraintes pour les tables déchargées
--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `annonce_ibfk_1` FOREIGN KEY (`formateur_id`) REFERENCES `formateur` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
