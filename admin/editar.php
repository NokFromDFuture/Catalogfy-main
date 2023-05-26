<?php

session_start();
require_once('classes/Categoria.class.php');
$c = new Categoria();
$categorias = $c->Listar();
if(isset($_SESSION['dados'])){
    echo "oi";
    if(isset($_GET['id'])){
      require_once('classes/Produto.class.php');
    
      $c = new Produto();
      $c->id = $_GET['id'];

      
$resultado = $c->BuscarPorID();
print_r ($resultado);
     if(count($resultado) == 0){
       $erro = "Produto não encontrado!";
        }
    }else{
      $erro = "ID não setado!";
    }
  }else{
    $erro = "Realize o login primeiro!";

  }
  
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body {
            background: #f8f9fa;
        }
    </style>
</head>

<body>
 
<form action="action/editar_produto.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCadastroLabel">Cadastro de Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="nomeProduto">Nome</label>
                            <input value="<?=$resultado[0]["nome"]?>" name="nome" type="text" class="form-control" id="nomeProduto" placeholder="Digite o nome do produto">
                        </div>
                        <div class="form-group">
                            <label for="fotoProduto">Foto</label>
                            <input value="<?=$resultado[0]["foto"]?>" name="foto" type="file" class="form-control-file" id="fotoProduto">
                        </div>
                        <div class="form-group">
                            <label for="descricaoProduto">Descrição</label>
                            <textarea  name="descricao" class="form-control" id="descricaoProduto" rows="3"><?=$resultado[0]["descricao"]?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoriaProduto">Categoria</label>
                            <select class="form-control" id="categoriaProduto" name="id_categoria" >
                                 <?php foreach($categorias as $categoria){   ?>
                                      <option value="<?=$categoria['id'];?>"><?=$categoria['nome'];?></option>
                                      <?php } ?>
                            </select> <br>

                        </div>
                        <div class="form-group">
                            <label for="estoqueProduto">Estoque</label>
                            <input value="<?=$resultado[0]["estoque"]?>" name="estoque" type="number" class="form-control" id="estoqueProduto" placeholder="Digite a quantidade em estoque">
                        </div>
                        <div class="form-group">
                            <label for="precoProduto">Preço</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input value="<?=$resultado[0]["preco"]?>" name="preco" type="number" class="form-control" id="precoProduto" placeholder="Digite o preço">
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                   <button type="button" class="btn btn-secondary" class="close" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
               </div>
          </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>






        