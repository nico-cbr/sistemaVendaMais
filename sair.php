<?php

session_start();
// destruir sessão
session_destroy();
unset($_SESSION['cpf']);
unset($_SESSION['senha']);

// manda para o login
header('location: index.php');
?>