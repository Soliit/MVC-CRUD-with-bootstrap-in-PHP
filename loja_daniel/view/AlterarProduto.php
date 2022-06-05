<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Produtos</title>
</head>
<body>
    <h1>Alterar Registro de Produtos</h1>
    <a href="index.php?classe=HomeController&metodo=abrir_home">Voltar para a principal</a>
    
    <form action="index.php?classe=ProdutoController&metodo=atualizar" method="post">

        <input type="hidden" name="codproduto" value="<?php echo $dados->codproduto;?>">

        Nome do Produto:<br>
        <input type="text" name="nomeproduto" value="<?php echo $dados->nomeproduto;?>"><br>
        Preço:<br>
        <input type="decimal" name="preco" value="<?php echo $dados->preco;?>"><br>
        Descrição:<br>
        <input type="text" name="descricao" value="<?php echo $dados->descricao;?>"><br>
        Destaque:<br>
        <select name="destaque">
            <?php
                if($dados->destaque)
                {
            ?>
            <option value="1">Sim</option>
            <option value="2">Não</option>

            <?php }
                else
                {
            ?>
            <option value="2">Não</option>
            <option value="1">Sim</option>
                
            <?php }
            ?>
        </select><br><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>