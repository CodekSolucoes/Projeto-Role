<?php
    require_once 'Conexao.php';
    require_once 'Models/Usuario.php';
    require_once 'Controllers/UsuarioController.php';

    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $errors=[];
    
    if($user == '' || $email == '' || $password == ''){
        $errors['campos'] = "Preencha todos os campos do formulário";
        $_SESSION['errors'] = $errors;
        header("Location: ../cadastro.php");
    }

    if($password != $confirm_password){
        $errors['confirm'] = "Senhas não batem, digite a mesma senha nos campos";
        $_SESSION['errors'] = $errors;
        header("Location: ../cadastro.php");
        exit();
    }

    $user = new Usuario(NULL, $user, $email, $password);
    $controller = new UsuarioController($pdo);
    $controller->save($user);
    $_SESSION['cadastro_sucesso'] = 'Usuário dadastrado com sucesso, faça o login';
    $_SESSION['email'] = $email;
    header("Location: ../tela_login.php");
    exit();

