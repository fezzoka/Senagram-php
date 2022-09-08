<?php
 require_once('inc/classes.php');
 $Usuario = new Usuario();
 
 $dados = array('nome'=>'jose da silva',
                'email'=>'jose@teste.teste',
                'senha'=>'1234');
                
                //echo $Usuario->cadastrar($dados);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SENAGRAN</title>
    <!-- CSS -->
    <?php
        require_once('inc/css.php');
    ?>
    <!-- /CSS -->
    <!-- JS -->
    <?php
        require_once('inc/js.php'); 
    ?>
    <!-- /JS -->

</head>
<body>
    <div class="container">
        <!-- MENU --> 
        <?php
            require_once('inc/menu.php');            
        ?>             
        <!-- /MENU -->
        <!-- CONTEUDO -->
        <div>
            <h1> USUÁRIOS
            -
            <a class="btn btn-dark"
            href="<?php echo URL ?>/usuariocadastrar.php">
            <i class="bi bi-person-plus-fill"></i>
            Novo
            </a>
            </h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Ações</th>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $usuarios = $Usuario->listar();
                        foreach ($usuarios as $usuario) {
                            
                        
                    ?>
                    <tr>
                        <td>
                        <a href="<?php echo URL ?>/usuarioatualizar.php?id=<?php echo $usuario -> id_usuario;?>"
                            class="btn btn-danger"
>
Editar
</a>
                        </td>
                        <td>
                        <a href="<?php echo URL ?>/usuariodeletar.php?id=<?php echo $usuario -> id_usuario;?>"
                            class="btn btn-primary"
>
Deletar
</a>
                        </td>
                        <td>
                            <?php echo $usuario->id_usuario; ?>
                        </td>
                        <td>
                            <?php echo $usuario->nome; ?>
                        </td>
                        <td>
                            <?php echo $usuario->email; ?>
                        </td>
                        
                    </tr>
                    <?php
                        } // fecha foreach
                    ?>
                </tbody>

            </table>
        </div>
        <!-- /CONTEUDO -->
        <!-- RODAPE -->
        <?php
            include_once('inc/rodape.php');
        ?>
        <!-- /RODAPE -->    
    </div>    
</body>
</html>