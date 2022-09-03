<?php
require_once('inc/classes.php');

if (isset($_POST['btnCadastrar'])){
    $Usuario = new Usuario ();
    $Usuario->cadastrar($_POST);
    header('location:'.URL.'usuarios.php');
    //usuario
}
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
    <h1> Cadastro de Usuario</h1>
    <form action="?" method="post">
        <div class="row">
            <div class="form-group">
                <label for="form-label">nome*</label>
                <input class="form-control" type="text" name="nome" id="nome" required>
</div>
<div class="form-group col-md-6">
    <label for="email" class="form-label">E-mail*</label>
    <input type="email" name="email" id="email" class="form-control" required>
</div>
<div class="form-group col-md-6">
    <label for="senha" class="form-label">Senha</label>
        <input type="password" name="senha" id="senha" class="form-control" requerid autocomplete="off">
    </label>
</div>
<div class="form-group col-md-6">
    <label for="confirma_senha" class="form-label">Senha*</label>
        <input type="password" name="ConfirmarSenha" id="ConfirmarSenha" class="form-control" required autocomplete="false">
    </label>
    <div class="col-offset-10 cold-md-2">
        <input class="btn btn-primary" type="submit" name="btnCadastrar" value="cadastrar">

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