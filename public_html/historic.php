
<?php
// Conecte-se ao banco de dados
include_once("connection.php");

// Recupere o termo de pesquisa do formulário

?><!DOCTYPE html>
<html>
<head>
    <!-- jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- css -->
    <link rel="stylesheet" href="public_html/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>

}


.cabecalho{
   
     width:150px;
   
    }
.preencher{

 padding-left: 10px!important;
   height:25px;
   width:150px!important;
   font-weight: 500;
}

body{
    font-family: 'Open Sans', sans-serif;
    margin:0;
    background-color:white;
}
table, th, td {
  margin-left: 0;
  padding-left: 0;
  white-space: pre-line;

  
}
tbody {
  
  padding-left: 0;
  
}
.tabela{
    padding-left: 0;

    width: 300px;
}

     .menu {
      display: flex;
      background-color: yellow;
      padding-top: 10px;
      padding-left: 10px;
      padding-bottom: 0;
    }
    
     .blue-div {
      background-color: white;
      height: 20px;
      margin: 0;
      padding:20px;
    }

    /* estilos dos botões */
    .menu button {
      border: none;
      background-color: inherit;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      padding: 10px;
      margin-right: 10px;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    /* estilos do botão ativo */
    .menu button.active {
      background-color: white;
      border-bottom: 2px solid black;
    }
    
    .conteudo_intervento{
        padding-top:0px;
        padding-left:20px;
    }

    /* estilos do conteúdo */
    .conteudo {
      padding: 20px;
      
      border-top: none;
      border-radius: 0 5px 5px 5px;
    }

    /* esconde o conteúdo inativo */
    .conteudo:not(.ativo) {
      display: none;
    }
    

    /* estilos para dispositivos móveis */
    @media (max-width: 768px) {
      .menu {
        flex-wrap: wrap;
        background-color: yellow;
        padding: 0;
        margin: 0;
        
      }
     /* estilos dos botões */
    .menu button {
      border: none;
      background-color: inherit;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      padding: 10px;
      margin-top: 10px;
      margin-left: 10px;
      margin-right: 10px;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }

    /* estilos do botão ativo */
    .menu button.active {
      background-color: white;
      border-bottom: 2px solid black;
    }
      .conteudo {
        border-radius: 0;
   
        margin-top: -1px;
      }
    }
 
  </style>
	<title>manutenzione degli impiant</title>
</head>
<body>
   
  <div class="menu">
<a href="https://spirano-it.000webhostapp.com/index.php"><button class="intervento" >Intervento</button></a>
<a href="https://spirano-it.000webhostapp.com/historic.php"><button class="storico active">Storico</button></a>
<a href="https://spirano-it.000webhostapp.com/deposito.php"><button class="deposito">Deposito</button></a>
  </div>
  <div class="blue-div">
<form action="" method="get">
    <input type="text" name="query" placeholder="">
    <input type="submit" value="Cerca"><a href="apagar_consulta.php" class="botao-apagar"> cancella</a>
</form>

</div>

<div class="conteudo_intervento">
    
<?php // Crie uma consulta SQL para recuperar os resultados da pesquisa
    $query = isset($_GET['query'])? $_GET['query'] : "";
    $sql = "SELECT * FROM tabela WHERE id LIKE '$query' ORDER BY chave DESC";

// Execute a consulta COUNT() para obter o número de resultados
$count_query = "SELECT COUNT(*) as count FROM tabela WHERE id LIKE '$query'";
$count_result = $conexao->query($count_query);
$count_row = $count_result->fetch_assoc();
$num_results = $count_row['count'];

// Exiba o número de resultados e os dados da pesquisa

$result = $conexao->query($sql);
if ($result->num_rows > 0) {
    while($row_res = $result->fetch_assoc()) {
       
       
   echo "<table class=tabela >";
echo "<tr >";
echo "<td class='cabecalho'>ID</td>";

echo "<td class='preencher'><a href='historic.php?id=" . $row_res['chave'] . "'>" . $row_res['chave'] . "</a></td>";
echo "</tr>";
	//--------------------------------------------------
	echo "<tr >";
    echo "<td class=cabecalho>Girassole:  </td>";
    echo "<td class=preencher >".$row_res['id']."</td>";
    echo "</tr>";
    //------------------------------------------------
    $re = $row_res['data'];
    $timestamp = strtotime($re);
    $new_date = date("d-m-Y", $timestamp);
	echo "<tr>";
    echo "<td class=cabecalho >Data:  </td>";
    echo "<td class=preencher>".$new_date."</td>";
    echo "</tr>";
    //--------------------------------------------------
    
    $hide = NULL; 
    $hora = $row_res['hora'];
    $time = strtotime($hora);
    $new_time = date("H:i", $time);
    if($new_time == "00:00")
    {
    echo "<tr>";
    echo "<td class=cabecalho>Ore:  </td>";
    echo "<td class=preencher>".$hide."</td>";
    echo "</tr>"; 
    }else{
    echo "<tr>";
    echo "<td class=cabecalho>Ore:  </td>";
    echo "<td class=preencher>".$new_time."</td>";
    echo "</tr>";     
        
    }
    //--------------------------------------------------
    $hide_status = $row_res['status'];
    if($hide_status == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Status:  </td>";
    echo "<td class=preencher>".$hide."</td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho >Status:  </td>";
    echo "<td class=preencher>".$row_res['status']." </td>";
    echo "</tr>";
    }
    //---------------------------------------------------
    $hide_colore = $row_res['status'];
    if($hide_colore == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Colore:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
     echo "<tr>";
    echo "<td class=cabecalho >Colore:  </td>";
    echo "<td class=preencher>".$row_res['cor']." </td>";
    echo "</tr>";   
    }
    //----------------------------------------------------
    $hide_comunicazione = $row_res['status'];
    if($hide_comunicazione == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Comunicazione:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho  >Comunicazione: </td>";
    echo "<td class=preencher  >".$row_res['comunicazione']." </td>"; 
    echo "</tr>";
    }
    
    //---------------------------------------------------
    $hide_comando = $row_res['status'];
    if($hide_comando == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Comando:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho >Comando:  </td>";
    echo "<td class=preencher>".$row_res['comando']." </td>";
    echo "</tr>";  
    }
     //----------------------------------------------------
    if($hide_comando == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Comando:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{echo "<tr>";
    echo "<td class=cabecalho>Actual position AZ</td>";
    echo "<td class=preencher>".$row_res['actual_AZ']."</td>";
    echo "</tr>";}
    //----------------------------------------------------
    if($hide_comando == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Comando:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho>Actual position TL</td>";
    echo "<td class=preencher>".$row_res['actual_TL']."</td>";
    echo "</tr>";}
    //----------------------------------------------------
    if($hide_comando == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Comando:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho>Setpoint AZ</td>";
    echo "<td class=preencher>".$row_res['setpoint_AZ']."</td>";
    echo "</tr>";}
    //-----------------------------------------------------
    if($hide_comando == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Comando:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho>Setpoint TL</td>";
    echo "<td class=preencher>".$row_res['setpoint_TL']."</td>";
    echo "</tr>";}
    //-----------------------------------------------------
    echo "<tr>";
    echo "<td colspan=\"2\" class=cabecalho >Commenti:  </td>";
    echo "</tr>";
    //---------------------------------------------------
    echo "<tr>";
    echo "<td class=preencher colspan=\"2\">".$row_res['problema']." </td>";
    echo "</tr>";
    //----------------------------------------------------
    echo "<tr>";
    echo "<td colspan=\"2\" class=cabecalho >Attacamento:  </td>";
    echo "</tr>";
    //----------------------------------------------------
     if(empty($row_res['image']))
    {
    echo "<tr>";
    echo "<td class=preencher colspan=\"2\" ></td>";
    echo "</tr>"; 
    }else{
    echo "<tr>";
    echo "<td class=preencher colspan=\"2\" ><a href=".$row_res['image'].">".$row_res['image']."</a></td>";
    echo "</tr>"; 
    }
    //----------------------------------------------------
    echo "<tr>";
    echo "<td colspan=\"2\" class=cabecalho >Descrizione del lavoro:  </td>";
    echo "</tr>";
    //----------------------------------------------------
    echo "<tr>";
    echo "<td class=preencher colspan=\"2\" >".$row_res['solucao']."</td>";
    echo "</tr>";
    //---------------------------------------------------
      echo "<tr>";
    echo "<td colspan=\"2\" class=cabecalho >Conclusione:  </td>";
    echo "</tr>";
    //----------------------------------------------------
    echo "<tr>";
    echo "<td class=cabecalho >Risultato:  </td>";
    echo "<td class=preencher colspan=\"2\" >".$row_res['risultato_finale']."</td>";
    echo "</tr>";
    //----------------------------------------------------
    $re = $row_res['data_finale'];
    $timestamp = strtotime($re);
    $new_date_finale = date("d-m-Y", $timestamp);
    echo "<tr>";
    echo "<td class=cabecalho >Data finale:  </td>";
    echo "<td class=preencher colspan=\"2\" >".$new_date_finale."</td>";
    echo "</tr>";
    //----------------------------------------------------
    $hora = $row_res['hora_finale'];
    $time = strtotime($hora);
    $new_time_finale = date("H:i", $time);
    echo "<tr>";
    echo "<td class=cabecalho >Hora finale:  </td>";
    echo "<td class=preencher colspan=\"2\" >".$new_time_finale."</td>";
    echo "</tr>";
    
    echo "</table></br></br>";
        
        
        
        
        
        
        
        
        
        
    }
} else {

}




$respostas = "SELECT * FROM tabela ORDER BY chave DESC" ;
$res = mysqli_query($conexao,$respostas);
//--------------------------------------------------------------------------------


while($row_res = mysqli_fetch_assoc($res))
{  

    echo "<fieldset style='width:300px;'>";  
    echo "<table>";
	echo "<tr >";
    echo "<td class='cabecalho'>ID:</td>";
    echo "<td class='preencher' id='row-". $row_res['chave'] . "'><a href='historic.php?id=" . $row_res['chave'] . "#row-" . $row_res['chave'] . "'>" . $row_res['chave'] . "</a></td>";
    echo "</tr>";
    
	//--------------------------------------------------
	echo "<tr >";
    echo "<td class=cabecalho>Girassole:  </td>";
    echo "<td class=preencher >".$row_res['id']."</td>";
    echo "</tr>";
    //------------------------------------------------
    $re = $row_res['data'];
    $timestamp = strtotime($re);
    $new_date = date("d-m-Y", $timestamp);
	echo "<tr>";
    echo "<td class=cabecalho >Data:  </td>";
    echo "<td class=preencher>".$new_date."</td>";
    echo "</tr>";
    //--------------------------------------------------
    
    $hide = NULL; 
    $hora = $row_res['hora'];
    $time = strtotime($hora);
    $new_time = date("H:i", $time);
    if($new_time == "00:00")
    {
    echo "<tr>";
    echo "<td class=cabecalho>Ore:  </td>";
    echo "<td class=preencher>".$hide."</td>";
    echo "</tr>"; 
    }else{
    echo "<tr>";
    echo "<td class=cabecalho>Ore:  </td>";
    echo "<td class=preencher>".$new_time."</td>";
    echo "</tr>";     
        
    }
    //--------------------------------------------------
    $hide_status = $row_res['status'];
    if($hide_status == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Status:  </td>";
    echo "<td class=preencher>".$hide."</td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho >Status:  </td>";
    echo "<td class=preencher>".$row_res['status']." </td>";
    echo "</tr>";
    }
    //---------------------------------------------------
    $hide_colore = $row_res['status'];
    if($hide_colore == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Colore:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
     echo "<tr>";
    echo "<td class=cabecalho >Colore:  </td>";
    echo "<td class=preencher>".$row_res['cor']." </td>";
    echo "</tr>";   
    }
    //----------------------------------------------------
    $hide_comunicazione = $row_res['status'];
    if($hide_comunicazione == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Comunicazione:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho  >Comunicazione: </td>";
    echo "<td class=preencher  >".$row_res['comunicazione']." </td>"; 
    echo "</tr>";
    }
    
    //---------------------------------------------------
    $hide_comando = $row_res['status'];
    if($hide_comando == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Comando:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho >Comando:  </td>";
    echo "<td class=preencher>".$row_res['comando']." </td>";
    echo "</tr>";  
    }
     //----------------------------------------------------
    if($hide_comando == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Actual position AZ:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{echo "<tr>";
    echo "<td class=cabecalho>Actual position AZ</td>";
    echo "<td class=preencher>".$row_res['actual_AZ']."</td>";
    echo "</tr>";}
    //----------------------------------------------------
    if($hide_comando == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Actual position TL:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho>Actual position TL</td>";
    echo "<td class=preencher>".$row_res['actual_TL']."</td>";
    echo "</tr>";}
    //----------------------------------------------------
    if($hide_comando == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Setpoint AZ:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho>Setpoint AZ</td>";
    echo "<td class=preencher>".$row_res['setpoint_AZ']."</td>";
    echo "</tr>";}
    //-----------------------------------------------------
    if($hide_comando == 0)
    {
    echo "<tr>";
    echo "<td class=cabecalho >Setpoint TL:  </td>";
    echo "<td class=preencher>".$hide." </td>";
    echo "</tr>";
    }else{
    echo "<tr>";
    echo "<td class=cabecalho>Setpoint TL</td>";
    echo "<td class=preencher>".$row_res['setpoint_TL']."</td>";
    echo "</tr>";}
    
    //----------------------------------------------------
     echo "<tr>";
    echo "<td class=cabecalho>Asse</td>";
    echo "<td class=preencher>".$row_res['asse']."</td>";
    echo "</tr>";
    //-----------------------------------------------------
     echo "<tr>";
    echo "<td class=cabecalho>Segui il Sole?</td>";
    echo "<td class=preencher>".$row_res['seguimento']."</td>";
    echo "</tr>";
    //----------------------------------------------------
    echo "<tr>";
    echo "<td class=cabecalho>Tipo Manutenzione</td>";
    echo "<td class=preencher>".$row_res['manutenzione']."</td>";
    echo "</tr>";
    //-----------------------------------------------------
    echo "<tr>";
    echo "<td colspan=\"2\" class=cabecalho >Commenti:  </td>";
    echo "</tr>";
    //---------------------------------------------------
    echo "<tr>";
    echo "<td class=preencher colspan=\"2\">".$row_res['problema']." </td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td colspan=\"2\" class=cabecalho >Attacamento:  </td>";
    echo "</tr>";
    //----------------------------------------------------
    
   if(empty($row_res['image']))
    {
    echo "<tr>";
    echo "<td class=preencher colspan=\"2\" ></br></td>";
    echo "</tr>"; 
    }else{
    echo "<tr>";
    echo "<td class=preencher colspan=\"2\" ><a href=".$row_res['image'].">".$row_res['image']."</a></td>";
    echo "</tr>"; 
    } 
     echo "</table >";
    echo "</fieldset >";
    //----------------------------------------------------
    echo "<fieldset style='width:300px;'><legend>Descrizione del lavoro:</legend>";
     echo "<table >";
    echo "<tr>";
    echo "<td colspan=\"2\" class=cabecalho >  </td>";
    echo "</tr>";
    //----------------------------------------------------
    echo "<tr>";
    echo "<td class=preencher colspan=\"2\" >".$row_res['solucao']."</td>";
    echo "</tr>";
     echo "</table >";
    echo "</fieldset>";
    //---------------------------------------------------
    echo "<fieldset style='width:300px;'><legend>Conclusione:</legend>";
     echo "<table >";
    echo "<tr>";
    echo "<td colspan=\"2\" class=cabecalho >  </td>";
    echo "</tr>";
    //----------------------------------------------------
    echo "<tr>";
    echo "<td class=cabecalho>Risultato:  </td>";
    echo "<td class=preencher colspan=\"2\" >".$row_res['risultato_finale']."</td>";
    echo "</tr>";
    //----------------------------------------------------
    $re = $row_res['data_finale'];
    $timestamp = strtotime($re);
    $new_date_finale = date("d-m-Y", $timestamp);
    if($new_date_finale == "30-11--0001"){
    echo "<tr>";
    echo "<td class=cabecalho>Data:  </td>";
    echo "<td class=preencher>".$hide."</td>";
    echo "</tr>"; 
    }else{
    echo "<tr>";
    echo "<td class=cabecalho>Data:  </td>";
    echo "<td class=preencher colspan=\"2\" >".$new_date_finale."</td>";
    echo "</tr>";
    }
    //----------------------------------------------------
    $hide = NULL; 
    $hora = $row_res['hora_finale'];
    $time = strtotime($hora);
    $new_time_finale = date("H:i", $time);
    if($new_time_finale == "00:00")
    {
    echo "<tr>";
    echo "<td class=cabecalho>Ore:  </td>";
    echo "<td class=preencher>".$hide."</td>";
    echo "</tr>"; 
    }else{
    echo "<tr>";
    echo "<td class=cabecalho>Ore:  </td>";
    echo "<td class=preencher colspan=\"2\" >".$new_time_finale."</td>";
    echo "</tr>";
    }
    
   

    echo "</table>"; 
    echo "</fieldset>
    </br></br>";
}





// Feche a conexão com o banco de dados
$conexao->close();
?>
  </div>
 
   
  
    <script>
    // adiciona um ouvinte de eventos aos botões do menu
    const botoes = document.querySelectorAll('.menu button');
    botoes.forEach(botao => {
      botao.addEventListener('click', () => {
        // remove a classe 'ativo' de todos os botões
        botoes.forEach(botao => {
          botao.classList.remove('active');
        });
        // adiciona a classe 'ativo' ao botão clicado
        botao.classList.add('active');

        // mostra o conteúdo da aba correspondente e esconde os outros
        const aba = botao.classList[0];
        const conteudos = document.querySelectorAll('.conteudo');
        conteudos.forEach(conteudo => {
          conteudo.classList.remove('ativo');
          if (conteudo.classList.contains(aba)) {
            conteudo.classList.add('ativo');
          }
        });
      });
    });
  </script>


</body>
</html>




