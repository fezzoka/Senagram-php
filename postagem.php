<?php
 require_once('inc/classes.php');
 $Postagem = new Postagem();
 

                
                //echo $postagem->cadastrar($dados);
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
            <h1> postagens
            -
            <a class="btn btn-dark"
            href="<?php echo URL ?>/postagemcadastrar.php">
            <i class="bi bi-person-plus-fill"></i>
            Novo
            </a>
            </h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Açoes</th>
                        <th>ID</th>
                        <th>postagem</th>
                        <th>User</th>
                        <th>Data</th>
                        <th>Descricao</th>
                        <th>Gostei</th>
                        <th>Não Gostei</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $postagens = $Postagem->listar();
                        foreach ($postagens as $postagem) {
                            
                        
                    ?>
                    <tr>
                        <td>
                        <a href="<?php echo URL ?>/postagematualizar.php?id=<?php echo $postagem->id_postagem;?>"
                            class="btn btn-danger"
>
Editar
</a>
                        </td>
                        <td>
                        <a href="<?php echo URL ?>/postagemdeletar.php?id=<?php echo $postagem->id_postagem;?>"
                            class="btn btn-primary"
>
Deletar
</a>
                        </td>
                        <td>
                            <?php echo $postagem->id_postagem; ?>
                        </td>
                        <td>
                            <?php echo $postagem->id_usuario; ?>
                        </td>
                        <td>
                            <?php echo $postagem->dt; ?>
                        </td>
                        <td>
<?php
if ($postagem->foto != '')
{
    echo '<img src="'.URL.'imagens/'.$postagem->foto.'">';
}
echo nl2br($postagem->descricao);
?>

                        </td>
                        <td>
                            <?php echo nl2br($postagem->descricao); ?>
                        </td>
                        <td>
                            <?php echo $postagem->gostei; ?>
                        </td>
                        <td>
                            <?php echo $postagem->naogostei; ?>
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