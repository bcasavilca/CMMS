<!DOCTYPE html>
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
	/* Estilos para o menu à esquerda*/
		nav {
			background-color: white;
			
			
			padding: 10px;
			width: 100px;
			height:600px;
			float: left;
		}
		nav ul {
			margin-top: 100px;
			padding: 0;
			list-style: none;
		}
		nav li {
			margin-bottom: 5px;
		}
		nav a {
			display: block;
			padding: 5px;
			text-decoration: none;
			color: #333;
			font-weight: bold;
			border-radius: 3px;
			transition: background-color 0.2s ease-in-out;
		}
		nav a:hover {
			background-color: #ccc;
		}
		/* Estilos para o conteúdo principal */
		main {
			margin-left: 120px;
			padding: 20px;
		}
		h1 {
			margin-top: 0;
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
   
<div class="menu">
<a href="https://spirano-it.000webhostapp.com/index.php"><button class="intervento active" >Intervento</button></a>
<a href="https://spirano-it.000webhostapp.com/historic.php"><button class="storico">Storico</button></a>
<a href="https://spirano-it.000webhostapp.com/deposito.php"><button class="deposito">Deposito</button></a>
</div>

<div class="conteudo_intervento"><html>

	    

</head>
<body>
	<nav>
		<ul>
			<li><a href="processo1.php">Processo 1</a></li>
			<li><a href="processo2.php">Processo 2</a></li>
			<li><a href="#">Processo 3</a></li>
			<li><a href="#">Processo 4</a></li>
			<li><a href="#">Processo 5</a></li>
		    <li><a href="">Errore 1</a></li>
			<li><a href="">Errore 2</a></li>
			<li><a href="#">Errore 3</a></li>
			<li><a href="#">Errore 4</a></li>
			<li><a href="#">Errore 5</a></li>
		</ul>
	</nav>
	<main>
		<h1>Processo 1</h1>
<fieldset style="width:300px; white-space:pre-line"><legend>Requisiti:</legend>
1.Il sensore di prossimità non deve essere completamente superato.
2.Deve essere online.
3.Può essere nello STS 10, 9 o 8.

</fieldset>


<fieldset style="width:300px; white-space:pre-line"><legend>Passaggi in SCADA: </legend>
1.Essere online: significa che alla fine del riferimento riceverà la posizione attuale dello SmartServer e riceverà un comando per adattarsi alla posizione.

2.Chiedere il riferimento: il SCADA invia un datapoint allo SmartServer, che cerca di eseguire il comando.

3.Attendere: ci vogliono da 10 a 15 minuti per l'inizio.

</fieldset>


	</main>
</body>
</html>