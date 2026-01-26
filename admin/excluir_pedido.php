<?php
session_start();
// O config.php é vital para sabermos a BASE_URL
require_once('../includes/config.php');

// SEGURANÇA CORRIGIDA: Redirecionamento dinâmico se não for Admin
if (!isset($_SESSION['user_nivel']) || $_SESSION['user_nivel'] != 1) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Primeiro apagamos os itens do pedido (se tiveres uma tabela de itens_pedidos com FK)
    // Se a tua tabela for simples, apenas o comando abaixo basta:
    $stmt = $pdo->prepare("DELETE FROM pedidos WHERE id = ?");
    $stmt->execute([$id]);
}

// Redirecionamento 100% portátil para a lista de pedidos
header("Location: " . BASE_URL . "admin/pedidos_admin.php");
exit;
?>