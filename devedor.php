<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
 
      
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>   

    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
  
    <title>GS Agiotagem</title>
    
   
</head>

<body>


    <section>
        <div class="msg" style="display:none;">
            <p class="msgajax"></p>
        </div>
    </section>



    <h1>Devedor: </h1>
    <br>
    <form>

        <input type="hidden" name="pegaID" id="pegaID" value="<?php echo @$_GET['idDevedor'];?>" />

        <label>Nome do devedor:</label>
        <input type="text" name="nome" id="nome" value="<?php echo @$_GET['nomeDevedor'];?>">
        <br>
        <br>
        <label>Valor Emprestado: R$</label>
        <input type="text" name="valor" id="valor" value="<?php echo @$_GET['valorEmprestado'];?>">
        <br>
        <br>
        <label>Data Prevista p/ Pagamento: </label>
        <input type="date" name="data" id="data" value="<?php echo @$_GET['dataPagamento'];?>">
    
        <script>

    
    </script>
   
        <br>
        <br>
        <br>
        <button id="salvar">Salvar</button>

        <input type="reset" value="Cancelar" class="cancelar" />

    </form>


    <br>
    <br>
    <section>

        <?php

        function inverteData($data){
            if(count(explode("/",$data)) > 1){
                return implode("-",array_reverse(explode("/",$data)));
            }elseif(count(explode("-",$data)) > 1){
                return implode("/",array_reverse(explode("-",$data)));
            }
        }
        
        include('./Classes/Conexao.php');


        echo '<table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Valor Emprestado</th>
            <th scope="col">Previsão de Pagamento</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>

          </tr>
        </thead>
        <tbody>
    
        ';
        try{
                $stmt = $pdo -> prepare("select * from tbdevedor");
                $stmt->execute();
            
            while($row = $stmt->fetch(PDO::FETCH_BOTH)){
                echo "<tr>
                <th scope='row'> " . $row['idDevedor'] . " </th> ";
                echo "<td> " . $row['nomeDevedor'] . "</td>";
                echo "<td> R$ " . $row['valorEmprestado'] . "</td>";
                echo "<td> " . inverteData($row['dataPagamento']). "</td>";


                echo " <td> <a href='?idDevedor={$row['idDevedor']}&nomeDevedor={$row['nomeDevedor']}&valorEmprestado={$row['valorEmprestado']}&dataPagamento={$row['dataPagamento']}' >";
                    echo "Alterar";
                echo "<a/> </td>";

                echo " <td> <a href='javascript:void(0)' class = 'excluir' id = '$row[idDevedor]'>";
                    echo "Excluir";
                echo "</a> </td>";

                echo "</tr>";
            }
            }
            catch(PDOException $e){
                echo "Erro: " . $e -> getMessage();
            }
            
            

        
        
        ?>

    </section>


    
    
  
</body>



</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script type ="text/javascript" src="./jquery.mask.js"></script>
<script>

    
    
    $(document).ready(function(){

        $('#valor').mask('###.###.##0,00', {reverse: true});
    });



    jQuery('#salvar').click(function () {

        var dadosAjax = {
            'id': jQuery('#pegaID').val(),
            'nome': jQuery('#nome').val(),
            'valor': jQuery('#valor').val(),
            'data': jQuery('#data').val(),
        }

        pageurl = './operacoes/salvar-devedor.php';

        jQuery.ajax({
            url: pageurl,
            data: dadosAjax,
            type: 'POST',
            success: function () {
                jQuery('.msg').show();
                jQuery('.msgajax').html("Dados salvos com sucesso!");
                jQuery('html body').animate({
                    scrollTop: 0
                }, 500);
                jQuery('.msg').fadeOut(3000);

                setTimeout(function () {
                    location.href = "devedor.php";
                }, 3000);
            }
        })

    });



    //AJAX exclusão

    jQuery('.excluir').click(function () {

        var element = $(this);
        var id = element.attr('id');
        var info = 'id = ' + id;
        if (confirm("Deseja realmente excluir o devedor?")) {
            $.ajax({

                type: "GET",
                url: './operacoes/excluir-devedor.php?id=' + id,
                data: info,
                success: function () {
                    jQuery('.msg').show();
                    jQuery('.msgajax').html("Dados excluídos com sucesso!");
                    jQuery('html body').animate({
                        scrollTop: 0
                    }, 500);
                    jQuery('.msg').fadeOut(3000);

                    setTimeout(function () {
                        window.location.reload(1);
                    }, 3000);
                }

            })
        }
    });


    //cancelar

    jQuery('.cancelar').click(function () {

        location.href = "devedor.php";
    })

    jQuery('form').on('submit', function (e) {
        e.preventDefault();
    });
</script>