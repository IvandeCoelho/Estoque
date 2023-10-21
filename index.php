<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de estoque</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-icons.css">
</head>


<body>
    <div class="box" >
    <div class="row justify-content-center">

    <div class="col-md-5 ">
        <h1 class="">Acesse sua conta</h1>

    <form action="" method="POST" class="">

        <p>
        <label >Email</label>
        <input type="text" name="email" class="form-control" placeholder="Digite seu email">
        </p>

        <p>
        <label >Senha</label>
        <input type="password" name="senha" class="form-control" placeholder="Digite sua senha">
        </p>

        <p>
            <button type="submit" class="btn btn-primary form-control"> <i class="bi bi-send-check"></i> Entrar</button>
        </p>
    </form>
    </div>
    <div class="col-md-7">
        <img src="img/negoc.jpg" alt="">
    </div>
    </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
 include("conexao.php");

 if(isset($_POST['email']) || isset($_POST['senha'])){
    if(strlen($_POST['email']) == 0){
        echo "Por favor digitar E-mail";
    }else if(strlen($_POST['senha']) == 0){
        echo"Preencha sua Senha";
    }else{
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code ="SELECT * FROM usuario where email ='$email' AND senha ='$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na exercução:" . $mysqli->error);

        $quatidade = $sql_query->num_rows;

        if($quatidade==1){
            $usuario = $sql_query->fetch_assoc();
            if (!isset($_SESSION)){
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php");

        }else{
            echo "Falha ao logar! E-mail ou Senha incorreto";
        }
    }
 }
 ?>
