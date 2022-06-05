<?php
class CategoriaController
{
    function abrir_cadastro()
    {
        $this->verificar_logado();
        include_once "view/CadastroCategoria.php";
    }

    function cadastrar()
    {
        $this->verificar_logado();
        include "model/Categoria.php";
        $cat = new Categoria();
        $cat->nomecategoria      = $_POST["nomecategoria"];
        $cat->cadastrar();

        /*echo "<script>
                alert('Dados gravados com sucesso!');
                window.location='index.php?classe=CategoriaController&metodo=abrir_cadastro';
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
                    window.location='index.php?classe=CategoriaController&metodo=abrir_cadastro';
                }
            });
            </script>";    
    }

    function abrir_consulta()
    {
        $this->verificar_logado();
        include_once "model/Categoria.php";
        $cat = new Categoria();
        $dados = $cat->consultar();
        include_once "view/ConsultaCategoria.php"; //carregar a tela de consulta de usuários
    }

    function excluir()
    {
        $this->verificar_logado();
        include_once "model/Categoria.php";
        $cat = new Categoria();
        $cat->codcategoria = $_GET["codcategoria"];
        $cat->excluir();
        //direcionar para a página de consulta
        header("Location:index.php?classe=CategoriaController&metodo=abrir_consulta");
    }

    function editar()
    {
        $this->verificar_logado();
        include_once "model/Categoria.php";
        $cat = new Categoria();
        $cat->codcategoria = $_GET["codcategoria"];
        $dados = $cat->retornar();
        //exibir a tela de edição dos dados
        include_once "view/EditarCategoria.php";
    }

    function atualizar()
    {
        $this->verificar_logado();
        include "model/Categoria.php";
        $cat = new Categoria();
        $cat->nomecategoria   = $_POST["nomecategoria"];
        $cat->codcategoria    = $_POST["codcategoria"];
        $cat->atualizar();

        /* echo "<script>
                alert('Dados alterados com sucesso!');
                window.location='index.php?classe=CategoriaController&metodo=abrir_consulta';
            </script>"; */

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
                    window.location='index.php?classe=CategoriaController&metodo=abrir_consulta';
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
            header("location:index.php?classe=CategoriaController&metodo=abrir_login");
        }
    }



}
?>