<?php
    
    use Dompdf\Dompdf;
    include("./Classes/conexao.php");
    
    $stmt = $pdo -> prepare("select * from tbdevedor");
    $stmt->execute();

    $html="";

    function inverteData($data){
        if(count(explode("/",$data)) > 1){
            return implode("-",array_reverse(explode("/",$data)));
        }elseif(count(explode("-",$data)) > 1){
            return implode("/",array_reverse(explode("-",$data)));
        }
    }

    $carro = 'select * from tbdevedor';
 
    while($rowDev = $stmt->fetch(PDO::FETCH_BOTH)) {
         $html = $html . "<br><br>" . "Nome do Devedor: " . $rowDev['nomeDevedor'] . "<br>". "Valor Emprestado: R$" .  $rowDev['valorEmprestado'] . "<br>". "Data Prevista para Pagamento: " . inverteData($rowDev['dataPagamento']);

    }

   

    require_once("./dompdf/autoload.inc.php");

    $dompdf = new DOMPDF();

    $dompdf->load_html("<h1> Relatório de Dívidas </h1>".$html);

    $dompdf->setPaper('A4', 'landscape');

    $dompdf -> render();

    $dompdf->stream("devedores.pdf",array("Attachament" => false));


?>