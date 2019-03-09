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
      <title>Upload</title>
   </head>
   <body class="text-center">
      <?php out() ?>
      <form class="form-signin" method="POST" action="../php/functionUser.php" enctype="multipart/form-data">
         <h1 class="h3 mb-3 font-weight-normal">Upload de Vídeo</h1>

         <input type="hidden" name="op" value="enviar-video">

         <input type="file" name="arquivo">

         <input type="submit" name="enviar-video">
      </form>
      <?php rodape()?>
      <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.js"> </script>
   </body>
</html>



