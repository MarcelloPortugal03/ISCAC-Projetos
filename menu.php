<?php

require_once __DIR__ . '/includes/header.php';
?>

<section class="container py-5">
    <h2 class="text-center fw-bold mb-5 title">Nosso <span class="text-danger">Menu</span></h2>
    <div class="row g-4">
        
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow h-100">
                <img src="<?= htmlspecialchars($BASE_PATH ?? '/') ?>imgs/11.jpg" class="card-img-top rounded" alt="O Académico">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">O Académico</h5>
                    <p class="card-text fs-5 mb-1 text-accent">€15,99 <small class="text-muted"><s>€20,99</s></small></p>
                    <a href="#" class="btn btn-accent btn-sm w-100">Adicione ao carrinho</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow h-100">
                <img src="<?= htmlspecialchars($BASE_PATH ?? '/') ?>imgs/13.jpg" class="card-img-top rounded" alt="Biblioteca Burger">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Biblioteca Burger</h5>
                    <p class="card-text fs-5 mb-1 text-accent">€12,99 <small class="text-muted"><s>€15,99</s></small></p>
                    <a href="#" class="btn btn-accent btn-sm w-100">Adicione ao carrinho</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow h-100">
                <img src="<?= htmlspecialchars($BASE_PATH ?? '/') ?>imgs/12.jpg" class="card-img-top rounded" alt="Reitor Supremo">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Reitor Supremo</h5>
                    <p class="card-text fs-5 mb-1 text-accent">€10,99 <small class="text-muted"><s>€16,99</s></small></p>
                    <a href="#" class="btn btn-accent btn-sm w-100">Adicione ao carrinho</a>
                </div>
            </div>
        </div>
       
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow h-100">
                <img src="<?= htmlspecialchars($BASE_PATH ?? '/') ?>imgs/14.jpg" class="card-img-top rounded" alt="Noite de Estudo">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Noite de Estudo</h5>
                    <p class="card-text fs-5 mb-1 text-accent">€8,99 <small class="text-muted"><s>€13,99</s></small></p>
                    <a href="#" class="btn btn-accent btn-sm w-100">Adicione ao carrinho</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow h-100">
                <img src="<?= htmlspecialchars($BASE_PATH ?? '/') ?>imgs/15.jpg" class="card-img-top rounded" alt="Praça da República">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">Praça da República</h5>
                    <p class="card-text fs-5 mb-1 text-accent">€11,99 <small class="text-muted"><s>€14,99</s></small></p>
                    <a href="#" class="btn btn-accent btn-sm w-100">Adicione ao carrinho</a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-lg-3">
            <div class="card border-0 shadow h-100">
                <img src="<?= htmlspecialchars($BASE_PATH ?? '/') ?>imgs/16.jpg" class="card-img-top rounded" alt="O Erasmus">
                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">O Erasmus</h5>
                    <p class="card-text fs-5 mb-1 text-accent">€9,99 <small class="text-muted"><s>€15,99</s></small></p>
                    <a href="#" class="btn btn-accent btn-sm w-100">Adicione ao carrinho</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>