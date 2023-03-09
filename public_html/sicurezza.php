
<?php include_once("connection.php");?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <script src="./removebanner.js"></script>
    <title>manutenzione degli impianti</title>
    <meta charset="utf-8">
    <!–– site responsivo ––>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!–– jquery ––>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <!–– css––>
    <link rel="stylesheet" href="public_html/style.css" >
    <!–– bootstrap ––>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
    <!––  ––>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <!–– and the comment closes with ––>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <!–– and the comment closes with ––>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!–– and the comment closes with ––>
    <script src="js/jquery-1.8.2.min.js" type="text/javascript" ></script>
    <!–– and the comment closes with ––>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!–– and the comment closes with ––>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
 
 <style type="text/css">
 

textarea{
    white-space: pre-line;
}     
.cabecalho{
  
     width:150px!important;
   
    }
.preencher{
   
 
    width:150px!important;
    } 
    label{
        display: inline-block; margin-right: 10px;
    }
    
 input {
    
    width: 150px;
}
   
 
select {
    
    width: 100%;
}

 </style>

  </head>

<body >  



<header class="text-left p-1" style="background-color: yellow;">
  <nav class="menu">
           <a class="" href="index.php"> Intervento </a>
           <a class="" href="sicurezza.php"> Gobat </a>
           <a class="" href="historic.php"> Storico </a>
  </nav>
</header>

<script src="meteo.js"></script>
    <div id="weather-results"></div>
    


   
  <h6>Allerta di vento:</h6>
  <!--start-->
<form class="form" id="form" action="mail_temporale.php" method="post" enctype="multipart/form-data">
<table >
<tr>
   <td class="cabecalho">Azione :</td>
    <td class="preencher">
    <select type="text" name="Azione" id="azione" class="azione"style="width:150px">
    <option value=""> Selezione </option>
    
    <option value="SPENTO GOBAT" >Spento gobat</option>
    <option value="ACCESO GOBAT" >Acceso gobat</option>
    </select>
    </td>
</tr>



<tr>
   <td class="cabecalho">Data:</td>
   <td class="preencher"><input type="date" name="data" id="data" class="date" style="width:150px">
       <script>
               var date = new Date();
               var currentDate = date.toISOString().substring(0 , 10);
               document.querySelector('.date').value = currentDate;
       </script>
   </td>
</tr> 
<tr>
   <td class="cabecalho">Ore:</td>
   <td class="preencher"><input type="time" name="hora" id="hora" class="time" style="width:150px">
       <script>  
               var date = new Date();
               var currentTime = date.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });
               document.querySelector('.time').value = currentTime;
       </script>
   </td>
</tr> 
<tr>
    <td colspan="2" class="preencher"  > <h6>Commenti: </h6> </td>
</tr>

<tr>
    <td colspan="2"><textarea id="solucao" name="commenti" rows="2" cols="36" >
</textarea></td>
</tr>


<tr>
 <td colspan="2" ><div><input type="file" name="image"></div> </td> 
</tr>


<tr>
    <td colspan="2"><input type="submit" name="submit_temporale" id="submit_temporale" class="btn btn-info"> </td>
</tr>
</table>
 



</form>

 <div></div>   
  </body>
</html>
 


