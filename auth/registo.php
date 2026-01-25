<?php
// Caminho atualizado: Sair de auth/ para entrar em includes/
require_once('../includes/config.php');

if (isset($_POST['btn-registar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha']; // Senha simples igual ao teu admin

    $sql = $pdo->prepare("INSERT INTO utilizadores (nome, email, senha, nivel) VALUES (?, ?, ?, 0)");
    if ($sql->execute([$nome, $email, $senha])) {
        // Redireciona para login.php que está na mesma pasta (auth/)
        header("Location: login.php?sucesso=1");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <title>Registo — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex align-items-center" style="height: 100vh;">
    <div class="container" style="max-width: 400px;">
        <div class="card bg-dark border-secondary p-4 shadow">
            <h3 class="text-center fw-bold mb-4">Criar Conta</h3>
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
                <button type="submit" name="btn-registar" class="btn btn-danger w-100 fw-bold">Registar</button>
            </form>
            <p class="mt-3 text-center small">Já tem conta? <a href="login.php" class="text-danger">Faça Login</a></p>
        </div>
    </div>
</body>
</html>