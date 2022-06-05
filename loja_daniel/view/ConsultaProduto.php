<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Produtos</title>
</head>
<body>
    <h1>Consulta de Produtos</h1>
    <a href="index.php?classe=HomeController&metodo=abrir_home">Voltar para a principal</a>
    <table border="1">
        <thead>
            <th>Nome do Produto</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Destaque</th>
            <th>Ação</th>
        </thead>
        <tbody>
            <?php
              foreach($destaque as $value)
              {
                  if($value->destaque == 1) 
                      $value->destaque = "Sim";
                  else 
                      $value->destaque = "Não";

                  echo "<tr>
                      <td>$value->nomeproduto</td>
                      <td>$value->preco</td>
                      <td>$value->descricao</td>
                      <td>$value->destaque</td>
                      <td>
                        <a href='index.php?classe=ProdutoController&metodo=excluir&codproduto=$value->codproduto' onclick='return confirm(\"Deseja Excluir este usuário?\");'>Excluir</a>
                        <a href='index.php?classe=ProdutoController&metodo=alterar&codproduto=$value->codproduto'>Alterar</a>
                      </td>
                        </tr>";
              }
            ?>
        </tbody>   
    </table>

</body>
</html>