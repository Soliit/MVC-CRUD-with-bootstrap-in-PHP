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
    <title>Cadastro de Produtos</title>
</head>
<body style='background:#B0C4DE'>
<?php include_once "topo.php"; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-secondary text-white">
                    Cadastro de Produtos
                </div>
                <div class="card-body">
                    <form action="index.php?classe=ProdutoController&metodo=cadastrar" method="post">
                        <div class="form-group">
                            <label for="nomeproduto">Produto</label>
                            <input type="text" class="form-control" name="nomeproduto" placeholder="Informe o nome do produto" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="preco">Preço</label>
                                    <input type="number" step="any" class="form-control" name="preco" placeholder="Informe o preço do produto" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="codcategoria">Categoria</label>
                                        <select name="codcategoria" class="form-control">
                                            <?php
                                                foreach($dados_categoria as $value)
                                                {
                                                    echo "<option value='$value->codcategoria'>$value->nomecategoria</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descricao">Descrição</label>
                            <textarea name="descricao" class="form-control" id="descricao"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="destaque">Destaque</label>
                            <select name="destaque" class="form-control">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--JQuery-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!--CKEditor -->
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'descricao' );
</script>
</body>
</html>