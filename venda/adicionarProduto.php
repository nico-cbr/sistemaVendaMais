<?php
// add produto
  if($_SERVER['REQUEST_METHOD']=== 'POST' && isset($_POST['produto'])){
    // add produto diretamente à tabela item_venda
    $produtoId= $_POST['produto'];
    $quantidade =$_POST['quantidade'];

    // buscar preço do produto
    $resultado = $conexao->query("SELECT preco, estoque FROM produtos WHERE id=$produtoId");
    $produtoId = $resultado-> fetch_assoc();
    $preco = $produto['preco'];
  }