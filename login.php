<?php 
require_once "login2.php"; 
require_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media-query.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <title>Login</title>
</head>
<body>
    <main>
        <section id="login">
            <div id="imagem"></div>
            <div id="formulario">
                <h1>Login</h1>
                <p id="welcome">Seja bem-vindo(a). Faça login e veja as atualizações climáticas mais recentes.</p>
                <form action="inicio.php" method="post" autocomplete="on">
                    <div class="campo">
                        <span class="material-symbols-outlined">login</span>
                        <input type="email" name="login" id="ilogin" placeholder="Digite seu email" autocomplete="email" required maxlength="30">
                        <label for="ilogin"><strong>Login</strong></label>
                    </div>
                    <div class="campo" >
                        <span class="material-symbols-outlined">lock</span>
                        <input type="password" name="senha" id="isenha" placeholder="Sua senha" autocomplete="current-password" required maxlength="20">
                        <label for="isenha">Senha</label>
                    </div>
                    <input type="submit" name="entrar" value="Entrar">
                    <p id="formatacao"><strong>Novo aqui? Cadastre-se no botão abaixo:</strong></p>
                    <a href="cadastro.php" class="botao">Cadastre-se <span class="material-symbols-outlined">passkey</span></a>

                </form>
                <?php if(isset($_POST['entrar'])){
                    login($conexao);
                }
                ?>
            </div>
        </section>
    </main>
</body>
</html>