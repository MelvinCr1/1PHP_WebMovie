-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 06 mars 2023 à 09:39
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `webmovie`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `nomDuFilm` varchar(125) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `movie`
--

CREATE TABLE `movie` (
  `movieId` int(11) NOT NULL,
  `nomDuFilm` varchar(125) NOT NULL,
  `dateDeSortie` int(11) NOT NULL,
  `synopsis` text NOT NULL,
  `realisateur` varchar(255) NOT NULL,
  `acteur` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `categorie` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `movie`
--

INSERT INTO `movie` (`movieId`, `nomDuFilm`, `dateDeSortie`, `synopsis`, `realisateur`, `acteur`, `prix`, `categorie`) VALUES
(1, 'John Wick Parabellum', 2019, 'John Wick est en cavale après avoir tué un membre de la guilde des assassins internationaux et a une prime de 14 millions de dollars sur sa tête. Il doit échapper à des tueurs à gages à chaque coin de rue de New York.', 'Chad Stahelski', 'Keanu Reeves, Halle Berry', 7, 'action'),
(2, 'Mission: Impossible - Fallout', 2018, 'Ethan Hunt et son équipe de l\'IMF poursuivent une organisation terroriste qui a volé des armes nucléaires. Ils doivent également faire face à une ancienne connaissance de Hunt, qui a maintenant des intentions malveillantes.', 'Christopher McQuarrie', 'Tom Cruise, Henry Cavill', 9, 'action'),
(3, 'Baby Driver', 2017, 'Le jeune Baby, chauffeur hors pair, doit travailler pour un gang de braqueurs pour payer une dette. Il est alors impliqué dans une série de braquages à haut risque, qui vont rapidement mal tourner.', 'Edgar Wright', 'Ansel Elgort, Kevin Spacey', 6, 'action'),
(4, 'Mad Max: Fury Road', 2015, 'Dans un futur post-apocalyptique, Max Rockatansky et Furiosa, une impératrice rebelle, se battent pour échapper à un dictateur cruel et sauver un groupe de femmes esclaves.', 'George Miller', 'Tom Hardy, Charlize Theron', 9, 'action'),
(5, 'Captain America: Le Soldat de l\'hiver', 2014, 'Steve Rogers, alias Captain America, doit faire face à une conspiration au sein du S.H.I.E.L.D. avec l\'aide de Black Widow et du Faucon. Ils doivent également combattre le Soldat de l\'hiver, un assassin redoutable qui a un lien avec le passé de Rogers.', 'Anthony Russo, Joe Russo', 'Chris Evans, Scarlett Johansson', 15, 'action'),
(6, 'Raid dingue', 2017, 'Johanna Pasquali rêve de devenir la première femme à intégrer le RAID, mais son manque de discipline et son caractère impulsif la mettent souvent en difficulté. Elle doit travailler avec Eugène Froissard, un policier misogyne, pour réussir sa mission.', 'Dany Boon', 'Alice Pol, Dany Boon', 12, 'comedie'),
(7, 'Qu\'est-ce qu\'on a fait au Bon Dieu ?', 2014, 'Claude et Marie Verneuil, un couple de bourgeois de province, voient leurs valeurs traditionnelles mises à rude épreuve lorsqu\'ils apprennent que leurs quatre filles ont épousé des hommes de différentes cultures et religions.', 'Philippe de Chauveron', 'Christian Clavier, Chantal Lauby', 12, 'comedie'),
(8, 'Intouchables', 2011, 'L\'histoire d\'amitié entre Philippe, un riche tétraplégique, et Driss, un jeune homme issu des banlieues qui est embauché comme son aide-soignant. Malgré leurs différences, ils forment un duo improbable et touchant.', 'Olivier Nakache, Eric Toledano', 'François Cluzet, Omar Sy', 10, 'comedie'),
(9, 'Bienvenue chez les Ch\'tis', 2008, 'Philippe Abrams, un directeur de la poste du sud de la France, est muté dans le nord. Il est réticent à s\'installer dans cette région considérée comme pluvieuse et peuplée de gens peu accueillants. Mais il finit par découvrir un endroit chaleureux et accueillant.', 'Dany Boon', 'Kad Merad, Dany Boon', 13, 'comedie'),
(10, 'OSS 117', 2006, 'Le Caire, nid d\'espions : L\'agent secret français Hubert Bonisseur de La Bath, alias OSS 117, est envoyé au Caire pour enquêter sur la disparition d\'un collègue. Mais son manque de tact et ses stéréotypes racistes provoquent des situations comiques et gênantes.', 'Michel Hazanavicius', 'Jean Dujardin, Bérénice Bejo', 9, 'comedie');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(125) NOT NULL,
  `prenom` varchar(125) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motdepasse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `email`, `motdepasse`) VALUES
(1, 'Melvin', 'Cureau', 'melvin.cureau@gmail.com', 'azerty'),
(2, 'axel', 'chevallereau', 'axelchevallereau@gmail.com', 'test1');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movieId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `movie`
--
ALTER TABLE `movie`
  MODIFY `movieId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
