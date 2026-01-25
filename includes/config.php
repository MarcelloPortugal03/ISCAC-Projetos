<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=iscac_burguer', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao ligar à base de dados: " . $e->getMessage());
}
?>