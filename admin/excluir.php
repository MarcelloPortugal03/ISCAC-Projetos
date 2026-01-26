<?php
session_start();
// O config.php fornece a BASE_URL necessária para o redirecionamento seguro
require_once('../includes/config.php');

// SEGURANÇA CORRIGIDA: Redirecionamento dinâmico e absoluto
if (!isset($_SESSION['user_nivel']) || $_SESSION['user_nivel'] != 1) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}

// Verifica se o ID foi enviado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a remoção na base de dados
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
}

// Volta para a página de administração usando o caminho completo e portátil
header("Location: " . BASE_URL . "admin/admin.php");
exit;
?>