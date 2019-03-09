<?php
require_once ('../php/funcoesHTML.php');

if($_SESSION['logado'] == true)
{
  header("Location: escolha.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php montaheader() ?>
      <title>Login</title>
   </head>
   <body class="text-center">
      <?php navbar() ?>
      <form class="form-signin" method="POST" action="../php/functionUser.php">
         <h1 class="h3 mb-3 font-weight-normal">Login</h1>
         <input type="hidden" name="op" value="logar">
         <label for="inputEmail" class="sr-only">E-mail</label>
         <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" required autofocus>
         <label for="inputPassword" class="sr-only">Senha</label>
         <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Senha">
         <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="esqueci"> Esqueci a Senha</label>
         </div>
         <button type="submit" class="btn btn-lg btn-success btn-block">ACESSAR</button>
         <br>
         <a href="cadastrar.php">CADASTRE-SE!</a>
      </form>
      </div>
      <?php rodape() ?>
      <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.js"> </script>
   </body>
</html>