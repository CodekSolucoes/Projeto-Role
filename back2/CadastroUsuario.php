<?php
    require_once 'Conexao.php';
    
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    echo 'oi';
    var_dump($_POST);

