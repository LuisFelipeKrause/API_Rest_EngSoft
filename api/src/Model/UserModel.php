<?php
    class UserModel {
        function cadastrarItem($nome, $cpf, $email, $senha){
            //Insere o novo item no BD
            require_once './Connection/ApiConnection.php';
            $conn = new ApiConnection();
            $conn = $conn->connect();
            $query = "INSERT INTO usuarios (nome, cpf, email, senha) VALUES ('$nome', '$cpf', '$email', '$senha')";

            $resultado = mysqli_query($conn, $query);
            var_dump($resultado);
            $result = mysqli_fetch_assoc($resultado);

            echo "Inserção feita com sucesso";
            $conn->close();

            return $result;
        }

        function listarItens(){
            require_once './Connection/ApiConnection.php';
            $conn = new ApiConnection();
            $conn = $conn->connect();

            $query = "SELECT nome, cpf, email, senha FROM usuarios";

            $resultado = mysqli_query($conn, $query);

            $conn->close();
            return $resultado;
        }
    }
?>