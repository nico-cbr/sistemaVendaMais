<?php
// add produto
  if($_SERVER['REQUEST_METHOD']=== 'POST' && isset($_POST['produto'])){
    // add produto diretamente à tabela item_venda
    $produtoId= $_POST['produto'];
    $quantidade =$_POST['quantidade'];

    // buscar preço do produto
    $resultado = $conexao->query("SELECT preco, estoque FROM produto WHERE id=$produtoId");
    $produto = $resultado-> fetch_assoc();
    $preco = $produto['preco'];
    $estoqueAtual = $produto['estoque'];

    // atualizar o estoque do produto 
    $novoEstoque = $estoqueAtual - $quantidade;
    $conexao->query("UPDATE produto SET estoque = $novoEstoque WHERE id=$produtoId");

    // inserir o produto na tabela item_venda
    $conexao->query("INSERT INTO item_venda(venda_id, produto_id, quantidade, valor) VALUES ($idVenda, $produtoId, $quantidade, $preco)");

    header("Location: ./venda.php?idVenda=$idVenda");
  }