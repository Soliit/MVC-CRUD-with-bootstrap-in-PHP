<?php
if(isset($_REQUEST["classe"]) && isset($_REQUEST["metodo"]))
{
    $classe = $_REQUEST["classe"]; 
    $metodo = $_REQUEST["metodo"];

    include_once "controller/$classe.php";
    $obj = new $classe();
    $obj->$metodo();
}
else
{
    include_once "view/Home.php"; //direcionar / incluir página home
}
?>