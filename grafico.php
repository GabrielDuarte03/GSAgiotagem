<html>

  <head>
    <!--
    SELECT COUNT(idDevedor) FROM tbdevedor WHERE MONTH(dataPagamento) = '6'    
  
    Load the AJAX API-->
    
<?php
    
    include_once('./Classes/Conexao.php');
    
    try{
        $link = mysqli_connect("localhost","root","","bdagiota");
        
        //janeiro
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 1");
        $jan = mysqli_fetch_assoc($result);
        //echo $jan['total']; 

        //fevereiro
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 2");
        $fev = mysqli_fetch_assoc($result);

         //março
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 3");
        $mar = mysqli_fetch_assoc($result);
        
        //abril
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 4");
        $abr = mysqli_fetch_assoc($result);
        
        //maio
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 5");
        $mai = mysqli_fetch_assoc($result);
        
        //junho
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 6");
        $jun = mysqli_fetch_assoc($result);
        
        //julho
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 7");
        $jul = mysqli_fetch_assoc($result);
        
        //agosto
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 8");
        $ago = mysqli_fetch_assoc($result);
        
        //setembro
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 9");
        $set = mysqli_fetch_assoc($result);
        
        //outubro
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 10");
        $out = mysqli_fetch_assoc($result);
        
        //novembro
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 11");
        $nov = mysqli_fetch_assoc($result);

        //dezembro
        $result = mysqli_query($link, "SELECT count(idDevedor) as total from tbdevedor where MONTH(dataPagamento) = 12");
        $dez = mysqli_fetch_assoc($result);
        

    }
    catch(PDOException $e){
        echo "Erro: " . $e -> getMessage();
    }
    
    
    
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Qtd. Empréstimos');
        data.addRows([
          ['Janeiro', <?php echo $jan['total']?>],
          ['Fevereiro', <?php echo $fev['total']?>],
          ['Março', <?php echo $mar['total']?>],
          ['Abril', <?php echo $abr['total']?>],
          ['Maio', <?php echo $mai['total']?>],
          ['Junho',<?php echo $jun['total']?>],
          ['Julho',<?php echo $jul['total']?>],
          ['Agosto',<?php echo $ago['total']?>],
          ['Setembro',<?php echo $set['total']?>],
          ['Outubro',<?php echo $out['total']?>],
          ['Novembro',<?php echo $nov['total']?>],
          ['Dezembro',<?php echo $dez['total']?>]
        ]);

        // Set chart options
        var options = {'title':'Previsão de pagamentos de Empréstimos por mês 2021',
                       'width':1200,
                       'height':700};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    
  </head>

  <body>


  <script>



  </script>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
  </body>
</html>