-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Maio-2021 às 01:17
-- Versão do servidor: 10.1.9-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `edge_formularios`
--

CREATE TABLE `edge_formularios` (
  `id` int(11) NOT NULL,
  `id_post` int(11) DEFAULT NULL,
  `title_post` text NOT NULL,
  `user_send` text,
  `usernames` text,
  `data` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `message` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `edge_formularios`
--
-- Indexes for dumped tables
--

--
-- Indexes for table `edge_formularios`
--
ALTER TABLE `edge_formularios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `edge_formularios`
--
ALTER TABLE `edge_formularios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `edge_formularios` ADD `author_post` TEXT NOT NULL AFTER `title_post`; 