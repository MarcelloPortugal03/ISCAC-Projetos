<?php


require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/includes/header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pdo = \Config\Database::getInstance()->getConnection();
$errors = [];

// Logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}

// Se já autenticado, redireciona
if (!empty($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Processa login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $errors[] = 'Preencha usuário e senha.';
    } else {
        $stmt = $pdo->prepare('SELECT id, username, password_hash, role FROM users WHERE username = :u LIMIT 1');
        $stmt->execute([':u' => $username]);
        $user = $stmt->fetch();

        if (!$user) {
            $errors[] = 'Usuário ou senha incorretos.';
        } else {
            $hash = $user['password_hash'];
            $valid = false;

            if (password_verify($password, $hash)) {
                $valid = true;
            } elseif ($hash === $password) {
                $valid = true;
                
                $newHash = password_hash($password, PASSWORD_DEFAULT);
                $update = $pdo->prepare('UPDATE users SET password_hash = :h WHERE id = :id');
                $update->execute([':h' => $newHash, ':id' => $user['id']]);
            }

            if ($valid) {
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];

                
                if ($user['role'] === 'admin') {
                    header('Location: admin/index.php');
                    exit;
                }
                header('Location: index.php');
                exit;
            } else {
                $errors[] = 'Usuário ou senha incorretos.';
            }
        }
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card border-0 shadow bg-dark text-white">
                <div class="card-body">
                    <h3 class="card-title mb-4">Entrar</h3>

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $e) echo '<div>' . htmlspecialchars($e) . '</div>'; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="login.php" novalidate>
                        <div class="mb-3">
                            <label class="form-label">Usuário</label>
                            <input type="text" name="username" class="form-control" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Senha</label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <button class="btn btn-accent w-100">Entrar</button>
                    </form>
                        <p class="mt-3 text-muted small text-center">
    Não tem conta? <a href="register.php" class="text-accent">Registe-se aqui</a>
</p>
<p class="mt-1 text-muted small text-center">Conta admin de exemplo: <strong>admin</strong> / <strong>123</strong></p>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>