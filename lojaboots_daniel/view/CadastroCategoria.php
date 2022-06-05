<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>Cadastro de Categorias</title>
</head>
<body style='background:#B0C4DE'>
<?php include_once "topo.php"; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-danger text-white">
                    Cadastro de Categorias
                </div>


                <div class="card-body">
                    <form action="index.php?classe=CategoriaController&metodo=cadastrar" method="post">

                    <div class="form-group">
                            <label for="nomecategoria">Categoria</label>
                            <input type="text" class="form-control" name="nomecategoria" placeholder="Informe o nome da categoria" required>
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
                    </form>

<!--JQuery-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>