<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    require_once('../classes/Usuario.class.php');
    $u = new Usuario();
    $u->email = $_POST['email'];
    $u->senha = $_POST['senha'];

    $resultado = $u->Logar();
    
    // Verificar se existem linhas no resultado:
    if(count($resultado) == 1){
        session_start();
        // Criar a sessão com os dados vindos do BD:
        $_SESSION['dados'] = $resultado[0];

        // Redirecionar:
         header("Location: ../painel.php");
        exit();
    }else{
        //echo "Usuário ou senha inválidos!";
         header('Location: ../logar.php?erro=0');
        exit();
    }
}else{
    echo "A página deve ser carregada por POST!";
}
?>