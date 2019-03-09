<?php

session_start();

require_once('classUser.php');

if (isset($_REQUEST['op'])) {
    $opcao = strip_tags($_REQUEST['op']);
    
    switch ($opcao) {
        case 'cadastrar':
            cadastrar();
            break;
        
        case 'logar':
            logar();
            break;
        
        case 'deslogar':
            logout();
            break;
        
        case 'enviar-imagem':
            upload();
            break;

        case 'enviar-video':
            uploadvideo();
            break;
    }
}

function cadastrar()
{
    $a = new User($_POST['inputNome'], $_POST['inputEmail'], $_POST['inputPassword']);
    if ($a->insert()) {
        header("Location: ../pages/login.php");
        exit;
    }
}

function logar()
{
    $a = new User($_POST['inputEmail'], $_POST['inputPassword']);
        if($a->login()){
            $_SESSION['email']  = $_POST['inputEmail'];
            $_SESSION['logado'] = true;
            header("Location: ../pages/escolha.php");
        }
}

function logout()
{
    session_destroy();
    header("Location: ../pages/login.php");
}


function upload()
{
    $formatosPermitidos = array('png','jpeg','jpg','gif');
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
    if (in_array($extensao, $formatosPermitidos)):
        $pasta      = "../uploads/";
        $temporario = $_FILES['arquivo']['tmp_name'];
        $novoNome   = uniqid() . ".$extensao";
        if (move_uploaded_file($temporario, $pasta . $novoNome)):
            $_SESSION['caminho'] = $pasta . $novoNome;
            header('Location: ../pages/editarimagem.php');
        else:
            echo "Erro, não foi possível fazer o upload";
        endif;
    else:
        echo "Erro, Formato de arquivo inválido!";
    endif;
}

function uploadvideo()
{
    $formatosPermitidos = array('gif','mp4',);
    $extensao = pathinfo($_FILES['arquivo']['name'], PATHINFO_EXTENSION);
    if (in_array($extensao, $formatosPermitidos)):
        $pasta      = "../uploads/";
        $temporario = $_FILES['arquivo']['tmp_name'];
        $novoNome   = uniqid() . ".$extensao";
        if (move_uploaded_file($temporario, $pasta . $novoNome)):
            $_SESSION['video'] = $pasta . $novoNome;
            header('Location: ../pages/editarvideo.php');
        else:
            echo "Erro, não foi possível fazer o upload";
        endif;
    else:
        echo "Erro, Formato de arquivo inválido!";
    endif;
}

?>
