CREATE DATABASE IF NOT EXISTS `framework`;

USE framework;

-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Abr-2021 às 23:51
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `framework`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `group_permissions`
--

CREATE TABLE `group_permissions` (
  `pid` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `permission_name` varchar(100) NOT NULL,
  `permission_type` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `group_permissions`
--

INSERT INTO `group_permissions` (`pid`, `group_id`, `permission_name`, `permission_type`) VALUES
(1, 1, 'view_admin_dashboard', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usergroups`
--

CREATE TABLE `usergroups` (
  `group_id` int(10) NOT NULL,
  `group_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usergroups`
--

INSERT INTO `usergroups` (`group_id`, `group_name`) VALUES
(1, 'one'),
(2, 'two');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `group_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `group_id`, `username`, `password`) VALUES
(1, 1, 'lautenai', 'password');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_permissions`
--

CREATE TABLE `user_permissions` (
  `pid` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `permission_name` varchar(100) NOT NULL,
  `permission_type` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `group_permissions`
--
ALTER TABLE `group_permissions`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `FK_group_permissions_usergroups` (`group_id`);

--
-- Índices para tabela `usergroups`
--
ALTER TABLE `usergroups`
  ADD PRIMARY KEY (`group_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- Índices para tabela `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `FK_user_permissions_users` (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `group_permissions`
--
ALTER TABLE `group_permissions`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usergroups`
--
ALTER TABLE `usergroups`
  MODIFY `group_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `group_permissions`
--
ALTER TABLE `group_permissions`
  ADD CONSTRAINT `FK_group_permissions_usergroups` FOREIGN KEY (`group_id`) REFERENCES `usergroups` (`group_id`);

--
-- Limitadores para a tabela `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `FK_user_permissions_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
