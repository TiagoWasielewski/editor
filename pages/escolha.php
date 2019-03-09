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
      <title>Escolha</title>
   </head>
   <body class="text-center">
      <?php out() ?>
      <div>
         <form class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">O que deseja fazer?</h1>
            <button type="submit" class="btn btn-lg btn-success btn-block"><a href="upload.php">Editar Imagem</a></button>
            <br>
            <button type="submit" class="btn btn-lg btn-success btn-block"><a href="uploadvideo.php">Editar Video</a></button>
         </form>
      </div>
      <?php rodape() ?>
      <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.js"> </script>
   </body>
</html>