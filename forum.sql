-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 26 Novembre 2018 à 14:19
-- Version du serveur :  5.7.24-0ubuntu0.16.04.1
-- Version de PHP :  7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `type` enum('douce','nouvelle','patate','') NOT NULL,
  `quantite` int(11) NOT NULL,
  `date_livraison` date NOT NULL,
  `client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `type`, `quantite`, `date_livraison`, `client`) VALUES
(2, 'nouvelle', 12, '2018-11-23', 15),
(3, 'douce', 1000, '2018-12-06', 16),
(4, 'patate', 2, '2018-11-16', 15),
(5, 'patate', 9, '2018-12-20', 15),
(6, 'nouvelle', 1, '2018-11-23', 15),
(7, 'patate', 3, '2018-11-16', 15),
(8, 'douce', 60, '2018-11-21', 15);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id`, `user_id`, `topic_id`, `date`, `content`) VALUES
(95, 14, 11, '2018-11-15 10:07:27', '<strong>Bienvenue à tous ! </strong>\r\n\r\nFaites un tour sur\r\n<a href="http://localhost/ecran.com/public_html/pages/mentions.php">http://localhost/ecran.com/public_html/pages/mentions.php</a>\r\n\r\n<em>Bonne journée.</em>'),
(96, 15, 11, '2018-11-15 10:36:36', 'Merci!'),
(97, 15, 12, '2018-11-15 10:37:24', 'Bonjour je veux commander des <strong>patates</strong>.'),
(98, 14, 12, '2018-11-15 10:38:05', 'Allez sur l\'onglet patates !\r\n\r\n<a href="http://localhost/ecran.com/public_html/pages/patates.php">http://localhost/ecran.com/public_html/pages/patates.php</a>'),
(99, 16, 12, '2018-11-15 10:39:40', 'Super votre site. J\'attends mes <em>patates</em> !'),
(108, 15, 11, '2018-11-19 14:45:51', '&lt;img src=&quot;#&quot; onerror=&quot;alert()&quot;/&gt;');

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`id`, `title`, `date`, `author_id`) VALUES
(11, 'Bienvenue sur le forum', '2018-11-15 10:07:27', 14),
(12, 'Commandes de patates', '2018-11-15 10:37:24', 15);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `create_time`) VALUES
(1, 'nouveau', 'nou@new.xd', '$2y$10$Pi2XcSVZifeHLMnjbwBrAO5sGkC2m93v2OAOUgDM8RaugP1SxfBlO', '2018-11-15 17:07:42'),
(14, 'admin', 'admin@admin.fr', '$2y$10$YmlBPxH4VOJqpfzF56hCDubfoQBtIToxiWveFV4g7cJAaABQ4PsOa', '2018-11-15 09:56:17'),
(15, 'jeremy', 'jeremy@jeremy.fr', '$2y$10$E8PHY8Uh1QhTRz3lW3a6Z.pG.bmOrTLnaKbZccIDgMTYtLJcw0D2.', '2018-11-15 10:36:21'),
(16, 'bob', 'bob@bob.com', '$2y$10$1PAuBrQQMC.WEK5jIPo0JeX1HszW5qeQbjejo1r6tCOH/VOA6Td2q', '2018-11-15 10:39:08');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client` (`client`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx2` (`topic_id`),
  ADD KEY `id_idx1` (`user_id`) USING BTREE;

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_idx` (`author_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`client`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
