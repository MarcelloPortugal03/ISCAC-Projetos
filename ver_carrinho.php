<?php
session_start();
require_once('includes/config.php');

// Se não houver login, manda para o login com erro (pasta auth)
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php?erro=precisa_login");
    exit;
}

$totalGeral = 0;
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>O Meu Carrinho — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

    <?php include('includes/navbar.php'); ?>

    <div class="container py-5">
        <h2 class="fw-bold mb-4 text-center">Resumo do <span class="text-danger">Pedido</span></h2>

        <?php if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])): ?>
            <div class="text-center py-5 border border-secondary rounded bg-dark">
                <p class="text-muted">Ainda não escolheste nada...</p>
                <a href="menu.php" class="btn btn-outline-light">Ir ao Menu</a>
            </div>
        <?php else: ?>
            <div class="table-responsive bg-dark p-3 rounded shadow border border-secondary">
                <table class="table table-dark table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Hambúrguer</th>
                            <th>Preço</th>
                            <th class="text-center">Qtd</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach ($_SESSION['carrinho'] as $id => $qtd): 
                            $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
                            $stmt->execute([$id]);
                            $p = $stmt->fetch(PDO::FETCH_ASSOC);
                            if ($p):
                                $subtotal = $p['preco'] * $qtd;
                                $totalGeral += $subtotal;
                        ?>
                        <tr>
                            <td><?= $p['nome'] ?></td>
                            <td>€<?= number_format($p['preco'], 2, ',', '.') ?></td>
                            <td class="text-center"><?= $qtd ?></td>
                            <td class="text-accent fw-bold">€<?= number_format($subtotal, 2, ',', '.') ?></td>
                            <td><a href="carrinho.php?remover=<?= $id ?>" class="text-danger text-decoration-none small">Remover</a></td>
                        </tr>
                        <?php endif; endforeach; ?>
                    </tbody>
                </table>
                
                <div class="text-end mt-4">
                    <h3>Total: <span class="text-danger">€<?= number_format($totalGeral, 2, ',', '.') ?></span></h3>
                    <hr class="border-secondary">
                    <a href="menu.php" class="btn btn-outline-secondary me-2">Continuar a Comprar</a>
                    <a href="finalizar.php" class="btn btn-accent btn-lg fw-bold">FINALIZAR PEDIDO</a>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php include('includes/footer.php'); ?>

</body>
</html>