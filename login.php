<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="text" name="cod_estudiante" placeholder="Ingrese usuario"><br>
    <input type="password" name="clave" placeholder="Ingrese contraseña"><br>
    <input type="submit" value="Login">
</form>
<?php

if(!empty($_POST)){
    $cod_estudiante = (int)$_POST["cod_estudiante"];
    $clave = $_POST["clave"];

    require_once "UsuarioController.php";
    $usuarioController = new UsuarioController();
    if($usuarioController->login($cod_estudiante, $clave)){
        header("location: bienvenido.php");
    }else{
        echo "Usuario y/o contraseña incorrectos";
    }
}
