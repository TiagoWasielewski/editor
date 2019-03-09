<?php
require_once ('../php/funcoesHTML.php');

if($_SESSION['logado'] == false)
{
  header("Location: login.php");
}

?>
  <!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <title>Editar Vídeos</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/simple-sidebar.css" rel="stylesheet">
  </head>
  <body>
    <div class="d-flex" id="wrapper">
      <div class="bg-success border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"><strong>Menu</strong></div>
        <div class="list-group list-group-flush">

          <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Converter</strong>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <form action="../php/funcoesvideo.php" method="POST">
                      <input type="hidden" name="op" value="converter">
                      <br>
                        <label>Formato:</label>
                        <select name="ext">
                           <option>Nenhum</option>
                           <option value=".mp4">.mp4</option>
                           <option value=".avi">.avi</option>
                        </select>
                      <button type="submit" class="btn btn-lg btn-danger btn-block" name="converter">CONVERTER</button>
                  </form>
                </div>
              </div>
             <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Cortar (crop)</strong>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <form action="../php/funcoesvideo.php" method="POST">
                  <input type="hidden" name="op" value="crop">
                  <input type="text" id="comeco" name="comeco" class="form-control"  placeholder="Cameçar em" required autofocus>
                  <br>
                  <input type="text" id="comprimento" name="comprimento" class="form-control"  placeholder="Comprimento">
                  <br>
                  <button type="submit" class="btn btn-lg btn-danger btn-block">CONFIRMAR</button>
                  </form>
                </div>
              </div> 
              <div class="nav-item dropdown">
                 <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <strong>Salvar</strong>
                 </a>
                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <form action="../php/funcoesvideo.php" method="POST">
                       <input type="hidden" name="op" value="salvar">
                       <br>
                       <button type="submit" class="btn btn-lg btn-danger btn-block">SALVAR</button>
                    </form>
                 </div>
              </div>     
        </div>
      </div>
      
      <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-success border-bottom">
          <button class="btn btn-success" id="menu-toggle">Menu</button>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="../pages/escolha.php">Home<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['email']?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Minha Conta</a>
                  <a class="dropdown-item" href="../php/functionUser.php?op=deslogar">Sair</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>

        <div class="container-fluid">
          <h1 class="mt-4"></h1>
        <?php exibevideo() ?>
        </div>
      </div>
      

    </div>
    
    <script src="../jquery/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

    <script>
      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>

  </body>

  </html>
