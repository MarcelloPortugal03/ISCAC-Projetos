<?php
session_start();
// O config.php fornece a BASE_URL necessária para a portabilidade total
require_once('includes/config.php');

// SEGURANÇA CORRIGIDA: Se não houver login ou carrinho, volta para o menu dinamicamente
if (!isset($_SESSION['user_id']) || !isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    header("Location: " . BASE_URL . "menu.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$totalGeral = 0;
$lista_itens = "";

foreach ($_SESSION['carrinho'] as $id => $qtd) {
    $stmt = $pdo->prepare("SELECT nome, preco FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $p = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($p) {
        $subtotal = $p['preco'] * $qtd;
        $totalGeral += $subtotal;
        $lista_itens .= $qtd . "x " . $p['nome'] . " | ";
    }
}

// Gravação do pedido na base de dados
$sql = "INSERT INTO pedidos (user_id, items, total) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id, $lista_itens, $totalGeral]);

// Limpa o carrinho após a compra com sucesso
unset($_SESSION['carrinho']);
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pedido Confirmado — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-dark text-white">

    <?php include('includes/navbar.php'); ?>

    <div class="container py-5 text-center">
        <div class="mb-4">
            <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
        </div>
        <h1 class="display-4 fw-bold">Pedido <span class="text-accent">Recebido!</span></h1>
        <p class="lead text-white-50">O teu pedido foi registado no sistema com sucesso.</p>
        
        <div class="card bg-dark border-secondary p-4 my-4 mx-auto" style="max-width: 500px;">
            <p><strong>Total Pago:</strong> €<?= number_format($totalGeral, 2, ',', '.') ?></p>
            <p class="small text-muted">Apresenta o teu nome no balcão para levantar o hambúrguer.</p>
        </div>

        <a href="<?= BASE_URL ?>index.php" class="btn btn-accent btn-lg px-5">Voltar ao Início</a>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>