<?php
    $url = $_SERVER["REQUEST_URI"];
    var_dump($url);

    switch ($url) {
        case '/Docs/API_Rest_EngSoft/fishing/':
            header("Location: ./src/view/Tela.php");
            break;
        
        default:
            echo "Página não encontrada";
            break;
    }
?>