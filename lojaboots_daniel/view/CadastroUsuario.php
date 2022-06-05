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
    <title>Cadastro de Usuários</title>
</head>
<body  style='background:#B0C4DE'>
<?php include_once "topo.php"; ?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    Cadastro de Usuários
                </div>

                <div class="card-body">
                    <form action="index.php?classe=UsuarioController&metodo=cadastrar" id="form" method="post">

                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" name="nome" placeholder="Informe o seu nome completo" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" name="email" placeholder="Informe o seu endereço de E-mail" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="senha">Senha</label>
                                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="senha">Confirmar Senha</label>
                                    <input type="password" class="form-control" name="senha" placeholder="Confirme sua senha" required>
                                </div>
                            </div>
                        </div>
                                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="acesso">Acesso:</label>
                                        <select name="acesso" required>
                                            <option value="1">Administrador</option>
                                            <option value="2">Usuário</option>
                                        </select>
                                    </div>
                                </div>
                            </div>    

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Cadastrar</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!--JeQuery-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!--JqueryValidate-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>

<script>
//iniciando a validação
$("#form").validate({
    rules: {
        nome: "required",
        email:{
            required: true,
            email: true
        },
        senha:{
            required: true,
            minlength:5

        },
        confirmar:{
            required: true,
            equalTo: "#senha"

        }
    },
    messages: {
        nome: "Informe o nome do usuário",
        email: {
            required: "Informe o e-mail",
            email: "Informe um e-mail válido"
        },
        senha:{
            required: "Informa a senha",
            equalTo: "Verifique a confirmação da senha",
            minlength:"A senha deve ter no mínimo 5 caracteres"
        },
        confirmar:{
            required: "Informe a confirmação da senha",
            equalTo: "Verifique a confirmação da senha"
        }
    }

});
</script>
</body>
</html>