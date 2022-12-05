-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               8.0.24 - MySQL Community Server - GPL
-- Операционная система:         Win64
-- HeidiSQL Версия:              11.3.0.6376
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Дамп данных таблицы individual_db.book: ~0 rows (приблизительно)
DELETE FROM `book`;
INSERT INTO `book` (`id`, `genre_id`, `name`, `author`, `year`) VALUES
	(1, 1, 'Собака Баскервилей', 'К. Дойл', '1901'),
	(2, 2, 'Война и мир', 'Л. Толстой', '1867'),
	(3, 2, 'Преступление и наказание', 'Ф. Доствоевский', '1866'),
	(4, 3, 'Алиса в стране чудес', 'Л. Кэрролл', '1865'),
	(5, 3, 'Гарри Поттер и философский камень', 'Д. Роулинг', '1997'),
	(6, 5, 'Евгений Онегин', 'А. Пушкин', '1833'),
	(7, 1, 'Убить пересмешника', 'Х. Ли', '1960'),
	(8, 4, 'Краткая история времени', 'С. Хокинг', '1988'),
	(9, 4, 'Высший замысел', 'С. Хокинг', '2010'),
	(10, 4, '451 градус по Фаренгейту', 'Р. Брэдбери', '1953');

-- Дамп данных таблицы individual_db.genre: ~0 rows (приблизительно)
DELETE FROM `genre`;
INSERT INTO `genre` (`id`, `name`) VALUES
	(1, 'Детектив'),
	(2, 'Роман'),
	(3, 'Фентези'),
	(4, 'Фантастика'),
	(5, 'Поэзия');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
