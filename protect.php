<?php 
//Defini que não possivel oacesso direto a pagina
if (!isset($_SESSION)){
    session_start();
}
if (!isset($_SESSION['id'])){
    die("Você não pode acessar esta página! Faça login <p><a href=\"index.php\">Entrar</a></p>");
}
?>