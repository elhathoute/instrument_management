-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 21 nov. 2022 à 22:17
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `instrument_management`
--

-- --------------------------------------------------------

--
-- Structure de la table `classifications`
--

CREATE TABLE `classifications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classifications`
--

INSERT INTO `classifications` (`id`, `name`) VALUES
(1, 'Cordophone'),
(2, 'Aérophone'),
(3, 'idiophone'),
(4, 'electrophone'),
(5, 'membranophone');

-- --------------------------------------------------------

--
-- Structure de la table `fammilles`
--

CREATE TABLE `fammilles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fammilles`
--

INSERT INTO `fammilles` (`id`, `name`) VALUES
(1, 'Bois'),
(2, 'Claviers'),
(3, 'Cordes'),
(4, 'Cuivres'),
(5, 'Percussions');

-- --------------------------------------------------------

--
-- Structure de la table `instruments`
--

CREATE TABLE `instruments` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `origine` varchar(255) NOT NULL,
  `materiaux` varchar(255) NOT NULL,
  `dimension` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `qte` int(11) NOT NULL,
  `prix` float NOT NULL,
  `video` varchar(255) NOT NULL,
  `fammile_id` int(11) NOT NULL,
  `classification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `instruments`
--

INSERT INTO `instruments` (`id`, `nom`, `origine`, `materiaux`, `dimension`, `photo`, `description`, `qte`, `prix`, `video`, `fammile_id`, `classification_id`, `user_id`) VALUES
(2, ' Contrebasse1', 'Europe', 'Bois et cordes en acier.', '1,80 m de hauteur', 'signup.png', 'La contrebasse normale est l\'un des plus grands instruments existant', 0, 23, '', 3, 1, 1),
(7, ' Accordéon à touchedes', '1911', 'Anches en acier', '408 cm hauteur', 'instrument5.jpg', 'Le nom de l\'instrument vient de l\'allemand, akkord, ou harmonie', 2, 1600, 'instru5.mp4', 1, 2, 1),
(8, '   zzez', 'qqfef', 'qq', 'qq', 'Bala.jpg', 'qq', 8, 34, 'instrument.mp4', 2, 4, 42);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `nom`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `etat` int(2) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `ville`, `email`, `password`, `photo`, `etat`, `role_id`) VALUES
(1, 'abdelazizE', 'elhathout', 'youssoufia', 'azize@gmail.com', 'azize123', 'user-8.jpg', 1, 2),
(42, 'ahmed', 'abderafie', 'tanger', 'ahmed@gmail.com', 'aaaa', 'user-14.jpg', 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classifications`
--
ALTER TABLE `classifications`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fammilles`
--
ALTER TABLE `fammilles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `instruments`
--
ALTER TABLE `instruments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fammile_id` (`fammile_id`),
  ADD KEY `classification_id` (`classification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classifications`
--
ALTER TABLE `classifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `fammilles`
--
ALTER TABLE `fammilles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `instruments`
--
ALTER TABLE `instruments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `instruments`
--
ALTER TABLE `instruments`
  ADD CONSTRAINT `instruments_ibfk_1` FOREIGN KEY (`fammile_id`) REFERENCES `fammilles` (`id`),
  ADD CONSTRAINT `instruments_ibfk_2` FOREIGN KEY (`classification_id`) REFERENCES `classifications` (`id`),
  ADD CONSTRAINT `instruments_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
