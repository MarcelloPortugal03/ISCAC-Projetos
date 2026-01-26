<?php
// O config.php fornece a nossa BASE_URL dinâmica
require_once('../includes/config.php');

if (isset($_POST['btn-registar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; 

    $sql = $pdo->prepare("INSERT INTO utilizadores (nome, email, senha, nivel) VALUES (?, ?, ?, 0)");
    if ($sql->execute([$nome, $email, $senha])) {
        // Redirecionamento 100% portátil usando a BASE_URL
        header("Location: " . BASE_URL . "auth/login.php?sucesso=1");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registo — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/style.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex align-items-center" style="height: 100vh;">
    <div class="container" style="max-width: 400px;">
        <div class="card bg-dark border-secondary p-4 shadow">
            <div class="text-center mb-4">
                <img src="<?= BASE_URL ?>imgs/logo11.png" alt="logo" width="50" class="mb-2">
                <h3 class="fw-bold">Criar Conta</h3>
            </div>
            <form method="POST">
                <div class="mb-3">
                    <label class="small">Nome Completo</label>
                    <input type="text" name="nome" class="form-control bg-dark text-white border-secondary" required>
                </div>
                <div class="mb-3">
                    <label class="small">Email</label>
                    <input type="email" name="email" class="form-control bg-dark text-white border-secondary" required>
                </div>
                <div class="mb-3">
                    <label class="small">Senha</label>
                    <input type="password" name="senha" class="form-control bg-dark text-white border-secondary" required>
                </div>
                <button type="submit" name="btn-registar" class="btn btn-danger w-100 fw-bold py-2">Registar</button>
            </form>
            <p class="mt-3 text-center small text-white-50">
                Já tem conta? <a href="<?= BASE_URL ?>auth/login.php" class="text-danger text-decoration-none fw-bold">Faça Login</a>
            </p>
            <div class="text-center">
                <a href="<?= BASE_URL ?>index.php" class="text-white-50 small text-decoration-none">← Voltar ao site</a>
            </div>
        </div>
    </div>
</body>
</html>