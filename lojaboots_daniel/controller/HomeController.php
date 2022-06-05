<?php
class HomeController
{
    function abrir_home()
    {
        $this->verificar_logado();
        include_once "view/Home.php"; //incluir o arquivo home
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
}
?>