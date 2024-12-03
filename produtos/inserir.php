<?php
include '../conexao.php';

// recebendo dados do front end
$nome = $_REQUEST['nome'];
$preco = $_REQUEST['preco'];
$estoque = $_REQUEST['estoque'];
$custo = $_REQUEST['custo'];
$lucro = $_REQUEST['lucro'];
$margem = $_REQUEST['margem'];

// echo "testando: $nome $preco $senha";

$sql = "INSERT INTO produto(nome, preco, estoque, custo, lucro, margem) VALUES ('$nome','$preco', '$estoque', '$custo', '$lucro', '$margem')";

// executar codigo sql
$resultado = mysqli_query($conexao, $sql);
header("location: ../produtos.php");
?>