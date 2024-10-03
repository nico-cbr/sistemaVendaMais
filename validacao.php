<?php
// iniciar sessão
session_start();

// verificar se tem variavel sessão cpf e senha
if (!isset($_SESSION["cpf"]) or !isset($_SESSION["senha"])){
  // destrui sessão
  session_destroy();
  // limpar sessão
  unset($_SESSION["cpf"]);
  unset($_SESSION["senha"]);
  header("location: index.php");
}
?>