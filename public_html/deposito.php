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
<style>

body{
    margin:0;
    background-color:white;
}
table, th, td {
  margin-left: 10px;
  padding-left: 0;
  white-space: pre-line;
  border:0.5px solid black;
  
}
tbody {
  
  padding-left: 0;
  
}
.tabela{
    padding-left: 0;
    border:0.5px solid black;
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
	<title>Cadastro de Estoque</title>
</head>
<body>
   
<div class="menu">
<a href="https://spirano-it.000webhostapp.com/index.php"><button class="intervento " >Intervento</button></a>
<a href="https://spirano-it.000webhostapp.com/historic.php"><button class="storico">Storico</button></a>
<a href="https://spirano-it.000webhostapp.com/deposito.php"><button class="deposito active">Deposito</button></a>
</div>
  
<div class="blue-div">
<form action="adicionar_item.php" method="POST">
<input type="text" id="item" name="Item" placeholder="Item:" ><input type="text" id="quantidade" name="Codice" placeholder="Qtd:"  style="width:50px;"><input type="submit" value="Agg">
</form></div>

<div class="conteudo_intervento">
<p>Inventario</p>		
<?php
   
$Item = isset($_POST['Item']);
$Codice = isset($_POST['Codice']);
$Ex = isset($_POST['Ex']);


function update($conexao, $Item, $Codice) {
  $sql = "UPDATE inventario SET Item='$Item', Codice='$Codice' WHERE id=$id";
  if (mysqli_query($conexao, $sql)) {
    echo "Registro atualizado com sucesso.";
  } else {
    echo "Erro ao atualizar registro: " . mysqli_error($conexao);
  }
}

if(isset($_POST['delete_btn'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM inventario WHERE id=$id";
    if(mysqli_query($conexao, $sql)) {
        echo "Registro deletado com sucesso.";
    } else {
       // echo "Erro ao deletar registro: " . mysqli_error($conexao);
    }
}


$respostas = "SELECT * FROM inventario  ORDER BY Codice ASC" ;
$res = mysqli_query($conexao,$respostas);
//--------------------------------------------------------------------------------


echo "<td class=cabecalho >  </td>";
	echo "<table class=tabela >";
	echo "<tr >";
    
    echo "<td class=cabecalho>OGGETTO  </td>";
    echo "<td class=cabecalho>CODICE  </td>";
    echo "<td class=cabecalho>EX  </td>"; 
while($row_res = mysqli_fetch_assoc($res))
{ 	
    echo "<tr>";
    
    echo "<td class=preencher>".$row_res['Item']."</td>";
    echo "<td class=preencher>".$row_res['Codice']."</td>";
    echo "<td class=preencher>".$row_res['Ex']."</td>";
    
    echo "</tr>";
}        
   
echo "</table></br></br>";

?>
</div>

<style>


table, th, td {
  white-space: pre-line;
  border:1px solid black;
  
}
.tabela{
    border: 1px!important;  
    
}

.cabecalho{
   

   
    }
.preencher{

 padding-left: 10px!important;
   height:25px;
   
   font-weight: 500;
}    
 

</style>
</table>


</form>

  </body></table>


<span id="error_message" class="text-danger"></span>  
<span id="success_message" class="text-success"></span>

</form>

</html>