<?php

include_once("connection.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <script src="./removebanner.js"></script>
    <title>manutenzione degli impianti</title>
    <meta charset="utf-8">
    <!-- site responsivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, shrink-to-fit=no">
    <!-- jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!-- css -->
    <link rel="stylesheet" href="public_html/style.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <style>

.text-left p-1{
  height:10px;
 
}

.head{
background-color: lightblue; 
margin-top: 10px;
padding:0;
}

table, th, td {
  margin-left: 10px;
  padding-left: 5px;
  white-space: pre-line;
  border:0.5px solid black;
  
}
.tabela{
     
    width: 300px;
}

.cabecalho{
   
     width:150px!important;
   
    }
.preencher{

 
   height:25px;
   width:150px;
   font-weight: 500;
}    
 

</style>
  </head>

<body>  

 

<header class="text-left p-1" style="background-color: yellow;">
  <nav class="menu">
              <a class="" href="index.php"> Intervento </a>
          <!--<a class="" href="sicurezza.php"> Gobat </a>-->
           <a class="" href="historic.php"> Storico </a>
           <a class="" href="deposito.php"> Deposito </a>
  </nav>
</header>

    

   
  </br><div class="head"><h6>Registro di intervento</h6></div>
  
  
      <div><input type="text" name="query" placeholder="Digite sua pesquisa aqui">
    <input type="submit" value="Buscar">
</form></div>
   


</table>


</form>
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-1" style="background-color: yellow;"></br>
  </div>
  <!-- Copyright -->
</footer>
  </body></table>


<span id="error_message" class="text-danger"></span>  
<span id="success_message" class="text-success"></span>

</form>
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-1" style="background-color: yellow;"></br>
  </div>
  <!-- Copyright -->
</footer>
</html>