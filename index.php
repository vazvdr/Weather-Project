<?php

if(!isset($_GET['deslogar'])){

	$_GET['deslogar']='FALSE';

	//$converted_res = $res ? 'true' : 'false';
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media-query.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
	<title>Login Page</title>
</head>

<body>
	<main>
		<section id="login">
			<div id="imagem"></div>
            <div id="formulario">
                <h1>Login</h1>
                <p id="welcome">Seja bem-vindo(a). Faça login e veja as atualizações climáticas mais recentes.</p>
				<form action=<?php echo "validate.php?deslogar=" .$_GET["deslogar"] ?> method="post">
					<div id="imagem"></div>

						<div class="campo">
							<span class="material-symbols-outlined">login</span>
							<i class="fa fa-user" aria-hidden="true"></i>
							<input type="text" placeholder="Username"
									name="username" value="" required>
						</div>

						<div class="campo">
							<span class="material-symbols-outlined">lock</span>
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input type="password" placeholder="Password"
									name="senha" value="" required> 
						</div>

						<input class="button" type="submit"
								name="login" value="Sign In">
						
						<p id="formatacao"><strong>Novo aqui? Cadastre-se no botão abaixo:</strong></p>
						<a href="cadastro.php" class="botao">Cadastre-se <span class="material-symbols-outlined">passkey</span></a>
					 
				</form>
			</div>
        </section>
    </main>
</body>


</html>
