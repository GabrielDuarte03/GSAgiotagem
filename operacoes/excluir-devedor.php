<?php

    $id = $_GET['id'];

    include("../Classes/Conexao.php");

    try{
        $stmt = $pdo->prepare("delete from tbdevedor where idDevedor = '$id'");
       $stmt -> execute();
        


    }catch(PDOException $e){
        echo 'Erro: ' . $e.getMessage();
    }


?>