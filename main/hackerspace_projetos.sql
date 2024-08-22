-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.1.72-community - MySQL Community Server (GPL)
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para hackerspace_projetos
CREATE DATABASE IF NOT EXISTS `hackerspace_projetos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hackerspace_projetos`;

-- Copiando estrutura para tabela hackerspace_projetos.cursos
CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome_curso` varchar(50) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Seleção dos projetos disponíveis';

-- Copiando dados para a tabela hackerspace_projetos.cursos: 0 rows
/*!40000 ALTER TABLE `cursos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursos` ENABLE KEYS */;

-- Copiando estrutura para tabela hackerspace_projetos.login
CREATE TABLE IF NOT EXISTS `login` (
  `nome_aluno` varchar(50) NOT NULL,
  `nusp` int(8) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`nusp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Inscrição nos cursos';

-- Copiando dados para a tabela hackerspace_projetos.login: 2 rows
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` (`nome_aluno`, `nusp`, `email`) VALUES
	('yas', 123, 'teste@email.com'),
	('', 0, '');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
