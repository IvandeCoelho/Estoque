<?php
//inclui a proteção
include('protect.php');

//verifica e inicia a sessão
if (!isset($_SESSION)) {
    session_start();
}
?>

<?php
//verifica se tem a variavel enviar
if (isset($_POST['submit'])) {
    //print_r($_POST['nome']);
    // print_r($_post['cnpj']);
    // print_r($_post['descricao']);
    // print_r($_post['nf']);
    // print_r($_post['valor']);


    //envia parametros do formulario para o banco
    include_once('conexao.php');

    $Nome = ($_POST['nome']);
    $CNPJ = ($_POST['cnpj']);
    $Descricao = ($_POST['descricao']);
    $NF = ($_POST['nf']);
    $Valor = ($_POST['valor']);

    $result = mysqli_query($mysqli, "INSERT INTO cadastro (nome, cnpj, descricao, nf, valor) VALUES ('$Nome', '$CNPJ', '$Descricao', '$NF', '$Valor')");
}
?>




<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Painel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
    </style>
</head>

<body>

    <header class="bg-primary py-4 mb-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="lead text-light">ENTRADA DO ALMOXARIFADO</h1>
                </div>
                <div class="col">
                    <h3 class="text-light lead text-end">Casas decimais <span class="badge bg-light text-dark">2</span>
                    </h3>
                </div>
                <div class="col text-end">

                    <a href="logout.php" class="btn btn-danger btn-sm"><i class="bi bi-box-arrow-left"></i> Sair</a>

                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <form action="" method="post" name="cadastro">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="inputnome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="inputnome" placeholder="Nome do produto">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cnpj" class="form-label">CNPJ</label>
                    <input type="text" class="form-control" id="cnpj" placeholder="XX. XXX. XXX/0001-XX.">
                </div>

                <div class="col-12 mb-3">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea class="form-control" placeholder="Descrição do produto" id="descricao"></textarea>
                </div>
                <div class="col-6 mb-3">
                    <label for="nfiscao" class="form-label">Nº NF.</label>
                    <input type="text" class="form-control" id="nfiscao" placeholder="Nº NF">
                </div>

                <div class="col-6 mb-5">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="text" class="form-control" id="valor" placeholder="valor">
                </div>

                <div class="col-12 text-center mb-3 bg-secondary-subtle py-3">
                    <button type="submit" class="btn btn-success w-75"> <i class="bi bi-plus-circle"></i>
                        Cadastrar</button>
                    <a href="consulta.php" class="btn btn-warning w25"><i class="bi bi-border-style"></i> Consultar
                        Itens</a>
                    <!-- <a href="painel.php" class="btn btn-warning"><i class="bi bi-arrow-left-square"></i> Voltar</a> -->
                </div>
            </div>
        </form>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>