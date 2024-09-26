<?php
  include 'conexao.php';

  $cpf = $_REQUEST['cpf'];
  $senha = $_REQUEST['senha'];
  echo "Olá seu cpf: $cpf e senha $senha";
?>
