<?php
class Categoria
{
    //atributos (mesmos atributos da tabela do BD)
    private $codcategoria;
    private $nomecategoria;

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
        $cmd = $con->prepare("INSERT INTO categoria 
        (nomecategoria) VALUES (:nomecategoria)");
        //enviando valores para os parâmetros
        $cmd->bindParam(":nomecategoria",    $this->nomecategoria);
        $cmd->execute();//executando o comando
    }

    //método consultar
    function consultar()
    {
        $con = Conexao::conectar();//iniciar conexão com BD
        $cmd = $con->prepare("SELECT * FROM categoria");
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_OBJ); //retorna os dados em forma de matriz
    }

    //método excluir
    function excluir()
    {
        $con = Conexao::conectar(); //carregar a conexão
        $cmd = $con->prepare("DELETE FROM categoria WHERE codcategoria = :codcategoria "); //enviando valor para o parâmetro
        $cmd->bindParam(":codcategoria", $this->codcategoria); //valor do parâmetro
        $cmd->execute(); //executando o comando
    }

    //método atualizar
    function atualizar()
    {
        $con = Conexao::conectar(); //carregar a conexão
        $cmd = $con->prepare("UPDATE categoria SET
            nomecategoria    = :nomecategoria
        WHERE codcategoria = :codcategoria");
        //enviando valores para os parâmetros
        $cmd->bindParam(":nomecategoria",    $this->nomecategoria);
        $cmd->bindParam(":codcategoria",  $this->codcategoria);

        $cmd->execute();//executando o comando
    }

    //método retornar
    function retornar()
    {
        $con = Conexao::conectar();//iniciar conexão com BD
        $cmd = $con->prepare("SELECT * FROM categoria 
        WHERE codcategoria = :codcategoria");
        $cmd->bindParam(":codcategoria", $this->codcategoria);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_OBJ); //retorna os dados em forma de vetor
    }

}
?>