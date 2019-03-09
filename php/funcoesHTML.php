<?php  

session_start();

function montaheader(){

	echo (
    '<meta charset="utf-8">' .
		'<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'.
		'<meta http-equiv="X-UA-Compatible" content="ie=edge">'.
		' <link rel="stylesheet" href="../css/bootstrap.css">'.
    ' <link rel="stylesheet" href="../css/estilo.css">');
}

function navbar(){
  echo (
  '<header>'.
  '<nav class="navbar navbar-expand-md fixed-top navbar-light" style="background-color: #04B404;">'.
    '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">'.
      '<span class="navbar-toggler-icon"></span>'.
    '</button>'.
    '<div class="collapse navbar-collapse" id="navbarCollapse">'.
      '<ul class="navbar-nav ml-auto">'.
        '<li class="nav-item">'.
          '<a class="nav-link" href="../pages/login.php"><strong>Login</strong> <span class="sr-only">(current)</span></a>'.
        '</li>'.
        '<li class="nav-item">'.
          '<a class="nav-link" href="../pages/cadastrar.php"><strong>Cadastrar</strong></a>'.
        '</li>'.
      '</ul>'.
    '</div>'.
  '</nav>'.
'</header>');
}


function out(){
  echo (
  '<header>'.
  '<nav class="navbar navbar-expand-md fixed-top navbar-light" style="background-color: #04B404;">'.
    '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">'.
      '<span class="navbar-toggler-icon"></span>'.
    '</button>'.
    '<div class="collapse navbar-collapse" id="navbarCollapse">'.
      '<ul class="navbar-nav ml-auto">'.
        '<li class="nav-item">'.
          '<a class="nav-link" href="../pages/login.php"><strong></strong> <span class="sr-only">(current)</span></a>'.
        '</li>'.
        '<li class="nav-item">'.
          '<a class="nav-link" href="../pages/cadastrar.php"><strong></strong></a>'.
        '</li>'.
      '</ul>'.
    '</div>'.
  '</nav>'.
'</header>');
}



function rodape(){
	echo (
		'<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">'.
		'<meta http-equiv="X-UA-Compatible" content="ie=edge">'.
		'<footer class="footer mt-auto py-3">'.
	  	'<div class="container">'.
	    '<span class="text-muted">IFSul &copy; 2017-2018.</span>'.
	  	'</div>'.
		'</footer>');
}

function exibe(){
  $img = $_SESSION['caminho'];
  echo "<img src='$img' class='img-fluid'/>";
  //echo "<a href='$img' download>DOWNLOAD</a>";
}

  function exibevideo(){
    $video = $_SESSION['video'];
    $ext = pathinfo($_SESSION['video'], PATHINFO_EXTENSION);
    if ($ext == "mp4"){
  echo(
    '<video width="600" height="300" controls="controls" autoplay="autoplay">'.
    '<source src='. $video .' type="video/mp4">'.
    '<object data="" width="600" height="300">'.
    '</object>'.
    '</video>');
  }
  else{
    echo(
    '<video width="600" height="300" controls="controls" autoplay="autoplay">'.
    '<source src='. $video .' type="video/avi">'.
    '<object data="" width="600" height="300">'.
    '</object>'.
    '</video>'.
    '<h3>Video convertido com sucesso!</h3>'.
    '<h3>Para assistir salve-o, o navegador não suporta este formato</h3>');
  }
}

?>