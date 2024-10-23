<?php
include '../conexao.php';

// recebendo dados do front end
$nome = $_REQUEST['nome'];
$cep = $_REQUEST['cep'];
$estado = $_REQUEST['estado'];

// echo "testando: $nome $cpf $senha";

$sql = "INSERT INTO cidade(nome, cep, estado) VALUES ('$nome','$cep','$estado')";

// executar codigo sql
$resultado = mysqli_query($conexao, $sql);
header("location: ../cidade.php");
?>