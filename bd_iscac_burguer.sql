-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando dados para a tabela iscac_burguer.reservations: ~4 rows (aproximadamente)
INSERT INTO `reservations` (`id`, `name`, `contact`, `people`, `datetime`, `status`, `created_at`) VALUES
	(2, 'Marcello Portugal', 'marcellomportugal2003@gmail.com', 1, '2025-12-17 00:41:00', 'rejected', '2025-12-15 21:49:32'),
	(3, 'Marcello Portugal', 'marcellomportugal2003@gmail.com', 1, '2025-12-18 20:16:00', 'accepted', '2025-12-16 16:16:12'),
	(4, 'Maria', 'maria@teste.com', 1, '2025-12-25 18:19:00', 'pending', '2025-12-16 16:19:06'),
	(5, 'ines', 'ines@teste.com', 1, '2025-12-25 19:30:00', 'pending', '2025-12-16 16:27:20');

-- Copiando dados para a tabela iscac_burguer.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `username`, `name`, `password_hash`, `role`, `created_at`) VALUES
	(1, 'admin', 'Administrador', '$2y$10$wh1PVQOiusyd6k0ADDuwKOQM6NTZVzBW/phqNt90Bw7wN42UJFHv2', 'admin', '2025-12-15 19:14:01'),
	(2, 'marcelloptpt', 'Marcello Portugal', '$2y$10$Ek5jMDq2umfuExfJxvoi/eDr4qRObclMmkhRgAI0TjIDCwqu2cZii', 'client', '2025-12-16 16:45:04');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
