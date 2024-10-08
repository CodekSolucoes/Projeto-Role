<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="login-container">
        <div class="cabecalho">
            <a href="index.html"><img src="images/arrow-left.svg" alt="Arrow"></a>
            <h2>Cadastro usuário</h2>
        </div>
        <form action="back2/CadastroUsuario.php" method="POST">
            <div class="box-user">
                <input type="text" name="user" id="user" required>
                <label for="user"> Usuário</label>
            </div>
            <div class="box-user">
                <input type="text" name="email" id="email" required>
                <label for="email">Email</label>
            </div>
            <div class="box-user">
                <input type="password" name="password" id="password" required>
                <label for="password">Senha</label>
            </div>
            <div class="box-user">
                <input type="password" name="confirm_password" id="confirm_password" required>
                <label for="confirm_password">Confirmar senha</label>
            </div>
            <span style="color:red">
            <?php 
                if(isset($_SESSION['errors'])){ 
                    echo $_SESSION['errors']['confirm'];
                    unset($_SESSION['errors']['confirm']);
                } 
            ?>
        </span>
            <button type="submit" class="button login-button">Cadastrar</button>
        </form>
        
    </div>
</body>
</html>