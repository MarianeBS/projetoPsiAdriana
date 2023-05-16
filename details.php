<?php
require_once("controller/controller.php");

class details
{

  public function __construct()
  {
    session_start();

    if (isset($_SESSION['id_admin']) && $_SESSION['id_admin'] > 0) {
      $cod_admin = $_SESSION['id_admin'];
      
    } else {
        
    }

    $cod_prod = $_GET['id_prod'];
    $controller = new controller();
    $produto = $controller->getProduto($cod_prod);
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
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
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
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-md-center" id="navbarNav">
            <ul class="navbar-nav link-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <div class="space-link"></div>
              <li class="nav-item">
                <a class="nav-link active" href="materials.php">Materiais</a>
              </li>
              <div class="space-link"></div>
              <li class="nav-item">
                <a class="nav-link" href="about.php">Sobre</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>    
    <!-- Navbar End -->

    <div class="container-fluid degrade">
      </br> 
      </br>  

      <div class="container py-5 back-material">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <img src="<?php echo $produto[0]['img']; ?>" class="img-fluid material" alt="...">   
            </div>
            <div class="col-lg-5 animated fadeIn">  
                <hr class="line line-material">
                <h3><?php echo $produto[0]['title']; ?></h3>
                <hr class="line line-material">
                <div class="justify-text">
                    <strong >Ano de publicação: </strong><?php echo $produto[0]['dt_lanc']; ?>
                    <hr class="line line-material">
                    <strong>Número de páginas: </strong><?php echo $produto[0]['num_pag']; ?>
                    <hr class="line line-material">
                    <strong>Público-alvo: </strong><?php echo $produto[0]['publico']; ?>
                    <hr class="line line-material">
                    <strong>Valor (R$): </strong><?php if($produto[0]['valor'] > 0){echo $produto[0]['valor'];}else{echo 'Gratuito';} ?>
                    <hr class="line line-material">
                    <strong>Autora: </strong>Adriana Pinheiro
                    <hr class="line line-material">
                    <strong>Descrição: </strong><?php echo $produto[0]['descr']; ?>
                    <hr class="line line-material"> 
                    
                    
                </div>   
                
                <div class="row">
                  <a href="<?php echo $produto[0]['link']; ?>">
                    <button type="button" class="button-buy btn-primary">
                        Adquirir
                    </button>
                  </a>

                  <a href="materials.php">
                    <button type="button" class="button-buy btn-primary">
                        Voltar
                    </button>
                  </a>
                </div>

                </br>
                </br>
                </br>
                </br>

                <div class="col-lg-1"></div>
            </div>
        </div>
      </div>  
    </div>
    
    <div class="container-fluid back">                  
      
    </div>    
    </br> 
    </br>  
  </div>    

  <!-- Footer Start -->
  <div>
    <div style="position:relative; overflow: hidden;">
      <div style="height: 300px;">      
        <div class="wave" style="background-image: url('img/wave.png'); background-size: 50% 70px; animation: waves 4s linear infinite; opacity: 1; z-index: 10;"></div>
      <div class="wave" style="background-image: url('img/wave.png'); background-size: 50% 70px; animation: waves 7s linear infinite; opacity: .75; z-index: 11;"></div>
      <div class="wave" style="background-image: url('img/wave.png'); background-size: 50% 70px; animation: waves 10s linear infinite; opacity: .5; z-index: 12;"></div>
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

</body>
</html>

<?php
  }
}
new details();
?>