<?php
session_start();


require_once('wideimage/lib/WideImage.php');

if (isset($_REQUEST['op'])) {
    $opcao = strip_tags($_REQUEST['op']);
    
    switch ($opcao) {
        case 'vertical':
            vertical();
            break;
        
        case 'horizontal':
            horizontal();
            break;
        
        case 'brilho':
            brilho();
            break;
        
        case 'cinzas':
            cinzas();
            break;
        
        case 'contraste':
            contraste();
            break;
        
        case 'colorir':
            colorir();
            break;

        case 'ruido':
            ruido();
            break;
        
        case 'rezise':
            redimensionar();
            break;
        
        case 'crop':
            crop();
            break;
        
        case 'otimizar':
            otimizar();
            break;

        case 'converter':
            converter();
            break;

        case 'salvar':
            save();
            break;
    }
}

function vertical()
{
    $im = $_SESSION['caminho'];
    $extensao = pathinfo($_SESSION['caminho'], PATHINFO_EXTENSION);
    $_FILES['nome'] = $im;
    if ($extensao == 'jpg') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefromjpeg($im);
        imageflip($img, IMG_FLIP_VERTICAL);
        imagejpeg($img, $_FILES['nome']);
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');  
        exit; 
    } 
    if ($extensao == 'png') {
        header("Content-Type: image/png");
        $img = imagecreatefrompng($im);
        imageflip($img, IMG_FLIP_VERTICAL);
        imagepng($img, $_FILES['nome']);
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
    } 
}

function horizontal()
{
    $im = $_SESSION['caminho'];
    $extensao = pathinfo($_SESSION['caminho'], PATHINFO_EXTENSION);
    $_FILES['nome'] = $im;
    if ($extensao == 'jpg') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefromjpeg($im);
        imageflip($img, IMG_FLIP_HORIZONTAL);
        imagejpeg($img, $_FILES['nome']);
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');  
        exit; 
    } 
    if ($extensao == 'png') {
        header("Content-Type: image/png");
        $img = imagecreatefrompng($im);
        imageflip($img, IMG_FLIP_HORIZONTAL);
        imagepng($img, $_FILES['nome']);
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
    }
}

function brilho()
{
    $im = $_SESSION['caminho'];
    $extensao = pathinfo($_SESSION['caminho'], PATHINFO_EXTENSION);
    $_FILES['nome'] = $im;
    $nivel = $_POST['brilha'];
    if ($extensao == 'jpg') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefromjpeg($im);
        imagefilter($img, IMG_FILTER_BRIGHTNESS, $nivel);
        imagejpeg($img, $_FILES['nome']);   
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
        exit;
    }
    if ($extensao == 'png') {
        header("Content-Type: image/png");
        $img = imagecreatefrompng($im);
        imagefilter($img, IMG_FILTER_BRIGHTNESS, $nivel);
        imagepng($img);
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
    }
}

function cinzas()
{   
    $im = $_SESSION['caminho'];
    $extensao = pathinfo($_SESSION['caminho'], PATHINFO_EXTENSION);
    $_FILES['nome'] = $im;
    if ($extensao == 'jpg') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefromjpeg($im);
        imagefilter($img, IMG_FILTER_GRAYSCALE, 0, 255, 0);
        imagejpeg($img, $_FILES['nome']);   
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
        exit;
    }
    if ($extensao == 'png') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefrompng($im);
        imagefilter($img, IMG_FILTER_GRAYSCALE, 0, 255, 0);
        imagepng($img, $_FILES['nome']);   
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
    }
}

function contraste()
{   
    $im = $_SESSION['caminho'];
    $extensao = pathinfo($_SESSION['caminho'], PATHINFO_EXTENSION);
    $_FILES['nome'] = $im;
    $nivel = $_POST['contr'];
    if ($extensao == 'jpg') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefromjpeg($im);
        imagefilter($img, IMG_FILTER_CONTRAST, $nivel);
        imagejpeg($img, $_FILES['nome']);   
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
        exit;
    }
    if ($extensao == 'png') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefrompng($im);
        imagefilter($img, IMG_FILTER_CONTRAST, $nivel);
        imagepng($img, $_FILES['nome']);   
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
    }
}

