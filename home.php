<?php

session_start();

include("validate.php");

if (!isset($_SESSION["usuario logado"])){
	header("location: index.php");
}

$dsn = 'mysql:host=localhost;dbname=cadastro-weather';
$usuario = "root";
$senha = "";
try{

    $conexao = new PDO ($dsn, $usuario, $senha);
    $select = 'SELECT * FROM (SELECT * FROM buscas ORDER BY id DESC LIMIT 8) AS last_eight_records
    ORDER BY id DESC';
    $stmt = $conexao->query($select);
    $cidades = $stmt->fetchAll(PDO::FETCH_OBJ);

} catch (PDOException $erro){
    echo 'ERRO:' .$e->getCode(). ' Mensagem: ' .$e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clima agora!</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css" />
    <script src="scripts.js" defer></script>
  </head>
  <body id="bodyInicial">
    <div id="button">
      <button class="buttons" onclick="summerMode()"><strong> Summer Mode</strong></button>
      <button class="buttons" onclick="snowMode()"><strong>Snow Mode</strong></button>
      <button class="buttons" onclick="CloudMode()"><strong>Cloud Mode</strong></button>
      <button class="buttons"><a href="logout.php"><strong>Logout</strong></a></button>
    </div>
    <div class="container" id="container">
      <div class="form">
        <h3>Confira o clima de uma cidade:</h3>
        <form action="historico.php" method="post">
        <div class="form-input-container">
        <label for="cidade"></label>        
        <input type="submit" placeholder="Digite o nome de uma cidade cidade" id="submitar" value="Salvar"/>            
        <input type="text" placeholder="Digite o nome da cidade" id="city-input" name="cidade" value="" />
            <button id="search">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
          </div>
      </div>
      <div id="weather-data" class="hide">
        <h2><i class="fa-solid fa-location-dot"></i> <span id="city"></span> <img id="country"></h2>
        <p id="temperature"><span></span>&deg;C</p>
        <div id="description-container">
          <p id="description"></p>
          <img id="weather-icon" src="" alt="Condições atuais">
        </div>
        <div id="details-container">
          <p id="umidity">
            <i class="fa-solid fa-droplet"></i> 
            <span></span>
          </p>
          <p id="wind">
            <i class="fa-solid fa-wind"></i>
            <span></span>
          </p>
        </div>
      </div>
      <div id="error-message" class="hide">
        <p>Não foi possível encontrar o clima de uma cidade com este nome.</p>
      </div>
      <div id="loader" class="hide">
        <i class="fa-solid fa-spinner"></i>
      </div>
      <div id="suggestions">
        <button id="rio de janeiro">Rio de Janeiro</button>
        <button id="sao paulo">São Paulo</button>
        <button id="curitiba">Curitiba</button>
        <button id="Bahia">Bahia</button>
        <button id="londres">Londres</button>
        <button id="frankfurt">Frankfurt</button>
        <button id="dublin">Dublin</button>
        <button id="california">California</button>
      </div>
      <div>
        <table id="tableInicial">
          <th>Cidades buscadas</th>
          <tr>
            <td><?php echo $cidades[0]->cidades;?></td>
          </tr>  
          <tr>
            <td><?php echo $cidades[1]->cidades;?></td>
          </tr>
          <tr>
            <td><?php echo $cidades[2]->cidades;?></td>
          </tr>
          <tr>
          <td><?php echo $cidades[3]->cidades;?></td>
          </tr>
          <tr>
          <td><?php echo $cidades[4]->cidades;?></td>
          </tr>
        </table>
      </div>
    </div>    
  </body>
</html>