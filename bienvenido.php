<?php
session_start();
if (empty($_SESSION)) {
    header("location: login.php");
}
if ($_SESSION["tipo"] == "estudiante") {
    echo "<li>
                <a href='notasMostrar.php'>mostrar notas</a>
                <a href='matricula.php'>matricula</a>
          </li>";
} else {
    echo "<li>     
                <a href='notarRegistro.php'>ingresar notas</a>
                <a href='asistenciaMarcar.php'>asistencia</a>
          </li>";
}
echo "<h1>Bienvenid@ " . $_SESSION["usuario"] . " es: " . $_SESSION["tipo"] . "</h1>";
?>
<a href="cerrar.php">logout</a>

