<?php
session_start();
$erro = "";

if(isset($_SESSION['dados'])){
  if(isset($_GET['id'])){
    require_once('classes/Produto.class.php');
  
    $c = new Produto();
    $c->id = $_POST['id'];
    $c->nome = $_POST['nome'];
    $c->descricao = $_POST['descricao'];
    $c->preco = $_POST['preco'];
    $c->estoque = $_POST['estoque'];
    $c->foto = $_POST['foto'];
    $c->id_categoria = $_POST['id_categoria'];
    
    $resultado = $c->Atualizar();
  
    if($c->Atualizar() == 1){
    // Deu certo!
    // Redirecionar:
    header('Location: ../painel.php');
    exit();
}else{
    header('Location: ../painel.php');
    exit();
}
}else{
echo "Salvo...<br>";
echo "<a href=\"../painel.php\">Voltar</a>";
}
}



?>

