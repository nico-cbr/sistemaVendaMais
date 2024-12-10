<?php
  include 'conexao.php';
  include 'validacao.php';
  

  // caso ja exsita um id venda
  if (!empty($_GET['idVEnda'])) {
    $idVenda = $_GET['idVenda'];
  } else {
    // crinar nova venda
    $conexao->query("INSERT INTO venda (data_venda) VALUES(NOW())");
    // onbter id da nova venda
    $idVenda = $conexao->insert_id;
  }

include './venda/adicionarProduto.php';
include './venda/atualizarTabela.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Venda - Sistema Venda+</title>
  <link rel="stylesheet" href="./recursos/venda.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="shortcut icon" href="./recursos/icon.svg" type="imagex/svg">
</head>

<body>
  <div class="container p-5">
    <h3>Tela de venda</h3>

    <div class="row">
      <div class="col-md-8">
        <form action="" method="POST">

          <div class="row mt-2">

            <div class="form-group col-md-6">
              <label for="">Produto</label>
              <select class="form-control">
                <?Php
                  $resultado = $conexao->query("SELECT id, nome, preco, estoque from produto");
                  while($coluna = $resultado->fetch_assoc()){
                    echo "<option value='{$coluna['id']}'> {$coluna['nome']} - Estoque: {$coluna['estoque']} - Valor: {$coluna['preco']} </option>";
                  }
                ?>
              </select>
            </div>

            <div class="form-group col">
              <label for="">Quantidade</label>
              <input type="number" name="quantidade" required class="form-control">
            </div>
            <div class="col">
              <button type="submit" class="btn btn-success" style="margin-top: 32px;"><i
                  class="fa-solid fa-plus"></i></button>
            </div>

            <table class="table mt-4 table-striped table-hover table-bordered table-sm table-responsive-xl">
              <thead>
                <th class="col-6">Produto</th>
                <th class="col-1">Quantidade</th>
                <th class="col-2">Valor</th>
                <th class="col-2">Total</th>
                <th class="col-1">Opções</th>
              <tbody>
                <?php 
                  $itensVenda->data_seek(offset:0);
                  while($item = $itensVenda->fetch_assoc()){
                    
                    
                    ?>
                  <tr>
                  <td> <?php $item['nome'] ?> </td>
                  <td> <?php $item['quantidade'] ?> </td>
                  <td> <?php $item['valor'] ?> </td>
                  <td>  <?php $item['quantidade'] * $item['valor']?> </td>
                  <td><a href=""><i class="fa-solid fa-circle-minus" style="color: red;"></i></a></td>
                </tr>
                <?php } ?>
              </tbody>
              </thead>
            </table>

          </div>
        </form>
      </div>

      <div class="col-md-4">
        <h3>Resumo da venda</h3>

        <form action="" method="post">
          <div class="form-group">
            <label>Cliente</label>
            <select class="form-control">
              <option>João</option>
              <option>Aline</option>
            </select>
          </div>

          <div class="form-group">
            <label>Funcionário</label>
            <select class="form-control">
              <option>Adalberto</option>
              <option>Amanda</option>
            </select>
          </div>

          <div class="form-group">
            <label>Quantidade total</label>
            <input type="text" class="form-control" value="2" readonly>
          </div>

          <div class="form-group">
            <label>Valor total</label>
            <input type="text" class="form-control" value="R$40.00" readonly>
          </div>

          <div class="form-group">
            <label for="">Observação</label>
            <textarea class="form-control" placeholder="Digite aqui"></textarea>
          </div>

          <a href="" class="btn btn-outline-success">Finalizar</a>
          <a href="" class="btn btn-outline-danger">Cancelar</a>

        </form>

      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
</body>

</html>