<?php
require_once("controller/controller.php");


class materials
{
  public function __construct()
  {
    $controller = new controller();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Psicóloga Adriana Pinheiro</title>
    <meta charset="utf-8">
    <link href="img/icone.ico" rel="icon">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</head>

<body>
    <!-- Header Start -->
    <nav class="navbar bg-body-light">
        <div class="container justify-content-md-center">
            <a class="navbar-brand" href="#">
                <img class="logo" src="img/logo.png" alt="logo" width="380" height="180">
            </a>
        </div>
    </nav>
    <!-- Header End -->

    <hr class="line">

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-body-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarNav">
                <ul class="navbar-nav link-nav">
                    <li class="nav-item">
                        <a class="nav-link navigation" aria-current="page" href="index.php">Home</a>
                    </li>
                    <div class="space-link"></div>
                    <li class="nav-item">
                        <a class="nav-link navigation active" href="materials.php">Materiais</a>
                    </li>
                    <div class="space-link"></div>
                    <li class="nav-item">
                        <a class="nav-link navigation" href="about.php">Sobre</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Main Start -->
    <main class="container-fluid degrade align-items-center">

        <!-- Caption Start -->
        <div>
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-13" style="padding: 5%;">
                        <h1 class="h1-welcome text-center">Meus Materiais</h1>
                        </br>
                        </br>
                        <p class="p-welcome">Estes são os meus materiais, Amadinha. Foram construídos especialmente por
                            mim para te
                            auxiliar na sua longa jornada cheia de conquistas. Aproveite e usufrua bastante de cada
                            aprendizado❤️.
                        </p>

                    </div>

                </div>
            </div>
        </div>
        <!-- Caption End -->

         <!-- Materials Start -->
        <div class="container-fluid back-flower" >
            <div class="col-lg-13">
                <div class="container py-5">
                    <div class="row row-cols-1 row-cols-md-2 g-4" style="text-align: center;">

                        <?php 
                            $produtos = $controller->getProduto(0);

                            for($i=0; $i < count($produtos); $i++){    
                        ?>
                            <div class="col card-res">
                                
                                    <div class="card h-100 aaa" >
                                        <img src="<?php echo $produtos[$i]['img']; ?>" class="card-img-top"
                                            style="padding: 50px; border-radius: 15mm;" alt="...">
                                        <div class="card-body" style="margin-top: -25px;">
                                            <h5 class="card-title"><?php echo $produtos[$i]['title']; ?></h5>

                                        </div>
                                        <div class="btn-wrap">
                                            <button type="button" class="button1" onclick="location.href='details.php?id_prod=<?php echo $produtos[$i]['id_prod']; ?>'">
                                                Detalhes
                                            </button>
                                            <a href="<?php echo $produtos[$i]['link']; ?>">
                                                <button type="button" class="button1">
                                                    Adquirir
                                                </button>
                                            </a>
                                        </div>
                                        </br>
                                        </br>
                                        </br>
                                        </br>
                                    </div>
                            </div>
                        <?php 
                            }
                        ?> 
                           
                    </div>
                </div>
            </div>
        </div>
        <!-- Materials End -->


    </main>
    <!-- Main End -->




    </br>
    </br>
    <!-- Footer Start -->
    <div style="position:relative; overflow: hidden;">
        <div style="height: 300px;">
            <div class="wave"
                style="background-image: url('img/wave.png'); background-size: 50% 70px; animation: waves 4s linear infinite; opacity: 1; z-index: 10;">
            </div>
            <div class="wave"
                style="background-image: url('img/wave.png'); background-size: 50% 70px; animation: waves 7s linear infinite; opacity: .75; z-index: 11;">
            </div>
            <div class="wave"
                style="background-image: url('img/wave.png'); background-size: 50% 70px; animation: waves 10s linear infinite; opacity: .5; z-index: 12;">
            </div>
        </div>
    </div>
    <hr class="line">
    <div class="container text-center text-md-start mt-5">
        <div class="row mt-3">
            <!-- 1° Coluna -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <!-- Conteúdo sobre o Site -->
                <h3 class="h3-footer">Psi Adriana Pinheiro</h3>
                <br>
                <p class="p-footer-about">
                    Espalhando muito amor e luz em atendimentos e projetos voltados ao público feminino, ensinando
                    resiliência,
                    amor-próprio e autoconfiança às suas pacientes.
                </p>
            </div>
            <!-- 2° Coluna -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links Contato -->
                <h3 class="h3-footer">Desenvolvedores</h3>
                <br>
                <p class="p-footer">
                    <a class="nav-link scrollto" href="https://github.com/joaopedro2602" target="_blank">João Pedro
                        Cabral</a>
                </p>
                <p class="p-footer">
                    <a class="nav-link scrollto" href="https://github.com/MarianeBS" target="_blank">Mariane
                        Souza</a>
                </p>
                <p class="p-footer">
                    <a class="nav-link scrollto" href="https://github.com/vek03" target="_blank">Victor Cardoso</a>
                </p>
            </div>
            <!-- 3° Coluna -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <!-- Links Contato -->
                <h3 class="h3-footer">Contato</h3>
                <br>
                <a target="_blank" class="a-footer" href="mailto:adrianaspinheiro2@gmail.com">
                    <p class="p-footer">Email: adrianaspinheiro2@gmail.com</p>
                </a>
                <a target="_blank" class="a-footer" href="https://wa.me/5511956378692">
                    <p class="p-footer">WhatsApp: +55 (11) 95637-8692</p>
                </a>
            </div>
        </div>
    </div>
    <hr class="line">
    <p class="p-copyright">©2023 Copyright <b>Psi Adriana Pinheiro</b> | Todos os Direitos Reservados</p>
    <!-- Footer End -->

</body>

</html>
<?php
  }
}
new materials();
?>