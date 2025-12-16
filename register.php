<?php


require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/includes/header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Se já autenticado, redireciona (usuário não precisa se registrar se já estiver logado)
if (!empty($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$pdo = \Config\Database::getInstance()->getConnection();
$errors = [];
$success = '';

// Processa o registo
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $name = trim($_POST['name'] ?? '');
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';

    // 1. Validação básica
    if (strlen($username) < 3) $errors[] = 'O Usuário deve ter pelo menos 3 caracteres.';
    if (strlen($name) < 3) $errors[] = 'O Nome deve ser preenchido.';
    if (strlen($password) < 6) $errors[] = 'A Senha deve ter pelo menos 6 caracteres.';
    if ($password !== $password_confirm) $errors[] = 'As senhas não coincidem.';

    // 2. Verifica se o nome de usuário já existe
    if (empty($errors)) {
        $stmt = $pdo->prepare('SELECT id FROM users WHERE username = :u LIMIT 1');
        $stmt->execute([':u' => $username]);
        if ($stmt->fetch()) {
            $errors[] = 'Este nome de usuário já está em uso.';
        }
    }

    // 3. Insere o utilizador se não houver erros
    if (empty($errors)) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $pdo->prepare('INSERT INTO users (username, name, password_hash, role, created_at) VALUES (:u, :n, :h, :r, :c)');
        
        try {
            $stmt->execute([
                ':u' => $username,
                ':n' => $name,
                ':h' => $password_hash,
                ':r' => 'client', // Novo utilizador sempre será 'client'
                ':c' => date('Y-m-d H:i:s')
            ]);
            $success = 'Registo concluído com sucesso! Agora pode iniciar sessão.';
            
            // Limpa os campos após o sucesso
            $_POST = []; 
        } catch (\PDOException $e) {
            $errors[] = 'Erro ao registar. Tente novamente ou contacte o suporte.';
        }
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow bg-dark text-white">
                <div class="card-body">
                    <h3 class="card-title mb-4">Criar Conta</h3>

                    <?php if ($success): ?>
                        <div class="alert alert-success"><?= htmlspecialchars($success) ?> <a href="login.php">Iniciar Sessão</a></div>
                    <?php endif; ?>

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $e) echo '<div>' . htmlspecialchars($e) . '</div>'; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="register.php" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Nome de Utilizador</label>
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nome Completo</label>
                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirmar Senha</label>
                            <input type="password" name="password_confirm" class="form-control" required>
                        </div>

                        <button class="btn btn-accent w-100">Registar</button>
                    </form>

                    <p class="mt-3 text-muted small text-center">Já tem conta? <a href="login.php" class="text-accent">Iniciar Sessão</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>