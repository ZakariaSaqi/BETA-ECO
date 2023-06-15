-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 15 juin 2023 à 08:40
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `betaeco`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id_absence` int(11) NOT NULL,
  `id_seance` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`id_absence`, `id_seance`, `id_user`, `etat`) VALUES
(23, 3, 5, 0),
(24, 7, 19, 0),
(26, 6, 8, 0),
(27, 8, 27, 0),
(28, 9, 20, 0),
(29, 10, 29, 0),
(30, 11, 6, 0),
(31, 4, 6, 0);

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id_annonce` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image_annonce` varchar(200) NOT NULL,
  `date_annonce` date NOT NULL DEFAULT current_timestamp(),
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `titre`, `description`, `image_annonce`, `date_annonce`, `id_user`) VALUES
(1, 'Cabinet de comptabilité recherche comptable expérimenté(e)', 'Rejoignez notre cabinet de comptabilité renommé en tant que comptable expérimenté(e). Gérez la comptabilité, préparez les déclarations fiscales, effectuez des analyses financières et collaborez avec une équipe dynamique. Diplôme en comptabilité requis. Envoyez votre CV avant', '../images/annonce/Cabinet de comptabilité recherche comptable expérimenté(e).jpeg', '2023-01-01', 1),
(2, 'Cabinet de comptabilité professionnel - Des services fiables pour optimiser vos finances', 'Notre cabinet de comptabilité hautement qualifié offre une expertise exceptionnelle pour la gestion de vos finances. Nous proposons des services complets de tenue de livres, d\'établissement des déclarations fiscales et de conseil financier. Faites confiance à notre équipe expérimentée pour optimiser vos ressources et vous aider à atteindre vos objectifs financiers.', '../images/annonce/Cabinet de comptabilité professionnel - Des services fiables pour optimiser vos finances.jpeg', '2023-02-11', 1),
(3, 'Comptabilité précise et efficace - Cabinet expert à votre service', 'Notre cabinet de comptabilité met à votre disposition des professionnels compétents pour gérer vos comptes avec précision et efficacité. Nous offrons une gamme complète de services, notamment la préparation des états financiers, la gestion des salaires, les déclarations fiscales et le conseil en optimisation fiscale. Faites équipe avec nous pour assurer la santé financière de votre entreprise.', '../images/annonce/Comptabilité précise et efficace - Cabinet expert à votre service2023-06-11.jpeg', '2023-03-11', 1),
(4, 'Simplifiez votre comptabilité avec notre cabinet dévoué', 'Notre cabinet de comptabilité dédié est là pour vous aider à simplifier vos tâches comptables. Que vous soyez une petite entreprise ou un particulier, nous vous proposons des services personnalisés tels que la tenue de livres, la gestion des factures, les déclarations de TVA et la préparation des bilans. Profitez de notre expertise pour gagner du temps et vous concentrer sur votre activité principale.', '../images/annonce/Simplifiez votre comptabilité avec notre cabinet dévoué2023-06-11.jpeg', '2023-05-11', 1),
(5, 'Cabinet de comptabilité spécialisé pour les professions libérales', 'Nous sommes un cabinet de comptabilité spécialisé dans les besoins des professions libérales. Nos experts comprennent les spécificités de votre secteur et peuvent vous fournir des services adaptés tels que la gestion des honoraires, les déclarations sociales, les conseils en optimisation fiscale et la planification financière. Confiez-nous votre comptabilité et concentrez-vous sur votre métier.', '../images/annonce/Cabinet de comptabilité spécialisé pour les professions libérales.jpeg', '2023-06-11', 1),
(6, 'Wiiw', 'zeeeeeeeeeeeeebi', '../images/annonce/Wiiw2023-06-15.jpeg', '2023-06-15', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commente` int(11) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `date_comment` date NOT NULL DEFAULT current_timestamp(),
  `id_annonce` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commente`, `contenu`, `date_comment`, `id_annonce`, `id_user`, `etat`) VALUES
(12, 'Wow, excellent !', '2023-07-26', 1, 4, 1),
(14, 'wow', '2023-06-06', 1, 4, 1),
(21, 'aaaaaaaaaaaaaaaaaaaaaa', '2023-06-15', 6, 16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `type` varchar(20) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `cours` varchar(50) NOT NULL,
  `metier` varchar(20) NOT NULL,
  `niveau` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `type`, `titre`, `cours`, `metier`, `niveau`, `id_user`) VALUES
(18, 'Exercices', 'Chapitre1', '', 'Droit', 'OFPPT', 1),
(19, 'Cours', 'Chapitre1', '', 'Comptabilité ', 'BAC', 1),
(20, 'Cours', 'Chapitre5', '', 'Droit', 'BAC', 1),
(21, 'Cours', 'Chapitre4', '../images/cours/Cours-Chapitre4.pdf', 'Gestion', 'ENCG', 1),
(22, 'Exercices', 'Chapitre4', '', 'Gestion', 'Faculté', 1),
(23, 'Exercices', 'Chapitre4', '../images/cours/Exercices-Droit-Chapitre4.pdf', 'Droit', 'ENCG', 1);

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

CREATE TABLE `feedback` (
  `id_feed` int(11) NOT NULL,
  `contenu` varchar(500) NOT NULL,
  `date_feed` date NOT NULL DEFAULT current_timestamp(),
  `etat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id_feed`, `contenu`, `date_feed`, `etat`, `id_user`) VALUES
(4, 'J\'ai été extrêmement satisfait de votre assistance professionnelle et de votre approche personnalisée lors de la gestion de mes besoins comptables. Votre équipe compétente a su répondre à toutes mes questions avec patience et clarté, ce qui m\'a permis de mieux comprendre ma situation financière. De plus, vos conseils précieux m\'ont aidé à prendre des décisions éclairées pour mon entreprise.', '2023-06-12', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id_notif` int(11) NOT NULL,
  `type_notif` varchar(500) NOT NULL,
  `message_notif` varchar(100) NOT NULL,
  `date_notif` date NOT NULL DEFAULT current_timestamp(),
  `etat_notif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id_notif`, `type_notif`, `message_notif`, `date_notif`, `etat_notif`, `id_user`) VALUES
