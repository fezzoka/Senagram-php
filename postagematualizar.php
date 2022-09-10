<?php
require_once('inc/classes.php');
    $Postagem = new Postagem ();
if (isset($_POST['btnAtualizar'])){

    $Postagem->atualizar($_POST,$_FILES['foto']);
    header('location:'.URL.'/postagem.php');
    //usuario
}
$post = $Postagem->mostrar($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- css -->
<?php 
require_once('inc/css.php');
?>
<!-- javascript -->
<?php 
require_once('inc/js.php');
?>
<!-- menu -->
<?php 
include('inc/menu.php');
?>
 <title>Senagram</title>
</head>
<body>
    <div class="container"> 
        
<!-- Conteudo -->
<div>
<div>
    <h1> Atualização de Postagem</h1>
    <form action="?" method="post" enctype="multipart/form-data">
        <!-- Campo Oculto -->
        <input type="hidden" name="id_usuario" value="2">
        <input type="hidden" name="id_postagem"value="<?php echo $post->id_postagem;?>">
        <input type="hidden" name="foto_atual"value="<?php echo $post->foto;?>">
        <div class="row">
            <div class="form-group col-md-12">
                <label class="form-label" for="descricao">descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" rows="5" required><?php echo $post->descricao;?></textarea>
            
                
</div>
<div class="form-group col-md-12" >
    <label for="foto" class="form-label">Foto</label>
    <input type="file" name="foto" id="foto" class="form-control" >
</div>
<div class="col-offset-10 cold-md-2">
        <input class="btn btn-primary" type="submit" name="btnAtualizar" value="atualizar">

</div>

</div>
<!-- /Conteudo -->
<!-- rodape -->
<?php 
include('inc/rodape.php');
?>
<!-- /rodape -->


</div>
</div>
</body>
</html>