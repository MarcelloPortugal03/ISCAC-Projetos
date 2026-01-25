<?php
session_start();
require_once('includes/config.php');

// 1. VERIFICAÇÃO DE SEGURANÇA: 
// Impede que utilizadores sem conta adicionem itens ao carrinho.
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php?erro=precisa_login");
    exit;
}

// 2. Verificar se foi enviado um ID por GET
if (isset($_GET['add'])) {
    $id = $_GET['add'];

    // 3. Se o carrinho ainda não existe na sessão, criamos um array vazio
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // 4. Adicionamos o produto ao carrinho (se já existir, aumenta a quantidade)
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id] += 1;
    } else {
        $_SESSION['carrinho'][$id] = 1;
    }
}

header("Location: menu.php");
exit;
?>