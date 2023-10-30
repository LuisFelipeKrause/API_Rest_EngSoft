<?php
    //Deve utilizar as funções daqui direto na UserController.php

    $method = $_SERVER ["REQUEST_METHOD"];
    $url = $_SERVER ["REQUEST_URI"];

    $url = explode('/', $url);

    if ($method == "GET"){
        switch($url[3]){
            case "api":
                require_once './Model/UserModel.php';
                $user = new UserModel();
                $resultado = $user->listarCadastros();
            break;
            
            default: 
                $response = [
                    "status" => 404,
                    "message" => "Rota $url nao encontrada"
                ];
                header ("HTTP/1.0 404 Page Not Found");
                echo (json_encode ($response));
        }
    }
    else{
        $response = [
            "status" => 405,
            "message" => "Metodo $method nao permitido"
        ];
        header ("HTTP/1.0 405 Method Not Allowed");
        echo (json_encode ($response));        
    }
?>