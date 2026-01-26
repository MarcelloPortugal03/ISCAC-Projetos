<?php
// Incluímos o config para ter acesso à BASE_URL dinâmica
require_once('../includes/config.php');

session_start();   // Inicia a sessão para saber qual fechar
session_unset();   // Remove todas as variáveis da sessão
session_destroy(); // Destrói a sessão completamente

// Redireciona para a home usando o caminho absoluto dinâmico
header("Location: " . BASE_URL . "index.php");
exit;
?>