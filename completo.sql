-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/05/2025 às 09:47
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cursophp`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `matricula` varchar(20) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `port1` float DEFAULT NULL,
  `port2` float DEFAULT NULL,
  `port3` float DEFAULT NULL,
  `port4` float DEFAULT NULL,
  `mat1` float DEFAULT NULL,
  `mat2` float DEFAULT NULL,
  `mat3` float DEFAULT NULL,
  `mat4` float DEFAULT NULL,
  `hist1` float DEFAULT NULL,
  `hist2` float DEFAULT NULL,
  `hist3` float DEFAULT NULL,
  `hist4` float DEFAULT NULL,
  `geo1` float DEFAULT NULL,
  `geo2` float DEFAULT NULL,
  `geo3` float DEFAULT NULL,
  `geo4` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id`, `matricula`, `nome`, `foto`, `port1`, `port2`, `port3`, `port4`, `mat1`, `mat2`, `mat3`, `mat4`, `hist1`, `hist2`, `hist3`, `hist4`, `geo1`, `geo2`, `geo3`, `geo4`) VALUES
(2, 'ad4', 'Jean', '6837ecfddd99f_Warframe0016.jpg', 3, 2, 1, 5, 8, 1, 5, 2, 4, 1, 5, 8, 2, 4, 6, 8),
(5, 'ad9', 'Roberto', '6837ffc6ba342_Foto3x4.png', 2, 2, 2, 2, 8, 8, 8, 8, 1, 1, 1, 1, 8, 8, 8, 8),
(6, 'ad10', 'Carlos', '68380579d79ae_Foto3x4.png', 1, 2, 3, 4, 5, 6, 7, 9, 14, 2, 4, 5, 5, 1, 5, 7),
(8, 'ad30', 'Erick', '68380c29203f5_Foto3x4.png', 4, 4, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9, 9);

-- --------------------------------------------------------

--
-- Estrutura para tabela `carros`
--

CREATE TABLE `carros` (
  `marca` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `ano_fabricacao` int(11) DEFAULT NULL,
  `motor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens`
--

CREATE TABLE `itens` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `itens`
--

INSERT INTO `itens` (`id`, `nome`, `descricao`) VALUES
(4, 'cavaalo', 'animal'),
(5, 'vaca', 'muuuuuuuuuuu');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mailmarketing`
--

CREATE TABLE `mailmarketing` (
  `email` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `mailmarketing`
--

INSERT INTO `mailmarketing` (`email`, `nome`) VALUES
('', NULL),
('email@gmail.com', 'jose');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notnull`
--

CREATE TABLE `notnull` (
  `nome` varchar(200) NOT NULL,
  `idade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notnull`
--

INSERT INTO `notnull` (`nome`, `idade`) VALUES
('MATHEUS', 29),
('', 30),
('', 40);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `nome` varchar(200) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `senha`) VALUES
(1, 'admin', '1234');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `mailmarketing`
--
ALTER TABLE `mailmarketing`
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
