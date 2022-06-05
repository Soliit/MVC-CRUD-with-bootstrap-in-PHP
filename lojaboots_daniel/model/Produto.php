<?php
class Produto
{
    //atributos (mesmos atributos da tabela do BD)
    private $codproduto;
    private $nomeproduto;
    private $preco;
    private $descricao;
    private $destaque;
    private $codcategoria;

    //get e set 
    function __get($atributo) { return $this->$atributo; }
    function __set($atributo, $valor) { $this->$atributo = $valor; }

    function __construct() //será executado automaticamente ao usar esta classe
    {
        include_once "Conexao.php"; //incluindo classe de conexão
    }


    //método cadastrar
    function cadastrar()
    {
        $con = Conexao::conectar(); //carregar a conexão
        $cmd = $con->prepare("INSERT INTO produto 
        (nomeproduto, preco, descricao, destaque, codcategoria) 
        VALUES (:nomeproduto, :preco, :descricao, :destaque, :codcategoria)");
        //enviando valores para os parâmetros
        $cmd->bindParam(":nomeproduto",     $this->nomeproduto);
        $cmd->bindParam(":preco",           $this->preco);
        $cmd->bindParam(":descricao",       $this->descricao);
        $cmd->bindParam(":destaque",        $this->destaque);
        $cmd->bindParam(":codcategoria",    $this->codcategoria);

        $cmd->execute();//executando o comando
    }

    //método consultar
    function consultar()
    {
        $con = Conexao::conectar();//iniciar conexão com BD
        $cmd = $con->prepare("SELECT * FROM produto INNER JOIN categoria
        ON categoria.codcategoria = produto.codcategoria");
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_OBJ); //retorna os dados em forma de matriz
    }

    //método excluir
    function excluir()
    {
        $con = Conexao::conectar(); //carregar a conexão
        $cmd = $con->prepare("DELETE FROM produto WHERE codproduto = :codproduto "); //enviando valor para o parâmetro
        $cmd->bindParam(":codproduto", $this->codproduto); //valor do parâmetro
        $cmd->execute(); //executando o comando
    }

    //método atualizar
    function atualizar()
    {
        $con = Conexao::conectar(); //carregar a conexão
        $cmd = $con->prepare("UPDATE produto SET
            nomeproduto     = :nomeproduto, 
            preco           = :preco, 
            descricao       = :descricao, 
            destaque        = :destaque,
            codcategoria    = :codcategoria
        WHERE codproduto = :codproduto");
        //enviando valores para os parâmetros
        $cmd->bindParam(":nomeproduto",     $this->nomeproduto);
        $cmd->bindParam(":preco",           $this->preco);
        $cmd->bindParam(":descricao",       $this->descricao);
        $cmd->bindParam(":destaque",        $this->destaque);
        $cmd->bindParam(":codproduto",      $this->codproduto);
        $cmd->bindParam(":codcategoria",    $this->codcategoria);

        $cmd->execute();//executando o comando
    }

    //método retornar
    function retornar()
    {
        $con = Conexao::conectar();//iniciar conexão com BD
        $cmd = $con->prepare("SELECT * FROM produto 
        WHERE codproduto = :codproduto");
        $cmd->bindParam(":codproduto", $this->codproduto);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_OBJ); //retorna os dados em forma de vetor
    }

}
?>