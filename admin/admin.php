<?php
session_start();
require_once('../includes/config.php');

// SEGURANÇA: Só permite acesso se for Nível 1 (Admin)
if (!isset($_SESSION['user_nivel']) || $_SESSION['user_nivel'] != 1) {
    header("Location: ../index.php");
    exit;
}

$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel Admin — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="../css/style.css" rel="stylesheet">
    <style>
        .admin-card { background: #181820; border: 1px solid #333; border-radius: 15px; overflow: hidden; }
        .table-admin { color: #fff; margin-bottom: 0; }
        .table-admin thead { background-color: #000; }
        .table-admin th { border-bottom: 2px solid #4C160F; padding: 1.2rem; text-transform: uppercase; font-size: 0.85rem; }
        .table-admin td { padding: 1rem 1.2rem; vertical-align: middle; border-bottom: 1px solid #2a2a35; }
        .img-admin { width: 55px; height: 55px; object-fit: cover; border-radius: 8px; border: 1px solid #4C160F; }
    </style>
</head>
<body class="bg-dark text-white">

    <?php include('../includes/navbar.php'); ?>

    <div class="container py-5">
        <div class="row mb-4 align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold m-0 title">Gestão de <span class="text-danger">Produtos</span></h2>
            </div>
            <div class="col-md-6 text-md-end mt-3 mt-md-0">
                <a href="adicionar_produto.php" class="btn btn-accent px-4 py-2 shadow-sm fw-bold">
                    <i class="fas fa-plus me-2"></i>Novo Hambúrguer
                </a>
            </div>
        </div>

        <div class="admin-card shadow-lg">
            <div class="table-responsive">
                <table class="table table-admin">
                    <thead>
                        <tr>
                            <th>Produto</th>
                            <th>Preço Atual</th>
                            <th>Preço Antigo</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($produtos as $p): ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="../imgs/<?= $p['imagem'] ?>" class="img-admin me-3">
                                    <span class="fw-bold"><?= $p['nome'] ?></span>
                                </div>
                            </td>
                            <td class="text-accent fw-bold">€<?= number_format($p['preco'], 2, ',', '.') ?></td>
                            <td class="text-muted text-decoration-line-through">
                                <?= $p['preco_antigo'] > 0 ? '€'.number_format($p['preco_antigo'], 2, ',', '.') : '-' ?>
                            </td>
                            <td class="text-center">
                                <a href="editar.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm me-2">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                <a href="excluir.php?id=<?= $p['id'] ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirmarAcao(event, 'Tens a certeza que queres eliminar este hambúrguer?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include('../includes/footer.php'); ?>

</body>
</html>