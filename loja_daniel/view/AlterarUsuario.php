<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Usuários</title>
</head>
<body>
    <h1>Alterar Registro de Usuário</h1>
    <a href="index.php?classe=UsuarioController&metodo=abrir_consulta">Voltar para a consulta</a>
    
    <form action="index.php?classe=UsuarioController&metodo=atualizar" method="post">

        <input type="hidden" name="codusuario" value="<?php echo $dados->codusuario;?>">

        Nome:<br>
        <input type="text" name="nome" value="<?php echo $dados->nome;?>"><br>
        E-mail:<br>
        <input type="email" name="email" value="<?php echo $dados->email;?>"><br>
        Senha:<br>
        <input type="password" name="senha" value="<?php echo $dados->senha;?>"><br>
        Acesso:<br>
        <select name="acesso">
            <?php
                if($dados->acesso == 1)
                {
            ?>
                    <option value="1">Administrador</option>
                    <option value="2">Usuário</option>
            <?php } 
            else {  ?>
                    <option value="2">Usuário</option>
                    <option value="1">Administrador</option>
            <?php } ?>
        </select><br><br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>