(48, 'Nouvelle consulatation', 'BETA ECO consultation gratuit : Offre for travail ', '2023-06-15', 0, 1),
(49, 'Nouvelle consultation', 'Omar naciri : loremmmmmmmmm', '2023-06-15', 0, 1),
(50, 'Nouvelleconsultation', 'SAMTACH : hhhhhhhhhh', '2023-06-15', 0, 1),
(51, 'Nouveau service', 'Hhhhhhh', '2023-06-15', 1, 4),
(52, 'Nouveau service', 'Hhhhhhh', '2023-06-15', 1, 9),
(53, 'Nouveau service', 'Hhhhhhh', '2023-06-15', 1, 10),
(54, 'Nouveau service', 'Hhhhhhh', '2023-06-15', 1, 11),
(55, 'Nouveau service', 'Hhhhhhh', '2023-06-15', 1, 13),
(56, 'Nouveau service', 'Hhhhhhh', '2023-06-15', 1, 14),
(57, 'Nouveau service', 'Hhhhhhh', '2023-06-15', 1, 15),
(58, 'Nouveau service', 'Hhhhhhh', '2023-06-15', 0, 16),
(59, 'Nouveau service', 'Hhhhhhh', '2023-06-15', 1, 17);

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `date_seance` date NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `type` varchar(20) NOT NULL,
  `etat` int(11) NOT NULL DEFAULT 1,
  `id_user` int(11) NOT NULL,
  `niveau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`id_seance`, `date_seance`, `heure_debut`, `heure_fin`, `type`, `etat`, `id_user`, `niveau`) VALUES
(1, '2023-06-13', '09:29:00', '11:29:00', 'Cours', 0, 2, 'BAC'),
(2, '2023-06-11', '10:29:00', '12:29:00', 'TP', 1, 1, 'OFPPT'),
(3, '2023-06-12', '09:29:00', '11:29:00', 'Cours', 1, 1, 'ENCG'),
(4, '2023-06-04', '09:29:00', '11:29:00', 'Cours', 1, 1, 'ENCG'),
(5, '2023-06-04', '07:04:00', '09:04:00', 'TD', 1, 1, 'ENCG'),
(6, '2023-06-22', '18:30:00', '20:35:00', 'Cours', 1, 1, 'ENCG'),
(7, '2023-06-23', '06:00:00', '08:00:00', 'TP', 1, 1, 'BAC'),
(8, '2023-06-25', '07:00:00', '09:00:00', '', 1, 1, 'OFPPT'),
(9, '2023-06-11', '05:10:00', '07:10:00', 'TD', 1, 1, 'BTS'),
(10, '2023-06-01', '04:15:00', '06:15:00', 'TP', 1, 1, 'BAC'),
(11, '2023-06-11', '04:14:00', '06:14:00', 'TP', 1, 1, 'ENCG'),
(12, '2023-06-18', '07:00:00', '09:00:00', 'Cours', 1, 1, 'ENCG'),
(13, '2023-06-18', '07:00:00', '09:00:00', 'Cours', 1, 1, 'ENCG'),
(14, '2023-06-24', '04:09:00', '06:09:00', 'TD', 1, 1, 'ENCG'),
(15, '2023-06-16', '06:16:00', '07:16:00', 'TP', 1, 1, 'ENCG');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_serv` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_serv`, `titre`, `description`, `id_user`) VALUES
(1, 'Comptabilité', 'Notre équipe d\'experts comptables compétents et expérimentés est prête à vous assister dans tous les aspects de votre comptabilité. Que vous soyez une petite entreprise, une société commerciale ou un particulier, nous offrons des services de tenue de livres, d\'établissement des états financiers, de déclarations fiscales et de conseils personnalisés pour vous aider à optimiser votre situation financière.', 1),
(2, 'Formation', 'Nous proposons des programmes de formation accélérée pour les étudiants dans le domaine de l\'économie. Que vous prépariez le baccalauréat économique, l\'ENCG, l\'EST, l\'OFPPT, le BTS ou que vous soyez à la faculté, nos cours vous fournissent les connaissances essentielles en comptabilité, fiscalité, droit du travail, marketing, GRH, environnement et entrepreneuriat.\r\n', 1),
(3, 'Conseil Juridique', 'Nos consultants juridiques qualifiés sont là pour vous fournir des conseils juridiques fiables et adaptés à vos besoins. Que vous ayez besoin d\'aide pour la création d\'entreprise, la rédaction de contrats, la résolution de litiges ou toute autre question juridique, nous mettons notre expertise à votre disposition pour vous guider à chaque étape.', 1),
(5, 'Gestion d\'Exploitation Agricole', 'Nous comprenons les défis auxquels sont confrontées les exploitations agricoles. Notre équipe spécialisée en gestion d\'exploitation agricole offre des services de conseil et d\'accompagnement pour optimiser les performances de votre exploitation. De la planification financière à la gestion des ressources, nous vous aidons à prendre des décisions éclairées pour assurer la croissance et la rentabilité de votre entreprise agricole.', 1),
(6, 'Étude de projets', 'Étude de projets pour une croissance durable\r\nDescription : Nous réalisons des études de projets approfondies pour évaluer la faisabilité, l\'impact financier et les risques potentiels de vos initiatives commerciales. Nos experts vous fournissent des recommandations stratégiques pour maximiser les chances de succès de vos projets et minimiser les éventuels obstacles.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) NOT NULL,
  `niveau` varchar(20) NOT NULL,
  `service` varchar(50) NOT NULL,
  `acces` int(11) DEFAULT NULL,
  `etat` int(11) DEFAULT NULL,
  `date_inscription` date DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `psw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `type`, `prenom`, `nom`, `phone`, `email`, `adresse`, `niveau`, `service`, `acces`, `etat`, `date_inscription`, `login`, `psw`) VALUES
