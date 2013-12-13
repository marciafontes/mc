-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Dez 13, 2013 as 08:32 PM
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `form_test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivo`
--

CREATE TABLE IF NOT EXISTS `arquivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(222) NOT NULL,
  `extensao` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPessoa` (`idPessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `arquivo`
--

INSERT INTO `arquivo` (`id`, `idPessoa`, `nome`, `extensao`) VALUES
(13, 34, '_relatório_final-david.doc', 'pdf'),
(14, 36, '01_trutna_an_introduction_to_jpeg_compression', 'pdf'),
(15, 37, '03_oetiker_partl_hyna_schlegl_the_not_so_short_introduction_to_latex_2ed', 'pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPessoa` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IdPessoa` (`IdPessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `history`
--

INSERT INTO `history` (`id`, `IdPessoa`, `data`) VALUES
(25, 34, '2013-12-08 04:12:29'),
(26, 35, '2013-12-08 04:12:51'),
(27, 36, '2013-12-10 05:12:27'),
(28, 37, '2013-12-10 05:12:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE IF NOT EXISTS `pessoa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(222) DEFAULT NULL,
  `cpf` varchar(15) NOT NULL,
  `rg` varchar(10) DEFAULT NULL,
  `endereco` varchar(222) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `complemento` varchar(222) DEFAULT NULL,
  `informacao` varchar(222) DEFAULT NULL,
  `outros` varchar(222) DEFAULT NULL,
  `telefone_comercial` varchar(15) DEFAULT NULL,
  `observacao` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `cpf`, `rg`, `endereco`, `email`, `telefone`, `celular`, `cep`, `cnpj`, `complemento`, `informacao`, `outros`, `telefone_comercial`, `observacao`) VALUES
(1, 'ds', 'dsa', 'dsa', 'dsa', 'dsa', 'dsa', 'sadasad11', 'dsdsv', 'dsadsa', 'sda', 'dsa', 'dcff', 'dsa', 'dsadsa'),
(34, 'David ', '002.908.014-25', '5874521', 'perto casa', 'teste@hotmail.com', '(91)3227-0225', '', '66845-840', '11.111.111/1111-11', '', 'Esta é uma informacao relevante', '', '', ''),
(35, 'David ', '002.908.014-25', '5874521', 'perto casa', 'teste@hotmail.com', '(91)3227-0225', '', '66845-840', '11.111.111/1111-11', '', 'Esta é uma informacao relevante', '', '', ''),
(36, 'Fulano outro', '111.111.111-11', '1111111', '11111111', 'fulanooutro@outro.com', '(11)1111-1111', '', '11111-111', '11.111.111/1111-11', '11111111', '111111111', '', '', ''),
(37, 'Fulano2 outro', '222.222.222-22', '2222222', '222222222222222222222222', 'fulano2outro@outro.com', '(22)2222-2222', '', '22222-222', '22.222.222/2222-22', '22222', '222222222', '', '', '');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`id`);

--
-- Restrições para a tabela `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`IdPessoa`) REFERENCES `pessoa` (`id`);
