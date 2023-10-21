<?php 
//inclui a proteção
include('protect.php');

//verifica e inicia a sessão
if (!isset($_SESSION)){
    session_start();
}
?>

<?php 
//verifica se tem a variavel enviar
if(isset($_POST['submit']))
{
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

   $result = mysqli_query ($mysqli, "INSERT INTO cadastro (nome, cnpj, descricao, nf, valor) VALUES ('$Nome', '$CNPJ', '$Descricao', '$NF', '$Valor')");
}
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
     <form action="painel.php" method="POST" name="cadastro">

        <label for="nome">Nome</label>
        <input type="text" name="nome" placeholder="Digite o nome do produto">

        <label for="cnpj" required>CNPJ</label>
        <input type="text" name="cnpj" placeholder="Digite o CNPJ">

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" placeholder="Digite uma descrição">

        <label for="nf" required>N° NF</label>
        <input type="text" name="nf">
        
        <label for="valor" required>Valor</label>
        <input type="text" name="valor">

        <input type="submit" name="submit" id="submit">

     </form>


     

     <p>
        <a href="logout.php">Sair</a>
     </p>
</body>
</html>