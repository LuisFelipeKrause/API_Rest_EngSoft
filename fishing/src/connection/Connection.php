<?php
    class Connection {
        function Api($url, $method, $data){
            $require = curl_init ();

            curl_setopt ($require, CURLOPT_URL, $url);

            curl_setopt ($require, CURLOPT_RETURNTRANSFER, true);

            curl_setopt ($require, CURLOPT_POSTFIELDS, $data);

            curl_setopt ($require, CURLOPT_HTTPHEADER, array (
                "Content-Type: application/json"
            ));

            switch ($method) {
                case "post" : 
                    curl_setopt ($require, CURLOPT_POST, 1);
                    break;

                case "get" : 
                    curl_setopt ($require, CURLOPT_GET, 1);
                    break;

                case "put" : 
                    curl_setopt ($require, CURLOPT_PUT, 1);
                    break;

                case "delete" : 
                    curl_setopt ($require, CURLOPT_DELETE, 1);
                    break;
                
                default : 
                    echo ("método não existe");
                    break;
            }
    
            $response = curl_exec ($require);

            return $response;
        }
    }
?>