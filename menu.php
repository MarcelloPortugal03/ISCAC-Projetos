<?php 
session_start();
// O config.php garante que a BASE_URL está disponível para todos os links
require_once('includes/config.php');

// Procurar todos os produtos na base de dados
$stmt = $pdo->query("SELECT * FROM produtos");
$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Menu — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>css/style.css?v=1.2" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php include('includes/navbar.php'); ?>

    <section class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold title">Nosso <span class="text-danger">Menu</span></h2>
            <p class="text-muted">Escolhe o teu hambúrguer favorito e faz o teu pedido!</p>
        </div>
        
        <div class="row g-4">
            <?php foreach($produtos as $item): ?>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 product-card">
                        <img src="<?= BASE_URL ?>imgs/<?= $item['imagem'] ?>" class="card-img-top" alt="<?= $item['nome'] ?>">
                        
                        <div class="card-body text-center d-flex flex-column">
                            <h5 class="card-title fw-bold"><?= $item['nome'] ?></h5>
                            
                            <div class="mt-auto mb-3">
                                <?php if(!empty($item['preco_antigo']) && $item['preco_antigo'] > 0): ?>
                                    <small class="text-muted text-decoration-line-through me-2">
                                        €<?= number_format($item['preco_antigo'], 2, ',', '.') ?>
                                    </small>
                                <?php endif; ?>
                                
                                <span class="text-danger fs-4 fw-bold">
                                    €<?= number_format($item['preco'], 2, ',', '.') ?>
                                </span>
                            </div>

                            <a href="<?= BASE_URL ?>carrinho.php?add=<?= $item['id'] ?>" 
                               class="btn btn-danger w-100 fw-bold py-2 btn-menu-add">
                               <i class="fas fa-shopping-cart me-2"></i>Adicionar ao carrinho
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include('includes/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</body>
</html>