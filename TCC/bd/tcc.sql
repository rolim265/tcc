-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2024 às 16:33
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

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
-- Estrutura da tabela `aplicativo`
--

CREATE TABLE `aplicativo` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `capitulo`
--

CREATE TABLE `capitulo` (
  `id` int(11) NOT NULL,
  `pergunta` text DEFAULT NULL,
  `resposta` text DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `video_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `capitulo`
--

INSERT INTO `capitulo` (`id`, `pergunta`, `resposta`, `video_url`, `video_id`) VALUES
(1, NULL, NULL, 'https://www.youtube.com/watch?v=VpDvjftqeQA', NULL),
(2, 'Quem faz o boombap perfeito?', 'Grafiteh', 'https://www.youtube.com/watch?v=VpDvjftqeQA', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `capitulo_um`
--

CREATE TABLE `capitulo_um` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `pergunta` text NOT NULL,
  `resposta` text NOT NULL,
  `alternativa_errada1` text NOT NULL,
  `alternativa_errada2` text NOT NULL,
  `alternativa_errada3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `capitulo_um`
--

INSERT INTO `capitulo_um` (`id`, `nome`, `link`, `pergunta`, `resposta`, `alternativa_errada1`, `alternativa_errada2`, `alternativa_errada3`) VALUES
(1, 'Boombap', 'https://www.youtube.com/watch?v=VpDvjftqeQA', 'Quem fez o boombap perfeito?', 'Grafith', 'Prado', 'Jotape', 'Kant'),
(2, 'Java', 'https://www.youtube.com/watch?v=ZBKxhnqX-Q0', 'Quem é o professor?', 'Guanabara', 'Jesus', 'Anderson', 'Cintia Pinho');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `resposta1` varchar(255) NOT NULL,
  `resposta2` varchar(255) NOT NULL,
  `resposta3` varchar(255) NOT NULL,
  `resposta4` varchar(255) NOT NULL,
  `respostacorreta` varchar(255) NOT NULL,
  `pergunta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `resposta1`, `resposta2`, `resposta3`, `resposta4`, `respostacorreta`, `pergunta`) VALUES
(1, 'a', 'b', 'c', 'd', 'b', ''),
(2, 'Separar o salario em 4, festas, comida, apostas, gasolina', 'Separar em 3, investimento, gastos gerais e festas', 'Separar em 4, investimento, gastos gerais, lazer e fundo de garantia', 'Separar em 3, Aviador, gastos gerais e festas', 'Separar em 4, investimento, gastos gerais, lazer e fundo de garantia', 'Qual das afirmações estão corretas?');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `valor` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `valor`, `link`) VALUES
(1, 'wallwallet pro', 'tenha tudo em sua mao ', '29,99', ''),
(2, 'Curso PLUS', 'tudo oq vc precisa saber de mais importante ', '29,99', ''),
(3, 'Consultoria Online', 'converse com nossos profissionais e tire todas suas duvida, peça conselhos...', '15,99', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`, `email`, `cartao`, `conhecimento`, `renda_mensal`, `valor_final`) VALUES
(1, 'Gabriel', '159784', '', '', '', '0', '0'),
(9, 'Gabriel Rodrigues Rolim ', '$2y$10$m3tmPacNtWMSmRhdFjVdie.IJ.VUb/1gh/99N7UmwK0bR6IHjJvbK', 'rolim8096@gmail.com', 'débito', 'básico', '8000', '3000'),
(10, 'miguel', '$2y$10$PXI1.Qp3wNpy/bFWLtTRGuOTgpDLcE2j10jS47rt.afOL27bsoHlO', 'breno@gmail.com', '', '', '0', '0'),
(11, 'miguel', '$2y$10$V8AdTAN6Y54L8GcAlReBiePd2safcEyvHG7p5RKjq4p5IwF5W6PnK', 'bre@gmail.com', '', '', '0', '0'),
(12, 'Triste', '$2y$10$.3B5Xtd/GE22DOF3S4gd4OJfb3Jw0QtEnGhNqpRXeaXulHXUccqL.', 'triste@gmail.com', '', '', '0', '0'),
(13, 'breno', '$2y$10$DUXN/ISM75Wplo3n9XP5kOaGF38D2tXkefr6dsI3DVG/Jppd26PnK', 'breno@gmail.com', '', '', '0', '0'),
(14, 'a', '$2y$10$WOBUymEMgE69.uyBEgPYIuuRLmQR3tVSZlHX.W1EziffTF9NPQWmS', 'a@gmail.com', '', '', '0', '0'),
(15, 'b', '$2y$10$w7H6RVRaWnWMwSmz/YXB4O.dAbLow0njqqpVt9Gd1U7RGwK6N.Iuu', 'b@gmail.com', 'débito', 'básico', '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `video`
--

INSERT INTO `video` (`id`, `titulo`, `link`) VALUES
(1, 'História da Educação Financeira', 'https://www.youtube.com/watch?v=z2H3H9Wd0d4&t=151s'),
(2, 'Gestão Inteligente de Finanças Pessoais', 'https://www.youtube.com/watch?v=6fMlzA5LFCI&t=398s');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aplicativo`
--
ALTER TABLE `aplicativo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `capitulo`
--
ALTER TABLE `capitulo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `capitulo_um`
--
ALTER TABLE `capitulo_um`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aplicativo`
--
ALTER TABLE `aplicativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `capitulo`
--
ALTER TABLE `capitulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `capitulo_um`
--
ALTER TABLE `capitulo_um`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
