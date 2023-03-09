<?php
// Conecte-se ao banco de dados
$Servidor="localhost";
$Usuario="id20124781_tabela";
$Senha="$8Mariaebruno";
$banco="id20124781_cadastro";
$conn = new mysqli($Servidor, $Usuario, $Senha, $banco);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recupere o termo de pesquisa do formulário
$query = $_GET["query"];

// Crie uma consulta SQL para recuperar os resultados da pesquisa
$sql = "SELECT * FROM tabela WHERE id LIKE '%$query%' ORDER BY chave DESC";

// Execute a consulta SQL e exiba os resultados
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row_res = $result->fetch_assoc()) {
       
       
    echo "<table class=tabela >";
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
    echo "Nenhum resultado encontrado.";
}

// Feche a conexão com o banco de dados
$conn->close();

?>

<style>


table, th, td {
  white-space: pre-line;
  border:1px solid black;
  
}
.tabela{
    border: 1px!important;  
    width: 300px;
}

.cabecalho{
   
     width:150px!important;
   
    }
.preencher{

 padding-left: 10px!important;
   height:25px;
   width:150px!important;
   font-weight: 500;
}    
 

</style>
</table>

