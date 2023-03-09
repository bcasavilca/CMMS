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
    <script src="meteo.js"></script>
<style>
    
 
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
.select{
    width: 150px;
}
.100-241{
    width: 150px;
}
.input{
    width: 145px;
}
.cabecalho{
    width: 150px;
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
        padding-left:10px;
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
	<title>manutenzione degli impiante</title>
</head>
<body>
<!--   
<div class="menu">
<a href="https://spirano-it.000webhostapp.com/index.php"><button class="intervento active" >Intervento</button></a>
<a href="https://spirano-it.000webhostapp.com/historic.php"><button class="storico">Storico</button></a>
<a href="https://spirano-it.000webhostapp.com/deposito.php"><button class="deposito">Deposito</button></a>
</div>-->

<div class="conteudo_intervento">
    
    
    
<di>
<a href="https://www.exemplo.com/processo1">Processo 1</a></br>
<p style="width:300px; white-space:pre-line">
Requisiti:

1.Il sensore di prossimità non deve essere completamente superato.
2.Deve essere online.
3.Può essere nello stato 10, 9 o 8.

Passaggi in SCADA:

1.Essere online: significa che alla fine del riferimento riceverà la posizione attuale dello SmartServer e riceverà un comando per adattarsi alla posizione.

2.Chiedere il riferimento: il SCADA invia un datapoint allo SmartServer, che cerca di eseguire il comando.

3.Attendere: ci vogliono da 10 a 15 minuti per l'inizio.


</p>


<a href="https://www.exemplo.com/processo2">Processo 2</a></br>
<a href="https://www.exemplo.com/processo3">Processo 3</a></br>
</di>




  
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