-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Set-2018 às 20:36
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universidade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `idComentario` int(11) NOT NULL,
  `idPost` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`idComentario`, `idPost`, `idUsuario`) VALUES
(1, 46, 2),
(2, 18, 2),
(3, 46, 1),
(4, 18, 3),
(5, 47, 5),
(6, 47, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compartilhamento`
--

CREATE TABLE `compartilhamento` (
  `idCompartilhamento` int(11) NOT NULL,
  `idPost` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `compartilhamento`
--

INSERT INTO `compartilhamento` (`idCompartilhamento`, `idPost`, `idUsuario`) VALUES
(0, 0, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `curtida`
--

CREATE TABLE `curtida` (
  `idCurtidas` int(11) NOT NULL,
  `idPost` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `curtida`
--

INSERT INTO `curtida` (`idCurtidas`, `idPost`, `idUsuario`) VALUES
(108, 89, 0),
(109, 89, 6),
(110, 89, 0),
(111, 89, 6),
(112, 89, 0),
(113, 89, 5),
(114, 89, 5),
(115, 89, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `idUsuario` varchar(45) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `data` datetime DEFAULT NULL,
  `imagem` varchar(45) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `anexo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`idPost`, `idUsuario`, `msg`, `data`, `imagem`, `tipo`, `anexo`) VALUES
(89, '6', 'Informações de Code', '2018-09-23 20:16:20', 'upload/427ed9bd2df64bbd8cd15baf4df39408.jpg', 'Projeto', ''),
(90, '7', 'Evento sobre POG', '2018-09-23 20:23:38', 'upload/acdaccafebd50f4d7d23cb84e2eee52c.jpg', 'Evento', ''),
(91, '7', 'Palestra sobre Algoritmos - Vem todos!!', '2018-09-23 20:24:02', 'upload/300e4c0d535bf088825c9d6781212b2c.jpg', 'Evento', ''),
(92, '7', 'Hackathon Games- Inscrevam-se', '2018-09-23 20:24:38', 'upload/f15e6eb0424301b8c3b0beb9013c6e8c.jpg', 'Evento', ''),
(93, '7', 'Jogos Digitais - Venham para uma nova jornada de diversão', '2018-09-23 20:25:07', 'upload/65b3178711268c51be913a7d3ea1f1da.jpg', 'Evento', ''),
(95, '8', 'ExpressArte, um evento para a divulgação e entendimento da arte.', '2018-09-23 20:27:00', 'upload/bef5ee2c4c2a3da6c29e06a3644856ad.jpg', 'Evento', ''),
(98, '6', 'Programação', '2018-09-23 20:29:33', NULL, 'Evento', 'upload/78ed1d4cc6cfdeddf683e62cbb61dda8.pdf'),
(99, '6', 'Ação Social', '2018-09-23 20:29:42', 'upload/684998efba52b9dbbc906d04e5a9570d.jpg', 'Fórum', ''),
(100, '6', 'Dívida sobre C# - Conexão com base de dados', '2018-09-23 20:30:16', 'upload/4e8d27d22793082c74daa80fdea9f4ba.jpg', 'Fórum', ''),
(101, '6', 'Power Point', '2018-09-23 20:31:19', NULL, 'Evento', 'upload/961ae233e559ea007918c925fe90a86f.pdf'),
(102, '6', 'Trabalho Turismo', '2018-09-23 20:31:46', NULL, 'Empreendedorismo', 'upload/2392de17af0aa4153ddf11bea95fca56.pdf'),
(103, '8', 'Projeto Adm', '2018-09-23 20:32:55', NULL, 'Empreendedorismo', 'upload/c1b8c0a89eff5849d83eba7763ad41ed.pdf'),
(104, '8', 'Dúvida sobre qualificação Profissional - Como está o mercado de empreendedorismo nos dias de hoje', '2018-09-23 20:33:33', 'upload/7ced937369a9c5e44a34b930e532f3d1.jpg', 'Fórum', ''),
(105, '8', 'Palestra sobre Arquivologia - Rua visconde do Uruguai, 538, Niteroi - RJ', '2018-09-23 20:34:27', 'upload/79213c721d7d6380f330a49335991a57.jpg', 'Evento', ''),
(106, '9', 'Trabalho SGDB', '2018-09-23 20:35:08', NULL, 'Projeto', 'upload/d953ed0358caf3428e7368181ea9bc49.pdf'),
(107, '9', 'Qual linguagem de programação está predominando no mercado', '2018-09-23 20:35:53', 'upload/0acc87cea18323cc5a2c7b6ba5c14030.jpg', 'Fórum', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `dataLogin` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `level` int(3) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `login`, `senha`, `dataLogin`, `foto`, `level`, `email`) VALUES
(5, 'Diogo', 'admin', 'admin', NULL, '030.jpg', 1, ''),
(6, 'Cristina', 'cristina', 'admin', NULL, '031.jpg', 1, ''),
(7, 'Joao', 'joao', 'admin', NULL, '045.png', NULL, ''),
(8, 'Wendel Jr', 'wendel', 'admin', NULL, '050.jpg', NULL, ''),
(9, 'Lucas', 'lucas', 'admin', NULL, '069.jpg', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`);

--
-- Indexes for table `compartilhamento`
--
ALTER TABLE `compartilhamento`
  ADD PRIMARY KEY (`idCompartilhamento`);

--
-- Indexes for table `curtida`
--
ALTER TABLE `curtida`
  ADD PRIMARY KEY (`idCurtidas`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `curtida`
--
ALTER TABLE `curtida`
  MODIFY `idCurtidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
