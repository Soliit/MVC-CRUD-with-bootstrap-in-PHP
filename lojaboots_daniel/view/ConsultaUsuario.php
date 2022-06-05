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
    <!--Data Tables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <title>Consulta Usuários</title>
</head>
<body style='background:#B0C4DE'>
<?php include_once "topo.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-sm-8 mt-3 mx-auto">
            <div class="card">
                <h5 class="card-header bg-success text-white">Consulta de Usuários</h5>
                <div class="card-body">
                <table class="table table-striped table-responsive" id="tabela">
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
                            
                            $linkExcluir = "";
                            if($_SESSION["acesso_logado"] == 1) //é administrador
                                {
                                    $linkExcluir = "<button onclick=\"Excluir('$value->codusuario');\" class='btn btn-sm btn-danger'><i class='fas fa-trash-alt'></i> Excluir</button>";
                                }

                            echo "<tr>
                                    <td>$value->nome</td>
                                    <td>$value->email</td>
                                    <td>$value->acesso</td>
                                    <td>
                                        $linkExcluir
                                        <a href='index.php?classe=UsuarioController&metodo=editar&codusuario=$value->codusuario' class='btn btn-warning btn-sm'><i class='fas fa-edit'></i> Editar</a>
                                    </td>
                                </tr>";
                        }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--JeQuery-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!--Bootstrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>  
<!--Data Tables-->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<!--SweetAlert2-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready( function () {
        $('#tabela').DataTable();
    } );

function Excluir(codusuario){
    Swal.fire({
    title: 'Deseja excluir este cadastro?',
    icon: 'question',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim',
    cancelButtonText: 'Não'
    }).then((result) => {
    if (result.isConfirmed) {
        window.location='index.php?classe=UsuarioController&metodo=excluir&codusuario='+codusuario;
    }
    });
}
</script>
</body>
</html>