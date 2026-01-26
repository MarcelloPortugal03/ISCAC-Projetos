-- ==========================================================
-- ESTRUTURA DA BASE DE DADOS: ISCAC BURGUER (VERSÃO FINAL)
-- ESTE FICHEIRO CRIA A BASE DE DADOS E AS TABELAS AUTOMATICAMENTE
-- ==========================================================

-- 1. RESOLVE O PROBLEMA "INSIRA ONDE?": CRIA E SELECIONA A BASE DE DADOS
CREATE DATABASE IF NOT EXISTS `iscac_burguer` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `iscac_burguer`;

-- 2. LIMPEZA DE SEGURANÇA (Para permitir re-importação sem erros)
DROP TABLE IF EXISTS `pedidos`;
DROP TABLE IF EXISTS `produtos`;
DROP TABLE IF EXISTS `utilizadores`;

-- 3. ESTRUTURA DA TABELA UTILIZADORES
CREATE TABLE `utilizadores` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL UNIQUE,
    `senha` VARCHAR(255) NOT NULL,
    `nivel` INT DEFAULT 0 -- 0: Cliente, 1: Admin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 4. ESTRUTURA DA TABELA PRODUTOS
CREATE TABLE `produtos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nome` VARCHAR(100) NOT NULL,
    `preco` DECIMAL(10,2) NOT NULL,
    `preco_antigo` DECIMAL(10,2),
    `imagem` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 5. ESTRUTURA DA TABELA PEDIDOS
CREATE TABLE `pedidos` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `items` TEXT NOT NULL,
    `total` DECIMAL(10,2) NOT NULL,
    `data_pedido` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `utilizadores`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ==========================================================
-- INSERÇÃO DE DADOS (POPULAR O SISTEMA)
-- ==========================================================

-- Inserir Utilizadores (Admin e Clientes de teste)
INSERT INTO `utilizadores` (`id`, `nome`, `email`, `senha`, `nivel`) VALUES 
(1, 'Administrador', 'admin@iscac.pt', 'admin123', 1),
(2, 'Joao Aluno', 'aluno@iscac.pt', 'aluno123', 0),
(3, 'Marcello', 'marcello@iscac.pt', 'marcello123', 0),
(4, 'Marcello Portugal', 'marcellomportugal2003@gmail.com', '250603MA', 0);

-- Inserir Produtos (Com os nomes das imagens 11.jpg, 12.jpg, etc)
INSERT INTO `produtos` (`id`, `nome`, `preco`, `preco_antigo`, `imagem`) VALUES 
(1, 'O Académico', 15.99, 20.99, '11.jpg'),
(2, 'Biblioteca Burger', 12.99, 15.99, '12.jpg'),
(3, 'Reitor Supremo', 10.99, 16.99, '13.jpg'),
(4, 'Noite de Estudo', 8.99, 13.99, '14.jpg'),
(5, 'Praça da República', 11.99, 14.99, '15.jpg'),
(6, 'O Erasmus', 9.99, 15.99, '16.jpg');

-- Inserir Histórico de Pedidos
INSERT INTO `pedidos` (`id`, `user_id`, `items`, `total`, `data_pedido`) VALUES
(1, 2, '1x O Académico | 1x Biblioteca Burger', 28.98, '2026-01-24 19:30:00'),
(2, 3, '1x Reitor Supremo | 2x O Erasmus', 30.97, '2026-01-25 14:10:00');