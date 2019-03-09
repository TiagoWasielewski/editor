<?php
require_once ('../php/funcoesHTML.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <?php montaheader() ?>
      <title>Cadastrar</title>
   </head>
   <body class="text-center">
      <?php navbar() ?>
      <form class="form-signin" method="POST" action="../php/functionUser.php">
         <h1 class="h3 mb-3 font-weight-normal">Cadastro</h1>
         <input type="hidden" name="op" value="cadastrar">
         <label for="inputNome" class="sr-only">Nome</label>
         <input type="nome" id="inputNome" name="inputNome" class="form-control"  placeholder="Nome" maxlength="40" required autofocus>
         <label for="inputEmail" class="sr-only">E-mail</label>
         <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email" maxlength="60" required>
         <label for="inputPassword" class="sr-only">Senha</label>
         <input type="password" id="inputPassword" name="inputPassword" class="form-control"  placeholder="Senha" maxlength="30" required>
         <label for="inputConfirmarPassword" class="sr-only">Confirmar Senha</label>
         <input type="password" id="inputConfirmarPassword" name="inputConfirmarPassword" class="form-control" placeholder="Confirmar Senha" required>
         <button type="submit" class="btn btn-lg btn-success btn-block" name="cadastrar">CADASTRAR</button>
      </form>
      <?php rodape() ?>
      <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.js"> </script>
   </body>
</html>