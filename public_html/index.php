<?php
// Conecte-se ao banco de dados
include_once("connection.php");

// Recupere o termo de pesquisa do formulário

?><!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- jquery -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="meteo.js"></script>

	<title>manutenzione degli impiante</title>
</head>
<body>
   
<div class="menu">
<a href="https://spirano-it.000webhostapp.com/index.php"><button class="intervento active" >Intervento</button></a>
<a href="https://spirano-it.000webhostapp.com/historic.php"><button class="storico">Storico</button></a>
<a href="https://spirano-it.000webhostapp.com/deposito.php"><button class="deposito">Deposito</button></a>
</div>

<div class="blue-div">
    <div id="weather-results" class="meteo" defer></div>
    </div>
    

<div class="conteudo_intervento">
  
<form class="form" id="form" action="mail.php" method="post" enctype="multipart/form-data">

<fieldset style="width:300px"> <legend>Descrizione del errore</legend>
<table >
   <tr>
   <td class="cabecalho">Girassole:</td>
   <td class="preencher"><select class="select" name="id" id="id">
  <option value="selezione">Selezione</option>

  <?php
  $sql = "SELECT girasole, Stringbox FROM girasole";
  $resultado = mysqli_query($conexao, $sql);
  
  while ($linha = mysqli_fetch_assoc($resultado)): 
     
  
  ?>
    <option value="<?php echo $linha['girasole']; ?>"><?php echo $linha['girasole']; ?></option>
    
    
<?php endwhile; ?>
  
</select></td>
   </tr> 


<tr>
   <td class="cabecalho">Data:</td>
   <td class="preencher"><input type="date" name="data" id="data" class="input" value="<?php echo date('Y-m-d'); ?>" >
   </td>
</tr> 
<tr>
   <td class="cabecalho">Ore:</td>
   <td class="preencher"><input type="time" name="hora" id="hora" class="input" value="<?php echo date('H:i', strtotime('+1 hour')); ?>">
   </td>
</tr> 

    
<tr>
   <td class="cabecalho">Codice Status :</td>
    <td class="preencher">
    <select type="text" name="status" id="status" class="select"style="width:150px">
    <option value=""> Selezione </option>
    <option value="0"> Spento </option>
    <option value="8 - HOMING OK" >8 - HOMING OK</option>
    <option value="9 - AZ TIMEOUT" >9 - AZ TIMEOUT</option>
    <option value="10 - TL TIMEOUT ">10 - TL TIMEOUT </option>
    <option value="16">16 - </option>  
    <option value="521 - AZ TIMEOUT + FINECORSA ">521 - AZ TIMEOUT + FINECORSA </option>
    <option value="531">531 - </option>
    <option value="523">523 - </option>
    <option value="1032">1032 - </option>
    <option value="2056 - BYPASS">2056 - BYPASS</option>
    <option value="9224.0 - homing ok + outrange + power on">9224.0 - homing ok + outrange + power on</option>
    

    </select>
    </td>
</tr>
    
<tr>
   <td class="cabecalho">Colore :</td>
   <td class="preencher"><select type="text" name="cor" id="cor" class="select">
   <option value=""> Selezione </option>
   <option value="Spento" >Spento</option>
    <option value="Verde">Verde</option>
    <option value="Rosso">Rosso</option>
    <option value="Grigia">Grigia</option></td>
</tr>
 
<tr>
   <td class="cabecalho">Comunicazione :</td>
   <td class="preencher">
   <select type="text" name="comunicazione" id="comunicazione" class="select">
   <option value=""> Selezione </option>
   <option value="Spento" >Spento</option>
   <option value="Online" >Online</option>
   <option value="Offline" >Offline</option>
   </select>
   </td>
</tr>

<tr>
   <td class="cabecalho">Comando :</td>
   <td class="preencher">
   <select type="text" name="comando" id="comando" class="select">
   <option value=""> Selezione </option>
   <option value="Spento" >Spento</option>
   <option value="Started">Start</option>
   <option value="Stoped">Stop</option>
   </select>
   </td>
</tr>


<tr>
    <td class="cabecalho">Actual Position AZ:</td>
    <td class="preencher"><select class="100-241" type="number" name="actual_AZ" id="actual_AZ" value="selezione" style="width:150px"><option>Selezione</option><option>0</option>
    <?php
        for ($i=100; $i<=241; $i++) {
          echo "<option value='$i'>$i</option>";
        }?>
        </select>
    </td>
</tr>