(1, 1, 'Abdesamiaa', 'SABTI', '+212661506209', 'betaeco2u@gmail.com', 'Quartier El Quodes N32, Chichaoua, Maroc', '', '', NULL, NULL, '2010-07-01', 'abdesamiaa', 'abdesamiaa'),
(2, 2, 'Meryam', 'NOURI', '+212661906509', 'meryam.nouri9@gmail.com', ' Hai qodes, rue 12, Chichaouaaa', '', '', 1, NULL, '2023-06-12', 'nourimeryam', 'nouri123'),
(4, 3, 'Hamedy', 'FATHI', '+212609712345', 'hamedifathi1@gmail.com', '', '', 'Comptabilité', NULL, NULL, '2023-06-12', 'fathifathi', 'fathi'),
(5, 4, 'Younes', 'SAMTACH', '+212687560988', 'samatchunes@gmail.com', ' ENCG', 'ENCG', '', NULL, 1, '2023-06-12', 'samatchy', 'Younes'),
(6, 4, 'Mohamad ', 'SALIM', '+212609871200', 'salimzrl@gmail.com', '', 'ENCG', '', NULL, 1, NULL, 'salimmoha', 'salimmoha'),
(7, 4, 'Mohammed', 'NAZIH', '+212609712333', 'nazihsimo@gmail.com', '', 'OFPPT', '', NULL, 1, '2023-06-14', 'simonazih', 'simonazih'),
(8, 4, 'Mohammed', 'CHAHDI', '+212609871211', 'chahedimoha02@gmail.com', ' ', 'ENCG', '', NULL, 1, '2023-06-14', 'mohamedch', 'mohamedch'),
(9, 3, 'Achraf', 'EL HADDAD', '+212612345678', 'Achraf.doe@gmail.com', '123 Main St', '', 'Gestion d\'exploitation agricole', NULL, 1, '2023-06-14', 'johndoe', 'password'),
(10, 3, 'Abdelhadi', 'AIT MIRA', '+212623456789', 'jane.smith@gmail.com', '456 Elm St', '', 'Etude de projets', NULL, 1, '2023-06-14', 'janesmith', 'password'),
(11, 3, 'Zakaria', 'EL HABTI', '+212634567890', 'sakizakaria7@gmail.com', '789 Oak St', '', 'Comptabilité', NULL, 1, '2023-06-14', 'davidj', 'ahm'),
(13, 3, 'Selma', 'HILALI', '+212656789012', 'selma.hill@gmail.com', '987 Cedar St', '', 'Etude de projets', NULL, 1, '2023-06-14', 'michaelb', 'password'),
(14, 3, 'Jamal', 'LEQRAOUI', '+212667890123', 'emily.jones@gmail.com', '654 Walnut St', '', 'Consultation', NULL, 1, '2023-06-14', 'emilyj', 'password'),
(15, 3, 'Abderrahmane ', 'FIRANI', '+212678901234', 'firani.1994@gmail.com', '321 Birch St', '', 'Etude de projets', NULL, 1, '2023-06-14', 'danielt', 'password'),
(16, 3, 'Hakim', 'BEN MALEK', '+212689012345', 'Hakim.malek@gmail.com', '987 Maple St', '', 'Consultation', NULL, 1, '2023-06-14', 'oliviad', 'password'),
(17, 3, 'Soufiane', 'HAMDAOUI', '+212609712345', 'alexander.miller@gmail.com', '', '', 'Gestion d\'exploitation agricole', NULL, 1, '2023-06-14', 'alexanderm', 'password'),
(19, 4, 'Israa', 'FIKRI', '+212712345678', 'israa09@example.com', '  123 Main St', 'BAC', '', NULL, 1, '2023-06-14', 'michaelj', 'password'),
(20, 4, 'Abdellah', 'CHAFIQ', '+212723456789', 'emily.williams@gmail.com', '  456 Elm St', 'BTS', '', NULL, 1, '2023-06-14', 'emilyw', 'password'),
(21, 4, 'Ayoub', 'DAOUEDI', '+212734567890', 'daniel.brown@gmail.com', '     789 Oak St', 'Faculté', '', NULL, 0, '2023-06-14', 'danielb', 'password'),
(22, 4, 'Zine eddine', 'AIR EL MARDI', '+212745678901', 'zizou.mardi@example.com', '  321 Pine St', 'BTS', '', NULL, 1, '2023-06-14', 'olivias', 'password'),
(23, 4, 'Karim', 'FALIH', '+212756789012', 'karim.falih@gmail.com', '  987 Cedar St', 'BAC', '', NULL, 1, '2023-06-14', 'alexandert', 'password'),
(24, 4, 'Sophia', 'JOHNSON', '+212767890123', 'sophia.johnson@example.com', ' 654 Walnut St', 'Faculté', '', NULL, 1, '2023-06-14', 'sophiaj', 'password'),
(25, 4, 'Khawela', 'BOUHCINI', '+212778901234', 'khawela.bouhcini@gmail.com', '   321 Birch St', 'BAC', '', NULL, 1, '2023-06-14', 'emmad', 'password'),
(26, 4, 'Houssin', 'ATAWI', '+212789012345', 'Houssin.Houssin@example.com', ' 987 Maple St', 'Faculté', '', NULL, 1, '2023-06-14', 'noahm', 'password'),
(27, 4, 'Ouiam', 'FATIHI', '+212790123456', 'ouiam.fatihi@example.com', '  654 Oak St', 'OFPPT', '', NULL, 0, '2023-06-14', 'isabellaj', 'password'),
(28, 4, 'Yassine', 'NODRI BERKANI', '+212701234567', 'Yassine.berkani@example.com', '  321 Pine St', 'BTS', '', NULL, 1, '2023-06-14', 'ethanw', 'password'),
(29, 4, 'Youusef', 'EL MOTWAKIL', '+212609712355', 'UsfMo03@gmail.com', '', 'BAC', '', NULL, 1, NULL, 'usfmotawakil', 'usfmotawakil');

