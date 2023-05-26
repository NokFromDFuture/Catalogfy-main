<?php

require_once('Banco.class.php');
class Produto{
    public $id;
    public $nome;
    public $estoque;
    public $descricao;
    public $preco;
    public $foto;
    public $id_categoria;
    public $id_usuario;
    public $data_cadastro;    

    public function Cadastrar(){
        $sql = "INSERT INTO produtos (nome, estoque, descricao, preco, foto, id_categoria, id_usuario) VALUES(?,?,?,?,?,?,?)";
        $banco = Banco::conectar();
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->nome, $this->estoque, $this->descricao, $this->preco, $this->foto, $this->id_categoria, $this->id_usuario));
        // Desconectar do banco:
        Banco::desconectar();
    }
 
    
    public function Listar(){
        $banco = Banco::conectar();
        $sql = "SELECT * FROM produtos";
        $comando = $banco->prepare($sql);
        $comando->execute();
        // "Salvar" o resultado da consulta (tabela) na $resultado
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $resultado;
    }

    public function Deletar(){
        $banco = Banco::conectar();
        $sql = "DELETE FROM produtos WHERE id = ?";
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->id));
        Banco::desconectar();
        // Retornar quantidade de linhas apagadas:
        return $comando->rowCount();
    }

    public function Atualizar(){

        $banco = Banco::conectar();
        $sql = "UPDATE produtos SET nome = ?, de = ?, telefone = ? WHERE = ?,";
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->nome, $this->estoque, $this->descricao, $this->preco, $this->foto, $this->id_categoria, $this->id_usuario));
        Banco::desconectar();
        // Retornar quantidade de linhas apagadas:
        return $comando->rowCount();

    

    }
    public function BuscarPorID(){
        $banco = Banco::conectar();
        $sql = "SELECT * FROM produtos WHERE id = ?";
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->id));
        // "Salvar" o resultado da consulta (tabela) na $resultado
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $resultado;
    }
}




?>