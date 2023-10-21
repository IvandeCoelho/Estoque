<?php 
//Destroi a pagina apos sair
if (!isset($_SESSION)){
    session_start();
}
    session_destroy();

    header("Location: index.php");
?>