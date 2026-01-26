<?php
session_start();
require_once('../includes/config.php');

// SEGURANÇA CORRIGIDA: Redirecionamento dinâmico
if (!isset($_SESSION['user_nivel']) || $_SESSION['user_nivel'] != 1) {
    header("Location: " . BASE_URL . "index.php");
    exit;
}

$erro_upload = '';

// Lógica para Salvar o Produto COM UPLOAD DE IMAGEM
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $preco_antigo = $_POST['preco_antigo'];
    $imagem = ''; 

    // === Processamento da Imagem ===
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == 0) {
        // Usamos __DIR__ para localizar a pasta imgs de forma absoluta no servidor
        $target_dir = __DIR__ . "/../imgs/"; 
        $file_name = basename($_FILES["imagem"]["name"]);
        $target_file = $target_dir . $file_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Verificar se é uma imagem real
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if ($check !== false) {
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $erro_upload = "Desculpa, apenas JPG, JPEG, PNG & GIF são permitidos.";
            } else {
                if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
                    $imagem = $file_name; 
                } else {
                    $erro_upload = "Desculpa, houve um erro ao carregar o ficheiro.";
                }
            }
        } else {
            $erro_upload = "O ficheiro não é uma imagem.";
        }
    } else {
        $erro_upload = "Por favor, selecione uma imagem para o produto.";
    }

    if (empty($erro_upload) && !empty($imagem)) {
        $sql = "INSERT INTO produtos (nome, preco, preco_antigo, imagem) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $preco, $preco_antigo, $imagem]);

        // Redirecionamento corrigido para 100% de portabilidade
        header("Location: " . BASE_URL . "admin/admin.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Novo Hambúrguer — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/style.css" rel="stylesheet">
    <style>
        .form-card { background: #181820; border: 1px solid #333; border-radius: 20px; padding: 40px; max-width: 600px; margin: 0 auto; }
        .form-control { background-color: #0F0F0F !important; border: 1px solid #333 !important; color: white !important; padding: 12px; }
        .form-control:focus { border-color: #4C160F !important; box-shadow: 0 0 0 0.25rem rgba(76, 22, 15, 0.2) !important; }
        label { color: #aaa; margin-bottom: 8px; font-weight: 500; }
        .form-control[type="file"] { background-color: #0F0F0F; color: #fff; border: 1px solid #333; }
        .form-control[type="file"]::file-selector-button { background-color: #4C160F; color: #fff; border: none; padding: 0.5rem 1rem; margin-right: 1rem; border-radius: 5px; cursor: pointer; transition: background-color 0.2s ease; }
        .form-control[type="file"]::file-selector-button:hover { background-color: #3a100b; }
    </style>
</head>
<body class="bg-dark text-white">

    <?php include('../includes/navbar.php'); ?>

    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="title m-0">Novo <span class="text-danger">Hambúrguer</span></h2>
            <p class="text-white-50">Preencha os detalhes para adicionar ao menu</p>
        </div>

        <div class="form-card shadow-lg">
            <?php if (!empty($erro_upload)): ?>
                <div class="alert alert-danger" role="alert"><?= $erro_upload ?></div>
            <?php endif; ?>

            <form action="" method="POST" enctype="multipart/form-data"> 
                <div class="mb-3">
                    <label>Nome do Produto</label>
                    <input type="text" name="nome" class="form-control" placeholder="Ex: Master Bacon" required>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Preço Atual (€)</label>
                        <input type="number" step="0.01" name="preco" class="form-control" placeholder="9.99" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Preço Antigo (€)</label>
                        <input type="number" step="0.01" name="preco_antigo" class="form-control" placeholder="12.99">
                    </div>
                </div>

                <div class="mb-4">
                    <label>Imagem do Produto</label>
                    <input type="file" name="imagem" class="form-control" accept="image/*" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-accent btn-lg fw-bold">SALVAR PRODUTO</button>
                    <a href="<?= BASE_URL ?>admin/admin.php" class="btn btn-outline-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <?php include('../includes/footer.php'); ?>

</body>
</html>