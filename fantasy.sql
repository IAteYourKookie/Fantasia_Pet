-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Jan-2022 às 03:38
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fantasy`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id_usuario` int(100) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `complemento` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id_usuario`, `bairro`, `endereco`, `numero`, `complemento`, `id`, `cep`, `cidade`, `estado`) VALUES
(11, 'Jardim Camburi', 'Rua Dinoussauro da Silva', '470', 'Ed. Dracula 201', 12, '29470-21', 'Vitória', 'ES'),
(14, 'Laranjeiras', 'Rua do bobo', '0', 'Apt. 302', 13, '25151151', 'Vitória', 'ES');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem`
--

CREATE TABLE `imagem` (
  `dir_imagem` varchar(50) NOT NULL,
  `id_usuario` int(100) NOT NULL,
  `size` varchar(25) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imagem`
--

INSERT INTO `imagem` (`dir_imagem`, `id_usuario`, `size`, `type`) VALUES
('E:xampp	mpphp2DF7.tmp', 0, '209480', 'image/png'),
('E:xampp	mpphpBF41.tmp', 5, '209480', 'image/png'),
('867925c1d5270cbd8487fbedd54e6a48.png', 8, '247913', 'image/png'),
('6d1c34532c8104d97ac054f14d643a28.jpg', 9, '35437', 'image/jpeg'),
('89056095bab12046044925863051cc38.gif', 11, '445199', 'image/gif'),
('imagens/nouser.jpg', 12, '35437', 'image/jpeg'),
('9a12fd2bfef51782a6a0abc487849dbe.jpg', 13, '168087', 'image/jpeg'),
('31c860edcc51533f47048c4d18a81501.jpg', 14, '53646', 'image/jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(200) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `name`, `price`, `image`, `code`) VALUES
(1, 'Elfo de natal', 29.00, 'imagens/produtos/elfo.png', 'elfo'),
(2, 'Bombeiro', 49.00, 'imagens/produtos/bombeiro.png', 'bombeiro'),
(4, 'Principe Sapo', 39.99, 'imagens/produtos/reisapo.png', 'reisapo'),
(5, 'Presidiario', 29.99, 'imagens/produtos/prisioneiro.png', 'presidiario'),
(6, 'uniforme Rebeldes', 49.99, 'imagens/produtos/rebeldes.png', 'rebeldes'),
(7, 'Indiana Jones', 39.99, 'imagens/produtos/indianajones.png', 'indianajones'),
(8, 'Capitão America', 29.99, 'imagens/produtos/heroiamerica.png', 'capamerica'),
(9, 'Homem Aranha', 29.99, 'imagens/produtos/heroiaranha.png', 'homemaranha'),
(10, 'alien Stitch', 59.99, 'imagens/produtos/stitch.png', 'stitch'),
(11, 'Hot Dog', 49.00, 'imagens/produtos/salsicha.png', 'salsicha');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `psw` varchar(200) NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`name`, `email`, `phone`, `psw`, `id`) VALUES
('Enzo Teixeira de Almeida', 'ogrilde@gmail.com', '0', 'e8d95a51f3af4a3b134bf6bb680a213a', 8),
('Lorena Teixeira de Almeida', 'lorena2026@gmail.com', '27995241665', '62a90ccff3fd73694bf6281bb234b09a', 11),
('Frangilo', 'frangilo@gmail.com', '999430269', '1200cf8ad328a60559cf5e7c5f46ee6d', 13),
('Vincent Rodriguez', 'vincente32@gmail.com', '27995241665', 'e8d95a51f3af4a3b134bf6bb680a213a', 14);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `imagem`
--
ALTER TABLE `imagem`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_imagem_fk` (`id_usuario`) USING BTREE;

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_imagem_fk` (`id`) USING BTREE;

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imagem`
--
ALTER TABLE `imagem`
  ADD CONSTRAINT `imagem_id_fk` FOREIGN KEY (`id_usuario`) REFERENCES `imagem` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
