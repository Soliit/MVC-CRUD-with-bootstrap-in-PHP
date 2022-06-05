<?php
class UsuarioController
{
    function abrir_cadastro()
    {
        $this->verificar_logado();
        include_once "view/CadastroUsuario.php";
    }

    function cadastrar()
    {
        $this->verificar_logado();
        $this->verificar_acesso();
        include "model/Usuario.php";
        $usu = new Usuario();

        $usu->nome      = $_POST["nome"];
        $usu->email     = $_POST["email"];
        $usu->senha     = hash("sha256",$_POST["senha"]);
        $usu->acesso    = $_POST["acesso"];
  
        $usu->cadastrar();

        /*echo "<script>
                alert('Dados gravados com sucesso!');
                window.location='index.php?classe=UsuarioController&metodo=abrir_cadastro';
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
                    window.location='index.php?classe=UsuarioController&metodo=abrir_cadastro';
                }
            });
            </script>";
    }

    function abrir_consulta()
    {
        $this->verificar_logado();
        include_once "model/Usuario.php";
        $usu = new Usuario();
        $dados = $usu->consultar();

        include_once "view/ConsultaUsuario.php"; //carregar a tela de consulta de usuários
    }

    function excluir()
    {
        $this->verificar_logado();
        $this->verificar_acesso();
        include_once "model/Usuario.php";
        $usu = new Usuario();
        $usu->codusuario = $_GET["codusuario"];
        $usu->excluir();
        //direcionar para a página de consulta
        header("Location:index.php?classe=UsuarioController&metodo=abrir_consulta");
    }

    function editar()
    {
        $this->verificar_logado();
        include_once "model/Usuario.php";
        $usu = new Usuario();
        $usu->codusuario = $_GET["codusuario"];
        $dados = $usu->retornar();

        //exibir a tela de edição dos dados
        include_once "view/EditarUsuario.php";
    }

    function atualizar()
    {
        $this->verificar_logado();
        $this->verificar_acesso();
        include "model/Usuario.php";
        $usu = new Usuario();

        $usu->nome          = $_POST["nome"];
        $usu->email         = $_POST["email"];
        $usu->senha         = hash("sha256",$_POST["senha"]);
        $usu->acesso        = $_POST["acesso"];
        $usu->codusuario    = $_POST["codusuario"];

        $usu->atualizar();

        /* echo "<script>
                alert('Dados alterados com sucesso!');
                window.location='index.php?classe=UsuarioController&metodo=abrir_consulta';
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
                    window.location='index.php?classe=UsuarioController&metodo=abrir_consulta';
                }
            });
            </script>";    
    }

    function abrir_login()
    {
        include_once "view/login.php";
    }


    function logar()
    {
        include_once "model/Usuario.php";
        $usu = new Usuario();

        $usu->email = $_POST["email"];
        $usu->senha = hash("sha256",$_POST["senha"]);
        $dados = $usu->logar();
        if(empty($dados)) //está vazio?
        {
            echo "<script>
                alert('Usuário ou senha inválido!');
                window.location='index.php?classe=UsuarioController&metodo=abrir_login';
            </script>";
        }
        else
        {
            session_start();//iniciar a sessão
            session_regenerate_id(true);//apaga a sessão antiga
            $_SESSION["cod_logado"]     = $dados->codusuario;
            $_SESSION["nome_logado"]    = $dados->nome;
            $_SESSION["acesso_logado"]  = $dados->acesso;
            //direcionar para a página principal
            header("location:index.php?classe=HomeController&metodo=abrir_home");
        }

    }

    function sair()
    {
        session_start();
        session_destroy();//excluir tudo 
        //unset($_SESSION["cod_logado"]); // exclui apenas uma
        include_once "view/login.php";
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