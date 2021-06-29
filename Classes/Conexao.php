<?php


    $servidor = "localhost";
    $banco = "bdagiota";
    $usuario = "root";
    $senha = "";

    $pdo = new PDO("mysql:host=$servidor; dbname=$banco",$usuario,$senha);

?>