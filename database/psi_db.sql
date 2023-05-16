-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/05/2023 às 05:11
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `psi_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_adm` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `senha` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela que armazenará os dados dos administradores do site.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_coments`
--

CREATE TABLE `tbl_coments` (
  `id_commit` int(11) NOT NULL,
  `id_prod` int(14) NOT NULL,
  `user` varchar(50) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela que armazenará os comentários sobre os produtos.';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbl_produto`
--

CREATE TABLE `tbl_produto` (
  `id_prod` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descr` longtext NOT NULL,
  `valor` double NOT NULL,
  `dt_lanc` int(4) NOT NULL,
  `num_pag` int(10) NOT NULL,
  `publico` varchar(50) NOT NULL,
  `img` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela que armazenará os dados dos produtos.';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Índices de tabela `tbl_coments`
--
ALTER TABLE `tbl_coments`
  ADD PRIMARY KEY (`id_commit`),
  ADD KEY `commit-prod` (`id_prod`);

--
-- Índices de tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  ADD PRIMARY KEY (`id_prod`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbl_coments`
--
ALTER TABLE `tbl_coments`
  MODIFY `id_commit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbl_produto`
--
ALTER TABLE `tbl_produto`
  MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbl_coments`
--
ALTER TABLE `tbl_coments`
  ADD CONSTRAINT `commit-prod` FOREIGN KEY (`id_prod`) REFERENCES `tbl_produto` (`id_prod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
