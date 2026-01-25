<?php
session_start();
require_once('../includes/config.php');

// SEGURANÇA: Só Admin
if (!isset($_SESSION['user_nivel']) || $_SESSION['user_nivel'] != 1) {
    // Alterado: index.php está na raiz, fora da pasta admin
    header("Location: ../index.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM pedidos WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: pedidos_admin.php");
exit;