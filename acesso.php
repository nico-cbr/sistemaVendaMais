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
    // echo "Login efetuado com sucesso";
    // inicia sessão
    session_start();
    $_SESSION["usuario"] = $colunas["nome"];
    $_SESSION['cpf'] = $cpf;
    $_SESSION['senha'] = $senha;

    // direcionar para pagina principal
    header('location: principal.php');
  }else{
    // echo "Login não efetuado";
    session_unset();
    session_destroy();
    header('location: index.php');
  }
?>
