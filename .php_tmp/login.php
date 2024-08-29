<?php
require_once 'Conexao.php';
require_once 'Controllers/UsuarioController.php';

$email = $_POST['email'];
$senha = $_POST['password'];

if(UsuarioController::login($email, $senha, $pdo)){
    header("Location: ../caronaaventura.html");
    exit();
}
else{
    $_SESSION['login_error'] = 'Email ou senha inválido';
    header("Location: ../tela_login.php");
    exit();
}