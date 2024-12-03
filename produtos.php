<?php include "validacao.php";
  include "conexao.php";

  // destino do formulário para inserir por padrao
  $destino = './produtos/inserir.php';

  // se idAlt for diferente de vazio - se existir idAlt
  if(!empty($_GET['idAlt'])){
    // guarda na variavel $id o valor da pessoa clicado no lápis da tabela
    $id = $_GET['idAlt'];
// busca o produto do idaAlt
   $sql = "SELECT * FROM produto WHERE id='$id'";
  //  executa o comando
   $dados = mysqli_query($conexao,$sql);
  //  variavel com nosso dados
  $dadosAlt = mysqli_fetch_assoc($dados);

  $destino = './produtos/alterar.php';
  }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Início - Sistema Venda+</title>
  <link rel="stylesheet" href="./recursos/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css" />
    <link rel="shortcut icon" href="./recursos/icon.svg" type="imagex/svg">
</head>

<body>

<?php include './componentes/menuSuperior.php' ?>
  <!-- Corpo do site -->

  <div class="container-fluid">
    <div class="row">
    <?php include './componentes/menuLateral.php' ?>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md card p-3">
            <h3>Cadastro</h3>
            <form action="<?=$destino?>" method="post">
              <div class="form-group">
                  <label>ID</label>
                  <input name="id" value="<?php echo isset($dadosAlt) ? $dadosAlt['id'] : '' ?>" type="text" class="form-control" placeholder="Seu id" readonly>
                </div>

              <div class="form-group">
                  <label>Nome</label>
                  <input name="nome" value="<?php echo isset($dadosAlt) ? $dadosAlt['nome'] : '' ?>" type="text" class="form-control" placeholder="Digite seu nome." required>
                </div>

              <div class="form-group">
                <label class="painel-label-texto">Preço</label>
                <input name="preco" value="<?php echo isset($dadosAlt) ? $dadosAlt['preco'] : '' ?>" type="text" class="form-control" placeholder="Digite o preço." required>
              </div>

              <div class="form-group mt-1">
                <label>Estoque</label>
                <input name="estoque" value="<?php echo isset($dadosAlt) ? $dadosAlt['estoque'] : '' ?>" type="text" class="form-control " placeholder="Digite o número no estoque." required>
              </div>
              
              <div class="form-group mt-1">
                <label>Custo</label>
                <input name="custo" value="<?php echo isset($dadosAlt) ? $dadosAlt['custo'] : '' ?>" type="text" class="form-control" placeholder="Digite o custo." required>
              </div>

              <div class="form-group mt-1">
                <label>Lucro</label>
                <input name="lucro" value="<?php echo isset($dadosAlt) ? $dadosAlt['lucro'] : '' ?>" type="text" class="form-control" placeholder="Digite o lucro." required>
              </div>

              <div class="form-group mt-1">
                <label>Margem</label>
                <input name="margem" value="<?php echo isset($dadosAlt) ? $dadosAlt['margem'] : '' ?>" type="text" class="form-control" placeholder="Digite o margem." required>
              </div>

              <button type="submit" class="btn btn-secondary mt-3">Cadastrar</button>
              <button type="reset" class="btn btn-danger mt-3">Limpar</button>
            </form>
          </div>
          <div class="col-md card p-3">
            <h3>Listagem</h3>
            <table class="table table-striped" id="tabela">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                  <th scope="col">preco</th>
                  <th scope="col">Opções</th>
                </tr>
              </thead>
              <tbody>
              <?php
                              //SQL para selecionar todos os usuários
                              $sql = "SELECT * FROM produto";
                              $resultado = mysqli_query($conexao, $sql);
                              //looping onde $coluna, vai representar os dados do banco
                              //a cada linha é uma registro diferente
                              while($coluna = mysqli_fetch_assoc( $resultado)){  ?>
                              <tr>
                                <th> <?php echo $coluna['id'] ?> </th>
                                <td> <?php echo $coluna['nome'] ?> </td>
                                <td> <?php echo $coluna['preco'] ?> </td>
                                <td> 
                                  <a href="produtos.php?idAlt=<?= $coluna['id'] ?>"> <i class="fa-solid fa-pen-to-square mr-3" style="color: green;"></i></a>
                                  <a href="<?php echo './produtos/excluir.php?id='.$coluna['id'] ?>">
                                    <i class="fa-solid fa-trash-can" style="color: red;"></i>
                                  </a>
                                </td>
                              </tr>
 <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.js" integrity="sha512-+k1pnlgt4F1H8L7t3z95o3/KO+o78INEcXTbnoJQ/F2VqDVhWoaiVml/OEHv9HsVgxUaVW+IbiZPUJQfF/YxZw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="./recursos/script.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"></script>
</body>

</html>