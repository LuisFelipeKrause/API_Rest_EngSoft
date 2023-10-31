<?php
    require_once "../controller/UserController.php";

    if ($_POST){
        $user = new UserController();
        
        $resultado = $user->cadastrarItem($_POST["nome"], $_POST["cpf"], $_POST["email"], $_POST["senha"]);
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

                <button>Cadastrar</button>
            </form>
        </div>
        <div class="main-content-listagem">

        </div>
    </div>
</body>
</html>