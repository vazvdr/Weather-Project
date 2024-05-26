<?php

    require_once("connection.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $cidade = $_POST['cidade'];
        $sql = "INSERT INTO buscas (cidades) VALUES('$cidade')";
        $stmt = $conn->prepare($sql);
        
        if($stmt->execute()){
            echo"Cidade salva com sucesso";
            header('Location: home.php');
        }
        
    }
?>