-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Set-2016 às 08:42
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `partana`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `cnpj` varchar(14) NOT NULL,
  `rzsocial` varchar(50) NOT NULL,
  `fantasia` varchar(50) NOT NULL,
  PRIMARY KEY (`cnpj`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `participacao`
--

CREATE TABLE IF NOT EXISTS `participacao` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `socio` varchar(11) NOT NULL,
  `empresa` varchar(14) NOT NULL,
  `percentual` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `socio` (`socio`),
  KEY `empresa` (`empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `socio`
--

CREATE TABLE IF NOT EXISTS `socio` (
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `senha` char(40) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `nome`, `senha`, `status`) VALUES
(4, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `participacao`
--
ALTER TABLE `participacao`
  ADD CONSTRAINT `cnpjEmpresa` FOREIGN KEY (`empresa`) REFERENCES `empresa` (`cnpj`),
  ADD CONSTRAINT `cpfSocio` FOREIGN KEY (`socio`) REFERENCES `socio` (`cpf`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
