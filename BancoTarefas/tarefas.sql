-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 19-Ago-2018 às 23:40
-- Versão do servidor: 5.7.19
-- PHP Version: 7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarefas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefas`
--

CREATE TABLE `tarefas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomeTarefa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custo` double(8,2) NOT NULL,
  `dataLimite` date NOT NULL,
  `ordem` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `tarefas`
--

INSERT INTO `tarefas` (`id`, `nomeTarefa`, `custo`, `dataLimite`, `ordem`, `created_at`, `updated_at`) VALUES
(40, 'gas', 900.00, '2016-12-11', 3, '2018-08-18 07:14:09', '2018-08-20 02:28:39'),
(48, 'zora', 23.45, '2018-05-06', 1, '2018-08-18 16:26:14', '2018-08-20 02:28:39'),
(49, 'feijao4', 1000.00, '2008-01-01', 2, '2018-08-18 18:44:42', '2018-08-20 02:28:39'),
(51, 'feijao432', 23.45, '2018-05-05', 5, '2018-08-18 22:43:16', '2018-08-20 02:28:39'),
(52, 'gas323', 1456.00, '2018-05-06', 6, '2018-08-18 22:53:06', '2018-08-20 02:28:40'),
(53, 'arroz', 1500.00, '2018-12-12', 4, '2018-08-19 00:36:38', '2018-08-20 02:28:39'),
(54, 'corrida', 180.00, '2010-05-26', 7, '2018-08-20 01:57:06', '2018-08-20 02:28:40'),
(55, 'compiuter', 2800.00, '1985-05-25', 9, '2018-08-20 02:17:51', '2018-08-20 02:28:40'),
(56, 'teste3', 1650.00, '2018-05-09', 0, '2018-08-20 02:20:37', '2018-08-20 02:28:39'),
(57, 'gas32123', 43.45, '2018-08-16', 10, '2018-08-20 02:26:28', '2018-08-20 02:28:40'),
(58, 'correr', 0.00, '2018-09-05', 8, '2018-08-20 02:27:25', '2018-08-20 02:28:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tarefas`
--
ALTER TABLE `tarefas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarefas_ordem` (`ordem`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tarefas`
--
ALTER TABLE `tarefas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
