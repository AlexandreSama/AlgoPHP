-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage des données de la table forumalex.category : ~4 rows (environ)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id_category`, `categoryName`) VALUES
	(1, 'Build'),
	(2, 'News'),
	(3, 'Spécialisation'),
	(4, 'Raid');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Listage des données de la table forumalex.message : ~4 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `messageText`, `creationDate`, `user_id`, `topic_id`) VALUES
	(1, 'Coucou, c\'est un test !', '2023-09-01 11:14:01', 1, 5),
	(2, 'Coucou, c\'est un test encore !', '2023-09-01 11:27:30', 1, 3),
	(3, 'Coucou, c\'est un test décidément !', '2023-09-01 11:27:47', 1, 4),
	(4, 'La vache, ca fait beaucoup', '2023-09-01 11:28:02', 1, 6),
	(5, 'C\'est beau !', '2023-09-01 11:43:35', 1, 5),
	(6, 'Ca fonctionne !', '2023-09-01 11:48:05', 2, 4);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage des données de la table forumalex.topic : ~4 rows (environ)
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` (`id_topic`, `title`, `creationDate`, `closed`, `user_id`, `category_id`) VALUES
	(3, 'Build Némésis Tireur d\'Elite', '2023-09-01 10:40:49', 0, 1, 1),
	(4, 'Forteresses du 29/09/2023 ', '2023-09-01 10:41:22', 0, 1, 2),
	(5, 'Build Némésis Juggernaut', '2023-09-01 11:10:00', 0, 1, 1),
	(6, 'The Summit', '2023-09-01 11:10:12', 0, 1, 2);
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

-- Listage des données de la table forumalex.user : ~0 rows (environ)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `username`, `email`, `password`, `role`, `inscriptionDate`, `profilePicture`, `isBanned`) VALUES
	(1, 'alexSama', 'test@test.fr', 'test', NULL, '2023-08-30 14:54:46', NULL, 0),
	(2, 'Johnny', 'testas@testas.fr', 'testas', NULL, '2023-09-01 11:47:51', NULL, 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
