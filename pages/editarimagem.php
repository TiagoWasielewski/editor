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
      <?php montaheader() ?>
      <title>Editar Imagens</title>
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
                  <strong>Redimensionar</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="rezise">
                        <input type="largura" id="largura" name="inputLargura" class="form-control"  placeholder="Largura" required autofocus>
                        <br>
                        <input type="altura" id="altura" name="inputAltura" class="form-control"  placeholder="Altura" required autofocus>
                        <br>
                        <button type="submit" class="btn btn-lg btn-danger btn-block" name="rezise">CONFIRMAR</button>
                     </form>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Inverter</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="vertical">
                        <button type="submit" class="btn btn-lg btn-danger btn-block" name="vertical">Vertical</button>
                     </form>
                     <br>
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="horizontal">
                        <button type="submit" class="btn btn-lg btn-danger btn-block" name="horizontal">Horizontal</button>
                     </form>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Cortar (crop)</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="crop">
                        <input type="eixox" id="eixox" name="inputX" class="form-control"  placeholder="Eixo x" required autofocus>
                        <input type="eixoy" id="eixoy" name="inputY" class="form-control"  placeholder="Eixo y">
                        <input type="potox" id="eixox" name="inputpontox" class="form-control"  placeholder="Ponto de Início X">
                        <input type="potoy" id="eixox" name="inputpontoy" class="form-control"  placeholder="Ponto de Início Y">
                        <br>
                        <button type="submit" class="btn btn-lg btn-danger btn-block" name="crop">CONFIRMAR</button>
                     </form>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Otimizar</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="otimizar">
                        <br>
                        <label>Compressão(%)</label>
                        <input type="number" name="valor" min="1" max="100" required>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-lg btn-danger btn-block">CONFIRMAR</button>
                     </form>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Converter</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="converter">
                        <br>
                        <label>Formato:</label>
                        <select name="ext">
                           <option>Nenhum</option>
                           <option value=".jpg">.jpg</option>
                           <option value=".png">.png</option>
                           <option value=".gif">.gif</option>
                        </select>
                        <button type="submit" class="btn btn-lg btn-danger btn-block">CONVERTER</button>
                     </form>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Salvar</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="salvar">
                        <br>
                        <input type="text" id="narquivo" name="narquivo" class="form-control"  placeholder="Nome Arquivo" required autofocus>
                        <br>
                        <button type="submit" class="btn btn-lg btn-danger btn-block">SALVAR</button>
                     </form>
                  </div>
               </div>
               <h3 class="sidebar-heading"><strong>Filtros</strong></h3>
               <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Brilho</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="brilho">
                        <input type="number" id="brilha" name="brilha" class="form-control" min="-255" max="255" placeholder="Nível de Brilho:" required>
                        <br>
                        <button type="submit" class="btn btn-lg btn-danger btn-block">CONFIRMAR</button>
                     </form>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Cinza</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="cinzas">
                        <br>
                        <button type="submit" class="btn btn-lg btn-danger btn-block">CONFIRMAR</button>
                     </form>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Contraste</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="contraste">
                        <input type="number" id="contr" name="contr" class="form-control" min="-255" max="255" placeholder="Nível de Contraste:" required>
                        <br>
                        <button type="submit" class="btn btn-lg btn-danger btn-block">CONFIRMAR</button>
                     </form>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Ruido</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="ruido">
                        <input type="number" id="rui" name="rui" class="form-control"  min="-255" max="255" placeholder="Nível de Ruido:" required>
                        <br>
                        <button type="submit" class="btn btn-lg btn-danger btn-block">CONFIRMAR</button>
                     </form>
                  </div>
               </div>
               <div class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <strong>Colorir</strong>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                     <form action="../php/funcoesdg.php" method="POST">
                        <input type="hidden" name="op" value="colorir">
                        <input type="number" id="red" name="red" class="form-control"  min="-255" max="255" placeholder="Nível de Red:" required>
                        <input type="number" id="green" name="green" class="form-control"  min="-255" max="255" placeholder="Nível de Green:" required>
                        <input type="number" id="blue" name="blue" class="form-control"  min="-255" max="255" placeholder="Nível de Blue:" required>
                        <input type="number" id="alpha" name="alpha" class="form-control"  min="-128" max="128" placeholder="Nível Alpha:" required>
                        <br>
                        <button type="submit" class="btn btn-lg btn-danger btn-block">CONFIRMAR</button>
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
               <?php exibe() ?>
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