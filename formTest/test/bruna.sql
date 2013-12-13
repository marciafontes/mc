-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2013 at 04:20 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bruna`
--
CREATE DATABASE IF NOT EXISTS `bruna` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bruna`;

-- --------------------------------------------------------

--
-- Table structure for table `arquivo`
--

CREATE TABLE IF NOT EXISTS `arquivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idPessoa` int(11) NOT NULL,
  `nome` varchar(222) NOT NULL,
  `extensao` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idPessoa` (`idPessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `arquivo`
--

INSERT INTO `arquivo` (`id`, `idPessoa`, `nome`, `extensao`) VALUES
(13, 34, '_relatório_final-david.doc', 'pdf');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IdPessoa` int(11) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IdPessoa` (`IdPessoa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `IdPessoa`, `data`) VALUES
(25, 34, '2013-12-08 04:12:29'),
(26, 35, '2013-12-08 04:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `pessoa`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `cpf`, `rg`, `endereco`, `email`, `telefone`, `celular`, `cep`, `cnpj`, `complemento`, `informacao`, `outros`, `telefone_comercial`, `observacao`) VALUES
(1, 'ds', 'dsa', 'dsa', 'dsa', 'dsa', 'dsa', 'sadasad11', 'dsdsv', 'dsadsa', 'sda', 'dsa', 'dcff', 'dsa', 'dsadsa'),
(34, 'David ', '002.908.014-25', '5874521', 'perto casa', 'teste@hotmail.com', '(91)3227-0225', '', '66845-840', '11.111.111/1111-11', '', 'Esta é uma informacao relevante', '', '', ''),
(35, 'David ', '002.908.014-25', '5874521', 'perto casa', 'teste@hotmail.com', '(91)3227-0225', '', '66845-840', '11.111.111/1111-11', '', 'Esta é uma informacao relevante', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arquivo`
--
ALTER TABLE `arquivo`
  ADD CONSTRAINT `arquivo_ibfk_1` FOREIGN KEY (`idPessoa`) REFERENCES `pessoa` (`id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`IdPessoa`) REFERENCES `pessoa` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
