<?php

    require_once"conexao.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $cidade = $_POST["cidade"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $hashed_password = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios (nome, cidade, email, senha) VALUES (?, ?, ?, ?)";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssss", $nome, $cidade, $email, $hashed_password); 

        if ($stmt->execute()) {
            echo "Usuário cadastrado com sucesso";
            header("Location: login.php");
        } else {
            echo "Erro: " . $sql . "<br>" . $conexao->error;
            
        }
        $stmt->close();
    }
    $conexao->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style-cadastro.css">
    <link rel="stylesheet" href="media-query-cadastro.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <title>Cadastro</title>
</head>
<body>
    <main>
        <section id="login">
            <div id="imagem">

            </div>
            <div id="formulario">
                <h1>Cadastro</h1>
                <p id="welcome"><strong>Seja bem-vindo(a). Faça seu cadastro abaixo:.</strong></p>
                <form action="cadastro.php" method="post" autocomplete="on">
                    <div class="campo">
                        <span class="material-symbols-outlined">person</span>
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="inome" placeholder="Seu nome completo" required autocomplete="name" maxlength="30">
                    </div>
                    <div class="campo">
                        <span class="material-symbols-outlined">location_city</span>
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="icidade" required autocomplete="address-level1" placeholder="Digite o nome completo da sua cidade" minlength="4" maxlength="30">
                    </div>
                    <div class="campo">
                        <span class="material-symbols-outlined">mail</span>
                        <input type="email" name="email" id="iloginc" placeholder="Seu e-mail" autocomplete="email" required maxlength="30">
                        <label for="login">E-mail</label>
                    </div>
                    <div class="campo">
                        <span class="material-symbols-outlined">lock</span>
                        <input type="password" name="senha" id="isenhac" placeholder="Sua senha" autocomplete="current-password" required maxlength="20">
                        <label for="senha">Senha</label>
                    </div>
                    
                    <input type="submit" value="Cadastrar">

                    <a class="botao" href="login.php">Login <span class="material-symbols-outlined">person</span></a>

                </form>
            </div>
        </section>
    </main>
</body>
</html>