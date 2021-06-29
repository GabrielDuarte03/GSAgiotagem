<?php

    $nome  = $_POST['nome'];
    $valor = $_POST['valor'];
    $data = $_POST['data'];
    $id = $_POST['id'];    

    include('../Classes/Conexao.php');
    
    if($id>0){
    try{

        $stmt = $pdo -> prepare("update tbdevedor set nomeDevedor = '$nome', valorEmprestado = '$valor', dataPagamento = '$data' where idDevedor = '$id'");
        $stmt -> execute();

        $pdo = null;
       

    }
    catch(PDOException $e){
        echo ('Erro:' . $e -> getMessage()) ;
    }
    }else{
        try{

            $stmt = $pdo -> prepare("insert into tbdevedor(nomeDevedor, valorEmprestado, dataPagamento)  
            values('$nome','$valor', '$data')");
            $stmt -> execute();
    
            $pdo = null;
            header("Location: ../devedor.php");
           
    
        }
        catch(PDOException $e){
            echo ('Erro:' . $e -> getMessage()) ;
        }
    }
?>