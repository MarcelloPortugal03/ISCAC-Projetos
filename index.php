<?php 
session_start();
require_once('includes/config.php');
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISCAC Burguer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css?v=1.2" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php include('includes/navbar.php'); ?>

    <section class="home-section d-flex align-items-center text-white">
        <div class="container py-5">
            <div class="row align-items-center pt-5">
                <div class="col-lg-7">
                    <h1 class="display-4 fw-bold mb-3">ISCAC BURGUER <br><span class="text-accent">Sabor que move o campus</span></h1>
                    <p class="lead mb-4">Descobre os hambúrgueres mais suculentos do ISCAC, feitos com ingredientes frescos e preparados na hora. Perfeito para matar a fome entre aulas, partilhar com amigos ou simplesmente disfrutar de um bom lanche. Vem sentir o verdadeiro sabor do campus!</p>
                    <a href="menu.php" class="btn btn-accent btn-lg shadow btn-menu-add">Peça o seu AGORA!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="review" class="container py-5">
        <h2 class="text-center fw-bold mb-5 title">Nossos <span class="text-danger">Clientes</span></h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow bg-dark text-white">
                    <div class="card-body text-center">
                        <img src="imgs/quote-img.png" alt="comentario" width="32" class="mb-3">
                        <p class="card-text">Os hambúrgueres são ótimos e o ambiente é agradável, mas às vezes demora um pouco nos horários de maior movimento. Ainda assim, vale muito a pena!</p>
                        <div class="mt-3">
                            <img src="imgs/pic-1.png" class="rounded-circle mb-2" alt="João" width="64">
                            <h5 class="mb-1">João Carvalho</h5>
                            <div>
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-glyphs/30/ffffff/star-half-empty.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow bg-dark text-white">
                    <div class="card-body text-center">
                        <img src="imgs/quote-img.png" alt="comentario" width="32" class="mb-3">
                        <p class="card-text">Adoro vir aqui entre aulas! Os hambúrgueres são suculentos e o pão sempre fresco. Um verdadeiro ponto de encontro no campus.</p>
                        <div class="mt-3">
                            <img src="imgs/pic-2.png" class="rounded-circle mb-2" alt="Beatriz" width="64">
                            <h5 class="mb-1">Beatriz Santos</h5>
                            <div>
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow bg-dark text-white">
                    <div class="card-body text-center">
                        <img src="imgs/quote-img.png" alt="comentario" width="32" class="mb-3">
                        <p class="card-text">O melhor hambúrguer que já comi no campus! Ingredientes frescos, atendimento rápido e ambiente super acolhedor. Recomendo a todos os estudantes do ISCAC!</p>
                        <div class="mt-3">
                            <img src="imgs/pic-3.png" class="rounded-circle mb-2" alt="Miguel" width="64">
                            <h5 class="mb-1">Miguel Ferreira</h5>
                            <div>
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                                <img width="20" src="https://img.icons8.com/ios-filled/30/ffffff/star--v1.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="address" class="bg-light py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-4 title">NOSSO <span class="text-danger">ENDEREÇO</span></h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="ratio ratio-16x9 rounded shadow">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3047.662923756855!2d-8.455242523588147!3d40.19432657039046!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd22f8f7480a794b%3A0xc3911639d6796472!2sISCAC%20-%20Coimbra%20Business%20School!5e0!3m2!1spt-PT!2spt!4v1711234567890!5m2!1spt-PT!2spt" 
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <?php include('includes/footer.php'); ?>

</body>
</html>