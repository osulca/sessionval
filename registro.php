<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="text" name="codigo" placeholder="Ingrese Codigo"
           value=<?=isset($_POST["codigo"])?$_POST["codigo"]:""?>><br>
    <input type="password" name="contraseña" placeholder="Ingrese contraseña"
           value=<?=isset($_POST["contraseña"])?$_POST["contraseña"]:""?>><br>
    <input type="password" name="repcontraseña" placeholder="Repita contraseña"
           value=<?=isset($_POST["repcontraseña"])?$_POST["repcontraseña"]:""?>><br>
    <input type="text" name="nombres" placeholder="Ingrese nombres"
           value=<?=isset($_POST["nombres"])?$_POST["nombres"]:""?>><br>
    <input type="text" name="apellidos" placeholder="Ingrese apellidos"
           value=<?=isset($_POST["apellidos"])?$_POST["apellidos"]:""?>><br>
    <select name="tipo">
        <option value="estudiante">Estudiante</option>
        <option value="profesor">Profesor</option>
    </select><br>
    <input type="submit" value="Guardar">
</form>
<?php
if(!empty($_POST)){
    $patron_numerico = "/^(\d)*$/";
    $patron_letras = "/^[a-zA-Z ]*$/";

    $codigo = trim($_POST["codigo"]);
    if(preg_match($patron_numerico,$codigo)==0){
        echo "el codigo solo debe incluir numeros";
    }
    if($codigo==""){
        echo "el campo <b>'Codigo'</b> está vacio<br>";
    }

    $contraseña = $_POST["contraseña"];
    if($contraseña==""){
        echo "el campo <b>'Contraseña'</b> está vacio<br>";
    }
    if(strlen($contraseña)<6){
        echo "la contraseña debe tener al menos 8 caracteres<br>";
    }

    $repcontraseña = $_POST["repcontraseña"];
    if($repcontraseña==""){
        echo "el campo <b>'Repita Contraseña'</b> está vacio<br>";
    }
    if($contraseña!=$repcontraseña){
        echo "las contraseñas no coinciden";
    }

    $nombres = $_POST["nombres"];
    if(preg_match($patron_letras, $nombres)==0){
        echo "el nombre solo debe contener letras";
    }
    if($nombres==""){
        echo "el campo <b>'Nombres'</b> está vacio<br>";
    }

    $apellidos = $_POST["apellidos"];
    if($apellidos==""){
        echo "el campo <b>'Apellidos'</b> está vacio<br>";
    }

    $tipo = $_POST["tipo"];
/*
    require_once "UsuarioController.php";
    $usuarioController = new UsuarioController();
    echo $usuarioController->guardar($codigo, $contraseña, $nombres, $apellidos, $tipo);
*/
}