<tr>
    <td  class="cabecalho">Actual Position TL</td>
    <td class="preencher"><select class="43-90" type="number" name="actual_TL" id="actual_TL" value="selezione" style="width:150px"><option>Selezione</option><option>0</option>
    <?php
        for ($i=43; $i<=90; $i++) {
          echo "<option value='$i'>$i</option>";
        }?></select>
    </td>
</tr>


<tr>
    <td class="cabecalho">Setpoint AZ:</td>
     <td class="preencher"><select class="100-241" type="number" name="setpoint_AZ" id="setpoint_AZ" value="selezione" style="width:150px"><option>Selezione</option><option>0</option>
     <?php
        for ($i=100; $i<=241; $i++) {
          echo "<option value='$i'>$i</option>";
        }?></select>
    </td>
</tr>
<tr>
    <td class="cabecalho">Setpoint TL:</td>
     <td class="preencher"><select class="43-90" type="number" name="setpoint_TL" id="setpoint_TL" value="selezione" style="width:150px"><option>Selezione</option><option>0</option>
        <?php
        for ($i=100; $i<=241; $i++) {
          echo "<option value='$i'>$i</option>";
        }?>
        </select>
    </td>
</tr> 
<tr>
   <td class="cabecalho">Asse :</td>
    <td class="preencher">
    <select type="text" name="asse" id="asse" class="asse"style="width:150px">
    <option value=""> Selezione </option>
    <option value="Tilt" >Tilt</option>
    <option value="Azimut" >Azimut</option>
    </select>
    </td>
</tr>
<tr>
   <td class="cabecalho">Segui il sole? :</td>
    <td class="select">
       <select type="text" id="opcoes" name="seguimento" class="select">
      <option value="si segui il sole">Si segui il sole</option>
      <option value="non segui il sole">Non segui il sole </option>
    </select>
    </td>
</tr>

<tr>
   <td class="cabecalho">Manutenzione :</td>
    <td class="preencher"><span id="resultado"></span>
    </td>
</tr>
<tr>
    <td colspan="2"><textarea style="width:100%" id="problema" name="problema" rows="2" cols="36" placeholder="Commenti">
</textarea></td>
</tr>

<tr>
 <td colspan="2" ><div><input type="file" name="image"  ></div> </td> 
</tr>
</table></fieldset>
<fieldset style="width:300px"> <legend>Descrizione del lavoro</legend><table>

<tr>
    <td colspan="2"><textarea style="width:100%" id="solucao" name="solucao" rows="2" cols="36"  placeholder="Descrizione">
</textarea></td>
</tr>
</table></fieldset>
<fieldset style="width:300px"> <legend>Conclusione</legend><table><table>
 
<tr>
   <td class="cabecalho">Risultato :</td>
   <td class="preencher">
   <select type="text" name="risultato_finale" id="comando" class="select">
   <option value=""> Selezione </option>
   <option value="Riparato - Servizo chiuso" >Riparato - Servizo chiuso</option>
   <option value="Non riparato - Servizo aperto">Non riparato - Servizo aperto</option>
   </select>
   </td>
</tr>
<tr>
   <td class="cabecalho">Data finale:</td>
   <td class="preencher"><input type="date" name="data_finale" id="data" class="input" value="<?php echo date('Y-m-d'); ?>" >
       
   </td>
</tr> 
<tr>
   <td class="cabecalho">Ore finale:</td>
   <td class="preencher"><input type="time" name="hora_finale" id="hora" class="input"  value="<?php echo date('H:i', strtotime('+1 hour')); ?>">
      
   </td>
</tr> 



<tr>
    <td colspan="2"><input type="submit" name="submit" id="submit" class="btn btn-info"> </td>
</tr>


</table></fieldset>
</form>
 </div>
</body>
</html>
 

<script type="text/javascript">
 
      const opcoes = document.getElementById('opcoes');
      const resultado = document.getElementById('resultado');
      const submit = document.getElementById('submit');

      opcoes.addEventListener('change', function() {
        const selecionado = this.value;
        if (selecionado === 'sim segue o sol') {
          resultado.textContent = 'Ordinaria';
        } else if (selecionado === 'nao segue o sol ') {
          resultado.textContent = 'Straordinaria';
        }
      });

      submit.addEventListener('click', function() {
        const resultadoValor = resultado.textContent;
        salvarNoBancoDeDados(resultadoValor);
      });

      function salvarNoBancoDeDados(valor) {
        const xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
          }
        };
        xhttp.open("POST", `mail.php?valor=${valor}`, true);
        xhttp.send();
      }
      
      
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
