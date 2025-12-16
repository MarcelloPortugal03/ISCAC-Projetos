<?php

require_once __DIR__ . '/includes/header.php';
?>

<section class="container py-5">
    <h2 class="text-center fw-bold mb-5 title">Sobre <span class="text-danger">Nós</span></h2>
    <div class="row align-items-center justify-content-center g-4">
        <div class="col-md-5 text-center mb-3 mb-md-0">
            <img src="<?= htmlspecialchars($BASE_PATH ?? '/') ?>imgs/about.jpeg" class="img-fluid rounded shadow" alt="sobre-nos">
        </div>
        <div class="col-md-7">
            <h3 class="fw-bold mb-4">O Ponto de Encontro dos Estudantes de Coimbra</h3>
            <p class="lead mb-3">O Iscac Burguer nasceu no coração da Universidade ISCAC, em Coimbra, com o objetivo de oferecer aos estudantes, professores e colaboradores um espaço acolhedor e cheio de sabor. Aqui, cada hambúrguer é preparado com cuidado, utilizando ingredientes frescos e de qualidade, combinando tradição e criatividade numa experiência única.</p>
            <p class="mb-3">Mais do que uma simples hamburgueria, o Iscac Burguer é um ponto de encontro para todos os que querem fazer uma pausa entre aulas, partilhar momentos com amigos ou simplesmente desfrutar de um bom lanche. Valorizamos o ambiente universitário, a proximidade com a comunidade e a paixão por comida bem feita.</p>
            <p class="mb-4">No Iscac Burguer, cada refeição é feita para que te sintas em casa, mesmo no meio do campus. Venha conhecer-nos e descubra porque somos o sabor de Coimbra que todos comentam!</p>
            <a href="menu.php" class="btn btn-accent btn-lg">Saiba Mais</a>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '/includes/footer.php';
?>