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
  header('Location: magazzino.php');
exit;
  // Crie uma consulta SQL para recuperar todos os registros
  $sql = "SELECT * FROM tabela ORDER BY chave DESC";
  $result = $conn->query($sql);

  // Exiba a tabela com todos os registros
  echo "<table class=tabela >";

?>