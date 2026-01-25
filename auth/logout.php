<?php
session_start(); // Inicia a sessão para saber qual fechar
session_unset(); // Remove todas as variáveis da sessão
session_destroy(); // Destrói a sessão completamente

// Redireciona de volta para a página inicial (subindo um nível para a raiz)
header("Location: ../index.php");
exit;
?>