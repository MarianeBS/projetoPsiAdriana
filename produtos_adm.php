<?php
require_once("controller/controller.php");

class produtos_adm
{

  private $cod_admin;

  public function __construct()
  {
    session_start();

    if (isset($_SESSION['id_admin']) && $_SESSION['id_admin'] > 0) {
      $cod_admin = $_SESSION['id_admin'];
      $controller = new Controller();
    } else {
        echo "<script>alert('Você não pode acessar está área sem estar logado...');document.location='login.php'</script>";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Psicóloga Adriana Pinheiro</title>
    <meta charset="utf-8">
    <link href="img/icone.ico" rel="icon">
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.esm.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
</head>

<body>
    <div>
        <!-- Navbar Start -->
        <div>

            <nav class="navbar bg-body-light">
                <div class="container justify-content-md-center">
                    <a class="navbar-brand" href="#">
                        <img class="logo" src="img/logo.png" alt="logo" width="380" height="180">
                    </a>
                </div>
            </nav>
            <hr class="line">
            <nav class="navbar navbar-expand-lg bg-body-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-md-center" id="navbarNav">
                        <ul class="navbar-nav link-nav">
                            <li class="nav-item">
                                <a class="nav-link navigation active" href="#">Materiais</a>
                            </li>

                            <div class="space-link"></div>

                            <li class="nav-item">
                                <a class="nav-link navigation" href="adicionarprod.php">Adicionar Material</a>
                            </li>

                            <div class="space-link"></div>

                            <li class="dropdown">
                                <a class="nav-link navigation dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" href="#">Conta</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="model/destroy.php?id=1">Sair da conta</a></li>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Header Start -->
            <div class="container-fluid degrade">
                <div class="container py-5">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-13" style="padding: 5%;">
                            <h1 class="h1-welcome text-center">Meus Materiais</h1>
                            </br>
                            </br>
                            <p class="p-welcome text-center">Escolha algum item para editar
                            </p>

                        </div>

                    </div>
                </div>
            </div>
            <!-- Header End -->

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
                                                <button type="button" class="button1" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop<?php echo $i; ?>">
                                                    Detalhes
                                                </button>

                                                <button type="button" class="button1" onclick="location.href='editarprod.php?id_prod=<?php echo $produtos[$i]['id_prod']; ?>'">
                                                    Editar
                                                </button>

                                                <button type="button" class="button1" onclick="javascript:var result = confirm('Deseja excluir este produto do site?'); if(result == true){document.location='model/destroy.php?id=2&id_produto=<?php echo $produtos[$i]['id_prod']; ?>'}">
                                                    Excluir
                                                </button>
                                            </div>

                                            </br>
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
        </div>

        <section>
            <?php 
                for($i=0; $i < count($produtos); $i++){    
                ?>
            <div class="modal fade" id="staticBackdrop<?php echo $i; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-dialog modal-xl">
                    <div class="modal-content">

                        <!-- Carros de imagens do produto -->
                        <div class="products modal-body">

                            <div class="row bruh">
                                <div class="col">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?php echo $produtos[$i]['img']; ?>" style="padding: 20%; border-radius: 17mm;">
                                        </div>
                                    </div>
                                </div>


                                <div class="text-center col">

                                    <hr class="line line-material">
                                    <h3><?php echo $produtos[$i]['title']; ?></h3>
                                    <hr class="line line-material">
                                    <div class="justify-text">
                                        <strong >Ano de publicação: </strong><?php echo $produtos[$i]['dt_lanc']; ?>
                                        <hr class="line line-material">
                                        <strong>Número de páginas: </strong><?php echo $produtos[$i]['num_pag']; ?>
                                        <hr class="line line-material">
                                        <strong>Público-alvo: </strong><?php echo $produtos[$i]['publico']; ?>
                                        <hr class="line line-material">
                                        <strong>Valor (R$): </strong><?php if($produtos[$i]['valor'] > 0){echo $produtos[$i]['valor'];}else{echo 'Gratuito';} ?>
                                        <hr class="line line-material">
                                        <strong>Autora: </strong>Adriana Pinheiro
                                        <hr class="line line-material">
                                        <strong>Descrição: </strong><?php echo $produtos[$i]['descr']; ?>
                                        <hr class="line line-material"> 
                                        
                                        
                                    </div>  

                                    <br>


                                    <br>

                                    <!-- Botão de compra -->
                                    <br>
                                    <div class="product text-center">
                                        <div class="space-link"></div>
                                        <button type="button" class="button1 btn-primary" onclick="location.href='editarprod.php?id_prod=<?php echo $produtos[$i]['id_prod']; ?>'">
                                            Editar
                                        </button>

                                        <button type="button" class="button1 btn-primary" data-bs-dismiss="modal">
                                            Voltar
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                }
            ?> 
        </section>


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
                        Espalhando muito amor e luz em atendimentos e projetos voltados ao público feminino, ensinando resiliência, 
                        amor-próprio e autoconfiança às suas pacientes.
                    </p>
                </div>
                <!-- 2° Coluna -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links Contato -->
                    <h3 class="h3-footer">Desenvolvedores</h3>
                    <br>
                    <p class="p-footer">
                        <a class="nav-link scrollto" href="https://github.com/joaopedro2602" target="_blank">João Pedro Cabral</a>
                    </p>
                    <p class="p-footer">
                        <a class="nav-link scrollto" href="https://github.com/MarianeBS" target="_blank">Mariane Souza</a>
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
                    <a target="_blank" class="a-footer" href ="mailto:adrianaspinheiro2@gmail.com">
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


        <!-- Vendor JS Files -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>

<?php
  }
}
new produtos_adm();
?>
