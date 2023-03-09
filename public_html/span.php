<?php

$valor = $_GET['valor'] ?? '';

// Conexão com o banco de dados
$Servidor="localhost";
$Usuario="id20124781_tabela";
$Senha="$8Mariaebruno";
$banco="id20124781_cadastro";

$conexao=mysqli_connect($Servidor,$Usuario,$Senha,$banco);

if (mysqli_connect_errno()) {
  echo "Falha ao conectar ao banco de dados: " . mysqli_connect_error();
  exit();
}

// Query SQL de inserção
$sql = "INSERT INTO test (manutenzione) VALUES ('$valor')";

if (mysqli_query($conexao, $sql)) {
  echo "Valor inserido com sucesso no banco de dados!";
} else {
  echo "Erro ao inserir valor no banco de dados: " . mysqli_error($conexao);
}

mysqli_close($conexao);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Site com input select</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h1>Selecione uma opção:</h1>
    <select id="opcoes">
      <option value="sim segue o sol">sim segue o sol</option>
      <option value="nao segue o sol ">nao segue o sol </option>
    </select>
    <div>
      <span id="resultado"></span>
    </div>
    <input type="submit" name="submit" id="submit" class="btn btn-info">
    

    
    
    
    <script>
      const opcoes = document.getElementById('opcoes');
      const resultado = document.getElementById('resultado');
      const salvar = document.getElementById('submit');

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
        xhttp.open("POST", `span.php?valor=${valor}`, true);
        xhttp.send();
      }

    </script>
  </body>
</html>
