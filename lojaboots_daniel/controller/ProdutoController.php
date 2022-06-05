<?php
class ProdutoController
{
    function abrir_cadastro()
    {
        $this->verificar_logado();

        //buscando as categorias
        include_once "model/Categoria.php";
        $cat = new Categoria();
        $dados_categoria = $cat->consultar();

        include_once "view/CadastroProduto.php";
    }

    function cadastrar()
    {
        $this->verificar_logado();
        include "model/Produto.php";
        $prod = new Produto();

        $prod->nomeproduto      = $_POST["nomeproduto"];
        $prod->preco            = $_POST["preco"];
        $prod->descricao        = $_POST["descricao"];
        $prod->destaque         = $_POST["destaque"];
        $prod->codcategoria     = $_POST["codcategoria"];

        $prod->cadastrar();

        /*echo "<script>
                alert('Dados gravados com sucesso!');
                window.location='index.php?classe=ProdutoController&metodo=abrir_cadastro';
            </script>";*/

        echo "<body></body>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
        Swal.fire({
            title:'Dados gravados com sucesso!',
            type:'success',
            icon:'success',
            showConfirmButton:false,
            timer:2000,
            onClose: () => {
                window.location='index.php?classe=ProdutoController&metodo=abrir_cadastro';
            }
        });
        </script>";

    }

    function abrir_consulta()
    {
        $this->verificar_logado();
        include_once "model/Produto.php";
        $prod = new Produto();
        $dados = $prod->consultar();

        include_once "view/ConsultaProduto.php"; //carregar a tela de consulta de usuários
    }

    function excluir()
    {
        $this->verificar_logado();
        $this->verificar_acesso();
        include_once "model/Produto.php";
        $prod = new Produto();
        $prod->codproduto = $_GET["codproduto"];
        $prod->excluir();
        //direcionar para a página de consulta
        header("Location:index.php?classe=ProdutoController&metodo=abrir_consulta");
    }

    function editar()
    {
        $this->verificar_logado();
        include_once "model/Produto.php";
        $prod = new Produto();
        $prod->codproduto = $_GET["codproduto"];
        $dados = $prod->retornar();

        //buscando as categorias
        include_once "model/Categoria.php";
        $cat = new Categoria();
        $dados_categoria = $cat->consultar();

        //exibir a tela de edição dos dados
        include_once "view/EditarProduto.php";
    }

    function atualizar()
    {
        $this->verificar_logado();
        include "model/Produto.php";
        $prod = new Produto();

        $prod->nomeproduto          = $_POST["nomeproduto"];
        $prod->preco                = $_POST["preco"];
        $prod->descricao            = $_POST["descricao"];
        $prod->destaque             = $_POST["destaque"];
        $prod->codproduto           = $_POST["codproduto"];
        $prod->codcategoria         = $_POST["codcategoria"];

        $prod->atualizar();

        echo "<body></body>
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css'>
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js'></script>
        <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script>
        Swal.fire({
            title:'Dados atualizados com sucesso!',
            type:'success',
            icon:'success',
            showConfirmButton:false,
            timer:2000,
            onClose: () => {
                window.location='index.php?classe=ProdutoController&metodo=abrir_consulta';
            }
        });
        </script>";
    }

    function verificar_logado()
    {
        session_start();
        if(!isset($_SESSION["cod_logado"]))//não existe a sessão
        {
            //voltar para o login
            header("location:index.php?classe=UsuarioController&metodo=abrir_login");
        }
    }

    function verificar_acesso()
    {
        if($_SESSION["acesso_logado"] == 2)//não adm
        {
            //voltar para o início
            header("location:index.php?classe=HomeController&metodo=abrir_home");
        }
    }
}
?>