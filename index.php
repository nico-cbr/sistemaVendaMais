<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Venda+</title>
  <link rel="stylesheet" href="./recursos/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="./recursos/particle.css">
</head>

<body>

  <div class="painel p-5">
    <h3>Login</h3>
    <form>
      <div class="form-group mt-3">
        <label>CPF</label>
        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Digite seu CPF">
      </div>
      <div class="form-group mt-1">
        <label>Senha</label>
        <input type="password" class="form-control" placeholder="Digite sua senha">
      </div>
      <button type="submit" class="btn btn-secondary mt-3">
        <a href="./principal.php">Entrar</a>
      </button>
      <button type="reset" class="btn btn-danger mt-3">Limpar</button>
    </form>
  </div>

  <div id="particles-js"></div>
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
  <script src="./recursos/particle.js"></script>
  <script src="./recursos/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>