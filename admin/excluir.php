<?php
session_start();

if(isset($_GET['id']) and isset($_SESSION['dados'])){
    require_once('classes/Produto.class.php');
    $c = new Produto();
    
    $c->id = $_GET['id'];
    
    if ($c->Deletar() == 1){
         header("Location: painel.php?msg=2");
         exit();
    }else{
        header("Location: painel.php?erro=3");
         exit();
    }
}else{
    echo "Defina o ID do item a ser apagado ou faça o login na sua conta.";
}


?>