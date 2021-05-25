-- --------------------------------------------------------
-- Host:                         localhost
-- Versione server:              10.4.19-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dump della struttura del database compito
CREATE DATABASE IF NOT EXISTS `compito` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `compito`;

-- Dump della struttura di tabella compito.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `indirizzo` varchar(50) NOT NULL,
  `data` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.account: ~8 rows (circa)
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
REPLACE INTO `account` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`) VALUES
	(1, 'Totti F.', 'abc@gmail.com', 'abc', 'Via casaldonato', NULL);
REPLACE INTO `account` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`) VALUES
	(25, 'santi pistone', 'santialissa@gmail.com', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', 'via boschetto 155', '0001-01-01');
REPLACE INTO `account` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`) VALUES
	(26, 'santi pistone', 'santipistone99@gmail.com', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', 'via boschetto 155', '1992-02-01');
REPLACE INTO `account` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`) VALUES
	(27, 'santi pistone', 'santia', '*E6CC90B878B948C35E92B003C792C46C58C4AF40', 'via boschetto 155', '0001-01-01');
REPLACE INTO `account` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`) VALUES
	(30, 'santi pistone', 'santialissa@gmail.co', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 'via boschetto 155', '0001-01-01');
REPLACE INTO `account` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`) VALUES
	(31, 'santi pistone', 'santialissa@gmail.com', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257', 'via boschetto 155', '0001-01-01');
REPLACE INTO `account` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`) VALUES
	(33, 'luca cino', 'lucax@gmail.com', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 'via boschetto 155', '0001-01-01');
REPLACE INTO `account` (`id`, `nome`, `email`, `password`, `indirizzo`, `data`) VALUES
	(35, 'santi pistone', 'tisiva5003@threepp.com', '*84AAC12F54AB666ECFC2A83C676908C8BBC381B1', 'via boschetto 155', '0001-01-01');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dump della struttura di tabella compito.dipendente
CREATE TABLE IF NOT EXISTS `dipendente` (
  `codice` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) DEFAULT NULL,
  `salario` int(11) DEFAULT NULL,
  `mansione` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codice`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.dipendente: ~6 rows (circa)
/*!40000 ALTER TABLE `dipendente` DISABLE KEYS */;
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(1, 'Luca J', 8000, 'Cassa');
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(2, 'Luca F', 8000, 'Rep. Donna');
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(3, 'Francesco J', 8000, 'Cassa');
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(4, 'Luigi K', 8000, 'Rep. Uomo');
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(5, 'Francesco K', 8000, 'Cassa');
REPLACE INTO `dipendente` (`codice`, `nome`, `salario`, `mansione`) VALUES
	(25, 'Santi P', 1, 'Proprietario');
/*!40000 ALTER TABLE `dipendente` ENABLE KEYS */;

-- Dump della struttura di tabella compito.lavora
CREATE TABLE IF NOT EXISTS `lavora` (
  `codice_n` int(11) NOT NULL,
  `codice_c` int(11) NOT NULL,
  `data_inizio` date NOT NULL,
  `data_fine` date DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`codice_n`,`codice_c`),
  KEY `new_n` (`codice_n`),
  KEY `new_c` (`codice_c`),
  CONSTRAINT `lavora_ibfk_1` FOREIGN KEY (`codice_n`) REFERENCES `negozio` (`codice`),
  CONSTRAINT `lavora_ibfk_2` FOREIGN KEY (`codice_c`) REFERENCES `dipendente` (`codice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.lavora: ~5 rows (circa)
/*!40000 ALTER TABLE `lavora` DISABLE KEYS */;
REPLACE INTO `lavora` (`codice_n`, `codice_c`, `data_inizio`, `data_fine`, `motivo`) VALUES
	(1, 1, '2019-02-02', '2021-03-21', 'Furto');
REPLACE INTO `lavora` (`codice_n`, `codice_c`, `data_inizio`, `data_fine`, `motivo`) VALUES
	(1, 2, '0000-00-00', '0000-00-00', '');
REPLACE INTO `lavora` (`codice_n`, `codice_c`, `data_inizio`, `data_fine`, `motivo`) VALUES
	(1, 4, '2009-02-02', '0000-00-00', '');
REPLACE INTO `lavora` (`codice_n`, `codice_c`, `data_inizio`, `data_fine`, `motivo`) VALUES
	(1, 25, '2021-05-13', '0000-00-00', NULL);
REPLACE INTO `lavora` (`codice_n`, `codice_c`, `data_inizio`, `data_fine`, `motivo`) VALUES
	(2, 3, '2020-02-02', '0000-00-00', '');
/*!40000 ALTER TABLE `lavora` ENABLE KEYS */;

-- Dump della struttura di tabella compito.magazzino
CREATE TABLE IF NOT EXISTS `magazzino` (
  `sede` varchar(50) NOT NULL,
  `indirizzo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`sede`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.magazzino: ~3 rows (circa)
/*!40000 ALTER TABLE `magazzino` DISABLE KEYS */;
REPLACE INTO `magazzino` (`sede`, `indirizzo`) VALUES
	('Catania', 'Via x');
REPLACE INTO `magazzino` (`sede`, `indirizzo`) VALUES
	('Napoli', 'Via Romagnosi');
REPLACE INTO `magazzino` (`sede`, `indirizzo`) VALUES
	('Roma', 'Via boschetto 30');
/*!40000 ALTER TABLE `magazzino` ENABLE KEYS */;

-- Dump della struttura di tabella compito.negozio
CREATE TABLE IF NOT EXISTS `negozio` (
  `codice` int(11) NOT NULL AUTO_INCREMENT,
  `codice_m` varchar(50) NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `indirizzo` varchar(50) DEFAULT NULL,
  `fatturato` int(11) DEFAULT NULL,
  `n_commessi` int(11) DEFAULT 0,
  PRIMARY KEY (`codice`),
  KEY `new_m` (`codice_m`),
  CONSTRAINT `negozio_ibfk_1` FOREIGN KEY (`codice_m`) REFERENCES `magazzino` (`sede`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.negozio: ~4 rows (circa)
/*!40000 ALTER TABLE `negozio` DISABLE KEYS */;
REPLACE INTO `negozio` (`codice`, `codice_m`, `nome`, `indirizzo`, `fatturato`, `n_commessi`) VALUES
	(1, 'Roma', 'Negozio 1', 'Via aaaaaa', 10000, 6);
REPLACE INTO `negozio` (`codice`, `codice_m`, `nome`, `indirizzo`, `fatturato`, `n_commessi`) VALUES
	(2, 'Roma', 'Negozio 2', 'Via bbbbbb', 15000, 1);
REPLACE INTO `negozio` (`codice`, `codice_m`, `nome`, `indirizzo`, `fatturato`, `n_commessi`) VALUES
	(3, 'Catania', 'Negozio 3', 'Via zzzzzz', 25000, 0);
REPLACE INTO `negozio` (`codice`, `codice_m`, `nome`, `indirizzo`, `fatturato`, `n_commessi`) VALUES
	(4, 'Napoli', 'Negozio 4', 'Ciao', 20, 7);
/*!40000 ALTER TABLE `negozio` ENABLE KEYS */;

-- Dump della struttura di vista compito.num_lavoratori
-- Creazione di una tabella temporanea per risolvere gli errori di dipendenza della vista
CREATE TABLE `num_lavoratori` (
	`n_commessi` INT(11) NULL,
	`codice` INT(11) NOT NULL
) ENGINE=MyISAM;

-- Dump della struttura di tabella compito.orario
CREATE TABLE IF NOT EXISTS `orario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codice_c` int(11) NOT NULL,
  `codice_n` int(11) NOT NULL,
  `data` date NOT NULL,
  `o_inizio` time NOT NULL,
  `o_fine` time DEFAULT NULL,
  KEY `id` (`id`),
  KEY `FK__dipendente` (`codice_c`),
  KEY `FK__negozio` (`codice_n`),
  CONSTRAINT `FK__dipendente` FOREIGN KEY (`codice_c`) REFERENCES `dipendente` (`codice`),
  CONSTRAINT `FK__negozio` FOREIGN KEY (`codice_n`) REFERENCES `negozio` (`codice`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.orario: ~12 rows (circa)
/*!40000 ALTER TABLE `orario` DISABLE KEYS */;
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(1, 25, 1, '2021-05-13', '15:29:38', '15:51:45');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(3, 1, 1, '2021-05-12', '16:27:20', '00:00:00');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(4, 1, 1, '2021-05-13', '16:27:35', '00:00:00');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(5, 25, 1, '2021-05-13', '16:29:02', '15:51:45');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(6, 25, 1, '2021-05-13', '16:31:41', '15:51:45');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(7, 25, 1, '2021-05-13', '16:34:39', '15:51:45');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(10, 25, 1, '2021-05-14', '12:42:43', '15:51:45');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(11, 25, 1, '2021-05-15', '17:08:21', '15:51:45');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(12, 25, 1, '2021-05-18', '15:27:09', '15:51:45');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(13, 25, 1, '2021-05-19', '11:33:53', '15:51:45');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(14, 25, 1, '2021-05-20', '15:51:44', '15:51:45');
REPLACE INTO `orario` (`id`, `codice_c`, `codice_n`, `data`, `o_inizio`, `o_fine`) VALUES
	(15, 25, 1, '2021-05-23', '15:31:06', '00:00:00');
/*!40000 ALTER TABLE `orario` ENABLE KEYS */;

-- Dump della struttura di tabella compito.ordini
CREATE TABLE IF NOT EXISTS `ordini` (
  `codice_neg` int(11) NOT NULL,
  `codice_prodotto` int(11) NOT NULL,
  `codice_cliente` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `data_` date DEFAULT NULL,
  `orario` time DEFAULT NULL,
  `indirizzo_sped` varchar(255) DEFAULT NULL,
  `cf` varchar(20) DEFAULT NULL,
  `spedito` tinyint(4) NOT NULL DEFAULT 0,
  KEY `new_c` (`codice_cliente`),
  KEY `new_p` (`codice_prodotto`),
  KEY `new_n` (`codice_neg`),
  CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`codice_prodotto`) REFERENCES `prodotto` (`codice`) ON DELETE CASCADE,
  CONSTRAINT `ordini_ibfk_2` FOREIGN KEY (`codice_cliente`) REFERENCES `account` (`id`),
  CONSTRAINT `ordini_ibfk_3` FOREIGN KEY (`codice_neg`) REFERENCES `negozio` (`codice`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.ordini: ~84 rows (circa)
/*!40000 ALTER TABLE `ordini` DISABLE KEYS */;
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 1, 2, '2021-01-28', '17:00:57', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 30, 2, '2021-05-10', '12:01:52', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 3, '2021-05-10', '13:20:57', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 6, '2021-05-10', '13:22:35', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-10', '13:23:02', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(3, 3, 25, 12, '2021-05-10', '13:24:09', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 1, '2021-05-10', '15:11:19', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:14:10', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:14:11', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:14:11', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:15:47', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:15:48', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:15:55', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:15:55', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:15:56', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:16:02', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:17:26', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:18:10', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:18:11', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:18:12', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:18:12', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:18:12', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 1, '2021-05-10', '15:18:14', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:18:50', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:18:51', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:19:47', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:19:48', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:20:29', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:20:31', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:20:44', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:20:58', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:22:16', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:22:41', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:22:42', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:22:51', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-10', '15:22:52', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 0, '2021-05-10', '15:24:31', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-10', '15:24:37', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-10', '15:24:41', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-10', '15:24:42', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-10', '15:24:42', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-10', '15:24:43', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 3, '2021-05-10', '15:26:40', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 2, '2021-05-10', '15:27:09', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-11', '11:26:42', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 2, '2021-05-11', '11:54:39', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 3, '2021-05-11', '11:58:40', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 2, '2021-05-11', '12:00:52', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-11', '12:01:59', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-11', '12:02:11', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-11', '12:02:22', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-11', '12:03:04', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 25, 1, '2021-05-12', '16:34:18', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-12', '16:34:18', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-12', '16:39:45', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(3, 3, 25, 1, '2021-05-12', '16:42:09', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-12', '16:46:54', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(3, 3, 25, 1, '2021-05-12', '16:46:54', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 1, '2021-05-12', '16:46:54', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(3, 3, 25, 1, '2021-05-12', '17:51:12', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-12', '17:51:12', NULL, NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 0, '2021-05-12', '17:52:13', 'PROVA123', NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(3, 3, 25, 1, '2021-05-12', '17:54:15', 'via aaaa', NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-12', '17:54:15', 'via aaaa', NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(3, 3, 25, 1, '2021-05-12', '17:55:03', 'via aaaa', NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-12', '17:55:03', 'via aaaa', NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(3, 3, 25, 1, '2021-05-12', '17:56:44', 'via aaaa', NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-12', '17:57:13', 'via aaaa', NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-12', '18:04:42', 'via boschetto 155', NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 4, 25, 1, '2021-05-12', '18:05:46', 'via boschetto 155', NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 1, '2021-05-12', '18:06:16', '', NULL, 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-13', '08:19:22', 'via boschetto 155', NULL, 1);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 26, 1, '2021-05-13', '16:55:45', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-13', '17:04:10', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 25, 1, '2021-05-13', '17:05:31', 'via boschetto 1', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 25, 1, '2021-05-13', '17:07:30', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 25, 1, '2021-05-13', '17:08:06', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 25, 1, '2021-05-13', '17:08:49', 'via aaaa1', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-18', '15:04:10', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 26, 1, '2021-05-18', '15:06:00', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 2, 25, 1, '2021-05-20', '15:47:47', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 25, 1, '2021-05-20', '15:50:32', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(1, 1, 25, 1, '2021-05-20', '15:51:29', 'via boschetto 155', 'pststp99m03i754u', 0);
REPLACE INTO `ordini` (`codice_neg`, `codice_prodotto`, `codice_cliente`, `stock`, `data_`, `orario`, `indirizzo_sped`, `cf`, `spedito`) VALUES
	(4, 5, 26, 1, '2021-05-23', '16:01:15', 'via boschetto 155', 'pststp99m03i754u', 0);
/*!40000 ALTER TABLE `ordini` ENABLE KEYS */;

-- Dump della struttura di tabella compito.prodotto
CREATE TABLE IF NOT EXISTS `prodotto` (
  `codice` int(11) NOT NULL AUTO_INCREMENT,
  `codice_rep` int(11) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT '',
  `nome` varchar(50) NOT NULL DEFAULT '',
  `descrizione` varchar(2500) DEFAULT NULL,
  `prezzo` float DEFAULT NULL,
  `stock` int(11) unsigned DEFAULT NULL,
  `codice_m` varchar(50) NOT NULL,
  `home` int(11) NOT NULL DEFAULT 0,
  `hidden` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`codice`),
  KEY `new_maga` (`codice_m`),
  CONSTRAINT `prodotto_ibfk_1` FOREIGN KEY (`codice_m`) REFERENCES `magazzino` (`sede`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4;

-- Dump dei dati della tabella compito.prodotto: ~5 rows (circa)
/*!40000 ALTER TABLE `prodotto` DISABLE KEYS */;
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(1, 3, 'ps1.png', 'PS1', 'Console fissa, vintage', 250, 63, 'Roma', 1, 0);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(2, 3, 'psp.png', 'PSP', 'Console portatile con carica batterie incluso', 220, 0, 'Roma', 1, 0);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(3, 3, 'ps5.png', 'PS5', 'Console fissa', 500, 0, 'Catania', 1, 1);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(4, 2, 'robot.png', 'Robot da cucina', 'Planetaria ', 1200, 0, 'Napoli', 1, 0);
REPLACE INTO `prodotto` (`codice`, `codice_rep`, `image`, `nome`, `descrizione`, `prezzo`, `stock`, `codice_m`, `home`, `hidden`) VALUES
	(5, 4, 'mac.png', 'MacBook Air', 'Apple MacBook Air Ram: 8GB Processore: Intel Core i7 SSD da 1TB', 1299, 0, 'Napoli', 1, 0);
/*!40000 ALTER TABLE `prodotto` ENABLE KEYS */;

-- Dump della struttura di trigger compito.max_num_commessi
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `max_num_commessi` AFTER INSERT ON `lavora` FOR EACH ROW if EXISTS(SELECT * FROM negozio WHERE negozio.codice = NEW.codice_n AND  negozio.n_commessi = 10)
then
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Massimo numero di commessi raggiunto!';
END if//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dump della struttura di trigger compito.new_commesso
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `new_commesso` 
AFTER INSERT ON `lavora` 
FOR EACH ROW 
if EXISTS(SELECT negozio.nome from negozio WHERE negozio.codice = NEW.codice_n)
then
	UPDATE negozio SET 
	negozio.n_commessi = negozio.n_commessi +1 WHERE negozio.codice = NEW.codice_n;
END if//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dump della struttura di vista compito.num_lavoratori
-- Rimozione temporanea di tabella e creazione della struttura finale della vista
DROP TABLE IF EXISTS `num_lavoratori`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `num_lavoratori` AS SELECT negozio.n_commessi, negozio.codice FROM negozio ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
