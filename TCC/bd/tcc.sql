-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/09/2024 às 00:24
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
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aplicativo`
--

CREATE TABLE `aplicativo` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `capitulo_um`
--

CREATE TABLE `capitulo_um` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `capitulo_um`
--

INSERT INTO `capitulo_um` (`id`, `nome`, `link`) VALUES
(1, 'teste1', 'https://www.youtube.com/watch?v=4_sOJjYyJrw');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `valor`, `link`) VALUES
(1, 'wallwallet pro', 'tenha tudo em sua mao ', '29,99', ''),
(2, 'Curso PLUS', 'tudo oq vc precisa saber de mais importante ', '29,99', ''),
(3, 'Consultoria Online', 'converse com nossos profissionais e tire todas suas duvida, peça conselhos...', '15,99', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cartao` text NOT NULL,
  `conhecimento` text NOT NULL,
  `renda_mensal` decimal(30,0) NOT NULL,
  `valor_final` decimal(25,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`, `cartao`, `conhecimento`, `renda_mensal`, `valor_final`) VALUES
(1, 'Gabriel', '159784', '', '', '', 0, 0),
(9, 'Gabriel Rodrigues Rolim ', '$2y$10$m3tmPacNtWMSmRhdFjVdie.IJ.VUb/1gh/99N7UmwK0bR6IHjJvbK', 'rolim8096@gmail.com', 'débito', 'básico', 8000, 3000);

-- --------------------------------------------------------

--
-- Estrutura para tabela `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `video`
--

INSERT INTO `video` (`id`, `titulo`, `link`) VALUES
(1, 'teste', 'https://www.youtube.com/watch?v=4_sOJjYyJrw');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aplicativo`
--
ALTER TABLE `aplicativo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `capitulo_um`
--
ALTER TABLE `capitulo_um`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aplicativo`
--
ALTER TABLE `aplicativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `capitulo_um`
--
ALTER TABLE `capitulo_um`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
