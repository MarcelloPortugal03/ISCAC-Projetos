<?php
session_start();
// O config.php fornece a BASE_URL necessária para o redirecionamento portátil
require_once('includes/config.php');

// 1. VERIFICAÇÃO DE SEGURANÇA CORRIGIDA:
// Se não houver login, manda para o login usando a URL dinâmica absoluta.
if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "auth/login.php?erro=precisa_login");
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

// 5. REMOVER ITEM (Caso o link de remover no ver_carrinho.php aponte para aqui)
if (isset($_GET['remover'])) {
    $id_remover = $_GET['remover'];
    if (isset($_SESSION['carrinho'][$id_remover])) {
        unset($_SESSION['carrinho'][$id_remover]);
    }
    // Após remover, volta para o resumo do carrinho
    header("Location: " . BASE_URL . "ver_carrinho.php");
    exit;
}

// Após adicionar, volta para o menu usando a BASE_URL dinâmica
header("Location: " . BASE_URL . "menu.php");
exit;
?>