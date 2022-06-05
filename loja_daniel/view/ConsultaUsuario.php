<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Usuários</title>
</head>
<body>
    <h1>Consulta de Usuários</h1>
    <a href="index.php?classe=HomeController&metodo=abrir_home">Voltar para a principal</a>
    <table border='1'>
        <thead>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Acesso</th>
            <th>Ação</th>
        </thead>
        <tbody>
            <?php
            foreach($dados as $value)
            {
                if($value->acesso == 1) 
                    $value->acesso = "Administrador";
                else 
                    $value->acesso = "Usuário";

                echo "<tr>
                        <td>$value->nome</td>
                        <td>$value->email</td>
                        <td>$value->acesso</td>
                        <td>
                            <a href='index.php?classe=UsuarioController&metodo=excluir&codusuario=$value->codusuario' onclick='return confirm(\"Deseja excluir este usuário?\");'>Excluir</a>
                            <a href='index.php?classe=UsuarioController&metodo=alterar&codusuario=$value->codusuario'>Alterar</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>