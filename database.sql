-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2026 at 10:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonnement`
--

CREATE TABLE `abonnement` (
  `id_abonnement` int(11) NOT NULL,
  `type_abonnement` varchar(50) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abonnement`
--

INSERT INTO `abonnement` (`id_abonnement`, `type_abonnement`, `date_debut`, `date_fin`) VALUES
(1, 'Mensuel', '2026-06-01', '2026-06-30'),
(2, 'Trimestriel', '2026-05-01', '2026-07-31'),
(3, 'Annuel', '2026-01-01', '2026-12-31'),
(4, 'Mensuel', '2026-06-15', '2026-07-15'),
(5, 'Annuel', '2026-02-01', '2027-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `adherent`
--

CREATE TABLE `adherent` (
  `id_adherent` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `date_inscription` date NOT NULL,
  `id_abonnement` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `nom`, `prenom`, `email`, `telephone`, `date_inscription`, `id_abonnement`, `id_salle`) VALUES
(1, 'Alaoui', 'Yassine', 'yassine@gmail.com', '0611111111', '2026-06-01', 1, 1),
(2, 'Bennani', 'Sara', 'sara@gmail.com', '0622222222', '2026-05-10', 2, 2),
(3, 'Amrani', 'Omar', 'omar@gmail.com', '0633333333', '2026-01-15', 3, 3),
(4, 'Tazi', 'Salma', 'salma@gmail.com', '0644444444', '2026-06-20', 4, 1),
(5, 'Idrissi', 'Hamza', 'hamza@gmail.com', '0655555555', '2026-02-10', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(11) NOT NULL,
  `nom_salle` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`id_salle`, `nom_salle`, `ville`) VALUES
(1, 'FitConnect Beni Mellal', 'Beni Mellal'),
(2, 'FitConnect Casablanca', 'Casablanca'),
(3, 'FitConnect Rabat', 'Rabat'),
(4, 'FitConnect Marrakech', 'Marrakech');

-- --------------------------------------------------------

--
-- Table structure for table `seance`
--

CREATE TABLE `seance` (
  `id_seance` int(11) NOT NULL,
  `date_seance` date NOT NULL,
  `type_activite` varchar(100) NOT NULL,
  `duree` int(11) NOT NULL,
  `equipement` varchar(100) NOT NULL,
  `id_salle` int(11) NOT NULL,
  `id_adherent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seance`
--

INSERT INTO `seance` (`id_seance`, `date_seance`, `type_activite`, `duree`, `equipement`, `id_salle`, `id_adherent`) VALUES
(1, '2026-06-22', 'Musculation', 60, 'Haltères', 1, 1),
(2, '2026-06-22', 'Cardio', 45, 'Tapis de course', 2, 2),
(3, '2026-06-23', 'CrossFit', 90, 'Kettlebell', 3, 3),
(4, '2026-06-23', 'Yoga', 50, 'Tapis Yoga', 1, 4),
(5, '2026-06-24', 'Musculation', 75, 'Machine guidée', 4, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`id_abonnement`);

--
-- Indexes for table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`),
  ADD KEY `id_abonnement` (`id_abonnement`),
  ADD KEY `id_salle` (`id_salle`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- Indexes for table `seance`
--
ALTER TABLE `seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `id_salle` (`id_salle`),
  ADD KEY `id_adherent` (`id_adherent`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_ibfk_1` FOREIGN KEY (`id_abonnement`) REFERENCES `abonnement` (`id_abonnement`),
  ADD CONSTRAINT `adherent_ibfk_2` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);

--
-- Constraints for table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `seance_ibfk_1` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`),
  ADD CONSTRAINT `seance_ibfk_2` FOREIGN KEY (`id_adherent`) REFERENCES `adherent` (`id_adherent`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
