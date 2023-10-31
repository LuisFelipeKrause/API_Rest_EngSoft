<?php
    class ApiConnection {
        function connect(){
            //Faz a conexão no banco
            $host = "localhost";
            $dbname = "loginRU";
            $password = "";
            $user = "root";
            $conn = mysqli_connect($host, $user, $password, $dbname);
            
            if (!$conn){
                die("Connection failed".mysqli_connect_error());
            }
            else{
                return $conn;
            }
        }
    }
?>