<?php
// O config.php já define a BASE_URL de forma dinâmica.
// Garantimos que este ficheiro tem acesso a essa constante.
require_once __DIR__ . '/config.php'; 
?>

<nav class="navbar navbar-expand-lg navbar-dark main-bg shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= BASE_URL ?>index.php">
            <img src="<?= BASE_URL ?>imgs/logo11.png" alt="logo" width="45" class="me-2">
            ISCAC Burguer
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                <li class="nav-item"><a href="<?= BASE_URL ?>index.php" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="<?= BASE_URL ?>sobre.php" class="nav-link">Sobre</a></li>
                <li class="nav-item"><a href="<?= BASE_URL ?>menu.php" class="nav-link">Menu</a></li>
                <li class="nav-item"><a href="<?= BASE_URL ?>index.php#review" class="nav-link">Avaliações</a></li>
                <li class="nav-item"><a href="<?= BASE_URL ?>index.php#address" class="nav-link">Endereço</a></li>

                <?php if(!isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a href="<?= BASE_URL ?>auth/login.php" class="nav-link">
                            <img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/ffffff/user--v1.png" alt="login"/>
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                            <img width="24" height="24" src="https://img.icons8.com/ios-glyphs/30/ffffff/user--v1.png" class="me-1" alt="user"/>
                            <?= explode(' ', $_SESSION['user_nome'])[0] ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <?php if($_SESSION['user_nivel'] == 1): ?>
                                <li><a class="dropdown-item small" href="<?= BASE_URL ?>admin/admin.php">Gerir Produtos</a></li>
                                <li><a class="dropdown-item small" href="<?= BASE_URL ?>admin/pedidos_admin.php">Ver Pedidos</a></li>
                                <li><hr class="dropdown-divider"></li>
                            <?php endif; ?>
                            
                            <li><a class="dropdown-item small text-danger" href="<?= BASE_URL ?>auth/logout.php">Sair (Logout)</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="d-flex ms-3 align-items-center">
                <a href="<?= BASE_URL ?>ver_carrinho.php" class="position-relative">
                    <img width="26" height="26" src="https://img.icons8.com/ios-glyphs/30/ffffff/shopping-cart--v1.png" alt="cart" />
                    <?php if(isset($_SESSION['carrinho']) && array_sum($_SESSION['carrinho']) > 0): ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                            <?= array_sum($_SESSION['carrinho']) ?>
                        </span>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </div>
</nav>