<?php
    class UserModel {
        function listarCadastros() {
            //Deve fazer a consulta dos dados
            require_once './Connection/ApiConnection.php';
            $conn = new ApiConnection();
            $resultadoConn = $conn->connect();
        }
    }
?>