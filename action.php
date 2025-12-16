<?php

require_once __DIR__ . '/../config/Database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica admin
if (empty($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
    header('Location: ../login.php');
    exit;
}

$pdo = \Config\Database::getInstance()->getConnection();

$allowed = ['accept', 'reject', 'delete'];
$do = $_GET['do'] ?? '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!in_array($do, $allowed, true) || $id <= 0) {
    header('Location: index.php');
    exit;
}

try {
    if ($do === 'accept') {
        $stmt = $pdo->prepare('UPDATE reservations SET status = :s WHERE id = :id');
        $stmt->execute([':s' => 'accepted', ':id' => $id]);
    } elseif ($do === 'reject') {
        $stmt = $pdo->prepare('UPDATE reservations SET status = :s WHERE id = :id');
        $stmt->execute([':s' => 'rejected', ':id' => $id]);
    } elseif ($do === 'delete') {
        $stmt = $pdo->prepare('DELETE FROM reservations WHERE id = :id');
        $stmt->execute([':id' => $id]);
    }
} catch (Exception $e) {
    
}

// Redireciona de volta para o painel admin
header('Location: index.php');
exit;