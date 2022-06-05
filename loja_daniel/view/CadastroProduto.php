<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>
    <a href="index.php?classe=HomeController&metodo=abrir_home">Voltar para a principal</a>
    
    <form action="index.php?classe=ProdutoController&metodo=cadastrar" method="post">
        Nome do Produto:<br>
        <input type="text" name="nomeproduto"><br>
        Preço:<br>
        <input type="decimal" name="preco"><br>
        Descrição:<br>
        <input type="text" name="descricao"><br>
        Destaque:<br>
        <select name="destaque">
            <option value="1">Sim</option>
            <option value="2">Não</option>
        </select><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>