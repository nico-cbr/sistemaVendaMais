<div class="col-md-3 menu bg-dark">
        <div class="d-flex flex-column flex-shrink-0 p-2 text-white " style="width: 280px;">
          <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-1" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-5">Bem-vindo(a) <?php echo $_SESSION['usuario'] ?></span>
          </a>
          <hr class="">
          <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
              <a href="./principal.php" class="nav-link text-white" aria-current="page">
                <i class="bi bi-person"></i>
                Inicio
              </a>
            </li>
            <li>
              <a href="./cidade.php" class="nav-link text-white  me-1">
                <i class="bi bi-buildings"></i>
                Cidade
              </a>
            </li>
            <li>
              <a href="./cliente.php" class="nav-link text-white me-1">
                <i class="bi bi-people"></i>
                Cliente
              </a>
            </li>
            <li>
              <a href="./funcionario.php" class="nav-link text-white me-1">
                <i class="bi bi-person-badge"></i>
                funcionário
              </a>
            </li>
            <li>
              <a href="./produtos.php" class="nav-link text-white me-1">
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