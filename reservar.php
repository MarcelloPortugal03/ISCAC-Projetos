<?php

require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/includes/header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pdo = \Config\Database::getInstance()->getConnection();
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $contact = trim($_POST['contact'] ?? '');
    $people = (int)($_POST['people'] ?? 1);
    $datetime = trim($_POST['datetime'] ?? '');

    // Validações simples
    if ($name === '') $errors[] = 'Nome é obrigatório.';
    if ($contact === '') $errors[] = 'Contacto é obrigatório.';
    if ($people <= 0) $errors[] = 'Número de pessoas inválido.';
    if ($datetime === '') $errors[] = 'Data / hora é obrigatória.';

    if (empty($errors)) {
        $stmt = $pdo->prepare('INSERT INTO reservations (name, contact, people, datetime, status, created_at) VALUES (:name, :contact, :people, :datetime, :status, :created_at)');
        try {
            $stmt->execute([
                ':name' => $name,
                ':contact' => $contact,
                ':people' => $people,
                ':datetime' => $datetime,
                ':status' => 'pending',
                ':created_at' => date('Y-m-d H:i:s')
            ]);
            $success = 'Reserva enviada com sucesso! Entraremos em contacto para confirmar.';
            // limpar campos
            $_POST = [];
        } catch (Exception $e) {
            $errors[] = 'Erro ao gravar a reserva. Tente novamente.';
        }
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card border-0 shadow bg-dark text-white">
                <div class="card-body">
                    <h3 class="card-title mb-4">Reservar Mesa</h3>

                    <?php if ($success): ?>
                        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
                    <?php endif; ?>

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger">
                            <?php foreach ($errors as $e) echo '<div>' . htmlspecialchars($e) . '</div>'; ?>
                        </div>
                    <?php endif; ?>

                    <form method="post" action="reservar.php" class="row g-3" novalidate>
                        <div class="col-md-6">
                            <label class="form-label">Nome</label>
                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Contacto (email ou telefone)</label>
                            <input type="text" name="contact" class="form-control" value="<?= htmlspecialchars($_POST['contact'] ?? '') ?>">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Pessoas</label>
                            <input type="number" name="people" class="form-control" min="1" value="<?= htmlspecialchars($_POST['people'] ?? 1) ?>">
                        </div>

                        <div class="col-md-8">
                            <label class="form-label">Data e Hora</label>
                            <input type="datetime-local" name="datetime" class="form-control" value="<?= htmlspecialchars($_POST['datetime'] ?? '') ?>">
                        </div>

                        <div class="col-12">
                            <button class="btn btn-accent">Enviar Reserva</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>