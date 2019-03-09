<?php
session_start();

if (isset($_REQUEST['op'])) {
    $opcao = strip_tags($_REQUEST['op']);
    
    switch ($opcao) {
        case 'converter':
            converter();
            break;
        
        case 'crop':
            cortar();
            break;

        case 'salvar':
            save();
            break;
    }
}

function converter()
{
    $nome       = pathinfo($_SESSION['video'],PATHINFO_FILENAME);   
    $ext        = $_POST['ext'];
    $caminho    = '../uploads/';
    $original   = $_SESSION['video'];
    
    $arquivofinal = $caminho . $nome . $ext;

    

    if ($ext == '.mp4'){
    chdir("../binario");
    $process = exec('ffmpeg -i '. $original .' -b:v 16M -vcodec h264 -acodec aac -strict -2 '. $arquivofinal . '');
    unlink($original);
    header('Location: ../pages/editarvideo.php');
    }
    else{
        chdir("../binario");
        $process = exec('ffmpeg -i '. $original .' -c:v libx264 -crf 19 -preset slow -c:a aac -strict -2 '. $arquivofinal .'');
        unlink($original);
        $_SESSION['video'] = $arquivofinal;
        header('Location: ../pages/editarvideo.php');
    }
}

function cortar()
{   
    $nome           =  uniqid();  
    $ext            = '.'.pathinfo($_SESSION['video'],PATHINFO_EXTENSION);
    $caminho        = '../uploads/';
    $original       = $_SESSION['video'];
    $comeco         = $_POST['comeco'];
    $comprimento    = $_POST['comprimento'];
    $arquivofinal   = $caminho . $nome . $ext;
    $ffmpeg         = "C:\\xampp\htdocs\\tcc\\binario\\ffmpeg";

    $cmd = "$ffmpeg -ss $comeco -i $original -t $comprimento $arquivofinal";
    shell_exec($cmd);
    unlink($original);
    $_SESSION['video'] = $arquivofinal;
    header('Location: ../pages/editarvideo.php');
}

function save()
{
    $arquivofinal = $_SESSION['video'];

    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename="' . $arquivofinal . '"');
    header('Content-Type: application/octet-stream');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($arquivofinal));
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header('Expires: 0');
    readfile($arquivofinal);
    header('Location: ../pages/editarvideo.php');
}

?>