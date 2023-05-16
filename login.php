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
                <a class="nav-link" href="materials.php">Materiais</a>
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

      <div class="container py-5">
        <div class="row g-5 align-items-center justify-content-md-center">
          <div class="col-lg-3 back-material">
            <h1 class="h1-login">Login</h1>
            
            <form method="post" action="controller/controller.php?funcao=loginAdmin" id="formLogin" name="formLogin">

              </br>
              </br>

              <div class="form-group input-group flex-nowrap">
                <input type="text" minlength="4" maxlength="14" class="form-control" id="txtUser" name="txtUser" placeholder="Usuário" aria-label="Username" aria-describedby="addon-wrapping">
              </div>

              
              
              <div class="form-group mt-3">
                <div style="float:right;"><label for="inputSenha4" class="form-label test">Exibir senha</label>
                  <input name="checkbox" id="checkbox" class="form-check-input mt-0" type="checkbox" aria-label="Checkbox for following text input">
                </div>
                <input type="password" minlength="6" maxlength="14" placeholder="Sua senha" class="form-control" name="txtSenha" required id="txtSenha">
              </div>

              </br>

              <div class="form-group">
                <button type="submit" id="btnLogin" class="button-login align-items-center justify-content-md-center">
                    Entrar
                </button>
              </div>

              </br>

            </form>  
            
          </div> 
        </div>
      </div>  
      <input type="text" minlength="4" maxlength="14" class="form-control" aria-label="Username" aria-describedby="addon-wrapping">

    </div>  
    <div class="container-fluid back"></div>     
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

  <!-- Template Main JS File -->
  <script src="js/main.js"></script>
  <script src="js/login.js"></script>

</body>
</html>