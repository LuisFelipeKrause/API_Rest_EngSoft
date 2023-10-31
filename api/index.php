<?php
    //Deve utilizar as funções daqui direto na UserController.php
    header ("Content-Type: application/json");

    $method = $_SERVER ["REQUEST_METHOD"];
    $url = $_SERVER ["REQUEST_URI"];

    switch ($method) {
        case 'POST':
            if ($url == "/Docs/API_Rest_EngSoft/api/index.php"){
                require_once './src/Controller/UserController.php';
                $user = new UserController();
    
                $dados = file_get_contents("php://input");
                $data = json_decode($dados);

                $user->cadastrar($dados);
    
                $response = [
                    'nome' => $data->nome,
                    'cpf' => $data->cpf,
                    'email' => $data->email,
                    'senha' => $data->senha
                ];
                echo json_encode($response);
            }
            else {
                $response = [
                    "status" => 404,
                    "message" => "Rota $url nao encontrada"
                ];
                header ("HTTP/1.0 404 Page Not Found");
                echo (json_encode ($response));
            }
            break;

        case 'GET':
            if ($url == "/Docs/API_Rest_EngSoft/api/"){
                require_once './src/Controller/UserController.php';
                $user = new UserController();

                $response = $user->listarItens();
                //var_dump($response);

                $data = array();
                while ($row = mysqli_fetch_assoc($response)) {
                    $data[] = $row; // Adicione cada linha como um elemento do array
                }
                echo (json_encode($data));
            }
            else{
                $response = [
                    "status" => 404,
                    "message" => "Rota $url nao encontrada"
                ];
                header ("HTTP/1.0 404 Page Not Found");
                echo (json_encode ($response));
            }
            break;
        
        default:
            $response = [
                "status" => 405,
                "message" => "Metodo $method nao permitido"
            ];
            header ("HTTP/1.0 405 Method Not Allowed");
            echo (json_encode ($response));
            break;
    }


    /*if ($method == "POST"){
        if ($url == "/Docs/API_Rest_EngSoft/api/index.php"){
            require_once './src/Controller/UserController.php';
            $user = new UserController();

            $dados = file_get_contents("php://input");
            $data = json_decode($dados);

            switch ($data->servico){
                case 'cadastro':
                    $user->cadastrar($dados);

                    $response = [
                        'nome' => $data->nome,
                        'cpf' => $data->cpf,
                        'email' => $data->email,
                        'senha' => $data->senha
                    ];
                    echo json_encode($response);
                    break;
                case 'listarItens':

                    break;
                
                default:
                    $response = [
                        "status" => 404,
                        "message" => "Rota $url nao encontrada"
                    ];
                    header ("HTTP/1.0 404 Page Not Found");
                    echo (json_encode ($response));
                    break;
            }

            
        }
        else {
            $response = [
                "status" => 404,
                "message" => "Rota $url nao encontrada"
            ];
            header ("HTTP/1.0 404 Page Not Found");
            echo (json_encode ($response));
        }
        switch($url){
            case "/Docs/API_Rest_EngSoft/api/index.php":
                require_once './src/Controller/UserController.php';
                $user = new UserController();

                $dados = file_get_contents("php://input");

                $user->cadastrar($dados);
                $data = json_decode($dados);

                $response = [
                    'nome' => $data->nome,
                    'cpf' => $data->cpf,
                    'email' => $data->email,
                    'senha' => $data->senha
                ];
                echo json_encode($response);
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
    }*/
?>