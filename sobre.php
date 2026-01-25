<?php 
session_start();
require_once('includes/config.php');
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sobre Nós — ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css?v=1.2" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>

    <?php include('includes/navbar.php'); ?>

    <section class="container py-5">
        <h2 class="text-center fw-bold mb-5 title">Sobre <span class="text-danger">Nós</span></h2>
        <div class="row align-items-center justify-content-center g-5">
            <div class="col-md-5 text-center">
                <img src="imgs/about.jpeg" class="img-fluid rounded-4 shadow-lg" alt="Sobre a ISCAC Burguer">
            </div>
            <div class="col-md-7">
                <h3 class="fw-bold mb-4 text-white">O Sabor que Alimenta o Sucesso Académico</h3>
                
                <p class="lead mb-3">
                    A <strong>ISCAC Burguer</strong> nasceu nos corredores da Coimbra Business School com um propósito claro: ser o combustível para as mentes mais brilhantes do campus.
                </p>
                
                <p class="mb-3">
                    Mais do que uma simples hamburgueria, somos o ponto de encontro onde a tradição de Coimbra se cruza com a inovação gastronómica. Percebemos que as longas horas de estudo e os desafios dos exames exigem uma recompensa à altura.
                </p>

                <p class="mb-4">
                    Desde o icónico "O Académico" até ao revigorante "Noite de Estudo", cada hambúrguer é preparado com o rigor de quem sabe que o detalhe faz a diferença. No coração da Bencanta, acreditamos que o sucesso começa com uma boa refeição.
                </p>

                <div class="mb-4">
                    <h5 class="fw-bold text-accent">
                        <i class="fas fa-graduation-cap me-2"></i> Onde o conhecimento encontra o sabor.
                    </h5>
                </div>

                <a href="menu.php" class="btn btn-danger btn-lg px-5 shadow-sm fw-bold btn-menu-add">
                    Ver Menu Agora
                </a>
            </div>
        </div>
    </section>
   
    <?php include('includes/footer.php'); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
</body>
</html>