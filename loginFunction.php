<?php

    require_once "conexao.php";
    function login($conexao){
        if(isset($_POST['entrar']) AND !empty($_POST['login']) AND !empty($_POST['senha'])){
            $login = filter_input(INPUT_POST, "email", FILTER_VALIDADE_EMAIL);
            $senha = ($_POST['senha']);
            $sql = "SELECT * FROM usuarios WHERE email = '$login' AND senha = '$senha'";
            $executar = mysqli_query($conexao,$sql);
            $return = mysqli_fetch_assoc($executar);            
            if(!empty($return['login'])){
            echo $return['login'];
            } else {
                echo "Usuario ou senha não encontrados";
            }
        }
    }
?>