<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de estoque</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <style>
        #imglog {
            overflow: hidden;
            height: 300px;
            background-image: url("./img/negoc.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>


<body>

    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-12 col-md-6 mb-5">
                <form action="" method="post">
                    <h1 class="mb-3 display-5">Acesse sua conta</h1>
                    <div class="form-floating">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Senha</label>
                        </div>

                        <div class="form-floating">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="bi bi-send-check"></i> Entrar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-6">
                <div id="imglog" class=""></div>
            </div>
        </div>

    </div>


    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
include("conexao.php");

if (isset($_POST['email']) || isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        echo "Por favor digitar E-mail";
    } else if (strlen($_POST['senha']) == 0) {
        echo "Preencha sua Senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuario where email ='$email' AND senha ='$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na exercução:" . $mysqli->error);

        $quatidade = $sql_query->num_rows;

        if ($quatidade == 1) {
            $usuario = $sql_query->fetch_assoc();
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "Falha ao logar! E-mail ou Senha incorreto";
        }
    }
}
?>