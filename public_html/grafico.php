
<?php
include_once("connection.php");



// Seleciona a tabela 'girasole'
$sql = "SELECT COUNT(*) as quantidade
FROM minha_tabela
WHERE id = 31 AND YEAR(data) = 2022;";
$resultado = mysqli_query($conexao, $sql);
?>

<html>
   <head>
      <title>Gráfico de barras - Últimos três meses por item</title>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
         google.charts.load('current', {'packages':['corechart']});
         google.charts.setOnLoadCallback(drawChart);
         function drawChart() {
            var data = google.visualization.arrayToDataTable([
               ['Item'],
               ['1'],
               ['2'],
               ['3']
              
               // adicione aqui os valores para os itens restantes...
            ]);

            var options = {
               title: 'Últimos três meses por item',
               chartArea: {width: '50%'},
               hAxis: {
                  title: 'Quantidade',
                  minValue: 0
               },
               vAxis: {
                  title: 'Item'
               }
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
         }
      </script>
   </head>
   <body>
      <div id="chart_div" style="width: 300px; height: 500px;"></div>
   </body>
</html>
