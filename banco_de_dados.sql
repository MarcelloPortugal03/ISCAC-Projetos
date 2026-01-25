-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           8.4.3 - MySQL Community Server - GPL
-- SO do servidor:               Win64
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

-- A despejar dados para tabela iscac_burguer.pedidos: ~2 rows (aproximadamente)
INSERT INTO `pedidos` (`id`, `user_id`, `items`, `total`, `data_pedido`) VALUES
	(1, 2, '1x O Académico | 1x Biblioteca Burger', 28.98, '2026-01-24 19:30:00'),
	(2, 3, '1x Reitor Supremo | 2x O Erasmus', 30.97, '2026-01-25 14:10:00');

-- A despejar dados para tabela iscac_burguer.produtos: ~6 rows (aproximadamente)
INSERT INTO `produtos` (`id`, `nome`, `preco`, `preco_antigo`, `imagem`) VALUES
	(1, 'O Académico', 15.99, 20.99, '11.jpg'),
	(2, 'Biblioteca Burger', 12.99, 15.99, '12.jpg'),
	(3, 'Reitor Supremo', 10.99, 16.99, '13.jpg'),
	(4, 'Noite de Estudo', 8.99, 13.99, '14.jpg'),
	(5, 'Praça da República', 11.99, 14.99, '15.jpg'),
	(6, 'O Erasmus', 9.99, 15.99, '16.jpg');

-- A despejar dados para tabela iscac_burguer.utilizadores: ~4 rows (aproximadamente)
INSERT INTO `utilizadores` (`id`, `nome`, `email`, `senha`, `nivel`) VALUES
	(1, 'Administrador', 'admin@iscac.pt', 'admin123', 1),
	(2, 'Joao Aluno', 'aluno@iscac.pt', 'aluno123', 0),
	(3, 'Marcello', 'marcello@iscac.pt', 'marcello123', 0),
	(4, 'Marcello Portugal', 'marcellomportugal2003@gmail.com', '250603MA', 0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
