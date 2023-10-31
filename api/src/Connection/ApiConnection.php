<?php
    class ApiConnection {
        function connect(){
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