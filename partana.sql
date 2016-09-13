-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13-Set-2016 às 14:54
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

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`cnpj`, `rzsocial`, `fantasia`) VALUES
('11426166000190', 'IMLima 11426166000190', 'Host PB');

-- --------------------------------------------------------

--
-- Estrutura da tabela `participacao`
--

CREATE TABLE IF NOT EXISTS `participacao` (
  `socio` varchar(11) NOT NULL,
  `empresa` varchar(14) NOT NULL,
  `percentual` double NOT NULL,
  KEY `socio` (`socio`),
  KEY `empresa` (`empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `participacao`
--

INSERT INTO `participacao` (`socio`, `empresa`, `percentual`) VALUES
('08684540441', '11426166000190', 50);

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

--
-- Extraindo dados da tabela `socio`
--

INSERT INTO `socio` (`cpf`, `nome`, `email`) VALUES
('08684540441', 'Edmarcos Lins', 'elmf_lins@hotmail.com'),
('69170789487', 'SÃ´nia Maria', 'sonia@gmail.com');

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
