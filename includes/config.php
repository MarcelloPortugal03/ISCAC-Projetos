<?php
// 1. Ligação à Base de Dados
$host = 'localhost';
$dbname = 'iscac_burguer';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na ligação: " . $e->getMessage());
}

// 2. CORREÇÃO DEFINITIVA DA BASE_URL
if (!defined('BASE_URL')) {
    // Captura o protocolo (http ou https)
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
    
    // Captura o domínio (ex: localhost)
    $host = $_SERVER['HTTP_HOST'];
    
    // Pega no caminho do script atual (ex: /web1/auth/login.php)
    $current_path = $_SERVER['SCRIPT_NAME'];
    
    // Esta linha "limpa" o caminho para encontrar sempre a pasta principal do projeto
    // Ela remove 'auth/', 'admin/' e o nome do ficheiro, sobrando apenas a base.
    $root_path = str_replace(['auth/', 'admin/', basename($current_path)], '', $current_path);
    
    // Garante que o caminho termina com uma barra /
    $root_path = rtrim($root_path, '/') . '/';
    
    define('BASE_URL', $protocol . "://" . $host . $root_path);
}
?>