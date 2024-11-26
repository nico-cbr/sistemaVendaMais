<?php
include '../conexao.php';

// recebendo dados do front end
$nome = $_REQUEST['nome'];
$cpf = $_REQUEST['cpf'];
$celular = $_REQUEST['celular'];
$endereco = $_REQUEST['endereco'];
$numero = $_REQUEST['numero'];
$bairro = $_REQUEST['bairro'];
$email = $_REQUEST['email'];
$cidade = $_REQUEST['cidade'];

// echo "testando: $nome $cpf $senha";

$sql = "INSERT INTO cliente(nome, cpf, celular, endereco, numero, bairro, email, cidade_id) VALUES ('$nome','$cpf', '$celular', '$endereco', '$numero', '$bairro', '$email', '$cidade')";

// executar codigo sql
$resultado = mysqli_query($conexao, $sql);
header("location: ../cliente.php");
?>