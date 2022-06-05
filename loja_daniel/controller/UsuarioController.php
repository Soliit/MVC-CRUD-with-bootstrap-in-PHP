<?php
class UsuarioController
{
    function abrir_cadastro()
    {
        include_once "view/CadastroUsuario.php";
    }

    function cadastrar()
    {
        include "model/Usuario.php";
        $usu = new Usuario();

        $usu->nome      = $_POST["nome"];
        $usu->email     = $_POST["email"];
        $usu->senha     = $_POST["senha"];
        $usu->acesso    = $_POST["acesso"];

        $usu->cadastrar();

        echo "<script>
                alert('Dados gravados com sucesso!!!');
                window.location='index.php?classe=UsuarioController&metodo=abrir_cadastro';
            </script>";
    }

    function abrir_consulta()
    {
        include_once "model/Usuario.php";
        $usu = new Usuario();
        $dados = $usu->consultar();

        include_once "view/ConsultaUsuario.php"; //carregar a tela de consulta de usuários
    }

    function excluir()
    {
        include_once "model/Usuario.php";
        $usu = new Usuario();
        $usu->codusuario = $_GET["codusuario"];
        $usu->excluir();
        //direcionar para a página de consulta
        header("Location:index.php?classe=UsuarioController&metodo=abrir_consulta");
    }

    function alterar()
    {
        include_once "model/Usuario.php";
        $usu = new Usuario();
        $usu->codusuario = $_GET["codusuario"];
        $dados = $usu->retornar();

        //exibir a tela de edição dos dados
        include_once "view/AlterarUsuario.php";
    }

    function atualizar()
    {
        include "model/Usuario.php";
        $usu = new Usuario();

        $usu->nome          = $_POST["nome"];
        $usu->email         = $_POST["email"];
        $usu->senha         = $_POST["senha"];
        $usu->acesso        = $_POST["acesso"];
        $usu->codusuario    = $_POST["codusuario"];

        $usu->atualizar();

        echo "<script>
                alert('Dados alterados com sucesso!!!');
                window.location='index.php?classe=UsuarioController&metodo=abrir_consulta';
              </script>";
    }
}
?>