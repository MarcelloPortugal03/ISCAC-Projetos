<?php

require_once __DIR__ . '/../config/Database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Bloqueia acesso se não for admin
if (empty($_SESSION['user']) || ($_SESSION['user']['role'] ?? '') !== 'admin') {
    header('Location: ../login.php');
    exit;
}

$pdo = \Config\Database::getInstance()->getConnection();

// Busca utilizadores
$usersStmt = $pdo->query('SELECT id, username, name, role, created_at FROM users ORDER BY id ASC');
$users = $usersStmt->fetchAll();

// Busca reservas (pendentes)
$resStmt = $pdo->prepare('SELECT id, name, contact, people, datetime, status, created_at FROM reservations ORDER BY datetime ASC');
$resStmt->execute();
$reservations = $resStmt->fetchAll();

require_once __DIR__ . '/../includes/header.php';
?>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Painel de Administração</h2>
        <div>
            <a href="../login.php?action=logout" class="btn btn-sm btn-outline-light me-2">Sair</a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card border-0 shadow bg-dark text-white">
                <div class="card-body">
                    <h4>Utilizadores</h4>
                    <?php if (empty($users)): ?>
                        <div class="alert alert-info">Nenhum utilizador encontrado.</div>
                    <?php else: ?>
                        <table class="table table-dark table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Nome</th>
                                    <th>Role</th>
                                    <th>Criado em</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $u): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($u['id']) ?></td>
                                        <td><?= htmlspecialchars($u['username']) ?></td>
                                        <td><?= htmlspecialchars($u['name']) ?></td>
                                        <td><?= htmlspecialchars($u['role']) ?></td>
                                        <td><?= htmlspecialchars($u['created_at']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card border-0 shadow bg-dark text-white">
                <div class="card-body">
                    <h4>Reservas</h4>

                    <?php if (empty($reservations)): ?>
                        <div class="alert alert-info">Sem reservas.</div>
                    <?php else: ?>
                        <table class="table table-dark table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Contacto</th>
                                    <th>Pessoas</th>
                                    <th>Data/Hora</th>
                                    <th>Status</th>
                                    <th>Criado em</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reservations as $r): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($r['id']) ?></td>
                                        <td><?= htmlspecialchars($r['name']) ?></td>
                                        <td><?= htmlspecialchars($r['contact']) ?></td>
                                        <td><?= htmlspecialchars($r['people']) ?></td>
                                        <td><?= htmlspecialchars($r['datetime']) ?></td>
                                        <td><?= htmlspecialchars($r['status']) ?></td>
                                        <td><?= htmlspecialchars($r['created_at']) ?></td>
                                        <td>
                                            <?php if ($r['status'] !== 'accepted'): ?>
                                                <a href="action.php?do=accept&id=<?= urlencode($r['id']) ?>" class="btn btn-sm btn-success">Aceitar</a>
                                            <?php endif; ?>
                                            <?php if ($r['status'] !== 'rejected'): ?>
                                                <a href="action.php?do=reject&id=<?= urlencode($r['id']) ?>" class="btn btn-sm btn-danger">Rejeitar</a>
                                            <?php endif; ?>
                                            <a href="action.php?do=delete&id=<?= urlencode($r['id']) ?>" class="btn btn-sm btn-secondary">Apagar</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>