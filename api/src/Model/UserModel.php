<?php
    class UserModel {
        function cadastrarItem($nome, $cpf, $email, $senha){
            require_once './src/Connection/ApiConnection.php';
            $conn = new ApiConnection();
            $conn = $conn->connect();

            $query = "INSERT INTO usuarios (nome, cpf, email, senha) VALUES ('$nome', '$cpf', '$email', '$senha')";
            $resultado = mysqli_query($conn, $query);

            $conn->close();
            return $resultado;
        }

        function listar(){
            require_once './src/Connection/ApiConnection.php';
            $conn = new ApiConnection();
            $conn = $conn->connect();

            $query = "SELECT nome, cpf, email, senha FROM usuarios";

            $resultado = mysqli_query($conn, $query);

            $conn->close();
            return $resultado;
        }
    }
?>