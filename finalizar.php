<?php
session_start();
require_once('includes/config.php');

if (!isset($_SESSION['user_id']) || !isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
    header("Location: menu.php");
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

$sql = "INSERT INTO pedidos (user_id, items, total) VALUES (?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id, $lista_itens, $totalGeral]);

unset($_SESSION['carrinho']);
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <title>Pedido Confirmado — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-dark text-white">

    <?php include('includes/navbar.php'); ?>

    <div class="container py-5 text-center">
        <i class="fas fa-check-circle text-success mb-4" style="font-size: 5rem;"></i>
        <h1 class="display-4 fw-bold">Pedido <span class="text-accent">Recebido!</span></h1>
        <p class="lead text-white-50">O teu pedido foi registado no sistema com sucesso.</p>
        
        <div class="card bg-dark border-secondary p-4 my-4 mx-auto" style="max-width: 500px;">
            <p><strong>Total Pago:</strong> €<?= number_format($totalGeral, 2, ',', '.') ?></p>
            <p class="small text-muted">Apresenta o teu nome no balcão para levantar o hambúrguer.</p>
        </div>

        <a href="index.php" class="btn btn-accent btn-lg px-5">Voltar ao Início</a>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>