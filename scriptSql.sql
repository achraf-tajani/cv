/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE IF NOT EXISTS `db_cv` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_cv`;

CREATE TABLE IF NOT EXISTS `asso_expr_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_profile` int(11) DEFAULT NULL,
  `id_exp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_asso_exp` (`id_exp`),
  KEY `FK_profile` (`id_profile`),
  CONSTRAINT `FK_asso_exp` FOREIGN KEY (`id_exp`) REFERENCES `experience` (`id`),
  CONSTRAINT `FK_profile` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `asso_expr_profile` DISABLE KEYS */;
INSERT INTO `asso_expr_profile` (`id`, `id_profile`, `id_exp`) VALUES
	(1, 1, 1),
	(2, 1, 2);
/*!40000 ALTER TABLE `asso_expr_profile` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `asso_formation_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_formation` int(11) DEFAULT NULL,
  `id_profile` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_formation_asso_1` (`id_formation`),
  KEY `FK_profile_asso_1` (`id_profile`),
  CONSTRAINT `FK_formation_asso_1` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`),
  CONSTRAINT `FK_profile_asso_1` FOREIGN KEY (`id_profile`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `asso_formation_profile` DISABLE KEYS */;
INSERT INTO `asso_formation_profile` (`id`, `id_formation`, `id_profile`) VALUES
	(1, 1, 1),
	(2, 2, 1);
/*!40000 ALTER TABLE `asso_formation_profile` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poste_name` varchar(50) DEFAULT NULL,
  `entreprise` varchar(50) DEFAULT NULL,
  `duree` varchar(50) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `experience` DISABLE KEYS */;
INSERT INTO `experience` (`id`, `poste_name`, `entreprise`, `duree`, `desc`) VALUES
	(1, 'DÉVELOPPEUR WEB SENIOR', 'Google', 'Jun 2019 - Jun 2020', 'Apportez à la table des stratégies de survie gagnant-gagnant pour assurer une domination proactive. En fin de compte, pour l\'avenir, une nouvelle normalité issue de la génération X est sur la piste d\'une solution rationalisée dans le nuage. Le contenu généré par l\'utilisateur en temps réel aura de multiples points de contact pour la délocalisation.'),
	(2, 'DÉVELOPPEUR WEB JUNIOR', 'Mindset', 'Jun 2017 - Jun 2019', 'Desc ..........');
/*!40000 ALTER TABLE `experience` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diplome` varchar(50) DEFAULT NULL,
  `ecole` varchar(50) DEFAULT NULL,
  `duree` varchar(50) DEFAULT NULL,
  `module` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `formation` DISABLE KEYS */;
INSERT INTO `formation` (`id`, `diplome`, `ecole`, `duree`, `module`) VALUES
	(1, 'diplom1', 'Ecole 1', 'Sep 2020- Jun 2021', '<div> Cours 1-  Module 1</div><div> Cours 2 -  Module 1</div>'),
	(2, 'diplome 2', 'Ecole 2', 'Sep 2021- Jun 2022', '<div> Cours 1-  Module 1</div><div> Cours 2 -  Module 1</div><div> Cours 3 -  Module 1</div>');
/*!40000 ALTER TABLE `formation` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `langue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `langue` DISABLE KEYS */;
INSERT INTO `langue` (`id`, `libelle`) VALUES
	(1, 'Arabe'),
	(2, 'Anglais'),
	(3, 'Hindi'),
	(4, 'Français');
/*!40000 ALTER TABLE `langue` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `profile_text` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `poste_recherche` varchar(50) DEFAULT NULL,
  `id_langue` int(11) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `interet` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` (`id`, `nom`, `prenom`, `profile_text`, `email`, `address`, `poste_recherche`, `id_langue`, `tel`, `interet`) VALUES
	(1, 'Kor', 'WaIB', 'Désireux de relever de nouveaux challenges, motiver pour apprendre, également rigoureux, respectueux ,ponctuel, autonome et curieux, je souhaiterais rejoindre vos effectifs afin de participer aux développement de vos projets.', 'kor.wai@gmail.com', 'Paris France', 'Developpeur', NULL, '0654785454', 'En dehors de mon activité de Comercial, j\'aime passer la plupart de mon temps à l\'extérieur. En hiver, je suis un skieur passionné et un grimpeur sur glace novice. Pendant les mois plus chauds, ici au Colorado, j\'aime faire du vélo de montagne, de l\'escalade et du kayak. Quand je suis obligé de rester à l\'intérieur, je suis un certain nombre de films et d\'émissions de télévision de science-fiction et de fantastique, je suis un chef cuisinier en herbe et je passe une grande partie de mon temps libre à explorer les dernières avancées technologiques dans le monde du développement web frontal.');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
