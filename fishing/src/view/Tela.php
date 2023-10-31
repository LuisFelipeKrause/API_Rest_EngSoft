<?php
    require_once "../controller/UserController.php";

    if (isset($_POST["btn-cadastrar"])){
        $user = new UserController();
        
        $resultado = $user->cadastrarItem($_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["senha"]);
        echo "Item ".$resultado." cadastrado!";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro e Listagem</title>

    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="main">
        <div class="main-content-cadastro">
            <h2>Cadastro</h2>
            <form method="POST">
                <label for="nome">Nome</label>
                <input type="text" placeholder="Digite seu nome..." name="nome" required>

                <label for="nome">CPF</label>
                <input type="text" placeholder="Digite seu CPF..." name="cpf" required>

                <label for="nome">E-mail</label>
                <input type="email" placeholder="Digite seu e-mail..." name="email" required>

                <label for="nome">Senha</label>
                <input type="password" placeholder="Digite sua senha..." name="senha" required>

                <button name="btn-cadastrar">Cadastrar</button>
            </form>
        </div>
        <div class="main-content-listagem">
            <form method="POST">
                <button name="btn-lista-itens">Listar Itens</button>
                <table class="lista-itens">
                    <?php
                        if (isset($_POST["btn-lista-itens"])){
                            echo "<tr>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>E-mail</th>
                                <th>Senha</th>
                            </tr>";

                            require_once '../controller/UserController.php';
                            $user = new UserController();
                            
                            $itens = $user->listarItens();
                            $dados = json_decode($itens, true);

                            foreach ($dados as $registro){
                                echo "<tr>
                                <td>".$registro['nome']."</td>
                                <td>".$registro['cpf']."</td>
                                <td>".$registro['email']."</td>
                                <td>".$registro['senha']."</td>
                                </tr>";
                            }
                        }
                    ?>
                </table>
            </form>
        </div>
    </div>
</body>
</html>