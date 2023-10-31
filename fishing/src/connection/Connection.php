<?php
    class Connection {
        function Api($url, $method, $data){
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

            switch ($method) {
                case "post" : 
                    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    break;

                case "get" : 
                    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, "GET");
                    break;
                
                default : 
                    echo ("método não existe");
                    break;
            }
            $resultado = curl_exec($ch);
            curl_close($ch);
            
            return $resultado;
        }
    }
?>