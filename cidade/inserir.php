<?php
include '../conexao.php';

// recebendo dados do front end
$nome = $_REQUEST['nome'];
$estado = $_REQUEST['estado'];
$cep = $_REQUEST['cep'];

// echo "testando: $nome $cpf $senha";

$sql = "INSERT INTO estado(nome, estado, cep) VALUES ('$nome','$estado','$cep')";

// executar codigo sql
$resultado = mysqli_query($conexao, $sql);
header("location: ../estado.php");
?>