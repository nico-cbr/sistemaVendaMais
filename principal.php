<?php include "validacao.php";
  include "conexao.php";

  // destino do formulário para inserir por padrao
  $destino = './usuario/inserir.php';

  // se idAlt for diferente de vazio - se existir idAlt
  if(!empty($_GET['idAlt'])){
    // guarda na variavel $id o valor da pessoa clicado no lápis da tabela
    $id = $_GET['idAlt'];
// busca o usuario do idaAlt
   $sql = "SELECT * FROM usuario WHERE id='$id'";
  //  executa o comando
   $dados = mysqli_query($conexao,$sql);
  //  variavel com nosso dados
  $dadosAlt = mysqli_fetch_assoc($dados);

  $destino = './usuario/alterar.php';
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
</head>

<body>

  <!-- Barra de navegação -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fa-brands fa-cloudscale"></i> Venda+</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
              aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <a class="btn btn-outline-secondary"><i class="bi bi-search"></i></a>
          <a class="btn btn-outline-danger ms-2" href="./sair.php"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
        </form>
      </div>
    </div>
  </nav>

  <!-- Corpo do site -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 menu bg-dark">
        <div class="d-flex flex-column flex-shrink-0 p-2 text-white " style="width: 280px;">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-1" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-5">Bem-vindo(a) <?php echo $_SESSION['usuario'] ?></span>
          </a>
          <hr class="">
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="#" class="nav-link text-white" aria-current="page">
                <i class="bi bi-person"></i>
                Usuário
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white me-1">
                <i class="bi bi-buildings"></i>
                Cidade
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white me-1">
                <i class="bi bi-people"></i>
                Cliente
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white me-1">
                <i class="bi bi-person-badge"></i>
                funcionário
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white me-1">
                <i class="bi bi-box-seam"></i>
                
                Produtos
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white me-3">
                <i class="bi bi-wallet2"></i>
                Venda
              </a>
            </li>
          </ul>
          <hr>
          <div class="dropdown fixed-bottom mb-3 ms-3">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong><?php echo $_SESSION['usuario'] ?></strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
              <li><a class="dropdown-item" href="#">New project...</a></li>
              <li><a class="dropdown-item" href="#">Settings</a></li>
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item btn btn-outline-danger" href="./sair.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Sair</a></li>
            </ul>
          </div>
        </div>
      </div>
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
                <label class="painel-label-texto">CPF</label>
                <input name="cpf" value="<?php echo isset($dadosAlt) ? $dadosAlt['cpf'] : '' ?>" type="text" class="form-control cpf" placeholder="Digite seu CPF." required>
              </div>
              <div class="form-group mt-1">
                <label>Senha</label>
                <input name="senha" value="<?php echo isset($dadosAlt) ? $dadosAlt['senha'] : '' ?>" type="password" class="form-control" placeholder="Digite sua senha." required>
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
                  <th scope="col">CPF</th>
                  <th scope="col">Opções</th>
                </tr>
              </thead>
              <tbody>
              <?php
                              //SQL para selecionar todos os usuários
                              $sql = "SELECT * FROM usuario";
                              $resultado = mysqli_query($conexao, $sql);
                              //looping onde $coluna, vai representar os dados do banco
                              //a cada linha é uma registro diferente
                              while($coluna = mysqli_fetch_assoc( $resultado)){  ?>
                              <tr>
                                <th> <?php echo $coluna['id'] ?> </th>
                                <td> <?php echo $coluna['nome'] ?> </td>
                                <td> <?php echo $coluna['cpf'] ?> </td>
                                <td> 
                                  <a href="principal.php?idAlt=<?= $coluna['id'] ?>"> <i class="fa-solid fa-pen-to-square mr-3" style="color: green;"></i></a>
                                  <a href="<?php echo './usuario/excluir.php?id='.$coluna['id'] ?>">
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