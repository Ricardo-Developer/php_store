-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Set-2017 às 15:34
-- Versão do servidor: 5.6.36
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lojadotoni`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `CATEGORIAS`
--

CREATE TABLE IF NOT EXISTS `CATEGORIAS` (
  `id_categoria` int(11) NOT NULL,
  `nomecategoria` varchar(30) NOT NULL,
  `visivel` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `CATEGORIAS`
--

INSERT INTO `CATEGORIAS` (`id_categoria`, `nomecategoria`, `visivel`) VALUES
(1, 'Camas', 1),
(2, 'Sofás', 1),
(3, 'Mesas', 1),
(4, 'Armários', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `PAGINAS`
--

CREATE TABLE IF NOT EXISTS `PAGINAS` (
  `id_pagina` int(11) NOT NULL,
  `codigo_pagina` varchar(80) NOT NULL,
  `conteudo` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `PAGINAS`
--

INSERT INTO `PAGINAS` (`id_pagina`, `codigo_pagina`, `conteudo`) VALUES
(1, 'acerca', '<div class="page-header">\n<h1>ACERCA <small>...pelo toni cesae</small></h1>\n</div>\n'),
(2, 'contactos', '<div class="page-header">\r\n<h1>Contactos <small>...</small></h1>\r\n</div>\r\n\r\n<div class="row">\r\n<div class="col-xs-6">\r\n<p>MORADA : Rua dos Tonis, 123 3 Andar</p>\r\n\r\n<p>C&oacute;digo Postal : 4000-006 Porto</p>\r\n\r\n<p>Localidade : Porto</p>\r\n\r\n<hr />\r\n<p>Telefone : 22 123 12 12</p>\r\n\r\n<p>Email : cesae@cesae.pt</p>\r\n</div>\r\n\r\n<div class="col-xs-6">\r\n<div class="embed-responsive embed-responsive-4by3"><iframe class="embed-responsive-item" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3003.904146359355!2d-8.652389184859773!3d41.158442879285765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd246582df7d8785%3A0xc967e42932cd22b4!2sCESAE+-+Centro+de+Servi%C3%A7os+e+Apoio+%C3%A0s+Empresas!5e0!3m2!1spt-PT!2spt!4v1505745048720" style="border:0"></iframe></div>\r\n</div>\r\n</div>\r\n');

-- --------------------------------------------------------

--
-- Estrutura da tabela `PRODUTOS`
--

CREATE TABLE IF NOT EXISTS `PRODUTOS` (
  `id_produto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nomeprod` varchar(120) NOT NULL,
  `descricao` longtext NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(180) NOT NULL,
  `destaque` tinyint(1) NOT NULL,
  `visivel` tinyint(1) NOT NULL DEFAULT '1',
  `datains` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `PRODUTOS`
--

INSERT INTO `PRODUTOS` (`id_produto`, `id_categoria`, `nomeprod`, `descricao`, `preco`, `imagem`, `destaque`, `visivel`, `datains`) VALUES
(1, 1, 'MALM', '<p>Características principais\r\n- A chapa de madeira permite que a cama envelheça muito bem.\r\n- As laterais da cama permitem regular a altura do estrado para colchões de diferentes espessuras.\r\n</p>\r\n<p>\r\nDesigner:\r\nEva Lilja Löwenhielm/IKEA of Sweden\r\n</p>\r\n<p>\r\nDimensões do produto montado\r\nComprimento: 209 cm\r\nLargura: 156 cm\r\nAltura do pé da cama: 38 cm\r\nAltura da cabeceira: 100 cm\r\nComprimento do colchão: 200 cm\r\nLargura do colchão: 140 cm\r\n</p>', 159.00, 'http://www.ikea.com/pt/pt/images/products/malm-estrutura-de-cama__0416873_PE578092_S4.JPG', 1, 1, '2017-07-12 17:13:53'),
(2, 2, 'SKOGABY', 'Sofá 2 lugares, Robust Glose, Bomstad preto\r\n\r\nDimensões do produto montado\r\nLargura: 148 cm\r\nProfundidade: 85 cm\r\nAltura: 80 cm\r\nProfundidade do assento: 56 cm\r\nAltura do assento: 45 cm\r\n\r\nCaracterísticas principais\r\n- Áreas de contacto revestidas com uma pele de elevada qualidade, tingida e com 1,2 mm de espessura, maleável e suave ao toque.\r\n- As superfícies exteriores são revestidas por um tecido com revestimento duradouro, com o mesmo aspeto e toque da pele.\r\n- Almofadas do assento com enchimento em espuma de grande resistência e forro em fibra poliéster, que proporcionam um elevado conforto.\r\n- Inclui 10 anos de garantia. Saiba mais sobre as condições da garantia no respetivo folheto.', 499.00, 'http://www.ikea.com/pt/pt/images/products/skogaby-sofa-lugares-preto__0124691_PE281614_S4.JPG', 0, 1, '2017-07-12 17:16:08'),
(3, 3, 'IKEA PS 2014', 'É versátil e poupa espaço, pois os tabuleiros são empilháveis e formam uma mesa com várias possibilidades de arrumação.\r\n\r\nDimensões do produto montado\r\nAltura: 45 cm\r\nDiâmetro: 44 cm\r\n\r\nCaracterísticas principais\r\n- É versátil e poupa espaço, pois os tabuleiros são empilháveis e formam uma mesa com várias possibilidades de arrumação.\r\nPensamentos do designer\r\n"A mesa de arrumação IKEA PS 2014 foi inspirada nos pequenos pratos chineses para pequenas porções de alimentos, que pode empilhar e reorganizar como quiser. Tivemos em conta como é sentar e comer nas refeições informais e como é útil ter não apenas um tabuleiro, mas vários. No final, ao empilhar todos os tabuleiros, estes tornam-se numa bonita mesa de apoio."\r\nDesigners T. Richardson, C. Brill e A. Williams\r\n', 59.99, 'http://www.ikea.com/pt/pt/images/products/ikea-ps-mesa-de-arrumacao-cores-variadas__0286048_PE412781_S4.JPG', 1, 1, '2017-07-13 09:39:48'),
(4, 1, 'BRUSALI CESAE', '<p>As laterais da cama permitem regular a altura do estrado para colch&otilde;es de diferentes espessuras.</p>\r\n\r\n<p>Dimens&otilde;es do produto montado Comprimento: 206 cm Largura: 155 cm Altura do p&eacute; da cama: 46 cm Altura da cabeceira: 93 cm Comprimento do colch&atilde;o: 200 cm Largura do colch&atilde;o: 140 cm</p>\r\n\r\n<p>Caracter&iacute;sticas principais - As laterais da cama permitem regular a altura do estrado para colch&otilde;es de diferentes espessuras.</p>\r\n', 152.00, 'http://www.ikea.com/pt/pt/images/products/brusali-estrutura-de-cama-castanho__0312245_PE429682_S4.JPG', 0, 1, '2017-07-14 09:26:57'),
(6, 3, 'RISSNA', 'A prateleira para guardar revistas e outros artigos ajuda-o a manter tudo organizado, libertando espaço sobre o tampo.\r\n\r\nDimensões do produto montado\r\nAltura: 45 cm\r\nDiâmetro: 60 cm\r\n\r\n\r\n', 79.99, 'http://www.ikea.com/pt/pt/images/products/rissna-mesa-de-apoio-bege__0367810_PE549605_S4.JPG', 1, 1, '2017-07-14 09:29:48'),
(7, 2, 'EKTORP', 'As almofadas de assento com enchimento em espuma de grande elasticidade e forro em fibra de poliéster proporcionam apoio para o corpo ao sentar e voltam à sua forma original ao levantar-se.\r\n\r\nDimensões do produto montado\r\nLargura: 218 cm\r\nProfundidade: 88 cm\r\nAltura: 88 cm\r\nProfundidade do assento: 49 cm\r\nAltura do assento: 45 cm\r\n', 399.00, 'http://www.ikea.com/pt/pt/images/products/ektorp-sofa-lugares-amarelo__0467230_PE610801_S4.JPG', 0, 1, '2017-07-14 09:31:23'),
(8, 2, 'SÖDERHAMN', 'Tecido de microfibras resistente, duradouro e suave. A gama de sofás SÖDERHAMN tem assentos fundos, baixos e fofos, com almofadas soltas de encosto para um melhor apoio.\r\n\r\nDimensões do produto montado\r\nLargura: 198 cm\r\nProfundidade: 99 cm\r\nAltura: 83 cm\r\nLargura do assento: 186 cm\r\nProfundidade do assento: 48 cm\r\nAltura do assento: 40 cm\r\n\r\nCaracterísticas principais\r\n- Tecido de microfibras resistente, duradouro e suave.\r\n- A gama de sofás SÖDERHAMN tem assentos fundos, baixos e fofos, com almofadas soltas de encosto para um melhor apoio.\r\n- Como é amovível e lavável na máquina, a capa é fácil de manter limpa.\r\n- As diferentes secções podem ser unidas de diferentes formas ou usadas de forma independente.\r\n- O tecido elástico da base e a espuma de elevada elasticidade nas almofadas do assento proporcionam grande conforto.\r\n- Inclui 10 anos de garantia. Saiba mais sobre as condições da garantia no respetivo folheto.', 449.00, 'http://www.ikea.com/pt/pt/images/products/soderhamn-sofa-lugares-cor-de-rosa__0409688_PE583232_S4.JPG', 0, 0, '2017-07-14 09:32:55'),
(9, 1, 'HEMNES', '<p>Quatro fun&ccedil;&otilde;es: sof&aacute;, cama individual, cama de casal e solu&ccedil;&atilde;o de arruma&ccedil;&atilde;o.</p>\r\n\r\n<p>Dimens&otilde;es do produto montado</p>\r\n\r\n<ul>\r\n	<li>Comprimento: 211 cm</li>\r\n	<li>Largura: 87 cm</li>\r\n	<li>Altura: 86 cm</li>\r\n	<li>Largura da cama: 168 cm</li>\r\n	<li>Comprimento da cama: 211 cm</li>\r\n	<li>Comprimento do colch&atilde;o: 200 cm</li>\r\n	<li>Largura do colch&atilde;o: 80 cm</li>\r\n</ul>\r\n\r\n<p>Caracter&iacute;sticas principais</p>\r\n\r\n<p>-&nbsp;Quatro fun&ccedil;&otilde;es: sof&aacute;, cama individual, cama de casal e solu&ccedil;&atilde;o de arruma&ccedil;&atilde;o.</p>\r\n', 319.00, 'http://www.ikea.com/pt/pt/images/products/hemnes-cama-indiv-dupla-c-gav-rosa__0322386_PE516668_S4.JPG', 0, 1, '2017-07-14 17:23:04'),
(10, 1, 'TARVA', '<p>O encosto pode ser montado &agrave; direita ou &agrave; esquerda</p>\r\n\r\n<p>Dimens&otilde;es do produto montado</p>\r\n\r\n<p>Comprimento: 214 cm<br />\r\nLargura: 88 cm<br />\r\nAltura: 71 cm<br />\r\nLargura da cama: 167 cm<br />\r\nComprimento da cama: 214 cm<br />\r\nComprimento do colch&atilde;o: 200 cm<br />\r\nLargura do colch&atilde;o: 80 cm</p>\r\n\r\n<p>Caracter&iacute;sticas principais</p>\r\n\r\n<p>-&nbsp;O encosto pode ser montado &agrave; direita ou &agrave; esquerda</p>\r\n', 129.00, 'http://www.ikea.com/pt/pt/images/products/tarva-cama-individual-dupla__0464285_PE609355_S4.JPG', 0, 1, '2017-07-17 12:53:49'),
(13, 2, 'KIVIK', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p>\r\n\r\n<p>Dimens&otilde;es do produto montado</p>\r\n\r\n<p>Largura: 90 cm<br />\r\nProfundidade: 163 cm<br />\r\nAltura: 83 cm<br />\r\nLargura do assento: 90 cm<br />\r\nProfundidade do assento: 124 cm<br />\r\nAltura do assento: 45 cm</p>\r\n\r\n<p>&nbsp;</p>\r\n', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(14, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(15, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(16, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(17, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(18, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(19, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(20, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(21, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(22, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(23, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(24, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(25, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(26, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(27, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20'),
(28, 2, 'KIVIK repetido', '<p>KIVIK &eacute; uma gama de sof&aacute;s generosa, com assentos flex&iacute;veis e profundos e encostos confort&aacute;veis.</p> <p>Dimens&otilde;es do produto montado</p> <p>Largura: 90 cm<br /> Profundidade: 163 cm<br /> Altura: 83 cm<br /> Largura do assento: 90 cm<br /> Profundidade do assento: 124 cm<br /> Altura do assento: 45 cm</p> <p>&nbsp;</p> ', 550.00, 'uploads/KIVIK/kivik-chaise-longue-castanho__0150385_PE308514_S4.JPG', 1, 1, '2017-07-18 10:12:20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `UTILIZADORES`
--

CREATE TABLE IF NOT EXISTS `UTILIZADORES` (
  `id_utilizador` int(11) NOT NULL,
  `utilizador` varchar(32) NOT NULL,
  `passe` varchar(32) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(120) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `datainsc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `UTILIZADORES`
