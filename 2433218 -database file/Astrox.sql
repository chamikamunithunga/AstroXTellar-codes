-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 03, 2025 at 10:05 PM
-- Server version: 8.0.35
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Astroxteller`
--

-- --------------------------------------------------------

--
-- Table structure for table `Astrox`
--

CREATE TABLE `Astrox` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `score` int NOT NULL DEFAULT '0',
  `max_score` int NOT NULL DEFAULT '20',
  `badge` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `endtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uid` varchar(255) NOT NULL,
  `profilepic` varchar(2000) DEFAULT NULL,
  `reset_token_hash` varchar(64) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Astrox`
--

INSERT INTO `Astrox` (`username`, `password`, `email`, `subject`, `level`, `score`, `max_score`, `badge`, `endtime`, `uid`, `profilepic`, `reset_token_hash`, `reset_token_expires_at`) VALUES
('pasan', '$2y$10$762cgKywB/di3LeIKjojNew1Ryp2nCeXssT6W2myjlekmsWA.UsIi', 'munithungac@gmail.com', NULL, NULL, 0, 20, NULL, '2025-04-03 20:47:26', 'user_67eef3ddb7ec14.19268866', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Astrox`
--
ALTER TABLE `Astrox`
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reset_token_hash` (`reset_token_hash`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
