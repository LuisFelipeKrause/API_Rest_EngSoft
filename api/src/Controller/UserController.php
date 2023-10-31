<?php
    class UserController {
        //Classe com os métodos http da api
        function cadastrar($jsonObject){
            require_once './src/Model/UserModel.php';
            $user = new UserModel();

            $data = json_decode($jsonObject, true);
            $nome = $data["nome"];
            $cpf = $data["cpf"];
            $email = $data["email"];
            $senha = $data["senha"];

            $user = $user->cadastrarItem($nome, $cpf, $email, $senha);

            if (isset($user)){
                $data = [
                    "nome" => $user["nome"],
                    "cpf" => $user["cpf"],
                    "email" => $user["email"],
                    "senha" => $user["senha"]
                ];
                $data = json_encode($data);
                return $data;
            }
            
        }

        function listarItens(){
            require_once './src/Model/UserModel.php';
            $user = new UserModel();

            $itens = $user->listar();

            return $itens;
        }
    }
?>