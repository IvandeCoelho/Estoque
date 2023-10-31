<?php
include("conexao.php");
session_start();
if (isset($_POST['email']) || isset($_POST['senha'])) {
  if (strlen($_POST['email']) == 0) {
    $_SESSION['log-erro'] = "Por favor digitar E-mail";
  } else if (strlen($_POST['senha']) == 0) {
    $_SESSION['log-erro'] = "Preencha sua Senha";
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
      $_SESSION['log-erro'] = "Falha ao logar! E-mail ou Senha incorreto";
    }
  }
}
?>



<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Controle de estoque</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    #imglog {
      overflow: hidden;
      height: 300px;
      background: url("./img/negoc.jpg") center/cover no-repeat;
    }
  </style>
</head>


<body>

  <div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="row w-100">
      <div class="col-12 col-md-6 mb-5 order-2 order-md-1">
        <form action="" method="post">
          <h1 class="mb-3 display-5">Acesse sua conta</h1>
          <div class="form-floating">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
              <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="senha">
              <label for="floatingPassword">Senha</label>
            </div>

            <div class="form-floating mb-3">
              <button type="submit" class="btn btn-primary btn-lg w-100">
                <i class="bi bi-send-check"></i> Entrar</button>
            </div>
            <div>
              <?php
              if (isset($_SESSION['log-erro'])) { ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $_SESSION['log-erro']; ?>
                </div>
                <?php
                unset($_SESSION['log-erro']);
              }
              ?>
            </div>
          </div>
        </form>
      </div>


      <div class="col-12 col-md-6 mb-5 order-1 order-md-2">
        <div id="imglog" class=""></div>
      </div>
    </div>

  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>