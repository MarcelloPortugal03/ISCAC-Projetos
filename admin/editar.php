<?php
session_start();
require_once('../includes/config.php');

// SEGURANÇA: Só Admin
if (!isset($_SESSION['user_nivel']) || $_SESSION['user_nivel'] != 1) {
    header("Location: ../index.php");
    exit;
}

// 1. Pega o ID do produto que clicaste na tabela
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) { header("Location: admin.php"); exit; }
} else { header("Location: admin.php"); exit; }

// 2. Salva as alterações
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE produtos SET nome = ?, preco = ?, preco_antigo = ?, imagem = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$_POST['nome'], $_POST['preco'], $_POST['preco_antigo'], $_POST['imagem'], $id]);
    header("Location: admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <title>Editar — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <?php include('../includes/navbar.php'); ?>

    <div class="container py-5">
        <div class="card bg-dark border-secondary p-4 mx-auto" style="max-width: 500px;">
            <h2 class="text-center mb-4">Editar <span class="text-danger">Hambúrguer</span></h2>
            <form method="POST">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control bg-dark text-white" value="<?= $produto['nome'] ?>" required>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label>Preço (€)</label>
                        <input type="number" step="0.01" name="preco" class="form-control bg-dark text-white" value="<?= $produto['preco'] ?>" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label>Preço Antigo (€)</label>
                        <input type="number" step="0.01" name="preco_antigo" class="form-control bg-dark text-white" value="<?= $produto['preco_antigo'] ?>">
                    </div>
                </div>
                <div class="mb-4">
                    <label>Imagem (nome do ficheiro)</label>
                    <input type="text" name="imagem" class="form-control bg-dark text-white" value="<?= $produto['imagem'] ?>" required>
                </div>
                <button type="submit" class="btn btn-accent w-100 fw-bold">SALVAR ALTERAÇÕES</button>
            </form>
        </div>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>