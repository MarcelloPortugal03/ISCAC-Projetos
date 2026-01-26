<?php 
session_start();
// O config.php agora é o nosso "cérebro" de caminhos
require_once('../includes/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['fEmail']);
    $senha = $_POST['fSenha'];

    $stmt = $pdo->prepare("SELECT * FROM utilizadores WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificação de senha (o professor pode exigir password_verify futuramente, 
    // mas mantemos a tua lógica de comparação direta para não quebrar os teus utilizadores atuais)
    if ($user && $senha === $user['senha']) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_nome'] = $user['nome'];
        $_SESSION['user_nivel'] = $user['nivel']; 
        
        // CORREÇÃO 100%: Redirecionamento usando a URL completa e dinâmica
        header("Location: " . BASE_URL . "index.php");
        exit;
    } else {
        $erro = "Email ou senha incorretos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/style.css" rel="stylesheet">
</head>
<body class="main-bg d-flex align-items-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-4 shadow border-0 bg-dark text-white">
                    <div class="text-center mb-4">
                        <img src="<?= BASE_URL ?>imgs/logo11.png" alt="logo" width="60">
                        <h3 class="text-accent mt-2">Área do Cliente</h3>
                    </div>

                    <?php if(isset($erro)): ?>
                        <div class="alert alert-danger p-2 small text-center"><?= $erro ?></div>
                    <?php endif; ?>

                    <?php if(isset($_GET['erro']) && $_GET['erro'] == 'precisa_login'): ?>
                        <div class="alert alert-warning p-2 small text-center text-dark">
                            <strong>Aviso:</strong> Faça login para poder comprar!
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="fEmail" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Palavra-passe</label>
                            <input type="password" id="password" name="fSenha" class="form-control bg-dark text-white border-secondary" required>
                        </div>
                        <button type="submit" class="btn btn-accent w-100 fw-bold py-2">ENTRAR</button>
                    </form>
                    
                    <div class="text-center mt-3">
                        <p class="small mb-1 text-white-50">Não tem conta?</p>
                        <a href="<?= BASE_URL ?>auth/registo.php" class="text-accent text-decoration-none fw-bold">Criar conta gratuita</a>
                        <hr class="border-secondary">
                        <a href="<?= BASE_URL ?>index.php" class="text-white-50 text-decoration-none small">← Voltar ao site</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>