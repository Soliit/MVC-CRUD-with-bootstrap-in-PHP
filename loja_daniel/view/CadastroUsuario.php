<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
</head>
<body>
    <h1>Cadastro de Usuários</h1>
    <a href="index.php?classe=HomeController&metodo=abrir_home">Voltar para a principal</a>
    
    <form action="index.php?classe=UsuarioController&metodo=cadastrar" method="post">
        Nome:<br>
        <input type="text" name="nome"><br>
        E-mail:<br>
        <input type="email" name="email"><br>
        Senha:<br>
        <input type="password" name="senha"><br>
        Acesso:<br>
        <select name="acesso">
            <option value="1">Administrador</option>
            <option value="2">Usuário</option>
        </select><br><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>