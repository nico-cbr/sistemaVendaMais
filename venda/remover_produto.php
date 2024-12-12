<?php
include '../conexao.php';

$idVenda = $_REQUEST['idVenda'];
$idItem = $_REQUEST['idItem'];
$qtd = $_REQUEST['qtd'];
$idProd = $_REQUEST['idProd'];

// att estoque produto, estornar, voltar
$sqlNovoEstoque = "UPDATE produto SET estoque = estoque + $qtd WHERE id = '$idProd'";

// excluir item venda

$sql = "DELETE FROM item_venda WHERE id='$idItem'";
$resultado = mysqli_query($conexao, $sql);

header("Location: ../venda.php?idVenda=$idVenda");