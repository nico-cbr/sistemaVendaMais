<?php
// Importando arquivo de conexão com o banco
  include 'conexao.php';

// Recebendo dados da tela de login (front-end)
  $cpf = $_REQUEST['cpf'];
  $senha = $_REQUEST['senha'];

  // echo "Olá seu cpf: $cpf e senha $senha";

  // selecione o usuario que possui o cpf e a senha incluido no login
  $sql = "SELECT * FROM usuario WHERE cpf='$cpf' AND senha='$senha' ";

  // executa codigo sql com a permissao da conexao 
  $resultado = mysqli_query($conexao, $sql);

  // cada valor associdado ao nome da coluna no banco
  $colunas = mysqli_fetch_assoc($resultado);

  if (mysqli_num_rows($resultado) > 0) {
    echo "Login efetuado com sucesso";
  }else{
    echo "Login não efetuado";
  }
?>
