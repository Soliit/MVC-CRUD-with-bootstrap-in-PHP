<?php
class ProdutoController
{
    function abrir_cadastro()
    {
        include_once "view/CadastroProduto.php";
    }

    function cadastrar()
    {
        include "model/Produto.php";
        $pro = new Produto();

        $pro->nomeproduto =     $_POST["nomeproduto"];
        $pro->preco =           $_POST["preco"];
        $pro->descricao =       $_POST["descricao"];
        $pro->destaque =        $_POST["destaque"];

        $pro->cadastrar();

        echo "<script>
                alert('Produto cadastrado com sucesso!!!');
                window.location='index.php?classe=ProdutoController&metodo=abrir_cadastro';
              </script>";
    }

    function abrir_consulta()
    {
        include_once "model/Produto.php";
        $pro = new Produto();
        $destaque = $pro->consultar();

        include_once "view/ConsultaProduto.php"; //carregar a tela de consulta de produtos
    }

    function excluir()
    {
        include_once "model/Produto.php";
        $pro = new Produto();
        $pro->codproduto = $_GET["codproduto"];
        $pro->excluir();
        //direcionar para a página de consulta
        header("Location:index.php?classe=ProdutoController&metodo=abrir_consulta");
    }

    function alterar()
    {
        include_once "model/Produto.php";
        $pro = new Produto();
        $pro->codproduto = $_GET["codproduto"];
        $dados = $pro->retornar();

        //exibir a tela de edição dos dados
        include_once "view/AlterarProduto.php";
    }

    function atualizar()
    {
        include "model/Produto.php";
        $pro = new Produto();

        $pro->nomeproduto   = $_POST["nomeproduto"];
        $pro->preco         = $_POST["preco"];
        $pro->descricao     = $_POST["descricao"];
        $pro->destaque      = $_POST["destaque"];
        $pro->codproduto    = $_POST["codproduto"];

        $pro->atualizar();

        echo "<script>
                alert('Produto alterado com sucesso!!!');
                window.location='index.php?classe=produtoController&metodo=abrir_consulta';
              </script>";
    }
}
?>