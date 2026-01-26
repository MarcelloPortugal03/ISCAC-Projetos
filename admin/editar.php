<?php
session_start();
// O config.php é essencial para termos a BASE_URL
require_once('../includes/config.php');

// SEGURANÇA CORRIGIDA: Redirecionamento 100% portátil
if (!isset($_SESSION['user_nivel']) || $_SESSION['user_nivel'] != 1) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}

// 1. Pega o ID do produto
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produto) { 
        header("Location: " . BASE_URL . "admin/admin.php"); 
        exit; 
    }
} else { 
    header("Location: " . BASE_URL . "admin/admin.php"); 
    exit; 
}

// 2. Salva as alterações
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "UPDATE produtos SET nome = ?, preco = ?, preco_antigo = ?, imagem = ? WHERE id = ?";
    $pdo->prepare($sql)->execute([$_POST['nome'], $_POST['preco'], $_POST['preco_antigo'], $_POST['imagem'], $id]);
    
    // Redirecionamento após sucesso também corrigido
    header("Location: " . BASE_URL . "admin/admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/style.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
    <?php include('../includes/navbar.php'); ?>

    <div class="container py-5">
        <div class="card bg-dark border-secondary p-4 mx-auto" style="max-width: 500px;">
            <h2 class="text-center mb-4">Editar <span class="text-danger">Hambúrguer</span></h2>
            <form method="POST">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control bg-dark text-white border-secondary" value="<?= $produto['nome'] ?>" required>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label>Preço (€)</label>
                        <input type="number" step="0.01" name="preco" class="form-control bg-dark text-white border-secondary" value="<?= $produto['preco'] ?>" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label>Preço Antigo (€)</label>
                        <input type="number" step="0.01" name="preco_antigo" class="form-control bg-dark text-white border-secondary" value="<?= $produto['preco_antigo'] ?>">
                    </div>
                </div>
                <div class="mb-4">
                    <label>Imagem (nome do ficheiro)</label>
                    <input type="text" name="imagem" class="form-control bg-dark text-white border-secondary" value="<?= $produto['imagem'] ?>" required>
                </div>
                <button type="submit" class="btn btn-accent w-100 fw-bold">SALVAR ALTERAÇÕES</button>
                <div class="text-center mt-3">
                    <a href="<?= BASE_URL ?>admin/admin.php" class="text-white-50 text-decoration-none small">Cancelar e voltar</a>
                </div>
            </form>
        </div>
    </div>

    <?php include('../includes/footer.php'); ?>
</body>
</html>