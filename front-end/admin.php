<?php

session_start();
if (empty($_SESSION)) {
    header("Location: page-login.php");
    exit();
}


include "database/conexao.php";

if (isset($_GET["pesquisa"]) || !empty($_GET["pesquisa"])) {
    $pesquisa = $_GET["pesquisa"];
    $sql = "SELECT * FROM faleConosco WHERE nome LIKE '%$pesquisa%' OR email LIKE '%$pesquisa%'";
    $result = mysqli_query($conexao, $sql);
} else {
    $sql = "SELECT * FROM faleConosco";
    $result = mysqli_query($conexao, $sql);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AthlonFit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="shortcut icon" href="img/logos.ico">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-1">
            <div class="container d-flex align-items-center">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="img/logos.png" class="logo img-fluid me-2" alt="Logotipo da Athlon Fitness, Que é a Letra 'A'." style="height: 50px;">
                    <span class="fs-1 mb-0">thlon</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav fs-5 ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active mx-3" aria-current="page" href="index.html">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="equipe.html">Equipe</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDesempenho" role="button" data-bs-toggle="dropdown" aria-expanded="false">Desempenho</a>
                            <ul class="dropdown-menu bg-dark text-light" aria-labelledby="navbarDesempenho">
                                <li><a class="dropdown-item bg-dark text-light active" href="performance.html">Dicas de Performance</a></li>
                                <li><a class="dropdown-item bg-dark text-light" href="nutricao.html">Nutrição</a></li>
                                <li><a class="dropdown-item bg-dark text-light" href="vestuario.html">Vestimenta Especializada</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3" href="fale-conosco.php">Fale Conosco</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-3 btn btn-danger w-100 text-white" href="database/req/logout.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section id="main-admin" class="bg-dark d-flex flex-column " style="min-height: 90vh;">
        <form method="GET" class="pt-3 d-flex justify-content-center py-5" style="background-image: url('./img/bg-admin.jpg');background-size: cover;">
            <div class=" w-50 d-flex flex-column align-items-center gap-3">
                <label for="exampleFormControlInput1" class="form-label text-white display-3">Pesquisar</label>
                <input type="text" name="pesquisa" class="form-control rounded-pill" id="exampleFormControlInput1" placeholder="Nome">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
            </div>
            </div>
        </form>
        <table class="table table-bordered table-striped table-dark ">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Nome</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="w-50 text-center">Mensagem</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $nome = $row['nome'];
                    $email = $row['email'];
                    $mensagem = $row['mensagem'];
                    echo "<tr class='text-center'>
                            <td>$nome</td>
                            <td>$email</td>
                            <td class='text-break'>$mensagem</td>
                            <th class='align-center'><a class='btn btn-danger btn-sm' href='database/req/apagar.php?id=$id'>Excluir</a></th>";
                }
                ?>
            </tbody>
        </table>

    </section>
    <footer class="text-white text-center text-lg-start bg-dark">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row mt-4">
                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Quem Somos ?</h5>

                    <p>
                        Somos uma empresa comprometida em oferecer produtos de alta qualidade para atletas e entusiastas do fitness, promovendo saúde e desempenho.
                        Nosso objetivo é inspirar e apoiar cada jornada, ajudando você a alcançar seu melhor.
                    </p>

                    <p>
                        Siga a <strong>Athlon</strong> nas redes sociais.
                    </p>

                    <div class="mt-4">
                        <!-- Facebook -->
                        <a type="button" href="https://www.facebook.com/athlonsports" class="btn btn-floating text-light btn-lg border border-0" style="background-color: #3b5998;">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <!-- Instagram -->
                        <a type="button" href="https://www.instagram.com/athlonsports/" class="btn btn-floating text-light btn-lg border border-0" style="background-color: #c13584;">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <!-- X -->
                        <a type="button" href="https://x.com/AthlonSports" class="btn btn-floating text-light btn-lg border border-0" style="background-color: #141414;">
                            <i class="fab fa-x-twitter"></i>
                        </a>
                        <!-- YouTube -->
                        <a type="button" href="https://www.youtube.com/@Athlon_Sports" class="btn btn-floating text-light btn-lg border border-0" style="background-color: #d11111;">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4 pb-1">Onde Estamos</h5>



                    <ul class="fa-ul" style="margin-left: 1.65em;">
                        <li class="mb-3">
                            <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Itaquatiara, 222-344 - Maguari, Ananindeua - PA, 67146-263, Brasil.</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li"><i class="fas fa-home"></i></span><span class="ms-2">Maguari, Ananindeua - PA, 67145-100, Brasil.</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li"><i class="fas fa-envelope"></i></span><span class="ms-2">athloncontato@gmail.com</span>
                        </li>
                        <li class="mb-3">
                            <span class="fa-li"><i class="fas fa-phone"></i></span><span class="ms-2">+55 91 98500-4141</span>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Horários</h5>

                    <table class="table text-center text-white">
                        <tbody class="fw-normal">
                            <tr>
                                <td>seg - sex:</td>
                                <td>06:00 - 23:00</td>
                            </tr>
                            <tr>
                                <td>Sábado:</td>
                                <td>07:00 - 22:00</td>
                            </tr>
                            <tr>
                                <td>Domingo:</td>
                                <td>07:00 - 13:00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 Copyright:
            <a class="text-white" href="https://github.com/MarcosOki/UepaAvaliacao">Daniel Marim - Marcos Okita - Fillipe Martins</a>
        </div>
        <!-- Copyright -->
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>