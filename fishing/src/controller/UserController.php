<?php
    class UserController {
        function cadastrarItem($nome, $cpf, $email, $senha) {
            require_once '../connection/Connection.php';
            $api = new Connection();

            $url = "http://localhost:5500/Docs/API_Rest_EngSoft/api/";
            $data = [
                "nome" => $nome,
                "cpf" => $cpf,
                "email" => $email,
                "senha" => $senha
            ];
            $data = json_encode($data);
            $method = "post";

            $resposta = $api->Api($url, $method, $data);
        }
        
        function listarItens(){

        }
    }
?>