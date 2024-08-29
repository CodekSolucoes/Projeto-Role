<?php session_start() ?>
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
            <h2>Bem-vindo ao Role</h2>
        </div>
        <span style="color:green;">
                <?php
                    if(isset($_SESSION['cadastro_sucesso'])){
                        echo $_SESSION['cadastro_sucesso'];
                        unset($_SESSION['cadastro_sucesso']);
                    }
                ?>
            </span>
        <form action="back2/login.php" method="POST">
            <div class="box-user">
                <input type="text" name="email" id="email" value='<?php echo $_SESSION['email'] ? $_SESSION['email'] : ''?>' required>
                <label for="email">e-mail</label>
            </div>
            <div class="box-user">
                <input type="password" name="password" id="password" required>
                <label for="password">Senha</label>
            </div>
            <span style="color:red;">
                <?php
                    if(isset($_SESSION['login_error'])){
                        echo $_SESSION['login_error'];
                        unset($_SESSION['login_error']);
                    }
                ?>
            </span>
            <a href="#" class="forget">Esqueceu a senha?</a>
            <button type="submit" class="button login-button">Entrar</button>
            <div class="divider">
                <span>ou</span>
            </div>
            <div class="social-buttons">
                <button type="button" class="google-button"><img src="images/google.svg" alt="google">  Continuar com Google</button>
                <button type="button" class="facebook-button"><img src="images/facebook.svg" alt="google">  Continuar com Facebook</button>
            </div>
        </form>
    </div>
</body>
</html>