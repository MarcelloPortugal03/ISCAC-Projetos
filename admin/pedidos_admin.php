<?php
session_start();
require_once('../includes/config.php');

if (!isset($_SESSION['user_nivel']) || $_SESSION['user_nivel'] != 1) {
    header("Location: ../index.php");
    exit;
}

$sql = "SELECT pedidos.*, utilizadores.nome AS cliente_nome 
        FROM pedidos 
        JOIN utilizadores ON pedidos.user_id = utilizadores.id 
        ORDER BY pedidos.data_pedido DESC";
$stmt = $pdo->query($sql);
$pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestão de Pedidos — Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

    <?php include('../includes/navbar.php'); ?>

    <div class="container py-5">
        <h2 class="fw-bold mb-4 title">Histórico de <span class="text-danger">Pedidos</span></h2>

        <div class="card bg-dark border-secondary shadow-lg overflow-hidden">
            <div class="table-responsive">
                <table class="table table-dark table-hover align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>ID #</th>
                            <th>Cliente</th>
                            <th>Itens Comprados</th>
                            <th>Total</th>
                            <th>Data/Hora</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($pedidos) > 0): ?>
                            <?php foreach($pedidos as $ped): ?>
                            <tr>
                                <td class="fw-bold text-accent">#<?= $ped['id'] ?></td>
                                <td><?= $ped['cliente_nome'] ?></td>
                                <td class="small text-white-50"><?= $ped['items'] ?></td>
                                <td class="fw-bold text-success">€<?= number_format($ped['total'], 2, ',', '.') ?></td>
                                <td><?= date('d/m/Y H:i', strtotime($ped['data_pedido'])) ?></td>
                                <td class="text-center">
                                    <a href="excluir_pedido.php?id=<?= $ped['id'] ?>" 
                                       class="btn btn-outline-danger btn-sm" 
                                       onclick="return confirmarAcao(event, 'Confirmas que este pedido foi entregue/pago e pode ser removido do histórico?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Ainda não foram feitos pedidos.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include('../includes/footer.php'); ?>

</body>
</html>