-- --------------------------------------------------------

--
-- Structure de la table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `visit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `visit_date`) VALUES
(1, '192.168.0.1', '2022-07-05 02:33:19'),
(2, '192.168.0.2', '2022-07-12 02:33:24'),
(3, '192.168.0.3', '2022-08-20 02:33:28'),
(4, '192.168.0.4', '2022-08-28 02:33:33'),
(5, '192.168.0.5', '2022-09-10 02:33:43'),
(6, '192.168.0.6', '2022-09-18 02:33:54'),
(7, '192.168.0.7', '2022-09-29 02:34:12'),
(8, '192.168.0.8', '2022-10-14 17:15:00'),
(9, '192.168.0.9', '2022-11-05 12:25:00'),
(10, '192.168.0.10', '2022-11-20 15:40:00'),
(11, '192.168.0.11', '2022-12-02 09:50:00'),
(12, '192.168.0.12', '2023-01-07 02:30:09'),
(13, '192.168.0.13', '2023-01-08 11:30:00'),
(14, '192.168.0.14', '2023-02-17 02:29:47'),
(15, '192.168.0.15', '2023-03-22 10:20:00'),
(16, '192.168.0.16', '2023-04-05 13:05:00'),
(17, '192.168.0.17', '2023-05-18 08:40:00'),
(18, '192.168.0.18', '2023-05-29 17:25:00'),
(19, '192.168.0.19', '2023-06-10 12:35:00'),
(20, '192.168.0.20', '2023-06-14 15:50:00'),
(76, '127.0.0.1', '2023-06-15 02:41:43');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id_absence`),
  ADD KEY `foreignkey_userab` (`id_user`),
  ADD KEY `foreignkey_sea` (`id_seance`);

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id_annonce`),
  ADD KEY `foreignkey_user` (`id_user`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commente`),
  ADD KEY `foreignkey_userc` (`id_user`),
  ADD KEY `foreignkey_an` (`id_annonce`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `foreignkey_usercour` (`id_user`);

--
-- Index pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feed`),
  ADD KEY `foreignkey_userfeed` (`id_user`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `foreignkey_usernoti` (`id_user`);

--
-- Index pour la table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `foreignkey_usersea` (`id_user`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_serv`),
  ADD KEY `foreignkey_userserv` (`id_user`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id_annonce` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT pour la table `seance`
--
ALTER TABLE `seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_serv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `foreignkey_sea` FOREIGN KEY (`id_seance`) REFERENCES `seance` (`id_seance`) ON DELETE CASCADE,
  ADD CONSTRAINT `foreignkey_userab` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `foreignkey_user` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `foreignkey_an` FOREIGN KEY (`id_annonce`) REFERENCES `annonce` (`id_annonce`),
  ADD CONSTRAINT `foreignkey_userc` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `foreignkey_usercour` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `foreignkey_userfeed` FOREIGN KEY (`id_user`) REFERENCES `feedback` (`id_feed`) ON DELETE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `foreignkey_usernoti` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `foreignkey_usersea` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE;

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `foreignkey_userserv` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
