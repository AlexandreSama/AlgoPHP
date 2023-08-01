-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 01, 2023 at 08:50 PM
-- Server version: 8.0.29
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `acteur`
--

CREATE TABLE `acteur` (
  `id_acteur` int NOT NULL,
  `id_personne` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `acteur`
--

INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
(1, 1),
(2, 2),
(3, 5),
(4, 7),
(5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `appartiens`
--

CREATE TABLE `appartiens` (
  `id_film` int NOT NULL,
  `id_genre` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appartiens`
--

INSERT INTO `appartiens` (`id_film`, `id_genre`) VALUES
(2, 1),
(3, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `casting`
--

CREATE TABLE `casting` (
  `id_film` int NOT NULL,
  `id_acteur` int NOT NULL,
  `id_role` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `casting`
--

INSERT INTO `casting` (`id_film`, `id_acteur`, `id_role`) VALUES
(2, 1, 3),
(1, 2, 2),
(1, 3, 1),
(3, 3, 4),
(4, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` int NOT NULL,
  `titre` varchar(60) NOT NULL,
  `date_sortie` date NOT NULL,
  `duree` int NOT NULL,
  `synopsis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `note` decimal(15,2) NOT NULL,
  `affiche` varchar(50) NOT NULL,
  `id_realisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `titre`, `date_sortie`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
(1, ' Le Seigneur des anneaux : La Communauté de l\'anneau', '2001-12-19', 178, 'Frodon Sacquet, un jeune hobbit de la Comté, découvre que l\'anneau que son oncle Bilbon lui a légué est en réalité l\'Anneau unique, un objet perdu il y a bien longtemps après la chute de Sauron, le Seigneur des Ténèbres, son créateur. Tant que l\'Anneau existe, Sauron ne peut être entièrement vaincu ; le seul moyen de détruire l\'Anneau et de le jeter dans les flammes de la Montagne du Destin, en Mordor, à des centaines de kilomètres de la Comté. ', '4.50', 'lsda.jpg', 2),
(2, 'The Dark Knight', '2008-08-13', 152, 'Batman est plus que jamais déterminé à éradiquer le crime organisé qui sème la terreur en ville. Epaulé par le lieutenant Jim Gordon et par le procureur de Gotham City, Harvey Dent, Batman voit son champ d\'action s\'élargir. La collaboration des trois hommes s\'avère très efficace et ne tarde pas à porter ses fruits jusqu\'à ce qu\'un criminel redoutable vienne plonger la ville de Gotham City dans le chaos.', '4.50', 'tdk.jpg', 3),
(3, 'matrix 1', '1999-06-23', 150, 'Programmeur anonyme dans un service administratif le jour, Thomas Anderson devient Neo la nuit venue. Sous ce pseudonyme, il est l\'un des pirates les plus recherchés du cyber-espace. À cheval entre deux mondes, Neo est assailli par d\'étranges songes et des messages cryptés provenant d\'un certain Morpheus. Celui-ci l\'exhorte à aller au-delà des apparences et à trouver la réponse à la question qui hante constamment ses pensées : qu\'est-ce que la Matrice ?', '4.40', 'matrix1.jpg', 1),
(4, 'Le Seigneur des anneaux : Les Deux Tours', '2002-12-10', 179, 'Après la mort de Boromir et la disparition de Gandalf, la Communauté s\'est scindée en trois. Perdus dans les collines d\'`Emyn Muil\', Frodon et Sam découvrent qu\'ils sont suivis par Gollum, une créature versatile corrompue par l\'anneau magique. Gollum promet de conduire les `Hobbits\' jusqu\'à la `Porte Noire\' du `Mordor\'. A travers la `Terre du Milieu\', Aragorn, Legolas et Gimli font route vers le `Rohan\', le royaume assiégé de Theoden.', '4.50', 'lsda_ldt.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int NOT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `libelle`) VALUES
(1, 'Action'),
(2, 'Science-Fiction'),
(3, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(5) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `date_naissance`) VALUES
(1, 'Bale', 'Christian', 'Homme', '1974-01-30'),
(2, 'Bean', 'Sean', 'Homme', '1959-04-17'),
(3, 'Jackson', 'Peter', 'Homme', '1961-10-31'),
(4, 'Wachowski', 'Lana', 'Femme', '1961-06-21'),
(5, 'Weaving', 'Hugo', 'Homme', '1960-04-04'),
(6, 'Nolan', 'Christopher', 'Homme', '1970-07-30'),
(7, 'Tarantino', 'Quentin', 'Homme', '1963-03-27'),
(8, 'Portman', 'Natalie', 'Femme', '1981-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `realisateur`
--

CREATE TABLE `realisateur` (
  `id_realisateur` int NOT NULL,
  `id_personne` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `realisateur`
--

INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
(2, 3),
(1, 4),
(3, 6),
(4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nom`) VALUES
(1, 'Elrond'),
(2, 'Boromir'),
(3, 'Batman'),
(4, 'Agent Smith');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acteur`
--
ALTER TABLE `acteur`
  ADD PRIMARY KEY (`id_acteur`),
  ADD UNIQUE KEY `id_personne` (`id_personne`);

--
-- Indexes for table `appartiens`
--
ALTER TABLE `appartiens`
  ADD PRIMARY KEY (`id_film`,`id_genre`),
  ADD KEY `id_genre` (`id_genre`);

--
-- Indexes for table `casting`
--
ALTER TABLE `casting`
  ADD PRIMARY KEY (`id_film`,`id_acteur`,`id_role`),
  ADD KEY `id_acteur` (`id_acteur`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `id_realisateur` (`id_realisateur`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Indexes for table `realisateur`
--
ALTER TABLE `realisateur`
  ADD PRIMARY KEY (`id_realisateur`),
  ADD UNIQUE KEY `id_personne` (`id_personne`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acteur`
--
ALTER TABLE `acteur`
  MODIFY `id_acteur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `realisateur`
--
ALTER TABLE `realisateur`
  MODIFY `id_realisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acteur`
--
ALTER TABLE `acteur`
  ADD CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Constraints for table `appartiens`
--
ALTER TABLE `appartiens`
  ADD CONSTRAINT `appartiens_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `appartiens_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`);

--
-- Constraints for table `casting`
--
ALTER TABLE `casting`
  ADD CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  ADD CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`);

--
-- Constraints for table `realisateur`
--
ALTER TABLE `realisateur`
  ADD CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