--

INSERT INTO `UTILIZADORES` (`id_utilizador`, `utilizador`, `passe`, `nome`, `email`, `activo`, `datainsc`) VALUES
(1, 'admin', 'bd5bbb913df57a17412e74f80adc6696', 'Administrador', 'admin@gmail.com', 1, '2017-07-14 10:49:34'),
(2, 'toni', '745c9996c9376acddd65cb69ad692c03', 'António Costa da Silva Barros', 'costasilva@gmail.com', 1, '2017-07-14 10:50:32'),
(3, 'zeze', '745c9996c9376acddd65cb69ad692c03', 'José Pedro Gomes', 'zeze@gmail.com', 0, '2017-07-14 10:51:56'),
(4, 'zorro', 'ec0c38cd81a17478c31832d775bbdeaa', 'Don Diego', 'dd@gmail.com', 1, '2017-07-17 14:36:29'),
(6, 'cesae', 'ec0c38cd81a17478c31832d775bbdeaa', 'CESAE 2017', 'cesae@cesae.pt', 1, '2017-07-26 17:37:20'),
(7, 'filhocesae', 'ec0c38cd81a17478c31832d775bbdeaa', 'Filho Cesae', 'filho@cesae.pt', 1, '2017-07-26 17:39:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `PAGINAS`
--
ALTER TABLE `PAGINAS`
  ADD PRIMARY KEY (`id_pagina`);

--
-- Indexes for table `PRODUTOS`
--
ALTER TABLE `PRODUTOS`
  ADD PRIMARY KEY (`id_produto`),
  ADD KEY `PRODUTOS_CATEGORIAS` (`id_categoria`);

--
-- Indexes for table `UTILIZADORES`
--
ALTER TABLE `UTILIZADORES`
  ADD PRIMARY KEY (`id_utilizador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CATEGORIAS`
--
ALTER TABLE `CATEGORIAS`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `PAGINAS`
--
ALTER TABLE `PAGINAS`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `PRODUTOS`
--
ALTER TABLE `PRODUTOS`
  MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `UTILIZADORES`
--
ALTER TABLE `UTILIZADORES`
  MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `PRODUTOS`
--
ALTER TABLE `PRODUTOS`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `CATEGORIAS` (`id_categoria`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
