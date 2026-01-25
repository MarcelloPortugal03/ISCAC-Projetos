<?php
session_start();
require_once('../includes/config.php');

// SEGURANÇA: Só Admin pode apagar
if (!isset($_SESSION['user_nivel']) || $_SESSION['user_nivel'] != 1) {
    header("Location: ../index.php");
    exit;
}

// Verifica se o ID foi enviado
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepara a remoção na base de dados
    $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
}

// Volta para a página de administração
header("Location: admin.php");
exit;