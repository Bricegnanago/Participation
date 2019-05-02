-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.5.0.5337
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table participation. enregistrement
CREATE TABLE IF NOT EXISTS `enregistrement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `save_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_payeur` int(10) unsigned NOT NULL DEFAULT '0',
  `montant` double unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_payer` (`id_payeur`),
  CONSTRAINT `FK_enregistrement_payeur` FOREIGN KEY (`id_payeur`) REFERENCES `payeur` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table participation.enregistrement : ~0 rows (environ)
/*!40000 ALTER TABLE `enregistrement` DISABLE KEYS */;
INSERT INTO `enregistrement` (`id`, `save_date`, `id_payeur`, `montant`) VALUES
	(5, '2019-05-01 22:18:04', 7, 25000);
/*!40000 ALTER TABLE `enregistrement` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
