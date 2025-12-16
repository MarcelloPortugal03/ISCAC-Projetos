<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/** Base path - ajustar se estiver em subpasta (ex: '/projeto/') */
$BASE_PATH = '/';

function is_active(string $file): bool {
    // Determina se o link deve ser marcado como ativo
    $current = basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    return $current === $file;
}

?>
<!doctype html>
<html lang="pt-pt">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= htmlspecialchars($BASE_PATH) ?>style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark main-bg shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= $BASE_PATH ?>index.php">
            <img src="<?= $BASE_PATH ?>imgs/logo11.png" alt="logo" width="45" class="me-2">
            ISCAC Burguer
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?= is_active('index.php') ? 'active' : '' ?>" href="<?= $BASE_PATH ?>index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= is_active('sobre.php') ? 'active' : '' ?>" href="<?= $BASE_PATH ?>sobre.php">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= is_active('menu.php') ? 'active' : '' ?>" href="<?= $BASE_PATH ?>menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $BASE_PATH ?>index.php#review">Avaliações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $BASE_PATH ?>index.php#address">Endereço</a>
                </li>
            </ul>

            <div class="d-flex ms-3 align-items-center">
                <a href="<?= $BASE_PATH ?>reservar.php" class="me-3 btn btn-outline-light btn-sm">Reservar</a>

                <?php if (!empty($_SESSION['user'])): ?>
                    <?php if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                        <a class="me-3" href="<?= $BASE_PATH ?>admin/index.php" title="Painel Admin">
                            <img width="26" height="26" src="https://img.icons8.com/ios-glyphs/30/ffffff/administrator-male.png" alt="admin" />
                        </a>
                    <?php endif; ?>
                    <a class="btn btn-sm btn-light" href="<?= $BASE_PATH ?>login.php?action=logout">Sair</a>
                <?php else: ?>
                    <a class="btn btn-sm btn-light" href="<?= $BASE_PATH ?>login.php">Entrar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>