function colorir()
{
    $im = $_SESSION['caminho'];
    $extensao = pathinfo($_SESSION['caminho'], PATHINFO_EXTENSION);
    $_FILES['nome'] = $im;
    $red = $_POST['red'];
    $green = $_POST['green'];
    $blue = $_POST['blue'];
    $alpha = $_POST['alpha'];
    if ($extensao == 'jpg') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefromjpeg($im);
        imagefilter($img, IMG_FILTER_COLORIZE, $red, $green, $blue, $alpha);
        imagejpeg($img, $_FILES['nome']);   
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
        exit;
    }
    if ($extensao == 'png') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefrompng($im);
        imagefilter($img, IMG_FILTER_COLORIZE, $red, $green, $blue, $alpha);
        imagepng($img, $_FILES['nome']);   
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
    }
}

function ruido()
{
    $im = $_SESSION['caminho'];
    $extensao = pathinfo($_SESSION['caminho'], PATHINFO_EXTENSION);
    $_FILES['nome'] = $im;
    $nivel = $_POST['rui'];
    if ($extensao == 'jpg') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefromjpeg($im);
        imagefilter($img, IMG_FILTER_MEAN_REMOVAL, 0, $nivel, 0);
        imagejpeg($img, $_FILES['nome']);   
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
        exit;
    }
    if ($extensao == 'png') {
        header("Content-Type: image/jpeg");
        $img = imagecreatefrompng($im);
        imagefilter($img, IMG_FILTER_MEAN_REMOVAL, 0, $nivel, 0);
        imagepng($img, $_FILES['nome']);   
        imagedestroy($img);
        header('Location: ../pages/editarimagem.php');
    }
}

function redimensionar()
{
    $im    = $_SESSION['caminho'];
    $lar   = $_POST['inputLargura'];
    $alt   = $_POST['inputAltura'];
    $image = WideImage::load($im);
    $image = $image->resize($lar, $alt);
    $image->saveToFile($im);
    header('Location: ../pages/editarimagem.php');
}

function crop()
{
    $im             = $_SESSION['caminho'];
    $_FILES['nome'] = $im;
    $x     = $_POST['inputX'];
    $y     = $_POST['inputY'];
    $pntox = $_POST['inputpontox'];
    $pntoy = $_POST['inputpontoy'];
    $image = WideImage::load($im);
    $image = $image->crop($pntox, $pntoy, $x, $y);
    $image->saveToFile($_FILES['nome']);
    header('Location: ../pages/editarimagem.php');
}

function otimizar()
{
    $im             = $_SESSION['caminho'];
    $_FILES['nome'] = $im;
    $compressao     = $_POST['valor'];
    $image = WideImage::load($im);
    $image->saveToFile($_FILES['nome'], $compressao);
    header('Location: ../pages/editarimagem.php');
}

function converter()
{
    $nome    = pathinfo($_SESSION['caminho'],PATHINFO_FILENAME);   
    $ext     = $_POST['ext'];
    $im      = $_SESSION['caminho'];
    $caminho = '../uploads/';
    $arquivofinal = $caminho . $nome . $ext;
    $image = WideImage::load($im);
    $image->saveToFile($arquivofinal);
    header('Location: ../pages/editarimagem.php');
}

function save()
{
    $nome    = $_POST['narquivo'];
    $ext     = '.'.pathinfo($_SESSION['caminho'], PATHINFO_EXTENSION);
    $im      = $_SESSION['caminho'];
    $caminho = '../uploads/';
    $arquivofinal = $caminho . $nome . $ext;
    $image = WideImage::load($im);
    $image->saveToFile($arquivofinal);
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="' . $nome . $ext . '"');
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($arquivofinal));
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header('Expires: 0');
    readfile($arquivofinal);
    header('Location: ../pages/editarimagem.php');
}

?>
