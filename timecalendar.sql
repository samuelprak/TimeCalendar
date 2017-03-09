-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Jeu 09 Mars 2017 à 18:08
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `timecalendar`
--

-- --------------------------------------------------------

--
-- Structure de la table `ets`
--

CREATE TABLE `ets` (
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ets`
--

INSERT INTO `ets` (`code`, `name`, `url`) VALUES
('upem', 'Université Paris-Est Marne-la-Vallée', 'https://edt.u-pem.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources={}&projectId=19&calType=tical&sqlMode=true');

-- --------------------------------------------------------

--
-- Structure de la table `grp`
--

CREATE TABLE `grp` (
  `id` int(11) NOT NULL,
  `calid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `custom` tinyint(4) NOT NULL DEFAULT '0',
  `url` text,
  `nivid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `grp`
--

INSERT INTO `grp` (`id`, `calid`, `name`, `color`, `type`, `custom`, `url`, `nivid`) VALUES
(1, 590, 'TD A et B', '#0073b7', 'cm', 0, NULL, 1),
(2, 588, 'TD A', '#00a65a', 'td', 0, NULL, 1),
(3, 591, 'TD B', '#00a65a', 'td', 0, NULL, 1),
(4, 600, 'TP A1', '#f56954', 'tp', 0, NULL, 1),
(5, 610, 'TP A2', '#f56954', 'tp', 0, NULL, 1),
(6, 628, 'TP B1', '#f56954', 'tp', 0, NULL, 1),
(7, 4897, 'TP B2', '#f56954', 'tp', 0, NULL, 1),
(8, 2320, 'Alpha', '#f39c12', 'tp2', 0, NULL, 1),
(9, 2321, 'Bêta', '#f39c12', 'tp2', 0, NULL, 1),
(10, 2329, 'Gamma', '#f39c12', 'tp2', 0, NULL, 1),
(11, 1322, 'MMI1 - TP A', '#ff5c85', 'tp', 0, NULL, 3),
(12, 1317, 'MMI1 - TP B', '#B9B954', 'tp', 0, NULL, 3),
(13, 1318, 'MMI1 - TP C', '#4799C8', 'tp', 0, NULL, 3),
(14, 1320, 'MMI1 - TP D', '#A27AD9', 'tp', 0, NULL, 3),
(15, 1313, 'MMI2 - TP A', '#ff5c85', 'tp', 0, NULL, 4),
(16, 1324, 'MMI2 - TP B', '#B9B954', 'tp', 0, NULL, 4),
(17, 1326, 'MMI2 - TP C', '#4799C8', 'tp', 0, NULL, 4),
(18, 1328, 'MMI2 - TP D', '#A27AD9', 'tp', 0, NULL, 4),
(19, 523, 'TD A et B', '#0073b7', 'cm', 0, NULL, 2),
(20, 4900, 'TD A', '#00a65a', 'td', 0, NULL, 2),
(21, 1311, 'TD B', '#00a65a', 'td', 0, NULL, 2),
(22, 2533, 'Alpha', '#f39c12', 'tp2', 0, NULL, 2),
(23, 2535, 'Bêta', '#f39c12', 'tp2', 0, NULL, 2),
(24, 2536, 'Gamma', '#f39c12', 'tp2', 0, NULL, 2),
(25, 2349, 'Groupe classe', '', 'dut', 0, NULL, 5),
(26, 2350, 'Groupe 1', '', 'dut', 0, NULL, 5),
(27, 2360, 'Groupe 2', '', 'dut', 0, NULL, 5),
(28, 2369, 'Groupe 3', '', 'dut', 0, NULL, 5),
(29, 2376, 'Groupe 4', '', 'dut', 0, NULL, 5),
(30, 2355, 'Groupe 1a', '', 'dut', 0, NULL, 5),
(31, 2356, 'Groupe 1b', '', 'dut', 0, NULL, 5),
(32, 2362, 'Groupe 2a', '', 'dut', 0, NULL, 5),
(33, 2368, 'Groupe 2b', '', 'dut', 0, NULL, 5),
(34, 2374, 'Groupe 3a', '', 'dut', 0, NULL, 5),
(35, 2375, 'Groupe 3b', '', 'dut', 0, NULL, 5),
(36, 2378, 'Groupe 4a', '', 'dut', 0, NULL, 5),
(37, 2380, 'Groupe 4b', '', 'dut', 0, NULL, 5);

-- --------------------------------------------------------

--
-- Structure de la table `niv`
--

CREATE TABLE `niv` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `weekend` tinyint(4) NOT NULL DEFAULT '0',
  `colorBySubject` tinyint(4) NOT NULL DEFAULT '1',
  `universitycode` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `niv`
--

INSERT INTO `niv` (`id`, `name`, `weekend`, `colorBySubject`, `universitycode`) VALUES
(1, 'DUT Informatique 1ère année', 0, 0, 'upem'),
(2, 'DUT Informatique 2ème année', 0, 0, 'upem'),
(3, 'DUT MMI Champs 1ère année', 0, 1, 'upem'),
(4, 'DUT MMI Champs 2ème année', 0, 1, 'upem'),
(5, 'DUT Génie civil - 1ère année', 0, 1, 'upem');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ets`
--
ALTER TABLE `ets`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `grp`
--
ALTER TABLE `grp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grp_nivid_fkey` (`nivid`);

--
-- Index pour la table `niv`
--
ALTER TABLE `niv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_universitycode_fkey` (`universitycode`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `grp`
--
ALTER TABLE `grp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `niv`
--
ALTER TABLE `niv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `grp`
--
ALTER TABLE `grp`
  ADD CONSTRAINT `grp_nivid_fkey` FOREIGN KEY (`nivid`) REFERENCES `niv` (`id`);

--
-- Contraintes pour la table `niv`
--
ALTER TABLE `niv`
  ADD CONSTRAINT `class_universitycode_fkey` FOREIGN KEY (`universitycode`) REFERENCES `ets` (`code`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
